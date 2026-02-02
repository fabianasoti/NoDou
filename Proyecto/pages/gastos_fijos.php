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
        .gasto-fijo-item { display: flex; align-items: center; justify-content: space-between; padding: 15px; border-bottom: 1px solid #eee; transition: opacity 0.3s ease; }
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

        <section class="form-section" style="max-width: 600px; margin: 0 auto 30px auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 15px; color: var(--indigo);">➕ Nuevo Gasto Fijo</h3>
            <form action="../backend/gestionar_fijos.php" method="POST" style="display: grid; gap: 10px;">
                <input type="hidden" name="accion" value="crear">
                <div>
                    <label style="font-size: 0.8rem; font-weight: bold;">Título</label>
                    <input type="text" name="titulo" placeholder="Ej: Netflix, Alquiler..." required>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div style="flex: 1;">
                        <label style="font-size: 0.8rem; font-weight: bold;">Monto ($)</label>
                        <input type="number" step="0.01" name="monto_estimado" placeholder="0.00" required>
                    </div>
                    <div style="flex: 1;">
                        <label style="font-size: 0.8rem; font-weight: bold;">Día de cobro (1-31)</label>
                        <input type="number" name="dia_vencimiento" min="1" max="31" placeholder="15" required>
                    </div>
                </div>
                <button type="submit" class="btn-login" style="margin-top: 10px;">Guardar Gasto Fijo</button>
            </form>
        </section>

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
                    
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <input type="checkbox" 
                               class="checkbox-custom" 
                               <?php echo $gasto['completado_mes_actual'] ? 'checked' : ''; ?>
                               onclick="marcarPago(<?php echo $gasto['id']; ?>, this)">
                        
                        <button type="button" 
                                class="btn-remove" 
                                style="width: 35px; height: 35px; border-radius: 50%; cursor: pointer; border: 1px solid #ddd; background: #fff;"
                                onclick="eliminarGastoFijo(<?php echo $gasto['id']; ?>, this)">
                            🗑️
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
            
            <?php if ($resultado->num_rows == 0): ?>
                <p style="text-align:center; padding: 20px;">No tienes gastos fijos registrados.</p>
            <?php endif; ?>
        </div>
    </main>

    <script>
    function marcarPago(id, checkbox) {
        const estado = checkbox.checked ? 1 : 0;
        // Buscamos el elemento 'strong' dentro del mismo contenedor del item
        const labelTexto = checkbox.closest('.gasto-fijo-item').querySelector('strong');

        const datos = new FormData();
        datos.append('id', id);
        datos.append('estado', estado);

        fetch('../backend/gestionar_fijos.php', {
            method: 'POST',
            body: datos
        })
        .then(response => {
            if (response.ok) {
                if (estado === 1) {
                    labelTexto.classList.add('completado');
                } else {
                    labelTexto.classList.remove('completado');
                }
            } else {
                alert('Hubo un error al actualizar el gasto.');
                checkbox.checked = !checkbox.checked;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error de conexión.');
            checkbox.checked = !checkbox.checked;
        });
    }

    function eliminarGastoFijo(id, boton) {
        if (confirm('¿Estás seguro de que quieres eliminar este gasto fijo?')) {
            const datos = new FormData();
            datos.append('id_eliminar', id);

            fetch('../backend/gestionar_fijos.php', {
                method: 'POST',
                body: datos
            })
            .then(response => {
                if (response.ok) {
                    const item = boton.closest('.gasto-fijo-item');
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                } else {
                    alert('No se pudo eliminar el gasto.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>
</body>
</html>
