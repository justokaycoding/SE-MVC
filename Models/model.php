<?php

// The home page model
class Model{

    private $pageID = 'Home';
    private $pageTemplate ='home';

    function __construct(){
    }

    public function pageID(){
      return $this->pageID;
    }

    public function pageTemplate(){
      return $this->pageTemplate;
    }

}
