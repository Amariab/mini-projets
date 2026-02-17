
<?php


/**
 * Upload d'une image dans /images/ avec nom personnalisé + uniqid
 
 * Déplace une image uploadée directement dans le dossier /images/
 * et renvoie le lien complet (URL) vers l’image.
 */
function uploadFileRenameAndMoveIntoServer(array $file, $annonce_id)
{
    // Dossier où les images seront stockées
    // Pour plus de sécurité, on utilise __DIR__ pour obtenir le chemin absolu du dossier courant.
    // Cela évite les problèmes liés aux chemins relatifs.
    // Ici, on choisit de stocker les images dans un dossier "images" à la racine du projet.
    // __DIR__ est une constante magique de PHP (comme un mot-clé réservé).
    // Elle contient le chemin complet du dossier dans lequel se trouve le script en cours d’exécution.
    // On trouve le dossier images à la racine du projet pour que les images soient accessibles publiquement via l’URL.

    // On peut aussi définir une constante BASE_DIR dans un fichier de configuration.

    // $dossier_destination = _DIR_ . "/images/" ;
    $target_dir = __DIR__ . "/images/";
    // echo __DIR__; // Affiche le chemin absolu du dossier courant pour vérification

    // Crée le dossier s’il n’existe pas
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Vérifie le type MIME
    // mime = type = type de contenu du fichier (ex: image/jpeg)
    // in_array() vérifie si une valeur existe dans un tableau
    // throw new Exception = lance une exception en cas d’erreur
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowed_types)) {
        throw new Exception("Type de fichier non autorisé !");
    }

    // Récupère l’extension du fichier (ex: jpg)
    // strtolower() convertit une chaîne en minuscules
    // pathinfo() retourne des informations sur le chemin d’un fichier
    // PATHINFO_EXTENSION retourne l’extension du fichier
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Crée un nom unique : annonce + id + uniqid
    $nouveau_nom = 'image_' . $annonce_id . '_' . uniqid() . '.' . $extension;

    // Chemin complet sur le serveur
    $target_path = $target_dir . $nouveau_nom;

    // Déplace le fichier
    if (!move_uploaded_file($file['tmp_name'], $target_path)) {
        throw new Exception("Erreur lors du déplacement du fichier.");
    }

    // Génère le lien complet (URL publique)
    $base_url = getBaseUrl();
    return $base_url . "/images/" . $nouveau_nom;
}

/**
 * Retourne l’URL de base du site
 */
function getBaseUrl()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    return $protocol . "://" . $host . $base;
}

/**
 * Simule une mise à jour en base (exemple)
 */
function updateAnnonceImage($id_annonce, $image_url)
{
    echo "💾 Mise à jour de l’annonce #$id_annonce avec : $image_url<br>";
}
