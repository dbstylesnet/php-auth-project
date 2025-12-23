#!/bin/bash
# Database initialization script
# Run this script to ensure the database schema is created
# Usage: docker exec -it <php_container> /data/docker/init-database.sh

echo "Initializing database schema..."

mysql -h mysql -u app -papp app < /data/docker/mysql/scripts/01-init.sql

if [ $? -eq 0 ]; then
    echo "Database schema initialized successfully!"
else
    echo "Error initializing database schema"
    exit 1
fi

