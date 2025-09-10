<?php
  $pageTitle = "Vue 1 — Montagne";
  $active = "v1";
  $imageIndex = 0; // correspond à l'entrée 0 du tableau JS
  include __DIR__ . '/partials/header.php';
?>
  <section class="card">
    <div class="image-wrap">
      <img id="photo" alt="Image 1" />
      <button id="likeBtn" class="like" aria-pressed="false">🤍 J’aime <span id="likeCount">0</span></button>
    </div>
    <h2 id="title"></h2>
    <p id="credit"></p>
    <div class="actions">
      <a class="btn" href="/view2.php">Suivante →</a>
    </div>
    <p class="hint">Astuce : utilisez ← → au clavier pour naviguer.</p>
  </section>
<?php include __DIR__ . '/partials/footer.php'; ?>
