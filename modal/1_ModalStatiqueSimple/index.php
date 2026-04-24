<!doctype html>
<html lang="fr">
<head>
  <!-- Balise doctype pour indiquer la version HTML5 -->
  <!-- Attribut lang="fr" pour la langue française -->

  <!-- Metas obligatoires pour la compatibilité Bootstrap -->
  <meta charset="utf-8">
  <!-- Jeu de caractères UTF‑8 (accents, émojis, etc.) -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Rend le site responsive (adaptation à l’écran mobile) -->

  <!-- Titre de la page, visible dans l’onglet du navigateur -->
  <title>Mini projet 1 : Modal statique simple</title>

  <!-- Lien vers le CSS de Bootstrap 5 (via CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
  <!-- Bootstrap fournit les classes .btn, .modal, .container, etc. -->
</head>

<body>

  <!-- Conteneur principal Bootstrap -->
  <div class="container mt-5">
    <!-- mt-5 = margin-top de taille 5 (espacement en haut) -->

    <h1 class="text-center">Projets avec modals Bootstrap</h1>
    <!-- Titre centré -->

    <!-- Bouton qui va ouvrir la modal -->
    <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalInfos">
      <!-- btn = base d’un bouton, btn-primary = couleur bleue -->
      <!-- data-bs-toggle="modal" active le système de modale Bootstrap -->
      <!-- data-bs-target="#modalInfos" indique l’id de la modal à ouvrir -->
      À propos de ce site
    </button>
  </div> <!-- Fin du conteneur principal -->

  <!-- Début de la modal Bootstrap -->
  <!-- Fade permet une animation d’apparition -->
  <div class="modal fade"
       id="modalInfos"
       tabindex="-1"
       aria-labelledby="modalInfosLabel"
       aria-hidden="true">
    <!-- modal = classe de base pour la fenêtre modale -->
    <!-- fade = animation progressive d’apparition/disparition -->
    <!-- id="modalInfos" = identifiant de la modal, utilisé par data-bs-target -->
    <!-- tabindex="-1" permet de ne pas pouvoir focus le conteneur avec Tab -->
    <!-- aria-labelledby="modalInfosLabel" référence le titre accessible -->
    <!-- aria-hidden="true" indique que la modal est cachée par défaut -->

    <!-- Conteneur de la modal -->
    <div class="modal-dialog">
      <!-- modal-dialog = cadre de la fenêtre modale -->
      <!-- Peut être agrandi avec modal-lg ou modal-lg -->

      <!-- Contenu réel de la modal -->
      <div class="modal-content">
        <!-- modal-content = zone visible avec fond blanc -->

        <!-- En‑tête de la modal  -->
        <div class="modal-header">
          <!-- modal-header = zone du haut avec titre et bouton X -->

          <h5 class="modal-title"
              id="modalInfosLabel">
            <!--modal-title = titre de la modal, id référencé par aria-labelledby -->
            À propos de ce site
          </h5>

          <!-- Bouton de fermeture avec la croix -->
          <button type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Fermer">
            <!-- btn-close = bouton en croix, icône fournie par Bootstrap -->
            <!-- data-bs-dismiss="modal" ferme la modal --> 
          </button>
        </div> <!-- Fin de l’en‑tête de la modal -->

        <!-- Corps de la modal (contenu principal) -->
        <div class="modal-body">
          <!-- modal-body = zone centrale pour le texte ou le contenu -->

          <p class="mb-3">
            <!-- mb-3 = margin-bottom de taille 3 (espacement en bas) -->
            Ce site est un mini projet Bootstrap pour travailler avec les <strong>modals</strong>.
          </p>

          <p>
            Une modal est une boîte de dialogue qui s’ouvre par‑dessus la page,
            souvent utilisée pour des messages, des formulaires ou des infos.
          </p>
        </div> <!-- Fin du corps de la modal -->

        <!-- Pied de la modal -->
        <div class="modal-footer">
          <!-- modal-footer = zone du bas avec boutons de contrôle -->

          <!-- Bouton pour fermer la modal -->
          <button type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
            <!-- btn-secondary = bouton gris (secondaire) -->
            <!-- data-bs-dismiss="modal" ferme la fenêtre -->
            Fermer
          </button>

          <!-- Bouton de confirmation (visuel, sans action réelle ici) -->
          <button type="button"
                  class="btn btn-primary">
            Compris
          </button>
          <!-- btn-primary = bouton bleu principal -->
        </div> <!-- Fin du pied de la modal -->

      </div> <!-- Fin du contenu de la modal -->
    </div><!-- Fin du conteneur de la modal -->
  </div> <!-- Fin de la modal -->

  <!-- JavaScript Bootstrap (via CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous">
  </script>
  <!-- bootstrap.bundle.min.js inclut Bootstrap JavaScript + Popper pour les modals -->
</body>
</html>