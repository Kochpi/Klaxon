<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des agences</h2>
    <a href="/klaxon/admin/agencyForm" class="btn btn-dark">+ Ajouter une agence</a>
</div>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agencies as $agency) : ?>
            <tr>
                <td><?= htmlspecialchars($agency['nom']) ?></td>
                <td>
                    <a href="/klaxon/admin/agencyForm/<?= $agency['id'] ?>" class="btn btn-sm btn-outline-warning">✏️</a>
                    <a href="/klaxon/admin/agencyDelete/<?= $agency['id'] ?>" class="btn btn-sm btn-outline-danger">🗑</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>