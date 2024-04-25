FROM composer:latest

WORKDIR /usr/src/app

COPY . /usr/src/app

RUN composer install

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]