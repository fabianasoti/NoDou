<?php
// Iniciamos la sesión para poder acceder a ella y luego destruirla
session_start();

// 1. Limpiamos todas las variables de sesión
$_SESSION = array();

// 2. Si se desea destruir la sesión completamente, también hay que borrar la cookie de sesión.
// Nota: ¡Esto es opcional pero muy recomendado para seguridad profesional!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Finalmente, destruimos la sesión en el servidor
session_destroy();

// 4. Redirigimos al usuario a la página de inicio (Landing Page)
header("Location: ../pages/index.php");
exit();
?>
