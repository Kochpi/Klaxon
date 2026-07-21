<?php

/**
 * Point d'entrée de l'application
 * Toutes les requêtes passent par ici
 */

// On démarre la session dès le début
session_start();

// On charge la connexion à la base de données
require_once 'config/database.php';

// On récupère l'URL demandée par l'utilisateur
$url = $_GET['url'] ?? '/';
$url = trim($url, '/');

// On découpe l'URL en parties
$parts = explode('/', $url);

// La première partie c'est le controller
$controllerName = $parts[0] ?? 'home';

// La deuxième partie c'est l'action
$action = $parts[1] ?? 'index';

// On choisit le bon controller selon l'URL
switch ($controllerName) {
    case '':
    case 'home':
        require_once 'app/controllers/HomeController.php';
        $controller = new HomeController();
        break;

    case 'auth':
        require_once 'app/controllers/AuthController.php';
        $controller = new AuthController();
        break;

    default:
        http_response_code(404);
        die('Page non trouvée');
}

// On appelle l'action sur le controller
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    http_response_code(404);
    die('Action non trouvée');
}