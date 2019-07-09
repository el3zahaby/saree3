-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour m5lil_db1
CREATE DATABASE IF NOT EXISTS `m5lil_db1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;


-- Export de la structure de la table m5lil_db1. addproductprices
CREATE TABLE IF NOT EXISTS `addproductprices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.addproductprices : 0 rows
/*!40000 ALTER TABLE `addproductprices` DISABLE KEYS */;
/*!40000 ALTER TABLE `addproductprices` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.addresses : 0 rows
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_type` enum('Country','State','City') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.areas : 0 rows
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. attachments
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` int(11) NOT NULL,
  `attachable_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.attachments : 0 rows
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci,
  `phone` int(11) DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.branches : 0 rows
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.categories : 0 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. categories_sliders
CREATE TABLE IF NOT EXISTS `categories_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_sliders_catid_foreign` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.categories_sliders : 0 rows
/*!40000 ALTER TABLE `categories_sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_sliders` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.comments : 1 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `commentable_type`, `commentable_id`, `body`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Forums', '1', 'nice', '1', '0', '2019-02-20 12:36:01', '2019-02-20 12:36:02');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. complains
CREATE TABLE IF NOT EXISTS `complains` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_id` int(11) NOT NULL,
  `about_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complain_type_id` int(11) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','solved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.complains : 0 rows
/*!40000 ALTER TABLE `complains` DISABLE KEYS */;
/*!40000 ALTER TABLE `complains` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. complain_comments
CREATE TABLE IF NOT EXISTS `complain_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.complain_comments : 0 rows
/*!40000 ALTER TABLE `complain_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `complain_comments` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. complain_types
CREATE TABLE IF NOT EXISTS `complain_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.complain_types : 0 rows
/*!40000 ALTER TABLE `complain_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `complain_types` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` enum('left','right') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.currencies : 0 rows
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. deposits
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  `status` enum('pending','Paid','Refund') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `total_discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.deposits : 0 rows
/*!40000 ALTER TABLE `deposits` DISABLE KEYS */;
/*!40000 ALTER TABLE `deposits` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.experiences : 0 rows
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. homecomponents
CREATE TABLE IF NOT EXISTS `homecomponents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.homecomponents : 2 rows
/*!40000 ALTER TABLE `homecomponents` DISABLE KEYS */;
INSERT INTO `homecomponents` (`id`, `icon`, `title`, `body`, `created_at`, `updated_at`) VALUES
	(1, 'icon-star', 'hhhhhhh', 'hhhhhhhh', '2019-02-19 21:03:25', '2019-02-19 21:04:45'),
	(2, 'icon-like', 'tetttt', 'etedftzeft', '2019-02-19 21:05:09', '2019-02-19 21:05:09');
