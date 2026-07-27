<h2 class="mb-4">Liste des trajets</h2>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Départ</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Places dispo</th>
            <th>Places total</th>
            <th>Conducteur</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($trips as $trip) : ?>
            <tr>
                <td><?= htmlspecialchars($trip['ville_depart']) ?></td>
                <td><?= date('d/m/Y', strtotime($trip['date_depart'])) ?></td>
                <td><?= date('H:i', strtotime($trip['date_depart'])) ?></td>
                <td><?= htmlspecialchars($trip['ville_arrivee']) ?></td>
                <td><?= date('d/m/Y', strtotime($trip['date_arrivee'])) ?></td>
                <td><?= date('H:i', strtotime($trip['date_arrivee'])) ?></td>
                <td><?= $trip['places_dispo'] ?></td>
                <td><?= $trip['places_total'] ?></td>
                <td><?= htmlspecialchars($trip['conducteur_prenom']) ?> <?= htmlspecialchars($trip['conducteur_nom']) ?></td>
                <td>
                    <a href="/klaxon/admin/tripDelete/<?= $trip['id'] ?>" class="btn btn-sm btn-outline-danger">🗑</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>