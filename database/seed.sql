-- ============================================
-- Touche pas au Klaxon
-- Script d'alimentation de la base de données
-- Jeu d'essais
-- ============================================

USE klaxon;

-- ============================================
-- Agences (villes)
-- ============================================
INSERT INTO agencies (nom) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');

-- ============================================
-- Utilisateurs (employés)
-- Le mot de passe par défaut est : password123
-- Chiffré avec password_hash() de PHP
-- ============================================
INSERT INTO users (nom, prenom, telephone, email, password, role) VALUES
('Martin',    'Alexandre', '0612345678', 'alexandre.martin@email.fr',   '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'admin'),
('Dubois',    'Sophie',    '0698765432', 'sophie.dubois@email.fr',      '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Bernard',   'Julien',    '0622446688', 'julien.bernard@email.fr',     '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Moreau',    'Camille',   '0611223344', 'camille.moreau@email.fr',     '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Lefèvre',   'Lucie',     '0777889900', 'lucie.lefevre@email.fr',      '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Leroy',     'Thomas',    '0655443322', 'thomas.leroy@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Roux',      'Chloé',     '0633221199', 'chloe.roux@email.fr',         '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Petit',     'Maxime',    '0766778899', 'maxime.petit@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Garnier',   'Laura',     '0688776655', 'laura.garnier@email.fr',      '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Dupuis',    'Antoine',   '0744556677', 'antoine.dupuis@email.fr',     '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Lefebvre',  'Emma',      '0699887766', 'emma.lefebvre@email.fr',      '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Fontaine',  'Louis',     '0655667788', 'louis.fontaine@email.fr',     '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Chevalier', 'Clara',     '0788990011', 'clara.chevalier@email.fr',    '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Robin',     'Nicolas',   '0644332211', 'nicolas.robin@email.fr',      '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Gauthier',  'Marine',    '0677889922', 'marine.gauthier@email.fr',    '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Fournier',  'Pierre',    '0722334455', 'pierre.fournier@email.fr',    '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Girard',    'Sarah',     '0688665544', 'sarah.girard@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Lambert',   'Hugo',      '0611223366', 'hugo.lambert@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Masson',    'Julie',     '0733445566', 'julie.masson@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user'),
('Henry',     'Arthur',    '0666554433', 'arthur.henry@email.fr',       '$2y$10$eNMhv7TQnp1586jp1jn.tO9gIr1kafA01gvmygUxiS6ywcQuKqPVi', 'user');

-- ============================================
-- Trajets (jeu d'essais)
-- ============================================
INSERT INTO trips (agency_depart_id, agency_arrivee_id, date_depart, date_arrivee, places_total, places_dispo, user_id) VALUES
(1, 2, '2026-08-01 08:00:00', '2026-08-01 12:00:00', 4, 3, 2),
(2, 3, '2026-08-02 09:00:00', '2026-08-02 13:30:00', 3, 1, 3),
(3, 4, '2026-08-03 07:30:00', '2026-08-03 11:00:00', 5, 5, 4),
(1, 5, '2026-08-05 06:00:00', '2026-08-05 10:00:00', 4, 2, 5),
(6, 1, '2026-08-06 14:00:00', '2026-08-06 18:30:00', 3, 3, 6),
(4, 7, '2026-08-07 08:30:00', '2026-08-07 14:00:00', 4, 1, 7),
(2, 1, '2026-08-10 07:00:00', '2026-08-10 11:00:00', 5, 4, 8);
