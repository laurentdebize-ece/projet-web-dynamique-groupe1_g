-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 20 mai 2023 à 00:33
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

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`nom`, `prenom`, `mdp`, `email`) VALUES
('ece', 'admin', 'motdepasseadmin', 'admin@edu.ece.fr');

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`numeroclasse`, `promo`) VALUES
(1, 2026),
(2, 2026),
(3, 2026);

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `nom`, `statut`, `datecreation`, `datelimite`) VALUES
(1, 'reflexion sur un probleme mathematique', 'non acquis', '2018-05-02', '2024-06-07'),
(2, 'creer un site web', 'non acquis', '2015-03-04', '2023-10-07'),
(3, 'modeliser des systemes', 'non acquis', '2020-09-01', '2025-06-04'),
(4, 'comprendre le vhdl', 'non acquis', '2019-11-21', '2026-06-11'),
(5, 'maitriser algebre', 'non acquis', '2020-09-04', '2024-06-13'),
(6, 'theorie des graphes', 'non acquis', '2018-09-25', '2027-02-12'),
(7, 'notions electromag', 'non acquis', '2018-09-29', '2026-11-24'),
(8, 'systemes boucles', 'non acquis', '2022-01-01', '2022-07-08');

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

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `emaileleve`, `motdepasse`, `numeroclasse`) VALUES
('Lefeuvre', 'Aurelien', 'aurelien.lefeuvre@edu.ece.fr', '4', 1),
('Jacquot', 'Clara', 'clara.jacquot@edu.ece.fr', '2', 3),
('Blampain', 'Lena', 'lena.blampain@edu.ece.fr', '1', 1),
('Berdjah', 'Margaux', 'margaux.berdjah@edu.ece.fr', '3', 2);

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`nom`, `numeromatiere`, `volume horaire`) VALUES
('Mathematiques', 1, 10),
('Informatique', 2, 12),
('Physique', 3, 6),
('electronique', 4, 10);

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailprof`, `motdepasse`, `Nom`, `prenom`) VALUES
('bianchi@edu.ece.fr', 'frfr', 'Bianchi', 'Celine'),
('debize@edu.ece.fr', 'blabla', 'Debize', 'Laurent'),
('Dedecker@edu.ece.fr', 'roro', 'Dedecker', 'Samira'),
('mazioua@edu.ece.fr', 'baba', 'mazioua', 'amirouche');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
