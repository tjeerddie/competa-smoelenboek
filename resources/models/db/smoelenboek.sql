-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 sep 2016 om 13:09
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smoelenboek`
--

-- --------------------------------------------------------

<<<<<<< HEAD
--
-- Tabelstructuur voor tabel `employees`
--
=======
INSERT INTO `groups` (`id`, `name`) VALUES
(2, 'blablablablblablablablablab'),
(4, 'flying POTATOES'),
(1, 'inprogess'),
(3, 'super slecht');
>>>>>>> develop

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `photo` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT 'default.jpg',
  `description` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `photo`, `description`, `address`, `city`, `group_id`, `category_id`) VALUES
(1, 'Test', 'Henk', 'de Tester', 'tester@competa.com', '0611111111', 'default.jpg', 'blablablablablablablablablablabla', 'Teststraat 11', 'Test City', 1, 1),
(2, 'Ruben', 'gedoopt', 'van der Knaap', 'ruben@ruby.com', '0601189998', 'default.jpg', 'blablablablablablablablablabla', 'blablablabla', 'blablabla', 2, 4),
(3, 'Nigel', 'ryan', 'hoegee', 'nigel@hoegee.com', '061234565l', 'default.jpg', 'in progress of making', 'ergens', 'anders', 1, 4),
(4, 'Jonathan', 'ja inderdaad', 'kerkhoven', 'jonathan@competa.com', '06vivefour', 'default.jpg', 'in progress of making', 'ergens', 'bove', 1, 4),
(5, 'tjeerd', NULL, 'verschragen', 'tjeerd@ompeta.com', '0687654321', 'default.jpg', 'in progress of making', 'dakloos', 'ergens', 1, 4),
(6, 'michael', NULL, 'netelenbos', 'michael@competa.com', '0678788008', 'default.jpg', 'lorem ipsum', 'ook weer ergens', 'eentje in nederland', 3, 4),
(7, 'ted', '', 'Van riel', 'ted@competa.com', '0666666665', 'default.jpg', 'geen', 'ergens', 'ook weer eentje', 3, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(2, 'blablablablblablablablablab'),
(4, 'flying POTATOES'),
(1, 'inprogess'),
(3, 'super slecht');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `type` enum('frontend','backend','fullstack','designer','intern') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `job_categories`
--

INSERT INTO `job_categories` (`id`, `type`) VALUES
(1, 'frontend'),
(2, 'backend'),
(3, 'fullstack'),
(5, 'designer'),
(4, 'intern');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT 'qwerty',
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `permission` ENUM('user', 'admin'),
  UNIQUE KEY `uesername` (`username`),
  UNIQUE KEY `email` (`email`),
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `permission`) VALUES
(1, 'testUser', '$2y$09$OVlPJVfuzUENJUuPTDUqNeGmsIpTOy5yT1D5b9RDI47jjosgB2W/u', 'email', 'admin'),
(2, 'test', 'blablabla', 'test@gtfo.com', 'admin'),
(3, 'bert', 'qwerty', 'bert@bern.com', 'user');

ALTER TABLE `employees`
  ADD CONSTRAINT `group_lid` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `employees`
  ADD CONSTRAINT `category_lid` FOREIGN KEY (`category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
