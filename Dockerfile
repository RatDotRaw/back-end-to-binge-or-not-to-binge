FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./code /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www
    # && chmod -R 777 /var/www/storage \
    # && chmod -R 777 /var/www/bootstrap/cache

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]