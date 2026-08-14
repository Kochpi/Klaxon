<!-- Front des users admin -->
<h2 class="mb-4">Liste des utilisateurs</h2>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['prenom']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['telephone']) ?></td>
                <td><?= $user['role'] === 'admin' ? '<span class="badge bg-dark">Admin</span>' : '<span class="badge bg-secondary">User</span>' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>