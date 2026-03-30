<?php
// exemple8.php

// Création d'un tableau de données pour les utilisateurs
// Chaque utilisateur est représenté par un tableau associatif avec des clés "nom" et "email"
// Ce tableau sera utilisé pour générer dynamiquement les lignes du tableau HTML
$users = [
    ["nom" => "Alice", "email" => "alice@mail.com"],
    ["nom" => "Bob", "email" => "bob@mail.com"],
    ["nom" => "Charlie", "email" => "charlie@mail.com"]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <!-- Utilisation de la classe "table" de Bootstrap pour créer un tableau stylisé -->
    <!-- "table-striped" ajoute des bandes de couleur pour chaque ligne, 
     "table-bordered" ajoute des bordures au tableau -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>