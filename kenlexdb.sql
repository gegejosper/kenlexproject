-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 04:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenlexdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofpickup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargotype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `companyname`, `contactnum`, `origin`, `destination`, `weight`, `dateofpickup`, `cargotype`, `details`, `status`, `created_at`, `updated_at`) VALUES
(9, 'gege gege', 'gegejosper.gasb@gmail.com', 'gege', '+639985518079', 'Ozamis', 'Aurora', '19', '2018-09-09', '20FT Container Size', 'dsadsa', 1, '2018-05-27 08:31:50', '2018-05-28 07:01:32'),
(10, 'gege gege', 'gegejosper.gasb@gmail.com', 'gege', '+639985518079', 'Ozamis', 'Aurora', '12', '2018-09-09', '20FT Container Size', 'dsadas', 1, '2018-05-27 08:33:51', '2018-05-29 21:41:49'),
(11, 'gege gege', 'gegejosper.gasb@gmail.com', 'gege', '+639985518079', 'Ozamis', 'Aurora', '10', '2018-09-09', '20FT Container Size', 'dsadasdas', 0, '2018-05-29 06:16:18', '2018-05-29 06:16:18'),
(12, 'gege gege', 'gegejosper.gasb@gmail.com', 'gege', '+639985518079', 'Ozamis', 'Aurora', '10', '2018-10-10', '20FT Container Size', 'sample 2', 1, '2018-05-30 02:23:30', '2018-06-08 06:25:13'),
(13, 'rr', 'r@gmail.com', 'gbc', '+639985518079', 'Ozamis', 'Aurora', '15', '2018-09-09', 'Bulk Cargo', 'adasdas', 1, '2018-06-19 05:49:10', '2018-06-19 06:36:23'),
(14, 'Gegejosper Ceniza', 'r@gmail.com', 'easyway', '09985518079', 'Pagadian', 'Aurora', '10', '2018-09-09', '20FT Container Size', 'dasdasdas', 0, '2018-06-21 05:53:30', '2018-06-21 05:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `boxids`
--

CREATE TABLE `boxids` (
  `id` int(10) UNSIGNED NOT NULL,
  `boxid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealerid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boxids`
--

INSERT INTO `boxids` (`id`, `boxid`, `branchid`, `dealerid`, `status`, `created_at`, `updated_at`) VALUES
(1, '12111', '4', '1', '0', '2018-09-17 22:02:15', '2018-09-17 22:02:15'),
(2, '12111', '4', '2', '0', '2018-09-17 22:02:32', '2018-09-17 22:02:32'),
(3, '109000', '4', '10', '0', '2018-09-17 22:16:28', '2018-09-17 22:16:28'),
(4, '1090222', '4', '10', '0', '2018-09-17 22:16:28', '2018-09-17 22:16:28'),
(5, '12221', '4', '11', '0', '2018-09-17 22:20:58', '2018-09-17 22:20:58'),
(6, '1222112222', '4', '12', '0', '2018-09-17 22:21:34', '2018-09-17 22:21:34'),
(7, '2awa', '4', '22', '0', '2018-09-17 22:59:53', '2018-09-17 22:59:53'),
(8, '1222', '4', '10', '0', '2018-09-18 00:49:47', '2018-09-18 00:49:47'),
(9, '3333', '4', '10', '0', '2018-09-18 00:49:47', '2018-09-18 00:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Aurora', NULL, '2018-05-30 14:37:11', '2018-03-11 03:13:10'),
(5, 'Ipil', NULL, '2018-07-25 08:00:52', '2018-07-25 08:00:52'),
(6, 'Pagadian', NULL, '2018-08-10 05:54:38', '2018-08-10 05:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `branchusers`
--

CREATE TABLE `branchusers` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchusers`
--

INSERT INTO `branchusers` (`id`, `branch_id`, `userid`, `created_at`, `updated_at`) VALUES
(1, 4, 32, '2018-08-08 21:23:36', '2018-08-08 21:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sky Direct', NULL, '2018-01-21 19:11:30', '2018-07-10 16:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodquantityid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `requestId` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashierorders`
--

CREATE TABLE `cashierorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cashier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Sky Direct Products', NULL, '2018-05-09 02:38:34', '2018-07-10 16:01:21'),
(3, 'Sky Direct Load Card', NULL, '2018-08-09 07:15:09', '2018-08-09 07:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `boxId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `userId`, `boxId`, `fname`, `lname`, `mname`, `address`, `email`, `contactnum`, `branchid`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '09090', 'Gege', 'gege', NULL, 'dsadasdas', 'gegejosper@gmail.com', '090900', 4, '', NULL, '2018-09-13 21:23:51', '2018-09-13 21:23:51'),
(2, NULL, '2111', '2121', '2121', NULL, 'dsadasda', '21212', '09985518079', 4, '0', NULL, '2018-09-13 21:25:20', '2018-09-13 21:25:20'),
(3, NULL, '2121', 'dsasdads', 'dssaa', NULL, 'asssss', 'gegejosper.gasb@gmail.com', '211111', NULL, '0', NULL, '2018-09-17 01:13:26', '2018-09-17 01:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `custoorders`
--

CREATE TABLE `custoorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `fname`, `lname`, `mname`, `address`, `email`, `password`, `status`, `branchid`, `created_at`, `updated_at`, `contactnum`) VALUES
(10, 'gege', 'gege', '', 'none, none', 'gegejosper@gmail.com', NULL, '0', '4', '2018-09-17 22:16:28', '2018-09-17 22:16:28', '+639985518079'),
(11, 'gege', 'gege', '', 'none, none', 'chiga_alcalde@yahoo.com', NULL, '0', '4', '2018-09-17 22:20:58', '2018-09-17 22:20:58', '+639985518079'),
(12, 'gege', 'gege', '', 'none, none', 'chiga_alcalde@yahoo.com', NULL, '0', '4', '2018-09-17 22:21:34', '2018-09-17 22:21:34', '+639985518079'),
(13, 'gege', 'gege', '', 'none, none', 'chiga_alcalde@yahoo.com', NULL, '0', '4', '2018-09-17 22:35:45', '2018-09-17 22:35:45', '+639985518079'),
(14, 'gege', 'gege', '', 'none, none', 'chiga_alcalde@yahoo.com', NULL, '0', '4', '2018-09-17 22:36:30', '2018-09-17 22:36:30', '+639985518079'),
(15, 'gege', 'geges', '', 'nonae, none', 'chiga_alcalde@yahoo.com', NULL, '0', '4', '2018-09-17 22:38:45', '2018-09-17 22:38:45', '+639985518079a'),
(16, 'dsa', 'dasd', '', 'sdaasd', 'dsa', NULL, '0', '4', '2018-09-17 22:40:05', '2018-09-17 22:40:05', 'dasdas'),
(17, '2', 's', '', 's', 's', NULL, '0', '4', '2018-09-17 22:40:55', '2018-09-17 22:40:55', 's'),
(18, 'dsa', 'dsad', '', 'dsadsa', 'dasd', NULL, '0', '4', '2018-09-17 22:57:31', '2018-09-17 22:57:31', 'dsadsa'),
(19, 'dsa', 'dsad', '', 'dsadsa', 'dasd', NULL, '0', '4', '2018-09-17 22:57:52', '2018-09-17 22:57:52', 'dsadsa'),
(20, 'dsa', 'dsad', '', 'dsadsa', 'dasd', NULL, '0', '4', '2018-09-17 22:58:53', '2018-09-17 22:58:53', 'dsadsa'),
(21, 'ss', 's', '', 's', 's', NULL, '0', '4', '2018-09-17 22:59:17', '2018-09-17 22:59:17', 's'),
(22, 'gege', 'gege', '', 'none, none', 'admin@gmail.com', NULL, '0', '4', '2018-09-17 22:59:53', '2018-09-17 22:59:53', '09985518079');

-- --------------------------------------------------------

--
-- Table structure for table `dealerspackageorders`
--

CREATE TABLE `dealerspackageorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordernumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packageid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealerid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boxid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packageprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealerspackageorders`
--

INSERT INTO `dealerspackageorders` (`id`, `ordernumber`, `packageid`, `dealerid`, `boxid`, `branchid`, `packageprice`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '2', '10', '109000', '4', '700', '0', '2018-09-17 22:16:28', '2018-09-17 22:16:28'),
(2, NULL, '2', '10', '1090222', '4', '700', '0', '2018-09-17 22:16:28', '2018-09-17 22:16:28'),
(3, NULL, '2', '11', '12221', '4', '700', '0', '2018-09-17 22:20:58', '2018-09-17 22:20:58'),
(4, NULL, '2', '12', '1222112222', '4', '700', '0', '2018-09-17 22:21:34', '2018-09-17 22:21:34'),
(5, 'YLZE7I3CY7', '2', '22', '2awa', '4', '700', '0', '2018-09-17 22:59:53', '2018-09-17 22:59:53'),
(6, 'IN4X07JGOI', '3', '10', '1222', '4', '800', '0', '2018-09-18 00:49:47', '2018-09-18 00:49:47'),
(7, 'IN4X07JGOI', '3', '10', '3333', '4', '800', '0', '2018-09-18 00:49:47', '2018-09-18 00:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `distributionrecords`
--

CREATE TABLE `distributionrecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `distributionnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievequantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributionrecords`
--

INSERT INTO `distributionrecords` (`id`, `distributionnumber`, `branchid`, `productid`, `quantity`, `recievequantity`, `status`, `date`, `created_at`, `updated_at`) VALUES
(2, 'DR-04', '4', '12', '10', '10', '2', '08/20/2018', '2018-08-20 07:03:46', '2018-09-14 06:07:50'),
(3, 'DR-04', '4', '11', '10', '10', '2', '08/20/2018', '2018-08-20 07:03:52', '2018-09-14 06:07:55'),
(4, 'DR-05', '4', '11', '5', '6', '2', '08/21/2018', '2018-08-21 08:23:37', '2018-09-14 06:07:06'),
(5, 'DR-06', '4', '13', '10', '10', '2', '08/21/2018', '2018-08-21 09:05:26', '2018-09-09 17:05:40'),
(6, 'DR-05', '4', '14', '10', '7', '2', '08/21/2018', '2018-08-21 09:22:24', '2018-09-14 06:07:10'),
(7, 'DR-05', '4', '11', '1', '2', '2', '08/21/2018', '2018-08-21 09:26:09', '2018-09-14 06:07:17'),
(8, 'DR-05', '4', '12', '2', '6', '2', '08/21/2018', '2018-08-21 09:26:13', '2018-09-14 06:07:20'),
(9, 'DR-05', '4', '14', '5', '5', '2', '08/21/2018', '2018-08-21 09:26:22', '2018-09-14 06:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `distributionnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `distributionnumber`, `branchid`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'DR-01', '4', '0', '08/20/2018', '2018-08-20 06:26:38', '2018-08-20 06:26:38'),
(2, 'DR-02', '4', '0', '08/20/2018', '2018-08-20 06:27:46', '2018-08-20 06:27:46'),
(3, 'DR-03', '4', '0', '08/20/2018', '2018-08-20 06:28:00', '2018-08-20 06:28:00'),
(4, 'DR-04', '4', '2', '08/20/2018', '2018-08-20 06:28:27', '2018-09-14 06:07:56'),
(5, 'DR-05', '4', '2', '08/21/2018', '2018-08-21 08:23:33', '2018-09-14 06:07:26'),
(6, 'DR-06', '4', '2', '08/21/2018', '2018-08-21 09:05:20', '2018-09-09 17:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `itembalances`
--

CREATE TABLE `itembalances` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unittype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(15, '2018_01_18_160417_create_categories_table', 2),
(16, '2018_01_18_160544_create_suppliers_table', 2),
(17, '2018_01_18_160558_create_brands_table', 2),
(18, '2018_01_18_160609_create_branchs_table', 2),
(19, '2018_01_18_160638_create_tags_table', 2),
(20, '2018_01_18_161337_create_items_table', 2),
(21, '2018_01_18_161354_create_requests_table', 2),
(23, '2018_01_18_161441_create_customers_table', 2),
(24, '2018_01_18_161519_create_customer_orders_table', 2),
(25, '2018_01_18_162425_create_item_balances_table', 2),
(26, '2018_01_18_162811_create_request_orders_table', 2),
(27, '2018_01_18_163332_create_order_items_table', 2),
(28, '2014_01_07_073615_create_tagged_table', 3),
(29, '2014_01_07_073615_create_tags_table', 3),
(30, '2016_06_29_073615_create_tag_groups_table', 3),
(31, '2016_06_29_073615_update_tags_table', 3),
(32, '2018_03_10_135411_create_product_table', 4),
(33, '2018_03_10_135650_create_product_quantities_table', 4),
(35, '2018_03_13_080222_create_cart_table', 5),
(36, '2018_03_15_071713_create_reservation_table', 5),
(37, '2018_03_16_051912_create_reservations_table', 6),
(38, '2018_03_16_093051_create_purchaserecord_table', 7),
(39, '2018_03_18_180012_create_cashierorder_table', 8),
(42, '2018_03_11_152907_create_purchase_table', 9),
(43, '2018_01_18_161405_create_orders_table', 10),
(44, '2018_05_26_044802_create_bookings_table', 11),
(45, '2018_05_28_134630_create_transports_table', 12),
(48, '2018_06_27_135404_create_purchaserequests_table', 13),
(49, '2018_08_09_162929_create_packages_table', 14),
(50, '2018_08_09_165808_create_packageitems_table', 15),
(51, '2018_08_10_174244_create_packagebranch_table', 16),
(52, '2018_08_10_174513_create_packagebranchs_table', 17),
(53, '2018_08_10_174602_create_packagebranches_table', 18),
(54, '2018_08_20_050155_create_distribution_table', 19),
(55, '2018_08_20_050213_create_distributionrecord_table', 19),
(56, '2018_09_13_154354_create_packageorder_table', 20),
(57, '2018_09_17_142749_create_dealer_table', 21),
(58, '2018_09_18_023623_create_boxid_table', 22),
(59, '2018_09_18_054926_create_dealerpackageorder_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `req_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `orderId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cashier_id`, `orderId`, `itemId`, `ramount`, `rquantity`, `created_at`, `updated_at`) VALUES
(1, 26, '7NB7W3QTWO', '15', '1500', '1', '2018-06-21 05:01:52', '2018-06-21 05:01:52'),
(2, 26, 'J7QIDP2JPS', '14', '4000', '4', '2018-06-21 05:42:15', '2018-06-21 05:42:15'),
(3, 26, 'J7QIDP2JPS', '15', '3000', '2', '2018-06-21 05:42:15', '2018-06-21 05:42:15'),
(4, 26, 'J7QIDP2JPS', '16', '9000', '6', '2018-06-21 05:42:15', '2018-06-21 05:42:15'),
(5, 26, 'J7QIDP2JPS', '17', '3000', '3', '2018-06-21 05:42:15', '2018-06-21 05:42:15'),
(6, 32, 'CL1GILQRDZ', '4', '10', '1', '2018-09-10 18:42:46', '2018-09-10 18:42:46'),
(7, 32, 'DAP53S4JSV', '3', '100', '1', '2018-09-10 20:00:40', '2018-09-10 20:00:40'),
(8, 32, 'QXMBPMBPLT', '3', '100', '1', '2018-09-10 20:01:05', '2018-09-10 20:01:05'),
(9, 32, 'BGCHIQBTVP', '3', '100', '1', '2018-09-10 20:01:20', '2018-09-10 20:01:20'),
(10, 32, 'V3XKFIRPMC', '3', '100', '1', '2018-09-10 20:01:50', '2018-09-10 20:01:50'),
(11, 32, 'V1KQOZVQXF', '4', '10', '1', '2018-09-10 20:05:07', '2018-09-10 20:05:07'),
(12, 32, 'YIQUQMM2RO', '4', '10', '1', '2018-09-10 23:02:39', '2018-09-10 23:02:39'),
(13, 32, 'P7GVMCE4F3', '4', '50', '5', '2018-09-17 01:04:14', '2018-09-17 01:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `packagebranches`
--

CREATE TABLE `packagebranches` (
  `id` int(10) UNSIGNED NOT NULL,
  `packageid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealersprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packagebranches`
--

INSERT INTO `packagebranches` (`id`, `packageid`, `branchid`, `price`, `dealersprice`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '2000', '1800', '2018-08-10 10:00:57', '2018-09-17 07:03:08'),
(2, '2', '4', '1000', '700', '2018-08-10 10:01:56', '2018-09-17 06:51:16'),
(3, '1', '5', '0', NULL, '2018-08-10 10:05:01', '2018-08-10 10:05:01'),
(4, '2', '5', '0', NULL, '2018-08-10 10:05:02', '2018-08-10 10:05:02'),
(5, '1', '6', '0', NULL, '2018-09-10 18:53:03', '2018-09-10 18:53:03'),
(6, '2', '6', '0', NULL, '2018-09-10 18:53:05', '2018-09-10 18:53:05'),
(9, '3', '4', '1000', '800', '2018-09-17 07:14:14', '2018-09-17 18:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `packageitems`
--

CREATE TABLE `packageitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `packageid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packageitems`
--

INSERT INTO `packageitems` (`id`, `packageid`, `productid`, `created_at`, `updated_at`) VALUES
(3, '1', '11', '2018-08-09 09:36:44', '2018-08-09 09:36:44'),
(4, '1', '12', '2018-08-09 09:37:44', '2018-08-09 09:37:44'),
(5, '1', '13', '2018-08-09 09:37:48', '2018-08-09 09:37:48'),
(6, '2', '13', '2018-08-09 09:40:30', '2018-08-09 09:40:30'),
(7, '2', '12', '2018-08-09 09:40:33', '2018-08-09 09:40:33'),
(8, '2', '14', '2018-08-09 09:40:41', '2018-08-09 09:40:41'),
(12, '3', '11', '2018-09-17 07:14:02', '2018-09-17 07:14:02'),
(13, '3', '12', '2018-09-17 07:14:04', '2018-09-17 07:14:04'),
(14, '3', '13', '2018-09-17 07:14:07', '2018-09-17 07:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `packageorders`
--

CREATE TABLE `packageorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `packageid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boxid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packageprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packageorders`
--

INSERT INTO `packageorders` (`id`, `packageid`, `customerid`, `boxid`, `branchid`, `packageprice`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '09090', '4', '2000', '0', '2018-09-13 21:23:51', '2018-09-13 21:23:51'),
(2, '1', '2', '2111', '4', '2000', '0', '2018-09-13 21:25:20', '2018-09-13 21:25:20'),
(3, '1', '3', '2121', '4', '2000', '0', '2018-09-17 01:13:26', '2018-09-17 01:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `packagename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packageprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `packagename`, `description`, `packageprice`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in Price Complete Set With Installation', 'Walk-in Price Complete Set With Installation', '1200', '2018-08-09 08:39:32', '2018-08-09 08:56:48'),
(2, 'Walk-in Price Complete Set Without Installation', 'Walk-in Price Complete Set Without Installation', '1000', '2018-08-09 08:40:43', '2018-08-09 08:40:43'),
(3, 'Box Only', 'Box Only', '1200', '2018-09-17 06:43:05', '2018-09-17 06:43:05');

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
('gegejosper@gmail.com', '$2y$10$oB52nFHcdIQKW1P/i74k3eFOzCbMVOQWU6fJrdXeF8OJc/./qnwPa', '2018-03-19 07:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `productquantities`
--

CREATE TABLE `productquantities` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(11) NOT NULL,
  `var_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priceoption` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `lenght` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productquantities`
--

INSERT INTO `productquantities` (`id`, `prod_id`, `var_name`, `brand_id`, `supplier_id`, `branch_id`, `category_id`, `price`, `saleprice`, `priceoption`, `description`, `quantity`, `lenght`, `width`, `height`, `weight`, `color`, `unit`, `pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 11, NULL, NULL, NULL, 4, NULL, '10', NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:47:17', '2018-09-18 00:49:47'),
(3, 12, NULL, NULL, NULL, 4, NULL, '100', NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:50', '2018-09-18 00:49:47'),
(4, 13, NULL, NULL, NULL, 4, NULL, '10', NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:52', '2018-09-18 00:49:47'),
(5, 14, NULL, NULL, NULL, 4, NULL, '100', NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:54', '2018-09-17 22:59:53'),
(6, 15, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:56', '2018-08-10 08:48:56'),
(7, 16, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:57', '2018-08-10 08:48:57'),
(8, 17, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:58', '2018-08-10 08:48:58'),
(9, 18, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:48:59', '2018-08-10 08:48:59'),
(10, 19, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:01', '2018-08-10 08:49:01'),
(11, 20, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:02', '2018-08-10 08:49:02'),
(12, 21, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:03', '2018-08-10 08:49:03'),
(13, 22, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:04', '2018-08-10 08:49:04'),
(14, 23, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:06', '2018-08-10 08:49:06'),
(15, 24, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:08', '2018-08-10 08:49:08'),
(16, 25, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:49:09', '2018-08-10 08:49:09'),
(17, 11, NULL, NULL, NULL, 5, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:50:13', '2018-08-10 08:50:13'),
(18, 12, NULL, NULL, NULL, 5, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:50:15', '2018-08-10 08:50:15'),
(19, 11, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:20', '2018-08-10 08:51:20'),
(20, 12, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:21', '2018-08-10 08:51:21'),
(21, 14, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:22', '2018-08-10 08:51:22'),
(22, 16, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:23', '2018-08-10 08:51:23'),
(23, 15, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:25', '2018-08-10 08:51:25'),
(24, 13, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:27', '2018-08-10 08:51:27'),
(25, 20, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:28', '2018-08-10 08:51:28'),
(26, 21, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:30', '2018-08-10 08:51:30'),
(27, 17, NULL, NULL, NULL, 6, NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-10 08:51:31', '2018-08-10 08:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehousequantity` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pic`, `product_name`, `description`, `brand_id`, `category_id`, `warehousequantity`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, '1532533579.jpg', 'Sky Cable Box', 'sky', '1', '2', 14, NULL, '2018-07-25 07:46:19', '2018-08-30 01:02:35'),
(12, '1532533620.jpg', 'Sky Direct Wire', 'dsadsada', '1', '2', 8, NULL, '2018-07-25 07:47:00', '2018-08-21 09:26:13'),
(13, '1533827549.jpg', 'Sky Direct Odu Set', 'Sky Direct', '1', '2', 15, NULL, '2018-08-09 07:12:29', '2018-08-30 01:02:42'),
(14, '1533827575.jpg', 'Sky Direct Connectors', 'Sky Direct', '1', '2', 40, NULL, '2018-08-09 07:12:55', '2018-08-21 09:26:22'),
(15, '1533827597.jpg', 'Sky Direct Dish', 'Sky Direct', '1', '2', 10, NULL, '2018-08-09 07:13:17', '2018-08-17 01:38:32'),
(16, '1533827625.jpg', 'Sky Direct LNB', 'Sky Direct LNB', '1', '2', 10, NULL, '2018-08-09 07:13:45', '2018-08-17 01:38:36'),
(17, '1533827663.jpg', 'Sky Direct Remote', 'Sky Direct', '1', '2', 50, NULL, '2018-08-09 07:14:23', '2018-08-09 07:14:23'),
(18, '1533828334.png', 'Sky Direct Load 99', 'Sky Direct Load 99', '1', '3', 50, NULL, '2018-08-09 07:25:34', '2018-08-09 07:25:34'),
(19, '1533828348.png', 'Sky Direct Load 99 Pin', 'Sky Direct Load 99 Pin', '1', '2', 50, NULL, '2018-08-09 07:25:48', '2018-08-09 07:25:48'),
(20, '1533828373.png', 'Sky Direct Load 150', 'Sky Direct Load 150', '1', '3', 50, NULL, '2018-08-09 07:26:13', '2018-08-09 07:26:13'),
(21, '1533828391.png', 'Sky Direct Load 150 Pin', 'Sky Direct Load 150 Pin', '1', '3', 50, NULL, '2018-08-09 07:26:31', '2018-08-09 07:26:31'),
(22, '1533828407.png', 'Sky Direct Load 250 Pin', 'Sky Direct Load 250 Pin', '1', '2', 50, NULL, '2018-08-09 07:26:47', '2018-08-09 07:26:47'),
(23, '1533828420.png', 'Sky Direct Load 250', 'Sky Direct Load 250 Pin', '1', '3', 50, NULL, '2018-08-09 07:27:00', '2018-08-09 07:27:00'),
(24, '1533828437.png', 'Sky Direct Load 450 Pin', 'Sky Direct Load 450 Pin', '1', '3', 50, NULL, '2018-08-09 07:27:17', '2018-08-09 07:27:17'),
(25, '1533828449.png', 'Sky Direct Load 450', 'Sky Direct Load 450', '1', '2', 50, NULL, '2018-08-09 07:27:29', '2018-08-09 07:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchaserecords`
--

CREATE TABLE `purchaserecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchasenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievequantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodquantityid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `recievedate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaserecords`
--

INSERT INTO `purchaserecords` (`id`, `purchasenumber`, `date`, `quantity`, `recievequantity`, `price`, `prodquantityid`, `status`, `recievedate`, `created_at`, `updated_at`) VALUES
(13, 'PR-01', '08/14/2018', '10', '10', NULL, 11, 2, '08/14/2018', '2018-08-14 08:00:57', '2018-08-14 09:19:32'),
(14, 'PR-01', '08/14/2018', '13', '10', NULL, 13, 2, '08/14/2018', '2018-08-14 08:03:06', '2018-08-14 09:19:38'),
(15, 'PR-01', '08/14/2018', '25', '25', NULL, 14, 2, '08/14/2018', '2018-08-14 08:04:41', '2018-08-14 09:19:43'),
(16, 'PR-076', '08/17/2018', '15', '10', NULL, 12, 2, '08/17/2018', '2018-08-17 01:37:36', '2018-08-17 01:38:28'),
(17, 'PR-076', '08/17/2018', '15', '10', NULL, 15, 2, '08/17/2018', '2018-08-17 01:37:40', '2018-08-17 01:38:32'),
(18, 'PR-076', '08/17/2018', '15', '10', NULL, 16, 2, '08/17/2018', '2018-08-17 01:37:43', '2018-08-17 01:38:36'),
(19, 'PR-082', '08/30/2018', '10', '5', NULL, 11, 2, '08/30/2018', '2018-08-30 01:01:22', '2018-08-30 01:02:35'),
(20, 'PR-082', '08/30/2018', '10', '5', NULL, 13, 2, '08/30/2018', '2018-08-30 01:01:39', '2018-08-30 01:02:42'),
(21, 'PR-083', '09/09/2018', '15', NULL, NULL, 12, 1, NULL, '2018-09-09 15:19:27', '2018-09-09 15:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchaserequests`
--

CREATE TABLE `purchaserequests` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchasenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaserequests`
--

INSERT INTO `purchaserequests` (`id`, `purchasenumber`, `status`, `date`, `created_at`, `updated_at`) VALUES
(75, 'PR-01', '0', '08/14/2018', '2018-08-14 07:59:49', '2018-08-14 07:59:49'),
(76, 'PR-076', '2', '08/17/2018', '2018-08-17 01:37:27', '2018-08-17 01:45:37'),
(77, 'PR-077', '0', '08/17/2018', '2018-08-17 01:48:03', '2018-08-17 01:48:03'),
(78, 'PR-078', '0', '08/17/2018', '2018-08-17 01:48:19', '2018-08-17 01:48:19'),
(79, 'PR-079', '0', '08/17/2018', '2018-08-17 01:48:42', '2018-08-17 01:48:42'),
(80, 'PR-080', '0', '08/17/2018', '2018-08-17 01:57:25', '2018-08-17 01:57:25'),
(81, 'PR-081', '0', '08/20/2018', '2018-08-19 20:51:03', '2018-08-19 20:51:03'),
(82, 'PR-082', '2', '08/30/2018', '2018-08-30 01:00:16', '2018-08-30 01:02:45'),
(83, 'PR-083', '0', '09/09/2018', '2018-09-09 15:19:18', '2018-09-09 15:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amountpaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `amount`, `amountpaid`, `change`, `cashier_id`, `orderNumber`, `date`, `created_at`, `updated_at`) VALUES
(1, '1500', '1500', '0', '26', '7NB7W3QTWO', '2018-06-21', '2018-06-21 05:01:52', '2018-06-21 05:01:52'),
(2, '1500', '1500', '0', '26', 'EV5GSQGJM3', '2018-06-21', '2018-06-21 05:02:50', '2018-06-21 05:02:50'),
(3, '1500', '1500', '0', '26', 'GATVKI0HOV', '2018-06-21', '2018-06-21 05:03:06', '2018-06-21 05:03:06'),
(4, '1500', '1500', '0', '26', 'RTDGFKUC9D', '2018-06-21', '2018-06-21 05:03:15', '2018-06-21 05:03:15'),
(5, '1500', '1500', '0', '26', '6NVY1PTWIO', '2018-06-21', '2018-06-21 05:03:24', '2018-06-21 05:03:24'),
(6, '1500', '1500', '0', '26', 'HXAUCMP3J1', '2018-06-21', '2018-06-21 05:03:30', '2018-06-21 05:03:30'),
(7, '19000', '19000', '0', '26', 'J7QIDP2JPS', '2018-06-21', '2018-06-21 05:42:15', '2018-06-21 05:42:15'),
(8, '10', '50', '40', '32', 'CL1GILQRDZ', '2018-09-11', '2018-09-10 18:42:46', '2018-09-10 18:42:46'),
(9, '10', '50', '40', '32', 'Q0G1DMVICL', '2018-09-11', '2018-09-10 18:43:30', '2018-09-10 18:43:30'),
(10, '100', '500', '400', '32', 'DAP53S4JSV', '2018-09-11', '2018-09-10 20:00:40', '2018-09-10 20:00:40'),
(11, '100', '500', '400', '32', 'QXMBPMBPLT', '2018-09-11', '2018-09-10 20:01:05', '2018-09-10 20:01:05'),
(12, '100', '100', '0', '32', 'BGCHIQBTVP', '2018-09-11', '2018-09-10 20:01:20', '2018-09-10 20:01:20'),
(13, '100', '500', '400', '32', 'V3XKFIRPMC', '2018-09-11', '2018-09-10 20:01:50', '2018-09-10 20:01:50'),
(14, '10', '100', '90', '32', 'V1KQOZVQXF', '2018-09-11', '2018-09-10 20:05:07', '2018-09-10 20:05:07'),
(15, '10', '100', '90', '32', 'YIQUQMM2RO', '2018-09-11', '2018-09-10 23:02:39', '2018-09-10 23:02:39'),
(16, '50', '50', '0', '32', 'P7GVMCE4F3', '2018-09-17', '2018-09-17 01:04:14', '2018-09-17 01:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `reqorders`
--

CREATE TABLE `reqorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `req_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rquantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reqorders`
--

INSERT INTO `reqorders` (`id`, `req_id`, `item_id`, `rquantity`, `ramount`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'GFDP9HOCUC', '15', '1', '1500', '2', NULL, '2018-06-18 05:17:15', '2018-06-21 04:38:56'),
(5, 'JLXJFOOWMP', '14', '4', '4000', '1', NULL, '2018-06-21 05:37:22', '2018-06-21 05:41:22'),
(6, 'JLXJFOOWMP', '15', '2', '3000', '1', NULL, '2018-06-21 05:37:27', '2018-06-21 05:41:25'),
(7, 'JLXJFOOWMP', '16', '6', '9000', '1', NULL, '2018-06-21 05:37:31', '2018-06-21 05:41:28'),
(8, 'JLXJFOOWMP', '17', '3', '3000', '1', NULL, '2018-06-21 05:37:36', '2018-06-21 05:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `requestId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservestatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `requestId`, `userId`, `message`, `reservestatus`, `created_at`, `updated_at`) VALUES
(1, 'GFDP9HOCUC', 27, 'sadasdas', '1', '2018-06-18 05:55:22', '2018-06-21 04:38:55'),
(3, 'JLXJFOOWMP', 27, 'test', '1', '2018-06-21 05:37:46', '2018-06-21 05:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sky Direct', 'Manila', NULL, '2018-01-21 19:11:26', '2018-07-10 16:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tagged`
--

INSERT INTO `tagging_tagged` (`id`, `taggable_id`, `taggable_type`, `tag_name`, `tag_slug`) VALUES
(12, 14, 'App\\Productquantity', 'Spray', 'spray'),
(13, 14, 'App\\Productquantity', 'Paint', 'paint'),
(14, 14, 'App\\Productquantity', 'Rubberpaint', 'rubberpaint'),
(15, 15, 'App\\Productquantity', 'Spray', 'spray'),
(16, 15, 'App\\Productquantity', 'Paint', 'paint'),
(17, 15, 'App\\Productquantity', 'Rubber', 'rubber'),
(18, 16, 'App\\Productquantity', 'Spray', 'spray'),
(19, 16, 'App\\Productquantity', 'Paint', 'paint'),
(20, 16, 'App\\Productquantity', 'Rubberrize', 'rubberrize'),
(21, 17, 'App\\Productquantity', 'Spray', 'spray'),
(22, 17, 'App\\Productquantity', 'Paint', 'paint'),
(23, 18, 'App\\Productquantity', 'Tagg', 'tagg'),
(24, 18, 'App\\Productquantity', 'Saa', 'saa'),
(25, 18, 'App\\Productquantity', 'Sa', 'sa');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tags`
--

INSERT INTO `tagging_tags` (`id`, `tag_group_id`, `slug`, `name`, `suggest`, `count`) VALUES
(11, NULL, 'spray', 'Spray', 0, 4),
(12, NULL, 'paint', 'Paint', 0, 4),
(13, NULL, 'rubberpaint', 'Rubberpaint', 0, 1),
(14, NULL, 'rubber', 'Rubber', 0, 1),
(15, NULL, 'rubberrize', 'Rubberrize', 0, 1),
(16, NULL, 'tagg', 'Tagg', 0, 1),
(17, NULL, 'saa', 'Saa', 0, 1),
(18, NULL, 'sa', 'Sa', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookingId` int(11) NOT NULL,
  `qouterate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qoutdesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `email`, `bookingId`, `qouterate`, `qoutdesc`, `status`, `created_at`, `updated_at`) VALUES
(14, 'gegejosper.gasb@gmail.com', 12, '15000', 'ddsss', 1, '2018-06-08 06:25:13', '2018-06-19 07:03:09'),
(15, 'r@gmail.com', 13, '1500', 'dsadsdas', 3, '2018-06-19 06:36:23', '2018-06-19 07:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `contactnum`, `company`, `profilepic`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'qqqaMiracle Auer', 'qqqapdickens@hotmail.com', '$2y$10$FArFw2M.dQBcsP4XAQ8a5.vYsfZHLp8S/6.1ZSaVGHaxuSKiYogbe', 'cashier', NULL, NULL, '', NULL, '2018-01-21 19:30:20', '2018-01-21 21:56:19'),
(8, 'Abdul Russel', 'xsawayn@stroman.org', '$2y$10$ocszoy6Xs2GJI5Dq9I.9G.aBBQ6N1NAOY1byIDEPdIKt72Uqw9t2q', 'admin', NULL, NULL, '', NULL, '2018-01-21 19:30:20', '2018-01-21 19:30:20'),
(9, 'Jeffrey Rice', 'daugherty.grace@johnson.com', '$2y$10$dMHHZn64l.I1W0zZKWfgpeln5/9XPa/Nax3dViwtFkgoFfXsiOoDS', 'admin', NULL, NULL, '', NULL, '2018-01-21 19:30:20', '2018-01-21 19:30:20'),
(10, 'Demetrius Hoeger', 'dboyer@yahoo.com', '$2y$10$oBjhifSZl/xEAUceaPE1IuadzeGI2gMs39sRYmUINm37MAxfgVhBG', 'cashier', NULL, NULL, '', 'AhiKrLJ2F3AkLn7E9iYXhUf0jAAR32p1eY2Xc1gBWmdwQ0oMSvrwMIOQI3AZ', '2018-01-21 19:30:20', '2018-01-21 19:30:20'),
(11, 'Arlo Wilkinson', 'osbaldo.bednar@skiles.biz', '$2y$10$y0jUS3oBiBz3Jj7.bnNvcep92gBxhjq7NvodMYNghQzC./KEMJlJO', 'admin', NULL, NULL, '', NULL, '2018-01-21 19:30:20', '2018-01-21 19:30:20'),
(13, 'Linnie Wintheiser', 'pres@hotmail.com', '$2y$10$1RWfyLRGUMTkrFwpKMkBVeiFASjNC/v7.LHe6j84f8Nczehna5CXm', 'cashier', NULL, NULL, '', NULL, '2018-01-21 19:30:20', '2018-01-21 19:30:20'),
(14, 'Catherine Hintz', 'g@gmail.com', '$2y$10$/VwCYIKritdZyBlEJ1jsOOnxUwDj1qFanjtLCAsZlUJkKkk1D0bpW', 'customer', NULL, NULL, '', NULL, '2018-01-21 19:30:21', '2018-01-21 19:30:21'),
(15, 'Reyes Jenkins', 'wellington04@hotmail.com', '$2y$10$vVMOMrBas1hla7emI6bnJeF6XbuRyhbASa55gecXlc2g7NUhhD44i', 'customer', NULL, NULL, '', NULL, '2018-01-21 19:30:21', '2018-01-21 19:30:21'),
(19, 'Arne Crooks II', 'kkunde@yahoo.com', '$2y$10$th7oF0T0zyXMzvd49G4QjuOmspo34D7dIlwT7gu/60twvhQ9SRxnu', 'admin', NULL, NULL, '', NULL, '2018-01-21 19:30:21', '2018-01-21 19:30:21'),
(20, 'Margot Price', 'breanna31@smitham.com', '$2y$10$gVAPssNMV0PU6r6D..tXx.99m6OcBpicXG5LJgbxmhI.Xy3nbZ7p6', 'admin', NULL, NULL, '', NULL, '2018-01-21 19:30:21', '2018-01-21 19:30:21'),
(21, 'Gege', 'gegejosper@gmail.com', '$2y$10$CcMDgpcyfEhZhcrzEMgkGO7asknQ.dqxFjipDPFUSAMQw6ZjqCmIa', 'admin', NULL, NULL, '', 'E4kdv80Yse947fRmCdsWo5Z7Iv8ShuWijWnGfdAbR47kpOunoCHU6JEqBHyn', '2018-01-22 05:52:13', '2018-01-22 05:52:13'),
(23, 'regg', 'q@gmail.com', '$2y$10$PZ9c5poq4.QCChE1e9vOd.bm1FF2s4qVGsjmxEwh.RmvwiW3HLCta', 'cashier', NULL, NULL, '', 'lKCBnqE92xPrNSatsqWaH75OosVfjq2hSg7h8ahjqjrg12ZAuPkyREDMR52a', '2018-03-11 09:23:03', '2018-03-11 09:23:03'),
(24, 'Gegejosper', 'gggg@gmail.com', '$2y$10$1RWfyLRGUMTkrFwpKMkBVeiFASjNC/v7.LHe6j84f8Nczehna5CXm', 'customer', NULL, NULL, '', 'Z7mSfqjpXWtdbSoqwkPeVR9oK0QKKh2LoO5fAEakveNCnkvOiZZpkNwfvV3E', '2018-03-15 00:00:39', '2018-03-15 00:00:39'),
(25, 'reg', 'reg@gmail.com', '$2y$10$U2ORqKmCp7iia4RvJInd5u9qdMPUd3Z9rumlYIOywLo8msj17uiuK', 'customer', NULL, NULL, '', 'EMrTG40qUGJ3A86tmBnBHw8h6PlBgzAN58OvoSp58kfWf0Q10k88g6SiqIKp', '2018-03-15 22:22:27', '2018-03-15 22:22:27'),
(26, 'gege', 'ggg@gmail.com', '$2y$10$/VwCYIKritdZyBlEJ1jsOOnxUwDj1qFanjtLCAsZlUJkKkk1D0bpW', 'assistant', NULL, NULL, '', 'gh79trRiDpckQCcYQhZmKCpPrqLTT1jFi0SKPKu8YeBnntmwOrtkmkm9h3ce', '2018-06-05 08:08:16', '2018-06-05 08:08:16'),
(27, 'Gegejosper Ceniza', 'r@gmail.com', '$2y$10$O8l/jXk8SdLYzh31pwqIIuKMRNTFkn754lHckrhK3JRghixPS0K0G', 'customer', '09985518079', 'easyway', '1529473418.jpg', 'c0qIic6z1sQtfHTZivve0IOuwHtyJqyMqJgIlpoWjDoEowaBDxj8DWMJ38lo', '2018-06-18 05:52:34', '2018-06-20 05:28:02'),
(28, 'gege', 'asg@gmail.com', '$2y$10$IWJEVce.Ms5wwF9vGqHkFubbb.L/1Wv4X0dfH7Zm0FVa6idLLzcIi', 'cashier', NULL, NULL, NULL, NULL, '2018-08-08 21:20:02', '2018-08-08 21:20:02'),
(29, 'gege', 'asqq@gmail.com', '$2y$10$0d1fmWrA6hVxDq.qJrBiZeUaaptMrZfr8ApVhCKGzrGnnEw2Z0YaG', 'cashier', NULL, NULL, NULL, NULL, '2018-08-08 21:20:37', '2018-08-08 21:20:37'),
(30, 'gege', 'asds@gmail.com', '$2y$10$FB9oc3KJG/O.PjOQI55cyeMwdh0c5/DgFWIJ5VjrsLZ3/PYTFTm7i', 'cashier', NULL, NULL, NULL, NULL, '2018-08-08 21:20:49', '2018-08-08 21:20:49'),
(31, 'gege', 'qwqwq@gmail.com', '$2y$10$M8T9Qp.XrKItywYPyn1zjuxs0B4PL3yxC6kJaZQo5JnWD5dmdn.xm', 'cashier', NULL, NULL, NULL, NULL, '2018-08-08 21:22:20', '2018-08-08 21:22:20'),
(32, 'gege', 'sss@gmail.com', '$2y$10$zFK41Yg6JdgvDuGFQ/1QWudZlQcDQDE/PuBC6m2fJnqVOURkV78ji', 'cashier', NULL, NULL, NULL, NULL, '2018-08-08 21:23:36', '2018-08-08 21:28:48'),
(33, 'accounting', 'acc@gmail.com', '$2y$10$zFK41Yg6JdgvDuGFQ/1QWudZlQcDQDE/PuBC6m2fJnqVOURkV78ji', 'accounting', NULL, NULL, NULL, NULL, '2018-08-19 07:28:14', '2018-08-19 07:28:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boxids`
--
ALTER TABLE `boxids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchusers`
--
ALTER TABLE `branchusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashierorders`
--
ALTER TABLE `cashierorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custoorders`
--
ALTER TABLE `custoorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealerspackageorders`
--
ALTER TABLE `dealerspackageorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributionrecords`
--
ALTER TABLE `distributionrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itembalances`
--
ALTER TABLE `itembalances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagebranches`
--
ALTER TABLE `packagebranches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packageitems`
--
ALTER TABLE `packageitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packageorders`
--
ALTER TABLE `packageorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productquantities`
--
ALTER TABLE `productquantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaserecords`
--
ALTER TABLE `purchaserecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaserequests`
--
ALTER TABLE `purchaserequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqorders`
--
ALTER TABLE `reqorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `boxids`
--
ALTER TABLE `boxids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `branchusers`
--
ALTER TABLE `branchusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cashierorders`
--
ALTER TABLE `cashierorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `custoorders`
--
ALTER TABLE `custoorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dealerspackageorders`
--
ALTER TABLE `dealerspackageorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `distributionrecords`
--
ALTER TABLE `distributionrecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itembalances`
--
ALTER TABLE `itembalances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `packagebranches`
--
ALTER TABLE `packagebranches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `packageitems`
--
ALTER TABLE `packageitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `packageorders`
--
ALTER TABLE `packageorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `productquantities`
--
ALTER TABLE `productquantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `purchaserecords`
--
ALTER TABLE `purchaserecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `purchaserequests`
--
ALTER TABLE `purchaserequests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reqorders`
--
ALTER TABLE `reqorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
