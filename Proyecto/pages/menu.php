<?php
// Obtenemos el nombre del archivo actual para resaltar el enlace activo
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="dashboard.php" class="nav-logo">NoDou.</a>

        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="<?= $pagina_actual == 'dashboard.php' ? 'active' : '' ?>">
                    Inicio
                </a>
            </li>
            <li>
                <a href="nueva_cuenta.php" class="<?= $pagina_actual == 'nueva_cuenta.php' ? 'active' : '' ?>">
                    Dividir
                </a>
            </li>
            <li>
                <a href="estadisticas.php" class="<?= $pagina_actual == 'estadisticas.php' ? 'active' : '' ?>">
                    Estadísticas
                </a>
            </li>
            <li>
                <a href="gastos_fijos.php" class="<?= $pagina_actual == 'gastos_fijos.php' ? 'active' : '' ?>">
                    Fijos
                </a>
            </li>
            <li>
                <a href="contactos.php" class="<?= $pagina_actual == 'contactos.php' ? 'active' : '' ?>">
                    Contactos
                </a>
            </li>
        </ul>

        <div class="nav-user">
            <span class="user-name"><?php echo explode(' ', $_SESSION['usuario_nombre'])[0]; ?></span>
            <a href="../backend/logout.php" class="btn-logout" title="Cerrar Sesión">🚪</a>
        </div>
    </div>
</nav>

<style>
    /* Estilos específicos para el Menu */
    .navbar {
        background-color: var(--indigo);
        color: white;
        padding: 0.8rem 0;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .nav-logo {
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
        text-decoration: none;
        letter-spacing: -1px;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 20px;
    }

    .nav-links a {
        color: var(--indigo-light);
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        transition: color 0.3s;
        padding: 5px 10px;
        border-radius: 8px;
    }

    .nav-links a:hover, .nav-links a.active {
        color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-user {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-name {
        font-size: 0.85rem;
        background: rgba(255, 255, 255, 0.2);
        padding: 4px 12px;
        border-radius: 20px;
    }

    .btn-logout {
        text-decoration: none;
        font-size: 1.2rem;
        transition: transform 0.2s;
    }

    .btn-logout:hover {
        transform: scale(1.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-links { display: none; } /* Aquí podrías implementar un menú hamburguesa luego */
        .user-name { display: none; }
    }
</style>
