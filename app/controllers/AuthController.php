<?php

/**
 * Controller d'authentification
 * Gère la connexion et la déconnexion
 */
class AuthController
{
    /**
     * Affiche le formulaire de connexion
     * ou traite les données si le formulaire est envoyé
     */
    public function login(): void
    {
        // Si le formulaire est envoyé (méthode POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // On récupère ce que l'utilisateur a tapé
            $email    = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // On cherche l'utilisateur dans la base de données
            $db   = getDB();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // On vérifie le mot de passe
            if ($user && password_verify($password, $user['password'])) {

                // Mot de passe correct — on démarre la session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['user_role'] = $user['role'];

                // On redirige vers la page d'accueil
                header('Location: /klaxon');
                exit;

            } else {
                // Mauvais identifiants
                $error = 'Email ou mot de passe incorrect';
                require_once 'app/views/auth/login.php';
            }

        } else {
            // Formulaire pas encore envoyé — on affiche juste la page
            require_once 'app/views/auth/login.php';
        }
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /klaxon');
        exit;
    }
}