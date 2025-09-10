<?php

require 'db.php';

/**  VERIFICATION DES DONNÉES DU FORMULAIRE
 * On vérifie que le champ 'task' n'est pas vide et qu'il contient au moins 3 caractères
 *     Si des erreurs sont détectées, elles sont ajoutées au tableau $errors
 *  Si le tableau $errors n'est pas vide, on renvoie un JSON avec les erreurs
 * Si tout est bon, on ajoute la tâche à la base de données
 * On vérifie que le formulaire a été soumis    
 * et on traite les données soumises
 * on vérifie que le champ 'task' n'est pas vide et qu'il contient au moins 3 caractères
 * Si des erreurs sont détectées, elles sont ajoutées au tableau $errors
 */

if (!empty($_POST)) {


    $errors = [];
    if (empty($_POST['task'])) {
        array_push($errors, 'Le champ tâche est requis.');
    }
    if (strlen($_POST['task']) < 3) {
        array_push($errors, 'Le champ tâche doit contenir au moins 3 caractères.');
    }
    if (!empty($errors)) {
        echo json_encode(['errors' => $errors]);
        exit;
    }

    $task = strip_tags($_POST['task']);
    $req = $db->prepare('INSERT INTO task (content, created_at) VALUES (:content, NOW())');
    $req->execute([':content' => $task]);
    echo json_encode(['success' => 'Tâche ajoutée.']);
    exit;
}

$req = $db->prepare('SELECT * FROM tasks ORDER BY id DESC');
$req->execute();
$tasks = $req->fetchAll();



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Exemple d'utilisation de Sweet Alert pour la gestion des tâches">
    <meta name="author" content="SD_SimpleDev">
    <meta name="keywords" content="Sweet Alert, PHP, To-Do List, Gestion des tâches">
    <title>Sweet Alert</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        #container {
            margin-top: 75px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Sweet Alert</a>
    </nav>

    <div class="container" id="container">
        <div class="starter-template">

            <form action="index.php" method="POST" id="form" class="form-inline">

                <div class="form-group">

                    <!--"name = task" est l'attribut qui permet d'identifier le champ dans le tableau $_POST 
                    Il permet de la vérification des erreurs  plus haut-->
                    <input type="text" name="task" class="form-control" placeholder="Ajouter une tâche" autofocus>
                </div>

                &nbsp;
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>


        </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="app.js"></script>



</body>

</html>