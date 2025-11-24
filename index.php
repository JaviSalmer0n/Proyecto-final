<?php
require_once __DIR__ . '/includes/helpers.php';
include __DIR__ . '/includes/header.php';
$rol = $_SESSION['user_role'] ?? null;
?>
<section class="hero">
    <div class="hero-content">
        <h1>Sistema de Reportes Ciudadanos</h1>
        <p>Registra incidencias en tu comunidad y permite al municipio darles seguimiento en tiempo real. Mejora la comunicación y la eficiencia del servicio público.</p>
        <?php if (!$rol): ?>
            <div class="hero-actions">
                <a href="registro.php" class="btn btn-lg">Crear Cuenta</a>
                <a href="login.php" class="btn btn-outlined btn-lg">Iniciar Sesión</a>
            </div>
        <?php else: ?>
            <div class="hero-actions">
                <a href="<?php echo enlace_panel_por_rol($rol); ?>" class="btn btn-lg">Ir a mi Panel</a>
                <a href="reporte_nuevo.php" class="btn btn-outlined btn-lg">Reportar Incidencia</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="features container">
    <h2>Características Principales</h2>
    <div class="grid-3">
        <div class="card">
            <h3>Registro de Reportes</h3>
            <p>Incidencias con tipo, descripción, ubicación y evidencia opcional.</p>
        </div>
        <div class="card">
            <h3>Seguimiento</h3>
            <p>Estados: pendiente, en proceso, resuelto, con comentarios y evidencias.</p>
        </div>
        <div class="card">
            <h3>Asignación a Empresas</h3>
            <p>El administrador asigna empresas responsables de resolver el reporte.</p>
        </div>
        <div class="card">
            <h3>Estadísticas</h3>
            <p>Zonas con más incidencias, tiempos de resolución y eficiencia.</p>
        </div>
        <div class="card">
            <h3>Transparencia</h3>
            <p>Fortalece la comunicación ciudadano-gobierno.</p>
        </div>
        <div class="card">
            <h3>Empresas</h3>
            <p>Gestión clara de qué empresa atiende cada problema.</p>
        </div>
    </div>
</section>

<section class="workflow container">
    <h2>Cómo Funciona</h2>
    <ol class="steps">
        <li><strong>1. Registro:</strong> El ciudadano crea su cuenta.</li>
        <li><strong>2. Reporte:</strong> Ingresa incidencia con detalles.</li>
        <li><strong>3. Asignación:</strong> Administración designa empresa.</li>
        <li><strong>4. Seguimiento:</strong> Comentarios y evidencias.</li>
        <li><strong>5. Resolución:</strong> Se marca resuelto y pasa a métricas.</li>
    </ol>
</section>

<section class="stats-preview container">
    <h2>Resumen (Demo)</h2>
    <div class="grid-4 compact">
        <div class="stat-box"><span class="stat-number">128</span><span class="stat-label">Reportes</span></div>
        <div class="stat-box"><span class="stat-number">37</span><span class="stat-label">Pendientes</span></div>
        <div class="stat-box"><span class="stat-number">65</span><span class="stat-label">En Proceso</span></div>
        <div class="stat-box"><span class="stat-number">26</span><span class="stat-label">Resueltos</span></div>
    </div>
    <p class="note">Datos de ejemplo. Se harán dinámicos con la base de datos.</p>
</section>

<section class="cta container">
    <div class="cta-card">
        <h2>¿Listo para mejorar tu comunidad?</h2>
        <p>Empieza a reportar incidencias y contribuye a un entorno más seguro y eficiente.</p>
        <?php if (!$rol): ?>
            <a href="registro.php" class="btn btn-lg">Comenzar</a>
        <?php else: ?>
            <a href="reporte_nuevo.php" class="btn btn-lg">Reportar Ahora</a>
        <?php endif; ?>
    </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>