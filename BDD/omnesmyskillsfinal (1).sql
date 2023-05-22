-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 mai 2023 à 16:45
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
  `ecole` varchar(255) NOT NULL,
  PRIMARY KEY (`numeroclasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`numeroclasse`, `promo`, `ecole`) VALUES
(1, 2026, 'ECE'),
(2, 2026, 'ECE'),
(3, 2026, 'ECE');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `statut` varchar(200) NOT NULL,
  `datecreation` date DEFAULT NULL,
  `datelimite` date DEFAULT NULL,
  `ecole` varchar(255) NOT NULL DEFAULT 'ECE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`, `statut`, `datecreation`, `datelimite`, `ecole`) VALUES
(1, 'reflexion sur un probleme mathematique', 'non acquis', '2018-05-02', '2024-06-07', 'ECE'),
(2, 'creer un site web', 'non acquis', '2015-03-04', '2023-10-07', 'ECE'),
(3, 'modeliser des systemes', 'non acquis', '2020-09-01', '2025-06-04', 'ECE'),
(4, 'comprendre le vhdl', 'non acquis', '2019-11-21', '2026-06-11', 'ECE'),
(5, 'maitriser algebre', 'non acquis', '2020-09-04', '2024-06-13', 'ECE'),
(6, 'theorie des graphes', 'non acquis', '2018-09-25', '2027-02-12', 'ECE'),
(7, 'notions electromag', 'non acquis', '2018-09-29', '2026-11-24', 'ECE'),
(8, 'systemes boucles', 'non acquis', '2022-01-01', '2022-07-08', 'ECE'),
(9, 'maitriser la finance', 'non acquis', '2022-09-01', '2022-12-02', 'INSEEC'),
(12, 'jouer', 'acquis', '2023-05-23', '2023-05-26', 'ECE');

-- --------------------------------------------------------

--
-- Structure de la table `competences_matieres`
--

