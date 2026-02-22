<?php
require_once __DIR__ . '/../includes/functions.php';
unset($_SESSION['student']);
redirect(BASE_URL . '/student/login.php');
