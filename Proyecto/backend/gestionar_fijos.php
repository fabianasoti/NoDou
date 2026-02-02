<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    exit("Acceso denegado");
}

$usuario_id = $_SESSION['usuario_id'];
// --- LÓGICA DE ELIMINACIÓN ---
if (isset($_POST['id_eliminar'])) {
    $id = intval($_POST['id_eliminar']);
    
    // Es vital validar el usuario_id para que nadie borre gastos ajenos
    $stmt = $conexion->prepare("DELETE FROM gastos_fijos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Eliminado";
    } else {
        http_response_code(500);
    }
    exit();
}

// LÓGICA 1: CREAR NUEVO GASTO (Viene del formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $titulo = trim($_POST['titulo']);
    $monto = floatval($_POST['monto_estimado']);
    $dia = intval($_POST['dia_vencimiento']);

    $stmt = $conexion->prepare("INSERT INTO gastos_fijos (usuario_id, titulo, monto_estimado, dia_vencimiento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $usuario_id, $titulo, $monto, $dia);
    
    $stmt->execute();
    header("Location: ../pages/gastos_fijos.php");
    exit();
}

// LÓGICA 2: MARCAR COMO PAGADO (Viene del AJAX/Fetch)
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $id = intval($_POST['id']);
    $estado = intval($_POST['estado']);

    $stmt = $conexion->prepare("UPDATE gastos_fijos SET completado_mes_actual = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("iii", $estado, $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Éxito";
    } else {
        echo "Error";
    }
    exit();
}
?>
