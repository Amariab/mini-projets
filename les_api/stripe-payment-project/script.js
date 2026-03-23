// Récupérer le bouton de paiement dans la page HTML
// document.getElementById permet de sélectionner un élément HTML grâce à son id
// Ici on récupère le bouton <button id="payBtn">
const button = document.getElementById("payBtn")

// Récupérer la zone d'affichage du résultat
// Cette zone servira à afficher les messages (succès ou erreur)
const result = document.getElementById("result")

// Ajouter un "écouteur d'événement" sur le bouton
// addEventListener permet de déclencher une fonction lorsque l'utilisateur clique
// sur le bouton de paiement
button.addEventListener("click", async () => {

    try {

        // Création d'un objet FormData
        // FormData permet de simuler l'envoi d'un formulaire HTML
        // et d'envoyer facilement des données au serveur via fetch()
        const formData = new FormData()

        // Ajouter une donnée appelée "amount"
        // Cette donnée correspond au montant du paiement
        // Stripe attend un montant en centimes : 2000 = 20 €
        formData.append("amount", 2000)

        // Envoyer une requête HTTP vers le fichier PHP create-payment.php
        // fetch() permet de communiquer avec le serveur depuis JavaScript
        const response = await fetch("create-payment.php", {

            // La méthode POST est utilisée pour envoyer des données au serveur
            method: "POST",

            // Les données envoyées au serveur (le montant du paiement)
            body: formData
        })

        // Lire la réponse du serveur au format JSON
        // response.json() transforme la réponse en objet JavaScript
        const data = await response.json()

        // Vérifier si le serveur a renvoyé une erreur
        // Par exemple : clé Stripe invalide ou montant incorrect
        if (data.error) {

            // Afficher le message d'erreur dans la page
            result.innerHTML = "Erreur : " + data.error

            // Arrêter l'exécution de la fonction
            return
        }

        // Si tout fonctionne, afficher le client_secret
        // Le client_secret est utilisé pour finaliser le paiement avec Stripe
        result.innerHTML = "Paiement prêt. Client Secret : " + data.clientSecret

    } catch (error) {

        // Ce bloc s'exécute si une erreur réseau se produit
        // Par exemple : serveur inaccessible ou problème de connexion
        result.innerHTML = "Erreur réseau"

    }

})
