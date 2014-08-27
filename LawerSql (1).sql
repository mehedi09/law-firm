-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2012 at 08:08 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lawyer`
--
CREATE DATABASE `lawyer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lawyer`;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_person`
--

CREATE TABLE IF NOT EXISTS `assigned_person` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) NOT NULL,
  `lower_id` int(11) NOT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assigned_person`
--


-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE IF NOT EXISTS `case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) NOT NULL,
  `parties` varchar(100) NOT NULL,
  `present_status` varchar(100) NOT NULL,
  `next_step` varchar(100) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `sub_category_name` varchar(40) NOT NULL,
  `file_location` varchar(100) NOT NULL,
  `case_submitted_date` date NOT NULL,
  `person_assigned` int(60) NOT NULL,
  PRIMARY KEY (`case_id`),
  UNIQUE KEY `ref` (`ref`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`case_id`, `ref`, `parties`, `present_status`, `next_step`, `category_name`, `sub_category_name`, `file_location`, `case_submitted_date`, `person_assigned`) VALUES
(1, 'ab12', '', '', '', '', '', 'bd', '2012-01-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(40) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`),
  UNIQUE KEY `category_name_2` (`category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(3, 'aa'),
(4, 'bb'),
(5, 'cc'),
(6, 'law'),
(7, 'dd'),
(8, 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_info`
--

CREATE TABLE IF NOT EXISTS `lawyer_info` (
  `lawyer_id` int(40) NOT NULL AUTO_INCREMENT,
  `pass` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `lawyer_name` varchar(40) NOT NULL,
  `create_by` int(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  PRIMARY KEY (`lawyer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lawyer_info`
--

INSERT INTO `lawyer_info` (`lawyer_id`, `pass`, `email`, `lawyer_name`, `create_by`, `type`) VALUES
(1, 'a', 'a@a', 'a', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `next`
--

CREATE TABLE IF NOT EXISTS `next` (
  `next_id` int(18) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) NOT NULL,
  `next_step` varchar(256) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`next_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `next`
--


-- --------------------------------------------------------

--
-- Table structure for table `present`
--

CREATE TABLE IF NOT EXISTS `present` (
  `present_id` int(18) NOT NULL AUTO_INCREMENT,
  `ref` varchar(60) NOT NULL,
  `present_status` varchar(256) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`present_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `present`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `category_name` varchar(40) NOT NULL,
  `sub_category_name` varchar(40) NOT NULL,
  UNIQUE KEY `category_name` (`category_name`,`sub_category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`category_name`, `sub_category_name`) VALUES
('aa', 'a'),
('aa', 'apple'),
('aa', 'b'),
('aa', 'c'),
('aa', 'd'),
('bb', 'b'),
('cc', 'c'),
('dd', 'd');
