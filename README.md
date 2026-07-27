# 🚗 Touche pas au Klaxon

Application de covoiturage intranet permettant aux employés de proposer et consulter des trajets entre les différents sites de l'entreprise.

---

## 📋 Fonctionnalités

### Visiteur (non connecté)
- Consulter la liste des trajets disponibles triée par date de départ

### Employé (connecté)
- Consulter les détails d'un trajet (conducteur, téléphone, email)
- Proposer un nouveau trajet
- Modifier ses propres trajets
- Supprimer ses propres trajets

### Administrateur
- Accès à toutes les fonctionnalités employé
- Gérer les utilisateurs (consultation)
- Gérer les agences (création, modification, suppression)
- Gérer tous les trajets (consultation, suppression)

---

## 🛠️ Technologies utilisées

- **PHP 8.2** — Architecture MVC
- **MySQL** — Base de données
- **Bootstrap 5** — Interface graphique
- **Sass** — Feuilles de style
- **XAMPP** — Environnement de développement

---

## ⚙️ Installation

### Prérequis
- XAMPP (Apache + MySQL)
- Node.js et NPM

### Étapes

**1. Cloner le dépôt**
```bash
git clone https://github.com/Kochpi/Klaxon
cd klaxon
```

**2. Installer les dépendances**
```bash
npm install
```

**3. Créer la base de données**

Ouvrir phpMyAdmin (`http://localhost/phpmyadmin`) et importer dans l'ordre :
- `database/create.sql` — Crée la base de données et les tables
- `database/seed.sql` — Insère les données de test

**4. Compiler le Sass**
```bash
npm run sass
```

**5. Lancer XAMPP**

Démarrer Apache et MySQL depuis le panneau XAMPP.

**6. Accéder à l'application**
```
http://localhost/klaxon
```

---

## 🔑 Identifiants de test

### Compte administrateur
- **Email** : `alexandre.martin@email.fr`
- **Mot de passe** : `password123`

### Compte utilisateur
- **Email** : `sophie.dubois@email.fr`
- **Mot de passe** : `password123`

---

## 📁 Structure du projet

```
klaxon/
├── app/
│   ├── controllers/
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── HomeController.php
│   │   └── TripController.php
│   ├── models/
│   │   ├── AgencyModel.php
│   │   ├── TripModel.php
│   │   └── UserModel.php
│   └── views/
│       ├── admin/
│       ├── auth/
│       ├── home/
│       └── trips/
├── config/
│   └── database.php
├── database/
│   ├── create.sql
│   └── seed.sql
├── public/
│   ├── css/
│   └── js/
├── .htaccess
├── index.php
└── README.md
```

---

## 🏗️ Architecture MVC

| Couche | Rôle |
|---|---|
| **Model** | Interactions avec la base de données |
| **View** | Affichage des pages HTML |
| **Controller** | Logique métier, lien entre Model et View |

Toutes les requêtes passent par `index.php` qui joue le rôle de routeur.