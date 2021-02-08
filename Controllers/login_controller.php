<?php

/**
* The about page controller
*/
require_once __DIR__.'/controller.php';

class LoginController extends Controller{

function __construct( $model ){
    parent::__construct($model);
  }

  public function getPageTemplate(){
    return $this->model->pageTemplate();
  }

}
