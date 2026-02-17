// Initialisation de Quill
// On lie Quill à notre div #editor et à notre toolbar personnalisée
const quill = new Quill("#editor", {
  theme: "snow", // Thème par défaut clair
  modules: {
    toolbar: "#toolbar", // on utilise notre propre barre d'outils
  },
});

// Récupérer le bouton
const getHtmlBtn = document.getElementById("get-html");

// Zone d'affichage du résultat
const output = document.getElementById("output");

// Quand on clique sur le bouton, on affiche le contenu HTML généré par Quill
getHtmlBtn.addEventListener("click", () => {
  // Quill stocke le contenu dans un format interne (Delta)
  // Mais on peut le récupérer sous forme HTML :
  const html = quill.root.innerHTML;

  // On affiche le code HTML dans le <pre>
  output.textContent = html;
});
