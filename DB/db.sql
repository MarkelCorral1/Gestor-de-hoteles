CREATE DATABASE hoteles_schumacher;
USE hoteles_schumacher;

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    tipo ENUM('normal', 'admin') NOT NULL
);	

CREATE TABLE hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL
);

CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre ENUM('stroll', 'lando', 'alonso', 'senna', 'schumacher') NOT NULL,
    balcon BOOLEAN, 
    yakushi BOOLEAN,
    spa BOOLEAN,
	mayordomo BOOLEAN,
    limusina BOOLEAN,
    helicoptero BOOLEAN,
    precio_base DECIMAL(10,2) NOT NULL
);

CREATE TABLE habitacion (
    id_habitacion INT AUTO_INCREMENT PRIMARY KEY,
    id_hotel INT NOT NULL,
    id_categoria INT NOT NULL,
    metros_cuadrados INT NOT NULL,
    camas INT NOT NULL,
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);	

CREATE TABLE reserva (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_habitacion INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_final DATE NOT NULL,
    numero_personas INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_habitacion) REFERENCES habitacion(id_habitacion),
    CHECK (fecha_final > fecha_inicio)
);

INSERT INTO categoria (nombre,
	balcon, yakushi, spa, mayordomo, limusina, helicoptero, precio_base
) VALUES
('stroll', FALSE, FALSE, FALSE, FALSE, FALSE, FALSE, 12.00),
('lando', TRUE, TRUE, FALSE, FALSE, FALSE, FALSE, 25.00),
('alonso', TRUE, TRUE, TRUE, TRUE, FALSE, FALSE, 60.00),
('senna', TRUE, TRUE, TRUE, TRUE, TRUE, FALSE, 100.00),
('schumacher', TRUE, TRUE, TRUE, TRUE, TRUE, TRUE, 160.00);

-- HOTELES
INSERT INTO hotel (ciudad, pais) VALUES 
('Madrid', 'España'),
('Barcelona', 'España'),
('París', 'Francia'),
('Londres', 'Reino Unido'),
('Roma', 'Italia'),
('Ámsterdam', 'Países Bajos'),
('Berlín', 'Alemania'),
('Lisboa', 'Portugal'),
('Bruselas', 'Bélgica'),
('Viena', 'Austria'),
('Praga', 'República Checa'),
('Zurich', 'Suiza'),
('Ámsterdam', 'Países Bajos'),
('Estocolmo', 'Suecia'),
('Copenhague', 'Dinamarca');

-- Insertar Habitaciones
INSERT INTO habitacion (id_hotel, id_categoria, metros_cuadrados, camas) VALUES
-- Madrid, España
(1, 1, 25, 2),
(1, 2, 30, 2),
(1, 3, 35, 3),
(1, 4, 45, 3),
(1, 5, 50, 4),
(1, 1, 25, 2),
(1, 2, 30, 2),
(1, 3, 35, 3),
(1, 4, 45, 3),
(1, 5, 50, 4),

-- Barcelona, España
(2, 1, 25, 2),
(2, 2, 30, 2),
(2, 3, 35, 3),
(2, 4, 45, 3),
(2, 5, 50, 4),
(2, 1, 25, 2),
(2, 2, 30, 2),
(2, 3, 35, 3),
(2, 4, 45, 3),
(2, 5, 50, 4),

-- París, Francia
(3, 1, 25, 2),
(3, 2, 30, 2),
(3, 3, 35, 3),
(3, 4, 45, 3),
(3, 5, 50, 4),
(3, 1, 25, 2),
(3, 2, 30, 2),
(3, 3, 35, 3),
(3, 4, 45, 3),
(3, 5, 50, 4),

-- Londres, Reino Unido
(4, 1, 25, 2),
(4, 2, 30, 2),
(4, 3, 35, 3),
(4, 4, 45, 3),
(4, 5, 50, 4),
(4, 1, 25, 2),
(4, 2, 30, 2),
(4, 3, 35, 3),
(4, 4, 45, 3),
(4, 5, 50, 4),

