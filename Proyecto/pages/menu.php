<?php
// Obtenemos el nombre del archivo actual para resaltar el enlace activo
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Importamos el traductor
require_once '../config/traductor.php';

// Determinamos qué idioma mostrar en el botón de cambio
$idioma_cambio = (obtener_idioma_actual() === 'es') ? 'en' : 'es';
$bandera = (obtener_idioma_actual() === 'es') ? '🇺🇸' : '🇪🇸';
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="dashboard.php" class="nav-logo">NoDou.</a>

        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="<?= $pagina_actual == 'dashboard.php' ? 'active' : '' ?>">
                    <?= t('inicio') ?>
                </a>
            </li>
            <li>
                <a href="historial.php" class="<?= $pagina_actual == 'historial.php' ? 'active' : '' ?>">
                    <?= t('historial') ?>
                </a>
            </li>
            <li>
                <a href="nueva_cuenta.php" class="<?= $pagina_actual == 'nueva_cuenta.php' ? 'active' : '' ?>">
                    <?= t('dividir') ?>
                </a>
            </li>
            <li>
                <a href="estadisticas.php" class="<?= $pagina_actual == 'estadisticas.php' ? 'active' : '' ?>">
                    <?= t('estadisticas') ?>
                </a>
            </li>
            <li>
                <a href="gastos_fijos.php" class="<?= $pagina_actual == 'gastos_fijos.php' ? 'active' : '' ?>">
                    <?= t('fijos') ?>
                </a>
            </li>
            <li>
                <a href="contactos.php" class="<?= $pagina_actual == 'contactos.php' ? 'active' : '' ?>">
                    <?= t('contactos') ?>
                </a>
            </li>
            <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?>
                <li>
                    <a href="admin_dashboard.php" class="<?= $pagina_actual == 'admin_dashboard.php' ? 'active' : '' ?>" style="color: #F1C40F;">
                        ⭐ <?= t('admin') ?>
                    </a>
                </li>
                <li>
                    <a href="admin_logs.php" class="<?= $pagina_actual == 'admin_logs.php' ? 'active' : '' ?>" style="color: #F1C40F;">
                        📋 <?= t('logs') ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="nav-user">
            <span class="user-name"><?php echo explode(' ', $_SESSION['usuario_nombre'])[0]; ?></span>
            <a href="../backend/logout.php" class="btn-logout" title="<?= t('cerrar_sesion') ?>">🚪</a>
        </div>
    </div>
</nav>

<div class="floating-container">
    <a href="../backend/cambiar_idioma.php?lang=<?= $idioma_cambio ?>" class="btn-float" title="Cambiar Idioma">
        <?= $bandera ?>
    </a>
    
    <button id="toggle-dark-mode" class="btn-float" title="Modo Oscuro">
        🌙
    </button>
</div>

<style>
    /* =========================================
       ESTILOS DE LA BARRA DE NAVEGACIÓN (Originales tuyos)
       ========================================= */
    .navbar { background-color: var(--indigo); color: white; padding: 0.8rem 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .nav-container { max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; padding: 0 20px; gap: 10px; }
    .nav-logo { font-size: 1.5rem; font-weight: bold; color: white; text-decoration: none; letter-spacing: -1px; }
    .nav-links { display: flex; flex-wrap: wrap; justify-content: center; list-style: none; gap: 8px; margin: 0; padding: 0; }
    .nav-links a { color: var(--indigo-light); text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: all 0.3s; padding: 6px 10px; border-radius: 8px; white-space: nowrap; }
    .nav-links a:hover, .nav-links a.active { color: white; background: rgba(255, 255, 255, 0.15); }
    .nav-user { display: flex; align-items: center; gap: 12px; }
    .user-name { font-size: 0.85rem; background: rgba(255, 255, 255, 0.2); padding: 4px 12px; border-radius: 20px; white-space: nowrap; }
    .btn-logout { text-decoration: none; font-size: 1.2rem; transition: transform 0.2s; }
    .btn-logout:hover { transform: scale(1.2); }

    @media (max-width: 900px) {
        .nav-links { gap: 4px; }
        .nav-links a { font-size: 0.8rem; padding: 5px 8px; }
    }
    @media (max-width: 768px) {
        .nav-links { display: none; }
        .user-name { display: none; }
    }

    /* =========================================
       ESTILOS DE LOS BOTONES FLOTANTES (Nuevos)
       ========================================= */
    .floating-container {
        position: fixed; /* Esto es la magia para que flote y no rompa nada */
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 9999; /* Asegura que siempre esté por encima de todo */
    }

    .btn-float {
        background-color: var(--indigo);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        cursor: pointer;
        text-decoration: none;
        border: none;
        transition: transform 0.3s, background-color 0.3s;
    }

    .btn-float:hover {
        transform: scale(1.1);
        background-color: #303F9F;
    }
</style>

<script>
    // Usamos una función autoejecutable para evitar conflictos con otros scripts
    (function() {
        // Asegurarnos de que el botón existe antes de darle instrucciones
        const btnDarkMode = document.getElementById("toggle-dark-mode");
        const body = document.body;

        if (btnDarkMode) {
            // 1. Revisamos si el usuario ya tenía el modo oscuro guardado
            if (localStorage.getItem("theme") === "dark") {
                body.classList.add("dark-mode");
                btnDarkMode.textContent = "☀️"; 
            }

            // 2. Al hacer clic
            btnDarkMode.addEventListener("click", function(e) {
                e.preventDefault(); // Evitamos que el botón intente recargar la página
                
                body.classList.toggle("dark-mode");

                // Si se activó, lo guardamos
                if (body.classList.contains("dark-mode")) {
                    localStorage.setItem("theme", "dark");
                    btnDarkMode.textContent = "☀️";
                } else {
                    localStorage.setItem("theme", "light");
                    btnDarkMode.textContent = "🌙";
                }
            });
        } else {
            console.error("No se encontró el botón de modo oscuro en el HTML.");
        }
    })();
</script>
