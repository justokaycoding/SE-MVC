<?php
// The about page view
require_once("view.php");

class AboutView extends View{
    // private $modelObj;
    // private $controller;

  function __construct($controller, $model){
      // $this->controller = $controller;
      // $this->modelObj = $modelObj;

      parent::__construct($controller, $model);
    }

    // public function index(){
    //   return 'te';
    // }

    public function today(){
      return $this->controller->current();
    }

    // public function message() {
    //   echo "Am I a fruit or a berry? ";
    // }

}
