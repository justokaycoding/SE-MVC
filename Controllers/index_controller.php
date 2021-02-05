<?php

// The home page controller
require_once __DIR__.'/controller.php';

class IndexController extends Controller{
  private $model;

  function __construct($model){
    $this->model = $model;
  }

  public function sayWelcome(){
    return $this->model->welcomeMessage();
  }

  public function getPageTitle(){
    return $this->model->pageTitle();
  }

}
