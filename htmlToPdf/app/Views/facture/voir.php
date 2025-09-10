<!DOCTYPE html>
<html>
<head>
    <title>Facture <?= esc($facture['numero_facture']) ?></title>
    <style>
        body { font-family: sans-serif; }
        .box { border: 1px solid #ccc; padding: 15px; width: 600px; margin: auto; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Facture <?= esc($facture['numero_facture']) ?></h1>
        <p><strong>Date :</strong> <?= $facture['date_facture'] ?></p>
        <p><strong>Client :</strong> <?= esc($facture['client_nom']) ?></p>
        <p><strong>Adresse :</strong><br><?= nl2br(esc($facture['client_adresse'])) ?></p>
        <hr>
        <p><strong>Total HT :</strong> <?= $facture['total_ht'] ?> €</p>
        <p><strong>TVA :</strong> <?= $facture['total_tva'] ?> €</p>
        <p><strong>Total TTC :</strong> <?= $facture['total_ttc'] ?> €</p>
    </div>
</body>
</html>
