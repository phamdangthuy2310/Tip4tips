-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 12:17 PM
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
-- Database: `laramigrate`
--
CREATE DATABASE IF NOT EXISTS `laramigrate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laramigrate`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_22_073123_create_companies_table', 1),
(4, '2017_11_22_074003_create_projects_table', 1),
(5, '2017_11_22_085924_create_tasks_table', 1),
(6, '2017_11_22_092156_create_comments_table', 1),
(7, '2017_11_22_093219_create_roles_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `hours` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_company_id_foreign` (`company_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_email_unique` (`email`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_company_id_foreign` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- Database: `larashop`
--
CREATE DATABASE IF NOT EXISTS `larashop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `larashop`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) NOT NULL,
  `brew_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_08_27_090421_create_drinks_table', 1),
(4, '2015_08_27_103342_create_posts_table', 1),
(5, '2015_08_27_103347_create_products_table', 1),
(6, '2015_08_27_103352_create_categories_table', 1),
(7, '2015_08_27_103355_create_brands_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `description`, `price`, `category_id`, `brand_id`, `created_at`, `updated_at`, `created_at_ip`, `updated_at_ip`) VALUES
(1, 'Mini skirt black edition', 'Mini skirt black edition', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 35, 1, 1, NULL, NULL, NULL, NULL),
(2, 'T-shirt blue edition', 'T-shirt blue edition', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 64, 2, 3, NULL, NULL, NULL, NULL),
(3, 'Sleeveless Colorblock Scuba', 'Sleeveless Colorblock Scuba', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 13, 3, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drinks_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `laravel55`
--
CREATE DATABASE IF NOT EXISTS `laravel55` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `laravel55`;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_14_102053_create_products_table', 1),
(4, '2017_11_15_043704_add_description_to_products', 2),
(5, '2017_11_15_091647_create_workers_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`, `description`) VALUES
(1, 'Rice', 12, '2017-11-14 04:14:42', '2017-11-14 04:26:32', 'With a simple plan of attack outlined, it’s time to get a brand new empty project up and running. I like to put all my projects in a ~/Sites directory. --> Edited'),
(2, 'Orange', 2, '2017-11-14 04:16:43', '2017-11-14 04:16:43', 'acb --> Edited'),
(3, 'Bread', 1, '2017-11-14 19:41:04', '2017-11-14 19:41:04', 'acb'),
(6, 'Milk', 1, NULL, NULL, 'Fugit viris constituam pri ex.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thuyph', 'phamdangthuy2310@gmail.com', '$2y$10$w9EsbM4zlk2TNHskKqZDRe6s/D/wY779LfiNu4zdXjBm3T9W2uWdu', 'OY0xTZwpT1J72PHGMOlcrjwmdNdk0wJA8OcFTkUyJvXXik0J2VBYJyRIamVp', '2017-11-21 23:42:20', '2017-11-21 23:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `birthday`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Pham Thuy', '1990-10-23', 'Clita commodo pro et. Eam omnesque consectetuer id, vis in vidit omnium. Ei nec omnium vocibus adversarium. Mei ad modo habemus perpetua. Id sea noster habem.', '2017-11-15 20:27:19', '2017-11-15 20:45:13'),
(7, 'Nguyen Minh A', '1992-01-01', 'Vis rationibus quaerendum in, eos novum necessitatibus ea. Et odio nonumes offendit sed, in mea mentitum ullamcorper. Nostro propriae duo ad.', '2017-11-15 20:27:54', '2017-11-15 20:27:54'),
(8, 'Ho Minh D', '1987-05-19', 'No virtute equidem vis. Graeco iriure quaerendum ne vim, pro at delenit vocibus. Errem simul debitis ius ne, omnes definiebas efficiantur cu eam. Ei utinam appareat electram usu.', '2017-11-15 20:28:32', '2017-11-15 20:28:32'),
(9, 'Pham Phu C', '1990-06-16', 'Vel alia agam audire ei. Quo ne erant dolorum pertinacia, summo solet aliquid qui no. Nihil verear et nec, quo et fierent adipiscing accommodare. Nonumy concludaturque ad est, vivendum sententiae per id, partem omittam principes et ius. Sit virtute appareat intellegat ad, numquam legendos mea ne.\r\n\r\nNo virtute equidem vis. Graeco iriure quaerendum ne vim, pro at delenit vocibus. Errem simul debitis ius ne, omnes definiebas efficiantur cu eam. Ei utinam appareat electram usu.', '2017-11-15 20:51:16', '2017-11-15 21:11:24'),
(10, 'Nguyen Ngoc Ng', '1965-01-20', 'Vel alia agam audire ei. Quo ne erant dolorum pertinacia, summo solet aliquid qui no. Nihil verear et nec, quo et fierent adipiscing accommodare. Nonumy concludaturque ad est, vivendum sententiae per id, partem omittam principes et ius. Sit virtute appareat intellegat ad, numquam legendos mea ne.\r\n\r\nNo virtute equidem vis. Graeco iriure quaerendum ne vim, pro at delenit vocibus. Errem simul debitis ius ne, omnes definiebas efficiantur cu eam. Ei utinam appareat electram usu.', '2017-11-15 21:19:18', '2017-11-15 21:19:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Database: `laravelreact`
--
CREATE DATABASE IF NOT EXISTS `laravelreact` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravelreact`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Shoes 001', 12, NULL, NULL),
(2, 'Shoes 002', 25, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_032433_create_items_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `links`
--
CREATE DATABASE IF NOT EXISTS `links` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `links`;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Libero qui', 'http://www.bruen.com/', 'Dolorem sed quisquam vero non. Voluptatem et nostrum maxime facilis molestias perspiciatis aliquid. Non eius ratione qui hic voluptatem. Voluptas minima maxime praesentium illum.', '2017-11-19 20:31:37', '2017-11-19 20:31:37'),
(2, 'Et ut', 'https://kling.com/similique-quam-omnis-vel-est-et-incidunt.html', 'Ullam amet porro facilis aperiam. Temporibus tempora qui deleniti rem. Architecto iusto ut tenetur ullam et aliquid possimus id.', '2017-11-19 20:31:37', '2017-11-19 20:31:37'),
(3, 'Repudiandae sequi', 'https://smitham.org/iste-aut-explicabo-illum-aut-maxime-ipsam.html', 'Quisquam doloribus ipsum in adipisci nemo eius. Odio numquam optio neque minus. Cum dicta quia suscipit est.', '2017-11-19 20:31:37', '2017-11-19 20:31:37'),
(4, 'Tempora modi', 'http://www.rempel.com/', 'Et impedit eaque explicabo. Omnis sunt aperiam nihil. Magnam asperiores quia molestias at aut quas. Molestiae qui quia porro et.', '2017-11-19 20:31:37', '2017-11-19 20:31:37'),
(5, 'Sit possimus', 'http://willms.biz/eveniet-est-est-quaerat-beatae', 'Est dolor fugiat labore. Aut velit consequatur est non. Animi dolores voluptatem eveniet illo quia error mollitia. Dolorem voluptatem esse vel dicta.', '2017-11-19 20:31:37', '2017-11-19 20:31:37'),
(6, 'Amazon', 'https://www.amazon.com/', 'WERTYUIOP{VBNMndh fsk', '2017-11-20 02:42:47', '2017-11-20 02:42:47'),
(7, '534g5', 'regre', 'The change method allows you to modify some existing column types to a new type or modify the column\'s attributes.', '2017-11-20 03:17:25', '2017-11-20 03:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_20_031254_create_links_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `links_url_unique` (`url`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tip4tipsv1.1\",\"table\":\"users\"},{\"db\":\"tip4tipsv1.1\",\"table\":\"regions\"},{\"db\":\"tip4tipsv1.1\",\"table\":\"roles\"},{\"db\":\"tip4tipsv1.1\",\"table\":\"roletypes\"},{\"db\":\"tip4tipsv1.1\",\"table\":\"migrations\"},{\"db\":\"larashop\",\"table\":\"migrations\"},{\"db\":\"tip4tips\",\"table\":\"usergrop_permission\"},{\"db\":\"tip4tips\",\"table\":\"usergroup\"},{\"db\":\"tip4tipsv1.1\",\"table\":\"tipsters\"},{\"db\":\"tip4tips\",\"table\":\"order_product\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'pmanager', 'comments', '{\"sorted_col\":\"`comments`.`commentable_id`  ASC\",\"CREATE_TIME\":\"2017-11-23 11:34:56\",\"col_order\":[0,1,2,3,4,5,6,7],\"col_visib\":[1,1,1,1,1,1,1,1]}', '2017-11-28 10:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-11-23 10:30:48', '{\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `pmanager`
--
CREATE DATABASE IF NOT EXISTS `pmanager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `url`, `commentable_id`, `commentable_type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Complete this screen.', 'http://pmanager.lar/projects/1', 1, 'App\\Project', 1, '2017-11-28 20:51:43', '2017-11-28 20:51:43'),
(2, 'Lorem ipsum dolor sit amet, id qui dolore electram, an probo paulo ius. Ad has eripuit fabulas commune, no quod illud placerat per. Eum ea movet graece intellegebat, his propriae electram tincidunt eu. Laudem assentior constituto has at, te sea modus postulant accusamus.', 'http://generator.lorem-ipsum.info/', 2, 'App\\Project', 1, '2017-12-05 00:29:00', '2017-12-05 00:29:00'),
(3, '123', NULL, 1, 'App\\Project', 1, '2017-12-05 01:01:54', '2017-12-05 01:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Amagumo Labs', 'Amagumo Labs is a Web Development Studio composed of talented, hard-working people, sharing the same dedication to supporting businesses with cutting-edge software for Management and outstanding websites for Reputation.\r\n\r\nWe are Marketers, Creatives, Database Experts and Developpers who love turning ideas into digital products. We make them beautiful and meaningful: delighting for their audience and rewarding for their owners.', 1, '2017-11-28 20:24:45', '2017-11-28 20:24:45'),
(2, 'Strawbery Jam', 'セメヌタャシツメもくねユテ夜以っひにるンハュ毛露瀬他シウーキ瀬差魔擢鵜譜知とのたえんレセヒチろらめらろよ瀬絵保き魔とおやせこ「れまむこ留瀬」な素雲素鵜離ろ保他巣課露他知魔すこく鵜目列雲。\r\n\r\n毛目遊津あ根魔ゃ等名絵いツコョリセ瀬夜ゅみすたもれや、以列。御留根名。い野個。ゅこへ保遊日二樹毛離ノカヒ模区しもぬて津樹素保舳にれふゃのたこむ津屋ひ、都目津目鵜留、ホュエンちケュ手氏名都野以やふあと他差屋イヨタロ、むふい。\r\n\r\n留日むっろ。根素差模たら日夜遊瀬、魔尾よ他瀬手エナのす擢保手尾露派。差屋てせそ個手ち遊雲ほ魔遊むはちかさしれ。二他瀬氏せみゆれるふ譜樹巣はえみ手区手ちくろへゅてち。\r\n\r\n絵絵阿派尾樹てな樹二のする模他に屋魔かそかつはこなえね津遊みふい等毛夜差りちくいあるゃめ。二樹日えほなろらょろん。ゆやけ列夜保野保派以尾はむや日巣。けるんんる名知日らせねん御、日等以ふひさ区らつえ、り。手二ゃさすゆ列二鵜都譜なそイラココすすぬり課魔舳知離魔屋素、るりおむゆ。はなっあねれちのいオマトオマ離毛れみコアクアモ列以ゃさとのひ無目よれせ擢魔遊ムフトナ、ロナゅたおせねつも。\r\n\r\n露遊留課かぬっえ列鵜御瀬へひはほへよりすす日留他か都個名個以御な。巣知手ねそき留屋手れせくりのゆみ津魔りとれま。ぬせほっ毛舳、無魔絵巣等御さりひオレノアネシナヒヘオ派二模りっひん留等ふね模模。\r\n\r\n無巣区魔てはいりあけ派阿二ゆんのれウコュよそち。等目譜れやち日魔舳けんは派遊露樹津毛ゅはっけこえてれ日津ふらなへぬっもまに無ち擢野露しほてされらうあよつ名名日め譜差目遊もょきなみノミノエカトのほ毛都模毛鵜ひつ名無おにくら御等おまむ御絵阿課、オッコケノュるふえ夜氏、課津津野都。。りひ夜派氏へ舳派夜目他りみと。舳屋等列他遊尾根ョヤイチ鵜目ぬとめめに知擢絵ちける瀬無雲課留絵津こま。', 1, '2017-11-28 21:21:31', '2017-11-28 21:21:31');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_23_025712_create_companies_table', 1),
(4, '2017_11_23_030548_create_projects_table', 1),
(5, '2017_11_23_031045_create_tasks_table', 1),
(6, '2017_11_23_031610_create_comments_table', 1),
(7, '2017_11_23_033349_create_roles_table', 1),
(8, '2017_11_23_034934_create_project_user_table', 1),
(9, '2017_11_23_035256_create_task_user_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `days`, `company_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Manager App', 'Lorem ipsum dolor sit amet, scripta copiosae conceptam eu his, nec vide tibique no, vis ut purto fabellas theophrastus. Eos harum perpetua eu, civibus repudiandae ut sed. Eu putent nominavi efficiendi ius, has tamquam fabulas perpetua ex, adipisci deseruisse contentiones vix ea. Et pri affert urbanitas. Debet indoctum vis ne, maluisset tincidunt at his.\r\n\r\nAdhuc urbanitas cotidieque id usu. At ius summo doctus vituperatoribus. Semper molestiae an vim, nulla perfecto est et. Nullam nostro latine mel et, mandamus accusamus conclusionemque sit et, postea commune ocurreret ei his. Mei summo elitr eligendi et, ne per putent consequuntur, ad vix simul viris dissentias.', 5, 1, 1, '2017-11-28 20:46:12', '2017-11-28 20:46:12'),
(2, 'Appot', 'Sit at eripuit pertinax. Ornatus accusam an eos, simul volumus vituperatoribus eos ei, ubique legendos signiferumque pri at. Vis dolore complectitur et. Idque invenire mei ad. Qui recteque pertinacia ut, vim viderer eligendi ut, dico expetendis sed te.\r\n\r\nEt verear nostrud vim, assum gubergren ut est, affert dissentias in ius. Malorum praesent erroribus ei mea. Te aeque forensibus percipitur usu, qui ponderum phaedrum at, sit ne quod numquam. Dolor legendos ex his, audire latine utroque ad mel. Eum alia omnes eligendi et. Dicit iracundia vim ex, ad pri lorem electram reprehendunt, in erat lobortis forensibus sed. Meliore nostrum ad eam, eos eu elit homero.\r\n\r\nIn cum dictas saperet persequeris, no pro harum copiosae sadipscing. Quo eu eruditi corrumpit, ut erant principes nec. Sed eu reque placerat lobortis, nam ex nostrum contentiones, ea nec erant scripserit. Eruditi iudicabit intellegebat vel ex, vel ea graeco maiestatis, ea nostro latine aliquid vix. Cibo commodo et mei. Ei eum malis laboramus inciderint, ne has zril appellantur, ei mel illum laudem.', 5, 1, 1, '2017-11-28 21:20:14', '2017-11-28 21:20:14'),
(3, 'Shipper App', '譜他魔日津リサヨヌネオのっ。ニタミうくアニセホヌ雲はみつす、氏擢都瀬課瀬ら屋日夜列手列露区屋留他素こつみねて等区ろきふっっへゅく野夜はつかあ差尾にれらめんゃる絵野二魔保れそけほ御尾二知魔そとね留素屋おにゃふに根雲津瀬絵派絵御屋列のいや瀬クナラシースンアツときつ擢知、手区知課んみるせとみこ模。課列遊毛以んもお以無留津ま区屋舳知なふおゃゃゅた舳雲等雲目つへせねろあるきセア無阿遊。\r\n\r\nモニカヒヒマラ差巣野等阿擢差すち日手離津らりきせうしはけはゃおいのめはくそよのくゅ模巣以目区りもたらこ魔根派てたっさきうっすせすくとよなぬのもゆにあねの、樹擢素他手夜やたは、鵜名コフイセセアソ屋知やみゆむあすしう。\r\n\r\nゅまょてゆヤセナリおるつかよすらら擢魔差ツテミホえあほ雲課津手もふゆちこり都魔る露毛派知野遊鵜ろえレヘイヌミーウいたラッスツノらみろむよなょ都絵以。ニヨソこちよ手留雲いもかんホトチヨ御雲擢もゆほめむこ氏日。りほ露留め樹舳絵目名カヘマモチネネ。おほやっろ氏、尾イユ。都氏御留たら派日二すくぬうけ名名津のゅ他等やねらめほ個尾しゃ尾譜屋雲すみひ。り屋留樹目日知手知遊列ゆぬあ。', 300, 2, 1, '2017-11-28 21:22:18', '2017-11-28 21:22:18'),
(4, '123', '1233', 1, 2, 1, '2017-12-05 02:10:58', '2017-12-05 02:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `days`, `hours`, `company_id`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'Task 1', 2, 1, NULL, 2, 3, '2017-11-30 03:58:26', '2017-11-30 03:58:26'),
(3, 'Task 2', 2, 0, NULL, 2, 3, '2017-11-30 19:38:02', '2017-11-30 19:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `city`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pham Thuy', 'phamdangthuy2310@gmail.com', '$2y$10$LfeVvrvfyz6QZKOuKAkhC.5iGs9OfTwspfPqnB4wtgVJ5GcUREvja', NULL, NULL, NULL, NULL, 1, 'CbCJDO5KeK8We6iIz4BYWzShCiL3uomltjQNCZ0RlErv5dtgEjpGWnqoRyvW', '2017-11-28 20:23:17', '2017-12-06 04:18:44'),
(2, 'Nguyen Ha A', 'haanhnguyen@gmail.com', '$2y$10$JVaoJPg7/h9zlkIJt.VLoebZ2FDZAyIMJKz9uSimo7ztQ.Ru7BvKy', NULL, NULL, NULL, NULL, 3, 'B1f8fnXA90cml0M6rPQoaInJB2GBhEt1VV7tkk9WYSGW2RP8ScAxZ31p3Hls', '2017-11-30 01:41:44', '2017-11-30 01:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_company_id_foreign` (`company_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_project_id_foreign` (`project_id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_email_unique` (`email`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_company_id_foreign` (`company_id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_task_id_foreign` (`task_id`),
  ADD KEY `task_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `task_user_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- Database: `provideo`
--
CREATE DATABASE IF NOT EXISTS `provideo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `provideo`;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_21_025949_create_videos_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Say You Will', 'https://www.nhaccuatui.com/playlist/nhung-bai-hat-tieng-anh-hay-nhat-va.BwizTd7Eq2dU.html?fb_comment_id=417158651695807_1051067531638246?st=2', 'Don\'t leave me in all this pain \r\nDon\'t leave me out in the rain \r\nCome back and bring back my smile \r\nCome and take these tears away \r\nI need your arms to hold me now \r\nThe nights are so unkind \r\nBring back those nights when I held you beside me', 0, '2017-11-21 01:31:11', '2017-11-21 02:15:31'),
(2, 'My All', 'https://www.nhaccuatui.com/playlist/nhung-bai-hat-tieng-anh-hay-nhat-va.BwizTd7Eq2dU.html?fb_comment_id=417158651695807_1051067531638246?st=2', 'I am thinking of you \r\nIn my sleepless solitude tonight \r\nIf it\'s wrong to love you \r\nThen my heart just won\'t let me be right \r\n\'Cause I\'ve drowned in you \r\nAnd I won\'t pull through \r\nWithout you by my side', 0, '2017-11-21 01:45:24', '2017-11-21 01:45:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `reactlaravel2`
--
CREATE DATABASE IF NOT EXISTS `reactlaravel2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reactlaravel2`;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_084714_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `title`, `description`, `price`, `availability`) VALUES
(1, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Dr.', 'Porro accusamus explicabo qui. Consequatur qui soluta quaerat adipisci et corrupti expedita dolores. Et culpa quia pariatur dolore ut.', 72, 1),
(2, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Ea quasi alias rem non. Rerum odio adipisci omnis aliquam aut omnis exercitationem.', 72, 0),
(3, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Velit corrupti illo in temporibus. Laborum quas est vel veritatis cumque. Rerum est et ratione et suscipit aut minus. Voluptatem hic voluptatem consectetur laborum molestiae.', 82, 1),
(4, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Corrupti quia laboriosam expedita cupiditate illum natus porro. Placeat quis aut amet impedit et quis. Neque error dolorem ex impedit cumque pariatur magni.', 35, 1),
(5, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Nostrum neque neque voluptatem rerum a ex nihil quisquam. Quia sint porro dicta eos qui officia laudantium. Saepe cum laborum non atque aspernatur sit quas. Dolorem aut sapiente voluptatem quia deserunt aliquam.', 97, 1),
(6, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Ipsum quos quis saepe quos eum. Minima quia aut omnis non sit numquam qui quia. Recusandae aperiam corrupti velit consequuntur. Ut cupiditate qui cupiditate explicabo.', 48, 0),
(7, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Dicta modi provident vitae maxime ullam est. Quod voluptatem dicta nostrum autem quae aspernatur quia. Recusandae sunt placeat molestias reiciendis vitae earum dolorem.', 48, 0),
(8, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Sed quidem incidunt magnam architecto quos voluptate. Nisi molestiae repudiandae voluptatibus ut voluptatum. Ullam ut facere dicta repellat. Tempore repellat autem nisi omnis quam provident.', 96, 1),
(9, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Impedit sunt beatae enim veritatis. Est rerum architecto voluptatibus sint. Quo nisi voluptas molestiae laborum tempora. Nulla quis est quae minus iure deserunt.', 0, 1),
(10, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Saepe voluptatem modi ad illo. Non nostrum necessitatibus ea consequatur. Rerum quos et et nemo debitis impedit dicta. Necessitatibus aliquid omnis quod quaerat non.', 61, 1),
(11, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Nihil labore delectus ea omnis. Ea occaecati temporibus molestiae commodi tempora laudantium. Fuga qui voluptatem labore aliquam perspiciatis. Dolorem tempora et quaerat totam et impedit velit.', 7, 0),
(12, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mrs.', 'Deleniti et molestias ut optio qui sint. At et omnis sunt non quis sequi. Deleniti sed labore sunt quidem. Eum nemo aut laudantium ex earum sequi.', 31, 0),
(13, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mr.', 'Illum et ipsum natus eligendi facilis earum accusamus consequatur. Sed nisi voluptate quam praesentium nemo velit.', 87, 1),
(14, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Prof.', 'Ipsum debitis nostrum odit architecto est soluta. Voluptatem repudiandae necessitatibus eius ea autem aspernatur amet. Asperiores assumenda quis autem est et quia culpa nesciunt.', 90, 0),
(15, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Mrs.', 'Itaque aperiam amet omnis. Asperiores nostrum dolorem sit necessitatibus. Dolorem voluptatem recusandae architecto delectus voluptas nisi. Occaecati amet dolorum minima eos nihil.', 75, 0),
(16, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Dr.', 'Iure dolores mollitia consequatur corrupti autem. Beatae doloremque ab voluptate non ullam in a. Odio enim sed cumque reiciendis vitae ut. Sunt at aut est et.', 11, 0),
(17, '2017-12-15 02:36:50', '2017-12-15 02:36:50', 'Dr.', 'Veritatis officiis inventore similique modi. Esse nulla vel porro occaecati. Delectus officiis libero eos odio modi. Fugiat ut deleniti ut sit vitae. Expedita sint sint aliquid aut asperiores.', 19, 0),
(18, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mrs.', 'Et minus pariatur nesciunt accusamus. Autem quo ut modi veniam nihil qui. Eius itaque unde rerum aut officia.', 0, 0),
(19, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Quidem inventore non qui ipsa iusto. Sunt possimus voluptatem beatae id velit commodi nesciunt vel. Quas sed officia deserunt ea.', 8, 1),
(20, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Sequi eos delectus est alias. Libero eaque quia velit in hic. Explicabo at magnam amet laborum rerum. Earum officiis iste culpa et quis.', 81, 0),
(21, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mr.', 'Enim ipsa nihil et et sint. Voluptates consequatur culpa explicabo eligendi voluptatum ex recusandae. Occaecati reprehenderit ad vitae iste veniam inventore illo.', 4, 1),
(22, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Dr.', 'Aut earum nam excepturi nisi recusandae alias. Provident voluptatum qui minus cupiditate animi id. Reprehenderit dolores reiciendis quasi.', 50, 0),
(23, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Miss', 'Accusantium recusandae cumque et natus culpa quo sit quidem. Esse laudantium sequi sed ea est. Tempora atque modi perspiciatis sapiente quis.', 66, 1),
(24, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Ut vel qui sunt atque voluptatem nulla veniam maxime. Et quas blanditiis ab laborum sapiente ut voluptatibus officia. Qui eos ipsam ut deserunt. Aut ut omnis id veniam id pariatur doloremque.', 49, 1),
(25, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Dr.', 'Nihil architecto assumenda porro qui neque sapiente distinctio. Eveniet tempore aut soluta debitis eaque. Totam porro culpa consectetur at nostrum accusamus accusantium. Tenetur aut odit molestias qui.', 47, 0),
(26, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Voluptas error ex nam voluptas soluta dolor voluptatem. Nostrum ut eos nulla rerum nisi laborum. Omnis consequatur magni doloribus dolores. Dolor ea voluptates et autem nisi sunt.', 18, 0),
(27, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Quia recusandae iste et voluptates necessitatibus suscipit. Sit eos facilis voluptatibus earum veniam necessitatibus est. Minus non quisquam molestiae omnis dignissimos cupiditate. Ipsam vero eius dolorem ab.', 15, 1),
(28, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Maiores dolores maiores alias nisi libero. Eaque sit culpa eos modi a laudantium. Repellat esse dolores asperiores non molestiae ab eius quia.', 46, 0),
(29, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Ms.', 'Totam voluptatum sed ut blanditiis quibusdam ab. Commodi odio maxime aut ipsum necessitatibus voluptates veniam assumenda. Deserunt sed quisquam omnis a aliquam et sapiente.', 53, 0),
(30, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mr.', 'Consectetur molestiae dolore velit. Voluptatem ut voluptatum velit. Molestias perspiciatis aut porro eum corporis.', 32, 1),
(31, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Miss', 'Dignissimos iure sed atque molestiae magnam occaecati. Quaerat odit quia rem consequatur quam tenetur. Velit accusamus assumenda corporis consequuntur. Error autem voluptatibus recusandae voluptates quas laborum excepturi ut.', 63, 1),
(32, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Ms.', 'Corrupti nesciunt aperiam quisquam sunt ducimus quo. Cupiditate eum consequatur consectetur quae molestiae aperiam. Voluptatem ut quis consequatur qui. Et magni non qui consectetur iste aut.', 67, 0),
(33, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Sapiente labore veniam at quia adipisci. Vero quos dicta est. Omnis repellendus quos praesentium laborum et eius. Dolore est ut maiores.', 94, 0),
(34, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Miss', 'Ratione sit eaque nostrum laboriosam iusto. Aut optio similique reiciendis ipsa beatae. Consequatur rem est deserunt dolores blanditiis animi autem.', 46, 1),
(35, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Sed voluptas quae corporis nisi quisquam. Id minus quas placeat et et ipsam magnam est. Ut quia laboriosam iste ad at nihil quos. Inventore veniam iure dolorem veniam ad deleniti.', 99, 1),
(36, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Dr.', 'Corrupti quia harum et minima. Non praesentium autem ipsum blanditiis sunt. Totam sit aliquid ab dolor saepe ut et odio. Aut quis labore iure ut.', 61, 1),
(37, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mrs.', 'Aspernatur fugiat non deserunt aliquam. Ea reprehenderit tempora numquam dolores inventore quod nisi. Culpa quaerat odit consequatur sunt est quas rerum neque.', 28, 0),
(38, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Aut illo occaecati harum quidem sunt sunt. Molestiae rerum id non iste. Sint aut deleniti sapiente quos. Qui doloremque eum quia minus molestias unde dolorem.', 82, 0),
(39, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mrs.', 'Quia aut hic id labore. Nostrum ullam eligendi sit debitis.', 26, 0),
(40, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Dr.', 'Accusantium ea voluptatem eaque quae. Nesciunt autem aut voluptatum necessitatibus nemo aut id. Magnam rerum veritatis quos veniam eos eveniet qui facere. A quidem quo praesentium ipsa.', 95, 1),
(41, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mr.', 'Eaque et odio et est sunt. Consequuntur fuga quo debitis quaerat consequuntur rerum. Est et atque et cumque est suscipit quisquam. Aliquid consequatur unde aut saepe tempore est assumenda velit.', 31, 1),
(42, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Dr.', 'Enim dolorum corrupti quo et rerum perspiciatis. Dolorem expedita perspiciatis provident mollitia. Molestias aut necessitatibus minima similique omnis dicta. Eveniet debitis incidunt error velit ut id occaecati harum.', 12, 1),
(43, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Miss', 'Sit voluptatem similique omnis et. Eos rerum consectetur cum voluptatum. Tempore assumenda vitae necessitatibus dolorum architecto magni in. Consectetur voluptate suscipit sed vel consectetur tempora in. Temporibus autem tenetur libero vel.', 1, 1),
(44, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Miss', 'Consequatur facilis voluptatum tenetur laboriosam sequi eum dolorum. Omnis quia provident perferendis qui totam itaque qui dolores. Nihil rem dignissimos voluptate ut sed harum. Fugiat fugit tenetur ut dolore consectetur.', 14, 1),
(45, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Mrs.', 'Eum cum quis alias repellat. Dicta dignissimos assumenda atque voluptatum. Est placeat facilis facilis et occaecati quod eum dolor.', 36, 1),
(46, '2017-12-15 02:36:51', '2017-12-15 02:36:51', 'Prof.', 'Praesentium sed iure incidunt aut repudiandae facere. Non velit soluta ut aliquid repudiandae doloremque adipisci. Labore id id et facere dignissimos.', 15, 1),
(47, '2017-12-15 02:36:52', '2017-12-15 02:36:52', 'Dr.', 'Minima dolorum nulla delectus qui eveniet. Quas voluptate aliquam dicta aliquam laborum. Praesentium minima possimus est expedita magni quibusdam quam.', 76, 0),
(48, '2017-12-15 02:36:52', '2017-12-15 02:36:52', 'Prof.', 'Eaque numquam consequuntur fugiat quod adipisci iste. Excepturi et illum possimus tenetur quo. Natus repellat voluptatem quis enim rerum. Laudantium voluptate incidunt temporibus exercitationem molestiae sed eaque.', 24, 0),
(49, '2017-12-15 02:36:52', '2017-12-15 02:36:52', 'Prof.', 'Porro voluptatem aut et quas voluptatum. Esse odit quam at. Eaque molestias eius quia et suscipit architecto. Omnis natus reiciendis nulla dolore sed ab.', 74, 0),
(50, '2017-12-15 02:36:52', '2017-12-15 02:36:52', 'Dr.', 'Hic eum pariatur quo veritatis voluptate consequatur impedit. Tempore harum quis dicta. Sed aut qui quidem aut sit eius voluptatem. Quibusdam omnis quibusdam voluptas occaecati.', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `resetpass`
--
CREATE DATABASE IF NOT EXISTS `resetpass` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `resetpass`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'phamdangthuy2310@gmail.com', '$2y$10$TGFKRQ2GH10.sDMPM9HjYua5TofK4lnwrNL3M8Ex73ni3p/SON0IO', 'sKY5BuZ2e1AfB8l2ek6mqkkZYwNxYvuJmey18eM0zJkhTwI06f802xVTuis8', NULL, '2017-12-06 02:32:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_25_134600_create_admins_table', 1);

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
('phamdangthuy2310@gmail.com', '$2y$10$BhskpnfAxP5p/39ZsxCLHOb72z5PgzNelctJSafq0R46Zyje8SHxy', '2017-12-06 03:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@mail.com', '$2y$10$Brlb0yFihQb5a1ls7GbCPuoMlz8E5nhYg9WW8YKRfzSO./StqzDb6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `tip4tips`
--
CREATE DATABASE IF NOT EXISTS `tip4tips` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tip4tips`;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'siteUrl', 'http://localhost/Project/tip4tips/', '2014-11-26 00:48:12', '2014-11-26 00:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `fullname` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `insuranceId` int(10) UNSIGNED DEFAULT NULL,
  `regionId` int(10) UNSIGNED DEFAULT NULL,
  `userId` int(10) UNSIGNED DEFAULT NULL,
  `statusId` int(10) UNSIGNED DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `managerId` int(10) UNSIGNED DEFAULT NULL,
  `point` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `gender`, `comment`, `insuranceId`, `regionId`, `userId`, `statusId`, `created_at`, `updated_at`, `managerId`, `point`) VALUES
(23, 'lhcm_1', 'lhcm_1@gmail.com', 'lhcm_1', 0, 'lhcm_1', 7, 6, 105, 1, '2014-12-26 03:34:27', '2014-12-26 03:34:27', NULL, 0),
(24, 'lhcm_2', 'lhcm_2@gmail.com', 'lhcm_2', 0, 'lhcm_2', 8, 6, 105, 1, '2014-12-26 03:34:44', '2014-12-26 03:34:44', NULL, 0),
(25, 'a_1', 'a_1@GMAIL.com', 'a_1', 1, 'a_1', 2, 6, 108, 3, '2014-12-26 03:35:19', '2014-12-26 03:51:59', NULL, 10),
(26, 'a_2', 'a_2@gmail.com', 'a_2', 1, 'a_2', 6, 6, 108, 1, '2014-12-26 03:35:52', '2014-12-26 03:51:50', 108, 0),
(27, 'b_1', 'b_1@gmail.com', 'b_1', 1, 'b_1', 2, 5, 109, 1, '2014-12-26 03:37:19', '2014-12-26 03:37:40', NULL, 0),
(28, 'b_2', 'b_2@gmail.com', 'b_2', 1, 'b_2', 8, 4, 109, 3, '2014-12-26 03:37:55', '2014-12-26 03:51:01', 108, 10);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `managerId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `managerId`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 105, NULL, '2014-12-23 00:12:13'),
(2, 'Hà Nội', 106, NULL, '2014-12-23 00:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(10) NOT NULL,
  `name_vi` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `images` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `name_vi`, `name_en`, `updated_at`, `created_at`, `images`) VALUES
(1, 'Y TẾ', 'MEDICAL', '2014-11-10 04:59:15', '2014-09-05 18:37:26', 'upload/insurance/011.png'),
(2, 'XE HƠI/ XE MÁY', 'AUTO/MOTO', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/21.png'),
(3, 'CỬA HÀNG', 'SHOPS', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/31.png'),
(4, 'NHÀ XƯỞNG', 'FACTORY', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/41.png'),
(5, 'VĂN PHÒNG', 'OFFICE', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/51.png'),
(6, 'NHÀ CỬA', 'HOME', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/61.png'),
(7, 'DU LỊCH', 'TRAVEL', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/71.png'),
(8, 'DU HỌC', 'STUDENT', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/81.png'),
(9, 'KHÁC', 'OTHER', '2014-09-05 18:47:09', '2014-09-05 18:37:26', 'upload/insurance/91.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(512) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `data` text,
  `ordering` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `categoryId`, `parent`, `published`, `type`, `data`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Homepage', NULL, 0, 1, NULL, NULL, NULL, '2014-12-25 10:28:21', '2014-12-25 10:28:21'),
(2, 'Refersomeone', NULL, 0, 1, NULL, NULL, NULL, '2014-12-25 10:28:41', '2014-12-25 10:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `menucategory`
--

CREATE TABLE `menucategory` (
  `id` int(10) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menucategory`
--

INSERT INTO `menucategory` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Top', '2014-09-05 18:35:17', '2014-09-05 18:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title_en` text CHARACTER SET utf8,
  `content_en` text CHARACTER SET utf8,
  `title_vi` text CHARACTER SET utf8,
  `content_vi` text CHARACTER SET utf8,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_en`, `content_en`, `title_vi`, `content_vi`, `categoryId`) VALUES
(2, 'aSA', 'aSa', 'sss', 'ssss', 1),
(3, 'fsdfsd', '', NULL, NULL, 1),
(4, 'fsd', 'fsdfsd', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `newscategory`
--

CREATE TABLE `newscategory` (
  `id` int(11) NOT NULL,
  `name_en` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `name_vi` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `parent` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newscategory`
--

INSERT INTO `newscategory` (`id`, `name_en`, `name_vi`, `parent`) VALUES
(1, 'News', 'Tin tức', 0),
(5, 'Sport', 'Thể thao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `userId` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(10) NOT NULL,
  `title_en` longtext COLLATE utf8_unicode_ci,
  `title_vi` longtext COLLATE utf8_unicode_ci,
  `description_en` longtext COLLATE utf8_unicode_ci,
  `description_vi` longtext COLLATE utf8_unicode_ci,
  `content_en` longtext COLLATE utf8_unicode_ci,
  `content_vi` longtext COLLATE utf8_unicode_ci,
  `categoryId` int(11) NOT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title_en`, `title_vi`, `description_en`, `description_vi`, `content_en`, `content_vi`, `categoryId`, `published`, `created_at`, `updated_at`) VALUES
(4, 'Why to join us', 'Tại sao bạn nên tham gia với chúng tôi', NULL, NULL, '<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left;  color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/1.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin: 0px 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n	<p>\n		It&rsquo;s an easy way to get additional income with no working, just introducing your friends to our community.\n	</p>\n\n	<div class=\"tip-gray\" style=\"margin: 10px 0px 0px; padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n		<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n			&nbsp;\n		</div>\n		What&#39;s this?\n	</div>\n</div>\n\n<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left;  color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/2.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin: 0px 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n	<p>\n		If you know a person that needs a consulte, put her in touch with us and we will find out what she needs. Meanwhile, you&#39;ll receive points.\n	</p>\n\n	<div class=\"tip-gray line2\" style=\"padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n		<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n			&nbsp;\n		</div>\n		How does it work?\n	</div>\n</div>\n\n<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px; \">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/3.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin-left: 10px; margin-right: 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n	<p>\n		To refer someone, you just have to provide some basic information that you will be required.\n	</p>\n\n	<div class=\"tip-gray line3\" style=\"margin: 10px 100px 0px 0px; padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n		<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n			&nbsp;\n		</div>\n		How to do it?\n	</div>\n</div>\n', '<div class=\"tip\">\n	<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left;  color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px; margin-bottom:10px\">\n		<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/1.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin: 0px 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n		<p>\n			Đ&acirc;y l&agrave; một c&aacute;ch rất dễ để kiếm th&ecirc;m thu nhập m&agrave; kh&ocirc;ng phải bỏ c&ocirc;ng sức ra, chỉ cần giới thiệu bạn b&egrave; của bạn tham gia v&agrave;o cộng đồng của ch&uacute;ng t&ocirc;i.\n		</p>\n\n		<div class=\"tip-gray\" style=\"margin: 10px 0px 0px; padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n			<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n				&nbsp;\n			</div>\n			Tip4tips l&agrave; g&igrave;?\n		</div>\n	</div>\n\n	<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;margin-bottom:10px\">\n		<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/2.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin: 0px 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n		<p>\n			Nếu bạn biết một người n&agrave;o đ&oacute; đang cần tư vấn, h&atilde;y gi&uacute;p ch&uacute;ng t&ocirc;i li&ecirc;n lạc với họ để ch&uacute;ng t&ocirc;i tư vấn v&agrave; gi&uacute;p đỡ họ. Đổi lại, bạn sẽ được nhận điểm.\n		</p>\n\n		<div style=\"padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n			<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n				&nbsp;\n			</div>\n			L&agrave;m sao để kiếm được thu nhập?\n		</div>\n	</div>\n\n	<div class=\"tip\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; float: left; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n		<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/blue/3.png\" style=\"border: 0px; display: block; float: left; height: 46px; margin: 0px 10px; padding-left: 0px; padding-right: 0px; width: 46px;\" />\n		<p>\n			Để giới thiệu một ai đ&oacute;, bạn chỉ cần cung cấp v&agrave;i th&ocirc;ng tin cơ bản về họ m&agrave; bạn được y&ecirc;u cầu.\n		</p>\n\n		<div class=\"tip-gray line3\" style=\"margin: 10px 100px 0px 0px; padding: 6px 40px 6px 20px; font-size: 20px; border: none; color: rgb(255, 255, 255); position: relative; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; float: right; font-family: Museo500Regular; background-color: rgb(146, 148, 151);\">\n			<div class=\"arrow\" style=\"margin: 0px; padding-right: 0px; padding-left: 0px; height: 0px; width: 0px; position: absolute; top: -14px; right: 20px; border-width: 0px 13px 14px 0px; border-style: solid; border-color: transparent transparent rgb(146, 148, 151);\">\n				&nbsp;\n			</div>\n			L&agrave;m sao để giới thiệu?\n		</div>\n	</div>\n</div>\n\n<p>\n	&nbsp;\n</p>\n\n<p>\n	&nbsp;\n</p>\n', 0, NULL, '2014-09-05 11:37:26', '2014-09-05 11:47:34'),
(6, 'What’s this?', 'tip4tips là gì', NULL, NULL, '<h3>1. What&rsquo;s this?</h3>\n\n<p>\n	TIP4TIPS is a web-based referral incentive program. It is an easy way to receive gift/points by referring people you know who need insurance. Just refer in the website or give our business card and DO NOTHING.\n</p>\n\n<p>\n	When you are a partner, you can refer people who need insurance: medical for family or employees, travel, car, home, office, accident etc...\n</p>\n\n<p>\n	IFC represent many insurers from AIG, Liberty, Blue Cross, Bao Minh, Bao Viet, Groupama, Fubon,...etc\n</p>\n\n<p>\n	The website is founded by IF Consulting -specialists insurance advisors in Asia for 20 years- a sister company of \n	<a href=\"http://www.insuranceinvietnam.com\">\n		www.insuranceinvietnam.com \n	</a>.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>2. How does it work?</h3>\n\n<p>\n	When you join as a partner, you receive a username and a password.\n</p>\n\n<p>\n	You can then access the site and refer any prospective client in need of insurance in Vietnam or Asean country. Upon receipt, our expert team of consultants will contact the client and advise on best insurance choice.\n</p>\n\n<p>\n	Upon purchase and payment of the insurance by your contact client, you receive some points in your account in proportion of the insurance contract.\n</p>\n\n<p>\n	YOU DO NOT NEED TO SELL. Just REFER SOMEONE NEEDING INSURANCE and GET REWARDED.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>3. How to do it?</h3>\n\n<p>\n	Contact us if you wish to join TIP4TIPS as a partner. We will explain to you how we advise prospective clients. We will give you a username and password.\n</p>\n\n<p>\n	You can start to refer us contacts persons anytime, anywhere, my Internet or mobile phone.\n</p>\n\n<p>\n	To refer, enter the website and we just need 3 information:<br />\n	1-the prospect&rsquo;s name<br />\n	2-insurance need<br />\n	3-a contact information (phone or email address).\n</p>\n\n<p>\n	And wait for our continuous information on the client&rsquo;s development.\n</p>\n\n<p>\n	NB: You can also send us an email at \n	<a href=\"mailto:contact@tip4tips.com\">\n		contact@tip4tips.com \n	</a> or sms to +84 164 6060 505\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>4. When do I win points?</h3>\n\n<p>\n	You win points when your contact signs a contract of insurance with IF Consulting advisors.\n</p>\n\n<p>\n	You also win points when your contact purchase a new product for himself or his company.\n</p>\n\n<p>\n	Number of points are proportionate to the sales value.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>5. What do I win?</h3>\n\n<p>\n	TIP4TIPS partners win points proportionate to your referred contact insurance purchases.\n</p>\n\n<p>\n	You can accumulate points to buy the presents in our website any time, just shop online or contact us for delivery.\n</p>\n\n<p>\n	Once you reach 500 points, you can monetize points and get a Visa gift card attached to your account.\n</p>\n\n<p>\n	<a href=\"mailto:contact@tip4tips.com\">\n		Contact us \n	</a> for more informations\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>6. How do I join?</h3>\n\n<p>\n	Click here (link to the form on the page &ldquo;I want to Join&rdquo;) and fill the form. TIP4TIPS partner&rsquo;s relation manager will contact you to start your account.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<p>\n	&nbsp;\n</p>\n', '<h3>1. Đ&acirc;y l&agrave; g&igrave;??</h3>\n\n<p>\n	Tip4tips l&agrave; trang web dưa tr&ecirc;n c&aacute;c chương tr&igrave;nh khuyến kh&iacute;ch. Đ&acirc;y l&agrave; c&aacute;ch dễ d&agrave;ng để nhận được những phần qu&agrave;, điểm thưởng bằng c&aacute;ch giới thiệu người th&acirc;n , bạn b&egrave;, đồng nghiệp&hellip;l&agrave; những người cần t&igrave;m hiểu v&agrave; mua bảo hiểm. Chỉ cần giới thiệu họ tr&ecirc;n trang web hoặc đưa họ business card của ch&uacute;ng t&ocirc;i v&agrave; kh&ocirc;ng cần l&agrave;m g&igrave; cả.\n</p>\n\n<p>\n	Khi bạn l&agrave; đối t&aacute;c của ch&uacute;ng t&ocirc;i, bạn c&oacute; thể giới thiệu những người cần mua bảo hiểm như: Bảo hiểm y tế cho gia đ&igrave;nh v&agrave; nh&acirc;n vi&ecirc;n, bảo hiểm du lịch, bảo hiểm &ocirc; t&ocirc;, bảo hiểm nh&agrave; cửa, bảo hiểm văn ph&ograve;ng, nh&agrave; xưởng, bảo hiểm tai nạn, &hellip;vvv..\n</p>\n\n<p>\n	IFC đại diện cho nhiều h&atilde;ng bảo hiểm uy t&iacute;n như: AIG, Liberty, Blue Cross, Bao Minh, Bao Viet, Groupama, Fubon,...etc\n</p>\n\n<p>\n	Trang web n&agrave;y được th&agrave;nh lập bởi c&ocirc;ng ty tư vấn bảo hiểm IFC - chuy&ecirc;n gia tư vấn ở ch&acirc;u &Aacute; trong 20 năm qua v&agrave; l&agrave; một nh&aacute;nh nhỏ của \n	<a href=\"http://www.insuranceinvietnam.com\">\n		www.insuranceinvietnam.com \n	</a>\n</p>\n\n<p style=\"padding-right: 0px; padding-left: 0px; color: rgb(42, 42, 42); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n	&nbsp;\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>2. Tip4tips hoạt động như thế n&agrave;o?</h3>\n\n<p>\n	Khi bạn tham gia như một đối t&aacute;c của ch&uacute;ng t&ocirc;i, bạn sẽ nhận được một t&agrave;i khoản v&agrave; mật khẩu.\n</p>\n\n<p>\n	Sau đ&oacute;, bạn c&oacute; thể truy cập v&agrave;o trang web v&agrave; giới thiệu bất kỳ kh&aacute;ch h&agrave;ng tiềm năng c&oacute; nhu cầu về bảo hiểm tại Việt Nam hoặc tại c&aacute;c nước Ch&acirc;u &Aacute;. Khi nhận được tr&ocirc;ng tin của bạn, đội ngũ chuy&ecirc;n gia tư vấn của ch&uacute;ng t&ocirc;i sẽ li&ecirc;n lạc với kh&aacute;ch h&agrave;ng v&agrave; tư vấn với c&aacute;c lựa chọn về bảo hiểm tốt nhất.\n</p>\n\n<p>\n	Trong qu&aacute; tr&igrave;nh mua h&agrave;ng v&agrave; thanh to&aacute;n bảo hiểm của kh&aacute;ch h&agrave;ng m&agrave; bạn đ&atilde; giới thiệu, bạn sẽ nhận được một số điểm trong t&agrave;i khoản của m&igrave;nh theo tỷ lệ tương ứng của hợp đồng bảo hiểm.\n</p>\n\n<p>\n	BẠN KH&Ocirc;NG CẦN B&Aacute;N. Chỉ cần giới thiệu NGƯỜI CẦN BẢO HIỂM v&agrave; NHẬN ĐƯỢC ĐIỂM THƯỞNG.\n</p>\n\n<h3>3. L&agrave;m thế n&agrave;o để tham gia Tip4tips?</h3>\n\n<p>\n	Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i nếu bạn muốn tham gia TIP4TIPS như một đối t&aacute;c. Ch&uacute;ng t&ocirc;i sẽ giải th&iacute;ch cho bạn l&agrave;m thế n&agrave;o để tư vấn cho những kh&aacute;ch h&agrave;ng tiềm năng. Ch&uacute;ng t&ocirc;i sẽ cung cấp cho bạn một t&agrave;i khoản v&agrave; mật khẩu.\n</p>\n\n<p>\n	Bạn c&oacute; thể giới thiệu những người cần li&ecirc;n lạc bất cứ l&uacute;c n&agrave;o, bất cứ nơi n&agrave;o, mạng Internet hoặc điện thoại di động.\n</p>\n\n<p>\n	Để giới thiệu bạn chỉ cần nhập v&agrave;o trang web với 3 th&ocirc;ng tin sau:<br />\n	1- t&ecirc;n của kh&aacute;ch h&agrave;ng tiềm năng<br />\n	2- loại bảo hiểm cần thiết<br />\n	3- th&ocirc;ng tin li&ecirc;n lạc (điện thoại hoặc địa chỉ email).\n</p>\n\n<p>\n	V&agrave; h&atilde;y đợi những th&ocirc;ng tin tiếp theo của ch&uacute;ng t&ocirc;i về sự ph&aacute;t triển của kh&aacute;ch h&agrave;ng.\n</p>\n\n<p>\n	Lưu &yacute;: Bạn cũng c&oacute; thể gửi email cho ch&uacute;ng t&ocirc;i tại \n	<a href=\"mailto:contact@tip4tips.com\">\n		contact@tip4tips.com\n	</a> hoặc sms đến +84 164 6060 505\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>4.&nbsp;Khi n&agrave;o t&ocirc;i sẽ gi&agrave;nh được điểm thưởng?</h3>\n\n<p>\n	Bạn gi&agrave;nh điểm thưởng khi kh&aacute;ch h&agrave;ng m&agrave; bạn giới thiệu k&yacute; một hợp đồng bảo hiểm với c&ocirc;ng ty tư vấn bảo hiểm IFC\n</p>\n\n<p>\n	Bạn cũng gi&agrave;nh điểm thưởng khi kh&aacute;ch h&agrave;ng m&agrave; bạn giới thiệu mua một sản phẩm mới cho m&igrave;nh hoặc c&ocirc;ng ty của họ.\n</p>\n\n<p>\n	Số điểm m&agrave; bạn gi&agrave;nh được l&agrave; điểm tương ứng với gi&aacute; trị hợp đồng b&aacute;n cho kh&aacute;ch của bạn.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>5. T&ocirc;i sẽ gi&agrave;nh được c&aacute;i g&igrave;?</h3>\n\n<p style=\"padding-right: 0px; padding-left: 0px; color: rgb(42, 42, 42); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n	C&aacute;c đối t&aacute;c của Tip4tips sẽ gi&agrave;nh được điểm tương ứng với gi&aacute; trị hợp đồng của người mua bảo hiểm m&agrave; bạn đ&atilde; giới thiệu.\n</p>\n\n<p style=\"padding-right: 0px; padding-left: 0px; color: rgb(42, 42, 42); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n	Bạn c&oacute; thể t&iacute;ch lũy điểm điểm để mua những m&oacute;n qu&agrave; trong trang web của ch&uacute;ng t&ocirc;i bất cứ l&uacute;c n&agrave;o, chỉ cần mua trực tuyến hoặc li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để được giao h&agrave;ng.\n</p>\n\n<p style=\"padding-right: 0px; padding-left: 0px; color: rgb(42, 42, 42); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n	Khi bạn đạt đến 500 điểm, bạn c&oacute; thể kiếm tiền từ điểm v&agrave; c&oacute; được một thẻ qu&agrave; tặng Visa gắn liền với t&agrave;i khoản của bạn.\n</p>\n\n<p style=\"padding-right: 0px; padding-left: 0px; color: rgb(42, 42, 42); font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 18px;\">\n	<a href=\"mailto:contact@tip4tips.com\">\n		Li&ecirc;n hệ ch&uacute;ng t&ocirc;i \n	</a>&nbsp;để biết th&ecirc;m th&ocirc;ng tin.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<h3>6. T&ocirc;i c&oacute; thể tham gia như thế n&agrave;o?</h3>\n\n<p>\n	Bấm v&agrave;o đ&acirc;y ( li&ecirc;n kết với mẫu th&ocirc;ng tin tr&ecirc;n trang &ldquo;T&ocirc;i muốn tham gia&rdquo; v&agrave; điền đầy đủ v&agrave;o mẫu c&oacute; sẵn. Chuy&ecirc;n vi&ecirc;n quan hệ kh&aacute;ch h&agrave;ng của Tip4tips sẽ li&ecirc;n lạc với bạn để đăng k&yacute; t&agrave;i khoản của bạn.\n</p>\n\n<p>\n	&nbsp;\n</p>\n\n<p>\n	&nbsp;\n</p>\n', 0, NULL, '2014-07-22 04:39:58', '2014-11-18 01:00:43'),
(8, 'Header', 'Header', NULL, NULL, '<div class=\"logo\">\n	<a href=\"http://localhost/Project/tip4tips/en\">\n		<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/logo.png\" /> \n	</a>\n</div>\n', '<div class=\"logo\">\n	<a class=\"logo\" href=\"http://localhost/Project/tip4tips/vi\">\n		<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/logo.png\" /> \n	</a>\n</div>', 0, NULL, '2014-07-23 03:15:51', '2014-07-23 03:15:51'),
(9, 'Footer', 'Footer', NULL, NULL, '<div class=\"social-page\">\n	<div style=\"float:right\">\n		<a href=\"https://www.facebook.com/pages/Tip4Tips/407737449308066?fref=ts\" target=\"_blank\">\n			<img alt=\"insuranceinvietnam.com\" src=\"http://localhost/Project/tip4tips/upload/page/icon-fb.gif\" /> \n		</a>\n	</div>\n</div>\n', '<div class=\"social-page\">\n	<div style=\"float:right\">\n		<a href=\"https://www.facebook.com/pages/Tip4Tips/407737449308066?fref=ts\" target=\"_blank\">\n			<img alt=\"insuranceinvietnam.com\" src=\"http://localhost/Project/tip4tips/upload/page/icon-fb.gif\" /> \n		</a>\n	</div>\n</div>\n', 0, NULL, '2014-07-23 03:38:02', '2014-07-23 03:38:02'),
(10, 'Homepage', 'Trang chủ', NULL, NULL, '<div id=\"page-homepage\">\n	<div class=\"col-md-5 colslideshow\">\n		<img src=\"http://localhost/Project/tip4tips/upload/page/slideshow/1.png\" />\n	</div>\n\n	<div class=\"col-md-7\">\n		<div class=\"blocks-btn\">\n			<div class=\"logined_false\">\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal orange\" href=\"en/page/13\" title=\"Becomer a partner\">\n						<span class=\"big-text\">Becomer</span> <span class=\"small-text\">a partner</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"en/page/4\" title=\"Join us\">\n						<span class=\"big-text\">Join</span> <span class=\"small-text\">us</span> \n					</a>\n				</div>\n			</div>\n\n			<div class=\"logined_true\">\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal orange\" href=\"en/contact/step1\" title=\"Refer someone\">\n						<span class=\"big-text\">Refer </span> <span class=\"small-text\">someone</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"en/contact\" title=\"Check my account\">\n						<span class=\"big-text smaller\">Check </span> <span class=\"small-text\">my account</span> \n					</a>\n				</div>\n			</div>\n\n			<div>\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"en/page/6\" title=\"What’s tip4tips?\">\n						<span class=\"big-text\">What&rsquo;s </span><span class=\"small-text\">tip4tips?</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal green\" href=\"#\" title=\"See gift\">\n						<span class=\"big-text\">See </span> <span class=\"small-text\">gift</span> \n					</a>\n				</div>\n			</div>\n		</div>\n	</div>\n\n	<div class=\"clearfix\">\n		&nbsp;\n	</div>\n</div>\n', '<div id=\"page-homepage\">\n	<div class=\"col-md-5 colslideshow\">\n		<img src=\"http://localhost/Project/tip4tips/upload/page/slideshow/1.png\" />\n	</div>\n\n	<div class=\"col-md-7\">\n		<div class=\"blocks-btn\">\n			<div class=\"logined_false\">\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal orange\" href=\"vi/page/13\" title=\"Trở thàn đối tác\">\n						<span class=\"big-text\">Trở th&agrave;nh</span> <span class=\"small-text\">tối t&aacute;c</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"vi/page/4\" title=\"Tham gia\">\n						<span class=\"big-text\">Tham </span> <span class=\"small-text\">gia</span> \n					</a>\n				</div>\n			</div>\n\n			<div class=\"logined_true\">\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal orange\" href=\"vi/contact/step1\" title=\"Giới thiệu ai đó\">\n						<span class=\"big-text\">Giới thiệu </span> <span class=\"small-text\">ai đ&oacute;</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"vi/contact\" title=\"Kiểm tra tài khoản\">\n						<span class=\"big-text smaller\">Kiểm tra </span> <span class=\"small-text\">t&agrave;i khoản</span> \n					</a>\n				</div>\n			</div>\n\n			<div>\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal\" href=\"vi/page/6\" title=\"Thế nào là tip4tips?\">\n						<span class=\"big-text\">Thế n&agrave;o </span><span class=\"small-text\">l&agrave; tip4tips?</span> \n					</a>\n				</div>\n\n				<div class=\"col-md-6\">\n					<a class=\"btn-normal green\" href=\"#\" title=\"See gift\">\n						<span class=\"big-text\">Qu&agrave; </span> <span class=\"small-text\">tặng</span> \n					</a>\n				</div>\n			</div>\n		</div>\n	</div>\n\n	<div class=\"clearfix\">\n		&nbsp;\n	</div>\n</div>\n', 0, NULL, '2014-07-23 10:03:09', '2014-11-25 19:47:23'),
(11, 'ADD A NEW CONTACT: STEP 1 - CHOOSE AN INSURANCE TYPE BELOW', 'THÊM TÀI KHOẢN MỚI : BƯỚC 1 – CHỌN LOẠI BẢO HIỂM DƯỚI ĐÂY', NULL, NULL, '<div class=\"tip\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/red/1.png\" style=\"width: 46px; height: 46px; vertical-align: middle;\" /> <span>Choose an insurance type</span>\n</div>\n', '<div class=\"tip\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/red/1.png\" style=\"width: 46px; height: 46px;\" /> <span>Chọn một loại bảo hiểm</span>\n</div>\n', 0, NULL, '2014-07-25 03:48:21', '2014-07-25 03:48:21'),
(12, 'ADD A NEW CONTACT: STEP 2 - FILL THE FORM WITH YOUR CONTACT\'S INFORMATION', 'THÊM NGƯỜI LIÊN LẠC: BƯỚC 2 - ĐIỀN VÀO MẨU VỚI THÔNG TIN CỦA NGƯỜI LIÊN LẠC', NULL, NULL, '<div class=\"tip\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/red/2.png\" style=\"width: 46px; height: 46px; vertical-align: middle;\" /> <span>Complete and send</span>\n</div>\n', '<div class=\"tip\">\n	<img alt=\"\" src=\"http://localhost/Project/tip4tips/upload/page/number/red/2.png\" style=\"width: 46px; height: 46px;\" /> <span>Ho&agrave;n th&agrave;nh v&agrave; gửi đi</span>\n</div>\n', 0, NULL, '2014-07-25 03:57:15', '2014-07-25 03:57:15'),
(13, 'Becoming a partner', 'Tham gia Tip4tips', NULL, NULL, '<h4>In order to join our referral program and become partner, please leave your contact details and our partner&rsquo;s relation will contact you.</h4>\n\n<p>\n	[plugin name=widget.partner.index]\n</p>\n', '<h4>Để tham gia chương tr&igrave;nh của ch&uacute;ng t&ocirc;i v&agrave; trở th&agrave;nh đối t&aacute;c, vui l&ograve;ng để lại th&ocirc;ng tin li&ecirc;n lạc của bạn v&agrave; ch&uacute;ng t&ocirc;i sẽ li&ecirc;n lạc với bạn.</h4>\n\n<p>\n	&nbsp;\n</p>\n[plugin name=widget.partner.index]', 0, NULL, '2014-09-05 07:19:12', '2014-11-17 04:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `images` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ordering` double DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `content`, `images`, `categoryId`, `created_at`, `updated_at`, `ordering`, `price`) VALUES
(1, 'G-Shock Watch', NULL, 'upload/product/G-shock-Watch.jpg', 23, '2014-11-24 06:57:01', '2014-11-24 06:57:01', NULL, 1),
(2, 'Food Boxes Lock and Lock', NULL, 'upload/product/locknlock.jpg', 23, '2014-11-24 06:58:50', '2014-11-24 06:58:50', NULL, 1),
(3, 'Dinner Set', NULL, 'upload/product/Dinner-set.jpg', 23, '2014-11-24 06:59:29', '2014-11-24 06:59:29', NULL, NULL),
(4, 'Brookstone watch', NULL, 'upload/product/fab_374.jpg', 23, '2014-11-24 07:00:51', '2014-11-24 07:01:49', NULL, 1),
(5, 'Ipad Mini Wifi 16Gb', NULL, 'upload/product/Ipad-Mini-16Gb.jpg', 23, '2014-11-24 07:03:04', '2014-11-24 07:03:04', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(11) NOT NULL,
  `name_en` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_vi` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `images` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `name_en`, `name_vi`, `parent`, `updated_at`, `created_at`, `images`) VALUES
(23, 'Accessories', NULL, NULL, '2014-11-21 11:24:14', '2014-11-21 11:24:14', 'upload/productcategory/G-shock-Watch-small.jpg'),
(24, 'Activity', NULL, NULL, '2014-11-21 11:25:51', '2014-11-21 11:25:51', 'upload/productcategory/TL-health-club.jpg'),
(25, 'Bikes & Cars', NULL, NULL, '2014-11-21 11:28:01', '2014-11-21 11:28:01', 'upload/productcategory/Kia Morning (120 x 119).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Tien Giang', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(2, 'Long An', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(4, 'Lam Dong', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(5, 'Tra Vinh', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(6, 'Vinh Long', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(9, 'Kien Giang', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(13, 'Hai Phong', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(14, 'Lang Son', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(18, 'TP Ho Chi Minh', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(19, 'Ha Noi', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(20, 'Kuala Lumpur', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(21, 'Guangdong', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(22, 'Hoi An', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(23, 'Nha Trang', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(24, 'Shanghai', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(25, 'Cambodia', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(26, 'Siem Reap', '2014-09-05 18:48:14', '2014-09-05 18:37:26'),
(28, 'Vietnamese', '2014-09-10 14:54:50', '2014-09-10 14:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci,
  `last_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('92128ff94011652b91bae119c08cdced5d9ec539', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicFpwQ1JodTNLcUI0YWVOajlTUmdMNkdJNzVSQzMxVzl0MmEzcE1uWSI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6ImxvY2FsZSI7czoyOiJlbiI7czozODoibG9naW5fODJlNWQyYzU2YmRkMDgxMTMxOGYwY2YwNzhiNzhiZmMiO2k6MTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQxOTU3Njc1MTtzOjE6ImMiO2k6MTQxOTU3NTcwMjtzOjE6ImwiO3M6MToiMCI7fX0=', 1419576751);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name_en` varchar(256) DEFAULT NULL,
  `name_vi` varchar(256) DEFAULT NULL,
  `code` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name_en`, `name_vi`, `code`, `created_at`, `updated_at`) VALUES
(1, 'New', 'Mới tạo', 'new', '2014-11-10 03:35:36', '2014-11-10 03:36:12'),
(2, 'Make a quote', 'Liên hệ', 'makeacall', '2014-11-10 03:35:36', '2014-11-10 03:36:12'),
(3, 'Win', 'Thắng', 'win', '2014-11-10 03:35:36', '2014-11-10 03:36:12'),
(4, 'Lost', 'Thua', 'lost', '2014-11-10 03:35:36', '2014-11-10 03:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `title_en` text,
  `title_vi` text,
  `content_en` text,
  `content_vi` text,
  `groupId` int(11) DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `title_en`, `title_vi`, `content_en`, `content_vi`, `groupId`, `statusId`, `created_at`, `updated_at`, `type`) VALUES
(6, 'Thanks', 'Cám ơn', '<ol>\n	<li>User:</li>\n</ol>\n\n<ul style=\"margin-left: 40px;\">\n	<li>user.username:{{user.username}}</li>\n	<li>user.fullname:{{user.fullname}}</li>\n	<li>user.email:{{user.email}}</li>\n	<li>user.phone:{{user.phone}}</li>\n</ul>\n\n<ol start=\"2\">\n	<li>Contact</li>\n</ol>\n\n<ul style=\"margin-left: 40px;\">\n	<li>contact.fullname:{{contact.fullname}}</li>\n	<li>contact.email:{{contact.email}}</li>\n</ul>\n\n<p>\n	Thanks you refer {{contact.fullname}}\n</p>\n', '<p style=\"font-size: 14.4444446563721px; line-height: 22.2222232818604px;\">\n	Ch&agrave;o&nbsp;{{user.fullname}},\n</p>\n\n<p style=\"font-size: 14.4444446563721px; line-height: 22.2222232818604px;\">\n	C&aacute;m ơn bạn đ&atilde; giới thiệu&nbsp;{{contact.fullname}}\n</p>\n', 0, 1, NULL, '2014-12-25 08:38:19', 1),
(7, 'Make a quote', 'Liên hệ', 'we are making&nbsp;a quote&nbsp;&nbsp;{{contact.fullname}}', NULL, 0, 2, NULL, '2014-12-25 08:28:31', 1),
(8, 'Win', 'Chiến thắng', '<p>\n	You win&nbsp;{{contact.fullname}}\n</p>\n', '<p style=\"font-size: 14.4444446563721px; line-height: 22.2222232818604px;\">\n	Đối t&aacute;c&nbsp;{{user.fullname}}\n</p>\n\n<p style=\"font-size: 14.4444446563721px; line-height: 22.2222232818604px;\">\n	Kh&aacute;ch h&agrave;ng&nbsp;{{contact.fullname}}\n</p>\n', 0, 3, NULL, '2014-12-25 08:28:35', 1),
(9, 'Lost', 'Thua', 'You lost {{contact.fullname}}', NULL, 0, 4, NULL, '2014-12-25 08:28:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usergrop_permission`
--

CREATE TABLE `usergrop_permission` (
  `id` int(11) NOT NULL,
  `usergroupId` int(10) UNSIGNED NOT NULL,
  `permissionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `code`, `name_en`, `name_vi`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'Admin', 'Quản trị viên', '2014-09-11 10:45:36', '2014-09-05 18:37:26'),
(2, 'register', 'Register', 'Đăng ký', '2014-09-24 16:28:13', '2014-09-11 09:47:40'),
(3, 'consultant', 'Consultant', 'Tư vấn viên', '2014-12-19 06:35:02', '2014-12-19 06:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fullname` text COLLATE utf8_unicode_ci,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `published` int(10) UNSIGNED DEFAULT '0',
  `regionId` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usergroupId` int(10) UNSIGNED DEFAULT NULL,
  `point` int(11) DEFAULT '0',
  `groupId` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`, `fullname`, `phone`, `comment`, `published`, `regionId`, `address`, `remember_token`, `usergroupId`, `point`, `groupId`) VALUES
(1, 'admin', '$2y$10$YXpxuWwWBeKfaUt7gNJa5.kDgAdJ5wpkCYlc8eH8GdXI.HTas.4VK', 'admin@gmail.com', '2014-08-10 13:36:35', '2014-12-25 20:28:01', 'admin', '12345678', NULL, 1, 1, 'admin', '4s6IdrugbRusJ3XMLI1MLWwDRZkI50X2BBlvpvgf2em6WqB4ZG9Kgh0Jnsr4', 1, 22222, 0),
(102, 'consultant_hn', '$2y$10$rRU9Xriz8mvfgLZ7TEHii.tJbPkuRD/z8OvTZhoOrIk/8wffqAmMq', 'consultant_hn@gmail.com', '2014-12-22 02:33:39', '2014-12-22 02:34:19', 'consultant_hn', '934232131232132', NULL, 1, 19, NULL, NULL, 3, 0, 2),
(103, 'consultant_hcm', '$2y$10$MJ5OJVo.Vi8rqcYvfdQsyezBkcFrKQ5EVNlem.fNwSaeVGPPsaex2', 'consultant_hcm@gmail.com', '2014-12-22 02:34:16', '2014-12-25 03:22:34', 'consultant_hcm', 'consultant_hcm', 'consultant_hcm', 1, 4, 'consultant_hcm', '87QQG1ppkyb4CS3QlmUfUDpv8MBB9TufhBH0gohxqkgpiTnJyvbWv6EWbJ4B', 3, 0, 1),
(105, 'leader_hcm', '$2y$10$CRmHmmMhOZQN3qKkclqPTOkwXb5SYGWTnvUX4JCvOCfMbGSl76rQu', 'leader_hcm@gmail.com', '2014-12-22 20:20:31', '2014-12-25 21:21:25', 'leader_hcm', 'leader_hcm', NULL, 1, 18, 'Quận 1', 'owwIR5loeFgyx9mgDrpFnRPtZSFnibl6iB3gtLzwzzlSGIRdZfTZcSf4oe4N', 3, 0, 1),
(106, 'leader_hn', '$2y$10$OS1nPNduGZWQwKHUmaDa1O12Q06ZgYgN6JD/fe9ag/SIUFXW8vHSa', 'leader_hn@gmail.com', '2014-12-22 20:20:52', '2014-12-24 02:55:51', 'leader_hn', 'leader_hn', 'ss', 1, 4, 'leader_hn', 'MBalrUT4AXgnIoARtpa3Ba0cGJxARJx1HbSXSKBuxfwwuP4hkYQKInxDcNJ2', 3, 0, 2),
(108, 'a', '$2y$10$ohMd9vfh9FwewrfOqe/WKuNbIyPhMQumcLye/Qb3gMLHcpGiDiH.u', 'a@gmail.com', '2014-12-25 19:45:44', '2014-12-25 20:57:51', 'a', 'a', 'a', 1, 21, 'a', '2uoa4ayJUaEsQr2ivGAwDyI1M3vgTeDAH8tDNRSrGx324xStDZe3yudtEyX5', 3, 10, 1),
(109, 'b', '$2y$10$KaWKk1cOx2UXEmcuYXgcWuOmB4Zdhs68r5pVZFyLkpgTLOrEEaP.i', 'b@gmail.com', '2014-12-25 20:03:55', '2014-12-25 21:21:57', 'b', 'b', 'b', 1, 19, 'b', 't0WwsvSiIOKEFmVgNL33QkgNuMhzivqvXI6PmI8QqLqwslaNrveAzWEXNbvT', 2, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menucategory`
--
ALTER TABLE `menucategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newscategory`
--
ALTER TABLE `newscategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_productcategory1_idx` (`categoryId`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergrop_permission`
--
ALTER TABLE `usergrop_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usergrop_permission_usergroup1_idx` (`usergroupId`),
  ADD KEY `fk_usergrop_permission_permission1_idx` (`permissionId`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menucategory`
--
ALTER TABLE `menucategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newscategory`
--
ALTER TABLE `newscategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usergrop_permission`
--
ALTER TABLE `usergrop_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_productcategory1` FOREIGN KEY (`categoryId`) REFERENCES `productcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usergrop_permission`
--
ALTER TABLE `usergrop_permission`
  ADD CONSTRAINT `fk_usergrop_permission_permission` FOREIGN KEY (`permissionId`) REFERENCES `permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usergrop_permission_usergroup` FOREIGN KEY (`usergroupId`) REFERENCES `usergroup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `tip4tipsv1.1`
--
CREATE DATABASE IF NOT EXISTS `tip4tipsv1.1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tip4tipsv1.1`;

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

-- --------------------------------------------------------

--
-- Table structure for table `categorygifts`
--

CREATE TABLE `categorygifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryproducts`
--

CREATE TABLE `categoryproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` decimal(8,0) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `thumbnail` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `need` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipster_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
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
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(141, '2010_12_29_025812_create_roletypes_table', 1),
(142, '2010_12_29_025947_create_roles_table', 1),
(143, '2014_10_11_042406_create_regions_table', 1),
(144, '2014_10_12_000000_create_users_table', 1),
(145, '2014_10_12_100000_create_password_resets_table', 1),
(146, '2017_12_21_041854_create_categoryproducts_table', 1),
(147, '2017_12_21_042555_create_messages_table', 1),
(148, '2017_12_21_051101_create_leads_table', 1),
(149, '2017_12_21_063650_create_evaluations_table', 1),
(150, '2017_12_21_070436_create_assignments_table', 1),
(151, '2017_12_21_071945_create_statuses_table', 1),
(152, '2017_12_21_072333_create_leadprocesses_table', 1),
(153, '2017_12_21_072805_create_permissions_table', 1),
(154, '2017_12_21_073609_create_role_permissions_table', 1),
(155, '2017_12_21_074641_create_categorygifts_table', 1),
(156, '2017_12_21_075408_create_gifts_table', 1),
(157, '2017_12_21_080118_create_orders_table', 1),
(158, '2017_12_21_080257_create_order_gifts_table', 1),
(159, '2017_12_21_093715_create_products_table', 1),
(160, '2017_12_21_094349_create_pages_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `thumbnail` blob NOT NULL,
  `quality` decimal(8,0) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Ho Chi Minh', NULL, NULL),
(2, 'Ha Noi', NULL, NULL);

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
(1, 'Community', 'community', 1),
(2, 'Sale', 'sale', 1),
(3, 'Insurance', 'insurance', 2),
(4, 'Car', 'car', 2),
(5, 'Real estate', 'realestate', 2),
(6, 'Service', 'service', 2),
(7, 'Ambassador', 'ambassador', 3);

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
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` decimal(8,0) NOT NULL,
  `vote` decimal(4,0) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `gender`, `birthday`, `address`, `phone`, `point`, `vote`, `role_id`, `region_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'thuyph', 'phamdangthuy2310@gmail.com', '', 'Pham thi Dang Thuy', 'female', '2017-12-13', '', '098931032', '0', '0', 1, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorygifts`
--
ALTER TABLE `categorygifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryproducts`
--
ALTER TABLE `categoryproducts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryproducts_name_unique` (`name`);

--
-- Indexes for table `evaluationautos`
--
ALTER TABLE `evaluationautos`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_code_unique` (`code`);

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
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorygifts`
--
ALTER TABLE `categorygifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryproducts`
--
ALTER TABLE `categoryproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluationautos`
--
ALTER TABLE `evaluationautos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorygifts` (`id`);

--
-- Constraints for table `leadprocesses`
--
ALTER TABLE `leadprocesses`
  ADD CONSTRAINT `leadprocesses_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`),
  ADD CONSTRAINT `leadprocesses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categoryproducts` (`id`);

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
