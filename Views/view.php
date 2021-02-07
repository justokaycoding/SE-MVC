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
      $file_name = URL.'/Template/header.html';
      $file_content = str_replace("{title}",$this->controller->getPageID(), file_get_contents($file_name));

      return $file_content;
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function message() {
      echo "Am I a GOD? ";
    }

}
