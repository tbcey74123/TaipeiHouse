USE `taipeiho_db`;

CREATE TABLE `mansion_location` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `location` VARCHAR(255) DEFAULT NULL,
        `Chinese_name` VARCHAR(255) DEFAULT NULL,
        PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
