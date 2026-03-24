# NoDou 💸

**NoDou** es una aplicación web multiplataforma diseñada para facilitar la división y organización de gastos entre amigos, parejas o compañeros de trabajo. Permite llevar un registro claro de las cuentas, registrar transacciones y asignar pagos de manera sencilla y sin complicaciones.

> 🛠️ **Estado del proyecto:** En desarrollo activo.

---

## ✨ Características Principales

* **Gestión de Usuarios:** Roles diferenciados (Administrador y Usuario) para mantener el control de los grupos de gastos.
* **División Inteligente:** Permite dividir cuentas a partes iguales o asignar el costo de artículos específicos a personas concretas.
* **Historial Detallado:** Registro completo de todas las transacciones, quién pagó qué y quién debe a quién.
* **Panel de Estadísticas:** Visualización clara de los gastos totales y el balance de cada participante.
* **Interfaz Intuitiva:** Diseño *responsive* adaptable a dispositivos móviles y escritorio.

---

## 📸 Capturas de Pantalla

*(Aquí mostramos algunas vistas principales de la aplicación)*

| Panel Principal | División de Gastos |
| :---: | :---: |
| ![Home User](img_nodou/homeuser.png) | ![Dividir Gastos](img_nodou/dividir.png) |
| **Estadísticas** | **Historial** |
| ![Estadisticas](img_nodou/estadisticas.png) | ![Historial](img_nodou/historial.png) |

---

## 💻 Tecnologías Utilizadas

Este proyecto ha sido desarrollado aplicando conocimientos de **Desarrollo Web Full-Stack**:

* **Frontend:** HTML5, CSS3, JavaScript (Vanilla).
* **Backend:** PHP (Estructurado con controladores para la gestión de rutas y lógica de negocio).
* **Base de Datos:** MySQL (Diseño relacional para usuarios, grupos y transacciones).

---

## 🚀 Instalación y Despliegue Local

Si deseas probar el proyecto en tu entorno local, sigue estos pasos:

1.  **Clona este repositorio:**
    ```bash
    git clone [https://github.com/fabianasoti/nodou.git](https://github.com/fabianasoti/nodou.git)
    ```
2.  **Configura el servidor local:**
    Asegúrate de tener instalado un entorno como XAMPP, WAMP o LAMP. Mueve la carpeta del proyecto a tu directorio público (ej. `htdocs` en XAMPP).
3.  **Base de Datos:**
    * Abre phpMyAdmin (o tu gestor preferido de MySQL).
    * Crea una base de datos llamada `nodou_db` (o el nombre que uses).
    * Importa el archivo `.sql` que se encuentra en la carpeta `database/` (si lo tienes) para generar las tablas.
4.  **Configuración de Conexión:**
    Edita el archivo de conexión a la base de datos (`config.php`) con tus credenciales locales.
5.  **¡Listo!** Abre tu navegador y accede a `http://localhost/nodou`.

---

## 👩‍💻 Autora

**Fabiana Victoria Sotillo**
* Estudiante de Desarrollo de Aplicaciones Multiplataforma (DAM).
* [Mi Portafolio Web](https://fabianasoti.github.io/Portafolio/)
