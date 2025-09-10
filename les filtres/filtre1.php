<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtre par catégorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            margin-bottom: 20px;
        }
        label, select, button {
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
// Données simulées (souvent issues d'une base de données)
$produits = [
    ['nom' => 'Pomme', 'categorie' => 'Fruits'],
    ['nom' => 'Carotte', 'categorie' => 'Légumes'],
    ['nom' => 'Banane', 'categorie' => 'Fruits'],
];

// Si une catégorie est sélectionnée, on la récupère depuis l'URL
$categorie = $_GET['categorie'] ?? '';
?>

<!-- Formulaire de filtre -->
<form method="get">
    <label for="categorie">Filtrer par catégorie :</label>
    <select name="categorie" id="categorie">
        <option value="">Toutes</option>
        <option value="Fruits" <?= $categorie == 'Fruits' ? 'selected' : '' ?>>Fruits</option>
        <option value="Légumes" <?= $categorie == 'Légumes' ? 'selected' : '' ?>>Légumes</option>
    </select>
    <button type="submit">Filtrer</button>
</form>

<!-- Liste des produits filtrés -->
<ul>
<?php
// Parcours des produits et affichage selon le filtre sélectionné
foreach ($produits as $p) {
    if ($categorie == '' || $p['categorie'] == $categorie) {
        echo "<li>{$p['nom']} ({$p['categorie']})</li>";
    }
}
?>
</ul>

</body>
</html>
