USE `taipeiho_db`;

CREATE TABLE `mansion` (
	`id` INT(10) UNSIGNED DEFAULT NULL,
        `name` VARCHAR(255) DEFAULT NULL,
	`location` VARCHAR(255) DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
