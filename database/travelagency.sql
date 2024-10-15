-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2024 at 04:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `company_name`, `address`, `phone_1`, `phone_2`, `email_1`, `email_2`, `location`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'sdasdsdsds', 'asdsadasdsad', '854841511515', '584888421212', 'rishi@gmail.com', 'test2@gmail.com', '584888421212', '2024-07-28 13:06:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `place_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `place_name`, `state`, `country`, `description`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kuthattukulam', 'Andaman and Nicobar Islands', 'India', 'sdsdsd', 'img-1.jpg', 1, '2024-07-27 00:13:16', '2024-07-26 19:40:22', NULL),
(2, 'Munnar', 'Andaman and Nicobar Islands', 'India', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'destination14.jpg', 1, '2024-07-27 01:28:12', '2024-08-16 13:16:42', NULL),
(3, 'Ernakulam', 'Delhi', 'India', NULL, 'destination11.jpg', 1, '2024-08-16 09:05:25', '2024-08-16 13:16:51', NULL),
(4, 'Wayanad', 'Kerala', 'India', NULL, 'destination17.jpg', 1, '2024-08-16 09:05:54', '2024-08-16 13:17:00', NULL),
(5, 'Varkala', 'Kerala', 'India', 'dfdsff', 'destination10.jpg', 1, '2024-08-16 09:21:13', '2024-08-16 13:17:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

DROP TABLE IF EXISTS `duration`;
CREATE TABLE IF NOT EXISTS `duration` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `days` int NOT NULL,
  `nights` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `days`, `nights`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 2, 0, '2024-07-26 19:54:30', '2024-08-10 17:49:38', '2024-08-10 17:49:38'),
