FROM php:7.4-fpm

# Argumentos definidos en docker-compose.yml
# la imagen se debe generar con docker-compose build app
ARG user
ARG uid

# Instalo dependencias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    mc \
    unzip \
    lynx \
    net-tools

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Obtengo la Ultima version de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs && apt-get clean

# Creo el usuario para correr comandos de Composer y Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Seteo directorio de trabajo
WORKDIR /var/www

USER $user
