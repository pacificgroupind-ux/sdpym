<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin(['super_admin','staff','editor']);
if (is_post()) {
  $action=$_POST['action']??'';
  if($action==='save'){
    $title=trim($_POST['title']);
    $path=trim($_POST['image_path']??'');
    if (!empty($_FILES['image']['name'])) {
      $filename = time().'_'.basename($_FILES['image']['name']);
      $target = __DIR__.'/../uploads/gallery/'.$filename;
      move_uploaded_file($_FILES['image']['tmp_name'],$target);
      $path = BASE_URL.'/uploads/gallery/'.$filename;
    }
    if ($path) db()->prepare("INSERT INTO gallery (title,image_path) VALUES (?,?)")->execute([$title,$path]);
  }
  if($action==='delete'){ db()->prepare("DELETE FROM gallery WHERE id=?")->execute([(int)$_POST['id']]); }
  redirect(BASE_URL.'/admin/manage_gallery.php');
}
$items=db()->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
$pageTitle='Manage Gallery'; require_once __DIR__.'/../includes/header.php'; ?>
<div class="container py-5"><h1 class="section-title mb-4">Gallery Management</h1>
<form method="post" enctype="multipart/form-data" class="card card-body mb-4"><input type="hidden" name="action" value="save"><div class="row g-2"><div class="col-md-4"><input class="form-control" name="title" placeholder="Image title"></div><div class="col-md-4"><input class="form-control" type="file" name="image" accept="image/*"></div><div class="col-md-4"><input class="form-control" name="image_path" placeholder="Or paste image URL"></div></div><button class="btn btn-primary mt-2">Add Image</button></form>
<div class="row g-3"><?php foreach($items as $g): ?><div class="col-md-3"><img src="<?= e($g['image_path']) ?>" class="img-fluid rounded mb-2"><form method="post"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $g['id'] ?>"><button class="btn btn-sm btn-danger w-100">Delete</button></form></div><?php endforeach; ?></div></div>
<?php require_once __DIR__.'/../includes/footer.php'; ?>
