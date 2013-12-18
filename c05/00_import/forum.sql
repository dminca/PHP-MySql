-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2013 at 01:45 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesaje`
--

CREATE TABLE IF NOT EXISTS `mesaje` (
  `idMesaj` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUtilizator` int(11) unsigned DEFAULT NULL,
  `subiect` varchar(30) NOT NULL,
  `mesaj` text NOT NULL,
  `dataAdaugarii` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMesaj`),
  KEY `idUtilizator` (`idUtilizator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mesaje`
--

INSERT INTO `mesaje` (`idMesaj`, `idUtilizator`, `subiect`, `mesaj`, `dataAdaugarii`) VALUES
(2, 1, 'test', 'test mesaj', '2013-03-09 11:34:18'),
(3, 1, 'test 2', 'test mesaj 2', '2013-03-09 11:34:40'),
(6, 2, 'test', 'raspuns test mesaj 2', '2013-03-09 11:35:35'),
(7, 2, 'test', 'test test', '2013-03-09 11:36:42'),
(8, 1, 'test 2', 'gsdfdgs', '2013-03-09 11:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE IF NOT EXISTS `utilizatori` (
  `idUtilizator` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `parola` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dataAdaugarii` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUtilizator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1002 ;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`idUtilizator`, `nume`, `prenume`, `user`, `parola`, `email`, `dataAdaugarii`) VALUES
(1, 'marin', 'ion', 'mion', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mion@gmail.com', '2013-03-09 11:32:55'),
(2, 'stefan', 'maria', 'smaria', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'smaria@gmail.com', '2013-03-09 11:32:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mesaje`
--
ALTER TABLE `mesaje`
  ADD CONSTRAINT `mesaje_ibfk_1` FOREIGN KEY (`idUtilizator`) REFERENCES `utilizatori` (`idUtilizator`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
