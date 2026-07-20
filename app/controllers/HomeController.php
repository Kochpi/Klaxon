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
        require_once 'app/views/layout.php';
    }
}