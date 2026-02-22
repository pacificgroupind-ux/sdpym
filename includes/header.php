<?php require_once __DIR__ . '/functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle ?? APP_NAME) ?></title>
    <meta name="description" content="Official website of Shri ABCD Mahavidyalaya, Saitanpur. Admissions, faculty, courses, notices, NAAC/NIRF information.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="<?= BASE_URL ?>/index.php"><?= APP_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/courses.php">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/faculty.php">Faculty</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/admissions.php">Admissions</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/student-corner.php">Student Corner</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/gallery.php">Gallery</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/naac-nirf.php">NAAC / NIRF</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/contact.php">Contact</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/admin/login.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
<?php if ($flash = get_flash()): ?>
<div class="container mt-3">
    <div class="alert alert-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
</div>
<?php endif; ?>
