<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtre en direct avec JavaScript</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        input {
            font-size: 1rem;
            padding: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <!-- Champ texte pour filtrer -->
    <input type="text" id="filtre" placeholder="Filtrer par nom...">

    <!-- Liste des produits -->
    <ul id="produits">
        <li>Pomme</li>
        <li>Carotte</li>
        <li>Mangue</li>
    </ul>

    <script>
        // Récupère le champ de filtre et les éléments de la liste
        const filtre = document.getElementById('filtre');
        const items = document.querySelectorAll('#produits li');

        // À chaque frappe au clavier dans le champ texte...
        filtre.addEventListener('keyup', function() {
            // On récupère le texte tapé (en minuscule)
            const texte = this.value.toLowerCase();

            // Pour chaque élément de la liste
            items.forEach(item => {
                // On récupère le nom de l'élément (en minuscule)
                const nom = item.textContent.toLowerCase();

                // Si le texte est inclus dans le nom → on affiche, sinon on cache
                item.style.display = nom.includes(texte) ? '' : 'none';
            });
        });
    </script>

</body>
</html>
