<h2 class="mb-4"><?= $agency ? 'Modifier une agence' : 'Créer une agence' ?></h2>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/klaxon/admin/agencyForm/<?= $agency ? $agency['id'] : '' ?>">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom de l'agence</label>
        <input 
            type="text" 
            class="form-control" 
            id="nom" 
            name="nom" 
            value="<?= $agency ? htmlspecialchars($agency['nom']) : '' ?>"
            required>
    </div>
    <button type="submit" class="btn btn-dark"><?= $agency ? 'Modifier' : 'Créer' ?></button>
    <a href="/klaxon/admin/agencies" class="btn btn-outline-secondary">Annuler</a>
</form>