-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 avr. 2020 à 14:49
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

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
  `articleValidate` tinyint(1) NOT NULL DEFAULT 0,
  `articleCategory` int(11) NOT NULL,
  `articleAuthor` int(11) NOT NULL,
  PRIMARY KEY (`articleId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleId`, `articleTitle`, `articleContent`, `articleDate`, `articleValidate`, `articleCategory`, `articleAuthor`) VALUES
(1, 'Comment fabriquer son potager en ville ?', 'Pourquoi les citadins n\'auraient pas accès aux bienfaits d\'un potager ? Les solutions pour cultiver des légumes en ville, sur peu de surface, ou même sans terrain, existent et ne sont pas si difficiles que ça à mettre en place. Voyez plutôt...', '2020-03-07 15:15:04', 1, 1, 1),
(2, 'Consommer local et de saison ?', 'En achetant auprès des producteurs locaux afin de contribuer à faire émerger une autre logique de production et de distribution. Un exemple qui marche ? Le système des AMAP (Association pour le Maintien d’une Agriculture Paysanne). Il propose de créer un lien privilégié entre un paysan et un groupe de consommateurs qui, chaque semaine, va remplir son panier de fruits et de légumes frais, de viande, de vin… Cette collaboration permet à des milliers de paysans de s’installer tous les ans sur de petites exploitations respectueuses de l’environnement. La France comptait 500 AMAP en 2007, elles sont 4000 en prévision en 2010. Les AMAP connaissent un tel succès qu’elles affichent souvent complet ! Alors pourquoi ne pas en créer une ?', '2020-03-07 15:17:36', 0, 2, 1),
(6, 'Prendre soin de ses plantes aromatiques', '1 Une plante aromatique par pot \r\n2 Exposer les un maximum à la lumière \r\n  mais attention aux tâches qui peuvent \r\n  apparaitre sur les feuilles à cause de \r\n  trop de lumière.\r\n3 Les mettre dans une terre de qualité.\r\n4 L’arrosage ne doit pas être \r\n  systématique, la terre doit rester \r\n  humide.\r\n5 Ne pas tailler plus de la moitié de la \r\n  plante lors de la récolte.\r\n\r\n', '2020-03-12 18:14:23', 0, 2, 2),
(5, 'Faire sa propre lessive', '1 Râper 40g de véritable savon de \r\n  Marseille.\r\n2 Faites-les fondre à feu doux dans un \r\n  litre d’eau très chaude.\r\n3 Mélanger bien.\r\n4 Ajoutez 3 C à S. de bicarbonate de \r\n  soude.\r\n5	Laisser reposer pendant 1 heures puis allonger avec 1 litre d’eau tiède.\r\n6	Le lendemain rallonger de nouveau avec 1 litre d’eau froide.\r\n7	Facultatif : après refroidissement parfumer avec quelques gouttes d’huile essentielle\r\n8	Mettez en bouteille.\r\n', '2020-03-11 16:12:19', 0, 2, 1),
(7, 'Le boycott peut-il changer les choses ', 'Le boycott est aujourd’hui la dernière arme encore disponible pour les citoyens. Plus puissant que n’importe quel bulletin de vote. Pourtant on ne voit pas ou très peu de résistance citoyenne face à certaine injustice social ou environnemental. Mail il existe une association qui met en place des actions de boycott en proposant des alternatives aux entreprises. Je vous invite à vous intéresser à l’association I-boycott. C’est uni que le boycott pourra changer les choses et I-boycott est le lien entre des valeurs sociales, environnementales et une action efficace contre toutes ses injustices.', '2020-03-18 16:14:23', 0, 1, 1),
(8, 'Manger local et de saison ?', 'Manger local et de saison, c’est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fraîcheur des aliments et les saveurs du terroir. C’est aussi encourager la production alimentaire près de chez soi et, par la même occasion, l’autonomie alimentaire et un partage plus juste des ressources nourricières avec le reste du monde.\r\nManger local et de saison c’est du bon sens\r\n', '2020-03-12 08:24:20', 0, 1, 3);

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
  `commentReport` tinyint(1) NOT NULL DEFAULT 0,
  `commentAuthor` int(11) NOT NULL,
  `commentArticle` int(11) DEFAULT NULL,
  `commentEvent` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `commentDate`, `commentReport`, `commentAuthor`, `commentArticle`, `commentEvent`) VALUES
