<?php

// * The about page model
require_once __DIR__.'/model.php';

class LoginModel extends Model{
  private $pageID = 'Login';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
      return $this->pageID;
  }

}
