-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Janvier 2020 à 00:21
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
-- Structure de la table `association`
--

CREATE TABLE IF NOT EXISTS `association` (
  `CODE_ASSOC` char(3) NOT NULL,
  `A_NOM` varchar(32) DEFAULT NULL,
  `A_NO_ICOM` char(8) DEFAULT NULL,
  `A_COURRIEL` varchar(32) DEFAULT NULL,
  `A_TEL` int(10) DEFAULT NULL,
  `A_FAX` int(10) DEFAULT NULL,
  PRIMARY KEY (`CODE_ASSOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `association`
--

INSERT INTO `association` (`CODE_ASSOC`, `A_NOM`, `A_NO_ICOM`, `A_COURRIEL`, `A_TEL`, `A_FAX`) VALUES
('01', 'Association rugby', '45789854', 'assocrugby@gmail.com', 512457854, 512457858),
('02', 'Association football', '23458715', 'assocfoot@hotmail.fr', 215487987, 215487989);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `CODE_COMP` char(2) NOT NULL,
  `C_LIBELLE` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_COMP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`CODE_COMP`, `C_LIBELLE`) VALUES
('1', 'Programmation'),
('2', 'Pack office'),
('3', 'Comptabilité'),
('4', '1er secours');

-- --------------------------------------------------------

--
-- Structure de la table `competences_des_intervenants`
--

CREATE TABLE IF NOT EXISTS `competences_des_intervenants` (
  `CODE_COMP` char(2) NOT NULL,
  `NO_INTERVENANT` char(2) NOT NULL,
  PRIMARY KEY (`CODE_COMP`,`NO_INTERVENANT`),
  KEY `I_FK_COMPETENCES_DES_INTERVENANTS_COMPETENCE` (`CODE_COMP`),
  KEY `I_FK_COMPETENCES_DES_INTERVENANTS_INTERVENANT` (`NO_INTERVENANT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competences_des_intervenants`
--

INSERT INTO `competences_des_intervenants` (`CODE_COMP`, `NO_INTERVENANT`) VALUES
('1', '4'),
('2', '1'),
('3', '3'),
('4', '2');

-- --------------------------------------------------------

--
-- Structure de la table `competences_de_domaine`
--

CREATE TABLE IF NOT EXISTS `competences_de_domaine` (
  `CODE_COMP` char(2) NOT NULL,
  `CODE_DOM` char(1) NOT NULL,
  PRIMARY KEY (`CODE_COMP`,`CODE_DOM`),
  KEY `I_FK_COMPETENCES_DE_DOMAINE_COMPETENCE` (`CODE_COMP`),
  KEY `I_FK_COMPETENCES_DE_DOMAINE_DOMAINE` (`CODE_DOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competences_de_domaine`
--

INSERT INTO `competences_de_domaine` (`CODE_COMP`, `CODE_DOM`) VALUES
('1', '1'),
('1', '2'),
('2', '1'),
('3', '1');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `CODE_DOM` char(1) NOT NULL,
  `D_LIBELLE` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_DOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`CODE_DOM`, `D_LIBELLE`) VALUES
('1', 'Gestion'),
('2', 'Informatique'),
('3', 'Développement durable'),
('4', 'Secourisme'),
('5', 'Communication');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `CODE_DOM` char(1) NOT NULL,
  `CODE_FORM` char(2) NOT NULL,
  `F_LIBELLE` varchar(32) DEFAULT NULL,
  `OBJECTIFS` varchar(128) DEFAULT NULL,
  `CONTENU` varchar(128) DEFAULT NULL,
  `PRIX` decimal(10,2) DEFAULT NULL,
  `SUPPORT_INCLUS` char(1) DEFAULT NULL,
  `DATE_LIMITE` date DEFAULT NULL,
  `NB_PLACES` int(3) DEFAULT NULL,
  `TYPE` char(1) DEFAULT NULL,
  PRIMARY KEY (`CODE_DOM`,`CODE_FORM`),
  KEY `I_FK_FORMATION_DOMAINE` (`CODE_DOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`CODE_DOM`, `CODE_FORM`, `F_LIBELLE`, `OBJECTIFS`, `CONTENU`, `PRIX`, `SUPPORT_INCLUS`, `DATE_LIMITE`, `NB_PLACES`, `TYPE`) VALUES
('2', '3', 'Power point niveau 2', 'Parfaire ses connaissances sur PowerPoint', '1. Amélioration d''une présentation*\r\n2. L''affichage\r\n3. Personnalisation des diapositives', '55.00', 'O', '2019-10-30', 19, 'T'),
('4', '2', 'Mise en pratique et 1er secours', 'Savoir faire les 1er gestes', 'Apprentissage secourisme', '10.00', 'O', '2020-03-18', 9, 'T'),
('1', '1', 'Soirée d''information convention ', 'Savoir des choses sur le sport', 'Table ronde', '20.00', 'N', '2020-03-20', 16, 'T'),
('2', '4', 'Outlook Niveau 1', 'Savoir envoyer un mail', 'Envoyer un mail', '45.00', 'O', '2020-01-18', 58, 'T'),
('4', '1', 'Manifestion éco responsable', 'Faire changer les choses', 'Manif', '5.00', 'N', '2019-11-27', 110, 'S'),
('5', '1', 'Conduite de réunion', 'Savoir se tenir', 'Animation', '12.00', 'N', '2020-02-01', 26, 'S'),
('1', '3', 'Comptabilité', 'Savoir gérer son argent', NULL, NULL, NULL, NULL, NULL, NULL),
('1', '10', 'Formation excel', 'Savoir calculer', 'cellules', '10.00', 'N', '2020-02-15', 16, 'T');

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
('1', '2', '3', '1', 'ENR', 2019),
('1', '1', '10', '1', 'ENR', 2019),
('1', '4', '2', '1', 'ENR', 2019),
('1', '1', '1', '1', 'ENR', 2019);

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE IF NOT EXISTS `intervenant` (
  `NO_INTERVENANT` char(2) NOT NULL,
  `I_NOM` varchar(32) DEFAULT NULL,
  `I_PRENOM` varchar(32) DEFAULT NULL,
  `I_EMAIL` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`NO_INTERVENANT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intervenant`
--

INSERT INTO `intervenant` (`NO_INTERVENANT`, `I_NOM`, `I_PRENOM`, `I_EMAIL`) VALUES
('1', 'RICAUD', 'Isabelle', 'iricaud3@gmail.com'),
('2', 'DESPLATS', 'Éric', 'desplats.eric@gmail.com'),
('3', 'KLOPP-TOSSER', 'Énora', 'enora.klopptosser@hotmail.fr'),
('4', 'SANCERNI', 'Sandrine', 'ssandrine@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `intervenants_par_formation`
--

CREATE TABLE IF NOT EXISTS `intervenants_par_formation` (
  `NO_INTERVENANT` char(2) NOT NULL,
  `CODE_DOM` char(1) NOT NULL,
  `CODE_FORM` char(2) NOT NULL,
  PRIMARY KEY (`NO_INTERVENANT`,`CODE_DOM`,`CODE_FORM`),
  KEY `I_FK_INTERVENANTS_PAR_FORMATION_INTERVENANT` (`NO_INTERVENANT`),
  KEY `I_FK_INTERVENANTS_PAR_FORMATION_FORMATION` (`CODE_DOM`,`CODE_FORM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intervenants_par_formation`
--

INSERT INTO `intervenants_par_formation` (`NO_INTERVENANT`, `CODE_DOM`, `CODE_FORM`) VALUES
('1', '1', '1'),
('2', '4', '1'),
('3', '1', '3'),
('4', '1', '1'),
('4', '1', '2');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `CODE_LIEU` char(4) NOT NULL,
  `L_ADRESSE` varchar(128) DEFAULT NULL,
  `L_CP` int(5) DEFAULT NULL,
  `L_VILLE` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`CODE_LIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lieu`
--

INSERT INTO `lieu` (`CODE_LIEU`, `L_ADRESSE`, `L_CP`, `L_VILLE`) VALUES
('1', 'Salle 455, lycée Ozenne', 31000, 'Toulouse'),
('2', 'Salle Rontonde', 31542, 'St Jean');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_util` char(3) NOT NULL DEFAULT '',
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_util`),
  KEY `id_util` (`id_util`),
  KEY `id_util_2` (`id_util`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id_util`, `login`, `password`) VALUES
('1', 'nico31', 'btssio'),
('2', 'clem07', 'btssio'),
('3', 'isab75', 'm2l'),
('4', 'giroux54', 'm2l');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `CODE_DOM` char(1) NOT NULL,
  `CODE_FORM` char(2) NOT NULL,
  `CODE_SESSION` char(2) NOT NULL,
  `CODE_LIEU` char(4) NOT NULL,
  `S_LIBELLE` varchar(128) DEFAULT NULL,
  `H_DEBUT` time DEFAULT NULL,
  `H_FIN` time DEFAULT NULL,
  `S_DATE` date DEFAULT NULL,
  PRIMARY KEY (`CODE_DOM`,`CODE_FORM`,`CODE_SESSION`),
  KEY `I_FK_SESSION_FORMATION` (`CODE_DOM`,`CODE_FORM`),
  KEY `I_FK_SESSION_LIEU` (`CODE_LIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`CODE_DOM`, `CODE_FORM`, `CODE_SESSION`, `CODE_LIEU`, `S_LIBELLE`, `H_DEBUT`, `H_FIN`, `S_DATE`) VALUES
('1', '1', '1', '1', 'Session 1', '19:00:00', '21:00:00', '2019-12-16'),
('1', '10', '1', '1', 'Session 1', '12:00:00', '14:00:00', '2020-02-16'),
('4', '2', '1', '1', 'Session 1', '18:00:00', '20:00:00', '2020-01-18'),
('4', '1', '1', '1', 'Session 1', '09:00:00', '17:00:00', '2020-05-30'),
('2', '2', '1', '1', 'Session 1', '10:00:00', '13:00:00', '2020-02-25'),
('5', '1', '1', '2', 'Session 1', '14:00:00', '15:00:00', '2020-03-15'),
('2', '3', '1', '1', 'Session 1', '20:00:00', '22:00:00', '2020-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `NO_UTILISATEUR` char(3) NOT NULL,
  `CODE_ASSOC` char(3) NOT NULL,
  `U_NOM` varchar(32) DEFAULT NULL,
  `U_PRENOM` varchar(32) DEFAULT NULL,
  `U_ADRESSE` varchar(128) DEFAULT NULL,
  `U_CP` char(5) DEFAULT NULL,
  `U_VILLE` varchar(32) DEFAULT NULL,
  `U_EMAIL` varchar(32) DEFAULT NULL,
  `U_STATUT` varchar(16) DEFAULT NULL,
  `U_FONCTION` varchar(16) DEFAULT NULL,
  `NBFORMSUIVIES` int(1) NOT NULL,
  PRIMARY KEY (`NO_UTILISATEUR`),
  KEY `I_FK_UTILISATEUR_ASSOCIATION` (`CODE_ASSOC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`NO_UTILISATEUR`, `CODE_ASSOC`, `U_NOM`, `U_PRENOM`, `U_ADRESSE`, `U_CP`, `U_VILLE`, `U_EMAIL`, `U_STATUT`, `U_FONCTION`, `NBFORMSUIVIES`) VALUES
('1', '01', 'VITE', 'Nicolas', '38 Avenue Augustin Labouilhe', '31650', 'Saint Orens', 'nicolas.vite@hotmail.com', 'B', 'Étudiant', 7),
('2', '02', 'VETTARD', 'Clément', '18 rue Arnaud', '31000', 'Toulouse', 'clementvettard@gmail.fr', 'S', 'Étudiant', 0),
('3', '01', 'RICAUD', 'Isabelle', '54 avenue des oiseaux', '31650', 'St orens', 'iricaud3@gmail.com', 'B', 'Prof', 0),
('4', '1', 'GIROUX', 'Françoise', '28 rue Merly', '54000', 'Nancy', 'giroux.françoise@gmail.com', 'A', 'Secretaire', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
