<?php
$message = "Bienvenue sur ma page Bootstrap dynamique !";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Message dynamique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
</div>
</body>
</html>