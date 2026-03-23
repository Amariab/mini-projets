<?php
use Dotenv\Dotenv;
use Stripe\Stripe;

// -----------------------------------------------------------------------------
// 1. Charger l'autoloader de Composer
// -----------------------------------------------------------------------------
// Ce fichier est généré automatiquement par Composer.
// Il permet d'utiliser les bibliothèques installées (comme phpdotenv ou Stripe)
// sans avoir à faire des require manuels pour chaque classe.
require_once __DIR__ . '/vendor/autoload.php';

// -----------------------------------------------------------------------------
// 2. Charger les variables d'environnement depuis le fichier .env
// -----------------------------------------------------------------------------
// On utilise la bibliothèque phpdotenv pour lire le fichier .env
// et injecter les variables dans l'environnement PHP (getenv(), $_ENV, $_SERVER).
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// -----------------------------------------------------------------------------
// 3. Récupérer la clé secrète Stripe depuis les variables d'environnement
// -----------------------------------------------------------------------------
// getenv() permet de récupérer la valeur définie dans le fichier .env.
// Exemple dans .env : STRIPE_SECRET_KEY=sk_test_xxxxx
$stripeSecretKey = getenv('STRIPE_SECRET_KEY');

// -----------------------------------------------------------------------------
// 4. Vérifier que la clé existe
// -----------------------------------------------------------------------------
// Si la clé n'est pas définie ou est vide, on arrête le script pour éviter
// d'utiliser Stripe sans authentification (ce qui provoquerait une erreur).
if (!$stripeSecretKey) {

    // Code HTTP 500 = erreur serveur
    http_response_code(500);

    // Retour d'une réponse JSON claire pour le développeur ou l'API
    echo json_encode([
        "error" => "Clé API Stripe manquante dans le fichier .env"
    ]);

    // On stoppe l'exécution du script
    exit;
}

// -----------------------------------------------------------------------------
// 5. Initialiser Stripe avec la clé secrète
// -----------------------------------------------------------------------------
// On configure la bibliothèque Stripe pour que toutes les requêtes
// utilisent automatiquement cette clé d'authentification.
\Stripe\Stripe::setApiKey($stripeSecretKey);