<!-- /views/users/list.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
<h1>Liste des utilisateurs</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['IdUtilisateur']); ?></td>
            <td><?php echo htmlspecialchars($user['Prenom']); ?></td>
            <td><?php echo htmlspecialchars($user['Nom']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>