<?php
// Define a constant to store the root directory
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require_once(ROOT . 'app/MainModel.php');
require_once(ROOT . 'app/MainController.php');

// Vérifier si le paramètre 'p' existe et n'est pas vide
if (!empty($_GET['p'])) {
    // On découpe le paramètre 'p' en utilisant '/' comme séparateur
    $params = explode('/', $_GET['p']);

    // Si la première valeur de params n'est pas vide
    if ($params[0] != '') {
        $controller = ucfirst($params[0]); // Première lettre du contrôleur en majuscule
        $action = $params[1] ?? 'index';  // Action par défaut 'index'

        // Charger le contrôleur
        require_once(ROOT . 'controllers/client/' . $controller . '.php');

        // Namespace complet pour le contrôleur
        $controllerClass = 'controllers\\client\\' . $controller;

        // Créer une instance du contrôleur
        $controllerInstance = new $controllerClass();

        // Vérifier si la méthode existe et l'appeler
        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            // Si la méthode n'existe pas, essayer de récupérer un enregistrement par une colonne spécifique
            if (isset($params[1])) {
                $controllerInstance->getByColumn($params[0], "slug", $params[1]);
            }
        }
    }
} else {
    // Si le paramètre 'p' n'est pas défini ou vide, charger directement l'accueil
    require_once(ROOT . 'controllers/client/Accueil.php');
    $controllerClass = 'controllers\\client\\Accueil';
    // Créer une instance du contrôleur Accueil
    $controllerInstance = new $controllerClass();
    // Appeler la méthode index pour afficher l'accueil
    $controllerInstance->index();
}

