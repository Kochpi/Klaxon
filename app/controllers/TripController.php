<?php

/**
 * Controller des trajets
 * Gère la création, modification et suppression des trajets
 */
class TripController
{
    /**
     * Affiche le formulaire de création d'un trajet
     * ou traite les données si le formulaire est envoyé
     */
    public function create(): void
    {
        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: /klaxon/auth/login');
            exit;
        }

        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();

        // On récupère la liste des agences pour le formulaire
        $agencies = $tripModel->getAllAgencies();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // On récupère les données du formulaire
            $agencyDepartId  = $_POST['agency_depart_id'] ?? '';
            $agencyArriveeId = $_POST['agency_arrivee_id'] ?? '';
            $dateDepart      = $_POST['date_depart'] ?? '';
            $dateArrivee     = $_POST['date_arrivee'] ?? '';
            $placesTotal     = $_POST['places_total'] ?? '';

            // Contrôles de cohérence
            $errors = [];

            if ($agencyDepartId === $agencyArriveeId) {
                $errors[] = "L'agence de départ et d'arrivée doivent être différentes.";
            }

            if ($dateArrivee <= $dateDepart) {
                $errors[] = "La date d'arrivée doit être après la date de départ.";
            }

            if ($placesTotal < 1) {
                $errors[] = "Le nombre de places doit être supérieur à 0.";
            }

            // Si pas d'erreurs on crée le trajet
            if (empty($errors)) {
                $tripModel->createTrip([
                    'agency_depart_id'  => $agencyDepartId,
                    'agency_arrivee_id' => $agencyArriveeId,
                    'date_depart'       => $dateDepart,
                    'date_arrivee'      => $dateArrivee,
                    'places_total'      => $placesTotal,
                    'places_dispo'      => $placesTotal,
                    'user_id'           => $_SESSION['user_id']
                ]);

                header('Location: /klaxon');
                exit;
            }
        }

        ob_start();
        require_once 'app/views/trips/create.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }
    /**
     * Affiche et traite le formulaire de modification
     */
    public function edit(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /klaxon/auth/login');
            exit;
        }

        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();

        // On récupère l'id du trajet depuis l'URL
        $url    = $_GET['url'] ?? '';
        $parts  = explode('/', $url);
        $id     = (int)($parts[2] ?? 0);

        // On récupère le trajet
        $trip = $tripModel->getTripById($id);

        // Vérification que le trajet existe et appartient à l'utilisateur
        if (!$trip || $trip['user_id'] != $_SESSION['user_id']) {
            http_response_code(403);
            die('Accès interdit');
        }

        $agencies = $tripModel->getAllAgencies();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $agencyDepartId  = $_POST['agency_depart_id'] ?? '';
            $agencyArriveeId = $_POST['agency_arrivee_id'] ?? '';
            $dateDepart      = $_POST['date_depart'] ?? '';
            $dateArrivee     = $_POST['date_arrivee'] ?? '';
            $placesTotal     = $_POST['places_total'] ?? '';

            $errors = [];

            if ($agencyDepartId === $agencyArriveeId) {
                $errors[] = "L'agence de départ et d'arrivée doivent être différentes.";
            }

            if ($dateArrivee <= $dateDepart) {
                $errors[] = "La date d'arrivée doit être après la date de départ.";
            }

            if ($placesTotal < 1) {
                $errors[] = "Le nombre de places doit être supérieur à 0.";
            }

            if (empty($errors)) {
                $tripModel->updateTrip([
                    'agency_depart_id'  => $agencyDepartId,
                    'agency_arrivee_id' => $agencyArriveeId,
                    'date_depart'       => $dateDepart,
                    'date_arrivee'      => $dateArrivee,
                    'places_total'      => $placesTotal,
                    'places_dispo'      => $placesTotal,
                    'id'                => $id,
                    'user_id'           => $_SESSION['user_id']
                ]);

                header('Location: /klaxon');
                exit;
            }
        }

        ob_start();
        require_once 'app/views/trips/edit.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }

    /**
     * Supprime un trajet
     */
    public function delete(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /klaxon/auth/login');
            exit;
        }

        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();

        $url   = $_GET['url'] ?? '';
        $parts = explode('/', $url);
        $id    = (int)($parts[2] ?? 0);

        $tripModel->deleteTrip($id, $_SESSION['user_id']);

        header('Location: /klaxon');
        exit;
    }
}