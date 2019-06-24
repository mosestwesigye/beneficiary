-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 12:01 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'zDi3W7SMOveuaAaw60aGXjyot3izVIuW', 1, '2017-08-07 08:51:00', '2017-08-07 08:51:00', '2017-08-07 08:51:00'),
(4, 4, 'pfK1TlI9Ts2i281v4Po6uLNBOQqSjMiu', 1, '2019-06-07 07:51:09', '2019-06-07 07:51:09', '2019-06-07 07:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `asset_type_id` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `replacement_value` decimal(10,2) DEFAULT NULL,
  `serial_number` text COLLATE utf8_unicode_ci,
  `bought_from` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE `asset_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `type` enum('current','fixed','intangible','investment','other') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_valuations`
--

CREATE TABLE `asset_valuations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `user_id`, `user`, `module`, `notes`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 06:03:09', '2019-06-07 06:03:09', NULL),
(2, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 06:09:43', '2019-06-07 06:09:43', NULL),
(3, 1, 'Admin Admin', NULL, 'Added role with id:2', '2019-06-07 06:59:20', '2019-06-07 06:59:20', 1),
(4, 1, 'Admin Admin', NULL, 'Added user with id:2', '2019-06-07 07:00:07', '2019-06-07 07:00:07', 1),
(5, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-07 07:00:16', '2019-06-07 07:00:16', 1),
(6, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 07:01:21', '2019-06-07 07:01:21', 1),
(7, 1, 'Admin Admin', NULL, 'Added role with id:3', '2019-06-07 07:12:43', '2019-06-07 07:12:43', 1),
(8, 1, 'Admin Admin', NULL, 'Added user with id:3', '2019-06-07 07:13:21', '2019-06-07 07:13:21', 1),
(9, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-07 07:13:41', '2019-06-07 07:13:41', 1),
(10, 3, 'Innocent Moses', NULL, 'Logged in to system', '2019-06-07 07:14:12', '2019-06-07 07:14:12', 1),
(11, 3, 'Innocent Moses', NULL, 'Logged out of system', '2019-06-07 07:15:27', '2019-06-07 07:15:27', 1),
(12, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 07:15:41', '2019-06-07 07:15:41', 1),
(13, 1, 'Admin Admin', NULL, 'Updated role with id:1', '2019-06-07 07:16:22', '2019-06-07 07:16:22', 1),
(14, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-07 07:25:37', '2019-06-07 07:25:37', 1),
(15, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 07:25:51', '2019-06-07 07:25:51', 1),
(16, 1, 'Admin Admin', NULL, 'Updated role with id:1', '2019-06-07 07:36:00', '2019-06-07 07:36:00', 1),
(17, 1, 'Admin Admin', NULL, 'Deleted user with id:3', '2019-06-07 07:46:50', '2019-06-07 07:46:50', 1),
(18, 1, 'Admin Admin', NULL, 'Deleted user with id:2', '2019-06-07 07:46:56', '2019-06-07 07:46:56', 1),
(19, 1, 'Admin Admin', NULL, 'Deleted role with id:3', '2019-06-07 07:49:58', '2019-06-07 07:49:58', 1),
(20, 1, 'Admin Admin', NULL, 'Deleted role with id:2', '2019-06-07 07:50:03', '2019-06-07 07:50:03', 1),
(21, 1, 'Admin Admin', NULL, 'Added role with id:4', '2019-06-07 07:50:42', '2019-06-07 07:50:42', 1),
(22, 1, 'Admin Admin', NULL, 'Added user with id:4', '2019-06-07 07:51:09', '2019-06-07 07:51:09', 1),
(23, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-07 07:51:30', '2019-06-07 07:51:30', 1),
(24, 4, 'Innocent Moses', NULL, 'Logged in to system', '2019-06-07 07:51:50', '2019-06-07 07:51:50', 1),
(25, 4, 'Innocent Moses', NULL, 'Logged out of system', '2019-06-07 07:56:06', '2019-06-07 07:56:06', 3),
(26, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 07:56:23', '2019-06-07 07:56:23', 3),
(27, 1, 'Admin Admin', NULL, 'Added Beneficiary  with id:', '2019-06-07 09:26:48', '2019-06-07 09:26:48', 3),
(28, 1, 'Admin Admin', NULL, 'Added payroll with id:1', '2019-06-07 10:45:46', '2019-06-07 10:45:46', 3),
(29, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-07 11:53:55', '2019-06-07 11:53:55', NULL),
(30, 1, 'Admin Admin', NULL, 'Updated Settings', '2019-06-07 12:01:01', '2019-06-07 12:01:01', 1),
(31, 1, 'Admin Admin', NULL, 'Added Beneficiary  with id:2', '2019-06-10 05:32:41', '2019-06-10 05:32:41', 3),
(32, 1, 'Admin Admin', NULL, 'Updated Beneficiary  with id:2', '2019-06-10 06:27:19', '2019-06-10 06:27:19', 3),
(33, 1, 'Admin Admin', NULL, 'Deleted Beneficiary  with id:1', '2019-06-10 06:47:36', '2019-06-10 06:47:36', 3),
(34, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-10 08:32:53', '2019-06-10 08:32:53', 3),
(35, 4, 'Innocent Moses', NULL, 'Logged in to system', '2019-06-10 09:50:59', '2019-06-10 09:50:59', 3),
(36, 4, 'Innocent Moses', NULL, 'Logged out of system', '2019-06-10 09:51:13', '2019-06-10 09:51:13', 3),
(37, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-10 09:53:01', '2019-06-10 09:53:01', 3),
(38, 1, 'Admin Admin', NULL, 'Added payroll with id:2', '2019-06-10 10:29:03', '2019-06-10 10:29:03', 3),
(39, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-10 10:46:57', '2019-06-10 10:46:57', 3),
(40, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-10 10:50:43', '2019-06-10 10:50:43', 3),
(41, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-10 11:02:01', '2019-06-10 11:02:01', 1),
(42, 4, 'Innocent Moses', NULL, 'Logged in to system', '2019-06-10 11:02:15', '2019-06-10 11:02:15', 1),
(43, 4, 'Innocent Moses', NULL, 'Logged out of system', '2019-06-10 11:02:25', '2019-06-10 11:02:25', 1),
(44, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-10 11:02:36', '2019-06-10 11:02:36', 1),
(45, 1, 'Admin Admin', NULL, 'Updated role with id:4', '2019-06-10 11:02:58', '2019-06-10 11:02:58', 1),
(46, 1, 'Admin Admin', NULL, 'Logged out of system', '2019-06-10 11:03:03', '2019-06-10 11:03:03', 1),
(47, 4, 'Innocent Moses', NULL, 'Logged in to system', '2019-06-10 11:03:13', '2019-06-10 11:03:13', 1),
(48, 4, 'Innocent Moses', NULL, 'Logged out of system', '2019-06-10 11:04:10', '2019-06-10 11:04:10', 1),
(49, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-10 11:04:21', '2019-06-10 11:04:21', 1),
(50, 1, 'Admin Admin', NULL, 'Updated role with id:1', '2019-06-10 11:25:40', '2019-06-10 11:25:40', 3),
(51, 1, 'Admin Admin', NULL, 'Updated role with id:1', '2019-06-10 11:31:15', '2019-06-10 11:31:15', 3),
(52, 1, 'Admin Admin', NULL, 'Updated Beneficiary  with id:2', '2019-06-10 14:05:00', '2019-06-10 14:05:00', 3),
(53, 1, 'Admin Admin', NULL, 'Logged in to system', '2019-06-11 02:30:11', '2019-06-11 02:30:11', NULL),
(54, 1, 'Super Administrator', NULL, 'Added package product with id:1', '2019-06-11 05:16:14', '2019-06-11 05:16:14', 5),
(55, 1, 'Super Administrator', NULL, 'Added package with id:3', '2019-06-11 07:56:32', '2019-06-11 07:56:32', 5),
(56, 1, 'Super Administrator', NULL, 'Added package with id:4', '2019-06-11 08:24:03', '2019-06-11 08:24:03', 5),
(57, 1, 'Super Administrator', NULL, 'Declined Beneficiary  with id:2', '2019-06-11 09:52:43', '2019-06-11 09:52:43', 3),
(58, 1, 'Super Administrator', NULL, 'Approved Beneficiary  with id:', '2019-06-11 09:53:41', '2019-06-11 09:53:41', 3),
(59, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-12 04:41:00', '2019-06-12 04:41:00', NULL),
(60, 1, 'Super Administrator', NULL, 'Added package  with id:0', '2019-06-12 09:07:00', '2019-06-12 09:07:00', 3),
(61, 1, 'Super Administrator', NULL, 'Added package  with id:0', '2019-06-12 09:13:18', '2019-06-12 09:13:18', 3),
(62, 1, 'Super Administrator', NULL, 'Deleted package  with id:0', '2019-06-12 09:24:47', '2019-06-12 09:24:47', 3),
(63, 1, 'Super Administrator', NULL, 'Added package  with id:0', '2019-06-12 09:26:30', '2019-06-12 09:26:30', 3),
(64, 1, 'Super Administrator', NULL, 'Deleted package  with id:0', '2019-06-12 10:37:50', '2019-06-12 10:37:50', 3),
(65, 1, 'Super Administrator', NULL, 'Added package  with id:0', '2019-06-12 10:39:40', '2019-06-12 10:39:40', 3),
(66, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-13 05:04:13', '2019-06-13 05:04:13', NULL),
(67, 1, 'Super Administrator', NULL, 'Declined Beneficiary  with id:2', '2019-06-13 05:10:04', '2019-06-13 05:10:04', 3),
(68, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-14 06:19:04', '2019-06-14 06:19:04', NULL),
(69, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-16 08:21:14', '2019-06-16 08:21:14', NULL),
(70, 1, 'Super Administrator', NULL, 'Approved Beneficiary  with id:', '2019-06-16 08:48:10', '2019-06-16 08:48:10', 3),
(71, 1, 'Super Administrator', NULL, 'Deleted package  with id:0', '2019-06-16 09:13:06', '2019-06-16 09:13:06', 3),
(72, 1, 'Super Administrator', NULL, 'Deleted package  with id:4', '2019-06-16 09:13:15', '2019-06-16 09:13:15', 3),
(73, 1, 'Super Administrator', NULL, 'Added package  with id:5', '2019-06-16 09:15:08', '2019-06-16 09:15:08', 1),
(74, 1, 'Super Administrator', NULL, 'Updated Beneficiary  with id:2', '2019-06-16 10:35:28', '2019-06-16 10:35:28', 3),
(75, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-18 09:02:51', '2019-06-18 09:02:51', NULL),
(76, 1, 'Super Administrator', NULL, 'Logged out of system', '2019-06-18 12:16:44', '2019-06-18 12:16:44', 5),
(77, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-18 12:16:47', '2019-06-18 12:16:47', 5),
(78, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-18 12:24:56', '2019-06-18 12:24:56', NULL),
(79, 1, 'Super Administrator', NULL, 'Logged out of system', '2019-06-18 12:25:06', '2019-06-18 12:25:06', 5),
(80, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-18 12:25:15', '2019-06-18 12:25:15', 5),
(81, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-18 12:25:35', '2019-06-18 12:25:35', 1),
(82, 1, 'Super Administrator', NULL, 'Logged in to system', '2019-06-19 06:43:14', '2019-06-19 06:43:14', NULL),
(83, 1, 'Super Administrator', NULL, 'Added Beneficiary  with id:3', '2019-06-19 06:48:03', '2019-06-19 06:48:03', 278),
(84, 1, 'Super Administrator', NULL, 'Declined Beneficiary  with id:3', '2019-06-19 06:51:08', '2019-06-19 06:51:08', 278),
(85, 1, 'Super Administrator', NULL, 'Approved Beneficiary  with id:', '2019-06-19 06:51:29', '2019-06-19 06:51:29', 278),
(86, 1, 'Super Administrator', NULL, 'Added package  with id:6', '2019-06-19 06:52:50', '2019-06-19 06:52:50', 278);

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `name`, `notes`) VALUES
(1, 'Stanbic Bank', ''),
(2, 'Equity Bank', '');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ratio_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_of_residence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrival_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_needs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spouse_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spouse_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_dependants` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `loan_officers` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` enum('online','admin') COLLATE utf8_unicode_ci DEFAULT 'admin',
  `active` tinyint(4) DEFAULT '1',
  `blacklisted` tinyint(4) DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `country`, `district`, `title`, `mobile`, `email`, `national_id`, `ratio_id`, `dob`, `address`, `city`, `zone`, `place_of_residence`, `arrival_date`, `village`, `working_status`, `special_needs`, `marital_status`, `spouse_name`, `spouse_contact`, `number_dependants`, `bank`, `account_number`, `photo`, `notes`, `files`, `loan_officers`, `created_at`, `updated_at`, `deleted_at`, `username`, `password`, `month`, `year`, `source`, `active`, `blacklisted`, `branch_id`) VALUES
(1, 1, 'Innocent', 'Moses', 'Male', 'Uganda', '', 'Mr', '0773214812', 'nanderehudson@gmail.com', '79503828742', '0', '2019-06-16', 'Kampala, Uganda', 'Kampala', 'Central', '256', '0000-00-00', 'Mr.', 'Employee', '', '', '', '', '', '', '', 'coa.jpg', '', 'a:0:{}', 'a:1:{i:0;s:1:\"1\";}', '2019-06-07 09:26:48', '2019-06-10 06:47:36', '2019-06-10 06:47:36', 'test', '0192023a7bbd73250516f069df18b500', '06', '2019', 'admin', 1, 0, 3),
(2, 1, 'Nandere', 'Hudson', 'Male', 'UG', '', 'Single', '0788687903', 'twesigyemoses1@gmail.com', 'CMB49785420933', '560493242432', '2019-05-29', 'Kampala, Uganda', 'Kampala', 'Kiteezi', 'Mpererwe', '2019-06-10', 'Mpererwes', 'Employee', '', '', 'Annah Kansiime', '0786434938', '6', 'Equity Bank', '50483240922323', NULL, 'This refugee is from Congo', 'a:1:{i:0;s:23:\"William_Anyak_Quote.pdf\";}', 'N;', '2019-06-10 05:32:41', '2019-06-16 10:35:28', NULL, NULL, NULL, '06', '2019', 'admin', 1, 0, 3),
(3, 1, 'Twesigye', 'Moses', 'Male', 'UG', 'KAMPALA', 'Mr', '0788687903', 'twesigyemoses1@gmail.com', 'CMB49785420933', '560493242432', '2019-05-29', 'Kampala, Uganda', 'Kampala', 'Kiteezi', 'Mpererwe', '2019-06-19', 'Mpererwe', 'Employee', 'N/A', 'Single', 'Annah', '0786434938', '6', 'Equity Bank', '50483240922323', NULL, '', 'a:1:{i:0;s:7:\"coa.jpg\";}', 'a:1:{i:0;s:1:\"1\";}', '2019-06-19 06:48:03', '2019-06-19 06:51:29', NULL, NULL, NULL, '06', '2019', 'admin', 1, 0, 278);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_groups`
--

CREATE TABLE `beneficiary_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_beneficiaries` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beneficiary_groups`
--

INSERT INTO `beneficiary_groups` (`id`, `name`, `assigned_beneficiaries`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Ff', NULL, 'fd', '2017-09-02 14:04:50', '2017-09-02 14:04:50'),
(2, 'Refugees', NULL, '', '2019-06-07 09:11:32', '2019-06-07 09:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_group_members`
--

CREATE TABLE `beneficiary_group_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `beneficiary_group_id` int(11) DEFAULT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beneficiary_group_members`
--

INSERT INTO `beneficiary_group_members` (`id`, `beneficiary_group_id`, `beneficiary_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2017-09-02 14:44:30', '2017-09-02 14:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_users` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `default_branch` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `assigned_users`, `notes`, `default_branch`) VALUES
(1, 'ADJUMANI', NULL, '', 1),
(296, 'MITYANA', NULL, '', 0),
(272, 'IGANGA', NULL, '', 0),
(279, 'KAMPALA SOUTH', NULL, '', 0),
(280, 'KAMPALA WEST', NULL, '', 0),
(281, 'KAMULI', NULL, '', 0),
(311, 'WAKISO', NULL, '', 0),
(310, 'TORORO', NULL, '', 0),
(309, 'SOROTI', NULL, '', 0),
(308, 'SIRONKO', NULL, '', 0),
(307, 'RUKUNGIRI', NULL, '', 0),
(306, 'RAKAI', NULL, '', 0),
(305, 'PALLISA', NULL, '', 0),
(304, 'PADER', NULL, '', 0),
(303, 'NTUNGAMO', NULL, '', 0),
(302, 'NEBBI', NULL, '', 0),
(301, 'NAKASONGOLA', NULL, '', 0),
(300, 'MUKONO', NULL, '', 0),
(298, 'MOYO', NULL, '', 0),
(299, 'MPIGI', NULL, '', 0),
(297, 'MOROTO', NULL, '', 0),
(295, 'MBARARA', NULL, '', 0),
(282, 'KAPCHORWA', NULL, '', 0),
(283, 'KASESE', NULL, '', 0),
(294, 'MBALE', NULL, '', 0),
(293, 'MASINDI', NULL, '', 0),
(292, 'MASAKA', NULL, '', 0),
(291, 'LUWERO', NULL, '', 0),
(290, 'LIRA', NULL, '', 0),
(289, 'KUMI', NULL, '', 0),
(288, 'KOTIDO', NULL, '', 0),
(287, 'KITGUM', NULL, '', 0),
(286, 'KISORO', NULL, '', 0),
(285, 'KIBALE', NULL, '', 0),
(284, 'KATAKWI', NULL, '', 0),
(250, 'APAC', NULL, '', 0),
(249, 'ARUA', NULL, '', 0),
(248, 'BUBULU', NULL, '', 0),
(247, 'BUNDIBUGYO', NULL, '', 0),
(246, 'BUSHENYI', NULL, '', 0),
(245, 'BUSIA', NULL, '', 0),
(244, 'ENTEBBE', NULL, '', 0),
(243, 'GULU', NULL, '', 0),
(242, 'HOIMA', NULL, '', 0),
(241, 'JINJA', NULL, '', 0),
(273, 'KABALE', NULL, '', 0),
(274, 'KABAROLE', NULL, '', 0),
(275, 'KALANGALA', NULL, '', 0),
(276, 'KAMPALA CENTRAL', NULL, '', 0),
(277, 'KAMPALA EAST', NULL, '', 0),
(278, 'KAMPALA NORTH', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_users`
--

CREATE TABLE `branch_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch_users`
--

INSERT INTO `branch_users` (`id`, `branch_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 1, 1, '2019-06-18 12:19:48', '2019-06-18 12:19:48'),
(3, 3, 4, '2019-06-07 07:54:48', '2019-06-07 07:54:48'),
(9, 296, 1, '2019-06-18 12:28:07', '2019-06-18 12:28:07'),
(6, 3, 1, '2019-06-07 12:10:44', '2019-06-07 12:10:44'),
(7, 5, 1, '2019-06-10 11:07:48', '2019-06-10 11:07:48'),
(10, 272, 1, '2019-06-18 12:28:19', '2019-06-18 12:28:19'),
(11, 279, 1, '2019-06-18 12:28:45', '2019-06-18 12:28:45'),
(12, 280, 1, '2019-06-18 12:28:51', '2019-06-18 12:28:51'),
(13, 281, 1, '2019-06-18 12:30:31', '2019-06-18 12:30:31'),
(14, 311, 1, '2019-06-18 12:30:55', '2019-06-18 12:30:55'),
(15, 310, 1, '2019-06-18 12:31:23', '2019-06-18 12:31:23'),
(16, 309, 1, '2019-06-18 12:32:15', '2019-06-18 12:32:15'),
(17, 308, 1, '2019-06-18 12:32:56', '2019-06-18 12:32:56'),
(18, 307, 1, '2019-06-18 12:33:14', '2019-06-18 12:33:14'),
(19, 306, 1, '2019-06-18 12:33:33', '2019-06-18 12:33:33'),
(20, 305, 1, '2019-06-18 12:34:08', '2019-06-18 12:34:08'),
(21, 304, 1, '2019-06-18 12:34:30', '2019-06-18 12:34:30'),
(22, 303, 1, '2019-06-18 12:34:58', '2019-06-18 12:34:58'),
(23, 302, 1, '2019-06-18 12:35:21', '2019-06-18 12:35:21'),
(24, 301, 1, '2019-06-18 12:35:47', '2019-06-18 12:35:47'),
(25, 300, 1, '2019-06-18 12:36:06', '2019-06-18 12:36:06'),
(26, 298, 1, '2019-06-18 12:36:27', '2019-06-18 12:36:27'),
(27, 299, 1, '2019-06-18 12:37:03', '2019-06-18 12:37:03'),
(28, 297, 1, '2019-06-18 12:37:24', '2019-06-18 12:37:24'),
(29, 295, 1, '2019-06-18 12:37:49', '2019-06-18 12:37:49'),
(30, 282, 1, '2019-06-18 12:38:11', '2019-06-18 12:38:11'),
(31, 283, 1, '2019-06-18 12:38:33', '2019-06-18 12:38:33'),
(32, 294, 1, '2019-06-18 12:38:52', '2019-06-18 12:38:52'),
(33, 293, 1, '2019-06-18 12:39:11', '2019-06-18 12:39:11'),
(34, 292, 1, '2019-06-18 12:39:33', '2019-06-18 12:39:33'),
(35, 291, 1, '2019-06-18 12:39:51', '2019-06-18 12:39:51'),
(36, 290, 1, '2019-06-18 12:40:41', '2019-06-18 12:40:41'),
(37, 289, 1, '2019-06-18 12:41:03', '2019-06-18 12:41:03'),
(38, 288, 1, '2019-06-18 12:41:22', '2019-06-18 12:41:22'),
(39, 287, 1, '2019-06-18 12:41:48', '2019-06-18 12:41:48'),
(40, 286, 1, '2019-06-18 12:42:14', '2019-06-18 12:42:14'),
(41, 285, 1, '2019-06-18 12:42:44', '2019-06-18 12:42:44'),
(42, 284, 1, '2019-06-18 12:43:03', '2019-06-18 12:43:03'),
(43, 250, 1, '2019-06-18 12:43:28', '2019-06-18 12:43:28'),
(44, 249, 1, '2019-06-18 12:43:47', '2019-06-18 12:43:47'),
(45, 248, 1, '2019-06-18 12:44:23', '2019-06-18 12:44:23'),
(46, 247, 1, '2019-06-18 12:44:45', '2019-06-18 12:44:45'),
(47, 246, 1, '2019-06-18 12:45:03', '2019-06-18 12:45:03'),
(48, 245, 1, '2019-06-18 12:45:19', '2019-06-18 12:45:19'),
(49, 244, 1, '2019-06-18 12:45:38', '2019-06-18 12:45:38'),
(50, 243, 1, '2019-06-18 12:45:56', '2019-06-18 12:45:56'),
(51, 242, 1, '2019-06-18 12:46:12', '2019-06-18 12:46:12'),
(52, 241, 1, '2019-06-18 12:46:29', '2019-06-18 12:46:29'),
(53, 273, 1, '2019-06-18 12:46:44', '2019-06-18 12:46:44'),
(54, 274, 1, '2019-06-18 12:47:04', '2019-06-18 12:47:04'),
(55, 275, 1, '2019-06-18 12:47:20', '2019-06-18 12:47:20'),
(56, 276, 1, '2019-06-18 12:47:38', '2019-06-18 12:47:38'),
(57, 277, 1, '2019-06-18 12:47:56', '2019-06-18 12:47:56'),
(58, 278, 1, '2019-06-18 12:48:17', '2019-06-18 12:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE `capital` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `bank_account_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collateral`
--

CREATE TABLE `collateral` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_id` int(10) UNSIGNED DEFAULT NULL,
  `borrower_id` int(10) UNSIGNED DEFAULT NULL,
  `collateral_type_id` int(10) UNSIGNED DEFAULT NULL,
  `value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('returned_to_borrower','repossessed','repossession_initiated','sold','lost','collateral_with_borrower','deposited_into_branch') COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `serial_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacture_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collateral_types`
--

CREATE TABLE `collateral_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `sortname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_type` enum('number','textfield','date','decimal','textarea') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'textfield',
  `required` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `user_id`, `category`, `name`, `field_type`, `required`) VALUES
(2, NULL, 'loans', 'Mode of Payment', 'number', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields_meta`
--

CREATE TABLE `custom_fields_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `custom_field_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `create_date`, `update_date`) VALUES
(1, 'APAC', '2019-06-18 13:29:31', '2019-06-18 13:29:31'),
(2, 'KAMPALA', '2019-06-18 13:30:15', '2019-06-18 13:30:15'),
(3, 'BUIKWE', '2019-06-18 13:32:18', '2019-06-18 13:32:18'),
(4, 'BUKOMANSIMBI', '2019-06-18 13:32:18', '2019-06-18 13:32:18'),
(5, 'BUTAMBALA', '2019-06-18 14:09:00', '2019-06-18 14:09:00'),
(6, 'BUVUMA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(7, 'GOMBA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(8, 'KALANGALA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(9, 'KALUNGI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(10, 'KAYUNGA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(11, 'KIBOGA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(12, 'KYANKWANZI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(13, 'LUWEERO', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(14, 'LWENGO', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(15, 'LYANTONDE', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(16, 'MASAKA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(17, 'MITYANA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(18, 'MPIGI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(19, 'MUBENDE', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(20, 'MUKONO', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(21, 'NAKASEKE', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(22, 'NAKASONGOLA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(23, 'RAKAI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(24, 'SEMBABULE', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(25, 'WAKISO', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(26, 'AMURIA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(27, 'BUDAKA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(28, 'BUDUDA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(29, 'BUGIRI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(30, 'BUKEDEA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(31, 'BUKWA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(32, 'BULAMBULI', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(33, 'BUSIA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(34, 'BUTALEJA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(35, 'BUYENDE', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(36, 'IGANGA', '2019-06-18 14:09:01', '2019-06-18 14:09:01'),
(37, 'JINJA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(38, 'KABERAMAIDO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(39, 'KALIRO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(40, 'KAMULI', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(41, 'KAPCHORWA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(42, 'KATAKWI', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(43, 'KIBUKU', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(44, 'KUMI', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(45, 'KWEEN', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(46, 'LUUKA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(47, 'MANAFWA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(48, 'MAYUGE', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(49, 'MBALE', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(50, 'NAMAYINGO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(51, 'NAMUTAMBA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(52, 'NGORA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(53, 'PALLISA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(54, 'SERERE', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(55, 'SIRONKO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(56, 'SOROTI', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(57, 'TORORO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(58, 'ABIM', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(59, 'ADJUMANI', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(60, 'AGAGO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(61, 'ALEBTONG', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(62, 'AMOLATAR', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(63, 'AMUDAT', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(64, 'AMURU', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(65, 'ARUA', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(66, 'DOKOLO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(67, 'GULU', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(68, 'KAABONG', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(69, 'KITGUM', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(70, 'KOBOKO', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(71, 'KOLE', '2019-06-18 14:09:02', '2019-06-18 14:09:02'),
(72, 'KOTIDO', '2019-06-18 14:09:03', '2019-06-18 14:09:03'),
(73, 'LAMWO', '2019-06-18 14:09:03', '2019-06-18 14:09:03'),
(74, 'LIRA', '2019-06-18 14:09:03', '2019-06-18 14:09:03'),
(75, 'MARACHA', '2019-06-18 14:09:03', '2019-06-18 14:09:03'),
(76, 'MOROTO', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(77, 'MOYO', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(78, 'NAKAPIRIPIRIT', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(79, 'NAPAK', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(80, 'NEBBI', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(81, 'NWOYA', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(82, 'OTUKE', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(83, 'OYAM', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(84, 'PADER', '2019-06-18 14:17:54', '2019-06-18 14:17:54'),
(85, 'YUMBE', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(86, 'ZOMBO', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(87, 'BUHWEJU', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(88, 'BULIISA', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(89, 'BUNDIBUGYO', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(90, 'BUSHENYI', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(91, 'HOIMA', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(92, 'IBANDA', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(93, 'ISINGIRO', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(94, 'KABALE', '2019-06-18 14:17:55', '2019-06-18 14:17:55'),
(95, 'KABAROLE', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(96, 'KAMWENGE', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(97, 'KANUNGU', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(98, 'KASESE', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(99, 'KIBAALE', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(100, 'KIRUHURA', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(101, 'KIRYANDONGO', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(102, 'KISORO', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(103, 'KYENGEGWA', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(104, 'KYENJOJO', '2019-06-18 14:29:22', '2019-06-18 14:29:22'),
(105, 'MASINDI', '2019-06-18 14:29:23', '2019-06-18 14:29:23'),
(106, 'MBARARA', '2019-06-18 14:29:23', '2019-06-18 14:29:23'),
(107, 'MITOOMA', '2019-06-18 14:29:23', '2019-06-18 14:29:23'),
(108, 'NTOROKO', '2019-06-18 14:29:23', '2019-06-18 14:29:23'),
(109, 'NTUNGAMO', '2019-06-18 14:31:15', '2019-06-18 14:31:15'),
(110, 'RUBIRIZI', '2019-06-18 14:31:15', '2019-06-18 14:31:15'),
(111, 'RUKUNGIRI', '2019-06-18 14:31:15', '2019-06-18 14:31:15'),
(112, 'SHEEMA', '2019-06-18 14:31:16', '2019-06-18 14:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `recipients` int(10) UNSIGNED NOT NULL,
  `send_to` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `expense_type_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recurring` tinyint(4) NOT NULL DEFAULT '0',
  `recur_frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '31',
  `recur_start_date` date DEFAULT NULL,
  `recur_end_date` date DEFAULT NULL,
  `recur_next_date` date DEFAULT NULL,
  `recur_type` enum('day','week','month','year') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'month',
  `notes` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `loan_application_id` int(11) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `borrower_id` int(11) DEFAULT NULL,
  `guarantor_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `saving_amount` decimal(10,2) DEFAULT NULL,
  `accepted_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','accepted','declined') COLLATE utf8_unicode_ci DEFAULT 'pending',
  `saving_status` enum('pending','hold','restored') COLLATE utf8_unicode_ci DEFAULT 'pending',
  `saving_restored` tinyint(4) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  `attach_file` text COLLATE utf8_unicode_ci,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_02_230147_migration_cartalyst_sentinel', 1),
('2016_07_23_173157_create_messages_table', 1),
('2016_07_23_173226_create_sms_table', 1),
('2016_07_23_173242_create_settings_table', 1),
('2016_11_05_062734_create_permissions_table', 1),
('2017_02_23_000640_create_borrowers_table', 1),
('2017_02_23_002300_create_custom_fields_table', 1),
('2017_02_23_003720_create_custom_fields_meta_table', 1),
('2017_03_05_131103_create_loans_table', 1),
('2017_03_05_132848_create_loans_products_table', 1),
('2017_03_05_145851_create_loan_disbursed_by_table', 1),
('2017_03_05_150107_create_loan_repayment_methods_table', 1),
('2017_03_05_151538_create_loan_status_table', 1),
('2017_03_08_182936_create_loan_schedules_table', 1),
('2017_03_19_080840_create_loan_repayments_table', 1),
('2017_04_02_142753_create_loan_comments_table', 1),
('2017_04_11_091435_create_payroll_templates_table', 1),
('2017_04_11_094729_create_payroll_template_meta_table', 1),
('2017_04_12_004631_create_payroll_table', 1),
('2017_04_12_004829_create_payroll_meta_table', 1),
('2017_04_14_083438_create_expenses_table', 1),
('2017_04_14_083535_create_expense_types_table', 1),
('2017_04_16_084016_create_other_income_table', 1),
('2017_04_16_084118_create_other_income_types_table', 1),
('2017_04_16_094025_create_collateral_types_table', 1),
('2017_04_16_094131_create_collateral_table', 1),
('2017_04_18_083800_create_emails_table', 1),
('2017_04_23_072100_create_loan_fees_table', 1),
('2017_04_23_073118_create_loan_fees_meta_table', 1),
('2017_05_04_103559_create_countries_table', 1),
('2017_07_17_123811_add_login_fields_to_borrowers_table', 1),
('2017_07_17_124138_add_month_year_to_borrowers_table', 1),
('2017_07_17_124357_add_fields_to_borrowers_table', 1),
('2017_07_17_130228_add_v1_1_settings_table', 1),
('2017_07_23_061641_create_loan_applications_table', 1),
('2017_07_23_064420_create_audit_trail_table', 1),
('2017_07_23_120222_add_payment_to_v1_1_settings_table', 1),
('2017_07_24_063824_create_savings_product_table', 1),
('2017_07_24_070639_create_savings_table', 1),
('2017_07_24_071756_create_savings_transactions_table', 1),
('2017_07_24_073802_create_savings_fees_table', 1),
('2017_07_27_071556_create_asset_types_table', 1),
('2017_07_27_071814_create_assets_table', 1),
('2017_07_27_074421_create_asset_valuations_table', 1),
('2017_07_27_174045_create_capital_table', 1),
('2017_08_01_064016_add_status_to_loans_table', 1),
('2017_08_01_081424_create_guarantor_table', 1),
('2017_08_07_083717_update_from_v1_0_to_1_1', 1),
('2017_08_23_205719_add_blacklist_to_borrowers_table', 2),
('2017_09_02_092303_create_borrower_groups', 3),
('2017_09_02_092551_create_branches', 3),
('2017_09_02_094025_add_branches_to_all_tables', 3),
('2017_09_02_154128_create_borrower_group_members_table', 3),
('2017_09_02_171328_update_from_v1_1_to_1_2', 4),
('2017_09_05_075257_add_v12_settings', 5),
('2017_09_05_082513_add_v12_permissions', 5),
('2017_09_20_093729_add_client_background_settings', 6),
('2017_09_20_094221_change_update_url', 6),
('2017_09_23_133042_create_provision_rates_table', 7),
('2017_09_23_133535_insert_data_to_provision_rates_table', 8),
('2017_09_24_091220_create_bank_accounts_table', 9),
('2017_09_24_091340_add_bank_accounts_to_capital_table', 9),
('2017_10_13_113742_create_branch_users_table', 10),
('2017_10_13_121839_add_application_fee_to_loans_table', 10),
('2017_10_13_161720_add_default_branch', 10),
('2017_10_13_161930_create_default_branch_and_assign_user', 11),
('2017_10_13_173431_add_branch_to_schedules', 12),
('2017_10_13_184930_set_default_branch_for_current_loans', 13),
('2017_10_14_062601_add_v_1_3_permissions', 14),
('2017_10_14_063504_update_v_1_3_update_url', 14),
('2017_10_14_074553_update_to_v_1_3', 14);

-- --------------------------------------------------------

--
-- Table structure for table `other_income`
--

CREATE TABLE `other_income` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `other_income_type_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_income_types`
--

CREATE TABLE `other_income_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `beneficiary_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mode_of_payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` enum('online','admin') COLLATE utf8_unicode_ci DEFAULT 'admin',
  `active` tinyint(4) DEFAULT '1',
  `blacklisted` tinyint(4) DEFAULT '0',
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`beneficiary_id`, `id`, `user_id`, `item`, `quantity`, `unit`, `mode_of_payment`, `package_amount`, `bank`, `description`, `files`, `created_at`, `updated_at`, `deleted_at`, `month`, `year`, `source`, `active`, `blacklisted`, `branch_id`) VALUES
(0, 1, 1, NULL, NULL, 'kg', 'Cash', '3', '', NULL, 'a:0:{}', '2019-06-12 09:07:00', '2019-06-12 10:37:50', '2019-06-12 10:37:50', '06', '2019', 'admin', 1, 0, 3),
(2, 2, 1, NULL, NULL, 'kg', 'Bank', '3', '', NULL, 'a:0:{}', '2019-06-12 09:13:18', '2019-06-12 10:37:50', '2019-06-12 10:37:50', '06', '2019', 'admin', 1, 0, 3),
(2, 3, 1, 'Food', '4', 'kg', 'Cash', '100000', '', 'Food', 'a:0:{}', '2019-06-12 09:26:29', '2019-06-12 10:37:50', '2019-06-12 10:37:50', '06', '2019', 'admin', 1, 0, 3),
(2, 4, 1, 'Rice', '4', 'kg', 'Cash', '100000', '', 'Testing', 'a:0:{}', '2019-06-12 10:39:40', '2019-06-16 09:13:15', '2019-06-16 09:13:15', '06', '2019', 'admin', 1, 0, 3),
(2, 5, 1, 'Food', '4', 'kg', 'Cash', '100000', '', 'Food for orphans', 'a:0:{}', '2019-06-16 09:15:08', '2019-06-16 09:15:08', NULL, '06', '2019', 'admin', 1, 0, 1),
(3, 6, 1, 'Rice', '4', 'kg', 'Cash', '200000', '', 'Rice for food', 'a:0:{}', '2019-06-19 06:52:50', '2019-06-19 06:52:50', NULL, '06', '2019', 'admin', 1, 0, 278);

-- --------------------------------------------------------

--
-- Table structure for table `package_status`
--

CREATE TABLE `package_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(10) UNSIGNED NOT NULL,
  `payroll_template_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` date DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recurring` tinyint(4) NOT NULL DEFAULT '0',
  `recur_frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '31',
  `recur_start_date` date DEFAULT NULL,
  `recur_end_date` date DEFAULT NULL,
  `recur_next_date` date DEFAULT NULL,
  `recur_type` enum('day','week','month','year') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'month',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `payroll_template_id`, `user_id`, `employee_name`, `business_name`, `payment_method`, `bank_name`, `account_number`, `description`, `comments`, `paid_amount`, `date`, `year`, `month`, `recurring`, `recur_frequency`, `recur_start_date`, `recur_end_date`, `recur_next_date`, `recur_type`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, NULL, 4, 'Innocent Moses', 'Loan', 'Cash', 'Equity Bank', '30293420493224', 'tEST', '', '3000000.00', '2019-06-07', '2019', '06', 0, '31', NULL, NULL, NULL, 'month', '2019-06-07 10:45:46', '2019-06-07 10:45:46', 3),
(2, NULL, 4, 'Innocent Moses', 'Beneficiary Management System', 'dsfs', 'dsf', '678686', 'eftete', '', '-100000.00', '2019-06-10', '2019', '06', 0, '31', NULL, NULL, NULL, 'month', '2019-06-10 10:29:03', '2019-06-10 10:29:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_meta`
--

CREATE TABLE `payroll_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `payroll_id` int(10) UNSIGNED NOT NULL,
  `payroll_template_meta_id` int(10) UNSIGNED DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` enum('top_left','top_right','bottom_left','bottom_right') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'bottom_left'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payroll_meta`
--

INSERT INTO `payroll_meta` (`id`, `payroll_id`, `payroll_template_meta_id`, `value`, `position`) VALUES
(1, 2, 1, '100000.00', 'bottom_right');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_templates`
--

CREATE TABLE `payroll_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payroll_templates`
--

INSERT INTO `payroll_templates` (`id`, `name`, `notes`, `picture`) VALUES
(1, 'Default', 'Default Payroll Template', 'default_payroll_template');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_template_meta`
--

CREATE TABLE `payroll_template_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `payroll_template_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` enum('top_left','top_right','bottom_left','bottom_right') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'bottom_left',
  `is_default` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payroll_template_meta`
--

INSERT INTO `payroll_template_meta` (`id`, `payroll_template_id`, `name`, `position`, `is_default`) VALUES
(1, 1, 'NSSF', 'bottom_right', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `parent_id`, `name`, `slug`, `description`) VALUES
(1, 0, 'Beneficiaries', 'beneficiaries', 'Access Beneficiary Module'),
(2, 1, 'View beneficiaries', 'beneficiaries.view', 'View beneficiaries'),
(3, 1, 'Update beneficiaries', 'beneficiaries.update', 'Update Beneficiaries'),
(4, 1, 'Delete beneficiaries', 'beneficiaries.delete', 'Delete beneficiaries'),
(5, 1, 'Create beneficiaries', 'beneficiaries.create', 'Add new beneficiaries'),
(6, 0, 'Beneficiary Package', 'packages', 'Access Packages Module'),
(7, 6, 'Create Packages', 'packages.create', 'Create Packages'),
(9, 6, 'Update Packages', 'packages.update', 'Update Packages'),
(10, 6, 'Delete Packages', 'packages.delete', 'Delete Packages'),
(11, 6, 'View Packages', 'packages.view', 'View Packages'),
(20, 0, 'Payroll', 'payroll', 'Access Payroll Module'),
(21, 20, 'View Payroll', 'payroll.view', 'View Payroll'),
(22, 20, 'Update Payroll', 'payroll.update', 'Update Payroll'),
(23, 20, 'Delete Payroll', 'payroll.delete', 'Delete Payroll'),
(24, 20, 'Create Payroll', 'payroll.create', 'Create Payroll'),
(25, 0, 'Expenses', 'expenses', 'Access Expenses Module'),
(26, 25, 'View Expenses', 'expenses.view', 'View Expenses'),
(27, 25, 'Create Expenses', 'expenses.create', 'Create Expenses'),
(28, 25, 'Update Expenses', 'expenses.update', 'Update Expenses'),
(29, 25, 'Delete Expenses', 'expenses.delete', 'Delete Expenses'),
(30, 0, 'Other Income', 'other_income', 'Access Other Income Module'),
(31, 30, 'View Other Income', 'other_income.view', 'View Other income'),
(32, 30, 'Create Other Income', 'other_income.create', 'Create other income'),
(33, 30, 'Update Other Income', 'other_income.update', 'Update Other Incom'),
(34, 30, 'Delete Other Income', 'other_income.delete', 'Delete other income'),
(35, 0, 'Collateral', 'collateral', 'Access Collateral Module'),
(36, 35, 'View collateral', 'collateral.view', 'View Collateral'),
(37, 35, 'Update Collateral', 'collateral.update', 'Update Collateral'),
(38, 35, 'Create Collateral', 'collateral.create', 'Create Collateral'),
(39, 35, 'Delete Collateral', 'collateral.delete', 'Delete Collateral'),
(40, 0, 'Reports', 'reports', 'Access Reports Module'),
(41, 0, 'Communication', 'communication', 'Access Communication Module'),
(42, 41, 'Create Communication', 'communication.create', 'Send Emails & SMS'),
(43, 41, 'Delete Communication', 'communication.delete', 'Delete Communication'),
(44, 0, 'Custom Fields', 'custom_fields', 'Access Custom Fields Module'),
(45, 44, 'View Custom Fields', 'custom_fields.view', 'View Custom fields'),
(46, 44, 'Create Custom Fields', 'custom_fields.create', 'Create Custom Fields'),
(47, 44, 'Custom Fields', 'custom_fields.update', 'Update Custom Fields'),
(48, 44, 'Delete Custom Fields', 'custom_fields.delete', 'Delete Custom Fields'),
(49, 0, 'Users', 'users', 'Access Users Module'),
(50, 49, 'View Users', 'users.view', 'View Users '),
(51, 49, 'Create Users', 'users.create', 'Create users'),
(52, 49, 'Update Users', 'users.update', 'Update Users'),
(53, 49, 'Delete Users', 'users.delete', 'Delete Users'),
(54, 49, 'Manage Roles', 'users.roles', 'Manage user roles'),
(55, 0, 'Settings', 'settings', 'Manage Settings'),
(56, 0, 'Audit Trail', 'audit_trail', 'Access Audit Trail'),
(57, 0, 'Savings', 'savings', 'Access Savings Menu'),
(58, 57, 'Create Savings', 'savings.create', ''),
(59, 57, 'Update Savings', 'savings.update', ''),
(60, 57, 'Delete Savings', 'savings.delete', ''),
(61, 57, 'Create Savings Transaction', 'savings.transactions.create', ''),
(62, 57, 'Update Savings Transaction', 'savings.transactions.update', ''),
(63, 57, 'Delete Savings Transaction', 'savings.transactions.delete', ''),
(64, 57, 'View Savings', 'savings.view', ''),
(65, 57, 'View Savings Transaction', 'savings.transactions.view', ''),
(66, 57, 'Manage Savings Products', 'savings.products', 'Manage Savings Products'),
(67, 57, 'Manage Savings Fees', 'savings.fees', ''),
(68, 6, 'Approve Beneficiary Package', 'packages.approve', 'Approve Beneficiary Package'),
(69, 6, 'Disburse Beneficiary Package', 'loans.disburse', 'Disburse Beneficiary Package'),
(70, 1, 'Approve Beneficiaries', 'beneficiaries.approve', 'Approve Beneficiaries'),
(71, 6, 'Withdraw Beneficiary Package', 'loans.withdraw', 'Withdraw Beneficiary Package'),
(72, 6, 'Write Off Beneficiary Package', 'loans.writeoff', 'Write off Beneficiary Package'),
(73, 6, 'Reschedule Beneficiary Package', 'loans.reschedule', 'Reschedule Beneficiary Package'),
(74, 0, 'Dashboard', 'dashboard', 'Access Dashboard'),
(75, 74, 'Loans Released Monthly Graph', 'dashboard.loans_released_monthly_graph', 'Access Loans Released Monthly Graph'),
(76, 74, 'Loans Collected Monthly Graph', 'dashboard.loans_collected_monthly_graph', 'Access Loans Collected Monthly Graph'),
(77, 74, 'Registered Borrowers', 'dashboard.registered_borrowers', 'Access Registered Borrowers Statistics'),
(78, 74, 'Total Loans Released', 'dashboard.total_loans_released', 'Access Total Loans Released'),
(79, 74, 'Total Collections', 'dashboard.total_collections', 'Access Total Collections Statistics'),
(80, 74, 'Total Disbursed Loans', 'dashboard.loans_disbursed', 'Access Total Disbursed Loans Statistics'),
(81, 74, 'Total Loans Pending', 'dashboard.loans_pending', ''),
(82, 74, 'Beneficiary Package Approved', 'dashboard.loans_approved', ''),
(83, 74, 'Beneficiary Package Declined', 'dashboard.loans_declined', ''),
(84, 74, 'Beneficiary Package Closed', 'dashboard.loans_closed', ''),
(85, 74, 'Beneficiary Package Withdrawn', 'dashboard.loans_withdrawn', ''),
(86, 74, 'Beneficiary Package Written Off', 'dashboard.loans_written_off', ''),
(87, 74, 'Beneficiary Package Rescheduled', 'dashboard.loans_rescheduled', ''),
(92, 0, 'Capital', 'capital', 'Access Capital'),
(93, 92, 'View  Capital', 'capital.view', ''),
(94, 92, 'Create Capital', 'capital.create', ''),
(95, 92, 'Update Capital', 'capital.update', ''),
(96, 92, 'Delete Capital', 'capital.delete', ''),
(97, 0, 'Assets', 'assets', 'Access Assets Menu'),
(98, 97, 'Create Assets', 'assets.create', ''),
(99, 97, 'View Assets', 'assets.view', ''),
(100, 97, 'Update Assets', 'assets.update', ''),
(101, 97, 'Delete Assets', 'assets.delete', ''),
(102, 1, 'Blacklist Beneficiary', 'beneficiaries.blacklist', 'Blacklist beneficiary'),
(103, 1, 'Manage Beneficiary Groups', 'beneficiary.groups', ''),
(105, 0, 'Branches', 'branches', 'Access Branches menu'),
(106, 105, 'View Branches', 'branches.view', ''),
(107, 105, 'Create Branches', 'branches.create', ''),
(108, 105, 'Update Branches', 'branches.update', ''),
(109, 105, 'Delete Branches', 'branches.delete', ''),
(110, 105, 'Assign Users', 'branches.assign', '');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(35, 1, 'Y3pgTf4fmd8r6ZaPxaDxJTZ214bSOeCc', '2019-06-18 12:25:15', '2019-06-18 12:25:15'),
(36, 1, 'tHDxEd7hNjqznLsCXCMPgX1axmRfouZZ', '2019-06-18 12:25:35', '2019-06-18 12:25:35'),
(37, 1, 'abr6R4anbglswoqzltqKpuWjnmDp9zId', '2019-06-19 06:43:14', '2019-06-19 06:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `provision_rates`
--

CREATE TABLE `provision_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `rate` double(10,2) NOT NULL DEFAULT '0.00',
  `notes` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provision_rates`
--

INSERT INTO `provision_rates` (`id`, `name`, `days`, `rate`, `notes`) VALUES
(1, 'Current', 0, 0.00, NULL),
(2, 'Especially Mentioned', 31, 5.00, NULL),
(3, 'Substandard', 61, 10.00, NULL),
(4, 'Doubtful', 91, 50.00, NULL),
(5, 'Loss', 181, 100.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"beneficiaries\":true,\"beneficiaries.view\":true,\"beneficiaries.update\":true,\"beneficiaries.delete\":true,\"beneficiaries.create\":true,\"beneficiaries.approve\":true,\"beneficiaries.blacklist\":true,\"beneficiary.groups\":true,\"packages\":true,\"packages.create\":true,\"packages.update\":true,\"packages.delete\":true,\"packages.view\":true,\"packages.products\":true,\"packages.fees\":true,\"loans.schedule\":true,\"packages.approve\":true,\"loans.disburse\":true,\"loans.withdraw\":true,\"loans.writeoff\":true,\"loans.reschedule\":true,\"payroll\":true,\"payroll.view\":true,\"payroll.update\":true,\"payroll.delete\":true,\"payroll.create\":true,\"expenses\":true,\"expenses.view\":true,\"expenses.create\":true,\"expenses.update\":true,\"expenses.delete\":true,\"other_income\":true,\"other_income.view\":true,\"other_income.create\":true,\"other_income.update\":true,\"other_income.delete\":true,\"collateral\":true,\"collateral.view\":true,\"collateral.update\":true,\"collateral.create\":true,\"collateral.delete\":true,\"reports\":true,\"communication\":true,\"communication.create\":true,\"communication.delete\":true,\"custom_fields\":true,\"custom_fields.view\":true,\"custom_fields.create\":true,\"custom_fields.update\":true,\"custom_fields.delete\":true,\"users\":true,\"users.view\":true,\"users.create\":true,\"users.update\":true,\"users.delete\":true,\"users.roles\":true,\"settings\":true,\"audit_trail\":true,\"savings\":true,\"savings.create\":true,\"savings.update\":true,\"savings.delete\":true,\"savings.transactions.create\":true,\"savings.transactions.update\":true,\"savings.transactions.delete\":true,\"savings.view\":true,\"savings.transactions.view\":true,\"savings.products\":true,\"savings.fees\":true,\"dashboard\":true,\"dashboard.loans_released_monthly_graph\":true,\"dashboard.loans_collected_monthly_graph\":true,\"dashboard.registered_borrowers\":true,\"dashboard.total_loans_released\":true,\"dashboard.total_collections\":true,\"dashboard.loans_disbursed\":true,\"dashboard.loans_pending\":true,\"dashboard.loans_approved\":true,\"dashboard.loans_declined\":true,\"dashboard.loans_closed\":true,\"dashboard.loans_withdrawn\":true,\"dashboard.loans_written_off\":true,\"dashboard.loans_rescheduled\":true,\"capital\":true,\"capital.view\":true,\"capital.create\":true,\"capital.update\":true,\"capital.delete\":true,\"assets\":true,\"assets.create\":true,\"assets.view\":true,\"assets.update\":true,\"assets.delete\":true,\"branches\":true,\"branches.view\":true,\"branches.create\":true,\"branches.update\":true,\"branches.delete\":true,\"branches.assign\":true}', NULL, '2019-06-10 11:31:15'),
(4, 'moses', 'Moses', '{\"beneficiaries\":true,\"beneficiaries.view\":true,\"beneficiaries.update\":true,\"beneficiaries.delete\":true,\"beneficiaries.create\":true,\"beneficiaries.approve\":true,\"beneficiaries.blacklist\":true,\"beneficiary.groups\":true,\"branches.view\":true}', '2019-06-07 07:50:41', '2019-06-10 11:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-08-07 08:51:00', '2017-08-07 08:51:00'),
(4, 4, '2019-06-07 07:51:09', '2019-06-07 07:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `borrower_id` int(10) UNSIGNED DEFAULT NULL,
  `savings_product_id` int(10) UNSIGNED DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_fees`
--

CREATE TABLE `savings_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `savings_products` text COLLATE utf8_unicode_ci,
  `amount` decimal(10,2) DEFAULT '0.00',
  `fees_posting` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fees_adding` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_fee_type` enum('full','pro_rata') COLLATE utf8_unicode_ci DEFAULT 'full',
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_products`
--

CREATE TABLE `savings_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `allow_overdraw` tinyint(4) NOT NULL DEFAULT '0',
  `interest_rate` decimal(10,2) DEFAULT NULL,
  `minimum_balance` int(11) DEFAULT '0',
  `interest_posting` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interest_adding` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_transactions`
--

CREATE TABLE `savings_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `borrower_id` int(10) UNSIGNED DEFAULT NULL,
  `savings_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `type` enum('deposit','withdrawal','bank_fees','interest','dividend','guarantee','guarantee_restored') COLLATE utf8_unicode_ci DEFAULT NULL,
  `system_interest` tinyint(4) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'allow_self_registration', '0'),
(2, 'allow_client_login', '1'),
(3, 'welcome_note', 'Welcome to our company. You can login with your username and password'),
(4, 'allow_client_apply', '0'),
(5, 'enable_online_payment', '0'),
(6, 'paynow_key', ''),
(7, 'paynow_id', ''),
(8, 'paypal_enabled', '0'),
(9, 'paynow_enabled', '0'),
(10, 'client_registration_required_fields', ''),
(11, 'client_auto_activate_account', '0'),
(12, 'client_request_guarantor', '0'),
(13, 'auto_post_savings_interest', '0'),
(14, 'company_name', 'Beneficiary Management System'),
(15, 'company_address', 'http://www.webstudio.co.zw'),
(16, 'company_currency', 'UGX'),
(17, 'company_website', 'http://www.redcross.co.ug'),
(18, 'company_country', 'UG'),
(19, 'system_version', '1.3'),
(20, 'sms_enabled', '1'),
(21, 'active_sms', 'clickatell'),
(22, 'portal_address', 'Kampala'),
(23, 'company_email', 'info@redcross.co.ug'),
(24, 'currency_symbol', 'UGX'),
(25, 'currency_position', 'left'),
(26, 'company_logo', 'logo.jpg'),
(27, 'twilio_sid', ''),
(28, 'twilio_token', ''),
(29, 'twilio_phone_number', ''),
(30, 'routesms_host', ''),
(31, 'routesms_username', ''),
(32, 'routesms_password', ''),
(33, 'routesms_port', ''),
(34, 'sms_sender', ''),
(35, 'clickatell_username', ''),
(36, 'clickatell_password', ''),
(37, 'clickatell_api_id', ''),
(38, 'paypal_email', ''),
(39, 'currency', 'USD'),
(40, 'password_reset_subject', 'Password reset instructions'),
(41, 'password_reset_template', 'Password reset instructions'),
(42, 'payment_received_sms_template', 'Dear {borrowerFirstName}, we have received your payment of ${paymentAmount} for loan {loanNumber}. New loan balance:${loanBalance}. Thank you'),
(43, 'payment_received_email_template', '<p>Dear {borrowerFirstName}, we have received your payment of ${paymentAmount} for loan {loanNumber}. New loan balance:${loanBalance}. Thank you</p>'),
(44, 'payment_received_email_subject', 'Payment Received'),
(45, 'payment_email_subject', 'Payment Receipt'),
(46, 'payment_email_template', '<p>Dear {borrowerFirstName}, find attached receipt of your payment of ${paymentAmount} for loan {loanNumber} on {paymentDate}. New loan balance:${loanBalance}. Thank you</p>'),
(47, 'borrower_statement_email_subject', 'Client Statement'),
(48, 'borrower_statement_email_template', '<p>Dear {borrowerFirstName}, find attached statement of your loans with us. Thank you</p>'),
(49, 'loan_statement_email_subject', 'Loan Statement'),
(50, 'loan_statement_email_template', '<p>Dear {borrowerFirstName}, find attached loan statement for loan {loanNumber}. Thank you</p>'),
(51, 'loan_schedule_email_subject', 'Loan Schedule'),
(52, 'loan_schedule_email_template', '<p>Dear {borrowerFirstName}, find attached loan schedule for loan {loanNumber}. Thank you</p>'),
(53, 'cron_last_run', '2017-08-12 03:45:42'),
(54, 'auto_apply_penalty', '1'),
(55, 'auto_payment_receipt_sms', '0'),
(56, 'auto_payment_receipt_email', '1'),
(57, 'auto_repayment_sms_reminder', '0'),
(58, 'auto_repayment_email_reminder', '1'),
(59, 'auto_repayment_days', '4'),
(60, 'auto_overdue_repayment_sms_reminder', '0'),
(61, 'auto_overdue_repayment_email_reminder', '1'),
(62, 'auto_overdue_repayment_days', '2'),
(63, 'auto_overdue_loan_sms_reminder', '0'),
(64, 'auto_overdue_loan_email_reminder', '1'),
(65, 'auto_overdue_loan_days', '2'),
(66, 'loan_overdue_email_subject', 'Loan Overdue'),
(67, 'loan_overdue_email_template', '<p>Dear {borrowerFirstName}, Your loan {loanNumber} is overdue. Please make your payment. Thank you</p>'),
(68, 'loan_overdue_sms_template', 'Dear {borrowerFirstName}, Your loan {loanNumber} is overdue. Please make your payment. Thank you'),
(69, 'loan_payment_reminder_subject', 'Upcoming Payment Reminder'),
(70, 'loan_payment_reminder_email_template', '<p>Dear {borrowerFirstName},You have an upcoming payment of {paymentAmount} due on {paymentDate} for loan {loanNumber}. Please make your payment. Thank you</p>'),
(71, 'loan_payment_reminder_sms_template', 'Dear {borrowerFirstName},You have an upcoming payment of {paymentAmount} due on {paymentDate} for loan {loanNumber}. Please make your payment. Thank you'),
(72, 'missed_payment_email_subject', 'Missed Payment'),
(73, 'missed_payment_email_template', '<p>Dear {borrowerFirstName},You missed payment of {paymentAmount} which was due on {paymentDate} for loan {loanNumber}. Please make your payment. Thank you</p>'),
(74, 'missed_payment_sms_template', 'Dear {borrowerFirstName},You missed  payment of {paymentAmount} which was due on {paymentDate} for loan {loanNumber}. Please make your payment. Thank you'),
(75, 'enable_cron', '1'),
(76, 'infobip_username', ''),
(77, 'infobip_password', ''),
(78, 'update_url', 'http://webstudio.co.zw/ulm/update'),
(79, 'client_login_background', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `recipients` int(10) UNSIGNED NOT NULL,
  `send_to` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `gateway` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-06-07 07:00:28', '2019-06-07 07:00:28'),
(2, NULL, 'ip', '::1', '2019-06-07 07:00:28', '2019-06-07 07:00:28'),
(3, NULL, 'global', NULL, '2019-06-10 09:50:22', '2019-06-10 09:50:22'),
(4, NULL, 'ip', '::1', '2019-06-10 09:50:22', '2019-06-10 09:50:22'),
(5, 4, 'user', NULL, '2019-06-10 09:50:22', '2019-06-10 09:50:22'),
(6, NULL, 'global', NULL, '2019-06-10 09:50:40', '2019-06-10 09:50:40'),
(7, NULL, 'ip', '::1', '2019-06-10 09:50:40', '2019-06-10 09:50:40'),
(8, 4, 'user', NULL, '2019-06-10 09:50:40', '2019-06-10 09:50:40'),
(9, NULL, 'global', NULL, '2019-06-10 09:50:47', '2019-06-10 09:50:47'),
(10, NULL, 'ip', '::1', '2019-06-10 09:50:47', '2019-06-10 09:50:47'),
(11, 4, 'user', NULL, '2019-06-10 09:50:47', '2019-06-10 09:50:47'),
(12, NULL, 'global', NULL, '2019-06-10 09:50:52', '2019-06-10 09:50:52'),
(13, NULL, 'ip', '::1', '2019-06-10 09:50:52', '2019-06-10 09:50:52'),
(14, 4, 'user', NULL, '2019-06-10 09:50:52', '2019-06-10 09:50:52'),
(15, NULL, 'global', NULL, '2019-06-10 09:51:44', '2019-06-10 09:51:44'),
(16, NULL, 'ip', '::1', '2019-06-10 09:51:44', '2019-06-10 09:51:44'),
(17, 4, 'user', NULL, '2019-06-10 09:51:44', '2019-06-10 09:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `address`, `phone`, `city`, `gender`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'redcross@co.ug', '$2y$10$WoBortx0KhphNg7Zf8F9S.UrYPmy/D.JVHRFscrleINeVzGhF.z26', '', '2019-06-19 06:43:14', 'Super', 'Administrator', '', '', NULL, 'Male', '', '2017-08-07 08:51:00', '2019-06-19 06:43:14'),
(4, 'twesigyemoses1@gmail.com', '$2y$10$P98wUzx6yMRVDuSOLP42AODQH3eU/CKH5cqIEeg18mJZ.43A4YQwG', NULL, '2019-06-10 11:03:13', 'Innocent', 'Moses', '', '0788687903', NULL, 'Male', '', '2019-06-07 07:51:08', '2019-06-10 11:03:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_valuations`
--
ALTER TABLE `asset_valuations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`user_id`,`first_name`,`last_name`,`gender`,`country`,`title`);

--
-- Indexes for table `beneficiary_groups`
--
ALTER TABLE `beneficiary_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_group_members`
--
ALTER TABLE `beneficiary_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_users`
--
ALTER TABLE `branch_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collateral`
--
ALTER TABLE `collateral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collateral_types`
--
ALTER TABLE `collateral_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields_meta`
--
ALTER TABLE `custom_fields_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantor`
--
ALTER TABLE `guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_income`
--
ALTER TABLE `other_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_income_types`
--
ALTER TABLE `other_income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_status`
--
ALTER TABLE `package_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_meta`
--
ALTER TABLE `payroll_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_templates`
--
ALTER TABLE `payroll_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_template_meta`
--
ALTER TABLE `payroll_template_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `provision_rates`
--
ALTER TABLE `provision_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings_fees`
--
ALTER TABLE `savings_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings_products`
--
ALTER TABLE `savings_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings_transactions`
--
ALTER TABLE `savings_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_setting_key_unique` (`setting_key`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_types`
--
ALTER TABLE `asset_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_valuations`
--
ALTER TABLE `asset_valuations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beneficiary_groups`
--
ALTER TABLE `beneficiary_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiary_group_members`
--
ALTER TABLE `beneficiary_group_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `branch_users`
--
ALTER TABLE `branch_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `capital`
--
ALTER TABLE `capital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collateral_types`
--
ALTER TABLE `collateral_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_fields_meta`
--
ALTER TABLE `custom_fields_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_income`
--
ALTER TABLE `other_income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_income_types`
--
ALTER TABLE `other_income_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_status`
--
ALTER TABLE `package_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_meta`
--
ALTER TABLE `payroll_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_templates`
--
ALTER TABLE `payroll_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_template_meta`
--
ALTER TABLE `payroll_template_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `provision_rates`
--
ALTER TABLE `provision_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings_fees`
--
ALTER TABLE `savings_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings_products`
--
ALTER TABLE `savings_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings_transactions`
--
ALTER TABLE `savings_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