(2, 3, 2, 1, '2024-07-26 15:13:31', '2024-08-10 17:51:28', '2024-08-10 17:51:28'),
(3, 4, 3, 1, '2024-07-26 15:26:01', '2024-07-26 15:26:01', NULL),
(4, 5, 3, 1, '2024-07-26 15:26:29', '2024-07-26 15:26:29', NULL),
(5, 6, 3, 1, '2024-07-26 15:26:54', '2024-07-26 15:26:54', NULL),
(6, 7, 3, 1, '2024-07-26 15:27:04', '2024-07-26 15:40:45', '2024-07-26 15:40:45'),
(7, 8, 3, 1, '2024-07-26 15:27:16', '2024-07-26 15:40:40', '2024-07-26 15:40:40'),
(8, 3, 1, 1, '2024-07-26 15:45:33', '2024-07-26 15:45:39', '2024-07-26 15:45:39'),
(9, 2, 1, 1, '2024-07-28 04:46:12', '2024-07-28 04:46:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquires`
--

DROP TABLE IF EXISTS `enquires`;
CREATE TABLE IF NOT EXISTS `enquires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `[enquires|package_id][packages|id]` (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquires`
--

INSERT INTO `enquires` (`id`, `name`, `email`, `phone`, `package_id`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:45:23', '2024-08-15 15:45:23', NULL),
(2, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:45:32', '2024-08-15 15:45:32', NULL),
(3, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:46:14', '2024-08-15 15:46:14', NULL),
(4, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:46:42', '2024-08-15 15:46:42', NULL),
(5, 'Rishikesh P s', 'rishi@gmail.com', '90487346777', NULL, NULL, 1, '2024-08-15 15:49:01', '2024-08-15 15:49:01', NULL),
(6, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:52:44', '2024-08-15 15:52:44', NULL),
(7, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:53:41', '2024-08-15 15:53:41', NULL),
(8, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:54:10', '2024-08-15 15:54:10', NULL),
(9, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:54:42', '2024-08-15 15:54:42', NULL),
(10, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:58:04', '2024-08-15 15:58:04', NULL),
(11, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 15:58:43', '2024-08-15 15:58:43', NULL),
(12, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:13:32', '2024-08-15 16:13:32', NULL),
(13, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:14:53', '2024-08-15 16:14:53', NULL),
(14, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:17:28', '2024-08-15 16:17:28', NULL),
(15, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:17:40', '2024-08-15 16:17:40', NULL),
(16, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:18:32', '2024-08-15 16:18:32', NULL),
(17, 'RISHIKESH PS', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:18:54', '2024-08-15 16:18:54', NULL),
(18, 'Rishikesh P s', 'rishi@gmail.com', '8547865213', NULL, NULL, 1, '2024-08-15 16:20:36', '2024-08-15 16:20:36', NULL),
(19, 'Rishikesh', 'rishi@gmail.com', '9745487425', NULL, NULL, 1, '2024-08-16 16:09:37', '2024-08-16 16:09:37', NULL),
(20, 'Rishikesh', 'rishi@gmail.com', '9745487425', NULL, NULL, 1, '2024-08-16 16:09:38', '2024-08-16 16:09:38', NULL),
(21, 'Rishikesh P s', 'rishi@gmail.com', '345435435', NULL, NULL, 1, '2024-08-25 14:06:39', '2024-08-25 14:06:39', NULL),
(22, 'Rishikesh', 'rishi@gmail.com', '9745487425', NULL, NULL, 1, '2024-08-28 12:02:07', '2024-08-28 12:02:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `destination_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `[gallery|destination_id][destination|id]` (`destination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `image`, `description`, `destination_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1723296370_66b76a7229c85.png', '1723296370_66b76a7229c85.png', NULL, 2, '2024-08-10 18:56:10', '2024-08-10 17:52:32', '2024-08-10 17:52:32'),
(2, '1723296370_66b76a722cfdf.png', '1723296370_66b76a722cfdf.png', NULL, 2, '2024-08-10 18:56:10', '2024-08-10 17:52:36', '2024-08-10 17:52:36'),
(3, '1723296370_66b76a722e0ce.png', '1723296370_66b76a722e0ce.png', NULL, 2, '2024-08-10 18:56:10', '2024-08-10 17:53:01', '2024-08-10 17:53:01'),
(4, '1723296370_66b76a722ee8f.png', '1723296370_66b76a722ee8f.png', NULL, 2, '2024-08-10 18:56:10', '2024-08-10 17:53:07', '2024-08-10 17:53:07'),
(5, '1723296370_66b76a722f954.png', '1723296370_66b76a722f954.png', NULL, 2, '2024-08-10 18:56:10', '2024-08-10 17:53:11', '2024-08-10 17:53:11'),
(6, '1723296433_66b76ab1f102e.png', '1723296433_66b76ab1f102e.png', NULL, 2, '2024-08-10 18:57:13', '2024-08-10 17:53:27', '2024-08-10 17:53:27'),
(7, '1723296433_66b76ab1f2068.png', '1723296433_66b76ab1f2068.png', NULL, 2, '2024-08-10 18:57:13', '2024-08-10 17:52:53', '2024-08-10 17:52:53'),
(8, '1723296433_66b76ab1f2cad.png', '1723296433_66b76ab1f2cad.png', NULL, 2, '2024-08-10 18:57:13', '2024-08-10 17:52:56', '2024-08-10 17:52:56'),
(9, '1723296433_66b76ab1f363e.png', '1723296433_66b76ab1f363e.png', NULL, 2, '2024-08-10 18:57:13', '2024-08-10 17:53:35', '2024-08-10 17:53:35'),
(10, '1723296456_66b76ac8e8c71.png', '1723296456_66b76ac8e8c71.png', NULL, 2, '2024-08-10 18:57:36', '2024-08-10 17:52:48', '2024-08-10 17:52:48'),
(11, '1723296456_66b76ac8e9ced.png', '1723296456_66b76ac8e9ced.png', NULL, 2, '2024-08-10 18:57:36', '2024-08-10 17:53:21', '2024-08-10 17:53:21'),
(12, '1723296456_66b76ac8ea89a.jpg', '1723296456_66b76ac8ea89a.jpg', NULL, 2, '2024-08-10 18:57:36', '2024-08-10 17:53:31', '2024-08-10 17:53:31'),
(13, '1723313082_66b7abbabc8b7.jpg', '1723313082_66b7abbabc8b7.jpg', NULL, 2, '2024-08-10 23:34:42', '2024-08-16 13:25:13', '2024-08-16 13:25:13'),
(14, '1723313082_66b7abbabf108.jpg', '1723313082_66b7abbabf108.jpg', NULL, 2, '2024-08-10 23:34:42', '2024-08-16 13:24:33', '2024-08-16 13:24:33'),
(15, '1723313082_66b7abbabfbd7.jpg', '1723313082_66b7abbabfbd7.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(16, '1723313082_66b7abbac0941.jpg', '1723313082_66b7abbac0941.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(17, '1723313082_66b7abbac19d3.jpg', '1723313082_66b7abbac19d3.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(18, '1723313082_66b7abbac24a2.jpg', '1723313082_66b7abbac24a2.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(19, '1723313082_66b7abbac2dfd.jpg', '1723313082_66b7abbac2dfd.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(20, '1723313082_66b7abbac3c61.jpg', '1723313082_66b7abbac3c61.jpg', NULL, 2, '2024-08-10 23:34:42', '2024-08-24 06:57:59', '2024-08-24 06:57:59'),
(21, '1723313082_66b7abbac46b5.jpg', '1723313082_66b7abbac46b5.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(22, '1723313082_66b7abbac536b.jpg', '1723313082_66b7abbac536b.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(23, '1723313082_66b7abbac5cf5.jpg', '1723313082_66b7abbac5cf5.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(24, '1723313082_66b7abbac6602.jpg', '1723313082_66b7abbac6602.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(25, '1723313082_66b7abbac6eb3.jpg', '1723313082_66b7abbac6eb3.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(26, '1723313082_66b7abbac7985.jpg', '1723313082_66b7abbac7985.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(27, '1723313082_66b7abbac82bb.jpg', '1723313082_66b7abbac82bb.jpg', NULL, 2, '2024-08-10 23:34:42', NULL, NULL),
(28, '1723313186_66b7ac220254a.jpg', '1723313186_66b7ac220254a.jpg', NULL, 2, '2024-08-10 23:36:26', '2024-08-11 02:55:59', '2024-08-11 02:55:59'),
(29, '1723313186_66b7ac2203115.jpg', '1723313186_66b7ac2203115.jpg', NULL, 2, '2024-08-10 23:36:26', '2024-08-11 02:36:52', '2024-08-11 02:36:52'),
(30, '1723823116_66bf740ccc424.jpg', '1723823116_66bf740ccc424.jpg', NULL, 3, '2024-08-16 21:15:16', '2024-08-16 15:49:22', '2024-08-16 15:49:22'),
(31, '1723823748_66bf76846e94b.jpg', '1723823748_66bf76846e94b.jpg', NULL, 5, '2024-08-16 21:25:48', NULL, NULL),
(32, '1723823748_66bf76847081b.jpg', '1723823748_66bf76847081b.jpg', NULL, 5, '2024-08-16 21:25:48', NULL, NULL),
(33, '1723824156_66bf781c76bb6.jpg', '1723824156_66bf781c76bb6.jpg', NULL, 5, '2024-08-16 21:32:36', NULL, NULL),
(34, '1723824156_66bf781c782cf.jpg', '1723824156_66bf781c782cf.jpg', NULL, 5, '2024-08-16 21:32:36', NULL, NULL),
(35, '1723824156_66bf781c790ab.jpg', '1723824156_66bf781c790ab.jpg', NULL, 5, '2024-08-16 21:32:36', NULL, NULL),
(36, '1723824156_66bf781c79bfd.jpg', '1723824156_66bf781c79bfd.jpg', NULL, 5, '2024-08-16 21:32:36', NULL, NULL),
(37, '1723824156_66bf781c7a9bc.jpg', '1723824156_66bf781c7a9bc.jpg', NULL, 5, '2024-08-16 21:32:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_19_131440_create_cache_table', 0),
(5, '2024_07_19_131440_create_cache_locks_table', 0),
(6, '2024_07_19_131440_create_contact_info_table', 0),
(7, '2024_07_19_131440_create_destination_table', 0),
(8, '2024_07_19_131440_create_duration_table', 0),
(9, '2024_07_19_131440_create_enquires_table', 0),
(10, '2024_07_19_131440_create_failed_jobs_table', 0),
(11, '2024_07_19_131440_create_gallery_table', 0),
(12, '2024_07_19_131440_create_job_batches_table', 0),
(13, '2024_07_19_131440_create_jobs_table', 0),
(14, '2024_07_19_131440_create_package_images_table', 0),
(15, '2024_07_19_131440_create_packages_table', 0),
(16, '2024_07_19_131440_create_password_reset_tokens_table', 0),
(17, '2024_07_19_131440_create_sessions_table', 0),
(18, '2024_07_19_131440_create_users_table', 0),
(19, '2024_07_19_131443_add_foreign_keys_to_enquires_table', 0),
(20, '2024_07_19_131443_add_foreign_keys_to_gallery_table', 0),
(21, '2024_07_19_131443_add_foreign_keys_to_package_images_table', 0),
(22, '2024_07_19_131443_add_foreign_keys_to_packages_table', 0),
(23, '2024_07_28_051240_create_testimonials_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_id` bigint UNSIGNED NOT NULL,
  `duration_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `daywise_details` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `[packages|destination_id][destination|id]` (`destination_id`),
  KEY `[packages|duration_id][duration|id]` (`duration_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `destination_id`, `duration_id`, `description`, `price`, `rating`, `daywise_details`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Munnar Vattavada', 1, 2, 'dfd dsfdsfdf dfdfdvf trjhjfgddh', 3000, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"Munnar\\\",\\\"description\\\":\\\"ghgfh\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"ghgfh\\\",\\\"description\\\":\\\"ghgfhgf\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"gfhgfhgf\\\",\\\"description\\\":\\\"gfhgfhgfhgf\\\"}]\"', 1, '2024-07-27 10:35:07', '2024-07-27 14:44:25', NULL),
(2, 'dfdf', 2, 2, 'sdsadasdasdsad', 323232, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"sdasdasd\\\",\\\"description\\\":\\\"sadasdsa\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"dsdsd\\\",\\\"description\\\":\\\"sdsdsdsd\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"asdsad\\\",\\\"description\\\":\\\"asdsadasd\\\"}]\"', 1, '2024-07-27 12:25:54', '2024-07-27 12:25:54', NULL),
(3, 'Munnar Kodakk', 2, 2, 'gojrsgo gfgfdg', 3000, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"Munnar\\\",\\\"description\\\":\\\"gfgfgfgfg\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"kodakk\\\",\\\"description\\\":\\\"dffdfdsfdsf\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"dfdsfdsf\\\",\\\"description\\\":\\\"dfdfdsfdsf\\\"}]\"', 1, '2024-07-27 12:33:09', '2024-07-27 12:33:09', NULL),
(4, 'dfdf', 2, 2, 'rerere', 2000, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"dfsdfd\\\",\\\"description\\\":\\\"fdfdsfd\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"fdfssdf\\\",\\\"description\\\":\\\"dfdsfdf\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"dfdsf\\\",\\\"description\\\":\\\"dfdsfdf\\\"}]\"', 1, '2024-07-27 12:37:42', '2024-07-27 12:37:42', NULL),
(5, 'Munnar Kodakk', 2, 2, 'xcczxcxzc', 323, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"dasd\\\",\\\"description\\\":\\\"sdadd\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"xczxc\\\",\\\"description\\\":\\\"xcxzcx\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"xczxcxzcxzc\\\",\\\"description\\\":\\\"xczcxc\\\"}]\"', 1, '2024-07-27 12:46:35', '2024-07-27 12:46:35', NULL),
(6, 'Munnar Kodakk', 2, 3, 'sddsadssad', 2322, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"dfdsfdf\\\",\\\"description\\\":\\\"dfsdfdsf\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"dsfdsfds\\\",\\\"description\\\":\\\"dsfdsfdsf\\\"},{\\\"day\\\":\\\"3\\\",\\\"title\\\":\\\"dsfdsfsdfdsf\\\",\\\"description\\\":\\\"ddfdsffdsf\\\"},{\\\"day\\\":\\\"4\\\",\\\"title\\\":\\\"dsfdsfds\\\",\\\"description\\\":null}]\"', 1, '2024-07-27 12:47:51', '2024-07-27 14:59:38', '2024-07-27 14:59:38'),
(7, 'Munnar Kodakk', 2, 9, 'dfdsfds', 2000, 5, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"dsds\\\",\\\"description\\\":\\\"sdsd\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"sdsd\\\",\\\"description\\\":\\\"sdsdsd\\\"}]\"', 1, '2024-07-28 05:30:50', '2024-07-28 05:30:50', NULL),
(8, 'DSSD', 2, 9, 'SDSD', 233, 1, '\"[{\\\"day\\\":\\\"1\\\",\\\"title\\\":\\\"SDSD\\\",\\\"description\\\":\\\"SDSD\\\"},{\\\"day\\\":\\\"2\\\",\\\"title\\\":\\\"SDSD\\\",\\\"description\\\":\\\"SDSDS\\\"}]\"', 1, '2024-08-16 02:54:20', '2024-08-16 03:14:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_images`
--

DROP TABLE IF EXISTS `package_images`;
CREATE TABLE IF NOT EXISTS `package_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `[package_images|package_id][packages|id]` (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_images`
--

INSERT INTO `package_images` (`id`, `image`, `package_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'comments.png', 1, '2024-08-11 12:17:22', NULL, NULL),
(2, 'whatsapp (1).png', 1, '2024-08-11 12:17:22', NULL, NULL),
(3, 'gmail.png', 1, '2024-08-11 12:17:22', NULL, NULL),
(4, 'w3logo.jpeg', 1, '2024-08-11 12:21:00', NULL, NULL),
(5, '1200px-QR_Code_Example.svg.png', 1, '2024-08-11 12:21:01', NULL, NULL),
(6, 'b2-tb (1).jpg', 1, '2024-08-11 12:29:14', NULL, NULL),
(7, 'b1-tb (1).jpg', 1, '2024-08-11 12:29:14', NULL, NULL),
(8, 'b6-tb.jpg', 1, '2024-08-11 12:29:14', NULL, NULL),
(9, 'youtube (1).png', 1, '2024-08-11 12:31:55', NULL, NULL),
(10, 'youtube.png', 1, '2024-08-11 12:31:55', NULL, NULL),
(11, 'social (1).png', 1, '2024-08-11 12:31:55', NULL, NULL),
(12, 'youtube.png', 1, '2024-08-11 12:32:43', NULL, NULL),
(13, 'youtube (1).png', 1, '2024-08-11 12:32:43', NULL, NULL),
(14, 'social (1).png', 1, '2024-08-11 12:32:43', NULL, NULL),
(15, 'Screenshot_20240529_121039_com.jpg', 1, '2024-08-11 12:33:22', NULL, NULL),
(16, 'b6-tb (1) (1).jpg', 1, '2024-08-11 12:33:32', NULL, NULL),
(17, 'trending3.jpg', 1, '2024-08-15 22:37:49', NULL, NULL),
(18, 'trending2.jpg', 1, '2024-08-15 22:37:49', NULL, NULL),
(19, 'trending4.jpg', 1, '2024-08-15 22:37:49', NULL, NULL),
(20, 'trending12.jpg', 2, '2024-08-15 22:37:59', NULL, NULL),
(21, 'trending11.jpg', 2, '2024-08-15 22:37:59', NULL, NULL),
(22, 'trending13.jpg', 2, '2024-08-15 22:37:59', NULL, NULL),
(23, 'trendingb-2.jpg', 3, '2024-08-15 22:38:07', NULL, NULL),
(24, 'trendingb-1.jpg', 3, '2024-08-15 22:38:07', NULL, NULL),
(25, 'trending-large.jpg', 3, '2024-08-15 22:38:07', NULL, NULL),
(26, 'trending7.jpg', 4, '2024-08-15 22:38:18', NULL, NULL),
(27, 'trending6.jpg', 4, '2024-08-15 22:38:18', NULL, NULL),
(28, 'trending10.jpg', 4, '2024-08-15 22:38:18', NULL, NULL),
(29, 'trending3.jpg', 5, '2024-08-15 22:38:27', NULL, NULL),
(30, 'trending2.jpg', 5, '2024-08-15 22:38:27', NULL, NULL),
(31, 'trending4.jpg', 5, '2024-08-15 22:38:27', NULL, NULL),
(32, 'trending1.jpg', 7, '2024-08-15 22:38:35', NULL, NULL),
(33, 'trending2.jpg', 7, '2024-08-15 22:38:35', NULL, NULL),
(34, 'trending10.jpg', 7, '2024-08-15 22:38:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0TLvF5Hojrp5CKZgU16Ly14dR7NYqVQxGFt80qsl', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTJRdXNGUnZvbTFFNVpBbHphR2YycTY0aG9wTUswQktPMjdXNjYzNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly90cmF2ZWwtZnJvbGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724821733),
('4PSZlEyq0DGpiUVdSrJW1YW6yPUvXSIj0hf1dwGP', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMndqaFk0OWhjc09VQ0hoQm8xbzdiT2Q3YzV2T3plbDRnNVlCdGJqVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly90cmF2ZWwtZnJvbGljL3BhY2thZ2VzL2ZldGNoP3BhZ2U9MSZwZXJfcGFnZT00Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1724768504),
('nNusuz5spiZnwkpOXVxajMURyQDuZHxu9P83rnGg', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHJPdTBtUVk4TUdxUDZTTzRCVXVsUmtvVVBlVVlLRVBPcENDRGM0eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly90cmF2ZWwtZnJvbGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724767483),
('P6TNoXDKolRqF3ukDw5TqWNE2s591cH32NqzGRWM', NULL, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianZNVHRMbGtSUG5TWHhmcW5mUzVzUDRucnhUSkRsNDRQV3hhTnNYRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly90cmF2ZWwtZnJvbGljL2Fib3V0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724846646),
('xJp0HvW0ekpRtBmLnNqp0aIJiUwNa6knrWIA148L', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3l4aURuVFlMckQ3bVp4UWFwaE5KaWlVY3JSbnQyYWUxYzAxUWlaNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly90cmF2ZWwtZnJvbGljL3BhY2thZ2VzL2ZldGNoP3BhZ2U9JTVCb2JqZWN0JTIwQ3VzdG9tRXZlbnQlNUQmcGVyX3BhZ2U9NCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724905116);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_name`, `message`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rishikesh', 'eererere', 'IMG_20220913_165423.jpg', 1, '2024-07-28 05:47:59', '2024-07-28 06:09:20', '2024-07-28 06:09:20'),
(2, 'Rishikesh', 'gfdgdfgfdg', 'IMG_20220913_165423.jpg', 1, '2024-07-28 05:48:35', '2024-07-28 06:09:25', '2024-07-28 06:09:25'),
(3, 'Rishikesh', 'gfdgdfgfdg', 'IMG_20220913_165423.jpg', 1, '2024-07-28 05:50:40', '2024-07-28 06:09:31', '2024-07-28 06:09:31'),
(4, 'Rishikesh', 'sdsdsds', 'IMG_20220913_165423.jpg', 1, '2024-07-28 05:50:55', '2024-07-28 06:09:35', '2024-07-28 06:09:35'),
(5, 'Rishikesh', 'sdsdsds', 'IMG_20220913_165423.jpg', 1, '2024-07-28 11:21:32', NULL, NULL),
(6, 'Rishikesh', 'gfdgdfgfdg', 'brand-06.png', 1, '2024-07-28 11:36:23', '2024-07-28 06:09:49', NULL),
(7, 'fhghgfh', 'ytrytrytry', 'img-1.jpg', 1, '2024-08-27 19:45:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL DEFAULT '2' COMMENT '1.SuperAdmin 2.Admin	',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `image`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rishikesh', 'rishikesh@gmail.com', '9734562780', NULL, '$2y$12$xd/OBfZJcCP7YiF3.U.uruUU5s6BHbDvMVFiPZ1OCSL1y6vBh109i', NULL, 2, 1, NULL, '2024-07-19 13:42:06', '2024-07-26 10:01:07', NULL),
(2, 'Devika A n', 'test@gmail.com', '8945367823', NULL, '$2y$12$e.oWc8tqndrLi/FopOrAfOwli7sqaqYyeKf4GEv8PmKTlPaQT/QJq', 'testimonial-2.jpg', 1, 1, NULL, '2024-07-21 11:48:38', '2024-08-11 05:02:24', NULL),
(3, 'Test1', 'test1@gmail.com', '8945673456', NULL, '$2y$12$PZIWtmkOTZ3SuXTEZrJI2OL5NOFstKAlSz9Je6XMaxEVHpFtIxd6O', NULL, 2, 1, NULL, '2024-07-22 03:38:30', '2024-07-23 01:41:27', NULL),
(4, 'Test2', 'test2@gmail.com', '8562345627', NULL, 'Test2@123', NULL, 2, 1, NULL, '2024-07-22 03:39:55', '2024-07-22 03:39:55', NULL),
(5, 'Test3', 'test3@gmail.com', '4654566635', NULL, 'Test@123', NULL, 2, 1, NULL, '2024-07-22 03:41:22', '2024-07-22 03:41:22', NULL),
(6, 'Test5', 'test5@gmail.com', '8934267812', NULL, '$2y$12$WL75vJCjkMdblHtJAqrBN.Q8j5.Cujf/97Z.QwAGg4Q1005pvE4Xq', NULL, 2, 1, NULL, '2024-07-22 03:48:45', '2024-07-26 10:15:05', NULL),
(7, 'Test6', 'test6@gmail.com', '8453618345', NULL, 'Test@123', NULL, 2, 1, NULL, '2024-07-22 04:38:06', '2024-07-22 06:40:37', '2024-07-22 12:10:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquires`
--
ALTER TABLE `enquires`
  ADD CONSTRAINT `[enquires|package_id][packages|id]` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `[gallery|destination_id][destination|id]` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `[packages|destination_id][destination|id]` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `[packages|duration_id][duration|id]` FOREIGN KEY (`duration_id`) REFERENCES `duration` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `package_images`
--
ALTER TABLE `package_images`
  ADD CONSTRAINT `[package_images|package_id][packages|id]` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
