-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 fév. 2022 à 13:46
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_mystore`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2022_02_21_090044_create_categories_table', 2),
(32, '2022_02_21_085955_create_articles_table', 3),
(33, '2022_02_22_084501_create_commande_models_table', 4),
(39, '2022_02_22_085858_create_commande_article_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\UserModel', 1, 'auth_token', '4efd40461a42a6b9b6fd6355a3ce4339a9eb1504665ab34eb62433ed378b2976', '[\"*\"]', NULL, '2022-02-21 07:59:45', '2022-02-21 07:59:45'),
(2, 'App\\Models\\UserModel', 1, 'auth_token', 'ace8e2b342b86bfebcfb2ede36709e72c8583d2ff080ed1f7a5580ed42d35841', '[\"*\"]', '2022-02-27 10:04:13', '2022-02-21 08:00:01', '2022-02-27 10:04:13'),
(3, 'App\\Models\\UserModel', 1, 'auth_token', '7e0d545405d273ce3b3f179a5549810f79a889bfc50265df9003fc5f3f8053ab', '[\"*\"]', '2022-02-22 13:52:26', '2022-02-22 04:17:32', '2022-02-22 13:52:26'),
(4, 'App\\Models\\UserModel', 1, 'auth_token', '39d9c6bb983e17c1117b85df30ab29668a7fa5caa3d6333ac5fd576aa32b45b6', '[\"*\"]', '2022-02-23 03:38:12', '2022-02-23 03:36:49', '2022-02-23 03:38:12');

-- --------------------------------------------------------

--
-- Structure de la table `r_commande_article`
--

CREATE TABLE `r_commande_article` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `pu` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `r_commande_article`
--

INSERT INTO `r_commande_article` (`id_article`, `id_commande`, `qte`, `pu`) VALUES
(1, 1, 1, 1200.00),
(1, 2, 1, 1200.00),
(1, 3, 2, 1200.00),
(1, 4, 1, 1200.00),
(1, 5, 2, 1200.00),
(1, 6, 1, 1200.00),
(2, 2, 1, 1200.00),
(2, 3, 2, 1200.00),
(2, 5, 1, 1200.00),
(2, 6, 1, 1200.00),
(4, 1, 2, 950.00),
(4, 2, 2, 950.00),
(4, 3, 3, 950.00),
(4, 4, 3, 950.00),
(4, 5, 1, 950.00),
(4, 6, 2, 950.00);

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pu` double(8,2) NOT NULL,
  `ancien_pu` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_article`
--

INSERT INTO `t_article` (`id`, `id_categorie`, `ref`, `libelle`, `pu`, `ancien_pu`, `stock`, `description`, `image1`, `image2`, `image3`, `image4`, `created_at`, `status`, `updated_at`) VALUES
(1, 11, 'HB64UO', 'Article test updated', 1200.00, 0.00, 4, 'Article description up', 'assets/images/product1.jpg', '', '', '', '2022-02-24 18:40:53', 1, '2022-02-22 13:52:26'),
(2, 11, 'HB64UO', 'Article test 3', 1200.00, 0.00, 4, 'Article description', 'assets/images/product2.jpg', '', '', '', '2022-02-24 18:40:53', 1, '2022-02-22 13:52:26'),
(3, 11, 'HB64UO', 'Article test 3', 1300.00, 0.00, 4, 'Article description', 'assets/images/product3.jpg', '', '', '', '2022-02-24 18:40:53', 1, '2022-02-22 13:52:26'),
(4, 3, 'HB64UZ', 'Article test 1', 950.00, 0.00, 10, 'Article description', 'assets/images/product4.jpg', '', '', '', '2022-02-25 06:58:56', 1, '2022-02-22 13:41:09');

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`id`, `libelle`, `description`, `status`) VALUES
(1, 'PC TABLETTES (up)', 'up desc', 0),
(2, 'DESKTOPS', '', 0),
(3, 'LOGICIELS', '', 1),
(4, 'ECRAN ET VIDEOPROJECTEURS', '', 1),
(5, 'BATTERIE ET ALIMENTATION', '', 1),
(6, 'ONDULEURS', '', 1),
(7, 'RESEAU', '', 1),
(8, 'CLAVIER ET SOURIS', '', 1),
(9, 'CONNECTIQUE ORDIS', '', 1),
(10, 'HOUSSE ET SACOCHES', '', 1),
(11, 'LIVRES INFORMATIQUES', '', 1),
(12, 'Categorie test', 'desc', 0),
(13, 'Categorie test 2', 'desc 2', 0),
(14, 'Categorie test 3', 'desc 3', 1),
(15, 'Article test 3', 'Article description', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE `t_commande` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raison_sociale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` date NOT NULL,
  `date_validation` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `t_commande`
--

INSERT INTO `t_commande` (`id`, `ref`, `nom`, `raison_sociale`, `nif`, `telephone`, `mail`, `adresse`, `ville`, `date_creation`, `date_validation`, `status`) VALUES
(1, 'F2022-02-000001', 'aaa', 'aaa', '0112121212', '0321108377', 'r.mitanjo@gmail.com', 'aaa', 'aaa', '2022-02-27', NULL, 1),
(2, 'F2022-02-000002', 'RAKREOFK', 'ezrezr', '0112121212', '0321108377', 'r.mitanjo@gmail.com', 'ezr', 'zerzer', '2022-02-27', NULL, 1),
(3, 'F2022-02-000003', 'rarzer', 'zerzer', 'zerzer', 'zerzer', 'zerzer', 'ezrzer', 'ezrzer', '2022-02-27', NULL, 1),
(4, 'F2022-02-000004', 'RAKREOFK', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'r.mitanjo@gmail.com', 'dfgdfg', 'dfgdfg', '2022-02-27', NULL, 1),
(5, 'F2022-02-000005', 'RAKREOFK', 'zerez', 'zerzer', 'gfdg', 'dfgzrfsd', 'fsdf', 'sdfsdf', '2022-02-27', NULL, 1),
(6, 'F2022-02-000006', 'John Doe', 'sdf', '0123156456', '0321123564', 'johndoe@gmail.com', 'Rue Ratsimilaho', 'Antananarivo', '2022-02-27', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'john doe', 'johndoe@gmail.com', NULL, '$2y$10$17O1iKJaYh1FsMonS1H21uCcRLWP68H8d8VngNVzLQg.2BIfFKG5i', NULL, '2022-02-21 07:59:45', '2022-02-21 07:59:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `r_commande_article`
--
ALTER TABLE `r_commande_article`
  ADD PRIMARY KEY (`id_article`,`id_commande`);

--
-- Index pour la table `t_article`
--
ALTER TABLE `t_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_article`
--
ALTER TABLE `t_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `t_commande`
--
ALTER TABLE `t_commande`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
