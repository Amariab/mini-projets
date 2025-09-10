<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Onglets avec session JavaScript</title>
  <style>
    .tab-btn {
      padding: 10px 20px;          /* Marge intérieure du bouton */
      cursor: pointer;             /* Curseur type "main" au survol */
      background: #ddd;            /* Fond gris clair */
      border: none;                /* Pas de bordure */
      margin-right: 5px;           /* Espace entre les boutons */
    }
    .tab-btn.active {
      background: #007bff;       /* Fond bleu vif */
      color: white;                /* Texte en blanc */
    }
    
   .tab-content {
      display: none;              /* Cacher le contenu par défaut */
      margin-top: 15px;           /* Espace au-dessus du contenu */
    }
    .tab-content.active {
      display: block;             /* Affiche le contenu de l’onglet actif */
    }
  </style>
</head>
<body>

<!-- Onglets -->
<div class="tabs-js">
  <button class="tab-btn" data-tab="tab1">Détails</button>
  <button class="tab-btn" data-tab="tab2">Commentaires</button>
</div>

<!-- Contenu des onglets -->
<div id="tab1" class="tab-content">
  <h2>Détails du produit</h2>
  <p>Description complète ici...</p>
</div>

<div id="tab2" class="tab-content">
  <h2>Commentaires</h2>
  <p>Voici les commentaires du produit...</p>
</div>

<script>
  const buttons = document.querySelectorAll('.tab-btn'); // Sélectionne tous les boutons d'onglet
  const contents = document.querySelectorAll('.tab-content'); // Sélectionne tous les contenus d'onglet

  // 1. Récupérer l'onglet actif depuis localStorage ou utiliser "tab1" par défaut
  // Si aucun onglet n'est mémorisé, on utilise "tab1" par défaut
  // On utilise localStorage pour mémoriser l'onglet actif entre les sessions
  const savedTab = localStorage.getItem('activeTab') || 'tab1'; //

  // 2. Appliquer la classe active sur le bon bouton et le bon contenu
  function activateTab(tabId) { // Fonction pour activer un onglet
    buttons.forEach(btn => { // Parcourt tous les boutons
      btn.classList.toggle('active', btn.dataset.tab === tabId); // Active le bouton correspondant
    });
    contents.forEach(content => { // Parcourt tous les contenus
      content.classList.toggle('active', content.id === tabId);// Active le contenu correspondant
    });
  }

  activateTab(savedTab); // Affiche l’onglet mémorisé

  // 3. Gestion du clic sur un onglet
  buttons.forEach(btn => { // Parcourt tous les boutons
    btn.addEventListener('click', () => { // Ajoute un écouteur d'événement pour chaque bouton
      const selectedTab = btn.dataset.tab; // Récupère l'ID de l'onglet sélectionné
      localStorage.setItem('activeTab', selectedTab); // Mémorise l'onglet actif dans localStorage
      activateTab(selectedTab); // Affiche l'onglet choisi
    });
  });
</script>

</body>
</html>
