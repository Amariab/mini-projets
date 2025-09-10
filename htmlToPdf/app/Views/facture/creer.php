<!DOCTYPE html>
<html>
<head>
    <title>Créer une Facture</title>
</head>
<body>
    <h2>Nouvelle facture</h2>
    <?= form_open('facture/enregistrer') ?>
        <input type="text" name="numero_facture" placeholder="Numéro" required><br>
        <input type="date" name="date_facture" required><br>
        <input type="text" name="client_nom" placeholder="Nom client" required><br>
        <textarea name="client_adresse" placeholder="Adresse client" required></textarea><br>
        <input type="number" step="0.01" name="total_ht" placeholder="Total HT" required><br>
        <input type="number" step="0.01" name="total_tva" placeholder="TVA" required><br>
        <input type="number" step="0.01" name="total_ttc" placeholder="Total TTC" required><br>
        <button type="submit">Enregistrer</button>
     <?= form_close() ?>

    <a href="<?= base_url('facture') ?>">Retour à la liste des factures</a>
</body>
</html>
