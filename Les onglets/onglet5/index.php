<?php
// Tableau PHP contenant les images et leurs identifiants associés
$images = [
    1 => ['src' => 'img1.jpg', 'ids' => [101, 102, 103]],
    2 => ['src' => 'img2.jpg', 'ids' => [201, 202, 203]],
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Images interactives</title>

    <style>
        /* Style des images */
        img {
            width: 150px;
            cursor: pointer;
            /* Indique que l’image est cliquable */
            margin: 10px;
        }

        /* Boîte qui affiche la liste des identifiants */
        #box {
            position: absolute;
            /* Permet de la positionner à côté de l’image */
            display: none;
            /* Cachée par défaut */
            background: #1cd8d8;
            border: 2px solid #0419bd;
            border-radius: 6px;
            padding: 8px;
            width: 120px;
            /* Boîte volontairement compacte */
            box-shadow: 0 4px 10px rgba(133, 4, 69, 0.15);
            font-size: 13px;
        }

        /* Titre de la liste */
        #box h4 {
            margin: 0 0 6px 0;
            font-size: 12px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
        }

        /* Style d’un identifiant */
        .item {
            padding: 4px;
            cursor: context-menu;
            /* Indique l’utilisation du clic droit */
        }

        /* Effet au survol */
        .item:hover {
            background: #f0f0f0;
        }
    </style>
</head>

<body>

    <h2>Images</h2>

    <!-- Affichage des images depuis le tableau PHP -->
    <div id="images">
        <?php foreach ($images as $key => $img): ?>
            <!-- data-key permet de savoir quelle image a été cliquée -->
            <img src="<?= $img['src'] ?>" data-key="<?= $key ?>">
        <?php endforeach; ?>
    </div>

    <!-- Boîte qui contiendra dynamiquement les identifiants -->
    <div id="box"></div>

    <script>
        // Données PHP converties en objet JavaScript
        const data = <?= json_encode($images) ?>;

        // Référence vers la boîte des identifiants
        const box = document.getElementById('box');

        // Ajout d’un écouteur de clic sur chaque image
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('click', e => {

                // On initialise le contenu de la boîte avec un titre
                box.innerHTML = '<h4>Liste des identifiants</h4>';

                // Récupération des identifiants liés à l’image cliquée
                data[img.dataset.key].ids.forEach(id => {
                    const div = document.createElement('div');
                    div.textContent = 'ID ' + id;
                    div.className = 'item';


                    // Clic gauche sur un identifiant → changement de vue
                    div.addEventListener('click', () => {
                        window.location.href = 'vue.php?id=' + id;
                    });

                    // Clic droit sur un identifiant → changement de vue
                   /*
                    div.addEventListener('contextmenu', ev => {
                        ev.preventDefault(); // Empêche le menu contextuel du navigateur
                        window.location.href = 'vue.php?id=' + id;
                    });
                    */

                    // Ajout de l’identifiant dans la boîte
                    box.appendChild(div);
                });

                // Calcul de la position de l’image cliquée
                const rect = img.getBoundingClientRect();

                // Positionnement de la boîte à droite de l’image
                box.style.top = (rect.top + window.scrollY) + 'px';
                box.style.left = (rect.right + 8 + window.scrollX) + 'px';

                // Affichage de la boîte
                box.style.display = 'block';
            });
        });

        // Fermeture de la boîte lorsqu’on clique ailleurs que sur l’image ou la boîte
        document.addEventListener('click', e => {
            if (!box.contains(e.target) && !e.target.matches('img')) {
                box.style.display = 'none';
            }
        });
    </script>

</body>

</html>