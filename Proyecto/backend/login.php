<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // 1. Buscamos al usuario por su email
    // NOTA: No seleccionamos 'rol' porque esa columna no existe en NoDou
    $stmt = $conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        // 2. Verificamos la contraseña encriptada
        if (password_verify($password, $row['password'])) {
            // 3. Login Correcto: Creamos las variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];

            // Redirigimos al Dashboard principal
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../pages/login_vista.php?error=credenciales");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../pages/login_vista.php?error=credenciales");
        exit();
    }
} else {
    header("Location: ../pages/login_vista.php");
    exit();
}
?>
