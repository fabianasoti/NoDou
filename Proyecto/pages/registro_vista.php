<?php
session_start();
require_once '../config/traductor.php';
?>
<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('registrarse'); ?> - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .register-card {
            width: 100%;
            max-width: 450px;
        }
        .logo-text {
            font-size: 2rem;
            font-weight: bold;
            color: var(--indigo);
            margin-bottom: 5px;
        }
        .login-link {
            display: block;
            margin-top: 20px;
            color: var(--indigo);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container register-card fade-in">
        <div class="logo-text">NoDou.</div>
        <h2 style="margin-bottom: 20px; color: var(--gris-oscuro);"><?php echo t('crea_tu_cuenta'); ?></h2>
        <p style="color: var(--gris-medio); margin-bottom: 25px;"><?php echo t('empieza_dividir'); ?></p>

        <?php if(isset($_GET['error'])): ?>
            <div class="mensaje-error">
                <?php 
                    if($_GET['error'] == 'email_existe') echo t('error_email_existe');
                    else echo t('error_inesperado');
                ?>
            </div>
        <?php endif; ?>

        <form action="../backend/registro.php" method="POST">
            <div style="text-align: left;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;"><?php echo t('nombre_completo'); ?></label>
                <input type="text" name="nombre" placeholder="<?php echo t('ej_nombre'); ?>" required>
            </div>

            <div style="text-align: left; margin-top: 10px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;"><?php echo t('correo_electronico'); ?></label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>

            <div style="text-align: left; margin-top: 10px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;"><?php echo t('contrasena'); ?></label>
                <input type="password" name="password" placeholder="<?php echo t('minimo_caracteres'); ?>" required minlength="8">
            </div>

            <button type="submit" style="margin-top: 20px;"><?php echo t('registrarse_ahora'); ?></button>
        </form>

        <a href="login_vista.php" class="login-link"><?php echo t('ya_tienes_cuenta'); ?></a>
    </div>

</body>
</html>
