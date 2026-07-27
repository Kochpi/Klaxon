<h2 class="mb-4">Créer un trajet</h2>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/klaxon/trips/create">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="agency_depart_id" class="form-label">Agence de départ</label>
            <select class="form-select" id="agency_depart_id" name="agency_depart_id" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($agencies as $agency) : ?>
                    <option value="<?= $agency['id'] ?>"><?= htmlspecialchars($agency['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="agency_arrivee_id" class="form-label">Agence d'arrivée</label>
            <select class="form-select" id="agency_arrivee_id" name="agency_arrivee_id" required>
                <option value="">-- Choisir --</option>
                <?php foreach ($agencies as $agency) : ?>
                    <option value="<?= $agency['id'] ?>"><?= htmlspecialchars($agency['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="date_depart" class="form-label">Date et heure de départ</label>
            <input type="datetime-local" class="form-control" id="date_depart" name="date_depart" required>
        </div>
        <div class="col-md-6">
            <label for="date_arrivee" class="form-label">Date et heure d'arrivée</label>
            <input type="datetime-local" class="form-control" id="date_arrivee" name="date_arrivee" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="places_total" class="form-label">Nombre de places</label>
            <input type="number" class="form-control" id="places_total" name="places_total" min="1" max="9" required>
        </div>
    </div>

    <!-- Infos conducteur pré-remplies et non modifiables -->
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title">Vos informations</h6>
            <p class="mb-1"><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user_prenom']) ?> <?= htmlspecialchars($_SESSION['user_nom']) ?></p>
        </div>
    </div>

    <button type="submit" class="btn btn-dark">Créer le trajet</button>
    <a href="/klaxon" class="btn btn-outline-secondary">Annuler</a>
</form>