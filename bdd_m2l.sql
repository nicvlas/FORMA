-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Janvier 2020 à 19:32
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

CREATE TABLE IF NOT EXISTS `inscrits` (
  `NO_UTILISATEUR` char(3) NOT NULL,
  `CODE_DOM` char(1) NOT NULL,
  `CODE_FORM` char(2) NOT NULL,
  `CODE_SESSION` char(2) NOT NULL,
  `ETAT` char(5) DEFAULT NULL,
  `ANNEE` year(4) NOT NULL,
  PRIMARY KEY (`NO_UTILISATEUR`,`CODE_DOM`,`CODE_FORM`,`CODE_SESSION`),
  KEY `I_FK_INSCRITS_UTILISATEUR` (`NO_UTILISATEUR`),
  KEY `I_FK_INSCRITS_SESSION` (`CODE_DOM`,`CODE_FORM`,`CODE_SESSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrits`
--

INSERT INTO `inscrits` (`NO_UTILISATEUR`, `CODE_DOM`, `CODE_FORM`, `CODE_SESSION`, `ETAT`, `ANNEE`) VALUES
('2', '2', '3', '1', 'ENR', 2020),
('2', '1', '10', '1', 'ENR', 2020),
('2', '1', '1', '1', 'ENR', 2020);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
