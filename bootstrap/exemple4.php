<?php
// exemple4.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
        </div>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>
</div>
</body>
</html>