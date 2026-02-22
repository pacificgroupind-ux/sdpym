<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Home - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
$notices = db()->query("SELECT id, title, notice_date, excerpt FROM notices ORDER BY notice_date DESC LIMIT 6")->fetchAll();
$gallery = db()->query("SELECT image_path, title FROM gallery ORDER BY created_at DESC LIMIT 6")->fetchAll();
?>
<section class="hero d-flex align-items-center">
  <div class="container text-center animate-up">
    <h1 class="display-5 fw-bold">Shri ABCD Mahavidyalaya, Saitanpur</h1>
    <p class="lead">Empowering rural India through excellence in higher education.</p>
    <a href="admissions.php" class="btn btn-warning btn-lg">Apply for Admission</a>
  </div>
</section>
<section class="container py-5">
  <div class="row g-4">
    <div class="col-lg-8">
      <h2 class="section-title mb-3">Principal's Welcome</h2>
      <p>Welcome to Shri ABCD Mahavidyalaya. We are committed to student-centric learning, value-based education, and community impact with NAAC/NIRF-aligned institutional quality practices.</p>
    </div>
    <div class="col-lg-4">
      <div class="card bg-light border-0 shadow-sm"><div class="card-body"><h5 class="card-title">Quick Access</h5><div class="d-grid gap-2"><a href="admissions.php" class="btn btn-outline-primary btn-sm">Admissions</a><a href="courses.php" class="btn btn-outline-primary btn-sm">Courses</a><a href="faculty.php" class="btn btn-outline-primary btn-sm">Faculty</a><a href="contact.php" class="btn btn-outline-primary btn-sm">Contact</a></div></div></div>
    </div>
  </div>
  <h2 class="section-title mb-4">Principal's Welcome</h2>
  <p>Welcome to Shri ABCD Mahavidyalaya. We are committed to student-centric learning, value-based education, and community impact with NAAC/NIRF-aligned institutional quality practices.</p>
</section>
<section class="container py-2">
  <h2 class="section-title mb-4">Highlights & Latest News</h2>
  <div class="row g-3">
    <?php foreach ($notices as $n): ?>
    <div class="col-md-4 animate-up">
      <div class="card card-hover h-100 shadow-sm">
      <div class="card card-hover h-100">
        <div class="card-body">
          <small class="text-muted"><?= e($n['notice_date']) ?></small>
          <h5 class="card-title mt-2"><?= e($n['title']) ?></h5>
          <p class="card-text"><?= e($n['excerpt']) ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<section class="container py-4">
<section class="container py-5">
  <h2 class="section-title mb-4">Quick Links</h2>
  <div class="row text-center g-3">
    <div class="col-6 col-md-3"><a class="quick-link" href="admissions.php">Admissions</a></div>
    <div class="col-6 col-md-3"><a class="quick-link" href="courses.php">Courses</a></div>
    <div class="col-6 col-md-3"><a class="quick-link" href="contact.php">Contact</a></div>
    <div class="col-6 col-md-3"><a class="quick-link" href="faculty.php">Faculty</a></div>
  </div>
</section>
<section class="container py-2">
  <h2 class="section-title mb-4">Campus Gallery</h2>
  <div class="row g-3">
    <?php foreach ($gallery as $img): ?>
      <div class="col-sm-6 col-lg-4 animate-up">
        <img class="gallery-img" src="<?= e($img['image_path']) ?>" alt="<?= e($img['title']) ?>">
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
