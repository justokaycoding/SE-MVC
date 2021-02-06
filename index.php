<?php
  //Global vars
  $userArray = array();
  $productArray = array();
  $output = '';

  //Instance Of Database
  require_once __DIR__.'/Sql/sql.php';
  $sql = New Sql();

  //Creates Error Log
  require_once __DIR__.'/error.php';

  //Defining Url
  $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

    if ($url == '/'){

        // This is the home page
        // Initiate the home controller
        // and render the home view

        require_once __DIR__.'/Models/model.php';
        require_once __DIR__.'/Controllers/controller.php';
        require_once __DIR__.'/Views/view.php';
        require_once __DIR__.'/Builder/builder.php';
        // require_once __DIR__.'/Models/'.$requestedController.'_model.php';
        // require_once __DIR__.'/Controllers/'.$requestedController.'_controller.php';
        // require_once __DIR__.'/Views/'.$requestedController.'_view.php';

        $model = New Model();
        $controller = New Controller($model);
        $view = New View($controller, $model);
        $builder = New Builder($view);

        echo $builder->pageBuild();


        // echo $view->index();
        // echo $output;

    }

    else{

        // This is not home page
        // Initiate the appropriate controller
        // and render the required view
        //The first element should be a controller
        $requestedController = $url[0];

        // If a second part is added in the URI,
        // it should be a method
        $requestedAction = isset($url[1])? $url[1] :'';

        // The remain parts are considered as
        // arguments of the method
        $requestedParams = array_slice($url, 2);

        // Check if controller exists. NB:
        // You have to do that for the model and the view too
        $ctrlPath = __DIR__.'/Controllers/'.$requestedController.'_controller.php';

        if (file_exists($ctrlPath)){
            require_once __DIR__.'/Models/'.$requestedController.'_model.php';
            require_once __DIR__.'/Controllers/'.$requestedController.'_controller.php';
            require_once __DIR__.'/Views/'.$requestedController.'_view.php';

            $modelName      = ucfirst($requestedController).'Model';
            $controllerName = ucfirst($requestedController).'Controller';
            $viewName       = ucfirst($requestedController).'View';

            $controllerObj  = new $controllerName( new $modelName );
            $viewObj        = new $viewName( $controllerObj, new $modelName );

            echo $viewObj->message();

            // $view->index();
            // If there is a method - Second parameter
            if ($requestedAction != ''){
                // then we call the method via the view
                // dynamic call of the view
                $output = $viewObj->$requestedAction($requestedParams);
            }

        }
        else{
            header('HTTP/1.1 404 Not Found');
            die('404 - The file - '.$ctrlPath.' - not found');
        }
    }
