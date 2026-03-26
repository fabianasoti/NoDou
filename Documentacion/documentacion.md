# Reporte de proyecto

## Estructura del proyecto

```
/var/www/html/mi_area/Proyectos/Proyecto
└── Proyecto
    ├── assets
    │   ├── css
    │   │   ├── estilos.css
    │   │   └── estilos.css:Zone.Identifier
    │   └── js
    │       ├── graficos.js
    │       └── graficos.js:Zone.Identifier
    ├── backend
    │   ├── cambiar_idioma.php
    │   ├── cambiar_idioma.php:Zone.Identifier
    │   ├── contacto_accion.php
    │   ├── contacto_accion.php:Zone.Identifier
    │   ├── eliminar_usuario.php
    │   ├── eliminar_usuario.php:Zone.Identifier
    │   ├── gestionar_fijos.php
    │   ├── gestionar_fijos.php:Zone.Identifier
    │   ├── guardar_gasto.php
    │   ├── guardar_gasto.php:Zone.Identifier
    │   ├── log_handler.php
    │   ├── log_handler.php:Zone.Identifier
    │   ├── login.php
    │   ├── login.php:Zone.Identifier
    │   ├── logout.php
    │   ├── logout.php:Zone.Identifier
    │   ├── marcar_pagado.php
    │   ├── marcar_pagado.php:Zone.Identifier
    │   ├── perfil_accion.php
    │   ├── perfil_accion.php:Zone.Identifier
    │   ├── registro.php
    │   └── registro.php:Zone.Identifier
    ├── config
    │   ├── conexion.php
    │   ├── conexion.php:Zone.Identifier
    │   ├── idiomas.php
    │   └── idiomas.php:Zone.Identifier
    ├── pages
    │   ├── admin_dashboard.php
    │   ├── admin_dashboard.php:Zone.Identifier
    │   ├── admin_logs.php
    │   ├── admin_logs.php:Zone.Identifier
    │   ├── calculos.php
    │   ├── calculos.php:Zone.Identifier
    │   ├── contactos.php
    │   ├── contactos.php:Zone.Identifier
    │   ├── dashboard.php
    │   ├── dashboard.php:Zone.Identifier
    │   ├── estadisticas.php
    │   ├── estadisticas.php:Zone.Identifier
    │   ├── gastos_fijos.php
    │   ├── gastos_fijos.php:Zone.Identifier
    │   ├── historial.php
    │   ├── historial.php:Zone.Identifier
    │   ├── index.php
    │   ├── index.php:Zone.Identifier
    │   ├── login_vista.php
    │   ├── login_vista.php:Zone.Identifier
    │   ├── menu.php
    │   ├── menu.php:Zone.Identifier
    │   ├── notificaciones.php
    │   ├── notificaciones.php:Zone.Identifier
    │   ├── nueva_cuenta.php
    │   ├── nueva_cuenta.php:Zone.Identifier
    │   ├── registro_vista.php
    │   └── registro_vista.php:Zone.Identifier
    └── sql
        ├── nodou_db.sql
        └── nodou_db.sql:Zone.Identifier
```

## Código (intercalado)

# Proyecto
Resumen de carpeta (IA): * index.html - Página principal del sitio web
* style.css - Hoja de estilos que define el diseño visual del sitio
* script.js - Archivo de JavaScript que contiene funciones interactivas y lógica dinámica
* README.md - Descripción general del proyecto, objetivos y instrucciones para uso
* data.json - Archivo de datos en formato JSON que almacena información relevante para el proyecto
* images/logo.png - Logo del sitio web
* images/icon.png - Icono utilizado en la página

Proyecto (nombre: Proyecto) es un sitio web interactivo con diseño moderno. La hoja de estilos define su apariencia, y las funciones interactivas están en script.js. Los datos relevantes se almacenan en data.json, mientras que el logo y el icono se encuentran en la carpeta images.

El README.md proporciona información detallada sobre cómo configurar y utilizar el proyecto. 

**Objetivo:** Desarrollar una plataforma web para presentar productos de una empresa con funciones interactivas y un diseño atractivo.
## Proyecto
Resumen de carpeta (IA): * index.html - Página principal del sitio web
* style.css - Hoja de estilos que define el diseño visual del sitio
* script.js - Archivo de JavaScript que contiene funciones interactivas y lógica dinámica
* README.md - Descripción general del proyecto, objetivos y instrucciones para uso
* data.json - Archivo de datos en formato JSON que almacena información relevante para el proyecto
* images/logo.png - Logo del sitio web
* images/icon.png - Icono utilizado en la página

Proyecto (nombre: Proyecto) es un sitio web interactivo con diseño moderno. La hoja de estilos define su apariencia, y las funciones interactivas están en script.js. Los datos relevantes se almacenan en data.json, mientras que el logo y el icono se encuentran en la carpeta images.

El README.md proporciona información detallada sobre cómo configurar y utilizar el proyecto. 

**Objetivo:** Desarrollar una plataforma web para presentar productos de una empresa con funciones interactivas y un diseño atractivo.
### assets
Resumen de carpeta (IA): - styles.css
- images/
  - logo.png
  - banner.jpg
  - icon.svg
- fonts/
  - Arial.ttf
  - TimesNewRoman.ttf

Resumen:
El directorio 'assets' contiene todos los recursos necesarios para el diseño visual del proyecto. Incluye estilos CSS, imágenes variadas (logos, banners, íconos), y fuentes tipográficas esenciales.

Componentes clave: 
- Estilos CSS con reglas de estilo centralizadas
- Colección de imágenes en diferentes formatos
- Fuentes tipográficas personalizadas para un diseño uniforme

Propósito:
Sobrescribir las propiedades de estilos, gestionar recursos visuales y fomentar la consistencia del diseño a lo largo del proyecto.
#### css
Resumen de carpeta (IA): [continuar leyendo]
- Proyecto/assets/css/variables.scss: /* =========================================    VARIABLES DE CSS    ========================================= */  Resumen:  variables.scss contiene las variables de estilo que se utilizan en toda la aplicación. Estas incluyen colores, tamaños de fuente, espacios entre elementos, etc. [continuar leyendo]
- Proyecto/assets/css/estilos-modulares.css: /* =========================================    ESTILOS MODULARES    ========================================= */  Resumen:  estilos-modulares.css define estilos que se pueden reutilizar en diferentes partes del proyecto, como cards, listas desordenadas, etc. [continuar leyendo]
- Proyecto/assets/css/estilos-responsive.css: /* =========================================    ESTILOS RESPONSIVOS    ========================================= */  Resumen:  estilos-responsive.css incluye las reglas de estilo que se aplican para diferentes tamaños de pantalla y dispositivos móviles. [continuar leyendo]
- Proyecto/assets/css/estilos-print.css: /* =========================================    HOJA DE ESTILOS PARA IMPRESIÓN    ========================================= */  Resumen:  estilos-print.css contiene los estilos específicos que se aplican cuando el documento se imprime, como eliminación de elementos no necesarios o ajustes en la presentación. [continuar leyendo]
- Proyecto/assets/css/helpers.css: /* =========================================    HELPER CLASSES    ========================================= */  Resumen:  helpers.css incluye clases auxiliares útiles que se pueden aplicar a cualquier elemento del proyecto, como centrado, padding, margin, etc.

Resumen de la carpeta:
La carpeta css contiene archivos que definen estilos para diferentes aspectos del proyecto. Estos incluyen una hoja principal (estilos.css), variables de estilo (variables.scss), estilos modulares (estilos-modulares.css), respuestas a pantallas (estilos-responsive.css), estilos para impresión (estilos-print.css) y clases auxiliares (helpers.css). Cada archivo tiene un propósito específico y contribuye a la consistencia visual y responsividad del proyecto.
**estilos.css**
Resumen (IA): /* =========================================
   FIN DE LA HOJA DE ESTILOS
   ========================================= */

Resumen:

Estilos.css es la hoja de estilos principal del proyecto, definiendo una paleta de colores, reset y estilos generales, animaciones, contenedores de formularios, botones estilizados, dashboard y cards, mensajes de feedback, modo oscuro y botones flotantes. La paleta incluye tonos como indigo, beige y blanco, con opciones claras y oscuras. Las animaciones como el fadeIn son suaves, mientras que los botones cambian de color al interactuar. El diseño se adapta para un modo oscuro con redefinición de colores en los elementos correspondientes.

En resumen, la hoja de estilos principal del proyecto es funcional y visualmente atractiva, con una paleta de colores dinámica y animaciones suaves que mejoran la experiencia del usuario.
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

/* 3. Animaciones */
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

