<?php
  $pageTitle = "Vue 2 — Forêt";
  $active = "v2";
  $imageIndex = 1;
  include __DIR__ . '/partials/header.php';
?>
  <section class="card">
    <div class="image-wrap">
      <img id="photo" alt="Image 2" />
      <button id="likeBtn" class="like" aria-pressed="false">🤍 J’aime <span id="likeCount">0</span></button>
    </div>
    <h2 id="title"></h2>
    <p id="credit"></p>
    <div class="actions">
      <a class="btn" href="/view1.php">← Précédente</a>
      <a class="btn" href="/view3.php">Suivante →</a>
    </div>
    <p class="hint">Astuce : utilisez ← → au clavier pour naviguer.</p>
  </section>
<?php include __DIR__ . '/partials/footer.php'; ?>
