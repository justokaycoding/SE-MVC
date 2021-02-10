<?php
// The about page view
require_once("view.php");

class LogoutView extends View{
  private $sql;

  function __construct($controller, $model){
      parent::__construct($controller, $model);
      $this->sql = new Sql;
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->content();
      $template_html .= $this->foot();
      return $template_html;
    }

    public function content(){
      $_SESSION['user'] = '';
    }

}
