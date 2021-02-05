
<?php
class  Sql{
  private $userArray = array();

  public function __construct(){

    $this->init_build();
  }

  public function insertItem(){

  }

  public function deleteItem(){

  }

  public function updateItem(){

  }

  public function getItem(){

  }

  public function init_build(){
    array_push($this->userArray,
                ['email' => 'admin@gmail.com', 'password' => 'password'],
                ['email' => 'user@gmail.com', 'password' => 'password'],
              );

              echo '<pre style="display:nodne;">';
              var_dump($this->userArray);
              echo '</pre>';
  }



}
