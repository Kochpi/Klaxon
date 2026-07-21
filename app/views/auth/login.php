<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion — Touche pas au Klaxon</title>
    <link rel="stylesheet" href="/klaxon/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/klaxon">Touche pas au Klaxon</a>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="mb-4">Connexion</h2>

                <!-- Message d'erreur si mauvais identifiants -->
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" action="/klaxon/auth/login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Se connecter</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="text-center py-3 mt-5 border-top">
        <p class="mb-0">Touche pas au Klaxon &copy; 2024</p>
    </footer>

</body>
</html>