-- ============================================
-- Touche pas au Klaxon
-- Script de création de la base de données
-- ============================================

CREATE DATABASE IF NOT EXISTS klaxon CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE klaxon;

-- ============================================
-- Table des utilisateurs (employés)
-- ============================================
CREATE TABLE users (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nom         VARCHAR(100) NOT NULL,
    prenom      VARCHAR(100) NOT NULL,
    telephone   VARCHAR(20)  NOT NULL,
    email       VARCHAR(150) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL,
    role        ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

-- ============================================
-- Table des agences (villes)
-- ============================================
CREATE TABLE agencies (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    nom     VARCHAR(100) NOT NULL UNIQUE
);

-- ============================================
-- Table des trajets
-- ============================================
CREATE TABLE trips (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    agency_depart_id    INT NOT NULL,
    agency_arrivee_id   INT NOT NULL,
    date_depart         DATETIME NOT NULL,
    date_arrivee        DATETIME NOT NULL,
    places_total        INT NOT NULL,
    places_dispo        INT NOT NULL,
    user_id             INT NOT NULL,

    -- Liens vers les autres tables
    FOREIGN KEY (agency_depart_id)  REFERENCES agencies(id),
    FOREIGN KEY (agency_arrivee_id) REFERENCES agencies(id),
    FOREIGN KEY (user_id)           REFERENCES users(id)
);
