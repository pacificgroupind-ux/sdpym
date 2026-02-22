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
