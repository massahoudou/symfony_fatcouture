-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juil. 2020 à 13:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fatcouture`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserve_at` datetime NOT NULL,
  `titreproduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idproduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `bp`, `reserve_at`, `titreproduit`, `idproduit`) VALUES
(3, 'rahina', 'mama', 'ma@gmail.com', '91629004', 'lom-agoe', '1165', '2020-06-07 22:58:53', 'agogo girl', NULL),
(4, 'odanou', 'berzerk', 'massahoudouodanou@gmail.com', '93240584', 'lom-agoe', '1587', '2020-07-14 13:10:42', 'chemisiette', 3),
(5, 'odanou', 'berzerk', 'massahoudouodanou@gmail.com', '93240584', 'lom-agoe', '1587', '2020-07-14 13:11:42', 'chemisiette', 3),
(6, 'odanou', 'berzerk', 'massahoudouodanou@gmail.com', '93240584', 'lom-agoe', '1587', '2020-07-14 13:17:10', 'chemisiette', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `telephone`, `email`, `message`, `iduser`) VALUES
(1, 'odanou', 'massahoudou', '90240584', 'massahoudouodanou@gmail.com', 'slt j aime votre job je suis  passionner', NULL),
(3, 'bazooka', 'chrisian', '95847851', 'bazoo@gamil.com', 'j adore votre entreprise', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200529162522', '2020-06-06 19:51:58'),
('20200529183827', '2020-06-06 19:52:00'),
('20200529184704', '2020-06-06 19:52:02'),
('20200530073115', '2020-06-06 19:52:02'),
('20200530095622', '2020-06-06 19:52:03'),
('20200530112303', '2020-06-06 19:52:05'),
('20200606195707', '2020-06-06 19:57:47'),
('20200606201508', '2020-06-06 20:15:39'),
('20200606204455', '2020-06-06 20:45:03'),
('20200606212027', '2020-06-06 21:20:53'),
('20200606213616', '2020-06-06 21:36:28'),
('20200606213759', '2020-06-06 21:38:07'),
('20200714104101', '2020-07-14 10:41:56'),
('20200714105551', '2020-07-14 10:59:11');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `misajour_at` datetime NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solder` tinyint(1) NOT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `titre`, `prix`, `description`, `misajour_at`, `filename`, `solder`, `iduser`) VALUES
(1, 'coco beach', '20000', 'un serperbe produit pour vous', '2020-06-06 22:33:08', '5edbfd85171e5100268855.jpg', 0, NULL),
(2, 'agogo girl', '60 000', 'une belle robe pour vous', '2020-06-07 21:10:11', '5edd3b9536f94675260649.jpg', 0, NULL),
(3, 'chemisiette', '5000', 'une chemise pas comme les autres', '2020-06-07 21:12:41', '5edd3c29d8a5a557910793.jpg', 0, NULL),
(4, 'babillonne', '9000', 'cool pour vous', '2020-06-07 21:15:36', '5edd3cd879480750338806.jpg', 0, NULL),
(5, 'barbie', '20000', 'une belle petite fille attend cette robe', '2020-06-07 21:16:47', '5edd3d1fc72e0738071423.jpg', 0, NULL),
(6, 'mamamilla', '9000', 'cool', '2020-06-07 21:22:14', '5edd3e670206a333257850.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'odanou', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
