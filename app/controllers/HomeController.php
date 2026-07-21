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
        // On charge le Model
        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();

        // On récupère les trajets disponibles
        $trips = $tripModel->getAvailableTrips();

        // On capture le contenu de la vue
        ob_start();
        require_once 'app/views/home/index.php';
        $content = ob_get_clean();

        // On charge le layout
        require_once 'app/views/layout.php';
    }
}