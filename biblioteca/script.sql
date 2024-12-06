CREATE DATABASE biblioteca;

USE biblioteca;

-- Crear tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    cedula VARCHAR(255) NOT NULL UNIQUE,
    birthdate DATE NOT NULL,
    sex VARCHAR(10) NOT NULL,
    type VARCHAR(50) NOT NULL,
    active BOOLEAN DEFAULT FALSE
);

-- Crear tabla de libros
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    isbn VARCHAR(255) NOT NULL,
    code VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    borrowed BOOLEAN DEFAULT FALSE
);

-- Crear tabla de categorías
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Crear tabla de bibliotecarios
CREATE TABLE librarians (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Crear tabla de préstamos
CREATE TABLE loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    borrowed_date DATE NOT NULL,
    returned_date DATE
);

-- Insertar bibliotecario precargado
INSERT INTO librarians (username, password) VALUES ('admin', 'admin123');
