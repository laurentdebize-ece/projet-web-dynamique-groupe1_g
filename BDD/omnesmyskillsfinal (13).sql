-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 21 mai 2023 à 16:50
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

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

CREATE TABLE `admin` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
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

CREATE TABLE `classe` (
  `numeroclasse` int(50) NOT NULL,
  `promo` int(50) NOT NULL,
  `ecole` varchar(255) NOT NULL
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

CREATE TABLE `competences` (
  `id` int(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `statut` varchar(200) NOT NULL,
  `datecreation` date DEFAULT NULL,
  `datelimite` date DEFAULT NULL,
  `ecole` varchar(255) NOT NULL DEFAULT 'ECE'
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
(9, 'maitriser la finance', 'non acquis', '2022-09-01', '2022-12-02', 'INSEEC');

-- --------------------------------------------------------

--
-- Structure de la table `competences_matieres`
--

CREATE TABLE `competences_matieres` (
  `numeromatiere` int(50) DEFAULT NULL,
  `id` int(50) DEFAULT NULL
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

CREATE TABLE `enseigner` (
  `emailprof` varchar(255) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  `emaileleve` varchar(255) NOT NULL
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

CREATE TABLE `etudiant` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `emaileleve` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `ecole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `emaileleve`, `motdepasse`, `numeroclasse`, `ecole`) VALUES
('Lefeuvre', 'Aurelien', 'aurelien.lefeuvre@edu.ece.fr', '4', 1, 'ECE'),
('Jacquot', 'Clara', 'clara.jacquot@edu.ece.fr', '2', 3, 'ECE'),
('Blampain', 'Lena', 'lena.blampain@edu.ece.fr', '1', 1, 'ECE'),
('Berdjah', 'Margaux', 'margaux.berdjah@edu.ece.fr', '3', 2, 'ECE');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `numeval` int(11) NOT NULL DEFAULT '0',
  `emaileleve` varchar(200) NOT NULL,
  `numniveval` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL,
  `evaluation` varchar(255) DEFAULT NULL,
  `emailprof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `nom` varchar(200) NOT NULL,
  `numeromatiere` int(50) NOT NULL,
  `volume horaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`nom`, `numeromatiere`, `volume horaire`) VALUES
('Mathematiques', 1, 10),
('Informatique', 2, 12),
('Physique', 3, 6),
('electronique', 4, 10),
('economie', 5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `niveval`
--

CREATE TABLE `niveval` (
  `numeval` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `emailprof` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailprof`, `motdepasse`, `Nom`, `prenom`) VALUES
('bianchi@edu.ece.fr', 'frfr', 'Bianchi', 'Celine'),
('debize@edu.ece.fr', 'blabla', 'Debize', 'Laurent'),
('Dedecker@edu.ece.fr', 'roro', 'Dedecker', 'Samira'),
('mazioua@edu.ece.fr', 'baba', 'mazioua', 'amirouche');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`numeroclasse`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competences_matieres`
--
ALTER TABLE `competences_matieres`
  ADD KEY `numeromatiere` (`numeromatiere`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD KEY `fk_numeroclasse` (`numeroclasse`),
  ADD KEY `fk_numeromatiere` (`numeromatiere`),
  ADD KEY `fk_emailprof` (`emailprof`),
  ADD KEY `fk_emaileleve` (`emaileleve`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`emaileleve`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`numeval`),
  ADD KEY `fk_emaileleve` (`emaileleve`),
  ADD KEY `fk_numniveval` (`numniveval`),
  ADD KEY `fk_id` (`id`),
  ADD KEY `fk_emailprof` (`emailprof`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`numeromatiere`);

--
-- Index pour la table `niveval`
--
ALTER TABLE `niveval`
  ADD PRIMARY KEY (`numeval`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`emailprof`);

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
