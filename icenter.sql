-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2018 at 01:39 PM
-- Server version: 10.2.7-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ildirim', 'admin@admin.com', '$2y$10$.zMG0neqB4EX.pHebm5X5.Y10GSlq62QWvT6ex7gv5KTqF4i5a7/C', 'kUiqBu0RIxE2zS6dVsINYzh6iD6SVKXib8azDDMsG0Qf1v7Unkqsa88pvFSD', '2018-02-12 09:22:18', '2018-02-12 09:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `common_infos`
--

CREATE TABLE `common_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_info_translations`
--

CREATE TABLE `common_info_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `common_info_id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_lorems`
--

CREATE TABLE `common_lorems` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_lorem_translations`
--

CREATE TABLE `common_lorem_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `common_lorem_id` int(10) UNSIGNED NOT NULL,
  `title11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_services`
--

CREATE TABLE `content_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_service_translations`
--

CREATE TABLE `content_service_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_service_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cont_wsa_ab_con`
--

CREATE TABLE `cont_wsa_ab_con` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cont_wsa_ab_con_translations`
--

CREATE TABLE `cont_wsa_ab_con_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `cont_wsa_ab_con_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE `directories` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directory_lorems`
--

CREATE TABLE `directory_lorems` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directory_lorem_translations`
--

CREATE TABLE `directory_lorem_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `directory_lorem_id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directory_translations`
--

CREATE TABLE `directory_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `directory_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `easy_sponsors`
--

CREATE TABLE `easy_sponsors` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `easy_sponsor_translations`
--

CREATE TABLE `easy_sponsor_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `easy_sponsor_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_services`
--

CREATE TABLE `head_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_service_translations`
--

CREATE TABLE `head_service_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `head_service_id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_wsa_ab_con`
--

CREATE TABLE `head_wsa_ab_con` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_wsa_ab_con_translations`
--

