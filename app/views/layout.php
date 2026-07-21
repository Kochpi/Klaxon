<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche pas au Klaxon</title>
    <link rel="stylesheet" href="/klaxon/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/klaxon/public/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/klaxon">Touche pas au Klaxon</a>
            <div class="ms-auto d-flex align-items-center gap-2">

                <?php if (isset($_SESSION['user_id'])) : ?>
                    <?php if ($_SESSION['user_role'] === 'admin') : ?>
                        <a href="/klaxon/admin/users" class="btn btn-outline-light btn-sm">Utilisateurs</a>
                        <a href="/klaxon/admin/agencies" class="btn btn-outline-light btn-sm">Agences</a>
                        <a href="/klaxon/admin/trips" class="btn btn-outline-light btn-sm">Trajets</a>
                    <?php else : ?>
                        <a href="/klaxon/trips/create" class="btn btn-outline-light btn-sm">Créer un trajet</a>
                    <?php endif; ?>

                    <span class="text-light">
                        Bonjour <?= htmlspecialchars($_SESSION['user_prenom']) ?> <?= htmlspecialchars($_SESSION['user_nom']) ?>
                    </span>
                    <a href="/klaxon/auth/logout" class="btn btn-light btn-sm">Déconnexion</a>

                <?php else : ?>
                    <a href="/klaxon/auth/login" class="btn btn-outline-light btn-sm">Connexion</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <?= $content ?? '' ?>
    </main>

    <footer class="text-center py-3 mt-5 border-top">
        <p class="mb-0">Touche pas au Klaxon &copy; 2024</p>
    </footer>

    <script src="/klaxon/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>