<!-- Fichier : onglets-medium.php (ou .html si le PHP est interprété) -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Onglets Dynamiques - Fruits & Légumes</title>
    <style>
        /* Style des boutons d’onglets */
        .tabs-medium .tab-btn {
            padding: 8px 15px; /* Espacement interne */
            background: #ddd;  /* Fond gris clair */
            border: none;      /* Pas de bordure */
            cursor: pointer;   /* Curseur en forme de main */
            margin-right: 5px; /* Espacement entre les boutons */
        }

        /* Style du bouton actif (onglet sélectionné) */
        .tabs-medium .tab-btn.active {
            background: #28a745; /* Vert Bootstrap */
            color: white;        /* Texte blanc */
        }

        /* Par défaut, on cache tous les contenus des onglets */
        .tab-content {
            display: none;
            margin-top: 15px; /* Espacement au-dessus */
        }

        /* Quand un contenu est actif, on l'affiche */
        .tab-content.active {
            display: block;
        }
    </style>
</head>

<body>

<?php
// PHP : données simulées (comme si elles venaient d'une base de données)
$items = [
    ['id' => 1, 'type' => 'fruit', 'name' => 'Pomme'],
    ['id' => 2, 'type' => 'fruit', 'name' => 'Banane'],
    ['id' => 3, 'type' => 'legume', 'name' => 'Carotte'],
    ['id' => 4, 'type' => 'legume', 'name' => 'Tomate'],
];
?>

<!-- Onglets de navigation -->
<div class="tabs-medium">
    <!-- Onglet Fruits (actif par défaut) -->
    <button class="tab-btn active" data-tab="fruits">Fruits</button>
    
    <!-- Onglet Légumes -->
    <button class="tab-btn" data-tab="legumes">Légumes</button>
</div>

<!-- Contenu de l’onglet Fruits (visible par défaut) -->
<div id="fruits" class="tab-content active">
    <h3>Liste des Fruits</h3>
    <ul>
        <?php foreach ($items as $item): ?>
            <?php if ($item['type'] === 'fruit'): ?>
                <!-- Affiche uniquement les fruits -->
                <li><?= htmlspecialchars($item['name']) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Contenu de l’onglet Légumes (caché au départ) -->
<div id="legumes" class="tab-content">
    <h3>Liste des Légumes</h3>
    <ul>
        <?php foreach ($items as $item): ?>
            <?php if ($item['type'] === 'legume'): ?>
                <!-- Affiche uniquement les légumes -->
                <li><?= htmlspecialchars($item['name']) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Script JavaScript pour gérer les clics sur les onglets -->
<script>
    // On sélectionne tous les boutons d’onglets
    const tabBtns = document.querySelectorAll('.tabs-medium .tab-btn');

    // On sélectionne tous les contenus d’onglets
    const tabContents = document.querySelectorAll('.tab-content');

    // Pour chaque bouton
    tabBtns.forEach(btn => {
        // Quand on clique dessus
        btn.addEventListener('click', () => {
            // Retire la classe active de tous les boutons
            tabBtns.forEach(b => b.classList.remove('active'));

            // Cache tous les contenus d’onglets
            tabContents.forEach(c => c.classList.remove('active'));

            // Active le bouton cliqué
            btn.classList.add('active');

            // Affiche le contenu associé à ce bouton
            document.getElementById(btn.dataset.tab).classList.add('active');
            // btn.dataset.tab récupère la valeur de data-tab, ex : "fruits" ou "legumes"
        });
    });
</script>

</body>
</html>