CREATE TABLE `head_wsa_ab_con_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `head_wsa_ab_con_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_slider_translations`
--

CREATE TABLE `home_slider_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_slider_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_products`
--

CREATE TABLE `media_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_product_translations`
--

CREATE TABLE `media_product_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `media_product_id` int(10) UNSIGNED NOT NULL,
  `image_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lorem_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lorem_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lorem_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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
(4, '2018_02_12_104545_create_admins_table', 2),
(13, '2018_02_12_132629_create_news_table', 3),
(14, '2018_02_12_140406_create_news_comments_table', 3),
(15, '2018_02_13_071941_create_news_images_table', 3),
(21, '2018_02_14_103059_create_content_services_table', 4),
(23, '2018_02_15_073741_create_directories_table', 5),
(24, '2018_02_15_110113_create_structures_table', 6),
(25, '2018_02_15_121604_create_partners_table', 7),
(26, '2018_02_14_074510_create_head_services_table', 8),
(29, '2018_02_19_065251_create_trainings_table', 10),
(37, '2018_02_19_103615_create_cont_wsa_abcon_table', 12),
(38, '2018_02_19_103553_create_head_wsa_abcon_table', 13),
(40, '2018_02_20_063512_create_pri_part_tars_table', 14),
(41, '2018_02_20_075715_create_galleries_table', 15),
(42, '2018_02_20_101354_create_wsa_globals_table', 16),
(43, '2018_02_16_084637_create_media_products_table', 17),
(46, '2018_02_22_142557_create_preferences_table', 18),
(47, '2018_03_06_111250_create_common_infos_table', 19),
(49, '2018_03_12_151830_create_easy_sponsors_table', 20),
(51, '2018_03_13_103821_create_structure_lorems_table', 21),
(52, '2018_03_13_111227_create_partner_lorems_table', 22),
(53, '2018_03_13_120106_create_directory_lorems_table', 23),
(55, '2018_03_13_135436_create_common_lorems_table', 24),
(56, '2018_03_14_160034_create_home_sliders_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`) VALUES
(26, '2018-03-16 10:00:05', '2018-03-16 10:00:05'),
(27, '2018-03-16 10:10:29', '2018-03-16 10:10:29'),
(28, '2018-03-16 10:10:31', '2018-03-16 10:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `news_id`, `image`, `created_at`, `updated_at`) VALUES
(43, 26, 'GicvbZzTVVL3m4qRZAYIPGEeqqpH1Sg2yIsmrfd1.jpeg', NULL, NULL),
(44, 27, 'fAjbiHbwQUm0ySMsyxWPAzEbIfCAcqZyNRp1Bbce.jpeg', NULL, NULL),
(45, 28, 'UiGe2hs1hi76RLonafmo0sWl9k2ucbl36pFz0T2h.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_translations`
--

CREATE TABLE `news_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_translations`
--

INSERT INTO `news_translations` (`id`, `news_id`, `title`, `content`, `locale`) VALUES
(52, 26, 'asd', '<p>asd</p>', 'az'),
(53, 26, 'ad', '<p>asd</p>', 'en'),
(54, 27, 'asd', '<p>asd</p>', 'az'),
(55, 27, 'ad', '<p>asd</p>', 'en'),
(56, 28, 'asd', '<p>asdaknsbdjhabsjdhbajshbajhsbdhabskcjnascnascahsduiahsiudhaisudhiuashdahsid</p><p>asdaknsbdjhabsjdhbajshbajhsbdhabskcjnascnascahsduiahsiudhaisudhiuashdahsid</p><p>asdaknsbdjhabsjdhbajshbajhsbdhabskcjnascnascahsduiahsiudhaisudhiuashdahsid</p>', 'az'),
(57, 28, 'ad', '<p>asd</p>', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_lorems`
--

CREATE TABLE `partner_lorems` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_lorem_translations`
--

CREATE TABLE `partner_lorem_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_lorem_id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_translations`
--

CREATE TABLE `partner_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preference_translations`
--

CREATE TABLE `preference_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `preference_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pri_part_tars`
--

CREATE TABLE `pri_part_tars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pri_part_tar_translations`
--

CREATE TABLE `pri_part_tar_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `pri_part_tar_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structures`
--

CREATE TABLE `structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_lorems`
--

CREATE TABLE `structure_lorems` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_lorem_translations`
--

CREATE TABLE `structure_lorem_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `structure_lorem_id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure_translations`
--

CREATE TABLE `structure_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `structure_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_translations`
--

CREATE TABLE `training_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ildirim', 'admin@admin.com', '$2y$10$ILMfQ04F1EfseFN2vBDO0OYqwLZpj/MNH9Tvgqq7D./oGDyrLl2cK', NULL, '2018-02-12 06:48:59', '2018-02-12 06:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `wsa_globals`
--

CREATE TABLE `wsa_globals` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wsa_global_translations`
--

CREATE TABLE `wsa_global_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `wsa_global_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `common_infos`
--
ALTER TABLE `common_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_info_translations`
--
ALTER TABLE `common_info_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `common_info_translations_locale_common_info_id_unique` (`locale`,`common_info_id`),
  ADD KEY `common_info_translations_common_info_id_foreign` (`common_info_id`),
  ADD KEY `common_info_translations_locale_index` (`locale`);

--
-- Indexes for table `common_lorems`
--
ALTER TABLE `common_lorems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_lorem_translations`
--
ALTER TABLE `common_lorem_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `common_lorem_translations_locale_common_lorem_id_unique` (`locale`,`common_lorem_id`),
  ADD KEY `common_lorem_translations_common_lorem_id_foreign` (`common_lorem_id`),
  ADD KEY `common_lorem_translations_locale_index` (`locale`);

--
-- Indexes for table `content_services`
--
ALTER TABLE `content_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_service_translations`
--
ALTER TABLE `content_service_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_service_translations_locale_content_service_id_unique` (`locale`,`content_service_id`),
  ADD KEY `content_service_translations_content_service_id_foreign` (`content_service_id`),
  ADD KEY `content_service_translations_locale_index` (`locale`);

--
-- Indexes for table `cont_wsa_ab_con`
--
ALTER TABLE `cont_wsa_ab_con`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cont_wsa_ab_con_translations`
--
ALTER TABLE `cont_wsa_ab_con_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cont_wsa_ab_con_translations_locale_cont_wsa_ab_con_id_unique` (`locale`,`cont_wsa_ab_con_id`),
  ADD KEY `cont_wsa_ab_con_translations_cont_wsa_ab_con_id_foreign` (`cont_wsa_ab_con_id`),
  ADD KEY `cont_wsa_ab_con_translations_locale_index` (`locale`);

--
-- Indexes for table `directories`
--
ALTER TABLE `directories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory_lorems`
--
ALTER TABLE `directory_lorems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory_lorem_translations`
--
ALTER TABLE `directory_lorem_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `directory_lorem_translations_locale_directory_lorem_id_unique` (`locale`,`directory_lorem_id`),
  ADD KEY `directory_lorem_translations_directory_lorem_id_foreign` (`directory_lorem_id`),
  ADD KEY `directory_lorem_translations_locale_index` (`locale`);

--
-- Indexes for table `directory_translations`
--
ALTER TABLE `directory_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `directory_translations_locale_directory_id_unique` (`locale`,`directory_id`),
  ADD KEY `directory_translations_directory_id_foreign` (`directory_id`),
  ADD KEY `directory_translations_locale_index` (`locale`);

--
-- Indexes for table `easy_sponsors`
--
ALTER TABLE `easy_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `easy_sponsor_translations`
--
ALTER TABLE `easy_sponsor_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `easy_sponsor_translations_locale_easy_sponsor_id_unique` (`locale`,`easy_sponsor_id`),
  ADD KEY `easy_sponsor_translations_easy_sponsor_id_foreign` (`easy_sponsor_id`),
  ADD KEY `easy_sponsor_translations_locale_index` (`locale`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_services`
--
ALTER TABLE `head_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_service_translations`
--
ALTER TABLE `head_service_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head_service_translations_locale_head_service_id_unique` (`locale`,`head_service_id`),
  ADD KEY `head_service_translations_head_service_id_foreign` (`head_service_id`),
  ADD KEY `head_service_translations_locale_index` (`locale`);

--
-- Indexes for table `head_wsa_ab_con`
--
ALTER TABLE `head_wsa_ab_con`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_wsa_ab_con_translations`
--
ALTER TABLE `head_wsa_ab_con_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head_wsa_ab_con_translations_locale_head_wsa_ab_con_id_unique` (`locale`,`head_wsa_ab_con_id`),
  ADD KEY `head_wsa_ab_con_translations_head_wsa_ab_con_id_foreign` (`head_wsa_ab_con_id`),
  ADD KEY `head_wsa_ab_con_translations_locale_index` (`locale`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider_translations`
--
ALTER TABLE `home_slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `home_slider_translations_locale_home_slider_id_unique` (`locale`,`home_slider_id`),
  ADD KEY `home_slider_translations_home_slider_id_foreign` (`home_slider_id`),
  ADD KEY `home_slider_translations_locale_index` (`locale`);

--
-- Indexes for table `media_products`
--
ALTER TABLE `media_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_product_translations`
--
ALTER TABLE `media_product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_product_translations_locale_media_product_id_unique` (`locale`,`media_product_id`),
  ADD KEY `media_product_translations_media_product_id_foreign` (`media_product_id`),
  ADD KEY `media_product_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_comments_news_id_foreign` (`news_id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_images_news_id_foreign` (`news_id`);

--
-- Indexes for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_translations_locale_news_id_unique` (`locale`,`news_id`),
  ADD KEY `news_translations_news_id_foreign` (`news_id`),
  ADD KEY `news_translations_locale_index` (`locale`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_lorems`
--
ALTER TABLE `partner_lorems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_lorem_translations`
--
ALTER TABLE `partner_lorem_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partner_lorem_translations_locale_partner_lorem_id_unique` (`locale`,`partner_lorem_id`),
  ADD KEY `partner_lorem_translations_partner_lorem_id_foreign` (`partner_lorem_id`),
  ADD KEY `partner_lorem_translations_locale_index` (`locale`);

--
-- Indexes for table `partner_translations`
--
ALTER TABLE `partner_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partner_translations_locale_partner_id_unique` (`locale`,`partner_id`),
  ADD KEY `partner_translations_partner_id_foreign` (`partner_id`),
  ADD KEY `partner_translations_locale_index` (`locale`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preference_translations`
--
ALTER TABLE `preference_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `preference_translations_locale_preference_id_unique` (`locale`,`preference_id`),
  ADD KEY `preference_translations_preference_id_foreign` (`preference_id`),
  ADD KEY `preference_translations_locale_index` (`locale`);

--
-- Indexes for table `pri_part_tars`
--
ALTER TABLE `pri_part_tars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pri_part_tar_translations`
--
ALTER TABLE `pri_part_tar_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pri_part_tar_translations_locale_pri_part_tar_id_unique` (`locale`,`pri_part_tar_id`),
  ADD KEY `pri_part_tar_translations_pri_part_tar_id_foreign` (`pri_part_tar_id`),
  ADD KEY `pri_part_tar_translations_locale_index` (`locale`);

--
-- Indexes for table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_lorems`
--
ALTER TABLE `structure_lorems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure_lorem_translations`
--
ALTER TABLE `structure_lorem_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structure_lorem_translations_locale_structure_lorem_id_unique` (`locale`,`structure_lorem_id`),
  ADD KEY `structure_lorem_translations_structure_lorem_id_foreign` (`structure_lorem_id`),
  ADD KEY `structure_lorem_translations_locale_index` (`locale`);

--
-- Indexes for table `structure_translations`
--
ALTER TABLE `structure_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structure_translations_locale_structure_id_unique` (`locale`,`structure_id`),
  ADD KEY `structure_translations_structure_id_foreign` (`structure_id`),
  ADD KEY `structure_translations_locale_index` (`locale`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_translations`
--
ALTER TABLE `training_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `training_translations_locale_training_id_unique` (`locale`,`training_id`),
  ADD KEY `training_translations_training_id_foreign` (`training_id`),
  ADD KEY `training_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wsa_globals`
--
ALTER TABLE `wsa_globals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wsa_global_translations`
--
ALTER TABLE `wsa_global_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wsa_global_translations_locale_wsa_global_id_unique` (`locale`,`wsa_global_id`),
  ADD KEY `wsa_global_translations_wsa_global_id_foreign` (`wsa_global_id`),
  ADD KEY `wsa_global_translations_locale_index` (`locale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `common_infos`
--
ALTER TABLE `common_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `common_info_translations`
--
ALTER TABLE `common_info_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `common_lorems`
--
ALTER TABLE `common_lorems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `common_lorem_translations`
--
ALTER TABLE `common_lorem_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `content_services`
--
ALTER TABLE `content_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `content_service_translations`
--
ALTER TABLE `content_service_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `cont_wsa_ab_con`
--
ALTER TABLE `cont_wsa_ab_con`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cont_wsa_ab_con_translations`
--
ALTER TABLE `cont_wsa_ab_con_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `directories`
--
ALTER TABLE `directories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `directory_lorems`
--
ALTER TABLE `directory_lorems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `directory_lorem_translations`
--
ALTER TABLE `directory_lorem_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `directory_translations`
--
ALTER TABLE `directory_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `easy_sponsors`
--
ALTER TABLE `easy_sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easy_sponsor_translations`
--
ALTER TABLE `easy_sponsor_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `head_services`
--
ALTER TABLE `head_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `head_service_translations`
--
ALTER TABLE `head_service_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `head_wsa_ab_con`
--
ALTER TABLE `head_wsa_ab_con`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `head_wsa_ab_con_translations`
--
ALTER TABLE `head_wsa_ab_con_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `home_slider_translations`
--
ALTER TABLE `home_slider_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `media_products`
--
ALTER TABLE `media_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `media_product_translations`
--
ALTER TABLE `media_product_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `news_translations`
--
ALTER TABLE `news_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `partner_lorems`
--
ALTER TABLE `partner_lorems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partner_lorem_translations`
--
ALTER TABLE `partner_lorem_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `partner_translations`
--
ALTER TABLE `partner_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `preference_translations`
--
ALTER TABLE `preference_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pri_part_tars`
--
ALTER TABLE `pri_part_tars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pri_part_tar_translations`
--
ALTER TABLE `pri_part_tar_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `structure_lorems`
--
ALTER TABLE `structure_lorems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `structure_lorem_translations`
--
ALTER TABLE `structure_lorem_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `structure_translations`
--
ALTER TABLE `structure_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `training_translations`
--
ALTER TABLE `training_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wsa_globals`
--
ALTER TABLE `wsa_globals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wsa_global_translations`
--
ALTER TABLE `wsa_global_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `common_info_translations`
--
ALTER TABLE `common_info_translations`
  ADD CONSTRAINT `common_info_translations_common_info_id_foreign` FOREIGN KEY (`common_info_id`) REFERENCES `common_infos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `common_lorem_translations`
--
ALTER TABLE `common_lorem_translations`
  ADD CONSTRAINT `common_lorem_translations_common_lorem_id_foreign` FOREIGN KEY (`common_lorem_id`) REFERENCES `common_lorems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_service_translations`
--
ALTER TABLE `content_service_translations`
  ADD CONSTRAINT `content_service_translations_content_service_id_foreign` FOREIGN KEY (`content_service_id`) REFERENCES `content_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cont_wsa_ab_con_translations`
--
ALTER TABLE `cont_wsa_ab_con_translations`
  ADD CONSTRAINT `cont_wsa_ab_con_translations_cont_wsa_ab_con_id_foreign` FOREIGN KEY (`cont_wsa_ab_con_id`) REFERENCES `cont_wsa_ab_con` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `directory_lorem_translations`
--
ALTER TABLE `directory_lorem_translations`
  ADD CONSTRAINT `directory_lorem_translations_directory_lorem_id_foreign` FOREIGN KEY (`directory_lorem_id`) REFERENCES `directory_lorems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directory_translations`
--
ALTER TABLE `directory_translations`
  ADD CONSTRAINT `directory_translations_directory_id_foreign` FOREIGN KEY (`directory_id`) REFERENCES `directories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `easy_sponsor_translations`
--
ALTER TABLE `easy_sponsor_translations`
  ADD CONSTRAINT `easy_sponsor_translations_easy_sponsor_id_foreign` FOREIGN KEY (`easy_sponsor_id`) REFERENCES `easy_sponsors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `head_service_translations`
--
ALTER TABLE `head_service_translations`
  ADD CONSTRAINT `head_service_translations_head_service_id_foreign` FOREIGN KEY (`head_service_id`) REFERENCES `head_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `head_wsa_ab_con_translations`
--
ALTER TABLE `head_wsa_ab_con_translations`
  ADD CONSTRAINT `head_wsa_ab_con_translations_head_wsa_ab_con_id_foreign` FOREIGN KEY (`head_wsa_ab_con_id`) REFERENCES `head_wsa_ab_con` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_slider_translations`
--
ALTER TABLE `home_slider_translations`
  ADD CONSTRAINT `home_slider_translations_home_slider_id_foreign` FOREIGN KEY (`home_slider_id`) REFERENCES `home_sliders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media_product_translations`
--
ALTER TABLE `media_product_translations`
  ADD CONSTRAINT `media_product_translations_media_product_id_foreign` FOREIGN KEY (`media_product_id`) REFERENCES `media_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `news_images_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partner_lorem_translations`
--
ALTER TABLE `partner_lorem_translations`
  ADD CONSTRAINT `partner_lorem_translations_partner_lorem_id_foreign` FOREIGN KEY (`partner_lorem_id`) REFERENCES `partner_lorems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner_translations`
--
ALTER TABLE `partner_translations`
  ADD CONSTRAINT `partner_translations_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preference_translations`
--
ALTER TABLE `preference_translations`
  ADD CONSTRAINT `preference_translations_preference_id_foreign` FOREIGN KEY (`preference_id`) REFERENCES `preferences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pri_part_tar_translations`
--
ALTER TABLE `pri_part_tar_translations`
  ADD CONSTRAINT `pri_part_tar_translations_pri_part_tar_id_foreign` FOREIGN KEY (`pri_part_tar_id`) REFERENCES `pri_part_tars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `structure_lorem_translations`
--
ALTER TABLE `structure_lorem_translations`
  ADD CONSTRAINT `structure_lorem_translations_structure_lorem_id_foreign` FOREIGN KEY (`structure_lorem_id`) REFERENCES `structure_lorems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `structure_translations`
--
ALTER TABLE `structure_translations`
  ADD CONSTRAINT `structure_translations_structure_id_foreign` FOREIGN KEY (`structure_id`) REFERENCES `structures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_translations`
--
ALTER TABLE `training_translations`
  ADD CONSTRAINT `training_translations_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wsa_global_translations`
--
ALTER TABLE `wsa_global_translations`
  ADD CONSTRAINT `wsa_global_translations_wsa_global_id_foreign` FOREIGN KEY (`wsa_global_id`) REFERENCES `wsa_globals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
