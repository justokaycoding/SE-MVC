<?php
// The about page view
require_once("view.php");

class LogoutView extends View{

  function __construct($controller, $model){
      parent::__construct($controller, $model);
      // $this->sql = new Sql;
      $this->sql->removeUser();
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->content();
      $template_html .= $this->foot();
      return $template_html;
    }

    public function content(){
      return'';
    }
}
