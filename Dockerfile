# Usa una imagen base de PHP
FROM php:7.4-apache

# Habilita mod_rewrite para .htaccess
RUN a2enmod rewrite

# Instalar las extensiones necesarias para PostgreSQL y PDO
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copiar los archivos del proyecto a la imagen de Docker
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80
