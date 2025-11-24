<?php
// Admin panel
if (session_status() === PHP_SESSION_NONE) { session_start(); }

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/../config/config.php'; // Ajusta si config está fuera de HOME

require_login('admin');

// Demo datos
$reportes = [
    ['id'=>301,'tipo'=>'Basura','descripcion'=>'Tiradero ilegal','estado'=>'pendiente','empresa'=>''],
    ['id'=>302,'tipo'=>'Seguridad','descripcion'=>'Actos vandálicos','estado'=>'en_proceso','empresa'=>'Ciudad Limpia SRL'],
];

$EMPRESAS = $EMPRESAS ?? [
    'TecSoluciones S.A.',
    'InfraRed Consultores',
    'Ciudad Limpia SRL'
];

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion  = $_POST['accion'] ?? '';
    $repId   = (int)($_POST['reporte_id'] ?? 0);
    if ($accion === 'asignar') {
        $emp = trim($_POST['empresa'] ?? '');
        $msg = "Reporte #$repId asignado a empresa: " . h($emp) . " (demo)";
    } elseif ($accion === 'estado') {
        $estado = trim($_POST['estado'] ?? '');
        $msg = "Estado actualizado para reporte #$repId a " . h($estado) . " (demo)";
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="container">
    <h2>Panel de Administración</h2>
    <?php if ($msg): ?><p class="badge mt" style="display:inline-block;"><?php echo $msg; ?></p><?php endif; ?>

    <div class="grid-2">
        <div class="card mt">
            <h3>Asignar Empresa</h3>
            <form method="post" class="mt">
                <input type="hidden" name="accion" value="asignar">
                <div class="form-group">
                    <label for="reporte_id">Reporte</label>
                    <select id="reporte_id" name="reporte_id" required>
                        <?php foreach ($reportes as $r): ?>
                            <option value="<?php echo h($r['id']); ?>">#<?php echo h($r['id']); ?> - <?php echo h($r['tipo']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="empresa">Empresa</label>
                    <select id="empresa" name="empresa" required>
                        <?php foreach ($EMPRESAS as $e): ?>
                            <option><?php echo h($e); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn">Asignar</button>
            </form>
        </div>

        <div class="card mt">
            <h3>Actualizar Estado</h3>
            <form method="post" class="mt">
                <input type="hidden" name="accion" value="estado">
                <div class="form-group">
                    <label for="rep2">Reporte</label>
                    <select id="rep2" name="reporte_id" required>
                        <?php foreach ($reportes as $r): ?>
                            <option value="<?php echo h($r['id']); ?>">#<?php echo h($r['id']); ?> - <?php echo h($r['tipo']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="pendiente">Pendiente</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="resuelto">Resuelto</option>
                    </select>
                </div>
                <button class="btn">Guardar</button>
            </form>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>