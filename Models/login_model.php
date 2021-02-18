<?php

// * The login page model
require_once __DIR__.'/model.php';

class LoginModel extends Model{

  function __construct(){
    parent::__construct();
    $this->pageID = 'Login';
    $this->pageTemplate ='login';
  }

  public function pageID(){
    return $this->pageID;
  }

}
