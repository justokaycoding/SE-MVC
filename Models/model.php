<?php

// The home page model
class Model{

    protected $pageID = 'Home';
    protected $pageTemplate ='home';

    function __construct(){
    }

    public function pageID(){
      return $this->pageID;
    }

    public function pageTemplate(){
      return $this->pageTemplate;
    }

}
