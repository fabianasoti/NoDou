<?php
session_start();
require_once '../config/traductor.php';
// Si no hay sesión, redirigimos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('dashboard'); ?> - NoDou</title>
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
            <h1><?php echo t('hola'); ?><?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>! 👋</h1>
            <p><?php echo t('que_vamos_gestionar'); ?></p>
        </section>

        <div class="grid-cards">
            <a href="nueva_cuenta.php" class="card">
                <i>➕</i>
                <h3><?php echo t('nueva_cuenta'); ?></h3>
                <p><?php echo t('divide_gasto_nuevo'); ?></p>
            </a>

            <a href="historial.php" class="card">
                <i>📜</i>
                <h3><?php echo t('historial_gastos'); ?></h3>
                <p><?php echo t('revisa_cuentas'); ?></p>
            </a>

            <a href="estadisticas.php" class="card">
                <i>📊</i>
                <h3><?php echo t('estadisticas'); ?></h3>
                <p><?php echo t('mira_tendencias'); ?></p>
            </a>

            <a href="contactos.php" class="card">
                <i>👥</i>
                <h3>Personas Frecuentes</h3>
                <p>Gestiona tus contactos y salda deudas pendientes.</p>
            </a>

            <a href="gastos_fijos.php" class="card">
                <i>📅</i>
                <h3>Gastos Fijos</h3>
                <p>Checklist de tus pagos mensuales recurrentes.</p>
            </a>

            <a href="calculos.php" class="card">
                <i>🧮</i>
                <h3>Cálculos Rápidos</h3>
                <p>Herramientas de cálculo predefinidas (propinas, porcentajes).</p>
            </a>

            <a href="notificaciones.php" class="card">
                <i>🔔</i>
                <h3>Notificaciones</h3>
                <p>Alertas de pagos fijos, recordatorios y deudas cruzadas.</p>
            </a>
        </div>
    </main>

</body>
</html>
