<?php
// exemple6.php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Navbar Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Utilisation de la barre de navigation (navbar) de Bootstrap pour créer un menu responsive -->
    <!-- La classe "navbar" crée une barre de navigation, "navbar-expand-lg" rend la barre responsive, 
      "navbar-dark" et "bg-dark" ajoutent un thème sombre -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <!-- navbar-brand : pour le nom ou logo du site -->
            <a class="navbar-brand" href="#">MonSite</a>
            <!-- navbar-toggler : bouton pour afficher le menu sur les petits écrans -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar-collapse : contient les éléments du menu qui seront affichés ou cachés selon la taille de l'écran -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                    <!-- La classe "nav-item" est utilisée pour chaque élément de menu, "nav-link" pour les liens, 
                    et "ms-auto" aligne les éléments à droite -->
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>