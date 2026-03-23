<?php
// backend/log_handler.php

function registrar_actividad($usuario_id, $accion, $detalles = array()) {
    // Definimos la ruta donde se guardará nuestro "documento" JSON
    $ruta_logs = __DIR__ . '/../logs';
    $archivo_log = $ruta_logs . '/actividad.json';

    // 1. Si la carpeta 'logs' no existe, la creamos
    if (!file_exists($ruta_logs)) {
        mkdir($ruta_logs, 0777, true);
    }

    // 2. Leer los datos existentes en el JSON (si existe)
    $datos_actuales = [];
    if (file_exists($archivo_log)) {
        $contenido = file_get_contents($archivo_log);
        $datos_actuales = json_decode($contenido, true) ?? [];
    }

    // 3. Crear el nuevo "Documento NoSQL"
    $nuevo_registro = [
        '_id' => uniqid('log_'), // Generamos un ID único estilo MongoDB
        'fecha_hora' => date('Y-m-d H:i:s'),
        'usuario_id' => $usuario_id,
        'accion' => $accion,
        'detalles' => $detalles // Esto es dinámico, puede variar según la acción
    ];

    // 4. Añadimos el nuevo registro al inicio del arreglo
    array_unshift($datos_actuales, $nuevo_registro);

    // 5. Mantenemos el log ligero (opcional: guardar solo los últimos 500 registros)
    $datos_actuales = array_slice($datos_actuales, 0, 500);

    // 6. Guardamos todo de vuelta en el archivo JSON
    file_put_contents($archivo_log, json_encode($datos_actuales, JSON_PRETTY_PRINT));
}
?>
