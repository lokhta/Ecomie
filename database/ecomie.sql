--- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2020 at 11:51 AM
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
  `articleValidate` tinyint(1) NOT NULL DEFAULT '0',
  `articleCategory` int(11) NOT NULL,
  `articleAuthor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleId`, `articleTitle`, `articleContent`, `articleDate`, `articleValidate`, `articleCategory`, `articleAuthor`) VALUES
(1, 'Comment fabriquer son potager en ville ?', 'Pourquoi les citadins n\'auraient pas accès aux bienfaits d\'un potager ? Les solutions pour cultiver des légumes en ville, sur peu de surface, ou même sans terrain, existent et ne sont pas si difficiles que ça à mettre en place. Voyez plutôt...', '2020-03-07 15:15:04', 1, 1, 1),
(7, 'Le boycott peut-il changer les choses ', 'Le boycott est aujourd’hui la dernière arme encore disponible pour les citoyens. Plus puissant que n’importe quel bulletin de vote. Pourtant on ne voit pas ou très peu de résistance citoyenne face à certaine injustice social ou environnemental. Mail il existe une association qui met en place des actions de boycott en proposant des alternatives aux entreprises. Je vous invite à vous intéresser à l’association I-boycott. C’est uni que le boycott pourra changer les choses et I-boycott est le lien entre des valeurs sociales, environnementales et une action efficace contre toutes ses injustices.', '2020-03-18 16:14:23', 1, 1, 1),
(8, 'Manger local et de saison ?', 'Manger local et de saison, c’est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fraîcheur des aliments et les saveurs du terroir. C’est aussi encourager la production alimentaire près de chez soi et, par la même occasion, l’autonomie alimentaire et un partage plus juste des ressources nourricières avec le reste du monde.\r\nManger local et de saison c’est du bon sens\r\n', '2020-03-12 08:24:20', 2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Faire'),
(2, 'Savoir');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `commentContent` text NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentReport` tinyint(1) NOT NULL DEFAULT '0',
  `commentAuthor` int(11) NOT NULL,
  `commentArticle` int(11) DEFAULT NULL,
  `commentEvent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `commentDate`, `commentReport`, `commentAuthor`, `commentArticle`, `commentEvent`) VALUES
(1, 'Nettoyer le quartier la flemme mais l\'apéro. Vous pouvez compter sur moi les voisinoux', '2020-04-20 08:42:32', 1, 1, NULL, 2),
(2, 'J\'utilise de la lavande pour parfumer ma lessive en plus ça éloigne les mites.', '2020-03-25 16:32:07', 0, 2, 5, NULL),
(3, 'Consommer de saison c\'est sympa pour la planète mais l\'hiver c\'est horrible. J\'en peux plus des panais.', '2020-03-23 20:04:18', 0, 3, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventContent` text NOT NULL,
  `eventDateStart` date NOT NULL,
  `eventTimeStart` time NOT NULL,
  `eventDateEnd` date NOT NULL,
  `eventTimeEnd` time NOT NULL,
  `eventAuthor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventContent`, `eventDateStart`, `eventTimeStart`, `eventDateEnd`, `eventTimeEnd`, `eventAuthor`) VALUES
(1, 'Nettoyer le quartier', '<p>Hello tout le monde, Ecomie vous propose de vous organiser pour une balade dimanche, ayant pour but de ramasser les d&eacute;chets de votre quartier. Bonne chasse !</p>\r\n', '2020-05-10', '09:00:00', '2020-05-10', '20:00:00', 2),
(2, 'Apéro ', 'Le lien, la vie d\'un quartier passe par le partage est notamment le partage de bon moment. \r\nAlors ramener chaise table et de bonne choses a partager pour vivre ensemble un moment convivial.\r\nPs: N\'oublié pas de prévenir vos voisins  ', '2020-05-23', '18:30:00', '2020-05-23', '22:00:00', 3),
(8, 'Billy', '<p>Test event</p>\r\n', '2020-04-16', '12:23:00', '2020-04-29', '12:00:00', 33),
(9, 'test', '<p>Test date et time</p>\r\n', '2020-04-10', '21:01:00', '2020-04-18', '23:43:00', 33),
(10, 'Test image', '<p>Test image<img alt=\"\" src=\"/assets/img/hulot.jpg\" /><img alt=\"\" src=\"/ecomie/assets/img/hulot.jpg\" style=\"height:400px; width:600px\" /></p>\r\n', '2020-04-30', '16:45:00', '2020-05-15', '12:45:00', 33);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `formId` int(11) NOT NULL,
  `formSendername` varchar(20) CHARACTER SET utf8 NOT NULL,
  `formSendermail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `formSubject` varchar(150) CHARACTER SET utf8 NOT NULL,
  `formMessage` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`formId`, `formSendername`, `formSendermail`, `formSubject`, `formMessage`) VALUES
