<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Contact - ' . APP_NAME;
require_once __DIR__ . '/includes/header.php';
?>
<div class="container py-5">
  <h1 class="section-title mb-4">Contact Us</h1>
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <p><strong>Address:</strong> Shri ABCD Mahavidyalaya, Saitanpur, India</p>
          <p><strong>Phone:</strong> +91-9876543210</p>
          <p><strong>Email:</strong> info@abcd.edu.in</p>
          <div class="ratio ratio-4x3"><iframe src="https://maps.google.com/maps?q=Varanasi&t=&z=11&ie=UTF8&iwloc=&output=embed" title="College map"></iframe></div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card shadow-sm"><div class="card-body"><h5>Send Message</h5><form class="row g-2"><div class="col-12"><input class="form-control" placeholder="Name"></div><div class="col-12"><input type="email" class="form-control" placeholder="Email"></div><div class="col-12"><textarea class="form-control" rows="4" placeholder="Message"></textarea></div><div class="col-12"><button type="button" class="btn btn-primary">Send</button></div></form></div></div>
<?php $pageTitle = 'Contact - ' . APP_NAME; require_once __DIR__ . '/includes/header.php'; ?>
<div class="container py-5">
  <h1 class="section-title mb-4">Contact Us</h1>
  <div class="row g-4">
    <div class="col-md-6">
      <p><strong>Address:</strong> Shri ABCD Mahavidyalaya, Saitanpur, India</p>
      <p><strong>Phone:</strong> +91-9876543210</p>
      <p><strong>Email:</strong> info@abcd.edu.in</p>
      <div class="ratio ratio-4x3"><iframe src="https://maps.google.com/maps?q=Varanasi&t=&z=11&ie=UTF8&iwloc=&output=embed" title="Map"></iframe></div>
    </div>
    <div class="col-md-6">
      <div class="card"><div class="card-body"><h5>Send Message</h5><form><input class="form-control mb-2" placeholder="Name"><input class="form-control mb-2" placeholder="Email"><textarea class="form-control mb-2" rows="4" placeholder="Message"></textarea><button type="button" class="btn btn-primary">Send</button></form></div></div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
