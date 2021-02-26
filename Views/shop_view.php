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
      foreach($_SESSION['productArray'] as $product){
        if( is_array($product['category']) ){
          foreach($product['category'] as $cat){
            $catList .= ' '.$cat;
          }
        }
        else{
          $catList = $product['category'];
        }

        if($product["sale_price"] == 'false'){
          $catList = 'sale';
        }

        $output .= '<article class="'.$catList.'">';
        $output .= '<div class="img"><div style="background-image: url(../../Images/'.$product['image'].');"></div>';
        $output .= '<div class="content">';
        $output .= '<p class="productTitle">'.$product['name'].'</p>';
        if($product["on_sale"] == 'false'){
          $output .= '<p class="price">$'.$product["price"].'</p>';
        }
        else{
          $output .= '<p class="price">$'.$product["sale_price"].'</p>';
        }
        $output .= '<span class="button add">Add To Cart</span>';
        $output .= '<span class="button added">Added</span>';
        $output .= '</div>';
        $output .= '</article>';
      }
      return $output;
    }

    public function cartLoop(){
      $grandTotal = 0;
      $output = '';
      $output = '<table>';
      $output .= '<tr>';
      $output .= '<th>Image</th>';
      $output .= '<th>Product</th>';
      $output .= '<th>Price</th>';
      $output .= '<th>Quantity</th>';
      $output .= '<th>Amount</th>';
      $output .= '</tr>';

      $value = array_count_values($this->cart->returnCart());
      foreach($value as $vaule => $singleCart){
        $item = $this->sql->getItem('productArray',$vaule);
        $output .='<tr>';
        $output .='<td class="product_image"><img src="../../Images/'.$item['image'].'"></td>';
        $output .='<td class="product_name">'.$item['name'].'</td>';
        if($item['on_sale'] == 'false'){
          $price = $item['price'];
        } else{
          $price = $item['sale_price'];
        }
        $output .='<td class="product_price">'.$price.'</td>';
        $output .='<td class="product_quantity"><input type="number" id="product_price" min="1" name="product_price" value="'.$singleCart.'"></td>';

        $itemPrice = (float)$price * $singleCart;
        $grandTotal += $itemPrice;
        $output .= '<th class="product_grandCost">'.number_format((float)$itemPrice, 2).'</th>';
        $output .='</tr>';
      }
      $output .= '</table>';
      $output .= '<p class="grandCost">Grand Total: $'.number_format($grandTotal,2).'</p>';
      return $output;
    }

    public function cart(){
      if(!empty($_SESSION['cart'])){
        ob_start();
        include(URL.'/Template/cart.html');
        $template_html = ob_get_contents();
        ob_end_clean();
        echo $this->contentIdWrap($template_html);
      } else{
        ob_start();
        include(URL.'/Template/emptyCart.html');
        $template_html = ob_get_contents();
        ob_end_clean();
        echo $this->contentIdWrap($template_html);
      }
    }

    public function checkOut(){
      // echo 'est';
    }

}
