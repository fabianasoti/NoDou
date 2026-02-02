<?php
// Configuración de la zona horaria para que coincida con tus registros de gastos
date_default_timezone_set('Europe/Madrid');

// Datos de conexión (Basados en el script SQL que definimos)
$host = "localhost";
$user = "nodou";      // Usuario creado en el script SQL
$pass = "Nodou123$";      // Contraseña definida en el script
$db   = "nodou";        // Nombre de tu nueva base de datos

// Habilitar el reporte de errores de MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Crear la conexión
    $conexion = new mysqli($host, $user, $pass, $db);
    
    // Establecer el conjunto de caracteres a utf8mb4 para soportar emojis y tildes
    $conexion->set_charset("utf8mb4");
    
    // Sincronizar la zona horaria de la base de datos con PHP
    $conexion->query("SET time_zone = '+01:00'");
    
} catch (mysqli_sql_exception $e) {
    // Si la conexión falla, detiene la ejecución y muestra el error (útil en desarrollo)
    die("Error crítico de conexión a NoDou: " . $e->getMessage());
}
?>
