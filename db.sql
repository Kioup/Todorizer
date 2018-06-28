-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db742415546.db.1and1.com
-- Generation Time: Jun 27, 2018 at 05:33 PM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db742415546`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `type` text NOT NULL,
  `content` text NOT NULL,
  `id_node` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_notification_task` (`id_node`),
  KEY `FK_notification_user` (`id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contact` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contact_user` (`id_contact`),
  KEY `FK_contact_user_2` (`id_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contributor`
--

CREATE TABLE IF NOT EXISTS `contributor` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `is_super` char(1) NOT NULL DEFAULT 'f',
  PRIMARY KEY (`id`),
  KEY `FK_contributors_user` (`id_user`),
  KEY `FK_contributors_task` (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `title` text,
  `id_project` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `node_path` text,
  `id_parent` int(11) DEFAULT NULL,
  `id_child` int(11) NOT NULL,
  `nb_children` int(11) NOT NULL DEFAULT '0',
  `priority` int(2) DEFAULT NULL,
  `progress` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_task_project` (`id_project`),
  KEY `FK_node_node` (`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `description`, `title`, `id_project`, `start_date`, `end_date`, `node_path`, `id_parent`, `id_child`, `nb_children`, `priority`, `progress`) VALUES
(3, NULL, 'Tache de sang', 1, NULL, NULL, '1.2', NULL, 2, 1, NULL, 0),
(4, NULL, 'Tâche de vomi', 1, NULL, NULL, '1.2.1', 3, 1, 0, NULL, 0),
(7, 'bouhouhouhouh...', 'Mes cours à Carrouf', 2, NULL, NULL, '2.1', NULL, 1, 3, NULL, 0),
(10, NULL, 'Lait de merde !!!', 2, NULL, NULL, '2.1.2', 7, 2, 5, NULL, 0),
(11, NULL, 'Avec sucre', 2, NULL, NULL, '2.1.2.1', 10, 1, 1, NULL, 0),
(12, NULL, 'Sans sucre', 2, NULL, NULL, '2.1.2.2', 10, 2, 1, NULL, 0),
(14, NULL, 'Sucre naturel', 2, NULL, NULL, '2.1.2.1.2', 11, 2, 1, NULL, 0),
(20, NULL, 'ha ha ha !', 2, NULL, NULL, '2.2', NULL, 2, 1, NULL, 10),
(21, 'youpi !', 'prendre des vacances', 2, NULL, NULL, '2.3', NULL, 3, 2, NULL, 0),
(27, NULL, 'logique', 2, NULL, NULL, '2.5', NULL, 5, 0, NULL, 0),
(28, NULL, 'toto', 2, NULL, NULL, '2.6', NULL, 6, 0, NULL, 0),
(29, NULL, 'titi', 2, NULL, NULL, '2.7', NULL, 7, 0, NULL, 0),
(30, NULL, 'fnirhfgihi', 2, NULL, NULL, '2.8', NULL, 8, 0, NULL, 0),
(31, NULL, 'toto', 2, NULL, NULL, '2.9', NULL, 9, 1, NULL, 0),
(47, NULL, 'hyhjyj', 2, NULL, NULL, '2.11', NULL, 11, 0, NULL, 0),
(51, NULL, 'iehzfbimegfpmg', 2, NULL, NULL, '2.2.1', 20, 1, 0, NULL, 0),
(52, '', 'qui buggue plus', 2, NULL, NULL, '2.13', NULL, 13, 2, NULL, 0),
(55, '', NULL, 3, NULL, NULL, '3.1', NULL, 1, 1, NULL, 0),
(56, NULL, 'Boire un café', 3, NULL, NULL, '3.2', NULL, 2, 2, NULL, 0),
(57, NULL, 'Faire empailler le putain de chat qui miaule à 3H du mat''', 3, NULL, NULL, '3.3', NULL, 3, 0, NULL, 0),
(58, NULL, 'créer filtrage par date du jour ou de la semaine ', 3, NULL, NULL, '3.4', NULL, 4, 0, NULL, 0),
(59, NULL, 'hou ha ha !', 3, NULL, NULL, '3.1.1', 55, 1, 0, NULL, 0),
(60, NULL, 'coucou', 2, NULL, NULL, '2.1.2.1.2.1', 14, 1, 2, NULL, 0),
(61, NULL, 'truc truc truc', 2, NULL, NULL, '2.1.2.1.2.1.1', 60, 1, 1, NULL, 0),
(62, NULL, 'tagadagadagada', 2, NULL, NULL, '2.1.2.1.2.1.2', 60, 2, 0, NULL, 0),
(63, NULL, 'ouin ouin', 2, NULL, NULL, '2.1.2.1.2.1.1.1', 61, 1, 0, NULL, 0),
(76, NULL, 'boug', 2, NULL, NULL, '2.1.2.2.1', 12, 1, 0, NULL, 0),
(78, NULL, 'coucou2', 2, NULL, NULL, '2.13.2', 52, 2, 0, NULL, 0),
(80, 'prout', 'coucou22', 2, NULL, NULL, '2.9.2', 31, 2, 0, NULL, 0),
(81, NULL, 'toto', 2, NULL, NULL, '2.1.3', 7, 3, 0, NULL, 0),
(82, NULL, 'titi', 2, NULL, NULL, '2.3.1', 21, 1, 0, NULL, 0),
(83, NULL, 'blblbl', 2, NULL, NULL, '2.13.3', 52, 3, 0, NULL, 0),
(84, NULL, 'blbl', 2, NULL, NULL, '2.1.4', 7, 4, 0, NULL, 0),
(85, NULL, 'au champs élysées', 2, NULL, NULL, '2.3.2', 21, 2, 1, NULL, 0),
(86, NULL, 'blbl', 2, NULL, NULL, '2.3.2.1', 85, 1, 0, NULL, 0),
(87, NULL, 'toto', 2, NULL, NULL, '2.14', NULL, 14, 2, NULL, 0),
(88, NULL, 'titi', 2, NULL, NULL, '2.14.1', 87, 1, 0, NULL, 0),
(89, NULL, 'tutu', 2, NULL, NULL, '2.14.2', 87, 2, 0, NULL, 0),
(94, NULL, 'iiiiiiiii', 5, NULL, NULL, '5.2', NULL, 2, 0, NULL, 10),
(96, NULL, 'blblb', 3, NULL, NULL, '3.2.1', 56, 1, 0, NULL, 0),
(97, NULL, 'burp', 3, NULL, NULL, '3.2.2', 56, 2, 0, NULL, 0),
(98, NULL, 'toto', 2, NULL, NULL, '2.1.2.3', 10, 3, 0, NULL, 0),
(99, NULL, 'titi', 2, NULL, NULL, '2.1.2.4', 10, 4, 0, NULL, 0),
(100, NULL, 'tutu', 2, NULL, NULL, '2.1.2.5', 10, 5, 0, NULL, 0),
(101, NULL, 'tralala', 4, NULL, NULL, '4.1', NULL, 1, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `icon_color` text NOT NULL,
  `description` text NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_user` (`id_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `icon`, `icon_color`, `description`, `id_owner`) VALUES
(1, 'Crumble (p1)', 'cookie-bite ', '#00b734', '', 2),
(2, 'mon beau titre qui pue', 'fas fa-folder-open', '#0099ff', '', 3),
(3, 'Trucs vraiment à faire', '', '', '', 4),
(4, 'toto', 'far fa-calendar-alt', '', '', 3),
(5, 'tralala', 'fas fa-folder-open', '', '', 3),
(6, 'youpi', 'fas fa-burn', '', '', 3),
(7, 'coco', 'fas fa-shopping-cart', '', '', 3),
(8, '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `firstname` text NOT NULL,
  `avatar` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `firstname`, `avatar`, `email`, `password`) VALUES
(2, 'toto', 'tata', '', 'toto@mail.fr', 'f71dbe52628a3f83a77ab494817525c6'),
(3, 'toto', 'tagada', ':-)', 'toto.tagada@coucou.fr', 'f71dbe52628a3f83a77ab494817525c6'),
(4, 'coco', 'coco', '', 'coco@coco.fr', 'ac0ddf9e65d57b6a56b2453386cd5db5'),
(5, 'coco2', 'coco2', '', 'coco2@mail.Fr', '374c62b005a625a358a13577e7cbc013');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `FK_notification_task` FOREIGN KEY (`id_node`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notification_user` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_contact_user` FOREIGN KEY (`id_contact`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contact_user_2` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contributor`
--
ALTER TABLE `contributor`
  ADD CONSTRAINT `FK_contributors_task` FOREIGN KEY (`id_task`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contributors_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `FK_node_node` FOREIGN KEY (`id_parent`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_task_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_project_user` FOREIGN KEY (`id_owner`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
