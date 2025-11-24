<?php
// Detalle del reporte
require_once __DIR__ . '/includes/bootstrap.php';
require_login(['ciudadano','admin']);

if (!function_exists('badge_estado')) {
    function badge_estado($estado) {
        return '<span class="badge">' . h($estado) . '</span>';
    }
}

$id = (int)($_GET['id'] ?? 0);

// Demo
$reporte = [
    'id'            => $id ?: 101,
    'tipo'          => 'Alumbrado',
    'descripcion'   => 'Farola apagada frente a la plaza.',
    'direccion'     => 'Plaza Central #123',
    'estado'        => 'en_proceso',
    'creado_en'     => '2025-11-10',
    'actualizado_en'=> '2025-11-15',
    'empresa'       => 'InfraRed Consultores'
];

$seguimientos = [
    ['fecha'=>'2025-11-12', 'autor'=>'admin', 'comentario'=>'Empresa informada, pendiente visita.', 'estado'=>'en_proceso'],
    ['fecha'=>'2025-11-15', 'autor'=>'empresa: InfraRed Consultores', 'comentario'=>'Revisión inicial completada.', 'estado'=>'en_proceso'],
];

include __DIR__ . '/includes/header.php';
?>
<section class="container">
    <h2>Detalle del Reporte #<?= h($reporte['id']); ?></h2>
    <div class="grid-3">
        <div class="card">
            <h3>Información</h3>
            <p><strong>Tipo:</strong> <?= h($reporte['tipo']); ?></p>
            <p><strong>Descripción:</strong> <?= h($reporte['descripcion']); ?></p>
            <p><strong>Ubicación:</strong> <?= h($reporte['direccion']); ?></p>
        </div>
        <div class="card">
            <h3>Estado</h3>
            <p><?= badge_estado($reporte['estado']); ?></p>
            <p><strong>Creado:</strong> <?= h($reporte['creado_en']); ?></p>
            <p><strong>Actualizado:</strong> <?= h($reporte['actualizado_en']); ?></p>
            <p><strong>Empresa Asignada:</strong> <?= h($reporte['empresa']); ?></p>
        </div>
        <div class="card">
            <h3>Acciones</h3>
            <div class="mt">
                <?php if (in_array(user_role(), ['ciudadano','admin'])): ?>
                    <a class="btn" href="reporte_seguimiento.php?id=<?= h($reporte['id']); ?>">Agregar Seguimiento</a>
                <?php endif; ?>
                <?php if (user_role() === 'admin'): ?>
                    <a class="btn btn-secondary" href="admin.php">Actualizar Estado / Empresa</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card mt">
        <h3>Seguimiento</h3>
        <table class="table">
            <thead><tr><th>Fecha</th><th>Autor</th><th>Comentario</th><th>Estado</th></tr></thead>
            <tbody>
            <?php foreach ($seguimientos as $s): ?>
                <tr>
                    <td><?= h($s['fecha']); ?></td>
                    <td><?= h($s['autor']); ?></td>
                    <td><?= h($s['comentario']); ?></td>
                    <td><?= badge_estado($s['estado']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>