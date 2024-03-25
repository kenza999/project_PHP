-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 19 mars 2024 à 09:38
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio_kenza`
--

-- --------------------------------------------------------

--
-- Structure de la table `proposals`
--

DROP TABLE IF EXISTS `proposals`;
CREATE TABLE IF NOT EXISTS `proposals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `missionName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text NOT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `missionDuration` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `missionStart` date NOT NULL,
  `missionEnd` text NOT NULL,
  `remoteWork` text NOT NULL,
  `location` varchar(150) NOT NULL,
  `skillsRequired` text NOT NULL,
  `id_client` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `proposals`
--

INSERT INTO `proposals` (`id`, `missionName`, `description`, `budget`, `missionDuration`, `created_at`, `updated_at`, `missionStart`, `missionEnd`, `remoteWork`, `location`, `skillsRequired`, `id_client`) VALUES
(2, 'developpeur back-end', 'ù:mù:', 2000.00, 2, '2024-02-02 15:28:25', '2024-02-02 15:28:25', '2024-02-16', '', 'non', 'la defense', 'php', 0),
(3, 'developpeur back-end', 'dc', 2000.00, 2, '2024-02-02 15:28:46', '2024-02-02 15:28:46', '2024-02-16', '', 'non', 'la defense', 'php', 0),
(20, 'Concepteur UX/UI', 'Conception et amélioration de l\'interface utilisateur pour nos applications web et mobiles.', 3500.00, 3, '2024-02-06 08:27:22', '2024-02-06 08:27:22', '2024-03-01', '', 'oui', 'Paris', 'design, photoshop, sketch', 0),
(21, 'Développeur Full Stack', 'Participation au développement de nouvelles fonctionnalités et maintenance des systèmes existants.', 4000.00, 4, '2024-02-06 08:27:22', '2024-02-06 08:27:22', '2024-03-15', '', 'oui', 'Nantes', 'javascript, react, node.js', 0),
(22, 'Analyste de données', 'Analyse des données de vente pour aider à orienter les décisions stratégiques de l\'entreprise.', 3000.00, 2, '2024-02-06 08:27:22', '2024-02-06 08:27:22', '2024-04-01', '', 'non', 'Lyon', 'python, sql, tableau', 0),
(23, 'Spécialiste SEO', 'Optimisation du référencement naturel pour améliorer la visibilité de notre site web.', 2500.00, 1, '2024-02-06 08:27:22', '2024-02-06 08:27:22', '2024-04-15', '', 'oui', 'Remote', 'seo, google analytics', 0),
(24, 'testid', 'dfdfg', 636.00, 0, '2024-02-07 15:35:40', '2024-02-07 15:35:40', '2024-02-10', '', 'non', 'la defense', 'ghtfgyhtrf', 5),
(25, 'salimou detre aigri', 'deconnexion', 150.00, 1, '2024-02-08 14:28:56', '2024-02-08 14:28:56', '2024-02-16', '', 'oui', 'villier', 'ghh', 5),
(26, 'salimou detre aigri', 'deconnexion', 150.00, 1, '2024-02-08 14:29:05', '2024-02-08 14:29:05', '2024-02-16', '', 'oui', 'villier', 'ghh', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
