-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for jobfind
DROP DATABASE IF EXISTS `jobfind`;
CREATE DATABASE IF NOT EXISTS `jobfind` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `jobfind`;


-- Dumping structure for table jobfind.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.categories: ~25 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`) VALUES
	(1, 'Accounting'),
	(2, 'Administration & Office Support'),
	(3, 'Advertising Arts & Media'),
	(4, 'Banking & Financial Services'),
	(5, 'Call Center & Financial Support'),
	(6, 'CEO & General Management'),
	(7, 'Community Services & Development'),
	(8, 'Construction'),
	(9, 'Consulting & Strategy'),
	(10, 'Design & Architecture'),
	(11, 'Education & Training'),
	(12, 'Engineering'),
	(13, 'Farming Animals & Conservation'),
	(14, 'Government & Defence'),
	(15, 'Healthcare & Medical'),
	(16, 'Hospitality & Tourism'),
	(17, 'Human Resources & Recruitment'),
	(18, 'Information & Communication Technology'),
	(19, 'Insurance & Superannuation'),
	(20, 'Legal'),
	(21, 'Manufacturing Transport & Logistics'),
	(22, 'Marketing & Communications'),
	(23, 'Mining Resources'),
	(24, 'Real Estate & Property'),
	(25, 'Retail & Consumer Products'),
	(26, 'Science & Technology'),
	(27, 'Sports & Recreation'),
	(28, 'Trades & Services');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table jobfind.city
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_province_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_name` (`city_name`),
  KEY `FK__province` (`fk_province_id`),
  CONSTRAINT `FK__province` FOREIGN KEY (`fk_province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.city: ~36 rows (approximately)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `fk_province_id`, `city_name`) VALUES
	(1, 9, 'Berat'),
	(2, 3, 'Bulqizë'),
	(3, 12, 'Delvinë'),
	(4, 10, 'Devoll'),
	(5, 3, 'Dibrë'),
	(6, 6, 'Durrës'),
	(7, 7, 'Elbasan'),
	(8, 8, 'Fier'),
	(9, 11, 'Gjirokastër'),
	(10, 7, 'Gramsh'),
	(11, 2, 'Has'),
	(12, 5, 'Kavajë'),
	(13, 10, 'Kolonjë'),
	(14, 10, 'Korçë'),
	(15, 6, 'Krujë'),
	(16, 9, 'Kuçovë'),
	(17, 2, 'Kukës'),
	(18, 4, 'Kurbin'),
	(19, 4, 'Lezhë'),
	(20, 7, 'Librazhd'),
	(21, 8, 'Lushnjë'),
	(22, 1, 'Malësi e Madhe'),
	(23, 8, 'Mallakastër'),
	(24, 3, 'Mat'),
	(25, 4, 'Mirditë'),
	(26, 7, 'Peqin'),
	(27, 11, 'Përmet'),
	(28, 10, 'Pogradec'),
	(29, 1, 'Pukë'),
	(30, 12, 'Sarandë'),
	(31, 1, 'Shkodër'),
	(32, 9, 'Skrapar'),
	(33, 11, 'Tepelenë'),
	(34, 5, 'Tiranë'),
	(35, 2, 'Tropojë'),
	(36, 12, 'Vlorë');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Dumping structure for table jobfind.detyra4
DROP TABLE IF EXISTS `detyra4`;
CREATE TABLE IF NOT EXISTS `detyra4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `val` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.detyra4: ~3 rows (approximately)
DELETE FROM `detyra4`;
/*!40000 ALTER TABLE `detyra4` DISABLE KEYS */;
INSERT INTO `detyra4` (`id`, `name`, `val`, `lat`, `lng`) VALUES
	(1, 'Numri 1', 123456, 45.67, 45.67),
	(2, 'name1', 342342, 41.765, -33.876),
	(3, 'name2', 234234, 54.987, -47.987);
/*!40000 ALTER TABLE `detyra4` ENABLE KEYS */;


-- Dumping structure for table jobfind.detyra6
DROP TABLE IF EXISTS `detyra6`;
CREATE TABLE IF NOT EXISTS `detyra6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adress` varchar(500) DEFAULT NULL,
  `radius` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.detyra6: ~4 rows (approximately)
DELETE FROM `detyra6`;
/*!40000 ALTER TABLE `detyra6` DISABLE KEYS */;
INSERT INTO `detyra6` (`id`, `adress`, `radius`) VALUES
	(1, 'Tirane', 200),
	(2, 'Jeronin De Rada', 500),
	(3, 'Durres', 10000),
	(4, 'Emin Duraku', 30000);
/*!40000 ALTER TABLE `detyra6` ENABLE KEYS */;


-- Dumping structure for table jobfind.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL DEFAULT '0',
  `fk_category_id` int(11) NOT NULL DEFAULT '0',
  `fk_type_id` int(11) NOT NULL DEFAULT '0',
  `fk_city_id` int(11) NOT NULL DEFAULT '0',
  `company_name` varchar(250) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '0',
  `description` varchar(1000) NOT NULL,
  `latitude` float NOT NULL DEFAULT '41.3273',
  `longtitude` float NOT NULL DEFAULT '19.8187',
  `ext` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_jobs_users` (`fk_user_id`),
  KEY `FK_jobs_categories` (`fk_category_id`),
  KEY `FK_jobs_type` (`fk_type_id`),
  KEY `FK_jobs_city` (`fk_city_id`),
  CONSTRAINT `FK_jobs_categories` FOREIGN KEY (`fk_category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_jobs_city` FOREIGN KEY (`fk_city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `FK_jobs_type` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `FK_jobs_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.jobs: ~7 rows (approximately)
DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id`, `fk_user_id`, `fk_category_id`, `fk_type_id`, `fk_city_id`, `company_name`, `title`, `description`, `latitude`, `longtitude`, `ext`, `created_at`) VALUES
	(15, 2, 1, 1, 34, 'GamerStation', 'Accountant Manager', 'We are looking for an accounting manager to hire.\r\nThe pay is good and you will be satisfied with the work conditions.', 41.3273, 19.8187, 'jpg', '2016-04-13 23:24:15'),
	(16, 2, 3, 3, 34, 'GamerStation', 'Art Models', 'Looking to hire someone who is efficient at working with programs like Illustrator, Photoshop etc. Pay is above job average.', 41.3273, 19.8187, 'jpg', '2016-04-13 23:32:13'),
	(17, 1, 13, 1, 30, 'joni shpk.', 'Farmer', 'Looking for a farmer who has expierience working with corn fields, 2-3 years minimum. Working conditions and hours are adjustable.', 39.8539, 20.0223, 'jpg', '2016-04-13 23:34:15'),
	(18, 1, 18, 2, 14, 'Google', 'Experienced Web Developer', 'Do you think you\'re a  good Web Developer? Google is hiring right now in Albania, looking for skilled individuals who are willing to dedicate their passion and skills to our work.', 40.6167, 20.7787, 'jpg', '2016-04-13 23:35:24'),
	(19, 6, 28, 1, 5, 'kaci shpk', 'Secretary', 'Looking for someone with 6 months minimum working as a secretary. Must be able to write fast, read fast and able to follow orders.', 41.6849, 20.4287, 'jpg', '2016-04-13 23:36:24'),
	(20, 7, 16, 1, 35, 'Martin sha', 'Tourist Guide', 'Must be able to work under pressure, speak fluently English and Italian.', 42.3977, 20.1627, 'jpg', '2016-04-13 23:37:49'),
	(21, 8, 12, 3, 36, 'Stine Records', 'Sound Engineer', 'Our company wants to hire a sound engineer  in the city of Vlora.', 40.4568, 19.4874, 'jpg', '2016-04-13 23:39:46');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


