<?php
session_start();
if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
// Devolvemos al usuario a la página anterior
$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? '../pages/dashboard.php';
header("Location: $pagina_anterior");
exit();
?>
