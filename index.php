<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Define a constant to store the root directory
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require_once __DIR__ . '/vendor/autoload.php';


require_once(ROOT . 'app/MainModel.php');
require_once(ROOT . 'app/MainController.php');

    if (!empty($_GET['p'])) {
        $params = explode('/', $_GET['p']);

        if ($params[0] != '') {
            if ($params[0] == "admin") {
                $controller = ucfirst($params[1]) ?? "Dashboard";
                if(empty($controller)){
                    $controller = "Dashboard";
                }
                $action = $params[2] ?? 'index';
                $arguments = array_slice($params, 3);
                $controllerClass = 'admin\\' . $controller;
                $controllerPath = ROOT . 'admin/' . $controller . '.php';
            } else {
                $controller = ucfirst($params[0]);
                $action = $params[1] ?? 'index';
                $arguments = array_slice($params, 2);
                if ($controller == 'Authentication') {
                    $controllerClass = 'app\\' . $controller;
                    $controllerPath = ROOT . 'app/' . $controller . '.php';
                } else {
                    $controllerClass = 'controllers\\' . $controller . 'Controller';
                    $controllerPath = ROOT . 'controllers/' . $controller . 'Controller.php';
                }
            }

            // check if the file exist before include it
            if (file_exists($controllerPath)) {
                require_once($controllerPath);

                // check if the class exist before create the instance
                if (class_exists($controllerClass)) {
                    $controllerInstance = new $controllerClass();

                    if (($controller == 'Authentication') && !method_exists($controllerInstance, $action)) {
                        echo "404";
                        exit();
                    }

                    if (method_exists($controllerInstance, $action)) {
                        $controllerInstance->$action();
                    } else {
                        if($params[0] == "admin"){
                            if(!empty($params[2])){
                                if (isset($params[2]) && filter_var($params[2], FILTER_VALIDATE_INT)) {
                                    $id = intval($params[2]);
                                    $controllerInstance->getByColumn(["id_$params[1]" => $id]);
                                } else {
                                    $controllerInstance->getByColumn(["slug" => $params[2]]);
                                }
                            }else{
                                $controllerInstance->index();
                            }
                        }else{
                            if(!empty($params[1])){
                                if (isset($params[1]) && filter_var($params[1], FILTER_VALIDATE_INT)) {
                                    $id = intval($params[1]);
                                    $controllerInstance->getByColumn(["id_$params[0]" => $id]);
                                } else {
                                    $controllerInstance->getByColumn(["slug" => $params[1]]);
                                }
                            }else{
                                $controllerInstance->index();
                            }
                        }
                    }

                    if (!str_starts_with($controller, "Api") && $params[0] !== "admin") {
                        require_once ROOT . 'components/footer.php';
                    }

                } else {
                    echo "404 Not Found (class does not exist)";
                }

            } else {
                echo "404 Not Found (file does not exist)";
            }
        }
    } else {
        require_once(ROOT . 'controllers/AccueilController.php');
        $controllerClass = 'controllers\\AccueilController';
        $controllerInstance = new $controllerClass();
        $controllerInstance->index();
        require_once ROOT . 'components/footer.php';
    }