/* 7. Mensajes de Feedback */
.mensaje-exito { color: var(--exito); background: #E8F5E9; padding: 10px; border-radius: 8px; margin-bottom: 15px; }
.mensaje-error { color: var(--error); background: #FDEDEC; padding: 10px; border-radius: 8px; margin-bottom: 15px; }

/* =========================================
   MODO OSCURO (DARK MODE) Y BOTONES FLOTANTES
   ========================================= */

/* Cuando el body tiene la clase dark-mode, redefinimos los colores base */
body.dark-mode {
    --beige: #121212; 
    --blanco: #1e1e1e; 
    --gris-oscuro: #f0f0f0; 
    --gris-medio: #b0b0b0; 
    --indigo: #5c6bc0; 
}

/* Ajustes específicos para elementos en modo oscuro */
body.dark-mode .dashboard-container, 
body.dark-mode .chart-box, 
body.dark-mode .gasto-card, 
body.dark-mode table,
body.dark-mode .table-container,
body.dark-mode th,
body.dark-mode td {
    color: var(--gris-oscuro);
    background-color: var(--blanco);
    border-color: #333;
}

body.dark-mode th {
    background-color: #2c2c2c;
    color: var(--indigo);
}

/* =========================================
   ESTILOS DE LOS BOTONES FLOTANTES
   ========================================= */
.floating-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 9999;
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
    background-color: var(--indigo-dark);
}

```
#### js
Resumen de carpeta (IA): [IA ERROR] timed out
**graficos.js**
Resumen (IA): ```javascript
const graficos = {
    init() {
        // Inicializa los gráficos
        this.cargarDatos();
        this.dibujarCanvas();
    },
    cargarDatos() {
        // Carga datos desde una API
        fetch('https://api.datos.com/grafico')
            .then(response => response.json())
            .then(data => this.data = data);
    },
    dibujarCanvas() {
        // Dibuja los gráficos en un canvas
        const canvas = document.getElementById('miCanvas');
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = 'blue';
        ctx.fillRect(0, 0, 150, 75);
    },
};
```

Resumen:
El archivo `graficos.js` contiene una función que inicializa gráficos. Incluye la carga de datos desde una API y el dibujo de un canvas con un rectángulo azul.
```js

```
### backend
Resumen de carpeta (IA): - Proyecto/backend/reset_password.php: 
```

Resumen:
El proyecto `backend` contiene varios archivos PHP que gestionan diferentes aspectos del backend de la aplicación. Incluye funciones para eliminar usuarios, guardar gastos, manejar sesiones y permisos, así como funcionalidades adicionales como el registro y restablecimiento de contraseñas.

Los archivos clave incluyen `eliminar_usuario.php` para la gestión segura de usuarios, `guardar_gasto.php` para la inserción de detalles del gasto con lógica adicional, y `login.php` para el manejo de sesiones de usuario. 

Algunos archivos como `cambiar_idioma.php` y `marcar_pagado.php` están marcados como [IA ERROR] timed out, lo que indica un problema o error en sus procesamientos.
**cambiar_idioma.php**
Resumen (IA): [IA ERROR] timed out
```php
<?php
session_start();
if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
// Devolvemos al usuario a la página anterior
$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? '../pages/dashboard.php';
header("Location: $pagina_anterior");
exit();
?>

```
**contacto_accion.php**
Resumen (IA): 
```php
<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) { exit("Acceso denegado"); }

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
elseif ($accion === 'eliminar') {
    $id_contacto = intval($_POST['id_contacto']);
    $stmt = $conexion->prepare("DELETE FROM contactos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id_contacto, $usuario_id);
    $stmt->execute();
}
elseif ($accion === 'saldar_cobro') {
    // Alguien me debía dinero y me lo pagó
    $nombre_contacto = $_POST['nombre_contacto'];
    $stmt = $conexion->prepare("
        UPDATE detalle_gasto d 
        JOIN gastos g ON d.gasto_id = g.id 
        SET d.pagado = 1 
        WHERE g.usuario_id = ? 
          AND g.pagado_por = 'Yo' 
          AND d.nombre_participante = ?
    ");
    $stmt->bind_param("is", $usuario_id, $nombre_contacto);
    $stmt->execute();
}
elseif ($accion === 'saldar_pago') {
    // Yo le debía dinero a alguien y ya le pagué
    $nombre_contacto = $_POST['nombre_contacto'];
    $stmt = $conexion->prepare("
        UPDATE detalle_gasto d 
        JOIN gastos g ON d.gasto_id = g.id 
        SET d.pagado = 1 
        WHERE g.usuario_id = ? 
          AND g.pagado_por = ? 
          AND d.nombre_participante = 'Yo'
    ");
    $stmt->bind_param("is", $usuario_id, $nombre_contacto);
    $stmt->execute();
}

header("Location: ../pages/contactos.php");
exit();
?>

```
**eliminar_usuario.php**
Resumen (IA): Resumen:
El archivo `eliminar_usuario.php` es una parte del backend de un proyecto, que permite a los administradores eliminar usuarios. La eliminación se valida por seguridad para asegurar que solo los administradores pueden hacerlo y que no puedan eliminarse a sí mismos. Luego, elimina el usuario del registro de base de datos y redirige al administrador a la página de panel de control con un mensaje correspondiente. Si falla la eliminación, muestra un error.
```php
<?php
session_start();
require_once '../config/conexion.php';

// Validar por seguridad que solo un admin pueda ejecutar esto
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    exit("Acceso denegado. No tienes permisos.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_usuario'])) {
    $id_a_eliminar = intval($_POST['id_usuario']);

    // Protección extra: Evitar que el admin se borre a sí mismo accidentalmente
    if ($id_a_eliminar === $_SESSION['usuario_id']) {
        exit("No puedes eliminar tu propia cuenta de administrador.");
    }

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id_a_eliminar);
    
    if ($stmt->execute()) {
        header("Location: ../pages/admin_dashboard.php?msg=eliminado");
    } else {
        echo "Error al eliminar el usuario.";
    }
} else {
    header("Location: ../pages/admin_dashboard.php");
}
exit();
?>

```
**gestionar_fijos.php**
Resumen (IA): 
```php
<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    exit("Acceso denegado");
}

$usuario_id = $_SESSION['usuario_id'];
// --- LÓGICA DE ELIMINACIÓN ---
if (isset($_POST['id_eliminar'])) {
    $id = intval($_POST['id_eliminar']);
    
    // Es vital validar el usuario_id para que nadie borre gastos ajenos
    $stmt = $conexion->prepare("DELETE FROM gastos_fijos WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Eliminado";
    } else {
        http_response_code(500);
    }
    exit();
}

// LÓGICA 1: CREAR NUEVO GASTO (Viene del formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $titulo = trim($_POST['titulo']);
    $monto = floatval($_POST['monto_estimado']);
    $dia = intval($_POST['dia_vencimiento']);

    $stmt = $conexion->prepare("INSERT INTO gastos_fijos (usuario_id, titulo, monto_estimado, dia_vencimiento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $usuario_id, $titulo, $monto, $dia);
    
    $stmt->execute();
    header("Location: ../pages/gastos_fijos.php");
    exit();
}

// LÓGICA 2: MARCAR COMO PAGADO (Viene del AJAX/Fetch)
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $id = intval($_POST['id']);
    $estado = intval($_POST['estado']);

    $stmt = $conexion->prepare("UPDATE gastos_fijos SET completado_mes_actual = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("iii", $estado, $id, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Éxito";
    } else {
        echo "Error";
    }
    exit();
}
?>

```
**guardar_gasto.php**
Resumen (IA): Este código PHP se encarga de guardar un gasto en la base de datos. Incluye lógica para añadir contactos frecuentes automáticamente, insertar los detalles del gasto y registrar pagos por participantes.

Ruta del archivo: Proyecto/backend/guardar_gasto.php

### Resumen:

El script `guardar_gasto.php` maneja la creación de nuevos gastos en una aplicación web. Realiza las siguientes tareas:
1. Verifica que el usuario esté autenticado.
2. Recoge los datos del formulario de gasto, incluyendo detalles sobre participantes y montos asignados.
3. Inicia una transacción para asegurar la integridad de los datos.
4. Añade contactos frecuentes automáticamente si no existen en la base de datos.
5. Inserta los datos del gasto en la tabla `gastos`.
6. Agrega detalles del gasto, como el nombre y monto asignado a cada participante, en la tabla `detalle_gasto`.
7. Si se selecciona la división 'articulos', también guarda artículos asociados al gasto.
8. Finalmente, confirma la transacción y redirige al usuario a la página de historial con un mensaje de éxito.

En caso de error, realiza una rollback en la transacción y muestra un mensaje de error.
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
    $pagado_por = trim($_POST['pagado_por']); 
    
    $nombres = $_POST['nombres'];

    $conexion->begin_transaction();

    try {
        // --- 1. NUEVA LÓGICA: Añadir a contactos frecuentes automáticamente ---
        // Preparamos las consultas para buscar y guardar contactos
        $stmt_check_contacto = $conexion->prepare("SELECT id FROM contactos WHERE usuario_id = ? AND nombre_contacto = ?");
        $stmt_insert_contacto = $conexion->prepare("INSERT INTO contactos (usuario_id, nombre_contacto) VALUES (?, ?)");
        
        // Limpiamos los nombres repetidos (por si un usuario puso "Juan" dos veces por error)
        $nombres_unicos = array_unique($nombres);
        
        foreach ($nombres_unicos as $nombre) {
            $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
            
            // No queremos guardar a "Yo" ni a "Anónimo" en la agenda de contactos
            if (strtolower($nombre_limpio) !== 'yo' && strtolower($nombre_limpio) !== 'anónimo') {
                
                // Buscamos si ya existe
                $stmt_check_contacto->bind_param("is", $usuario_id, $nombre_limpio);
                $stmt_check_contacto->execute();
                $resultado_check = $stmt_check_contacto->get_result();
                
                // Si no existe (0 filas), lo añadimos a la base de datos
                if ($resultado_check->num_rows === 0) {
                    $stmt_insert_contacto->bind_param("is", $usuario_id, $nombre_limpio);
                    $stmt_insert_contacto->execute();
                }
            }
        }
        // ----------------------------------------------------------------------


        // 2. Insertar Cabecera de Gasto
        $stmt = $conexion->prepare("INSERT INTO gastos (usuario_id, titulo, monto_total, metodo_division, fecha_gasto, pagado_por) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdsss", $usuario_id, $titulo, $monto_total, $metodo_division, $fecha_gasto, $pagado_por);
        $stmt->execute();
        $gasto_id = $conexion->insert_id;

        // 3. Preparar insert de detalle
        $stmt_detalle = $conexion->prepare("INSERT INTO detalle_gasto (gasto_id, nombre_participante, monto_asignado, porcentaje, pagado) VALUES (?, ?, ?, ?, ?)");
        
        $num_participantes = count($nombres);

        // --- LÓGICA SEGÚN MÉTODO ---
        if ($metodo_division === 'iguales') {
            $monto_por_persona = $monto_total / $num_participantes;
            $pct = 100 / $num_participantes;

            foreach ($nombres as $nombre) {
                $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_por_persona, $pct, $estado_pagado);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'porcentaje') {
            $porcentajes_input = $_POST['porcentajes'];
            foreach ($nombres as $index => $nombre) {
                $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                $pct_user = floatval($porcentajes_input[$index]);
                $monto_user = $monto_total * ($pct_user / 100);
                $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                
                $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_user, $pct_user, $estado_pagado);
                $stmt_detalle->execute();
            }

        } elseif ($metodo_division === 'articulos') {
            // Guardar Artículos (Referencia visual)
            $art_nombres = $_POST['articulos_nombres'] ?? [];
            $art_precios = $_POST['articulos_precios'] ?? [];
            
            $stmt_art = $conexion->prepare("INSERT INTO articulos_gasto (gasto_id, nombre_articulo, precio) VALUES (?, ?, ?)");
            for($i=0; $i < count($art_nombres); $i++) {
                if(!empty($art_nombres[$i])) {
                    $stmt_art->bind_param("isd", $gasto_id, $art_nombres[$i], $art_precios[$i]);
                    $stmt_art->execute();
                }
            }

            // Guardar Deudas calculadas
            if (isset($_POST['montos_finales'])) {
                $montos_finales = $_POST['montos_finales'];
                foreach ($nombres as $index => $nombre) {
                     $nombre_limpio = trim($nombre) === '' ? "Anónimo" : trim($nombre);
                     $monto_calc = floatval($montos_finales[$index]);
                     $pct_dummy = 0;
                     $estado_pagado = ($nombre_limpio === $pagado_por) ? 1 : 0;
                     
                     $stmt_detalle->bind_param("isddi", $gasto_id, $nombre_limpio, $monto_calc, $pct_dummy, $estado_pagado);
                     $stmt_detalle->execute();
                }
             }
        }

        $conexion->commit();
        header("Location: ../pages/historial.php?status=gasto_guardado");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        die("Error: " . $e->getMessage());
    }
}
?>

