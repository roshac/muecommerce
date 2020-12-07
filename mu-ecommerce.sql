-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2020 at 06:49 AM
-- Server version: 8.0.20
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mu-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `user_id`, `company_id`, `category_id`, `name`, `photo`, `desc`, `starting_price`, `end_price`, `deadline`, `created_at`, `updated_at`) VALUES
(15, 2, 2, 1, 'Sub-woofer', 'Bhe8mIgWR8HsENQbk8MdbXDpe0FPDkfFM6AtcYWw.jpeg', '<p>Good Sound</p>', '50000', '60000', '2020-08-30', '2020-07-18 22:03:03', '2020-07-18 22:03:03'),
(17, 2, 2, 1, 'Earpods', 'SFkY43cLulitWTDMa2e0FIYFX8YLlIXx2Ec8VjKB.jpeg', '<p><strong>Good Sound</strong></p>', '50000', '60000', '2020-08-30', '2020-07-24 18:34:30', '2020-07-24 18:34:30'),
(18, 1, 1, 1, 'MackBook Pro', 'U1aldNZNmZYxZTagKQjsAluBJlORvZu0Yabq8AIO.jpeg', '<p><strong>Good Perfomance</strong></p>', '1500000', '1600000', '2020-08-13', '2020-07-28 00:16:50', '2020-07-28 00:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `auction_user`
--

CREATE TABLE `auction_user` (
  `id` bigint UNSIGNED NOT NULL,
  `auction_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `saler_id` bigint UNSIGNED NOT NULL,
  `fee_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_user`
--

INSERT INTO `auction_user` (`id`, `auction_id`, `user_id`, `saler_id`, `fee_paid`, `status`, `created_at`, `updated_at`) VALUES
(45, 15, 2, 2, '60000', '1', '2020-07-24 17:22:38', '2020-07-24 17:22:38'),
(46, 15, 2, 2, '70000', '1', '2020-07-24 17:24:34', '2020-07-24 17:24:34'),
(50, 17, 1, 2, '60000', '1', '2020-07-27 23:35:08', '2020-07-27 23:35:08'),
(51, 17, 1, 2, '70000', '1', '2020-07-28 05:42:32', '2020-07-28 05:42:32'),
(52, 18, 1, 1, '2000000', '2', '2020-07-28 05:44:39', '2020-07-30 06:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `bid_payment`
--

CREATE TABLE `bid_payment` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `auction_id` bigint UNSIGNED NOT NULL,
  `saler_id` bigint UNSIGNED NOT NULL,
  `contact_id` bigint UNSIGNED NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `fee_paid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auction_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_payment`
--

INSERT INTO `bid_payment` (`id`, `user_id`, `auction_id`, `saler_id`, `contact_id`, `status_id`, `fee_paid`, `payment_id`, `feedback`, `postal_code`, `created_at`, `updated_at`, `auction_name`, `photo`, `desc`, `starting_price`, `end_price`, `deadline`) VALUES
(6, 1, 3, 1, 1, 5, '2000000', 'ch_1H6Fn0BJVKJhJqjqcdEWXgH7', 'Good Service', 'qqaq', '2020-07-18 10:09:20', '2020-07-27 23:57:09', 'MckBook Pro', 'GIN56HBBPpgdUYZpbvmH9Jiie3TiybrbQYIabKKO.jpeg', '<p>Good Perfomance</p>', '150000', '2000000', '2020-08-06'),
(7, 2, 14, 1, 1, 2, '70000', 'ch_1H6NJpBJVKJhJqjqkkDrYF2x', NULL, 'TT3421GG', '2020-07-18 18:11:42', '2020-07-26 06:58:11', 'Earpods', 'AQGQ4xdl3EpRQ0PwuWy9og8o650FtuTtx1YEDLVa.jpeg', '<p>Good Sound</p>', '50000', '60000', '2020-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pcategories_id` bigint UNSIGNED NOT NULL,
  `brand_logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payemnt_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_accid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `user_id`, `pcategories_id`, `brand_logo`, `phone_no`, `address`, `region_id`, `location`, `package_type`, `payemnt_id`, `stripe_accid`, `status`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Roma Electronics', 1, 1, NULL, '+255656444539', 'P.o.box 121 MKUU ROMBO KILIMANJARO', 'Kilimanjaro', 'Moshi', '5000', 'ch_1GxuCdBJVKJhJqjqdKoSSXrC', 'acct_1H2udFD8tOjv0Itj', '1', '2020-09-02 11:53:19', '2020-06-25 06:29:16', '2020-08-03 08:53:19'),
(2, 'Benga Popcorn', 2, 2, NULL, '0733221122', 'Morogoro', 'Morogoro', 'Kilima Hewa', '5000', 'ch_1GyP05BJVKJhJqjqmbPU681j', 'acct_1H2i8TION9sQhkeP', '0', '2020-07-18 18:57:38', '2020-06-26 18:22:21', '2020-08-19 03:49:01'),
(4, 'Jassie Store', 4, 4, NULL, '0712626035', 'p.obox 1 mzumbe morogoro', 'Morogoro', 'Uswazi Chini', '5000', 'ch_1H0tu9BJVKJhJqjqRzQZMDg2', 'acct_1H2i8TION9sQhkeP', '0', '2020-08-02 18:46:31', '2020-07-03 15:46:34', '2020-08-19 03:49:01'),
(5, 'Calisto Fashion', 3, 4, NULL, '0765814169', 'P.o.Box 1 Morogoro', 'Morogoro', 'Uswazi Juu', '60000', 'ch_1H7WQ3BJVKJhJqjqcEZeAftq', 'acct_1H2udFD8tOjv0Itj', '1', '2021-01-18 01:06:49', '2020-07-21 22:06:52', '2020-07-21 22:06:52'),
(6, 'Gift Food', 3, 2, NULL, '255765814169', 'P,oBox 1 Morogoro', 'Morogoro', 'Uswazi Chini', '60000', 'ch_1H8uA6BJVKJhJqjqK8DW1U08', 'acct_1H2udFD8tOjv0Itj', '1', '2021-01-21 20:40:05', '2020-07-25 17:40:08', '2020-07-25 17:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `region_id`, `location`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mirambo 308', '255656444539', '2020-06-26 10:30:36', '2020-06-26 10:30:36'),
(2, 1, 1, 'Kimweri 304', '255765827811', '2020-06-26 11:26:39', '2020-06-26 11:26:39'),
(3, 2, 1, 'Kimweri 303', '255765827811', '2020-06-27 05:20:47', '2020-06-27 05:20:47'),
(4, 3, 1, 'Mirambo 308', '255656444539', '2020-07-09 12:32:38', '2020-07-09 12:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `order_product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `order_product_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 34, 'nice servie', '2020-07-25 21:35:55', '2020-07-25 21:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-25 05:49:15', '2020-06-25 05:49:15'),
(2, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-25 05:51:04', '2020-06-25 05:51:04'),
(3, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-25 06:31:17', '2020-06-25 06:31:17'),
(4, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-25 06:33:19', '2020-06-25 06:33:19'),
(5, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-25 18:30:39', '2020-06-25 18:30:39'),
(6, 'Seller Account Created', 'http://127.0.0.1:8000/give/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-06-28 17:25:49', '2020-06-28 17:25:49'),
(7, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-06-28 17:27:57', '2020-06-28 17:27:57'),
(8, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-01 10:14:08', '2020-07-01 10:14:08'),
(9, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-01 15:00:47', '2020-07-01 15:00:47'),
(10, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-01 15:32:15', '2020-07-01 15:32:15'),
(11, 'Seller Account Created', 'http://127.0.0.1:8000/give/4', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-03 15:34:55', '2020-07-03 15:34:55'),
(12, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-03 18:01:55', '2020-07-03 18:01:55'),
(13, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-04 15:41:58', '2020-07-04 15:41:58'),
(14, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-05 18:05:33', '2020-07-05 18:05:33'),
(15, 'Seller Account Created', 'http://127.0.0.1:8000/give/3', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-05 18:05:50', '2020-07-05 18:05:50'),
(16, 'Seller Account Created', 'http://127.0.0.1:8000/give/3', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-05 18:05:59', '2020-07-05 18:05:59'),
(17, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 09:08:36', '2020-07-10 09:08:36'),
(18, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 4, '2020-07-10 15:23:19', '2020-07-10 15:23:19'),
(19, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 3, '2020-07-10 15:53:59', '2020-07-10 15:53:59'),
(20, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 15:55:50', '2020-07-10 15:55:50'),
(21, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 15:59:55', '2020-07-10 15:59:55'),
(22, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 16:47:55', '2020-07-10 16:47:55'),
(23, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 3, '2020-07-10 17:40:39', '2020-07-10 17:40:39'),
(24, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 17:54:45', '2020-07-10 17:54:45'),
(25, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-10 17:54:46', '2020-07-10 17:54:46'),
(26, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-11 06:30:31', '2020-07-11 06:30:31'),
(27, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-12 07:06:34', '2020-07-12 07:06:34'),
(28, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 01:43:21', '2020-07-13 01:43:21'),
(29, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 14:18:02', '2020-07-13 14:18:02'),
(30, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 15:57:05', '2020-07-13 15:57:05'),
(31, 'New product created', 'http://127.0.0.1:8000/submit', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 15:57:23', '2020-07-13 15:57:23'),
(32, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 16:55:09', '2020-07-13 16:55:09'),
(33, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 17:17:53', '2020-07-13 17:17:53'),
(34, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 17:31:48', '2020-07-13 17:31:48'),
(35, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-13 17:32:13', '2020-07-13 17:32:13'),
(36, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-14 04:42:41', '2020-07-14 04:42:41'),
(37, 'Auction Approve created', 'http://127.0.0.1:8000/approve/3', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-14 10:09:01', '2020-07-14 10:09:01'),
(38, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-15 04:56:13', '2020-07-15 04:56:13'),
(39, 'Auction Approve created', 'http://127.0.0.1:8000/approve/13', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-15 10:19:29', '2020-07-15 10:19:29'),
(40, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-15 21:20:29', '2020-07-15 21:20:29'),
(41, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-16 10:37:17', '2020-07-16 10:37:17'),
(42, 'Seller Account Created', 'http://127.0.0.1:8000/give/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-16 13:21:47', '2020-07-16 13:21:47'),
(43, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-17 18:09:05', '2020-07-17 18:09:05'),
(44, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-17 18:12:13', '2020-07-17 18:12:13'),
(45, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-17 18:17:03', '2020-07-17 18:17:03'),
(46, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-17 18:21:52', '2020-07-17 18:21:52'),
(47, 'Auction Approve created', 'http://127.0.0.1:8000/approve/29', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-17 19:23:34', '2020-07-17 19:23:34'),
(48, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-17 20:46:33', '2020-07-17 20:46:33'),
(49, 'Auction Approve created', 'http://127.0.0.1:8000/approve/13', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-17 20:58:31', '2020-07-17 20:58:31'),
(50, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 17:23:18', '2020-07-18 17:23:18'),
(51, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 17:29:40', '2020-07-18 17:29:40'),
(52, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 17:30:45', '2020-07-18 17:30:45'),
(53, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 17:31:27', '2020-07-18 17:31:27'),
(54, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 17:51:46', '2020-07-18 17:51:46'),
(55, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 18:07:49', '2020-07-18 18:07:49'),
(56, 'Auction Approve created', 'http://127.0.0.1:8000/approve/43', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 18:08:38', '2020-07-18 18:08:38'),
(57, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-18 22:03:03', '2020-07-18 22:03:03'),
(58, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-18 22:07:08', '2020-07-18 22:07:08'),
(59, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-19 04:45:45', '2020-07-19 04:45:45'),
(60, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-19 18:03:38', '2020-07-19 18:03:38'),
(61, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-19 18:10:22', '2020-07-19 18:10:22'),
(62, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-19 18:32:29', '2020-07-19 18:32:29'),
(63, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-19 18:39:13', '2020-07-19 18:39:13'),
(64, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 16:08:50', '2020-07-20 16:08:50'),
(65, 'Seller Account Created', 'http://127.0.0.1:8000/give/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 17:37:02', '2020-07-20 17:37:02'),
(66, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 19:39:29', '2020-07-20 19:39:29'),
(67, 'Seller Account Created', 'http://127.0.0.1:8000/give/4', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 19:43:18', '2020-07-20 19:43:18'),
(68, 'Seller Account Created', 'http://127.0.0.1:8000/giveap/4', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 20:07:07', '2020-07-20 20:07:07'),
(69, 'Company created', 'http://127.0.0.1:8000/agreement', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-21 22:06:52', '2020-07-21 22:06:52'),
(70, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:33:17', '2020-07-22 03:33:17'),
(71, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:33:49', '2020-07-22 03:33:49'),
(72, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:35:19', '2020-07-22 03:35:19'),
(73, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:45:48', '2020-07-22 03:45:48'),
(74, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:53:01', '2020-07-22 03:53:01'),
(75, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 03:54:08', '2020-07-22 03:54:08'),
(76, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 04:02:26', '2020-07-22 04:02:26'),
(77, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-22 04:03:23', '2020-07-22 04:03:23'),
(78, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 14:52:48', '2020-07-24 14:52:48'),
(79, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 14:58:47', '2020-07-24 14:58:47'),
(80, 'Product updated', 'http://127.0.0.1:8000/updateprod/2?_method=PUT', 'PUT', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 16:23:35', '2020-07-24 16:23:35'),
(81, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 17:36:56', '2020-07-24 17:36:56'),
(82, 'Auction Approve created', 'http://127.0.0.1:8000/approve/48/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 17:41:13', '2020-07-24 17:41:13'),
(83, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-24 18:34:29', '2020-07-24 18:34:29'),
(84, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-25 03:09:05', '2020-07-25 03:09:05'),
(85, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-25 03:15:12', '2020-07-25 03:15:12'),
(86, 'Company created', 'http://127.0.0.1:8000/agreement', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-25 17:40:07', '2020-07-25 17:40:07'),
(87, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-26 09:49:09', '2020-07-26 09:49:09'),
(88, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-26 18:09:15', '2020-07-26 18:09:15'),
(89, 'Region created', 'http://127.0.0.1:8000/region', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-27 04:43:30', '2020-07-27 04:43:30'),
(90, 'Seller Account Created', 'http://127.0.0.1:8000/giveap/3', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-27 15:54:19', '2020-07-27 15:54:19'),
(91, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 2, '2020-07-27 17:01:19', '2020-07-27 17:01:19'),
(92, 'Seller Account Created', 'http://127.0.0.1:8000/give/4', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-27 19:55:39', '2020-07-27 19:55:39'),
(93, 'Auction Approve created', 'http://127.0.0.1:8000/approve/44/2', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-28 00:00:23', '2020-07-28 00:00:23'),
(94, 'New auction created', 'http://127.0.0.1:8000/auction', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-28 00:16:49', '2020-07-28 00:16:49'),
(95, 'Order created', 'http://127.0.0.1:8000/shipping2', 'POST', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-28 00:21:32', '2020-07-28 00:21:32'),
(96, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-30 05:44:27', '2020-07-30 05:44:27'),
(97, 'Seller Account Created', 'http://127.0.0.1:8000/give/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-30 06:31:34', '2020-07-30 06:31:34'),
(98, 'Auction Approve created', 'http://127.0.0.1:8000/approve/52/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-30 06:33:08', '2020-07-30 06:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_09_173907_create_transactions_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_03_25_110123_products', 1),
(6, '2020_03_25_110209_roles', 1),
(7, '2020_03_25_110302_pcategories', 1),
(8, '2020_03_25_110514_contact', 1),
(9, '2020_04_03_185517_create_log_activities_table', 1),
(10, '2020_04_12_145045_user_role', 1),
(11, '2020_04_27_092225_wish_list', 1),
(12, '2020_04_27_092405_carts', 1),
(13, '2020_04_28_151221_add_seller_id_and_photo_and_category_and_price_and_descrption_to_carts', 1),
(14, '2020_04_28_162905_add_name_to_carts', 1),
(15, '2020_05_18_204318_create_order_table', 1),
(16, '2020_05_18_204340_create_order_products_table', 1),
(17, '2020_05_25_093557_create_status_table', 1),
(18, '2020_06_13_215208_add_profile_to_users', 1),
(19, '2020_06_17_140622_create_region_table', 1),
(20, '2020_06_17_140745_create_company_table', 1),
(21, '2020_06_24_140117_create_country_table', 1),
(22, '2020_06_25_070028_create_package_table', 1),
(23, '2020_06_28_165104_create_status_order_products_table', 2),
(24, '2020_15_06_000000_create_pesapal_payments_table', 3),
(25, '2020_07_10_201103_create_odesc_table', 4),
(26, '2020_07_13_164156_create_auction_table', 5),
(27, '2020_07_13_164215_create_auction_user_table', 5),
(28, '2020_07_15_142717_create_bid_payment_table', 6),
(29, '2020_07_15_144438_create_aucon_table', 7),
(30, '2020_07_16_012313_create_oda_table', 8),
(31, '2020_07_16_012727_create_odaprod_table', 9),
(32, '2020_07_17_171547_create_aucfg_table', 10),
(33, '2020_07_18_103655_create_payau_table', 11),
(34, '2020_07_25_234513_create_feedback_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `odesc`
--

CREATE TABLE `odesc` (
  `id` bigint UNSIGNED NOT NULL,
  `order_products_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `odesc`
--

INSERT INTO `odesc` (`id`, `order_products_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 27, 'chumvi sana', '2020-07-10 17:40:39', '2020-07-10 17:40:39'),
(2, 28, 'sukari', '2020-07-10 17:54:45', '2020-07-10 17:54:45'),
(3, 29, 'sukari', '2020-07-10 17:54:46', '2020-07-10 17:54:46'),
(4, 30, 'sahani moja', '2020-07-11 06:30:31', '2020-07-11 06:30:31'),
(5, 31, 'chumvi', '2020-07-12 07:06:34', '2020-07-12 07:06:34'),
(6, 32, 'good', '2020-07-13 01:43:21', '2020-07-13 01:43:21'),
(7, 33, 'Kachumbari', '2020-07-13 14:18:02', '2020-07-13 14:18:02'),
(8, 34, 'black', '2020-07-15 21:20:29', '2020-07-15 21:20:29'),
(9, 39, 'chumvi', '2020-07-26 09:49:09', '2020-07-26 09:49:09'),
(10, 40, 'Black', '2020-07-26 18:09:15', '2020-07-26 18:09:15'),
(11, 41, 'black', '2020-07-27 17:01:19', '2020-07-27 17:01:19'),
(12, 42, 'chumvi', '2020-07-28 00:21:32', '2020-07-28 00:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `contact_id` bigint UNSIGNED NOT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `contact_id`, `total_price`, `created_at`, `updated_at`) VALUES
(12, 3, 4, '13500', '2020-07-09 13:17:58', '2020-07-09 13:17:58'),
(40, 2, 3, '5000', '2020-07-13 01:43:19', '2020-07-13 01:43:19'),
(41, 2, 3, '5000', '2020-07-13 14:18:00', '2020-07-13 14:18:00'),
(42, 2, 3, '35000', '2020-07-15 21:20:28', '2020-07-15 21:20:28'),
(46, 1, 1, '10000', '2020-07-25 03:09:03', '2020-07-25 03:09:03'),
(47, 1, 1, '3500', '2020-07-26 09:49:07', '2020-07-26 09:49:07'),
(48, 1, 2, '40000', '2020-07-26 18:09:13', '2020-07-26 18:09:13'),
(49, 2, 3, '40000', '2020-07-27 17:01:17', '2020-07-27 17:01:17'),
(50, 1, 1, '3500', '2020-07-28 00:21:30', '2020-07-28 00:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `products_id` bigint UNSIGNED NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payement_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `shipping` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'COD',
  `postal_code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `products_id`, `status_id`, `user_id`, `price`, `payement_id`, `quantity`, `discount`, `shipping`, `postal_code`, `created_at`, `updated_at`) VALUES
(32, 40, 4, 2, 1, '5000', 'tr_1H4JVcBJVKJhJqjqEyISGeKS', '1', '0.00', 'COD', NULL, '2020-07-13 01:43:21', '2020-07-21 17:21:33'),
(33, 41, 6, 1, 2, '5000', 'tr_1H4VHwBJVKJhJqjqGMBV7YVY', '1', '0.00', 'COD', NULL, '2020-07-13 14:18:01', '2020-07-13 14:18:01'),
(34, 42, 8, 5, 2, '35000', 'tr_1H5KpsBJVKJhJqjqqqKNAK8O', '1', '0.00', 'COD', NULL, '2020-07-15 21:20:29', '2020-07-25 19:47:08'),
(38, 46, 3, 1, 2, '10000', 'tr_1H8gZABJVKJhJqjqZlr59hgW', '1', '0.00', 'COD', NULL, '2020-07-25 03:09:04', '2020-07-25 03:09:04'),
(39, 47, 2, 1, 1, '3500', 'tr_1H99HsBJVKJhJqjqgTn8WMUv', '1', '0.00', 'COD', NULL, '2020-07-26 09:49:08', '2020-07-26 09:49:08'),
(40, 48, 1, 1, 1, '40000', 'tr_1H9H5pBJVKJhJqjqSs2G2D0Q', '1', '0.00', 'COD', NULL, '2020-07-26 18:09:14', '2020-07-26 18:09:14'),
(41, 49, 1, 1, 1, '40000', 'tr_1H9cVeBJVKJhJqjqz1vjuRxS', '1', '0.00', 'COD', '337YKUUV', '2020-07-27 17:01:18', '2020-07-28 00:58:45'),
(42, 50, 2, 2, 1, '3500', 'tr_1H9jNfBJVKJhJqjqjGwzmvYB', '1', '0.00', 'COD', '337YKUUV', '2020-07-28 00:21:31', '2020-07-28 00:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('christiangerald8@gmail.com', '$2y$10$oeN2odkbhMcwqSiRJ8FV/.tD0ZetNP7WnXe8ct8r9dN2soZ6eJZUm', '2020-06-27 07:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Electronics', '2020-06-25 05:49:59', '2020-06-25 05:49:59', NULL),
(2, 'Food', '2020-06-25 18:28:20', '2020-06-25 18:28:20', NULL),
(3, 'Beauty', '2020-07-03 15:28:25', '2020-07-03 15:28:25', NULL),
(4, 'Clothes', '2020-07-03 15:28:58', '2020-07-03 15:28:58', NULL),
(5, 'Bags', '2020-07-03 15:29:22', '2020-07-03 15:29:22', NULL),
(6, 'Stationery', '2020-07-03 15:33:56', '2020-07-03 15:33:56', NULL),
(7, 'Shoes', '2020-07-10 15:20:33', '2020-07-10 15:20:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `company_id`, `category_id`, `photo`, `name`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'cnUYjef1ImipARBFV6C4HEouG3gGe8DTFjj0DNNS.jpeg', 'Earpods', 40000.00, '<p><strong><span style=\"color: #e67e23;\">Good Sound</span></strong></p>', '1', '2020-06-25 06:33:19', '2020-06-25 06:33:19'),
(2, 1, 1, 2, 'n5IK1OMDEXPHEcGBCXJMgZnQowAfa2jPqjCjd3wB.png', 'Popcon', 3500.00, '<p>Tamu</p>', '1', '2020-06-25 18:30:39', '2020-07-24 16:23:35'),
(3, 2, 1, 1, 'KfOrRbweHfDv8dcU82mppONXvv07zAzUNEuHybw1.jpeg', 'Smart Watch', 10000.00, '<p><strong>Apple smart watch</strong></p>', '1', '2020-06-28 17:27:57', '2020-06-28 17:27:57'),
(4, 1, 2, 2, 'o87qILiRnHVWUkPcObgLfxtC45lkfzYeDalwZgBB.jpeg', 'Maini', 5000.00, '<p><strong>Maini Rost</strong></p>', '1', '2020-07-01 10:14:08', '2020-07-01 10:14:08'),
(5, 2, 2, 2, 'Zxy85JE5Xz3d9o5brSKogpXVC9tVEhe55WxVNcla.jpeg', 'Wali Nazi', 6000.00, '<p><span style=\"color: #f1c40f;\">Wali Mtamu sana</span></p>', '1', '2020-07-01 15:00:47', '2020-07-01 15:00:47'),
(6, 2, 2, 2, 'puDH9WqN4Pw3fQzw77177kBg2J8GqyODwf88YuxU.jpeg', 'Wali Kuku', 5000.00, '<p><span style=\"color: #e03e2d;\">Wali wa kuku wa kienyeji na kachumbari</span></p>', '1', '2020-07-01 15:32:15', '2020-07-01 15:32:15'),
(7, 4, 1, 7, 'fdmYOfcx7mHgILAgJdElKRvGYbOtDCSbsa6sL7aT.jpeg', 'Jordan', 35000.00, '<p><strong>Size 39-42<strong>Ni viatu vya ngozi ni imara sana</strong></p>', '2', '2020-07-10 15:23:19', '2020-07-10 15:23:19'),
(8, 1, 2, 5, 'YoEIqkvXBGEuUKXZkr3aBJFD5I4Ii7OD4h1mSYCN.jpeg', 'Backpack', 35000.00, '<p>Nice Bag</p>', '1', '2020-07-13 15:57:23', '2020-07-24 16:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `ship_price`, `created_at`, `updated_at`) VALUES
(1, 'Morogoro', 'FREE', '2020-06-25 06:58:12', '2020-06-25 06:58:12'),
(2, 'Dar es Salaam', '6000', '2020-06-25 07:00:12', '2020-06-25 07:00:12'),
(3, 'Mwanza', '10000', '2020-06-26 18:51:13', '2020-06-26 18:51:13'),
(4, 'Tanga', '7000', '2020-06-26 23:24:00', '2020-06-26 23:24:00'),
(5, 'Kilimanjaro', '10000', '2020-06-27 04:39:34', '2020-06-27 04:39:34'),
(6, 'Pwani', '6000', '2020-06-27 05:14:11', '2020-06-27 05:14:11'),
(7, 'Lindi', '12000', '2020-07-10 09:08:38', '2020-07-10 09:08:38'),
(8, 'Mbeya', '7000', '2020-07-18 22:07:08', '2020-07-18 22:07:08'),
(9, 'Manyara', '8000', '2020-07-19 18:03:39', '2020-07-19 18:03:39'),
(10, 'Dodoma', '7000', '2020-07-19 18:10:23', '2020-07-19 18:10:23'),
(11, 'Kigoma', '150000', '2020-07-19 18:32:29', '2020-07-19 18:32:29'),
(12, 'Iringa', '6000', '2020-07-19 18:39:13', '2020-07-19 18:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2020-06-25 08:47:07', '2020-06-04 15:36:05', NULL),
(2, 'Seller', '2020-06-25 05:48:40', '2020-06-25 05:48:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'Received', '0', '2020-06-06 06:48:12', '2020-06-04 15:36:05'),
(2, 'Order confirmed', '25', NULL, NULL),
(3, 'Picked by courier', '50', '2020-06-06 06:48:12', '2020-06-04 15:36:05'),
(4, 'On the way', '75', '2020-06-26 17:54:14', '2020-06-04 15:29:28'),
(5, 'Ready for pickup', '100', '2020-06-06 06:48:12', '2020-06-04 15:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `photo`) VALUES
(1, 'Roman Calist', 'admin@admin.com', NULL, '$2y$10$Dwpmm3v/yua.6hrl/3Hg9OJJzfHUFs/3HOZilLd3t.BSQImNNrxW2', NULL, '2020-06-25 05:45:47', '2020-07-15 14:27:22', NULL, NULL, 'hjPZwV4GyHe4hqqt33GKrbhSHfHqVc42bI3LQJtF.jpeg'),
(2, 'James Gutta', 'rcalist3@gmail.com', NULL, '$2y$10$VGaJFMMsGcadRxIsIGIFw.V/Eg2tb8myCIrfNAZpqHojSRpOC6pFK', 'W5hkcG33jG3V1T1eOMQwSYatlDA6ent80VO4xYdXfnyRwbzWwARzMSR1Tusd', '2020-06-26 18:16:42', '2020-07-10 05:15:07', NULL, NULL, 'gutta.jpeg'),
(3, 'Steven Aminiel', 'christiangerald8@gmail.com', NULL, '$2y$10$gR0eDiOdS4h84XkkmvDlqeCNdzRJaT4Nr9IhhOKd8ZjlSoPn3ri2e', NULL, '2020-06-27 07:31:00', '2020-07-27 16:50:48', NULL, NULL, 'avatar.png'),
(4, 'Jasmine Peter', 'rroshac@gmail.com', NULL, '$2y$10$jJQd876JgDld4xbV99TrgOjI0lNMnD7B/G2WsEv07rq7JW/PPJdu.', NULL, '2020-07-03 05:31:22', '2020-07-03 05:31:22', NULL, NULL, 'avatar.png'),
(5, 'Erick Mgongo', 'erickemmanuel661@gmail.com', NULL, '$2y$10$jWIIjp3r7da8LVXhb/zREeUb5S/635cr7L43549gA8E5KPIhepQbm', NULL, '2020-07-27 16:15:27', '2020-07-27 16:15:27', NULL, NULL, 'avatar.png'),
(6, 'John', 'wwee@gmail.com', NULL, '$2y$10$L5km8W9OvFDS4GLI.U/ROuXN32KhBoSTopLiNyBqLCVtK.qW5e08q', NULL, '2020-07-30 06:05:04', '2020-07-30 06:05:04', NULL, NULL, 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company` (`company_id`),
  ADD KEY `catego` (`category_id`);

--
-- Indexes for table `auction_user`
--
ALTER TABLE `auction_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_user_auction_id_foreign` (`auction_id`) USING BTREE,
  ADD KEY `auction_user_user_id_foreign` (`user_id`),
  ADD KEY `auction_user_saler_id_foreign` (`saler_id`);

--
-- Indexes for table `bid_payment`
--
ALTER TABLE `bid_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_payment_user_id_foreign` (`user_id`),
  ADD KEY `bid_payment_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_order_products_id_foreign` (`order_product_id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odesc`
--
ALTER TABLE `odesc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`),
  ADD KEY `order_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_user_id_foreign` (`user_id`),
  ADD KEY `order_products_status_id_foreign` (`status_id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_products_id_foreign` (`products_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `auction_user`
--
ALTER TABLE `auction_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bid_payment`
--
ALTER TABLE `bid_payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `odesc`
--
ALTER TABLE `odesc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `catego` FOREIGN KEY (`category_id`) REFERENCES `pcategories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `auction_user`
--
ALTER TABLE `auction_user`
  ADD CONSTRAINT `auction_user_saler_id_foreign` FOREIGN KEY (`saler_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid_payment`
--
ALTER TABLE `bid_payment`
  ADD CONSTRAINT `bid_payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
