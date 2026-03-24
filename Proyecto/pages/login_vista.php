<?php
session_start();
require_once '../config/traductor.php';
// Si el usuario ya está logueado, lo mandamos directo al dashboard
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('iniciar_sesion'); ?> - NoDou</title>
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
        <p class="subtitulo"><?php echo t('tus_cuentas_claras'); ?></p>

        <?php if(isset($_GET['error'])): ?>
            <div class="mensaje-error">
                <?php 
                    if($_GET['error'] == 'credenciales') echo t('error_credenciales');
                    else if($_GET['error'] == 'db') echo t('error_db');
                    else echo t('error_inesperado');
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success'])): ?>
            <div class="mensaje-exito">
                <?php echo t('registro_exitoso'); ?>
            </div>
        <?php endif; ?>

        <form action="../backend/login.php" method="POST">
            <div style="text-align: left;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;"><?php echo t('correo_electronico'); ?></label>
                <input type="email" name="email" placeholder="<?php echo t('ejemplo_correo'); ?>" required>
            </div>

            <div style="text-align: left; margin-top: 15px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;"><?php echo t('contrasena'); ?></label>
                <input type="password" name="password" placeholder="<?php echo t('tu_contrasena'); ?>" required>
            </div>

            <button type="submit" style="margin-top: 25px;"><?php echo t('entrar'); ?></button>
        </form>

        <a href="registro_vista.php" class="link-registro"><?php echo t('aun_no_tienes_cuenta'); ?></a>
        <a href="index.php" class="link-registro" style="font-size: 0.8rem; color: var(--gris-medio);"><?php echo t('volver_inicio'); ?></a>
    </div>

</body>
</html>
