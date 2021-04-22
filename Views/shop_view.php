<?php
// The about page view
require_once("view.php");
class ShopView extends View{
  function __construct($controller, $model){
      parent::__construct($controller, $model);
      $this->controller = $controller;
      $this->model = $model;
    }

    public function content(){
      $template_html = '';

      if($_SERVER['REQUEST_URI'] == '/shop'){
        ob_start();
        include(URL.'/Template/shop.html');
        $template_html = ob_get_contents();
        ob_end_clean();
      }

      return $template_html;
    }

    public function shopLoop(){
      $output = '';
      $catList = '';
      $soldOut = '<p class="soldOutText">Sorry, we do not have enough in stock to fulfil your order</p>';
      foreach($_SESSION['productArray'] as $product){
        if( is_array($product['category']) ){
          foreach($product['category'] as $cat){
            $catList .= ' '.$cat;
          }
        }
        else{
          $catList = $product['category'];
        }

        if($product["on_sale"] != 'false'){
          $catList .= ' sale';
        }

        if($product["quantity"] <= 0){
          $catList .= ' soldOut ';
        }

        $output .= '<article class="'.strtolower($catList).'">';

        $output .= $soldOut;

        if($product["on_sale"] != 'false'){
          $output .= '<div class="sale" style="background-image: url(../../Images/sale.png);"></div>';
        }

        $id = str_replace(" ","-",$product['name']);
        $output .= '<a href="/shop/product/'. $this->clean($product['name']).'">';
        $output .= '<div id="'.$id.'" class="img"><div style="background-image: url(../../Images/products/'.$product['image'].');"></div>';
        $output .= '</a>';
        $output .= '<div class="content">';
        $output .= '<a href="/shop/product/'. $this->clean($product['name']).'" class="productTitle" data-quantity="'.$product["quantity"].'">'.$product['name'].'</a>';
        if($product["on_sale"] == 'false'){
          $output .= '<p class="price">$'.$product["price"].'</p>';
        }
        else{
          $output .= '<p class="price">$'.$product["sale_price"].'</p>';
        }
        $output .= '<div class="buttonWrap">';
          $output .= '<span class="button add">Add To Cart</span>';
          $output .= '<span class="button added">Added</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</article>';
      }
      return $output;
    }

    public function cartLoop(){
      $grandTotal = 0;
      $output = '';
      $output = '<table id="cartItem">';
      $output .= '<tr>';
      $output .= '<th scope="col"></th>';
      $output .= '<th scope="col">Product</th>';
      $output .= '<th scope="col">Price</th>';
      $output .= '<th scope="col">Quantity</th>';
      $output .= '<th scope="col">Amount</th>';
      $output .= '</tr>';

      $value = array_count_values($this->cart->returnCart());

      foreach($value as $vaule => $singleCart){
        $item = $this->sql->getItem('productArray',$vaule);
        if(!empty($item)){
          $output .='<tr>';
          $output .='<td class="product_image" data-label="">';
          $output .='<a href="/shop/product/'.str_replace(" ","-",$item['name']).'">';
          $output .='<i class="fas fa-times"></i><img src="../../Images/products/'.$item['image'].'">';
          $output .='</a>';
          $output .='</td>';
          $output .='<td class="product_name" data-label="Product">'.$item['name'].'</td>';
          if($item['on_sale'] == 'false'){
            $price = $item['price'];
          } else{
            $price = $item['sale_price'];
          }
          $output .='<td class="product_price" data-label="Price">$'.$price.'</td>';
          $output .='<td class="product_quantity" data-label="Quantity"><div class="amount"><i class="fas fa-minus"></i><span class="total">'.$singleCart.'</span><i class="fas fa-plus"></i></td>';

          $itemPrice = (float)$price * $singleCart;
          $grandTotal += $itemPrice;
          $output .= '<td class="product_grandCost" data-label="Amount">$'.number_format((float)$itemPrice, 2).'</td>';
          $output .='</tr>';
        }

        else{
          $output .='<tr>';
          $output .='<td class="product_image"><img src="../../Images/products/placeholder.png"></td>';
          $output .='<td class="product_name"><h2>Sorry, '.$vaule.' is no longer in stock</h2></td>';
          $output .='<td class="product_price"></td>';
          $output .='<td class="product_quantity"></td>';
          $output .= '<td class="product_grandCost"></td>';
          $output .='</tr>';
        }

      }
      $output .= '</table>';

      $output .= '<div class="cart-collaterals">';
      $output .= '<h2>Cart totals</h2>';
      $output .= '<table>';
      $output .='<tr>';
      $output .='<td class="">Subtotal:</td>';
      $output .='<td class="">$'.number_format($grandTotal,2).'</td>';
      $output .='</tr>';
      $output .='<tr>';
      $output .='<td class="taxCost">Tax:</td>';
      $output .='<td class="taxCost">$0.00</td>';
      $output .='</tr>';
      $output .='<tr>';
      $output .='<td class="GrandCost">Grand Total:</td>';
      $output .='<td class="GrandCost">$'.number_format($grandTotal,2).'</td>';
      $output .='</tr>';
      $output .= '</table>';
      $output .= '</div>';
      return $output;
    }

