<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Galerie de Photos</title>
    <link rel="stylesheet" href="gallerie.css">
</head>
<body>
    <h1>Galerie de Photos avec Textes</h1>
    <div class="gallerie">
        <?php
        // Correspondance photo => fichier texte
        for ($i = 1; $i <= 5; $i++) {
            $photo = "photos/photo$i.jpg";
            $texte = "texte$i.html";
            echo "<a href=\"$texte\" target=\"_blank\"><img src=\"$photo\" alt=\"Photo $i\"></a>";
        }
        ?>
    </div>
</body>
</html>
