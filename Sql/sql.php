
<?php

if ( !isset($_SESSION['userArray'])) {
  $_SESSION['userArray'] = array();

  array_push(
            $_SESSION['userArray'],
            ['email' => 'admin@gmail.com', 'password' => 'password'],
            ['email' => 'user@gmail.com', 'password' => 'password']
            );
}

if ( !isset($_SESSION['productArray'])) {
  $_SESSION['productArray'] = array();
  array_push($_SESSION['productArray'],
              ['name' => 'Cat Food', 'image'   => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
              ['name' => 'Cat sFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
              ['name' => 'Cat sFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
              ['name' => 'Cat aFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
              ['name' => 'Cat Food', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => ['Pet Food', 'Chile'] ],
            );
}

class  Sql{
  public function __construct(){
  }

  //add item to array
  public function insertItem($globalArray, $array){
    if(!is_array($array))return;
    $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
     array_push($_SESSION[$sessionArray], $array);
  }

  //delete whole item from array
  //based off unique vaule
  public function deleteItem($globalArray, $key){
    $inArray = false;
    $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
       foreach($_SESSION[$sessionArray] as $i=> $session){
         if(!is_array($session))continue;
         $index_key = array_search($key, $session);

         if ($index_key){
            $inArray = true;
            break;
          }

       }
       if($inArray){
         unset($_SESSION[$sessionArray][$i]);
         $_SESSION[$sessionArray] = array_values($_SESSION[$sessionArray]);
       }
    }

  //find Unique vaule in subArray and change is key to new vaule;
  //based off unique vaule
  public function updateItem( $globalArray, $uniqueVaule, $key, $newVaule){
    $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
       foreach($_SESSION[$sessionArray] as $i => $session){
         $index_key = array_search($uniqueVaule, $session);
         if ($index_key) break;
       }
      $_SESSION[$sessionArray][$i][$key] = $newVaule;
   }

  //Used for testing
  public function manualRemove($globalArray, $i){
      $sessionArray = ($globalArray == 'userArray' ? 'userArray' : 'productArray');
      unset($_SESSION[$i]);
      $_SESSION[$sessionArray] = array_values($_SESSION[$sessionArray]);
  }

  //return item array
  public function getItem($globalArray, $uniqueVaule){
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
        }
        return $output;
  }

}
