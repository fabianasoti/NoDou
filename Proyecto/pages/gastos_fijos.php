<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// Consultar los gastos fijos del usuario
$query = "SELECT * FROM gastos_fijos WHERE usuario_id = ? ORDER BY dia_vencimiento ASC";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gastos Fijos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .checklist-container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .gasto-fijo-item { display: flex; align-items: center; justify-content: space-between; padding: 15px; border-bottom: 1px solid #eee; }
        .gasto-fijo-item:last-child { border-bottom: none; }
        .info-pago { display: flex; align-items: center; gap: 15px; }
        .dia-badge { background: #5a189a; color: white; padding: 5px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; }
        .completado { text-decoration: line-through; color: #aaa; }
        .checkbox-custom { width: 25px; height: 25px; cursor: pointer; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1 style="text-align:center;">📅 Mis Gastos Fijos</h1>
        <p style="text-align:center; color: #666; margin-bottom: 20px;">Controla tus pagos recurrentes del mes</p>

        <div class="checklist-container">
            <?php while($gasto = $resultado->fetch_assoc()): ?>
                <div class="gasto-fijo-item">
                    <div class="info-pago">
                        <span class="dia-badge">Día <?php echo $gasto['dia_vencimiento']; ?></span>
                        <div>
                            <strong class="<?php echo $gasto['completado_mes_actual'] ? 'completado' : ''; ?>">
                                <?php echo htmlspecialchars($gasto['titulo']); ?>
                            </strong>
                            <br>
                            <small>$<?php echo number_format($gasto['monto_estimado'], 2); ?></small>
                        </div>
                    </div>
                    <input type="checkbox" 
                           class="checkbox-custom" 
                           <?php echo $gasto['completado_mes_actual'] ? 'checked' : ''; ?>
                           onclick="marcarPago(<?php echo $gasto['id']; ?>, this)">
                </div>
            <?php endwhile; ?>
            
            <?php if ($resultado->num_rows == 0): ?>
                <p style="text-align:center; padding: 20px;">No tienes gastos fijos registrados.</p>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function marcarPago(id, checkbox) {
            const
