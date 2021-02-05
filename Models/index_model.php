<?php
  require_once __DIR__.'/model.php';

    /*The home page model*/
    class IndexModel extends Model{

        private $title = 'Home';

        function __construct(){

        }

        public function pageID(){
            return $this->pageID;
        }


    }
