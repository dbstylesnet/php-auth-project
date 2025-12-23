<?php
/**
 * Database initialization script
 * This script creates the necessary tables if they don't exist
 * Run this after starting the containers: docker exec -it <mysql_container> mysql -uapp -papp app < /docker-entrypoint-initdb.d/01-init.sql
 * Or run via PHP: docker exec -it <php_container> php /data/docker/mysql/scripts/init-db.php
 */

$host = getenv('MYSQL_HOST') ?: 'mysql';
$user = getenv('MYSQL_USER') ?: 'app';
$password = getenv('MYSQL_PASSWORD') ?: 'app';
$database = getenv('MYSQL_DATABASE') ?: 'app';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    $sql = "
        CREATE TABLE IF NOT EXISTS `user` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `login` VARCHAR(255) NOT NULL UNIQUE,
            `hash` VARCHAR(255) NOT NULL,
            `salt` VARCHAR(255) NOT NULL,
            INDEX `idx_login` (`login`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";

    $pdo->exec($sql);
    echo "Database schema initialized successfully!\n";
    echo "Table 'user' created or already exists.\n";
    
} catch (PDOException $e) {
    echo "Error initializing database: " . $e->getMessage() . "\n";
    exit(1);
}

