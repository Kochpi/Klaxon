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
}