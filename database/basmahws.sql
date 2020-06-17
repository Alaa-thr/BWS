-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 juin 2020 à 12:37
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basmahws`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `big_admin` tinyint(1) NOT NULL DEFAULT 0,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numTelephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numCarteBanquaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleteda` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `big_admin`, `nom`, `prenom`, `email`, `numTelephone`, `numCarteBanquaire`, `image`, `created_at`, `updated_at`, `deleteda`) VALUES
(1, 1, 1, 'BWS', 'BWS', 'basmah.work_shop@gmail.com', '0500000000', '0000001', 'NULL', '2020-05-26 09:31:27', '2020-05-26 09:31:27', 0);

-- --------------------------------------------------------

--
-- Structure de la table `annonce_emploies`
--

CREATE TABLE `annonce_emploies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeur_id` bigint(20) UNSIGNED NOT NULL,
  `sous_categorie_id` bigint(20) UNSIGNED NOT NULL,
  `libellé` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_condidat` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annonceE_attende` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `admin_id`, `titre`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Article1', 'Tttttttttttttttttttttttttttttt', 'gVAdidK0JMNmKpmv.jpg', '2020-05-26 14:36:45', '2020-05-26 14:36:45'),
(2, 1, 'Article 2', 'Gggggggggggggggg', 'PIRoHqmvPvDbdbJb.jpg', '2020-05-29 17:27:13', '2020-05-29 17:27:13'),
(3, 1, 'Article 3', 'Mmmmmmmmmmmmm', 'RKf5sk0bZjFLV2iz.jpg', '2020-05-29 17:27:33', '2020-05-29 17:27:33'),
(4, 1, 'Article 4', 'Ssssssssssssssssssssssss', 'ygMHwoS7qP0MQLK1.png', '2020-05-29 17:27:57', '2020-05-29 17:27:57'),
(5, 1, 'Article 5', 'Lllllllllllllllllll', 'KMcnP72s0nm5bCZR.jpg', '2020-05-29 17:28:16', '2020-05-29 17:28:16'),
(6, 1, 'Article 6', 'Hhhhhhhhhhhh', 'rbtkdGNeJNOvjNdz.jpg', '2020-05-29 17:28:36', '2020-05-29 17:28:36');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `typeCategorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `created_at`, `updated_at`, `typeCategorie`) VALUES
(80, 'Architecture', '2020-05-27 16:11:15', '2020-05-27 17:23:07', 'shop'),
(81, 'Hostpital', '2020-05-27 16:53:38', '2020-05-27 17:02:20', 'emploi'),
(83, 'Shoes', '2020-05-27 20:03:32', '2020-05-27 20:03:32', 'shop'),
(84, 'Cars', '2020-05-27 20:03:55', '2020-05-27 20:03:55', 'shop'),
(86, 'Laptop', '2020-05-29 17:01:45', '2020-05-29 17:01:45', 'emploi');

-- --------------------------------------------------------

--
-- Structure de la table `choisir_types`
--

CREATE TABLE `choisir_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `type_livraison` enum('dhl','vc','cv') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codePostal` int(11) NOT NULL DEFAULT 0,
  `numeroTelephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `nbr_cmd` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deletedc` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `nom`, `prenom`, `ville`, `email`, `codePostal`, `numeroTelephone`, `image`, `nbr_cmd`, `created_at`, `updated_at`, `deletedc`) VALUES
(1, 2, 'alaa', 'alaa', 'Tlemcen', 'alaa@gmail.com', 0, '0500000001', 'NULL', 0, '2020-05-26 09:33:10', '2020-05-26 09:33:10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(2, 'Green', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(3, 'Blue', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(4, 'Black', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(5, 'White', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(6, 'Yellow', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(7, 'Pink', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(8, 'Gris', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(9, 'Brown', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(10, 'orange', '2020-05-26 09:32:05', '2020-05-26 09:32:05'),
(11, 'Purple', '2020-05-26 09:32:05', '2020-05-26 09:32:05');

-- --------------------------------------------------------

--
-- Structure de la table `color_produits`
--

CREATE TABLE `color_produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color_produits`
--

INSERT INTO `color_produits` (`id`, `produit_id`, `color_id`, `created_at`, `updated_at`) VALUES
(10, 19, 4, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(11, 19, 3, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(12, 19, 9, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(13, 20, 9, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(14, 20, 2, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(15, 21, 4, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(16, 21, 3, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(17, 21, 5, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(18, 21, 6, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(19, 22, 4, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(20, 22, 3, '2020-06-01 19:19:49', '2020-06-01 19:19:49');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `prix_total` double(8,2) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Réponse_vendeur` tinyint(1) NOT NULL DEFAULT 0,
  `qte` int(11) NOT NULL,
  `type_livraison` enum('dhl','vc','cv') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_tlf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commande_envoyee` tinyint(1) NOT NULL DEFAULT 0,
  `commande_traiter` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `couleur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande_emploies`
--

CREATE TABLE `demande_emploies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `employeur_id` bigint(20) UNSIGNED NOT NULL,
  `annonceE_id` bigint(20) UNSIGNED NOT NULL,
  `reponse_employeur` tinyint(1) NOT NULL DEFAULT 0,
  `cv_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `demmande_envoyer` tinyint(1) NOT NULL DEFAULT 0,
  `demmande_traiter` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employeurs`
