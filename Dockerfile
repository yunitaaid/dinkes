#mengambil library image dari hub.docker 
FROM php:8.0.30-apache 

# Enable Apache modules
RUN a2enmod rewrite headers

# Enable PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

#memcopy semua file dari direktori lokal ke dalam container
COPY . /var/www/html