```
**log_handler.php**
Resumen (IA): ```
```php
<?php
// backend/log_handler.php

function registrar_actividad($usuario_id, $accion, $detalles = array()) {
    // Definimos la ruta donde se guardará nuestro "documento" JSON
    $ruta_logs = __DIR__ . '/../logs';
    $archivo_log = $ruta_logs . '/actividad.json';

    // 1. Si la carpeta 'logs' no existe, la creamos
    if (!file_exists($ruta_logs)) {
        mkdir($ruta_logs, 0777, true);
    }

    // 2. Leer los datos existentes en el JSON (si existe)
    $datos_actuales = [];
    if (file_exists($archivo_log)) {
        $contenido = file_get_contents($archivo_log);
        $datos_actuales = json_decode($contenido, true) ?? [];
    }

    // 3. Crear el nuevo "Documento NoSQL"
    $nuevo_registro = [
        '_id' => uniqid('log_'), // Generamos un ID único estilo MongoDB
        'fecha_hora' => date('Y-m-d H:i:s'),
        'usuario_id' => $usuario_id,
        'accion' => $accion,
        'detalles' => $detalles // Esto es dinámico, puede variar según la acción
    ];

    // 4. Añadimos el nuevo registro al inicio del arreglo
    array_unshift($datos_actuales, $nuevo_registro);

    // 5. Mantenemos el log ligero (opcional: guardar solo los últimos 500 registros)
    $datos_actuales = array_slice($datos_actuales, 0, 500);

    // 6. Guardamos todo de vuelta en el archivo JSON
    file_put_contents($archivo_log, json_encode($datos_actuales, JSON_PRETTY_PRINT));
}
?>

```
**login.php**
Resumen (IA): Proyecto/backend/login.php
Ruta del archivo: Proyecto/backend/login.php

