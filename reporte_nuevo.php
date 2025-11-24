<?php
require_once __DIR__ . '/includes/auth.php';
require_login(['ciudadano','admin']);
require_once __DIR__ . '/includes/helpers.php';
$creado = false;
$nuevoId = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creado = true;
    $nuevoId = rand(200, 999);
}
include __DIR__ . '/includes/header.php';
?>
<section class="container">
    <h2>Registrar Nueva Incidencia</h2>
    <?php if ($creado): ?>
        <div class="card mt">
            <p>Reporte creado (demo) con ID #<?php echo h($nuevoId); ?>.</p>
            <div class="mt">
                <a class="btn" href="reporte_ver.php?id=<?php echo h($nuevoId); ?>">Ver Reporte</a>
                <a class="btn btn-outlined" href="ciudadano.php">Volver a mi Panel</a>
            </div>
        </div>
    <?php else: ?>
        <form method="post" enctype="multipart/form-data" class="mt">
            <div class="form-group">
                <label for="tipo">Tipo de problema</label>
                <select id="tipo" name="tipo" required>
                    <option value="">Selecciona...</option>
                    <option>Alumbrado</option>
                    <option>Bache</option>
                    <option>Basura</option>
                    <option>Seguridad</option>
                    <option>Agua</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="direccion">Ubicación (dirección o referencia)</label>
                <input id="direccion" name="direccion" type="text" required />
            </div>
            <div class="form-group">
                <label for="evidencia">Evidencia (opcional)</label>
                <input id="evidencia" name="evidencia" type="file" accept="image/*,application/pdf" />
            </div>
            <button class="btn">Enviar Reporte</button>
        </form>
    <?php endif; ?>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>