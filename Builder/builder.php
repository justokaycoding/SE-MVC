
<?php
class  Builder{
  private $view;

  public function __construct($view){
    $this->view = $view;
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
    $output = '';
    $output .= '</html>';
    return $output;
  }
  function buildBody(){
    $output = '<body>';
    $output .= $this->getContent();
    $output .= '</body>';
    return $output;
  }

  function getContent(){

  }

  function warpTag($content, $tag){
    $output = '<'.$tag.'>' . $content . '</'.$tag.'>';
    return $output;
  }

  function pageBuild(){
    $output = "";
    $output .= $this->buildHead();
    $output .= $this->buildBody();
    $output .= $this->buildFoot();
    return $output;
  }
}
