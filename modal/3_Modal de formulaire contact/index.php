<!doctype html>
<html lang="fr">

<head>
    <!-- Déclare le document en HTML5 -->
    <meta charset="utf-8">
    <!-- Permet d’utiliser les accents et les caractères spéciaux -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Rend la page responsive sur mobile -->
    <title>Mini projet 3 : Modal contact</title>
    <!-- Titre affiché dans l’onglet du navigateur -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Charge Bootstrap 5 en CSS via CDN -->
</head>

<body>

    <div class="container py-5">
        <!-- Conteneur Bootstrap avec espace vertical -->

        <h1 class="mb-4">Formulaire de contact dans une modal</h1>
        <!-- Titre principal de la page -->

        <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalContact">
            <!-- Bouton qui ouvre la modal -->
            Contact
        </button>

        <div class="mt-4">
            <!-- Zone d’affichage du résultat de l’envoi -->

            <div id="messageResultat" class="alert alert-secondary mb-0">
                <!-- Message initial avant soumission -->
                Le formulaire n’a pas encore été envoyé.
            </div> <!-- Zone de message avec style neutre initialement -->

        </div><!-- Fin de la zone de message -->

    </div><!-- Fin du conteneur principal -->

    <div class="modal fade"
        id="modalContact"
        tabindex="-1"
        aria-labelledby="modalContactLabel"
        aria-hidden="true">
        <!-- Début de la modal Bootstrap -->

        <div class="modal-dialog modal-dialog-centered">
            <!-- Centre la modal verticalement -->

            <div class="modal-content">
                <!-- Contenu de la fenêtre modale -->

                <div class="modal-header">
                    <!-- En-tête de la modal -->

                    <h5 class="modal-title" id="modalContactLabel">
                        Formulaire de contact
                    </h5>
                    <!-- Titre de la modal -->

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    <!-- Bouton croix pour fermer la modal -->
                </div><!-- Fin de l’en-tête -->

                <div class="modal-body"> <!-- Corps de la modal -->

                    <form id="formContact"><!-- Formulaire principal -->
 
                        <div class="mb-3">
                            <!-- Groupe de champ avec marge en bas -->

                            <label for="nom" class="form-label">Nom</label>
                            <!-- Label du champ nom -->
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
                            <!-- Champ texte Bootstrap -->
                        </div><!-- Fin du groupe de champ nom -->

                        <div class="mb-3">
                            <!-- Groupe de champ email -->
                            <label for="email" class="form-label">Email</label>
                            <!-- Label du champ email -->
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
                            <!-- Champ email Bootstrap -->
                        </div><!-- Fin du groupe de champ email -->

                        <div class="mb-3">
                            <!-- Groupe de champ message -->

                            <label for="message" class="form-label">Message</label>
                            <!-- Label du textarea -->

                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message"></textarea>
                            <!-- Zone de texte Bootstrap -->
                             
                        </div><!-- Fin du groupe de champ message -->

                        <div id="erreursFormulaire" class="alert alert-danger d-none">
                            <!-- Zone d’affichage des erreurs, cachée par défaut -->
                        </div><!-- Fin de la zone d’erreurs -->

                    </form>
                </div><!-- Fin du corps de la modal -->

                <div class="modal-footer">
                    <!-- Pied de la modal -->

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                    <!-- Bouton pour fermer sans envoyer -->

                    <button type="button" class="btn btn-primary" id="btnEnvoyer">
                        Envoyer
                    </button>
                    <!-- Bouton qui lance la validation et l’envoi AJAX -->
                </div><!-- Fin du pied de la modal -->
            </div><!-- Fin du contenu de la modal -->
        </div><!-- Fin de la boîte de dialogue -->
    </div><!-- Fin de la modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Charge le JavaScript Bootstrap nécessaire pour la modal -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attend que le DOM soit totalement chargé

            const formContact = document.getElementById('formContact');
            // Récupère le formulaire

            const btnEnvoyer = document.getElementById('btnEnvoyer');
            // Récupère le bouton Envoyer

            const messageResultat = document.getElementById('messageResultat');
            // Récupère la zone de message de résultat

            const erreursFormulaire = document.getElementById('erreursFormulaire');
            // Récupère la zone d’erreurs

            const modalElement = document.getElementById('modalContact');
            // Récupère la modal

            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
            // Récupère ou crée l’instance Bootstrap de la modal

            btnEnvoyer.addEventListener('click', function() {
                // Écoute le clic sur le bouton Envoyer

                const nom = document.getElementById('nom').value.trim();
                // Récupère la valeur du champ nom en supprimant les espaces inutiles

                const email = document.getElementById('email').value.trim();
                // Récupère la valeur du champ email

                const message = document.getElementById('message').value.trim();
                // Récupère la valeur du champ message

                const erreurs = [];
                // Crée un tableau pour stocker les erreurs

                if (nom === '') {
                    // Vérifie si le nom est vide
                    erreurs.push('Le nom est obligatoire.');
                    // Ajoute une erreur dans le tableau
                }

                if (email === '') {
                    // Vérifie si l’email est vide
                    erreurs.push('L’email est obligatoire.');
                    // Ajoute une erreur dans le tableau
                } else if (!email.includes('@')) {
                    // Vérifie rapidement si l’email contient @
                    erreurs.push('L’email doit être valide.');
                    // Ajoute une erreur si le format semble invalide
                }

                if (message.length < 10) {
                    // Vérifie que le message contient au moins 10 caractères
                    erreurs.push('Le message doit contenir au moins 10 caractères.');
                    // Ajoute une erreur si le message est trop court
                }

                if (erreurs.length > 0) {
                    // Vérifie s’il existe des erreurs

                    erreursFormulaire.classList.remove('d-none');
                    // Affiche la zone d’erreurs

                    erreursFormulaire.innerHTML = erreurs.map(function(erreur) {
                        // Transforme chaque erreur en ligne HTML
                        return '<div>' + erreur + '</div>';
                    }).join('');
                    // Affiche toutes les erreurs dans le bloc

                    return;
                    // Stoppe l’exécution si la validation échoue
                }

                erreursFormulaire.classList.add('d-none');
                // Cache la zone d’erreurs si tout est valide

                erreursFormulaire.innerHTML = '';
                // Vide le contenu précédent des erreurs

                const formData = new FormData(formContact);
                // Crée un objet FormData à partir du formulaire

                fetch('contact.php', {
                        // Envoie les données vers le script PHP

                        method: 'POST',
                        // Utilise la méthode POST

                        body: formData
                        // Envoie les champs du formulaire
                    })
                    .then(function(response) {
                        // Récupère la réponse HTTP

                        return response.json();
                        // Convertit la réponse en JSON
                    })
                    .then(function(data) {
                        // Traite les données JSON renvoyées par PHP

                        if (data.status === 'ok') {
                            // Vérifie si le PHP a répondu avec succès

                            messageResultat.className = 'alert alert-success mb-0';
                            // Change le style du message en succès

                            messageResultat.textContent = data.message;
                            // Affiche le message renvoyé par PHP

                            formContact.reset();
                            // Réinitialise le formulaire

                            modalInstance.hide();
                            // Ferme la modal
                        } else {
                            // Cas où PHP renvoie une erreur

                            messageResultat.className = 'alert alert-danger mb-0';
                            // Change le style du message en erreur

                            messageResultat.textContent = data.message || 'Une erreur est survenue.';
                            // Affiche le message d’erreur
                        }
                    })
                    .catch(function() {
                        // Gère une erreur réseau ou une réponse invalide

                        messageResultat.className = 'alert alert-danger mb-0';
                        // Met le message en rouge

                        messageResultat.textContent = 'Erreur de communication avec le serveur.';
                        // Affiche un message d’erreur générique
                    });
            });
        });
    </script>
</body>

</html>