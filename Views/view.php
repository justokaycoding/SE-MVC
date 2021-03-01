<?php

//The home page view
class View{
  protected $model;
  protected $controller;
  protected $sql;
  protected $cart;

  function __construct($controller, $model){
    $this->controller = $controller;
    $this->model = $model;
    $this->sql = new Sql;
    $this->cart = new Cart;
  }

  public function index(){
    $content = $this->content();
    $template_html = $this->head();
    if(!empty($content)){
      $template_html .= $this->contentIdWrap($content);
    }
    return $template_html;
  }

  public function head(){
    $this->loginInfo();
    ob_start();
    include(URL.'/Template/header.html');
    $template_html = ob_get_contents();
    ob_end_clean();
    return $template_html;
  }

  public function foot(){
    ob_start();
    include(URL.'/Template/footer.html');
    $template_html = ob_get_contents();
    ob_end_clean();
    return $template_html;
  }

  public function content(){
    $template_html = '';
    if($this->sql->isAdmin()){
      ob_start();
       include(URL.'/Template/adminLoop.html');
       $template_html = ob_get_contents();
      ob_end_clean();
    }else{
      ob_start();
       include(URL.'/Template/home.html');
       $template_html = ob_get_contents();
      ob_end_clean();
    }
    return $template_html;
  }

  public function contentIdWrap($content){
    return '<div id="content_wrap">'.$content.'</div>';
  }

  public function deliverPageID(){
    return $this->controller->getPageID();
  }

  public function loginInfo(){
      echo '<pre style="display:dnone;">';
      var_dump($_POST);
      echo '</pre>';
      if(!empty($_POST) && !$this->sql->isAdmin()){
        $type = $_POST["formType"];
        switch ($type) {
          case "signUp":
            //add users
            $result = $this->sql->getItem('userArray',$_POST['sign_up_email']);
            if(empty($result)){

              $newUser = [
                          'email'     => $_POST['sign_up_email'],
                          'password' => $_POST['sign_up_password'],
                          'name'     => $_POST['sign_up_name'],
                          'type'     => 'client',
                          'phone'    => $_POST['sign_up_phone'],
                          'address'  => $_POST['sign_up_address'],
                          'city'     => $_POST['sign_up_city'],
                          'state'    => $_POST['sign_up_state'],
                          'zip'      => $_POST['sign_up_zip']
                        ];

              $this->sql->insertItem('userArray', $newUser);
              $this->sql->setUser($_POST);
            }
            break;
          case "signIn":
          $result = $this->sql->getItem('userArray', $_POST['sign_in_email']);
            if(!empty($result)){
              $this->sql->setUser($result);
            }
          break;
        }
      }
    }

  public function pageTitle(){
      $str = $_SERVER['REQUEST_URI'];
      $last_word_start = strrpos ( $str , "/") + 1;
      $last_word_end = strlen($str) - 1;
      $last_word = substr($str, $last_word_start, $last_word_end);
      if($last_word == ''){
        $last_word = 'Home';
      }
      return $last_word;
    }

  public function adminLoop(){
    $output = '';
    foreach($_SESSION['productArray'] as $product){
      $output .= '<article>';
      $output .= '<div class="img"><div style="background-image: url(../../Images/'.$product['image'].');"></div>';
      $output .= '<div class="content">';
      $output .= '<p class="productTitle">'.$product['name'].'</p>';
      $output .= '<span class="button edit">Edit</span>';
      $output .= '<div class="productLightbox">';
      $output .= $this->singleFormGen($product);
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</article>';
    }
      return $output;
  }

  function is_true($val, $return_null=false){
    $boolval = ( is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool) $val );
    return ( $boolval===null && !$return_null ? false : $boolval );
  }

  public function singleFormGen($product){

    $checked = $this->is_true($product['on_sale']) ? 'checked' : '';

    $output = '<form action="" method="post">';
    $output .= '<input type="hidden" name="productChange" value="productChange">';
    $output .= '<label for="productName">Product Name:</label>';
    $output .= '<input type="hidden" name="orginalProductName" value="'.$product['name'].'">';
    $output .= '<input type="text" id="productName" name="productName" value="'.$product['name'].'">';

    $output .= '<label for="productImage">Product Image:</label>';
    $output .= '<input type="text" id="productImage" name="productImage" value="'.$product['name'].'">';

    $output .= '<label for="productPrice">Price:</label>';
    $output .= '<input type="text" id="productPrice" name="productPrice" value="'.$product['price'].'">';

    $output .= '<label for="productSalePrice">Sale Price:</label>';
    $output .= '<input type="text" id="productSalePrice" name="productSalePrice" value="'.$product['sale_price'].'">';

    $output .= '<div class="formContainer">';
    $output .= '<label for="productOnSale">On Sale:</label>';
    $output .= '<input type="checkbox" id="productOnSale" name="productOnSale" '.$checked.'>';
    $output .= '</div>';

    $output .= '<label for="productCategory">Category:</label>';
    $output .= '<input type="text" id="productCategory" name="productCategory" value="'.$product['category'].'">';

    $output .= '<div class="formControl">';
    $output .= '<span class="close button">Cancel</span>';
    $output .= '<input class="button" type="submit" value="Submit">';
    $output .= '</div>';
    $output .= '</form>';
    return $output;
  }

}
