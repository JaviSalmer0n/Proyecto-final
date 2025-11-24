<?php
// bootstrap.php - punto único para cargar lo común
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('INC_PATH', __DIR__);          // .../HOME/includes
define('APP_PATH', dirname(__DIR__)); // .../HOME

require_once INC_PATH . '/helpers.php';
require_once INC_PATH . '/auth.php';
// Si usarás base de datos: require_once INC_PATH . '/db.php';