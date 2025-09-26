-- Eliminar tablas si ya existen (opcional, para reejecución limpia)
DROP TABLE IF EXISTS Products CASCADE;
DROP TABLE IF EXISTS Employer CASCADE;
DROP TABLE IF EXISTS Client CASCADE;
DROP TABLE IF EXISTS "User" CASCADE;

CREATE TABLE "User" (    idUser INT PRIMARY KEY,    numeroTelefono INT NOT NULL,    Email VARCHAR(255) NOT NULL,    Nombre VARCHAR(255) NOT NULL);

CREATE TABLE Client (
    idClient INT PRIMARY KEY,
    IBAN VARCHAR(34),
    FOREIGN KEY (idClient) REFERENCES "User"(idUser) ON DELETE CASCADE
);

CREATE TABLE Employer (
    idEmployer INT PRIMARY KEY,
    fechaContrato DATE NOT NULL,
    Departamento VARCHAR(255),
    Salario DECIMAL(10,2),
    Rango VARCHAR(100),
    Descuento DECIMAL(5,2) DEFAULT 0.00,
    IBAN VARCHAR(34),
    FOREIGN KEY (idEmployer) REFERENCES "User"(idUser) ON DELETE CASCADE
);

CREATE TABLE Products (
    idProducts INT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Categoría VARCHAR(100),
    Cantidad INT NOT NULL DEFAULT 0,
    Precio DECIMAL(10,2) NOT NULL,
    Stock INT NOT NULL DEFAULT 0,
    Descripción TEXT,
    idUser INT, -- FK opcional: producto asignado a un usuario (comprador/poseedor)
    FOREIGN KEY (idUser) REFERENCES "User"(idUser) ON DELETE SET NULL
);

CREATE INDEX idx_products_userid ON Products(idUser);
