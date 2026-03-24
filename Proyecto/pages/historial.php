<?php
session_start();
require_once '../config/traductor.php';
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';

$usuario_id = $_SESSION['usuario_id'];

// Consultamos todos los gastos y sus detalles
$query = "SELECT g.id as gasto_id, g.titulo, g.monto_total, g.fecha_gasto, g.metodo_division, g.pagado_por, 
                 d.id as detalle_id, d.nombre_participante, d.monto_asignado, d.pagado
          FROM gastos g
          LEFT JOIN detalle_gasto d ON g.id = d.gasto_id
          WHERE g.usuario_id = ?
          ORDER BY g.fecha_gasto DESC, g.id DESC";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

$historial = [];
while ($row = $resultado->fetch_assoc()) {
    $id = $row['gasto_id'];
    if (!isset($historial[$id])) {
        $historial[$id] = [
            'titulo' => $row['titulo'],
            'fecha' => $row['fecha_gasto'],
            'total' => $row['monto_total'],
            'pagado_por' => isset($row['pagado_por']) ? $row['pagado_por'] : 'Yo',
            'detalles' => []
        ];
    }
    if (!empty($row['nombre_participante'])) {
        $historial[$id]['detalles'][] = [
            'detalle_id' => $row['detalle_id'], // ¡Añadimos el ID del detalle aquí!
            'nombre' => $row['nombre_participante'],
            'monto' => $row['monto_asignado'],
            'pagado' => $row['pagado']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('historial'); ?> - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .historial-container { display: flex; flex-direction: column; gap: 20px; }
        .gasto-card { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .gasto-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f0e6ff; padding-bottom: 15px; margin-bottom: 15px; }
        .gasto-titulo { font-size: 1.2rem; font-weight: bold; color: var(--indigo); margin: 0; }
        .gasto-fecha { color: #7f8c8d; font-size: 0.85rem; }
        .gasto-total { font-size: 1.4rem; font-weight: bold; color: #2C3E50; }
        .detalle-lista { list-style: none; padding: 0; margin: 0; }
        .detalle-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed #eee; }
        .detalle-item:last-child { border-bottom: none; }
        
        .badge-estado { padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; }
        .badge-pagado { background-color: #e8f5e9; color: #2e7d32; }
        .badge-pendiente { background-color: #ffebee; color: #c62828; }
        .badge-yo { background-color: #e3f2fd; color: #1565c0; }
        
        /* Estilos para el nuevo botón de Marcar Pagado */
        .btn-marcar-pagado {
            background: #fff;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
            border-radius: 6px;
            padding: 4px 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .btn-marcar-pagado:hover {
            background: #e8f5e9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>📜 <?php echo t('historial_de_gastos'); ?></h1>
        <p style="color: #7f8c8d; margin-bottom: 25px;"><?php echo t('revisa_todas'); ?></p>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'pagado'): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
                <?php echo t('genial_marcado'); ?>
            </div>
        <?php endif; ?>

        <div class="historial-container">
            <?php if (empty($historial)): ?>
                <div class="gasto-card" style="text-align: center; color: #7f8c8d;">
                    <?php echo t('no_gastos_aun'); ?>
                </div>
            <?php else: ?>
                <?php foreach ($historial as $gasto): ?>
                    <div class="gasto-card">
                        <div class="gasto-header">
                            <div>
                                <h3 class="gasto-titulo"><?php echo htmlspecialchars($gasto['titulo']); ?></h3>
                                <div style="font-size: 0.85rem; color: #7f8c8d; margin-top: 5px;">
                                    <?php echo t('pagado_por'); ?> <strong style="color: var(--indigo);"><?php echo htmlspecialchars($gasto['pagado_por']); ?></strong>
                                </div>
                                <span class="gasto-fecha"><?php echo date('d/m/Y', strtotime($gasto['fecha'])); ?></span>
                            </div>
                            <div class="gasto-total">
                                $<?php echo number_format($gasto['total'], 2); ?>
                            </div>
                        </div>

                        <ul class="detalle-lista">
                            <?php foreach ($gasto['detalles'] as $detalle): ?>
                                <li class="detalle-item">
                                    <span>👤 <?php echo htmlspecialchars($detalle['nombre']); ?></span>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <strong>$<?php echo number_format($detalle['monto'], 2); ?></strong>
                                        
                                        <?php if (strtolower($detalle['nombre']) === 'yo'): ?>
                                            <span class="badge-estado badge-yo"><?php echo t('mi_parte'); ?></span>
                                        <?php elseif ($detalle['pagado']): ?>
                                            <span class="badge-estado badge-pagado"><?php echo t('pagado'); ?></span>
                                        <?php else: ?>
                                            <span class="badge-estado badge-pendiente"><?php echo t('pendiente'); ?></span>
                                            
                                            <form action="../backend/marcar_pagado.php" method="POST" style="margin: 0;">
                                                <input type="hidden" name="detalle_id" value="<?php echo $detalle['detalle_id']; ?>">
                                                <button type="submit" class="btn-marcar-pagado" onclick="return confirm('<?php echo t('confirmas_que_pago'); ?><?php echo htmlspecialchars($detalle['nombre']); ?><?php echo t('ya_pago_su_parte'); ?>');" title="<?php echo t('recibido'); ?>">
                                                    <?php echo t('recibido'); ?>
                                                </button>
                                            </form>
                                            
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