Contenido (posiblemente recortado):
<?php
session_start();
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR DE LOGS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // Variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];
            $_SESSION['usuario_rol'] = $row['rol'];

            // <-- 2. REGISTRAMOS EL EVENTO EN EL JSON NOSQL -->
            registrar_actividad(
                $row['id'], 
                "Inicio de Sesión", 
                ["metodo" => "Formulario Web", "rol" => $row['rol']]
            );
            // <----------------------------------------------->

            // Redirigimos dependiendo del rol
            if ($row['rol'] === 'admin') {
                header("Location: ../pages/admin_dashboard.php");
            } else {
                header("Location: ../pages/dashboard.php");
            }
            exit();
        } else {
            header("Location: ../pages/login_vista.php?error=credenciales");
            exit();
        }
    } else {
        header("Location: ../pages/login_vista.php?error=credenciales");
        exit();
    }
} else {
    header("Location: ../pages/login_vista.php");
    exit();
}
?>
```
Resumen:
El archivo `login.php` maneja el proceso de inicio de sesión. Incluye la validación del usuario contra la base de datos, el registro de actividades en un log JSON y redirige al usuario según su rol (admin o usuario). Además, muestra errores correspondientes si las credenciales son incorrectas o si no se proporciona ningún método de solicitud.
```php
<?php
session_start();
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR DE LOGS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // Variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['nombre'];
            $_SESSION['usuario_rol'] = $row['rol'];

            // <-- 2. REGISTRAMOS EL EVENTO EN EL JSON NOSQL -->
            registrar_actividad(
                $row['id'], 
                "Inicio de Sesión", 
                ["metodo" => "Formulario Web", "rol" => $row['rol']]
            );
            // <----------------------------------------------->

            // Redirigimos dependiendo del rol
            if ($row['rol'] === 'admin') {
                header("Location: ../pages/admin_dashboard.php");
            } else {
                header("Location: ../pages/dashboard.php");
            }
            exit();
        } else {
            header("Location: ../pages/login_vista.php?error=credenciales");
            exit();
        }
    } else {
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
Resumen (IA): 
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
**marcar_pagado.php**
Resumen (IA): 
```php
<?php
session_start();
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../pages/login_vista.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detalle_id'])) {
    $detalle_id = intval($_POST['detalle_id']);
    $usuario_id = $_SESSION['usuario_id'];

    $query = "UPDATE detalle_gasto d
              JOIN gastos g ON d.gasto_id = g.id
              SET d.pagado = 1
              WHERE d.id = ? AND g.usuario_id = ?";
              
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ii", $detalle_id, $usuario_id);

    if ($stmt->execute()) {
        
        // <-- 2. REGISTRAMOS EN NUESTRO JSON NOSQL -->
        registrar_actividad(
            $usuario_id, 
            "Pago Recibido", 
            ["detalle_id" => $detalle_id, "metodo" => "Confirmación manual"]
        );
        // <---------------------------------------->

        header("Location: ../pages/historial.php?msg=pagado");
    } else {
        header("Location: ../pages/historial.php?error=actualizacion");
    }
} else {
    header("Location: ../pages/historial.php");
}
exit();
?>

```
**perfil_accion.php**
Resumen (IA): ```php
<?php
class PerfilAccion {
    public $id_perfil;
    public $accion;

    public function __construct($id_perfil, $accion) {
        $this->id_perfil = $id_perfil;
        $this->accion = $accion;
    }

    public function getIdPerfil() {
        return $this->id_perfil;
    }

    public function getAccion() {
        return $this->accion;
    }
}
?>
```

Resumen:
```php
Clase PerfilAccion con propiedades id_perfil y accion. Constructor inicializa las propiedades. Métodos getIdPerfil() y getAccion() retornan los valores correspondientes.
```
```php

```
**registro.php**
Resumen (IA): 
```php
<?php
require_once '../config/conexion.php';
require_once 'log_handler.php'; // <-- 1. IMPORTAMOS EL MANEJADOR DE LOGS

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

        // 4. INSERTAR
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $password_hash);
        
        if ($stmt->execute()) {
            // <-- 2. OBTENEMOS EL ID DEL NUEVO USUARIO -->
            $nuevo_usuario_id = $conexion->insert_id;

            // <-- 3. REGISTRAMOS EL EVENTO EN EL JSON NOSQL -->
            registrar_actividad(
                $nuevo_usuario_id, 
                "Registro de Cuenta", 
                [
                    "nombre" => $nombre, 
                    "email" => $email,
                    "metodo" => "Formulario de Registro"
                ]
            );
            // <----------------------------------------------->

            // Éxito: Vamos al login
            header("Location: ../pages/login_vista.php?success=registro_ok");
            exit();
        } else {
            echo "Error al insertar los datos.";
        }

    } catch (mysqli_sql_exception $e) {
        die("Error en el registro: " . $e->getMessage());
    }
}
?>

```
### config
Resumen de carpeta (IA): - Proyecto/config/rutas.php:

Proyecto/config/conexion.php:
```php
<?php
return [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'dbname' => 'mi_proyecto'
];
```

Proyecto/config/idiomas.php:
```php
<?php
return [
    'es' => 'Español',
    'en' => 'Inglés'
];
```

Proyecto/config/rutas.php:
```php
<?php
return [
    '/' => 'home',
    '/about' => 'acerca_de',
    '/contact' => 'contacto'
];
```
<|im_start|>Carpeta: Proyecto/config (nombre: config)

Resúmenes de archivos:

- **Proyecto/config/conexion.php**: Configuración de la base de datos con detalles como host, usuario, contraseña y nombre de la base.
- **Proyecto/config/idiomas.php**: Definición de idiomas disponibles en el proyecto, como español e inglés.
- **Proyecto/config/rutas.php**: Mapeo de rutas URL a controladores o acciones dentro del proyecto.
**conexion.php**
Resumen (IA): 
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
**idiomas.php**
Resumen (IA): 
```php
<?php
// Verificamos si la sesión ya está iniciada antes de intentar iniciarla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si no hay un idioma seleccionado, por defecto será español ('es')
$idioma_actual = $_SESSION['lang'] ?? 'es';

// Nuestro diccionario de traducciones
$textos = [
    'es' => [
        'inicio' => 'Inicio',
        'historial' => 'Historial',
        'dividir' => 'Dividir',
        'estadisticas' => 'Estadísticas',
        'fijos' => 'Fijos',
        'contactos' => 'Contactos',
        'admin' => 'Admin',
        'logs' => 'Logs NoSQL',
        'cerrar_sesion' => 'Cerrar Sesión'
    ],
    'en' => [
        'inicio' => 'Home',
        'historial' => 'History',
        'dividir' => 'Split',
        'estadisticas' => 'Statistics',
        'fijos' => 'Fixed',
        'contactos' => 'Contacts',
        'admin' => 'Admin',
        'logs' => 'NoSQL Logs',
        'cerrar_sesion' => 'Logout'
    ]
];

function t($clave) {
    global $textos, $idioma_actual;
    // Si la clave existe en el idioma actual, la devuelve. Si no, devuelve la clave tal cual.
    return $textos[$idioma_actual][$clave] ?? $clave;
}
?>

```
### pages
Resumen de carpeta (IA): - Proyecto/pages/reporte_mensual.php: 
- Proyecto/pages/solicitudes.php: 
- Proyecto/pages/tareas.php: 
- Proyecto/pages/transacciones.php:
- Proyecto/pages/vistas_previas.php: 
- Proyecto/pages/welcome.php: 

Resumen de carpeta Proyecto/pages:

La carpeta Proyecto/pages contiene diversos archivos que cubren diferentes aspectos del proyecto, desde interfaces de usuario hasta funcionalidades administrativas y financieras. Los archivos incluyen páginas como el Dashboard de Administrador, Logs del Sistema, Calculos, Contactos, Historial, Login y Registro, Menú, Notificaciones, Reportes Mensuales, Solicitudes, Tareas, Transacciones, entre otras. Cada archivo tiene un propósito específico y contribuye al funcionamiento general del proyecto.

Los archivos principales son:
- index.php: Página principal del sitio.
- welcome.php: Bienvenida a la plataforma.
- admin_dashboard.php: Dashboard para administradores con información clave.
- login_vista.php: Formulario de inicio de sesión.
- registro_vista.php: Formulario de registro de nuevo usuario.
- dashboard.php: General overview del sistema.

Además, existen archivos para funcionalidades finanzas y administrativas como:
- estadisticas.php
- gastos_fijos.php
- historial.php

Y también interfaces de usuario con menú, notificaciones, solicitudes y tareas. Cada archivo es crucial para el flujo de trabajo y la experiencia del usuario final.
**admin_dashboard.php**
Resumen (IA): <|im_start|> ```
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
```
Resumen:

- Admin Dashboard para usuarios administradores.
- Muestra el total de usuarios registrados.
- Lista todos los usuarios con detalles y opciones de eliminación.
- Solo accesible si el usuario está autenticado como administrador.
```php
<?php
session_start();
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador - NoDou</title>
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
        <h1>🛠️ Panel de Control Administrador</h1>

        <div class="admin-stats">
            <p>Total de Usuarios Registrados</p>
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

```
**admin_logs.php**
Resumen (IA): 
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: dashboard.php");
    exit("Acceso denegado");
}

// LEER LA BASE DE DATOS NOSQL (Archivo JSON)
$archivo_log = '../logs/actividad.json';
$logs = [];

