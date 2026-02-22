<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Gallery - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
$gallery = db()->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Photo Gallery</h1>
  <div class="row g-3">
    <?php foreach($gallery as $g): ?>
      <div class="col-sm-6 col-lg-4"><img src="<?= e($g['image_path']) ?>" class="gallery-img shadow-sm" alt="<?= e($g['title']) ?>"></div>
    <?php endforeach; ?>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
