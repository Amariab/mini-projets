<?php
$images = ["img1.jpg", "img2.jpg", "img3.jpg"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carrousel Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!--mt-5 ajoute une marge en haut pour espacer le carrousel du bord de la page -->
<div class="container mt-5">
    <!-- Utilisation du composant "carousel" de Bootstrap pour créer un carrousel d'images -->
     <!-- "carousel slide" indique que c'est un carrousel avec un effet de glissement entre les images -->
     <!-- La classe "active" est ajoutée à la première image pour qu'elle soit affichée au chargement de la page -->
    <div id="carouselExample" class="carousel slide">

         <!-- "carousel-inner" contient les éléments du carrousel, chaque "carousel-item" représente une image -->
        <div class="carousel-inner">

            <?php foreach ($images as $index => $img): ?>
                <!-- La classe "active" est ajoutée à la première image pour qu'elle soit affichée au chargement de la page --> 
                 <!-- "d-block w-100" rend l'image responsive en la faisant occuper toute la largeur du conteneur -->
            <div class="carousel-item <?php if($index==0) echo 'active'; ?>">
                <img src="<?php echo $img; ?>" class="d-block w-100" alt="Image <?php echo $index+1; ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Les boutons de contrôle pour naviguer entre les images du carrousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>