<?php

// * The shop page model
require_once __DIR__.'/model.php';

class LogoutModel extends Model{
  private $pageID = 'Logout';
  private $pageTemplate ='Logout';

  function __construct(){
    parent::__construct();
  }

}
