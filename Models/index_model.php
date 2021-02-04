<?php

    /**
    * The home page model
    */
    class IndexModel
    {

        private $message = 'Welcome to Home page.';
        private $title = 'Home';

        function __construct(){

        }

        public function welcomeMessage(){
            return $this->message;
        }


    }
