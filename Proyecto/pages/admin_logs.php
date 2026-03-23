<?php
session_start();
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Logs del Sistema - NoDou</title>
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
        <h1>🖥️ Monitor de Eventos (NoSQL JSON)</h1>
        <p>Lectura directa desde el archivo JSON sin usar la base de datos relacional.</p>

        <table class="log-table">
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>ID Usuario</th>
                    <th>Acción</th>
                    <th>Detalle Dinámico (JSON)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($logs)): ?>
                    <tr><td colspan="4" style="text-align: center;">No hay registros de actividad aún.</td></tr>
                <?php else: ?>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?php echo $log['fecha_hora']; ?></td>
                            <td>Usuario #<?php echo $log['usuario_id']; ?></td>
                            <td><strong><?php echo $log['accion']; ?></strong></td>
                            <td>
                                <div class="json-viewer"><?php echo json_encode($log['detalles']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
