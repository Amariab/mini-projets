<?php
$id = $_GET['id'] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Vue ID</title>
</head>
<body>

<h1>Détails de l'identifiant</h1>

<?php if ($id): ?>
    <p>ID sélectionné : <strong><?= htmlspecialchars($id) ?></strong></p>
<?php else: ?>
    <p>Aucun ID</p>
<?php endif; ?>

<a href="index.php">⬅ Retour</a>

</body>
</html>
