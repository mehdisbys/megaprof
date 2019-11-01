FROM ubuntu:16.04
LABEL Description="Cutting-edge LAMP stack, based on Ubuntu 16.04 LTS. Includes .htaccess support and popular PHP7 features, including composer and mail() function." \
	License="Apache License 2.0" \
	Usage="docker run -d -p [HOST WWW PORT NUMBER]:80 -p [HOST DB PORT NUMBER]:3306 -v [HOST WWW DOCUMENT ROOT]:/var/www/html -v [HOST DB DOCUMENT ROOT]:/var/lib/mysql fauria/lamp" \
	Version="1.0"

RUN apt-get update
RUN apt-get upgrade -y

#COPY debconf.selections /tmp/
#RUN debconf-set-selections /tmp/debconf.selections

RUN apt-get install -y zip unzip
RUN apt-get install -y software-properties-common python-software-properties
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php

RUN apt-get update -y && apt-get install -y php7.2 php7.2-fpm php7.2-cli php7.2-common php7.2-mbstring php7.2-gd php7.2-intl php7.2-xml php7.2-pdo php7.2-mysql php7.2-mcrypt php7.2-zip php7.2-curl


RUN apt-get install apache2 libapache2-mod-php7.2 -y
RUN apt-get install git nodejs npm composer nano tree vim curl ftp -y
RUN npm install -g bower grunt-cli gulp
RUN phpenmod pdo_mysql

ADD . /var/www
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite
RUN service apache2 restart
RUN ln -s /usr/bin/nodejs /usr/bin/node
RUN chown -R www-data:www-data /var/www
ADD ./cronfile cronfile
RUN crontab < ./cronfile
ADD env-prod /var/www/.env
RUN service cron start

EXPOSE 80

ENTRYPOINT apachectl -D FOREGROUND

