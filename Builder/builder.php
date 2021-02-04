
<?php
class  Builder{
  private $indexController;
  private $indexModel;

  public function __construct($indexController, $indexModel){
    $this->indexController = $indexController;
    $this->indexModel = $indexModel;
  }


  function buildHead(){
    $output = '<!DOCTYPE html>';
    $output .= '<html>';
    $output .= '<head>';
    $output .= '<link rel="stylesheet/less" type="text/css" href="../Css/styles.less"/>';
    $output .= '<script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>';
    $output .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
    $output .= '</head>';
    return $output;
  }

  function buildFoot(){
    $output = '<footer>';
    $output .= '</footer>';
    $output .= '</html>';
    return $output;
  }

}
