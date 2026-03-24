<?php
session_start();
require_once '../config/traductor.php';
require_once '../config/conexion.php';

// Verificamos que el usuario haya iniciado sesión y SEA ADMINISTRADOR
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: dashboard.php");
    exit("Acceso denegado");
}

// 1. Obtener el total de usuarios registrados
$query_total = "SELECT COUNT(*) as total FROM usuarios";
$resultado_total = $conexion->query($query_total);
$total_usuarios = $resultado_total->fetch_assoc()['total'];

// 2. Obtener la lista de usuarios
$query_usuarios = "SELECT id, nombre, email, fecha_creacion, rol FROM usuarios ORDER BY fecha_creacion DESC";
$resultado_usuarios = $conexion->query($query_usuarios);
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo t('admin_panel'); ?> - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .admin-stats { background: var(--indigo); color: white; padding: 20px; border-radius: 15px; text-align: center; margin-bottom: 30px; }
        .admin-stats h2 { font-size: 2.5rem; margin: 0; }
        .table-container { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        th { background-color: #fafafa; color: var(--indigo); font-weight: bold; }
        tr:hover { background-color: #f9f9f9; }
        .badge-admin { background: #e3f2fd; color: #1565c0; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: bold; }
        .btn-delete-user { background: #ffebee; color: #c62828; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-weight: bold; transition: 0.2s; }
        .btn-delete-user:hover { background: #ef9a9a; color: white; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>🛠️ <?php echo t('admin_panel'); ?></h1>

        <div class="admin-stats">
            <p><?php echo t('total_usuarios_registrados'); ?></p>
            <h2><?php echo $total_usuarios; ?></h2>
        </div>

        <div class="table-container">
            <h3>Lista de Usuarios</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha de Registro</th>
                        <th>Rol</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $resultado_usuarios->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($user['fecha_creacion'])); ?></td>
                            <td>
                                <?php if($user['rol'] === 'admin'): ?>
                                    <span class="badge-admin">Admin</span>
                                <?php else: ?>
                                    Usuario
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($user['id'] != $_SESSION['usuario_id']): // Evita que el admin se borre a sí mismo ?>
                                    <form action="../backend/eliminar_usuario.php" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario? Se borrarán todos sus gastos.');">
                                        <input type="hidden" name="id_usuario" value="<?php echo $user['id']; ?>">
                                        <button type="submit" class="btn-delete-user">Eliminar</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
