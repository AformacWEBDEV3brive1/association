-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 31 Août 2017 à 15:05
-- Version du serveur :  5.7.19-0ubuntu0.17.04.1
-- Version de PHP :  7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `association`
--

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE `log` (
  `log` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `log`
--

INSERT INTO `log` (`log`, `mdp`, `mail`) VALUES
('alicia', 'motdepasse', 'alicia.sicora@hotmail.fr'),
('jerrico', 'motdepasse', 'jerrico.mcfly@hotmail.fr'),
('lelouch', 'motdepasse', 'lelouch.lamperouge@hotmail.fr'),
('lenny', 'motdepasse', 'lenny.bar@hotmail.fr'),
('millou', 'motdepasse', 'millou.dupond@hotmail.fr'),
('suzaku', 'motdepasse', 'suzaku.dujapon@hotmail.fr'),
('titin', 'motdepasse', 'tintin.dupond@hotmail.fr'),
('toto', 'motdepasse', 'toto.londuzob@hotmail.fr'),
('tyrion', 'motdepasse', 'tyrion@lanister@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `date_inscription` int(25) NOT NULL,
  `date_naissance` int(25) UNSIGNED DEFAULT NULL,
  `sexe` enum('M','F','Autre') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`nom`, `prenom`, `telephone`, `mail`, `date_inscription`, `date_naissance`, `sexe`) VALUES
('sicora', 'alicia', '0603030303', 'alicia.sicora@hotmail.fr', 326587480, 265410698, 'F'),
('mcfly', 'jerrico', '0605050505', 'jerrico.mcfly@hotmail.fr', 452013024, NULL, 'M'),
('lamperouge', 'lelouch', '0601010101', 'lelouch.lamperouge@hotmail.fr', 320156425, 310458789, 'M'),
('bar', 'lenny', '0604040404', 'lenny.bar@hotmail.fr', 569214758, 510321458, 'M'),
('dupond', 'millou', '0607070707', 'millou.dupond@hotmail.fr', 658974123, 574896523, 'Autre'),
('dujapon', 'suzaku', '0610101010', 'suzaku.dujapon@hotmail.fr', 695236478, NULL, 'M'),
('dupond', 'tintin', '0606060606', 'tintin.dupond@hotmail.fr', 451235487, 369852147, 'F'),
('londuzob', 'toto', '0608080808', 'toto.londuzob@hotmail.fr', -654812370, NULL, 'M'),
('lanister', 'tyrion', '0602020202', 'tyrion@lanister@hotmail.fr', 321452301, NULL, 'M');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `role` int(20) NOT NULL,
  `mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`role`, `mail`) VALUES
(0, 'lelouch.lamperouge@hotmail.fr'),
(1, 'alicia.sicora@hotmail.fr'),
(2, 'lenny.bar@hotmail.fr'),
(1, 'jerrico.mcfly@hotmail.fr'),
(1, 'tyrion@lanister@hotmail.fr'),
(2, 'millou.dupond@hotmail.fr'),
(2, 'tintin.dupond@hotmail.fr'),
(2, 'toto.londuzob@hotmail.fr'),
(0, 'suzaku.dujapon@hotmail.fr'),
(3, 'suzaku.dujapon@hotmail.fr'),
(3, 'alicia.sicora@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `role_id`
--

CREATE TABLE `role_id` (
  `id` int(20) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role_id`
--

INSERT INTO `role_id` (`id`, `nom`) VALUES
(0, 'administrateur'),
(1, 'moderateur'),
(2, 'troufion'),
(3, 'benevole');

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `image` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `reseaux` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`image`, `photo`, `titre`, `message`, `reseaux`) VALUES
('image', 'photo', 'titre_site', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `status` int(20) NOT NULL,
  `mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `status`
--

INSERT INTO `status` (`status`, `mail`) VALUES
(0, 'lelouch.lamperouge@hotmail.fr'),
(1, 'tyrion@lanister@hotmail.fr'),
(2, 'alicia.sicora@hotmail.fr'),
(3, 'jerrico.mcfly@hotmail.fr'),
(4, 'toto.londuzob@hotmail.fr'),
(4, 'tintin.dupond@hotmail.fr'),
(4, 'millou.dupond@hotmail.fr'),
(4, 'lenny.bar@hotmail.fr'),
(4, 'suzaku.dujapon@hotmail.fr'),
(0, 'suzaku.dujapon@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `status_id`
--

CREATE TABLE `status_id` (
  `id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `status_id`
--

INSERT INTO `status_id` (`id`, `status`) VALUES
(0, 'directeur'),
(1, 'sous_directeur'),
(2, 'tresorier'),
(3, 'secretaire'),
(4, 'benvole');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`mail`),
  ADD UNIQUE KEY `log` (`log`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `nom` (`nom`),
  ADD KEY `prenom` (`prenom`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD KEY `role` (`role`),
  ADD KEY `mail` (`mail`);

--
-- Index pour la table `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD KEY `status` (`status`),
  ADD KEY `mail` (`mail`);

--
-- Index pour la table `status_id`
--
ALTER TABLE `status_id`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `membre` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `log` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role_id` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `log` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status_id` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
