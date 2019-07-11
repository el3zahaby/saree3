-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 12:12 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproductprices`
--

CREATE TABLE `addproductprices` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_type` enum('Country','State','City') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` int(11) NOT NULL,
  `attachable_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_sliders`
--

CREATE TABLE `categories_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commentable_type`, `commentable_id`, `body`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Forums', '1', 'nice', '1', '0', '2019-02-20 09:36:01', '2019-02-20 09:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
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

-- --------------------------------------------------------

--
-- Table structure for table `complain_comments`
--

CREATE TABLE `complain_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complain_types`
--

CREATE TABLE `complain_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` enum('left','right') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','Paid','Refund') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `total_discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homecomponents`
--

CREATE TABLE `homecomponents` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homecomponents`
--

INSERT INTO `homecomponents` (`id`, `icon`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'icon-star', 'hhhhhhh', 'hhhhhhhh', '2019-02-19 18:03:25', '2019-02-19 18:04:45'),
(2, 'icon-like', 'tetttt', 'etedftzeft', '2019-02-19 18:05:09', '2019-02-19 18:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `icon`, `order`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'Staff', NULL, 'ion-ios-person-outline', 2, NULL, '2019-02-20 00:18:32', '2019-02-20 18:34:30'),
(5, 'Staff', 'backend.staff.index', NULL, NULL, 4, '2019-02-20 00:19:34', '2019-02-20 00:19:34'),
(6, 'Roles', 'backend.roles.index', NULL, NULL, 4, '2019-02-20 00:20:33', '2019-02-20 00:20:33'),
(7, 'Pages', 'backend.pages.index', 'ion-ios-book-outline', 1, NULL, '2019-02-20 00:21:38', '2019-02-20 18:34:11'),
(8, 'Attachments', 'backend.attachments.index', 'ion-ios-folder-outline', 3, NULL, '2019-02-20 00:45:28', '2019-02-20 00:45:28'),
(9, 'Complaints', NULL, 'ion-ios-photos-outline', 4, NULL, '2019-02-20 00:47:49', '2019-02-20 00:47:49'),
(10, 'Complaints', 'backend.complaints.index', NULL, NULL, 9, '2019-02-20 00:49:09', '2019-02-20 00:49:09'),
(11, 'Complain Types', 'backend.complaint_types.index', NULL, NULL, 9, '2019-02-20 00:50:09', '2019-02-20 00:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomid` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `file`, `roomid`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'ن', NULL, 1, 7, '2019-07-06 06:18:27', NULL),
(2, 'ي', NULL, 1, 7, '2019-07-06 06:52:19', NULL),
(3, 'ي', NULL, 1, 7, '2019-07-06 06:52:20', NULL),
(4, 's', NULL, 1, 7, '2019-07-06 06:52:21', NULL),
(5, 'ss', NULL, 1, 7, '2019-07-06 06:52:23', NULL),
(6, 's', NULL, 1, 7, '2019-07-06 06:52:32', NULL),
(7, 'e', NULL, 2, 7, '2019-07-06 06:57:01', NULL),
(8, 'd', NULL, 2, 7, '2019-07-06 06:57:10', NULL),
(9, 'f', NULL, 2, 7, '2019-07-06 06:57:12', NULL),
(10, 'g', NULL, 2, 7, '2019-07-06 06:57:12', NULL),
(11, 'g', NULL, 2, 8, '2019-07-06 06:57:14', NULL),
(12, 'https://maps.google.com/maps?q=22.782646099999997,39.034282&hl=es;z=14&amp;output=embed', 'map', 2, 7, '2019-07-06 06:57:25', NULL),
(13, 'http://localhost:8000/uploads/voices/voices_attachment_15624070581666.747Z.wav', 'audio', 2, 7, '2019-07-06 06:57:38', NULL),
(14, 'http://localhost:8000/uploads/voices/voices_attachment_15624070681955.455Z.wav', 'audio', 2, 7, '2019-07-06 06:57:48', NULL),
(15, 'hsl(200,100%,50%)', 'color', 2, 7, '2019-07-06 06:58:03', NULL),
(16, 'rgb(0,170,255)', 'color', 2, 7, '2019-07-06 06:58:09', NULL),
(17, 'rgb(0,170,255)', NULL, 2, 7, '2019-07-06 06:58:16', NULL),
(18, '#D71D1D', 'color', 2, 7, '2019-07-06 06:58:31', NULL),
(19, 's', NULL, 2, 8, '2019-07-06 06:58:40', NULL),
(20, 'j', NULL, 2, 7, '2019-07-06 06:59:12', NULL),
(21, 'http://localhost:8000/uploads/users/8/files/15624073101395.test.pdf', 'application', 2, 8, '2019-07-06 07:01:51', NULL),
(22, 'j', NULL, 2, 8, '2019-07-06 07:01:58', NULL),
(23, 'http://localhost:8000/uploads/users/8/images/logoc.png15624073351555.png', 'image', 2, 8, '2019-07-06 07:02:15', NULL),
(24, 'd', NULL, 2, 7, '2019-07-06 07:02:31', NULL),
(25, 'f', NULL, 2, 8, '2019-07-06 07:02:38', NULL),
(26, 'f', NULL, 2, 8, '2019-07-06 07:04:12', NULL),
(27, 'd', NULL, 2, 7, '2019-07-06 07:04:14', NULL),
(28, 'f', NULL, 2, 7, '2019-07-06 07:04:16', NULL),
(29, 'f', NULL, 2, 7, '2019-07-06 07:04:17', NULL),
(30, 'f', NULL, 2, 7, '2019-07-06 07:04:17', NULL),
(31, 'f', NULL, 2, 7, '2019-07-06 07:04:18', NULL),
(32, 'c', NULL, 1, 7, '2019-07-06 07:04:42', NULL),
(33, 'c', NULL, 1, 7, '2019-07-06 07:04:48', NULL),
(34, 'v', NULL, 2, 8, '2019-07-06 07:04:51', NULL),
(35, 'v', NULL, 2, 8, '2019-07-06 07:04:57', NULL),
(36, 's', NULL, 2, 8, '2019-07-06 07:05:09', NULL),
(37, 's', NULL, 2, 8, '2019-07-06 07:05:10', NULL),
(38, 's', NULL, 2, 7, '2019-07-06 07:05:17', NULL),
(39, 's', NULL, 2, 8, '2019-07-06 07:05:19', NULL),
(40, 'e', NULL, 2, 8, '2019-07-06 07:06:15', NULL),
(41, 'e', NULL, 2, 8, '2019-07-06 07:06:17', NULL),
(42, 'e', NULL, 2, 8, '2019-07-06 07:06:18', NULL),
(43, 'es', NULL, 2, 8, '2019-07-06 07:06:18', NULL),
(44, 'a', NULL, 2, 8, '2019-07-06 07:06:20', NULL),
(45, 'يا test', NULL, 2, 8, '2019-07-06 07:06:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('70bbd906-4c1b-4393-99ae-07e98112a1ce', 'App\\Notifications\\AddProductStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/products\"}', '2019-02-17 21:25:59', '2019-02-16 09:13:12', '2019-02-16 09:13:12'),
('4c50c0bb-b45f-4777-8070-baebf71095fc', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/services\"}', NULL, '2019-02-18 12:41:32', '2019-02-18 12:41:32'),
('8933a246-d099-4b17-9980-13b7ac79b553', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/services\"}', '2019-02-18 14:01:53', '2019-02-18 13:56:34', '2019-02-18 13:56:34'),
('76042351-885a-417c-956f-d35018349f4e', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/services\"}', NULL, '2019-02-19 19:05:15', '2019-02-19 19:05:15'),
('d33c1ab8-9e93-4800-af9f-0abb682d8bbd', 'App\\Notifications\\AddServiceStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 \\u0646\\u0628\\u0631\\u0633 \\u0645\\u0631\\u0628\\u0627\\u0646  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u062e\\u062f\\u0645\\u0647 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/services\"}', NULL, '2019-02-19 19:32:06', '2019-02-19 19:32:06'),
('e60dd9b3-d1a5-4947-abab-15ca016f8c9b', 'App\\Notifications\\AddProductStaffNoth', 'App\\Models\\Staff', 1, '{\"msg\":\"\\u0642\\u0627\\u0645 ayoub tamous  \\u0628\\u0625\\u0636\\u0627\\u0641\\u0629 \\u0645\\u0646\\u062a\\u062c \\u062c\\u062f\\u064a\\u062f \\u0642\\u0645 \\u0628\\u062a\\u0641\\u062d\\u0635\\u0647 \",\"link\":\"admin\\/products\"}', NULL, '2019-02-20 17:04:23', '2019-02-20 17:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `status`, `cover`, `created_at`, `updated_at`, `position`) VALUES
(8, '{\"ar\":\"\\u0645\\u0646 \\u0646\\u062d\\u0646\",\"en\":\"whowe\"}', 'page/whewe', '{\"ar\":\"<p>this is body<\\/p>\",\"en\":\"<p>this is body<br><\\/p>\"}', 'active', 'page_attachment1550607437101.jpg', '2019-02-19 17:17:17', '2019-02-19 17:17:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(491, 'view-staff', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(492, 'add-staff', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(493, 'edit-staff', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(494, 'delete-staff', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(495, 'ajax-staff', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(496, 'view-pages', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(497, 'add-pages', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(498, 'edit-pages', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(499, 'delete-pages', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(500, 'ajax-pages', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(501, 'view-users', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(502, 'add-users', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(503, 'edit-users', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(504, 'delete-users', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(505, 'ajax-users', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(506, 'view-roles', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(507, 'add-roles', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(508, 'edit-roles', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(509, 'delete-roles', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(510, 'ajax-roles', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(511, 'view-advertisements', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(512, 'add-advertisements', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(513, 'edit-advertisements', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(514, 'delete-advertisements', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(515, 'ajax-advertisements', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(516, 'view-attachments', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(517, 'add-attachments', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(518, 'edit-attachments', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(519, 'delete-attachments', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(520, 'ajax-attachments', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(521, 'view-services', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(522, 'add-services', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(523, 'edit-services', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(524, 'delete-services', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(525, 'ajax-services', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(526, 'view-threads', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(527, 'add-threads', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(528, 'edit-threads', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(529, 'delete-threads', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(530, 'ajax-threads', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(531, 'view-withdraws', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(532, 'add-withdraws', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(533, 'edit-withdraws', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(534, 'delete-withdraws', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(535, 'ajax-withdraws', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(536, 'view-settings', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(537, 'add-settings', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(538, 'edit-settings', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(539, 'delete-settings', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(540, 'ajax-settings', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(541, 'view-products', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(542, 'add-products', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(543, 'edit-products', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(544, 'delete-products', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(545, 'ajax-products', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(546, 'view-sections', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(547, 'add-sections', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(548, 'edit-sections', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(549, 'delete-sections', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(550, 'ajax-sections', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(551, 'view-orders', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(552, 'add-orders', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(553, 'edit-orders', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(554, 'delete-orders', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(555, 'ajax-orders', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(556, 'view-complaints', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(557, 'add-complaints', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(558, 'edit-complaints', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(559, 'delete-complaints', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(560, 'ajax-complaints', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(561, 'view-deposits', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(562, 'add-deposits', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(563, 'edit-deposits', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(564, 'delete-deposits', 'staff', '2019-02-19 18:16:08', '2019-02-19 18:16:08'),
(565, 'ajax-deposits', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(566, 'view-newsletters', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(567, 'add-newsletters', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(568, 'edit-newsletters', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(569, 'delete-newsletters', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(570, 'ajax-newsletters', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(571, 'view-messages', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(572, 'add-messages', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(573, 'edit-messages', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(574, 'delete-messages', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(575, 'ajax-messages', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(576, 'view-comments', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(577, 'add-comments', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(578, 'edit-comments', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(579, 'delete-comments', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(580, 'ajax-comments', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(581, 'view-sliders', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(582, 'add-sliders', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(583, 'edit-sliders', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(584, 'delete-sliders', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(585, 'ajax-sliders', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(586, 'view-rating', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(587, 'add-rating', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(588, 'edit-rating', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(589, 'delete-rating', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(590, 'ajax-rating', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(591, 'view-websiteservices', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(592, 'add-websiteservices', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(593, 'edit-websiteservices', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(594, 'delete-websiteservices', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09'),
(595, 'ajax-websiteservices', 'staff', '2019-02-19 18:16:09', '2019-02-19 18:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(11) NOT NULL,
  `model_type` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position_sliders`
--

CREATE TABLE `position_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_sliders`
--

INSERT INTO `position_sliders` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'سليدر المنتجات (الاعلى)', 'products', '2019-02-18 11:51:04', '2019-02-18 11:51:04'),
(2, 'سليدر المنتجات (الأسفل)', 'products', '2019-02-19 16:00:13', '2019-02-19 16:00:13'),
(3, 'سليدر الخدمات  (الأعلى)', 'services', '2019-02-19 16:00:32', '2019-02-19 16:00:32'),
(4, 'سليدر الخدمات  (الاسفل)', 'services', '2019-02-19 16:01:00', '2019-02-19 16:01:00'),
(5, 'سليدر المنتجات الرقميه (الأعلى)', 'shop', '2019-02-19 16:02:07', '2019-02-19 16:02:07'),
(6, 'سليدر المنتجات الرقميه (الاسفل)', 'shop', '2019-02-19 16:02:43', '2019-02-19 16:02:43'),
(7, 'سليدر الرئيسيه (الأعلى)', 'home', '2019-02-19 16:03:55', '2019-02-19 16:03:55'),
(8, 'سليدر الرئيسيه (الاسفل)', 'home', '2019-02-19 16:04:32', '2019-02-19 16:04:32'),
(9, 'سليدر الترحيب', 'welcome', '2019-02-19 16:05:21', '2019-02-19 16:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `productfavs`
--

CREATE TABLE `productfavs` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productfavs`
--

INSERT INTO `productfavs` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-02-17 17:34:59', '2019-02-17 17:34:59'),
(2, 1, 1, '2019-02-17 17:35:50', '2019-02-17 17:35:50'),
(3, 2, 1, '2019-02-17 17:37:59', '2019-02-17 17:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `attachments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trans` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_and_type`, `body`, `section_id`, `sub_section`, `category`, `Quantity`, `price`, `user_id`, `branch_id`, `slug`, `sku`, `branch_name`, `attachments`, `trans`, `in_stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test_name', 'body desc', 1, 2, 3, '12', 300, 1, NULL, 'test_name', '100null', 'bmv_sad', '[{\"img\":\"product_attachment15503191921206.jpg\"},{\"img\":\"product_attachment1550319192454.jpg\"},{\"img\":\"product_attachment1550319192781.jpg\"},{\"img\":\"product_attachment15503191921207.jpg\"}]', '1', 'Yes', 'active', '2019-02-16 09:13:12', '2019-02-17 17:19:40'),
(3, 'new', 'test', 1, 2, 3, '7', 15, 1, NULL, 'new', '8م', 'bmv_sad', '[{\"img\":\"product_attachment15506930621311.jpg\"},{\"img\":\"product_attachment1550693062175.jpg\"},{\"img\":\"product_attachment1550693062140.jpg\"}]', '1', 'Yes', 'active', '2019-02-20 17:04:22', '2019-02-20 17:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `child` int(10) UNSIGNED NOT NULL,
  `parentblock` int(11) NOT NULL,
  `childblock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `parent`, `child`, `parentblock`, `childblock`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 0, 0, '2019-07-06 06:11:17', '2019-07-06 06:11:17'),
(2, 7, 8, 0, 0, '2019-07-06 06:56:47', '2019-07-06 07:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_price` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `parent_id`, `title`, `slug`, `description`, `fixed_price`, `order`, `created_at`, `updated_at`) VALUES
(1, NULL, '{\"ar\":\"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a\",\"en\":\"cars\"}', 'cars', '{\"ar\":\"test\",\"en\":\"test\"}', 0, 1, NULL, NULL),
(2, 1, '{\"ar\":\"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\\u0629\",\"en\":\"usa\"}', 'cars', '{\"ar\":\"test\",\"en\":\"test\"}', 0, 1, NULL, NULL),
(3, 2, '{\"ar\":\"BMV\",\"en\":\"BMV\"}', 'cars', '{\"ar\":\"test\",\"en\":\"test\"}', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `sub_section` int(11) NOT NULL,
  `sub_sub_section` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `to` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `experiences` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `per` enum('Hour','Service') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `section_id`, `sub_section`, `sub_sub_section`, `category`, `area_id`, `to`, `name`, `slug`, `body`, `attachment`, `price`, `experiences`, `skills`, `lng`, `lat`, `per`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 2, 3, NULL, NULL, 4, 'create complate website', 'create-complate-website', 'create website laravel', '[{\"img\":\"service_attachment1550613913377.jpg\"}]', 3000, 'laravel', '1,2,3', NULL, NULL, 'Hour', 'inactive', '2019-02-19 19:05:13', '2019-02-19 19:05:13'),
(5, 3, 1, 2, 3, NULL, NULL, 4, 'convert psd to html', 'convert-psd-to-html', 'convert file psd to html websit', '[{\"img\":\"service_attachment1550615526252.jpg\"},{\"img\":\"service_attachment15506155261167.jpg\"},{\"img\":\"service_attachment15506155261061.jpg\"},{\"img\":\"service_attachment1550615526740.jpg\"}]', 1222, 'sdfksdnjkfbdsjb', '1', NULL, NULL, 'Hour', 'inactive', '2019-02-19 19:32:06', '2019-02-19 19:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `services_extras`
--

CREATE TABLE `services_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicewebsites`
--

CREATE TABLE `servicewebsites` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicewebsites`
--

INSERT INTO `servicewebsites` (`id`, `title`, `icon`, `body`, `created_at`, `updated_at`) VALUES
(1, 'hhhhhhhh', 'icon-star', 'test', '2019-02-20 05:08:16', '2019-02-20 18:24:15'),
(2, 'tttttttttttt', 'icon-like', 'ttttttttttttttttttttttttttttttttttt', '2019-02-20 18:24:55', '2019-02-20 18:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `service_attachments`
--

CREATE TABLE `service_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `serviceid` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_tags`
--

CREATE TABLE `service_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `serviceid` int(10) UNSIGNED NOT NULL,
  `tagid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `set_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `set_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `sec` enum('General','Website') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `body`, `images`, `slider_position`, `created_at`, `updated_at`) VALUES
(1, 'title', 'body test', 'slider_image15506151271118.jpg', 1, '2019-02-18 12:16:17', '2019-02-18 12:16:17'),
(2, 'sliderwelcome', 'thi is slider welcom', 'slider_image15506046981154.jpg', 9, '2019-02-19 16:06:25', '2019-02-19 16:31:38'),
(8, 'title', 'tetstt', 'slider_image15506151271118.jpg', 8, '2019-02-19 19:25:15', '2019-02-19 19:25:15'),
(7, 'slll', 'tttttt', 'slider_image15506047891476.jpg', 9, '2019-02-19 16:33:09', '2019-02-19 16:33:09'),
(6, 'عنوان', 'tetetet', 'slider_image1550614752621.jpg', 7, '2019-02-19 16:17:45', '2019-02-19 19:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `smsapiconfigs`
--

CREATE TABLE `smsapiconfigs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'devloper', 'devloper', 'devloper@devloper.com', NULL, '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS', '2019-02-20 16:39:11', '::1', NULL, NULL, '2019-02-20 16:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `renew_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcatid` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_sub_categories`
--

CREATE TABLE `sub_sub_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `subsubcatid` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `section_id`, `user_id`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'how to ?', NULL, '<p>tetsttdt</p>', '2019-02-20 21:13:03', '2019-02-20 21:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `thread_sections`
--

CREATE TABLE `thread_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thread_sections`
--

INSERT INTO `thread_sections` (`id`, `title`, `body`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0633\\u0624\\u0627\\u0644  \\u0648 \\u062c\\u0648\\u0627\\u0628\",\"en\":\"games\"}', '{\"ar\":\"bfhdh\",\"en\":\"fbjkb\"}', NULL, NULL, 'active', '2019-02-20 20:56:21', '2019-02-20 21:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover.png',
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verfiy_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verfied` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell` tinyint(4) NOT NULL DEFAULT 0,
  `upload_products` tinyint(4) NOT NULL DEFAULT 0,
  `paypal_mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `db` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `slug`, `dirthyear`, `dirthmonth`, `dirthday`, `gender`, `country`, `city`, `email_verified_at`, `experienceyears`, `certificates`, `skills`, `description`, `image`, `cover`, `mobile`, `job`, `last_ip`, `account_type`, `status`, `verfiy_code`, `verfied`, `sell`, `upload_products`, `paypal_mail`, `facebook`, `twitter`, `db`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayoub tamous', 'null', 'ayoub@gmail.com', '$2y$10$SOw/23kv0CQQGviKsk66pepqS.1weCsU1eV3D8X.Hb42SgNlr7TGS', 'ayoub', NULL, NULL, NULL, NULL, 'المغرب', 'KASBA TADLA', NULL, NULL, NULL, NULL, 'he , my name is ayoub full stack web devloper', 'user.png', 'cover.png', NULL, 'full stack', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 'kZ2e8EUN4RrAg9f5Bmwvpj7qG4drmQRORbxHgJaR5IsAipavsv5gKWvSBeuX', NULL, NULL),
(3, 'نبرس مربان', 'nipo', 'nipo@gmail.com', '$2y$10$eqf2QCid3xMD3VQ.lPa6oup0NEsYAovlYOhLJk0vz0s2IYGicDbKG', 'nipo', '1994', '8', '11', 0, '40', 'KASBA TADLA', NULL, NULL, NULL, NULL, NULL, 'user.png', 'cover.png', '+212645554343453', NULL, '::1', '0', '1', '', '1', 0, 0, NULL, NULL, NULL, NULL, 's6zco74xLlPyaTojnWmD2Ki9OwdzRX3rCgf3v3Nh9lFZiKk0sPbnHy3HF7zc', '2019-02-19 19:29:37', NULL),
(4, 'devloper', 'devoper', 'devloper@devloper.com', '$2y$10$.TCk1aDdjA5ZrQHDVG736OaRseT3lGKByCjNfS4YXm9Qie3K1zXq6', NULL, '1913', '7', '10', 0, '1', 'devloper', NULL, NULL, NULL, NULL, NULL, 'user.png', 'cover.png', '+21277767656565655', NULL, '::1', '0', '1', '7fc6e', '0', 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-02-19 19:37:33', NULL),
(7, 'test', 'admin', 'el3zahaby@gmail.com', '$2y$10$J6yB.7fEcQVor3Ck/NgLQuYpBpF06T6t/4d6tyq4fDQ8iNcj0qMw.', 'test', NULL, NULL, NULL, NULL, 'المملكة العربية السعودية', 'مكة', NULL, 17, 'w', '', 'w', 'user_15624067241248445.png', 'cover.png', NULL, '', '127.0.0.1', '1', '1', NULL, '1', 0, 0, NULL, NULL, NULL, NULL, 'YmzHaa0tsSaWcikXAF6olJwXxvKHfvFxMB4qM9HgPss33ODnP77rX4K6bDHb', '2019-07-06 06:03:27', NULL),
(8, 'احمد المشتري', 'el0zahaby', 'el0zahaby@gmail.com', '$2y$10$PV9ZnY5V5xOIB0XT4eZW9.MtJ6ZW1LiMoc5zRUclc4/mqFanb21gG', NULL, '1918', '11', '17', 0, '1', 'مكة', NULL, 2, 'ص', NULL, 'ي', 'user.png', 'cover.png', '+93537118696', NULL, '127.0.0.1', '0', '1', 'fcc0f', '0', 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-07-06 06:55:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `experienceid` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Approved','Sent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproductprices`
--
ALTER TABLE `addproductprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_sliders`
--
ALTER TABLE `categories_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_sliders_catid_foreign` (`catid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_comments`
--
ALTER TABLE `complain_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_types`
--
ALTER TABLE `complain_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecomponents`
--
ALTER TABLE `homecomponents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_roomid_foreign` (`roomid`),
  ADD KEY `messages_parent_foreign` (`parent`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_sliders`
--
ALTER TABLE `position_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productfavs`
--
ALTER TABLE `productfavs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productfavs_product_id_foreign` (`product_id`),
  ADD KEY `productfavs_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_parent_foreign` (`parent`),
  ADD KEY `rooms_child_foreign` (`child`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_extras`
--
ALTER TABLE `services_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_extras_serviceid_foreign` (`serviceid`);

--
-- Indexes for table `servicewebsites`
--
ALTER TABLE `servicewebsites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_attachments`
--
ALTER TABLE `service_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_attachments_serviceid_foreign` (`serviceid`);

--
-- Indexes for table `service_tags`
--
ALTER TABLE `service_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_tags_serviceid_foreign` (`serviceid`),
  ADD KEY `service_tags_tagid_foreign` (`tagid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_slider_position_foreign` (`slider_position`);

--
-- Indexes for table `smsapiconfigs`
--
ALTER TABLE `smsapiconfigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_username_unique` (`username`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_catid_foreign` (`catid`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_categories_subcatid_foreign` (`subcatid`);

--
-- Indexes for table `sub_sub_sub_categories`
--
ALTER TABLE `sub_sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_sub_categories_subsubcatid_foreign` (`subsubcatid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread_sections`
--
ALTER TABLE `thread_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_experiences_userid_foreign` (`userid`),
  ADD KEY `user_experiences_experienceid_foreign` (`experienceid`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproductprices`
--
ALTER TABLE `addproductprices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_sliders`
--
ALTER TABLE `categories_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complain_comments`
--
ALTER TABLE `complain_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain_types`
--
ALTER TABLE `complain_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homecomponents`
--
ALTER TABLE `homecomponents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position_sliders`
--
ALTER TABLE `position_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productfavs`
--
ALTER TABLE `productfavs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services_extras`
--
ALTER TABLE `services_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicewebsites`
--
ALTER TABLE `servicewebsites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_attachments`
--
ALTER TABLE `service_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_tags`
--
ALTER TABLE `service_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smsapiconfigs`
--
ALTER TABLE `smsapiconfigs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_sub_sub_categories`
--
ALTER TABLE `sub_sub_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thread_sections`
--
ALTER TABLE `thread_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
