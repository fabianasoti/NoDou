<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoDou - Cuentas claras, amistades largas</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        :root {
            --indigo: #3F51B5;
            --beige: #F9F8F3;
            --gris-claro: #E0E0E0;
            --texto: #2C3E50;
        }

        body {
            background-color: var(--beige);
            color: var(--texto);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .hero-container {
            text-align: center;
            max-width: 600px;
            padding: 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .logo-placeholder {
            font-size: 3rem;
            color: var(--indigo);
            font-weight: bold;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .hero-container h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--indigo);
        }

        .hero-container p {
            font-size: 1.1rem;
            color: #7F8C8D;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--indigo);
            color: white;
            border: 2px solid var(--indigo);
        }

        .btn-primary:hover {
            background-color: #303F9F;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--indigo);
            border: 2px solid var(--indigo);
        }

        .btn-secondary:hover {
            background-color: var(--indigo);
            color: white;
        }

        .features-preview {
            margin-top: 40px;
            display: flex;
            justify-content: space-around;
            font-size: 0.85rem;
            color: #95A5A6;
        }
    </style>
</head>
<body>

    <div class="hero-container fade-in">
        <div class="logo-placeholder">NoDou.</div>
        <h1>Cuentas claras, amistades largas.</h1>
        <p>La forma más elegante y sencilla de dividir gastos con amigos, familiares o compañeros de piso sin complicaciones.</p>
        
        <div class="cta-buttons">
            <a href="login_vista.php" class="btn btn-primary">Iniciar Sesión</a>
            <a href="registro_vista.php" class="btn btn-secondary">Crear Cuenta</a>
        </div>

        <div class="features-preview">
            <span>✓ División Inteligente</span>
            <span>✓ Gastos Fijos</span>
            <span>✓ Estadísticas</span>
        </div>
    </div>

</body>
</html>
