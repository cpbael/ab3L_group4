-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2013 at 10:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `username` varchar(16) CHARACTER SET latin1 NOT NULL,
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `username`, `id`) VALUES
('21232f297a57a5a743894a0e4a801fc3', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(8) NOT NULL AUTO_INCREMENT,
  `uname` varchar(16) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(32) CHARACTER SET latin1 NOT NULL,
  `contactno` varchar(16) CHARACTER SET latin1 NOT NULL,
  `eadd` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `uname`, `password`, `fullname`, `contactno`, `eadd`) VALUES
(10, 'kevin', '5d41402abc4b2a76b9719d911017c592', 'Kevin Romas', '11222', 'kevin@gmail.com'),
(12, 'cpbael', '2e3817293fc275dbee74bd71ce6eb056', 'Claudine ', '2147483647', 'cpbael@gmail.com'),
(13, 'claudinebael', '81dc9bdb52d04dc20036dbd8313ed055', 'Claudine ', '2147483647', 'cpbael@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_Member` int(1) NOT NULL COMMENT 'boolean',
  `member_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `is_Paid` int(1) NOT NULL DEFAULT '0' COMMENT 'boolean',
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `service_id`, `start_date`, `end_date`, `is_Member`, `member_id`, `price`, `is_Paid`) VALUES
(25, 15, '2013-02-21 00:00:00', '2013-02-28 00:00:00', 1, 10, 16800, 1),
(41, 16, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 10, 900, 1),
(42, 16, '2013-02-21 11:00:00', '2013-02-22 11:00:00', 1, 10, 900, 1),
(45, 16, '2013-03-28 11:00:00', '2013-03-29 11:00:00', 1, 10, 900, 1),
(46, 15, '2013-02-20 11:00:00', '2013-02-20 11:00:00', 1, 10, 0, 1),
(47, 16, '2013-02-26 11:00:00', '2013-02-27 11:00:00', 1, 10, 900, 1),
(50, 16, '2013-03-26 11:00:00', '2013-03-28 11:00:00', 1, 10, 1800, 1),
(51, 15, '2015-02-25 11:00:00', '2015-02-27 11:00:00', 1, 13, 1000, 1),
(52, 16, '2013-02-28 11:00:00', '2013-03-07 11:00:00', 1, 13, 6300, 1),
(53, 18, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 13, 500, 1),
(54, 18, '2013-03-06 11:00:00', '2013-03-07 11:00:00', 1, 13, 500, 1),
(55, 15, '2013-02-28 11:00:00', '2013-03-05 11:00:00', 1, 13, 2500, 1),
(56, 13, '2013-03-07 11:00:00', '2013-03-08 11:00:00', 1, 13, 977689, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(8) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(32) NOT NULL,
  `rate` double NOT NULL,
  `classification` varchar(32) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(32) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `rate`, `classification`, `article`, `image`) VALUES
(13, 'kdj', 977689, 'ROOM', 'askfhaksfjkasfjiadsjdoas', '5.jpg'),
(15, 'Room 505', 500, 'ROOM', 'haha', '461093_10150681382032832_4752465'),
(16, 'asdas', 900, 'ROOM', 'asdasdad', '4.jpg'),
(18, 'bRoom room', 500, 'ROOM', 'jkhfghhhgfdcghjjkkhjhhyiu', 'a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `classification` enum('ROOM','SERVICE','FACILITY') NOT NULL,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `classification` (`classification`),
  UNIQUE KEY `classification_2` (`classification`),
  UNIQUE KEY `classification_3` (`classification`),
  KEY `classification_fk` (`classification`),
  KEY `classification_fk_2` (`classification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `type`
--

