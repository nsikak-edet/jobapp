-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2017 at 07:52 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sanbox`
--
CREATE DATABASE IF NOT EXISTS `sanbox` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sanbox`;

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(28) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`id`, `name`, `user_id`) VALUES
(1, 'allkauf Haus GmbH', 1),
(2, 'BAU-FRITZ GmbH & Co. KG', 1),
(3, 'Bien-Zenker GmbH', 1),
(4, 'Büdenbender Hausbau GmbH', 1),
(5, 'Danhaus GmbH', 1),
(6, 'ELK Fertighaus GmbH', 1),
(7, 'FingerHaus GmbH', 1),
(8, 'FINGERHUT HAUS GmbH & Co. KG', 1),
(9, 'FischerHaus GmbH & Co. KG', 1),
(10, 'Hanse Haus GmbH & Co. KG', 1),
(11, 'KAMPA GmbH', 1),
(12, 'Meisterstück-HAUS', 1),
(13, 'OKAL Haus GmbH', 1),
(14, 'RENSCH-HAUS GMBH', 1),
(15, 'SCHWABENHAUS GmbH & Co. KG', 1),
(16, 'SchwürerHaus KG', 1),
(17, 'STREIF Haus GmbH', 1),
(18, 'Tal-Wohnbau GmbH', 1),
(19, 'WeberHaus GmbH & Co. KG', 1),
(20, 'allkauf haus GmbH', 2),
(21, 'Bien-Zenker GmbH', 2),
(22, 'Danhaus GmbH', 2),
(23, 'FingerHaus GmbH', 2),
(24, 'GUSSEK HAUS', 2),
(25, 'HAACKE Haus GmbH + Co. KG', 2),
(26, 'Hanse Haus GmbH & Co. KG', 2),
(27, 'HUF HAUS GmbH u. Co. KG', 2),
(28, 'Kampa GmbH', 2),
(29, 'LUXHAUS Vertrieb GmbH & Co. ', 2),
(30, 'Meisterstück-HAUS', 2),
(31, 'OKAL Haus GmbH', 2),
(32, 'ProHaus GmbH & Co. KG', 2),
(33, 'Schw�rerHaus KG', 2),
(34, 'STREIF Haus GmbH', 2),
(35, 'WeberHaus GmbH & Co. KG', 2),
(36, 'allkauf haus GmbH', 3),
(37, 'BAU-FRITZ GmbH & Co. KG', 3),
(38, 'Bien-Zenker GmbH', 3),
(39, 'B�denbender Hausbau GmbH', 3),
(40, 'Danhaus GmbH', 3),
(41, 'Elk Fertighaus GmbH', 3),
(42, 'FingerHaus GmbH', 3),
(43, 'FINGERHUT HAUS GmbH & Co. KG', 3),
(44, 'GUSSEK HAUS', 3),
(45, 'Haas FERTIGBAU GmbH', 3),
(46, 'HANSE Haus GmbH & Co. KG', 3),
(47, 'holz & raum GmbH & Co. KG', 3),
(48, 'HUF Haus GmbH & Co. KG', 3),
(49, 'KAMPA GmbH', 3),
(50, 'LUXHAUS Vertrieb GmbH & Co. ', 3),
(51, 'Meisterst�ck-HAUS', 3),
(52, 'NORDHAUS Fertigbau GmbH', 3),
(53, 'OKAL Haus GmbH', 3),
(54, 'Rensch-Haus GmbH', 3),
(55, 'Schwabenhaus GmbH & Co. KG', 3),
(56, 'Schw�rerHaus KG', 3),
(57, 'Stommel Haus GmbH', 3),
(58, 'STREIF Haus GmbH', 3),
(59, 'WeberHaus GmbH & Co. KG', 3),
(60, 'allkauf Haus GmbH', 4),
(61, 'Bien-Zenker GmbH', 4),
(62, 'Danhaus GmbH', 4),
(63, 'ELK Fertighaus GmbH', 4),
(64, 'Fertighaus WEISS GmbH', 4),
(65, 'FingerHaus GmbH', 4),
(66, 'FINGERHUT HAUS GmbH & Co. KG', 4),
(67, 'FischerHaus GmbH & Co. KG', 4),
(68, 'Haas FERTIGBAU GmbH', 4),
(69, 'Hanse Haus GmbH & Co. KG', 4),
(70, 'HUF HAUS GmbH u. Co. KG', 4),
(71, 'KAMPA GmbH', 4),
(72, 'LUXHAUS Vertrieb GmbH & Co. ', 4),
(73, 'RENSCH-HAUS GMBH', 4),
(74, 'Rubner Haus AG', 4),
(75, 'SCHWABENHAUS GmbH & Co. KG', 4),
(76, 'Schw�rerHaus KG', 4),
(77, 'STREIF Haus GmbH', 4),
(78, 'allkauf Haus GmbH', 5),
(79, 'Bien-Zenker GmbH', 5),
(80, 'B�denbender Hausbau GmbH', 5),
(81, 'Danhaus GmbH', 5),
(82, 'FingerHaus GmbH', 5),
(83, 'FINGERHUT HAUS GmbH & Co. KG', 5),
(84, 'Franz Gussek GmbH & Co. KG', 5),
(85, 'Hanse Haus GmbH & Co. KG', 5),
(86, 'holz & raum GmbH & Co. KG', 5),
(87, 'HUF HAUS GmbH u. Co. KG', 5),
(88, 'KAMPA GmbH', 5),
(89, 'NORDHAUS Fertigbau GmbH', 5),
(90, 'OKAL Haus GmbH', 5),
(91, 'Partner-Haus Fertigbau GmbH ', 5),
(92, 'ProHaus GmbH & Co. KG', 5),
(93, 'RENSCH-HAUS GmbH', 5),
(94, 'SCHWABENHAUS GmbH & Co. KG', 5),
(95, 'Schw�rerHaus KG', 5),
(96, 'WeberHaus GmbH & Co. KG', 5);

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `consultant` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `count_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `company`, `consultant`, `customer_name`, `count_id`, `user_id`, `date_created`) VALUES
(2, '3', 'test', 'test', 3, 1, '2016-12-19 16:14:12'),
(3, '58', 'Mike Habich', 'Mustermann', 1, 3, '2016-12-19 18:13:59'),
(5, '8', 'Herr Brawanski', 'Leimer', 1, 1, '2016-12-19 18:37:24'),
(6, '6', 'Herr Zangl', 'Pfeiffer', 1, 1, '2016-12-19 18:38:15'),
(7, '12', 'Herr Bornkessel', 'Musterman', 1, 1, '2016-12-19 18:39:03'),
(8, '2', 'Herr Zangl', 'Jurack', 1, 1, '2016-12-19 18:39:34'),
(9, '12', 'Herr Hofmann', 'Sawatzke', 1, 1, '2016-12-19 18:41:17'),
(10, '2', 'Herr Hofmann', 'Geuss', 4, 1, '2016-12-19 18:42:00'),
(11, '17', 'Herr Kosma', 'Geier', 1, 1, '2016-12-19 18:42:40'),
(12, '12', 'Herr KÃ¼bel', 'Windeck', 4, 1, '2016-12-19 18:43:32'),
(13, '21', 'Herr Brawanski', 'Schmitz', 3, 2, '2016-12-19 18:44:26'),
(14, '28', 'Herr Brawanski', 'Schmitz', 1, 2, '2016-12-19 18:45:05'),
(15, '31', 'Herr Brawanski', 'Bienentreu', 1, 2, '2016-12-19 18:45:57'),
(16, '26', 'Herr Hoffmann', 'Pahlke', 1, 2, '2016-12-19 18:46:30'),
(17, '8', 'Herr Kosma', 'Frau Schmidt', 2, 1, '2016-12-19 18:47:57'),
(18, '2', 'Herr KÃ¼bel', 'Peris', 2, 1, '2016-12-19 18:49:19'),
(19, '6', 'Herr Mustermann', 'Mustermann', 2, 1, '2016-12-19 18:49:43'),
(20, '34', 'Frau Hitschfel', 'Frau Schmitz', 1, 2, '2016-12-19 18:56:16'),
(21, '28', 'Frau Hitschfel', 'MÃ¼ller', 2, 2, '2016-12-19 18:56:47'),
(22, '30', 'Frau Hitschfel', 'Muster', 3, 2, '2016-12-19 18:57:17'),
(23, '27', 'Frau Hitschfel', 'Klausen', 4, 2, '2016-12-19 18:57:45'),
(24, '23', 'Herr Brawanski', 'Claus', 4, 2, '2016-12-19 18:58:37'),
(25, '49', 'Herr KÃ¼bel', 'Clausen', 1, 3, '2016-12-21 17:16:46'),
(26, '53', 'Herr KÃ¼bel', 'Schmitz', 4, 3, '2016-12-21 17:17:11'),
(27, '44', 'Frau GrÃ¼bel', 'Mustermann', 2, 3, '2016-12-21 17:17:25'),
(28, '66', 'blub', 'test', 3, 4, '2016-12-19 19:03:51'),
(29, '68', 'test', 'test', 4, 4, '2016-12-19 19:04:00'),
(30, '71', 'test', 'test', 2, 4, '2016-12-19 19:04:21'),
(31, '73', 'test', 'test', 1, 4, '2016-12-19 19:04:36'),
(32, '69', 'test', 'test', 1, 4, '2016-12-19 19:04:47'),
(33, '84', 'Herr GrÃ¼bel', 'Herr Mustermann', 1, 5, '2016-12-19 19:05:48'),
(34, '84', 'test', 'test', 4, 5, '2016-12-19 19:06:10'),
(35, '92', 'Herr Mustermann', 'Frau Mustermann', 1, 5, '2016-12-19 19:06:26'),
(36, '92', 'test', 'test', 3, 5, '2016-12-19 19:06:35'),
(37, '90', 'test', 'test', 2, 5, '2016-12-19 19:06:45'),
(38, '93', 'test', 'test', 2, 5, '2016-12-19 19:06:57'),
(39, '8', 'Test', 'Test', 2, 1, '2016-12-19 20:24:50'),
(40, '17', 'Herr Mustermann', 'Mustermann', 2, 1, '2016-12-20 06:56:05'),
(41, '12', 'Herr Mustermann', 'Muster', 1, 1, '2016-12-20 06:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `eng_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`, `eng_name`) VALUES
(1, 'Januar', 'January'),
(2, 'Februar', 'February'),
(3, 'März', 'March'),
(4, 'April', 'April'),
(5, 'Mai', 'May'),
(6, 'Juni', 'June'),
(7, 'Juli', 'July'),
(8, 'August', 'August'),
(9, 'September', 'September'),
(10, 'Oktober', 'October'),
(11, 'November', 'November'),
(12, 'Dezember', 'December');

-- --------------------------------------------------------

--
-- Table structure for table `multiplier`
--

CREATE TABLE IF NOT EXISTS `multiplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` int(11) NOT NULL,
  `money_value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `multiplier`
--

INSERT INTO `multiplier` (`id`, `name`, `value`, `money_value`) VALUES
(1, 'Einzelperson', 1, 1.5),
(2, 'Familie', 1, 2.5),
(3, '3 Personen', 3, 1.5),
(4, '4 Personen', 4, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch`, `password`) VALUES
(1, 'GBurg', '16d7a4fca7442dda3ad93c9a726597e4'),
(2, 'HAJ', '9ef99216f7f50deee50e6a46de36f2d9'),
(3, 'Köln', 'ec6f4a2b75ffb2361fc5daff02d515f1'),
(4, 'NUE', '53fcaefa557607dcbbc389bfb4a450a2'),
(5, 'WUP', 'd4172f46ed1f7088ecc03927770bfdb8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
