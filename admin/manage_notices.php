<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin(['super_admin','staff','editor']);

if (is_post()) {
  $action = $_POST['action'] ?? '';
  if ($action === 'save') {
    $id = (int)($_POST['id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $date = trim($_POST['notice_date'] ?? date('Y-m-d'));
    if ($id) {
      db()->prepare("UPDATE notices SET title=?, excerpt=?, notice_date=? WHERE id=?")->execute([$title,$excerpt,$date,$id]);
    } else {
      db()->prepare("INSERT INTO notices (title,excerpt,notice_date) VALUES (?,?,?)")->execute([$title,$excerpt,$date]);
    }
  }
  if ($action === 'delete' && isset($_POST['id'])) {
    db()->prepare("DELETE FROM notices WHERE id=?")->execute([(int)$_POST['id']]);
  }
  redirect(BASE_URL . '/admin/manage_notices.php');
}
$edit = null;
if (isset($_GET['edit'])) {
  $stmt = db()->prepare("SELECT * FROM notices WHERE id=?");
  $stmt->execute([(int)$_GET['edit']]);
  $edit = $stmt->fetch();
}
$items = db()->query("SELECT * FROM notices ORDER BY notice_date DESC")->fetchAll();
$pageTitle = 'Manage Notices';
require_once __DIR__ . '/../includes/header.php';
?>
<div class="container py-5">
<h1 class="section-title mb-4">Notice / News Management</h1>
<form method="post" class="card card-body mb-4">
<input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= e((string)($edit['id'] ?? 0)) ?>">
<div class="row g-2"><div class="col-md-5"><input required name="title" class="form-control" placeholder="Title" value="<?= e($edit['title'] ?? '') ?>"></div><div class="col-md-4"><input name="excerpt" class="form-control" placeholder="Excerpt" value="<?= e($edit['excerpt'] ?? '') ?>"></div><div class="col-md-3"><input type="date" name="notice_date" class="form-control" value="<?= e($edit['notice_date'] ?? date('Y-m-d')) ?>"></div></div>
<button class="btn btn-primary mt-2">Save Notice</button>
</form>
<table class="table table-bordered"><thead><tr><th>Date</th><th>Title</th><th>Actions</th></tr></thead><tbody>
<?php foreach($items as $n): ?><tr><td><?= e($n['notice_date']) ?></td><td><?= e($n['title']) ?></td><td><a class="btn btn-sm btn-warning" href="?edit=<?= $n['id'] ?>">Edit</a> <form method="post" class="d-inline"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $n['id'] ?>"><button class="btn btn-sm btn-danger">Delete</button></form></td></tr><?php endforeach; ?>
</tbody></table></div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
