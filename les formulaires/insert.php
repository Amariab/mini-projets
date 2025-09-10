<?php

include "cnx.php";

if (
    isset($_GET['nom']) &&
    isset($_GET['prenom']) &&
    isset($_GET['telephone']) &&
    isset($_GET['email']) &&
    isset($_GET['sexe'])
) 
{
    // Pour éviter les injections SQL, il est préférable d'utiliser des requêtes préparées
    // Récupération des données du formulaire
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $telephone = $_GET['telephone'];
    $email = $_GET['email'];
    $sexe = $_GET['sexe'];
    


    // Pour insertion dans la base de données
    // On utilise mysqli_query pour exécuter la requête d'insertion
    
    $req = mysqli_query($link, "INSERT INTO user (nom, prenom, telephone, email, sexe) VALUES ('$nom', '$prenom', '$telephone', '$email', '$sexe')");

    if($req) {
        echo "Enregistrement réussi";
    } else {
        echo "Erreur lors de l'enregistrement";
    }   

   
}
