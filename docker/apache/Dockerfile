# Base de apache et PHP7
FROM nimmis/apache-php7

# Installation de MySQL et XDebug
RUN apt-get update -y && apt-get install php-mysql php-xdebug php-dom -y

# Activation de l'extention rewrite
RUN a2enmod rewrite

# Copie du fichier de configuration PHP
COPY php.ini /etc/php/7.0/apache2/conf.d/custom-php.ini

COPY host.conf /etc/apache2/sites-available/000-default.conf

# Exposition du dossier de base
VOLUME /var/www/html