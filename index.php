<?php
// define a constant to store root directory
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require_once(ROOT.'app/MainModel.php');
require_once(ROOT.'app/MainController.php');

// We wrote the URL rule in the .htaccess file. For example:
// http://localhost/supercar/voiture will become
// http://localhost/supercar/index.php?p=voiture,
// We retrieve all characters after "supercar/" as a string and split it by "/".
$params = explode('/', $_GET['p']);
if($params[0] != ''){
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] : 'index';

    require_once(ROOT.'controllers/client/'.$controller.'.php');
    // Add the full namespace for controller
    $controllerClass = 'controllers\\client\\' . $controller;

    // Create the controller instance
    $controllerInstance = new $controllerClass();

    // Call the action method
    $controllerInstance->$action();
}else{
    require_once(ROOT.'controllers/client/Accueil.php');
    $controllerClass = 'controllers\\client\\Accueil';
    // Create the controller instance
    $controllerInstance = new $controllerClass();
    // Call the action method
    $controllerInstance->index();
}