(1, 'Julien', 'julien.paris@hotmail.com', 'Ajout articles', 'Très beau site ! Pourrais-je savoir comment l\'on peut intégrer des articles dans votre site ?'),
(2, 'Antoinedu59', 'antoinedu59@gmail.com', 'Bonjour', 'Bonjour,\r\n\r\ncomment s\'inscrit-on sur ce site ?\r\n\r\nCordialement,\r\n'),
(3, 'Marie', 'mariecastor@gmail.com', 'Photos', 'Bonjour, j\'aimerais signaler qu\'il y a un bug je n\'arrive pas à agrandir l\'image sur le site quand je clique dessus.\r\n\r\nCordialement,\r\n'),
(4, 'Aurélie', 'aurélie.dujardin@yopmail.com', 'Commentaire', 'Comment comment-on les articles publiés ?');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `imgDateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgAlt` varchar(50) NOT NULL,
  `imgEvent` int(11) DEFAULT NULL,
  `imgArticle` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `imgName`, `imgDateAdd`, `imgAlt`, `imgEvent`, `imgArticle`) VALUES
(1, 'lessive-maison.jpg', '2020-03-23 19:35:18', 'Lessive maison', NULL, 5),
(2, 'i-boycott.jpg', '2020-03-25 19:35:18', 'I-Boycott', NULL, 7),
(5, 'fete-du-quartier', '2020-03-23 20:05:11', 'Fête du quartier', 2, NULL),
(7, 'hulot.jpg', '2020-03-24 11:14:31', 'Nicolas Hulot', 1, NULL),
(8, '/ecomie/assets/img/terre.png', '2020-05-03 16:57:19', 'La terre', 8, NULL),
(11, '/ecomie/assets/img/terre.png', '2020-05-04 18:30:47', 'Terre', 9, NULL),
(14, '/ecomie/assets/img/oops.png', '2020-05-07 17:39:48', 'oups', 8, NULL),
(19, '/ecomie/assets/img/recette-lessive.png', '2020-05-07 17:46:43', '', 8, NULL),
(18, '/ecomie/assets/img/zero.jpg', '2020-05-07 17:46:43', 'zéro', 9, NULL),
(20, '/ecomie/assets/img/slide1.jpg', '2020-05-07 17:46:43', 'slide', 9, NULL),
(21, '/ecomie/assets/img/oops.png', '2020-05-07 17:46:43', 'oups', 8, NULL),
(22, '/ecomie/assets/img/hulot.jpg', '2020-05-07 17:46:43', 'hulot', 8, NULL),
(23, '/ecomie/assets/img/partage_2.png', '2020-05-07 17:46:43', 'Partage', 9, NULL),
(25, '/ecomie/assets/img/fete-du-quartier.jpg', '2020-05-07 17:46:43', 'Fête', 9, NULL),
(26, '/ecomie/assets/img/ecomie_plan.png', '2020-05-07 17:46:43', '', 8, NULL),
(27, '/ecomie/assets/img/fete-du-quartier.jpg', '2020-05-07 17:46:43', '', 9, NULL),
(28, '/ecomie/assets/img/zero.jpg', '2020-05-07 17:46:57', 'zéro', 9, NULL),
(29, '/ecomie/assets/img/recette-lessive.png', '2020-05-07 17:46:57', '', 8, NULL),
(30, '/ecomie/assets/img/slide1.jpg', '2020-05-07 17:46:57', 'slide', 9, NULL),
(31, '/ecomie/assets/img/oops.png', '2020-05-07 17:46:57', 'oups', 8, NULL),
(32, '/ecomie/assets/img/hulot.jpg', '2020-05-07 17:46:57', 'hulot', 8, NULL),
(33, '/ecomie/assets/img/partage_2.png', '2020-05-07 17:46:57', 'Partage', 9, NULL),
(35, '/ecomie/assets/img/fete-du-quartier.jpg', '2020-05-07 17:46:57', 'Fête', 9, NULL),
(36, '/ecomie/assets/img/ecomie_plan.png', '2020-05-07 17:46:57', '', 8, NULL),
(37, '/ecomie/assets/img/fete-du-quartier.jpg', '2020-05-07 17:46:57', '', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgId` int(11) NOT NULL,
  `msgContent` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msgSender` int(11) NOT NULL,
  `msgRecipient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgId`, `msgContent`, `msgDate`, `msgSender`, `msgRecipient`) VALUES
