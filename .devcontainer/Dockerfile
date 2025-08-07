FROM wordpress:latest

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    sudo \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Install Node.js (the devcontainer.json features will handle this, but included for completeness)
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
#    && apt-get install -y nodejs

# Set up WordPress permissions
RUN mkdir -p /var/www/html/wp-content/themes \
    && chown -R www-data:www-data /var/www/html

# Configure PHP
RUN { \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'memory_limit = 256M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_vars = 2000'; \
    echo 'xdebug.mode = debug,develop,coverage'; \
    echo 'xdebug.discover_client_host = 1'; \
    echo 'xdebug.client_port = 9003'; \
} > /usr/local/etc/php/conf.d/custom.ini

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Switch to www-data user
USER www-data

# Setup WordPress when the container starts
COPY docker-entrypoint-custom.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint-custom.sh

# Set www-data to have a proper shell
USER root
RUN chsh -s /bin/bash www-data
USER www-data

ENTRYPOINT ["docker-entrypoint-custom.sh"]
CMD ["apache2-foreground"]
