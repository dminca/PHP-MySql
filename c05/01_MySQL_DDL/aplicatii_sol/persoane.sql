-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2013 at 12:49 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE IF NOT EXISTS `utilizatori` (
  `idPersoana` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `gen` enum('m','f') NOT NULL,
  `limbiStraine` set('engleza','franceza','germana') NOT NULL DEFAULT 'engleza',
  `mesaj` text NOT NULL,
  `dataAdaugarii` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPersoana`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`idPersoana`, `nume`, `prenume`, `gen`, `limbiStraine`, `mesaj`, `dataAdaugarii`) VALUES
(1, 'popa', 'ion', 'm', 'engleza,franceza', 'Mesajul meu', '2013-03-02 10:30:16'),
(3, 'marin', 'mihai', 'm', 'franceza,germana', 'Mesajul meu', '2013-03-02 10:30:16'),
(5, 'marin', 'mihaela', 'f', 'franceza,germana', '', '2013-03-02 10:30:16'),
(7, 'stfan', 'maria', 'f', 'franceza', '', '2013-03-02 10:30:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
