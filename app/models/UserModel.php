<?php

/**
 * Model des utilisateurs
 * Gère toutes les interactions avec la table users
 */
class UserModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = getDB();
    }

    /**
     * Récupère tous les utilisateurs
     */
    public function getAllUsers(): array
    {
        $stmt = $this->db->prepare("
            SELECT id, nom, prenom, email, telephone, role 
            FROM users 
            ORDER BY nom ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}