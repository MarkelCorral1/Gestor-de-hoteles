DROP DATABASE IF EXISTS hoteles_schumacher;
CREATE DATABASE hoteles_schumacher;
USE hoteles_schumacher;

-- 1. Tabla Usuario
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    tipo ENUM('normal', 'admin') NOT NULL
);

-- 2. Tabla Hotel (Con la columna descripción integrada)
CREATE TABLE hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- 3. Tabla Categoría
CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('stroll', 'lando', 'alonso', 'senna', 'schumacher') NOT NULL,
    balcon BOOLEAN, 
    yakushi BOOLEAN,
    spa BOOLEAN,
    mayordomo BOOLEAN,
    limusina BOOLEAN,
    helicoptero BOOLEAN,
	metros_cuadrados INT NOT NULL,
    camas INT NOT NULL,
    precio_base DECIMAL(10,2) NOT NULL
);

-- 4. Tabla Habitación
CREATE TABLE habitacion (
    id_habitacion INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)  ON DELETE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

-- 5. Tabla Reserva
CREATE TABLE reserva (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_habitacion INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_final DATE NOT NULL,
    numero_personas INT NOT NULL,
    precio_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_habitacion) REFERENCES habitacion(id_habitacion) ON DELETE CASCADE,
    CHECK (fecha_final > fecha_inicio)
);

CREATE TABLE contacto (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    mensaje TEXT NOT NULL,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- INSERTAR DATOS

-- Categorías
INSERT INTO categoria (nombre, balcon, yakushi, spa, mayordomo, limusina, helicoptero, metros_cuadrados, camas, precio_base) VALUES
('stroll', FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, 30, 2, 500.00),
('lando', TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, 30, 2, 900.00),
('alonso', TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, 35, 3, 1500.00),
('senna', TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, 45, 3, 2500.00),
('schumacher', TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, 50, 4, 4500.00);

-- Hoteles (Con descripciones integradas y orden corregido)
INSERT INTO hotel (ciudad, pais, descripcion) VALUES 
('Madrid', 'España', 'Ubicado cerca del Parque del Retiro, ideal para paseos matutinos y visitas al Museo del Prado.'),
('Barcelona', 'España', 'A pocos pasos de la Sagrada Familia y con fácil acceso a las playas de la Barceloneta.'),
('París', 'Francia', 'Situado en el corazón de la ciudad, perfecto para caminar hacia la Torre Eiffel y disfrutar de cafés parisinos.'),
('Londres', 'Reino Unido', 'Cercano al British Museum y a las zonas comerciales de Oxford Street para un día de compras.'),
('Roma', 'Italia', 'Estratégicamente ubicado cerca del Coliseo y el Foro Romano, rodeado de auténticas trattorias.'),
('Ámsterdam', 'Países Bajos', 'Rodeado de los famosos canales, ideal para alquilar una bicicleta y visitar el Museo Van Gogh.'),
('Berlín', 'Alemania', 'Próximo a la Puerta de Brandeburgo y a la Isla de los Museos, en una zona llena de historia.'),
('Lisboa', 'Portugal', 'Ubicado en las colinas históricas, cerca del tranvía 28 y con vistas al Castillo de San Jorge.'),
('Bruselas', 'Bélgica', 'A minutos de la Grand Place, rodeado de las mejores chocolaterías y cervecerías artesanales.'),
('Viena', 'Austria', 'Cerca de la Ópera Estatal y el Palacio de Hofburg, perfecto para disfrutar de la cultura clásica.'),
('Praga', 'República Checa', 'A un corto paseo del Puente de Carlos y el Reloj Astronómico, en pleno casco antiguo.'),
('Zurich', 'Suiza', 'Situado junto al lago de Zúrich, ideal para paseos en barco y compras en la exclusiva Bahnhofstrasse.'),
('Estocolmo', 'Suecia', 'En el corazón de Gamla Stan, cerca del Palacio Real y el Museo Nobel.'),
('Copenhague', 'Dinamarca', 'Cerca de los Jardines de Tivoli y el puerto de Nyhavn, perfecto para disfrutar del ambiente hygge.');

-- Habitaciones
INSERT INTO habitacion (id_hotel, id_categoria) VALUES
-- Madrid (ID 1)
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5),
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5),

-- Barcelona (ID 2)
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5),
(2, 1), (2, 2), (2, 3), (2, 4), (2, 5),

-- París (ID 3)
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5),
(3, 1), (3, 2), (3, 3), (3, 4), (3, 5),

-- Londres (ID 4)
(4, 1), (4, 2), (4, 3), (4, 4), (4, 5),
(4, 1), (4, 2), (4, 3), (4, 4), (4, 5),

-- Roma (ID 5)
(5, 1), (5, 2), (5, 3), (5, 4), (5, 5),
(5, 1), (5, 2), (5, 3), (5, 4), (5, 5),

-- Ámsterdam (ID 6)
(6, 1), (6, 2), (6, 3), (6, 4), (6, 5),
(6, 1), (6, 2), (6, 3), (6, 4), (6, 5),

-- Berlín (ID 7)
(7, 1), (7, 2), (7, 3), (7, 4), (7, 5),
(7, 1), (7, 2), (7, 3), (7, 4), (7, 5),

-- Lisboa (ID 8)
(8, 1), (8, 2), (8, 3), (8, 4), (8, 5),
(8, 1), (8, 2), (8, 3), (8, 4), (8, 5),

-- Bruselas (ID 9)
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5),
(9, 1), (9, 2), (9, 3), (9, 4), (9, 5),

-- Viena (ID 10)
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5),
(10, 1), (10, 2), (10, 3), (10, 4), (10, 5),

-- Praga (ID 11)
(11, 1), (11, 2), (11, 3), (11, 4), (11, 5),
(11, 1), (11, 2), (11, 3), (11, 4), (11, 5),

-- Zurich (ID 12)
(12, 1), (12, 2), (12, 3), (12, 4), (12, 5),
(12, 1), (12, 2), (12, 3), (12, 4), (12, 5),

-- Estocolmo (ID 13)
(13, 1), (13, 2), (13, 3), (13, 4), (13, 5),
(13, 1), (13, 2), (13, 3), (13, 4), (13, 5),

-- Copenhague (ID 14)
(14, 1), (14, 2), (14, 3), (14, 4), (14, 5),
(14, 1), (14, 2), (14, 3), (14, 4), (14, 5);

-- Usuarios
INSERT INTO usuario (username, password_hash, tipo) VALUES
('alejandro', '$2y$10$YDPv2YaTk0qcqeLY92.Dfe4BH5L7m714ODm8lDESIkPDMeezKNX86', 'admin'),
('markel', '$2y$10$OsaU/zhjCbo34swdOQX53OXibvKq/UrphsDKB/tXdLLV99VHaikhK', 'admin'),
('eli', '$2y$10$/8AYuxWjhY8vXIMWdQ0qqeqzIVItnhlgYqPjjbGB.2E26v4EVdStW', 'admin'),
('unai', '$2y$10$hQybb9tCI75J46pl6bfmN.9aVwN7g1OYiCV4lrNBsJzl7MwHN6SOq', 'admin');