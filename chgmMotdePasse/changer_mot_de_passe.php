<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère le pseudo de l'utilisateur qui veut changer son mot de passe
    $pseudo = trim($_POST['pseudo']);
    // Ancien mot de passe saisi
    $ancien = $_POST['ancien_mdp'];
    // Nouveau mot de passe saisi
    $nouveau = $_POST['nouveau_mdp'];

    // Vérifie que tous les champs sont remplis
    if (!empty($pseudo) && !empty($ancien) && !empty($nouveau)) {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=localhost;dbname=membres;charset=utf8", "root", "mamama13");

        // Recherche le mot de passe hashé actuel dans la base pour ce pseudo
        $stmt = $pdo->prepare("SELECT mot_de_passe FROM utilisateurs WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si aucun utilisateur trouvé ou que l'ancien mot de passe est faux, on arrête
        if (!$user || !password_verify($ancien, $user['mot_de_passe'])) {
            echo "Pseudo ou mot de passe actuel incorrect.";
            exit;
        }

        // Vérifie si le nouveau mot de passe n'est pas déjà un hash pour éviter le double hashage
        $info = password_get_info($nouveau);
        if ($info['algo'] === 0) { // 0 signifie que ce n'est pas un hash reconnu
            $nouveauHash = password_hash($nouveau, PASSWORD_DEFAULT);
        } else {
            $nouveauHash = $nouveau;
        }

        // Met à jour le mot de passe hashé dans la base pour ce pseudo
        $stmt = $pdo->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE pseudo = ?");
        if ($stmt->execute([$nouveauHash, $pseudo])) {
            echo "Mot de passe mis à jour.";
        } else {
            echo "Erreur lors de la mise à jour.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>
<!-- Formulaire HTML de changement de mot de passe -->
<form method="POST">
    Pseudo : <input type="text" name="pseudo" required><br>
    Ancien mot de passe : <input type="password" name="ancien_mdp" required><br>
    Nouveau mot de passe : <input type="password" name="nouveau_mdp" required><br>
    <button type="submit">Changer</button>
</form>

<a href="inscription.php">S'inscrire</a>
