<?php
// Verificamos si la sesión ya está iniciada antes de intentar iniciarla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si no hay un idioma seleccionado, por defecto será español ('es')
$idioma_actual = $_SESSION['lang'] ?? 'es';

// Nuestro diccionario de traducciones
$textos = [
    'es' => [
        'inicio' => 'Inicio',
        'historial' => 'Historial',
        'dividir' => 'Dividir',
        'estadisticas' => 'Estadísticas',
        'fijos' => 'Fijos',
        'contactos' => 'Contactos',
        'admin' => 'Admin',
        'logs' => 'Logs NoSQL',
        'cerrar_sesion' => 'Cerrar Sesión'
    ],
    'en' => [
        'inicio' => 'Home',
        'historial' => 'History',
        'dividir' => 'Split',
        'estadisticas' => 'Statistics',
        'fijos' => 'Fixed',
        'contactos' => 'Contacts',
        'admin' => 'Admin',
        'logs' => 'NoSQL Logs',
        'cerrar_sesion' => 'Logout'
    ]
];

function t($clave) {
    global $textos, $idioma_actual;
    // Si la clave existe en el idioma actual, la devuelve. Si no, devuelve la clave tal cual.
    return $textos[$idioma_actual][$clave] ?? $clave;
}
?>
