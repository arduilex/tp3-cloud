FROM php:8.0-apache

# Installer l'extension MySQLi
RUN docker-php-ext-install mysqli

# Activer les extensions PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Installer l'extension Redis
RUN pecl install redis && docker-php-ext-enable redis


FROM php:8.2-cli-alpine
ARG cron
ARG tz
ARG command
RUN apk add bash tzdata
ENV TZ="$tz"
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN touch crontab.tmp \
&& echo " $cron cd /usr/src/myapp; $command" > crontab.tmp \
&& crontab crontab.tmp \
&& rm -rf crontab.tmp
CMD ["/usr/sbin/crond", "-f", "-d", "0"]
