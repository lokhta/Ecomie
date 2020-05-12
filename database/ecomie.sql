-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : ecomie.mysql.db
-- Généré le :  mar. 12 mai 2020 à 22:03
-- Version du serveur :  5.6.46-log
-- Version de PHP :  7.2.30

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
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`articleId`, `articleTitle`, `articleContent`, `articleDate`, `articleValidate`, `articleCategory`, `articleAuthor`) VALUES
(1, 'Faire sa propre lessive', '<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Râper 40g de véritable savon de Marseille.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Faites-les fondre à feu doux dans un litre d’eau très chaude.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Mélanger bien.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Ajoutez 3 C à S. de bicarbonate de soude.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Laisser reposer pendant 1 heures puis allonger avec 1 litre d’eau tiède.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Le lendemain rallonger de nouveau avec 1 litre d’eau froide.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Facultatif&nbsp;: après refroidissement parfumer avec quelques gouttes d’huile essentielle</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Mettez en bouteille.</span></span></li>\r\n</ol>\r\n', '2020-05-12 15:02:23', 1, 2, 3),
(2, 'Prendre soin de ses plantes aromatiques', '<ol>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Une plante aromatique par pot </span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Exposer les un maximum à la lumière mais attention aux tâches qui peuvent apparaitre sur les feuilles à cause de trop de lumière.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Les mettre dans une terre de qualité.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">L’arrosage ne doit pas être systématique, la terre doit rester humide.</span></span></li>\r\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Ne pas tailler plus de la moitié de la plante lors de la récolte.</span></span></li>\r\n</ol>\r\n', '2020-05-12 15:02:56', 2, 1, 3),
(3, 'Le boycott peut-il changer les choses ', '<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Le boycott est aujourd’hui la dernière arme encore disponible pour les citoyens. Plus puissant que n’importe quel bulletin de vote. Pourtant on ne voit pas ou très peu de résistance citoyenne face à certaine injustice social ou environnemental. Mail il existe une association qui met en place des actions de boycott en proposant des alternatives aux entreprises. Je vous invite à vous intéresser à l’association I-boycott. C’est uni que le boycott pourra changer les choses et I-boycott est le lien entre des valeurs sociales, environnementales et une action efficace contre toutes ses injustices.</span></span></p>\r\n', '2020-05-12 15:02:49', 1, 1, 1),
(4, 'Manger local et de saison ?', '<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Manger local et de saison, c&rsquo;est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fra&icirc;cheur des aliments et les saveurs du terroir. C&rsquo;est aussi encourager la production alimentaire pr&egrave;s de chez soi et, par la m&ecirc;me occasion, l&rsquo;autonomie alimentaire et un partage plus juste des ressources nourrici&egrave;res avec le reste du monde.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Manger local et de saison c&rsquo;est du bon sens.</span></span></p>\r\n', '2020-05-11 17:35:11', 0, 0, 1),
(5, 'Manger local et de saison ?', '<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Manger local et de saison, c’est reprendre contact avec celles et ceux qui nous nourrissent, retrouver la fraîcheur des aliments et les saveurs du terroir. C’est aussi encourager la production alimentaire près de chez soi et, par la même occasion, l’autonomie alimentaire et un partage plus juste des ressources nourricières avec le reste du monde.</span></span></p>\r\n\r\n<p><span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Manger local et de saison c’est du bon sens.</span></span></p>\r\n', '2020-05-12 15:03:03', 1, 1, 1),
(6, 'Réussir à faire germer les graines', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/articles_1589219889.jpg\" style=\"height:344px; width:500px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Réussir à faire germer les graines&nbsp;qui ont été semées nécessite de s\'assurer que les conditions de germination sont réunies.</p>\r\n\r\n<p style=\"text-align:justify\"><u>Ces conditions sont multiples :</u></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n- Les graines ne doivent pas être&nbsp;périmées :&nbsp;la \"durée germinative\", qui est la durée pendant laquelle les graines peuvent germer, est généralement indiquée sur les sachets de graines. Cette durée peut être de 3, 5, 8, 10 ans, etc...</p>\r\n\r\n<p style=\"text-align:justify\">- la terre doit être humide, sans être saturée d\'eau. Les graines ont besoin d\'humidité pour germer mais s\'il y a trop&nbsp;d\'eau elles peuvent pourrir. Il faut donc bien gérer l\'arrosage. Pour&nbsp;<a href=\"http://www.monjardinenpermaculture.fr/pages/semis-en-contenants\"><span style=\"color:#1abc9c\">les semis en contenant</span></a>&nbsp;(par exemple en pot), préférer l\'arrosage par le dessous (l\'eau remonte par capillarité).</p>\r\n\r\n<p style=\"text-align:justify\">- les graines doivent être&nbsp;semées à la bonne profondeur : environ 3 fois l\'épaisseur de la graine.<br />\r\nPour des petites graines (ex : salade), on recouvre de terre de 5 mm.<br />\r\nLes grosses graines (ex : fève) sont plantées jusqu\'à 3&nbsp;cm de profondeur.</p>\r\n\r\n<p style=\"text-align:justify\">- le<span style=\"color:#1abc9c\">&nbsp;</span><a href=\"http://www.monjardinenpermaculture.fr/pages/pailler-le-sol\"><span style=\"color:#1abc9c\">paillis</span></a>&nbsp;(la couverture du sol) ne doit pas empêcher&nbsp;la levée. On l\'écarte jusqu\'à ce que le jeune plant soit suffisamment développé, ou on met un paillis très fin (quelques millimètres) pour continuer à alimenter&nbsp;<a href=\"http://www.monjardinenpermaculture.fr/pages/comment-ca-fonctionne\"><span style=\"color:#1abc9c\">la vie du sol</span></a><span style=\"color:#1abc9c\">.</span></p>\r\n\r\n<p style=\"text-align:justify\">- la température du sol doit être suffisante. Ce n\'est pas la même selon les espèces (environ 5°C pour les pois et les salades,&nbsp;et 20°C pour le basilic).&nbsp;</p>\r\n', '2020-05-12 15:03:34', 1, 2, 12),
(7, 'Manger des légumes, ma méthode miracle', '<p>Salut, les petits loups,</p>\r\n\r\n<p>J\'ai une super méthode pour rester en bonne santé et tout ça :</p>\r\n\r\n<p>C\'est manger des légumes!!</p>\r\n\r\n<p>Je sais que c\'est un truc assez nouveau mais franchement ça marche!&nbsp;<img alt=\"cheeky\" src=\"http://sofianeal.ovh/assets/js/ckeditor/plugins/smiley/images/tongue_smile.png\" style=\"height:23px; width:23px\" title=\"cheeky\" /></p>\r\n\r\n<p>Bisous&nbsp;<img alt=\"kiss\" src=\"http://sofianeal.ovh/assets/js/ckeditor/plugins/smiley/images/kiss.png\" style=\"height:23px; width:23px\" title=\"kiss\" /></p>\r\n', '2020-05-12 15:03:15', 1, 1, 13),
(8, 'Une mousse au chocolat vegan et anti-gaspi', '<p>Voici une recette de mousse au chocolat sans &oelig;ufs et anti-gaspi. En ce moment, on ne trouve pas toujours des &oelig;ufs dans le commerce alors elle peut &ecirc;tre utile.&nbsp;</p>\r\n\r\n<p>A la place des blancs d&#39;oeufs, utilisez l&#39;eau de vos pois chiches en conserve.&nbsp;</p>\r\n\r\n<p>Montez cette eau en neige &agrave; l&#39;aide d&#39;un batteur &eacute;lectrique, vous verrez le r&eacute;sultat est bluffant! Incoporez-y votre chocolat noir (180g) et r&eacute;servez au moins une heure au r&eacute;frig&eacute;rateur. Vous ne verrez pas la diff&eacute;rence !</p>\r\n', '2020-05-11 20:34:55', 0, 0, 14),
(9, 'Soupe aux légumes du jardins (bio)', '<p><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/articles_1589223170.jpg\" style=\"height:376px; width:500px\" /></p>\r\n\r\n<p><u><strong>Ingrédients / pour 4 personnes</strong></u><strong> :&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>2 poireaux</li>\r\n	<li>2 à 4 carottes</li>\r\n	<li>2 navets</li>\r\n	<li>2 pommes de terre</li>\r\n	<li>1 oignon</li>\r\n	<li>2 cueillières à soupe de fines herbes</li>\r\n	<li>2 cueillières à soupe de crème fraiche allégée</li>\r\n	<li>1,5 litres d\'eau</li>\r\n	<li>sel, poivre</li>\r\n</ul>\r\n\r\n<p><u><strong>Préparation</strong></u><strong> :&nbsp;</strong></p>\r\n\r\n<p>1) Laver et éplucher tous les légumes. Les couper en petits morceaux pour une cuisson plus rapide.</p>\r\n\r\n<p>2)&nbsp;Verser 1,5 litre d\'eau dans l\'autocuiseur. Ajouter tous les légumes. Laisser cuire 15 minutes à partir du moment où la soupape tourne. Quand les carottes sont cuites, la soupe est prête.</p>\r\n\r\n<p>3)&nbsp;Mixer la soupe et saupoudrer de fines herbes&nbsp;ciselées. Saler et poivrer.</p>\r\n\r\n<p><strong>L\'astuce du chef&nbsp;</strong><img alt=\"cheeky\" src=\"http://sofianeal.ovh/assets/js/ckeditor/plugins/smiley/images/tongue_smile.png\" style=\"height:23px; width:23px\" title=\"cheeky\" />&nbsp;<strong>:</strong>&nbsp;Au moment de servir, déposer 1 cuillère à café de crème dans les assiettes ou les bols, et dessiner une spirale à l\'aide d\'un couteau.</p>\r\n\r\n<p>Et voilà !</p>\r\n', '2020-05-12 15:03:44', 1, 2, 7),
(10, 'Des conseils pour économiser l\'eau et l\'énergie chez soi', '<p>D’après les statistiques, un Français consacre en moyenne 8,5 % de son budget annuel aux factures d’énergies, ce qui représente près de 2&nbsp;900 euros par ménage et par an. Les Français peuvent réaliser des économies considérables en améliorant la gestion de l’eau et d’électricité dans leurs foyers. Il existe actuellement différentes astuces qui permettent de&nbsp;<strong>baisser sa consommation en énergie.</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/articles_1589299281.jpg\" style=\"height:334px; width:500px\" /></strong></p>\r\n\r\n<h2><strong>Les principales astuces pour économiser l’eau</strong></h2>\r\n\r\n<p>Un Français consomme en moyenne 143 litres d’eau par jour. Près de 93 % de cette eau est destinée à l’entretien du logement, la vaisselle, l’hygiène du corps et les sanitaires. Les 7 % restants représentent l’eau utilisée pour la boisson et la préparation des repas. Afin de vous aider à&nbsp;<strong>économiser de l’eau</strong>, nous vous conseillons de&nbsp;:</p>\r\n\r\n<h3><strong>Détecter les fuites</strong></h3>\r\n\r\n<p>Un robinet qui fuit rejette en moyenne 5 litres/heure, soit près de 120 litres/jour. La méthode la plus efficace pour identifier les fuites est de relever les chiffres inscrits sur le compteur avant de se coucher. Si ceux-ci ne sont pas les mêmes à votre réveil alors que personne n’a utilisé de l’eau pendant la nuit, cela montre la présence d’une fuite au niveau de plomberie.</p>\r\n\r\n<h3><strong>Utiliser des pommeaux économiques</strong></h3>\r\n\r\n<p>L’installation d’un&nbsp;<strong>pommeau de douche économique</strong>&nbsp;au niveau des robinets et de la douchette vous permettra de réduire le débit d’eau jusqu’à 30 à 50% sans que la pression diminue.</p>\r\n\r\n<h3><strong>Prendre une douche plutôt qu’un bain</strong></h3>\r\n\r\n<p>Pour mieux&nbsp;<strong>économiser l’eau</strong>, il est préférable de favoriser les douches plutôt que les bains. La douche est plus économique, elle nécessite en moyenne entre 20 et 60 litres d’eau contre 100 à 200 litres pour remplir une baignoire destinée pour un bain.</p>\r\n\r\n<h2><strong>Les principales astuces pour économiser de l’électricité</strong></h2>\r\n\r\n<p>Il est possible d’<strong>économiser de l’électricité</strong>&nbsp;en adoptant quelques réflexes de base au quotidien. Certaines astuces ne nécessitent aucun frais alors qu’elles peuvent permettre de réaliser des économies considérables.</p>\r\n\r\n<h3><strong>Les gestes à adopter au quotidien pour économiser de l’électricité</strong></h3>\r\n\r\n<p>Le système de chauffage fait partie des appareils les plus énergivores. En diminuant le&nbsp;<strong>chauffage</strong>&nbsp;de 1 %, vous réduirez votre consommation énergétique de 7 %. La température du chauffe-eau doit se trouver aux environs de 55 à 60°C.</p>\r\n\r\n<p>Pensez aussi à dégivrer régulièrement votre réfrigérateur afin d’éviter une surconsommation. Si vous utilisez un&nbsp;<strong>lave-vaisselle</strong>, favorisez surtout le programme «&nbsp;éco&nbsp;». Cette fonctionnalité nécessite moins d’énergie que le cycle intensif.</p>\r\n\r\n<p>Les appareils en veille consomment également beaucoup d’électricité. Vous devez ainsi débrancher les machines qui ne sont pas en marche. Nous vous recommandons aussi de vous éclairer avec des lampes à LED, car elles sont moins énergivores.</p>\r\n\r\n<h3><strong>Les équipements qui permettent de réaliser des économies d’électricité</strong></h3>\r\n\r\n<p>L’installation d’une&nbsp;<strong>multiprise&nbsp;</strong>permet d’économiser jusqu’à 10 % d’électricité. Grâce à cet accessoire, vous pouvez éteindre instantanément tous les appareils en veille qui y sont branchés.</p>\r\n\r\n<p>Nous vous conseillons aussi d’opter pour des&nbsp;<strong>prises programmables mécaniques</strong>. Avec ces dernières, vous avez la possibilité d’automatiser la période de fonctionnement de certains équipements électriques. En installant un wattmètre au niveau des prises, vous pouvez évaluer la quantité d’énergie consommée par vos outils électriques.</p>\r\n', '2020-05-12 18:03:36', 1, 1, 6),
(11, 'Comment faire un piège à moustiques maison totalement naturel ?', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/articles_1589299858.jpg\" style=\"height:156px; width:300px\" /></p>\r\n\r\n<p>Pour fabriquer votre piège à moustique, vous aurez besoin de créer un contenant puis un mélange de sucre et de levure qui les attirera à l\'intérieur pour les piéger. Voici le matériel nécessaire :</p>\r\n\r\n<ul>\r\n	<li>d\'une bouteille en plastique de 2 litres de préférence ;</li>\r\n	<li>d\'un cutter ou un couteau ;</li>\r\n	<li>d\'une paire de gants de protection ;</li>\r\n	<li>d\'une feuille de papier noire et du ruban adhésif ;</li>\r\n	<li>de 50 g de sucre roux ;</li>\r\n	<li>de 1 g de levure de boulanger ;</li>\r\n	<li>de 200 ml d\'eau tiède.</li>\r\n</ul>\r\n\r\n<h2>Préparation du contenant du piège à moustiques : les étapes</h2>\r\n\r\n<p>Avant toute chose, enfilez les gants de protection. A l\'aide du cutter ou du couteau aiguisé, découpez la bouteille afin d\'obtenir deux morceaux. L\'un des morceaux doit correspondre à un tiers de la bouteille et comprendre le goulot, l\'autre doit faire les deux tiers de la bouteille avec le fond. Le mélange sera préparé dans le fond de la bouteille.</p>\r\n\r\n<h2>Préparation du mélange naturel</h2>\r\n\r\n<p>Versez l\'eau tiède dans la partie basse de la bouteille et ajoutez-y le sucre. Vous devez mélanger jusqu\'à ce que le sucre soit totalement dissous. Laissez bien refroidir le mélange afin de ne pas altérer les propriétés de la levure de boulanger que vous allez incorporer. Une fois le mélange refroidi, émiettez la levure de boulanger à la surface de l\'eau, sans mélanger.</p>\r\n\r\n<h2>Finaliser la préparation du piège à moustiques naturel</h2>\r\n\r\n<p>Pour terminer votre piège à moustiques maison, retournez le goulot de bouteille sur la partie contenant la préparation. Le goulot doit tremper dans la préparation. Entourez la bouteille d\'une feuille de papier noir que vous fixerez à l\'aide du ruban adhésif. Selon la température, votre piège naturel sera prêt après environ 2 semaines de fermentation. Placez-le, dès le départ, dans un endroit où il ne bougera pas pour ne pas mélanger la levure à l\'eau (rebord de fenêtre ou table). Ce piège à moustique a une durée de vie d\'environ 2 à 3 semaines. Pour ne pas être en rupture de piège, préparez-en un nouveau 1 à 2 semaines après la mise en place du premier, vous pourrez ainsi le remplacer facilement.</p>\r\n\r\n<h2>Le piège à moustique d\'extérieur</h2>\r\n\r\n<p>Si les moustiques nous agacent dans la maison, dans le jardin aussi on aimerait les éviter. Il existe différents pièges à moustiques efficaces dans le jardin. La recette précédentes s\'adapte par exemple aussi bien à l\'intérieur qu\'à l\'extérieur. Sinon, vous pouvez utiliser un&nbsp;<strong>piège à moustiques électrique</strong>. Il est sans odeur, n\'émet pas de bruit, s\'accroche ou se pose et ne nécessite pas d\'insecticide.</p>\r\n', '2020-05-12 18:11:26', 1, 2, 4),
(12, '20 gestes écolos à adopter dès maintenant', '<ol>\r\n	<li>\r\n	<h3><strong>Arrêter l’eau quand on se lave les mains</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser un verre à dents pour se rincer la bouche après le brossage</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Installer un mousseur sur les robinets</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Acheter des fruits et légumes de saison</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Planifier ses menus pour éviter le gaspillage</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser des cotons lavables&nbsp;(à la place des cotons jetables)</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Acheter une gourde en inox / verre ou plastique sans BPA</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser un oriculi (à la place des cotons tiges)</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Laver le linge à basse température (30° ou 40° max)</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Faire tourner la machine à laver le linge pleine</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Refuser les échantillons gratuits</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser des mouchoirs en tissus (à la place des mouchoirs jetables)</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Mettre un filtre lavable dans la cafetière</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser une brosse à dent compostable ou à tête changeable</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Arrêter d’utiliser assiettes, gobelets, couverts et serviettes jetables</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Remplacer les gels douches et shampoings par des cosmétiques solides</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Utiliser des protections hygiéniques durables (serviettes lavables,&nbsp;coupe menstruelle, éponges, culottes périodiques…)</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Se raser avec un rasoir de sécurité</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Remplacer le papier de cuisson blanc par du papier compostable ou un tapis en silicone</strong></h3>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Emprunter des livres / DVD / magazines à la bibliothèque</strong></h3>\r\n	</li>\r\n</ol>\r\n', '2020-05-12 18:19:29', 1, 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Savoir'),
(2, 'Faire');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
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
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `commentDate`, `commentReport`, `commentAuthor`, `commentArticle`, `commentEvent`) VALUES
(1, 'Miam! Excellent, Bernard! ', '2020-05-11 21:09:54', 0, 13, 9, NULL),
(2, 'Super ! Merci pour ces conseils j\'arriverais mieux à m\'occuper de mes plantes désormais, qui ne cessaient d\'avoir des tâches sur les feuilles...', '2020-05-11 21:26:05', 0, 5, 2, NULL),
(3, 'Avez-vous des conseils peut-être pour des roses aussi ?', '2020-05-11 21:27:05', 0, 10, 2, NULL),
(9, 'Communiste !!!!', '2020-05-12 18:50:16', 0, 3, 3, NULL),
(5, 'Très intéressant !', '2020-05-11 21:28:09', 1, 10, 6, NULL),
(6, 'Quel est l’intérêt de se faire autant de mal pour si peut... ?', '2020-05-11 21:30:09', 1, 8, 1, NULL),
(10, 'Tabor tu as oublié le fait de s\'inscrire sur Ecomie :) ', '2020-05-12 18:52:12', 0, 3, 12, NULL),
(11, 'Avec toutes les ordures que jettent les jeunes dans la rue il va y avoir du boulot.\r\nBon courage ! ', '2020-05-12 18:57:08', 0, 9, NULL, 1),
(12, 'Maudit moustique !!\r\nJe vais essayer cette méthode merci ', '2020-05-12 19:12:26', 0, 9, 11, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
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
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventContent`, `eventDateStart`, `eventTimeStart`, `eventDateEnd`, `eventTimeEnd`, `eventAuthor`) VALUES
(1, 'Nettoyer le quartier', '<p>Il est temps de faire un nettoyage de printemps. Ecomie vous invites tous a faire le tour&nbsp;de votre quartier, arm&eacute;s de sac poubelles et de tout se que vous aurez besoin pour accomplir dans la bonne humeur cette entreprise :).&nbsp;</p>\r\n\r\n<p>ps: N&#39;oubliez pas les gestes barri&eacute;res.</p>\r\n', '2020-05-24', '09:00:00', '2020-05-24', '19:00:00', 1),
(2, 'Marché Ecomie', '<p>Et si ont faisait du troc? Pr&eacute;parer vos plus belle cr&eacute;ation, mettez les en &eacute;vidence devant chez vous et troquer avec vos voisins. Simple et efficace. De belle surprise vous attendent en bas de chez vous.</p>\r\n', '2020-03-08', '09:00:00', '2020-03-08', '19:00:00', 1),
(3, 'Jardinage', '<p>Maintenant que le quartier a fait peau neuve il est temps de l&#39;enjoliver. Si le temps le permet prennez vos outils&nbsp;de jardinage et retrouvez&nbsp;vous pour r&eacute;am&eacute;nager votre environnement comme bon vous semble. Enlever les mauvaise herbes, utiliser un terrain abandonn&eacute;&nbsp;pour en faire un potager. &nbsp;</p>\r\n\r\n<p>Profitez-en pour faire connaissance ;).</p>\r\n', '2020-05-31', '09:00:00', '2020-05-31', '19:00:00', 3),
(4, 'Marche pour le climat', '<p>Jamais la plan&egrave;te n&rsquo;a eu&nbsp;aussi chaud&nbsp;depuis 2000&nbsp;ans.&nbsp;Partout dans le monde, les populations souffrent d&rsquo;&eacute;v&eacute;nements climatiques extr&ecirc;mes. Rien qu&rsquo;en France, la chaleur en 2019 a battu des records, les s&eacute;cheresses ont d&eacute;cim&eacute; des for&ecirc;ts, et les incendies ont ravag&eacute; des milliers d&rsquo;hectares de cultures. En Europe, l&rsquo;&eacute;t&eacute;, les hautes temp&eacute;ratures et les&nbsp;pics de pollution&nbsp;asphyxient les grandes villes. A l&rsquo;autre bout du monde, le Groenland fond, l&rsquo;Inde manque d&rsquo;eau, l&rsquo;Amazonie dispara&icirc;t et&nbsp;nos poumons br&ucirc;lent.</p>\r\n\r\n<p>Or, sans r&eacute;duction drastique des &eacute;missions de gaz &agrave; effet de serre &agrave; court terme, le d&eacute;r&egrave;glement climatique va s&rsquo;aggraver et les ph&eacute;nom&egrave;nes extr&ecirc;mes se multiplier&nbsp;: ouragans plus intenses, inondations plus importantes, canicules encore plus longues et plus fr&eacute;quentes&hellip; Pourtant, entre une augmentation de 1,5&nbsp;degr&eacute; (le seuil d&eacute;fini par l&rsquo;Accord de Paris) et 3&nbsp;degr&eacute;s (ce vers quoi nous nous dirigeons faute de changement de mod&egrave;le &eacute;conomique ), les cons&eacute;quences varient du tout au tout. C&rsquo;est pourquoi nos gouvernements doivent agir maintenant&nbsp;:&nbsp;<strong>les choix d&rsquo;aujourd&rsquo;hui d&eacute;terminent notre avenir demain. Or, il est encore possible de r&eacute;duire les impacts. Chaque dixi&egrave;me de degr&eacute; compte.</strong></p>\r\n\r\n<h4>Notre nombre et notre d&eacute;termination doivent continuer de grandir pour que notre mouvement devienne inarr&ecirc;table. Alors si vous &ecirc;tes d&#39;accord avec nous, suivez notre mouvement le <strong>Samedi 11 juillet 2020</strong> &agrave; la place de Paris pour manifester pour notre plan&egrave;te !</h4>\r\n', '2020-07-11', '13:00:00', '2020-07-11', '16:00:00', 4),
(5, 'Salon Produrable', '<p><strong>Du 9 et 10 avril 2019</strong>&nbsp;au Palais des Congr&egrave;s &agrave; Paris. Il s&rsquo;agit de l&rsquo;&eacute;v&eacute;nement professionnel de r&eacute;f&eacute;rence des acteurs et des solutions de l&rsquo;&eacute;conomie durable. Organis&eacute; sous le haut patronage du Minist&egrave;re de la Transition &Eacute;cologique et Solidaire, Produrable est soutenu par les principaux r&eacute;seaux professionnels et les m&eacute;dias sp&eacute;cialis&eacute;s.&nbsp;</p>\r\n', '2019-04-09', '08:00:00', '2019-04-10', '18:00:00', 4),
(7, 'Le Printemps bio 2019 : du 1er au 15 juin', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/events_1589225914.jpg\" style=\"height:384px; width:500px\" /></p>\r\n\r\n<p>Premi&egrave;re quinzaine de juin, c&rsquo;est le Printemps BIO, avec des centaines d&rsquo;animations dans toute la France : portes ouvertes, animations en points de vente, repas bio en restauration, rencontres professionnelles, foires et march&eacute;s, animations dans les classes,&hellip; Les acteurs de l&rsquo;agriculture biologique invitent tous les publics &agrave; s&rsquo;informer et &agrave; &eacute;changer sur la Bio et ses principes, ainsi qu&rsquo;&agrave; savourer la grande vari&eacute;t&eacute; des produits bio.</p>\r\n', '2019-06-01', '00:00:00', '2019-06-15', '20:00:00', 1),
(8, 'SEMAINE EUROPÉENNE DE RÉDUCTION DES DÉCHETS', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/events_1589297959.png\" style=\"height:313px; width:500px\" /></p>\r\n\r\n<p>Inscrite dans le cadre de la campagne nationale sur&nbsp;la réduction des déchets, la SERD donne rendez-vous aux entreprises, aux collectivités et au grand public&nbsp;<strong>du 18 au 26 novembre</strong>. L’idée&nbsp;: expliquer comment mieux consommer, mieux produire et prolonger la durée de vie des produits. Mais puisqu’aucune politique de prévention ne peut encore réduire à zéro la production de déchets,&nbsp;rien ne vous empêche d’agir pour la planète en recyclant les vôtres au sein de votre société. Une démarche dans laquelle Easy Recyclage sera d’ailleurs ravi de vous accompagner.</p>\r\n', '2020-11-18', '00:00:00', '2020-11-26', '23:59:00', 1),
(9, 'Journée mondiale des abeilles', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/events_1589298125.jpg\" style=\"height:250px; width:500px\" /></p>\r\n\r\n<p>Pour attirer l\'attention de tous sur le rôle clé que jouent les pollinisateurs et notamment les abeilles, sur les menaces auxquelles ils sont confrontés et à leur importante contribution au développement durable, les Nations Unies ont désigné le 20 mai Journée mondiale des abeilles.</p>\r\n\r\n<p>Le 20 mai coïncide avec l\'anniversaire d\'Anton Janša, qui, au 18ème siècle, fut le pionnier des techniques apicoles modernes dans sa Slovénie natale et rendit hommage à l\'abeille pour sa capacité à travailler dur tout en n\'ayant besoin que de peu d\'attention.</p>\r\n', '2020-05-20', '08:00:00', '2020-05-20', '23:59:00', 1),
(12, 'Semaine de la mobilité', '<p>La Semaine européenne de la mobilité est relayée en France par le Ministère de la transition écologique et solidaire avec l’ADEME. Elle vise à promouvoir les bonnes pratiques régionales en matière de transport pour&nbsp;<strong>réduire les émissions de gaz à effet de serre des Français</strong>. Cette opération est ancrée dans l’actualité, avec l’essor des solutions innovantes de transports partagés comme le covoiturage, l’autopartage, le deux-roues en libre - service qui sont autant d’alternatives à la voiture individuelle, complémentaires des transports publics.</p>\r\n', '2019-09-16', '00:00:00', '2019-09-22', '23:59:00', 4),
(10, 'Journée mondiale des Oiseaux migrateurs', '<p>Chaque année, la Journée mondiale des oiseaux migrateurs présente un thème annuel dans le but de sensibiliser aux sujets affectant les oiseaux migrateurs et d’inspirer les personnes et les organisations dans le monde entier à prendre des mesures en faveur de leur conservation.</p>\r\n\r\n<p>La Journée mondiale des oiseaux migrateurs est célébrée deux fois par an, le 2ème samedi de mai et d’octobre, afin de mettre en avant la nécessité de conserver les oiseaux migrateurs et leurs habitats.</p>\r\n\r\n<p>La Convention sur la conservation des espèces migratrices (CMS) et l’Accord sur la conservation des oiseaux d’eau migrateurs d’Afrique-Eurasie (AEWA), deux traités intergouvernementaux sur la faune sauvage gérés par l’ONU Environnement, organisent la campagne en coopération avec Environment for the Americas (EFTA).</p>\r\n\r\n<p>L’EFTA travaille avec divers partenaires pour fournir des supports pédagogiques en anglais et en espagnol et des informations sur les oiseaux et leur conservation à travers les Amériques. Ses programmes incitent les enfants et les adultes à sortir, à se renseigner sur les oiseaux et à participer à leur conservation.</p>\r\n', '2020-05-09', '00:00:00', '2020-05-09', '23:59:00', 1),
(11, 'Conférence Terre vivante \"Pour un jardin punk\"', '<p style=\"text-align:center\"><img alt=\"\" src=\"http://sofianeal.ovh/assets/img/upload/events_1589298965.jpg\" style=\"height:247px; width:500px\" /></p>\r\n\r\n<p>Écologique, économique, libre, paresseux, militant, surprenant... le jardin punk s’invite là où on ne l’attend pas, pour ceux qui ne l’espèrent plus.</p>\r\n\r\n<p>Paysagiste impertinent, pépiniériste iconoclaste et naturaliste à contre-courant,&nbsp;<strong>Éric Lenoir</strong>&nbsp;rêve de cités où les jardins seraient partout, indispensables et accessibles à tous. Des étangs de Sologne aux jardins de Pompéi, en passant par Créteil et la zone d’exclusion de Tchernobyl, il observe attentivement la résilience en milieu urbain ou rural et le rapport complexe Homme/Nature.</p>\r\n\r\n<p>Dans son ouvrage publié aux éditions Terre vivante, « Petit traité du jardin punk »,&nbsp;<strong>Éric Lenoir</strong>&nbsp;questionne fondamentalement le rapport de l’homme au paysage, dans son jardin comme en pleine ville, et donne des outils concrets pour que chacune puisse rêver, semer et cultiver, des jardins résolument punks.</p>\r\n\r\n<p><strong>De 18h30 à 20h30</strong></p>\r\n', '2020-06-25', '18:30:00', '2020-06-25', '20:30:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `formId` int(11) NOT NULL,
  `formSendername` varchar(20) NOT NULL,
  `formSendermail` varchar(100) NOT NULL,
  `formSubject` varchar(150) NOT NULL,
  `formMessage` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`formId`, `formSendername`, `formSendermail`, `formSubject`, `formMessage`) VALUES
(1, 'Fabrice', 'fabriceBarteaux@armyspy.com', 'Savoir-Faire', 'Bonjour, je suis nouveau et j\'aimerais savoir comment on doit procéder pour publié du contenu sur votre site. Y a-t\'il une procédure particulière à faire ?\r\n\r\nJe vous remercie par avance, n’étant pas très familier avec l\'informatique...'),
(2, 'Fifi', 'fifiLebel@teleworm.us', 'Photos évènement', 'Bonjour j\'ai participer à un événement se trouvant sur votre site et aimerais pouvoir publier des photos que j\'ai prise à ce moment là, pouvez-vous m\'indiquer comment procéder ?');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `imgDateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgAlt` varchar(50) NOT NULL,
  `imgEvent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`imgId`, `imgName`, `imgDateAdd`, `imgAlt`, `imgEvent`) VALUES
(1, '1589224197.jpg', '2020-05-11 21:09:57', 'logo', 5),
(2, '1589224216.png', '2020-05-11 21:10:16', 'salon1', 5),
(3, '1589224229.jpg', '2020-05-11 21:10:29', 'salon2', 5),
(4, '1589225939.jpg', '2020-05-11 21:38:59', 'logo', 7),
(5, '1589225977.jpg', '2020-05-11 21:39:37', 'image1', 7),
(6, '1589226020.jpg', '2020-05-11 21:40:20', 'image2', 7),
(7, '1589297144.jpg', '2020-05-12 17:25:44', 'image1', 2),
(8, '1589297637.jpg', '2020-05-12 17:33:57', 'image2', 2),
(9, '1589297691.jpg', '2020-05-12 17:34:51', 'image2', 2),
(10, '1589297768.jpg', '2020-05-12 17:36:08', 'image3', 2),
(11, '1589298467.jpg', '2020-05-12 17:47:47', 'image1', 10),
(12, '1589298474.jpg', '2020-05-12 17:47:54', 'image2', 10),
(13, '1589298482.jpg', '2020-05-12 17:48:02', 'image3', 10),
(14, '1589298490.jpg', '2020-05-12 17:48:10', 'image4', 10),
(15, '1589300885.png', '2020-05-12 18:28:05', 'image1', 12),
(16, '1589300926.jpg', '2020-05-12 18:28:47', 'image2', 12),
(17, '1589300935.png', '2020-05-12 18:28:55', 'image3', 12),
(18, '1589300944.jpg', '2020-05-12 18:29:04', 'image4', 12),
(19, '1589305290.jpg', '2020-05-12 19:41:30', 'test', 5);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `msgId` int(11) NOT NULL,
  `msgContent` text NOT NULL,
  `msgDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msgSender` int(11) NOT NULL,
  `msgRecipient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`msgId`, `msgContent`, `msgDate`, `msgSender`, `msgRecipient`) VALUES
(1, 'Salut toi, on se connait?', '2020-05-11 20:11:25', 13, 11),
(2, 'Test envoie de mail', '2020-05-12 19:52:38', 5, 3),
(3, 'test', '2020-05-12 19:53:13', 5, 3),
(4, 'wesh\r\n', '2020-05-12 19:55:07', 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(100) NOT NULL,
  `newsContent` text NOT NULL,
  `newsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`newsId`, `newsTitle`, `newsContent`, `newsDate`) VALUES
(1, 'Bonjour', '<p>Bonjour &agrave; tous et bienvenu sur Ecomie !</p>\r\n', '2020-05-11 21:46:29');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Modérateur'),
(3, 'Membre');

-- --------------------------------------------------------

--
-- Structure de la table `subscribes`
--

CREATE TABLE `subscribes` (
  `subscribeId` int(11) NOT NULL,
  `subscribeEmail` varchar(100) NOT NULL,
  `subscribeMember` int(11) DEFAULT NULL,
  `subscribeNews` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribes`
--

INSERT INTO `subscribes` (`subscribeId`, `subscribeEmail`, `subscribeMember`, `subscribeNews`) VALUES
(1, 'eleonoreLegault@rhyta.com', NULL, 0),
(2, 'bernardPellerin@rhyta.com', NULL, 0),
(3, 'odeletteBoisvert@jourrapide.com	', NULL, 0),
(4, 'mariuzzajulien@gmail.com', NULL, 0),
(5, 'ecomie67@gmail.com', NULL, 0),
(6, 'ms.godard@gmail.com ', NULL, 0),
(7, 'jeanbaptisteabeilhe@gmail.com', NULL, 0),
(8, 'abeilhejeanbaptiste@yahoo.fr', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userFirstname`, `userEmail`, `userPhone`, `userAddress`, `userCp`, `userCity`, `userPwd`, `userAvatar`, `userRole`) VALUES
(1, 'Admin', 'Ecomie', 'ecomie67@gmail.com', '0388696867', '27 rue de la république', '67800', 'Hoenheim', '$2y$10$TuVxeos5w4EbgQg4aFzT5OPnk5yccohh7bRntJ/f/ZBfe3Jljmp7m', '1589297005.png', 1),
(2, 'Alamri', 'Sofiane', 'alamri.sofiane@gmail.com', NULL, '104 rue de hochfelden', '67200', 'Strasbourg', '$2y$10$xqtQHdn78Lx8YqrWHX6XM.bcmSmJDEpfpxJKOZmZ.4h544EbuA/hm', 'user-solid.svg', 2),
(3, 'Abeilhe', 'Jean-Baptiste', 'abeilhejeanbaptiste@yahoo.fr', NULL, '44 rue saint urbain', '67100', 'Strasbourg', '$2y$10$z.kSQI3reR0yS6Qu.m4sRuQX6UzD0YoWREojDEBMW2WD6oh6h3sum', 'user-solid.svg', 2),
(4, 'Mariuzza', 'Julien', 'mariuzzajulien@gmail.com', NULL, '53 Avenue de la 1ère D-B', '68100', 'Mulhouse', '$2y$10$l0Z0WzgSi9GR9koaEi6rduZhgU6spv2rqceoZvx2n.8k.AYTbTfqa', '1589213693.jpg', 2),
(5, 'Legault', 'Éléonore', 'EleonoreLegault@rhyta.com', NULL, '64, rue Marie de Médicis', '31700', 'BLAGNAC', '$2y$10$CpuQnqkE8d7vQ.Og.am2zuk7gtHqdE.oAa9Djo1oddYMeC/A15dSa', 'user-solid.svg', 3),
(6, 'Berger', 'Joséphine', 'josephineBerger@jourrapide.com', '0251285278', '7, Rue Roussy', '45000', 'ORLÉANS', '$2y$10$HSi4Eq30ESqaokZ0gM.Qke6qmKp91ib43rEIT64rKj6Ldr0Gl9G2.', 'user-solid.svg', 3),
(7, 'Pellerin', 'Bernard', 'bernardPellerin@rhyta.com', '05.60.48.29.20', '66, Rue St Ferréol', '69330', 'MEYZIEU', '$2y$10$M5j0JFbwNllzErfec6RDN.R/Eei8f4fex3GaQmnF0gNPbaIcKgIjC', 'user-solid.svg', 3),
(8, 'Paradis', 'Tabor', 'taborParadis@dayrep.com', NULL, '72, rue Gontier-Patin', '47000', 'AGEN', '$2y$10$fPuCfUOaQlyMc21rPQBDtuvG58vrzC7lIkDB5Zb2DTPCvsXMDPVCO', 'user-solid.svg', 2),
(9, 'Boisvert', 'Odelette', 'odeletteBoisvert@jourrapide.com', NULL, '51, Avenue De Marlioz', '06600', 'ANTIBES', '$2y$10$KvWgxdKGefQtd8x2sYCePO0s8syKa5sGDnc3TUeRVeu2ybJIcfu5a', 'user-solid.svg', 3),
(10, 'Descoteaux', 'Édouard', 'EdouardDescoteaux@dayrep.com', NULL, '68, Rue Joseph Vernet', '93170', 'BAGNOLET', '$2y$10$1CGCo6wbXonG86TmGV7iTuTba9ymwN7mziClUCHqdXg.yKACHCjrq', 'user-solid.svg', 3),
(11, 'Bonneau', 'Céline', 'celiiiineb@aol.com', NULL, '6 rue Guido guersi', '67100', 'Strasbourg', '$2y$10$kh2WPwctLLlaE2MHkWGI8OHT16f.N07W30qOURJX4yaIizNMKbS/e', 'user-solid.svg', 3),
(12, 'Schmitt', 'Françoise', 'francoise@gmail.com', '0678451296', '220 route de schirmeck', '67200', 'Strasbourg', '$2y$10$h0KjZZsgVBe8/PsbfsYLxebhbybFx0OHaQQEDRcdRtE2PEgVa79/m', 'user-solid.svg', 3),
(13, 'Prado', 'Loic', 'lolowawawi@gmail.com', NULL, '12 rue de la freedom', '67000', 'Strasbourg', '$2y$10$Ay4RQi148ggfJWvrgu9dj..EvxrG3W62wmLC0sVkPwiURRiTFaQru', 'user-solid.svg', 3),
(14, 'Bernhard', 'Amélie ', 'ameliebernhard5@gmail.com', '0678640156', '14 rue du chanoine straub', '67100', 'Strasbourg', '$2y$10$SQqvwtr8TtBwLevz1QWZEePQt9KL9DVB4i3s5/Qy3kQ8Y.JotFXp.', 'user-solid.svg', 3),
(15, 'Petit', 'Franck', 'fp@email.com', NULL, '10 rue de soultz', '67100', 'Strasbourg', '$2y$10$4hh5rTq7f4ZBfOHVnIf1EOsMzK5IFezXnJsVYkUHY2o9n3GrJaOay', 'user-solid.svg', 3),
(17, 'Abeilhe Godard', 'Maria-del-sol', 'ms.godard@gmail.com', '0699056843', '44 rue saint urbain', '67000', 'Strasbourg', '$2y$10$W7UgYKcWcExwx.ex.Rc1fu/5SLAXLR8Ncm6Or1K3yrQLQCnLYVTmi', 'user-solid.svg', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`formId`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgId`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsId`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Index pour la table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`subscribeId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `formId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `subscribeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
