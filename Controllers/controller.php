<?php

// The home page controller
class Controller{
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

  public function getPageID(){
    return $this->model->pageID();
  }
}
