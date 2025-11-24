<?php
// Panel del ciudadano
require_once __DIR__ . '/includes/bootstrap.php';
require_login('ciudadano');

// Fallback (por si helpers no cargó, evitar fatal):
if (!function_exists('badge_estado')) {
    function badge_estado($estado) {
        return '<span class="badge">' . h($estado) . '</span>';
    }
}

$misReportes = [
    ['id'=>101, 'tipo'=>'Alumbrado', 'descripcion'=>'Farola apagada', 'estado'=>'pendiente', 'creado_en'=>'2025-11-10', 'empresa'=>'TecSoluciones S.A.'],
    ['id'=>102, 'tipo'=>'Bache', 'descripcion'=>'Bache en Av. Central', 'estado'=>'en_proceso', 'creado_en'=>'2025-11-12', 'empresa'=>'InfraRed Consultores'],
    ['id'=>103, 'tipo'=>'Basura', 'descripcion'=>'Acumulación de basura', 'estado'=>'resuelto',  'creado_en'=>'2025-11-14', 'empresa'=>'Ciudad Limpia SRL'],
];

include __DIR__ . '/includes/header.php';
?>
<section class="container">
    <h2>Mi Panel (Ciudadano)</h2>
    <div class="mt mb">
        <a class="btn" href="reporte_nuevo.php">Nuevo Reporte</a>
    </div>

    <div class="card">
        <h3 class="mb">Informes</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Empresa</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($misReportes as $r): ?>
                <tr>
                    <td><?= h($r['id']); ?></td>
                    <td><?= h($r['tipo']); ?></td>
                    <td><?= h($r['descripcion']); ?></td>
                    <td><?= badge_estado($r['estado']); ?></td>
                    <td><?= h($r['empresa']); ?></td>
                    <td><?= h($r['creado_en']); ?></td>
                    <td>
                        <a class="btn btn-outlined" href="reporte_ver.php?id=<?= h($r['id']); ?>">Ver</a>
                        <?php if ($r['estado'] !== 'resuelto'): ?>
                            <a class="btn btn-secondary" href="reporte_seguimiento.php?id=<?= h($r['id']); ?>">Seguimiento</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php if (!function_exists('badge_estado')): ?>
            <p style="color:red;font-size:.85rem;">Aviso: helpers.php no se cargó correctamente (usando fallback). Revisa la ruta.</p>
        <?php endif; ?>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>