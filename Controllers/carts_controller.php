<?php

/**
* The about page controller
*/
require_once __DIR__.'/controller.php';

class CartsController extends Controller{

function __construct( $model ){
  parent::__construct($model);
}

public function current(){

  return $this->modelObj->message = "About us today changed by aboutController.";

  }

}
