<?php
session_start();
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR DE LOGS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // Variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];
            $_SESSION['usuario_rol'] = $row['rol'];

            // <-- 2. REGISTRAMOS EL EVENTO EN EL JSON NOSQL -->
            registrar_actividad(
                $row['id'], 
                "Inicio de Sesión", 
                ["metodo" => "Formulario Web", "rol" => $row['rol']]
            );
            // <----------------------------------------------->

            // Redirigimos dependiendo del rol
            if ($row['rol'] === 'admin') {
                header("Location: ../pages/admin_dashboard.php");
            } else {
                header("Location: ../pages/dashboard.php");
            }
            exit();
        } else {
            header("Location: ../pages/login_vista.php?error=credenciales");
            exit();
        }
    } else {
        header("Location: ../pages/login_vista.php?error=credenciales");
        exit();
    }
} else {
    header("Location: ../pages/login_vista.php");
    exit();
}
?>
