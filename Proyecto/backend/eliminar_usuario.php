<?php
session_start();
require_once '../config/conexion.php';

// Validar por seguridad que solo un admin pueda ejecutar esto
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    exit("Acceso denegado. No tienes permisos.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_usuario'])) {
    $id_a_eliminar = intval($_POST['id_usuario']);

    // Protección extra: Evitar que el admin se borre a sí mismo accidentalmente
    if ($id_a_eliminar === $_SESSION['usuario_id']) {
        exit("No puedes eliminar tu propia cuenta de administrador.");
    }

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id_a_eliminar);
    
    if ($stmt->execute()) {
        header("Location: ../pages/admin_dashboard.php?msg=eliminado");
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {
    header("Location: ../pages/admin_dashboard.php");
}
exit();
?>