--

CREATE TABLE `employeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_compte_banquiare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deletede` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employeurs`
--

INSERT INTO `employeurs` (`id`, `user_id`, `nom`, `prenom`, `num_tel`, `email`, `address`, `num_compte_banquiare`, `nom_societe`, `image`, `created_at`, `updated_at`, `deletede`) VALUES
(1, 4, 'hadjer', 'hadjer', '0500000003', 'hadjer@gmail.com', 'Oran-Akid Lotfi', '01000', 'NALTIS', 'blog-06.jpg', '2020-05-26 09:38:38', '2020-05-26 09:38:38', 0);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `annonce_emploi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE `historiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annonceE_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `imageproduits`
--

CREATE TABLE `imageproduits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `imageproduits`
--

INSERT INTO `imageproduits` (`id`, `produit_id`, `image`, `profile`, `created_at`, `updated_at`) VALUES
(8, 19, '8kbHm5EfWqkFCg7y.jpg', 1, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(9, 19, 'c17pYNthkYPmwPyA.jpg', 0, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(10, 19, '0b7DX1GpPPTKEjX4.jpg', 0, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(11, 20, 'TwTLq0EXof0jAqH6.jpg', 1, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(12, 20, '9eA8NTfupPzAdXpJ.jpg', 0, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(13, 20, 'LLVvmOYhFy6c7sib.jpg', 0, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(14, 20, 'JlgqaxWsd0Uw3NWL.jpg', 0, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(15, 21, 'a19tpgC7S45w13op.jpg', 1, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(16, 21, '5g4dIWj7Q5LwilkC.jpg', 0, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(17, 22, 'OTnSJPUqRwD4x0ib.jpg', 1, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(18, 22, '0A3UQY6g7aByrCtX.jpg', 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(19, 22, '9uUvxkMumPEatME1.jpg', 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(20, 22, '0THkD7EzOOaDeyas.jpg', 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(21, 22, 'BDNcY4AfbsneFQmZ.jpg', 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49'),
(22, 22, 'dt1VxY8uCJbGr0i4.jpg', 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_30_191914_create_signal_table', 1),
(5, '2020_03_30_193234_create_sous_categories_table', 1),
(6, '2020_03_30_193354_create_admins_table', 1),
(7, '2020_03_30_204848_create_clients_table', 1),
(8, '2020_03_30_205012_create_villes_table', 1),
(9, '2020_03_30_205128_create_historiques_table', 1),
(10, '2020_03_31_154158_create_employeurs_table', 1),
(11, '2020_03_31_154315_create_demande_emploies_table', 1),
(12, '2020_03_31_154424_create_annonce_emploies_table', 1),
(13, '2020_04_02_133353_create_categories_table', 1),
(14, '2020_04_02_133801_create_favoris_table', 1),
(15, '2020_04_02_134738_create_choisir_types_table', 1),
(16, '2020_04_03_172905_create_vendeurs_table', 1),
(17, '2020_04_03_173501_create_produits_table', 1),
(18, '2020_04_03_173840_create_commandes_table', 1),
(19, '2020_04_05_165246_add_column_categorie_id_sous_categories', 1),
(20, '2020_04_05_172054_add_column_fk_produits', 1),
(21, '2020_04_05_174142_create_tarif_livraison_table', 1),
(22, '2020_04_05_185357_add_column_fk_signals', 1),
(23, '2020_04_05_185829_add_column_fk_favoris', 1),
(24, '2020_04_05_193442_create_paiement_employeurs', 1),
(25, '2020_04_05_193508_create_paiement_vendeurs', 1),
(26, '2020_04_06_202519_add_column_fk_paiement_employeurs', 1),
(27, '2020_04_06_202853_add_column_fk_paiement_vendeurs', 1),
(28, '2020_04_06_214514_add_column_fk_annonce_emploies', 1),
(29, '2020_04_06_214849_add_column_fk_demande_emploies', 1),
(30, '2020_04_06_221855_add_column_fk_admins', 1),
(31, '2020_04_06_222848_add_column_fk_choisir_types', 1),
(32, '2020_04_06_223443_add_column_fk_commandes', 1),
(33, '2020_04_06_223939_add_column_fk_historiques', 1),
(34, '2020_04_07_181649_create_articles_table', 1),
(35, '2020_04_07_193407_add_column_fk_clients', 1),
(36, '2020_04_07_193537_add_column_fk_employeurs', 1),
(37, '2020_04_07_193654_add_column_fk_vendeurs', 1),
(38, '2020_04_15_180359_add_column_unique_users', 1),
(39, '2020_04_24_232141_create_type_choisir_vendeur_table', 1),
(40, '2020_04_24_232240_create_image_produits_table', 1),
(41, '2020_04_29_164926_add_column_code_postal_clients', 1),
(42, '2020_05_17_210518_add_colomun_deletedc_clients', 1),
(43, '2020_05_17_210909_add_colomun_deletedv_vendeurs', 1),
(44, '2020_05_18_184121_add_colomun_deletede_employeurs', 1),
(45, '2020_05_18_202534_add_colomun_deleteda_admins', 1),
(46, '2020_05_21_225146_add_column_profil_image_produits', 1),
(47, '2020_05_21_230512_add_table_colors', 1),
(48, '2020_05_21_231254_add_table_colorProduits', 1),
(50, '2020_05_27_173450_add_column_type_catego_categories', 2),
(51, '2020_05_27_195901_create_notifications_table', 3),
(54, '2020_05_30_185253_add_column_taille_couleur_commande', 5),
(55, '2020_05_30_190120_create_table_taille_produits', 6);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `signal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paiement_vendeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paiement_employeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categorie_libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sous_categorie_libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeCategoSousCatego` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `admin_id`, `client_id`, `employeur_id`, `vendeur_id`, `signal_id`, `paiement_vendeur_id`, `paiement_employeur_id`, `categorie_libelle`, `sous_categorie_libelle`, `typeCategoSousCatego`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Phone', NULL, 'shop', '2020-05-29 18:04:41', '2020-05-29 18:04:41'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hkk', 'shop', '2020-05-29 18:05:01', '2020-05-29 18:05:01'),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Baba', 'shop', '2020-05-29 20:41:41', '2020-05-29 20:41:41');

-- --------------------------------------------------------

--
-- Structure de la table `paiement_employeurs`
--

CREATE TABLE `paiement_employeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeur_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `response` tinyint(1) NOT NULL DEFAULT 0,
  `position_publication` enum('first','second','third') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement_vendeurs`
--

CREATE TABLE `paiement_vendeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `response` tinyint(1) NOT NULL DEFAULT 0,
  `position_publication` enum('first','second','third') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `sous_categorie_id` bigint(20) UNSIGNED NOT NULL,
  `Libellé` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qte_P` int(11) NOT NULL,
  `Notation` int(11) DEFAULT NULL,
  `poid` double(8,2) NOT NULL,
  `produit_attende` tinyint(1) NOT NULL DEFAULT 0,
  `deleteProduit` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `vendeur_id`, `sous_categorie_id`, `Libellé`, `prix`, `description`, `Qte_P`, `Notation`, `poid`, `produit_attende`, `deleteProduit`, `created_at`, `updated_at`) VALUES
(19, 1, 97, 'Vens', 2000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, veniam eligendi ea,', 12, NULL, 12.00, 0, 0, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(20, 1, 89, '4x4', 12000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, veniam eligendi ea,', 1, NULL, 1250.00, 0, 0, '2020-06-01 19:16:43', '2020-06-01 19:16:43'),
(21, 1, 97, 'Dresse', 2020, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, veniam eligendi ea,', 12, NULL, 22.00, 0, 0, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(22, 2, 91, 'Iphone X', 10000, '0540244784 lorem', 2, NULL, 12.00, 0, 0, '2020-06-01 19:19:49', '2020-06-01 19:19:49');

-- --------------------------------------------------------

--
-- Structure de la table `signals`
--

CREATE TABLE `signals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `employeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendeur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annonce_emploi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `categorie_id`, `libelle`, `created_at`, `updated_at`) VALUES
(87, 81, 'Hkk', '2020-05-27 17:46:02', '2020-05-27 17:46:02'),
(88, 84, 'Leon', '2020-05-27 20:04:02', '2020-05-27 20:04:02'),
(89, 84, '4x4', '2020-05-27 20:04:07', '2020-05-27 20:04:07'),
(91, 80, 'Baba1', '2020-05-29 16:53:13', '2020-05-29 16:53:13'),
(93, 81, 'Baba', '2020-05-29 16:56:05', '2020-05-29 16:56:05'),
(95, NULL, 'Iphone X', '2020-05-29 18:02:38', '2020-05-29 18:02:38'),
(96, 84, 'BMW', '2020-05-29 19:26:36', '2020-05-29 19:26:36'),
(97, 83, 'Hkk', '2020-05-29 20:37:00', '2020-05-29 20:37:00');

-- --------------------------------------------------------

--
-- Structure de la table `taille_produits`
--

CREATE TABLE `taille_produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taille_produits`
--

INSERT INTO `taille_produits` (`id`, `nom`, `produit_id`, `created_at`, `updated_at`) VALUES
(13, '36', 19, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(14, '37', 19, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(15, '38', 19, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(16, '39', 19, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(17, '40', 19, '2020-06-01 19:15:03', '2020-06-01 19:15:03'),
(18, 'S', 21, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(19, 'M', 21, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(20, 'L', 21, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(21, 'XL', 21, '2020-06-01 19:17:59', '2020-06-01 19:17:59'),
(22, 'XXL', 21, '2020-06-01 19:17:59', '2020-06-01 19:17:59');

-- --------------------------------------------------------

--
-- Structure de la table `tarif_livraisons`
--

CREATE TABLE `tarif_livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `prix` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typechoisirvendeurs`
--

CREATE TABLE `typechoisirvendeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendeur_id` bigint(20) UNSIGNED NOT NULL,
  `type_livraison` enum('dhl','vc','cv') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typechoisirvendeurs`
--

INSERT INTO `typechoisirvendeurs` (`id`, `vendeur_id`, `type_livraison`, `created_at`, `updated_at`) VALUES
(1, 1, 'dhl', '2020-05-26 09:36:54', '2020-05-26 09:36:54'),
(2, 1, 'vc', '2020-05-26 09:36:54', '2020-05-26 09:36:54'),
(3, 2, 'cv', '2020-05-30 16:20:35', '2020-05-30 16:20:35');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numTelephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_compte` enum('a','c','v','e') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `numTelephone`, `email`, `type_compte`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0500000000', 'basmah.work_shop@gmail.com', 'a', NULL, '$2y$10$rnxnn./j1oeTSV6N0TUT8esfynezWzh14/a/tp6vTl/OUZSUGeiES', NULL, '2020-05-26 09:31:24', '2020-05-26 09:31:24'),
(2, '0500000001', 'alaa@gmail.com', 'c', NULL, '$2y$10$9Z5WBXv0hWhxkhKGHly4A.AHqoGvDC3c1WW657931Bpt9mNpNi7oC', NULL, '2020-05-26 09:33:10', '2020-05-26 09:33:10'),
(3, '0500000002', 'islam@gmail.com', 'v', NULL, '$2y$10$dTZY8lWktYsxGhus290Hc.kuujbY5kDKp1qWb5XKPVtQQcjmjRfXO', NULL, '2020-05-26 09:36:54', '2020-05-26 09:36:54'),
(4, '0500000003', 'hadjer@gmail.com', 'e', NULL, '$2y$10$LHWlUgpen1adPt6HMBvQR.fVjQ8hxBTAWvfYsyOj5hjMNejGH9gvK', NULL, '2020-05-26 09:38:38', '2020-05-26 09:38:38'),
(5, '0540244784', 'tt@gmail.com', 'v', NULL, '$2y$10$SMgQFYlR7brToPymzEZcEe4/XBpD3FW3nqRmamvCLSEV3vPz19Mze', NULL, '2020-05-30 16:20:35', '2020-05-30 16:20:35');

-- --------------------------------------------------------

--
-- Structure de la table `vendeurs`
--

CREATE TABLE `vendeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numTelephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Addresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom_boutique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Num_Compte_Banquaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nbre_abbon` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deletedv` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vendeurs`
--

INSERT INTO `vendeurs` (`id`, `user_id`, `Nom`, `Prenom`, `email`, `numTelephone`, `Addresse`, `Nom_boutique`, `Num_Compte_Banquaire`, `Nbre_abbon`, `image`, `created_at`, `updated_at`, `deletedv`) VALUES
(1, 3, 'islam', 'islam', 'islam@gmail.com', '0500000002', 'Alger-', 'zara', '01000', 0, 'banner-02.jpg', '2020-05-26 09:36:54', '2020-05-26 09:36:54', 0),
(2, 5, 'tt', 'tt', 'tt@gmail.com', '0540244784', 'Alger-zara', 'zara', '05455777', 0, 'Capture d’écran (25).png', '2020-05-30 16:20:35', '2020-05-30 16:20:35', 0);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Adrar', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(2, 'Chlef', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(3, 'Laghouat', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(4, 'Oum El Bouaghi', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(5, 'Batna', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(6, 'Béjaïa', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(7, 'Biskra', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(8, 'Béchar', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(9, 'Blida', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(10, 'Bouira', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(11, 'Tamanrasset', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(12, 'Tébessa', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(13, 'Tlemcen', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(14, 'Tiaret', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(15, 'Tizi Ouzou', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(16, 'Alger', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(17, 'Djelfa', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(18, 'Jijel', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(19, 'Sétif', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(20, 'Saïda', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(21, 'Skikda', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(22, 'Sidi Bel Abbès', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(23, 'Annaba', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(24, 'Guelma', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(25, 'Constantine', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(26, 'Médéa', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(27, 'Mostaganem', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(28, 'M\'Sila', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(29, 'Mascara', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(30, 'Ouargla', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(31, 'Oran', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(32, 'El Bayadh', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(33, 'Illizi', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(34, 'Bordj Bou Arreridj', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(35, 'Boumerdès', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(36, 'El Tarf', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(37, 'Tindouf', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(38, 'Tissemsilt', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(39, 'El Oued', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(40, 'Khenchela', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(41, 'Souk Ahras', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(42, 'Tipaza', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(43, 'Mila', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(44, 'Defla', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(45, 'Naâma', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(46, 'Aïn Témouchent', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(47, 'Ghardaïa', '2020-05-26 09:31:28', '2020-05-26 09:31:28'),
(48, 'Relizane', '2020-05-26 09:31:28', '2020-05-26 09:31:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_numtelephone_unique` (`numTelephone`),
  ADD UNIQUE KEY `admins_numcartebanquaire_unique` (`numCarteBanquaire`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Index pour la table `annonce_emploies`
--
ALTER TABLE `annonce_emploies`
  ADD PRIMARY KEY (`id`,`employeur_id`,`sous_categorie_id`),
  ADD KEY `annonce_emploies_sous_categorie_id_foreign` (`sous_categorie_id`),
  ADD KEY `annonce_emploies_employeur_id_foreign` (`employeur_id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_titre_unique` (`titre`),
  ADD UNIQUE KEY `articles_description_unique` (`description`) USING HASH,
  ADD KEY `articles_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_libelle_typecategorie_unique` (`libelle`,`typeCategorie`);

--
-- Index pour la table `choisir_types`
--
ALTER TABLE `choisir_types`
  ADD PRIMARY KEY (`id`,`client_id`,`vendeur_id`),
  ADD KEY `choisir_types_client_id_foreign` (`client_id`),
  ADD KEY `choisir_types_vendeur_id_foreign` (`vendeur_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_numerotelephone_unique` (`numeroTelephone`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_nom_unique` (`nom`);

--
-- Index pour la table `color_produits`
--
ALTER TABLE `color_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_produits_produit_id_foreign` (`produit_id`),
  ADD KEY `color_produits_color_id_foreign` (`color_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`,`produit_id`,`client_id`),
  ADD KEY `commandes_client_id_foreign` (`client_id`),
  ADD KEY `commandes_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `commandes_produit_id_foreign` (`produit_id`),
  ADD KEY `commandes_couleur_id_foreign` (`couleur_id`);

--
-- Index pour la table `demande_emploies`
--
ALTER TABLE `demande_emploies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user` (`client_id`,`annonceE_id`),
  ADD KEY `demande_emploies_employeur_id_foreign` (`employeur_id`),
  ADD KEY `demande_emploies_annoncee_id_foreign` (`annonceE_id`);

--
-- Index pour la table `employeurs`
--
ALTER TABLE `employeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employeurs_num_tel_unique` (`num_tel`),
  ADD UNIQUE KEY `employeurs_email_unique` (`email`),
  ADD UNIQUE KEY `employeurs_num_compte_banquiare_unique` (`num_compte_banquiare`),
  ADD KEY `employeurs_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favoris_client_id_produit_id_unique` (`client_id`,`produit_id`),
  ADD UNIQUE KEY `favoris_client_id_annonce_emploi_id_unique` (`client_id`,`annonce_emploi_id`),
  ADD KEY `favoris_produit_id_foreign` (`produit_id`),
  ADD KEY `favoris_annonce_emploi_id_foreign` (`annonce_emploi_id`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historiques_client_id_foreign` (`client_id`),
  ADD KEY `historiques_produit_id_foreign` (`produit_id`),
  ADD KEY `historiques_annoncee_id_foreign` (`annonceE_id`);

--
-- Index pour la table `imageproduits`
--
ALTER TABLE `imageproduits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imageproduits_produit_id_foreign` (`produit_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_admin_id_foreign` (`admin_id`),
  ADD KEY `notifications_client_id_foreign` (`client_id`),
  ADD KEY `notifications_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `notifications_employeur_id_foreign` (`employeur_id`),
  ADD KEY `notifications_signal_id_foreign` (`signal_id`),
  ADD KEY `notifications_paiement_vendeur_id_foreign` (`paiement_vendeur_id`),
  ADD KEY `notifications_paiement_employeur_id_foreign` (`paiement_employeur_id`);

--
-- Index pour la table `paiement_employeurs`
--
ALTER TABLE `paiement_employeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiement_employeurs_employeur_id_foreign` (`employeur_id`),
  ADD KEY `paiement_employeurs_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `paiement_vendeurs`
--
ALTER TABLE `paiement_vendeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiement_vendeurs_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `paiement_vendeurs_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`,`vendeur_id`,`sous_categorie_id`),
  ADD KEY `produits_sous_categorie_id_foreign` (`sous_categorie_id`),
  ADD KEY `produits_vendeur_id_foreign` (`vendeur_id`);

--
-- Index pour la table `signals`
--
ALTER TABLE `signals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `signals_client_id_employeur_id_unique` (`client_id`,`employeur_id`),
  ADD UNIQUE KEY `signals_client_id_vendeur_id_unique` (`client_id`,`vendeur_id`),
  ADD UNIQUE KEY `signals_client_id_produit_id_unique` (`client_id`,`produit_id`),
  ADD UNIQUE KEY `signals_client_id_annonce_emploi_id_unique` (`client_id`,`annonce_emploi_id`),
  ADD KEY `signals_employeur_id_foreign` (`employeur_id`),
  ADD KEY `signals_vendeur_id_foreign` (`vendeur_id`),
  ADD KEY `signals_produit_id_foreign` (`produit_id`),
  ADD KEY `signals_annonce_emploi_id_foreign` (`annonce_emploi_id`);

--
-- Index pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sous_categories_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `taille_produits`
--
ALTER TABLE `taille_produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taille_produits_nom_produit_id_unique` (`nom`,`produit_id`),
  ADD KEY `taille_produits_produit_id_foreign` (`produit_id`);

--
-- Index pour la table `tarif_livraisons`
--
ALTER TABLE `tarif_livraisons`
  ADD PRIMARY KEY (`id`,`ville_id`,`vendeur_id`),
  ADD KEY `tarif_livraisons_ville_id_foreign` (`ville_id`),
  ADD KEY `tarif_livraisons_vendeur_id_foreign` (`vendeur_id`);

--
-- Index pour la table `typechoisirvendeurs`
--
ALTER TABLE `typechoisirvendeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typechoisirvendeurs_vendeur_id_type_livraison_unique` (`vendeur_id`,`type_livraison`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user` (`numTelephone`,`email`,`type_compte`);

--
-- Index pour la table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendeurs_email_unique` (`email`),
  ADD UNIQUE KEY `vendeurs_numtelephone_unique` (`numTelephone`),
  ADD UNIQUE KEY `vendeurs_num_compte_banquaire_unique` (`Num_Compte_Banquaire`),
  ADD KEY `vendeurs_user_id_foreign` (`user_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annonce_emploies`
--
ALTER TABLE `annonce_emploies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `choisir_types`
--
ALTER TABLE `choisir_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `color_produits`
--
ALTER TABLE `color_produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demande_emploies`
--
ALTER TABLE `demande_emploies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employeurs`
--
ALTER TABLE `employeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `imageproduits`
--
ALTER TABLE `imageproduits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `paiement_employeurs`
--
ALTER TABLE `paiement_employeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement_vendeurs`
--
ALTER TABLE `paiement_vendeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `signals`
--
ALTER TABLE `signals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `taille_produits`
--
ALTER TABLE `taille_produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `tarif_livraisons`
--
ALTER TABLE `tarif_livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typechoisirvendeurs`
--
ALTER TABLE `typechoisirvendeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vendeurs`
--
ALTER TABLE `vendeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `annonce_emploies`
--
ALTER TABLE `annonce_emploies`
  ADD CONSTRAINT `annonce_emploies_employeur_id_foreign` FOREIGN KEY (`employeur_id`) REFERENCES `employeurs` (`id`),
  ADD CONSTRAINT `annonce_emploies_sous_categorie_id_foreign` FOREIGN KEY (`sous_categorie_id`) REFERENCES `sous_categories` (`id`);

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `choisir_types`
--
ALTER TABLE `choisir_types`
  ADD CONSTRAINT `choisir_types_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `choisir_types_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `color_produits`
--
ALTER TABLE `color_produits`
  ADD CONSTRAINT `color_produits_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `color_produits_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `commandes_couleur_id_foreign` FOREIGN KEY (`couleur_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `commandes_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `commandes_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `demande_emploies`
--
ALTER TABLE `demande_emploies`
  ADD CONSTRAINT `demande_emploies_annoncee_id_foreign` FOREIGN KEY (`annonceE_id`) REFERENCES `annonce_emploies` (`id`),
  ADD CONSTRAINT `demande_emploies_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `demande_emploies_employeur_id_foreign` FOREIGN KEY (`employeur_id`) REFERENCES `employeurs` (`id`);

--
-- Contraintes pour la table `employeurs`
--
ALTER TABLE `employeurs`
  ADD CONSTRAINT `employeurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_annonce_emploi_id_foreign` FOREIGN KEY (`annonce_emploi_id`) REFERENCES `annonce_emploies` (`id`),
  ADD CONSTRAINT `favoris_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `favoris_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD CONSTRAINT `historiques_annoncee_id_foreign` FOREIGN KEY (`annonceE_id`) REFERENCES `annonce_emploies` (`id`),
  ADD CONSTRAINT `historiques_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `historiques_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `imageproduits`
--
ALTER TABLE `imageproduits`
  ADD CONSTRAINT `imageproduits_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `notifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `notifications_employeur_id_foreign` FOREIGN KEY (`employeur_id`) REFERENCES `employeurs` (`id`),
  ADD CONSTRAINT `notifications_paiement_employeur_id_foreign` FOREIGN KEY (`paiement_employeur_id`) REFERENCES `paiement_employeurs` (`id`),
  ADD CONSTRAINT `notifications_paiement_vendeur_id_foreign` FOREIGN KEY (`paiement_vendeur_id`) REFERENCES `paiement_vendeurs` (`id`),
  ADD CONSTRAINT `notifications_signal_id_foreign` FOREIGN KEY (`signal_id`) REFERENCES `signals` (`id`),
  ADD CONSTRAINT `notifications_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `paiement_employeurs`
--
ALTER TABLE `paiement_employeurs`
  ADD CONSTRAINT `paiement_employeurs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `paiement_employeurs_employeur_id_foreign` FOREIGN KEY (`employeur_id`) REFERENCES `employeurs` (`id`);

--
-- Contraintes pour la table `paiement_vendeurs`
--
ALTER TABLE `paiement_vendeurs`
  ADD CONSTRAINT `paiement_vendeurs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `paiement_vendeurs_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_sous_categorie_id_foreign` FOREIGN KEY (`sous_categorie_id`) REFERENCES `sous_categories` (`id`),
  ADD CONSTRAINT `produits_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `signals`
--
ALTER TABLE `signals`
  ADD CONSTRAINT `signals_annonce_emploi_id_foreign` FOREIGN KEY (`annonce_emploi_id`) REFERENCES `annonce_emploies` (`id`),
  ADD CONSTRAINT `signals_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `signals_employeur_id_foreign` FOREIGN KEY (`employeur_id`) REFERENCES `employeurs` (`id`),
  ADD CONSTRAINT `signals_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `signals_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `sous_categories_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `taille_produits`
--
ALTER TABLE `taille_produits`
  ADD CONSTRAINT `taille_produits_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `tarif_livraisons`
--
ALTER TABLE `tarif_livraisons`
  ADD CONSTRAINT `tarif_livraisons_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`),
  ADD CONSTRAINT `tarif_livraisons_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);

--
-- Contraintes pour la table `typechoisirvendeurs`
--
ALTER TABLE `typechoisirvendeurs`
  ADD CONSTRAINT `typechoisirvendeurs_vendeur_id_foreign` FOREIGN KEY (`vendeur_id`) REFERENCES `vendeurs` (`id`);

--
-- Contraintes pour la table `vendeurs`
--
ALTER TABLE `vendeurs`
  ADD CONSTRAINT `vendeurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
