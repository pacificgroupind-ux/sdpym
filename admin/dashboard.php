<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin();
$pageTitle = 'Admin Dashboard';
require_once __DIR__ . '/../includes/header.php';
$counts = [
 'notices' => db()->query("SELECT COUNT(*) c FROM notices")->fetch()['c'],
 'faculty' => db()->query("SELECT COUNT(*) c FROM faculty")->fetch()['c'],
 'admissions' => db()->query("SELECT COUNT(*) c FROM admissions")->fetch()['c'],
 'events' => db()->query("SELECT COUNT(*) c FROM events")->fetch()['c'],
];
?>
<div class="container py-5">
<h1 class="section-title mb-4">Admin Dashboard</h1>
<p>Welcome <?= e($_SESSION['admin']['name']) ?> (<?= e($_SESSION['admin']['role']) ?>)</p>
<div class="row g-3 mb-4">
<?php foreach($counts as $k=>$v): ?><div class="col-md-3"><div class="card card-body"><h6><?= ucfirst($k) ?></h6><p class="fs-3 mb-0"><?= e((string)$v) ?></p></div></div><?php endforeach; ?>
</div>
<div class="d-flex flex-wrap gap-2">
<a class="btn btn-outline-primary" href="manage_notices.php">Manage Notices</a>
<a class="btn btn-outline-primary" href="manage_faculty.php">Manage Faculty</a>
<a class="btn btn-outline-primary" href="manage_gallery.php">Manage Gallery</a>
<a class="btn btn-outline-primary" href="manage_events.php">Manage Events</a>
<a class="btn btn-outline-success" href="export_admissions.php">Export Admissions (Excel CSV)</a>
<a class="btn btn-outline-secondary" href="logout.php">Logout</a>
</div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
