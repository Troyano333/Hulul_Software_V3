# Usa una imagen base de PHP
FROM php:7.4-apache

# Habilita mod_rewrite para .htaccess
RUN a2enmod rewrite

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli

# Copiar los archivos del proyecto a la imagen de Docker
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80
