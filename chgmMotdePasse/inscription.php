<?php
// Vérifie si le formulaire a été soumis avec la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère le pseudo saisi par l'utilisateur et supprime les espaces inutiles
    $pseudo = trim($_POST['pseudo']);
    // Récupère le mot de passe saisi (sans trim car les espaces peuvent faire partie du mot de passe)
    $motDePasse = $_POST['mot_de_passe'];

    // Vérifie que les deux champs ne sont pas vides
    if (!empty($pseudo) && !empty($motDePasse)) {
        // Connexion à la base de données (remplacer ta_base par le vrai nom)
        $pdo = new PDO("mysql:host=localhost;dbname=membres;charset=utf8", "root", "mamama13");

        // Prépare une requête pour vérifier si le pseudo existe déjà dans la table
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        
        // Si un résultat est trouvé, on arrête et on informe que le pseudo est pris
        if ($stmt->fetch()) {
            echo "Ce pseudo est déjà pris.";
            exit;
        }

        // Crée un hash sécurisé du mot de passe
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

        // Prépare la requête d'insertion du nouvel utilisateur avec le hash du mot de passe
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (pseudo, mot_de_passe) VALUES (?, ?)");
        
        // Exécute la requête et affiche un message selon le résultat
        if ($stmt->execute([$pseudo, $hash])) {
            echo "Inscription réussie.";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
}
?>
<!-- Formulaire HTML d'inscription -->
<form method="POST">
    Pseudo : <input type="text" name="pseudo" required><br>
    Mot de passe : <input type="password" name="mot_de_passe" required><br>
    <button type="submit">S'inscrire</button>
</form>
<a href="changer_mot_de_passe.php">Changer le mot de passe</a>

