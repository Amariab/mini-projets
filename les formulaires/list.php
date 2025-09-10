<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/liste.css">
    <title>Liste utilisateurs</title>
</head>

<body>

    <h1>Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Sexe</th>
            </tr>
        </thead>

        <?php
        include "cnx.php"; // Connexion à la base de données    

        // Requête pour récupérer les utilisateurs
        $req = mysqli_query($link, "SELECT * FROM user");

        while ($res = mysqli_fetch_array($req)) {
        ?>
        <tbody>
            <tr>
                <td> <?php echo  $res['id']; ?> </td>
                <td> <?php echo  $res['nom']; ?> </td>
                <td> <?php echo  $res['prenom']; ?> </td>
                <td> <?php echo  $res['telephone']; ?> </td>
                <td> <?php echo  $res['email']; ?> </td>
                <td> <?php echo  $res['sexe']; ?> </td>

            </tr>
            </tbody>

        <?php
        }

        ?>

        <tfoot>
            <tr>
                <td colspan="6">
                   
                </td>
            </tr>
        </tfoot>


    </table>

</body>

</html>