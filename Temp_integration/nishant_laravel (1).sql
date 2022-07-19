-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 03:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nishant_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cname`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Cars', '0', '2022-06-14 04:17:12', '2022-06-17 04:59:25', NULL),
(6, 'Furniture', '1', '2022-06-14 04:17:33', '2022-07-19 01:50:04', NULL),
(7, 'Sports', '1', '2022-06-14 04:18:44', '2022-06-17 04:55:17', NULL),
(8, 'Appliances', '1', '2022-06-14 04:20:45', '2022-06-29 00:40:29', NULL),
(24, 'Electronics', '1', '2022-06-17 04:39:36', '2022-06-29 03:43:00', NULL),
(25, 'Clothes', '1', '2022-06-17 04:57:50', '2022-06-29 05:43:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_050220_categories', 1),
(6, '2022_06_13_050314_products', 1),
(7, '2022_06_14_094015_newcolumnincategory', 2),
(8, '2022_06_27_101141_softdelete', 3),
(9, '2022_06_28_113021_softdeletepc', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdbyuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `images`, `createdbyuser`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Watch', '24', '1655462691.jpg', '1', '0', '2022-06-17 05:14:51', '2022-07-19 06:22:11', NULL),
(19, 'Cells', '24', '1655462743.jpg', '1', '1', '2022-06-17 05:15:43', '2022-07-19 02:40:43', NULL),
(20, 'USB Cables', '24', '1655462771.jpg', '1', '1', '2022-06-17 05:16:11', '2022-06-17 05:16:11', NULL),
(21, 'Wachine Machine', '8', '1655468309.jpg', '1', '1', '2022-06-17 05:18:05', '2022-06-17 06:48:29', NULL),
(31, 'aaaaa', '6', '1658236485.jpg', '1', '1', '2022-07-19 07:44:45', '2022-07-19 07:44:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `hobbies`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'testuser@kcsitglobal.com', 'Male', '', NULL, '$2y$10$gjizIzAPA.B26mqJVYvQ5OovQOsShNf4mEo055eL9WX0OWw32CM06', '1', NULL, NULL, NULL, NULL),
(6, 'vishruti', 'vishruti@gmail.com', 'Female', 'Cricket,Shopping', NULL, '$2y$10$iCfbRlg6xtIzeIP9IZCLPOL8Hehv1wSidoHd2RA8LFlI0HvH5Yv82', '0', NULL, '2022-06-13 05:19:48', '2022-07-19 02:09:49', NULL),
(8, 'Sahil Savaliya', 'sahil@gmail.com', 'Male', 'Cricket,Swimming', NULL, '$2y$10$AbLj0SOG7gLkqymn7PB6aeUv/Rbm8ljKDchDyfW478MxlBuGqEJwm', '0', NULL, '2022-06-17 04:52:55', '2022-06-29 22:36:05', NULL),
(9, 'Tej Soni', 'tej@gmail.com', 'Male', 'Shopping', NULL, '$2y$10$RvvJ10rsWOTS/yAYxvT6iOW0S6.Lcb9zMg18nVqcvUXjH3GEA.vAq', '0', NULL, '2022-06-17 05:04:26', '2022-06-17 05:04:26', NULL),
(10, 'Zalak', 'zalak@gmail.com', 'Female', 'Singing', NULL, '$2y$10$hLrDM9FwtQQlK3gL2eSUBuAkBZF1gueAUsvK5TkllZc2nQW3ELr0W', '0', NULL, '2022-06-17 05:05:33', '2022-06-17 05:05:33', NULL),
(11, 'Vishal', 'vishal@gmail.com', 'Male', 'Cricket,Swimming,Singing,Shopping', NULL, '$2y$10$oQqphKDK4f3UD4zf9IG./OLMiwq74sBVKighLZosiEP/miLFcqeCO', '0', NULL, '2022-06-17 05:06:02', '2022-06-17 05:06:02', NULL),
(12, 'Sachin', 'sachin@gmail.com', 'Male', 'Singing', NULL, '$2y$10$9jNxCEQssjGA392BdviT6uqfBZZXTierRH9yse2SKpRQyFsYIAhKG', '0', NULL, '2022-06-17 05:06:32', '2022-06-17 05:06:32', NULL),
(14, 'Milind Patil', 'mp@gmail.com', 'Male', 'Cricket,Swimming', NULL, '$2y$10$shNPeCAveniEio2lj939zu4t7/iI0Bpkhb1jYYZCBBi0n9/Pcgzre', '0', NULL, '2022-06-17 06:43:14', '2022-06-17 06:44:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