/*!40000 ALTER TABLE `homecomponents` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. home_sliders
CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.home_sliders : 0 rows
/*!40000 ALTER TABLE `home_sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_sliders` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. industries
CREATE TABLE IF NOT EXISTS `industries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.industries : 0 rows
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.menus : 8 rows
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `order`, `parent_id`, `created_at`, `updated_at`) VALUES
	(4, 'Staff', NULL, 'ion-ios-person-outline', 2, NULL, '2019-02-20 03:18:32', '2019-02-20 21:34:30'),
	(5, 'Staff', 'backend.staff.index', NULL, NULL, 4, '2019-02-20 03:19:34', '2019-02-20 03:19:34'),
	(6, 'Roles', 'backend.roles.index', NULL, NULL, 4, '2019-02-20 03:20:33', '2019-02-20 03:20:33'),
	(7, 'Pages', 'backend.pages.index', 'ion-ios-book-outline', 1, NULL, '2019-02-20 03:21:38', '2019-02-20 21:34:11'),
	(8, 'Attachments', 'backend.attachments.index', 'ion-ios-folder-outline', 3, NULL, '2019-02-20 03:45:28', '2019-02-20 03:45:28'),
	(9, 'Complaints', NULL, 'ion-ios-photos-outline', 4, NULL, '2019-02-20 03:47:49', '2019-02-20 03:47:49'),
	(10, 'Complaints', 'backend.complaints.index', NULL, NULL, 9, '2019-02-20 03:49:09', '2019-02-20 03:49:09'),
	(11, 'Complain Types', 'backend.complaint_types.index', NULL, NULL, 9, '2019-02-20 03:50:09', '2019-02-20 03:50:09');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomid` int(10) unsigned NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_roomid_foreign` (`roomid`),
  KEY `messages_parent_foreign` (`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.messages : 0 rows
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.migrations : 56 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_09_24_170126_create_tags_table', 1),
	(4, '2018_09_24_171300_create_categories_table', 1),
	(5, '2018_09_24_171330_create_sub_categories_table', 1),
	(6, '2018_09_24_171331_create_sub_sub_categories_table', 1),
	(7, '2018_09_24_171332_create_sub_sub_sub_categories_table', 1),
	(8, '2018_09_24_171455_create_service_tags_table', 1),
	(9, '2018_09_24_171510_create_service_attachments_table', 1),
	(10, '2018_09_24_171551_create_smsapiconfigs_table', 1),
	(11, '2018_09_24_180629_create_services_extras_table', 1),
	(12, '2018_09_30_125614_create_experiences_table', 1),
	(13, '2018_09_30_125805_create_user_experiences_table', 1),
	(14, '2018_10_01_170548_create_categories_sliders_table', 1),
	(15, '2018_10_01_173000_create_home_sliders_table', 1),
	(16, '2018_10_09_025338_create_rooms_table', 1),
	(17, '2018_10_09_212229_create_messages_table', 1),
	(18, '2018_12_18_042407_create_permission_tables', 1),
	(19, '2018_12_19_081730_staff', 1),
	(20, '2018_12_21_025322_create_settings_table', 1),
	(21, '2018_12_22_035218_create_pages_table', 1),
	(22, '2018_12_28_115042_create_sections_table', 1),
	(23, '2018_12_28_115043_create_addresses_table', 1),
	(24, '2018_12_28_115043_create_attachments_table', 1),
	(25, '2018_12_28_115043_create_comments_table', 1),
	(26, '2018_12_28_115043_create_complains_table', 1),
	(27, '2018_12_28_115043_create_currencies_table', 1),
	(28, '2018_12_28_115043_create_orders_table', 1),
	(29, '2018_12_28_115043_create_photos_table', 1),
	(30, '2018_12_28_115043_create_plans_table', 1),
	(31, '2018_12_28_115043_create_products_table', 1),
	(32, '2018_12_28_115043_create_reviews_table', 1),
	(33, '2018_12_28_115043_create_services_table', 1),
	(34, '2018_12_28_115043_create_subscription_table', 1),
	(35, '2018_12_28_115043_create_threads_table', 1),
	(36, '2018_12_28_115847_create_industries_table', 1),
	(37, '2018_12_28_115906_create_complain_types_table', 1),
	(38, '2018_12_28_121055_create_branches_table', 1),
	(39, '2018_12_28_121801_create_complain_comments_table', 1),
	(40, '2018_12_28_160631_create_deposits_table', 1),
	(41, '2018_12_28_182639_create_areas_table', 1),
	(42, '2018_12_29_102442_create_payment_methods_table', 1),
	(43, '2018_12_31_153614_create_newsletters_table', 1),
	(44, '2018_12_31_153642_create_withdraws_table', 1),
	(45, '2019_01_31_113917_create_position_sliders_table', 1),
	(46, '2019_01_31_115357_create_ratings_table', 1),
	(47, '2019_02_06_234708_create_addproductprices_table', 1),
	(48, '2019_02_07_031830_create_notifications_table', 1),
	(49, '2019_02_09_182642_create_productfavs_table', 1),
	(50, '2019_02_10_004525_create_sliders_table', 1),
	(51, '2019_02_13_092202_create_homecomponents_table', 1),
	(52, '2019_02_20_023639_create_menus_table', 2),
	(53, '2020_02_20_023639_create_menus_table', 3),
	(54, '2021_02_20_023639_create_menus_table', 4),
	(55, '2019_02_20_074914_create_servicewebsites_table', 5),
	(56, '2019_02_20_231521_create_thread_sections_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.model_has_permissions : 0 rows
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.model_has_roles : 1 rows
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(3, 'App\\Models\\Staff', 1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. newsletters
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletters_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.newsletters : 0 rows
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.notifications : 6 rows
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('70bbd906-4c1b-4393-99ae-07e98112a1ce', 'App\\Notifications\\AddProductStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/products"}', '2019-02-18 00:25:59', '2019-02-16 12:13:12', '2019-02-16 12:13:12'),
	('4c50c0bb-b45f-4777-8070-baebf71095fc', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/services"}', NULL, '2019-02-18 15:41:32', '2019-02-18 15:41:32'),
	('8933a246-d099-4b17-9980-13b7ac79b553', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/services"}', '2019-02-18 17:01:53', '2019-02-18 16:56:34', '2019-02-18 16:56:34'),
	('76042351-885a-417c-956f-d35018349f4e', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/services"}', NULL, '2019-02-19 22:05:15', '2019-02-19 22:05:15'),
	('d33c1ab8-9e93-4800-af9f-0abb682d8bbd', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 \\u0646\\u0628\\u0631\\u0633 \\u0645\\u0631\\u0628\\u0627\\u0646  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/services"}', NULL, '2019-02-19 22:32:06', '2019-02-19 22:32:06'),
	('e60dd9b3-d1a5-4947-abab-15ca016f8c9b', 'App\\Notifications\\AddProductStaffNoth', 'App\\Models\\Staff', 1, '{"msg":"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 ","link":"admin\\/products"}', NULL, '2019-02-20 20:04:23', '2019-02-20 20:04:23');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','accepted','shipped') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_shipping` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.orders : 0 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.pages : 1 rows
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `status`, `cover`, `created_at`, `updated_at`, `position`) VALUES
	(8, '{"ar":"\\u0645\\u0646 \\u0646\\u062d\\u0646","en":"whowe"}', 'page/whewe', '{"ar":"<p>this is body<\\/p>","en":"<p>this is body<br><\\/p>"}', 'active', 'page_attachment1550607437101.jpg', '2019-02-19 20:17:17', '2019-02-19 20:17:17', 0);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.password_resets : 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. payment_methods
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.payment_methods : 0 rows
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=596 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.permissions : 105 rows
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(491, 'view-staff', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(492, 'add-staff', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(493, 'edit-staff', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(494, 'delete-staff', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(495, 'ajax-staff', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(496, 'view-pages', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(497, 'add-pages', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(498, 'edit-pages', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(499, 'delete-pages', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(500, 'ajax-pages', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(501, 'view-users', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(502, 'add-users', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(503, 'edit-users', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(504, 'delete-users', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(505, 'ajax-users', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(506, 'view-roles', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(507, 'add-roles', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(508, 'edit-roles', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(509, 'delete-roles', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(510, 'ajax-roles', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(511, 'view-advertisements', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(512, 'add-advertisements', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(513, 'edit-advertisements', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(514, 'delete-advertisements', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(515, 'ajax-advertisements', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(516, 'view-attachments', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(517, 'add-attachments', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(518, 'edit-attachments', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(519, 'delete-attachments', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(520, 'ajax-attachments', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(521, 'view-services', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(522, 'add-services', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(523, 'edit-services', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(524, 'delete-services', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(525, 'ajax-services', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(526, 'view-threads', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(527, 'add-threads', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(528, 'edit-threads', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(529, 'delete-threads', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(530, 'ajax-threads', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(531, 'view-withdraws', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(532, 'add-withdraws', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(533, 'edit-withdraws', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(534, 'delete-withdraws', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(535, 'ajax-withdraws', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(536, 'view-settings', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(537, 'add-settings', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(538, 'edit-settings', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(539, 'delete-settings', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(540, 'ajax-settings', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(541, 'view-products', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(542, 'add-products', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(543, 'edit-products', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(544, 'delete-products', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(545, 'ajax-products', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(546, 'view-sections', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(547, 'add-sections', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(548, 'edit-sections', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(549, 'delete-sections', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(550, 'ajax-sections', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(551, 'view-orders', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(552, 'add-orders', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(553, 'edit-orders', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(554, 'delete-orders', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(555, 'ajax-orders', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(556, 'view-complaints', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(557, 'add-complaints', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(558, 'edit-complaints', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(559, 'delete-complaints', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(560, 'ajax-complaints', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(561, 'view-deposits', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(562, 'add-deposits', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(563, 'edit-deposits', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(564, 'delete-deposits', 'staff', '2019-02-19 21:16:08', '2019-02-19 21:16:08'),
	(565, 'ajax-deposits', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(566, 'view-newsletters', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(567, 'add-newsletters', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(568, 'edit-newsletters', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(569, 'delete-newsletters', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(570, 'ajax-newsletters', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(571, 'view-messages', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(572, 'add-messages', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(573, 'edit-messages', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(574, 'delete-messages', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(575, 'ajax-messages', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(576, 'view-comments', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(577, 'add-comments', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(578, 'edit-comments', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(579, 'delete-comments', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(580, 'ajax-comments', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(581, 'view-sliders', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(582, 'add-sliders', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(583, 'edit-sliders', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(584, 'delete-sliders', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(585, 'ajax-sliders', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(586, 'view-rating', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(587, 'add-rating', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(588, 'edit-rating', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(589, 'delete-rating', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(590, 'ajax-rating', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(591, 'view-websiteservices', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(592, 'add-websiteservices', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(593, 'edit-websiteservices', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(594, 'delete-websiteservices', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09'),
	(595, 'ajax-websiteservices', 'staff', '2019-02-19 21:16:09', '2019-02-19 21:16:09');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `model_type` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.photos : 0 rows
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. plans
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.plans : 0 rows
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. position_sliders
CREATE TABLE IF NOT EXISTS `position_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.position_sliders : 9 rows
/*!40000 ALTER TABLE `position_sliders` DISABLE KEYS */;
INSERT INTO `position_sliders` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'سليدر المنتجات (الاعلى)', 'products', '2019-02-18 14:51:04', '2019-02-18 14:51:04'),
	(2, 'سليدر المنتجات (الأسفل)', 'products', '2019-02-19 19:00:13', '2019-02-19 19:00:13'),
	(3, 'سليدر الخدمات  (الأعلى)', 'services', '2019-02-19 19:00:32', '2019-02-19 19:00:32'),
	(4, 'سليدر الخدمات  (الاسفل)', 'services', '2019-02-19 19:01:00', '2019-02-19 19:01:00'),
	(5, 'سليدر المنتجات الرقميه (الأعلى)', 'shop', '2019-02-19 19:02:07', '2019-02-19 19:02:07'),
	(6, 'سليدر المنتجات الرقميه (الاسفل)', 'shop', '2019-02-19 19:02:43', '2019-02-19 19:02:43'),
	(7, 'سليدر الرئيسيه (الأعلى)', 'home', '2019-02-19 19:03:55', '2019-02-19 19:03:55'),
	(8, 'سليدر الرئيسيه (الاسفل)', 'home', '2019-02-19 19:04:32', '2019-02-19 19:04:32'),
	(9, 'سليدر الترحيب', 'welcome', '2019-02-19 19:05:21', '2019-02-19 19:05:21');
