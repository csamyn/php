-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 12 Juin 2014 à 19:14
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `petsitting`
--

-- --------------------------------------------------------

--
-- Structure de la table `lookout`
--

CREATE TABLE IF NOT EXISTS `lookout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `place` tinyint(2) NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `id_pet` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pet` (`id_pet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `age` int(5) NOT NULL,
  `agetype` tinyint(1) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` tinyint(5) NOT NULL,
  `race` varchar(255) DEFAULT NULL,
  `food` varchar(255) DEFAULT NULL,
  `particularity` varchar(255) DEFAULT NULL,
  `health` tinyint(3) DEFAULT NULL,
  `vaccine` tinyint(1) DEFAULT NULL,
  `comment` text,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `pet`
--

INSERT INTO `pet` (`id`, `name`, `id_user`, `age`, `agetype`, `gender`, `type`, `race`, `food`, `particularity`, `health`, `vaccine`, `comment`, `created_at`) VALUES
(1, 'Dinah', 1, 10, 1, 'female', 1, 'CroisÃ© siamois', 'Croquettes Wiskas', 'PucÃ©', 1, 0, '/', '2014-04-30 13:55:50'),
(2, 'Hamtaro', 1, 8, 1, 'male', 4, 'Hamster', 'Blé / Graines', NULL, NULL, NULL, NULL, '2014-05-01 00:00:00'),
(3, 'Rambo', 4, 2, 2, 'female', 4, 'Lapin Nain', 'Foin / Graines', NULL, NULL, NULL, NULL, '2014-05-01 00:00:00'),
(4, 'Sparrow', 5, 1, 2, 'male', 3, 'Perroquet', 'Graine', '', 1, 1, NULL, '2014-05-01 16:04:07'),
(5, 'Stark', 6, 11, 1, 'male', 2, 'Huski', 'Croquettes', '', 1, 0, NULL, '0000-00-00 00:00:00'),
(6, 'Sushi', 4, 3, 2, 'female', 1, 'CroisÃ© Siamois', 'Croquette Wiskas', '', 1, 0, NULL, '2014-05-13 12:46:10'),
(7, 'Cocorico', 3, 2, 2, 'male', 3, 'Perroquet', 'Graines', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(8, 'ChlÃ©o', 5, 4, 1, 'female', 5, 'Poisson rouge', '', '', 1, 0, NULL, '2014-05-07 09:10:20'),
(9, 'Bobby', 5, 5, 2, 'male', 2, 'Chihuahua', 'Croquettes', 'PucÃ©, vaccinÃ©', 0, 0, NULL, '2014-05-07 09:28:25'),
(10, 'Gribouille', 7, 6, 2, 'male', 1, 'Chartreux', 'Croquettes Wiskas', '', 1, 0, NULL, '2014-05-07 13:54:47'),
(11, 'Nelson', 9, 4, 2, 'male', 2, 'Cavalier KC', 'Croquettes Royal Cani', 'PucÃ©', 1, 0, NULL, '2014-06-10 19:37:07'),
(12, 'Esiaj', 10, 2, 1, 'female', 4, 'Lapin nain', 'Graines', 'VaccinÃ©', 1, 0, '', '2014-06-10 20:32:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `city` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `accommodation` tinyint(3) DEFAULT NULL,
  `interest_cat` tinyint(4) NOT NULL DEFAULT '0',
  `interest_dog` tinyint(4) NOT NULL DEFAULT '0',
  `interest_bird` tinyint(4) NOT NULL DEFAULT '0',
  `interest_rodent` tinyint(4) NOT NULL DEFAULT '0',
  `interest_fish` tinyint(4) NOT NULL DEFAULT '0',
  `interest_other` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `type`, `city`, `firstname`, `lastname`, `phone`, `address`, `age`, `accommodation`, `interest_cat`, `interest_dog`, `interest_bird`, `interest_rodent`, `interest_fish`, `interest_other`, `created_at`) VALUES
(1, 'Cskellington', 'ab4f63f9ac65152575886860dde480a1', 'celia.samyn@gmail.com', 3, 'namur', 'CÃ©lia', 'Skellington', '0497/725687', NULL, 24, 1, 1, 0, 0, 1, 0, 0, '2014-04-30 12:50:57'),
(2, 'Axelb', 'dlqkjdsqlkdjsq', 'axel.b@gmail.com', 2, 'bruxelles', 'Axel', 'Belujon', '0478/256831', NULL, 25, 2, 1, 1, 0, 0, 0, 0, '2014-04-27 00:00:00'),
(3, 'Martine', 'ab4f63f9ac65152575886860dde480a1', 'mdp@gmail.com', 1, 'liege', 'Martine', 'De Pooter', '0498/254563', NULL, 48, 1, 1, 0, 1, 1, 0, 0, '2014-05-01 16:03:33'),
(4, 'Laetitias', 'ab4f63f9ac65152575886860dde480a1', 'laetitia.s@gmail.com', 3, 'charleroi', 'Laetitia', 'Samyn', '0497/523689', NULL, 22, 1, 1, 0, 0, 0, 1, 0, '2014-05-13 12:45:34'),
(5, 'Mel256', 'ab4f63f9ac65152575886860dde480a1', 'melanie.h@gmail.com', 3, 'tournai', 'MÃ©lanie', 'Hoen', '0472/369845', NULL, 23, 2, 0, 0, 0, 1, 0, 0, '2014-05-07 09:09:44'),
(6, 'Thierryd', 'ab4f63f9ac65152575886860dde480a1', 'thierry.d@gmail.com', 1, 'dinant', 'Thierry', 'Debeque', '0482/458963', NULL, 46, 1, 0, 1, 1, 0, 0, 0, '2014-05-07 09:27:21'),
(7, 'Alexm', 'ab4f63f9ac65152575886860dde480a1', 'alex.m@gmail.com', 3, 'namur', 'Alexandra', 'Mols', '0489/235478', NULL, 27, 2, 1, 1, 0, 0, 1, 0, '2014-05-07 13:54:11'),
(8, 'Louiseb', 'ab4f63f9ac65152575886860dde480a1', 'louise.b@gmail.com', 2, 'huy', 'Louise', 'Brasset', '0498756321', NULL, 23, 1, 1, 0, 0, 1, 0, 0, '2014-06-10 19:27:06'),
(9, 'Sophied', 'ab4f63f9ac65152575886860dde480a1', 'sophie.d@gmail.com', 3, 'namur', 'Sophie', 'Decloux', '0468/254563', NULL, 24, 1, 1, 1, 0, 0, 0, 0, '2014-06-10 19:35:33'),
(10, 'tfedwm14', '631f3b1d21d3adcef7ef78fce1737fb8', 'tfedwm14@gmail.com', 3, 'namur', 'Dwm', 'Tfe', '0498/752565', NULL, 30, 1, 1, 0, 1, 1, 0, 0, '2014-06-10 20:30:59');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lookout`
--
ALTER TABLE `lookout`
  ADD CONSTRAINT `lookout_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
