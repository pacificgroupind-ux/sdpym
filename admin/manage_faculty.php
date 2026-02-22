<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin(['super_admin','staff']);

if (is_post()) {
  $action = $_POST['action'] ?? '';
  if ($action === 'save') {
    $id = (int)($_POST['id'] ?? 0);
    $photoPath = $_POST['existing_photo'] ?? '';
    if (!empty($_FILES['photo']['name'])) {
      $filename = time() . '_' . basename($_FILES['photo']['name']);
      $target = __DIR__ . '/../uploads/faculty/' . $filename;
      move_uploaded_file($_FILES['photo']['tmp_name'], $target);
      $photoPath = BASE_URL . '/uploads/faculty/' . $filename;
    }
    $vals = [trim($_POST['name']), trim($_POST['department']), trim($_POST['designation']), trim($_POST['qualification']), (int)$_POST['experience'], trim($_POST['specialization']), $photoPath];
    if ($id) {
      $vals[]=$id;
      db()->prepare("UPDATE faculty SET name=?,department=?,designation=?,qualification=?,experience=?,specialization=?,photo=? WHERE id=?")->execute($vals);
    } else {
      db()->prepare("INSERT INTO faculty (name,department,designation,qualification,experience,specialization,photo) VALUES (?,?,?,?,?,?,?)")->execute($vals);
    }
  }
  if ($action === 'delete') {
    db()->prepare("DELETE FROM faculty WHERE id=?")->execute([(int)$_POST['id']]);
  }
  redirect(BASE_URL . '/admin/manage_faculty.php');
}
$edit = null;
if (isset($_GET['edit'])) {
  $s=db()->prepare("SELECT * FROM faculty WHERE id=?");$s->execute([(int)$_GET['edit']]);$edit=$s->fetch();
}
$items = db()->query("SELECT * FROM faculty ORDER BY department,name")->fetchAll();
$pageTitle = 'Manage Faculty'; require_once __DIR__ . '/../includes/header.php'; ?>
<div class="container py-5"><h1 class="section-title mb-4">Faculty Management</h1>
<form method="post" enctype="multipart/form-data" class="card card-body mb-4"><input type="hidden" name="action" value="save"><input type="hidden" name="id" value="<?= e((string)($edit['id']??0)) ?>"><input type="hidden" name="existing_photo" value="<?= e($edit['photo']??'') ?>">
<div class="row g-2">
<div class="col-md-4"><input class="form-control" name="name" required placeholder="Name" value="<?= e($edit['name']??'') ?>"></div>
<div class="col-md-4"><input class="form-control" name="department" required placeholder="Department" value="<?= e($edit['department']??'') ?>"></div>
<div class="col-md-4"><input class="form-control" name="designation" required placeholder="Designation" value="<?= e($edit['designation']??'') ?>"></div>
<div class="col-md-4"><input class="form-control" name="qualification" required placeholder="Qualification" value="<?= e($edit['qualification']??'') ?>"></div>
<div class="col-md-2"><input class="form-control" type="number" name="experience" required placeholder="Exp" value="<?= e((string)($edit['experience']??0)) ?>"></div>
<div class="col-md-4"><input class="form-control" name="specialization" placeholder="Specialization" value="<?= e($edit['specialization']??'') ?>"></div>
<div class="col-md-2"><input class="form-control" type="file" name="photo" accept="image/*"></div>
</div><button class="btn btn-primary mt-2">Save Faculty</button></form>
<table class="table table-bordered"><thead><tr><th>Name</th><th>Dept</th><th>Designation</th><th>Actions</th></tr></thead><tbody><?php foreach($items as $f): ?><tr><td><?= e($f['name']) ?></td><td><?= e($f['department']) ?></td><td><?= e($f['designation']) ?></td><td><a class="btn btn-sm btn-warning" href="?edit=<?= $f['id'] ?>">Edit</a> <form method="post" class="d-inline"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $f['id'] ?>"><button class="btn btn-sm btn-danger">Delete</button></form></td></tr><?php endforeach; ?></tbody></table>
</div><?php require_once __DIR__ . '/../includes/footer.php'; ?>
