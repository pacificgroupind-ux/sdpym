<?php
require_once __DIR__ . '/../includes/functions.php';
require_student();
$pageTitle='Student Dashboard'; require_once __DIR__ . '/../includes/header.php';
$notices=db()->query("SELECT title,notice_date FROM notices ORDER BY notice_date DESC LIMIT 8")->fetchAll();
?>
<div class="container py-5"><h1 class="section-title mb-4">Welcome, <?= e($_SESSION['student']['name']) ?></h1>
<div class="card card-body"><h5>Latest Notices</h5><ul><?php foreach($notices as $n): ?><li><?= e($n['notice_date']) ?> - <?= e($n['title']) ?></li><?php endforeach; ?></ul></div>
<a href="logout.php" class="btn btn-secondary mt-3">Logout</a></div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
