<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// 1. Consulta para Gastos por Mes
$query_mensual = "SELECT DATE_FORMAT(MAX(fecha_gasto), '%m') as mes_num, SUM(monto_total) as total 
                  FROM gastos 
                  WHERE usuario_id = ? 
                  GROUP BY YEAR(fecha_gasto), MONTH(fecha_gasto) 
                  ORDER BY YEAR(fecha_gasto) ASC, MONTH(fecha_gasto) ASC 
                  LIMIT 6";
$stmt1 = $conexion->prepare($query_mensual);
$stmt1->bind_param("i", $usuario_id);
$stmt1->execute();
$res_mensual = $stmt1->get_result();

$nombres_meses = [
    '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo',
    '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
    '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
    '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
];

$meses = [];
$totales = [];
while($row = $res_mensual->fetch_assoc()){
    $meses[] = $nombres_meses[$row['mes_num']];
    $totales[] = $row['total'];
}
$ultimo_gasto_mes = empty($totales) ? 0 : end($totales);

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
    $categorias[] = ucfirst($row['categoria']);
    $cantidades[] = $row['total'];
}

// 3. Consulta Dinero por Cobrar (Solucionado error de PHP 8)
$query_cobrar = "SELECT SUM(d.monto_asignado) as pendiente 
                 FROM detalle_gasto d 
                 JOIN gastos g ON d.gasto_id = g.id 
                 WHERE g.usuario_id = ? AND d.pagado = 0 AND g.pagado_por = 'Yo' AND d.nombre_participante != 'Yo'";
$stmt3 = $conexion->prepare($query_cobrar);
$stmt3->bind_param("i", $usuario_id);
$stmt3->execute();
$row3 = $stmt3->get_result()->fetch_assoc();
$total_por_cobrar = ($row3 && isset($row3['pendiente'])) ? $row3['pendiente'] : 0;

// 4. Consulta Dinero por Pagar (Solucionado error de PHP 8)
$query_pagar = "SELECT SUM(d.monto_asignado) as deuda 
                FROM detalle_gasto d 
                JOIN gastos g ON d.gasto_id = g.id 
                WHERE g.usuario_id = ? AND d.pagado = 0 AND g.pagado_por != 'Yo' AND d.nombre_participante = 'Yo'";
$stmt4 = $conexion->prepare($query_pagar);
$stmt4->bind_param("i", $usuario_id);
$stmt4->execute();
$row4 = $stmt4->get_result()->fetch_assoc();
$total_por_pagar = ($row4 && isset($row4['deuda'])) ? $row4['deuda'] : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stats-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px 0; }
        .chart-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); width: 100%; max-width: 500px; }
        .cards-wrapper { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 20px; }
        .summary-card { color: white; padding: 20px; border-radius: 15px; text-align: center; flex: 1; min-width: 200px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .summary-card:hover { transform: translateY(-3px); }
        .card-main { background: var(--indigo); }
        .card-success { background: var(--exito); }
        .card-danger { background: var(--error); }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <main class="dashboard-container fade-in">
        <h1 style="margin-bottom: 20px;">📊 Tus Tendencias Financieras</h1>
        <div class="cards-wrapper">
            <div class="summary-card card-main">
                <h3>Gastado el último mes</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($ultimo_gasto_mes, 2); ?></p>
            </div>
            <div class="summary-card card-success">
                <h3>Por Cobrar (Me deben)</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($total_por_cobrar, 2); ?></p>
            </div>
            <div class="summary-card card-danger">
                <h3>Por Pagar (Debo)</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($total_por_pagar, 2); ?></p>
            </div>
        </div>
        <div class="stats-container">
            <div class="chart-box">
                <h3 style="text-align:center; color: var(--indigo); margin-bottom: 15px;">Comparación Mes a Mes</h3>
                <canvas id="chartMensual"></canvas>
            </div>
            <div class="chart-box">
                <h3 style="text-align:center; color: var(--indigo); margin-bottom: 15px;">Gastos por Categoría</h3>
                <canvas id="chartCategorias"></canvas>
            </div>
        </div>
    </main>
    <script>
        const ctxMensual = document.getElementById('chartMensual').getContext('2d');
        new Chart(ctxMensual, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [{
                    label: 'Total Gastado ($)',
                    data: <?php echo json_encode($totales); ?>,
                    backgroundColor: '#3F51B5',
                    borderRadius: 5
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });

        const ctxCat = document.getElementById('chartCategorias').getContext('2d');
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($categorias); ?>,
                datasets: [{
                    data: <?php echo json_encode($cantidades); ?>,
                    backgroundColor: ['#27AE60', '#3F51B5', '#E74C3C', '#F1C40F', '#9B59B6', '#E67E22']
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });
    </script>
</body>
</html>
