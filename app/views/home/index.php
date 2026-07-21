<h2 class="mb-4">Trajets proposés</h2>

<?php if (empty($trips)) : ?>
    <div class="alert alert-info">Aucun trajet disponible pour le moment.</div>
<?php else : ?>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Départ</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Places</th>
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
                    <td>
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <!-- Bouton détail en modale -->
                            <button 
                                class="btn btn-sm btn-outline-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-<?= $trip['id'] ?>">
                                👁
                            </button>

                            <?php if ($_SESSION['user_id'] == $trip['user_id']) : ?>
                                <!-- Bouton modifier -->
                                <a href="/klaxon/trips/edit/<?= $trip['id'] ?>" class="btn btn-sm btn-outline-warning">✏️</a>
                                <!-- Bouton supprimer -->
                                <a href="/klaxon/trips/delete/<?= $trip['id'] ?>" class="btn btn-sm btn-outline-danger">🗑</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>

                <?php if (isset($_SESSION['user_id'])) : ?>
                    <!-- Modale avec les détails du trajet -->
                    <div class="modal fade" id="modal-<?= $trip['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Détails du trajet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Auteur :</strong> <?= htmlspecialchars($trip['conducteur_prenom']) ?> <?= htmlspecialchars($trip['conducteur_nom']) ?></p>
                                    <p><strong>Téléphone :</strong> <?= htmlspecialchars($trip['conducteur_telephone']) ?></p>
                                    <p><strong>Email :</strong> <?= htmlspecialchars($trip['conducteur_email']) ?></p>
                                    <p><strong>Nombre total de places :</strong> <?= $trip['places_total'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>