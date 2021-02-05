<?php

/**
* The about page controller
*/
require_once __DIR__.'/controller.php';

class AboutController extends Controller{
private $modelObj;

function __construct( $model ){
  $this->modelObj = $model;
  parent::__construct($this->modelObj);
}

public function current(){
  return $this->modelObj->message = "About us today changed by aboutController.";
  }

}