-- Roma, Italia
(5, 1, 25, 2),
(5, 2, 30, 2),
(5, 3, 35, 3),
(5, 4, 45, 3),
(5, 5, 50, 4),
(5, 1, 25, 2),
(5, 2, 30, 2),
(5, 3, 35, 3),
(5, 4, 45, 3),
(5, 5, 50, 4),

-- Ámsterdam, Países Bajos
(6, 1, 25, 2),
(6, 2, 30, 2),
(6, 3, 35, 3),
(6, 4, 45, 3),
(6, 5, 50, 4),
(6, 1, 25, 2),
(6, 2, 30, 2),
(6, 3, 35, 3),
(6, 4, 45, 3),
(6, 5, 50, 4),

-- Berlín, Alemania
(7, 1, 25, 2),
(7, 2, 30, 2),
(7, 3, 35, 3),
(7, 4, 45, 3),
(7, 5, 50, 4),
(7, 1, 25, 2),
(7, 2, 30, 2),
(7, 3, 35, 3),
(7, 4, 45, 3),
(7, 5, 50, 4),

-- Lisboa, Portugal
(8, 1, 25, 2),
(8, 2, 30, 2),
(8, 3, 35, 3),
(8, 4, 45, 3),
(8, 5, 50, 4),
(8, 1, 25, 2),
(8, 2, 30, 2),
(8, 3, 35, 3),
(8, 4, 45, 3),
(8, 5, 50, 4),

-- Bruselas, Bélgica
(9, 1, 25, 2),
(9, 2, 30, 2),
(9, 3, 35, 3),
(9, 4, 45, 3),
(9, 5, 50, 4),
(9, 1, 25, 2),
(9, 2, 30, 2),
(9, 3, 35, 3),
(9, 4, 45, 3),
(9, 5, 50, 4),

-- Viena, Austria
(10, 1, 25, 2),
(10, 2, 30, 2),
(10, 3, 35, 3),
(10, 4, 45, 3),
(10, 5, 50, 4),
(10, 1, 25, 2),
(10, 2, 30, 2),
(10, 3, 35, 3),
(10, 4, 45, 3),
(10, 5, 50, 4),

-- Praga, República Checa
(11, 1, 25, 2),
(11, 2, 30, 2),
(11, 3, 35, 3),
(11, 4, 45, 3),
(11, 5, 50, 4),
(11, 1, 25, 2),
(11, 2, 30, 2),
(11, 3, 35, 3),
(11, 4, 45, 3),
(11, 5, 50, 4),

-- Zurich, Suiza
(12, 1, 25, 2),
(12, 2, 30, 2),
(12, 3, 35, 3),
(12, 4, 45, 3),
(12, 5, 50, 4),
(12, 1, 25, 2),
(12, 2, 30, 2),
(12, 3, 35, 3),
(12, 4, 45, 3),
(12, 5, 50, 4),

-- Estocolmo, Suecia
(13, 1, 25, 2),
(13, 2, 30, 2),
(13, 3, 35, 3),
(13, 4, 45, 3),
(13, 5, 50, 4),
(13, 1, 25, 2),
(13, 2, 30, 2),
(13, 3, 35, 3),
(13, 4, 45, 3),
(13, 5, 50, 4),

-- Copenhague, Dinamarca
(14, 1, 25, 2),
(14, 2, 30, 2),
(14, 3, 35, 3),
(14, 4, 45, 3),
(14, 5, 50, 4),
(14, 1, 25, 2),
(14, 2, 30, 2),
(14, 3, 35, 3),
(14, 4, 45, 3),
(14, 5, 50, 4);

INSERT INTO usuario (username, password_hash, tipo) VALUES
('alejandro', '$2y$10$YDPv2YaTk0qcqeLY92.Dfe4BH5L7m714ODm8lDESIkPDMeezKNX86', 'admin'),
('markel', '$2y$10$OsaU/zhjCbo34swdOQX53OXibvKq/UrphsDKB/tXdLLV99VHaikhK', 'admin'),
('eli', '$2y$10$/8AYuxWjhY8vXIMWdQ0qqeqzIVItnhlgYqPjjbGB.2E26v4EVdStW', 'admin'),
('unai', '$2y$10$hQybb9tCI75J46pl6bfmN.9aVwN7g1OYiCV4lrNBsJzl7MwHN6SOq', 'admin');
