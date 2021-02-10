<?php

// The home page controller
class Controller{
  private $model;

  function __construct($model){
    $this->model = $model;
  }

  public function getPageID(){
    return $this->model->pageID();
  }

  public function getPageTemplate(){
    return $this->model->pageTemplate();
  }

}
