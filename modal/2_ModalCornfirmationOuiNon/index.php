<!doctype html>
<html lang="fr">

<head>
    <!-- Déclare le document en HTML5 -->
    <meta charset="utf-8">
    <!-- Encode les caractères en UTF-8 pour gérer les accents -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Rend la page responsive sur mobile -->
    <title>Mini projet 2 : Modal de confirmation</title>
    <!-- Titre affiché dans l’onglet du navigateur -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Charge Bootstrap 5 en CSS via CDN -->
</head>

<body>

    <div class="container py-5">
        <!-- Conteneur Bootstrap avec un peu d’espace en haut et en bas -->

        <h1 class="mb-4">Exemple de confirmation</h1>
        <!-- Titre principal de la page -->

        <button type="button"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#modalConfirmation">
            <!-- Bouton rouge qui ouvre la modal -->
            Supprimer
        </button>

        <div class="mt-4">
            <!-- Zone qui affichera le message de résultat -->

            <div id="messageAction" class="alert alert-secondary mb-0">
                <!-- Message par défaut avant clic -->
                Aucune action n’a encore été confirmée.
            </div> <!-- Zone de message avec un style neutre initialement -->
        </div><!-- Fin de la zone de message -->

    </div><!-- Fin du conteneur principal -->

    <div class="modal fade"
        id="modalConfirmation"
        tabindex="-1"
        aria-labelledby="modalConfirmationLabel"
        aria-hidden="true">
        <!-- Début de la modal Bootstrap -->
        <!-- fade ajoute une animation d’apparition -->
        <!-- id utilisé par data-bs-target -->

        <div class="modal-dialog modal-dialog-centered">
            <!-- modal-dialog crée la boîte de dialogue -->
            <!-- modal-dialog-centered centre la modal verticalement -->

            <div class="modal-content">
                <!-- Contenu visuel de la modal -->

                <div class="modal-header">
                    <!-- En-tête de la modal -->

                    <h5 class="modal-title" id="modalConfirmationLabel">
                        Confirmation de suppression
                    </h5>
                    <!-- Titre de la modal -->

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer">
                        <!-- Bouton croix pour fermer la modal -->
                    </button>
                </div><!-- Fin de l’en-tête de la modal -->

                <div class="modal-body">
                    <!-- Corps de la modal -->

                    <p class="mb-0">
                        Voulez-vous vraiment supprimer cet élément ?
                    </p>
                </div><!-- Fin du corps de la modal -->

                <div class="modal-footer">
                    <!-- Pied de la modal avec les boutons -->

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <!-- Bouton Annuler qui ferme simplement la modal -->

                    <button type="button" class="btn btn-danger" id="btnConfirmer">
                        Confirmer
                    </button>
                    <!-- Bouton Confirmer qui déclenche l’action JavaScript -->
                </div><!-- Fin du pied de la modal -->
            </div><!-- Fin du contenu de la modal -->
        </div><!-- Fin de la boîte de dialogue -->
    </div><!-- Fin de la modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Charge le JavaScript Bootstrap, nécessaire pour le fonctionnement de la modal -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attend que tout le HTML soit chargé avant d’exécuter le script

            const boutonConfirmer = document.getElementById('btnConfirmer');
            // Récupère le bouton "Confirmer"

            const messageAction = document.getElementById('messageAction');
            // Récupère la zone où afficher le message

            const modalElement = document.getElementById('modalConfirmation');
            // Récupère l’élément de la modal

            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
            // Crée ou récupère l’instance Bootstrap de la modal

            boutonConfirmer.addEventListener('click', function() {
                // Écoute le clic sur le bouton "Confirmer"

                messageAction.className = 'alert alert-success mb-0';
                // Change le style du message pour indiquer une action réussie

                messageAction.textContent = 'Suppression confirmée : action simulée avec succès.';
                // Remplace le texte du message dans la page

                modalInstance.hide();
                // Ferme la modal après confirmation
            });
        });
    </script>
</body>

</html>