<?php

// * The about page model
require_once __DIR__.'/model.php';

class AboutModel extends Model{

  private $message;

  public function __construct(){
    $this->message = "Welcome to the of PHP MVC framework official site.";
  }

  public function nowADays(){
    return $this->message = "nowadays everybody wants to be a boss.";
  }
}
