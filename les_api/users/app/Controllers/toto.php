<?php
// On crée notre propre type d'erreur pour la banque
class SoldeInsuffisantException extends Exception {}

function payer($prix) {
    $solde = 50;

    if ($prix > $solde) {
        // On "jette" notre erreur spécifique
        throw new SoldeInsuffisantException("Il vous manque " . ($prix - $solde) . "€.");
    }

    return "Achat réussi !";
}

try {
    echo payer(100);
} 
// On peut attraper spécifiquement ce type d'erreur
catch (SoldeInsuffisantException $e) {
    echo "Désolé : " . $e->getMessage();
    // Ici, on pourrait proposer de recharger le compte
} 
// Et attraper les autres erreurs générales ici
catch (Exception $e) {
    echo "Une erreur inconnue est survenue.";
}
?>