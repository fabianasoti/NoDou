<?php
// config/traductor.php
// Helper para traducción de la aplicación

// Importar diccionario de idiomas
require_once dirname(__FILE__) . '/idiomas.php';

/**
 * Función para traducir textos
 * @param string $clave La clave del texto a traducir
 * @return string El texto traducido
 */
function t($clave) {
    global $textos;
    
    $idioma_actual = isset($_SESSION['idioma']) ? $_SESSION['idioma'] : 'es';
    
    if (isset($textos[$idioma_actual][$clave])) {
        return $textos[$idioma_actual][$clave];
    }
    
    // Si no encuentra la clave en el idioma actual, intenta con español
    if (isset($textos['es'][$clave])) {
        return $textos['es'][$clave];
    }
    
    // Si tampoco la encuentra, devuelve la clave entre corchetes
    return "[{$clave}]";
}

/**
 * Función para cambiar idioma
 * @param string $idioma El código de idioma (es, en)
 */
function cambiar_idioma($idioma) {
    if (in_array($idioma, ['es', 'en'])) {
        $_SESSION['idioma'] = $idioma;
        return true;
    }
    return false;
}

/**
 * Obtiene el idioma actual
 * @return string El código del idioma actual
 */
function obtener_idioma_actual() {
    return isset($_SESSION['idioma']) ? $_SESSION['idioma'] : 'es';
}
?>
