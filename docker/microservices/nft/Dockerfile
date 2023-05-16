FROM base-nginx-php:latest
#FROM php:8.0.15-fpm-buster

COPY php/conf/php-prod.ini $PHP_INI_DIR/php.ini

# Define system locale settings and apt update
RUN apt-get update --fix-missing \
    && apt-get install -y --no-install-recommends locales cron netcat gosu htop unzip net-tools curl \
    && sed -i -e 's/# pl_PL.UTF-8 UTF-8/pl_PL.UTF-8 UTF-8/' /etc/locale.gen \
    && dpkg-reconfigure --frontend=noninteractive locales

ENV PROJECT_PATH /app
ENV LC_ALL=pl_PL.UTF-8
ENV LANG=pl_PL.UTF-8
ENV LANGUAGE=pl_PL.UTF-8
ENV TZ=Europe/Warsaw

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer --version=2.2.6

## Web3 cli tool
RUN curl -sSL -o  /tmp/web3_mac https://github.com/gochain/web3/releases/download/v0.2.77/web3_linux

#################################################################
COPY php/extension/docker-php-ext-configure /usr/local/bin/docker-php-ext-configure
RUN chmod +x /usr/local/bin/docker-php-*

# Postgresql, MySQL & Mongodb support
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql \
    && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Symfony process requirements
RUN apt-get install -y graphviz

# Speed improvements
RUN docker-php-ext-install opcache

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Cleanup
RUN apt-get autoremove \
    && apt-get autoclean

RUN chmod +s /usr/sbin/gosu
RUN mkdir -p $PROJECT_PATH

# node.js
RUN apt-get install -y software-properties-common \
    && curl -sL https://deb.nodesource.com/setup_19.x | bash -
RUN apt-get update \
    && apt-get install -y nodejs

COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY nginx/default.conf /etc/nginx/conf.d/default.conf
COPY php/conf/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY php/conf/php-prod.ini /usr/local/etc/php/php.ini

WORKDIR $PROJECT_PATH/nft

RUN ln -s /app/common/scripts/startup.sh /usr/bin/startup
