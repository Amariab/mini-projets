<?php
  $pageTitle = "Vue 3 — Mer";
  $active = "v3";
  $imageIndex = 2;
  include __DIR__ . '/partials/header.php';
?>
  <section class="card">
    <div class="image-wrap">
      <img id="photo" alt="Image 3" />
      <button id="likeBtn" class="like" aria-pressed="false">🤍 J’aime <span id="likeCount">0</span></button>
    </div>
    <h2 id="title"></h2>
    <p id="credit"></p>
    <div class="actions">
      <a class="btn" href="/view2.php">← Précédente</a>
    </div>
    <p class="hint">Astuce : utilisez ← → au clavier pour naviguer.</p>
  </section>
<?php include __DIR__ . '/partials/footer.php'; ?>
