<?php
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recoger datos y limpiar espacios
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $pass_plana = $_POST['password'];

    // 2. Encriptar contraseña para seguridad
    $password_hash = password_hash($pass_plana, PASSWORD_BCRYPT);

    try {
        // 3. Verificar si el correo ya está registrado
        $check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        if ($check->get_result()->num_rows > 0) {
            header("Location: ../pages/registro_vista.php?error=email_existe");
            exit();
        }

        // 4. INSERTAR (Sin la columna 'rol')
        // Tu tabla solo tiene: nombre, email, password. 
        // fecha_creacion se llena sola por el DEFAULT CURRENT_TIMESTAMP
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password_hash);
        
        if ($stmt->execute()) {
            // Éxito: Vamos al login
            header("Location: ../pages/login_vista.php?success=registro_ok");
        } else {
            echo "Error al insertar los datos.";
        }

    } catch (mysqli_sql_exception $e) {
        // Si sale el error de columnas, aquí verás exactamente qué falló
        die("Error en el registro: " . $e->getMessage());
    }
}
?>
