use exercise_looper;
-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.5.10-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table exercise_looper. answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` text NOT NULL,
  `fields_id` int(11) NOT NULL,
  `takes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`fields_id`,`takes_id`),
  UNIQUE KEY `unique_take_for_answer` (`fields_id`,`takes_id`),
  KEY `fk_answers_fields1_idx` (`fields_id`),
  KEY `fk_answers_takes1_idx` (`takes_id`),
  CONSTRAINT `fk_answers_fields1` FOREIGN KEY (`fields_id`) REFERENCES `fields` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_answers_takes1` FOREIGN KEY (`takes_id`) REFERENCES `takes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table exercise_looper.answers : ~12 rows (environ)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `response`, `fields_id`, `takes_id`) VALUES
	(1, 'parce que', 1, 1),
	(2, 'woula', 1, 2),
	(3, 'boomer', 1, 3),
	(4, 'jsp', 2, 4),
	(5, 'ok', 2, 5),
	(6, 'pourquoi pas', 2, 6),
	(7, 'c\'est ça ?', 3, 4),
	(8, 'quoi ?', 3, 5),
	(9, 'null', 3, 6),
	(10, 'parce que j ai envie', 4, 7),
	(11, 'sdg', 4, 8),
	(12, 'nbdfbdaull', 4, 9);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Listage de la structure de la table exercise_looper. exercises
DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table exercise_looper.exercises : ~3 rows (environ)
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` (`id`, `title`, `state`) VALUES
	(1, 'Pourquoi la vie', 0),
	(2, 'Pourquoi la mort', 1),
	(3, 'Pourquoi les zombies', 2);
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;

-- Listage de la structure de la table exercise_looper. fields
DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `value_kind` int(11) NOT NULL,
  `exercises_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`exercises_id`),
  KEY `fk_fields_exercises1_idx` (`exercises_id`),
  CONSTRAINT `fk_fields_exercises1` FOREIGN KEY (`exercises_id`) REFERENCES `exercises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table exercise_looper.fields : ~4 rows (environ)
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
INSERT INTO `fields` (`id`, `label`, `value_kind`, `exercises_id`) VALUES
	(1, 'Pourquoi les humains existent ?', 0, 1),
	(2, 'Comment ça ce fait qu\'on ait pas encore de remède ?', 1, 2),
	(3, 'Faudrait-il être immortel ?', 0, 2),
	(4, 'Comment ça peut exister ?', 2, 3);
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;

-- Listage de la structure de la table exercise_looper. takes
DROP TABLE IF EXISTS `takes`;
CREATE TABLE IF NOT EXISTS `takes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table exercise_looper.takes : ~10 rows (environ)
/*!40000 ALTER TABLE `takes` DISABLE KEYS */;
INSERT INTO `takes` (`id`, `time_stamp`) VALUES
	(1, '2021-10-02 10:02:30'),
	(2, '2021-10-02 10:12:30'),
	(3, '2021-10-03 10:32:30'),
	(4, '2021-10-03 11:12:30'),
	(5, '2021-10-03 11:32:30'),
	(6, '2021-10-03 12:12:30'),
	(7, '2021-10-03 12:32:30'),
	(8, '2021-10-03 13:12:30'),
	(9, '2021-10-03 13:32:30'),
	(10, '2021-11-29 10:36:32');
/*!40000 ALTER TABLE `takes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
