<?php

// * The login page model
require_once __DIR__.'/model.php';

class LoginModel extends Model{
  private $pageID = 'Login';
  private $pageTemplate ='login';

  function __construct(){
    parent::__construct();
  }

}
