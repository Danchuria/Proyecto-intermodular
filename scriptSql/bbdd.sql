-- Eliminar tablas si ya existen (para permitir una reejecución limpia del script)
DROP TABLE IF EXISTS CartItem CASCADE;
DROP TABLE IF EXISTS Cart CASCADE;
DROP TABLE IF EXISTS Products CASCADE;
DROP TABLE IF EXISTS Employer CASCADE;
DROP TABLE IF EXISTS Client CASCADE;
DROP TABLE IF EXISTS "User" CASCADE;

-- Crear tabla de usuarios generales
CREATE TABLE "User" (
    idUser INT PRIMARY KEY, -- ID único para el usuario
    numeroTelefono INT NOT NULL, -- Teléfono obligatorio
    Email VARCHAR(255) NOT NULL, -- Email obligatorio
    Nombre VARCHAR(255) NOT NULL -- Nombre obligatorio
);

-- Crear tabla de clientes
CREATE TABLE Client (
    idClient INT PRIMARY KEY, -- ID único del cliente
    IBAN VARCHAR(34), -- IBAN opcional
    FOREIGN KEY (idClient) REFERENCES "User"(idUser) ON DELETE CASCADE -- FK al usuario general
);

-- Crear tabla de empleados
CREATE TABLE Employer (
    idEmployer INT PRIMARY KEY, -- ID único del empleado
    fechaContrato DATE NOT NULL, -- Fecha de contratación
    Departamento VARCHAR(255), -- Departamento del empleado
    Salario DECIMAL(10,2), -- Salario del empleado
    Rango VARCHAR(100), -- Rango o puesto
    Descuento DECIMAL(5,2) DEFAULT 0.00, -- Descuento que puede aplicar (por ejemplo, para compras internas)
    IBAN VARCHAR(34), -- IBAN del empleado
    FOREIGN KEY (idEmployer) REFERENCES "User"(idUser) ON DELETE CASCADE -- FK al usuario general
);

-- Crear tabla de productos
CREATE TABLE Products (
    idProducts INT PRIMARY KEY, -- ID único del producto
    Nombre VARCHAR(255) NOT NULL, -- Nombre del producto
    Categoría VARCHAR(100), -- Categoría (opcional)
    Cantidad INT NOT NULL DEFAULT 0, -- Cantidad del producto (ej. número de unidades por paquete)
    Precio DECIMAL(10,2) NOT NULL, -- Precio unitario
    Stock INT NOT NULL DEFAULT 0, -- Cantidad disponible en stock
    Descripción TEXT, -- Descripción larga
    idUser INT, -- FK opcional para asociar producto a un usuario
    FOREIGN KEY (idUser) REFERENCES "User"(idUser) ON DELETE SET NULL -- Si se borra el usuario, se pone NULL
);

-- Crear índice para mejorar búsqueda por usuario en productos
CREATE INDEX idx_products_userid ON Products(idUser);

-- Crear tabla del carrito de compras
CREATE TABLE Cart (
    idCart INT PRIMARY KEY, -- ID único del carrito
    idClient INT NOT NULL, -- Cliente dueño del carrito
    fechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha de creación del carrito
    FOREIGN KEY (idClient) REFERENCES Client(idClient) ON DELETE CASCADE -- Si se borra el cliente, se borra el carrito
);

-- Crear tabla de ítems dentro del carrito
CREATE TABLE CartItem (
    idCartItem INT PRIMARY KEY, -- ID único del ítem en el carrito
    idCart INT NOT NULL, -- FK al carrito
    idProduct INT NOT NULL, -- FK al producto
    Cantidad INT NOT NULL CHECK (Cantidad > 0), -- Cantidad del producto (mayor a 0)
    PrecioUnitario DECIMAL(10,2) NOT NULL, -- Precio en el momento de agregar al carrito

    -- Claves foráneas
    FOREIGN KEY (idCart) REFERENCES Cart(idCart) ON DELETE CASCADE, -- Si se elimina el carrito, se eliminan los ítems
    FOREIGN KEY (idProduct) REFERENCES Products(idProducts) ON DELETE CASCADE -- Si se elimina el producto, se eliminan los ítems
);

-- Crear índices para consultas rápidas
CREATE INDEX idx_cartitem_cart ON CartItem(idCart);
CREATE INDEX idx_cartitem_product ON CartItem(idProduct);
