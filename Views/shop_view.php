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
      $output .= '<th></th>';
      $output .= '<th>Product</th>';
      $output .= '<th>Price</th>';
      $output .= '<th>Quantity</th>';
      $output .= '<th>Amount</th>';
      $output .= '</tr>';

      $value = array_count_values($this->cart->returnCart());
      foreach($value as $vaule => $singleCart){
        $item = $this->sql->getItem('productArray',$vaule);
        $output .='<tr>';
        $output .='<td class="product_image"><i class="fas fa-times"></i><img src="../../Images/'.$item['image'].'"></td>';
        $output .='<td class="product_name">'.$item['name'].'</td>';
        if($item['on_sale'] == 'false'){
          $price = $item['price'];
        } else{
          $price = $item['sale_price'];
        }
        $output .='<td class="product_price">$'.$price.'</td>';
        $output .='<td class="product_quantity"><div class="amount"><i class="fas fa-minus"></i><span class="total">'.$singleCart.'</span><i class="fas fa-plus"></i></td>';

        $itemPrice = (float)$price * $singleCart;
        $grandTotal += $itemPrice;
        $output .= '<td class="product_grandCost">$'.number_format((float)$itemPrice, 2).'</td>';
        $output .='</tr>';
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
      $output .='<td class="GrandCost">Tax:</td>';
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
