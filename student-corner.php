<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Student Corner - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
<?php $pageTitle = 'Student Corner - ' . APP_NAME; require_once __DIR__ . '/includes/header.php';
$notices = db()->query("SELECT title, notice_date, excerpt FROM notices ORDER BY notice_date DESC LIMIT 10")->fetchAll();
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Student Corner</h1>
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card shadow-sm h-100"><div class="card-body"><h4>Notices / Circulars</h4><ul class="mb-0"><?php foreach($notices as $n): ?><li><?= e($n['notice_date']) ?> - <?= e($n['title']) ?></li><?php endforeach; ?></ul></div></div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm h-100"><div class="card-body"><h4>Results & Scholarships</h4><p>Semester and annual results updates are published here.</p><p class="mb-0">State and central scholarship details are available in the student office.</p></div></div>
    </div>
  </div>
  <div class="card shadow-sm mt-4"><div class="card-body"><h4>Events & Activities</h4><p class="mb-0">NSS camps, debate competitions, sports week, and annual cultural fest.</p></div></div>
    <div class="col-md-6"><h4>Notices / Circulars</h4><ul><?php foreach($notices as $n): ?><li><?= e($n['notice_date']) ?> - <?= e($n['title']) ?></li><?php endforeach; ?></ul></div>
    <div class="col-md-6"><h4>Results</h4><p>Semester and annual results updates are published here.</p><h4>Scholarships</h4><p>State and central scholarship details available in office.</p></div>
  </div>
  <h4 class="mt-3">Events & Activities</h4><p>NSS camps, debate competitions, sports week, annual cultural fest.</p>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
