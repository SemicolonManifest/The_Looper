-- MySQL Workbench Synchronization
-- Generated: 2021-09-17 10:24
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Cyril.GOLDENSCHUE

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `exercises`
    CHARACTER SET = utf8 , COLLATE = utf8_general_ci ,
    CHANGE COLUMN `state` `state` INT(11) NOT NULL DEFAULT 0 ;

CREATE TABLE IF NOT EXISTS `takes` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `time_stamp` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `fields` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `label` VARCHAR(255) NOT NULL,
    `value_kind` INT(11) NOT NULL,
    `exercises_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`, `exercises_id`),
    INDEX `fk_fields_exercises1_idx` (`exercises_id` ASC) VISIBLE,
    CONSTRAINT `fk_fields_exercises1`
    FOREIGN KEY (`exercises_id`)
    REFERENCES `exercises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `answers` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `response` TEXT NOT NULL,
    `fields_id` INT(11) NOT NULL,
    `takes_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`, `fields_id`, `takes_id`),
    INDEX `fk_answers_fields1_idx` (`fields_id` ASC) VISIBLE,
    INDEX `fk_answers_takes1_idx` (`takes_id` ASC) VISIBLE,
    CONSTRAINT `fk_answers_fields1`
    FOREIGN KEY (`fields_id`)
    REFERENCES `fields` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_answers_takes1`
    FOREIGN KEY (`takes_id`)
    REFERENCES `takes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
