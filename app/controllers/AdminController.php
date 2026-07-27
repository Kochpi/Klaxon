<?php

/**
 * Controller de l'espace administrateur
 * Toutes les actions sont réservées à l'admin
 */
class AdminController
{
    /**
     * Vérifie que l'utilisateur est bien admin
     * Sinon on le redirige
     */
    private function checkAdmin(): void
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /klaxon');
            exit;
        }
    }

    /**
     * Liste des utilisateurs
     */
    public function users(): void
    {
        $this->checkAdmin();

        require_once 'app/models/UserModel.php';
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        ob_start();
        require_once 'app/views/admin/users.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }

    /**
     * Liste des agences
     */
    public function agencies(): void
    {
        $this->checkAdmin();

        require_once 'app/models/AgencyModel.php';
        $agencyModel = new AgencyModel();
        $agencies = $agencyModel->getAllAgencies();

        ob_start();
        require_once 'app/views/admin/agencies.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }

    /**
     * Formulaire création / modification d'une agence
     */
    public function agencyForm(): void
    {
        $this->checkAdmin();

        require_once 'app/models/AgencyModel.php';
        $agencyModel = new AgencyModel();

        // On récupère l'id dans l'URL si modification
        $url   = $_GET['url'] ?? '';
        $parts = explode('/', $url);
        $id    = (int)($parts[2] ?? 0);

        // Si id existe on est en modification sinon en création
        $agency = $id ? $agencyModel->getAgencyById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');

            $errors = [];

            if (empty($nom)) {
                $errors[] = "Le nom de l'agence est obligatoire.";
            }

            if (empty($errors)) {
                if ($agency) {
                    $agencyModel->updateAgency($id, $nom);
                } else {
                    $agencyModel->createAgency($nom);
                }

                header('Location: /klaxon/admin/agencies');
                exit;
            }
        }

        ob_start();
        require_once 'app/views/admin/agency-form.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }

    /**
     * Supprime une agence
     */
    public function agencyDelete(): void
    {
        $this->checkAdmin();

        require_once 'app/models/AgencyModel.php';
        $agencyModel = new AgencyModel();

        $url   = $_GET['url'] ?? '';
        $parts = explode('/', $url);
        $id    = (int)($parts[2] ?? 0);

        $agencyModel->deleteAgency($id);

        header('Location: /klaxon/admin/agencies');
        exit;
    }

    /**
     * Liste des trajets pour l'admin
     */
    public function trips(): void
    {
        $this->checkAdmin();

        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();
        $trips = $tripModel->getAllTrips();

        ob_start();
        require_once 'app/views/admin/trips.php';
        $content = ob_get_clean();

        require_once 'app/views/layout.php';
    }

    /**
     * Supprime un trajet (admin)
     */
    public function tripDelete(): void
    {
        $this->checkAdmin();

        require_once 'app/models/TripModel.php';
        $tripModel = new TripModel();

        $url   = $_GET['url'] ?? '';
        $parts = explode('/', $url);
        $id    = (int)($parts[2] ?? 0);

        $tripModel->adminDeleteTrip($id);

        header('Location: /klaxon/admin/trips');
        exit;
    }
}