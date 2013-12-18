-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2013 at 12:25 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myusers`
--
CREATE DATABASE `myusers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `myusers`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `parola` varchar(40) NOT NULL,
  `data_adaugarii` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nume`, `prenume`, `email`, `user`, `parola`, `data_adaugarii`) VALUES
(2, 'Ionescu', 'Mihai', 'imihai@gmail.com', 'imihai', '63fd5844839a8750fed84670deece30c', '2013-03-14 13:25:58'),
(5, 'Ionescu', 'Stefan', 'istefan@gmail.com', 'istefan', '63fd5844839a8750fed84670deece30c', '2013-03-14 13:30:01'),
(8, 'Popescu', 'Stefan', 'pstefan@gmail.com', 'pstefan', '63fd5844839a8750fed84670deece30c', '2013-03-14 13:31:05'),
(10, 'Popescu', 'Ion', 'pion@gmail.com', 'pion', '46bf36a7193438f81fccc9c4bcc8343e', '2013-03-15 12:26:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
