-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.treutech.com
-- Generation Time: Jan 03, 2012 at 05:57 PM
-- Server version: 5.1.53
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `lava_serpent`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(65) NOT NULL,
  `salt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `salt`, `password`) VALUES
(2, 'Scott', 'Gottreu', 'sgottreu@hotmail.com', '2012-01-03 17:21:22', 'b7c43517af6b809fc037aeda11789ccd'),
(3, 'John', 'Doe', 'jdoe@hotmail.com', '2012-01-03 17:53:31', '76f996de8cf0c0f47059aa84c1dd9bc8'),
(4, 'Albert', 'Einstein', 'genius@us.gov', '2012-01-03 17:57:16', 'a77f2229ab110b5837c0db649cb12b70');
