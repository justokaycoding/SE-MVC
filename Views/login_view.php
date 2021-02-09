<?php
// The about page view
require_once("view.php");

class LoginView extends View{

  function __construct($controller, $model){
      parent::__construct($controller, $model);
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->contentIdWrap($this->content());
      $template_html .= $this->foot();
      return $template_html;
    }

    public function content(){
      // echo '------------';
      // echo $this->controller->getPageTemplate();
      // echo '------------';
      ob_start();
      include(URL.'/Template/login.html');
      $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

}
