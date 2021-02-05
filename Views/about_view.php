<?php
// The about page view
require_once("view.php");

class AboutView extends View{
    private $modelObj;
    private $controller;

    function __construct(){
      $this->controller = $controller;
      $this->model = $model;

      parent::__construct($this->controller, $this->model);
    }

    public function index(){
      return 'te';
    }

    public function today(){
      return $this->controller->current();
    }

    public function message() {
      echo "Am I a fruit or a berry? ";
    }

}
