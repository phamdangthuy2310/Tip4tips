-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 01:38 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tip4tipsv1.2`
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
(9, 6, 6, 1, '2018-01-31 02:37:01', '2018-01-31 02:37:01'),
(10, 6, 14, 1, '2018-02-06 13:06:00', '2018-02-06 13:06:00'),
(11, 6, 9, 1, '2018-02-08 03:49:51', '2018-02-08 03:49:51'),
(12, 6, 25, 1, '2018-02-08 04:39:41', '2018-02-08 04:39:41'),
(13, 16, 26, 1, '2018-03-01 04:42:42', '2018-03-01 04:42:42'),
(14, 7, 35, 1, '2018-03-05 02:57:00', '2018-03-05 02:57:00'),
(15, 7, 37, 1, '2018-03-11 21:28:21', '2018-03-11 21:28:21'),
(16, 25, 36, 1, '2018-03-12 00:03:06', '2018-03-12 00:03:06'),
(17, 18, 40, 1, '2018-03-14 03:43:28', '2018-03-14 03:43:28');

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
(18, 'Travel', 'travel', NULL, NULL, NULL),
(19, 'others', 'others', NULL, '2018-03-05 03:01:43', '2018-03-05 03:01:43');

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
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_is` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `description`, `point`, `category_id`, `thumbnail`, `delete_is`, `created_at`, `updated_at`) VALUES
(5, 'Quà tặng trải nghiệm đặc biệt - Sensesclub Crystal', 'Hop qua SensesClub tinh te de chieu dai nguoi than \r\nmot trai nghiem do ho tuy chon\r\nMoi hop qua tang trai nghiem SensesClub la mot suat trai nghiem doc dao tuy chon.\r\nMoi hop qua bao gom:\r\n* mot quyen sach giup cho nguoi duoc nhan lua chon trai nghiem va', '35', 18, '1519974719.jpg', 0, '2018-01-23 08:14:44', '2018-03-02 07:12:03'),
(6, 'Food Boxes Lock and Lock', NULL, '47', 3, '1519974620.jpg', 0, '2018-01-23 08:16:15', '2018-03-02 07:10:24'),
(7, '10.5-inch iPad Pro Wi-Fi 64GB - Rose Gold - Apple', '10.5-inch iPad Pro Wi-Fi 64GB - Rose Gold - Apple\r\nCost:  $649.00', '1200', 13, '1519973766.', 0, '2018-03-02 07:01:02', '2018-03-02 07:01:02'),
(8, 'iPhone X 256GB', 'iPhone X lột xác hoàn toàn với thiết kế mới độc đáo. Màn hình tràn viền phủ hầu hết mặt trước loại bỏ luôn nút home mang đến một trải nghiệm mới vô cùng độc đáo và khác biệt.\r\nCost: 1.149,00 $', '10999', 13, '1519974364.jpg', 0, '2018-03-02 07:08:39', '2018-03-02 07:08:39'),
(9, 'Samsung Galaxy J8 2018', 'The Samsung Galaxy J8 2018 is a good smartphone which is packed with quality features. Its excellent configurations deliver powerful performance and are capable of handling multiple tasks with ease. You can capture excellent photos and record good quality videos with the help of its great pair of cameras. The front LED flash assists you to click selfies even in low light conditions. Overall, the Samsung Galaxy J8 2018 is one of the best devices around this price tag.', '10000', 13, '1519974797.jpg', 0, '2018-03-02 07:15:14', '2018-03-02 07:15:14'),
(10, 'Samsung RSA1STSL Side-By-Side Fridge 550L', 'Catalogue Code: IP08468\r\nModel No: RSA1STSL\r\nTotal Capacity: 555 LCapacity Freezer: 180 LLED DisplayCooling Feature(s): Multi flowNet Dimension (WxHxD): 912x1789x734 mm.\r\nCost: 2,899.00$', '12000', 2, '1519974985.jpg;width=600', 0, '2018-03-02 07:17:42', '2018-03-02 07:18:02'),
(11, 'LG TONE PRO wireless Bluetooth headset (HBS-760)', 'Recently, we highlighted the upcoming release of LG’s Tone Active headset that will be releasing in October, but what about what’s available today? We have spent some time with LG’s TONE PRO HBS-760 (2015’s model) headset, to see where their earbuds take their stand in the always growing wireless market.', '500', 2, '1519975159.jpg', 0, '2018-03-02 07:20:42', '2018-03-02 07:20:42'),
(12, 'Bangkok-Pattaya - Khách sạn 3* Tặng vé xem Nanta show', 'Bangkok-Pattaya - Khách sạn 3* Tặng vé xem Nanta show (Tour Tiết Kiệm)', '1435', 18, '1519975369.jpg', 0, '2018-03-02 07:23:52', '2018-03-02 07:23:52'),
(13, 'DÂY CHUYỀN PNJ VÀNG 18K', 'Dây chuyền, chất liệu vàng 18K, dây công vuông 9C .', '12989', 15, '1519975511.jpg', 0, '2018-03-02 07:26:19', '2018-03-02 07:26:19'),
(14, 'Apple Ipad Mini 32 Gb Wifi + 3G', 'A beautiful display, powerful A5 chip, FaceTime HD camera, iSight camera with 1080p HD video recording, ultrafast wireless, and over 275,000 apps ready to download from the App Store.\r\n\r\niPad mini is an iPad in every way, shape, and slightly smaller form.', '1468', 13, '1519975662.jpg', 0, '2018-03-02 07:28:22', '2018-03-02 07:28:22'),
(15, 'SMART TIVI LG 65 INCH 65UJ632T, 4K HDR', NULL, '4505', 2, '1519975781.png', 0, '2018-03-02 07:30:27', '2018-03-02 07:30:27'),
(16, 'Vision 2018', NULL, '10', 7, '1520238332.jpg', 0, '2018-03-02 08:10:56', '2018-04-08 20:11:20'),
(17, 'test gift', NULL, '0', 15, 'D:\\xampp\\tmp\\php11D4.tmp', 1, '2018-03-05 01:25:56', '2018-03-05 01:28:08'),
(18, 'weqweqwe', NULL, '0', 16, '1520238420.jpg', 1, '2018-03-05 01:27:00', '2018-03-05 01:27:09'),
(19, 'Jquery Box', 'jquery box contains gitfs.', '30', 6, 'no_image_available.jpg', 0, '2018-04-08 20:10:24', '2018-04-08 20:10:24');

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
(22, 18, 1, '2018-02-08 03:49:12', '2018-02-08 03:49:12'),
(23, 18, 2, '2018-02-08 03:49:15', '2018-02-08 03:49:15'),
(24, 18, 3, '2018-02-08 03:49:18', '2018-02-08 03:49:18'),
(25, 9, 1, '2018-02-08 03:50:05', '2018-02-08 03:50:05'),
(26, 9, 2, '2018-02-08 03:50:13', '2018-02-08 03:50:13'),
(27, 9, 4, '2018-02-08 03:50:16', '2018-02-08 03:50:16'),
(28, 22, 1, '2018-02-08 03:54:26', '2018-02-08 03:54:26'),
(29, 21, 1, '2018-02-08 03:54:39', '2018-02-08 03:54:39'),
(30, 21, 2, '2018-02-08 03:54:42', '2018-02-08 03:54:42'),
(31, 20, 1, '2018-02-08 03:54:52', '2018-02-08 03:54:52'),
(32, 20, 2, '2018-02-08 03:54:55', '2018-02-08 03:54:55'),
(33, 20, 3, '2018-02-08 03:54:59', '2018-02-08 03:54:59'),
(34, 19, 1, '2018-02-08 03:55:08', '2018-02-08 03:55:08'),
(35, 19, 2, '2018-02-08 03:55:12', '2018-02-08 03:55:12'),
(36, 19, 4, '2018-02-08 03:55:14', '2018-02-08 03:55:14'),
(51, 35, 1, '2018-03-12 03:16:55', '2018-03-12 03:16:55'),
(52, 35, 2, '2018-03-12 03:32:02', '2018-03-12 03:32:02'),
(53, 39, 1, '2018-03-12 20:17:18', '2018-03-12 20:17:18'),
(54, 41, 1, '2018-03-12 20:36:54', '2018-03-12 20:36:54'),
(55, 46, 1, '2018-03-12 21:03:45', '2018-03-12 21:03:45'),
(56, 46, 2, '2018-03-12 21:21:30', '2018-03-12 21:21:30'),
(57, 46, 3, '2018-03-12 21:21:39', '2018-03-12 21:21:39'),
(58, 47, 3, '2018-03-12 21:46:29', '2018-03-12 21:46:29'),
(59, 43, 1, '2018-03-13 00:38:32', '2018-03-13 00:38:32'),
(60, 43, 3, '2018-03-13 00:38:41', '2018-03-13 00:38:41'),
(61, 42, 1, '2018-03-13 01:14:46', '2018-03-13 01:14:46'),
(62, 42, 2, '2018-03-13 01:14:55', '2018-03-13 01:14:55'),
(63, 42, 3, '2018-03-13 01:15:11', '2018-03-13 01:15:11'),
(64, 41, 2, '2018-03-14 00:42:27', '2018-03-14 00:42:27'),
(65, 40, 1, '2018-03-14 03:43:39', '2018-03-14 03:43:39'),
(66, 40, 2, '2018-03-14 03:44:34', '2018-03-14 03:44:34'),
(67, 41, 3, '2018-03-14 03:50:08', '2018-03-14 03:50:08'),
(68, 40, 4, '2018-03-22 20:11:04', '2018-03-22 20:11:04');

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
(6, 'Lead 1', 0, NULL, NULL, 'lead1@gmail.com', '09038213123', 'New CEO of XZY company.\r\nAlso interested by a car insurance. \r\nPlease contact ASAP', 4, 0, 2, 2, '2018-01-23 12:26:11', '2018-01-31 03:32:22'),
(7, 'Philippe ROBERT', 0, NULL, NULL, NULL, '197870909', NULL, 4, 0, 2, 1, '2018-01-26 04:08:24', '2018-01-31 11:59:48'),
(9, 'Mathieu Lindeman', 0, NULL, NULL, 'mathieu@gmail.com', NULL, 'Urgent!!!', 4, 4, 2, 2, '2018-01-30 07:30:59', '2018-02-08 03:50:16'),
(10, 'Duc Nguon', 0, NULL, NULL, 'duc.nguon@amagumolabs.com', NULL, 'URGENT CONTACT ASAP', 4, 4, 2, 2, '2018-01-31 12:19:39', '2018-02-08 03:40:52'),
(11, 'Binh Minh NGUYEN', 0, NULL, NULL, 'minh@amagumolabs.com', NULL, NULL, 4, 3, 3, 2, '2018-01-31 12:20:20', '2018-02-01 11:54:04'),
(12, 'Jean-David Silberzan', 0, NULL, NULL, 'jd@email.com', NULL, NULL, 4, 0, 4, 2, '2018-02-06 02:33:30', '2018-02-06 02:33:30'),
(13, 'Thuy', 0, NULL, NULL, 'thuy@email.com', NULL, NULL, 4, 2, 4, 2, '2018-02-06 02:35:33', '2018-02-08 03:38:32'),
(14, 'Bùi Tiến Dũng', 0, NULL, NULL, NULL, '0983987613', NULL, 5, 1, 3, 2, '2018-02-06 12:56:06', '2018-02-08 03:38:21'),
(15, 'Trần Quang Khải', 0, NULL, NULL, 'khaiquang@gmail.com', '0938786323', NULL, 10, 3, 4, 1, '2018-02-06 13:23:05', '2018-02-06 13:32:14'),
(16, 'Đào Duy Từ', 0, NULL, NULL, 'tuduy@gmail.com', '098765872', NULL, 9, 0, 10, 1, '2018-02-06 13:24:25', '2018-02-06 13:24:25'),
(18, 'Phạm Trần Nhật Kỳ', 0, NULL, NULL, 'nhatky@gmail.com', '09876621345', NULL, 10, 3, 11, 2, '2018-02-08 03:49:00', '2018-02-08 03:49:18'),
(19, 'Võ Thị Thanh Nhàn', 0, NULL, NULL, 'nhanvo@gmail.com', '0988783617', NULL, 6, 4, 4, 2, '2018-02-08 03:52:15', '2018-02-08 03:55:14'),
(20, 'Bùi Tuấn Khương', 0, NULL, NULL, 'khuongbui@gmail.com', '', NULL, 7, 3, 4, 2, '2018-02-08 03:52:46', '2018-02-08 03:54:59'),
(21, 'Phí Ngọc Hưng', 0, NULL, NULL, 'ngochung@gmail.com', NULL, NULL, 5, 2, 4, 2, '2018-02-08 03:53:48', '2018-02-08 03:54:42'),
(22, 'Phùng Văn Trung', 0, NULL, NULL, NULL, '0987762345', NULL, 8, 1, 4, 2, '2018-02-08 03:54:15', '2018-02-08 03:54:26'),
(23, 'Trần Thanh Duy', 0, NULL, NULL, NULL, '093787662', NULL, 11, 0, 2, 2, '2018-02-08 04:35:52', '2018-02-08 04:35:52'),
(24, 'Hồ Ngọc Hà', 1, NULL, NULL, 'hangocho@gmail.com', NULL, NULL, 10, 0, 3, 2, '2018-02-08 04:37:02', '2018-02-08 04:37:02'),
(25, 'Cường Seven', 0, NULL, NULL, 'cuong7@gmail.com', NULL, NULL, 5, 3, 3, 2, '2018-02-08 04:37:42', '2018-02-08 04:40:33'),
(26, 'Nguyễn Minh Nhật', 0, NULL, NULL, 'nguyenminhnhat@gmail.com', '0165965487', 'Call him in today', 8, 0, 13, 2, '2018-02-08 08:26:52', '2018-03-01 04:42:25'),
(27, 'Đoàn Thị Ngọc Thắm', 1, NULL, NULL, 'ngoctham1990@gmail.com', '0985866123', 'Đoàn Thị Ngọc Thắm là một khác hàng tiềm năng', 11, 0, 13, 2, '2018-02-08 08:27:43', '2018-02-08 08:27:43'),
(28, 'Trần Công Tâm', 0, NULL, NULL, 'trangcongtam@yahoo.com', '0986123233', 'Trần Công Tâm là khách hàng mới', 6, 0, 13, 2, '2018-02-08 08:28:56', '2018-02-08 08:28:56'),
(29, 'Lâm Tâm Như', 1, NULL, NULL, 'lamtamnhu@gmail.com', '09873222323', 'Lâm Tâm Như là khách hàng nước ngoài', 12, 0, 13, 4, '2018-02-08 08:30:49', '2018-02-08 08:30:49'),
(30, 'Phạm Thị Kim Ngọc', 1, NULL, NULL, 'phamthikimngoc@gmail.com', '098612343', 'Phạm Kim Ngọc là khách hàng rất có tìm năng', 8, 0, 3, 3, '2018-02-08 08:39:16', '2018-02-08 08:39:16'),
(31, 'Trần Thanh Tâm', 0, NULL, NULL, 'tranthanhtam@gmail.com', '01659878232', 'Trần Thanh Tâm', 9, 0, 3, 3, '2018-02-08 08:39:47', '2018-02-08 08:39:47'),
(32, 'Nguyễn Minh Đạt', 0, NULL, NULL, 'nguyenminhdat@gmail.com', '098651233233', 'Nguyễn Minh Đạt là khách hàng mới', 4, 1, 3, 1, '2018-02-08 08:41:43', '2018-03-02 06:49:21'),
(35, 'Cao Minh Đạt', 0, NULL, NULL, NULL, '00908989773', NULL, 6, 2, 27, 2, '2018-03-02 03:34:05', '2018-03-12 03:32:02'),
(36, 'Nguôn Đức', 0, NULL, NULL, NULL, '09372987873', NULL, 10, 0, 27, 2, '2018-03-12 20:05:26', '2018-03-12 20:05:26'),
(37, 'Nguôn Đức', 0, NULL, NULL, NULL, '09372987873', NULL, 10, 0, 27, 2, '2018-03-12 20:07:56', '2018-03-12 20:07:56'),
(39, 'Nguyễn Ký', 0, NULL, NULL, NULL, '009978423', NULL, 9, 1, 27, 3, '2018-03-12 20:13:27', '2018-03-12 20:17:18'),
(40, 'Trần Minh Bảo', 0, NULL, NULL, NULL, '0997872123', NULL, 11, 4, 27, 1, '2018-03-12 20:34:15', '2018-03-22 20:11:04'),
(41, 'Hà Duy Minh', 0, NULL, NULL, NULL, '090897897', NULL, 8, 3, 27, 3, '2018-03-12 20:35:49', '2018-03-14 03:50:09'),
(42, 'Phạm Hoàng Gia Minh', 0, NULL, NULL, NULL, '0899878676', NULL, 6, 3, 27, 2, '2018-03-12 20:56:59', '2018-03-13 01:15:11'),
(43, 'Phạm Phú Phạm Gia', 0, NULL, NULL, NULL, '09978786', NULL, 8, 3, 27, 3, '2018-03-12 20:58:29', '2018-03-13 00:38:41'),
(47, 'Hàn Chung Tú', 0, NULL, NULL, NULL, '03809897312', NULL, 6, 3, 27, 3, '2018-03-12 21:15:31', '2018-03-12 21:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `logs_sent_message_templates`
--

CREATE TABLE `logs_sent_message_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED DEFAULT NULL,
  `receiver_id` int(10) UNSIGNED DEFAULT NULL,
  `message_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs_sent_message_templates`
--

INSERT INTO `logs_sent_message_templates` (`id`, `sender_id`, `receiver_id`, `message_id`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 0, 27, NULL, 'E-mail thông báo về trạng thái của lead', '<p>\r\n\r\n</p><p>Xin chào Pham Thi Dang Thuy,</p><p>Lead Trần Minh Bảo của bạn đã được chuyển trạng thái đến \"Báo Giá\".</p><p>Cảm ơn và trân trọng.</p>\r\n\r\n<br><p></p>', '2018-03-14 03:44:34', '2018-03-14 03:44:34'),
(2, 0, 27, 'update_lead_win', 'E-mail Thông báo về trạng thái của lead', '<p>Xin chào Pham Thi Dang Thuy,</p><p>Lead Hà Duy Minh đã được chuyển đến trạng thái \"THÀNH CÔNG\".</p><p>Cảm ơn và trân trọng</p>', '2018-03-14 03:50:09', '2018-03-14 03:50:09'),
(3, 0, 27, 'plus_points_tipster', 'Thông báo về điểm thưởng', '<p>Xin chào Pham Thi Dang Thuy,</p><p>Chúc mừng bạn đã nhận được <b>50</b> điểm từ việc giới thiệu lead <b>Hà Duy Minh</b> với sản phẩm Office.</p><p>Điểm hiện tại của bạn là: <b>850 </b>points.<b></b></p><p>Cảm ơn và trân trọng.</p>', '2018-03-14 03:50:24', '2018-03-14 03:50:24'),
(4, 1, 27, 'update_points_tipster', 'Thông báo về cập nhật điểm thưởng', '<p>Xin chào Pham Thi Dang Thuy,</p><p>\r\n\r\nXin lỗi điểm thưởng cho lead Đoàn Thị Ngọc Thắm với sản phẩm Student đã được thay đổi.<br>Bạn nhận được 90 điểm.</p><p>Điểm hiện tại của bạn là: 90 điểm.</p><p>Cảm ơn và trân trọng.</p><p>(Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với Admin)</p>', '2018-03-14 03:55:47', '2018-03-14 03:55:47'),
(5, 0, 27, 'update_lead_lost', 'E-mail Thông báo về trạng thái của lead', '<p>Xin chào Phạm Thị Đang Thùy - Tipster,</p><p>Lead Trần Minh Bảo của bạn đã chuyển sang trạng thái \"Thất bại\".</p><p>Cảm ơn và trân trọng.</p>', '2018-03-22 20:11:05', '2018-03-22 20:11:05'),
(6, 1, 27, 'plus_points_tipster', 'Thông báo về điểm thưởng', '<p>Xin chào Phạm Thị Đang Thùy - Tipster,</p><p>Chúc mừng bạn đã nhận được <b>0</b> điểm từ việc giới thiệu lead <b></b> với sản phẩm .</p><p>Điểm hiện tại của bạn là: <b>0 </b>points.<b></b></p><p>Cảm ơn và trân trọng.</p>', '2018-03-22 20:19:03', '2018-03-22 20:19:03'),
(7, 1, 27, 'test tesst', NULL, '', '2018-03-22 20:20:16', '2018-03-22 20:20:16'),
(8, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-22 20:37:16', '2018-03-22 20:37:16'),
(9, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-22 20:46:06', '2018-03-22 20:46:06'),
(10, 1, 26, 'test tesst', NULL, '', '2018-03-22 20:47:36', '2018-03-22 20:47:36'),
(11, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-22 21:18:38', '2018-03-22 21:18:38'),
(12, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-23 00:36:20', '2018-03-23 00:36:20'),
(13, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-23 00:51:14', '2018-03-23 00:51:14'),
(14, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-23 01:08:44', '2018-03-23 01:08:44'),
(15, 1, 26, 'plus_points_tipster', 'Notification about bonus points', '<p>Hello tipster16,</p><p>Congratulations you have received <b>0</b> points from the introduction<b> </b> for product .</p><p>Your current points: <b>0</b></p><p>Thank you and best reagards.</p>', '2018-03-23 02:47:13', '2018-03-23 02:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `affected_object` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `user_id`, `affected_object`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lead', 'Created', 'Created Lead : Trần Quang Khải', '2018-02-06 13:23:05', '2018-02-06 13:23:05'),
(2, 10, 'Lead', 'Created', 'Created Lead : Đào Duy Từ', '2018-02-06 13:24:25', '2018-02-06 13:24:25'),
(3, 1, 'Tipster', 'Created', 'Created Tipster : Nguyễn Minh Hùng', '2018-02-06 13:27:11', '2018-02-06 13:27:11'),
(7, 1, 'Lead', 'Created', 'Created Lead : Nguyễn Minh Hùng', '2018-02-08 03:44:41', '2018-02-08 03:44:41'),
(8, 1, 'Lead', 'Created', 'Created Lead : Phạm Trần Nhật Kỳ', '2018-02-08 03:49:00', '2018-02-08 03:49:00'),
(9, 1, 'Lead', 'Update points', 'Update points Lead : Lead', '2018-02-08 03:49:29', '2018-02-08 03:49:29'),
(10, 1, 'Lead', 'Created', 'Created Lead : Võ Thị Thanh Nhàn', '2018-02-08 03:52:15', '2018-02-08 03:52:15'),
(11, 1, 'Lead', 'Created', 'Created Lead : Bùi Tuấn Khương', '2018-02-08 03:52:46', '2018-02-08 03:52:46'),
(12, 1, 'Lead', 'Created', 'Created Lead : Phí Ngọc Hưng', '2018-02-08 03:53:48', '2018-02-08 03:53:48'),
(13, 1, 'Lead', 'Created', 'Created Lead : Phùng Văn Trung', '2018-02-08 03:54:15', '2018-02-08 03:54:15'),
(14, 3, 'Lead', 'Created', 'Created Lead : Trần Thanh Duy', '2018-02-08 04:35:52', '2018-02-08 04:35:52'),
(15, 3, 'Lead', 'Created', 'Created Lead : Hồ Ngọc Hà', '2018-02-08 04:37:02', '2018-02-08 04:37:02'),
(16, 3, 'Lead', 'Created', 'Created Lead : Cường Seven', '2018-02-08 04:37:42', '2018-02-08 04:37:42'),
(17, 6, 'Lead', 'Update points', 'Update points of Tipster : tipster3', '2018-02-08 04:40:39', '2018-02-08 04:40:39'),
(18, 1, 'Tipster', 'Created', 'Created Tipster : Lương Gia Hân', '2018-02-08 08:13:59', '2018-02-08 08:13:59'),
(19, 9, 'Tipster', 'Created', 'Created Tipster : Phạm Ánh Chiến', '2018-02-08 08:18:49', '2018-02-08 08:18:49'),
(20, 9, 'Tipster', 'Created', 'Created Tipster : Tạ Hoàng Phương Trung', '2018-02-08 08:24:13', '2018-02-08 08:24:13'),
(21, 13, 'Lead', 'Created', 'Created Lead : Nguyễn Minh Nhật', '2018-02-08 08:26:52', '2018-02-08 08:26:52'),
(22, 13, 'Lead', 'Created', 'Created Lead : Đoàn Thị Ngọc Thắm', '2018-02-08 08:27:43', '2018-02-08 08:27:43'),
(23, 9, 'Tipster', 'Created', 'Created Tipster : Trần Cao Vân', '2018-02-08 08:27:59', '2018-02-08 08:27:59'),
(24, 13, 'Lead', 'Created', 'Created Lead : Trần Công Tâm', '2018-02-08 08:28:18', '2018-02-08 08:28:18'),
(25, 13, 'Lead', 'Created', 'Created Lead : Trần Công Tâm', '2018-02-08 08:28:56', '2018-02-08 08:28:56'),
(26, 13, 'Lead', 'Created', 'Created Lead : Lâm Tâm Như', '2018-02-08 08:30:49', '2018-02-08 08:30:49'),
(27, 3, 'Lead', 'Created', 'Created Lead : Phạm Thị Kim Ngọc', '2018-02-08 08:39:16', '2018-02-08 08:39:16'),
(28, 3, 'Lead', 'Created', 'Created Lead : Trần Thanh Tâm', '2018-02-08 08:39:47', '2018-02-08 08:39:47'),
(29, 3, 'Lead', 'Created', 'Created Lead : Nguyễn Minh Đạt', '2018-02-08 08:41:43', '2018-02-08 08:41:43'),
(30, 3, 'Lead', 'Created', 'Created Lead : Phạm Phú Toàn', '2018-02-08 08:43:00', '2018-02-08 08:43:00'),
(31, 3, 'Lead', 'Created', 'Created Lead : Đinh Ngọc Diệp', '2018-02-08 08:43:34', '2018-02-08 08:43:34'),
(32, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-02-09 12:31:39', '2018-02-09 12:31:39'),
(33, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-02-13 09:52:17', '2018-02-13 09:52:17'),
(34, 1, 'Gift', 'update', 'update Gift : Quà tặng trải nghiệm đặc biệt - Sensesclub Crystal', '2018-02-13 09:52:42', '2018-02-13 09:52:42'),
(35, 1, 'Lead', 'delete', 'delete Lead : Phạm Phú Toàn', '2018-02-26 23:58:28', '2018-02-26 23:58:28'),
(37, 1, 'Tipster', 'created', 'created Tipster : Marion Nguyen', '2018-02-27 01:43:16', '2018-02-27 01:43:16'),
(38, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-02-27 02:34:10', '2018-02-27 02:34:10'),
(39, 1, 'Gift', 'update', 'update Gift : Food Boxes Lock and Lock', '2018-02-27 02:35:53', '2018-02-27 02:35:53'),
(40, 1, 'Product', 'delete', 'delete Product : Medical', '2018-03-01 02:45:23', '2018-03-01 02:45:23'),
(41, 1, 'Product', 'created', 'created Product : Medical', '2018-03-01 02:46:42', '2018-03-01 02:46:42'),
(42, 1, 'Product', 'delete', 'delete Product : Other', '2018-03-01 02:49:48', '2018-03-01 02:49:48'),
(43, 1, 'Product', 'created', 'created Product : Other', '2018-03-01 04:40:35', '2018-03-01 04:40:35'),
(44, 1, 'Lead', 'update', 'update Lead : Nguyễn Minh Nhật', '2018-03-01 04:42:25', '2018-03-01 04:42:25'),
(45, 1, 'Product', 'update', 'update Product : Auto/Moto', '2018-03-01 04:44:33', '2018-03-01 04:44:33'),
(46, 1, 'Product', 'update', 'update Product : Medical', '2018-03-01 04:45:38', '2018-03-01 04:45:38'),
(47, 1, 'Product', 'update', 'update Product : Shops', '2018-03-01 04:46:46', '2018-03-01 04:46:46'),
(48, 1, 'Lead', 'delete', 'delete Lead : Đinh Ngọc Diệp', '2018-03-01 10:14:02', '2018-03-01 10:14:02'),
(49, 1, 'Tipster', 'created', 'created Tipster : Philippe Nguyen', '2018-03-01 10:16:26', '2018-03-01 10:16:26'),
(50, 1, 'Lead', 'update', 'update Lead : Nguyễn Minh Đạt', '2018-03-02 06:49:21', '2018-03-02 06:49:21'),
(51, 1, 'Gift', 'created', 'created Gift : 10.5-inch iPad Pro Wi-Fi 64GB - Rose Gold - Apple', '2018-03-02 07:01:02', '2018-03-02 07:01:02'),
(52, 1, 'Gift', 'created', 'created Gift : iPhone X 256GB', '2018-03-02 07:08:39', '2018-03-02 07:08:39'),
(53, 1, 'Gift', 'update', 'update Gift : Food Boxes Lock and Lock', '2018-03-02 07:10:24', '2018-03-02 07:10:24'),
(54, 1, 'Gift', 'update', 'update Gift : Quà tặng trải nghiệm đặc biệt - Sensesclub Crystal', '2018-03-02 07:12:03', '2018-03-02 07:12:03'),
(55, 1, 'Gift', 'created', 'created Gift : Samsung Galaxy J8 2018', '2018-03-02 07:15:14', '2018-03-02 07:15:14'),
(56, 1, 'Gift', 'created', 'created Gift : Samsung RSA1STSL Side-By-Side Fridge 550L', '2018-03-02 07:17:42', '2018-03-02 07:17:42'),
(57, 1, 'Gift', 'update', 'update Gift : Samsung RSA1STSL Side-By-Side Fridge 550L', '2018-03-02 07:18:02', '2018-03-02 07:18:02'),
(58, 1, 'Gift', 'created', 'created Gift : LG TONE PRO wireless Bluetooth headset (HBS-760)', '2018-03-02 07:20:42', '2018-03-02 07:20:42'),
(59, 1, 'Gift', 'created', 'created Gift : Bangkok-Pattaya - Khách sạn 3* Tặng vé xem Nanta show', '2018-03-02 07:23:52', '2018-03-02 07:23:52'),
(60, 1, 'Gift', 'created', 'created Gift : DÂY CHUYỀN PNJ VÀNG 18K', '2018-03-02 07:26:19', '2018-03-02 07:26:19'),
(61, 1, 'Gift', 'created', 'created Gift : Apple Ipad Mini 32 Gb Wifi + 3G', '2018-03-02 07:28:22', '2018-03-02 07:28:22'),
(62, 1, 'Gift', 'created', 'created Gift : SMART TIVI LG 65 INCH 65UJ632T, 4K HDR', '2018-03-02 07:30:27', '2018-03-02 07:30:27'),
(63, 1, 'Gift', 'created', 'created Gift : Vision 2018', '2018-03-02 08:10:56', '2018-03-02 08:10:56'),
(64, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-03-02 01:20:39', '2018-03-02 01:20:39'),
(65, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-03-02 01:33:14', '2018-03-02 01:33:14'),
(66, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-03-02 01:35:08', '2018-03-02 01:35:08'),
(67, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-03-02 01:35:43', '2018-03-02 01:35:43'),
(68, 1, 'Tipster', 'update', 'update Tipster : Tạ Hoàng Phương Trung', '2018-03-02 01:35:51', '2018-03-02 01:35:51'),
(69, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-03-02 01:36:51', '2018-03-02 01:36:51'),
(70, 1, 'Tipster', 'update', 'update Tipster : Trần Cao Vân', '2018-03-02 01:39:37', '2018-03-02 01:39:37'),
(71, 1, 'Tipster', 'update', 'update Tipster : Tạ Hoàng Phương Trung', '2018-03-02 01:39:55', '2018-03-02 01:39:55'),
(72, 1, 'Tipster', 'update', 'update Tipster : Phạm Ánh Chiến', '2018-03-02 01:40:01', '2018-03-02 01:40:01'),
(73, 1, 'Tipster', 'update', 'update Tipster : Lương Gia Hân', '2018-03-02 01:40:07', '2018-03-02 01:40:07'),
(74, 1, 'Tipster', 'update', 'update Tipster : Nguyễn Minh Hùng', '2018-03-02 01:40:13', '2018-03-02 01:40:13'),
(75, 1, 'Tipster', 'update', 'update Tipster : Nguyễn Trần Nhất Huy', '2018-03-02 01:40:20', '2018-03-02 01:40:20'),
(76, 1, 'Tipster', 'update', 'update Tipster : Nguyen Tran Ngoc Tran', '2018-03-02 01:40:27', '2018-03-02 01:40:27'),
(77, 1, 'Tipster', 'update', 'update Tipster : Hà Duy Minh', '2018-03-02 01:40:35', '2018-03-02 01:40:35'),
(78, 1, 'User', 'created', 'created User : Pham Dang Thuy', '2018-03-02 02:50:11', '2018-03-02 02:50:11'),
(79, 1, 'User', 'created', 'created User : Pham Dang Thuy', '2018-03-02 02:50:36', '2018-03-02 02:50:36'),
(80, 1, 'User', 'created', 'created User : Pham Dang Thuy', '2018-03-02 02:50:55', '2018-03-02 02:50:55'),
(81, 1, 'Tipster', 'created', 'created Tipster : Nguyen Minh Tuan', '2018-03-02 03:00:30', '2018-03-02 03:00:30'),
(82, 1, 'Tipster', 'update', 'update Tipster : Nguyen Minh Tuan', '2018-03-02 03:05:45', '2018-03-02 03:05:45'),
(83, 1, 'Lead', 'update', 'update Lead : Nguyễn Minh Đạt', '2018-03-02 03:08:13', '2018-03-02 03:08:13'),
(84, 1, 'Lead', 'update', 'update Lead : Nguyễn Minh Đạt', '2018-03-02 03:08:36', '2018-03-02 03:08:36'),
(85, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-03-02 03:10:18', '2018-03-02 03:10:18'),
(87, 1, 'Tipster', 'created', 'created Tipster : Nguyễn Trần Bảo Trân', '2018-03-04 19:42:38', '2018-03-04 19:42:38'),
(88, 1, 'Tipster', 'created', 'created Tipster : Nguyễn Ngọc Kỳ Duyên', '2018-03-04 19:44:11', '2018-03-04 19:44:11'),
(89, 1, 'Tipster', 'created', 'created Tipster : Ha Tran Bao Minh', '2018-03-04 19:52:25', '2018-03-04 19:52:25'),
(90, 1, 'Tipster', 'created', 'created Tipster : Ha Tran Bao Minh', '2018-03-04 19:53:00', '2018-03-04 19:53:00'),
(91, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:08:08', '2018-03-04 20:08:08'),
(92, 1, 'Tipster', 'created', 'created Tipster : tipster13', '2018-03-04 20:17:14', '2018-03-04 20:17:14'),
(93, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:23:20', '2018-03-04 20:23:20'),
(94, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:24:49', '2018-03-04 20:24:49'),
(95, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:26:17', '2018-03-04 20:26:17'),
(96, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:54:59', '2018-03-04 20:54:59'),
(97, 1, 'Tipster', 'created', 'created Tipster : Trần Bảo Kool', '2018-03-04 20:55:46', '2018-03-04 20:55:46'),
(98, 1, 'Tipster', 'created', 'created Tipster : Khong Cao Thanh Tam', '2018-03-04 21:03:31', '2018-03-04 21:03:31'),
(99, 1, 'Tipster', 'created', 'created Tipster : Khong Cao Thanh Tam', '2018-03-04 21:04:50', '2018-03-04 21:04:50'),
(100, 1, 'Tipster', 'created', 'created Tipster : Khong Cao Thanh Tam', '2018-03-04 21:06:29', '2018-03-04 21:06:29'),
(101, 1, 'Tipster', 'created', 'created Tipster : Khong Cao Thanh Tam', '2018-03-04 21:06:59', '2018-03-04 21:06:59'),
(102, 1, 'Tipster', 'created', 'created Tipster : Tạ Thị Bích Loan', '2018-03-04 21:08:37', '2018-03-04 21:08:37'),
(103, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:33:44', '2018-03-04 21:33:44'),
(104, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:34:46', '2018-03-04 21:34:46'),
(105, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:35:22', '2018-03-04 21:35:22'),
(106, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:37:05', '2018-03-04 21:37:05'),
(107, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:38:23', '2018-03-04 21:38:23'),
(108, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:38:57', '2018-03-04 21:38:57'),
(109, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:39:55', '2018-03-04 21:39:55'),
(110, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:40:35', '2018-03-04 21:40:35'),
(111, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:41:22', '2018-03-04 21:41:22'),
(112, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:42:08', '2018-03-04 21:42:08'),
(113, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:42:16', '2018-03-04 21:42:16'),
(114, 1, 'Tipster', 'update', 'update Tipster : Khong Cao Thanh Tam', '2018-03-04 21:42:39', '2018-03-04 21:42:39'),
(115, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 21:43:25', '2018-03-04 21:43:25'),
(116, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 21:49:15', '2018-03-04 21:49:15'),
(117, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 22:06:35', '2018-03-04 22:06:35'),
(118, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 22:10:19', '2018-03-04 22:10:19'),
(119, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 22:10:37', '2018-03-04 22:10:37'),
(120, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 22:11:37', '2018-03-04 22:11:37'),
(121, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 23:39:59', '2018-03-04 23:39:59'),
(122, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-04 23:48:15', '2018-03-04 23:48:15'),
(123, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-05 00:15:02', '2018-03-05 00:15:02'),
(124, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-05 00:17:04', '2018-03-05 00:17:04'),
(125, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-05 00:17:37', '2018-03-05 00:17:37'),
(126, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-03-05 00:30:40', '2018-03-05 00:30:40'),
(127, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-03-05 00:37:07', '2018-03-05 00:37:07'),
(128, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-03-05 00:37:20', '2018-03-05 00:37:20'),
(129, 1, 'Community Manager', 'update', 'update Community Manager : Community Manager', '2018-03-05 00:38:12', '2018-03-05 00:38:12'),
(130, 1, 'User', 'created', 'created User : Nguyen Ngoc Huy', '2018-03-05 00:40:40', '2018-03-05 00:40:40'),
(131, 1, 'Product', 'created', 'created Product : test', '2018-03-05 00:47:52', '2018-03-05 00:47:52'),
(132, 1, 'Product', 'created', 'created Product : test', '2018-03-05 00:48:59', '2018-03-05 00:48:59'),
(133, 1, 'Product', 'created', 'created Product : Landing Padonal', '2018-03-05 00:50:01', '2018-03-05 00:50:01'),
(134, 1, 'Product', 'created', 'created Product : 23123', '2018-03-05 00:51:28', '2018-03-05 00:51:28'),
(135, 1, 'Product', 'created', 'created Product', '2018-03-05 00:55:27', '2018-03-05 00:55:27'),
(136, 1, 'Product', 'created', 'created Product : test', '2018-03-05 00:56:05', '2018-03-05 00:56:05'),
(137, 1, 'Product', 'created', 'created Product : twer', '2018-03-05 00:56:57', '2018-03-05 00:56:57'),
(138, 1, 'Product', 'update', 'update Product : twer', '2018-03-05 01:03:04', '2018-03-05 01:03:04'),
(139, 1, 'Product', 'update', 'update Product : twer', '2018-03-05 01:08:59', '2018-03-05 01:08:59'),
(140, 1, 'Product', 'update', 'update Product : twer', '2018-03-05 01:09:38', '2018-03-05 01:09:38'),
(141, 1, 'Product', 'update', 'update Product : twer', '2018-03-05 01:09:53', '2018-03-05 01:09:53'),
(142, 1, 'Product', 'update', 'update Product : Auto/Moto', '2018-03-05 01:10:55', '2018-03-05 01:10:55'),
(143, 1, 'Product', 'update', 'update Product : Medical', '2018-03-05 01:11:12', '2018-03-05 01:11:12'),
(144, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-03-05 01:24:05', '2018-03-05 01:24:05'),
(145, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-03-05 01:25:24', '2018-03-05 01:25:24'),
(146, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-03-05 01:25:32', '2018-03-05 01:25:32'),
(147, 1, 'Gift', 'created', 'created Gift : test gift', '2018-03-05 01:25:56', '2018-03-05 01:25:56'),
(148, 1, 'Gift', 'created', 'created Gift : weqweqwe', '2018-03-05 01:27:00', '2018-03-05 01:27:00'),
(149, 1, 'Gift', 'delete', 'delete Gift : weqweqwe', '2018-03-05 01:27:09', '2018-03-05 01:27:09'),
(150, 1, 'Gift', 'delete', 'delete Gift : test gift', '2018-03-05 01:28:08', '2018-03-05 01:28:08'),
(151, 1, 'Tipster', 'delete', 'delete Tipster : Tạ Thị Bích Loan', '2018-03-05 02:47:50', '2018-03-05 02:47:50'),
(152, 1, 'Lead', 'update', 'update Lead : Cao Minh Đạt', '2018-03-05 02:54:51', '2018-03-05 02:54:51'),
(153, 1, 'Lead', 'created', 'created Lead : Ngoc Phung', '2018-03-05 03:32:47', '2018-03-05 03:32:47'),
(154, 1, 'Lead', 'created', 'created Lead : lead 20', '2018-03-05 04:22:27', '2018-03-05 04:22:27'),
(155, 1, 'Tipster', 'update', 'update Tipster : Tạ Thị Bích Loan', '2018-03-06 00:56:17', '2018-03-06 00:56:17'),
(156, 1, 'Tipster', 'created', 'created Tipster : Nguyễn Thị Tuyết Nhung', '2018-03-06 00:57:58', '2018-03-06 00:57:58'),
(157, 1, 'Tipster', 'update', 'update Tipster : Nguyễn Thị Tuyết Nhung', '2018-03-06 00:58:10', '2018-03-06 00:58:10'),
(158, 1, 'Community Manager', 'update', 'update Community Manager : Admin', '2018-03-06 01:20:54', '2018-03-06 01:20:54'),
(159, 1, 'Community Manager', 'update', 'update Community Manager : Sale Manager', '2018-03-06 01:24:27', '2018-03-06 01:24:27'),
(160, 1, 'Tipster', 'created', 'created Tipster : Pham Thi Dang Thuy', '2018-03-08 20:36:41', '2018-03-08 20:36:41'),
(161, 1, 'Tipster', 'created', 'created Tipster : Pham Thi Dang Thuy', '2018-03-08 20:38:35', '2018-03-08 20:38:35'),
(162, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-09 03:21:33', '2018-03-09 03:21:33'),
(163, 1, 'Lead', 'update', 'update Lead', '2018-03-11 19:39:31', '2018-03-11 19:39:31'),
(164, 1, 'Lead', 'update', 'update Lead : lead 20', '2018-03-11 21:28:05', '2018-03-11 21:28:05'),
(165, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:28:32', '2018-03-11 21:28:32'),
(166, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:29:00', '2018-03-11 21:29:00'),
(167, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:33:38', '2018-03-11 21:33:38'),
(168, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:33:45', '2018-03-11 21:33:45'),
(169, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:34:20', '2018-03-11 21:34:20'),
(170, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:48:58', '2018-03-11 21:48:58'),
(171, 1, 'Lead', 'update', 'update Lead', '2018-03-11 21:50:09', '2018-03-11 21:50:09'),
(172, 1, 'Lead', 'update', 'update Lead', '2018-03-11 22:00:44', '2018-03-11 22:00:44'),
(174, 1, 'Lead', 'update', 'update Lead', '2018-03-12 02:53:36', '2018-03-12 02:53:36'),
(175, 1, 'Lead', 'update', 'update Lead', '2018-03-12 02:55:18', '2018-03-12 02:55:18'),
(176, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-12 02:55:48', '2018-03-12 02:55:48'),
(177, 1, 'Lead', 'update', 'update Lead', '2018-03-12 03:06:58', '2018-03-12 03:06:58'),
(178, 1, 'Lead', 'update', 'update Lead : Cao Minh Đạt', '2018-03-12 03:16:48', '2018-03-12 03:16:48'),
(179, 1, 'Lead', 'update', 'update Lead', '2018-03-12 03:16:55', '2018-03-12 03:16:55'),
(180, 1, 'Lead', 'update', 'update Lead', '2018-03-12 03:32:01', '2018-03-12 03:32:01'),
(181, 1, 'Lead', 'created', 'created Lead : Nguôn Đức', '2018-03-12 20:05:26', '2018-03-12 20:05:26'),
(182, 1, 'Lead', 'created', 'created Lead : Nguôn Đức', '2018-03-12 20:07:56', '2018-03-12 20:07:56'),
(183, 1, 'Lead', 'created', 'created Lead : Nguyễn Ký', '2018-03-12 20:12:09', '2018-03-12 20:12:09'),
(184, 1, 'Lead', 'created', 'created Lead : Nguyễn Ký', '2018-03-12 20:13:27', '2018-03-12 20:13:27'),
(185, 1, 'Lead', 'delete', 'delete Lead : Nguyễn Ký', '2018-03-12 20:13:51', '2018-03-12 20:13:51'),
(186, 1, 'Lead', 'update', 'update Lead', '2018-03-12 20:17:18', '2018-03-12 20:17:18'),
(187, 1, 'Lead', 'created', 'created Lead : Trần Minh Bảo', '2018-03-12 20:34:15', '2018-03-12 20:34:15'),
(188, 1, 'Lead', 'created', 'created Lead : Hà Duy Minh', '2018-03-12 20:35:49', '2018-03-12 20:35:49'),
(189, 1, 'Lead', 'update', 'update Lead', '2018-03-12 20:36:53', '2018-03-12 20:36:53'),
(190, 1, 'Lead', 'created', 'created Lead : Phạm Hoàng Gia Minh', '2018-03-12 20:56:58', '2018-03-12 20:56:58'),
(191, 1, 'Lead', 'created', 'created Lead : Phạm Phú Phạm Gia', '2018-03-12 20:58:28', '2018-03-12 20:58:28'),
(192, 1, 'Lead', 'created', 'created Lead : Phạm Phú Phạm Gia', '2018-03-12 20:59:15', '2018-03-12 20:59:15'),
(193, 1, 'Lead', 'created', 'created Lead : Phạm Phú Phạm Gia', '2018-03-12 21:00:56', '2018-03-12 21:00:56'),
(194, 1, 'Lead', 'created', 'created Lead : Phạm Phú Phạm Gia', '2018-03-12 21:01:57', '2018-03-12 21:01:57'),
(195, 1, 'Lead', 'delete', 'delete Lead : Phạm Phú Phạm Gia', '2018-03-12 21:02:48', '2018-03-12 21:02:48'),
(196, 1, 'Lead', 'delete', 'delete Lead : Phạm Phú Phạm Gia', '2018-03-12 21:02:56', '2018-03-12 21:02:56'),
(197, 1, 'Lead', 'update', 'update Lead', '2018-03-12 21:03:44', '2018-03-12 21:03:44'),
(198, 1, 'Lead', 'created', 'created Lead : Hàn Chung Tú', '2018-03-12 21:15:31', '2018-03-12 21:15:31'),
(199, 1, 'Lead', 'update', 'update Lead', '2018-03-12 21:21:30', '2018-03-12 21:21:30'),
(200, 1, 'Lead', 'update', 'update Lead', '2018-03-12 21:21:39', '2018-03-12 21:21:39'),
(201, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-12 21:21:51', '2018-03-12 21:21:51'),
(202, 1, 'Lead', 'update', 'update Lead', '2018-03-12 21:46:29', '2018-03-12 21:46:29'),
(203, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-12 21:46:43', '2018-03-12 21:46:43'),
(204, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 00:13:37', '2018-03-13 00:13:37'),
(205, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 00:37:23', '2018-03-13 00:37:23'),
(206, 1, 'Lead', 'update', 'update Lead', '2018-03-13 00:38:32', '2018-03-13 00:38:32'),
(207, 1, 'Lead', 'update', 'update Lead', '2018-03-13 00:38:41', '2018-03-13 00:38:41'),
(208, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 00:38:53', '2018-03-13 00:38:53'),
(209, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 01:07:48', '2018-03-13 01:07:48'),
(210, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 01:09:17', '2018-03-13 01:09:17'),
(211, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 01:10:10', '2018-03-13 01:10:10'),
(212, 1, 'Lead', 'update', 'update Lead', '2018-03-13 01:14:46', '2018-03-13 01:14:46'),
(213, 1, 'Lead', 'update', 'update Lead', '2018-03-13 01:14:55', '2018-03-13 01:14:55'),
(214, 1, 'Lead', 'update', 'update Lead', '2018-03-13 01:15:10', '2018-03-13 01:15:10'),
(215, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-13 01:15:25', '2018-03-13 01:15:25'),
(216, 1, 'Message template', 'update', 'update Message template : plus_points_tipster', '2018-03-13 02:41:51', '2018-03-13 02:41:51'),
(217, 1, 'Lead', 'update', 'update Lead : Hàn Chung Tú', '2018-03-13 02:44:03', '2018-03-13 02:44:03'),
(218, 1, 'Lead', 'update', 'update Lead : Trần Công Tâm', '2018-03-13 02:44:40', '2018-03-13 02:44:40'),
(219, 1, 'Message template', 'created', 'created Message template : plus_points_tipster', '2018-03-13 19:52:46', '2018-03-13 19:52:46'),
(220, 1, 'Message template', 'created', 'created Message template : plus_points_tipster', '2018-03-13 19:53:51', '2018-03-13 19:53:51'),
(221, 1, 'Message template', 'created', 'created Message template : plus_points_tipster', '2018-03-13 19:54:48', '2018-03-13 19:54:48'),
(222, 1, 'Message template', 'created', 'created Message template : plus_points_tipster', '2018-03-13 19:54:53', '2018-03-13 19:54:53'),
(223, 1, 'Lead', 'update', 'update Lead', '2018-03-14 00:42:27', '2018-03-14 00:42:27'),
(226, 1, 'Lead', 'update', 'update Lead', '2018-03-14 03:44:33', '2018-03-14 03:44:33'),
(227, 1, 'Lead', 'update', 'update Lead', '2018-03-14 03:50:08', '2018-03-14 03:50:08'),
(228, 1, 'Tipster', 'update points for', 'update points for Tipster : Pham Thi Dang Thuy', '2018-03-14 03:50:24', '2018-03-14 03:50:24'),
(229, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:42:09', '2018-03-14 21:42:09'),
(230, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:42:24', '2018-03-14 21:42:24'),
(231, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:43:16', '2018-03-14 21:43:16'),
(232, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:45:56', '2018-03-14 21:45:56'),
(233, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:53:00', '2018-03-14 21:53:00'),
(234, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:57:31', '2018-03-14 21:57:31'),
(235, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:58:31', '2018-03-14 21:58:31'),
(236, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:59:00', '2018-03-14 21:59:00'),
(237, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 21:59:23', '2018-03-14 21:59:23'),
(238, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 22:02:30', '2018-03-14 22:02:30'),
(239, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-14 22:06:51', '2018-03-14 22:06:51'),
(240, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-15 02:39:17', '2018-03-15 02:39:17'),
(241, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-15 02:39:52', '2018-03-15 02:39:52'),
(242, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-15 02:40:14', '2018-03-15 02:40:14'),
(243, 1, 'Tipster', 'update', 'update Tipster : Pham Thi Dang Thuy', '2018-03-15 02:40:36', '2018-03-15 02:40:36'),
(244, 1, 'Tipster', 'update', 'update Tipster : tipster_phamdangthuy2310', '2018-03-15 02:40:50', '2018-03-15 02:40:50'),
(245, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:44:22', '2018-03-15 02:44:22'),
(246, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:45:12', '2018-03-15 02:45:12'),
(247, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:45:22', '2018-03-15 02:45:22'),
(248, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:45:41', '2018-03-15 02:45:41'),
(249, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:46:28', '2018-03-15 02:46:28'),
(250, 1, 'Tipster', 'update', 'update Tipster : tipster2', '2018-03-15 02:46:36', '2018-03-15 02:46:36'),
(251, 1, 'Tipster', 'update', 'update Tipster : Nguyễn Thị Tuyết Nhung', '2018-03-15 02:47:52', '2018-03-15 02:47:52'),
(252, 1, 'Tipster', 'update', 'update Tipster : Nguyễn Thị Tuyết Nhung', '2018-03-15 02:48:03', '2018-03-15 02:48:03'),
(253, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-15 02:48:56', '2018-03-15 02:48:56'),
(254, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-15 02:49:10', '2018-03-15 02:49:10'),
(255, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-15 02:50:03', '2018-03-15 02:50:03'),
(256, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-15 02:50:11', '2018-03-15 02:50:11'),
(257, 1, 'Community Manager', 'update', 'update Community Manager : Sale Manager', '2018-03-15 02:53:02', '2018-03-15 02:53:02'),
(258, 1, 'Tipster', 'update', 'update Tipster : Phạm Thị Đang Thùy - Tipster', '2018-03-15 02:55:06', '2018-03-15 02:55:06'),
(259, 1, 'Community Manager', 'update', 'update Community Manager : Bùi Chí Công', '2018-03-15 03:14:03', '2018-03-15 03:14:03'),
(260, 1, 'Community Manager', 'update', 'update Community Manager : Bùi Chí Công', '2018-03-15 03:14:58', '2018-03-15 03:14:58'),
(261, 1, 'Tipster', 'update', 'update Tipster : Phạm Thị Đang Thùy - Tipster', '2018-03-15 03:40:08', '2018-03-15 03:40:08'),
(262, 1, 'Tipster', 'created', 'created Tipster : Ha Minh Han', '2018-03-15 03:48:05', '2018-03-15 03:48:05'),
(263, 1, 'Tipster', 'created', 'created Tipster : Ha Tran Bao Minh', '2018-03-15 03:49:17', '2018-03-15 03:49:17'),
(264, 1, 'Lead', 'delete', 'delete Lead : Phạm Phú Phạm Gia', '2018-03-16 00:44:46', '2018-03-16 00:44:46'),
(265, 1, 'Message template', 'created', 'created Message template : test tesst', '2018-03-19 02:57:41', '2018-03-19 02:57:41'),
(266, 1, 'Product', 'created', 'created Product : 434234', '2018-03-19 03:49:43', '2018-03-19 03:49:43'),
(267, 1, 'Product', 'created', 'created Product : 434234', '2018-03-19 03:50:33', '2018-03-19 03:50:33'),
(268, 1, 'Product', 'created', 'created Product : 323123', '2018-03-19 03:51:35', '2018-03-19 03:51:35'),
(269, 31, 'Tipster', 'update', 'update Tipster', '2018-03-22 03:00:03', '2018-03-22 03:00:03'),
(270, 1, 'Tipster', 'update', 'update Tipster', '2018-03-22 03:07:14', '2018-03-22 03:07:14'),
(271, 1, 'Tipster', 'update', 'update Tipster : Nguyen Ngoc Hung', '2018-03-22 03:07:32', '2018-03-22 03:07:32'),
(272, 1, 'Tipster', 'update', 'update Tipster : Nguyen Ngoc Hung', '2018-03-22 03:07:41', '2018-03-22 03:07:41'),
(273, 1, 'Lead', 'update', 'update Lead', '2018-03-22 20:11:04', '2018-03-22 20:11:04'),
(274, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-22 20:35:55', '2018-03-22 20:35:55'),
(275, 1, 'Tipster', 'update', 'update Tipster : tipster16', '2018-03-23 00:50:53', '2018-03-23 00:50:53'),
(276, 1, 'Tipster', 'update', 'update Tipster : Nguyen Ngoc Hung', '2018-03-30 03:03:10', '2018-03-30 03:03:10'),
(277, 1, 'Tipster', 'update', 'update Tipster : Phạm Thị Đang Thùy - Tipster', '2018-04-02 04:00:55', '2018-04-02 04:00:55'),
(278, 1, 'Tipster', 'update', 'update Tipster : Phạm Thị Đang Thùy - Tipster', '2018-04-02 04:02:13', '2018-04-02 04:02:13'),
(279, 1, 'Tipster', 'update', 'update Tipster : Nguyen Ngoc Hung', '2018-04-02 04:02:20', '2018-04-02 04:02:20'),
(280, 1, 'Tipster', 'update', 'update Tipster : Nguyen Ngoc Hung', '2018-04-02 04:03:26', '2018-04-02 04:03:26'),
(281, 1, 'Region', 'created', 'created Region : Vũng Tàu', '2018-04-03 21:39:20', '2018-04-03 21:39:20'),
(282, 1, 'Product', 'update', 'update Product : Shops', '2018-04-03 21:49:10', '2018-04-03 21:49:10'),
(283, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-04-08 20:06:34', '2018-04-08 20:06:34'),
(284, 1, 'Gift', 'created', 'created Gift : Box jequery', '2018-04-08 20:07:04', '2018-04-08 20:07:04'),
(285, 1, 'Gift', 'created', 'created Gift : Jquery Box', '2018-04-08 20:09:26', '2018-04-08 20:09:26'),
(286, 1, 'Gift', 'created', 'created Gift : Jquery Box', '2018-04-08 20:10:10', '2018-04-08 20:10:10'),
(287, 1, 'Gift', 'created', 'created Gift : Jquery Box', '2018-04-08 20:10:24', '2018-04-08 20:10:24'),
(288, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-04-08 20:11:13', '2018-04-08 20:11:13'),
(289, 1, 'Gift', 'update', 'update Gift : Vision 2018', '2018-04-08 20:11:20', '2018-04-08 20:11:20'),
(290, 1, 'Tipster', 'update', 'update Tipster : Phạm Thị Đang Thùy - Tipster', '2018-04-08 20:16:04', '2018-04-08 20:16:04');

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
  `delete_sent` tinyint(1) DEFAULT '0',
  `delete_trash` tinyint(1) DEFAULT '0',
  `read_is` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `author`, `receiver`, `delete_is`, `delete_sent`, `delete_trash`, `read_is`, `created_at`, `updated_at`) VALUES
(1, 'Pass', '<p>At nec iriure <b>ornatus repudiar</b>e, vis ei virtute voluptua definitionem, mei ad graece oportere posidonium. Alii libris quaestio mel ut, quem indoctum vel ad, ex usu ipsum delectus scriptorem. Et prompta eloquentiam usu, usu labore iuvaret sadipscing an. Legimus ancillae praesent ad qui, sea ea posse prompta corpora, eu pri constituam concludaturque. Eum postulant elaboraret theophrastus te.<br></p>', 1, 3, 0, 0, 0, 0, '2018-02-06 13:41:40', '2018-02-06 13:41:40'),
(2, 'You are perfect!', '<p>\r\n\r\n<b>Lee Pac</b>e Height Weight Body Statistics | Lee pace, American actors and Hot guys\r\n\r\n<br></p>', 1, 3, 0, 0, 0, 0, '2018-02-08 08:51:47', '2018-02-08 08:51:47'),
(3, 'What do you in today?', '<p><br>Ne eam torquatos democritum scribentur, atqui melius id qui. Zril vivendo pri et, in albucius platonem scripserit vis. Graecis deserunt cu per. <i>Dicant instructior pri ex</i>, mel ad facete eligendi scriptorem, ea vix virtute accumsan. Choro verear assueverit ei sea, ut his hinc impetus oblique.<br></p>', 1, 3, 0, 0, 0, 0, '2018-02-08 08:54:34', '2018-02-08 08:54:34'),
(4, 'Ignota facete', '<p>Vix ne laudem vocent forensibus. Ignota facete deleniti no pro, ei duo epicurei dignissim. In his graece invidunt, ius et nonumes detraxit singulis, sed ei quando bonorum. Labore sanctus feugait ius an, has cu veri epicurei maiestatis. Quis doctus nostrud cum et, mel convenire vituperatoribus no.<br></p>', 3, 1, 1, 0, 0, 1, '2018-03-02 08:05:53', '2018-03-02 01:21:54'),
(5, 'Test mail', '<p><a target=\"_blank\" rel=\"nofollow\" href=\"https://dantricdn.com/thumb_w/600/2015/2015vision-color-black-side-2-01-1445575847010.JPG\">https://dantricdn.com/thumb_w/600/2015/2015vision-color-black-side-2-01-1445575847010.JPG</a><br></p>', 1, 4, 0, 0, 0, 0, '2018-03-02 08:12:07', '2018-03-02 08:12:07'),
(6, 'Title send 1', '<h2>Content send 1</h2>', 1, 14, 0, 0, 0, 0, '2018-03-02 08:13:56', '2018-03-02 08:13:56'),
(7, 'ewrwer', '<p>rwerwer</p>', 1, 2, 0, 0, 0, 1, '2018-03-13 03:56:11', '2018-03-25 23:35:43'),
(8, 'ewrwer', '<p>rwerwer</p>', 1, 4, 0, 0, 0, 0, '2018-03-13 03:56:11', '2018-03-13 03:56:11'),
(9, 'Test email', '<p>Test email for multiple select</p>', 1, 2, 1, 0, 0, 1, '2018-03-13 03:56:53', '2018-03-13 03:58:13'),
(10, 'Test email', '<p>Test email for multiple select</p>', 1, 3, 0, 0, 0, 1, '2018-03-13 03:56:53', '2018-03-25 19:45:10'),
(11, 'Thank you letter', '<p>How are you?</p>', 3, 19, 0, 0, 0, 0, '2018-03-26 03:52:41', '2018-03-26 03:52:41'),
(12, 'Re: Thank you Letter', '<p>Yes, I\'m fine</p>', 19, 3, 0, 0, 0, 0, '2018-03-26 03:53:53', '2018-03-26 03:53:53'),
(13, 'Your information error', '<p><img alt=\"\" src=\"https://itsolutionstuff.com/upload/laravel-5-Custom-Error-Page.png\"><br></p><p>please check your information.</p>', 1, 4, 0, 0, 0, 1, '2018-04-02 02:26:08', '2018-04-02 02:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_templates`
--

CREATE TABLE `message_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` varchar(191) DEFAULT NULL,
  `subject_vn` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subject_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content_vn` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_templates`
--

INSERT INTO `message_templates` (`id`, `message_id`, `subject_vn`, `subject_en`, `content_vn`, `content_en`, `created_at`, `updated_at`) VALUES
(1, 'thank_you_letter', 'Thư cảm ơn', 'Thank you letter', '<p>Xin chào [tipster.name],</p><p>Lead \"[lead.name]\" đã được tiếp nhận bởi bộ phận tư vấn viên của chúng tôi.</p><p>Cảm ơn sự hỗ trợ của bạn và chúc bạn nhận được nhiều điểm thưởng.</p><p><br></p>', '<p>Hello [tipster.name],</p><p>The Lead [lead.name] has been received by the consultant.</p><p>Thank you for your support and wish you get more point bonus.</p>', '2018-03-07 04:23:33', '2018-03-09 03:23:40'),
(2, 'update_lead_call', 'E-mail Thông báo về trạng thái của lead', 'Notification e-mail about Lead status', '<p>Xin chào [tipster.name],</p><p>Lead [lead.name] của bạn đã được tư vấn viên gọi để tư vấn.</p><p>Cảm ơn và trân trọng.</p>', '<p>Hello [tipster.name],</p><p>Your Lead [lead.name] has been called by consultant.</p><p>Thank you and best regards.</p>', '2018-03-09 03:36:30', '2018-03-12 03:06:20'),
(3, 'update_lead_quote', 'E-mail thông báo về trạng thái của lead', 'Notification e-mail about lead status', '<p>\r\n\r\n</p><p>Xin chào [tipster.name],</p><p>Lead [lead.name] của bạn đã được chuyển trạng thái đến \"Báo Giá\".</p><p>Cảm ơn và trân trọng.</p>\r\n\r\n<br><p></p>', '<p>\r\n\r\n</p><p>Hello [tipster.name],</p><p>Your Lead [lead.name] has been quote by consultant.</p><p>Thank you and best regards.</p><p></p>', '2018-03-09 03:36:48', '2018-03-12 03:06:36'),
(4, 'update_lead_win', 'E-mail Thông báo về trạng thái của lead', 'Notification e-mail about lead status', '<p>Xin chào [tipster.name],</p><p>Lead [lead.name] đã được chuyển đến trạng thái \"THÀNH CÔNG\".</p><p>Cảm ơn và trân trọng</p>', '<p>Hello [tipster.name],</p><p>Your lead [lead.name] has been changed status to \"WIN\"..</p><p>Thank you and best regards.</p>', '2018-03-09 03:37:07', '2018-03-12 19:59:41'),
(5, 'update_lead_lost', 'E-mail Thông báo về trạng thái của lead', 'Notification e-mail about lead status', '<p>Xin chào [tipster.name],</p><p>Lead [lead.name] của bạn đã chuyển sang trạng thái \"Thất bại\".</p><p>Cảm ơn và trân trọng.</p>', '<p>Hello [tipster.name],</p><p>Your lead [lead.name] has been changed to status \"Lost\".</p><p>Thank you and best regards.</p>', '2018-03-09 03:37:27', '2018-03-11 21:25:30'),
(6, 'update_points_tipster', 'Thông báo về cập nhật điểm thưởng', 'Notification about update bonus points', '<p>Xin chào [tipster.name],</p><p>\r\n\r\nXin lỗi điểm thưởng cho lead [lead.name] với sản phẩm [product.name] đã được thay đổi.<br>Bạn nhận được [points.new] điểm.</p><p>Điểm hiện tại của bạn là: [points.current] điểm.</p><p>Cảm ơn và trân trọng.</p><p>(Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với Admin)</p>', '<p>Hello [tipster.name],</p><p>\r\n\r\nSorry you, The bonus points for lead [lead.name] with product [product.name] have changed.<br></p><p>You received [points.new] points.</p><p>Your current points : [points.current] points.</p><p>Thank you and best regards.</p><p>(If you have any questions, please contact with Admin).</p><p><br></p>', '2018-03-12 19:42:58', '2018-03-13 00:34:39'),
(7, 'plus_points_tipster', 'Thông báo về điểm thưởng', 'Notification about bonus points', '<p>Xin chào [tipster.name],</p><p>Chúc mừng bạn đã nhận được <b>[points.new]</b> điểm từ việc giới thiệu lead <b>[lead.name]</b> với sản phẩm [product.name].</p><p>Điểm hiện tại của bạn là: <b>[points.current] </b>points.<b></b></p><p>Cảm ơn và trân trọng.</p>', '<p>Hello [tipster.name],</p><p>Congratulations you have received <b>[points.new]</b> points from the introduction<b> [lead.name]</b> for product [product.name].</p><p>Your current points: <b>[points.current]</b></p><p>Thank you and best reagards.</p>', '2018-03-13 00:26:26', '2018-03-13 02:08:30'),
(8, 'test tesst', NULL, NULL, NULL, NULL, '2018-03-19 02:57:41', '2018-03-19 02:57:41');

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thuy.pham@amagumolabs.com', '$2y$10$Qnq78BQhenUHVzYfbH9w/Oytp124Q0NfChoSj8Qz6TyqEWfR1jM2W', '2018-04-02 21:40:01');

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
-- Table structure for table `point_histories`
--

CREATE TABLE `point_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipster_id` int(10) UNSIGNED NOT NULL,
  `lead_id` int(10) UNSIGNED DEFAULT NULL,
  `point` int(10) NOT NULL,
  `activity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_histories`
--

INSERT INTO `point_histories` (`id`, `tipster_id`, `lead_id`, `point`, `activity`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 11, 10, NULL, NULL, '2018-02-01 16:41:13', '2018-02-01 16:41:13'),
(2, 4, 15, 50, NULL, NULL, '2018-02-06 13:32:23', '2018-02-06 13:32:23'),
(3, 11, 18, 50, NULL, NULL, '2018-02-08 03:49:29', '2018-02-08 03:49:29'),
(4, 3, 25, 150, NULL, NULL, '2018-02-08 04:40:39', '2018-02-08 04:40:39'),
(5, 27, 46, 150, NULL, NULL, '2018-03-12 21:21:51', '2018-03-12 21:21:51'),
(6, 27, 47, 250, NULL, NULL, '2018-03-12 21:46:43', '2018-03-13 01:10:10'),
(7, 27, 43, 150, NULL, NULL, '2018-03-13 00:38:54', '2018-03-13 00:38:54'),
(8, 27, 42, 250, NULL, NULL, '2018-03-13 01:15:26', '2018-03-13 01:15:26'),
(9, 27, 41, 50, NULL, NULL, '2018-03-14 03:50:24', '2018-03-14 03:50:24'),
(10, 31, NULL, 30, 'bonus', NULL, '2018-04-01 19:54:20', '2018-04-01 19:54:20'),
(11, 31, NULL, 50, NULL, NULL, '2018-04-01 20:32:33', '2018-04-01 20:32:33'),
(12, 31, NULL, 20, NULL, NULL, '2018-04-01 20:38:57', '2018-04-01 20:38:57'),
(13, 31, NULL, -10, NULL, NULL, '2018-04-01 20:43:53', '2018-04-01 20:43:53'),
(14, 31, NULL, 20, NULL, NULL, '2018-04-01 20:46:39', '2018-04-01 20:46:39'),
(15, 31, NULL, -20, NULL, NULL, '2018-04-01 20:48:26', '2018-04-01 20:48:26'),
(16, 31, NULL, 30, 'Bonus', 'Ness', '2018-04-01 20:51:07', '2018-04-01 20:51:07'),
(17, 27, NULL, 10, 'Bonus', 'Bonus for new month', '2018-04-01 20:51:58', '2018-04-01 20:51:58'),
(18, 27, NULL, 50, 'Buy Gift', 'Buy a Gift from list gift.', '2018-04-01 21:43:09', '2018-04-01 21:43:09'),
(19, 27, NULL, -100, 'Buy Gift', 'Hello Thuy,\r\nYou have just buy a gift from our system.\r\nYou costed 100 points for this gift.\r\nThank you.', '2018-04-02 02:14:40', '2018-04-02 02:14:40'),
(20, 27, NULL, -20, 'Buy Gift', '<p>Hello Thuy,</p><p>You costed 20 points for this gift.</p><p>Your points: 790 points.</p><p>Thank you &amp; best regards.</p>', '2018-04-02 02:21:32', '2018-04-02 02:21:32'),
(21, 27, NULL, 10, 'Bonus', '<p><img alt=\"\" src=\"https://itsolutionstuff.com/upload/laravel-5-Custom-Error-Page.png\"><br></p>', '2018-04-02 02:23:04', '2018-04-02 02:23:04'),
(22, 27, NULL, 10, 'Bonus', NULL, '2018-04-02 03:27:52', '2018-04-02 03:27:52');

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
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality` decimal(8,0) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `delete_is` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `thumbnail`, `quality`, `category_id`, `delete_is`, `created_at`, `updated_at`) VALUES
(4, 'Medical', 'Reque voluptua ad qui. Ut pro sumo etiam legere, ei usu erant choro eruditi, elitr adversarium vel cu. Ut sit fastidii definiebas posidonium, has ne graeci dissentias. Eum eu hendrerit inciderint. Harum detraxit pri ne.', '0', '1520237472.png', '0', 5, 0, '2018-03-01 02:46:42', '2018-03-05 01:11:12'),
(5, 'Auto/Moto', NULL, '0', '1520237455.png', '0', 5, 0, NULL, '2018-03-05 01:10:55'),
(6, 'Shops', NULL, '0', '1522817350.png', '0', 5, 0, NULL, '2018-04-03 21:49:10'),
(7, 'Factory', '', '0', NULL, '0', 5, 0, NULL, NULL),
(8, 'Office', '', '0', NULL, '0', 5, 0, NULL, NULL),
(9, 'Home', '', '0', NULL, '0', 5, 0, NULL, NULL),
(10, 'Travel', '', '0', NULL, '0', 5, 0, NULL, NULL),
(11, 'Student', '', '0', NULL, '0', 5, 0, NULL, NULL),
(12, 'Other', NULL, '0', 'no_image_available.jpg', '0', 5, 0, '2018-03-01 04:40:35', '2018-03-01 04:40:35'),
(13, 'test', NULL, '0', '1520236565.png', '0', 5, 0, '2018-03-05 00:56:05', '2018-03-05 00:56:05'),
(14, 'twer', 'rwerwer', '0', '1520237393.jpg', '0', 5, 0, '2018-03-05 00:56:57', '2018-03-05 01:09:53'),
(15, '323123', NULL, '0', 'no_image_available.jpg', '0', 5, 0, '2018-03-19 03:51:35', '2018-03-19 03:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Ha Noi', 'hanoi', NULL, '2018-04-03 21:23:33'),
(2, 'Ho Chi Minh', 'hochiminh', NULL, NULL),
(3, 'Da Nang', 'danang', NULL, NULL),
(4, 'Nha Trang', 'nhatrang', NULL, NULL),
(5, 'France', 'france', '2018-04-03 01:26:50', '2018-04-03 01:26:50'),
(6, 'Bình Định', 'binhdinh', '2018-04-03 19:48:44', '2018-04-03 19:48:44'),
(7, 'Ha Noii', 'hanoii', '2018-04-03 20:18:42', '2018-04-03 20:18:42'),
(8, 'Vũng Tàu', 'vungtau', '2018-04-03 21:39:20', '2018-04-03 21:39:20');

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
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `birthday` date DEFAULT '1900-01-01',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` decimal(8,0) NOT NULL DEFAULT '0',
  `vote` decimal(4,0) NOT NULL DEFAULT '0',
  `delete_is` tinyint(4) NOT NULL DEFAULT '0',
  `role_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `preferred_lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'vn',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `avatar`, `gender`, `birthday`, `address`, `phone`, `point`, `vote`, `delete_is`, `role_id`, `region_id`, `preferred_lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@amagumolabs.com', '$2y$10$wURaUkxnXDSPtY7ojuxTu.qUqLuYDDTyvmahF5E7RE1mVngRI./nO', 'Admin', '1520235440.png', 1, '2017-12-12', 'Ho Chi Minh, Viet Nam', '093893771', '0', '0', 0, 1, 1, 'vn', '3886PtBxwnI86g5WnmaCoF6OjJhx0EJafqem4R6Fi9EYjZ0L56I4nC7aKSKo', NULL, '2018-04-03 23:59:13'),
(2, 'tipster1', 'tipster1@gmail.com', '$2y$10$umRwAmT3NST33aLjGySLgOXmRD7aHm1/K0YEBDMJrFey0H0TsTPMy', 'Nguyễn Thị Nhật Hạ', 'user4-128x128.jpg', 1, '1990-12-20', 'Tan Binh', '01928739832', '0', '0', 0, 8, 2, 'vn', '0ei0kUhs0ekaM9pRVOPJgIklEUsX5aTCIv0uB37Dyt9K6zDxcqeNFbBxJ367', '2018-01-16 22:17:29', '2018-02-08 03:46:22'),
(3, 'tipster2', 'tipster2@gmail.com', '$2y$10$VYctWG6DoE4Mf3zqLLzwGu6RDxT8/DdriDS94ol0.iKsHcOtShOGm', 'Phạm Phú Chinh', 'user1-128x128.jpg', 0, '1982-01-11', 'Hoan Kiem', '0989310732', '160', '0', 0, 9, 1, 'vn', '6Pn527vo9J8xGngToKV9asNpL47Z1bQXL4QuavlopRyjtp22LMI2ELcEVvsC', '2018-01-17 20:38:44', '2018-02-08 04:40:39'),
(4, 'tipster3', 'tipster3@gmail.com', '$2y$10$FkYTVllLc60zli2MSwbg3u/miVmdPqsxWA12AM6v8GwAfJOuOAIIq', 'Hà Duy Minh', 'user2-160x160.jpg', 1, '1981-01-19', 'Tran Hung Dao', '0989310981', '50', '0', 0, 9, 3, 'vn', 'X9QfhmmtljJ4mSOKQCBBP5No8Y4P4hQEjlyJfK3c70cK5ZbbB6XzzdcasxTK', '2018-01-17 20:40:37', '2018-03-02 01:40:35'),
(5, 'tipster4', 'tipster4@gmail.com', '$2y$10$PQUkjmW4GTPhfRU4.qMY1eF4z5klCeh29CrPMqURPCMmZPM8pVA/K', 'Nguyen Tran Ngoc Tran', 'user7-128x128.jpg', 0, '1992-01-20', 'Nguyen Chi Thanh', '0888172361', '0', '0', 0, 9, 4, 'vn', NULL, '2018-01-17 20:42:36', '2018-03-02 01:40:27'),
(6, 'consultant1', 'consultant@gmail.com', '$2y$10$v1rQG22BYwgETQhb3s6ROu6mRK2V2qd5p6wDFmec1xls0RybQ.xbi', 'Consultant Thuy', 'user3-128x128.jpg', 1, '2000-01-10', 'Hai Ba Trung', '019876512', '0', '0', 0, 5, 2, 'vn', 'RqbTJeT1OBeKoqVqHv4uURIr4mEFe6AMLEkhxOxaj6WCSHDNhiCyQTpOY8rw', '2018-01-18 01:04:05', '2018-01-22 02:27:35'),
(7, 'hachit', 'chitha@gmail.com', '$2y$10$9JU56BB/CPq2YtepwRtjOOb6XtsPUdd4b7tQwJn57ZHkrSSgvLqM6', 'Ha Chi T', NULL, 0, '1980-01-12', 'Son Tra', '09897682721', '0', '0', 1, 6, 3, 'vn', NULL, '2018-01-22 00:02:30', '2018-01-22 00:02:30'),
(8, 'salemanager', 'salemanager@gmail.com', '$2y$10$Hl8HdrjLhvAmDxDflz38POqbcd4Y.4fncNf2d0BFTjCU.m0tmOtdy', 'Sale Manager', '1520324668.png', 0, '1998-12-04', 'Hai Ba Trung', '0981237823', '0', '0', 1, 3, 2, 'vn', 'MlHGVS2ofVAf0iizYyBAewvLv1weYyEw9ebMlMW028zIXDX50Hylpi3bWEre', '2018-01-22 01:09:20', '2018-03-06 01:24:28'),
(9, 'community', 'communityman@gmail.com', '$2y$10$akhhKTnJ2ANdoW5OSy9rpuwRQoi/FMls4nGD7rYJ0Ekxv.74jeaE6', 'Community Manager', NULL, 1, '1987-03-21', 'Dong Den', '1231234123', '0', '0', 0, 2, 2, 'vn', 'q5MVJS8Ql4gY14ROqllR0mebFmIzQ9gRXAcsM4NA5Zhzf7SbbryZWujEWOlK', '2018-01-22 01:11:00', '2018-03-05 00:38:12'),
(10, 'nhathuy', 'nhatduy@gmail.com', '$2y$10$.MzoI4h6lblmeKDSeGAyauBZwDFYOtCafItaq21UzWbyQ2/6g/iya', 'Nguyễn Trần Nhất Huy', 'user6-128x128.jpg', 1, '1992-02-15', 'Bình Thạnh', '098276313', '0', '0', 0, 9, 2, 'vn', '6pXVENkoljapLfOyHgxFActPQEpex7gz24EiqwVBu9RbG5S3k4h3iTTKk4wx', '2018-02-06 13:18:07', '2018-03-02 01:40:20'),
(11, 'tipster5', 'hungnguyen@gmail.com', '$2y$10$VyzaVZZKp.hH0KCOGYb8se3egGjyA73KhBOBqQjXkoHTHid4m7R8y', 'Nguyễn Minh Hùng', 'user8-128x128.jpg', 0, '1992-02-21', 'Quận 12', '0987676652', '50', '0', 0, 9, 2, 'vn', NULL, '2018-02-06 13:27:11', '2018-03-02 01:40:13'),
(12, 'giahan', 'giahanluong@gmail.com', '$2y$10$mTyaz6M2BULA5jyGzG/rfOO.Q5I1samh4NzDdWkkJEHJxwR9SIodu', 'Lương Gia Hân', 'user7-128x128.jpg', 1, '2005-02-13', '10 district', '123456789', '0', '0', 0, 9, 2, 'vn', NULL, '2018-02-08 08:13:59', '2018-03-02 01:40:07'),
(13, 'anhchien', 'anhchien@gmail.com', '$2y$10$SRBYoy2GLY0dvI/tsKcA3uIwzxDPTj71F8ucbPozbnsWiHailv2Fe', 'Phạm Ánh Chiến', 'user10-128x128.jpg', 1, '1992-02-14', '7 District', '019827731', '0', '0', 0, 9, 2, 'vn', 'X0kzNzZcQvl7nH3q8Iic6xtahkuRYIVukphEaa9I8qSK5yeLwLuPygUOg2Qc', '2018-02-08 08:18:50', '2018-03-02 01:40:02'),
(14, 'phuongtrung', 'trungta@gmail.com', '$2y$10$stFpWBXq0pWgIHJDhoX/6eBaCsZShTZrUWecHE47wcvKw1wYCpSlC', 'Tạ Hoàng Phương Trung', 'sean-harmon-128x128.jpg', 0, '1988-02-14', 'Trường Sa street, Tân Bình district', '0987872187', '0', '0', 0, 9, 2, 'vn', NULL, '2018-02-08 08:24:13', '2018-03-02 01:39:55'),
(15, 'caovan@gmail.com', 'cavan@gmail.com', '$2y$10$tBgID75MmEveA87Hws3QweDsdwlkNa1K2DD3/MbFjkGa.rmVZ0MuG', 'Trần Cao Vân', '1519698844.jpg', 0, '1977-02-21', 'Hai Bà Trưng', '098978655', '0', '0', 0, 9, 1, 'vn', NULL, '2018-02-08 08:27:59', '2018-03-02 01:39:37'),
(16, 'consultant4', 'chicong@gmail.com', '$2y$10$FUQMPcvqpqj7NLHwjp.TdOMB8e/BaImQtwbXn.5caYvNdnZw3AgbG', 'Bùi Chí Công', '1521108899.png', 0, '1988-02-19', 'Tiền Giang', '092837234', '0', '0', 1, 4, 2, 'vn', '9lxToIJY5nS180xED6ubeT9KqDXtF41npBmXy5fuV0XibPpmVuTSqUSLKpm0', '2018-02-08 08:30:00', '2018-03-15 03:14:59'),
(17, 'minhman', 'minhman@gmail.com', '$2y$10$7e8rzcisRZkKeHbts5vh3uRCLr1BkXSEKrySVAo25oVfmmexEdtCS', 'Nguyễn Minh Mẫn', NULL, 0, '1984-02-12', 'Bình Thuận', '097879862', '0', '0', 1, 7, 2, 'vn', NULL, '2018-02-08 08:31:06', '2018-02-08 08:31:06'),
(18, 'tipster10', 'phamdangthuy2310@gmail.com', '$2y$10$gXq2C/RfrRTXTIQYW91aRuD65pK4qCImZtUrV3NDBHeKWGk38C/b6', 'Pham Dang Thuy', NULL, 0, '2018-03-14', NULL, '080989231', '0', '0', 1, 6, 2, 'vn', NULL, '2018-03-02 02:50:56', '2018-03-02 02:50:56'),
(19, 'tipster20', 'nguyenminhtuan@gmail.com', '$2y$10$WwvygCN/rGq7fs1BzEsYdObwF8Hn3VvYU16nTMVY3jfhgXNvwfJO.', 'Nguyen Minh Tuan', NULL, 0, '1995-03-20', NULL, '0998932123', '0', '0', 0, 9, 2, 'vn', 'PYZL7rAcsQht7bee4UiE75nTD1e0JjyMSyVKc73htSh2EFBSJ8iNa7AMimnC', '2018-03-02 03:00:31', '2018-03-02 03:05:45'),
(20, 'tipster10', 'baotran@gmail.com', '$2y$10$xxA/1Kw/uD16JrpiBY7qFuquKeYIRLWW/8r0dg5tY7e7jXqPcnmuW', 'Nguyễn Trần Bảo Trân', NULL, 1, '1989-10-25', NULL, '0997321932', '0', '0', 0, 9, 2, 'vn', NULL, '2018-03-04 19:42:38', '2018-03-04 19:42:38'),
(21, 'tipster11', 'kyduyen@gmail.com', '$2y$10$w302XfxlDroeahvkECMUCeIuhtukcA3r/dERnDSPMvsZvMSQv0xXa', 'Nguyễn Ngọc Kỳ Duyên', NULL, 1, '1995-02-19', NULL, '0998978213', '0', '0', 0, 9, 2, 'vn', NULL, '2018-03-04 19:44:11', '2018-03-04 19:44:11'),
(22, 'tipster13', 'koolbao@gmail.com', '$2y$10$lvTomti5ARtiPBReKAiyReqn.4eerJdZczDmRYl6xy1fHQh9.s6PO', 'Trần Bảo Kool', '1520222146.png', 0, '2018-03-13', NULL, '1231234123', '0', '0', 0, 9, 2, 'vn', NULL, '2018-03-04 20:55:46', '2018-03-04 20:55:46'),
(23, 'tipster14', 'thanhtam@gmail.com', '$2y$10$A.fqPlXEp9b1Ch66AsQKLubaKGoGmT1LGIaINh/IlBRaySlFBiHPa', 'Khong Cao Thanh Tam', '1520224959.png', 0, '2018-03-14', NULL, '039172973', '0', '0', 0, 9, 3, 'vn', NULL, '2018-03-04 21:06:59', '2018-03-04 21:42:39'),
(24, 'tipster15', 'loanta@gmail.com', '$2y$10$.KTvUFNZS/TisXb6n0jzEeg3Mod2NdIPKBSYArZj95fOT/TmQug.2', 'Tạ Thị Bích Loan', '1520232495.png', 1, '2018-03-21', NULL, '098097732', '0', '0', 1, 9, 3, 'en', NULL, '2018-03-04 21:08:37', '2018-03-06 00:56:18'),
(25, 'consultant6', 'ngochuy@gmail.com', '$2y$10$DKnR3bEJ3cA4jU3YS9rBTe70IGb4RVSxn1VWTg5anUUw3raOFc6Re', 'Nguyen Ngoc Huy', '1520235640.png', 0, '1987-03-15', NULL, '098876521', '0', '0', 0, 6, 2, 'vn', NULL, '2018-03-05 00:40:40', '2018-03-05 00:40:40'),
(26, 'tipster17', 'phamchinh@deliv.com.vn', '$2y$10$ZYrGUvVczz6LcAvf7ZbaIOfHkf2Izl4t4SS.ZTYbmg/lKOA0Jyb4e', 'tipster16', 'no_image_available.jpg', 1, '1997-03-16', NULL, '098709831', '0', '0', 0, 9, 2, 'en', NULL, '2018-03-06 00:57:58', '2018-03-23 00:50:53'),
(27, 'tipster_phamdangthuy2310', 'thuy.pham@amagumolabs.com', '$2y$10$A0D8nrvR2iOLHmilUxgeZeMOh5wJ9esP6VZ7jPbIp9EHSavuRN63O', 'Phạm Thị Đang Thùy - Tipster', '1523243765.jpg', 1, '1990-10-23', '14 Nguyễn Hiến Lê, Phường 13, Quận Tân Bình', '0989310732', '810', '0', 0, 9, 2, 'vn', 'rHRTdORo1dnwfdytQZ3L0n8CLIHA2sCN88tBHaJ3yeyd6w8mgS4s3ancQ4qS', '2018-03-08 20:38:35', '2018-04-08 20:16:05'),
(30, 'nguyenduytung', 'nguyenduytung@gmail.com', '$2y$10$n4C0ahbzVya5B7ZGzImZgeYL2vtlhTof4JcNuz20NKUzvVCzqv87q', NULL, NULL, 0, '1900-01-01', NULL, NULL, '0', '0', 0, 9, 2, 'vn', 't1SMIsNfYoBupgciwmCmiW51FZFWGdFeG8SjeIxmrVTud90RSfICeOpF6tfW', '2018-03-22 01:31:04', '2018-03-22 01:31:04'),
(31, 'nguyenngochung', 'nguyenngochung@gmail.com', '$2y$10$Nq4yeba7LiNrrnSPsvDeD.0a1HgLwoYYi9P3RTOhAKmNIkTbWySaa', 'Nguyen Ngoc Hung', NULL, 0, '1900-01-01', NULL, NULL, '130', '0', 0, 9, 2, 'vn', 'XqnPj6CCKyW6GDgEYtO8erEHA77BqzqKRJ5N8mfsFQepvxuZfLo5VxCK7Ndu', '2018-03-22 02:54:17', '2018-04-01 20:51:07');

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
-- Indexes for table `logs_sent_message_templates`
--
ALTER TABLE `logs_sent_message_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `message_templates`
--
ALTER TABLE `message_templates`
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
-- Indexes for table `point_histories`
--
ALTER TABLE `point_histories`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `evaluationautos`
--
ALTER TABLE `evaluationautos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftcategories`
--
ALTER TABLE `giftcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `logs_sent_message_templates`
--
ALTER TABLE `logs_sent_message_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message_templates`
--
ALTER TABLE `message_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `point_histories`
--
ALTER TABLE `point_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `giftcategories` (`id`);

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
