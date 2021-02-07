<?php

//The home page view
class View{
    private $model;
    private $controller;

    function __construct($controller, $model){
      $this->controller = $controller;
      $this->model = $model;
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->foot();
      return $template_html;
    }

    public function head(){
      ob_start();
      include(URL.'/Template/header.html');
      $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

    public function foot(){
      ob_start();
      include(URL.'/Template/footer.html');
      $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function message() {
      echo "Am I a GOD? ";
    }

}