/*!40000 ALTER TABLE `position_sliders` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. productfavs
CREATE TABLE IF NOT EXISTS `productfavs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productfavs_product_id_foreign` (`product_id`),
  KEY `productfavs_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.productfavs : 3 rows
/*!40000 ALTER TABLE `productfavs` DISABLE KEYS */;
INSERT INTO `productfavs` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2019-02-17 20:34:59', '2019-02-17 20:34:59'),
	(2, 1, 1, '2019-02-17 20:35:50', '2019-02-17 20:35:50'),
	(3, 2, 1, '2019-02-17 20:37:59', '2019-02-17 20:37:59');
/*!40000 ALTER TABLE `productfavs` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_and_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `sub_section` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `Quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` longtext COLLATE utf8mb4_unicode_ci,
  `trans` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.products : 2 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name_and_type`, `body`, `section_id`, `sub_section`, `category`, `Quantity`, `price`, `user_id`, `branch_id`, `slug`, `sku`, `branch_name`, `attachments`, `trans`, `in_stock`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'test_name', 'body desc', 1, 2, 3, '12', 300, 1, NULL, 'test_name', '100null', 'bmv_sad', '[{"img":"product_attachment15503191921206.jpg"},{"img":"product_attachment1550319192454.jpg"},{"img":"product_attachment1550319192781.jpg"},{"img":"product_attachment15503191921207.jpg"}]', '1', 'Yes', 'active', '2019-02-16 12:13:12', '2019-02-17 20:19:40'),
	(3, 'new', 'test', 1, 2, 3, '7', 15, 1, NULL, 'new', '8م', 'bmv_sad', '[{"img":"product_attachment15506930621311.jpg"},{"img":"product_attachment1550693062175.jpg"},{"img":"product_attachment1550693062140.jpg"}]', '1', 'Yes', 'active', '2019-02-20 20:04:22', '2019-02-20 20:05:30');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. ratings
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.ratings : 0 rows
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.reviews : 0 rows
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.roles : 0 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.role_has_permissions : 1 rows
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(11, 3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(10) unsigned NOT NULL,
  `child` int(10) unsigned NOT NULL,
  `service` int(10) unsigned NOT NULL,
  `parentblock` int(11) NOT NULL,
  `childblock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_parent_foreign` (`parent`),
  KEY `rooms_child_foreign` (`child`),
  KEY `rooms_service_foreign` (`service`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.rooms : 0 rows
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(4) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_price` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.sections : 3 rows
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `parent_id`, `title`, `slug`, `description`, `fixed_price`, `order`, `created_at`, `updated_at`) VALUES
	(1, NULL, '{"ar":"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","en":"cars"}', 'cars', '{"ar":"test","en":"test"}', 0, 1, NULL, NULL),
	(2, 1, '{"ar":"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\\u0629","en":"usa"}', 'cars', '{"ar":"test","en":"test"}', 0, 1, NULL, NULL),
	(3, 2, '{"ar":"BMV","en":"BMV"}', 'cars', '{"ar":"test","en":"test"}', 0, 1, NULL, NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `sub_section` int(11) NOT NULL,
  `sub_sub_section` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `area_id` int(10) unsigned DEFAULT NULL,
  `to` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `experiences` longtext COLLATE utf8mb4_unicode_ci,
  `skills` longtext COLLATE utf8mb4_unicode_ci,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `per` enum('Hour','Service') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.services : 2 rows
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `user_id`, `section_id`, `sub_section`, `sub_sub_section`, `category`, `area_id`, `to`, `name`, `slug`, `body`, `attachment`, `price`, `experiences`, `skills`, `lng`, `lat`, `per`, `status`, `created_at`, `updated_at`) VALUES
	(4, 1, 1, 2, 3, NULL, NULL, 4, 'create complate website', 'create-complate-website', 'create website laravel', '[{"img":"service_attachment1550613913377.jpg"}]', 3000, 'laravel', '1,2,3', NULL, NULL, 'Hour', 'inactive', '2019-02-19 22:05:13', '2019-02-19 22:05:13'),
	(5, 3, 1, 2, 3, NULL, NULL, 4, 'convert psd to html', 'convert-psd-to-html', 'convert file psd to html websit', '[{"img":"service_attachment1550615526252.jpg"},{"img":"service_attachment15506155261167.jpg"},{"img":"service_attachment15506155261061.jpg"},{"img":"service_attachment1550615526740.jpg"}]', 1222, 'sdfksdnjkfbdsjb', '1', NULL, NULL, 'Hour', 'inactive', '2019-02-19 22:32:06', '2019-02-19 22:32:06');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. services_extras
CREATE TABLE IF NOT EXISTS `services_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_extras_serviceid_foreign` (`serviceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.services_extras : 0 rows
/*!40000 ALTER TABLE `services_extras` DISABLE KEYS */;
/*!40000 ALTER TABLE `services_extras` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. servicewebsites
CREATE TABLE IF NOT EXISTS `servicewebsites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.servicewebsites : 2 rows
/*!40000 ALTER TABLE `servicewebsites` DISABLE KEYS */;
INSERT INTO `servicewebsites` (`id`, `title`, `icon`, `body`, `created_at`, `updated_at`) VALUES
	(1, 'hhhhhhhh', 'icon-star', 'test', '2019-02-20 08:08:16', '2019-02-20 21:24:15'),
	(2, 'tttttttttttt', 'icon-like', 'ttttttttttttttttttttttttttttttttttt', '2019-02-20 21:24:55', '2019-02-20 21:24:55');
