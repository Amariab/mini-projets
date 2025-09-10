<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtrer les produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        select, input {
            font-size: 1rem;
            margin-right: 1rem;
            padding: 0.4rem;
        }
        ul {
            margin-top: 1.5rem;
            list-style: none;
            padding: 0;
        }
        li {
            padding: 0.5rem;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h2>Filtrer les produits</h2>

    <!-- Menu de sélection de la catégorie -->
    <select id="categorie">
        <option value="">Toutes</option>
        <option value="Fruits">Fruits</option>
        <option value="Légumes">Légumes</option>
    </select>

    <!-- Champ pour le prix maximum -->
    <input type="number" id="prix" placeholder="Prix max">

    <!-- Liste des produits -->
    <ul id="produits">
        <li data-categorie="Fruits" data-prix="1.2">Pomme - 1.2€</li>
        <li data-categorie="Légumes" data-prix="0.8">Carotte - 0.8€</li>
        <li data-categorie="Fruits" data-prix="2.5">Mangue - 2.5€</li>
    </ul>

    <script>
        // Récupération des éléments HTML
        const selectCat = document.getElementById('categorie');
        const inputPrix = document.getElementById('prix');
        const produits = document.querySelectorAll('#produits li');

        // Fonction qui filtre les produits selon catégorie et prix
        function filtrer() {
            const cat = selectCat.value; // valeur sélectionnée (ex : "Fruits")
            const max = parseFloat(inputPrix.value) || Infinity; // prix max ou infini si vide

            produits.forEach(p => {
                const pCat = p.dataset.categorie; // catégorie du produit
                const pPrix = parseFloat(p.dataset.prix); // prix du produit

                // Condition de visibilité : bonne catégorie ET prix <= max
                const visible = (!cat || pCat === cat) && pPrix <= max;

                // Affiche ou cache l'élément selon la condition
                p.style.display = visible ? '' : 'none';
            });
        }

        // Appelle la fonction à chaque changement
        selectCat.addEventListener('change', filtrer);
        inputPrix.addEventListener('input', filtrer);
    </script>

</body>
</html>
