<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        form {
            margin-bottom: 1.5rem;
        }
        label {
            margin-right: 0.5rem;
        }
        select, input {
            margin-right: 1rem;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            padding: 0.3rem 0;
        }
    </style>
</head>
<body>

<?php
$produits = [
    ['nom' => 'Pomme', 'categorie' => 'Fruits', 'prix' => 1.2],
    ['nom' => 'Carotte', 'categorie' => 'Légumes', 'prix' => 0.8],
    ['nom' => 'Mangue', 'categorie' => 'Fruits', 'prix' => 2.5],
];

$categorie = $_GET['categorie'] ?? '';
$prix_max = $_GET['prix_max'] ?? '';
?>

<h1>Filtrer les produits</h1>

<form method="get">
    <label for="categorie">Catégorie :</label>
    <select name="categorie" id="categorie">
        <option value="">Toutes</option>
        <option value="Fruits" <?= $categorie == 'Fruits' ? 'selected' : '' ?>>Fruits</option>
        <option value="Légumes" <?= $categorie == 'Légumes' ? 'selected' : '' ?>>Légumes</option>
    </select>

    <label for="prix_max">Prix max :</label>
    <input type="number" name="prix_max" id="prix_max" step="0.01" value="<?= htmlspecialchars($prix_max) ?>">

    <button type="submit">Filtrer</button>
</form>

<h2>Produits disponibles :</h2>
<ul>
<?php
$aucun_resultat = true;

foreach ($produits as $p) {
    if (
        ($categorie == '' || $p['categorie'] == $categorie) &&
        ($prix_max == '' || $p['prix'] <= floatval($prix_max))
    ) {
        echo "<li>{$p['nom']} ({$p['categorie']}) - {$p['prix']} €</li>";
        $aucun_resultat = false;
    }
}

if ($aucun_resultat) {
    echo "<li>Aucun produit ne correspond aux critères.</li>";
}
?>
</ul>

</body>
</html>

