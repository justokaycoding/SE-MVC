<?php

// * The shop page model
require_once __DIR__.'/model.php';

class AdminModel extends Model{

  function __construct(){
    parent::__construct();
    $this->pageID = 'Shop';
    $this->pageTemplate ='shop';
  }

  public function pageID(){
    return $this->pageID;
  }

}
