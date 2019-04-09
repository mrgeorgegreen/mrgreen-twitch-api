FROM php:7.1-apache
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
    apt-utils \
    curl \
    git \
    make \
    mc \
    nano \
    vim \
    wget \
    zlib1g-dev \
    zip

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install zip

RUN pecl install xdebug-2.6.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod 777 /var/www/html/db/sqlite/database.sqlite
#chmod g+w /var/www/html/db/sqlite
#chmod g+w /var/www/html/db/sqlite/database.sqlite
#RUN composer update
#RUN composer dump-autoload -o