DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `tasks`;


CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `tasks` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `name` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `due_date` DATE NOT NULL , `urgency` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `tasks` ADD `complete` BOOLEAN NOT NULL AFTER `urgency`;
ALTER TABLE `users` ADD `activation_token` VARCHAR(255) NOT NULL AFTER `password`;
