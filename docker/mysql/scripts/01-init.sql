-- Create the user table if it doesn't exist
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `login` VARCHAR(255) NOT NULL UNIQUE,
    `hash` VARCHAR(255) NOT NULL,
    `salt` VARCHAR(255) NOT NULL,
    INDEX `idx_login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

