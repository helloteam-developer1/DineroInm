# Usa una imagen base de PHP con Composer
FROM php:8.1-apache

# Habilita el módulo de Apache mod_rewrite
RUN a2enmod rewrite

# Instala las dependencias necesarias para Laravel
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia el archivo composer.json y composer.lock para optimizar el cacheo de las dependencias
COPY composer.json composer.lock ./

RUN CMD bash -c "composer install && php artisan serve --host 0.0.0.0 --port 5001"

# Copia todos los archivos de la aplicación al contenedor
COPY . .

# Establece los permisos adecuados para el directorio de almacenamiento de Laravel
RUN chown -R www-data:www-data storage


# Expone el puerto en el que se ejecutará la aplicación
EXPOSE 80

# Comando para iniciar el servidor Apache y ejecutar la aplicación
CMD ["apache2-foreground"]
