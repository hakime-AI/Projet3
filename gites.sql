-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 jan. 2022 à 12:38
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gites`
--

-- --------------------------------------------------------

--
-- Structure de la table `images_gites`
--

CREATE TABLE `images_gites` (
  `id` int(11) NOT NULL,
  `photos` varchar(50) DEFAULT NULL,
  `id_gite` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images_gites`
--

INSERT INTO `images_gites` (`id`, `photos`, `id_gite`) VALUES
(7, 'Capture d’écran (36).png', '57'),
(8, 'emptyImage.png', '58'),
(9, 'giteparis.png', '59');

-- --------------------------------------------------------

--
-- Structure de la table `mes_gites`
--

CREATE TABLE `mes_gites` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nom_gite` varchar(50) DEFAULT NULL,
  `Descript_gite` varchar(255) DEFAULT NULL,
  `Nbre_couchage` varchar(50) DEFAULT NULL,
  `Nbre_sdb` varchar(50) DEFAULT NULL,
  `Emplacement_geo` varchar(60) DEFAULT NULL,
  `Prix` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mes_gites`
--



--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images_gites`
--
ALTER TABLE `images_gites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mes_gites`
--
ALTER TABLE `mes_gites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images_gites`
--
ALTER TABLE `images_gites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `mes_gites`
--
ALTER TABLE `mes_gites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
