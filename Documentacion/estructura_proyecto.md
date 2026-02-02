# Reporte de proyecto

## Estructura del proyecto

```
/var/www/html/NoDou/Proyecto
├── assets
│   ├── css
│   │   └── estilos.css
│   ├── img
│   └── js
│       └── graficos.js
├── backend
│   ├── contacto_accion.php
│   ├── gestionar_fijos.php
│   ├── guardar_gasto.php
│   ├── login.php
│   ├── logout.php
│   ├── perfil_accion.php
│   └── registro.php
├── config
│   └── conexion.php
├── pages
│   ├── calculos.php
│   ├── contactos.php
│   ├── dashboard.php
│   ├── estadisticas.php
│   ├── gastos_fijos.php
│   ├── index.php
│   ├── login_vista.php
│   ├── menu.php
│   ├── nueva_cuenta.php
│   └── registro_vista.php
└── sql
    └── nodou_db.sql
```

## Código (intercalado)

# Proyecto
## assets
### css
**estilos.css**
```css
/* 1. Definición de la nueva paleta de colores NoDou */
:root {
    --indigo: #3F51B5;
    --indigo-dark: #303F9F;
    --indigo-light: #C5CAE9;
    --beige: #F9F8F3;
    --blanco: #FFFFFF;
    --gris-oscuro: #2C3E50;
    --gris-medio: #7F8C8D;
    --gris-suave: #E0E0E0;
    --error: #E74C3C;
    --exito: #27AE60;
}

/* 2. Reset y Estilos Generales */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
}

body {
    background-color: var(--beige);
    color: var(--gris-oscuro);
    line-height: 1.6;
}

/* 3. Animaciones (Mantenemos tu fade-in de Lumina) */
.fade-in {
    animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* 4. Contenedores de Formularios (Login/Registro) */
.login-container {
    max-width: 400px;
    margin: 50px auto;
    background: var(--blanco);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    text-align: center;
}

input[type="text"], 
input[type="email"], 
input[type="password"], 
input[type="number"], 
input[type="date"], 
select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid var(--gris-suave);
    border-radius: 10px;
    background-color: #FAFAFA;
    transition: border 0.3s;
}

input:focus {
    outline: none;
    border-color: var(--indigo);
}

/* 5. Botones Estilizados */
button, .btn-login {
    width: 100%;
    padding: 12px;
    background-color: var(--indigo);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background-color: var(--indigo-dark);
    transform: translateY(-1px);
}

/* 6. Dashboard y Cards */
.dashboard-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    background: var(--blanco);
    border-radius: 15px;
    padding: 20px;
    border: 1px solid rgba(0,0,0,0.03);
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 8px 20px rgba(63, 81, 181, 0.1);
}

/* 7. Navbar / Menú (Ajustado a los nuevos colores) */
nav {
    background-color: var(--indigo);
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    margin-bottom: 30px;
}

nav a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    font-weight: 500;
}

/* 8. Mensajes de Feedback */
.mensaje-exito { color: var(--exito); background: #E8F5E9; padding: 10px; border-radius: 8px; margin-bottom: 15px; }
.mensaje-error { color: var(--error); background: #FDEDEC; padding: 10px; border-radius: 8px; margin-bottom: 15px; }

```
### img
### js
**graficos.js**
```js

```
## backend
**contacto_accion.php**
```php

```
**gestionar_fijos.php**
```php
<?php
session_start();
require_once '../config/conexion.php';

if (isset($_SESSION['usuario_id']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $estado = intval($_POST['estado']);
    $usuario_id = $_SESSION['usuario_id'];

    // Aseguramos que el gasto pertenezca al usuario logueado por seguridad
    $stmt = $conexion->prepare("UPDATE gastos_fijos SET completado_mes_actual = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("iii", $estado, $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Éxito";
    } else {
        echo "Error";
    }
}

```
**guardar_gasto.php**
```php
<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login_vista.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    
    // Datos Generales
    $titulo = trim($_POST['titulo']);
    $monto_total = floatval($_POST['monto_total']);
    $fecha_gasto = $_POST['fecha_gasto'];
    $metodo_division = $_POST['metodo_division'];
    
    // Arrays del formulario
    $nombres = $_POST['nombres']; // Lista de nombres de participantes

    $conexion->begin_transaction();

    try {
        // 1. Insertar Cabecera
        $stmt = $conexion->prepare("INSERT INTO gastos (usuario_id, titulo, monto_total, metodo_division, fecha_gasto) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isdss", $usuario_id, $titulo, $monto_total, $metodo_division, $fecha_gasto);
        $stmt->execute();
        $gasto_id = $conexion->insert_id;

        // 2. Preparar insert de detalle
        $stmt_detalle = $conexion->prepare("INSERT INTO detalle_gasto (gasto_id, nombre_participante, monto_asignado, porcentaje) VALUES (?, ?, ?, ?)");
        
        $num_participantes = count($nombres);

        // --- LÓGICA SEGÚN MÉTODO ---
        
        if ($metodo_division === 'iguales') {
            $monto_por_persona = $monto_total / $num_participantes;
            $pct = 100 / $num_participantes;

            foreach ($nombres as $nombre) {
                $nombre_limpio = trim($nombre);
                if($nombre_limpio === '') $nombre_limpio = "Anónimo";
                $stmt_detalle->bind_param("isdd", $gasto_id, $nombre_limpio, $monto_por_persona, $pct);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'porcentaje') {
            $porcentajes_input = $_POST['porcentajes']; // Array de porcentajes

            foreach ($nombres as $index => $nombre) {
                $nombre_limpio = trim($nombre);
                if($nombre_limpio === '') $nombre_limpio = "Anónimo";

                $pct_user = floatval($porcentajes_input[$index]);
                $monto_user = $monto_total * ($pct_user / 100);

                $stmt_detalle->bind_param("isdd", $gasto_id, $nombre_limpio, $monto_user, $pct_user);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'articulos') {
            // Guardar Artículos en tabla `articulos_gasto` y calcular deuda
            // Nota: Este cálculo es complejo porque recibimos datos planos del HTML.
            // Reconstruiremos la lógica: Recorremos items, vemos precio, vemos owners (que no vienen directos en un array simple por POST en HTML standard sin índices complejos).
            
            // TRUCO: En el frontend no envié estructura compleja de articulos_owners para simplificar el JS. 
            // Para 'articulos', la forma más segura en PHP puro sin JSON es confiar en el JS calculation o enviar un JSON stringificado.
            // PERO, vamos a hacerlo robusto: Vamos a recalcular las deudas por persona en base a lo que el usuario envió.
            
            // Como el POST de checkboxes anidados es complejo, confiaremos en un truco:
            // Vamos a leer los arrays 'articulos_nombres' y 'articulos_precios'.
            // Pero saber "quién chequeó qué" es difícil con HTML standard forms dinámicos.
            // SOLUCIÓN: Haremos que el guardado sea sencillo. Asumiremos montos iguales para simplificar el backend si no usamos AJAX JSON.
            // **CORRECCIÓN:** Para que funcione perfecto como pediste, lo mejor es enviar los montos FINALES calculados por JS en un input hidden, O usar el método de 'iguales' en el backend si la lógica de items es solo visual.
            
            // IMPLEMENTACIÓN RECOMENDADA PARA ESTE NIVEL:
            // Vamos a guardar los items solo como referencia visual y guardar la deuda calculada.
            
            // 1. Guardar items en DB
            $art_nombres = $_POST['articulos_nombres'] ?? [];
            $art_precios = $_POST['articulos_precios'] ?? [];
            
            $stmt_art = $conexion->prepare("INSERT INTO articulos_gasto (gasto_id, nombre_articulo, precio) VALUES (?, ?, ?)");
            for($i=0; $i < count($art_nombres); $i++) {
                $nom = $art_nombres[$i];
                $pre = $art_precios[$i];
                if(!empty($nom)) {
                    $stmt_art->bind_param("isd", $gasto_id, $nom, $pre);
                    $stmt_art->execute();
                }
            }

            // 2. ¿Cómo sabemos cuánto paga cada uno? 
            // Como HTML Forms no envía arrays anidados fácilmente para checkboxes dinámicos,
            // lo más fácil es dividir el TOTAL entre participantes (como iguales) O
            // pedirle al usuario que confirme los montos.
            
            // PARA ARREGLARLO AHORA: Vamos a dividir el total entre todos como fallback, 
            // PERO si quieres precisión exacta, necesitamos inyectar inputs hidden desde JS con el monto final de cada uno.
            // Vamos a modificar nueva_cuenta.php ligeramente para incluir un input hidden "monto_final_calculado[]".
            
            // (Asumiendo que añadimos el input hidden en el JS - ver abajo nota explicativa)
             if (isset($_POST['montos_finales'])) {
                $montos_finales = $_POST['montos_finales'];
                foreach ($nombres as $index => $nombre) {
                     $monto_calc = floatval($montos_finales[$index]);
                     $pct_dummy = 0; // No aplica
                     $stmt_detalle->bind_param("isdd", $gasto_id, $nombre, $monto_calc, $pct_dummy);
                     $stmt_detalle->execute();
                }
             } else {
                 // Fallback por si falla JS: División igualitaria
                 $monto_por_persona = $monto_total / $num_participantes;
                 $pct = 0;
                 foreach ($nombres as $nombre) {
                    $stmt_detalle->bind_param("isdd", $gasto_id, $nombre, $monto_por_persona, $pct);
                    $stmt_detalle->execute();
                 }
             }
        }

        $conexion->commit();
        header("Location: ../pages/dashboard.php?status=gasto_guardado");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        die("Error: " . $e->getMessage());
    }
}
?>

```
**login.php**
```php
<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // 1. Buscamos al usuario por su email
    // NOTA: No seleccionamos 'rol' porque esa columna no existe en NoDou
    $stmt = $conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        // 2. Verificamos la contraseña encriptada
        if (password_verify($password, $row['password'])) {
            // 3. Login Correcto: Creamos las variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];

            // Redirigimos al Dashboard principal
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../pages/login_vista.php?error=credenciales");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../pages/login_vista.php?error=credenciales");
        exit();
    }
} else {
    header("Location: ../pages/login_vista.php");
    exit();
}
?>

```
**logout.php**
```php
<?php
// Iniciamos la sesión para poder acceder a ella y luego destruirla
session_start();

// 1. Limpiamos todas las variables de sesión
$_SESSION = array();

// 2. Si se desea destruir la sesión completamente, también hay que borrar la cookie de sesión.
// Nota: ¡Esto es opcional pero muy recomendado para seguridad profesional!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Finalmente, destruimos la sesión en el servidor
session_destroy();

// 4. Redirigimos al usuario a la página de inicio (Landing Page)
header("Location: ../pages/index.php");
exit();
?>

```
**perfil_accion.php**
```php

```
**registro.php**
```php
<?php
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recoger datos y limpiar espacios
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $pass_plana = $_POST['password'];

    // 2. Encriptar contraseña para seguridad
    $password_hash = password_hash($pass_plana, PASSWORD_BCRYPT);

    try {
        // 3. Verificar si el correo ya está registrado
        $check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        if ($check->get_result()->num_rows > 0) {
            header("Location: ../pages/registro_vista.php?error=email_existe");
            exit();
        }

        // 4. INSERTAR (Sin la columna 'rol')
        // Tu tabla solo tiene: nombre, email, password. 
        // fecha_creacion se llena sola por el DEFAULT CURRENT_TIMESTAMP
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password_hash);
        
        if ($stmt->execute()) {
            // Éxito: Vamos al login
            header("Location: ../pages/login_vista.php?success=registro_ok");
        } else {
            echo "Error al insertar los datos.";
        }

    } catch (mysqli_sql_exception $e) {
        // Si sale el error de columnas, aquí verás exactamente qué falló
        die("Error en el registro: " . $e->getMessage());
    }
}
?>

```
## config
**conexion.php**
```php
<?php
// Configuración de la zona horaria para que coincida con tus registros de gastos
date_default_timezone_set('Europe/Madrid');

// Datos de conexión (Basados en el script SQL que definimos)
$host = "localhost";
$user = "nodou";      // Usuario creado en el script SQL
$pass = "Nodou123$";      // Contraseña definida en el script
$db   = "nodou";        // Nombre de tu nueva base de datos

// Habilitar el reporte de errores de MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Crear la conexión
    $conexion = new mysqli($host, $user, $pass, $db);
    
    // Establecer el conjunto de caracteres a utf8mb4 para soportar emojis y tildes
    $conexion->set_charset("utf8mb4");
    
    // Sincronizar la zona horaria de la base de datos con PHP
    $conexion->query("SET time_zone = '+01:00'");
    
} catch (mysqli_sql_exception $e) {
    // Si la conexión falla, detiene la ejecución y muestra el error (útil en desarrollo)
    die("Error crítico de conexión a NoDou: " . $e->getMessage());
}
?>

```
## pages
**calculos.php**
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cálculos Rápidos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .calc-container { max-width: 500px; margin: 0 auto; }
        .calc-card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .input-row { margin-bottom: 15px; }
        .input-row label { display: block; margin-bottom: 5px; font-weight: bold; color: #5a189a; }
        .input-row input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; }
        .res-box { background: #f0e6ff; padding: 15px; border-radius: 8px; text-align: center; margin-top: 15px; }
        .res-val { font-size: 1.5rem; font-weight: bold; color: #5a189a; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1 style="text-align:center;">🧮 Cálculos Rápidos</h1>

        <div class="calc-container">
            <div class="calc-card">
                <h3>💰 Divisor con Propina</h3>
                <div class="input-row">
                    <label>Monto Total del Ticket</label>
                    <input type="number" id="monto" placeholder="0.00" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label>% de Propina</label>
                    <input type="number" id="propina_pct" value="10" oninput="calcularPropina()">
                </div>
                <div class="input-row">
                    <label>¿Entre cuántos?</label>
                    <input type="number" id="personas" value="2" oninput="calcularPropina()">
                </div>

                <div class="res-box">
                    <p>Cada uno paga:</p>
                    <div class="res-val" id="total_cada_uno">$0.00</div>
                    <small id="detalle_propina">(Incluye $0.00 de propina total)</small>
                </div>
            </div>

            <div class="calc-card">
                <h3>📊 ¿Cuánto es el X%?</h3>
                <div class="input-row">
                    <label>Monto</label>
                    <input type="number" id="monto_pct" placeholder="0.00" oninput="calcSimple()">
                </div>
                <div class="input-row">
                    <label>Porcentaje (%)</label>
                    <input type="number" id="valor_pct" placeholder="%" oninput="calcSimple()">
                </div>
                <div class="res-box">
                    <div class="res-val" id="res_simple">$0.00</div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function calcularPropina() {
            const monto = parseFloat(document.getElementById('monto').value) || 0;
            const pct = parseFloat(document.getElementById('propina_pct').value) || 0;
            const personas = parseInt(document.getElementById('personas').value) || 1;

            const totalPropina = monto * (pct / 100);
            const totalConPropina = monto + totalPropina;
            const porPersona = totalConPropina / personas;

            document.getElementById('total_cada_uno').innerText = `$${porPersona.toFixed(2)}`;
            document.getElementById('detalle_propina').innerText = `(Incluye $${totalPropina.toFixed(2)} de propina total)`;
        }

        function calcSimple() {
            const m = parseFloat(document.getElementById('monto_pct').value) || 0;
            const p = parseFloat(document.getElementById('valor_pct').value) || 0;
            const res = m * (p / 100);
            document.getElementById('res_simple').innerText = `$${res.toFixed(2)}`;
        }
    </script>
</body>
</html>

```
**contactos.php**
```php
<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    exit("Acceso denegado");
}

$usuario_id = $_SESSION['usuario_id'];
$accion = $_POST['accion'] ?? '';

if ($accion === 'crear') {
    $nombre = trim($_POST['nombre_contacto']);
    if (!empty($nombre)) {
        $stmt = $conexion->prepare("INSERT INTO contactos (usuario_id, nombre_contacto) VALUES (?, ?)");
        $stmt->bind_param("is", $usuario_id, $nombre);
        $stmt->execute();
    }
} 

if ($accion === 'eliminar') {
    $id_contacto = intval($_POST['id_contacto']);
    // Validamos que el contacto pertenezca al usuario para evitar borrados malintencionados
    $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id_contacto, $usuario_id);
    $stmt->execute();
}

