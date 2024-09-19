FROM php:8.3-apache

RUN apt-get upgrade -y && \
    apt-get update -y

# Laravel
RUN apt-get install -y apt-utils zip unzip && \
    apt-get install -y nano && \
    apt-get install -y libzip-dev libpq-dev && \
    apt-get install -y libaio1 && \
    apt-get install -y libpng-dev && \
    apt-get install -y openssl build-essential libssl-dev libxrender-dev git-core  && \
    apt-get install -y libx11-dev libxext-dev libfontconfig1-dev libfreetype6-dev fontconfig && \
    a2enmod rewrite && \
    a2enmod headers && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-configure zip && \
    docker-php-ext-install zip && \
    docker-php-ext-install gd

RUN rm -rf /var/lib/apt/lists/*

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run
COPY ./docker/apache/default.conf /etc/apache2/sites-enabled/000-default.conf
WORKDIR /var/www/html
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80
