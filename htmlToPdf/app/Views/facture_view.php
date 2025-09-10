<!DOCTYPE html>
<html>
<head>
    <!-- Titre de l'onglet dans le navigateur -->
    <title>Liste des factures</title>
</head>
<body>
    <!-- Titre principal affiché sur la page -->
    <h1>Factures valides</h1>

    <!-- Début d’un tableau avec bordures visibles et un espacement intérieur de 8px -->
    <table border="1" cellpadding="8">
        <!-- En-tête du tableau -->
        <thead>
            <tr>
                <!-- Titres des colonnes -->
                <th>Numéro</th>
                <th>Client</th>
                <th>Montant</th>
                <th>Date</th>
                <th>PDF</th> <!-- Colonne pour le lien de téléchargement du PDF -->
            </tr>
        </thead>
        <!-- Corps du tableau -->
        <tbody>
            <!-- Boucle PHP sur toutes les factures disponibles -->
            <?php foreach ($factures as $facture): ?>
            <tr>
                <!-- Affiche le numéro de la facture, en échappant les caractères spéciaux -->
                <td><?= esc($facture['numero']) ?></td>

                <!-- Affiche le nom du client -->
                <td><?= esc($facture['client']) ?></td>

                <!-- Affiche le montant suivi du symbole euro -->
                <td><?= esc($facture['montant']) ?> €</td>

                <!-- Affiche la date d'émission -->
                <td><?= esc($facture['date_emission']) ?></td>

                <!-- Lien vers la génération du PDF de la facture -->
                <td>
                    <a href="<?= site_url('facture/pdf/' . $facture['id']) ?>">
                        Télécharger
                    </a>
                </td>
            </tr>
            <!-- Fin de la boucle -->
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<!-- Fin du fichier facture_view.php -->
