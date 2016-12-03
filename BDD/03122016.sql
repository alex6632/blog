-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2016 at 05:32 PM
-- Server version: 5.6.22
-- PHP Version: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE `billet` (
  `id_billet` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billet`
--

INSERT INTO `billet` (`id_billet`, `title`, `content`, `created`, `updated`, `id_user`, `id_category`) VALUES
(1, 'test', 'test test test', '2016-12-01 13:31:25', '2016-12-01 13:31:25', 16, 4),
(2, 'zorjhg', '<p>&lt;script&gt;alert(\'coucou\');&lt;/script&gt;</p>', '2016-12-01 13:39:31', '2016-12-01 13:39:31', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_category`, `name`, `image`) VALUES
(1, 'Bullshit', 'bullshit.jpg'),
(2, 'Intégration', 'integration.jpg'),
(3, 'Framework', 'framework.jpg'),
(4, 'PAO', 'pao.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `email`, `pass`, `name`, `lastname`, `avatar`, `type`, `account_check`, `created`, `updated`) VALUES
(16, 'alex', 'a.simonin69@gmail.com', '90283840d90de49b8e7984bd99b47fee0d4bd50d', 'Alexandre', 'SIMONIN', '', 0, 1, '2016-11-26 19:46:59', '2016-11-26 19:46:59'),
(17, 'kevin', 'k@k.fr', '9b98a78066c0fe0ba7b2420870ff9c3542191502', 'Kevin', 'loiseleur', '', 0, 1, '2016-11-26 20:11:51', '2016-11-26 20:11:51'),
(18, 'tester', 'kevin.loiseleur@epitech.eu', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'Kevin', 'Lala', '', 0, 0, '2016-12-03 17:05:55', '2016-12-03 17:05:55'),
(19, 'kkk', 'tester@tester.com', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'KK', 'KK', '', 0, 0, '2016-12-03 17:08:21', '2016-12-03 17:08:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