(1, 'Bonjour, j\'aimerais pouvoir publier un article sur votre site mais je n\'y arrive pas, pouvez-vous me guider ?', '2020-03-07 14:54:18', 1, 4),
(2, 'Comment change t\'on son adresse email ?', '2020-03-07 15:00:20', 3, 4),
(3, 'Bonjour... j\'ai envoyer un message à Victoire mais elle me dis qu\'elle ne l\'as pas reçus...', '2020-03-07 15:02:08', 2, 4),
(4, 'Salut :)', '2020-03-07 15:02:08', 2, 3);

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

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`newsId`, `newsTitle`, `newsContent`, `newsDate`) VALUES
(1, 'Consommer local et de saison ?', 'En achetant auprès des producteurs locaux afin de contribuer à faire émerger une autre logique de production et de distribution. Un exemple qui marche ? Le système des AMAP (Association pour le Maintien d’une Agriculture Paysanne). Il propose de créer un lien privilégié entre un paysan et un groupe de consommateurs qui, chaque semaine, va remplir son panier de fruits et de légumes frais, de viande, de vin… Cette collaboration permet à des milliers de paysans de s’installer tous les ans sur de petites exploitations respectueuses de l’environnement. La France comptait 500 AMAP en 2007, elles sont 4000 en prévision en 2010. Les AMAP connaissent un tel succès qu’elles affichent souvent complet ! Alors pourquoi ne pas en créer une ?', '2020-03-07 14:49:38'),
(2, 'Comment fabriquer son potager en ville ?', 'Pourquoi les citadins n\'auraient pas accès aux bienfaits d\'un potager ? Les solutions pour cultiver des légumes en ville, sur peu de surface, ou même sans terrain, existent et ne sont pas si difficiles que ça à mettre en place. Voyez plutôt...', '2020-03-07 14:49:38'),
(3, 'Prendre soin de ses plantes aromatiques', 'A peu près partout, à condition qu\'il y ait un minimum de lumière et de soleil durant la journée. Attention, il ne faut pas une exposition trop soutenue au soleil car cela pourrait nuire à la plante. Choisissez donc de préférence la mi-ombre aux heures les plus chaudes, sauf pour le romarin, le thym et le basilic.', '2020-03-07 14:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `subscribeId` int(11) NOT NULL,
  `subscribeEmail` varchar(100) NOT NULL,
  `subscribeMember` int(11) DEFAULT NULL,
  `subscribeNews` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`subscribeId`, `subscribeEmail`, `subscribeMember`, `subscribeNews`) VALUES
(1, 'EmmelineLanctot@dayrep.com', NULL, 1),
(2, 'antoinecousteau@gmail.com', 2, 2),
(3, 'christianducharme@hotmail.com', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userFirstname` varchar(20) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPhone` varchar(15) DEFAULT NULL,
  `userAddress` varchar(150) NOT NULL,
  `userCp` char(5) NOT NULL,
  `userCity` varchar(80) NOT NULL,
  `userPwd` varchar(255) NOT NULL,
  `userAvatar` varchar(255) NOT NULL,
  `userRole` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userFirstname`, `userEmail`, `userPhone`, `userAddress`, `userCp`, `userCity`, `userPwd`, `userAvatar`, `userRole`) VALUES
(6, 'Ducharme', 'Bob', 'christianducharme@hotmail.com', '0288170297', '94 , avenue du Marechal Juin', '50000', 'Saint-Lô', '12345678', 'user-solid.svg', 1),
(4, 'Cousteau', 'Antoine', 'antoinecousteau@gmail.com', '0188971387', '17, rue Pierre Motte', '97400', 'Saint-Denis', '12345678', '', 3),
(3, 'Dionne', 'Victoire', 'victoiredionne@gmail.com', '0101633946', '32, Place de la Madeleine', '75010', 'Paris', '12345678', '', 3),
(1, 'Admin', 'Admin', 'GanelonBarteaux@armyspy.com', '0623548797', '85, rue du Fossé des Tanneurs', '83100', 'Toulon', 'W!tn8$D7tr', 'admin', 1),
(2, 'Modeur', 'Modeur', 'moderator.ecomie@gmail.com', '0785964123', '5 rue de Michelbach', '68330', 'Huningue', 'TqUAC5_E', 'moderator', 2),
(32, 'Al', 'Luffy', 'sofiane@email.fr', NULL, '1 rue one piece', '67100', 'Strasbourg', 'c0db3d74ffa0c90194860530d1bea1090d1e94b0d3e608f3ea72ba4d37a84f73024c5d10918eb6d186f64d632ad2b524b3f731bc2b8f8909fd2c04126e4ba929nhD4FLIZ+a6DnoKDzD4fC5bUrDyJbR00xiRCIbeoCI0=', 'user-solid.svg', 3),
(33, 'Simpson', 'Bart', 'bs@gmail.com', NULL, '1 rue de jaune', '67100', 'Strasbourg', '$2y$10$r6DOlTvs2zUb7yOi6FT6XOyf.5FR4FiPqx04MGbvv7hz490bM/VRi', 'user-solid.svg', 1),
(34, 'Louis', 'marc', 'lm@mail.fr', NULL, '12 rue de rien ', '67100', 'strasbourg', '$2y$10$epTP/Ar0HxxeQtOIkT.oFeMOu8cRFxm2CrzYDjgJb0o/.Qsp.T2Ci', 'user-solid.svg', 3);

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
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`formId`);

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
  ADD PRIMARY KEY (`subscribeId`);

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
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `formId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `subscribeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
