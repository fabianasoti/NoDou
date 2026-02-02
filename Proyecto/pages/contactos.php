<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    exit("Acceso denegado");
}

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

if ($accion === 'eliminar') {
    $id_contacto = intval($_POST['id_contacto']);
    // Validamos que el contacto pertenezca al usuario para evitar borrados malintencionados
    $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id_contacto, $usuario_id);
    $stmt->execute();
}

header("Location: ../pages/contactos.php");
exit();
