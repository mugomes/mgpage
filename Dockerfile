FROM php:8.4-apache

COPY . /var/www/html/

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Porta
EXPOSE 10000

# Start Apache em foreground
CMD ["apache2-foreground"]
