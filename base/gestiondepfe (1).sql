-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 29 Mai 2016 à 21:58
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestiondepfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `cin` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `cin`) VALUES
(1, 'asma', 'gharbi', 'asmagharbi@gmail.com', 98765432);

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE IF NOT EXISTS `affecter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cinencadrant` int(25) NOT NULL,
  `cinetudiant` int(25) NOT NULL,
  `idsujet` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`id`, `cinencadrant`, `cinetudiant`, `idsujet`) VALUES
(8, 12345678, 7953134, 6);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id`, `nom`) VALUES
(1, 'jsf'),
(2, 'php'),
(3, 'android');

-- --------------------------------------------------------

--
-- Structure de la table `conception`
--

CREATE TABLE IF NOT EXISTS `conception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `conception`
--

INSERT INTO `conception` (`id`, `nom`) VALUES
(1, 'merise'),
(2, 'uml');

-- --------------------------------------------------------

--
-- Structure de la table `condidature`
--

CREATE TABLE IF NOT EXISTS `condidature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsujet` int(11) NOT NULL,
  `cinetudiant` int(25) NOT NULL,
  `urlcv` varchar(255) NOT NULL,
  `urlatt` varchar(255) NOT NULL,
  `urllm` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `condidaturespontane`
--

CREATE TABLE IF NOT EXISTS `condidaturespontane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlcv` varchar(255) NOT NULL,
  `urlatt` varchar(255) NOT NULL,
  `urllm` varchar(255) NOT NULL,
  `cinetudiant` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `condidaturespontane`
--

INSERT INTO `condidaturespontane` (`id`, `urlcv`, `urlatt`, `urllm`, `cinetudiant`) VALUES
(27, '../condi/cv/Format9.2.docx', '../condi/att/', '../condi/lm/Format9.2.docx', 7953134);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomdep` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id`, `nomdep`) VALUES
(1, 'informatique'),
(2, 'langue');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `cin` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `iddepartement` varchar(25) NOT NULL,
  `tel` int(12) NOT NULL,
  `adresse` varchar(25) NOT NULL,
  `active` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `cin`, `email`, `grade`, `iddepartement`, `tel`, `adresse`, `active`) VALUES