(1, 'Nettoyer le quartier la flemme mais l\'apéro. Vous pouvez compter sur moi les voisinoux', '2020-05-07 19:52:07', 0, 1, NULL, 2),
(2, 'J\'utilise de la lavande pour parfumer ma lessive en plus ça éloigne les mites.', '2020-03-25 16:32:07', 0, 2, 5, NULL),
(3, 'Consommer de saison c\'est sympa pour la planète mais l\'hiver c\'est horrible. J\'en peux plus des panais.', '2020-03-23 20:04:18', 0, 3, 8, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) NOT NULL,
  `eventContent` text NOT NULL,
  `eventDateStart` date NOT NULL,
  `eventTimeStart` time NOT NULL,
  `eventDateEnd` date NOT NULL,
  `eventTimeEnd` time NOT NULL,
  `eventAuthor` int(11) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventContent`, `eventDateStart`, `eventTimeStart`, `eventDateEnd`, `eventTimeEnd`, `eventAuthor`) VALUES
(1, 'Nettoyer le quartier', 'Hello tout le monde,\r\nEcomie vous propose de vous organiser pour une balade dimanche, ayant pour but de ramasser les déchets de votre quartier. \r\n\r\nBonne chasse !', '2020-05-10', '09:00:00', '2020-05-10', '20:00:00', 2),
(2, 'Apéro ', 'Le lien, la vie d\'un quartier passe par le partage est notamment le partage de bon moment. \r\nAlors ramener chaise table et de bonne choses a partager pour vivre ensemble un moment convivial.\r\nPs: N\'oublié pas de prévenir vos voisins  ', '2020-05-23', '18:30:00', '2020-03-23', '22:00:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `formId` int(11) NOT NULL AUTO_INCREMENT,
  `formSendername` varchar(20) CHARACTER SET utf8 NOT NULL,
  `formSendermail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `formSubject` varchar(150) CHARACTER SET utf8 NOT NULL,
  `formMessage` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`formId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`formId`, `formSendername`, `formSendermail`, `formSubject`, `formMessage`) VALUES
(1, 'Julien', 'julien.paris@hotmail.com', 'Ajout articles', 'Très beau site ! Pourrais-je savoir comment l\'on peut intégrer des articles dans votre site ?'),
(2, 'Antoinedu59', 'antoinedu59@gmail.com', 'Bonjour', 'Bonjour,\r\n\r\ncomment s\'inscrit-on sur ce site ?\r\n\r\nCordialement,\r\n'),
(3, 'Marie', 'mariecastor@gmail.com', 'Photos', 'Bonjour, j\'aimerais signaler qu\'il y a un bug je n\'arrive pas à agrandir l\'image sur le site quand je clique dessus.\r\n\r\nCordialement,\r\n'),
(4, 'Aurélie', 'aurélie.dujardin@yopmail.com', 'Commentaire', 'Comment comment-on les articles publiés ?');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `imgName` varchar(255) NOT NULL,
  `imgDateAdd` datetime NOT NULL DEFAULT current_timestamp(),
  `imgAlt` varchar(50) NOT NULL,
  `imgEvent` int(11) DEFAULT NULL,
  `imgArticle` int(11) DEFAULT NULL,
  PRIMARY KEY (`imgId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`imgId`, `imgName`, `imgDateAdd`, `imgAlt`, `imgEvent`, `imgArticle`) VALUES
(1, 'lessive-maison.jpg', '2020-03-23 19:35:18', 'Lessive maison', NULL, 5),
(2, 'i-boycott.jpg', '2020-03-25 19:35:18', 'I-Boycott', NULL, 7),
(5, 'fete-du-quartier', '2020-03-23 20:05:11', 'Fête du quartier', 2, NULL),
(7, 'hulot.jpg', '2020-03-24 11:14:31', 'Nicolas Hulot', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `msgContent` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT current_timestamp(),
  `msgSender` int(11) NOT NULL,
  `msgRecipient` int(11) NOT NULL,
  PRIMARY KEY (`msgId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msgId`, `msgContent`, `msgDate`, `msgSender`, `msgRecipient`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Moderator');
(3, 'User'),


-- --------------------------------------------------------

--
-- Structure de la table `subscribes`
--

DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE IF NOT EXISTS `subscribes` (
  `subscribeId` int(11) NOT NULL AUTO_INCREMENT,
  `subscribeEmail` varchar(100) NOT NULL,
  `subscribeMember` int(11) DEFAULT NULL,
  `subscribeNews` int(11) NOT NULL,
  PRIMARY KEY (`subscribeId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribes`
--

INSERT INTO `subscribes` (`subscribeId`, `subscribeEmail`, `subscribeMember`, `subscribeNews`) VALUES
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
  `userEmail` varchar(100) NOT NULL,
  `userPhone` varchar(15) DEFAULT NULL,
  `userAddress` varchar(150) NOT NULL,
  `userCp` char(5) NOT NULL,
  `userCity` varchar(80) NOT NULL,
  `userPwd` varchar(255) NOT NULL,
  `userAvatar` varchar(255) NOT NULL,
  `userRole` int(11) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userFirstname`, `userEmail`, `userPhone`, `userAddress`, `userCp`, `userCity`, `userPwd`, `userAvatar`, `userRole`) VALUES
(6, 'Ducharme', 'Christian', 'christianducharme@hotmail.com', '0288170297', '94 , avenue du Marechal Juin', '50000', 'Saint-Lô', '12345678', '', 3),
(4, 'Cousteau', 'Antoine', 'antoinecousteau@gmail.com', '0188971387', '17, rue Pierre Motte', '97400', 'Saint-Denis', '12345678', '', 3),
(3, 'Dionne', 'Victoire', 'victoiredionne@gmail.com', '0101633946', '32, Place de la Madeleine', '75010', 'Paris', '12345678', '', 3),
(1, 'Admin', 'Admin', 'GanelonBarteaux@armyspy.com', '0623548797', '85, rue du Fossé des Tanneurs', '83100', 'Toulon', 'W!tn8$D7tr', 'admin', 1),
(2, 'Modeur', 'Modeur', 'moderator.ecomie@gmail.com', '0785964123', '5 rue de Michelbach', '68330', 'Huningue', 'TqUAC5_E', 'moderator', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
