<?php
// DÉBUT DU TRAITEMENT PHP

session_start(); // Démarre la session pour mémoriser le dernier onglet sélectionné

// On récupère l'onglet actif depuis la session, ou "tab1" par défaut s'il n'est pas encore défini
$activeTab = $_SESSION['active_tab'] ?? 'tab1';

// Si le formulaire est soumis (méthode POST) et qu'un onglet est cliqué
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['active_tab'])) {
    $_SESSION['active_tab'] = $_POST['active_tab']; // Enregistre le choix de l'utilisateur dans la session
    $activeTab = $_POST['active_tab'];              // Met à jour l'onglet actif pour cette requête
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Onglets dynamiques avec PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* STYLE DES ONGLET */
        .tabs-complex .tab-btn {
            background: #ccc;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        /* Bouton actif (visuellement sélectionné) */
        .tabs-complex .tab-btn.active {
            background: #007bff;
            color: white;
        }

        /* STYLE DES CONTENUS D’ONGLET */
        .tab-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, padding 0.3s;
            padding: 0 15px;
            opacity: 0;
            margin-top: 10px;
        }

        .tab-content.active {
            max-height: 1000px;
            /* Assez grand pour afficher le contenu complet */
            padding: 15px;
            opacity: 1;
        }

        /* Champ de recherche pour filtrer les commentaires */
        #commentFilter {
            margin-bottom: 10px;
            padding: 6px 10px;
            width: 100%;
            max-width: 300px;
        }
    </style>
</head>

<body>

    <h1>Fiche produit interactive</h1>

    <!-- ONGLET DE NAVIGATION -->
    <div class="tabs-complex">
        <form id="tabForm" method="POST" action="">
            <!-- Onglet Détails -->
            <button type="submit" name="active_tab" value="tab1"
                class="tab-btn <?= $activeTab === 'tab1' ? 'active' : '' ?>">Détails</button>

            <!-- Onglet Commentaires -->
            <button type="submit" name="active_tab" value="tab2"
                class="tab-btn <?= $activeTab === 'tab2' ? 'active' : '' ?>">Commentaires</button>
        </form>
    </div>

    <!-- CONTENU ONGLET 1 : DÉTAILS -->
    <div id="tab1" class="tab-content <?= $activeTab === 'tab1' ? 'active' : '' ?>">
        <h2>Détails du produit</h2>
        <p>Description complète ici...</p>
    </div>

    <!-- CONTENU ONGLET 2 : COMMENTAIRES -->
    <div id="tab2" class="tab-content <?= $activeTab === 'tab2' ? 'active' : '' ?>">
        <h2>Commentaires</h2>

        <!-- Champ pour filtrer dynamiquement les commentaires -->
        <label for="commentFilter">Filtrer les commentaires :</label>
        <input type="text" id="commentFilter" placeholder="Ex : Alice, Bob...">

        <!-- Liste de commentaires -->
        <ul id="commentsList">
            <li data-author="Alice">Alice: Super produit !</li>
            <li data-author="Bob">Bob: Pas mal.</li>
            <li data-author="Alice">Alice: Recommande vivement.</li>
            <li data-author="Charlie">Charlie: À voir sur la durée.</li>
        </ul>
    </div>

    <script>
        // JS pour filtrer les commentaires en temps réel

        // On sélectionne le champ de filtre par son identifiant et on écoute l'événement "input" 
        // (chaque fois que l'utilisateur tape quelque chose)
        document.getElementById('commentFilter').addEventListener('input', function() {

            // On récupère le texte saisi par l'utilisateur et on le transforme en minuscules 
            // pour une comparaison insensible à la casse
            const filter = this.value.toLowerCase();

            // On sélectionne tous les éléments <li> à l'intérieur de la liste des commentaires (id "commentsList")
            const comments = document.querySelectorAll('#commentsList li');

            // Pour chaque commentaire dans la liste...
            comments.forEach(comment => {

                // On récupère le texte du commentaire et on le convertit aussi en minuscules
                const text = comment.textContent.toLowerCase();

                // Si le texte contient la chaîne tapée (filtre), on affiche le commentaire ; sinon, on le cache
                comment.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>

</html>