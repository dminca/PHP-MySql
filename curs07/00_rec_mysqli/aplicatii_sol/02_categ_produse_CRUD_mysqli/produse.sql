-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2012 at 07:23 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `produse`
--
CREATE DATABASE `produse` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `produse`;

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE IF NOT EXISTS `categ` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `denumire` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `denumire` (`denumire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorii`
--

CREATE TABLE IF NOT EXISTS `categorii` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `denumire` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `denumire` (`denumire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categorii`
--

INSERT INTO `categorii` (`id`, `denumire`) VALUES
(1, 'laptopuri'),
(2, 'periferice'),
(3, 'software'),
(7, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) unsigned NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `pret` decimal(11,2) NOT NULL,
  `cantitate` int(11) unsigned NOT NULL,
  `um` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `denumire` (`denumire`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `idCategorie`, `denumire`, `descriere`, `pret`, `cantitate`, `um`) VALUES
(1, 1, 'Asus X54C-SX161D', 'procesor Intel Celeron Dual-CoreTM B815, 1.60GHz, 2GB, 500GB, Intel HD Graphics, FreeDOS', 1269.00, 10, 'buc'),
(3, 0, 'HP', 'sds sdfsd', 5.00, 10, 'buc'),
(4, 0, 'eerter', 'erter', 32.00, 342, 'buc'),
(5, 1, 'eerter', 'erter', 32.00, 342, 'buc'),
(6, 3, 'eerfre', 'evd', 32.00, 342, 'buc'),
(7, 0, 'ggdfg', 'dfgdf', 34.00, 34, 'buc'),
(8, 0, 'cvbcv', 'cbvccv', 432.00, 32, 'buc'),
(9, 7, 'vbnv', 'vbnvbn', 453.40, 678, 'jghj'),
(10, 0, 'cvxcv', 'xcvxcv', 3432.00, 342, 'buc'),
(11, 3, 'vfv', 'dfdfg', 435.00, 345, 'buc'),
(12, 1, 'cxv', 'xcvx', 324.00, 23, 'cvbn'),
(13, 3, 'sdfsd', 'sdfsdf', 23.00, 23, 'buc'),
(14, 3, 'dfgdf', 'dfgdfg', 35.00, 345, 'buc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
