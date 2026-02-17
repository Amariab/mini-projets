<?php

require_once 'functions.php'; 
// Inclut le fichier "functions.php" une seule fois.
// Ce fichier contient la fonction "uploadFileRenameAndMoveIntoServer()" utilisée plus bas.
// "require_once" arrête le script si le fichier n’existe pas (contrairement à include).

// Définir une implémentation de secours si la fonction est absente dans functions.php
if (!function_exists('uploadFileRenameAndMoveIntoServer')) {
    /**
     * Déplace et renomme un fichier uploadé dans uploads/petite_annonce/
     * Retourne le chemin relatif vers le fichier déplacé ou false en cas d'erreur.
     */
    function uploadFileRenameAndMoveIntoServer(array $file, $annonce_id)
    {
        // Types MIME autorisés
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        if (empty($file['type']) || !in_array($file['type'], $allowed, true)) {
            return false;
        }

        // Dossier de destination
        $uploadsDir = __DIR__ . '/uploads/petite_annonce';
        if (!is_dir($uploadsDir) && !mkdir($uploadsDir, 0755, true)) {
            return false;
        }

        // Extension et nom de fichier propre
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $safeAnnounceId = preg_replace('/[^A-Za-z0-9_-]/', '_', (string)$annonce_id);
        try {
            $random = bin2hex(random_bytes(4));
        } catch (Exception $e) {
            $random = substr(md5(uniqid('', true)), 0, 8);
        }
        $newName = $safeAnnounceId . '_' . time() . '_' . $random . '.' . $ext;
        $destination = $uploadsDir . '/' . $newName;

        // Déplacer le fichier uploadé
        if (!isset($file['tmp_name']) || !move_uploaded_file($file['tmp_name'], $destination)) {
            return false;
        }

        // Retourner un lien relatif utilisable dans les pages
        return 'uploads/petite_annonce/' . $newName;
    }
}


// Vérifie si un fichier a bien été envoyé via le formulaire HTML
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    /*
    isset() vérifie si une variable est définie et n’est pas NULL.
    $_FILES est une superglobale PHP qui contient les fichiers envoyés par le formulaire.
    - $_FILES['image'] contient toutes les informations sur le fichier envoyé (nom, type, taille, emplacement temporaire, etc.)
    - $_FILES['image']['error'] contient un code d’erreur lié à l’upload (UPLOAD_ERR_OK = 0 → aucun problème).
    Donc cette condition vérifie :
      1️⃣ qu’un fichier "image" a bien été envoyé,
      2️⃣ et qu’il n’y a eu aucune erreur pendant l’upload.
    */

    $fichier = $_FILES['image'];
    // On stocke les informations du fichier dans une variable $fichier pour plus de lisibilité.

    $annonce_id = $_POST['annonce_id'];
    // On récupère l’ID de l’annonce envoyé dans le formulaire (champ texte "annonce_id").

    // Appel de la fonction d'upload
  $image_lien = uploadFileRenameAndMoveIntoServer($fichier, $annonce_id);
    /*
    On appelle la fonction définie dans "functions.php".
    Cette fonction :
      - vérifie le type de fichier,
      - crée le dossier de destination si besoin,
      - renomme le fichier proprement,
      - déplace le fichier dans le dossier "uploads/petite_annonce/",
      - puis renvoie le nouveau nom du fichier.
    Le résultat (le nom du fichier final) est stocké dans $image_nom.
    */

    // Exemple de mise à jour (fictive) en BDD
    // Ici tu peux utiliser PDO ou ton propre modèle $this->update(...)
   //  updateAnnonceImage($annonce_id, $image_nom);
    /*
    Cette fonction (définie dans functions.php) simule une mise à jour de la base de données.
    Dans un vrai projet, elle mettrait à jour la table "annonce" en associant l’image au bon ID d’annonce.
    */

    echo "✅ Image uploadée avec succès : <a href='$image_lien' target='_blank'>$image_lien</a>";
    // Si tout s’est bien passé, on affiche un message de succès avec le nom du fichier.

} else {
    // Si aucun fichier n’a été envoyé OU qu’une erreur est survenue pendant l’upload
    echo "❌ Erreur lors de l'envoi du fichier.";
    // Message d’erreur simple à afficher à l’utilisateur.
}

?>

