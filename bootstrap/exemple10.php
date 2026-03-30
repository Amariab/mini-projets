<?php
$articles = [
    ["titre" => "Article 1", "texte" => "Contenu de l'article 1"],
    ["titre" => "Article 2", "texte" => "Contenu de l'article 2"],
    ["titre" => "Article 3", "texte" => "Contenu de l'article 3"]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page complète Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">MonSite</a>
  </div>
</nav>

<!-- Contenu principal -->
<div class="container mt-5">
    <div class="row">
        <?php foreach($articles as $art): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $art['titre']; ?></h5>
                    <p class="card-text"><?php echo $art['texte']; ?></p>
                    <a href="#" class="btn btn-primary">Lire plus</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; 2026 MonSite
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>