-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2020 at 04:33 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soluti23_golden_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `valid_till` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `name`, `email`, `contact`, `city`, `gender`, `birthdate`, `created_at`, `updated_at`, `valid_till`) VALUES
(4, 'Bilal Ahmed Khan ', 'bilalahmedkhanpro@gmail.com', '344 0150054', '', 'Male', '1995-09-26', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-01-15'),
(10, 'Ghazanfar Choudri ', 'Ghazanfar@hotmail.com', '3-312 2815', 'London ', 'Male', '2020-05-18', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-06-14'),
(31, 'Azeem ', 'azeem@gmail.com', '  +966 97 6464643', '44', 'Male', '2020-06-23', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-02-01'),
(32, 'mussaddiq ', 'mussaddiq08@gmail.com', '  +966 01 5005454', '48', 'Male', '2020-06-23', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-03-24'),
(33, 'Ubaid Patel ', 'ubaid.patel50@gmail.com', '  +966 94 9119499', '16', 'Male', '2020-06-26', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-05-18'),
(34, 'Hammad Khan', 'hamad04@gmail.com', '  +966 95 9595959', '40', 'Male', '2020-06-24', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-06-24'),
(35, 'Daniyal Ahmed Khan ', 'daniyalakhan@outlook.com', '  +966 56 8689556', '49', 'Male', '2020-06-24', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-06-24'),
(36, 'Arslan Fareed', 'arslanfareed@gmail.com', '  +966 67 6864645', '38', 'Male', '2020-07-04', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-07-04'),
(37, 'Fahad Khan ', 'fahadagha@gmail.com', '  +966 52 8236565', '80', 'Male', '2020-07-31', '2012-12-12 05:00:00', '2012-12-12 05:00:00', '2021-07-04'),
(40, 'Adil Ahmed', 'Adil.rangila@gmail.com', '  +966 45 4545645', '45', '', '2020-11-13', '2020-11-17 07:24:28', NULL, '2021-11-17'),
(42, 'saa', 'adadd', '  +966 12 2123121', '12', '', '2020-11-17', '2020-11-17 10:38:37', NULL, '2021-11-17'),
(43, 'Fahad Khan', 'fahadkhan@gmail.com', '  +966 16 2536526', '10', '', '2020-11-30', '2020-11-17 10:55:57', NULL, '2021-11-17'),
(44, 'John Wick', 'johnwick@gmail.com', '  +966 12 2431434', '15', '', '2020-11-17', '2020-11-17 11:25:05', NULL, '2021-11-17'),
(45, 'alaqeel', 'alaqeel@gmail.com', '  +966 45 8565675', '44', '', '2012-11-15', '2020-11-17 12:59:58', NULL, '2021-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `shop_id`, `name`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(3, 5, '15%cashback of the order', 'cash and online payment When suing the code GA10', 'pictures/8qHC5geRrVEgyCvGyA4cP82sUZ0lbWiEjaYKRRQp.png', '2020-05-19 14:22:42', '2020-08-21 23:30:32'),
(4, 5, '25 SAR cashback for new customers firsty order', 'When using the code GA25', 'pictures/M5TUEq1y6rrkFEjti1Bzut2Ta1BI9vC5qiNwGDEm.png', '2020-05-19 14:25:18', '2020-05-27 18:33:04'),
(6, 6, '30 % for members', 'When using the code sindhbad12', 'pictures/7XqPjajaCmZKgtKcRIys0kmIzNRDZo8ofNNbJUFZ.png', '2020-05-30 11:04:58', '2020-07-01 10:50:03'),
(7, 6, '20%off', 'use code ambulance11', 'pictures/zsww2ovEOFwOKAdjnUHJNoaUuKkbubovBJx65BGF.png', '2020-07-01 10:50:55', '2020-07-01 10:50:55'),
(10, 15, '50% discount', 'fdf', 'pictures/VOd7uic0fFusE49y91DDGU9eSqzbVBHKFNX7zw1c.png', '2020-11-16 14:37:02', '2020-11-16 14:37:02'),
(11, 9, '10% cashback', 'pay through HBL  and get 45% instant discout', 'pictures/V5WDO1Xb46Wg1W6ujjuRlKiecdeecRC9gNsD5YIp.png', '2020-11-17 17:02:23', '2020-11-17 17:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(0, 'All', 'pictures/6aVROHSsFkfdelSSZgOmcVYHqOKY2HWSxkG7nhnE.jpeg', 1, '2020-05-28 13:13:58', '2020-07-04 13:06:09'),
(1, 'Restaurant', 'pictures/Y3MJSqMLQtfPG7IWnVN7o5yBOGjlZICLr9mvIpoB.png', 1, '2020-05-08 12:16:04', '2020-08-22 17:46:21'),
(2, 'Entertainment', 'pictures/SaokjmXyCSG47zHyZYbbGicCedvPuieW1jr82EvC.png', 1, '2020-05-08 12:16:04', '2020-08-22 17:45:53'),
(3, 'Saloon', 'pictures/X4zGfIyhc8K7eIe0XJFKj6vNJh5pM1XYsNxtL1da.png', 1, '2020-05-08 12:16:05', '2020-08-22 17:46:22'),
(4, 'Hotel', 'pictures/ivGNYLUBdIKECaPTf9BWXsyjGGsZfPoMfOXW5UQs.png', 1, '2020-05-08 12:16:05', '2020-08-22 17:46:26'),
(5, 'Travel', 'pictures/axoJQ39w1vke9eYsTpMcPJeD0lGyz48TAsdnPn0N.png', 1, '2020-05-08 12:16:05', '2020-08-22 17:46:29'),
(7, 'Health', 'pictures/ZP575Iq2A7hoAAlQkSrcLz8moG5GbbA3WvYMbv3Q.png', 1, '2020-05-08 12:16:05', '2020-08-22 17:46:36'),
(9, 'Service', 'pictures/AphNkW7vBdu9DspaFrs4JOQOAVMgB9bqp3W9W5Pd.png', 1, '2020-05-08 12:16:05', '2020-08-24 22:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abha\r', NULL, NULL),
(2, 'Abqaiq\r', NULL, NULL),
(3, 'Abu `Arish\r', NULL, NULL),
(4, 'Ad Darb\r', NULL, NULL),
(5, 'Ad Dawadimi\r', NULL, NULL),
(6, 'Ad Dilam\r', NULL, NULL),
(7, 'Adh Dhibiyah\r', NULL, NULL),
(8, 'Afif\r', NULL, NULL),
(9, 'Al Artawiyah\r', NULL, NULL),
(10, 'Al Awjam\r', NULL, NULL),
(11, 'Al Bahah\r', NULL, NULL),
(12, 'Al Battaliyah\r', NULL, NULL),
(13, 'Al Bukayriyah\r', NULL, NULL),
(14, 'Al Fuwayliq\r', NULL, NULL),
(15, 'Al Hada\r', NULL, NULL),
(16, 'Al Hufuf\r', NULL, NULL),
(17, 'Al Jafr\r', NULL, NULL),
(18, 'Al Jaradiyah\r', NULL, NULL),
(19, 'Al Jubayl\r', NULL, NULL),
(20, 'Al Jubayl\r', NULL, NULL),
(21, 'Al Jumum\r', NULL, NULL),
(22, 'Al Khafji\r', NULL, NULL),
(23, 'Al Kharj\r', NULL, NULL),
(24, 'Al Majaridah\r', NULL, NULL),
(25, 'Al Markaz\r', NULL, NULL),
(26, 'Al Mindak\r', NULL, NULL),
(27, 'Al Mithnab\r', NULL, NULL),
(28, 'Al Mubarraz\r', NULL, NULL),
(29, 'Al Munayzilah\r', NULL, NULL),
(30, 'Al Mutayrifi\r', NULL, NULL),
(31, 'Al Muwayh\r', NULL, NULL),
(32, 'Al Qarah\r', NULL, NULL),
(33, 'Al Qatif\r', NULL, NULL),
(34, 'Al Qurayn\r', NULL, NULL),
(35, 'Al Wajh\r', NULL, NULL),
(36, 'Ar Rass\r', NULL, NULL),
(37, 'Arar\r', NULL, NULL),
(38, 'Ash Shafa\r', NULL, NULL),
(39, 'Buraydah\r', NULL, NULL),
(40, 'Dammam\r', NULL, NULL),
(41, 'Dhahran\r', NULL, NULL),
(42, 'Hafar Al-Batin\r', NULL, NULL),
(43, 'Ha\'il\r', NULL, NULL),
(44, 'Jeddah\r', NULL, NULL),
(45, 'Jizan\r', NULL, NULL),
(46, 'Khamis Mushait\r', NULL, NULL),
(47, 'Khobar\r', NULL, NULL),
(48, 'Mecca\r', NULL, NULL),
(49, 'Medina\r', NULL, NULL),
(50, 'Qal`at Bishah\r', NULL, NULL),
(51, 'Riyadh\r', NULL, NULL),
(52, 'Sayhat\r', NULL, NULL),
(53, 'Sultanah\r', NULL, NULL),
(54, 'Tabuk\r', NULL, NULL),
(55, 'Ta\'if\r', NULL, NULL),
(56, 'Tarut\r', NULL, NULL),
(57, 'Najran\r', NULL, NULL),
(58, 'Yanbu\r', NULL, NULL),
(59, 'Qurayyat\r', NULL, NULL),
(60, 'Sakakah\r', NULL, NULL),
(61, 'Al-`Ula\r', NULL, NULL),
(62, 'An Nimas\r', NULL, NULL),
(63, 'As Saffaniyah\r', NULL, NULL),
(64, 'As Sulayyil\r', NULL, NULL),
(65, 'At Taraf\r', NULL, NULL),
(66, 'At Tubi\r', NULL, NULL),
(67, 'Az Zulfi\r', NULL, NULL),
(68, 'Badr Hunayn\r', NULL, NULL),
(69, 'Duba\r', NULL, NULL),
(70, 'Farasan\r', NULL, NULL),
(71, 'Julayjilah\r', NULL, NULL),
(72, 'Marat\r', NULL, NULL),
(73, 'Misliyah\r', NULL, NULL),
(74, 'Mizhirah\r', NULL, NULL),
(75, 'Mulayjah\r', NULL, NULL),
(76, 'Qaisumah\r', NULL, NULL),
(77, 'Rabigh\r', NULL, NULL),
(78, 'Rahimah\r', NULL, NULL),
(79, 'Sabya\r', NULL, NULL),
(80, 'Safwa\r', NULL, NULL),
(81, 'Sajir\r', NULL, NULL),
(82, 'Samitah\r', NULL, NULL),
(83, 'Suwayr\r', NULL, NULL),
(84, 'Tabalah\r', NULL, NULL),
(85, 'Tanumah\r', NULL, NULL),
(86, 'Tubarjal\r', NULL, NULL),
(87, 'Tumayr\r', NULL, NULL),
(88, 'Turabah\r', NULL, NULL),
(89, 'Turaif\r', NULL, NULL),
(90, 'Umm as Sahik\r', NULL, NULL),
(91, 'Umm Lajj', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `shop_id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(4, 5, 'Lunch', 'pictures/gVgusrO6GBcjqMm0u5aLO8rnkW862gKpShUjq00A.png', '2020-05-22 21:38:58', '2020-05-27 18:36:00'),
(5, 5, 'Cafe', 'pictures/zRWYzoh8WbaJqHc0ollpba3qe2Nf4qXGqGzpyvQD.png', '2020-05-22 21:39:13', '2020-05-27 18:36:26'),
(7, 6, 'exercise', 'pictures/MgsCNGlDsX6dWHConhtq86p4p8jU5MGP9b3m4Ar6.png', '2020-05-30 11:02:52', '2020-07-01 10:49:05'),
(9, 6, 'juice', 'pictures/XJUZIZCB4z1ammU6GM14Y8rQnd8XZFIbV1z5XYlA.png', '2020-07-01 10:49:36', '2020-07-01 10:49:36'),
(11, 15, 'Excellent Mechanic Service', 'pictures/FeSwLGxVr8yIJgxJRuljnR9W8HDoCqFEn6H1HAuU.png', '2020-11-16 14:36:28', '2020-11-16 14:36:28'),
(12, 9, '3D Cinema', 'pictures/wHzl7UOT2wiqEie6x88X4RGQWSgmDuDWLLni9orH.jpeg', '2020-11-17 16:59:43', '2020-11-17 16:59:43'),
(13, 9, 'breakfast', 'pictures/LSPT0IVGLHM49rZTrxzOWfKdhewvv3oDnDXGN7hb.jpeg', '2020-11-17 17:03:15', '2020-11-17 17:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `guest_users`
--

CREATE TABLE `guest_users` (
  `id` int(50) NOT NULL,
  `guest_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_users`
--

INSERT INTO `guest_users` (`id`, `guest_id`) VALUES
(2, 'e903a1884fdf9b01'),
(3, '2bf399db80ce87c9'),
(4, 'e903a1884fdf9b01'),
(5, 'e903a1884fdf9b01'),
(6, 'e903a1884fdf9b01'),
(7, 'e903a1884fdf9b01'),
(8, 'e903a1884fdf9b01'),
(9, 'e903a1884fdf9b01'),
(10, 'e903a1884fdf9b01'),
(11, 'e903a1884fdf9b01'),
(12, 'fb28834c2ae41942'),
(13, 'fb28834c2ae41942'),
(14, 'e903a1884fdf9b01'),
(15, 'e903a1884fdf9b01'),
(16, 'e903a1884fdf9b01'),
(17, 'e903a1884fdf9b01'),
(18, 'e903a1884fdf9b01'),
(19, 'e903a1884fdf9b01'),
(20, 'e903a1884fdf9b01'),
(21, 'e903a1884fdf9b01'),
(22, 'e903a1884fdf9b01'),
(23, 'e903a1884fdf9b01'),
(24, 'e903a1884fdf9b01'),
(25, 'e903a1884fdf9b01'),
(26, 'e903a1884fdf9b01'),
(27, 'e903a1884fdf9b01'),
(28, 'e903a1884fdf9b01'),
(29, 'e903a1884fdf9b01'),
(30, 'e903a1884fdf9b01'),
(31, 'e903a1884fdf9b01'),
(32, 'e903a1884fdf9b01'),
(33, 'e903a1884fdf9b01'),
(34, 'fb28834c2ae41942'),
(35, 'fb28834c2ae41942'),
(36, 'fb28834c2ae41942'),
(37, 'fb28834c2ae41942'),
(38, 'e903a1884fdf9b01'),
(39, 'a555ea2276701314'),
(40, '897f1a8ed40d0f24'),
(41, '55f6c7483057b4cf'),
(42, '897f1a8ed40d0f24'),
(43, '55f6c7483057b4cf'),
(44, '2bf399db80ce87c9'),
(45, '2bf399db80ce87c9'),
(46, 'bebe2ecbede33b00'),
(47, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(48, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(49, '73192e8b2a3e0d34'),
(50, '73192e8b2a3e0d34'),
(51, '55f6c7483057b4cf'),
(52, '55f6c7483057b4cf'),
(53, '55f6c7483057b4cf'),
(54, '73192e8b2a3e0d34'),
(55, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(56, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(57, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(58, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(59, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(60, '46FCC4F6-268E-42DF-A46B-D8966357F622'),
(61, '20241D21-76EA-421F-BB08-961DA47BC028'),
(62, '20241D21-76EA-421F-BB08-961DA47BC028'),
(63, '20241D21-76EA-421F-BB08-961DA47BC028'),
(64, '73192e8b2a3e0d34'),
(65, '73192e8b2a3e0d34'),
(66, '73192e8b2a3e0d34'),
(67, '73192e8b2a3e0d34'),
(68, '20241D21-76EA-421F-BB08-961DA47BC028'),
(69, '20241D21-76EA-421F-BB08-961DA47BC028'),
(70, '3F491B07-C508-4A9E-AC49-C325FBDC393B'),
(71, '73192e8b2a3e0d34'),
(72, '73192e8b2a3e0d34'),
(73, '73192e8b2a3e0d34'),
(74, '73192e8b2a3e0d34'),
(75, '73192e8b2a3e0d34'),
(76, '73192e8b2a3e0d34'),
(77, '73192e8b2a3e0d34'),
(78, '73192e8b2a3e0d34'),
(79, '73192e8b2a3e0d34'),
(80, '73192e8b2a3e0d34'),
(81, '73192e8b2a3e0d34'),
(82, '73192e8b2a3e0d34'),
(83, '3F491B07-C508-4A9E-AC49-C325FBDC393B'),
(84, '0A569DDE-3D8B-4EF5-88A5-10B67E23EDEF'),
(85, '73192e8b2a3e0d34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `user_name`, `user_type`, `users_message`, `is_read`, `created_at`, `updated_at`) VALUES
(7, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'Hello Hammad', 1, '2020-06-18 09:39:00', '2020-07-01 11:14:25'),
(8, 10, 'Ghazanfar Choudri', 'ADMIN', 'Hi there.', 1, '2020-06-18 16:40:35', '2020-07-01 11:14:25'),
(9, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'yes ', 1, '2020-06-18 09:40:00', '2020-07-01 11:14:25'),
(10, 10, 'Ghazanfar Choudri', 'ADMIN', 'ok', 1, '2020-06-18 16:41:29', '2020-07-01 11:14:25'),
(11, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'check krayn ', 1, '2020-06-18 09:52:00', '2020-07-01 11:14:25'),
(12, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'hey man ', 1, '2020-06-18 09:54:00', '2020-07-01 11:14:25'),
(13, 10, 'Ghazanfar Choudri', 'ADMIN', 'ni hua', 1, '2020-06-18 16:56:32', '2020-07-01 11:14:25'),
(14, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'hey man who ', 1, '2020-06-18 09:54:00', '2020-07-01 11:14:25'),
(15, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'dbndjdhdj', 1, '2020-06-18 10:01:00', '2020-07-01 11:14:25'),
(16, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'how about you ', 1, '2020-06-19 15:46:00', '2020-07-01 11:14:25'),
(17, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'how about you can also be a good idea to get the most important ', 1, '2020-06-19 15:47:00', '2020-07-01 11:14:25'),
(18, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'how about you can also be a good idea to get the most important ', 1, '2020-06-19 15:51:00', '2020-07-01 11:14:25'),
(19, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'how about you can also be a good idea to get the most important ', 1, '2020-06-19 15:51:00', '2020-07-01 11:14:25'),
(20, 10, 'Ghazanfar Choudri', 'ADMIN', 'HELP!', 1, '2020-06-19 10:56:41', '2020-07-01 11:14:25'),
(21, 10, 'Ghazanfar Choudri', 'ADMIN', 'Hello', 1, '2020-06-19 11:50:17', '2020-07-01 11:14:25'),
(22, 10, 'Ghazanfar Choudri', 'ADMIN', 'Hello Hello Testing 1 2 3', 1, '2020-06-19 14:12:26', '2020-07-01 11:14:25'),
(23, 10, 'Ghazanfar Choudri', 'ADMIN', 'ABCD', 1, '2020-06-19 14:13:06', '2020-07-01 11:14:25'),
(24, 10, 'Ghazanfar Choudri', 'ADMIN', 'abcdefghijklmnopqrstuvwxyz', 1, '2020-06-19 14:14:25', '2020-07-01 11:14:25'),
(25, 10, 'Ghazanfar Choudri', 'ADMIN', 'i quit', 1, '2020-06-19 14:14:53', '2020-07-01 11:14:25'),
(26, 10, 'Ghazanfar Choudri', 'ADMIN', 'NO', 1, '2020-06-19 14:19:36', '2020-07-01 11:14:25'),
(27, 10, 'Ghazanfar Choudri', 'ADMIN', 'kya hogya bhai', 1, '2020-06-19 14:22:55', '2020-07-01 11:14:25'),
(28, 10, 'Ghazanfar Choudri', 'ADMIN', 'aya', 1, '2020-06-19 14:25:15', '2020-07-01 11:14:25'),
(29, 10, 'Ghazanfar Choudri', 'ADMIN', 'reply tou dey do', 1, '2020-06-19 14:27:19', '2020-07-01 11:14:25'),
(30, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'hn bhsi ', 1, '2020-06-19 07:32:00', '2020-07-01 11:14:25'),
(31, 10, 'Ghazanfar Choudri', 'ADMIN', 'dbsajhdbs', 1, '2020-06-19 14:36:07', '2020-07-01 11:14:25'),
(32, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'cjgg', 1, '2020-06-22 05:30:00', '2020-07-01 11:14:25'),
(33, 10, 'Ghazanfar Choudri', 'ADMIN', 'remove ni kiya chat update ka function?', 1, '2020-06-22 12:36:24', '2020-07-01 11:14:25'),
(34, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'kr dya dekhayn ', 1, '2020-06-22 05:55:00', '2020-07-01 11:14:25'),
(35, 10, 'Ghazanfar Choudri', 'ADMIN', 'ok thanks', 1, '2020-06-22 12:56:12', '2020-07-01 11:14:25'),
(36, 10, 'Ghazanfar Choudri', 'ADMIN', 'ho gya', 1, '2020-06-22 12:56:23', '2020-07-01 11:14:25'),
(37, 10, 'Ghazanfar Choudri', 'ADMIN', 'testing data', 1, '2020-07-01 10:54:40', '2020-07-01 11:14:25'),
(38, 10, 'Ghazanfar Choudri ', 'CUSTOMER', 'testing data', 1, '2020-07-01 16:12:00', '2020-07-01 11:14:25'),
(39, 10, 'Ghazanfar Choudri', 'ADMIN', 'message received', 1, '2020-07-01 11:14:25', '2020-07-01 11:14:25'),
(40, 40, 'Adil Ahmed', 'CUSTOMER', 'Hello This is Adil Ahmed', 1, '2020-11-17 07:16:00', '2020-11-17 14:21:50'),
(41, 40, 'Adil Ahmed', 'CUSTOMER', 'Hello This is Adil Ahmed', 1, '2020-11-17 07:19:00', '2020-11-17 14:21:50'),
(42, 40, 'Adil Ahmed', 'CUSTOMER', '', 1, '2020-11-17 07:20:00', '2020-11-17 14:21:50'),
(43, 40, 'Adil Ahmed', 'CUSTOMER', '', 1, '2020-11-17 07:20:00', '2020-11-17 14:21:50'),
(44, 40, 'Adil Ahmed', 'ADMIN', 'ywbdwy', 1, '2020-11-17 14:21:50', '2020-11-17 14:21:50'),
(45, 45, 'alaqeel', 'CUSTOMER', 'Hi, I am Alaqeel', 0, '2020-11-17 11:06:00', NULL);

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
(77, '2014_10_12_000000_create_users_table', 1),
(78, '2014_10_12_100000_create_password_resets_table', 1),
(79, '2019_08_19_000000_create_failed_jobs_table', 1),
(80, '2020_02_19_080000_create_permission_tables', 1),
(81, '2020_05_02_083605_create_shops_table', 1),
(82, '2020_05_02_092445_create_categories_table', 1),
(83, '2020_05_05_064003_create_pictures_table', 1),
(84, '2020_05_05_093413_create_features_table', 1),
(85, '2020_05_06_091648_create_benefits_table', 1),
(86, '2020_05_06_095651_create_app_users_table', 1),
(87, '2020_05_07_100022_create_promos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(2, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `shop_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 5, 'Lazania Ramzan', 'Only for Elite Members.', '2020-06-05 11:58:28', '2020-06-05 11:58:28'),
(5, 6, 'SindhbadNow50', 'To Avail this offer now.', '2020-06-05 12:26:14', '2020-06-05 12:26:14'),
(6, 15, 'dsdds', 'dsdasdfaf af', '2020-11-16 14:40:39', '2020-11-16 14:40:39'),
(7, 9, 'midnight offer', 'using code GA11 and get 150 discount', '2020-11-17 17:04:21', '2020-11-17 17:04:21'),
(8, 9, 'midnight offer', 'using code GA11 and get 150 discount', '2020-11-17 17:04:22', '2020-11-17 17:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hammadpirzada1@gmail.com', '$2y$10$8m5LTmmRCjlKJGa0R8Zh7e4kja4niaJdnuBCBG7hjnnKVbzusTAKS', '2020-06-22 15:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `shop_id`, `name`, `picture`, `created_at`, `updated_at`) VALUES
(6, 5, '2.jpg', 'pictures/58ac7k3vEj0u0sDymVP1nPHqMGBt1tL9dJi6Jhu9.jpeg', '2020-05-27 19:00:15', '2020-05-27 19:00:15'),
(7, 5, '1.jpg', 'pictures/jdRvRcDcAl8szMZOalF5LAUOzHzgwM3Ii49gqysm.jpeg', '2020-05-27 19:00:17', '2020-05-27 19:00:17'),
(8, 5, '3.jpg', 'pictures/N2U7bEQQUAVVIk0pQOoW40vWNiJLoHGq9fuUZYrv.jpeg', '2020-05-27 19:00:18', '2020-05-27 19:00:18'),
(9, 5, '4.jpg', 'pictures/bJ1SYjxZriNgPwaw4qHDEzTKU4fLnDAfmaH7UKz3.jpeg', '2020-05-27 19:00:20', '2020-05-27 19:00:20'),
(10, 5, '5.jpg', 'pictures/gh8YCxKTUxM67BwmujCmtOwDkMOrZbdlzt6nILXg.jpeg', '2020-05-27 19:00:20', '2020-05-27 19:00:20'),
(11, 6, 'juice.png', 'pictures/P547VmPc2AfNiya06qpve87lP7BSLwm05zkTArw5.png', '2020-07-01 10:53:57', '2020-07-01 10:53:57'),
(12, 6, 'juice.png', 'pictures/C2nJQg9UMm0lswxgC2LD2P1i86pSKhDfCDj6AKCp.png', '2020-07-01 10:54:01', '2020-07-01 10:54:01'),
(13, 6, 'heartattack.jpg', 'pictures/FFPPXKoSonWEfkCCvpG0cnjAZHhIlHV5p9cUIdjh.jpeg', '2020-07-01 10:54:06', '2020-07-01 10:54:06'),
(14, 6, 'walk.png', 'pictures/dVR23TXxxFrQbZN7ljjtYLf5qtsucJUcdnJsVqy3.png', '2020-07-01 10:54:09', '2020-07-01 10:54:09'),
(15, 6, 'blood-pressure.png', 'pictures/qpQLX18TPBstcvwSJfiiad4ACTGiOwgXsIlwkuGd.png', '2020-07-01 10:54:15', '2020-07-01 10:54:15'),
(16, 9, 'Cinepolis-Del-Mar-seats-700x477.jpg', 'pictures/k8oLEa4JmkAzGh3hJwzH4MUmGyQsULwSjyhlbqpD.jpeg', '2020-11-17 17:03:30', '2020-11-17 17:03:30'),
(17, 9, '565.jpg', 'pictures/uC3MAIAK72z0YjHbDuF9MFxD7pBIufCjTVK12pSe.jpeg', '2020-11-17 17:03:30', '2020-11-17 17:03:30'),
(18, 9, 'nueplex-cinemas.jpg', 'pictures/KTpF5uyXYjX10SNDdRFCGUzdnqcJl63grxONflKj.jpeg', '2020-11-17 17:03:31', '2020-11-17 17:03:31'),
(19, 9, 'wdw.jpg', 'pictures/tuJCxl4R5BIYiNOJxiuqBHMScwTG4XM30BtPvc2A.jpeg', '2020-11-17 17:03:31', '2020-11-17 17:03:31'),
(20, 9, 'wdwd.jpg', 'pictures/9KiLs2xZm2axd06oX9MPOIh9phUVYaZIoTEztq4H.jpeg', '2020-11-17 17:03:32', '2020-11-17 17:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qrcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `shop_id`, `name`, `code`, `qrcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free BreakFast', 'BREAKFAST100', NULL, '2020-05-11 09:56:50', '2020-05-11 09:56:50'),
(2, 5, 'LazaniaFeast', 'LazaniaFeast50', 'qrcode/LazaniaFeast.png', '2020-05-21 13:55:23', '2020-06-24 16:11:56'),
(3, 5, 'Lazania Ramzan', 'LazaniaRamzan30', 'qrcode/Lazania Ramzan.png', '2020-05-22 21:38:17', '2020-06-24 16:24:05'),
(5, 6, 'sindbadwow', 'sindbadwow50', 'qrcode/sindbadwow.png', '2020-05-30 11:06:17', '2020-07-01 10:53:26'),
(7, 6, 'sindhbad70', 'sind70off', 'qrcode/sindhbad70.png', '2020-07-01 10:52:37', '2020-07-01 10:52:37'),
(8, 15, 'Mechanic 60', 'mechanic5050', 'qrcode/Mechanic 60.png', '2020-11-16 14:37:31', '2020-11-16 14:37:31'),
(9, 9, 'nueplex 50', 'nueplex5050', 'qrcode/nueplex 50.png', '2020-11-17 17:00:51', '2020-11-17 17:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `shop_id`, `user_id`, `review`, `created_at`, `updated_at`, `user_name`) VALUES
(43, 5, 10, 'Hello, this is bilal, the food quality overall is good. but the waiter attitude is not good', '2020-05-30 04:00:09', '2020-05-30 04:00:09', 'Ghazanfar Choudri '),
(45, 5, 4, 'The Environment is not good.', '2020-05-30 04:25:21', '2020-05-30 04:25:21', 'Bilal Ahmed Khan '),
(46, 5, 8, 'Great location,  really pleasant and clean rooms, but the thing that makes this such a good place to stay are the staff. ', '2020-05-30 04:38:54', '2020-05-30 04:38:54', 'Mashood Ahmed '),
(47, 6, 10, 'Excellent gaming stuff.', '2020-05-30 15:56:47', '2020-05-30 15:56:47', 'Ghazanfar Choudri '),
(48, 5, 10, 'hi Mustafa thr', '2020-06-02 19:25:08', '2020-06-02 19:25:08', 'Ghazanfar Choudri '),
(49, 5, 12, 'helko ', '2020-06-02 19:29:23', '2020-06-02 19:29:23', 'Mustafa '),
(50, 5, 10, 'hi mussaddiq ', '2020-06-08 17:50:22', '2020-06-08 17:50:22', 'Ghazanfar Choudri '),
(51, 5, 11, 'It is nice', '2020-06-12 13:25:05', '2020-06-12 13:25:05', 'abdallah'),
(52, 15, 11, 'Great', '2020-06-12 13:27:40', '2020-06-12 13:27:40', 'abdallah'),
(53, 15, 11, 'Great', '2020-06-12 13:27:40', '2020-06-12 13:27:40', 'abdallah'),
(54, 15, 11, 'Great view', '2020-06-12 13:27:40', '2020-06-12 13:27:40', 'abdallah'),
(55, 15, 11, 'Ok', '2020-06-12 13:27:40', '2020-06-12 13:27:40', 'abdallah'),
(56, 5, 10, 'Fgffhh', '2020-07-07 17:38:57', '2020-07-07 17:38:57', 'Ghazanfar Choudri ');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'guest', 'web', NULL, NULL),
(2, 'admin', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `about`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Golden Time', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pictures/7L21kmmFyWcU5w1UOZbbgqv12SYZ3cHKkSq9cr7D.jpeg', '2020-06-22 17:25:02', '2020-11-11 15:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `latitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `category_id`, `name`, `description`, `rating`, `price`, `discount`, `location`, `city_id`, `latitude`, `longitude`, `contact`, `time_from`, `time_to`, `picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Lazania', 'Qualtiy Food.', 4, 100.00, 10.00, 'Milinium Mall', 44, '24.907688', '67.110364', '1555956649', NULL, '22:00:00', 'pictures/4z2o0TcAY3doi3Fu24G6je9zMcBuGZmubcwZ3Qkb.jpeg', '2020-05-15 15:42:49', '2020-08-22 17:47:26', NULL),
(6, 2, 'Sindhbad', 'Your Entertaintment is our priority.', 4, 250.00, 5.00, 'Adjacent to, Creek Club', 1, '24.915561', '67.098111', '+1245662782', '12:00:00', '23:00:00', 'pictures/ZESAy2qKkkY5Ep53wd6cZtsC8X3KhEYSbSNvkvop.jpeg', '2020-05-15 17:03:03', '2020-06-15 09:32:37', NULL),
(8, 3, 'Axe', 'Create your style with us', 4, 150.00, 10.00, 'Bath Island', 1, '24.833685', '67.033290', '+120528218', '22:00:00', '23:00:00', 'pictures/G6TleUr7JpUPzNhZIgc7jU9ceHYU8GIY4BcZkz5C.jpeg', '2020-05-15 17:09:01', '2020-06-15 09:34:25', NULL),
(9, 2, 'Nueplex', 'Best Cinema in Town.', 5, 700.00, 5.00, 'Defence Phase 8', 60, '24.779693', '67.089819', '+445228492', NULL, '00:00:00', 'pictures/067y5zs6a4a1U7XOusRQbLn2uSIhx4DS53EJPsg6.jpeg', '2020-05-16 02:19:03', '2020-08-24 22:53:35', NULL),
(11, 7, 'Tabba Heart', 'Very neat and clean.', 4, 1000.00, 10.00, 'Hussainabad', 1, '24.918867', '67.063816', '651651651131', '18:00:00', '23:00:00', 'pictures/X3DmjAlvMHmT9dcnvoeC1p1Xp5dKdjNqD8cBSpu7.jpeg', '2020-05-28 13:33:28', '2020-06-15 09:38:13', NULL),
(15, 9, 'Mechanic Ustad', 'Mechanic Ustaad.pk is an Online Mechanic Platform. DOORSTEP Mechanic services for your CARS, BIKES & GENERATORS.', 4, 800.00, 10.00, 'Anywhere in Ukraine', 1, '24.829633', '67.073350', '54864545456', '17:00:00', '20:00:00', 'pictures/uBDg1QAZRqB73lJ27I3IyZmSL1zvhr8MuDU8Juve.jpeg', '2020-05-30 11:40:53', '2020-06-15 09:39:52', NULL),
(18, 3, 'Khan Saloon', 'Very great stuff', 4, 250.00, 15.00, 'Bufferzone', 77, '24.9583714', '67.0658199', '03440150054', '12:27:00', '23:01:00', 'pictures/RyWnrmEHU5UkootvAm7aPGgxLbKZnPdRZgRIhB1h.jpeg', '2020-11-11 14:48:19', '2020-11-11 14:48:19', NULL),
(19, 1, 'California', 'Embiance is good', 5, 1600.00, 15.00, 'North Nazimabad', 18, '24.9409087', '67.0430415', '03440150054', '15:00:00', '23:00:00', 'pictures/sJzpSBVAyrbPJfREHomaLNSznG9Q4g2xUSjc5ah8.png', '2020-11-16 11:57:15', '2020-11-16 11:57:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `used_promos`
--

CREATE TABLE `used_promos` (
  `id` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `shop_id` varchar(50) NOT NULL,
  `promo_code` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_promos`
--

INSERT INTO `used_promos` (`id`, `user_id`, `user_name`, `shop_id`, `promo_code`) VALUES
(22, '10', 'Ghazanfar Choudri ', '5', 'LazaniaRamzan30'),
(23, '10', 'Ghazanfar Choudri ', '6', 'sindbadwow50'),
(24, '10', 'Ghazanfar Choudri ', '5', 'LazaniaFeast50'),
(25, '10', 'Ghazanfar Choudri ', '5', 'LazaniaFeast50'),
(26, '10', 'Ghazanfar Choudri ', '5', 'LazaniaFeast50'),
(27, '10', 'Ghazanfar Choudri ', '5', 'LazaniaFeast50'),
(28, '37', 'Fahad Khan ', '6', 'sindbadwow50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
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

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Admin', 'admin@admin.com', NULL, '$2y$10$/4FGIqOMCR7tRn4bX.MV0ObGC4vODv.6N9sYhwVtvKGnM7j9vLRX2', '7e4xzhDx3fUQWcyFiKzl2ksqcRYzqb6FnZ45XmIbHekd8p05vNc2FDPtiRHn', '2020-05-08 12:16:04', '2020-05-08 12:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_favourite_hotel`
--

CREATE TABLE `user_favourite_hotel` (
  `favourite_id` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `categoryid` int(50) NOT NULL,
  `is_favourite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_favourite_hotel`
--

INSERT INTO `user_favourite_hotel` (`favourite_id`, `shop_id`, `user_id`, `categoryid`, `is_favourite`) VALUES
(63, 5, 10, 1, 'true'),
(64, 19, 10, 1, 'true'),
(68, 9, 45, 2, 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_users_email_unique` (`email`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_users`
--
ALTER TABLE `guest_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_promos`
--
ALTER TABLE `used_promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_favourite_hotel`
--
ALTER TABLE `user_favourite_hotel`
  ADD PRIMARY KEY (`favourite_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guest_users`
--
ALTER TABLE `guest_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `used_promos`
--
ALTER TABLE `used_promos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_favourite_hotel`
--
ALTER TABLE `user_favourite_hotel`
  MODIFY `favourite_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
