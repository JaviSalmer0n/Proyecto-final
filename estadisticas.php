<?php
require_once __DIR__ . '/includes/helpers.php';
include __DIR__ . '/includes/header.php';
$totales = 128; $pend = 37; $proc = 65; $res = 26;
$porZona = [
    ['zona'=>'Centro','total'=>46],
    ['zona'=>'Norte','total'=>28],
    ['zona'=>'Sur','total'=>32],
    ['zona'=>'Oriente','total'=>12],
    ['zona'=>'Poniente','total'=>10],
];
$porTipo = [
    ['tipo'=>'Bache','total'=>40],
    ['tipo'=>'Alumbrado','total'=>30],
    ['tipo'=>'Basura','total'=>22],
    ['tipo'=>'Seguridad','total'=>20],
    ['tipo'=>'Agua','total'=>16],
];
?>
<section class="container">
    <h2>Estadísticas</h2>
    <div class="grid-4 compact mt">
        <div class="stat-box"><span class="stat-number"><?php echo $totales; ?></span><span class="stat-label">Totales</span></div>
        <div class="stat-box"><span class="stat-number"><?php echo $pend; ?></span><span class="stat-label">Pendientes</span></div>
        <div class="stat-box"><span class="stat-number"><?php echo $proc; ?></span><span class="stat-label">En Proceso</span></div>
        <div class="stat-box"><span class="stat-number"><?php echo $res; ?></span><span class="stat-label">Resueltos</span></div>
    </div>
    <div class="grid-3 mt">
        <div class="card">
            <h3>Incidencias por Zona</h3>
            <table class="table">
                <thead><tr><th>Zona</th><th>Total</th></tr></thead>
                <tbody>
                <?php foreach ($porZona as $z): ?>
                    <tr><td><?php echo h($z['zona']); ?></td><td><?php echo h($z['total']); ?></td></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card">
            <h3>Incidencias por Tipo</h3>
            <table class="table">
                <thead><tr><th>Tipo</th><th>Total</th></tr></thead>
                <tbody>
                <?php foreach ($porTipo as $t): ?>
                    <tr><td><?php echo h($t['tipo']); ?></td><td><?php echo h($t['total']); ?></td></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card">
            <h3>Notas</h3>
            <p>Datos de ejemplo. Se conectarán a la base de datos con consultas agregadas.</p>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>