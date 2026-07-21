<?php

/**
 * Controller de la page d'accueil
 */
class HomeController
{
    /**
     * Action par défaut — affiche la page d'accueil
     */
    public function index(): void
    {
        // On capture le contenu de la vue dans une variable
        ob_start();
        require_once 'app/views/home/index.php';
        $content = ob_get_clean();

        // On charge le layout avec le contenu
        require_once 'app/views/layout.php';
    }
}