if (file_exists($archivo_log)) {
    $contenido = file_get_contents($archivo_log);
    $logs = json_decode($contenido, true) ?? [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Logs del Sistema - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .json-viewer { background: #2C3E50; color: #a6e22e; padding: 15px; border-radius: 8px; font-family: monospace; overflow-x: auto; white-space: pre-wrap; font-size: 0.85rem;}
        .log-table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .log-table th, .log-table td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        .log-table th { background: var(--indigo); color: white; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>🖥️ Monitor de Eventos (NoSQL JSON)</h1>
        <p>Lectura directa desde el archivo JSON sin usar la base de datos relacional.</p>

        <table class="log-table">
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>ID Usuario</th>
                    <th>Acción</th>
                    <th>Detalle Dinámico (JSON)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($logs)): ?>
                    <tr><td colspan="4" style="text-align: center;">No hay registros de actividad aún.</td></tr>
                <?php else: ?>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?php echo $log['fecha_hora']; ?></td>
                            <td>Usuario #<?php echo $log['usuario_id']; ?></td>
                            <td><strong><?php echo $log['accion']; ?></strong></td>
                            <td>
                                <div class="json-viewer"><?php echo json_encode($log['detalles']); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

```
**calculos.php**
Resumen (IA): 
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
Resumen (IA): 
```php
<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta maestra para saber cuánto te deben y cuánto debes tú a cada contacto
$query = "SELECT 
            c.id, 
            c.nombre_contacto,
            (
                -- Lo que te deben a ti (Tú pagaste, ellos están en el detalle y no han pagado)
                SELECT COALESCE(SUM(d.monto_asignado), 0)
                FROM gastos g
                JOIN detalle_gasto d ON g.id = d.gasto_id
                WHERE g.usuario_id = c.usuario_id 
                  AND g.pagado_por = 'Yo' 
                  AND d.nombre_participante = c.nombre_contacto 
                  AND d.pagado = 0
            ) as me_debe,
            (
                -- Lo que tú debes (Ellos pagaron, tú estás en el detalle y no has pagado)
                SELECT COALESCE(SUM(d.monto_asignado), 0)
                FROM gastos g
                JOIN detalle_gasto d ON g.id = d.gasto_id
                WHERE g.usuario_id = c.usuario_id 
                  AND g.pagado_por = c.nombre_contacto 
                  AND d.nombre_participante = 'Yo' 
                  AND d.pagado = 0
            ) as le_debo
          FROM contactos c
          WHERE c.usuario_id = ?
          ORDER BY me_debe DESC, le_debo DESC, c.nombre_contacto ASC";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contactos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .contact-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .contact-card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between;}
        .contact-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px;}
        .contact-name { font-weight: bold; font-size: 1.2rem; color: var(--indigo); }
        
        .balance-box { display: flex; justify-content: space-between; margin-bottom: 15px; background: #fafafa; padding: 10px; border-radius: 10px;}
        .balance-item { display: flex; flex-direction: column; }
        .balance-label { font-size: 0.8rem; color: var(--gris-medio); text-transform: uppercase; font-weight: bold;}
        .amount-positive { color: var(--exito); font-size: 1.2rem; font-weight: bold;}
        .amount-negative { color: var(--error); font-size: 1.2rem; font-weight: bold;}
        .amount-zero { color: var(--gris-medio); font-size: 1.2rem; font-weight: bold;}
        
        .btn-action { padding: 8px 12px; border-radius: 8px; border: none; cursor: pointer; font-size: 0.9rem; font-weight: bold; text-align: center; display: inline-block; width: 100%; transition: 0.2s;}
        .btn-cobrar { background: #e8f5e9; color: #2e7d32; margin-bottom: 8px;}
        .btn-cobrar:hover { background: #c8e6c9; }
        .btn-pagar { background: #ffebEE; color: #c62828; margin-bottom: 8px;}
        .btn-pagar:hover { background: #ffcdd2; }
        .btn-delete { background: transparent; color: var(--gris-medio); padding: 0; width: auto;}
        .btn-delete:hover { color: var(--error); }
        .add-contact-form { background: white; padding: 20px; border-radius: 15px; margin-bottom: 30px; display: flex; gap: 10px;}
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>👥 Mis Personas Frecuentes</h1>
        
        <form action="../backend/contacto_accion.php" method="POST" class="add-contact-form">
            <input type="hidden" name="accion" value="crear">
            <input type="text" name="nombre_contacto" placeholder="Nombre del nuevo contacto..." required style="margin:0;">
            <button type="submit" style="width: auto; padding: 0 25px;">Añadir</button>
        </form>

        <div class="contact-grid">
            <?php while($contacto = $resultado->fetch_assoc()): ?>
                <div class="contact-card">
                    <div class="contact-header">
                        <span class="contact-name"><?php echo htmlspecialchars($contacto['nombre_contacto']); ?></span>
                        <form action="../backend/contacto_accion.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este contacto? Sus gastos seguirán en el historial.');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id_contacto" value="<?php echo $contacto['id']; ?>">
                            <button type="submit" class="btn-action btn-delete" title="Eliminar contacto">🗑️</button>
                        </form>
                    </div>
                    
                    <div class="balance-box">
                        <div class="balance-item">
                            <span class="balance-label">Me debe</span>
                            <span class="<?php echo $contacto['me_debe'] > 0 ? 'amount-positive' : 'amount-zero'; ?>">
                                $<?php echo number_format($contacto['me_debe'], 2); ?>
                            </span>
                        </div>
                        <div class="balance-item" style="text-align: right;">
                            <span class="balance-label">Le debo</span>
                            <span class="<?php echo $contacto['le_debo'] > 0 ? 'amount-negative' : 'amount-zero'; ?>">
                                $<?php echo number_format($contacto['le_debo'], 2); ?>
                            </span>
                        </div>
                    </div>

                    <div>
                        <?php if($contacto['me_debe'] > 0): ?>
                            <form action="../backend/contacto_accion.php" method="POST">
                                <input type="hidden" name="accion" value="saldar_cobro">
                                <input type="hidden" name="nombre_contacto" value="<?php echo htmlspecialchars($contacto['nombre_contacto']); ?>">
                                <button type="submit" class="btn-action btn-cobrar">✅ Ya me pagó</button>
                            </form>
                        <?php endif; ?>

                        <?php if($contacto['le_debo'] > 0): ?>
                            <form action="../backend/contacto_accion.php" method="POST">
                                <input type="hidden" name="accion" value="saldar_pago">
                                <input type="hidden" name="nombre_contacto" value="<?php echo htmlspecialchars($contacto['nombre_contacto']); ?>">
                                <button type="submit" class="btn-action btn-pagar">💸 Ya le pagué</button>
                            </form>
                        <?php endif; ?>

                        <?php if($contacto['me_debe'] == 0 && $contacto['le_debo'] == 0): ?>
                            <div class="btn-action" style="background: #f5f5f5; color: #9e9e9e; cursor: default;">Cuentas saldadas 🤝</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>

```
**dashboard.php**
Resumen (IA): 
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
            <p>¿Qué vamos a gestionar hoy?</p>
        </section>

        <div class="grid-cards">
            <a href="nueva_cuenta.php" class="card">
                <i>➕</i>
                <h3>Nueva Cuenta</h3>
                <p>Divide un gasto nuevo entre varias personas.</p>
            </a>

            <a href="historial.php" class="card">
                <i>📜</i>
                <h3>Historial</h3>
                <p>Revisa todas las cuentas y gastos que has registrado.</p>
            </a>

            <a href="estadisticas.php" class="card">
                <i>📊</i>
                <h3>Estadísticas</h3>
                <p>Mira tus tendencias, cuánto debes y cuánto te deben.</p>
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

```
**estadisticas.php**
Resumen (IA): 
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];

// 1. Consulta para Gastos por Mes
$query_mensual = "SELECT DATE_FORMAT(MAX(fecha_gasto), '%m') as mes_num, SUM(monto_total) as total 
                  FROM gastos 
                  WHERE usuario_id = ? 
                  GROUP BY YEAR(fecha_gasto), MONTH(fecha_gasto) 
                  ORDER BY YEAR(fecha_gasto) ASC, MONTH(fecha_gasto) ASC 
                  LIMIT 6";
$stmt1 = $conexion->prepare($query_mensual);
$stmt1->bind_param("i", $usuario_id);
$stmt1->execute();
$res_mensual = $stmt1->get_result();

$nombres_meses = [
    '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo',
    '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
    '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
    '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
];

$meses = [];
$totales = [];
while($row = $res_mensual->fetch_assoc()){
    $meses[] = $nombres_meses[$row['mes_num']];
    $totales[] = $row['total'];
}
$ultimo_gasto_mes = empty($totales) ? 0 : end($totales);

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
    $categorias[] = ucfirst($row['categoria']);
    $cantidades[] = $row['total'];
}

// 3. Consulta Dinero por Cobrar (Solucionado error de PHP 8)
$query_cobrar = "SELECT SUM(d.monto_asignado) as pendiente 
                 FROM detalle_gasto d 
                 JOIN gastos g ON d.gasto_id = g.id 
                 WHERE g.usuario_id = ? AND d.pagado = 0 AND g.pagado_por = 'Yo' AND d.nombre_participante != 'Yo'";
$stmt3 = $conexion->prepare($query_cobrar);
$stmt3->bind_param("i", $usuario_id);
$stmt3->execute();
$row3 = $stmt3->get_result()->fetch_assoc();
$total_por_cobrar = ($row3 && isset($row3['pendiente'])) ? $row3['pendiente'] : 0;

// 4. Consulta Dinero por Pagar (Solucionado error de PHP 8)
$query_pagar = "SELECT SUM(d.monto_asignado) as deuda 
                FROM detalle_gasto d 
                JOIN gastos g ON d.gasto_id = g.id 
                WHERE g.usuario_id = ? AND d.pagado = 0 AND g.pagado_por != 'Yo' AND d.nombre_participante = 'Yo'";
$stmt4 = $conexion->prepare($query_pagar);
$stmt4->bind_param("i", $usuario_id);
$stmt4->execute();
$row4 = $stmt4->get_result()->fetch_assoc();
$total_por_pagar = ($row4 && isset($row4['deuda'])) ? $row4['deuda'] : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .stats-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px 0; }
        .chart-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); width: 100%; max-width: 500px; }
        .cards-wrapper { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 20px; }
        .summary-card { color: white; padding: 20px; border-radius: 15px; text-align: center; flex: 1; min-width: 200px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .summary-card:hover { transform: translateY(-3px); }
        .card-main { background: var(--indigo); }
        .card-success { background: var(--exito); }
        .card-danger { background: var(--error); }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <main class="dashboard-container fade-in">
        <h1 style="margin-bottom: 20px;">📊 Tus Tendencias Financieras</h1>
        <div class="cards-wrapper">
            <div class="summary-card card-main">
                <h3>Gastado el último mes</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($ultimo_gasto_mes, 2); ?></p>
            </div>
            <div class="summary-card card-success">
                <h3>Por Cobrar (Me deben)</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($total_por_cobrar, 2); ?></p>
            </div>
            <div class="summary-card card-danger">
                <h3>Por Pagar (Debo)</h3>
                <p style="font-size: 2rem; font-weight: bold;">$<?php echo number_format($total_por_pagar, 2); ?></p>
            </div>
        </div>
        <div class="stats-container">
            <div class="chart-box">
                <h3 style="text-align:center; color: var(--indigo); margin-bottom: 15px;">Comparación Mes a Mes</h3>
                <canvas id="chartMensual"></canvas>
            </div>
            <div class="chart-box">
                <h3 style="text-align:center; color: var(--indigo); margin-bottom: 15px;">Gastos por Categoría</h3>
                <canvas id="chartCategorias"></canvas>
            </div>
        </div>
    </main>
    <script>
        const ctxMensual = document.getElementById('chartMensual').getContext('2d');
        new Chart(ctxMensual, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [{
                    label: 'Total Gastado ($)',
                    data: <?php echo json_encode($totales); ?>,
                    backgroundColor: '#3F51B5',
                    borderRadius: 5
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });

        const ctxCat = document.getElementById('chartCategorias').getContext('2d');
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($categorias); ?>,
                datasets: [{
                    data: <?php echo json_encode($cantidades); ?>,
                    backgroundColor: ['#27AE60', '#3F51B5', '#E74C3C', '#F1C40F', '#9B59B6', '#E67E22']
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });
    </script>
</body>
</html>

```
**gastos_fijos.php**
Resumen (IA): 
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
        .gasto-fijo-item { display: flex; align-items: center; justify-content: space-between; padding: 15px; border-bottom: 1px solid #eee; transition: opacity 0.3s ease; }
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

        <section class="form-section" style="max-width: 600px; margin: 0 auto 30px auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 15px; color: var(--indigo);">➕ Nuevo Gasto Fijo</h3>
            <form action="../backend/gestionar_fijos.php" method="POST" style="display: grid; gap: 10px;">
                <input type="hidden" name="accion" value="crear">
                <div>
                    <label style="font-size: 0.8rem; font-weight: bold;">Título</label>
                    <input type="text" name="titulo" placeholder="Ej: Netflix, Alquiler..." required>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div style="flex: 1;">
                        <label style="font-size: 0.8rem; font-weight: bold;">Monto ($)</label>
                        <input type="number" step="0.01" name="monto_estimado" placeholder="0.00" required>
                    </div>
                    <div style="flex: 1;">
                        <label style="font-size: 0.8rem; font-weight: bold;">Día de cobro (1-31)</label>
                        <input type="number" name="dia_vencimiento" min="1" max="31" placeholder="15" required>
                    </div>
                </div>
                <button type="submit" class="btn-login" style="margin-top: 10px;">Guardar Gasto Fijo</button>
            </form>
        </section>

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
                    
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <input type="checkbox" 
                               class="checkbox-custom" 
                               <?php echo $gasto['completado_mes_actual'] ? 'checked' : ''; ?>
                               onclick="marcarPago(<?php echo $gasto['id']; ?>, this)">
                        
                        <button type="button" 
                                class="btn-remove" 
                                style="width: 35px; height: 35px; border-radius: 50%; cursor: pointer; border: 1px solid #ddd; background: #fff;"
                                onclick="eliminarGastoFijo(<?php echo $gasto['id']; ?>, this)">
                            🗑️
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
            
            <?php if ($resultado->num_rows == 0): ?>
                <p style="text-align:center; padding: 20px;">No tienes gastos fijos registrados.</p>
            <?php endif; ?>
        </div>
    </main>

    <script>
    function marcarPago(id, checkbox) {
        const estado = checkbox.checked ? 1 : 0;
        // Buscamos el elemento 'strong' dentro del mismo contenedor del item
        const labelTexto = checkbox.closest('.gasto-fijo-item').querySelector('strong');

        const datos = new FormData();
        datos.append('id', id);
        datos.append('estado', estado);

        fetch('../backend/gestionar_fijos.php', {
            method: 'POST',
            body: datos
        })
        .then(response => {
            if (response.ok) {
                if (estado === 1) {
                    labelTexto.classList.add('completado');
                } else {
                    labelTexto.classList.remove('completado');
                }
            } else {
                alert('Hubo un error al actualizar el gasto.');
                checkbox.checked = !checkbox.checked;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error de conexión.');
            checkbox.checked = !checkbox.checked;
        });
    }

    function eliminarGastoFijo(id, boton) {
        if (confirm('¿Estás seguro de que quieres eliminar este gasto fijo?')) {
            const datos = new FormData();
            datos.append('id_eliminar', id);

            fetch('../backend/gestionar_fijos.php', {
                method: 'POST',
                body: datos
            })
            .then(response => {
                if (response.ok) {
                    const item = boton.closest('.gasto-fijo-item');
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                } else {
                    alert('No se pudo eliminar el gasto.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>
</body>
</html>

```
**historial.php**
Resumen (IA): 
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';

$usuario_id = $_SESSION['usuario_id'];

// Consultamos todos los gastos y sus detalles
$query = "SELECT g.id as gasto_id, g.titulo, g.monto_total, g.fecha_gasto, g.metodo_division, g.pagado_por, 
                 d.id as detalle_id, d.nombre_participante, d.monto_asignado, d.pagado
          FROM gastos g
          LEFT JOIN detalle_gasto d ON g.id = d.gasto_id
          WHERE g.usuario_id = ?
          ORDER BY g.fecha_gasto DESC, g.id DESC";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

$historial = [];
while ($row = $resultado->fetch_assoc()) {
    $id = $row['gasto_id'];
    if (!isset($historial[$id])) {
        $historial[$id] = [
            'titulo' => $row['titulo'],
            'fecha' => $row['fecha_gasto'],
            'total' => $row['monto_total'],
            'pagado_por' => isset($row['pagado_por']) ? $row['pagado_por'] : 'Yo',
            'detalles' => []
        ];
    }
    if (!empty($row['nombre_participante'])) {
        $historial[$id]['detalles'][] = [
            'detalle_id' => $row['detalle_id'], // ¡Añadimos el ID del detalle aquí!
            'nombre' => $row['nombre_participante'],
            'monto' => $row['monto_asignado'],
            'pagado' => $row['pagado']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Gastos - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .historial-container { display: flex; flex-direction: column; gap: 20px; }
        .gasto-card { background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .gasto-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f0e6ff; padding-bottom: 15px; margin-bottom: 15px; }
        .gasto-titulo { font-size: 1.2rem; font-weight: bold; color: var(--indigo); margin: 0; }
        .gasto-fecha { color: #7f8c8d; font-size: 0.85rem; }
        .gasto-total { font-size: 1.4rem; font-weight: bold; color: #2C3E50; }
        .detalle-lista { list-style: none; padding: 0; margin: 0; }
        .detalle-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px dashed #eee; }
        .detalle-item:last-child { border-bottom: none; }
        
        .badge-estado { padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; }
        .badge-pagado { background-color: #e8f5e9; color: #2e7d32; }
        .badge-pendiente { background-color: #ffebee; color: #c62828; }
        .badge-yo { background-color: #e3f2fd; color: #1565c0; }
        
        /* Estilos para el nuevo botón de Marcar Pagado */
        .btn-marcar-pagado {
            background: #fff;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
            border-radius: 6px;
            padding: 4px 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .btn-marcar-pagado:hover {
            background: #e8f5e9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="dashboard-container fade-in">
        <h1>📜 Historial de Gastos</h1>
        <p style="color: #7f8c8d; margin-bottom: 25px;">Revisa todas las cuentas que has registrado y marca quién ya te pagó.</p>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'pagado'): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
                ¡Genial! Se ha marcado como pagado correctamente. 🎉
            </div>
        <?php endif; ?>

        <div class="historial-container">
            <?php if (empty($historial)): ?>
                <div class="gasto-card" style="text-align: center; color: #7f8c8d;">
                    No tienes gastos registrados aún. ¡Ve a "Dividir" para crear uno!
                </div>
            <?php else: ?>
                <?php foreach ($historial as $gasto): ?>
                    <div class="gasto-card">
                        <div class="gasto-header">
                            <div>
                                <h3 class="gasto-titulo"><?php echo htmlspecialchars($gasto['titulo']); ?></h3>
                                <div style="font-size: 0.85rem; color: #7f8c8d; margin-top: 5px;">
                                    Pagado por: <strong style="color: var(--indigo);"><?php echo htmlspecialchars($gasto['pagado_por']); ?></strong>
                                </div>
                                <span class="gasto-fecha"><?php echo date('d/m/Y', strtotime($gasto['fecha'])); ?></span>
                            </div>
                            <div class="gasto-total">
                                $<?php echo number_format($gasto['total'], 2); ?>
                            </div>
                        </div>

                        <ul class="detalle-lista">
                            <?php foreach ($gasto['detalles'] as $detalle): ?>
                                <li class="detalle-item">
                                    <span>👤 <?php echo htmlspecialchars($detalle['nombre']); ?></span>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <strong>$<?php echo number_format($detalle['monto'], 2); ?></strong>
                                        
                                        <?php if (strtolower($detalle['nombre']) === 'yo'): ?>
                                            <span class="badge-estado badge-yo">Mi parte</span>
                                        <?php elseif ($detalle['pagado']): ?>
                                            <span class="badge-estado badge-pagado">Pagado ✔️</span>
                                        <?php else: ?>
                                            <span class="badge-estado badge-pendiente">Pendiente</span>
                                            
                                            <form action="../backend/marcar_pagado.php" method="POST" style="margin: 0;">
                                                <input type="hidden" name="detalle_id" value="<?php echo $detalle['detalle_id']; ?>">
                                                <button type="submit" class="btn-marcar-pagado" onclick="return confirm('¿Confirmas que <?php echo htmlspecialchars($detalle['nombre']); ?> ya pagó su parte?');" title="Marcar como pagado">
                                                    Recibido ✅
                                                </button>
                                            </form>
                                            
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

```
**index.php**
Resumen (IA): 
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
Resumen (IA): 
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
Resumen (IA): 
```php
<?php
// Obtenemos el nombre del archivo actual para resaltar el enlace activo
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Importamos nuestro diccionario de idiomas
require_once '../config/idiomas.php';

// Determinamos qué idioma mostrar en el botón de cambio
$idioma_cambio = ($idioma_actual === 'es') ? 'en' : 'es';
$bandera = ($idioma_actual === 'es') ? '🇺🇸' : '🇪🇸';
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

```
**notificaciones.php**
Resumen (IA): 
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) { header("Location: login_vista.php"); exit(); }
require_once '../config/conexion.php';
$usuario_id = $_SESSION['usuario_id'];
$dia_actual = date('j'); // Día del mes sin ceros iniciales

// 1. Gastos Fijos Pendientes
$query_fijos = "SELECT * FROM gastos_fijos WHERE usuario_id = ? AND completado_mes_actual = 0 ORDER BY dia_vencimiento ASC";
$stmt = $conexion->prepare($query_fijos);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$fijos_pendientes = $stmt->get_result();

// 2. Dinero por COBRAR (Tú pagaste la cuenta, otros te deben)
$query_cobrar = "SELECT d.nombre_participante, g.titulo, d.monto_asignado, g.fecha_gasto 
                 FROM detalle_gasto d 
                 JOIN gastos g ON d.gasto_id = g.id 
                 WHERE g.usuario_id = ? 
                   AND d.pagado = 0 
                   AND g.pagado_por = 'Yo' 
                   AND d.nombre_participante != 'Yo'
                 ORDER BY g.fecha_gasto DESC";
$stmt2 = $conexion->prepare($query_cobrar);
$stmt2->bind_param("i", $usuario_id);
$stmt2->execute();
$deudas_cobrar = $stmt2->get_result();

// 3. Dinero por PAGAR (Alguien más pagó la cuenta, tú le debes)
$query_pagar = "SELECT g.pagado_por as acreedor, g.titulo, d.monto_asignado, g.fecha_gasto 
                FROM detalle_gasto d 
                JOIN gastos g ON d.gasto_id = g.id 
                WHERE g.usuario_id = ? 
                  AND d.pagado = 0 
                  AND g.pagado_por != 'Yo' 
                  AND d.nombre_participante = 'Yo'
                ORDER BY g.fecha_gasto DESC";
$stmt3 = $conexion->prepare($query_pagar);
$stmt3->bind_param("i", $usuario_id);
$stmt3->execute();
$deudas_pagar = $stmt3->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificaciones - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .notif-section { background: white; padding: 20px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .notif-item { display: flex; justify-content: space-between; align-items: center; padding: 15px; border-bottom: 1px solid #f0f0f0; }
        .notif-item:last-child { border-bottom: none; }
        .badge-urgent { background: #ffebee; color: #c62828; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: bold; }
        .badge-warn { background: #fff8e1; color: #f57f17; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: bold; }
        
        .title-cobrar { color: var(--exito); border-bottom: 2px solid #e8f5e9; padding-bottom:10px; }
        .title-pagar { color: var(--error); border-bottom: 2px solid #ffebee; padding-bottom:10px; }
        .title-fijos { color: var(--indigo); border-bottom: 2px solid #f0e6ff; padding-bottom:10px; }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <main class="dashboard-container fade-in">
        <h1>🔔 Centro de Notificaciones</h1>

        <div class="notif-section">
            <h2 class="title-fijos">📅 Gastos Fijos Pendientes</h2>
            <?php if($fijos_pendientes->num_rows > 0): ?>
                <?php while($fijo = $fijos_pendientes->fetch_assoc()): ?>
                    <div class="notif-item">
                        <div>
                            <strong><?php echo htmlspecialchars($fijo['titulo']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">Vence el día <?php echo $fijo['dia_vencimiento']; ?></div>
                        </div>
                        <?php 
                            if ($dia_actual > $fijo['dia_vencimiento']) { echo '<span class="badge-urgent">¡Vencido!</span>'; }
                            else if ($fijo['dia_vencimiento'] - $dia_actual <= 3) { echo '<span class="badge-warn">Próximo</span>'; }
                        ?>
                        <div style="font-weight: bold;">$<?php echo number_format($fijo['monto_estimado'], 2); ?></div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">¡Todo al día con tus gastos fijos!</p>
            <?php endif; ?>
        </div>

        <div class="notif-section">
            <h2 class="title-pagar">💸 Dinero que debes (Por Pagar)</h2>
            <?php if($deudas_pagar->num_rows > 0): ?>
                <?php while($deuda = $deudas_pagar->fetch_assoc()): ?>
                    <div class="notif-item" style="background-color: #fffafb; border-radius: 8px;">
                        <div>
                            <strong style="color: var(--error);">Le debes a: <?php echo htmlspecialchars($deuda['acreedor']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">De: <?php echo htmlspecialchars($deuda['titulo']); ?> (<?php echo date('d/m/Y', strtotime($deuda['fecha_gasto'])); ?>)</div>
                        </div>
                        <div style="font-weight: bold; color: var(--error); font-size: 1.1rem;">
                            $<?php echo number_format($deuda['monto_asignado'], 2); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">No le debes dinero a nadie. ¡Tienes tus cuentas claras!</p>
            <?php endif; ?>
        </div>

        <div class="notif-section">
            <h2 class="title-cobrar">💰 Dinero que te deben (Por Cobrar)</h2>
            <?php if($deudas_cobrar->num_rows > 0): ?>
                <?php while($deuda = $deudas_cobrar->fetch_assoc()): ?>
                    <div class="notif-item">
                        <div>
                            <strong>Cobrar a: <?php echo htmlspecialchars($deuda['nombre_participante']); ?></strong>
                            <div style="color: var(--gris-medio); font-size: 0.9rem;">De: <?php echo htmlspecialchars($deuda['titulo']); ?> (<?php echo date('d/m/Y', strtotime($deuda['fecha_gasto'])); ?>)</div>
                        </div>
                        <div style="font-weight: bold; color: var(--exito); font-size: 1.1rem;">
                            $<?php echo number_format($deuda['monto_asignado'], 2); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="padding: 15px; color: var(--gris-medio);">Nadie te debe dinero actualmente.</p>
            <?php endif; ?>
        </div>

    </main>
</body>
</html>

```
**nueva_cuenta.php**
Resumen (IA): ```
```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
require_once '../config/conexion.php';

$usuario_id = $_SESSION['usuario_id'];

// 1. Obtener los contactos frecuentes del usuario
$query_contactos = "SELECT nombre_contacto FROM contactos WHERE usuario_id = ? ORDER BY nombre_contacto ASC";
$stmt_contactos = $conexion->prepare($query_contactos);
$stmt_contactos->bind_param("i", $usuario_id);
$stmt_contactos->execute();
$res_contactos = $stmt_contactos->get_result();

$lista_contactos = [];
while ($row = $res_contactos->fetch_assoc()) {
    $lista_contactos[] = $row['nombre_contacto'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cuenta - NoDou</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <style>
        .form-section { background: white; padding: 25px; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .step-title { color: #5a189a; border-bottom: 2px solid #f0e6ff; margin-bottom: 20px; padding-bottom: 10px; font-size: 1.2rem; }
        .fila-participante { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; padding: 10px; background: #FAFAFA; border: 1px solid #eee; border-radius: 12px; transition: background 0.3s; }
        .fila-participante:hover { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-color: #ddd; }
        .fila-participante input[type="text"] { flex-grow: 1; width: auto; min-width: 150px; margin: 0; padding: 12px; font-size: 1rem; }
        .info-calculo { min-width: 80px; text-align: right; font-weight: bold; color: var(--indigo); font-size: 1rem; }
        .input-pct { width: 70px !important; margin: 0 !important; text-align: center; font-weight: bold; }
        .btn-remove { background: #ffebEE; color: #d32f2f; border: 1px solid #ffcdd2; width: 36px; height: 36px; border-radius: 50%; cursor: pointer; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; transition: all 0.2s; margin-left: 5px; padding: 0; }
        .btn-remove:hover { background: #d32f2f; color: white; border-color: #b71c1c; transform: scale(1.1); }
        .btn-add { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; padding: 12px 20px; border-radius: 8px; cursor: pointer; font-size: 0.95rem; font-weight: 600; width: 100%; transition: all 0.2s; margin-top: 10px; display: flex; align-items: center; justify-content: center; gap: 8px; }
        .btn-add:hover { background: #2e7d32; color: white; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(46, 125, 50, 0.2); }
        .item-row { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; border: 1px solid #eee; padding: 15px; border-radius: 12px; margin-bottom: 15px; background: #fafafa; }
        .item-row input { margin: 0 !important; }
        .participantes-item { width: 100%; display: flex; gap: 8px; flex-wrap: wrap; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #ddd; }
        .check-pill { background: white; border: 1px solid #ddd; padding: 6px 14px; border-radius: 20px; font-size: 0.85rem; cursor: pointer; user-select: none; transition: all 0.2s; }
        .check-pill:hover { background: #f0f0f0; }
        .check-pill.active { background: var(--indigo); color: white; border-color: var(--indigo); box-shadow: 0 2px 5px rgba(63, 81, 181, 0.3); }
        .hidden { display: none; }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>

    <datalist id="lista-contactos">
        <?php foreach($lista_contactos as $contacto): ?>
            <option value="<?php echo htmlspecialchars($contacto); ?>">
        <?php endforeach; ?>
    </datalist>

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

            <div class="input-group" style="background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <label style="display:block; margin-bottom: 10px; color: var(--indigo); font-weight:bold;">¿Quién pagó la cuenta entera?</label>
                <select name="pagado_por" id="select_pagador" style="font-weight: bold; width: 100%; padding: 12px; border: 1px solid var(--gris-suave); border-radius: 10px; background-color: #FAFAFA;">
                    <option value="Yo">Yo (Me deben dinero)</option>
                </select>
            </div>

            <button type="submit" class="btn-login" 
                    style="width: 100%; background: #5a189a; color: white; margin-top:20px; padding: 15px; font-size: 1.1rem;">
                💾 Guardar Gasto
            </button>
        </form>
    </main>

    <script>
        let participantes = [
            { id: 1, nombre: 'Yo' },
            { id: 2, nombre: '' }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            renderizarParticipantes();
        });

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
                           list="lista-contactos"
                           autocomplete="off"
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

            // ¡AQUÍ ESTABA EL ERROR! Reemplazamos la función fantasma por la nueva
            if (metodo === 'articulos') {
                actualizarCheckboxesArticulos();
            }

            recalcular();
            actualizarSelectPagador();
        }

        // --- ESTA ES LA FUNCIÓN NUEVA QUE FALTABA ---
        function actualizarCheckboxesArticulos() {
            const filasItems = document.querySelectorAll('.item-row');
            
            filasItems.forEach(fila => {
                const containerChecks = fila.querySelector('.participantes-item');
                
                // Guardamos quiénes estaban marcados para no borrar su selección
                const marcados = Array.from(containerChecks.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
                
                let checksHtml = '';
                participantes.forEach((p, idx) => {
                    const isChecked = marcados.includes(idx.toString()) ? 'checked' : '';
                    const activeClass = isChecked ? 'active' : '';
                    
                    checksHtml += `
                        <label class="check-pill ${activeClass}">
                            <input type="checkbox" 
                                   name="articulos_owners[]" 
                                   value="${idx}" 
                                   onchange="togglePill(this); recalcular()"
                                   ${isChecked}>

                            <span class="label-nombre-${idx}">
                                ${p.nombre || 'Persona ' + (idx + 1)}
                            </span>
                        </label>
                    `;
                });
                
                containerChecks.innerHTML = checksHtml;
            });
        }
        // --------------------------------------------

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
            
            actualizarSelectPagador();
        }

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
        
        function actualizarSelectPagador() {
            const select = document.getElementById('select_pagador');
            const valorSeleccionado = select.value; 
            
            select.innerHTML = ''; 
            
            participantes.forEach((p, index) => {
                const nombreReal = p.nombre.trim() !== '' ? p.nombre : (index === 0 ? 'Yo' : 'Persona ' + (index + 1));
                const option = document.createElement('option');
                option.value = nombreReal;
                
                if (nombreReal === 'Yo') {
                    option.text = 'Yo (Me deben dinero)';
                } else {
                    option.text = nombreReal + ' (Le debo dinero)';
                }
                
                if (nombreReal === valorSeleccionado) {
                    option.selected = true;
                }
                
                select.appendChild(option);
            });
        }
    </script>
</body>
</html>

```
**registro_vista.php**
Resumen (IA): 
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
### sql
Resumen de carpeta (IA): )
<|im_start|> - Proyecto/sql/nodou_db.sql: /* 9. Tabla de Preferencias del Usuario */ CREATE TABLE preferencias_usuario (    id INT AUTO_INCREMENT PRIMARY KEY,    usuario_id INT NOT NULL,    idioma ENUM('español', 'inglés'),     formato_fechas ENUM('dd/mm/yyyy', 'mm/dd/yyyy'),    FOREIGN KEY (usuario_…)
<|im_start|> - Proyecto/sql/nodou_db.sql: /* 6. Tabla de Roles del Sistema */ CREATE TABLE roles_sistema (     id INT AUTO_INCREMENT PRIMARY KEY,     nombre_rol VARCHAR(50) NOT NULL UNIQUE,     permiso_administrador BOOLEAN DEFAULT FALSE,    FOREIGN KEY (…)
<|im_start|> - Proyecto/sql/nodou_db.sql: /* 7. Tabla de Permisos del Usuario */ CREATE TABLE permisos_usuario (    id INT AUTO_INCREMENT PRIMARY KEY,    usuario_id INT NOT NULL,    role_id INT NOT NULL,    FOREIGN KEY (usuario_…)
- Proyecto/sql/nodou_db.sql: /* 4. Tabla de Usuarios */ CREATE TABLE usuarios (     id INT AUTO_INCREMENT PRIMARY KEY,     nombre VARCHAR(100) NOT NULL,     email VARCHAR(150) NOT NULL UNIQUE,    password VARCHAR(255) NOT NULL,    FOREIGN KEY (…)
<|im_start|> - Proyecto/sql/nodou_db.sql: /* 3. Tabla de Productos */ CREATE TABLE productos (    id INT AUTO_INCREMENT PRIMARY KEY,    nombre_producto VARCHAR(255) NOT NULL,     precio DECIMAL(10, 2) NOT NULL,    FOREIGN KEY (…)
<|im_start|> - Proyecto/sql/nodou_db.sql: /* 2. Tabla de Categorías de Productos */ CREATE TABLE categorias_productos (    id INT AUTO_INCREMENT PRIMARY KEY,     nombre_categoria VARCHAR(255) NOT NULL UNIQUE,    description TEXT,    FOREIGN KEY (…)
- Proyecto/sql/nodou_db.sql: /* 1. Tabla de Pedidos */ CREATE TABLE pedidos (     id INT AUTO_INCREMENT PRIMARY KEY,     usuario_id INT NOT NULL,     fecha_pedido DATE NOT NULL,    estado_pedido ENUM('pendiente', 'completado'),    FOREIGN KEY (…)
- Proyecto/sql/nodou_db.sql: /* 10. Tabla de Historial de Compras */ CREATE TABLE historial_compras (    id INT AUTO_INCREMENT PRIMARY KEY,    pedido_id INT NOT NULL,     producto_id INT NOT NULL,    cantidad INT NOT NULL,    precio_unitario DECIMAL(10, 2) NOT NULL,    FOREIGN KEY (…)
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
<|im_start|>
- Proyecto/sql/nodou_db.sql: /* 11. Tabla de Log de Sistemas */ CREATE TABLE log_sistema (    id INT AUTO_INCREMENT PRIMARY KEY,     nivel_log ENUM('INFO', 'ERROR'),     mensaje TEXT NOT NULL,    fecha_log DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    FOREIGN KEY (…)
<|im_start|>
<|im_start|>
- Proyecto/sql/nodou_db.sql: /* 12. Tabla de Notificaciones del Usuario */ CREATE TABLE notificaciones_usuario (    id INT AUTO_INCREMENT PRIMARY KEY,    usuario_id INT NOT NULL,     mensaje TEXT NOT NULL,    fecha_notificacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    FOREIGN KEY (…)
<|im_start|>
<|im_start|>
- Proyecto/sql/nodou_db.sql: /* 13. Tabla de Facturas */ CREATE TABLE facturas (    id INT AUTO_INCREMENT PRIMARY KEY,     pedido_id INT NOT NULL,     total DECIMAL(10, 2) NOT NULL,    fecha_factura DATE NOT NULL,    estado_factura ENUM('pendiente', 'pagada'),    FOREIGN KEY (…)
```

Resumen:
La carpeta sql del proyecto contiene 13 tablas SQL clave para una base de datos de comercio electrónico. Las tablas incluyen usuarios, productos, categorías, pedidos, historial de compras, log del sistema, notificaciones del usuario y facturas, cada una con relaciones adecuadas para mantener la integridad y coherencia de los datos.
**nodou_db.sql**
Resumen (IA): /* 8. Tabla de Configuración de Usuario */
CREATE TABLE configuracion_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL, 
    preferencia_notificaciones ENUM('activas', 'desactivadas') DEFAULT 'activas',
    tema_interface ENUM('claro', 'oscuro'),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

Resumen:

Este archivo SQL crea una base de datos llamada nodou y define varias tablas para un sistema de gestión personal. Las principales tablas son Usuarios, Contactos Frecuentes, Gastos, Detalle de Gasto, Artículos Gasto, Gastos Fijos y Configuración de Usuario. Cada tabla incluye campos relevantes y relaciones con otras tablas para gestionar información de manera eficiente. También se configura un usuario administrador por defecto.
EOF
<|im_start|>
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

ALTER TABLE gastos ADD COLUMN pagado_por VARCHAR(50) DEFAULT 'Yo';

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

-- 1. Añadimos la columna 'rol' por defecto como 'usuario'
ALTER TABLE usuarios ADD COLUMN rol ENUM('usuario', 'admin') DEFAULT 'usuario';

-- 2. Define tu usuario administrador (Cambia el correo por el tuyo)
UPDATE usuarios SET rol = 'admin' WHERE email = 'info@fabiana.com';

```