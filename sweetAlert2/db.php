<?php

try {
    // Création d'une connexion à la base de données 'sweetalert' avec l'utilisateur 'root' et le mot de passe 'root'
    $db = new PDO(
        'mysql:host=localhost;dbname=sweet_alert', // Hôte (localhost) et nom de la base de données
        'admin', // Nom d'utilisateur MySQL
        'resu_ass', // Mot de passe MySQL
        [
            // Déclenche une exception en cas d'erreur (plutôt qu'un avertissement)
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

            // Active la connexion persistante (garde la connexion ouverte entre les requêtes)
            PDO::ATTR_PERSISTENT => true,

            // Les résultats des requêtes seront retournés sous forme d'objets 
           // (plutôt que tableaux associatifs ou numériques)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]
    );
}
catch (Exception $e) {
    // En cas d'erreur lors de la connexion, afficher le message d'erreur et arrêter le script
    echo 'Erreur : ' . $e->getMessage();
    exit;
}
