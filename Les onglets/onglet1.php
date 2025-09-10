<!-- Onglet 1 - Contenu statique avec deux boutons pour changer de vue 
 avec du HTML + CSS + JS
But : Afficher deux boutons pour changer de vue, chaque bouton correspondant à un onglet.
Chaque bouton a un attribut data-tab qui pointe vers l’id du contenu à afficher.
Le contenu de l’onglet est dans des <div> avec un id correspondant à data-tab des boutons.
Par défaut, le bouton 1 et son contenu sont "actifs" (class="active"). 
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Onglets Simple</title>

    <!-- STYLE CSS POUR DES ONGLETS SIMPLES -->
    <style>
        /* Style basique des onglets */
        .tabs-simple button {
            padding: 8px 15px;
            /* Ajoute un espacement intérieur aux boutons */
            border: none;
            /* Supprime la bordure par défaut du bouton */
            background: #eee;
            /* Définit un fond gris clair pour les boutons */
            cursor: pointer;
            /* Change le curseur en main au survol */
        }

        .tabs-simple button.active {
            background: #007bff;
            /* Fond bleu pour le bouton actif */
            color: white;
            /* Texte en blanc pour le bouton actif */
        }

        .tab-content {
            display: none;
            /* Cache les contenus des onglets par défaut */
            margin-top: 10px;
            /* Espace au-dessus du contenu pour aérer */
        }

        .tab-content.active {
            display: block;
            /* Affiche uniquement le contenu de l’onglet actif */
        }
    </style>
</head>

<body>

    <!-- Simple Onglets sans PHP dynamique -->

    <div class="tabs-simple">
        <button class="tab-btn active" data-tab="tab1">Onglet 1</button>
        <button class="tab-btn" data-tab="tab2">Onglet 2</button>
    </div>

    <div id="tab1" class="tab-content active">
        <p>Contenu de l’onglet 1.</p>
    </div>
    <div id="tab2" class="tab-content">
        <p>Contenu de l’onglet 2.</p>
    </div>

    <script>
        // JS pour gérer le clic sur les onglets
        document.querySelectorAll('.tabs-simple .tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                // On enlève la classe active de tous les boutons et contenus
                document.querySelectorAll('.tabs-simple .tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

                // On active le bouton cliqué
                btn.classList.add('active');
                // On active le contenu lié
                document.getElementById(btn.dataset.tab).classList.add('active');
            });
        });

     
    </script>

</body>

</html>