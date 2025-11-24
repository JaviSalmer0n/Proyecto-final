<?php
// Login con correo + contraseña (demo). Admin se determina por lista en config/config.php.
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/../config/config.php'; // ajusta si tu config está en otra ruta
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = trim($_POST['password'] ?? '');
    if ($email === '' || $pass === '') {
        $err = 'Correo y contraseña son obligatorios.';
    } else {
        // DEMO: si el correo está en la lista, será admin; si no, ciudadano.
        $rol = (isset($ADMIN_EMAILS) && in_array($email, $ADMIN_EMAILS, true)) ? 'admin' : 'ciudadano';
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name']  = explode('@', $email)[0];
        $_SESSION['user_role']  = $rol;

        // Redirección post-login
        $next = $_GET['next'] ?? enlace_panel_por_rol($rol);
        header('Location: ' . $next);
        exit;
    }
}

// Header desde includes
include __DIR__ . '/includes/header.php';
?>
<section class="container">
    <h2>Iniciar sesión</h2>
    <?php if ($err): ?>
        <p class="badge" style="display:block;margin:.75rem 0;"><?php echo h($err); ?></p>
    <?php endif; ?>
    <form method="post" class="mt">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" required />
        </div>
        <div class="form-group">
            <label for="password">Contraseña (demo)</label>
            <input id="password" name="password" type="password" required />
        </div>
        <button class="btn">Ingresar</button>
    </form>
    <p class="note mt">Si tu correo está en la lista de administradores, entrarás como Admin.</p>
</section>
<?php
// Footer desde includes
include __DIR__ . '/includes/footer.php';