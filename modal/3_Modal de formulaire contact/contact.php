<?php
// Indique au navigateur que la réponse sera au format JSON
header('Content-Type: application/json; charset=utf-8');

// Récupère le nom envoyé par le formulaire et supprime les espaces inutiles
$nom = trim($_POST['nom'] ?? '');

// Récupère l’email envoyé par le formulaire et supprime les espaces inutiles
$email = trim($_POST['email'] ?? '');

// Récupère le message envoyé par le formulaire et supprime les espaces inutiles
$message = trim($_POST['message'] ?? '');

// Crée un tableau vide pour stocker les erreurs
$erreurs = [];

// Vérifie que le nom n’est pas vide
if ($nom === '') {
    $erreurs[] = 'Le nom est obligatoire.';
}

// Vérifie que l’email n’est pas vide
if ($email === '') {
    $erreurs[] = 'L’email est obligatoire.';
}

// Vérifie que l’email a un format valide
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = 'L’email est invalide.';
}

// Vérifie que le message est assez long
if (mb_strlen($message) < 10) {
    $erreurs[] = 'Le message doit contenir au moins 10 caractères.';
}

// Si une erreur existe, renvoie une réponse JSON d’échec
if (!empty($erreurs)) {
    echo json_encode([
        'status' => 'error',
        'message' => implode(' ', $erreurs)
    ]);
    exit;
}

// Renvoie une réponse JSON de succès
echo json_encode([
    'status' => 'ok',
    'message' => 'Envoyé !'
]);