    public function cart(){
      if(!empty($_SESSION['cart'])){
        ob_start();
        include(URL.'/Template/cart.html');
        $template_html = ob_get_contents();
        ob_end_clean();
        echo $this->contentIdWrap($template_html);
      }
      else{
        ob_start();
        include(URL.'/Template/emptyCart.html');
        $template_html = ob_get_contents();
        ob_end_clean();
        echo $this->contentIdWrap($template_html);
      }
    }

    public function checkOut(){
      ob_start();
      include(URL.'/Template/basefile.html');
      $template_html = ob_get_contents();
      ob_end_clean();


      $var = $this->formBuild();
      $template_html = $this->contentFill($template_html, $var);
      echo $this->contentIdWrap($template_html);
    }

    public function formBuild(){
      $output = '';
      $count = 0;
      $value = array_count_values($this->cart->returnCart());
      $grandTotal = 0;

      foreach($value as $vaule => $singleCart){

        $item = $this->sql->getItem('productArray',$vaule);
        if($item['on_sale'] == 'false'){
          $price = $item['price'];
        } else{
          $price = $item['sale_price'];
        }
        $itemPrice = (float)$price * $singleCart;
        $count = $singleCart + $count;
        $grandTotal += $itemPrice;
      }



      foreach ($value as $key => $value) {
       $output .= '<p>'.$key.'<span class="price">'.$value.'</span></p>';
      }

      $var = '
      <style>* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4f7ab4;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #4f7ab4;
}

a {
  color: #4f7ab4;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
      <h1>Thanks for picking In And Out Grocery</h1>
      <div class="row">
        <div class="col-75">
          <div class="container">
            <form method="post" action="/shop/thankyou">

              <div class="row">
                <div class="col-50">
                  <h3>Billing Address</h3>
                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="" required>
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="" required>
                  <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input type="text" id="adr" name="address" placeholder="">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" name="city" placeholder="" required>

                  <div class="row">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="" required>
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input type="text" id="zip" name="zip" placeholder="" required>
                    </div>
                  </div>
                </div>

                <div class="col-50">
                  <h3>Payment</h3>
                  <label for="fname">Accepted Payment</label>
                  <div class="icon-container">
                    <img src="/Images/pay.jpg" alt="money">
                  </div>
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="" required>
                  <label for="ccnum">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="" required>
                  <label for="expmonth">Exp Month</label>
                  <input type="text" id="expmonth" name="expmonth" placeholder="">
                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="" required>
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="text" id="cvv" name="cvv" placeholder="" required>
                    </div>
                  </div>
                </div>

              </div>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label>
              <input type="submit" value="Continue to checkout" class="btn">
            </form>
          </div>
        </div>
        <div class="col-25">
          <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>'.$count.'</b></span></h4>
            '. $output .'
            <hr>
            <p>Total <span class="price" style="color:black"><b>$'.number_format($grandTotal,2).'</b></span></p>
          </div>
        </div>
      </div>


      ';
      return $var;
    }

