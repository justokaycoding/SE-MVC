<?php

/**
* The about page controller
*/
require_once __DIR__.'/controller.php';

class AdminController extends Controller{

function __construct( $model ){
  parent::__construct($model);
  $this->model = $model;
}

}
