
<?php
class  Sql{

  public function __construct(){
    $this->init_build();
  }

  public function insertItem($globalArray, $array){
    global $userArray;
    global $productArray;

    if($globalArray == 'userArray'){
      array_push($userArray, $array);
    }
    else if($globalArray == 'productArray'){
      array_push($productArray, $array);
    }
  }

  public function deleteItem($key, $array){
    global $userArray;
    global $productArray;

    if($array == 'userArray'){
      foreach($userArray as $i=> $user){
        $index_key = array_search($key, $user);
        if ($index_key) break;
      }
      unset($userArray[$i]);
    }

    else if($array == 'productArray'){
      foreach($productArray as $i=> $product){
        $index_key = array_search($key, $product);
        if ($index_key) break;
      }
      unset($productArray[$i]);
    }

  }

  public function updateItem( $arrayKey, $old_vaule, $new_vaule, $globalArray){
    global $userArray;
    global $productArray;

    if($globalArray == 'userArray'){
      foreach($userArray as $i => $user){
        if( $user[$arrayKey] == $old_vaule ){
          $user[$arrayKey] = $new_vaule;
        }
        break 1;
      }
    }

    else if($globalArray == 'productArray'){
      foreach($productArray as $i => $product){
        if( $product[$arrayKey] == $old_vaule ){
          $product[$arrayKey] = $new_vaule;
        }
        break 1;
      }
    }
  }

  // public function getItem(){
  //
  // }

  public function init_build(){
    //fills the base arrays on init
    global $userArray;
    global $productArray;

    array_push($userArray,
                ['email' => 'admin@gmail.com', 'password' => 'password'],
                ['email' => 'user@gmail.com', 'password' => 'password']
              );
    array_push($productArray,
                ['name' => 'Cat Food', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
                ['name' => 'Cat sFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
                ['name' => 'Cat sFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
                ['name' => 'Cat aFoods', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => 'Pet Food'],
                ['name' => 'Cat Food', 'image' => 'catfood.jpg', 'price' => '5.20', 'sale_price' => '4.20', 'on_sale' => 'false', 'category' => ['Pet Food', 'Chile'] ],
              );
  }

}
