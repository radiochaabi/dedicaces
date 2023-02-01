-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 jan. 2023 à 15:47
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `dedicaces`
--

DROP TABLE IF EXISTS `dedicaces`;
CREATE TABLE IF NOT EXISTS `dedicaces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL COMMENT 'nom de la personne',
  `pour` varchar(100) NOT NULL COMMENT 'indique pour qui',
  `description` text NOT NULL COMMENT 'dédicace',
  `deadline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `dedicaces`
--

INSERT INTO `dedicaces` (`id`, `nom`, `pour`, `description`, `deadline`) VALUES
(1, 'Hanna', 'Mes amis', 'Le chaabi c\'est rsasse.', '2022-10-29 16:00:53'),
(2, 'Dalila', 'Les Algerois', 'Bonne écoute à tous...', '2022-10-29 16:00:53'),
(3, 'Webmaster', 'Mahfoud', 'Faire des sites internet', '2022-10-29 16:10:13'),
(4, 'Julie', 'Ma famille', 'Bonne Année Scolaire 2022 pour tous et à tout le monde connu et inconnu:)', '2022-11-04 16:13:25'),
(5, 'Antoine', 'Ma famille, mon quartier...', 'Bonne Année Hidjriya et Bonne Année Scolaire 2022 pour tous et à tout le monde connu et inconnu:)', '2022-11-04 16:36:06'),
(6, 'François', 'l\'humanité', 'Bonne Année', '2022-11-04 17:59:04'),
(7, 'Raoul', 'l\'humanité', 'écouter la radiochaabi, ça décoiffe', '2022-11-04 18:38:15'),
(8, 'John', 'Carpenter', 'Essai depuis un fichier Vcode', '2022-11-14 14:20:58'),
(9, 'Jean Pierre', 'Ma fille', 'Bonne chance pour tes études', '2022-11-14 17:59:36'),
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
