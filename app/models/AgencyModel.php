<?php

/**
 * Model des agences
 * Gère toutes les interactions avec la table agencies
 */
class AgencyModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = getDB();
    }

    /**
     * Récupère toutes les agences
     */
    public function getAllAgencies(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM agencies ORDER BY nom ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une agence par son id
     */
    public function getAgencyById(int $id): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM agencies WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée une nouvelle agence
     */
    public function createAgency(string $nom): void
    {
        $stmt = $this->db->prepare("INSERT INTO agencies (nom) VALUES (:nom)");
        $stmt->execute([':nom' => $nom]);
    }

    /**
     * Modifie une agence
     */
    public function updateAgency(int $id, string $nom): void
    {
        $stmt = $this->db->prepare("UPDATE agencies SET nom = :nom WHERE id = :id");
        $stmt->execute([':nom' => $nom, ':id' => $id]);
    }

    /**
     * Supprime une agence
     */
    public function deleteAgency(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM agencies WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}