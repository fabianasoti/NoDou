<?php
session_start();
if (!isset($_SESSION['usuario_id'])) { header("Location: login_vista.php"); exit(); }
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];
$dia_actual = date('j'); // Día del mes sin ceros iniciales

// 1. Gastos Fijos Pendientes
$query_fijos = "SELECT * FROM gastos_fijos WHERE usuario_id = ? AND completado_mes_actual = 0 ORDER BY dia_vencimiento ASC";
$stmt = $conexion->prepare($query_fijos);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$fijos_pendientes = $stmt->get_result();

// 2. Dinero por COBRAR (Tú pagaste la cuenta, otros te deben)
$query_cobrar = "SELECT d.nombre_participante, g.titulo, d.monto_asignado, g.fecha_gasto 
                 FROM detalle_gasto d 
                 JOIN gastos g ON d.gasto_id = g.id 
                 WHERE g.usuario_id = ? 
                   AND d.pagado = 0 
                   AND g.pagado_por = 'Yo' 
                   AND d.nombre_participante != 'Yo'
                 ORDER BY g.fecha_gasto DESC";
$stmt2 = $conexion->prepare($query_cobrar);
$stmt2->bind_param("i", $usuario_id);
$stmt2->execute();
$deudas_cobrar = $stmt2->get_result();

// 3. Dinero por PAGAR (Alguien más pagó la cuenta, tú le debes)
$query_pagar = "SELECT g.pagado_por as acreedor, g.titulo, d.monto_asignado, g.fecha_gasto 
                FROM detalle_gasto d 
                JOIN gastos g ON d.gasto_id = g.id 
                WHERE g.usuario_id = ? 
                  AND d.pagado = 0 
                  AND g.pagado_por != 'Yo' 
                  AND d.nombre_participante = 'Yo'
                ORDER BY g.fecha_gasto DESC";
$stmt3 = $conexion->prepare($query_pagar);
$stmt3->bind_param("i", $usuario_id);
$stmt3->execute();
$deudas_pagar = $stmt3->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificaciones - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .notif-section { background: white; padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .notif-item { display: flex; justify-content: space-between; align-items: center; padding: 15px; border-bottom: 1px solid #f0f0f0; }
        .notif-item:last-child { border-bottom: none; }
        .badge-urgent { background: #ffebee; color: #c62828; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: bold; }
        .badge-warn { background: #fff8e1; color: #f57f17; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: bold; }
        
        .title-cobrar { color: var(--exito); border-bottom: 2px solid #e8f5e9; padding-bottom:10px; }
        .title-pagar { color: var(--error); border-bottom: 2px solid #ffebee; padding-bottom:10px; }
        .title-fijos { color: var(--indigo); border-bottom: 2px solid #f0e6ff; padding-bottom:10px; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <main class="dashboard-container fade-in">
        <h1>🔔 Centro de Notificaciones</h1>

        <div class="notif-section">
            <h2 class="title-fijos">📅 Gastos Fijos Pendientes</h2>
            <?php if($fijos_pendientes->num_rows > 0): ?>
                <?php while($fijo = $fijos_pendientes->fetch_assoc()): ?>
                    <div class="notif-item">
                        <div>
                            <strong><?php echo htmlspecialchars($fijo['titulo']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">Vence el día <?php echo $fijo['dia_vencimiento']; ?></div>
                        </div>
                        <?php 
                            if ($dia_actual > $fijo['dia_vencimiento']) { echo '<span class="badge-urgent">¡Vencido!</span>'; }
                            else if ($fijo['dia_vencimiento'] - $dia_actual <= 3) { echo '<span class="badge-warn">Próximo</span>'; }
                        ?>
                        <div style="font-weight: bold;">$<?php echo number_format($fijo['monto_estimado'], 2); ?></div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">¡Todo al día con tus gastos fijos!</p>
            <?php endif; ?>
        </div>

        <div class="notif-section">
            <h2 class="title-pagar">💸 Dinero que debes (Por Pagar)</h2>
            <?php if($deudas_pagar->num_rows > 0): ?>
                <?php while($deuda = $deudas_pagar->fetch_assoc()): ?>
                    <div class="notif-item" style="background-color: #fffafb; border-radius: 8px;">
                        <div>
                            <strong style="color: var(--error);">Le debes a: <?php echo htmlspecialchars($deuda['acreedor']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">De: <?php echo htmlspecialchars($deuda['titulo']); ?> (<?php echo date('d/m/Y', strtotime($deuda['fecha_gasto'])); ?>)</div>
                        </div>
                        <div style="font-weight: bold; color: var(--error); font-size: 1.1rem;">
                            $<?php echo number_format($deuda['monto_asignado'], 2); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">No le debes dinero a nadie. ¡Tienes tus cuentas claras!</p>
            <?php endif; ?>
        </div>

        <div class="notif-section">
            <h2 class="title-cobrar">💰 Dinero que te deben (Por Cobrar)</h2>
            <?php if($deudas_cobrar->num_rows > 0): ?>
                <?php while($deuda = $deudas_cobrar->fetch_assoc()): ?>
                    <div class="notif-item">
                        <div>
                            <strong>Cobrar a: <?php echo htmlspecialchars($deuda['nombre_participante']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">De: <?php echo htmlspecialchars($deuda['titulo']); ?> (<?php echo date('d/m/Y', strtotime($deuda['fecha_gasto'])); ?>)</div>
                        </div>
                        <div style="font-weight: bold; color: var(--exito); font-size: 1.1rem;">
                            $<?php echo number_format($deuda['monto_asignado'], 2); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">Nadie te debe dinero actualmente.</p>
            <?php endif; ?>
        </div>

    </main>
</body>
</html>
