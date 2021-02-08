<?php

// * The cart page model
require_once __DIR__.'/model.php';

class CartsModel extends Model{
  private $pageID = 'Cart';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
      return $this->pageID;
  }

}
