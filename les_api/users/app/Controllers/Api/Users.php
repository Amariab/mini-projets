<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    public function index()
    {
        // Ici on crée directement un tableau d'utilisateurs
        // dans le code, sans utiliser de base de données
        // Donc pas de modèle ni de requêtes SQL, juste un tableau PHP

        $users = [
            [
                "id" => 1,
                "name" => "Jean Dupont",
                "email" => "jean@email.com"
            ],
            [
                "id" => 2,
                "name" => "Marie Martin",
                "email" => "marie@email.com"
            ],
            [
                "id" => 3,
                "name" => "Paul Durand",
                "email" => "paul@email.com"
            ]
        ];
        // -----------------------------
        // Retourner les données en JSON
        // -----------------------------
        // respond() transforme automatiquement le tableau PHP
        // en réponse JSON pour l'API

        return $this->respond($users);

    }

    public function show($id = null)
    {
        $users = [
            ["id" => 1, "name" => "Jean Dupont"],
            ["id" => 2, "name" => "Marie Martin"],
            ["id" => 3, "name" => "Paul Durand"]
        ];

        foreach ($users as $user) {
            if ($user["id"] == $id) {
                return $this->respond($user);
            }
        }

        return $this->failNotFound("Utilisateur non trouvé");
    }

}