/*!40000 ALTER TABLE `servicewebsites` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. service_attachments
CREATE TABLE IF NOT EXISTS `service_attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` int(10) unsigned NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_attachments_serviceid_foreign` (`serviceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.service_attachments : 0 rows
/*!40000 ALTER TABLE `service_attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_attachments` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. service_tags
CREATE TABLE IF NOT EXISTS `service_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` int(10) unsigned NOT NULL,
  `tagid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_tags_serviceid_foreign` (`serviceid`),
  KEY `service_tags_tagid_foreign` (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.service_tags : 0 rows
/*!40000 ALTER TABLE `service_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_tags` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `set_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `set_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `sec` enum('General','Website') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.settings : 18 rows
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `set_slug`, `set_name`, `value`, `type`, `sec`) VALUES
	(52, 'صفحة الفيس بوك', 'facebook', 'Ka7tAz4XJP', 1, 'Website'),
	(51, 'صفحة تويتر', 'twitter', 'DtDDchGRCF', 1, 'Website'),
	(50, 'خط الطول', 'lng', '#', 1, 'Website'),
	(49, 'خط العرض', 'lat', '#', 1, 'Website'),
	(48, 'الرقم البريدي', 'postal', '#', 1, 'Website'),
	(47, 'العنوان', 'address', '#', 1, 'Website'),
	(46, 'ارقام هواتف', 'phone', '#', 1, 'Website'),
	(45, 'رابط الأدمن', 'admin_url', 'admin/', 1, 'General'),
	(44, 'البريد الإلكتروني', 'email', '#', 1, 'Website'),
	(42, 'شعار الموقع', 'logo', '1550619295.png', 0, 'General'),
	(43, 'ايقونة التفضيل', 'fav_icon', '#', 0, 'General'),
	(41, 'حالة الموقع', 'statue', 'online', 0, 'Website'),
	(40, 'وصف الميتا تاج', 'site_meta_description', 'الوصف الذى سوف يظهر فى محركات البحث إسفل إسم الموقع', 2, 'Website'),
	(39, 'كود إحصائيات جوجل', 'analytics', 'code', 2, 'Website'),
	(38, 'نص الحقوق', 'copyright', 'جميع الحقوق محفوظة - الرياض 2016', 1, 'Website'),
	(37, 'وصف الموقع', 'description', 'وصف للموقع', 2, 'General'),
	(35, 'site title ar', 'site_title_ar', 'سريع', 1, 'General'),
	(36, 'site title en', 'site_title_en', 'Sareeea', 1, 'General');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `slider_position` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_slider_position_foreign` (`slider_position`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.sliders : 5 rows
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `title`, `body`, `images`, `slider_position`, `created_at`, `updated_at`) VALUES
	(1, 'title', 'body test', 'slider_image15506151271118.jpg', 1, '2019-02-18 15:16:17', '2019-02-18 15:16:17'),
	(2, 'sliderwelcome', 'thi is slider welcom', 'slider_image15506046981154.jpg', 9, '2019-02-19 19:06:25', '2019-02-19 19:31:38'),
	(8, 'title', 'tetstt', 'slider_image15506151271118.jpg', 8, '2019-02-19 22:25:15', '2019-02-19 22:25:15'),
	(7, 'slll', 'tttttt', 'slider_image15506047891476.jpg', 9, '2019-02-19 19:33:09', '2019-02-19 19:33:09'),
	(6, 'عنوان', 'tetetet', 'slider_image1550614752621.jpg', 7, '2019-02-19 19:17:45', '2019-02-19 22:19:12');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. smsapiconfigs
CREATE TABLE IF NOT EXISTS `smsapiconfigs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.smsapiconfigs : 0 rows
/*!40000 ALTER TABLE `smsapiconfigs` DISABLE KEYS */;
/*!40000 ALTER TABLE `smsapiconfigs` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_username_unique` (`username`),
  UNIQUE KEY `staff_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.staff : 1 rows
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'devloper', 'devloper', 'devloper@devloper.com', NULL, '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS', '2019-02-20 19:39:11', '::1', NULL, NULL, '2019-02-20 19:39:11');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `renew_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.subscriptions : 0 rows
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_catid_foreign` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.sub_categories : 0 rows
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. sub_sub_categories
CREATE TABLE IF NOT EXISTS `sub_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subcatid` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_sub_categories_subcatid_foreign` (`subcatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.sub_sub_categories : 0 rows
/*!40000 ALTER TABLE `sub_sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_sub_categories` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. sub_sub_sub_categories
CREATE TABLE IF NOT EXISTS `sub_sub_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subsubcatid` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_sub_sub_categories_subsubcatid_foreign` (`subsubcatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.sub_sub_sub_categories : 0 rows
/*!40000 ALTER TABLE `sub_sub_sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_sub_sub_categories` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.tags : 9 rows
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'HTML', NULL, NULL),
	(2, 'CSS', NULL, NULL),
	(3, 'JavaScript', NULL, NULL),
	(4, 'PHP', NULL, NULL),
	(5, 'Mysql', NULL, NULL),
	(6, 'Laravel', NULL, NULL),
	(7, 'Symfony', NULL, NULL),
	(8, 'Nodejs', NULL, NULL),
	(9, 'Angulare', NULL, NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. threads
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.threads : 2 rows
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` (`id`, `section_id`, `user_id`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
	(3, 1, 1, 'how to ?', NULL, '<p>tetsttdt</p>', '2019-02-21 00:13:03', '2019-02-21 00:13:03');
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. thread_sections
CREATE TABLE IF NOT EXISTS `thread_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.thread_sections : 0 rows
/*!40000 ALTER TABLE `thread_sections` DISABLE KEYS */;
INSERT INTO `thread_sections` (`id`, `title`, `body`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(1, '{"ar":"\\u0633\\u0624\\u0627\\u0644  \\u0648 \\u062c\\u0648\\u0627\\u0628","en":"games"}', '{"ar":"bfhdh","en":"fbjkb"}', NULL, NULL, 'active', '2019-02-20 23:56:21', '2019-02-21 00:02:46');
/*!40000 ALTER TABLE `thread_sections` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dirthyear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dirthmonth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dirthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `experienceyears` int(11) DEFAULT NULL,
  `certificates` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover.png',
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verfiy_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verfied` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell` tinyint(4) NOT NULL DEFAULT '0',
  `upload_products` tinyint(4) NOT NULL DEFAULT '0',
  `paypal_mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `db` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.users : 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `slug`, `dirthyear`, `dirthmonth`, `dirthday`, `gender`, `country`, `city`, `email_verified_at`, `experienceyears`, `certificates`, `skills`, `description`, `image`, `cover`, `mobile`, `job`, `last_ip`, `account_type`, `status`, `verfiy_code`, `verfied`, `sell`, `upload_products`, `paypal_mail`, `facebook`, `twitter`, `db`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'ayoub tamous', 'null', 'ayoub@gmail.com', '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS', 'ayoub', NULL, NULL, NULL, NULL, 'المغرب', 'KASBA TADLA', NULL, NULL, NULL, NULL, 'he , my name is ayoub full stack web devloper', 'user.png', 'cover.png', NULL, 'full stack', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 'kZ2e8EUN4RrAg9f5Bmwvpj7qG4drmQRORbxHgJaR5IsAipavsv5gKWvSBeuX', NULL, NULL),
	(3, 'نبرس مربان', 'nipo', 'nipo@gmail.com', '$2y$10$eqf2QCid3xMD3VQ.lPa6oup0NEsYAovlYOhLJk0vz0s2IYGicDbKG', 'nipo', '1994', '8', '11', 0, '40', 'KASBA TADLA', NULL, NULL, NULL, NULL, NULL, 'user.png', 'cover.png', '+212645554343453', NULL, '::1', '0', '1', '', '1', 0, 0, NULL, NULL, NULL, NULL, 's6zco74xLlPyaTojnWmD2Ki9OwdzRX3rCgf3v3Nh9lFZiKk0sPbnHy3HF7zc', '2019-02-19 22:29:37', NULL),
	(4, 'devloper', 'devoper', 'devloper@devloper.com', '$2y$10$.TCk1aDdjA5ZrQHDVG736OaRseT3lGKByCjNfS4YXm9Qie3K1zXq6', NULL, '1913', '7', '10', 0, '1', 'devloper', NULL, NULL, NULL, NULL, NULL, 'user.png', 'cover.png', '+21277767656565655', NULL, '::1', '0', '1', '7fc6e', '0', 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-02-19 22:37:33', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. user_experiences
CREATE TABLE IF NOT EXISTS `user_experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `experienceid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_experiences_userid_foreign` (`userid`),
  KEY `user_experiences_experienceid_foreign` (`experienceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.user_experiences : 0 rows
/*!40000 ALTER TABLE `user_experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_experiences` ENABLE KEYS */;

-- Export de la structure de la table m5lil_db1. withdraws
CREATE TABLE IF NOT EXISTS `withdraws` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Sent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table m5lil_db1.withdraws : 0 rows
/*!40000 ALTER TABLE `withdraws` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdraws` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
