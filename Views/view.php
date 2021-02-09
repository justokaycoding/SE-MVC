<?php

//The home page view
class View{
    private $model;
    private $controller;
    private $sql;

    function __construct($controller, $model){
      $this->controller = $controller;
      $this->model = $model;
      $this->sql = new Sql;
    }

    public function index(){
      $template_html = $this->head();
      $template_html .= $this->contentIdWrap($this->content());
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

    public function content(){
      ob_start();
      include(URL.'/Template/login.html');
      $template_html = ob_get_contents();
      ob_end_clean();
      return $template_html;
    }

    public function contentIdWrap($content){
      return '<div id="content_wrap">'.$content.'</div>';
    }

    public function deliverPageID(){
      return $this->controller->getPageID();
    }

    public function loginInfo(){

      if(isset($_POST)){
        echo '<pre style="display:nodne;">';
        var_dump($_POST);
        echo '</pre>';
      }
      
    }


}
