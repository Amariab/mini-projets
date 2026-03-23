<?php

// -----------------------------------------------------------------------------
// 1Définir le type de réponse HTTP comme JSON
// -----------------------------------------------------------------------------
// Cela indique au navigateur ou à l'application front-end que ce que renvoie le serveur
// n'est pas du HTML mais des données JSON, ce qui permet de les parser correctement.
// Par exemple, si le front-end utilise fetch() pour appeler cette API, il saura que la réponse est du JSON et pourra faire response.json() pour l'analyser.
// header()` est une fonction PHP qui envoie un en-tête HTTP.
// 'Content-Type: application/json'` précise que le contenu renvoyé est du JSON.
// Cela permet au front-end (JavaScript, API, etc.) de lire correctement la réponse.
header('Content-Type: application/json');


// -----------------------------------------------------------------------------
// Charger le fichier de configuration Stripe
// -----------------------------------------------------------------------------
// config.php initialise Stripe avec la clé secrète (depuis .env)
// et configure le SDK Stripe pour pouvoir créer des PaymentIntents.
require_once 'config.php';

try {

    // -------------------------------------------------------------------------
    // Vérifier la méthode HTTP
    // -------------------------------------------------------------------------
    // Les données de paiement doivent être envoyées via POST pour plus de sécurité.
    // Si la requête n'est pas POST, on lève une exception.
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Méthode HTTP invalide");
    }

    // -------------------------------------------------------------------------
    //  Vérifier que le montant a été envoyé
    // -------------------------------------------------------------------------
    // Le frontend doit envoyer un montant (en centimes) via POST.
    if (!isset($_POST['amount'])) {
        throw new Exception("Montant manquant");
    }

    // -------------------------------------------------------------------------
    // Convertir le montant en entier
    // -------------------------------------------------------------------------
    // Stripe exige que le montant soit en centimes (ex: 20,00 € = 2000)
    $amount = intval($_POST['amount']);

    // -------------------------------------------------------------------------
    //  Vérifier que le montant est valide
    // -------------------------------------------------------------------------
    // On ne peut pas créer un paiement avec un montant négatif ou nul
    if ($amount <= 0) {
        throw new Exception("Montant invalide");
    }

    // -------------------------------------------------------------------------
    // Créer un PaymentIntent via Stripe
    // -------------------------------------------------------------------------
    // PaymentIntent représente un paiement côté serveur
    // Il contient toutes les informations nécessaires pour confirmer le paiement
    // côté client avec le client_secret.
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $amount,                     // montant en centimes
        'currency' => 'eur',                      // devise du paiement
        'automatic_payment_methods' => [          // activer automatiquement les méthodes Stripe disponibles
            'enabled' => true
        ]
    ]);

    // -------------------------------------------------------------------------
    // Retourner la réponse JSON avec le client secret
    // -------------------------------------------------------------------------
    // Le client secret est nécessaire côté front-end pour finaliser le paiement.
    echo json_encode([
        "clientSecret" => $paymentIntent->client_secret
    ]);

} catch (\Stripe\Exception\ApiErrorException $e) {

    // -------------------------------------------------------------------------
    // Gérer les erreurs Stripe
    // -------------------------------------------------------------------------
    // Exemple : clé API invalide, montant incorrect ou problème réseau
    // Code HTTP 500 = erreur serveur
    http_response_code(500);

    echo json_encode([
        "error" => "Erreur Stripe : " . $e->getMessage()
    ]);

} catch (Exception $e) {

    // -------------------------------------------------------------------------
    // Gérer toutes les autres exceptions PHP
    // -------------------------------------------------------------------------
    // Exemple : méthode HTTP invalide ou montant manquant
    // Code HTTP 400 = erreur côté client
    http_response_code(400);

    echo json_encode([
        "error" => $e->getMessage()
    ]);
}