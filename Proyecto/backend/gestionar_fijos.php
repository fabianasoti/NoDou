<?php
session_start();
require_once '../config/conexion.php';

if (isset($_SESSION['usuario_id']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $estado = intval($_POST['estado']);
    $usuario_id = $_SESSION['usuario_id'];

    // Aseguramos que el gasto pertenezca al usuario logueado por seguridad
    $stmt = $conexion->prepare("UPDATE gastos_fijos SET completado_mes_actual = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("iii", $estado, $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Éxito";
    } else {
        echo "Error";
    }
}
