<?php
if(!isset($_SESSION)) {
  session_start();
}

if( !empty($_POST['title']) ){
  //add button on the shop page
  $title = $_POST['title'];

  $data = getItem('productArray', $title);
  if( number_format( ($data['quantity'] )) > 0){
    array_push( $_SESSION['cart'], $title );
    updateItem( 'productArray', $data['name'] , 'quantity', number_format( ($data['quantity'] -  1)));
    echo 'true';
  } else if(number_format( ($data['quantity'] )) == 0){
    echo 'false';
  }

  return;
}

if( !empty($_POST['product_add']) ){
  $product_add = $_POST['product_add'];
  $product_num = $_POST['num'];

  $data = getItem('productArray', $product_add);

  if( $data['quantity'] > 0){
    updateItem( 'productArray', $data['name'] , 'quantity', ($data['quantity']  - 1) );
    array_push( $_SESSION['cart'], $product_add );
    echo 'true';
  }
  return;
}

if( !empty($_POST['product_remove']) ){
  //minus sign on the cart page
  $product_remove = $_POST['product_remove'];
  $product_num = $_POST['num'];

  $data = getItem('productArray', $product_remove);
  updateItem( 'productArray', $data['name'] , 'quantity', number_format( (  $data['quantity']  +  1)));

  $key = array_search($product_remove, $_SESSION['cart']);
     if ($key !== FALSE) {
         unset($_SESSION['cart'][$key]);
     }
  return;
}

if( !empty($_POST['product_total_remove']) ){
  //x sign on the cart page
  $product_total_remove = $_POST['product_total_remove'];
  $product_num = $_POST['num'];

  $data = getItem('productArray', $product_total_remove);
  updateItem( 'productArray', $data['name'] , 'quantity', number_format( (  $data['quantity']  +  $product_num)));


  $i = 0;
  foreach($_SESSION['cart'] as $key => $item){
    if($item == $product_total_remove){
      unset($_SESSION['cart'][$key]);
    }
    $i++;
  }
  return;
}

function getItem($globalArray, $uniqueVaule){
      $inArray = false;
      $output = 'Not In Array';
      $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
      foreach($_SESSION[$sessionArray] as $i => $session){
        $index_key = array_search($uniqueVaule, $session);
        if($index_key){
          $inArray = true;
          break;
        }
      }
      if($inArray){
        $output = $_SESSION[$sessionArray][$i];
      } else{
        $output = "";
      }
      return $output;
}

function updateItem( $globalArray, $uniqueVaule, $key, $newVaule){
  $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
     foreach($_SESSION[$sessionArray] as $i => $session){
       $index_key = array_search($uniqueVaule, $session);
       if ($index_key) break;
     }
    $_SESSION[$sessionArray][$i][$key] = $newVaule;
 }

?>
