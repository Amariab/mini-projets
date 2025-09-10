<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statut du Paiement</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        h1 { color: #333; }
        .success { color: green; }
        .error { color: red; }
        .warning { color: orange; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Statut de votre paiement</h1>
        <?php if (isset($status)): ?>
            <p class="<?= esc($status) ?>"><?= esc($message) ?></p>
        <?php else: ?>
            <p class="warning">Aucun statut de paiement disponible.</p>
        <?php endif; ?>
        <a href="<?= base_url() ?>">Retour à l'accueil</a>
    </div>
</body>
</html>