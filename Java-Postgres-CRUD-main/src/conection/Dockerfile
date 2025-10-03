# Dockerfile
FROM php:8.2-apache

# Habilitar PDO MySQL o PostgreSQL según tu base
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos al contenedor
COPY . /var/www/html/

# Exponer puerto 80
EXPOSE 80

