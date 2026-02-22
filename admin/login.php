<?php
require_once __DIR__ . '/../includes/functions.php';
if (is_post()) {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $stmt = db()->prepare("SELECT * FROM admin_users WHERE email=? LIMIT 1");
  $stmt->execute([$email]);
  $user = $stmt->fetch();
  if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['admin'] = ['id' => $user['id'], 'name' => $user['name'], 'role' => $user['role']];
    redirect(BASE_URL . '/admin/dashboard.php');
  }
  set_flash('danger', 'Invalid credentials.');
  redirect(BASE_URL . '/admin/login.php');
}
$pageTitle = 'Admin Login';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="container py-5" style="max-width:500px;">
  <h1 class="section-title mb-4">Admin Login</h1>
  <form method="post" class="card card-body">
    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button class="btn btn-primary">Login</button>
  </form>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
