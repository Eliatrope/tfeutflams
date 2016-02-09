-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Février 2016 à 15:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tfeutflams`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `priorite` int(11) NOT NULL,
  `main_image` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `title`, `priorite`, `main_image`, `content`) VALUES
(1, 'lorem ipsum', 1, 'article.jpg', 'Cum autem commodis intervallata temporibus convivia longa et noxia coeperint apparari vel distri secretiora quaedam se nosse confingit.tis his quibus vicissitudo debetur, peregrinum invitari conveniet, et si digesto plene us excubat aurigarum aut artem fitetur aute confing. [...]');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'BALLA', 'admin'),
(2, 'Morgane', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE IF NOT EXISTS `calendrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(45) NOT NULL,
  `heure_debut` varchar(45) NOT NULL,
  `heure_fin` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `fk_ville` int(11) NOT NULL,
  PRIMARY KEY (`id`,`fk_ville`),
  KEY `fk_ville_idx` (`fk_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `civilite` varchar(10) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `nb_personnes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(60) NOT NULL,
  `commentaire` text NOT NULL,
  `note` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE IF NOT EXISTS `emplacement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `cp` varchar(10) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `commentaire` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `emplacement`
--

INSERT INTO `emplacement` (`id`, `ville`, `adresse`, `cp`, `latitude`, `longitude`, `commentaire`) VALUES
(1, 'La Fresnaye', 'La Fresnaye', '37340', '47.477617', '0.3802419999999529', 'Test marqueur');

-- --------------------------------------------------------

--
-- Structure de la table `flams`
--

CREATE TABLE IF NOT EXISTS `flams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prix` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `fk_ingredients` int(11) NOT NULL,
  PRIMARY KEY (`id`,`fk_ingredients`),
  KEY `fk_ingredients_idx` (`fk_ingredients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_photo`
--

CREATE TABLE IF NOT EXISTS `galerie_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `title` varchar(120) DEFAULT NULL,
  `alt` varchar(120) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `nom`, `img`) VALUES
(1, 'Oignon', 'oignon.jpg'),
(2, 'Viande', 'viande-hachee.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `meta_description` varchar(180) DEFAULT NULL,
  `page` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `calendrier`
--
ALTER TABLE `calendrier`
  ADD CONSTRAINT `fk_ville` FOREIGN KEY (`fk_ville`) REFERENCES `emplacement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `flams`
--
ALTER TABLE `flams`
  ADD CONSTRAINT `fk_ingredients` FOREIGN KEY (`fk_ingredients`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
