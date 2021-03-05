<?php
require_once __DIR__.'/Sql/sql.php';
$sql = new Sql();

if(!isset($_SESSION)) {
  session_start();
}

if( !empty($_POST['title']) ){
  $title = $_POST['title'];
  array_push( $_SESSION['cart'], $title );
  var_dump($_SESSION['cart']);
  return;
}

if( !empty($_POST['product_add']) ){
  $product_add = $_POST['product_add'];
  array_push( $_SESSION['cart'], $product_add );
  return;
}

if( !empty($_POST['product_remove']) ){
  $product_remove = $_POST['product_remove'];

  $key = array_search($product_remove, $_SESSION['cart']);
     if ($key !== FALSE) {
         unset($_SESSION['cart'][$key]);
     }
  return;
}

if( !empty($_POST['product_total_remove']) ){
  $product_total_remove = $_POST['product_total_remove'];
  $i = 0;
  foreach($_SESSION['cart'] as $key => $item){
    if($item == $product_total_remove){
      unset($_SESSION['cart'][$key]);
    }
    $i++;
  }
  return;
}

if( !empty($_POST['admin_product_remove']) ){
  $admin_product_remove = $_POST['admin_product_remove'];
  $sql->deleteItem('productArray', $admin_product_remove);
  return;
}





?>
