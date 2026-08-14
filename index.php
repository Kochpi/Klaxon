<?php

/**
 * Point d'entrée de l'application
 */

// démarre la session
session_start();

// charge la connexion à la base de données
require_once 'config/database.php';

// récupère l'URL demandée par l'utilisateur
$url = $_GET['url'] ?? '/';
$url = trim($url, '/');


$parts = explode('/', $url);


$controllerName = $parts[0] ?? 'home';


$action = $parts[1] ?? 'index';

// choisit le bon controller selon l'URL
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
    
    case 'trips':
    require_once 'app/controllers/TripController.php';
    $controller = new TripController();
    break;

    case 'admin':
    require_once 'app/controllers/AdminController.php';
    $controller = new AdminController();
    break;

    default:
        http_response_code(404);
        die('Page non trouvée');
}

// appelle l'action sur le controller
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    http_response_code(404);
    die('Action non trouvée');
}