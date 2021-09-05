-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 août 2021 à 00:34
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mywebsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `img` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `components`
--

DROP TABLE IF EXISTS `components`;
CREATE TABLE IF NOT EXISTS `components` (
  `id` int NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) NOT NULL,
  `filePHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `primaryFileCSS` varchar(50) NOT NULL,
  `secondaryFileCSS` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `scriptJS` varchar(250) DEFAULT NULL,
  `fullWidth` tinyint(1) NOT NULL,
  `dateAjout` date NOT NULL,
  `useCSS` tinyint(1) NOT NULL,
  `useJS` tinyint(1) NOT NULL,
  `useAPI` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Désignation` (`designation`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `components`
--

INSERT INTO `components` (`id`, `designation`, `filePHP`, `primaryFileCSS`, `secondaryFileCSS`, `scriptJS`, `fullWidth`, `dateAjout`, `useCSS`, `useJS`, `useAPI`) VALUES
(1, 'artistic image', 'vues/components/artistic-explode.php', '_artistic-img.scss', NULL, NULL, 0, '2021-08-27', 1, 0, 0),
(2, 'bd-manga', 'vues/components/bd-manga.php', '_BD-manga.scss', NULL, NULL, 0, '2021-08-27', 1, 0, 0),
(3, 'rotation grilles', 'vues/components/grid-rotate.php', '_rotateGrid.scss', NULL, NULL, 0, '2021-08-27', 1, 0, 0),
(9, 'perspective', 'vues/components/perspective-band.php', '_perspective.scss', NULL, '<script src=\"js/perspectives.js\"></script>', 1, '2021-08-28', 1, 1, 0),
(10, 'skew parallax', 'vues/components/skew-parallax.php', '_parallax.scss', NULL, NULL, 1, '2021-08-28', 1, 0, 0);

--
-- Déclencheurs `components`
--
DROP TRIGGER IF EXISTS `SetCurrentDate`;
DELIMITER $$
CREATE TRIGGER `SetCurrentDate` BEFORE INSERT ON `components` FOR EACH ROW BEGIN
	SET new.dateAjout=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `last_visit` date NOT NULL,
  `has_contacted` tinyint(1) NOT NULL DEFAULT '0',
  `has_download` tinyint(1) NOT NULL DEFAULT '0',
  `last_download` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
