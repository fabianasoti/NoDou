<?php
session_start();
require_once '../config/traductor.php';

if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en'])) {
    cambiar_idioma($_GET['lang']);
}
// Devolvemos al usuario a la página anterior
$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? '../pages/dashboard.php';
header("Location: $pagina_anterior");
exit();
?>
