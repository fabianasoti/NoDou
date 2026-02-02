<?php
session_start();
// Si no hay sesión, redirigimos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        /* Estilos específicos para el Grid del Dashboard */
        .dashboard-container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-section {
            margin-bottom: 30px;
            text-align: center;
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            background-color: #f8f9fa;
        }

        .card i {
            font-size: 40px;
            margin-bottom: 15px;
            color: #5a189a; /* Color temático de Lumina/NoDou */
        }

        .card h3 {
            margin: 10px 0;
            font-size: 1.2rem;
        }

        .card p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>

    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <section class="welcome-section">
            <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>! 👋</h1>
            <p>¿Qué vamos a dividir hoy?</p>
        </section>

        <div class="grid-cards">
            <a href="nueva_cuenta.php" class="card">
                <i>➕</i>
                <h3>Nueva Cuenta</h3>
                <p>Divide un gasto nuevo entre varias personas.</p>
            </a>

            <a href="estadisticas.php" class="card">
                <i>📊</i>
                <h3>Estadísticas</h3>
                <p>Mira tus ahorros, tendencias y gastos mensuales.</p>
            </a>

            <a href="calculos.php" class="card">
                <i>🧮</i>
                <h3>Cálculos Rápidos</h3>
                <p>Herramientas de cálculo predefinidas.</p>
            </a>

            <a href="gastos_fijos.php" class="card">
                <i>📅</i>
                <h3>Gastos Fijos</h3>
                <p>Checklist de tus pagos mensuales recurrentes.</p>
            </a>

            <a href="contactos.php" class="card">
                <i>👥</i>
                <h3>Personas Frecuentes</h3>
                <p>Gestiona tus contactos para divisiones rápidas.</p>
            </a>

            <a href="#" class="card">
                <i>🔔</i>
                <h3>Notificaciones</h3>
                <p>Alertas de pagos y recordatorios.</p>
            </a>
        </div>
    </main>

</body>
</html>
