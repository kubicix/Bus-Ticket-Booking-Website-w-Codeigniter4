# Apache ve PHP sunucusunu temel al
FROM php:8.0-apache

# Composer'ı yükle
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Apache mod_rewrite'yi etkinleştir
RUN a2enmod rewrite

# Gerekli PHP eklentilerini yükle
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && \
    apt-get install -y libicu-dev


# intl eklentisini etkinleştir
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN docker-php-ext-install pdo pdo_mysql mysqli

# Gerekli PHP eklentilerini yükle
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd

RUN apt-get update && \
    apt-get install -y zip unzip git



# Çalışma dizinini ayarla
WORKDIR /var/www/html

# PHPMyAdmin kullanmayacağımız için bu adımı atlayabiliriz

# Uygulama kodunu kopyala
COPY . .

# HTTP 80 portunu dışarıya aç
EXPOSE 80

# Apache'yi başlat
CMD ["apache2-foreground"]
