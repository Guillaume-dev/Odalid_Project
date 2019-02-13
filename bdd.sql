-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 juin 2018 à 10:22
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `odalid`
--
CREATE DATABASE IF NOT EXISTS odalid DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE odalid;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_06_04_124429_articles', 1);

-- --------------------------------------------------------

--
-- Structure de la table `od_gache`
--

DROP TABLE IF EXISTS `od_gache`;
CREATE TABLE IF NOT EXISTS `od_gache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) DEFAULT NULL,
  `Mac` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_historique`
--

DROP TABLE IF EXISTS `od_historique`;
CREATE TABLE IF NOT EXISTS `od_historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecteur_id` int(11) DEFAULT NULL,
  `identite_id` int(11) DEFAULT NULL,
  `Service` varchar(30) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Valeur` int(11) DEFAULT NULL,
  `ValeurBackup` int(11) DEFAULT NULL,
  `Transaction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lecteur_id` (`lecteur_id`),
  KEY `identite_id` (`identite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_identite`
--

DROP TABLE IF EXISTS `od_identite`;
CREATE TABLE IF NOT EXISTS `od_identite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  `Sexe` varchar(30) DEFAULT NULL,
  `NumeroID` varchar(8) DEFAULT NULL,
  `DateDeValidite` datetime DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `DateDeNaissance` datetime DEFAULT NULL,
  `NumIdentite` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_identitezone`
--

DROP TABLE IF EXISTS `od_identitezone`;
CREATE TABLE IF NOT EXISTS `od_identitezone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identite_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `identite_id` (`identite_id`),
  KEY `zone_id` (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_jour`
--

DROP TABLE IF EXISTS `od_jour`;
CREATE TABLE IF NOT EXISTS `od_jour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identitezone_id` int(11) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `HeureDebut` time DEFAULT NULL,
  `HeureFin` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `identitezone_id` (`identitezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_lecteur`
--

DROP TABLE IF EXISTS `od_lecteur`;
CREATE TABLE IF NOT EXISTS `od_lecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `porte_id` int(11) DEFAULT NULL,
  `IP` varchar(15) DEFAULT NULL,
  `Mac` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `porte_id` (`porte_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_porte`
--

DROP TABLE IF EXISTS `od_porte`;
CREATE TABLE IF NOT EXISTS `od_porte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relais_id` int(11) DEFAULT NULL,
  `salle_id` int(11) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relais_id` (`relais_id`),
  KEY `salle_id` (`salle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_relais`
--

DROP TABLE IF EXISTS `od_relais`;
CREATE TABLE IF NOT EXISTS `od_relais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gache_id` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gache_id` (`gache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_salle`
--

DROP TABLE IF EXISTS `od_salle`;
CREATE TABLE IF NOT EXISTS `od_salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identitezone_id` int(11) DEFAULT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `identitezone_id` (`identitezone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `od_zone`
--

DROP TABLE IF EXISTS `od_zone`;
CREATE TABLE IF NOT EXISTS `od_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'toto@toto.fr', '$2y$10$y2dv0QpALgq3Vdf7vKSfze.ifzhDFje4WR7iROukFhq3hXdrIKoOq', 'slfytKepNEFhG2CFKhHVfjgEZw1fzDmAtUq4uGNMuToWEOskSZW90XokSm2p', '2018-06-07 06:48:08', '2018-06-07 06:48:08'),
(2, 'azer', 'dic33654@sawoe.com', '$2y$10$jWptl70mSz7qF73SXNQ9ee/xCAqUUbpoZCwA0LXnepllltW05NHGC', 'mNfxXjbkp1RRK2RshKT8SNZ6CVuW6AfFxSnJSdjWCoKfHQ5DWxVAMFMYy2h9', '2018-06-08 06:15:16', '2018-06-08 06:15:16');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `od_historique`
--
ALTER TABLE `od_historique`
  ADD CONSTRAINT `od_historique_ibfk_1` FOREIGN KEY (`lecteur_id`) REFERENCES `od_lecteur` (`id`),
  ADD CONSTRAINT `od_historique_ibfk_2` FOREIGN KEY (`identite_id`) REFERENCES `od_identite` (`id`);

--
-- Contraintes pour la table `od_identitezone`
--
ALTER TABLE `od_identitezone`
  ADD CONSTRAINT `od_identitezone_ibfk_1` FOREIGN KEY (`identite_id`) REFERENCES `od_identite` (`id`),
  ADD CONSTRAINT `od_identitezone_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `od_zone` (`id`);

--
-- Contraintes pour la table `od_jour`
--
ALTER TABLE `od_jour`
  ADD CONSTRAINT `od_jour_ibfk_1` FOREIGN KEY (`identitezone_id`) REFERENCES `od_identitezone` (`id`);

--
-- Contraintes pour la table `od_lecteur`
--
ALTER TABLE `od_lecteur`
  ADD CONSTRAINT `od_lecteur_ibfk_1` FOREIGN KEY (`porte_id`) REFERENCES `od_porte` (`id`);

--
-- Contraintes pour la table `od_porte`
--
ALTER TABLE `od_porte`
  ADD CONSTRAINT `od_porte_ibfk_1` FOREIGN KEY (`relais_id`) REFERENCES `od_relais` (`id`),
  ADD CONSTRAINT `od_porte_ibfk_2` FOREIGN KEY (`salle_id`) REFERENCES `od_salle` (`id`);

--
-- Contraintes pour la table `od_relais`
--
ALTER TABLE `od_relais`
  ADD CONSTRAINT `od_relais_ibfk_1` FOREIGN KEY (`gache_id`) REFERENCES `od_gache` (`id`);

--
-- Contraintes pour la table `od_salle`
--
ALTER TABLE `od_salle`
  ADD CONSTRAINT `od_salle_ibfk_1` FOREIGN KEY (`identitezone_id`) REFERENCES `od_identitezone` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
