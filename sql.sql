SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `signup` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `signup` ;

-- -----------------------------------------------------
-- Table `signup`.`users`
-- -----------------------------------------------------


CREATE TABLE `users` (
`id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`email` VARCHAR( 150 ) NOT NULL ,
`password` VARCHAR( 150 ) NOT NULL ,
`hash` VARCHAR( 150 ) NOT NULL ,
`active` INT( 1 ) NOT NULL DEFAULT '0'
) ENGINE = MYISAM ;
