-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 12, 2020 at 03:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecomie`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleId` int(11) NOT NULL,
  `articleTitle` varchar(100) NOT NULL,
  `articleContent` text NOT NULL,
  `articleDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validate` tinyint(1) NOT NULL DEFAULT '0',
  `categoryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleId`, `articleTitle`, `articleContent`, `articleDate`, `validate`, `categoryId`, `userId`) VALUES
(6, 'Prendre soin de ses plantes aromatiques', '1 Une plante aromatique par pot \r\n2 Exposer les un maximum à la lumière \r\n  mais attention aux tâches qui peuvent \r\n  apparaitre sur les feuilles à cause de \r\n  trop de lumière.\r\n3 Les mettre dans une terre de qualité.\r\n4 L’arrosage ne doit pas être \r\n  systématique, la terre doit rester \r\n  humide.\r\n5 Ne pas tailler plus de la moitié de la \r\n  plante lors de la récolte.\r\n\r\n', '2020-03-12 18:14:23', 0, 2, 2),
(5, 'Faire sa propre lessive', '1 Râper 40g de véritable savon de \r\n  Marseille.\r\n2 Faites-les fondre à feu doux dans un \r\n  litre d’eau très chaude.\r\n3 Mélanger bien.\r\n4 Ajoutez 3 C à S. de bicarbonate de \r\n  soude.\r\n5	Laisser reposer pendant 1 heures puis allonger avec 1 litre d’eau tiède.\r\n6	Le lendemain rallonger de nouveau avec 1 litre d’eau froide.\r\n7	Facultatif : après refroidissement parfumer avec quelques gouttes d’huile essentielle\r\n8	Mettez en bouteille.\r\n', '2020-03-11 16:12:19', 0, 2, 1),
(7, 'Le boycott peut-il changer les choses ', 'Le boycott est aujourd’hui la dernière arme encore disponible pour les citoyens. Plus puissant que n’importe quel bulletin de vote. Pourtant on ne voit pas ou très peu de résistance citoyenne face à certaine injustice social ou environnemental. Mail il existe une association qui met en place des actions de boycott en proposant des alternatives aux entreprises. Je vous invite à vous intéresser à l’association I-boycott. C’est uni que le boycott pourra changer les choses et I-boycott est le lien entre des valeurs sociales, environnementales et une action efficace contre toutes ses injustices.', '2020-03-18 16:14:23', 0, 1, 1),
(8, 'Manger local et de saison ?', 'Manger local et de saison, c’est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fraîcheur des aliments et les saveurs du terroir. C’est aussi encourager la production alimentaire près de chez soi et, par la même occasion, l’autonomie alimentaire et un partage plus juste des ressources nourricières avec le reste du monde.\r\nManger local et de saison c’est du bon sens\r\n', '2020-03-12 08:24:20', 0, 1, 3),
(9, 'Faire sa propre lessive', '1 Râper 40g de véritable savon de \r\n  Marseille.\r\n2 Faites-les fondre à feu doux dans un \r\n  litre d’eau très chaude.\r\n3 Mélanger bien.\r\n4 Ajoutez 3 C à S. de bicarbonate de \r\n  soude.\r\n5	Laisser reposer pendant 1 heures puis allonger avec 1 litre d’eau tiède.\r\n6	Le lendemain rallonger de nouveau avec 1 litre d’eau froide.\r\n7	Facultatif : après refroidissement parfumer avec quelques gouttes d’huile essentielle\r\n8	Mettez en bouteille.\r\n', '2020-03-11 16:12:19', 0, 2, 1),
(10, 'Prendre soin de ses plantes aromatiques', '1 Une plante aromatique par pot \r\n2 Exposer les un maximum à la lumière \r\n  mais attention aux tâches qui peuvent \r\n  apparaitre sur les feuilles à cause de \r\n  trop de lumière.\r\n3 Les mettre dans une terre de qualité.\r\n4 L’arrosage ne doit pas être \r\n  systématique, la terre doit rester \r\n  humide.\r\n5 Ne pas tailler plus de la moitié de la \r\n  plante lors de la récolte.\r\n\r\n', '2020-03-12 18:14:23', 0, 2, 2),
(11, 'Le boycott peut-il changer les choses ', 'Le boycott est aujourd’hui la dernière arme encore disponible pour les citoyens. Plus puissant que n’importe quel bulletin de vote. Pourtant on ne voit pas ou très peu de résistance citoyenne face à certaine injustice social ou environnemental. Mail il existe une association qui met en place des actions de boycott en proposant des alternatives aux entreprises. Je vous invite à vous intéresser à l’association I-boycott. C’est uni que le boycott pourra changer les choses et I-boycott est le lien entre des valeurs sociales, environnementales et une action efficace contre toutes ses injustices.', '2020-03-18 16:14:23', 0, 1, 1),
(12, 'Manger local et de saison ?', 'Manger local et de saison, c’est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fraîcheur des aliments et les saveurs du terroir. C’est aussi encourager la production alimentaire près de chez soi et, par la même occasion, l’autonomie alimentaire et un partage plus juste des ressources nourricières avec le reste du monde.\r\nManger local et de saison c’est du bon sens\r\n', '2020-03-12 08:24:20', 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `commentContent` text NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventContent` text NOT NULL,
  `dateStart` date NOT NULL,
  `timeStart` time NOT NULL,
  `dateEnd` date NOT NULL,
  `timeEnd` time NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alt` varchar(50) NOT NULL,
  `articleId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgId` int(11) NOT NULL,
  `msgContent` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(100) NOT NULL,
  `newsContent` text NOT NULL,
  `newsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `subscriberId` int(11) NOT NULL,
  `subscriberEmail` varchar(100) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `newsId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userFirstname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `cp` char(5) NOT NULL,
  `city` varchar(80) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`subscriberId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `subscriberId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
