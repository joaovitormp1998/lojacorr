 # Use the official PHP image with PHP 8.1
 FROM php:8.1-fpm

 # Install dependencies
 RUN apt-get update && apt-get install -y \
     build-essential \
     libpng-dev \
     libjpeg-dev \
     libfreetype6-dev \
     locales \
     zip \
     jpegoptim optipng pngquant gifsicle \
     vim \
     unzip \
     git \
     curl \
     libonig-dev \
     libzip-dev \
     default-mysql-client \
     netcat-openbsd
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Self-update Composer to the latest version
RUN composer self-update

# Set the working directory
WORKDIR /usr/src/lojacorr
# Copy the application files
COPY . .

# Install the application dependencies
RUN composer install

# Copy the commands.sh script
COPY commands.sh /usr/src/lojacorr/commands.sh

# Ensure commands.sh is executable
RUN chmod -R +x /usr/src/lojacorr/commands.sh

# Run the commands.sh script
CMD ["/usr/src/lojacorr/commands.sh"]


