-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2018 at 11:55 AM
-- Server version: 5.6.38-83.0
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tip4tips2018_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Create', 'create', NULL, NULL),
(2, 'edit', 'Edit', NULL, NULL),
(3, 'View', 'view', NULL, NULL),
(4, 'Delete', 'delete', NULL, NULL),
(5, 'List', 'list', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultant_id` int(10) UNSIGNED NOT NULL,
  `lead_id` int(10) UNSIGNED NOT NULL,
  `create_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `consultant_id`, `lead_id`, `create_by`, `created_at`, `updated_at`) VALUES
(3, 7, 6, 1, '2018-01-23 12:26:24', '2018-01-23 12:26:24'),
(4, 7, 6, 1, '2018-01-23 12:31:28', '2018-01-23 12:31:28'),
(5, 7, 6, 1, '2018-01-23 12:32:12', '2018-01-23 12:32:12'),
(6, 6, 6, 1, '2018-01-23 12:46:04', '2018-01-23 12:46:04'),
(7, 7, 6, 1, '2018-01-24 02:24:49', '2018-01-24 02:24:49'),
(8, 6, 6, 1, '2018-01-24 02:38:37', '2018-01-24 02:38:37'),
(9, 6, 6, 1, '2018-01-31 02:37:01', '2018-01-31 02:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `evaluationautos`
--

CREATE TABLE `evaluationautos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(10) UNSIGNED NOT NULL,
  `person_is` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcategories`
--

CREATE TABLE `giftcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giftcategories`
--

INSERT INTO `giftcategories` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Electronic', 'electronic', NULL, NULL, NULL),
(3, 'House tool', 'housetool', NULL, NULL, NULL),
(4, 'Accessories', 'accessories', NULL, NULL, NULL),
(5, 'activity', 'activity', NULL, NULL, NULL),
(6, 'Bags', 'bags', NULL, NULL, NULL),
(7, 'Bikes & Cars', 'bikes&cars', NULL, NULL, NULL),
(8, 'Clothes', 'clothes', NULL, NULL, NULL),
(9, 'Cosmetics', 'cosmetics', NULL, NULL, NULL),
(10, 'Entertaiment', 'entertaiment', NULL, NULL, NULL),
(11, 'Fine Foods', 'finefoods', NULL, NULL, NULL),
(12, 'Furniture', 'furniture', NULL, NULL, NULL),
(13, 'High Tech', 'hightech', NULL, NULL, NULL),
(14, 'House Ware', 'houseware', NULL, NULL, NULL),
(15, 'Jewels', 'jewels', NULL, NULL, NULL),
(16, 'Medical', 'medical', NULL, NULL, NULL),
(17, 'Sport items', 'sportitems', NULL, NULL, NULL),
(18, 'Travel', 'travel', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `point` decimal(8,0) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `thumbnail` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `description`, `point`, `category_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(5, 'Quà tặng trải nghiệm đặc biệt - Sensesclub Crystal', 'Hop qua SensesClub tinh te de chieu dai nguoi than \r\nmot trai nghiem do ho tuy chon\r\nMoi hop qua tang trai nghiem SensesClub la mot suat trai nghiem doc dao tuy chon.\r\nMoi hop qua bao gom:\r\n* mot quyen sach giup cho nguoi duoc nhan lua chon trai nghiem va', '35', 18, NULL, '2018-01-23 08:14:44', '2018-01-23 08:14:44'),
(6, 'Food Boxes Lock and Lock', NULL, '47', 3, NULL, '2018-01-23 08:16:15', '2018-01-23 08:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `leadprocesses`
--

CREATE TABLE `leadprocesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `lead_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leadprocesses`
--

INSERT INTO `leadprocesses` (`id`, `lead_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2018-01-26 12:06:56', '2018-01-26 12:06:56'),
(2, 6, 3, '2018-01-30 14:33:43', '2018-01-30 14:33:43'),
(3, 6, 3, '2018-01-30 14:34:12', '2018-01-30 14:34:12'),
(4, 6, 3, '2018-01-30 14:58:58', '2018-01-30 14:58:58'),
(5, 7, 1, '2018-01-31 04:26:55', '2018-01-31 04:26:55'),
(6, 9, 0, '2018-01-31 10:29:55', '2018-01-31 10:29:55'),
(7, 9, 2, '2018-01-31 10:30:38', '2018-01-31 10:30:38'),
(8, 9, 1, '2018-01-31 10:33:20', '2018-01-31 10:33:20'),
(9, 9, 3, '2018-01-31 11:53:38', '2018-01-31 11:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthday` date DEFAULT '1900-01-01',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `tipster_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `fullname`, `gender`, `birthday`, `address`, `email`, `phone`, `notes`, `product_id`, `status`, `tipster_id`, `region_id`, `created_at`, `updated_at`) VALUES
(6, 'Lead 1', 0, NULL, NULL, 'lead1@gmail.com', '09038213123', 'New CEO of XZY company.\r\nAlso interested by a car insurance. \r\nPlease contact ASAP', 4, 3, 2, 2, '2018-01-23 12:26:11', '2018-01-31 03:32:22'),
(7, 'Philippe ROBERT', 0, NULL, NULL, NULL, '197870909', NULL, 4, 1, 2, 1, '2018-01-26 04:08:24', '2018-01-31 04:26:55'),
(9, 'Mathieu Lindeman', 0, NULL, NULL, 'mathieu@gmail.com', NULL, 'Urgent!!!', 4, 3, 2, 2, '2018-01-30 07:30:59', '2018-01-31 11:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `delete_is` tinyint(4) NOT NULL DEFAULT '0',
  `read_is` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2017_12_21_041854_create_categories_table', 1),
(55, '2010_12_29_025812_create_roletypes_table', 2),
(56, '2010_12_29_025947_create_roles_table', 2),
(57, '2014_10_11_042406_create_regions_table', 2),
(58, '2014_10_12_000000_create_users_table', 2),
(59, '2014_10_12_100000_create_password_resets_table', 2),
(60, '2017_12_21_041853_create_giftcategories_table', 2),
(61, '2017_12_21_041854_create_productcategories_table', 2),
(62, '2017_12_21_042555_create_messages_table', 2),
(63, '2017_12_21_051101_create_leads_table', 2),
(64, '2017_12_21_063650_create_evaluations_table', 2),
(65, '2017_12_21_070436_create_assignments_table', 2),
(66, '2017_12_21_071945_create_statuses_table', 2),
(67, '2017_12_21_072333_create_leadprocesses_table', 2),
(68, '2017_12_21_072804_create_actions_table', 2),
(69, '2017_12_21_072805_create_menus_table', 2),
(70, '2017_12_21_072805_create_permissions_table', 2),
(71, '2017_12_21_073609_create_role_permissions_table', 2),
(72, '2017_12_21_075408_create_gifts_table', 2),
(73, '2017_12_21_080118_create_orders_table', 2),
(74, '2017_12_21_080257_create_order_gifts_table', 2),
(75, '2017_12_21_093715_create_products_table', 2),
(76, '2017_12_21_094349_create_pages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipster_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(3,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_gifts`
--

CREATE TABLE `order_gifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `gift_id` int(10) UNSIGNED NOT NULL,
  `quality` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `parents` decimal(2,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Insurance', 'insurance', NULL, '2018-01-16 21:24:43', '2018-01-16 21:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,0) NOT NULL DEFAULT '0',
  `thumbnail` blob,
  `quality` decimal(8,0) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `thumbnail`, `quality`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'Medical', 'Medical insurances for local and expatriates', '0', NULL, '0', 5, NULL, '2018-01-30 08:50:35'),
(5, 'Auto/Moto', '', '0', NULL, '0', 5, NULL, NULL),
(6, 'Shops', '', '0', NULL, '0', 5, NULL, NULL),
(7, 'Factory', '', '0', NULL, '0', 5, NULL, NULL),
(8, 'Office', '', '0', NULL, '0', 5, NULL, NULL),
(9, 'Home', '', '0', NULL, '0', 5, NULL, NULL),
(10, 'Travel', '', '0', NULL, '0', 5, NULL, NULL),
(11, 'Student', '', '0', NULL, '0', 5, NULL, NULL),
(12, 'Other', '', '0', NULL, '0', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ha Noi', NULL, NULL),
(2, 'Ho Chi Minh', NULL, NULL),
(3, 'Da Nang', NULL, NULL),
(4, 'Nha Trang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roletype_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`, `roletype_id`) VALUES
(1, 'Admin', 'admin', 1),
(2, 'Community', 'community', 1),
(3, 'Sale', 'sale', 1),
(4, 'Insurance', 'insurance', 2),
(5, 'Car', 'car', 2),
(6, 'Real estate', 'realestate', 2),
(7, 'Service', 'service', 2),
(8, 'Ambassador', 'ambassador', 3),
(9, 'Tipster', 'tipster_normal', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roletypes`
--

CREATE TABLE `roletypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roletypes`
--

INSERT INTO `roletypes` (`id`, `name`, `code`) VALUES
(1, 'Manager', 'manager'),
(2, 'Consultant', 'consultant'),
(3, 'Tipster', 'tipster');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` decimal(8,0) NOT NULL DEFAULT '0',
  `vote` decimal(4,0) NOT NULL DEFAULT '0',
  `delete_is` tinyint(4) NOT NULL DEFAULT '1',
  `role_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `gender`, `birthday`, `address`, `phone`, `point`, `vote`, `delete_is`, `role_id`, `region_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@amagumolabs.com', '$2y$10$8q2YeXKpiQGxqffDUeCaauNwPoQqnN7CmPy6HxXeRP7d5JF6nvToG', 'Admin', 1, '2017-12-12', 'Ho Chi Minh, Viet Nam', '093893771', '0', '0', 1, 1, 1, 'WLDBQRERrNnKPsRhGT9I2V701UWWoE1PnKLZqe5AMryxPHP4INs3B5XSY8W3', NULL, NULL),
(2, 'tipster1', 'tipster1@gmail.com', '$2y$10$umRwAmT3NST33aLjGySLgOXmRD7aHm1/K0YEBDMJrFey0H0TsTPMy', 'Tipster 1', 1, '1990-12-20', 'Tan Binh', '01928739832', '50', '0', 1, 8, 2, 'MCOEkiEKhUAVPCQUYSxmq2RinwcHTYxXVXGGytXmPHsGCFWNYm2RxsCBMknB', '2018-01-16 22:17:29', '2018-01-31 11:53:44'),
(3, 'tipster2', 'tipster2@gmail.com', '$2y$10$VYctWG6DoE4Mf3zqLLzwGu6RDxT8/DdriDS94ol0.iKsHcOtShOGm', 'Tipster 2', 0, '1982-01-11', 'Hoan Kiem', '0989310732', '0', '0', 1, 9, 1, '4erfppJLDtduTdQVv5N7w5neE7y5yEfuLl6f6j7xO9QJLMX4RRkbqWNfJptK', '2018-01-17 20:38:44', '2018-01-17 20:38:44'),
(4, 'tipster3', 'tipster3@gmail.com', '$2y$10$FkYTVllLc60zli2MSwbg3u/miVmdPqsxWA12AM6v8GwAfJOuOAIIq', 'Tipster 3', 1, '1981-01-19', 'Tran Hung Dao', '0989310981', '0', '0', 1, 9, 3, NULL, '2018-01-17 20:40:37', '2018-01-17 20:40:37'),
(5, 'tipster4', 'tipster4@gmail.com', '$2y$10$PQUkjmW4GTPhfRU4.qMY1eF4z5klCeh29CrPMqURPCMmZPM8pVA/K', 'Nguyen Tran Ngoc Tran', 0, '1992-01-20', 'Nguyen Chi Thanh', '0888172361', '0', '0', 1, 9, 4, NULL, '2018-01-17 20:42:36', '2018-01-31 10:29:43'),
(6, 'consultant1', 'consultant@gmail.com', '$2y$10$v1rQG22BYwgETQhb3s6ROu6mRK2V2qd5p6wDFmec1xls0RybQ.xbi', 'Consultant Thuy', 1, '2000-01-10', 'Hai Ba Trung', '019876512', '0', '0', 0, 5, 2, 'RI46g9Qqei6C0fMBU6pfpdi28KPNDAOdIOLEIYPr9ZAmzShMSwFBCPx73Afr', '2018-01-18 01:04:05', '2018-01-22 02:27:35'),
(7, 'hachit', 'chitha@gmail.com', '$2y$10$9JU56BB/CPq2YtepwRtjOOb6XtsPUdd4b7tQwJn57ZHkrSSgvLqM6', 'Ha Chi T', 0, '1980-01-12', 'Son Tra', '09897682721', '0', '0', 1, 6, 3, NULL, '2018-01-22 00:02:30', '2018-01-22 00:02:30'),
(8, 'salemanager', 'salemanager@gmail.com', '$2y$10$Hl8HdrjLhvAmDxDflz38POqbcd4Y.4fncNf2d0BFTjCU.m0tmOtdy', 'Sale Manager', 0, '1998-12-04', 'Hai Ba Trung', '0981237823', '0', '0', 1, 3, 2, 'a7DZgNUoCvbkQHC8zQEnpN5pgUFTD5lpD8Fb8LlQRDc1dJpq5bKHKE0qkiFg', '2018-01-22 01:09:20', '2018-01-22 01:09:20'),
(9, 'community', 'communityman@gmail.com', '$2y$10$akhhKTnJ2ANdoW5OSy9rpuwRQoi/FMls4nGD7rYJ0Ekxv.74jeaE6', 'Community Manager', 1, '1987-03-21', 'Dong Den', '1231234123', '0', '0', 1, 2, 2, 'wKhOqolIR3vqIVeoR1psBYuUxLoTIVEeZn0vXQc7EcMWB2vNiXjngFHeGDi2', '2018-01-22 01:11:00', '2018-01-22 01:11:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actions_code_unique` (`code`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluationautos`
--
ALTER TABLE `evaluationautos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcategories`
--
ALTER TABLE `giftcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `giftcategories_code_unique` (`code`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gifts_category_id_foreign` (`category_id`);

--
-- Indexes for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leadprocesses_lead_id_foreign` (`lead_id`),
  ADD KEY `leadprocesses_status_id_foreign` (`status_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_email_unique` (`email`),
  ADD KEY `leads_tipster_id_foreign` (`tipster_id`),
  ADD KEY `leads_region_id_foreign` (`region_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_code_unique` (`code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_tipster_id_foreign` (`tipster_id`);

--
-- Indexes for table `order_gifts`
--
ALTER TABLE `order_gifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_gifts_order_id_foreign` (`order_id`),
  ADD KEY `order_gifts_gift_id_foreign` (`gift_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_code_unique` (`code`),
  ADD KEY `permissions_action_id_foreign` (`action_id`),
  ADD KEY `permissions_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productcategories_code_unique` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_code_unique` (`code`),
  ADD KEY `roles_roletype_id_foreign` (`roletype_id`);

--
-- Indexes for table `roletypes`
--
ALTER TABLE `roletypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_region_id_foreign` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `evaluationautos`
--
ALTER TABLE `evaluationautos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giftcategories`
--
ALTER TABLE `giftcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_gifts`
--
ALTER TABLE `order_gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `roletypes`
--
ALTER TABLE `roletypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `giftcategories` (`id`);

--
-- Constraints for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  ADD CONSTRAINT `leadprocesses_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `leads_tipster_id_foreign` FOREIGN KEY (`tipster_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_tipster_id_foreign` FOREIGN KEY (`tipster_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_gifts`
--
ALTER TABLE `order_gifts`
  ADD CONSTRAINT `order_gifts_gift_id_foreign` FOREIGN KEY (`gift_id`) REFERENCES `gifts` (`id`),
  ADD CONSTRAINT `order_gifts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`),
  ADD CONSTRAINT `permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `productcategories` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_roletype_id_foreign` FOREIGN KEY (`roletype_id`) REFERENCES `roletypes` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
