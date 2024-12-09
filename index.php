<?php
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

        // load controller
        require_once(ROOT . 'controllers/client/' . $controller . '.php');

        // Namespace for the controller
        $controllerClass = 'controllers\\client\\' . $controller;

        // controller instance
        $controllerInstance = new $controllerClass();

        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            // if the method does not exist, call getByColumn, use the first param is the name of the table
            // and name of the column is the slug if the table is marque or modele
            if (isset($params[1])) {
                $controllerInstance->getByColumn($params[0], "slug", $params[1]);
            }
        }
    }
} else {
    require_once(ROOT . 'controllers/client/Accueil.php');
    $controllerClass = 'controllers\\client\\Accueil';
    $controllerInstance = new $controllerClass();
    $controllerInstance->index();
}


