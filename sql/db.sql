USE `taipeiho_db`;

CREATE TABLE `houses` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) DEFAULT NULL,
	`address` VARCHAR(255) DEFAULT NULL,
	`structure` VARCHAR(255) DEFAULT NULL,
	`acreage` FLOAT(10,2) DEFAULT NULL,
	`location` VARCHAR(255) DEFAULT NULL,
	`floor` FLOAT(10,2) DEFAULT NULL,
	`housetype` CHAR(1) DEFAULT NULL,
	`pic` VARCHAR(255) DEFAULT NULL,
	`hot` TINYINT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `mansion` (
	`id` INT(10) UNSIGNED DEFAULT NULL ,
	`name` VARCHAR(255) DEFAULT NULL,
	`location` VARCHAR(255) DEFAULT NULL,
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `request` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type`	CHAR(1) DEFAULT NULL,
	`name`	VARCHAR(10) DEFAULT NULL,
	`sex`	TINYINT(1) DEFAULT NULL,
	`celphone`	VARCHAR(20)	DEFAULT NULL,
	`telephone`	VARCHAR(20)	DEFAULT NULL,
	`e-mail`	VARCHAR(255)	DEFAULT NULL,
	`comments`	VARCHAR(255)	DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
