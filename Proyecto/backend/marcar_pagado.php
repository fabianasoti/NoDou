<?php
session_start();
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login_vista.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detalle_id'])) {
    $detalle_id = intval($_POST['detalle_id']);
    $usuario_id = $_SESSION['usuario_id'];

    $query = "UPDATE detalle_gasto d
              JOIN gastos g ON d.gasto_id = g.id
              SET d.pagado = 1
              WHERE d.id = ? AND g.usuario_id = ?";
              
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ii", $detalle_id, $usuario_id);

    if ($stmt->execute()) {
        
        // <-- 2. REGISTRAMOS EN NUESTRO JSON NOSQL -->
        registrar_actividad(
            $usuario_id, 
            "Pago Recibido", 
            ["detalle_id" => $detalle_id, "metodo" => "Confirmación manual"]
        );
        // <---------------------------------------->

        header("Location: ../pages/historial.php?msg=pagado");
    } else {
        header("Location: ../pages/historial.php?error=actualizacion");
    }
} else {
    header("Location: ../pages/historial.php");
}
exit();
?>
