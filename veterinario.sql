CREATE DATABASE IF NOT EXISTS veterinaria;
USE veterinaria;

CREATE TABLE IF NOT EXISTS citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mascota VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    raza VARCHAR(100) NOT NULL,
    amo VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    servicio VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reservas_guarderia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_dueno VARCHAR(100) NOT NULL,      -- Nombre del dueño
    telefono VARCHAR(30) NOT NULL,            -- Teléfono de contacto
    nombre_mascota VARCHAR(100) NOT NULL,    -- Nombre de la mascota
    raza VARCHAR(50) NOT NULL,                -- Raza de la mascota
    fecha_ingreso DATE NOT NULL,              -- Fecha de ingreso a la guardería
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha y hora de la reserva
);
CREATE TABLE ventas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto VARCHAR(100),
  precio DECIMAL(10,2),
  metodo_pago VARCHAR(50),
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



