
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
              'description' => 'Irresistible taste cats love! Essential nutrients and minerals your cat needs every day. High quality protein to support a lean, energetic body. Antioxidants to support a long, healthy life. Guaranteed analysis: Crude protein - min - 31.0%. Crude fat - min - 11.0%. Crude fiber - max - 4.0%. Moisture - max - 12.0%. Calcium - min - 1.0%. Phosphorus - min - 0.8%. Selenium - min - 0.125 mg/kg. Vitamin E - min - 50 IU/kg. Nutritional statement: Meow Mix original choice chicken, turkey, salmon & ocean fish flavors cat food is formulated to meet the nutritional levels established by the AAFCO cat food nutrient profiles for all life stages. All rights reserved. Questions or comments: Visit our website at www.meowmix.com or call 1-877-MEOW-MIX (1-877-636-9649) weekdays, with the information contained in the "guaranteed fresh if used by" date box. www.meowmix.com. Del Monte Foods.',
              'ingredients' => 'Whole Ground Corn, Soybean Meal, Chicken By-Product Meal, Corn Gluten Meal, Beef Tallow (Preserved with Mixed Tocopherols), Animal Digest, Turkey By-Product Meal, Salmon Meal, Ocean Fish Meal, Phosphoric Acid, Calcium Carbonate, L-Lysine Monohydrochloride, Choline Chloride, Salt, Titanium Dioxide (Color), Vitamins (Vitamin E Supplement, Niacin, Vitamin A Supplement, Thiamine Mononitrate, Riboflavin Supplement, D-Calcium Pantothenate, Pyridoxine Hydrochloride, Vitamin B12 Supplement, Menadione Sodium Bisulfite Complex (Source of Vitamin K Activity), Vitamin D3 Supplement, Folic Acid, Biotin), Minerals (Ferrous Sulfate, Zinc Oxide, Manganous Oxide, Copper Sulfate, Calcium Iodate, Sodium Selenite), Taurine, DL-Methionine, Yellow 6, Yellow 5, Lactic Acid, Red 40, Potassium Chloride, Blue 2, Rosemary Extract.',
              'category' => 'cat Food'
            ],

              ['name' => 'McCormick Sloppy Joes Seasoning Mix',
               'image' => 'mccormicksloppyjoesseasoningmix131oz.jpg',
               'price' => '1.19',
               'quantity' => '15',
               'sale_price' => '0.50',
               'on_sale' => 'true',
               'nutrition_facts' => '',
               'description' => 'Home Style is Where the Heart is McCormick Home Style Classic Recipe Mixes give an authentic, flavorful boost to all of your favorite meals using hearty all natural ingredients. Whether it’s rich, creamy sauce or a flavorful, hearty stew, our Home Style Classic Recipe Mixes are a simple way to spice up your favorite meals. And with no artificial flavor or MSG, you can serve your family dinner knowing they’re getting savory home style food that’s naturally deliciously. Real Food Made Easy McCormick Recipe Mixes provide your family with real food made easy. With McCormick Recipe Mixes, each flavorful meal is made with natural herbs and spices that don\'t contain any MSG or artificial flavors or colors. Our expertly blended spice mixes, including Beef Stew, Sloppy Joes and Meat Loaf seasoning remove the guesswork, so your meal is perfectly seasoned.',
               'ingredients' => 'Sugar, Onion, Salt, Corn Starch, Spices (Including Paprika, Chili Pepper), Garlic, Citric Acid & Red Bell Pepper.',
               'category' => 'seasoning'
             ],

              ['name' => 'Til the Cows Come Home Dough Mo Arigato',
                'image' => '0075450222460_CF_default_default_large.jpeg',
                'price' => '17.19',
                'quantity' => '16',
                'sale_price' => '5.50',
                'on_sale' => 'true',
                'nutrition_facts' => '',
                'description' => 'Keep frozen',
                'ingredients' => 'Cream, Milk, Skim Milk, Cookie Dough Revel (Sugar, Corn Oil, High Fructose Corn Syrup, Brown Sugar, Water, Unbleached Wheat Flour, Nonfat Dry Milk, Butter [Cream, Salt], Salt, Caramel Color, Natural Flavors, Soy Lecithin), Chocolate Chip Cookie Dough Pieces (Wheat Flour, Brown Sugar, Interesterified Soybean Oil, or Soybean Oil and Hydrogenated Soybean Oil, Sugar, Chocolate Chips [Sugar, Chocolate Liquor, Cocoa Butter, Soy Lecithin, Vanilla Extract], Water, Corn Starch, Baking Soda, Natural Butter Flavor, Salt, Soy Lecithin, Natural and Artificial Flavor), Sugar, Cookie Dough Base (Brown Sugar, Water, Nonfat Dry Milk, Corn Syrup, Butter [Cream, Salt], Sugar, Molasses, Natural Flavor, Sodium Citrate, Salt), Chocolate Flavored Chips (Sugar, Coconut Oil, Cocoa Processed with Alkali, Cocoa Powder, Milkfat, Soy Lecithin, Vanilla Extract, Natural Flavors), Egg Yolks, Contains 1% or Less of: Carob Bean Gum, Guar Gum, Carrageenan. Contains egg, milk, soy, wheat.',
                'category' => 'Ice Cream'
              ],

              ['name' => 'Gala Apples',
                'image' => '0000000041330_CL_hyvee_default_large.jpeg',
                'price' => '0.50',
                'quantity' => '100',
                'sale_price' => '0.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => 'Sweet, Juicy, Crisp',
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
                'description' => 'Naturally & artificial flavored. 80 calories 12 g protein. Light & fit. 80 calories, o g fat; average flavored Greek yogurt: 125 calories, 2 g fat per 5.3 oz serving. Certified Gluten Free. gfco.org. At least 33% fever calories than average flavored Greek yogurt. Partially produced with genetic engineering. 4 cups. So, let’s all lighten up a bit, shall we? Nobody’s perfect & that’s fine by us. Because keeping things light lets. You do you. Delish. Grade A. www.lightnfit.com. how2recycle.info. Facebook. Instagram. Get in touch Call or text 1-877-326-6668 www.lightnfit.com. Danone Part of the Danone family.',
                'ingredients' => 'Cultured Grade A Non Fat Milk, Water, Strawberry Puree, Fructose, Contains Less Than 1% of Modified Corn Starch, Natural and Artificial Flavors, Black Carrot Juice (for Color), Sucralose, Citric Acid, Potassium Sorbate (to Maintain Freshness), Acesulfame Potassium, Sodium Citrate.',
                'category' => 'Yogurt'
              ],
              ['name' => 'JennieO Turkey Bacon',
                'image' => '0042222870000_CF_default_default_large.jpeg',
                'price' => '3.99',
                'quantity' => '38',
                'sale_price' => '2.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => 'Cured turkey chopped & formed. Natural smoke flavoring added. Resealable. Per Serving: 30 calories; 2.5 g fat; 130 mg sodium. Inspected for wholesomeness by US Department of Agriculture. Fully cooked. Contains no pork. No gluten. 60% less fat and sodium than USDA data for pork bacon (Before heating fat content has been reduced from 6 g to 2.5 g and sodium has been reduced from 340 mg to 130 mg per serving). 30 calories per serving. For questions or comments please call 1-800-621-3505. jennieo.com. Make the Switch: Jennie-O. We\'re on a mission to show the world how easy and delicious it is to eat well. To find out more, visit SwitchToTurkey.com.',
                'ingredients' => 'Mechanically Separated Turkey, Turkey, Water, Sugar, !"Contains 2% or Less" Salt, Potassium Lactate, Natural Smoke Flavor, Flavor (Canola Oil, Natural Smoke, Natural Flavoring), Sodium Diacetate, Sodium Phosphate, Rosemary Extract, Sodium Erythorbate, Sodium Nitrite.',
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
                'ingredients' => 'INGREDIENTS: POTATOES, POTATO SKINS (POTATO), SOUR CREAM (MILK, CREAM, NONFAT DRY MILK, FOOD STARCH-MODIFIED, SODIUM PHOSPHATE, GUAR GUM, CARRAGEENAN, SODIUM CITRATE, LOCUST BEAN GUM, CULTURE, NATAMYCIN [PRESERVATIVE]), CHEDDAR CHEESE (PASTEURIZED MILK, CHEESE CULTURE, SALT, ENZYMES, ANNATTO [COLOR], POTATO STARCH & POWDERED CELLULOSE [TO PREVENT CAKING], NATAMYCIN [PRESERVATIVE]), LIQUID SHORTENING (HIGH OLEIC CANOLA OIL, SOYBEAN OIL, HYDROGENATED SOYBEAN OIL, SALT, SOYBEAN LECITHIN, NATURAL AND ARTIFICIAL BUTTER FLAVOR, TBHQ, CITRIC ACID, BETA CAROTENE [COLOR], VITAMIN A PALMITATE), BACON (CURED WITH WATER, SALT, SUGAR, SMOKE FLAVORING, SODIUM PHOSPHATES, SODIUM ERYTHORBATE, SODIUM NITRITE), FOOD STARCH-MODIFIED, FRENCH ONION SEASONING (DEHYDRATED ONION, SALT, DEXTROSE, SUGAR, HYDROLYZED SOY AND CORN PROTEIN, NATURAL FLAVOR [TORULA YEAST], PARSLEY, GARLIC POWDER), SALT, WATER, SODIUM BENZOATE (PRESERVATIVE), TITANIUM DIOXIDE (COLOR). CONTAINS: MILK, SOY COOKING INSTRUCTIONS: Preheat oven to 350°F. Remove potatoes from package and place in baking dish. Bake 30-40 minutes or until internal temperature reaches 165°F. Remove potatoes; let stand 1 minute before serving. *Bake time is the same for 1 or 2 potatoes.',
                'category' => 'otato'
              ],
              ['name' => 'Charmin Ultra Strong Toilet Paper Mega Roll',
                'image' => '0037000568040_CL_default_default_large.jpeg',
                'price' => '13.99',
                'quantity' => '46',
                'sale_price' => '12.00',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => '4 - 6 roll packs. 63.2 sq m (688 sq ft). 9.9 cm x 10.1 cm (3.92 in x 4 in). 24 mega = 96 regular (based on number of sheets in Charmin regular roll). Cleans better (vs leading bargain brand). 1 mega = 4 regular rolls (based on number of sheets in Charmin regular roll). Unscented. Charmin is safe for your sewer or septic system. Septic safe. www.charmin.com. www.pg.com. how2recycle.info. Facebook. Twitter. Join the conversation with Charmin and don\'t forget to enjoy the go! Questions? 1-800-777-1410. www.charmin.com. FSC: Mix - Paper from responsible sources. www.fsc.org. Rainforest Alliance Certified. Made in the USA from domestic and imported materials.',
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
                'description' => 'Safeguard Alcohol Hand Sanitizer',
                'ingredients' => 'Ethyl Alcohol 69.9% v/v Active Ingredient: Ethyl Alcohol 69.9% v/vInactive ingredients: Water, Isopropyl Alcohol, Glycerin, Butylene Glycol, Fragrance, Carbomer, Aminomethyl Propanol, Isopropyl Myristate, Tocopheryl Acetate',
                'category' => 'clean'
              ],
              ['name' => '5oz Alaska Snow Crab Clusters',
                'image' => '0238913000000_CL_hyvee_default_large.jpeg',
                'price' => '0.50',
                'quantity' => '5',
                'sale_price' => '0.25',
                'on_sale' => 'false',
                'nutrition_facts' => '',
                'description' => 'Easy to steam or grill, Alaska Snow Crab Clusters need little more than a wedge of lemon and some melted butter for dipping.',
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
