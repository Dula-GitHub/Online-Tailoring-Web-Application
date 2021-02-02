-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 11:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinetailorapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Blouse', 'blouse.jpg', NULL, NULL, NULL),
(2, 'Shirt', 'shirt.jpg', NULL, NULL, NULL),
(3, 'Skirt', 'half circle skirt.jpg', NULL, NULL, NULL),
(4, 'Frock', 'frock.jpg', NULL, NULL, NULL),
(5, 'Trouser', 'trouser.jpg', NULL, NULL, NULL),
(6, 'Jacket/ Coat/ Blaze', 'Coat.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_level`
--

CREATE TABLE `inventory_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` decimal(9,2) NOT NULL,
  `inventory_level` bigint(20) UNSIGNED DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `unit_price`, `inventory_level`, `stock`, `image_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cotton Silk', '1300.00', NULL, '0', 'cotton_silk.jpg', NULL, NULL, NULL),
(2, 'Viscose', '400.00', NULL, '0', 'Viscose.jpg', NULL, NULL, NULL),
(3, 'Cotton Printed', '600.00', NULL, '0', 'Cotton Printed.jpg', NULL, NULL, NULL),
(4, 'Crepe Chiffon', '500.00', NULL, '0', 'crepe_chiffon.jpg', NULL, NULL, NULL),
(5, 'Chiffon Printed', '600.00', NULL, '0', 'chiffon_printed.jpg', NULL, NULL, NULL),
(6, 'Chinese Popline 36\"', '140.00', NULL, '0', 'Chinese_Popline.jpeg', NULL, NULL, NULL),
(7, 'Cotton Shirting 58\"', '1500.00', NULL, '0', 'cotton_shirting.jpg', NULL, NULL, NULL),
(8, 'Printed Linen 60\"', '1750.00', NULL, '0', 'printed_linen.jpg', NULL, NULL, NULL),
(9, 'Superfine Linen 36\"', '1800.00', NULL, '0', 'superfine_linen.jpg', NULL, NULL, NULL),
(10, 'Pure Linen 60\"', '2750.00', NULL, '0', 'Pure Linen.jpg', NULL, NULL, NULL),
(11, 'Mid Blue Cotton 58\"', '1950.00', NULL, '0', 'Mid Blue Cotton.jpg', NULL, NULL, NULL),
(12, 'Brocade 44\"', '1500.00', NULL, '0', 'Brocade.jpg', NULL, NULL, NULL),
(13, 'German Crepe 45\"', '800.00', NULL, '0', 'crepe.jpg', NULL, NULL, NULL),
(14, 'Lame 45\"', '800.00', NULL, '0', 'lame.jpg', NULL, NULL, NULL),
(15, 'Stripe Rib Spandex', '700.00', NULL, '0', 'Stripe Rib Spandex.jpg', NULL, NULL, NULL),
(16, 'Poly Span Jersey Knit Thick Ribbed Rib', '1600.00', NULL, '0', 'rib.jpg', NULL, NULL, NULL),
(17, 'HANDLOOM RAW COTTON', '1300.00', NULL, '0', 'handloom_yellow.jpg', NULL, NULL, NULL),
(18, 'CHIFFON EMBROIDERED', '2950.00', NULL, '0', 'chiffon_Embroidered_.jpg', NULL, NULL, NULL),
(19, 'Navy Blue Wool & Cashmere Blend 59\"', '750.00', NULL, '0', 'Navy Blue Wool & Cashmere Blend.webp', NULL, NULL, NULL),
(20, 'Cotton Cavalry Twill Fabric', '750.00', NULL, '0', 'Cotton Cavalry Twill Fabric.jpg', NULL, NULL, NULL),
(21, 'Hugo Boss Italy', '1900.00', NULL, '0', 'Hugo Boss Italy- silk material.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials_sub_category`
--

CREATE TABLE `materials_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials_sub_category`
--

INSERT INTO `materials_sub_category` (`id`, `sub_category_id`, `material_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 3, 2, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 4, 6, NULL, NULL),
(11, 4, 7, NULL, NULL),
(12, 4, 8, NULL, NULL),
(13, 4, 9, NULL, NULL),
(14, 4, 10, NULL, NULL),
(15, 4, 11, NULL, NULL),
(16, 5, 6, NULL, NULL),
(17, 5, 7, NULL, NULL),
(18, 5, 8, NULL, NULL),
(19, 5, 9, NULL, NULL),
(20, 5, 10, NULL, NULL),
(21, 5, 11, NULL, NULL),
(22, 6, 12, NULL, NULL),
(23, 6, 13, NULL, NULL),
(24, 6, 14, NULL, NULL),
(25, 6, 15, NULL, NULL),
(26, 6, 16, NULL, NULL),
(27, 7, 12, NULL, NULL),
(28, 7, 13, NULL, NULL),
(29, 7, 14, NULL, NULL),
(30, 7, 15, NULL, NULL),
(31, 7, 16, NULL, NULL),
(32, 8, 4, NULL, NULL),
(33, 8, 5, NULL, NULL),
(34, 9, 4, NULL, NULL),
(35, 9, 5, NULL, NULL),
(36, 10, 4, NULL, NULL),
(37, 10, 5, NULL, NULL),
(38, 11, 1, NULL, NULL),
(39, 11, 2, NULL, NULL),
(40, 11, 3, NULL, NULL),
(41, 12, 1, NULL, NULL),
(42, 12, 2, NULL, NULL),
(43, 12, 3, NULL, NULL),
(44, 13, 17, NULL, NULL),
(45, 13, 18, NULL, NULL),
(46, 14, 12, NULL, NULL),
(47, 14, 13, NULL, NULL),
(48, 14, 14, NULL, NULL),
(49, 14, 15, NULL, NULL),
(50, 14, 16, NULL, NULL),
(51, 15, 19, NULL, NULL),
(52, 15, 20, NULL, NULL),
(53, 15, 21, NULL, NULL),
(54, 16, 19, NULL, NULL),
(55, 16, 20, NULL, NULL),
(56, 16, 21, NULL, NULL),
(57, 17, 19, NULL, NULL),
(58, 17, 20, NULL, NULL),
(59, 17, 21, NULL, NULL),
(60, 18, 19, NULL, NULL),
(61, 18, 20, NULL, NULL),
(62, 18, 21, NULL, NULL),
(63, 19, 19, NULL, NULL),
(64, 19, 20, NULL, NULL),
(65, 19, 21, NULL, NULL),
(66, 20, 19, NULL, NULL),
(67, 20, 20, NULL, NULL),
(68, 20, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neck girth', 'neck_girth', NULL, NULL, NULL),
(2, 'Chest girth', 'chest_girth', NULL, NULL, NULL),
(3, 'Waist girth', 'waist_girth', NULL, NULL, NULL),
(4, 'Hip girth', 'hip_girth', NULL, NULL, NULL),
(5, 'Bicep girth', 'bicep_girth', NULL, NULL, NULL),
(6, 'First Forearm girth', 'first_forearm_girth', NULL, NULL, NULL),
(7, 'Wrist girth', 'wrist_girth', NULL, NULL, NULL),
(8, 'Shoulder slope length', 'shoulder_slope_length', NULL, NULL, NULL),
(9, 'Sleeve length', 'sleeve_length', NULL, NULL, NULL),
(10, 'Breast height', 'breast_height', NULL, NULL, NULL),
(11, 'Shirt length', 'shirt_length', NULL, NULL, NULL),
(12, 'Length to the hip (front)', 'length_to_the_hip', NULL, NULL, NULL),
(13, 'Shoulder length', 'shoulder_length', NULL, NULL, NULL),
(14, 'Waist Circumference', 'waist_circumference', NULL, NULL, NULL),
(15, 'Upper Hip Circumference', 'upper_hip_circumference', NULL, NULL, NULL),
(16, 'Lower Hip Circumference', 'lower_hip_circumference', NULL, NULL, NULL),
(17, 'Waist to Lower Hip', 'waist_to_lower_hip', NULL, NULL, NULL),
(18, 'Skirt Length', 'skirt_length', NULL, NULL, NULL),
(19, 'Shoulder to Waist', 'shoulder_to_waist', NULL, NULL, NULL),
(20, 'Upper Bust', 'upper_bust', NULL, NULL, NULL),
(21, 'Bust', 'bust', NULL, NULL, NULL),
(22, 'Under Bust', 'under_bust', NULL, NULL, NULL),
(23, 'Shoulder to Apex', 'shoulder_to_apex', NULL, NULL, NULL),
(24, 'Upper Arm', 'upper_arm', NULL, NULL, NULL),
(25, 'Apex to Apex', 'apex_to_apex', NULL, NULL, NULL),
(26, 'Sleeve Circumference', 'sleeve_circumference', NULL, NULL, NULL),
(27, 'Bust Circumference', 'bust_circumference', NULL, NULL, NULL),
(28, 'Bodice length', 'bodice_length', NULL, NULL, NULL),
(29, 'Back width', 'back_width', NULL, NULL, NULL),
(30, 'Armpit girth', 'armpit_girth', NULL, NULL, NULL),
(31, 'Hip Circumference', 'hip_circumference', NULL, NULL, NULL),
(32, 'Neckline Circumference', 'neckline_circumference', NULL, NULL, NULL),
(33, 'Armhole Circumference', 'armhole_circumference', NULL, NULL, NULL),
(34, 'Shoulder Width', 'shoulder_width', NULL, NULL, NULL),
(35, 'Bust Height', 'bust_height', NULL, NULL, NULL),
(36, 'Tunic Front Length', 'tunic_front_length', NULL, NULL, NULL),
(37, 'Tunic Back Length', 'tunic_back_length', NULL, NULL, NULL),
(38, 'Neckline Drop', 'neckline_drop', NULL, NULL, NULL),
(39, 'Collar', 'collar', NULL, NULL, NULL),
(40, 'Chest', 'chest', NULL, NULL, NULL),
(41, 'Shirt Waist', 'shirt_waist', NULL, NULL, NULL),
(42, 'Hip', 'hip', NULL, NULL, NULL),
(43, 'Bicep', 'bicep', NULL, NULL, NULL),
(44, 'Cuff', 'cuff', NULL, NULL, NULL),
(45, 'Yoke', 'yoke', NULL, NULL, NULL),
(46, 'Back Length', 'back_length', NULL, NULL, NULL),
(47, 'Waist', 'waist', NULL, NULL, NULL),
(48, 'Pants out seam', 'pants_out_seam', NULL, NULL, NULL),
(49, 'Inseam', 'inseam', NULL, NULL, NULL),
(50, 'Thigh', 'thigh', NULL, NULL, NULL),
(51, 'Knee', 'knee', NULL, NULL, NULL),
(52, 'Bottom', 'bottom', NULL, NULL, NULL),
(53, 'Crotch', 'crotch', NULL, NULL, NULL),
(54, 'Jacket waist', 'jacket_waist', NULL, NULL, NULL),
(55, 'Front Length', 'front_length', NULL, NULL, NULL),
(56, 'Shoulder', 'shoulder', NULL, NULL, NULL),
(57, 'Around the neck', 'around_the_neck', NULL, NULL, NULL);

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
(4, '2020_07_16_172550_update_user_table', 1),
(5, '2020_07_25_074352_add_role_to_users_table', 1),
(6, '2020_07_27_104426_create_categories_table', 2),
(7, '2020_07_27_104533_create_sub_categories_table', 3),
(8, '2020_07_29_053533_create_measurements_table', 4),
(9, '2020_07_29_053546_create_sub_category_measurements_table', 5),
(10, '2020_07_30_054401_create_materials_table', 6),
(11, '2020_07_30_054410_create_materials_sub_category_table', 7),
(12, '2020_07_31_081729_create_orders_table', 8),
(13, '2020_08_05_044320_add_columns_to_orders_table', 9),
(14, '2020_09_13_150757_update_order_table', 10),
(15, '2020_10_01_163629_add_length_column_to_sub_categories', 11),
(16, '2020_10_10_152503_add_margin_measurement_column_to_subcategories_table', 12),
(17, '2020_10_10_161053_add_deleted_at_column_to_sub_categories', 13),
(18, '2020_10_10_161058_add_deleted_at_column_to_categories', 14),
(19, '2020_10_10_175412_add_design_image_to_orders_table', 15),
(20, '2020_10_10_180311_change_fields_to_nullable', 16),
(21, '2020_11_09_163943_create_inventory_level_table', 17),
(22, '2020_11_09_164453_add_column_inventory_level_to_materials', 18),
(23, '2020_12_05_162513_add_deleted_at_column_to_materials', 19),
(24, '2020_12_17_130445_add_deleted_at_column_to_measurements', 20),
(25, '2020_12_29_020154_add_measurements_coulmn_to_orders', 21),
(26, '2021_01_11_133022_change_measurements_field_to_nullable', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_of_cloth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_date` date NOT NULL,
  `cost` decimal(9,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_amount` decimal(9,2) NOT NULL DEFAULT 0.00,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `design_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurements` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `category_id`, `sub_category_id`, `material_id`, `amount_of_cloth`, `requested_date`, `cost`, `status`, `paid_amount`, `payment_status`, `design_image`, `measurements`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 2, NULL, '2021-01-18', NULL, 'pending', '0.00', 'PENDING', '1610795638.png', NULL, '2021-01-16 05:43:58', '2021-01-16 05:43:58'),
(2, 1, NULL, NULL, 0, NULL, '2021-01-20', NULL, 'pending', '0.00', 'PENDING', '1610864762.png', NULL, '2021-01-17 00:56:02', '2021-01-17 00:56:02'),
(3, 1, NULL, NULL, 13, NULL, '2021-01-19', NULL, 'pending', '0.00', 'PENDING', '1610867150.png', NULL, '2021-01-17 01:35:50', '2021-01-17 01:35:50'),
(4, 1, NULL, NULL, 0, NULL, '2021-01-19', NULL, 'pending', '0.00', 'PENDING', '1610869270.png', NULL, '2021-01-17 02:11:10', '2021-01-17 02:11:10'),
(5, 1, NULL, NULL, NULL, NULL, '2021-01-19', NULL, 'pending', '0.00', 'PENDING', '1610869554.png', NULL, '2021-01-17 02:15:54', '2021-01-17 02:15:54'),
(6, 1, NULL, NULL, 3, NULL, '2021-01-18', NULL, 'pending', '0.00', 'PENDING', '1610871064.png', NULL, '2021-01-17 02:41:04', '2021-01-17 02:41:04');

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
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `tailor_cost` decimal(9,2) NOT NULL,
  `amount_of_cloth` decimal(9,2) NOT NULL,
  `length_for_cost` int(11) NOT NULL DEFAULT 10,
  `margin_measurement` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `tailor_cost`, `amount_of_cloth`, `length_for_cost`, `margin_measurement`, `image_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sleeveless Blouse', 1, '400.00', '1.00', 10, 1, 'Sleeveless Blouse.jpg', NULL, NULL, NULL),
(2, 'Short Sleeve Blouse', 1, '550.00', '1.50', 10, 1, 'Short Sleeve Blouse.jpg', NULL, NULL, NULL),
(3, 'Long Sleeve Blouse', 1, '500.00', '2.00', 10, 1, 'Wester top.JPG', NULL, NULL, NULL),
(4, 'Short Sleeve Shirt', 2, '550.00', '2.00', 10, 1, 'short sleeve shirt.jpg', NULL, NULL, NULL),
(5, 'Long Sleeve Shirt', 2, '650.00', '2.50', 10, 1, 'shirt.jpg', NULL, NULL, NULL),
(6, 'Half Circle Skirt', 3, '500.00', '1.50', 10, 1, 'half circle skirt.jpg', NULL, NULL, NULL),
(7, 'Tight Skirt', 3, '350.00', '1.00', 10, 1, 'tight skirt.JPG', NULL, NULL, NULL),
(8, 'Dress with Gathers', 4, '800.00', '3.00', 10, 1, 'Dress with gathers.JPG', NULL, NULL, NULL),
(9, 'Line Dress', 4, '850.00', '3.00', 10, 1, 'A line dress.JPG', NULL, NULL, NULL),
(10, 'Princess Line Dresss', 4, '900.00', '3.50', 10, 1, 'Princess line dress.JPG', NULL, NULL, NULL),
(11, 'Sleevelsess Peplum top', 1, '550.00', '2.00', 10, 1, 'sleeveless peplum top.JPG', NULL, NULL, NULL),
(12, 'Peplum top', 1, '600.00', '2.50', 10, 1, 'Peplum top with sleeve.JPG', NULL, NULL, NULL),
(13, 'Tunics, tops, kurta', 1, '800.00', '2.50', 10, 1, 'Kurta top.JPG', NULL, NULL, NULL),
(14, 'Gathered Skirt', 3, '600.00', '3.00', 10, 1, 'gathered skirt.JPG', NULL, NULL, NULL),
(15, 'Trouser', 5, '1500.00', '2.00', 10, 1, 'trouser.jpg', NULL, NULL, NULL),
(16, 'Short Trouser', 5, '1500.00', '1.50', 10, 1, 'short trouser.jpg', NULL, NULL, NULL),
(17, 'Boss By Hugo Boss Brown Wool Blend Blaze', 6, '29500.00', '4.00', 10, 1, 'Coat -Boss By Hugo Boss Brown Wool Blend Blaze.JPG', NULL, NULL, NULL),
(18, 'Boss By Hugo Boss Vintage Brown Wool Tailored Rossellini', 6, '22000.00', '4.00', 10, 1, 'Coat -Boss By Hugo Boss Vintage Brown Wool Tailored Rossellini.JPG', NULL, NULL, NULL),
(19, 'Single-breasted regular-fit cotton-blend coat', 6, '63000.00', '4.00', 10, 1, 'Coat-Single-breasted regular-fit cotton-blend coat.JPG', NULL, NULL, NULL),
(20, 'Raye Slim-Fit Unstructured Wool, Linen and Silk-Blend Blazer', 6, '100000.00', '4.00', 10, 1, 'Coat- Raye Slim-Fit Unstructured Wool, Linen and Silk-Blend Blazer.JPG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_measurements`
--

CREATE TABLE `sub_category_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `measurement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_measurements`
--

INSERT INTO `sub_category_measurements` (`id`, `sub_category_id`, `measurement_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 8, NULL, NULL),
(6, 1, 10, NULL, NULL),
(7, 1, 11, NULL, NULL),
(8, 1, 12, NULL, NULL),
(9, 1, 13, NULL, NULL),
(10, 2, 1, NULL, NULL),
(11, 2, 2, NULL, NULL),
(12, 2, 3, NULL, NULL),
(13, 2, 4, NULL, NULL),
(14, 2, 5, NULL, NULL),
(15, 2, 8, NULL, NULL),
(16, 2, 9, NULL, NULL),
(17, 2, 10, NULL, NULL),
(18, 2, 11, NULL, NULL),
(19, 2, 12, NULL, NULL),
(20, 2, 13, NULL, NULL),
(21, 3, 1, NULL, NULL),
(22, 3, 2, NULL, NULL),
(23, 3, 3, NULL, NULL),
(24, 3, 4, NULL, NULL),
(25, 3, 5, NULL, NULL),
(26, 3, 6, NULL, NULL),
(27, 3, 7, NULL, NULL),
(28, 3, 8, NULL, NULL),
(29, 3, 9, NULL, NULL),
(30, 3, 10, NULL, NULL),
(31, 3, 11, NULL, NULL),
(32, 3, 12, NULL, NULL),
(33, 3, 13, NULL, NULL),
(34, 4, 39, NULL, NULL),
(35, 4, 40, NULL, NULL),
(36, 4, 41, NULL, NULL),
(37, 4, 42, NULL, NULL),
(38, 4, 9, NULL, NULL),
(39, 4, 43, NULL, NULL),
(40, 4, 45, NULL, NULL),
(41, 4, 46, NULL, NULL),
(42, 5, 39, NULL, NULL),
(43, 5, 40, NULL, NULL),
(44, 5, 41, NULL, NULL),
(45, 5, 42, NULL, NULL),
(46, 5, 9, NULL, NULL),
(47, 5, 43, NULL, NULL),
(48, 5, 44, NULL, NULL),
(49, 5, 45, NULL, NULL),
(50, 5, 46, NULL, NULL),
(51, 6, 14, NULL, NULL),
(52, 6, 15, NULL, NULL),
(53, 6, 16, NULL, NULL),
(54, 6, 17, NULL, NULL),
(55, 6, 18, NULL, NULL),
(56, 7, 14, NULL, NULL),
(57, 7, 15, NULL, NULL),
(58, 7, 16, NULL, NULL),
(59, 7, 17, NULL, NULL),
(60, 7, 18, NULL, NULL),
(61, 8, 19, NULL, NULL),
(62, 8, 20, NULL, NULL),
(63, 8, 21, NULL, NULL),
(64, 8, 22, NULL, NULL),
(65, 8, 14, NULL, NULL),
(66, 8, 15, NULL, NULL),
(67, 8, 16, NULL, NULL),
(68, 8, 18, NULL, NULL),
(69, 8, 23, NULL, NULL),
(70, 8, 24, NULL, NULL),
(71, 8, 25, NULL, NULL),
(72, 9, 19, NULL, NULL),
(73, 9, 20, NULL, NULL),
(74, 9, 21, NULL, NULL),
(75, 9, 22, NULL, NULL),
(76, 9, 14, NULL, NULL),
(77, 9, 15, NULL, NULL),
(78, 9, 16, NULL, NULL),
(79, 9, 18, NULL, NULL),
(80, 9, 23, NULL, NULL),
(81, 9, 24, NULL, NULL),
(82, 9, 25, NULL, NULL),
(83, 9, 9, NULL, NULL),
(84, 9, 26, NULL, NULL),
(85, 10, 19, NULL, NULL),
(86, 10, 20, NULL, NULL),
(87, 10, 21, NULL, NULL),
(88, 10, 22, NULL, NULL),
(89, 10, 14, NULL, NULL),
(90, 10, 15, NULL, NULL),
(91, 10, 16, NULL, NULL),
(92, 10, 18, NULL, NULL),
(93, 10, 23, NULL, NULL),
(94, 10, 24, NULL, NULL),
(95, 10, 25, NULL, NULL),
(96, 10, 9, NULL, NULL),
(97, 10, 26, NULL, NULL),
(98, 11, 27, NULL, NULL),
(99, 11, 14, NULL, NULL),
(100, 11, 28, NULL, NULL),
(101, 11, 10, NULL, NULL),
(102, 11, 8, NULL, NULL),
(103, 11, 13, NULL, NULL),
(104, 11, 29, NULL, NULL),
(105, 11, 30, NULL, NULL),
(106, 12, 27, NULL, NULL),
(107, 12, 14, NULL, NULL),
(108, 12, 28, NULL, NULL),
(109, 12, 10, NULL, NULL),
(110, 12, 8, NULL, NULL),
(111, 12, 13, NULL, NULL),
(112, 12, 29, NULL, NULL),
(113, 12, 30, NULL, NULL),
(114, 12, 9, NULL, NULL),
(115, 12, 5, NULL, NULL),
(116, 12, 7, NULL, NULL),
(117, 13, 27, NULL, NULL),
(118, 13, 14, NULL, NULL),
(119, 13, 31, NULL, NULL),
(120, 13, 32, NULL, NULL),
(121, 13, 33, NULL, NULL),
(122, 13, 34, NULL, NULL),
(123, 13, 35, NULL, NULL),
(124, 13, 36, NULL, NULL),
(125, 13, 37, NULL, NULL),
(126, 13, 38, NULL, NULL),
(127, 13, 9, NULL, NULL),
(128, 13, 5, NULL, NULL),
(129, 13, 7, NULL, NULL),
(130, 14, 14, NULL, NULL),
(131, 14, 16, NULL, NULL),
(132, 14, 18, NULL, NULL),
(133, 15, 47, NULL, NULL),
(134, 15, 42, NULL, NULL),
(135, 15, 48, NULL, NULL),
(136, 15, 49, NULL, NULL),
(137, 15, 50, NULL, NULL),
(138, 15, 51, NULL, NULL),
(139, 15, 52, NULL, NULL),
(140, 15, 53, NULL, NULL),
(141, 16, 47, NULL, NULL),
(142, 16, 42, NULL, NULL),
(143, 16, 48, NULL, NULL),
(144, 16, 49, NULL, NULL),
(145, 16, 50, NULL, NULL),
(146, 16, 51, NULL, NULL),
(147, 16, 53, NULL, NULL),
(148, 17, 40, NULL, NULL),
(149, 17, 54, NULL, NULL),
(150, 17, 42, NULL, NULL),
(151, 17, 55, NULL, NULL),
(152, 17, 46, NULL, NULL),
(153, 17, 56, NULL, NULL),
(154, 17, 43, NULL, NULL),
(155, 17, 9, NULL, NULL),
(156, 17, 44, NULL, NULL),
(157, 17, 29, NULL, NULL),
(158, 17, 57, NULL, NULL),
(159, 18, 40, NULL, NULL),
(160, 18, 54, NULL, NULL),
(161, 18, 42, NULL, NULL),
(162, 18, 55, NULL, NULL),
(163, 18, 46, NULL, NULL),
(164, 18, 56, NULL, NULL),
(165, 18, 43, NULL, NULL),
(166, 18, 9, NULL, NULL),
(167, 18, 44, NULL, NULL),
(168, 18, 29, NULL, NULL),
(169, 18, 57, NULL, NULL),
(170, 19, 40, NULL, NULL),
(171, 19, 54, NULL, NULL),
(172, 19, 42, NULL, NULL),
(173, 19, 55, NULL, NULL),
(174, 19, 46, NULL, NULL),
(175, 19, 56, NULL, NULL),
(176, 19, 43, NULL, NULL),
(177, 19, 9, NULL, NULL),
(178, 19, 44, NULL, NULL),
(179, 19, 29, NULL, NULL),
(180, 19, 57, NULL, NULL),
(181, 20, 40, NULL, NULL),
(182, 20, 54, NULL, NULL),
(183, 20, 42, NULL, NULL),
(184, 20, 55, NULL, NULL),
(185, 20, 46, NULL, NULL),
(186, 20, 56, NULL, NULL),
(187, 20, 43, NULL, NULL),
(188, 20, 9, NULL, NULL),
(189, 20, 44, NULL, NULL),
(190, 20, 29, NULL, NULL),
(191, 20, 57, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_name`, `user_role`, `address`, `contact_number`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tharini', 'Dulanjalee', 'tharinitailor@gmail.com', 'Dulanjalee', 'admin', 'No:160/K Kimbulapitiya Negombo', '0777130996', 0, NULL, '$2y$10$sz6oe/UZOS4T6DH2hWu2kOAOped0WmWlunTfzf1XryRXf9nbCCpYW', NULL, '2021-01-11 08:14:32', '2021-01-11 08:14:32');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_level`
--
ALTER TABLE `inventory_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_inventory_level_foreign` (`inventory_level`);

--
-- Indexes for table `materials_sub_category`
--
ALTER TABLE `materials_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_sub_category_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `materials_sub_category_material_id_foreign` (`material_id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_category_id_foreign` (`category_id`),
  ADD KEY `orders_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `orders_material_id_foreign` (`material_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_margin_measurement_foreign` (`margin_measurement`);

--
-- Indexes for table `sub_category_measurements`
--
ALTER TABLE `sub_category_measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_measurements_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `sub_category_measurements_measurement_id_foreign` (`measurement_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_level`
--
ALTER TABLE `inventory_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `materials_sub_category`
--
ALTER TABLE `materials_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_category_measurements`
--
ALTER TABLE `sub_category_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_inventory_level_foreign` FOREIGN KEY (`inventory_level`) REFERENCES `inventory_level` (`id`);

--
-- Constraints for table `materials_sub_category`
--
ALTER TABLE `materials_sub_category`
  ADD CONSTRAINT `materials_sub_category_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `materials_sub_category_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `orders_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `orders_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sub_categories_margin_measurement_foreign` FOREIGN KEY (`margin_measurement`) REFERENCES `measurements` (`id`);

--
-- Constraints for table `sub_category_measurements`
--
ALTER TABLE `sub_category_measurements`
  ADD CONSTRAINT `sub_category_measurements_measurement_id_foreign` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`),
  ADD CONSTRAINT `sub_category_measurements_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
