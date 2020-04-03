-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Mars 2020 à 18:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `huntkingdom1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idcomment` int(11) NOT NULL AUTO_INCREMENT,
  `idevenement` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `commentaire` varchar(255) NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `idevenement` (`idevenement`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ID_USERS` int(10) DEFAULT NULL,
  `contenu` text NOT NULL,
  `id_pb` int(11) NOT NULL,
  `added_in` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `ID_USERS`, `contenu`, `id_pb`, `added_in`) VALUES
(7, 2, 'woooow i like it !', 2, '2020-02-21 10:34:41'),
(8, 2, 'i like it ', 2, '2020-02-21 10:42:25'),
(10, 2, 'saha  sahbi', 6, '2020-02-24 19:49:08'),
(12, NULL, 'good very good', 20, '2020-03-27 18:43:02'),
(13, NULL, 'good very good', 20, '2020-03-27 18:44:57'),
(14, NULL, 'aaa', 20, '2020-03-27 18:47:01'),
(15, NULL, 'aaa', 20, '2020-03-27 18:47:03'),
(16, NULL, 'aaa', 20, '2020-03-27 18:47:04'),
(17, NULL, 'aaa', 20, '2020-03-27 18:47:05'),
(18, NULL, 'aaa', 20, '2020-03-27 18:47:07'),
(19, NULL, 'aaa', 20, '2020-03-27 18:47:09'),
(20, NULL, 'aaa', 20, '2020-03-27 18:47:10'),
(21, NULL, 'aaa', 20, '2020-03-27 18:47:11'),
(22, NULL, 'aaa', 20, '2020-03-27 18:47:13'),
(23, NULL, 'aaa', 20, '2020-03-27 18:47:15'),
(24, NULL, 'aaa', 20, '2020-03-27 18:47:17'),
(25, NULL, 'aaa', 20, '2020-03-27 18:47:18'),
(26, NULL, 'aaa', 20, '2020-03-27 18:47:20'),
(27, NULL, 'aaa', 20, '2020-03-27 18:47:22'),
(28, NULL, 'aaa', 20, '2020-03-27 18:47:23'),
(29, NULL, 'aaa', 20, '2020-03-27 18:47:25'),
(30, NULL, 'aaa', 20, '2020-03-27 18:47:26'),
(31, NULL, 'aaa', 20, '2020-03-27 18:47:27'),
(32, NULL, 'aaa', 20, '2020-03-27 18:47:29'),
(33, NULL, 'aaa', 16, '2020-03-27 18:48:30'),
(34, NULL, 'aaa', 16, '2020-03-27 18:48:32'),
(35, NULL, 'aaa', 16, '2020-03-27 18:48:32'),
(37, NULL, 'aaa', 16, '2020-03-27 18:48:36'),
(38, NULL, 'aaa', 16, '2020-03-27 18:48:38'),
(39, NULL, 'aaa', 16, '2020-03-27 18:48:39'),
(40, NULL, 'aaa', 16, '2020-03-27 18:48:41'),
(41, NULL, 'azer', 16, '2020-03-27 18:50:10'),
(42, NULL, 'test', 16, '2020-03-27 18:50:47'),
(43, NULL, 'dsd', 16, '2020-03-27 18:53:33'),
(44, NULL, 'ddsdd', 16, '2020-03-27 18:57:12');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `nbreplaces` int(11) DEFAULT NULL,
  `nbreparticipants` int(11) DEFAULT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `lieu`, `titre`, `nbreplaces`, `nbreparticipants`, `DateDebut`, `DateFin`, `image`) VALUES
(5, 'bizerte', 'ons', 22, 1, '2020-03-12', '2020-03-12', 'Profile110837.jpg'),
(6, 'zzzzzzzz', 'zzzz', 10, 5, '1995-02-02', '2000-02-03', 'Profile89253.jpg'),
(7, 'bb', 'aaaa', 30, 0, '2020-12-01', '2020-12-01', 'Profile46734.jpg'),
(9, 'korba', 'korbaaaaa', 55, 0, '2020-05-05', '2020-05-05', 'Profile124795.jpg'),
(11, 'malek', 'akrem', 55, NULL, '2020-05-05', '2020-05-05', 'Profile201194.jpg'),
(12, 'dvfdv', 'rthgrdgvd', 10, NULL, '2020-05-20', '2020-05-30', 'Profile140046.jpg'),
(13, '123', '123', 9, NULL, '2020-05-05', '2020-05-06', 'Profile293207.jpg'),
(14, 'lol', 'ahaha', 10, NULL, '2020-07-19', '2020-07-25', 'Profile158156.jpg'),
(15, 'korba', 'korba', 20, NULL, '2020-10-05', '2020-10-05', 'Profile58198.jpg'),
(16, 'korba', 'korba', 10, NULL, '2020-10-05', '2020-10-08', 'Profile245106.jpg'),
(17, 'korba', 'korba', 11, NULL, '2020-10-07', '2020-10-09', 'Profile182499.jpg'),
(18, 'qqq', 'qqq', 2, NULL, '2020-12-02', '2020-12-02', 'Profile286353.jpg'),
(19, 'cska', 'cska', 5, NULL, '2020-10-05', '2020-10-09', 'Profile211258.jpg'),
(20, 'salut', 'cc', 10, NULL, '2020-10-20', '2020-10-22', 'Profile62968.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nbSignal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'huntkingdom', 'huntkingdom', 'huntkingdom@gmail.com', 'huntkingdom@gmail.com', 1, NULL, '$2y$13$NV5TmtrZvTIXCBtch.m8FeRGogAXo2i0OYoSihqXRAiymL5WGWRT.', '2020-03-22 21:31:25', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `like_forum`
--

CREATE TABLE IF NOT EXISTS `like_forum` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_pb` int(11) NOT NULL,
  `ID_USERS` int(11) NOT NULL,
  PRIMARY KEY (`id_like`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `like_forum`
--

INSERT INTO `like_forum` (`id_like`, `id_pb`, `ID_USERS`) VALUES
(6, 2, 2),
(9, 6, 2),
(10, 9, 0),
(11, 8, 0),
(12, 13, 0);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `id_pb` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USERS` int(11) DEFAULT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `theme` varchar(100) NOT NULL,
  `Posted_in` datetime NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_pb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_pb`, `ID_USERS`, `titre`, `contenu`, `theme`, `Posted_in`, `image`) VALUES
(16, NULL, 'ahmed', 'odkezmkd', 'lmdskzd', '2020-03-24 18:02:00', 'logoHK.png'),
(18, NULL, 'malik', 'salut', 'hello', '2020-03-24 18:18:00', 'hunt-2702908_1280.png'),
(19, NULL, 'tessst', 'teeeeeeeeeeeeeeest', 'test', '2020-03-25 17:59:19', 'B-articles.png'),
(20, NULL, 'crocodile', 'today we had a good fun we hunt many animals', 'wild animal', '2020-03-26 19:34:45', 'back.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reclam`
--

CREATE TABLE IF NOT EXISTS `reclam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `screenshot` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `reclam`
--

INSERT INTO `reclam` (`id`, `tel`, `description`, `sujet`, `nom`, `prenom`, `email`, `screenshot`, `date`) VALUES
(7, 55, 'hhhh', 'hhh', 'gg', 'hh', 'hh', '', '2020/02/25 21:38:35'),
(2, 25, 'hello', 'hello', 'helo', 'hello', 'hello', 'j', 'j'),
(3, 55, 'rr', 'rrr', 'ramzi', 'ramzi', 'ramzi', 'j', 'j'),
(9, 4, 'gg', 'gg', 'dd', 'gg', 'gg', '', '2020/02/25 21:39:53'),
(10, 22, 'cccc', 'cccc', 'ddd', 'dd', 'h@k.com', '', '2020/02/26 14:12:15'),
(11, 22, 'tttt', 'dddd', 'aa', 'mm', 'm@d.com', '5.jpg', '2020/02/26 14:25:26'),
(13, 53955009, 'testestestsetsr', 'aaa', 'Ramzi', 'Naser', 'ramzi.naaser@esprit.tn', 'null', '2020/02/26 22:45:14'),
(14, 53955009, 'gggggggggg', 'vvvvv', 'aaaa', 'bbbbb', 'fff@gggg.vvfr', 'null', '2020/02/27 00:14:28'),
(15, 55895236, 'hello', 'helo', 'aaa', 'tar', 'f@d.com', 'null', '2020/02/27 00:52:16'),
(28, 50842388, 'fffffffff', 'fffff', 'ahh', 'dvv', 'ff@hh.fr', 'null', '2020/02/27 16:00:08'),
(17, 53955009, 'hello', 'sujet', 'aaa', 'Jaber', 'k@o.com', 'null', '2020/02/27 01:00:28'),
(18, 55555555, 'sss', 'ss', 'aaa', 'bbbb', 'a@j.com', 'null', '2020/02/27 01:02:00'),
(19, 53955009, 'ccccccccc', 'vvvvvv', 'aaa', 'bbbb', 'aa@hh.fr', 'null', '2020/02/27 01:03:51'),
(20, 53955009, 'cccc', 'ddd', 'ffff', 'cccc', 'ff@ggg.fr', 'null', '2020/02/27 01:04:49'),
(21, 53955009, 'vv', 'cc', 'aaa', 'ccc', 'aa@fff.fr', 'null', '2020/02/27 01:05:17'),
(22, 53955009, '	aaaaa', 'aaa', 'aaa', 'aaa', 'a@co.co', 'null', '2020/02/27 01:14:18'),
(23, 53955009, 'aaa', 'aaa', 'aaa', 'aaa', 'hd@dh.dg', 'null', '2020/02/27 01:15:14'),
(24, 53955099, 'aaaa', 'sujet ', 'aaa', 'aaa', 'hd@dd.dd', 'null', '2020/02/27 01:16:29'),
(25, 53955009, '	aaa', 'aaa', 'aaa', 'aaa', 'hf@dg.com', 'null', '2020/02/27 01:17:26'),
(30, 21648141, 'aaaaaaaaaaa', 'aaa', 'aaa', 'aaaa', 'aaa@ggg.fr', 'null', '2020/02/27 16:06:02');

-- --------------------------------------------------------

--
-- Structure de la table `signal`
--

CREATE TABLE IF NOT EXISTS `signal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvent` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `signale`
--

CREATE TABLE IF NOT EXISTS `signale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idE` int(11) NOT NULL,
  `idU` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `signale`
--

INSERT INTO `signale` (`id`, `idE`, `idU`) VALUES
(12, 2, 3),
(11, 4, 3),
(10, 4, 2),
(9, 3, 2),
(8, 3, 1),
(7, 1, 1),
(13, 2, 8),
(14, 2, 9),
(15, 2, 11),
(16, 1, 11),
(17, 2, 15),
(18, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `signal_forum`
--

CREATE TABLE IF NOT EXISTS `signal_forum` (
  `id_signal` int(10) NOT NULL AUTO_INCREMENT,
  `id_pb` int(11) NOT NULL,
  `cause` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_signal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `signal_forum`
--

INSERT INTO `signal_forum` (`id_signal`, `id_pb`, `cause`) VALUES
(8, 2, 'null'),
(9, 2, 'null'),
(10, 2, 'null'),
(11, 2, 'null'),
(12, 2, 'null'),
(13, 2, 'null'),
(14, 5, 'null'),
(15, 5, 'null'),
(16, 5, 'null'),
(17, 5, 'null'),
(18, 5, 'null'),
(19, 5, 'null'),
(20, 5, 'null'),
(21, 5, 'null'),
(22, 5, 'null'),
(23, 5, 'null'),
(24, 5, 'null'),
(25, 5, 'null'),
(26, 6, 'null'),
(27, 10, 'null'),
(28, 10, 'null'),
(29, 10, 'null'),
(30, 10, 'null'),
(31, 10, 'null'),
(32, 9, 'null'),
(33, 9, 'null'),
(34, 9, 'null'),
(35, 9, 'null'),
(36, 9, 'null'),
(37, 9, 'null');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID_USERS` int(11) NOT NULL AUTO_INCREMENT,
  `LAST_NAME` varchar(200) NOT NULL,
  `FIRST_NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PROFILE_PHOTO` varchar(255) NOT NULL,
  `roles` varchar(122) NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`ID_USERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID_USERS`, `LAST_NAME`, `FIRST_NAME`, `EMAIL`, `PASSWORD`, `PROFILE_PHOTO`, `roles`, `enabled`) VALUES
(3, 'admin', 'admin', 'admin@esprit.tn', '$2y$10$32CYHdpiGXhjrJcPKo14te.Qo.sHFphTT9EwS6aB0.bDjPjiBrVwW', 'src/images/profile.png', 'admin', 1),
(4, 'gabsi', 'salem', 'gabsi.salem1@esprit.tn', '$2y$10$FrRFPa0qozkew6hVo4QjR.qitAEhU6lLO0Txy5WrUqvf6XOvNbTyK', 'C:\\Users\\salem\\Desktop\\ESPRIT\\salem.jpg', 'admin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Client` int(11) DEFAULT NULL,
  `id_Evenement` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Client` (`id_Client`),
  KEY `id_Evenement` (`id_Evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vus`
--

CREATE TABLE IF NOT EXISTS `vus` (
  `id_view` int(10) NOT NULL AUTO_INCREMENT,
  `ID_USERS` int(10) NOT NULL,
  `id_pb` int(10) NOT NULL,
  PRIMARY KEY (`id_view`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `vus`
--

INSERT INTO `vus` (`id_view`, `ID_USERS`, `id_pb`) VALUES
(1, 1, 5),
(2, 1, 5),
(3, 1, 5),
(4, 1, 5),
(5, 1, 5),
(6, 1, 5),
(7, 1, 5),
(8, 1, 5),
(9, 1, 5),
(10, 1, 5),
(11, 1, 5),
(12, 1, 5),
(13, 1, 5),
(14, 1, 6),
(15, 1, 5),
(16, 1, 6),
(17, 1, 6),
(18, 1, 6),
(19, 1, 6),
(20, 1, 7),
(21, 1, 6),
(22, 1, 10),
(23, 2, 9),
(24, 2, 8),
(25, 2, 7),
(26, 2, 8),
(27, 2, 12),
(28, 2, 12),
(29, 2, 12),
(30, 2, 12),
(31, 2, 13);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `FK_EDBE16F8F7CC4348` FOREIGN KEY (`idEvenement`) REFERENCES `evenements` (`id`),
  ADD CONSTRAINT `FK_EDBE16F8FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `users` (`ID_USERS`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `FK_5A1085649E2569A` FOREIGN KEY (`id_Evenement`) REFERENCES `evenements` (`id`),
  ADD CONSTRAINT `FK_5A108564E6DFB48E` FOREIGN KEY (`id_Client`) REFERENCES `users` (`ID_USERS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
