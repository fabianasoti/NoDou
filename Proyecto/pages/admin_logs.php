<?php
session_start();
require_once '../config/traductor.php';
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: dashboard.php");
    exit("Acceso denegado");
}

// LEER LA BASE DE DATOS NOSQL (Archivo JSON)
$archivo_log = '../logs/actividad.json';
$logs = [];

if (file_exists($archivo_log)) {
    $contenido = file_get_contents($archivo_log);
    $logs = json_decode($contenido, true) ?? [];
}
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo t('logs'); ?> - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .json-viewer { background: #2C3E50; color: #a6e22e; padding: 15px; border-radius: 8px; font-family: monospace; overflow-x: auto; white-space: pre-wrap; font-size: 0.85rem;}
        .log-table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .log-table th, .log-table td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        .log-table th { background: var(--indigo); color: white; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>🖥️ <?php echo t('monitor_eventos'); ?></h1>
        <p><?php echo t('lectura_json_descripcion'); ?></p>

        <table class="log-table">
            <thead>
                <tr>
                    <th><?php echo t('fecha_hora'); ?></th>
                    <th><?php echo t('id_usuario'); ?></th>
                    <th><?php echo t('accion'); ?></th>
                    <th><?php echo t('detalle_dinamico'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($logs)): ?>
                    <tr><td colspan="4" style="text-align: center;"><?php echo t('no_registros_actividad'); ?></td></tr>
                <?php else: ?>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?php echo $log['fecha_hora']; ?></td>
                            <td>Usuario #<?php echo $log['usuario_id']; ?></td>
                            <td><strong><?php echo $log['accion']; ?></strong></td>
                            <td>
                                <div class="json-viewer"><?php echo json_encode($log['detalles'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
