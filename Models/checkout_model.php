<?php

// * The about page model
require_once __DIR__.'/model.php';

class CheckoutModel extends Model{
  private $pageID = 'Checkout';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
      return $this->pageID;
  }

}
