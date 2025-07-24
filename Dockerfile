FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    curl \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install \
        pdo_pgsql \
        zip \
        mbstring \
        bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Laravelのcomposerインストール直後でも動かせるようにbashを維持
CMD ["tail", "-f", "/dev/null"]
