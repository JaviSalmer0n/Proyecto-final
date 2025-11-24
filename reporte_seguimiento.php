<?php
require_once __DIR__ . '/auth.php';
require_login(['ciudadano','admin']); // quité 'responsable'
require_once __DIR__ . '/helpers.php';

$id = (int)($_GET['id'] ?? 0);
$ok = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: guardar seguimiento en DB
    $ok = true;
}

include __DIR__ . '/header.php';
?>
<section class="container">
    <h2>Agregar Seguimiento al Reporte #<?php echo h($id ?: 0); ?></h2>
    <?php if ($ok): ?>
        <div class="card mt">
            <p>Seguimiento agregado (demo).</p>
            <div class="mt">
                <a class="btn" href="reporte_ver.php?id=<?php echo h($id); ?>">Volver al Reporte</a>
            </div>
        </div>
    <?php else: ?>
        <form method="post" enctype="multipart/form-data" class="mt">
            <div class="form-group">
                <label for="comentario">Comentario</label>
                <textarea id="comentario" name="comentario" rows="3" required></textarea>
            </div>
            <?php if (user_role() === 'admin'): ?>
                <div class="form-group">
                    <label for="estado">Actualizar Estado</label>
                    <select id="estado" name="estado">
                        <option value="">Sin cambio</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="resuelto">Resuelto</option>
                    </select>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="evidencia">Evidencia (opcional)</label>
                <input id="evidencia" name="evidencia" type="file" accept="image/*,application/pdf" />
            </div>
            <button class="btn">Guardar Seguimiento</button>
        </form>
    <?php endif; ?>
</section>
<?php include __DIR__ . '/footer.php'; ?>