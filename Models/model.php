<?php

// The home page model
class Model{

    private $message = 'Welcome to Home page.';
    // private $title = 'Home';

    function __construct(){

    }

    public function welcomeMessage(){
        return $this->message;
    }


}
