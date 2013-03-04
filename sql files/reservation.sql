-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2013 at 05:32 AM
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
  `flag` int(2) NOT NULL DEFAULT '0' COMMENT '0:reserved;1:checked in; -1:checked out',
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `service_id`, `start_date`, `end_date`, `is_Member`, `member_id`, `price`, `is_Paid`, `flag`) VALUES
(25, 15, '2013-02-21 00:00:00', '2013-02-28 00:00:00', 1, 10, 16800, 1, 0),
(41, 16, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 10, 900, 1, 0),
(42, 16, '2013-02-21 11:00:00', '2013-02-22 11:00:00', 1, 10, 900, 1, 0),
(45, 16, '2013-03-28 11:00:00', '2013-03-29 11:00:00', 1, 10, 900, 1, 0),
(46, 15, '2013-02-20 11:00:00', '2013-02-20 11:00:00', 1, 10, 0, 1, 0),
(47, 16, '2013-02-26 11:00:00', '2013-02-27 11:00:00', 1, 10, 900, 1, 0),
(50, 16, '2013-03-26 11:00:00', '2013-03-28 11:00:00', 1, 10, 1800, 1, 0),
(51, 15, '2015-02-25 11:00:00', '2015-02-27 11:00:00', 1, 13, 1000, 1, 0),
(52, 16, '2013-02-28 11:00:00', '2013-03-07 11:00:00', 1, 13, 6300, 1, 0),
(53, 18, '2013-02-27 11:00:00', '2013-02-28 11:00:00', 1, 13, 500, 1, 0),
(54, 18, '2013-03-06 11:00:00', '2013-03-07 11:00:00', 1, 13, 500, 1, 0),
(55, 15, '2013-02-28 11:00:00', '2013-03-05 11:00:00', 1, 13, 2500, 1, 0),
(56, 13, '2013-03-07 11:00:00', '2013-03-08 11:00:00', 1, 13, 977689, 1, 1),
(57, 16, '2014-03-26 11:00:00', '2014-03-28 11:00:00', 1, 13, 1800, 0, -1),
(58, 18, '2013-03-28 11:00:00', '2013-03-29 11:00:00', 0, 1, 500, 0, -1),
(59, 18, '2013-03-30 11:00:00', '2013-03-31 11:00:00', 0, 2, 500, 0, -1),
(60, 15, '2013-03-30 11:00:00', '2013-03-31 11:00:00', 0, 3, 500, 0, -1),
(61, 13, '2013-03-20 11:00:00', '2013-03-28 11:00:00', 0, 2, 7821510, 0, -1),
(62, 15, '2013-03-17 11:00:00', '2013-03-18 11:00:00', 0, 2, 500, 0, -1),
(63, 30, '2013-03-19 11:00:00', '2013-03-27 11:00:00', 1, 13, 7104, 0, -1),
(64, 29, '2013-03-17 11:00:00', '2013-03-21 11:00:00', 0, 4, 3600, 0, -1);
