<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtrer et trier les produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        form {
            margin-bottom: 1.5rem;
        }
        input, select {
            margin-right: 1rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<?php
// Liste de produits simulée (normalement, elle viendrait d'une base de données)
$produits = [
    ['nom' => 'Pomme', 'categorie' => 'Fruits', 'prix' => 1.2],
    ['nom' => 'Carotte', 'categorie' => 'Légumes', 'prix' => 1.8],
    ['nom' => 'Mangue', 'categorie' => 'Fruits', 'prix' => 2.5],
];

// On récupère le terme de recherche dans l'URL (champ texte), ou une chaîne vide si non défini
$recherche = $_GET['recherche'] ?? '';

// On récupère le critère de tri dans l'URL (asc ou desc), ou 'asc' par défaut
$tri = $_GET['tri'] ?? 'asc';

// Filtrage : on garde les produits dont le nom contient le texte recherché (insensible à la casse)
$resultats = array_filter($produits, function($p) use ($recherche) {
    return stripos($p['nom'], $recherche) !== false;
});

// Tri des résultats filtrés selon le prix, en ordre croissant ou décroissant
usort($resultats, function($a, $b) use ($tri) {
    // Si 'asc', tri croissant, sinon décroissant
    return $tri == 'asc' ? $a['prix'] <=> $b['prix'] : $b['prix'] <=> $a['prix'];
});
?>

<!-- Formulaire de recherche et tri -->
<form method="get">
    <!-- Champ de texte pour rechercher un produit par nom -->
    <input type="text" name="recherche" placeholder="Recherche" value="<?= htmlspecialchars($recherche) ?>">

    <!-- Menu déroulant pour choisir le type de tri -->
    <select name="tri">
        <option value="asc" <?= $tri == 'asc' ? 'selected' : '' ?>>Prix croissant</option>
        <option value="desc" <?= $tri == 'desc' ? 'selected' : '' ?>>Prix décroissant</option>
    </select>

    <!-- Bouton de soumission du formulaire -->
    <button type="submit">Filtrer</button>
</form>

<!-- Affichage de la liste filtrée et triée -->
<ul>
<?php
// Parcours de chaque produit après filtrage et tri
foreach ($resultats as $p) {
    echo "<li>{$p['nom']} ({$p['categorie']}) - {$p['prix']} €</li>";
}
?>
</ul>

</body>
</html>
