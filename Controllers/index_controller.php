<?php

// The home page controller
class IndexController{
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
