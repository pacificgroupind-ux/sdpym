<?php
require_once __DIR__ . '/../includes/functions.php';
require_admin(['super_admin','staff','editor']);
if(is_post()){
 $action=$_POST['action']??'';
 if($action==='save'){
  $id=(int)($_POST['id']??0);$title=trim($_POST['title']);$details=trim($_POST['details']);$event_date=trim($_POST['event_date']);
  if($id){db()->prepare("UPDATE events SET title=?,details=?,event_date=? WHERE id=?")->execute([$title,$details,$event_date,$id]);}
  else{db()->prepare("INSERT INTO events (title,details,event_date) VALUES (?,?,?)")->execute([$title,$details,$event_date]);}
 }
 if($action==='delete'){db()->prepare("DELETE FROM events WHERE id=?")->execute([(int)$_POST['id']]);}
 redirect(BASE_URL.'/admin/manage_events.php');
}
$items=db()->query("SELECT * FROM events ORDER BY event_date DESC")->fetchAll();
$pageTitle='Manage Events'; require_once __DIR__.'/../includes/header.php'; ?>
<div class="container py-5"><h1 class="section-title mb-4">Events & Activities Management</h1>
<form method="post" class="card card-body mb-4"><input type="hidden" name="action" value="save"><div class="row g-2"><div class="col-md-3"><input class="form-control" name="title" placeholder="Event title" required></div><div class="col-md-5"><input class="form-control" name="details" placeholder="Event details"></div><div class="col-md-2"><input type="date" class="form-control" name="event_date" required></div><div class="col-md-2"><button class="btn btn-primary w-100">Add</button></div></div></form>
<table class="table table-bordered"><thead><tr><th>Date</th><th>Title</th><th>Details</th><th>Action</th></tr></thead><tbody><?php foreach($items as $ev): ?><tr><td><?= e($ev['event_date']) ?></td><td><?= e($ev['title']) ?></td><td><?= e($ev['details']) ?></td><td><form method="post"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $ev['id'] ?>"><button class="btn btn-sm btn-danger">Delete</button></form></td></tr><?php endforeach; ?></tbody></table></div>
<?php require_once __DIR__.'/../includes/footer.php'; ?>
