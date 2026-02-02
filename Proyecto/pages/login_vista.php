<?php
session_start();
// Si el usuario ya está logueado, lo mandamos directo al dashboard
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        /* Ajustes específicos para centrar y dar estilo al login */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .logo-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--indigo);
            margin-bottom: 10px;
            letter-spacing: -1px;
        }
        .subtitulo {
            color: var(--gris-medio);
            margin-bottom: 30px;
        }
        .link-registro {
            display: block;
            margin-top: 20px;
            color: var(--indigo);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .link-registro:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container fade-in">
        <div class="logo-text">NoDou.</div>
        <p class="subtitulo">Tus cuentas claras, siempre.</p>

        <?php if(isset($_GET['error'])): ?>
            <div class="mensaje-error">
                <?php 
                    if($_GET['error'] == 'credenciales') echo "Correo o contraseña incorrectos.";
                    else if($_GET['error'] == 'db') echo "Error de conexión.";
                    else echo "Ocurrió un error inesperado.";
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="mensaje-exito">
                ¡Registro exitoso! Ahora inicia sesión.
            </div>
        <?php endif; ?>

        <form action="../backend/login.php" method="POST">
            <div style="text-align: left;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;">Correo electrónico</label>
                <input type="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div style="text-align: left; margin-top: 15px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;">Contraseña</label>
                <input type="password" name="password" placeholder="Tu contraseña" required>
            </div>

            <button type="submit" style="margin-top: 25px;">Entrar</button>
        </form>

        <a href="registro_vista.php" class="link-registro">¿Aún no tienes cuenta? Regístrate gratis</a>
        <a href="index.php" class="link-registro" style="font-size: 0.8rem; color: var(--gris-medio);">← Volver al inicio</a>
    </div>

</body>
</html>
