<?php

/**
 * Model des trajets
 * Gère toutes les interactions avec la table trips
 */
class TripModel
{
    private PDO $db;

    /**
     * Constructeur — on récupère la connexion à la base
     */
    public function __construct()
    {
        $this->db = getDB();
    }

    /**
     * Récupère tous les trajets disponibles
     * Triés par date de départ croissante
     * Sans les trajets passés et sans les trajets complets
     */
    public function getAvailableTrips(): array
    {
        $stmt = $this->db->prepare("
            SELECT 
                trips.id,
                trips.date_depart,
                trips.date_arrivee,
                trips.places_dispo,
                trips.places_total,
                trips.user_id,
                depart.nom  AS ville_depart,
                arrivee.nom AS ville_arrivee,
                users.nom      AS conducteur_nom,
                users.prenom   AS conducteur_prenom,
                users.email    AS conducteur_email,
                users.telephone AS conducteur_telephone
            FROM trips
            JOIN agencies AS depart  ON trips.agency_depart_id  = depart.id
            JOIN agencies AS arrivee ON trips.agency_arrivee_id = arrivee.id
            JOIN users               ON trips.user_id           = users.id
            WHERE trips.places_dispo > 0
            AND trips.date_depart > NOW()
            ORDER BY trips.date_depart ASC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
     * Crée un nouveau trajet
     */
    public function createTrip(array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO trips 
                (agency_depart_id, agency_arrivee_id, date_depart, date_arrivee, places_total, places_dispo, user_id)
            VALUES 
                (:agency_depart_id, :agency_arrivee_id, :date_depart, :date_arrivee, :places_total, :places_dispo, :user_id)
        ");

        $stmt->execute($data);
    }
    /**
     * Récupère un trajet par son id
     */
    public function getTripById(int $id): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM trips WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Modifie un trajet existant
     */
    public function updateTrip(array $data): void
    {
        $stmt = $this->db->prepare("
            UPDATE trips SET
                agency_depart_id  = :agency_depart_id,
                agency_arrivee_id = :agency_arrivee_id,
                date_depart       = :date_depart,
                date_arrivee      = :date_arrivee,
                places_total      = :places_total,
                places_dispo      = :places_dispo
            WHERE id = :id
            AND user_id = :user_id
        ");

        $stmt->execute($data);
    }

    /**
     * Supprime un trajet
     */
    public function deleteTrip(int $id, int $userId): void
    {
        $stmt = $this->db->prepare("
            DELETE FROM trips 
            WHERE id = :id 
            AND user_id = :user_id
        ");

        $stmt->execute([':id' => $id, ':user_id' => $userId]);
    }
    /**
     * Récupère tous les trajets (pour l'admin)
     */
    public function getAllTrips(): array
    {
        $stmt = $this->db->prepare("
            SELECT 
                trips.id,
                trips.date_depart,
                trips.date_arrivee,
                trips.places_total,
                trips.places_dispo,
                depart.nom  AS ville_depart,
                arrivee.nom AS ville_arrivee,
                users.nom   AS conducteur_nom,
                users.prenom AS conducteur_prenom
            FROM trips
            JOIN agencies AS depart  ON trips.agency_depart_id  = depart.id
            JOIN agencies AS arrivee ON trips.agency_arrivee_id = arrivee.id
            JOIN users               ON trips.user_id           = users.id
            ORDER BY trips.date_depart ASC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Supprime un trajet (admin — sans vérifier le user_id)
     */
    public function adminDeleteTrip(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM trips WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}