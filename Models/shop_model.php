<?php

// * The shop page model
require_once __DIR__.'/model.php';

class ShopModel extends Model{
  private $pageID = 'Shop';
  private $pageTemplate = 'shop';

  function __construct(){
    parent::__construct();
  }

  public function pageID(){
    return $this->pageID;
  }

}
