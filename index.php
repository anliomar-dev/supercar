<?php
require_once __DIR__ . './vendor/autoload.php'; // Charge les dépendances via Composer

// Crée une instance du routeur
$router = new AltoRouter();

// Définit la base path (si tu utilises un sous-dossier comme dans le cas de WAMP)
$router->setBasePath('/supercar'); // Remplace par ton chemin relatif

// Déclare la route pour afficher les utilisateurs
$router->map('GET', '/', function() {
    include(__DIR__ . './views/client/home.php');
    // Inclure le contrôleur User pour afficher les utilisateurs
    //$controller = new \controllers\client\User();
    //$controller->showUsers(); // Appeler la méthode showUsers du contrôleur
});

// Récupère la route actuelle
$match = $router->match();

// Si une route correspond, appelle la fonction ou méthode
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // Si aucune route ne correspond, affiche 404
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "404 - Page non trouvée";
}
