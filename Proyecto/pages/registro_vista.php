<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - NoDou</title>
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
        <h2 style="margin-bottom: 20px; color: var(--gris-oscuro);">Crea tu cuenta</h2>
        <p style="color: var(--gris-medio); margin-bottom: 25px;">Empieza a dividir tus gastos de forma inteligente.</p>

        <?php if(isset($_GET['error'])): ?>
            <div class="mensaje-error">
                <?php 
                    if($_GET['error'] == 'email_existe') echo "Este correo ya está registrado.";
                    else echo "Hubo un error al procesar el registro.";
                ?>
            </div>
        <?php endif; ?>

        <form action="../backend/registro.php" method="POST">
            <div style="text-align: left;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;">Nombre completo</label>
                <input type="text" name="nombre" placeholder="Ej. Juan Pérez" required>
            </div>

            <div style="text-align: left; margin-top: 10px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;">Correo electrónico</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>

            <div style="text-align: left; margin-top: 10px;">
                <label style="font-size: 0.85rem; font-weight: 600; margin-left: 5px;">Contraseña</label>
                <input type="password" name="password" placeholder="Mínimo 8 caracteres" required minlength="8">
            </div>

            <button type="submit" style="margin-top: 20px;">Registrarse ahora</button>
        </form>

        <a href="login_vista.php" class="login-link">¿Ya tienes cuenta? Inicia sesión aquí</a>
    </div>

</body>
</html>
