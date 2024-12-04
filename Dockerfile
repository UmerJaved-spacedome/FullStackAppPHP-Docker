FROM php:apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

