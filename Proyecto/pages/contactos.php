<?php
session_start();
require_once '../config/traductor.php';
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta maestra para saber cuánto te deben y cuánto debes tú a cada contacto
$query = "SELECT 
            c.id, 
            c.nombre_contacto,
            (
                -- Lo que te deben a ti (Tú pagaste, ellos están en el detalle y no han pagado)
                SELECT COALESCE(SUM(d.monto_asignado), 0)
                FROM gastos g
                JOIN detalle_gasto d ON g.id = d.gasto_id
                WHERE g.usuario_id = c.usuario_id 
                  AND g.pagado_por = 'Yo' 
                  AND d.nombre_participante = c.nombre_contacto 
                  AND d.pagado = 0
            ) as me_debe,
            (
                -- Lo que tú debes (Ellos pagaron, tú estás en el detalle y no has pagado)
                SELECT COALESCE(SUM(d.monto_asignado), 0)
                FROM gastos g
                JOIN detalle_gasto d ON g.id = d.gasto_id
                WHERE g.usuario_id = c.usuario_id 
                  AND g.pagado_por = c.nombre_contacto 
                  AND d.nombre_participante = 'Yo' 
                  AND d.pagado = 0
            ) as le_debo
          FROM contactos c
          WHERE c.usuario_id = ?
          ORDER BY me_debe DESC, le_debo DESC, c.nombre_contacto ASC";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo t('contactos'); ?> - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .contact-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .contact-card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between;}
        .contact-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px;}
        .contact-name { font-weight: bold; font-size: 1.2rem; color: var(--indigo); }
        
        .balance-box { display: flex; justify-content: space-between; margin-bottom: 15px; background: #fafafa; padding: 10px; border-radius: 10px;}
        .balance-item { display: flex; flex-direction: column; }
        .balance-label { font-size: 0.8rem; color: var(--gris-medio); text-transform: uppercase; font-weight: bold;}
        .amount-positive { color: var(--exito); font-size: 1.2rem; font-weight: bold;}
        .amount-negative { color: var(--error); font-size: 1.2rem; font-weight: bold;}
        .amount-zero { color: var(--gris-medio); font-size: 1.2rem; font-weight: bold;}
        
        .btn-action { padding: 8px 12px; border-radius: 8px; border: none; cursor: pointer; font-size: 0.9rem; font-weight: bold; text-align: center; display: inline-block; width: 100%; transition: 0.2s;}
        .btn-cobrar { background: #e8f5e9; color: #2e7d32; margin-bottom: 8px;}
        .btn-cobrar:hover { background: #c8e6c9; }
        .btn-pagar { background: #ffebEE; color: #c62828; margin-bottom: 8px;}
        .btn-pagar:hover { background: #ffcdd2; }
        .btn-delete { background: transparent; color: var(--gris-medio); padding: 0; width: auto;}
        .btn-delete:hover { color: var(--error); }
        .add-contact-form { background: white; padding: 20px; border-radius: 15px; margin-bottom: 30px; display: flex; gap: 10px;}
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>👥 <?php echo t('mis_personas_frecuentes'); ?></h1>
        
        <form action="../backend/contacto_accion.php" method="POST" class="add-contact-form">
            <input type="hidden" name="accion" value="crear">
            <input type="text" name="nombre_contacto" placeholder="<?php echo t('nombre_contacto'); ?>" required style="margin:0;">
            <button type="submit"><?php echo t('anadir_contacto'); ?></button>
        </form>

        <div class="contact-grid">
            <?php while($contacto = $resultado->fetch_assoc()): ?>
                <div class="contact-card">
                    <div class="contact-header">
                        <span class="contact-name"><?php echo htmlspecialchars($contacto['nombre_contacto']); ?></span>
                        <form action="../backend/contacto_accion.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este contacto? Sus gastos seguirán en el historial.');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id_contacto" value="<?php echo $contacto['id']; ?>">
                            <button type="submit" class="btn-action btn-delete" title="Eliminar contacto">🗑️</button>
                        </form>
                    </div>
                    
                    <div class="balance-box">
                        <div class="balance-item">
                            <span class="balance-label">Me debe</span>
                            <span class="<?php echo $contacto['me_debe'] > 0 ? 'amount-positive' : 'amount-zero'; ?>">
                                $<?php echo number_format($contacto['me_debe'], 2); ?>
                            </span>
                        </div>
                        <div class="balance-item" style="text-align: right;">
                            <span class="balance-label">Le debo</span>
                            <span class="<?php echo $contacto['le_debo'] > 0 ? 'amount-negative' : 'amount-zero'; ?>">
                                $<?php echo number_format($contacto['le_debo'], 2); ?>
                            </span>
                        </div>
                    </div>

                    <div>
                        <?php if($contacto['me_debe'] > 0): ?>
                            <form action="../backend/contacto_accion.php" method="POST">
                                <input type="hidden" name="accion" value="saldar_cobro">
                                <input type="hidden" name="nombre_contacto" value="<?php echo htmlspecialchars($contacto['nombre_contacto']); ?>">
                                <button type="submit" class="btn-action btn-cobrar">✅ Ya me pagó</button>
                            </form>
                        <?php endif; ?>

                        <?php if($contacto['le_debo'] > 0): ?>
                            <form action="../backend/contacto_accion.php" method="POST">
                                <input type="hidden" name="accion" value="saldar_pago">
                                <input type="hidden" name="nombre_contacto" value="<?php echo htmlspecialchars($contacto['nombre_contacto']); ?>">
                                <button type="submit" class="btn-action btn-pagar">💸 Ya le pagué</button>
                            </form>
                        <?php endif; ?>

                        <?php if($contacto['me_debe'] == 0 && $contacto['le_debo'] == 0): ?>
                            <div class="btn-action" style="background: #f5f5f5; color: #9e9e9e; cursor: default;">Cuentas saldadas 🤝</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>
