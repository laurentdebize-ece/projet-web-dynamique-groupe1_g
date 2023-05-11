-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 07 mai 2023 à 14:53
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
-- Base de données : `omnesmyskills`
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
  `numéro` int(50) NOT NULL,
  `promo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`numéro`, `promo`) VALUES
(1, 2026),
(2, 2026),
(3, 2026);

-- --------------------------------------------------------

--
-- Structure de la table `compétences`
--

CREATE TABLE `compétences` (
  `id` int(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `date de creation` int(50) NOT NULL,
  `date limite` int(50) NOT NULL,
  `statut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE `correction` (
  `emailprof` varchar(255) NOT NULL,
  `numeval` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matières`
--

CREATE TABLE `matières` (
  `nom` varchar(200) NOT NULL,
  `numeroclasse` int(50) NOT NULL,
  `volume horaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matières`
--

INSERT INTO `matières` (`nom`, `numeroclasse`, `volume horaire`) VALUES
('Mathématiques', 1, 10),
('Informatique', 2, 12);
('Electronique',3, 11)
('Humanités',1,10)

-- --------------------------------------------------------

--
-- Structure de la table `niveval`
--

CREATE TABLE `niveval` (
  `numeval` int(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `emailprof` varchar(255) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailprof`, `mot de passe`, `Nom`, `prénom`) VALUES
('prof@edu.ece.fr', 'motdepasseprof', 'Nomprof', 'prenomprof');

-- --------------------------------------------------------

--
-- Structure de la table `étudiant`
--

CREATE TABLE `étudiant` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `emaileleve` varchar(300) NOT NULL,
  `mot de passe` varchar(255) NOT NULL,
  `numéro de la classe` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `étudiant`
--

INSERT INTO `étudiant` (`nom`, `prenom`, `emaileleve`, `mot de passe`, `numéro de la classe`) VALUES
('Nometudiant1', 'prenometudiant1', 'etudiant1@edu.ece.fr', 'motdepasseetudiant1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `évaluations`
--

CREATE TABLE `évaluations` (
  `numeval` int(50) NOT NULL,
  `emaileleve` varchar(200) NOT NULL,
  `nummatiere` int(50) NOT NULL,
  `numniveval` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`numéro`);

--
-- Index pour la table `compétences`
--
ALTER TABLE `compétences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `correction`
--
ALTER TABLE `correction`
  ADD KEY `fk_emailprof` (`emailprof`),
  ADD KEY `fk_numeroeval` (`numeval`);

--
-- Index pour la table `matières`
--
ALTER TABLE `matières`
  ADD PRIMARY KEY (`numeroclasse`);

--
-- Index pour la table `niveval`
--
ALTER TABLE `niveval`
  ADD PRIMARY KEY (`numeval`),
  ADD KEY `fk_id` (`id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`emailprof`);

--
-- Index pour la table `étudiant`
--
ALTER TABLE `étudiant`
  ADD PRIMARY KEY (`emaileleve`),
  ADD KEY `fk_numeroclasse` (`numéro de la classe`);

--
-- Index pour la table `évaluations`
--
ALTER TABLE `évaluations`
  ADD PRIMARY KEY (`numeval`),
  ADD KEY `fk_emaileleve` (`emaileleve`),
  ADD KEY `fk_numeromatiere` (`nummatiere`),
  ADD KEY `fk_numniveval` (`numniveval`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `fk_emailprof` FOREIGN KEY (`emailprof`) REFERENCES `professeur` (`emailprof`),
  ADD CONSTRAINT `fk_numeroeval` FOREIGN KEY (`numeval`) REFERENCES `évaluations` (`numeval`);

--
-- Contraintes pour la table `niveval`
--
ALTER TABLE `niveval`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `compétences` (`id`);

--
-- Contraintes pour la table `étudiant`
--
ALTER TABLE `étudiant`
  ADD CONSTRAINT `fk_numeroclasse` FOREIGN KEY (`numéro de la classe`) REFERENCES `classe` (`numéro`);

--
-- Contraintes pour la table `évaluations`
--
ALTER TABLE `évaluations`
  ADD CONSTRAINT `fk_emaileleve` FOREIGN KEY (`emaileleve`) REFERENCES `étudiant` (`emaileleve`),
  ADD CONSTRAINT `fk_numeromatiere` FOREIGN KEY (`nummatiere`) REFERENCES `matières` (`numeroclasse`),
  ADD CONSTRAINT `fk_numniveval` FOREIGN KEY (`numniveval`) REFERENCES `niveval` (`numeval`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
