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
      ob_start();
       include(URL.'/Template/home.html');
       $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

    public function contentIdWrap($content){
      return '<div id="content_wrap">'.$content.'</div>';
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function loginInfo(){
      if(!empty($_POST)){
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
}