(1, 'nida', 'madourie', 12345678, 'nidamadouri@gmail.com', 'maitre de conference', '1', 20202020, 'beja', 'oui'),
(2, 'ramzi', 'guesmi', 11111111, 'ramziguesmi@gmail.com', 'technologue', '1', 515, 'tunis', 'oui'),
(3, 'ramzi', 'farhat', 9876543, 'ramzifarhati@gmail.com', 'professeur', '1', 456789, 'tunis', 'oui'),
(4, 'zied', 'guendil', 96385274, 'ziedguendir@gmail.com', 'technologue', '1', 0, '', 'non'),
(9, 'bilel', 'maghraoui', 14785236, 'bilelmaghraoui@gmail.com', 'technologue', '1', 547893212, '', 'non'),
(10, 'mansour', 'namouchi', 7953134, 'khe@hotmail.fr', 'maitre assistant', '1', 151, 'brqb', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(28) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cin` int(8) NOT NULL,
  `datedenaissance` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `tel` int(12) NOT NULL,
  `niveau` int(2) NOT NULL,
  `active` varchar(25) NOT NULL,
  `idspecialite` varchar(25) NOT NULL,
  `groupe` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `cin`, `datedenaissance`, `adresse`, `ville`, `tel`, `niveau`, `active`, `idspecialite`, `groupe`) VALUES
(6, 'mansour', 'namouchi', 'mansournamouchi@gmail.com', 4842367, '1993-03-17', 'hay zehour', 'tunis', 97381061, 3, 'oui', '1', 2),
(8, 'anouar', 'khemissi', 'khemissi08@hotmail.fr', 7953134, '1994-07-17', '01 rue feija citÃ© tahawel', 'ghardimaou', 54726323, 3, 'oui', '1', 1),
(9, 'android', '848', 'khessi08@hotmail.f', 7953128, '2016-05-03', 'kh', 'tunis', 515, 2, 'oui', '2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialite` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id`, `specialite`) VALUES
(1, 'multimedia et web '),
(2, 'anglais');

-- --------------------------------------------------------

--
-- Structure de la table `sujetdestage`
--

CREATE TABLE IF NOT EXISTS `sujetdestage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) NOT NULL,
  `cahierdecharge` text NOT NULL,
  `datedecreation` varchar(25) NOT NULL,
  `datefin` date NOT NULL,
  `datedebut` date NOT NULL,
  `objet` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `encadrant1` varchar(50) NOT NULL,
  `encadrant2` varchar(25) NOT NULL,
  `motcle` varchar(50) NOT NULL,
  `cinencadrant` int(11) NOT NULL,
  `cinproposeur` int(11) NOT NULL,
  `idconception` varchar(25) NOT NULL,
  `idcompetences` varchar(25) NOT NULL,
  `anneeuniversaire` varchar(25) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sujetdestage`
--

INSERT INTO `sujetdestage` (`id`, `titre`, `cahierdecharge`, `datedecreation`, `datefin`, `datedebut`, `objet`, `etat`, `societe`, `encadrant1`, `encadrant2`, `motcle`, `cinencadrant`, `cinproposeur`, `idconception`, `idcompetences`, `anneeuniversaire`, `type`) VALUES
(6, 'Developpement des modules', 'Gerer le referentiel des fournisseurs (creation, modification)\r\nGerer les commandes d achat a partir d une interface unifiee\r\nGerer la reception reception totale/partielle des commandes\r\nImprimer: bons de reception, factures, factures d avoir\r\nGenerer des rapports sous format Excel', '02-05-2016', '2016-05-23', '2016-01-21', 'Gerer le referentiel des fournisseurs', 'proposer', 'magasin general', 'nida madouri', 'nasri riab', 'Gerer le referentiel ,Gerer les commandes d achat', 12345678, 7953134, '1', '1', '2015-2016', 'pfe'),
(7, 'Developpement du module G', 'Gestion des parametres de la societe Gestion des articles (familles, sous-familles, categories) Gestion des clients (familles, sous-familles, types) Gestion des fournisseurs (familles, sous-familles, natures) Gestion des utilisateurs (droits d acces, mot de passe, alerte par mail) Gestion des banques, des codes postaux, des mois, des villes, etc. (import depuis des fichiers CSV)', '02-05-2016', '2016-05-23', '2016-01-22', 'Gestion des parametres de la societe', 'approuver', 'Agora informatique', 'nida ', 'oussama kahlaoui', 'ERP NEGOCE', 12345678, 12345678, '2', '2', '2015-2016', 'ete'),
(8, 'Realisation d une platefo', 'ce stage est de porter cet outil de simulation vers un langage plus rapide. Dans un premier temps, le programme de simulation sera ecrit en langage C. Le gain en termes de temps de calcul sera alors evalue. Si nÃ©cessaire, une stratÃ©gie dâ€™implantation informatique parallÃ¨le (multithreading) sera etudiee afin de reduire encore les temps de calcul. Une fois le gain de temps dÃ©montrÃ© et suffisant pour permettre un affichage en temps rÃ©el, une GUI sera realisee afin de crÃ©er une plateforme de simulation.', '2016-05-21', '2016-05-19', '2016-01-14', 'La simulation d images medicales est utilisee comm', 'valide', 'magazine', 'nida madouri', 'bayrem tounsi', 'simulation ', 12345678, 7953134, '1', '1', '2015/2016', 'pfe'),
(9, 'Gestion des Stages et PFE', 'Postuler pour un ou plusieurs stages.\r\n	Consulter, editer et accÃ©der facilement aux informations relatives aux demandes et stages.\r\n	Gerer les etudiants et les enseignants.\r\n         Envoyer des candidatures spontanÃ©es\r\n	Gerer les sujets.', '2016-05-22', '2016-05-01', '2016-02-14', 'une application web pour la gestion des stages', 'proposer', 'islaib', 'nida madouri', 'asma gharbi', 'Gerer les sujets          Gerer les etudiants et l', 12345678, 7953134, '1', '2', '2015/2016', 'pfe');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
