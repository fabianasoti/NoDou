<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login_vista.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    
    // Datos Generales
    $titulo = trim($_POST['titulo']);
    $monto_total = floatval($_POST['monto_total']);
    $fecha_gasto = $_POST['fecha_gasto'];
    $metodo_division = $_POST['metodo_division'];
    $pagado_por = trim($_POST['pagado_por']); 
    
    $nombres = $_POST['nombres'];

    $conexion->begin_transaction();

    try {
        // --- 1. NUEVA LÓGICA: Añadir a contactos frecuentes automáticamente ---
        // Preparamos las consultas para buscar y guardar contactos
        $stmt_check_contacto = $conexion->prepare("SELECT id FROM contactos WHERE usuario_id = ? AND nombre_contacto = ?");
        $stmt_insert_contacto = $conexion->prepare("INSERT INTO contactos (usuario_id, nombre_contacto) VALUES (?, ?)");
        
        // Limpiamos los nombres repetidos (por si un usuario puso "Juan" dos veces por error)
        $nombres_unicos = array_unique($nombres);
        
        foreach ($nombres_unicos as $nombre) {
            $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
            
            // No queremos guardar a "Yo" ni a "Anónimo" en la agenda de contactos
            if (strtolower($nombre_limpio) !== 'yo' && strtolower($nombre_limpio) !== 'anónimo') {
                
                // Buscamos si ya existe
                $stmt_check_contacto->bind_param("is", $usuario_id, $nombre_limpio);
                $stmt_check_contacto->execute();
                $resultado_check = $stmt_check_contacto->get_result();
                
                // Si no existe (0 filas), lo añadimos a la base de datos
                if ($resultado_check->num_rows === 0) {
                    $stmt_insert_contacto->bind_param("is", $usuario_id, $nombre_limpio);
                    $stmt_insert_contacto->execute();
                }
            }
        }
        // ----------------------------------------------------------------------


        // 2. Insertar Cabecera de Gasto
        $stmt = $conexion->prepare("INSERT INTO gastos (usuario_id, titulo, monto_total, metodo_division, fecha_gasto, pagado_por) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdsss", $usuario_id, $titulo, $monto_total, $metodo_division, $fecha_gasto, $pagado_por);
        $stmt->execute();
        $gasto_id = $conexion->insert_id;

        // 3. Preparar insert de detalle
        $stmt_detalle = $conexion->prepare("INSERT INTO detalle_gasto (gasto_id, nombre_participante, monto_asignado, porcentaje, pagado) VALUES (?, ?, ?, ?, ?)");
        
        $num_participantes = count($nombres);

        // --- LÓGICA SEGÚN MÉTODO ---
        if ($metodo_division === 'iguales') {
            $monto_por_persona = $monto_total / $num_participantes;
            $pct = 100 / $num_participantes;

            foreach ($nombres as $nombre) {
                $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_por_persona, $pct, $estado_pagado);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'porcentaje') {
            $porcentajes_input = $_POST['porcentajes'];
            foreach ($nombres as $index => $nombre) {
                $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                $pct_user = floatval($porcentajes_input[$index]);
                $monto_user = $monto_total * ($pct_user / 100);
                $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                
                $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_user, $pct_user, $estado_pagado);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'articulos') {
            // Guardar Artículos (Referencia visual)
            $art_nombres = $_POST['articulos_nombres'] ?? [];
            $art_precios = $_POST['articulos_precios'] ?? [];
            
            $stmt_art = $conexion->prepare("INSERT INTO articulos_gasto (gasto_id, nombre_articulo, precio) VALUES (?, ?, ?)");
            for($i=0; $i < count($art_nombres); $i++) {
                if(!empty($art_nombres[$i])) {
                    $stmt_art->bind_param("isd", $gasto_id, $art_nombres[$i], $art_precios[$i]);
                    $stmt_art->execute();
                }
            }

            // Guardar Deudas calculadas
            if (isset($_POST['montos_finales'])) {
                $montos_finales = $_POST['montos_finales'];
                foreach ($nombres as $index => $nombre) {
                     $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                     $monto_calc = floatval($montos_finales[$index]);
                     $pct_dummy = 0;
                     $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                     
                     $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_calc, $pct_dummy, $estado_pagado);
                     $stmt_detalle->execute();
                }
             }
        }

        $conexion->commit();
        header("Location: ../pages/historial.php?status=gasto_guardado");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        die("Error: " . $e->getMessage());
    }
}
?>
