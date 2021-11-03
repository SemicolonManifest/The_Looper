-- MySQL Workbench Synchronization
-- Generated: 2021-09-29 15:22
-- Model: Exercise_looper
-- Version: 1.3
-- Project: Name of the project
-- Author: Cyril.GOLDENSCHUE
SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE =
        'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DROP TABLE exercises;
CREATE TABLE IF NOT EXISTS `exercises`
(
    `id`    INT(11)      NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `state` INT(11)      NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `title_UNIQUE` (`title` ASC)
)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;
DROP TABLE takes;
CREATE TABLE IF NOT EXISTS `takes`
(
    `id`         INT(11)   NOT NULL AUTO_INCREMENT,
    `time_stamp` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;
DROP TABLE fields;
CREATE TABLE IF NOT EXISTS `fields`
(
    `id`           INT(11)      NOT NULL AUTO_INCREMENT,
    `label`        VARCHAR(255) NOT NULL,
    `value_kind`   INT(11)      NOT NULL,
    `exercises_id` INT(11)      NOT NULL,
    PRIMARY KEY (`id`, `exercises_id`),
    INDEX `fk_fields_exercises1_idx` (`exercises_id` ASC),
    CONSTRAINT `fk_fields_exercises1`
        FOREIGN KEY (`exercises_id`)
            REFERENCES `exercise_looper`.`exercises` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;
DROP TABLE answers;
CREATE TABLE IF NOT EXISTS `answers`
(
    `id`        INT(11) NOT NULL AUTO_INCREMENT,
    `response`  TEXT    NOT NULL,
    `fields_id` INT(11) NOT NULL,
    `takes_id`  INT(11) NOT NULL,
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
            ON UPDATE NO ACTION,
    CONSTRAINT unique_take_for_answer UNIQUE (fields_id, takes_id)
)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8;
SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
-- -----------------------------------------------------
-- Table `exercises` - Data
-- -----------------------------------------------------
INSERT INTO exercises(title, state)
VALUES ("Pourquoi la vie", 0),
       ("Pourquoi la mort", 1),
       ("Pourquoi les zombies", 2);
INSERT INTO fields(label, value_kind, exercises_id)
VALUES ("Pourquoi les humains existent ?", 0, 1),
       ("Comment ça ce fait qu'on ait pas encore de remède ?", 1, 2),
       ("Faudrait-il être immortel ?", 0, 2),
       ("Comment ça peut exister ?", 2, 3);
INSERT INTO takes (time_stamp)
VALUES ('2021-10-02 10:02:30'),
       ('2021-10-02 10:12:30'),
       ('2021-10-03 10:32:30'),
       ('2021-10-03 11:12:30'),
       ('2021-10-03 11:32:30'),
       ('2021-10-03 12:12:30'),
       ('2021-10-03 12:32:30'),
       ('2021-10-03 13:12:30'),
       ('2021-10-03 13:32:30');
INSERT INTO answers (response, fields_id, takes_id)
VALUES ('parce que', '1', '1'),
       ('woula', '1', '2'),
       ('boomer', '1', '3'),
       ('jsp', '2', '4'),
       ('ok', '2', '5'),
       ('pourquoi pas', '2', '6'),
       ("c'est ça ?", '3', '4'),
       ('quoi ?', '3', '5'),
       ('null', '3', '6'),
       ('parce que j ai envie', '4', '7'),
       ('sdg', '4', '8'),
       ('nbdfbdaull', '4', '9');