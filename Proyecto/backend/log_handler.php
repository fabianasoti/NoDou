<?php
// backend/log_handler.php

function registrar_actividad($usuario_id, $accion, $detalles = array()) {
    $ruta_logs = __DIR__ . '/../logs';
    $archivo_log = $ruta_logs . '/actividad.json';

    // 1. Crear carpeta con manejo de errores
    if (!file_exists($ruta_logs)) {
        // Usamos @ para suprimir el warning por defecto y manejarlo nosotros
        if (!@mkdir($ruta_logs, 0775, true)) {
            error_log("Log_Handler Error: El servidor no tiene permisos para crear la carpeta en $ruta_logs");
            return false;
        }
    }

    // 2. Leer datos existentes de forma segura
    $datos_actuales = [];
    if (file_exists($archivo_log)) {
        $contenido = file_get_contents($archivo_log);
        if ($contenido !== false) {
            $decodificado = json_decode($contenido, true);
            // Asegurarnos de que el JSON era válido
            $datos_actuales = is_array($decodificado) ? $decodificado : [];
        }
    }

    // 3. Crear el nuevo "Documento NoSQL"
    $nuevo_registro = [
        '_id' => uniqid('log_'),
        'fecha_hora' => date('Y-m-d H:i:s'),
        'usuario_id' => $usuario_id,
        'accion' => $accion,
        'detalles' => $detalles
    ];

    // 4. Añadir al inicio
    array_unshift($datos_actuales, $nuevo_registro);

    // 5. Mantener el log ligero
    $datos_actuales = array_slice($datos_actuales, 0, 500);

    // 6. Guardar con LOCK_EX para evitar que varios usuarios corrompan el archivo al mismo tiempo
    $resultado = file_put_contents($archivo_log, json_encode($datos_actuales, JSON_PRETTY_PRINT), LOCK_EX);

    // Verificar si se pudo escribir
    if ($resultado === false) {
        error_log("Log_Handler Error: No se pudo escribir en el archivo $archivo_log. Revisa los permisos.");
        return false;
    }

    return true;
}
?>
