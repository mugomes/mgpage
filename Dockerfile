FROM php:8.4-apache

# Instala dependências do Composer
RUN apt-get update && apt-get install -y \
    git unzip zip curl \
 && rm -rf /var/lib/apt/lists/*

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura Apache
RUN a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copia o código
COPY . /var/www/html/

# Define o diretório do Composer
WORKDIR /var/www/html/app/libs

# Roda o Composer
RUN composer install --no-dev --optimize-autoloader

# Volta para a raiz do Apache
WORKDIR /var/www/html

EXPOSE 10000

CMD ["apache2-foreground"]
