SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smoelenboek`
--
CREATE DATABASE IF NOT EXISTS `smoelenboek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smoelenboek`;

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Inprogess'),
(2, 'Conflict'),
(3, 'Onwijs Koel'),
(4, 'Flying Potatoes'),
(5, 'None');

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `photo` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT 'default.jpg',
  `description` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `photo`, `description`, `group_id`, `category_id`) VALUES
(1, 'Mandy', 'van Zetten', 'mandy@competa.com', '0652415964', 'default.jpg', 'Dummy description, insert some text here', 1, 1),
(2, 'Ruben', 'van der Knaap', 'ruben@competa.com', '0614526545', 'default.jpg', 'Dummy description, insert some text here', 2, 4),
(3, 'Nigel', 'Hoegee', 'nigel@competa.com', '0645617535', 'default.jpg', 'Dummy description, insert some text here', 1, 4),
(4, 'Jonathan', 'Kerkhoven', 'jonathan@competa.com', '0654241413', 'default.jpg', 'Dummy description, insert some text here', 1, 4),
(5, 'Tjeerd', 'Verschragen', 'tjeerd@competa.com', '0687475661', 'default.jpg', 'Dummy description, insert some text here', 1, 4),
(6, 'Michael', 'Netelenbos', 'michael@competa.com', '0678788008', 'default.jpg', 'Dummy description, insert some text here', 3, 4),
(7, 'Ted', 'van Riel', 'ted@competa.com', '0641563481', 'default.jpg', 'Dummy description, insert some text here', 3, 4);

CREATE TABLE IF NOT EXISTS `job_categories`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` ENUM('frontend', 'backend', 'fullstack', 'designer', 'intern'),
  PRIMARY KEY (`id`),
  UNIQUE (`type`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `job_categories` (`id`, `type`) VALUES
(1, 'Frontend'),
(2, 'Backend'),
(3, 'Fullstack'),
(5, 'Designer'),
(4, 'Intern');

CREATE TABLE IF NOT EXISTS `users`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT 'qwerty',
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `permission` ENUM('user', 'admin'),
  UNIQUE KEY `uesername` (`username`),
  UNIQUE KEY `email` (`email`),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `permission`) VALUES
(1, 'admin', '$2y$09$OVlPJVfuzUENJUuPTDUqNeGmsIpTOy5yT1D5b9RDI47jjosgB2W/u', 'email', 'admin');

ALTER TABLE `employees`
  ADD CONSTRAINT `group_lid` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `employees`
  ADD CONSTRAINT `category_lid` FOREIGN KEY (`category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
