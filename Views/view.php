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
      //$file_name = 'http://localhost:8000/Template/header.html';
      $file_content = file_get_contents($file_name);
      return $this->controller->getPageID();
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function message() {
      echo "Am I a GOD? ";
    }

}
