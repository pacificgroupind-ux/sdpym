<?php
require_once __DIR__ . '/../config/database.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function is_post(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function mail_admission_notification(array $admission): void
{
    if (!MAIL_ENABLED) {
        return;
    }

    $subject = 'New Admission Application - ' . $admission['name'];
    $body = "New admission form submitted\n\n"
        . "Name: {$admission['name']}\n"
        . "Email: {$admission['email']}\n"
        . "Phone: {$admission['phone']}\n"
        . "Course: {$admission['course']}\n"
        . "Message: {$admission['message']}\n";

    @mail(MAIL_TO, $subject, $body);
}

function require_admin(array $allowedRoles = []): void
{
    if (empty($_SESSION['admin'])) {
        redirect(BASE_URL . '/admin/login.php');
    }

    if ($allowedRoles && !in_array($_SESSION['admin']['role'], $allowedRoles, true)) {
        set_flash('danger', 'You are not authorized to access that page.');
        redirect(BASE_URL . '/admin/dashboard.php');
    }
}

function require_student(): void
{
    if (empty($_SESSION['student'])) {
        redirect(BASE_URL . '/student/login.php');
    }
}
