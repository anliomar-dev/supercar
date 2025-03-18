<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Define a constant to store the root directory
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));


require_once(ROOT . 'app/MainModel.php');
require_once(ROOT . 'app/MainController.php');

if (!empty($_GET['p'])) {
    $params = explode('/', $_GET['p']);
    // if there is no param
    if ($params[0] != '') {
        $controller = ucfirst($params[0]);
        $action = $params[1] ?? 'index';
        $arguments = array_slice($params, 2);

        // Namespace for the controller
        if($controller == 'Authentication'){
            $controllerClass = 'app\\' . $controller;
        }else{
            $controllerClass = 'controllers\\' . $controller.'Controller';
        }
        // check if the contollerr exist
        if(class_exists($controllerClass)) {
            // load controller
            if($controller == 'Authentication'){
                require_once(ROOT . 'app/' . $controller. '.php');
            }else{
                require_once(ROOT . 'controllers/' . $controller.'Controller' . '.php');
            }
            // create a controller instance
            $controllerInstance = new $controllerClass();
            // if the contoller is authentication, a method is required, else return to 404
            if($controller == 'Authentication' && !method_exists($controllerInstance, $action)){
                echo "404";
                exit();
            }

            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                // if the method does not exist we call getByColumn method
                // to get a specific row by id if $params[1] is int else by slug
                if (filter_var($params[1], FILTER_VALIDATE_INT)) {
                    $id = intval($params[1]);
                    $controllerInstance->getByColumn(["id_$params[0]" => $id]);
                }
                // $params[1] is not int: call get by slug
                else {
                    $controllerInstance->getByColumn(["slug" => $params[1]]);
                }
            }
            require_once ROOT . 'components/footer.php';
        }else{
            echo "404";
        }
    }
} else {
    require_once(ROOT . 'controllers/AccueilController.php');
    $controllerClass = 'controllers\\AccueilController';
    $controllerInstance = new $controllerClass();
    $controllerInstance->index();
    require_once ROOT . 'components/footer.php';
}


