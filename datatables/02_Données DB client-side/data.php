<?php
// balise d'ouverture PHP : tout ce qui suit est du code serveur

require 'config.php';
// =====================================================
// 1️⃣ Charge le fichier config.php (contient la connexion DB)
// require = "inclut et exécute" le fichier, erreur si introuvable

$pdo = require 'config.php';
// =====================================================
// 2️⃣ Récupère l'objet PDO retourné par config.php
// $pdo = objet connexion MySQL prête à l'emploi
// Pourquoi 2x require ? Erreur courante ! Voir explication en bas *

$stmt = $pdo->query('SELECT * FROM users LIMIT 50');
// =====================================================
// 3️⃣ Exécute une requête SQL
// $pdo->query() = lance SELECT sur table 'users'
// LIMIT 50 = max 50 lignes (client-side performant)
// $stmt = objet "résultat de requête"

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// =====================================================
// 4️⃣ Récupère TOUTES les lignes en tableau PHP
// PDO::FETCH_ASSOC = tableau avec noms colonnes comme clés
// Exemple : ['name'=>'John', 'email'=>'john@test.com', 'age'=>28]
// $users = [ligne1, ligne2, ligne3...]

header('Content-Type: application/json');
// =====================================================
// 5️⃣ Dit au navigateur : "Ceci est du JSON, pas du HTML"
// OBLIGATOIRE pour Ajax/DataTables fonctionne

echo json_encode(['data' => $users]);
// =====================================================
// 6️⃣ Transforme PHP → JSON et l'envoie
// ['data' => $users] = format EXACT exigé par DataTables
// echo = affiche le JSON dans la page (invisible pour humain)
// Fin du script : rien après !
?>