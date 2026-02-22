<?php
$pageTitle = 'Admissions - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';

if (is_post()) {
    $data = [
        'name' => trim($_POST['name'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'course' => trim($_POST['course'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    if ($data['name'] && $data['phone'] && $data['email'] && $data['course']) {
        $stmt = db()->prepare("INSERT INTO admissions (name, phone, email, course, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['phone'], $data['email'], $data['course'], $data['message']]);
        mail_admission_notification($data);
        set_flash('success', 'Admission form submitted successfully.');
        redirect(BASE_URL . '/admissions.php');
    } else {
        set_flash('danger', 'Please fill all required fields.');
        redirect(BASE_URL . '/admissions.php');
    }
}
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Admissions</h1>
  <h4>Admission Process</h4>
  <ol><li>Fill online/offline form</li><li>Document verification</li><li>Merit list publication</li><li>Fee submission</li></ol>
  <h4>Eligibility Criteria</h4><p>As per university norms for respective programs.</p>
  <h4>Important Dates</h4><p>Form Open: 01 June | Last Date: 31 July | Merit List: 10 August</p>
  <h4>Documents Required</h4><ul><li>10th/12th marksheets</li><li>Aadhaar</li><li>Transfer certificate</li><li>Photographs</li></ul>

  <div class="card mt-4"><div class="card-body">
    <h5>Apply Now</h5>
    <form method="post" class="row g-3">
      <div class="col-md-6"><input required name="name" class="form-control" placeholder="Name"></div>
      <div class="col-md-6"><input required name="phone" class="form-control" placeholder="Phone"></div>
      <div class="col-md-6"><input required type="email" name="email" class="form-control" placeholder="Email"></div>
      <div class="col-md-6"><input required name="course" class="form-control" placeholder="Course"></div>
      <div class="col-12"><textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea></div>
      <div class="col-12"><button class="btn btn-warning">Submit Application</button></div>
    </form>
  </div></div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
