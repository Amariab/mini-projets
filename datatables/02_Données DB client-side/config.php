<?php
/**
 * Fichier de configuration : connexion à la base MySQL
 * Bonne pratique : centraliser les connexions PDO
 */
return new PDO(
    'mysql:host=localhost;dbname=demo_datatables',   // DSN (Data Source Name)
    'root',                                         // Utilisateur MySQL
    'mamama13',                                     // Mot de passe
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]   
    // Erreurs visibles si problème
);
/**
 * return new PDO() = retourne l'objet connexion
 * Autres fichiers font : $pdo = require 'config.php';
 */
?>