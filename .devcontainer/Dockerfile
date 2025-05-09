FROM mcr.microsoft.com/devcontainers/php:8.4

# Update & install dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl gnupg2 lsb-release nano \
    libpng-dev libonig-dev libxml2-dev sqlite3 \
    libsqlite3-dev libzip-dev \
    docker.io docker-compose \
 && rm -rf /var/lib/apt/lists/*

# Install Composer (latest)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js 18.x + npm + yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
 && apt-get install -y nodejs \
 && npm install -g yarn

WORKDIR /workspace
