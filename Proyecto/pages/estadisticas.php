<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// 1. Consulta para Gastos por Mes (Últimos 6 meses)
$query_mensual = "SELECT DATE_FORMAT(fecha_gasto, '%M') as mes, SUM(monto_total) as total 
                  FROM gastos 
                  WHERE usuario_id = ? 
                  GROUP BY MONTH(fecha_gasto) 
                  ORDER BY fecha_gasto ASC LIMIT 6";
$stmt1 = $conexion->prepare($query_mensual);
$stmt1->bind_param("i", $usuario_id);
$stmt1->execute();
$res_mensual = $stmt1->get_result();

$meses = [];
$totales = [];
while($row = $res_mensual->fetch_assoc()){
    $meses[] = $row['mes'];
    $totales[] = $row['total'];
}

// 2. Consulta para Gastos por Categoría
$query_cat = "SELECT categoria, SUM(monto_total) as total 
              FROM gastos 
              WHERE usuario_id = ? 
              GROUP BY categoria";
$stmt2 = $conexion->prepare($query_cat);
$stmt2->bind_param("i", $usuario_id);
$stmt2->execute();
$res_cat = $stmt2->get_result();

$categorias = [];
$cantidades = [];
while($row = $res_cat->fetch_assoc()){
    $categorias[] = $row['categoria'];
    $cantidades[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stats-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px; }
        .chart-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        .summary-card { background: #5a189a; color: white; padding: 20px; border-radius: 15px; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>📊 Tus Tendencias Financieras</h1>

        <div class="summary-card">
            <h3>Total Gastado este Mes</h3>
            <p style="font-size: 2rem; font-weight: bold;">
                $<?php echo number_format(array_sum($totales), 2); ?>
            </p>
        </div>

        <div class="stats-container">
            <div class="chart-box">
                <h3 style="text-align:center;">Comparación Mes a Mes</h3>
                <canvas id="chartMensual"></canvas>
            </div>

            <div class="chart-box">
                <h3 style="text-align:center;">Gastos por Categoría</h3>
                <canvas id="chartCategorias"></canvas>
            </div>
        </div>
    </main>

    <script>
        // Configuración Gráfico Mensual
        const ctxMensual = document.getElementById('chartMensual').getContext('2d');
        new Chart(ctxMensual, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [{
                    label: 'Total Gastado ($)',
                    data: <?php echo json_encode($totales); ?>,
                    backgroundColor: '#7b2cbf',
                    borderRadius: 5
                }]
            }
        });

        // Configuración Gráfico Categorías
        const ctxCat = document.getElementById('chartCategorias').getContext('2d');
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($categorias); ?>,
                datasets: [{
                    data: <?php echo json_encode($cantidades); ?>,
                    backgroundColor: ['#ff6d00', '#ff9100', '#ffb600', '#9d4edd']
                }]
            }
        });
    </script>
</body>
</html>
