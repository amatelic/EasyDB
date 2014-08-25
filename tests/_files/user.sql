-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 25 avg 2014 ob 03.37
-- Različica strežnika: 5.5.37
-- Različica PHP: 5.5.15-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `email`) VALUES
(1, 'amatelic', 21, 'amatelic93@gmail.com'),
(2, 'zmatelic', 15, 'zmatelic99@gmail.com'),
(3, 'matej', 20, 'matej@gmail.com'),
(4, 'tilen', 19, 'tilen.k@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
