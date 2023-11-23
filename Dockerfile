# Use an official PHP image with Apache
FROM php:7.4-apache

# Enable Apache module for rewrite
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set the working directory to /var/www/html
WORKDIR /var/www/html
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
CMD ["apache2-foreground"]
