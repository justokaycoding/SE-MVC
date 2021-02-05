<?php

// The home page model
class Model{

    private $message = 'Welcome to Home page.';
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
