# Use the official PHP image as a parent image
FROM php:apache

# Install the MySQLi extension
RUN docker-php-ext-install mysqli

# FROM php:7.4-apache

# # 로컬의 php.ini 파일을 컨테이너 내부로 복사
# COPY php.ini /usr/local/etc/php/
