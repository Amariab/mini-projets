// Mini "modèle" côté client : 3 images (URLs libres — Picsum)
const IMAGES = [
  {
    src: "https://picsum.photos/id/1015/1200/800",
    title: "Montagne au lever du soleil",
    credit: "Source : picsum.photos #1015"
  },
  {
    src: "https://picsum.photos/id/1040/1200/800",
    title: "Forêt brumeuse",
    credit: "Source : picsum.photos #1040"
  },
  {
    src: "https://picsum.photos/id/1011/1200/800",
    title: "Vagues et rochers",
    credit: "Source : picsum.photos #1011"
  }
];

// Préchargement simple + indicateur
function preloadImages(list) {
  const status = document.getElementById("preload-status");
  let loaded = 0;
  list.forEach((it) => {
    const img = new Image();
    img.onload = () => {
      loaded++;
      if (status) status.textContent = `Images préchargées : ${loaded}/${list.length}`;
    };
    img.src = it.src;
  });
}

function renderImage(index) {
  const data = IMAGES[index];
  const img = document.getElementById("photo");
  const title = document.getElementById("title");
  const credit = document.getElementById("credit");
  if (!data || !img || !title || !credit) return;

  img.src = data.src;
  img.alt = data.title;
  title.textContent = data.title;
  credit.textContent = data.credit;

  // État des likes par image (localStorage)
  const key = `likes:${index}`;
  const likeCount = parseInt(localStorage.getItem(key) || "0", 10);
  const likeCountEl = document.getElementById("likeCount");
  if (likeCountEl) likeCountEl.textContent = String(likeCount);

  const likeBtn = document.getElementById("likeBtn");
  if (likeBtn) {
    likeBtn.setAttribute("aria-pressed", "false");
    likeBtn.onclick = () => {
      const newCount = likeCount + 1;
      localStorage.setItem(key, String(newCount));
      likeCountEl.textContent = String(newCount);
      likeBtn.setAttribute("aria-pressed", "true");
      likeBtn.classList.add("liked");
      setTimeout(() => likeBtn.classList.remove("liked"), 300);
    };
  }
}

function goto(delta) {
  const bodyIdx = parseInt(document.body.dataset.imageIndex, 10);
  const next = (bodyIdx + delta + IMAGES.length) % IMAGES.length;
  const hrefs = ["/view1.php", "/view2.php", "/view3.php"];
  window.location.href = hrefs[next];
}

document.addEventListener("DOMContentLoaded", () => {
  preloadImages(IMAGES);

  const idx = parseInt(document.body.dataset.imageIndex || "-1", 10);
  if (idx >= 0) renderImage(idx);

  // Navigation clavier ← →
  window.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight") { goto(+1); }
    if (e.key === "ArrowLeft")  { goto(-1); }
  });
});
// Mini-projet : affichage d'images avec préchargement et likes
