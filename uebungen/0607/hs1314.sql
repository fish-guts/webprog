-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2013 at 01:25 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hs1314`
--
CREATE DATABASE IF NOT EXISTS `hs1314` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `hs1314`;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_bin NOT NULL,
  `text` mediumtext COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `date`, `user`, `title`, `text`, `status`) VALUES
(1, '2013-10-21 00:53:21', 1, 'Test Todo', 'dies ist ein test', 2),
(2, '2013-10-10 22:14:22', 1, 'Test Todo', 'Dies ist mein erster Eintrag', 2),
(3, '0000-00-00 00:00:00', 1, 'Test Todo', 'dgdsgf', 1),
(4, '2013-10-10 22:14:22', 1, 'Test Todo', 'Dies ist mein erster Eintrag', 2),
(5, '2013-10-21 01:21:42', 1, 'neu', 'NEUNEUNEU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `todo_status`
--

CREATE TABLE IF NOT EXISTS `todo_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `todo_status`
--

INSERT INTO `todo_status` (`id`, `name`) VALUES
(1, 'Open'),
(2, 'Complete'),
(3, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `realname` varchar(64) COLLATE utf8_bin NOT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `realname`, `email`) VALUES
(1, 'smueller', '2d7e3250c4d4a5fcbd7f3e16463ed676', 'Severin Müller', 'muelles5@students.zhaw.ch');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
