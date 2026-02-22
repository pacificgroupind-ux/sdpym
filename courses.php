<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Courses - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
?>
<div class="container py-5">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-4">
    <h1 class="section-title mb-0">Courses & Programs</h1>
    <a href="downloads/prospectus.pdf" class="btn btn-outline-primary"><i class="bi bi-download"></i> Download Prospectus</a>
  </div>
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover table-bordered align-middle mb-0">
      <thead class="table-primary"><tr><th>Program</th><th>Duration</th><th>Eligibility</th><th>Syllabus</th></tr></thead>
      <tbody>
      <tr><td>B.A.</td><td>3 Years</td><td>10+2</td><td><a class="btn btn-sm btn-outline-secondary" href="downloads/sample-syllabus.pdf">Download</a></td></tr>
      <tr><td>B.Sc.</td><td>3 Years</td><td>10+2 (Science)</td><td><a class="btn btn-sm btn-outline-secondary" href="downloads/sample-syllabus.pdf">Download</a></td></tr>
      <tr><td>B.Com.</td><td>3 Years</td><td>10+2</td><td><a class="btn btn-sm btn-outline-secondary" href="downloads/sample-syllabus.pdf">Download</a></td></tr>
      <tr><td>M.A.</td><td>2 Years</td><td>Graduate</td><td><a class="btn btn-sm btn-outline-secondary" href="downloads/sample-syllabus.pdf">Download</a></td></tr>
      </tbody>
    </table>
  </div>
  <div class="card mt-4 shadow-sm">
    <div class="card-body">
      <h4 class="h5">Departments</h4>
      <p class="mb-0">Arts, Commerce, Science, Computer Applications, and Education.</p>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
