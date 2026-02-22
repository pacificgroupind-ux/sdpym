<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Faculty - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
$q = trim($_GET['q'] ?? '');
$sql = "SELECT * FROM faculty";
$params = [];
if ($q !== '') {
  $sql .= " WHERE name LIKE ? OR department LIKE ? OR specialization LIKE ?";
  $params = ["%$q%", "%$q%", "%$q%"];
}
$sql .= " ORDER BY department, name";
$stmt = db()->prepare($sql);
$stmt->execute($params);
$faculty = $stmt->fetchAll();
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Faculty Directory</h1>
  <form class="row g-2 mb-4" method="get">
    <div class="col-md-8"><input class="form-control" name="q" placeholder="Search by name, department, specialization" value="<?= e($q) ?>"></div>
    <div class="col-md-2"><button class="btn btn-primary w-100">Search</button></div>
    <div class="col-md-2"><a href="faculty.php" class="btn btn-outline-secondary w-100">Reset</a></div>
  </form>
  <div class="row g-4">
    <?php foreach ($faculty as $f): ?>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 card-hover shadow-sm">
        <img src="<?= e($f['photo'] ?: 'https://via.placeholder.com/400x240?text=Faculty') ?>" class="card-img-top" alt="<?= e($f['name']) ?> photo">
        <div class="card-body">
          <h5><?= e($f['name']) ?></h5>
          <p class="mb-1"><strong><?= e($f['designation']) ?></strong></p>
          <p class="mb-1">Department: <?= e($f['department']) ?></p>
          <p class="mb-1">Qualification: <?= e($f['qualification']) ?></p>
          <p class="mb-1">Experience: <?= e($f['experience']) ?> years</p>
          <small class="text-muted">Specialization: <?= e($f['specialization']) ?></small>
  <h1 class="section-title mb-4">Faculty</h1>
  <form class="row mb-3"><div class="col-md-6"><input class="form-control" name="q" placeholder="Search faculty" value="<?= e($q) ?>"></div><div class="col-md-2"><button class="btn btn-primary w-100">Search</button></div></form>
  <div class="row g-4">
    <?php foreach ($faculty as $f): ?>
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 card-hover">
        <img src="<?= e($f['photo'] ?: 'https://via.placeholder.com/400x240?text=Faculty') ?>" class="card-img-top" alt="Faculty photo">
        <div class="card-body">
          <h5><?= e($f['name']) ?></h5>
          <p class="mb-1"><strong><?= e($f['designation']) ?></strong></p>
          <p class="mb-1">Dept: <?= e($f['department']) ?></p>
          <p class="mb-1">Qual.: <?= e($f['qualification']) ?></p>
          <p class="mb-1">Exp: <?= e($f['experience']) ?> years</p>
          <small><?= e($f['specialization']) ?></small>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
