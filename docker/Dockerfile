FROM php:7.2.3-fpm

# Fix Debian Stretch EOL repository issues
RUN sed -i 's|deb.debian.org|archive.debian.org|g' /etc/apt/sources.list && \
    sed -i 's|security.debian.org|archive.debian.org|g' /etc/apt/sources.list && \
    printf "deb [trusted=yes] http://archive.debian.org/debian stretch main contrib non-free\n" \
    > /etc/apt/sources.list && \
    echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid



RUN apt-get update && apt-get upgrade -y \
    && docker-php-ext-install mysqli \
    && apt-get autoremove -y --purge \
    && apt-get clean \
    && rm -Rf /var/lib/apt/lists/*
