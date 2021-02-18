<?php
// The about page view
require_once("view.php");

class LogoutView extends View{

  function __construct($controller, $model){
      parent::__construct($controller, $model);
      $this->controller = $controller;
      $this->model = $model;
      $this->sql->removeUser();
    }

    public function content(){
      return'';
    }
}
