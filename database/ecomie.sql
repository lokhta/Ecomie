-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 07 mars 2020 à 14:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecomie`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(100) NOT NULL,
  `articleContent` text NOT NULL,
  `articleDate` datetime NOT NULL DEFAULT current_timestamp(),
  `validate` tinyint(1) NOT NULL DEFAULT 0,
  `categoryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`articleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleId`, `articleTitle`, `articleContent`, `articleDate`, `validate`, `categoryId`, `userId`) VALUES
(1, 'Comment fabriquer son potager en ville ?', 'Pourquoi les citadins n\'auraient pas accès aux bienfaits d\'un potager ? Les solutions pour cultiver des légumes en ville, sur peu de surface, ou même sans terrain, existent et ne sont pas si difficiles que ça à mettre en place. Voyez plutôt...', '2020-03-07 15:15:04', 1, 1, 1),
(2, 'Consommer local et de saison ?', 'En achetant auprès des producteurs locaux afin de contribuer à faire émerger une autre logique de production et de distribution. Un exemple qui marche ? Le système des AMAP (Association pour le Maintien d’une Agriculture Paysanne). Il propose de créer un lien privilégié entre un paysan et un groupe de consommateurs qui, chaque semaine, va remplir son panier de fruits et de légumes frais, de viande, de vin… Cette collaboration permet à des milliers de paysans de s’installer tous les ans sur de petites exploitations respectueuses de l’environnement. La France comptait 500 AMAP en 2007, elles sont 4000 en prévision en 2010. Les AMAP connaissent un tel succès qu’elles affichent souvent complet ! Alors pourquoi ne pas en créer une ?', '2020-03-07 15:17:36', 0, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(15) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Astuces'),
(2, 'Alimentaires');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `commentContent` text NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `report` tinyint(1) NOT NULL DEFAULT 0,
  `userId` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) NOT NULL,
  `eventContent` text NOT NULL,
  `dateStart` date NOT NULL,
  `timeStart` time NOT NULL,
  `dateEnd` date NOT NULL,
  `timeEnd` time NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT current_timestamp(),
  `alt` varchar(50) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `msgContent` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT current_timestamp(),
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  PRIMARY KEY (`msgId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msgId`, `msgContent`, `msgDate`, `sender`, `recipient`) VALUES
(1, 'Bonjour, j\'aimerais pouvoir publier un article sur votre site mais je n\'y arrive pas, pouvez-vous me guider ?', '2020-03-07 14:54:18', 1, 4),
(2, 'Comment change t\'on son adresse email ?', '2020-03-07 15:00:20', 3, 4),
(3, 'Bonjour... j\'ai envoyer un message à Victoire mais elle me dis qu\'elle ne l\'as pas reçus...', '2020-03-07 15:02:08', 2, 4),
(4, 'Salut :)', '2020-03-07 15:02:08', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(100) NOT NULL,
  `newsContent` text NOT NULL,
  `newsDate` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`newsId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`newsId`, `newsTitle`, `newsContent`, `newsDate`) VALUES
(1, 'Consommer local et de saison ?', 'En achetant auprès des producteurs locaux afin de contribuer à faire émerger une autre logique de production et de distribution. Un exemple qui marche ? Le système des AMAP (Association pour le Maintien d’une Agriculture Paysanne). Il propose de créer un lien privilégié entre un paysan et un groupe de consommateurs qui, chaque semaine, va remplir son panier de fruits et de légumes frais, de viande, de vin… Cette collaboration permet à des milliers de paysans de s’installer tous les ans sur de petites exploitations respectueuses de l’environnement. La France comptait 500 AMAP en 2007, elles sont 4000 en prévision en 2010. Les AMAP connaissent un tel succès qu’elles affichent souvent complet ! Alors pourquoi ne pas en créer une ?', '2020-03-07 14:49:38'),
(2, 'Comment fabriquer son potager en ville ?', 'Pourquoi les citadins n\'auraient pas accès aux bienfaits d\'un potager ? Les solutions pour cultiver des légumes en ville, sur peu de surface, ou même sans terrain, existent et ne sont pas si difficiles que ça à mettre en place. Voyez plutôt...', '2020-03-07 14:49:38'),
(3, 'Prendre soin de ses plantes aromatiques', 'A peu près partout, à condition qu\'il y ait un minimum de lumière et de soleil durant la journée. Attention, il ne faut pas une exposition trop soutenue au soleil car cela pourrait nuire à la plante. Choisissez donc de préférence la mi-ombre aux heures les plus chaudes, sauf pour le romarin, le thym et le basilic.', '2020-03-07 14:51:02');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(15) NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `subscribes`
--

DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE IF NOT EXISTS `subscribes` (
  `subscriberId` int(11) NOT NULL AUTO_INCREMENT,
  `subscriberEmail` varchar(100) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `newsId` int(11) NOT NULL,
  PRIMARY KEY (`subscriberId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribes`
--

INSERT INTO `subscribes` (`subscriberId`, `subscriberEmail`, `userId`, `newsId`) VALUES
(1, 'EmmelineLanctot@dayrep.com', NULL, 1),
(2, 'antoinecousteau@gmail.com', 2, 2),
(3, 'christianducharme@hotmail.com', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `userFirstname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `cp` char(5) NOT NULL,
  `city` varchar(80) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userFirstname`, `email`, `phone`, `address`, `cp`, `city`, `pwd`, `avatar`, `roleId`) VALUES
(1, 'Ducharme', 'Christian', 'christianducharme@hotmail.com', '0288170297', '94 , avenue du Marechal Juin', '50000', 'Saint-Lô', '12345678', '', 1),
(2, 'Cousteau', 'Antoine', 'antoinecousteau@gmail.com', '0188971387', '17, rue Pierre Motte', '97400', 'Saint-Denis', '12345678', '', 1),
(3, 'Dionne', 'Victoire', 'victoiredionne@gmail.com', '0101633946', '32, Place de la Madeleine', '75010', 'Paris', '12345678', '', 1),
(4, 'Admin', 'Admin', 'GanelonBarteaux@armyspy.com', NULL, '85, rue du Fossé des Tanneurs', '83100', 'Toulon', 'admin', 'admin', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
