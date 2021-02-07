<?php

// * The about page model
require_once __DIR__.'/model.php';

class AboutModel extends Model{

  function __construct(){
    parent::__construct();
  }

  private $title = 'About';

  public function pageID(){
    return $this->pageID;
  }

}
