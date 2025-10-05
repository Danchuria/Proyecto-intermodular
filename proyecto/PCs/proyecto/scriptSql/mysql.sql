-- Desactivar verificación de claves foráneas temporalmente para permitir eliminación en cualquier orden
SET FOREIGN_KEY_CHECKS = 0;

-- Eliminar tablas si ya existen (MySQL no soporta CASCADE en DROP TABLE)
DROP TABLE IF EXISTS CartItem;
DROP TABLE IF EXISTS Cart;
DROP TABLE IF EXISTS Products;
DROP TABLE IF EXISTS Employer;
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS `User`;

-- Reactivar verificación de claves foráneas
SET FOREIGN_KEY_CHECKS = 1;

-- Crear tabla de usuarios generales
CREATE TABLE `User` (
    idUser INT PRIMARY KEY,
    numeroTelefono INT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Nombre VARCHAR(255) NOT NULL
);

-- Crear tabla de clientes
CREATE TABLE Client (
    idClient INT PRIMARY KEY,
    IBAN VARCHAR(34),
    FOREIGN KEY (idClient) REFERENCES `User`(idUser) ON DELETE CASCADE
);

-- Crear tabla de empleados
CREATE TABLE Employer (
    idEmployer INT PRIMARY KEY,
    fechaContrato DATE NOT NULL,
    Departamento VARCHAR(255),
    Salario DECIMAL(10,2),
    Rango VARCHAR(100),
    Descuento DECIMAL(5,2) DEFAULT 0.00,
    IBAN VARCHAR(34),
    FOREIGN KEY (idEmployer) REFERENCES `User`(idUser) ON DELETE CASCADE
);

-- Crear tabla de productos
CREATE TABLE Products (
    idProducts INT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Categoría VARCHAR(100),
    Cantidad INT NOT NULL DEFAULT 0,
    Precio DECIMAL(10,2) NOT NULL,
    Stock INT NOT NULL DEFAULT 0,
    Descripción TEXT,
    idUser INT,
    FOREIGN KEY (idUser) REFERENCES `User`(idUser) ON DELETE SET NULL
);

-- Crear índice para mejorar búsqueda por usuario en productos
CREATE INDEX idx_products_userid ON Products(idUser);

-- Crear tabla del carrito de compras
CREATE TABLE Cart (
    idCart INT PRIMARY KEY,
    idClient INT NOT NULL,
    fechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE
);

-- Crear tabla de ítems dentro del carrito
CREATE TABLE CartItem (
    idCartItem INT PRIMARY KEY,
    idCart INT NOT NULL,
    idProduct INT NOT NULL,
    Cantidad INT NOT NULL, -- CHECK (Cantidad > 0) no se respeta en todas las versiones de MySQL → manejar en app
    PrecioUnitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (idCart) REFERENCES Cart(idCart) ON DELETE CASCADE,
    FOREIGN KEY (idProduct) REFERENCES Products(idProducts) ON DELETE CASCADE
);

-- Crear índices para consultas rápidas
CREATE INDEX idx_cartitem_cart ON CartItem(idCart);
CREATE INDEX idx_cartitem_product ON CartItem(idProduct);
