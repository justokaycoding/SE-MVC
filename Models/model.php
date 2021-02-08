<?php

// The home page model
class Model{

    private $pageID = 'Home';

    function __construct(){

    }

    public function welcomeMessage(){
        return $this->message;
    }

    public function pageID(){
        return $this->pageID;
    }


}
