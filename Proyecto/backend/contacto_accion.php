<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) { exit("Acceso denegado"); }

$usuario_id = $_SESSION['usuario_id'];
$accion = $_POST['accion'] ?? '';

if ($accion === 'crear') {
    $nombre = trim($_POST['nombre_contacto']);
    if (!empty($nombre)) {
        $stmt = $conexion->prepare("INSERT INTO contactos (usuario_id, nombre_contacto) VALUES (?, ?)");
        $stmt->bind_param("is", $usuario_id, $nombre);
        $stmt->execute();
    }
} 
elseif ($accion === 'eliminar') {
    $id_contacto = intval($_POST['id_contacto']);
    $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id_contacto, $usuario_id);
    $stmt->execute();
}
elseif ($accion === 'saldar_cobro') {
    // Alguien me debía dinero y me lo pagó
    $nombre_contacto = $_POST['nombre_contacto'];
    $stmt = $conexion->prepare("
        UPDATE detalle_gasto d 
        JOIN gastos g ON d.gasto_id = g.id 
        SET d.pagado = 1 
        WHERE g.usuario_id = ? 
          AND g.pagado_por = 'Yo' 
          AND d.nombre_participante = ?
    ");
    $stmt->bind_param("is", $usuario_id, $nombre_contacto);
    $stmt->execute();
}
elseif ($accion === 'saldar_pago') {
    // Yo le debía dinero a alguien y ya le pagué
    $nombre_contacto = $_POST['nombre_contacto'];
    $stmt = $conexion->prepare("
        UPDATE detalle_gasto d 
        JOIN gastos g ON d.gasto_id = g.id 
        SET d.pagado = 1 
        WHERE g.usuario_id = ? 
          AND g.pagado_por = ? 
          AND d.nombre_participante = 'Yo'
    ");
    $stmt->bind_param("is", $usuario_id, $nombre_contacto);
    $stmt->execute();
}

header("Location: ../pages/contactos.php");
exit();
?>
