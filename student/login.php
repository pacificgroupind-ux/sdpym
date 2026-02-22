<?php
require_once __DIR__ . '/../includes/functions.php';
if (is_post()) {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $stmt = db()->prepare("SELECT * FROM students WHERE email=? LIMIT 1");
  $stmt->execute([$email]);
  $student = $stmt->fetch();
  if ($student && password_verify($password, $student['password_hash'])) {
    $_SESSION['student'] = ['id' => $student['id'], 'name' => $student['name']];
    redirect(BASE_URL . '/student/dashboard.php');
  }
  set_flash('danger', 'Invalid student login.');
  redirect(BASE_URL . '/student/login.php');
}
$pageTitle='Student Login'; require_once __DIR__ . '/../includes/header.php'; ?>
<div class="container py-5" style="max-width:500px;"><h1 class="section-title mb-4">Student Portal Login</h1><form method="post" class="card card-body"><input type="email" name="email" class="form-control mb-2" required placeholder="Email"><input type="password" name="password" class="form-control mb-2" required placeholder="Password"><button class="btn btn-primary">Login</button></form></div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
