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
      return "Running Main Index File";
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

    public function content(){
      return 'Base Info';
    }

    public function contentIdWrap($content){
      return '<div id="content_wrap">'.$content.'</div>';
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }


}
