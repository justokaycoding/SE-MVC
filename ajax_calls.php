<?php
if(!isset($_SESSION)) {
  session_start();
}
if( !empty($_POST['title']) ){
  $title = $_POST['title'];
  array_push( $_SESSION['cart'], $title );
  var_dump($_SESSION['cart']);
}

?>
