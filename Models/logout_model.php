<?php

// * The shop page model
require_once __DIR__.'/model.php';

class LogoutModel extends Model{
  private $pageID = 'Thanks for Visiting';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
      return $this->pageID;
  }

}
