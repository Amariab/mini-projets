<?php
// exemple5.php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Grille Bootstrap</title>
    <!-- Lien vers le CSS de Bootstrap pour utiliser les classes de la grille et les styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Utilisation de la grille Bootstrap pour créer une mise en page responsive -->
    <!-- La classe "container" crée un conteneur centré avec des marges -->


    <div class="container mt-5">

        <!-- La classe "row" crée une ligne pour les colonnes -->
        <div class="row">

            <!-- Les classes "col-md-4" créent trois colonnes de largeur égale sur les écrans moyens et plus grands -->
            <!-- Les classes "bg-primary", "bg-secondary" et "bg-success" ajoutent des couleurs de fond différentes pour chaque colonne -->
            <!-- La classe "text-white" rend le texte blanc pour une meilleure lisibilité sur les fonds colorés -->
            <!-- La classe "p-3" ajoute du padding pour espacer le contenu à l'intérieur des colonnes -->
            <div class="col-md-4 bg-primary text-white p-3">Colonne 1</div>
            <div class="col-md-4 bg-secondary text-white p-3">Colonne 2</div>
            <div class="col-md-4 bg-success text-white p-3">Colonne 3</div>
        </div>
    </div>
</body>

</html>