#
# open in browser:  localhost:2222
#

# ----------------------------------------------------------------------------------
# to kill
# ----------------------------------------------------------------------------------
# docker rm tuulia_test; docker kill tuulia_test;
#
#####################################################################################################


FROM ubuntu:22.04

MAINTAINER tuulia

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    curl \
    # Install git
    git \
    # Install apache
    apache2 \
    # Install php 8.1
    libapache2-mod-php8.1 \
    php8.1-cli \
    #php8.1-json \
    php8.1-curl \
    php8.1-fpm \
    php8.1-gd \
    php8.1-ldap \
    php8.1-mbstring \
    php8.1-mysql \
    php8.1-soap \
    php8.1-sqlite3 \
    php8.1-xml \
    php8.1-zip \
    php8.1-intl \
    php-imagick \
    # Install tools
    openssl \
    nano \
    graphicsmagick \
    imagemagick \
    ghostscript \
    mysql-client \
    iputils-ping \
    locales \
    && apt-get clean && rm -rf /var/lib/apt/lists/*





# Set locales
RUN locale-gen en_US.UTF-8 en_GB.UTF-8 de_DE.UTF-8 es_ES.UTF-8 fr_FR.UTF-8 it_IT.UTF-8 km_KH sv_SE.UTF-8 fi_FI.UTF-8


# Enble Apache rewrite module

RUN mkdir -p /var/www/html/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


RUN a2enmod rewrite
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

# allow .htacces override
#This is quick and dirtt= way because  we replace all "AllowOverride None" in /etc/apache2/apache2.conf
RUN sed -ri -e 's!AllowOverride None!AllowOverride All!g'  /etc/apache2/apache2.conf

EXPOSE 80 443

WORKDIR /home/code

#RUN rm index.html

CMD ["apache2ctl", "-D", "FOREGROUND"]




