-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 mai 2024 à 14:45
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kelaptop`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
                                        `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                        `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
                                                                    (1, 'Apple', NULL, NULL),
                                                                    (2, 'Samsung', NULL, NULL),
                                                                    (3, 'Huawei', NULL, NULL),
                                                                    (4, 'Xiaomi', NULL, NULL),
                                                                    (5, 'Oppo', NULL, NULL),
                                                                    (6, 'Vivo', NULL, NULL),
                                                                    (7, 'Realme', NULL, NULL),
                                                                    (8, 'OnePlus', NULL, NULL),
                                                                    (9, 'Google', NULL, NULL),
                                                                    (14, 'Asus', NULL, NULL),
                                                                    (15, 'Acer', NULL, NULL),
                                                                    (16, 'HP', NULL, NULL),
                                                                    (17, 'Dell', NULL, NULL),
                                                                    (18, 'Lenovo', NULL, NULL),
                                                                    (19, 'MSI', NULL, NULL),
                                                                    (20, 'Alienware', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
                                       `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `expiration` int NOT NULL,
    PRIMARY KEY (`key`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
    ('kelaptop_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:44:{i:0;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:10:\"order.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:5;i:1;i:6;}}i:1;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"order.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:5;i:1;i:6;}}i:2;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:10:\"stock.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:5;i:1;i:6;}}i:3;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"stock.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:5;i:1;i:6;}}i:4;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:10:\"brand.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:5;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"brand.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:6;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:12:\"brand.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:7;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:12:\"brand.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:8;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:13:\"category.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:9;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:15:\"category.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:10;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:15:\"category.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:11;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:15:\"category.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:12;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:12:\"order.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:13;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:12:\"order.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:14;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:12:\"product.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:15;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:14:\"product.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:16;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:14:\"product.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:17;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:14:\"product.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:18;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:18:\"product_image.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:19;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:20:\"product_image.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:20;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:20:\"product_image.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:21;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:20:\"product_image.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:22;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:19:\"product_review.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:23;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:21:\"product_review.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:24;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:21:\"product_review.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:25;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:21:\"product_review.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:26;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:9:\"user.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:27;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:11:\"user.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:28;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:11:\"user.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:29;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:11:\"user.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:30;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"permission.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:31;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:17:\"permission.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:32;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:17:\"permission.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:33;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:17:\"permission.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:34;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:9:\"role.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:35;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:11:\"role.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:36;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:11:\"role.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:37;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:11:\"role.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:38;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:15:\"promo_code.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:39;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:17:\"promo_code.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:40;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:17:\"promo_code.update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:41;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:17:\"promo_code.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:42;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:12:\"stock.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}i:43;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:12:\"stock.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:6;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:6:\"seller\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1715956058);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
                                             `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `expiration` int NOT NULL,
    PRIMARY KEY (`key`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
                                       `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                       `user_id` bigint UNSIGNED NOT NULL,
                                       `product_id` bigint UNSIGNED NOT NULL,
                                       `quantity` int NOT NULL,
                                       `created_at` timestamp NULL DEFAULT NULL,
                                       `updated_at` timestamp NULL DEFAULT NULL,
                                       PRIMARY KEY (`id`),
    KEY `carts_user_id_foreign` (`user_id`),
    KEY `carts_product_id_foreign` (`product_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `carts`
--
DROP TRIGGER IF EXISTS `before_cart_item_insert`;
DELIMITER $$
CREATE TRIGGER `before_cart_item_insert` BEFORE INSERT ON `carts` FOR EACH ROW BEGIN
    DECLARE stock_quantity INT;

    -- Check the current stock quantity
    SELECT quantity INTO stock_quantity
    FROM stocks
    WHERE product_id = NEW.product_id;

    -- If the stock quantity is less than the new quantity, signal an error
    IF stock_quantity < NEW.quantity THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not enough stock available';
END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `before_cart_item_update`;
DELIMITER $$
CREATE TRIGGER `before_cart_item_update` BEFORE UPDATE ON `carts` FOR EACH ROW BEGIN
    DECLARE stock_quantity INT;

    -- Check the current stock quantity
    SELECT quantity INTO stock_quantity
    FROM stocks
    WHERE product_id = NEW.product_id;

    -- If the stock quantity is less than the new quantity, signal an error
    IF stock_quantity < NEW.quantity THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not enough stock available';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
                                            `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `parent_id` bigint UNSIGNED DEFAULT NULL,
                                            `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `path_banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `categories_parent_id_foreign` (`parent_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `path_banner`, `created_at`, `updated_at`) VALUES
                                                                                                                   (1, NULL, 'Ordinateurs', NULL, 'default.png', NULL, NULL),
                                                                                                                   (2, 1, 'PC Gamer', NULL, 'default.png', NULL, NULL),
                                                                                                                   (3, 1, 'PC de bureau', NULL, 'default.png', NULL, NULL),
                                                                                                                   (4, 1, 'PC Portable', NULL, 'default.png', NULL, NULL),
                                                                                                                   (5, 1, 'PC Portable Gamer', NULL, 'default.png', NULL, NULL),
                                                                                                                   (6, 1, 'MacBook', NULL, 'default.png', NULL, NULL),
                                                                                                                   (7, NULL, 'Téléphonie', NULL, 'default.png', NULL, NULL),
                                                                                                                   (8, 7, 'Smartphones', NULL, 'default.png', NULL, NULL),
                                                                                                                   (9, NULL, 'Tablettes', NULL, 'default.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
                                             `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                             `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
                                      `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `attempts` tinyint UNSIGNED NOT NULL,
    `reserved_at` int UNSIGNED DEFAULT NULL,
    `available_at` int UNSIGNED NOT NULL,
    `created_at` int UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `jobs_queue_index` (`queue`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
                                             `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `total_jobs` int NOT NULL,
    `pending_jobs` int NOT NULL,
    `failed_jobs` int NOT NULL,
    `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `cancelled_at` int DEFAULT NULL,
    `created_at` int NOT NULL,
    `finished_at` int DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
                                            `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch` int NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
                                                       `permission_id` bigint UNSIGNED NOT NULL,
                                                       `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id` bigint UNSIGNED NOT NULL,
    PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
    KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
                                                 `role_id` bigint UNSIGNED NOT NULL,
                                                 `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id` bigint UNSIGNED NOT NULL,
    PRIMARY KEY (`role_id`,`model_id`,`model_type`),
    KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
                                                                        (6, 'App\\Models\\User', 1),
                                                                        (5, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
                                        `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                        `user_id` bigint UNSIGNED NOT NULL,
                                        `promo_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `orders_user_id_foreign` (`user_id`),
    KEY `orders_promo_code_foreign` (`promo_code`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
                                             `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                             `quantity` int NOT NULL,
                                             `order_id` bigint UNSIGNED NOT NULL,
                                             `product_id` bigint UNSIGNED NOT NULL,
                                             `created_at` timestamp NULL DEFAULT NULL,
                                             `updated_at` timestamp NULL DEFAULT NULL,
                                             PRIMARY KEY (`id`),
    KEY `order_items_order_id_foreign` (`order_id`),
    KEY `order_items_product_id_foreign` (`product_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déclencheurs `order_items`
--
DROP TRIGGER IF EXISTS `after_order_item_delete`;
DELIMITER $$
CREATE TRIGGER `after_order_item_delete` AFTER DELETE ON `order_items` FOR EACH ROW BEGIN
    UPDATE stocks
    SET quantity = quantity + OLD.quantity
    WHERE product_id = OLD.product_id;
END
    $$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_order_item_insert`;
DELIMITER $$
CREATE TRIGGER `after_order_item_insert` AFTER INSERT ON `order_items` FOR EACH ROW BEGIN
    UPDATE stocks
    SET quantity = quantity - NEW.quantity
    WHERE product_id = NEW.product_id;
END
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
                                                       `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
                                             `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                             `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
    ) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
                                                                                       (45, 'order.view', 'web', '2024-05-16 12:19:56', '2024-05-16 12:19:56'),
                                                                                       (46, 'order.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (47, 'stock.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (48, 'stock.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (49, 'brand.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (50, 'brand.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (51, 'brand.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (52, 'brand.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (53, 'category.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (54, 'category.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (55, 'category.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (56, 'category.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (57, 'order.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (58, 'order.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (59, 'product.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (60, 'product.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (61, 'product.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (62, 'product.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (63, 'product_image.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (64, 'product_image.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (65, 'product_image.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (66, 'product_image.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (67, 'product_review.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (68, 'product_review.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (69, 'product_review.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (70, 'product_review.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (71, 'user.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (72, 'user.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (73, 'user.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (74, 'user.delete', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (75, 'permission.view', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (76, 'permission.create', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (77, 'permission.update', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57'),
                                                                                       (78, 'permission.delete', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (79, 'role.view', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (80, 'role.create', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (81, 'role.update', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (82, 'role.delete', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (83, 'promo_code.view', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (84, 'promo_code.create', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (85, 'promo_code.update', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (86, 'promo_code.delete', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (87, 'stock.create', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58'),
                                                                                       (88, 'stock.delete', 'web', '2024-05-16 12:19:58', '2024-05-16 12:19:58');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
                                          `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                          `category_id` bigint UNSIGNED NOT NULL,
                                          `brand_id` bigint UNSIGNED DEFAULT NULL,
                                          `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `price` decimal(8,2) NOT NULL,
    `details` json DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `products_category_id_foreign` (`category_id`),
    KEY `products_brand_id_foreign` (`brand_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `description`, `price`, `details`, `created_at`, `updated_at`) VALUES
                                                                                                                                    (21, 8, 1, 'iPhone 14', NULL, 840.00, '{\"camera\": \"Triple 12 MP\", \"battery\": \"3687 mAh\", \"display\": \"Super Retina XDR\", \"processor\": \"A14 Bionic\"}', NULL, NULL),
                                                                                                                                    (22, 8, 2, 'Galaxy S20', NULL, 1464.00, '{\"camera\": \"Quad 108 MP\", \"battery\": \"5000 mAh\", \"display\": \"Dynamic AMOLED 2X\", \"processor\": \"Exynos 2100\"}', NULL, NULL),
                                                                                                                                    (23, 8, 2, 'Galaxy S21', NULL, 943.00, '{\"camera\": \"Quad 108 MP\", \"battery\": \"5000 mAh\", \"display\": \"Dynamic AMOLED 2X\", \"processor\": \"Exynos 2100\"}', NULL, NULL);

--
-- Déclencheurs `products`
--
DROP TRIGGER IF EXISTS `after_product_insert`;
DELIMITER $$
CREATE TRIGGER `after_product_insert` AFTER INSERT ON `products` FOR EACH ROW BEGIN
    INSERT INTO stocks (product_id, quantity)
    VALUES (NEW.id, 0);
END
    $$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_product_insert_default_image`;
DELIMITER $$
CREATE TRIGGER `after_product_insert_default_image` AFTER INSERT ON `products` FOR EACH ROW BEGIN
    INSERT INTO product_images (product_id, path, isPrimary)
    VALUES (NEW.id, 'default.png', 1);
END
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
                                                `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                                `product_id` bigint UNSIGNED NOT NULL,
                                                `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
    `isPrimary` tinyint(1) NOT NULL DEFAULT '0',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `product_images_product_id_foreign` (`product_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `isPrimary`, `created_at`, `updated_at`) VALUES
                                                                                                       (42, 21, 'iphone14.png', 1, NULL, NULL),
                                                                                                       (43, 22, 's20.png', 1, NULL, NULL),
                                                                                                       (44, 23, 's21.png', 1, NULL, NULL),
                                                                                                       (45, 21, 'iphone14_2.png', 0, NULL, NULL),
                                                                                                       (46, 21, 'iphone14_3.png', 0, NULL, NULL),
                                                                                                       (47, 22, 's20_2.png', 0, NULL, NULL),
                                                                                                       (48, 22, 's20_3.png', 0, NULL, NULL),
                                                                                                       (49, 23, 's21_2.png', 0, NULL, NULL),
                                                                                                       (50, 23, 's21_3.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
                                                 `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                                 `product_id` bigint UNSIGNED NOT NULL,
                                                 `user_id` bigint UNSIGNED NOT NULL,
                                                 `rating` tinyint NOT NULL,
                                                 `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
                                                 `created_at` timestamp NULL DEFAULT NULL,
                                                 `updated_at` timestamp NULL DEFAULT NULL,
                                                 PRIMARY KEY (`id`),
    KEY `product_reviews_product_id_foreign` (`product_id`),
    KEY `product_reviews_user_id_foreign` (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promo_codes`
--

DROP TABLE IF EXISTS `promo_codes`;
CREATE TABLE IF NOT EXISTS `promo_codes` (
                                             `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `discount` decimal(8,2) NOT NULL,
    `expires_at` timestamp NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`code`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
                                       `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                       `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
    ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
                                                                                 (4, 'user', 'web', '2024-05-16 12:19:56', '2024-05-16 12:19:56'),
                                                                                 (5, 'seller', 'web', '2024-05-16 12:19:56', '2024-05-16 12:19:56'),
                                                                                 (6, 'admin', 'web', '2024-05-16 12:19:57', '2024-05-16 12:19:57');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
                                                      `permission_id` bigint UNSIGNED NOT NULL,
                                                      `role_id` bigint UNSIGNED NOT NULL,
                                                      PRIMARY KEY (`permission_id`,`role_id`),
    KEY `role_has_permissions_role_id_foreign` (`role_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
                                                                    (45, 5),
                                                                    (46, 5),
                                                                    (47, 5),
                                                                    (48, 5),
                                                                    (45, 6),
                                                                    (46, 6),
                                                                    (47, 6),
                                                                    (48, 6),
                                                                    (49, 6),
                                                                    (50, 6),
                                                                    (51, 6),
                                                                    (52, 6),
                                                                    (53, 6),
                                                                    (54, 6),
                                                                    (55, 6),
                                                                    (56, 6),
                                                                    (57, 6),
                                                                    (58, 6),
                                                                    (59, 6),
                                                                    (60, 6),
                                                                    (61, 6),
                                                                    (62, 6),
                                                                    (63, 6),
                                                                    (64, 6),
                                                                    (65, 6),
                                                                    (66, 6),
                                                                    (67, 6),
                                                                    (68, 6),
                                                                    (69, 6),
                                                                    (70, 6),
                                                                    (71, 6),
                                                                    (72, 6),
                                                                    (73, 6),
                                                                    (74, 6),
                                                                    (75, 6),
                                                                    (76, 6),
                                                                    (77, 6),
                                                                    (78, 6),
                                                                    (79, 6),
                                                                    (80, 6),
                                                                    (81, 6),
                                                                    (82, 6),
                                                                    (83, 6),
                                                                    (84, 6),
                                                                    (85, 6),
                                                                    (86, 6),
                                                                    (87, 6),
                                                                    (88, 6);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
                                          `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id` bigint UNSIGNED DEFAULT NULL,
    `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `last_activity` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `sessions_user_id_index` (`user_id`),
    KEY `sessions_last_activity_index` (`last_activity`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
                                        `product_id` bigint UNSIGNED NOT NULL,
                                        `quantity` int NOT NULL,
                                        `created_at` timestamp NULL DEFAULT NULL,
                                        `updated_at` timestamp NULL DEFAULT NULL,
                                        PRIMARY KEY (`product_id`),
    KEY `stocks_product_id_foreign` (`product_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`product_id`, `quantity`, `created_at`, `updated_at`) VALUES
                                                                                (21, 4, NULL, NULL),
                                                                                (22, 0, NULL, NULL),
                                                                                (23, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
                                       `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
                                       `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `birthday` date DEFAULT NULL,
    `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `zip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `birthday`, `address`, `city`, `zip`, `country`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                                                                                                                          (1, 'Admin', 'Admin', '0123456789', '2000-01-01', '1 Admin Street', 'Admin City', '12345', 'Admin Country', 'admin@kelaptop.fr', NULL, '$2y$12$60nd88Ep4PE8japJjd2Uzei6PaJ9rjopoEiicnW7/dN1hwesgiSQG', NULL, '2024-05-16 12:20:08', '2024-05-16 12:20:08'),
                                                                                                                                                                                                          (2, 'Seller', 'Seller', '0123456789', '2000-01-01', '1 Seller Street', 'Seller City', '12345', 'Seller Country', 'seller@kelaptop.fr', NULL, '$2y$12$CaixgQcWsvlF/2baQwZ8wO9NcRZSRCYiK4SFfQhkRiXYeWP0b567K', NULL, '2024-05-16 12:20:08', '2024-05-16 12:20:08');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
    ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
    ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD CONSTRAINT `fk_model_has_permissions_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD CONSTRAINT `fk_model_has_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `orders_promo_code_foreign` FOREIGN KEY (`promo_code`) REFERENCES `promo_codes` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
    ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
    ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product_images`
--
ALTER TABLE `product_images`
    ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD CONSTRAINT `fk_role_has_permissions_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_role_has_permissions_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
    ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
    ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
