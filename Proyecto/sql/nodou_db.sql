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
