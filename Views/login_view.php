<?php
// The about page view
require_once("view.php");

class LoginView extends View{

  function __construct($controller, $model){
      parent::__construct($controller, $model);
      $this->controller = $controller;
      $this->model = $model;
    }

    public function content(){
      ob_start();
      include(URL.'/Template/login.html');
      $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

}
