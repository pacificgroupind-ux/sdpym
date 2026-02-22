<?php
// Global application configuration.

define('APP_NAME', 'Shri ABCD Mahavidyalaya');
define('BASE_URL', 'http://localhost:8000');

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'saitanpur_college');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

define('MAIL_ENABLED', false);
define('MAIL_TO', 'admissions@abcd.edu.in');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
