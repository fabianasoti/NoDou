<?php
date_default_timezone_set('Europe/Madrid');

$host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: 'localhost';
$user = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: 'nodou';
$pass = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: 'Nodou123$';
$db   = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: 'nodou';

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