    public function searchItem(){
      $output = '';
      $output .= '<div class="searchContainer"><i class="fas fa-search"></i>';
      $output .= '<input class="seach" type="text" placeholder="Search a product" value="">';
      $output .= '</div>';
      return $output;
    }

    public function product($item){
      $output = '';
      if(is_array($item)){
        // $item[0];
        $itemName = str_replace('-',' ',$item[0]);
        $itemArray = $this->sql->getItem('productArray', $itemName);
        if(!empty($itemArray)){
        $id = str_replace(" ","-",$itemArray['name']);
          $output .= '<div id="" class="section singleProduct">';
          $output .= '<div class="constraint">';
          $output .= '<div id="" class="column width-12">';
          $output .= '<div id="" class="wrapper text">';
          $output .= '<h1>'.$itemArray['name'].'</h1>';
          $output .= '</div>';
          $output .= '</div>';
          $output .= '<div id="" class="column width-6">';
          $output .= '<div id="" class="wrapper img">';
          $output .= '<img src="/../../Images/products/'.$itemArray['image'].'" alt="'.$itemArray['name'].'">';
          $output .= '</div>';
          $output .= '</div>';

          $output .= '<div id="" class="column width-6 singleProductInfo">';
          $output .= '<div id="" class="wrapper code">';
          $output .= '<a href="/shop#'.$id.'" class="button add">Back To Shopping</a>';
          $output .= '</div>';

          if(!empty($itemArray['nutrition_facts'])){
            $output .= '<div id="" class="wrapper text">';
            $output .= '<h2>Nutrition Facts</h2>';
            $output .= '<p>'.$itemArray['nutrition_facts'].'</p>';
            $output .= '</div>';
          }
          if(!empty($itemArray['description'])){
            $output .= '<div id="" class="wrapper text">';
            $output .= '<h2>Description</h2>';
            $output .= '<p>'.$itemArray['description'].'</p>';
            $output .= '</div>';
          }
          if(!empty($itemArray['ingredients'])){
            $output .= '<div id="" class="wrapper text">';
            $output .= '<h2>Ingredients</h2>';
            $output .= '<p>'.$itemArray['ingredients'].'</p>';
            $output .= '</div>';
          }
          $output .= '</div>';
          $output .= '</div>';
          $output .= '</div>';
        } else{
            $output = '<div id="" class="section missing product">';
            $output .= '<div class="constraint" style="">';
            $output .= '<div id="" class="column width-12">';
            $output .= '<div id="" class="wrapper text">';
            $output .= '<h1>HMMMMMMMM,</h1>';
            $output .= '<h2>I CAN\'T SEEM TO FIND THAT ONE!</h2>';
            $output .= '</div>';
            $output .= '<div id="" class="wrapper img">';
            $output .= '<img src="/../Images/missing.png" alt="logo">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<div id="" class="wrapper code">';
            $output .= '<a href="/shop" class="button add">Back To Shopping</a>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '  </div>';
        }

        echo $this->contentIdWrap($output);
        }
    }

    public function thankyou(){

      ob_start();
      include(URL.'/Template/basefile.html');
      $template_html = ob_get_contents();
      ob_end_clean();



      $var = '<h1>Thanks '.strtoupper($_POST['firstname']).' for your business!</h1>';
      $var .= '<p>An receipt has been sent to '.$_POST['email'].'</p>';
      $var .= '<p>Please call if you have any issues!!</p>';

      $template_html = $this->contentFill($template_html, $var);
      echo $this->contentIdWrap($template_html);
    }
}
