# Usa una imagen oficial de PHP
FROM php:8.0-apache

# Copia los archivos al contenedor
COPY . /var/www/html/

# Exponer el puerto que usará el contenedor
EXPOSE 80
