<?php

// * The about page model
require_once __DIR__.'/model.php';

class ShopModel extends Model{
  private $pageID = 'Shop';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
      return $this->pageID;
  }

}
