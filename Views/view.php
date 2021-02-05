<?php

//The home page view
class View{
    private $model;
    private $controller;

    function __construct($controller, $model){
      $this->controller = $controller;
      $this->model = $model;
    }

    public function index(){
      return $this->controller->sayWelcome();
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function message() {
      echo "Am I a GOD? ";
    }

}
