-- Crear la base de datos usuariosDB y su tabla usuarios
CREATE DATABASE IF NOT EXISTS usuariosDB;
USE usuariosDB;

CREATE TABLE IF NOT EXISTS usuarios (
    nombre VARCHAR(20),
    email VARCHAR(50),
    usuario VARCHAR(20) PRIMARY KEY,
    password VARCHAR(70)
);

-- Crear la base de datos ordenesDB y su tabla ordenes
CREATE DATABASE IF NOT EXISTS ordenesDB;
USE ordenesDB;

CREATE TABLE IF NOT EXISTS ordenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreCliente VARCHAR(20),
    emailCliente VARCHAR(50),
    totalCuenta FLOAT,
    fechahora DATETIME
);

-- Crear la base de datos productosDB y su tabla productos
CREATE DATABASE IF NOT EXISTS productosDB;
USE productosDB;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20),
    precio FLOAT,
    inventario INT
);
INSERT INTO usuarios (nombre, email, usuario, password) VALUES ('Admin', 'admin@admin.com', 'admin', '123');
