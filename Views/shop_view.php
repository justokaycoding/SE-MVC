<?php
// The about page view
require_once("view.php");
class ShopView extends View{

  function __construct($controller, $model){
      parent::__construct($controller, $model);
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->contentIdWrap($this->content());
      $template_html .= $this->foot();
      return $template_html;
    }

    public function content(){
      $template_html = '';
      switch ($_SERVER['REQUEST_URI']) {
        case '/shop':
          ob_start();
          include(URL.'/Template/shop.html');
          $template_html = ob_get_contents();
          ob_end_clean();
          break;
        case '/shop/cart':
          // code...
          break;
        case '/shop/checkout':
          // code...
          break;

        default:
          // code...
          break;
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
        $output .= '<div class="img"><img src="../../Images/'.$product['image'].'"></div>';
        $output .= '<div class="content">';
        $output .= '<p class="productTitle">'.$product['name'].'</p>';
        if($product["on_sale"] == 'false'){
          $output .= '<p class="price">$'.$product["price"].'</p>';
        }
        else{
          $output .= '<p class="price">$'.$product["sale_price"].'</p>';
        }
        $output .= '<a class="button" href="#">Add To Cart</a>';
        $output .= '</div>';
        $output .= '</article>';
      }
      return $output;
    }

    public function cart(){
      echo '<p>d</p>';
    }

    public function checkOut(){
      echo 'est';
    }

}
