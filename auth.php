<?php
// auth.php - control de sesión y roles
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in() {
    return !empty($_SESSION['user_role']);
}

function user_role() {
    return $_SESSION['user_role'] ?? null;
}

function require_login($roles = null) {
    if (!is_logged_in()) {
        header('Location: login.php?next=' . urlencode($_SERVER['REQUEST_URI'] ?? 'index.php'));
        exit;
    }
    if ($roles) {
        $rolesArr = is_array($roles) ? $roles : [$roles];
        if (!in_array(user_role(), $rolesArr, true)) {
            http_response_code(403);
            echo "<p style='padding:1rem;font-family:system-ui'>Acceso denegado.</p>";
            exit;
        }
    }
}

function es_admin() {
    return user_role() === 'admin';
}