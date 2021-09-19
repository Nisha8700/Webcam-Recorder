-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 02:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file`
--

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `file_path` varbinary(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `created_at`, `updated_at`, `name`, `title`, `duration`, `file_path`) VALUES
(1, '2021-09-12 01:41:26', '2021-09-12 01:41:26', '1631430686_video.mp4', 'short vedio', NULL, 0x2f73746f726167652f75706c6f6164732f313633313433303638365f766964656f2e6d7034),
(2, '2021-09-12 07:45:43', '2021-09-12 07:45:43', '1631452542_video.mp4', NULL, NULL, 0x2f73746f726167652f75706c6f6164732f313633313435323534315f766964656f2e6d7034),
(3, '2021-09-12 08:04:05', '2021-09-12 08:04:05', '1631453645_Koyal Si Teri Boli Full Song _ Beta _ Anil Kapoor_(480P).mp4', NULL, NULL, 0x2f73746f726167652f75706c6f6164732f313633313435333634355f4b6f79616c205369205465726920426f6c692046756c6c20536f6e67205f2042657461205f20416e696c204b61706f6f725f2834383050292e6d7034),
(4, '2021-09-12 10:25:47', '2021-09-12 10:25:47', '1631462147_Koyal Si Teri Boli Full Song _ Beta _ Anil Kapoor_(480P).mp4', NULL, NULL, 0x2f73746f726167652f75706c6f6164732f313633313436323134375f4b6f79616c205369205465726920426f6c692046756c6c20536f6e67205f2042657461205f20416e696c204b61706f6f725f2834383050292e6d7034),
(5, '2021-09-12 11:48:06', '2021-09-12 11:48:06', '1631467086_ram jai jai ram shree ram jai jai ram hi pukaru(360P).mp4', NULL, NULL, 0x2f75706c6f6164732f313633313436373038365f72616d206a6169206a61692072616d2073687265652072616d206a6169206a61692072616d2068692070756b6172752833363050292e6d7034),
(6, '2021-09-12 11:49:22', '2021-09-12 11:49:22', '1631467162_Yeh Parda Hata Do Jhankar HD    Ek Phool Do Mali 1(720P_HD).mp4', NULL, NULL, 0x75706c6f6164732f313633313436373136325f596568205061726461204861746120446f204a68616e6b617220484420202020456b2050686f6f6c20446f204d616c69203128373230505f4844292e6d7034),
(7, '2021-09-13 10:43:35', '2021-09-13 10:43:35', '1631549615_R   Rajkumar 2013 Hindi HDRip  Gandi bhaat video s(720P_HD).mp4', NULL, NULL, 0x75706c6f6164732f313633313534393631355f5220202052616a6b756d617220323031332048696e6469204844526970202047616e646920626861617420766964656f207328373230505f4844292e6d7034),
(8, '2021-09-13 10:59:49', '2021-09-13 10:59:49', '1631550589_R   Rajkumar 2013 Hindi HDRip  Gandi bhaat video s(720P_HD).mp4', NULL, NULL, 0x75706c6f6164732f313633313535303538395f5220202052616a6b756d617220323031332048696e6469204844526970202047616e646920626861617420766964656f207328373230505f4844292e6d7034),
(9, '2021-09-13 11:00:30', '2021-09-13 11:00:30', '1631550630_Sifat_Kaka__Bus_vich_baithi__Kaka_new_song__New_punjabi_song_2021(720P_HD).mp4', NULL, NULL, 0x75706c6f6164732f313633313535303633305f53696661745f4b616b615f5f4275735f766963685f6261697468695f5f4b616b615f6e65775f736f6e675f5f4e65775f70756e6a6162695f736f6e675f3230323128373230505f4844292e6d7034);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `created_at`, `updated_at`, `file_name`, `video_name`) VALUES
(1, '2021-09-18 23:53:08', '2021-09-18 23:53:08', NULL, '0'),
(2, '2021-09-18 23:53:09', '2021-09-18 23:53:09', NULL, '0'),
(3, '2021-09-18 23:53:09', '2021-09-18 23:53:09', NULL, '0'),
(4, '2021-09-18 23:53:09', '2021-09-18 23:53:09', NULL, '0'),
(6, '2021-09-18 23:53:10', '2021-09-18 23:53:10', NULL, '0'),
(27, '2021-09-19 05:00:58', '2021-09-19 05:00:58', 'blob_1632047458.webm', NULL),
(28, '2021-09-19 05:02:21', '2021-09-19 05:02:21', 'blob_1632047541.webm', NULL),
(29, '2021-09-19 05:03:28', '2021-09-19 05:03:28', 'blob_1632047608.webm', 'dsfsdfdsfsd'),
(30, '2021-09-19 05:06:23', '2021-09-19 05:06:23', 'blob_1632047783.webm', NULL),
(31, '2021-09-19 05:20:43', '2021-09-19 05:20:43', 'blob_1632048643.webm', NULL),
(32, '2021-09-19 06:04:17', '2021-09-19 06:04:17', 'blob_1632051257.webm', NULL),
(33, '2021-09-19 06:42:47', '2021-09-19 06:42:47', 'blob_1632053567.webm', NULL);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_09_12_063702_create_files_table', 1),
(11, '2021_09_19_043003_create_media_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@black.com', '2021-09-12 09:39:29', '$2y$10$WzLUZRXrD5TzF78U1QRbW.R/4yOEUN1piCRSdp6F8S3flXtK1qCFW', NULL, '2021-09-12 09:39:29', '2021-09-12 09:39:29'),
(2, 'kapil saini', 'saininisha378@gmail.com', NULL, '$2y$10$8uT2Qr09QH7AZAoT3Vb2.OSzlpH6KTSUWAarRy2y23x4NFTXvGS/G', NULL, '2021-09-12 09:41:00', '2021-09-12 09:41:00'),
(3, 'Nisha', 'abc@gmail.com', NULL, '$2y$10$C0ihlBndDDrEEMlEXBTM4ODosGKm1Ny4Rh5R.kGWdOrHUb.I6MQgi', NULL, '2021-09-13 10:57:54', '2021-09-13 10:58:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
