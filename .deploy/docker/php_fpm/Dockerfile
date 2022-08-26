FROM php:7.4-fpm

WORKDIR /app



RUN apt-get update && apt-get install -y git unzip

RUN groupadd --gid 1000 docker
RUN useradd --gid 1000 --uid 1000 docker


############################ COMPOSER ####################################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

######################## COMPOSER ##########################

RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

USER docker:docker

COPY .deploy/docker/php_fpm/entrypoint.sh /entrypoint-component.sh

EXPOSE 9000

CMD ["/entrypoint-component.sh"]
