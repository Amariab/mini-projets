<!DOCTYPE html>
<html>
<head>
    <title>Liste des Factures</title>
</head>
<body>
    <h2>Factures</h2>
    <a href="<?= base_url('facture/creer') ?>">Créer une facture</a>
    <ul>
        <?php foreach($factures as $facture): ?>
            <li>
                <?= $facture['numero_facture'] ?> - <?= $facture['client_nom'] ?>
               
                <a href="<?= base_url('facture/voir/' . $facture['id']) ?>" target='_blank'>Voir</a> 
                |
                <a href="<?= base_url('facture/pdf/' . $facture['id']) ?>" target='_blank'>PDF</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
