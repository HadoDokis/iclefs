-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 18 Juin 2015 à 16:00
-- Version du serveur :  5.6.19-log
-- Version de PHP :  5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `iclefs`
--

-- --------------------------------------------------------

--
-- Structure de la table `buttons`
--

CREATE TABLE IF NOT EXISTS `buttons` (
`id_btn` int(11) NOT NULL,
  `url_callback` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `buttons_data`
--

CREATE TABLE IF NOT EXISTS `buttons_data` (
`id_buttons_data` int(11) NOT NULL,
  `id_button` int(11) NOT NULL,
  `id_fd` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `buttons`
--
ALTER TABLE `buttons`
 ADD PRIMARY KEY (`id_btn`);

--
-- Index pour la table `buttons_data`
--
ALTER TABLE `buttons_data`
 ADD PRIMARY KEY (`id_buttons_data`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `buttons`
--
ALTER TABLE `buttons`
MODIFY `id_btn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `buttons_data`
--
ALTER TABLE `buttons_data`
MODIFY `id_buttons_data` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