-- Dumping structure for table jobfind.province
DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.province: ~11 rows (approximately)
DELETE FROM `province`;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(9, 'Berat'),
	(3, 'Dibër'),
	(6, 'Durrës'),
	(7, 'Elbasan'),
	(8, 'Fier'),
	(11, 'Gjirokastër'),
	(10, 'Korçë'),
	(2, 'Kukës'),
	(4, 'Lezhë'),
	(1, 'Shkoder'),
	(5, 'Tiranë'),
	(12, 'Vlorë');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;


-- Dumping structure for table jobfind.type
DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL DEFAULT 'F',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.type: ~3 rows (approximately)
DELETE FROM `type`;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `type_name`, `color`) VALUES
	(1, 'Full-time', '#81b800'),
	(2, 'Part-Time', '#4c9ef1'),
	(3, 'Freelancer', '#9e2eac');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;


-- Dumping structure for table jobfind.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access` enum('admin','normal') NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table jobfind.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `created_at`, `access`) VALUES
	(1, 'Joni', 'Seraj', 'Administrator', '81dc9bdb52d04dc20036dbd8313ed055', 'serajjoni@gmail.com', '2016-04-11 14:03:03', 'admin'),
	(2, 'Jurgen', 'Serbo', 'jurgens37', '81dc9bdb52d04dc20036dbd8313ed055', 'jurgenserbo@gmail.com', '2016-04-11 17:29:22', 'normal'),
	(6, 'Jurgen', 'Vorfi', 'jvorfi', '81dc9bdb52d04dc20036dbd8313ed055', 'jvorfi@gmail.com', '2016-04-13 01:02:45', 'normal'),
	(7, 'Juljana', 'Pjeternikaj', 'juli', '81dc9bdb52d04dc20036dbd8313ed055', 'juli@gmail.com', '2016-04-13 01:03:21', 'normal'),
	(8, 'Gezim', 'Shehu', 'jimmy', '81dc9bdb52d04dc20036dbd8313ed055', 'stinerecords@gmail.com', '2016-04-13 01:03:58', 'normal'),
	(9, 'Jurgen', 'Zanaj', 'jurvor123', '81dc9bdb52d04dc20036dbd8313ed055', 'pol@yahoo.com', '2016-04-14 12:32:05', 'normal');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
