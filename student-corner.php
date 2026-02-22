<?php $pageTitle = 'Student Corner - ' . APP_NAME; require_once __DIR__ . '/includes/header.php';
$notices = db()->query("SELECT title, notice_date, excerpt FROM notices ORDER BY notice_date DESC LIMIT 10")->fetchAll();
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Student Corner</h1>
  <div class="row g-4">
    <div class="col-md-6"><h4>Notices / Circulars</h4><ul><?php foreach($notices as $n): ?><li><?= e($n['notice_date']) ?> - <?= e($n['title']) ?></li><?php endforeach; ?></ul></div>
    <div class="col-md-6"><h4>Results</h4><p>Semester and annual results updates are published here.</p><h4>Scholarships</h4><p>State and central scholarship details available in office.</p></div>
  </div>
  <h4 class="mt-3">Events & Activities</h4><p>NSS camps, debate competitions, sports week, annual cultural fest.</p>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
