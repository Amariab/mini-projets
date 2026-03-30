<?php
$titre = "Titre de la carte";
$texte = "Voici un exemple de carte Bootstrap avec PHP.";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

<!-- Utilisation de la classe "card" de Bootstrap pour créer une carte avec un titre, du texte et un bouton -->
    <div class="card" style="width: 18rem;">
        <!-- La classe "card-body" contient le contenu de la carte, "card-title" pour le titre,
          "card-text" pour le texte,-->
        <div class="card-body">
            <h5 class="card-title"><?php echo $titre; ?></h5>
            <p class="card-text"><?php echo $texte; ?></p>
            <a href="#" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
</div>
</body>
</html>