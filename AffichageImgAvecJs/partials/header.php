<?php
  // Définir $pageTitle et $active dans chaque vue
  if (!isset($pageTitle)) { $pageTitle = "Mini projet 3 vues"; }
  if (!isset($active)) { $active = ""; }
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <link rel="stylesheet" href="/assets/style.css" />
</head>
<body data-image-index="<?= isset($imageIndex) ? (int)$imageIndex : -1 ?>">
  <header class="site-header">
    <h1>Mini projet : 3 vues PHP + JS</h1>
    <nav class="nav">
      <a class="<?= $active==='v1'?'active':'' ?>" href="/view1.php">Image 1</a>
      <a class="<?= $active==='v2'?'active':'' ?>" href="/view2.php">Image 2</a>
      <a class="<?= $active==='v3'?'active':'' ?>" href="/view3.php">Image 3</a>
    </nav>
  </header>
  <main class="container">