header("Location: ../pages/contactos.php");
exit();

```
**dashboard.php**
```php
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

```
**estadisticas.php**
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// 1. Consulta para Gastos por Mes (Últimos 6 meses)
$query_mensual = "SELECT DATE_FORMAT(fecha_gasto, '%M') as mes, SUM(monto_total) as total 
                  FROM gastos 
                  WHERE usuario_id = ? 
                  GROUP BY MONTH(fecha_gasto) 
                  ORDER BY fecha_gasto ASC LIMIT 6";
$stmt1 = $conexion->prepare($query_mensual);
$stmt1->bind_param("i", $usuario_id);
$stmt1->execute();
$res_mensual = $stmt1->get_result();

$meses = [];
$totales = [];
while($row = $res_mensual->fetch_assoc()){
    $meses[] = $row['mes'];
    $totales[] = $row['total'];
}

// 2. Consulta para Gastos por Categoría
$query_cat = "SELECT categoria, SUM(monto_total) as total 
              FROM gastos 
              WHERE usuario_id = ? 
              GROUP BY categoria";
$stmt2 = $conexion->prepare($query_cat);
$stmt2->bind_param("i", $usuario_id);
$stmt2->execute();
$res_cat = $stmt2->get_result();

$categorias = [];
$cantidades = [];
while($row = $res_cat->fetch_assoc()){
    $categorias[] = $row['categoria'];
    $cantidades[] = $row['total'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stats-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px; }
        .chart-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        .summary-card { background: #5a189a; color: white; padding: 20px; border-radius: 15px; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>📊 Tus Tendencias Financieras</h1>

        <div class="summary-card">
            <h3>Total Gastado este Mes</h3>
            <p style="font-size: 2rem; font-weight: bold;">
                $<?php echo number_format(array_sum($totales), 2); ?>
            </p>
        </div>

        <div class="stats-container">
            <div class="chart-box">
                <h3 style="text-align:center;">Comparación Mes a Mes</h3>
                <canvas id="chartMensual"></canvas>
            </div>

            <div class="chart-box">
                <h3 style="text-align:center;">Gastos por Categoría</h3>
                <canvas id="chartCategorias"></canvas>
            </div>
        </div>
    </main>

    <script>
        // Configuración Gráfico Mensual
        const ctxMensual = document.getElementById('chartMensual').getContext('2d');
        new Chart(ctxMensual, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [{
                    label: 'Total Gastado ($)',
                    data: <?php echo json_encode($totales); ?>,
                    backgroundColor: '#7b2cbf',
                    borderRadius: 5
                }]
            }
        });

        // Configuración Gráfico Categorías
        const ctxCat = document.getElementById('chartCategorias').getContext('2d');
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($categorias); ?>,
                datasets: [{
                    data: <?php echo json_encode($cantidades); ?>,
                    backgroundColor: ['#ff6d00', '#ff9100', '#ffb600', '#9d4edd']
                }]
            }
        });
    </script>
</body>
</html>

```
**gastos_fijos.php**
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// Consultar los gastos fijos del usuario
$query = "SELECT * FROM gastos_fijos WHERE usuario_id = ? ORDER BY dia_vencimiento ASC";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gastos Fijos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .checklist-container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .gasto-fijo-item { display: flex; align-items: center; justify-content: space-between; padding: 15px; border-bottom: 1px solid #eee; }
        .gasto-fijo-item:last-child { border-bottom: none; }
        .info-pago { display: flex; align-items: center; gap: 15px; }
        .dia-badge { background: #5a189a; color: white; padding: 5px 10px; border-radius: 8px; font-size: 0.8rem; font-weight: bold; }
        .completado { text-decoration: line-through; color: #aaa; }
        .checkbox-custom { width: 25px; height: 25px; cursor: pointer; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1 style="text-align:center;">📅 Mis Gastos Fijos</h1>
        <p style="text-align:center; color: #666; margin-bottom: 20px;">Controla tus pagos recurrentes del mes</p>

        <div class="checklist-container">
            <?php while($gasto = $resultado->fetch_assoc()): ?>
                <div class="gasto-fijo-item">
                    <div class="info-pago">
                        <span class="dia-badge">Día <?php echo $gasto['dia_vencimiento']; ?></span>
                        <div>
                            <strong class="<?php echo $gasto['completado_mes_actual'] ? 'completado' : ''; ?>">
                                <?php echo htmlspecialchars($gasto['titulo']); ?>
                            </strong>
                            <br>
                            <small>$<?php echo number_format($gasto['monto_estimado'], 2); ?></small>
                        </div>
                    </div>
                    <input type="checkbox" 
                           class="checkbox-custom" 
                           <?php echo $gasto['completado_mes_actual'] ? 'checked' : ''; ?>
                           onclick="marcarPago(<?php echo $gasto['id']; ?>, this)">
                </div>
            <?php endwhile; ?>
            
            <?php if ($resultado->num_rows == 0): ?>
                <p style="text-align:center; padding: 20px;">No tienes gastos fijos registrados.</p>
            <?php endif; ?>
        </div>
    </main>

    <script>
        function marcarPago(id, checkbox) {
            const

```
**index.php**
```php
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

```
**login_vista.php**
```php
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

```
**menu.php**
```php
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

```
**nueva_cuenta.php**
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';

$usuario_id = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cuenta - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .form-section { 
            background: white; 
            padding: 25px; /* Más espacio interno */
            border-radius: 15px; 
            margin-bottom: 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
        }

        .step-title { 
            color: #5a189a; 
            border-bottom: 2px solid #f0e6ff; 
            margin-bottom: 20px; 
            padding-bottom: 10px; 
            font-size: 1.2rem;
        }

        /* --- MEJORAS EN LA FILA DE PARTICIPANTES --- */
        .fila-participante { 
            display: flex; 
            align-items: center; 
            gap: 15px; /* Más espacio entre nombre, % y precio */
            margin-bottom: 15px; 
            padding: 10px; 
            background: #FAFAFA; 
            border: 1px solid #eee;
            border-radius: 12px; 
            transition: background 0.3s;
        }

        .fila-participante:hover {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-color: #ddd;
        }

        /* El input del nombre ahora ocupa todo el espacio disponible */
        .fila-participante input[type="text"] { 
            flex-grow: 1; /* Crece para ocupar espacio vacío */
            width: auto; /* Se adapta */
            min-width: 150px; /* Nunca será demasiado pequeño */
            margin: 0; 
            padding: 12px;
            font-size: 1rem;
        }

        .info-calculo { 
            min-width: 80px; /* Espacio fijo para el precio */
            text-align: right; 
            font-weight: bold; 
            color: var(--indigo); 
            font-size: 1rem; 
        }

        .input-pct { 
            width: 70px !important; 
            margin: 0 !important; 
            text-align: center; 
            font-weight: bold;
        }

        /* Botón de Eliminar (X) más estético */
        .btn-remove { 
            background: #ffebEE; 
            color: #d32f2f; 
            border: 1px solid #ffcdd2; 
            width: 36px;
            height: 36px;
            border-radius: 50%; /* Redondo */
            cursor: pointer; 
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            margin-left: 5px;
            padding: 0; /* Reset del padding */
        }

        .btn-remove:hover {
            background: #d32f2f;
            color: white;
            border-color: #b71c1c;
            transform: scale(1.1);
        }

        /* Botón Añadir Persona / Artículo */
        .btn-add { 
            background: #e8f5e9; 
            color: #2e7d32; 
            border: 1px solid #c8e6c9;
            padding: 12px 20px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 0.95rem; 
            font-weight: 600;
            width: 100%; /* Ocupa todo el ancho para ser fácil de tocar */
            transition: all 0.2s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-add:hover {
            background: #2e7d32;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(46, 125, 50, 0.2);
        }

        /* --- ESTILOS ARTÍCULOS --- */
        .item-row { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 12px; 
            align-items: center; 
            border: 1px solid #eee;
            padding: 15px; 
            border-radius: 12px;
            margin-bottom: 15px; 
            background: #fafafa;
        }

        .item-row input { margin: 0 !important; }

        .participantes-item { 
            width: 100%; 
            display: flex; 
            gap: 8px; 
            flex-wrap: wrap; 
            margin-top: 10px; 
            padding-top: 10px;
            border-top: 1px dashed #ddd;
        }

        .check-pill { 
            background: white; 
            border: 1px solid #ddd;
            padding: 6px 14px; 
            border-radius: 20px; 
            font-size: 0.85rem; 
            cursor: pointer; 
            user-select: none; 
            transition: all 0.2s;
        }

        .check-pill:hover { background: #f0f0f0; }

        .check-pill.active { 
            background: var(--indigo); 
            color: white; 
            border-color: var(--indigo);
            box-shadow: 0 2px 5px rgba(63, 81, 181, 0.3);
        }

        .hidden { display: none; }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>➕ Registrar Nuevo Gasto</h1>

        <form action="../backend/guardar_gasto.php" method="POST" id="formGasto">

            <section class="form-section">
                <h2 class="step-title">1. Información del Gasto</h2>

                <div class="input-group">
                    <label>Título (ej: Cena Pizza)</label>
                    <input type="text" name="titulo" placeholder="¿Qué compraste?" required>
                </div>

                <div class="input-group">
                    <label>Fecha</label>
                    <input type="date" name="fecha_gasto" 
                           value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="input-group">
                    <label>Método de División</label>
                    <select name="metodo_division" id="metodo_division" onchange="cambiarMetodo()">
                        <option value="iguales">Por partes iguales</option>
                        <option value="porcentaje">Por porcentaje (%)</option>
                        <option value="articulos">Por artículos (Detallado)</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Monto Total ($)</label>
                    <input type="number" step="0.01" name="monto_total" id="monto_total" 
                           placeholder="0.00" oninput="recalcular()" required>
                    <small id="aviso-auto" style="display:none; color: var(--indigo); font-weight:bold; margin-top:5px;">
                        🤖 Calculado automáticamente por la suma de artículos.
                    </small>
                </div>
            </section>

            <section class="form-section">
                <h2 class="step-title">2. Participantes</h2>
                <div id="container-participantes"></div>

                <button type="button" class="btn-add" onclick="agregarParticipante()">
                    <span>👤</span> Añadir Persona
                </button>
            </section>

            <section class="form-section hidden" id="seccion-articulos">
                <h2 class="step-title">3. Detalle de Artículos</h2>
                <p><small>Añade los ítems del ticket y selecciona quién consumió cada uno.</small></p>

                <div id="container-articulos"></div>

                <button type="button" class="btn-add" onclick="agregarArticulo()">
                    <span>🛒</span> Añadir Artículo
                </button>
            </section>

            <button type="submit" class="btn-login" 
                    style="width: 100%; background: #5a189a; color: white; margin-top:20px; padding: 15px; font-size: 1.1rem;">
                💾 Guardar Gasto
            </button>
        </form>
    </main>

    <script>
        /* ===========================
           0. ESTADO INICIAL
        ============================ */
        let participantes = [
            { id: 1, nombre: 'Yo' },
            { id: 2, nombre: '' }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            renderizarParticipantes();
        });

        /* ===========================
           1. PARTICIPANTES
        ============================ */
        function renderizarParticipantes() {
            const container = document.getElementById('container-participantes');
            const metodo = document.getElementById('metodo_division').value;

            container.innerHTML = '';

            participantes.forEach((p, index) => {
                const div = document.createElement('div');
                div.className = 'fila-participante';

                let html = `
                    <input type="text" 
                           name="nombres[]" 
                           value="${p.nombre}" 
                           placeholder="Nombre participante" 
                           oninput="actualizarNombre(${index}, this.value)" 
                           required>

                    <input type="hidden" 
                           name="montos_finales[]" 
                           id="input-monto-${index}" 
                           value="0">
                `;

                if (metodo === 'porcentaje') {
                    html += `
                        <input type="number" 
                               name="porcentajes[]" 
                               class="input-pct" 
                               placeholder="%" 
                               step="0.1" 
                               oninput="recalcular()" 
                               value="${p.porcentaje || 0}"> %
                    `;
                }

                html += `<div class="info-calculo" id="pago-${index}">$0.00</div>`;

                if (participantes.length > 1) {
                    html += `
                        <button type="button" 
                                class="btn-remove" 
                                title="Eliminar participante"
                                onclick="eliminarParticipante(${index})">×</button>
                    `;
                }

                div.innerHTML = html;
                container.appendChild(div);
            });

            if (metodo === 'articulos') {
                renderizarArticulos();
            }

            recalcular();
        }

        function agregarParticipante() {
            participantes.push({ id: Date.now(), nombre: '' });
            renderizarParticipantes();
        }

        function eliminarParticipante(index) {
            participantes.splice(index, 1);
            renderizarParticipantes();
        }

        function actualizarNombre(index, valor) {
            participantes[index].nombre = valor;

            if (document.getElementById('metodo_division').value === 'articulos') {
                document.querySelectorAll(`.label-nombre-${index}`)
                    .forEach(span => span.innerText = valor || 'Persona ' + (index + 1));
            }
        }

        /* ===========================
           2. MÉTODO DE DIVISIÓN
        ============================ */
        function cambiarMetodo() {
            const metodo = document.getElementById('metodo_division').value;
            const seccionArticulos = document.getElementById('seccion-articulos');
            const inputTotal = document.getElementById('monto_total');
            const aviso = document.getElementById('aviso-auto');

            if (metodo === 'articulos') {
                seccionArticulos.classList.remove('hidden');
                inputTotal.readOnly = true;
                inputTotal.style.backgroundColor = '#e9ecef';
                aviso.style.display = 'block';

                if (document.getElementById('container-articulos').children.length === 0) {
                    agregarArticulo();
                }
            } else {
                seccionArticulos.classList.add('hidden');
                inputTotal.readOnly = false;
                inputTotal.style.backgroundColor = '#FAFAFA';
                aviso.style.display = 'none';
            }

            renderizarParticipantes();
        }

        /* ===========================
           3. ARTÍCULOS
        ============================ */
        function agregarArticulo() {
            const container = document.getElementById('container-articulos');
            const div = document.createElement('div');
            div.className = 'item-row';

            let checksHtml = '';
            participantes.forEach((p, idx) => {
                checksHtml += `
                    <label class="check-pill">
                        <input type="checkbox" 
                               name="articulos_owners[]" 
                               value="${idx}" 
                               onchange="togglePill(this); recalcular()">

                        <span class="label-nombre-${idx}">
                            ${p.nombre || 'Persona ' + (idx + 1)}
                        </span>
                    </label>
                `;
            });

            div.innerHTML = `
                <input type="text" 
                       name="articulos_nombres[]" 
                       placeholder="Item (ej. Cervezas)" 
                       style="flex-grow: 2; min-width: 150px;">

                <input type="number" 
                       step="0.01" 
                       name="articulos_precios[]" 
                       placeholder="$0.00" 
                       class="precio-articulo" 
                       style="width: 100px;" 
                       oninput="recalcular()">

                <button type="button" 
                        class="btn-remove" 
                        title="Eliminar artículo"
                        onclick="this.parentElement.remove(); recalcular()">×</button>

                <div class="participantes-item">
                    ${checksHtml}
                </div>
            `;

            container.appendChild(div);
        }

        function togglePill(checkbox) {
            checkbox.parentElement.classList.toggle('active', checkbox.checked);
        }

        /* ===========================
           4. CÁLCULOS
        ============================ */
        function recalcular() {
            const metodo = document.getElementById('metodo_division').value;
            const inputTotal = document.getElementById('monto_total');

            let total = parseFloat(inputTotal.value) || 0;
            let pagos = new Array(participantes.length).fill(0);

            if (metodo === 'iguales') {
                if (participantes.length > 0) {
                    const montoIndividual = total / participantes.length;
                    pagos.fill(montoIndividual);
                }
            } else if (metodo === 'porcentaje') {
                const inputsPct = document.getElementsByName('porcentajes[]');
                inputsPct.forEach((input, idx) => {
                    const pct = parseFloat(input.value) || 0;
                    pagos[idx] = total * (pct / 100);
                });
            } else if (metodo === 'articulos') {
                let sumaTotalArticulos = 0;
                const filasItems = document.querySelectorAll('.item-row');

                filasItems.forEach(fila => {
                    const precio = parseFloat(
                        fila.querySelector('.precio-articulo').value
                    ) || 0;

                    sumaTotalArticulos += precio;

                    const checks = fila.querySelectorAll('input[type="checkbox"]:checked');

                    if (checks.length > 0) {
                        const parte = precio / checks.length;
                        checks.forEach(chk => {
                            const idxParticipante = parseInt(chk.value);
                            pagos[idxParticipante] += parte;
                        });
                    }
                });

                inputTotal.value = sumaTotalArticulos.toFixed(2);
            }

            pagos.forEach((monto, idx) => {
                const el = document.getElementById(`pago-${idx}`);
                const inputHidden = document.getElementById(`input-monto-${idx}`);

                if (el) el.innerText = `$${monto.toFixed(2)}`;
                if (inputHidden) inputHidden.value = monto.toFixed(2);
            });
        }
    </script>
</body>
</html>

```
**registro_vista.php**
```php
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

```
## sql
**nodou_db.sql**
```sql
CREATE DATABASE nodou;
USE nodou;

CREATE USER 
'nodou'@'localhost' 
IDENTIFIED  BY 'Nodou123$';

GRANT USAGE ON *.* TO 'nodou'@'localhost';

ALTER USER 'nodou'@'localhost' 
REQUIRE NONE 
WITH MAX_QUERIES_PER_HOUR 0 
MAX_CONNECTIONS_PER_HOUR 0 
MAX_UPDATES_PER_HOUR 0 
MAX_USER_CONNECTIONS 0;

GRANT ALL PRIVILEGES ON nodou.* 
TO 'nodou'@'localhost';

FLUSH PRIVILEGES;

/* 2. Tabla de Usuarios */
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultima_conexion DATETIME NULL
);

/* 3. Tabla de Contactos Frecuentes */
CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL, 
    nombre_contacto VARCHAR(50) NOT NULL,
    email_contacto VARCHAR(100) NULL, -- Opcional, por si quieres enviar avisos luego
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

/* 4. Tabla de Gastos (Cabecera) */
CREATE TABLE gastos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL, 
    titulo VARCHAR(100) NOT NULL,
    monto_total DECIMAL(10, 2) NOT NULL,
    metodo_division ENUM('iguales', 'articulos', 'porcentaje') DEFAULT 'iguales',
    categoria ENUM('comida', 'vivienda', 'ocio', 'otros') DEFAULT 'otros', -- Útil para tus estadísticas
    fecha_gasto DATE NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

/* 5. Detalle de Gasto (Participantes) */
CREATE TABLE detalle_gasto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gasto_id INT NOT NULL,
    nombre_participante VARCHAR(50) NOT NULL,
    monto_asignado DECIMAL(10, 2) NOT NULL,
    porcentaje DECIMAL(5, 2) DEFAULT NULL, -- Para cuando elijan división por %
    pagado BOOLEAN DEFAULT FALSE, 
    FOREIGN KEY (gasto_id) REFERENCES gastos(id) ON DELETE CASCADE
);

/* 6. Desglose por Artículos (Opcional, para la función "Por artículos") */
CREATE TABLE articulos_gasto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gasto_id INT NOT NULL,
    nombre_articulo VARCHAR(100),
    precio DECIMAL(10, 2),
    FOREIGN KEY (gasto_id) REFERENCES gastos(id) ON DELETE CASCADE
);

/* 7. Tabla de Gastos Fijos */
CREATE TABLE gastos_fijos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    monto_estimado DECIMAL(10, 2),
    dia_vencimiento INT CHECK (dia_vencimiento BETWEEN 1 AND 31),
    completado_mes_actual BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

```
