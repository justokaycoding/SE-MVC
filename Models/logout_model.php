<?php

// * The shop page model
require_once __DIR__.'/model.php';

class LogoutModel extends Model{

  function __construct(){
    parent::__construct();
    $this->pageID = 'Logout';
    $this->$pageTemplate ='Logout';
  }

  public function pageID(){
    return $this->pageID;
  }

}
