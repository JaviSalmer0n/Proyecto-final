<?php
// helpers.php - funciones comunes

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Escapar HTML seguro
 */
function h($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

/**
 * Enlace de panel según rol
 */
function enlace_panel_por_rol($rol) {
    switch ($rol) {
        case 'ciudadano': return 'ciudadano.php';
        case 'admin': return 'admin.php';
        default: return 'index.php';
    }
}

/**
 * Renderizar estado como badge
 * Estados esperados: pendiente, en_proceso, resuelto
 */
function badge_estado($estado) {
    $estado = strtolower(trim((string)$estado));
    $classBase = 'badge estado-' . str_replace(' ', '_', $estado);

    // Texto formateado
    $texto = ucwords(str_replace('_', ' ', $estado));

    return '<span class="' . h($classBase) . '">' . h($texto) . '</span>';
}