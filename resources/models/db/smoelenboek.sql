SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `smoelenboek`
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
(1, 'inprogess');

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT 'default.jpg',
  `description` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `employees` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `photo`, `description`, `address`, `city`, `group_id`, `category_id`) VALUES
(1, 'Test', 'Henk', 'de Tester', 'tester@competa.com', '0611111111', '', 'blablablablablablablablablablabla', 'Teststraat 11', 'Test City', '1', '1');

CREATE TABLE IF NOT EXISTS `job_categories`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` ENUM('frontend', 'backend', 'fullstack', 'designer', 'intern'),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `job_categories` (`id`, `type`) VALUES
(1, 'frontend');

CREATE TABLE IF NOT EXISTS `users`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT 'qwerty',
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `permission` ENUM('user', 'admin'),
  UNIQUE KEY `uesername` (`username`),
  UNIQUE KEY `email` (`email`),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `users`(`id`, `username`, `password`, `email`, `permission`) VALUES
(1, 'testUser', 'password', 'email', 'admin');