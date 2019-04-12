-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 11 avr. 2019 à 20:11
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `codethecode`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `prenom_client` varchar(100) NOT NULL,
  `contact_client` int(12) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `id_compagnie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clientd`
--

CREATE TABLE `clientd` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clientd`
--

INSERT INTO `clientd` (`id`, `nom`, `prenom`, `email`, `mdp`, `contact`) VALUES
(2, 'David', 'Dem', 'byfrombyt@yahoo.fr', 'azerty', '8888888'),
(3, 'David', 'Dem', 'byfrombyt@yahoo.fr', 'azerty', '8888888'),
(4, 'azerty', 'azerty', 'admin@example.com', 'azerty', '8888888'),
(5, 'merci', 'w', 'emm@gmail.cio', '1111', '2222'),
(6, 'azer', 'michel', 'emm@gmail.cio', '1111', '2222'),
(7, 'Akaa', 'Emmanuel', 'emmanuel@g.ci', 'azerty', '09456378');

-- --------------------------------------------------------

--
-- Structure de la table `compagnies`
--

CREATE TABLE `compagnies` (
  `id_compagnie` int(11) NOT NULL,
  `nom_compagnie` varchar(100) NOT NULL,
  `contact` int(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `logo_compagnie` varchar(255) NOT NULL,
  `commune` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compagnies`
--

INSERT INTO `compagnies` (`id_compagnie`, `nom_compagnie`, `contact`, `password`, `logo_compagnie`, `commune`) VALUES
(1, 'NAN', 0, '', 'car1.png', ''),
(2, 'CODETHECODE', 0, '', 'car2.png', ''),
(3, 'HTB', 0, '', 'bus.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_compagnie` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(225) NOT NULL,
  `heure_depart` varchar(100) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_depart` date NOT NULL,
  `destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_compagnie`, `nom_client`, `prenom_client`, `heure_depart`, `date_reservation`, `date_depart`, `destination`) VALUES
(1, 1, 'a', 'v', 'matin', '2019-04-11 13:45:32', '2019-04-10', 'daloa'),
(2, 1, 'a', 'a', 'matin', '2019-04-11 15:49:03', '2019-04-18', 'bouake'),
(3, 1, 'merci', 'michel', 'soir', '2019-04-11 16:47:55', '2019-04-17', 'daloa'),
(4, 1, 'merci', 'Gnelezie', 'soir', '2019-04-11 16:50:02', '2019-04-25', 'daloa'),
(5, 1, 'merci', 'michel', 'midi', '2019-04-11 16:51:35', '2019-04-27', 'korhogo'),
(6, 1, 'az', 're', 'matin', '2019-04-11 17:03:58', '2019-04-26', 'daloa'),
(7, 2, 'merci', 'Gnelezie', 'matin', '2019-04-11 18:44:13', '2019-04-20', 'daloa'),
(8, 2, 'kok', 'emmanuel', 'midi', '2019-04-11 19:00:19', '2019-04-28', 'bouake'),
(9, 2, 'Akaa', 'Emmanuel', '&gt;14h', '2019-04-11 20:03:50', '2019-04-20', 'daloa');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `clientd`
--
ALTER TABLE `clientd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compagnies`
--
ALTER TABLE `compagnies`
  ADD PRIMARY KEY (`id_compagnie`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clientd`
--
ALTER TABLE `clientd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `compagnies`
--
ALTER TABLE `compagnies`
  MODIFY `id_compagnie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
