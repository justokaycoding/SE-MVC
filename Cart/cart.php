<?php
if ( !isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

class Cart{

  public function __construct(){
  }

  public function addToCart($array){
    if(!is_array($array))return;
    array_push($_SESSION['cart'], $array);
  }

  public function removeFromCart($key){
    $inArray = false;
       foreach($_SESSION['cart'] as $i=> $session){
         if(!is_array($session))continue;
         $index_key = array_search($key, $session);

         if ($index_key){
            $inArray = true;
            break;
          }

       }
       if($inArray){
         unset($_SESSION['cart'][$i]);
         $_SESSION['cart'] = array_values($_SESSION['cart']);
       }
  }

  public function returnCart(){
    return $_SESSION['cart'];
  }

  public function getCartSize(){
    return sizeof($_SESSION['cart']);
  }

}


?>
