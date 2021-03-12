
<?php

if ( !isset($_SESSION['userArray'])) {
  $_SESSION['userArray'] = array();

  array_push(
            $_SESSION['userArray'],
            ['email' => 'admin@gmail.com',
              'password' => 'password',
              'name' => 'john',
              'type' => 'admin',
              'phone' => '555-555-5555',
              'address' => '555 south street',
              'city' => 'GreenVille',
              'state' => "Ohio",
              'zip' => '64058'],

            ['email' => 'user@gmail.com',
             'password' => 'password',
             'name' => 'James',
             'type' => 'client',
             'phone' => '555-555-5555',
             'address' => '555 south street',
             'city' => 'GreenVille',
             'state' => "Ohio",
             'zip' => '64058']
            );
}

if ( !isset($_SESSION['productArray'])) {
  $_SESSION['productArray'] = array();
  array_push($_SESSION['productArray'],
              ['name' => 'Meow Mix Original Choice Dry Cat Food',
              'image'   => 'meowmixoriginalchoicedrycatfood.jpg',
              'price' => '15.98',
              'quantity' => '12',
              'sale_price' => '14.20',
              'on_sale' => 'false',
              'nutrition_facts' => '',
              'description' => '',
              'ingredients' => '',
              'category' => 'cat Food'
            ],

              ['name' => 'McCormick Sloppy Joes Seasoning Mix',
               'image' => 'mccormicksloppyjoesseasoningmix131oz.jpg',
               'price' => '1.19',
               'quantity' => '15',
               'sale_price' => '0.50',
               'on_sale' => 'true',
               'nutrition_facts' => '',
               'description' => '',
               'ingredients' => '',
               'category' => 'seasoning'
             ],

              ['name' => 'Til the Cows Come Home Dough Mo Arigato',
                'image' => '0075450222460_CF_default_default_large.jpeg',
                'price' => '17.19',
                'quantity' => '16',
                'sale_price' => '5.50',
                'on_sale' => 'true',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'Ice Cream'
              ],

              ['name' => 'Gala Apples',
                'image' => '0000000041330_CL_hyvee_default_large.jpeg',
                'price' => '0.50',
                'quantity' => '100',
                'sale_price' => '0.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'fruit'
              ],
              ['name' => 'Light And Fit Strawberry Cheesecake Greek Yogurt 4Pk Cups',
                'image' => '0036632028480_CF_default_default_large.jpeg',
                'price' => '2.50',
                'quantity' => '87',
                'sale_price' => '1.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'Yogurt'
              ],
              ['name' => 'JennieO Turkey Bacon',
                'image' => '0042222870000_CF_default_default_large.jpeg',
                'price' => '3.99',
                'quantity' => '38',
                'sale_price' => '2.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'bacon'
              ],
              ['name' => 'Bacon Cheddar Twice Baked Potato',
                'image' => '0237505000000_CF_hyvee2_default_large.png',
                'price' => '1.50',
                'quantity' => '46',
                'sale_price' => '1.15',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'otato'
              ],
              ['name' => 'Charmin Ultra Strong Toilet Paper Mega Roll',
                'image' => '0037000568040_CL_default_default_large.jpeg',
                'price' => '13.99',
                'quantity' => '46',
                'sale_price' => '12.00',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'toilet paper'
              ],
              ['name' => 'Safeguard Alcohol Hand Sanitizer',
                'image' => '0037000744390_CL_default_default_large.jpeg',
                'price' => '1.69',
                'quantity' => '46',
                'sale_price' => '0.50',
                'on_sale' => 'true',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'clean'
              ],
              ['name' => '5oz Alaska Snow Crab Clusters',
                'image' => '0238913000000_CL_hyvee_default_large.jpeg',
                'price' => '0.50',
                'quantity' => '5',
                'sale_price' => '0.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '',
                'ingredients' => '',
                'category' => 'crab legs'
              ],
            );
}

if ( !isset($_SESSION['user'])) {
  $_SESSION['user'] = array();
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
        } else{
          $output = "";
        }
        return $output;
  }

  public function setUser($name){
    $_SESSION['user'] = $name;
  }

  public function getUser(){
    return $_SESSION['user'];
  }

  public function getUserName(){
    return $_SESSION['user']['name'] ?? null;
  }

  public function removeUser(){
    $_SESSION['user'] = [];
  }

  public function isAdmin(){
    if (in_array("admin", $this->getUser())){
      return True;
    }
    else{
      return False;
    }
  }
}
