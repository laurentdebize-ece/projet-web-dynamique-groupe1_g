-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 18 mai 2023 à 17:59
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
  `promo` int(50) NOT NULL
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

CREATE TABLE `competences` (
  `id` int(50) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `datedecreation` int(50) NOT NULL,
  `datelimite` int(50) NOT NULL,
  `statut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`, `datedecreation`, `datelimite`, `statut`) VALUES
(1, 'reflexion sur un probleme mathematique', 2018, 2024, 'non acquis'),
(2, 'creer un site web', 2015, 2023, 'non acquis'),
(3, 'modeliser des systemes', 2020, 2025, 'non acquis'),
(4, 'comprendre le vhdl', 2019, 2026, 'non acquis'),
(5, 'maitriser algebre', 2020, 2024, 'non acquis'),
(6, 'theorie des graphes', 2018, 2026, 'non acquis'),
(7, 'notions electromag', 2018, 2026, 'non acquis'),
(8, 'systemes boucles', 2018, 2024, 'non acquis');

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
(4, 8);

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
  `numeroclasse` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `emaileleve`, `motdepasse`, `numeroclasse`) VALUES
('Lefeuvre', 'Aurelien', 'aurelien.lefeuvre@edu.ece.fr', '4', 1),
('Jacquot', 'Clara', 'clara.jacquot@edu.ece.fr', '2', 3),
('Blampain', 'Lena', 'lena.blampain@edu.ece.fr', '1', 1),
('Berdjah', 'Margaux', 'margaux.berdjah@edu.ece.fr', '3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `numeval` int(50) NOT NULL,
  `emaileleve` varchar(200) NOT NULL,
  `numniveval` int(50) NOT NULL,
  `email du prof` varchar(255) NOT NULL,
  `id` int(50) NOT NULL
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
('electronique', 4, 10);

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
  ADD KEY `fk_emailduprof` (`email du prof`);

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
  ADD CONSTRAINT `fk_emailprof` FOREIGN KEY (`emailprof`) REFERENCES `professeur` (`emailprof`),
  ADD CONSTRAINT `fk_numeroclasse` FOREIGN KEY (`numeroclasse`) REFERENCES `classe` (`numeroclasse`),
  ADD CONSTRAINT `fk_numeromatiere` FOREIGN KEY (`numeromatiere`) REFERENCES `matieres` (`numeromatiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
