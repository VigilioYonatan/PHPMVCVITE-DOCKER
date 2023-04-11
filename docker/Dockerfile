FROM node:18 AS node
FROM php:8.1-apache


# Copy virtual host into container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Enable rewrite mode
RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \
    nodejs  \
    npm  \
    -y --no-install-recommends

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql mysqli 


    
# RUN pecl install -o -f xdebug-3.1.3 \
#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./install-composer.sh ./

# Copy php.ini
COPY ./php.ini /usr/local/etc/php/



# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node

RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm
RUN apt-get update && \
    apt-get install nodejs npm && \
    npm install -g npm-check-updates && \
    npm install --global yarn
# Change the current working directory
WORKDIR /var/www


# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www

# Start Apache in foreground
CMD ["apache2-foreground"]