DROP TABLE IF EXISTS `competences_matieres`;
CREATE TABLE IF NOT EXISTS `competences_matieres` (
  `numeromatiere` int(50) DEFAULT NULL,
  `id` int(50) DEFAULT NULL,
  KEY `numeromatiere` (`numeromatiere`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences_matieres`
--

INSERT INTO `competences_matieres` (`numeromatiere`, `id`) VALUES
(1, 5),
(1, 1),
(2, 2),
(2, 6),
(3, 3),
(3, 7),
(4, 4),
(4, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `emailprof` varchar(255) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  `emaileleve` varchar(255) NOT NULL,
  KEY `fk_numeroclasse` (`numeroclasse`),
  KEY `fk_numeromatiere` (`numeromatiere`),
  KEY `fk_emailprof` (`emailprof`),
  KEY `fk_emaileleve` (`emaileleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`emailprof`, `numeroclasse`, `numeromatiere`, `emaileleve`) VALUES
('bianchi@edu.ece.fr', 1, 1, 'aurelien.lefeuvre@edu.ece.fr'),
('bianchi@edu.ece.fr', 1, 1, 'lena.blampain@edu.ece.fr'),
('bianchi@edu.ece.fr', 2, 1, 'margaux.berdjah@edu.ece.fr'),
('bianchi@edu.ece.fr', 3, 1, 'clara.jacquot@edu.ece.fr'),
('debize@edu.ece.fr', 1, 2, 'aurelien.lefeuvre@edu.ece.fr'),
('debize@edu.ece.fr', 1, 2, 'lena.blampain@edu.ece.fr'),
('debize@edu.ece.fr', 2, 2, 'margaux.berdjah@edu.ece.fr'),
('debize@edu.ece.fr', 3, 2, 'clara.jacquot@edu.ece.fr'),
('Dedecker@edu.ece.fr', 1, 3, 'lena.blampain@edu.ece.fr'),
('Dedecker@edu.ece.fr', 1, 3, 'aurelien.lefeuvre@edu.ece.fr'),
('Dedecker@edu.ece.fr', 3, 3, 'clara.jacquot@edu.ece.fr'),
('Dedecker@edu.ece.fr', 2, 3, 'margaux.berdjah@edu.ece.fr'),
('mazioua@edu.ece.fr', 1, 4, 'aurelien.lefeuvre@edu.ece.fr'),
('mazioua@edu.ece.fr', 1, 4, 'lena.blampain@edu.ece.fr'),
('mazioua@edu.ece.fr', 2, 4, 'margaux.berdjah@edu.ece.fr'),
('mazioua@edu.ece.fr', 3, 4, 'clara.jacquot@edu.ece.fr');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `emaileleve` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `ecole` varchar(255) NOT NULL,
  PRIMARY KEY (`emaileleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `emaileleve`, `motdepasse`, `numeroclasse`, `ecole`) VALUES
('CC', 'SS', 'AA', 'SS', 2, 'ECE'),
('Lefeuvre', 'Aurelien', 'aurelien.lefeuvre@edu.ece.fr', '4', 1, 'ECE'),
('Jacquot', 'Clara', 'clara.jacquot@edu.ece.fr', '2', 3, 'ECE'),
('CC', 'SS', 'KK', 'SS', 2, 'ECE'),
('Blampain', 'Lena', 'lena.blampain@edu.ece.fr', '1', 1, 'ECE'),
('CC', 'SS', 'LL', 'SS', 2, 'ECE'),
('Berdjah', 'Margaux', 'margaux.berdjah@edu.ece.fr', '3', 2, 'ECE'),
('CC', 'SS', 'SS', 'SS', 2, 'ECE'),
('ff', 'ss', 'ss@edu.ece.fr', 'fff', 2, 'ECE'),
('ccxx', 'cc', 'www', 'cc', 2, 'c'),
('XX', 'XX', 'XX', 'XX', 2, 'XX');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `emaileleve` varchar(200) NOT NULL,
  `numniveval` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL,
  `evaluation` varchar(255) DEFAULT NULL,
  `emailprof` varchar(255) DEFAULT NULL,
  `avis_prof` varchar(255) DEFAULT NULL,
  `numeval` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`numeval`),
  KEY `fk_emaileleve` (`emaileleve`),
  KEY `fk_numniveval` (`numniveval`),
  KEY `fk_id` (`id`),
  KEY `fk_emailprof` (`emailprof`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`emaileleve`, `numniveval`, `id`, `evaluation`, `emailprof`, `avis_prof`, `numeval`) VALUES
('lena.blampain@edu.ece.fr', NULL, 1, 'acquis', 'bianchi@edu.ece.fr', NULL, 1),
('lena.blampain@edu.ece.fr', NULL, 1, 'acquis', 'bianchi@edu.ece.fr', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `nom` varchar(200) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  `volumehoraire` int(50) NOT NULL,
  PRIMARY KEY (`numeromatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`nom`, `numeromatiere`, `volumehoraire`) VALUES
('Mathematiques', 1, 10),
('Informatique', 2, 12),
('Physique', 3, 6),
('electronique', 4, 10),
('economie', 5, 8);

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
  `motdepasse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`emailprof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailprof`, `motdepasse`, `nom`, `prenom`) VALUES
('bianchi@edu.ece.fr', 'frfr', 'Bianchi', 'Celine'),
('debize@edu.ece.fr', 'blabla', 'Debize', 'Laurent'),
('Dedecker@edu.ece.fr', 'roro', 'Dedecker', 'Samira'),
('mazioua@edu.ece.fr', 'baba', 'mazioua', 'amirouche');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences_matieres`
--
ALTER TABLE `competences_matieres`
  ADD CONSTRAINT `competences_matieres_ibfk_1` FOREIGN KEY (`numeromatiere`) REFERENCES `matieres` (`numeromatiere`),
  ADD CONSTRAINT `competences_matieres_ibfk_2` FOREIGN KEY (`id`) REFERENCES `competences` (`id`);

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `fk_emaileleve` FOREIGN KEY (`emaileleve`) REFERENCES `etudiant` (`emaileleve`),
  ADD CONSTRAINT `fk_numeroclasse` FOREIGN KEY (`numeroclasse`) REFERENCES `classe` (`numeroclasse`),
  ADD CONSTRAINT `fk_numeromatiere` FOREIGN KEY (`numeromatiere`) REFERENCES `matieres` (`numeromatiere`);

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `fk_emailprof` FOREIGN KEY (`emailprof`) REFERENCES `professeur` (`emailprof`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
