#!/bin/bash
# Database initialization script that runs on container startup
# This ensures the database schema exists even if MySQL data directory already has data

set -e

echo "Waiting for MySQL to be ready..."
until mysqladmin ping -h mysql -u app -papp --silent 2>/dev/null; do
    echo "Waiting for MySQL..."
    sleep 2
done

echo "MySQL is ready. Checking database schema..."

# Check if user table exists, if not create it
mysql -h mysql -u app -papp app <<EOF
CREATE TABLE IF NOT EXISTS \`user\` (
    \`id\` INT AUTO_INCREMENT PRIMARY KEY,
    \`login\` VARCHAR(255) NOT NULL UNIQUE,
    \`hash\` VARCHAR(255) NOT NULL,
    \`salt\` VARCHAR(255) NOT NULL,
    INDEX \`idx_login\` (\`login\`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
EOF

if [ $? -eq 0 ]; then
    echo "Database schema initialized successfully!"
else
    echo "Error initializing database schema"
    exit 1
fi

