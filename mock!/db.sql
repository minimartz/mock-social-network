CREATE TABLE `db`.`users` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`first` VARCHAR( 32 ) NOT NULL ,
`last` VARCHAR( 32 ) NOT NULL ,
`username` VARCHAR(32) NOT NULL,
`password` VARCHAR(255) NOT NULL,
`email` VARCHAR(255) NOT NULL,
`about` TEXT NOT NULL,
`status` TEXT NOT NULL
) ENGINE = MYISAM;