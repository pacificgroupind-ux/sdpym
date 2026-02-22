<?php
require_once __DIR__ . '/../includes/functions.php';
unset($_SESSION['admin']);
set_flash('success', 'Logged out successfully.');
redirect(BASE_URL . '/admin/login.php');
