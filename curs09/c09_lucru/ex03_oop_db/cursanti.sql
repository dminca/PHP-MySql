-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2010 at 06:47 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cursanti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cursanti`
--

CREATE TABLE IF NOT EXISTS `cursanti` (
  `cursantId` int(11) NOT NULL AUTO_INCREMENT,
  `nume` char(50) NOT NULL,
  `prenume` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `studii` enum('liceu','facultate') NOT NULL,
  PRIMARY KEY (`cursantId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cursanti`
--

INSERT INTO `cursanti` (`cursantId`, `nume`, `prenume`, `email`, `studii`) VALUES
(1, 'Popa', 'Mihai', 'mpopa@gmail.com', 'liceu'),
(2, 'Mihai', 'Stefan', 'smihai@gmail.com', 'facultate'),
(3, 'Ionescu', 'Ana', 'aionescu@gamil.com', 'facultate'),
(4, 'Stanescu', 'Maria', 'mstanescu@yahoo.com', 'facultate');
