-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 15 Décembre 2016 à 03:20
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
  `id_billet` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `billet`
--

INSERT INTO `billet` (`id_billet`, `title`, `content`, `created`, `updated`, `id_user`, `id_category`) VALUES
(8, 'last Article', '<p>biiijour</p>', '2016-12-03 18:36:13', '2016-12-03 18:36:13', 16, 1),
(15, 'MON DERNIER ARTICLE', '<p>MOTHER FUCKER !</p>', '2016-12-03 18:48:00', '2016-12-13 23:11:11', 16, 1),
(16, 'Laravel', '<p>value=''</p><br />\r\n<p>Trop cool ce framework</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>Venez tester : &lt;a href="https://laravel.com/" target="_blank"&gt;ici&lt;/a&gt;</p><br />\r\n<p>''</p>', '2016-12-15 01:37:37', '2016-12-15 01:37:37', 0, 1),
(17, 'Laravel', '<p>super laravel</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>&lt;a href="google.fr" target="_blank"&gt;laravel&lt;/a&gt;</p>', '2016-12-15 01:42:44', '2016-12-15 01:42:44', 0, 3),
(19, 'test', '<p>zet</p>', '2016-12-15 02:01:41', '2016-12-15 02:01:41', 16, 4),
(20, 'PHP', '<p>lol</p>', '2016-12-15 02:10:44', '2016-12-15 02:12:35', 22, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_category`, `name`, `image`) VALUES
(1, 'Bullshit', 'bullshit'),
(2, 'Intégration', 'integration'),
(3, 'Framework', 'framework'),
(4, 'PAO', 'pao'),
(5, 'PHP', 'php');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comment`, `content`, `created`, `updated`, `id_user`, `id_billet`) VALUES
(6, '<p>Yooo !!!!</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>Cette fois c''est bon your mother fuckerrr !!!</p>', '2016-12-13 23:12:10', '2016-12-13 23:51:29', 16, 15),
(7, '<p>azerty</p>', '2016-12-13 23:51:44', '2016-12-13 23:51:57', 16, 8),
(8, '<p>yop</p>', '2016-12-14 00:46:44', '2016-12-14 00:46:44', 21, 3),
(13, '<p>hehe</p>', '2016-12-15 02:11:09', '2016-12-15 02:12:22', 22, 20),
(14, '<p>gcgu</p>', '2016-12-15 02:11:44', '2016-12-15 02:11:44', 22, 19);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `account_check` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `email`, `pass`, `name`, `lastname`, `avatar`, `type`, `account_check`, `created`, `updated`) VALUES
(16, 'alex', 'a.simonin69@gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', 'Alexandre', 'SIMONIN', '', 2, 1, '2016-11-26 19:46:59', '2016-12-05 14:57:47');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
