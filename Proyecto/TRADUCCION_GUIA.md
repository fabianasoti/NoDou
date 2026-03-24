# 🌐 Sistema de Traducción - NoDou

## Quick Start

### En cada archivo PHP que necesite traducción:

```php
<?php
session_start();
require_once '../config/traductor.php';
?>

<!-- En HTML: -->
<title><?php echo t('clave_traduccion'); ?> - NoDou</title>
<h1><?php echo t('titulo_pagina'); ?></h1>
<button><?php echo t('guardar_gasto'); ?></button>
```

## Funciones disponibles

### t($clave)
Traduce una clave al idioma actual
```php
echo t('iniciar_sesion');  // Devuelve "Iniciar Sesión" en ES o "Log In" en EN
```

### cambiar_idioma($idioma)
Cambia el idioma de la sesión
```php
cambiar_idioma('en');  // Cambia a inglés
cambiar_idioma('es');  // Cambia a español
```

### obtener_idioma_actual()
Obtiene el código del idioma actual
```php
$idioma = obtener_idioma_actual();  // Devuelve 'es' o 'en'
```

## Archivos de configuración

### config/idiomas.php
Contiene el array `$textos` con todas las traducciones.

Estructura:
```php
$textos = [
    'es' => [
        'iniciar_sesion' => 'Iniciar Sesión',
        'guardar_gasto' => 'Guardar Gasto',
        // ... más claves
    ],
    'en' => [
        'iniciar_sesion' => 'Log In',
        'guardar_gasto' => 'Save Expense',
        // ... más claves
    ]
];
```

### config/traductor.php
Importa `idiomas.php` y proporciona las funciones de traducción.

## Variables de sesión

`$_SESSION['idioma']` - Almacena el idioma actual (por defecto 'es')

## Cambiar idioma desde la UI

```html
<a href="../backend/cambiar_idioma.php?lang=en">🇺🇸 English</a>
<a href="../backend/cambiar_idioma.php?lang=es">🇪🇸 Español</a>
```

## Ejemplo completo de una página

```php
<?php
session_start();
require_once '../config/traductor.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_vista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="<?php echo obtener_idioma_actual(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo t('mi_pagina'); ?> - NoDou</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    
    <h1><?php echo t('bienvenido'); ?></h1>
    <button><?php echo t('guardar'); ?></button>
</body>
</html>
```

## Claves disponibles

Más de 140 claves traducidas. Algunos ejemplos:

- `iniciar_sesion` - Login
- `registrarse` - Sign Up
- `guardar_gasto` - Save Expense
- `historial` - History
- `contactos` - Contacts
- `estadisticas` - Statistics
- `error_credenciales` - Incorrect email or password
- `gasto_guardado` - Expense saved successfully

Ver `config/idiomas.php` para la lista completa.

## Notas importantes

1. El idioma se guarda en la sesión del usuario
2. Por defecto, la app detecta el idioma del navegador (ES/EN)
3. Si el idioma no está disponible, usa español
4. Agregar nuevas claves: editar `config/idiomas.php` en ambos idiomas
5. El selector de idioma está en el menú principal (botón flotante)

## Soporte de idiomas

✅ Español (ES)
✅ English (EN)

Para agregar más idiomas:
1. Agregar nueva entrada en `$textos` en `config/idiomas.php`
2. Traducir todas las claves
3. El sistema soporta cualquier código de idioma
