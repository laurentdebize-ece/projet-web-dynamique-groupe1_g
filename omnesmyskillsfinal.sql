-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 13 mai 2023 à 13:29
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `omnesmyskillsfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`nom`, `prenom`, `mdp`, `email`) VALUES
('ece', 'admin', 'motdepasseadmin', 'admin@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `numeroclasse` int(50) NOT NULL,
  `promo` int(50) NOT NULL,
  PRIMARY KEY (`numeroclasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`numeroclasse`, `promo`) VALUES
(1, 2026),
(2, 2026),
(3, 2026);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `date de creation` int(50) NOT NULL,
  `date limite` int(50) NOT NULL,
  `statut` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `emailproff` varchar(255) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  UNIQUE KEY `numeromatiere` (`emailproff`),
  KEY `fk_numéroclasse` (`numeroclasse`),
  KEY `fk_numeromatiere` (`numeromatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `emaileleve` varchar(255) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `numéro de la classe` int(50) NOT NULL,
  PRIMARY KEY (`emaileleve`),
  KEY `fk_numeroclasse` (`numéro de la classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `emaileleve`, `mot de passe`, `numéro de la classe`) VALUES
('Nometudiant1', 'prenometudiant1', 'etudiant1@edu.ece.fr', 'motdepasseetudiant1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `nom` varchar(200) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  `volume horaire` int(50) NOT NULL,
  PRIMARY KEY (`numeromatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`nom`, `numeromatiere`, `volume horaire`) VALUES
('Mathématiques', 1, 10),
('Informatique', 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `niveval`
--

DROP TABLE IF EXISTS `niveval`;
CREATE TABLE IF NOT EXISTS `niveval` (
  `numeval` int(50) NOT NULL,
  PRIMARY KEY (`numeval`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `emailprof` varchar(255) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  PRIMARY KEY (`emailprof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailprof`, `mot de passe`, `Nom`, `prénom`) VALUES
('prof@edu.ece.fr', 'motdepasseprof', 'Nomprof', 'prenomprof');

-- --------------------------------------------------------

--
-- Structure de la table `évaluations`
--

DROP TABLE IF EXISTS `évaluations`;
CREATE TABLE IF NOT EXISTS `évaluations` (
  `numeval` int(50) NOT NULL,
  `emaileleve` varchar(200) NOT NULL,
  `numniveval` int(50) NOT NULL,
  `email du prof` varchar(255) NOT NULL,
  `id` int(50) NOT NULL,
  PRIMARY KEY (`numeval`),
  KEY `fk_emaileleve` (`emaileleve`),
  KEY `fk_numniveval` (`numniveval`),
  KEY `fk_id` (`id`),
  KEY `fk_emailduprof` (`email du prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `fk_emailprof` FOREIGN KEY (`emailproff`) REFERENCES `professeur` (`emailprof`),
  ADD CONSTRAINT `fk_numeromatiere` FOREIGN KEY (`numeromatiere`) REFERENCES `matieres` (`numeromatiere`),
  ADD CONSTRAINT `fk_numéroclasse` FOREIGN KEY (`numeroclasse`) REFERENCES `classe` (`numeroclasse`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_numeroclasse` FOREIGN KEY (`numéro de la classe`) REFERENCES `classe` (`numeroclasse`);

--
-- Contraintes pour la table `évaluations`
--
ALTER TABLE `évaluations`
  ADD CONSTRAINT `fk_emailduprof` FOREIGN KEY (`email du prof`) REFERENCES `professeur` (`emailprof`),
  ADD CONSTRAINT `fk_emaileleve` FOREIGN KEY (`emaileleve`) REFERENCES `etudiant` (`emaileleve`),
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `competences` (`id`),
  ADD CONSTRAINT `fk_numniveval` FOREIGN KEY (`numniveval`) REFERENCES `niveval` (`numeval`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
