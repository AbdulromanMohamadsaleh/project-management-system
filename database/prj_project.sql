-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 03:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj_project`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prj_activity_task`
--

CREATE TABLE `prj_activity_task` (
  `TASK_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TASK_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DAY` smallint(10) DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=> not Finish, 1=> Finished',
  `TASK_BUDGET` int(10) NOT NULL DEFAULT 0,
  `TASK_NOTE` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `COPLETE_TIME` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `START_DATE` timestamp NULL DEFAULT NULL,
  `TASK_ORDER` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `DATE_PAYMENT` date DEFAULT NULL,
  `USER_PAYMENT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS_PAYMENT` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> NOT PAID , 1=>PAID',
  `COMPLETED_BY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ASSIGN_TO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `END_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `TASK_BUDGET`, `TASK_NOTE`, `COPLETE_TIME`, `START_DATE`, `TASK_ORDER`, `created_at`, `updated_at`, `DATE_PAYMENT`, `USER_PAYMENT`, `STATUS_PAYMENT`, `COMPLETED_BY`, `ASSIGN_TO`, `END_DATE`) VALUES
('TASK0007', 'Design Login', 'ACT0004', 2, 1, 400, NULL, '2023-03-02 20:14:53', '2023-01-10 17:00:00', 0, '2023-01-18 09:10:14', '2023-01-18 09:41:46', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:33'),
('TASK0008', 'Design Dashboard', 'ACT0004', 3, 1, 0, NULL, '2023-03-02 20:14:57', '2023-01-08 17:00:00', 0, '2023-01-18 09:10:14', '2023-01-18 10:02:33', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:36'),
('TASK0009', 'Design Home Page', 'ACT0004', 2, 1, 0, NULL, '2023-03-02 20:15:32', '2023-01-31 17:00:00', 0, '2023-01-18 09:10:14', '2023-01-18 10:02:45', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:39'),
('TASK0010', 'Create TABLE', 'ACT0005', 1, 1, 0, NULL, '2023-03-02 20:15:36', '2023-01-02 17:00:00', 1, '2023-01-18 09:10:14', '2023-01-18 10:03:00', NULL, '', 0, 'USER00004', NULL, '2023-02-28 14:19:52'),
('TASK0011', 'Make Controller', 'ACT0005', 2, 1, 0, NULL, '2023-03-05 10:57:53', '2023-02-27 17:00:00', 3, '2023-01-18 09:10:14', '2023-02-23 20:51:50', NULL, '', 0, 'USER00004', NULL, '2023-03-06 10:42:09'),
('TASK0012', 'Test', 'ACT0005', 1, 1, 33, NULL, '2023-03-02 20:15:54', '2023-01-06 17:00:00', 2, '2023-01-18 09:10:14', '2023-02-15 18:51:42', '2023-02-16', 'USER00004', 1, 'USER00004', NULL, '2023-02-28 14:19:52'),
('TASK0013', 'Code The Ui', 'ACT0006', 2, 1, 0, NULL, '2023-03-02 20:16:13', '2023-01-05 17:00:00', 2, '2023-01-18 09:10:14', '2023-01-18 10:03:42', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:47'),
('TASK0014', 'Add Functionality', 'ACT0006', 3, 1, 0, NULL, '2023-03-02 20:16:17', '2023-01-04 17:00:00', 1, '2023-01-18 09:10:14', '2023-01-18 10:03:46', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:49'),
('TASK0015', 'Test', 'ACT0006', 1, 1, 0, NULL, '2023-03-02 20:16:21', '2023-01-20 17:00:00', 3, '2023-01-18 09:10:14', '2023-01-18 10:03:56', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:20:51'),
('TASK0016', 'Make Logo', 'ACT0007', 2, 1, 0, NULL, '2023-03-02 20:16:25', '2023-01-07 17:00:00', 2, '2023-01-18 09:10:14', '2023-02-15 19:14:09', '2023-02-16', 'USER00004', 1, 'USER00004', NULL, '2023-02-24 03:20:54'),
('TASK0017', 'Test', 'ACT0007', 1, 1, 500, NULL, '2023-03-02 20:16:31', '2023-01-25 17:00:00', 1, '2023-01-18 09:10:14', '2023-02-15 06:33:38', '2023-02-15', 'USER00004', 1, 'USER00004', NULL, '2023-02-24 03:20:58'),
('TASK0018', 'Test Ui', 'ACT0008', 4, 1, 0, NULL, '2023-03-02 20:16:35', '2023-01-10 17:00:00', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:24', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:21:00'),
('TASK0019', 'Test Functionality', 'ACT0008', 4, 1, 0, NULL, '2023-03-05 10:43:48', '2023-02-23 17:00:00', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:34', NULL, '', 0, 'USER00004', NULL, '2023-03-07 03:21:03'),
('TASK0020', 'Buy Domain Name', 'ACT0009', 1, 1, 0, 'gdhgd', '2023-03-02 20:16:47', '2023-01-24 17:00:00', 1, '2023-01-18 09:10:14', '2023-01-18 10:24:32', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:21:07'),
('TASK0021', 'Buy Host', 'ACT0009', 2, 1, 400, NULL, '2023-03-02 20:16:52', '2023-01-02 17:00:00', 4, '2023-01-18 09:10:14', '2023-02-15 19:12:55', '2023-02-16', 'USER00004', 1, 'USER00004', NULL, '2023-02-24 03:21:09'),
('TASK0022', 'Config the host', 'ACT0009', 4, 1, 10000, NULL, '2023-03-02 20:17:01', '2023-01-19 17:00:00', 2, '2023-01-18 09:10:14', '2023-01-18 10:27:28', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:21:13'),
('TASK0023', 'Deploy', 'ACT0009', 2, 1, 5000, NULL, '2023-03-02 20:17:06', '2023-01-03 17:00:00', 3, '2023-01-18 09:10:14', '2023-01-18 10:27:33', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:21:15'),
('TASK0024', 'Colton Lott', 'ACT0010', 10, 1, 0, NULL, '2023-03-02 20:17:11', '2022-12-12 17:00:00', 0, '2023-02-17 20:35:37', '2023-02-17 20:43:46', NULL, '', 0, 'USER00004', NULL, '2023-02-24 03:21:17'),
('TASK0025', 'Hannah Foley', 'ACT0010', 15, 1, 0, NULL, '2023-03-02 20:30:42', '2023-02-19 17:00:00', 0, '2023-02-17 20:35:37', '2023-02-28 08:40:29', NULL, '', 0, 'USER00004', NULL, '2023-02-27 17:00:00'),
('TASK0026', 'Deirdre Burris', 'ACT0010', 12, 0, 0, NULL, NULL, NULL, 0, '2023-02-17 20:35:37', '2023-02-17 20:35:37', NULL, '', 0, NULL, NULL, NULL),
('TASK0027', 'Iris Carver', 'ACT0010', 16, 0, 0, NULL, NULL, NULL, 0, '2023-02-17 20:35:37', '2023-02-17 20:35:37', NULL, '', 0, NULL, NULL, NULL),
('TASK0028', 'Zachery Porter', 'ACT0011', 0, 1, 0, NULL, '2023-03-05 09:24:33', '2023-02-21 17:00:00', 2, '2023-02-17 20:35:37', '2023-02-27 11:13:07', NULL, '', 0, 'USER00004', NULL, '2023-02-26 17:00:00'),
('TASK0029', 'Anne Walsh', 'ACT0011', 11, 1, 0, NULL, '2023-03-05 09:24:29', '2023-02-17 17:00:00', 3, '2023-02-17 20:35:37', '2023-02-17 20:43:55', NULL, '', 0, 'USER00004', NULL, '2023-02-27 18:13:04'),
('TASK0030', 'Ivana Fischer', 'ACT0011', 7, 1, 0, NULL, '2023-03-06 03:28:48', '2023-02-17 17:00:00', 1, '2023-02-17 20:35:37', '2023-02-17 20:35:37', NULL, '', 0, 'USER00004', NULL, '2023-02-27 18:13:04'),
('TASK0031', 'Shellie Bean', 'ACT0012', 17, 0, 0, NULL, '2023-03-05 09:23:50', '2023-02-20 17:00:00', 3, '2023-02-17 20:35:37', '2023-02-19 12:52:27', NULL, '', 0, NULL, NULL, '2023-03-15 17:00:00'),
('TASK0032', 'Ocean Shelton', 'ACT0012', 13, 0, 0, NULL, '2023-03-05 09:23:50', '2023-02-18 17:00:00', 2, '2023-02-17 20:35:37', '2023-02-17 20:35:37', NULL, '', 0, NULL, NULL, '2023-02-19 20:58:50'),
('TASK0033', 'Germane Weiss', 'ACT0012', 18, 0, 0, NULL, '2023-03-07 02:22:16', '2023-02-20 17:00:00', 1, '2023-02-17 20:35:37', '2023-03-06 19:22:16', NULL, '', 0, NULL, NULL, '2023-03-06 17:00:00'),
('TASK0034', 'Duncan Carey', 'ACT0013', 19, 1, 0, NULL, '2023-03-05 09:23:16', '2023-02-17 17:00:00', 1, '2023-02-17 20:35:37', '2023-02-17 21:11:37', NULL, '', 0, 'USER00004', NULL, '2023-02-27 18:05:27'),
('TASK0035', 'Zelda Hogan', 'ACT0013', 3, 0, 0, NULL, '2023-03-05 09:23:16', '2023-02-19 17:00:00', 2, '2023-02-17 20:35:37', '2023-02-19 12:56:43', NULL, '', 0, NULL, NULL, '2023-03-01 17:00:00'),
('TASK0036', 'Raymond Reese', 'ACT0014', 4, 0, 0, NULL, '2023-03-02 20:31:17', '2023-02-22 17:00:00', 0, '2023-02-19 08:06:13', '2023-02-23 01:40:38', NULL, '', 0, NULL, NULL, '2023-02-23 09:04:59'),
('TASK0037', 'Quamar Roman', 'ACT0014', 3, 0, 0, NULL, '2023-02-23 08:58:22', '2023-02-26 17:00:00', 0, '2023-02-19 08:06:13', '2023-02-23 01:52:45', NULL, '', 0, NULL, NULL, '2023-02-28 17:00:00'),
('TASK0038', 'Brendan Gallagher', 'ACT0014', 6, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0039', 'Channing Mendez', 'ACT0015', 6, 1, 0, NULL, '2023-03-02 20:31:25', '2023-02-26 17:00:00', 0, '2023-02-19 08:06:13', '2023-02-26 20:49:50', NULL, '', 0, 'USER00004', NULL, '2023-02-26 17:00:00'),
('TASK0040', 'Quin Rodgers', 'ACT0015', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0041', 'Mechelle Black', 'ACT0016', 7, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0042', 'Michael Mcguire', 'ACT0016', 8, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0043', 'Maggie Blair', 'ACT0017', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0044', 'Raya Fowler', 'ACT0017', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', NULL, '', 0, NULL, NULL, NULL),
('TASK0046', 'Erich Norton', 'ACT0019', 3, 1, 0, NULL, '2023-03-07 02:52:29', '2023-02-26 17:00:00', 0, '2023-02-23 19:55:15', '2023-03-06 19:52:29', NULL, '', 0, 'USER00004', NULL, '2023-03-02 17:00:00'),
('TASK0047', 'Elmo Combs', 'ACT0019', 4, 1, 0, NULL, '2023-03-02 20:31:37', '2023-02-26 17:00:00', 0, '2023-02-23 19:55:15', '2023-02-26 23:37:18', NULL, '', 0, 'USER00004', NULL, '2023-02-26 17:00:00'),
('TASK0048', 'Otto Estrada', 'ACT0019', 6, 1, 0, NULL, '2023-03-02 20:31:46', '2023-02-23 17:00:00', 0, '2023-02-23 19:55:15', '2023-02-26 23:40:35', NULL, '', 0, 'USER00004', NULL, '2023-03-06 17:00:00'),
('TASK0049', 'Melinda Coleman', 'ACT0020', 5, 0, 0, NULL, '2023-03-07 03:10:22', '2023-02-28 17:00:00', 0, '2023-02-23 19:55:15', '2023-03-06 20:10:22', NULL, '', 0, NULL, NULL, '2023-03-06 17:00:00'),
('TASK0050', 'Fritz Sharp', 'ACT0020', 2, 1, 0, NULL, '2023-03-01 17:00:00', '2023-03-02 17:00:00', 0, '2023-02-23 19:55:15', '2023-03-02 13:46:04', NULL, '', 0, 'USER00004', NULL, '2023-03-03 17:00:00'),
('TASK0051', 'Riley Buck', 'ACT0021', 6, 0, 0, NULL, '2023-03-02 20:35:07', '2023-02-28 17:00:00', 0, '2023-02-23 19:55:15', '2023-03-02 13:35:07', NULL, '', 0, NULL, NULL, '2023-03-05 17:00:00'),
('TASK0052', 'Herman Cherry', 'ACT0022', 2, 0, 0, NULL, '2023-03-02 20:31:57', '2027-10-27 17:00:00', 0, '2023-02-26 23:45:35', '2023-02-27 00:55:49', NULL, '', 0, NULL, NULL, '2023-02-27 07:55:49'),
('TASK0053', 'Sophia Barry', 'ACT0022', 12, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0054', 'Bradley Clayton', 'ACT0022', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0055', 'Francesca King', 'ACT0022', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0056', 'Alden Ball', 'ACT0022', 8, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0057', 'Lareina House', 'ACT0022', 10, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0058', 'Kimberley Sweet', 'ACT0022', 9, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0059', 'Kylan Lawrence', 'ACT0023', 7, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0060', 'Thane Maddox', 'ACT0023', 5, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0061', 'Simon Diaz', 'ACT0023', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0062', 'Russell Macias', 'ACT0024', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0063', 'Zeph Preston', 'ACT0024', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0064', 'Marsden Hancock', 'ACT0024', 5, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0065', 'Laith Cobb', 'ACT0024', 3, 0, 0, NULL, '2023-03-02 20:32:05', '2025-10-14 17:00:00', 0, '2023-02-26 23:45:35', '2023-02-27 00:55:29', NULL, '', 0, NULL, NULL, '2023-02-27 07:55:29'),
('TASK0066', 'Tanek Flowers', 'ACT0025', 6, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0067', 'Emerald Duran', 'ACT0025', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0068', 'Gage Brewer', 'ACT0025', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0069', 'Larissa Holden', 'ACT0026', 4, 0, 0, NULL, '2023-03-02 20:32:14', '2023-02-26 17:00:00', 0, '2023-02-26 23:45:35', '2023-02-27 00:06:55', NULL, '', 0, NULL, NULL, '2023-02-27 07:06:55'),
('TASK0070', 'Kareem Branch', 'ACT0026', 5, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0071', 'Vivian Carpenter', 'ACT0027', 1, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0072', 'Len Solomon', 'ACT0027', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0073', 'Jenna Carroll', 'ACT0027', 6, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0074', 'Patience Todd', 'ACT0028', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0075', 'Portia Petty', 'ACT0028', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0076', 'Idona Garrett', 'ACT0028', 1, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0077', 'Regan Vargas', 'ACT0028', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0078', 'Quail Baldwin', 'ACT0028', 5, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0079', 'Morgan Pratt', 'ACT0029', 8, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0080', 'Irma Irwin', 'ACT0029', 4, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0081', 'Illana Woods', 'ACT0029', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0082', 'Solomon Boyle', 'ACT0029', 3, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0083', 'Mallory Rodriquez', 'ACT0030', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0084', 'Caryn Ortiz', 'ACT0030', 2, 0, 0, NULL, NULL, NULL, 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', NULL, '', 0, NULL, NULL, NULL),
('TASK0085', 'Myra Langley', 'ACT0031', 4, 0, 4, 'sgagsgr', '2023-03-07 18:48:03', '2023-03-07 17:00:00', 0, '2023-03-01 11:13:02', '2023-03-07 11:48:03', NULL, '', 0, NULL, NULL, '2023-03-12 17:00:00'),
('TASK0086', 'Thomas Patterson', 'ACT0031', 2, 0, 0, NULL, NULL, NULL, 0, '2023-03-01 11:13:02', '2023-03-01 11:13:02', NULL, '', 0, NULL, NULL, NULL),
('TASK0087', 'Gillian Fitzpatrick', 'ACT0032', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-01 11:13:02', '2023-03-01 11:13:02', NULL, '', 0, NULL, NULL, NULL),
('TASK0088', 'Wynne Hendrix', 'ACT0033', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-01 12:08:28', '2023-03-01 12:08:28', NULL, '', 0, NULL, NULL, NULL),
('TASK0089', 'Imani Le', 'ACT0034', 3, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0090', 'Elizabeth Murphy', 'ACT0034', 14, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0091', 'Orli Miles', 'ACT0034', 6, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0092', 'Kadeem Farmer', 'ACT0034', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0093', 'Zelenia Nielsen', 'ACT0035', 7, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0094', 'Edan Bartlett', 'ACT0035', 6, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0095', 'Harrison Lawrence', 'ACT0035', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0096', 'Tucker Wallace', 'ACT0036', 2, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0097', 'Yetta Bolton', 'ACT0036', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0098', 'Stacy Leach', 'ACT0037', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0099', 'Shelby Anderson', 'ACT0037', 6, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0100', 'Keiko Bowers', 'ACT0038', 7, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0101', 'Kerry Pollard', 'ACT0040', 4, 0, 0, NULL, NULL, NULL, 0, '2023-03-07 11:48:21', '2023-03-07 11:48:21', NULL, '', 0, NULL, NULL, NULL),
('TASK0102', 'Haviva Woodward', 'ACT0039', 6, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0103', 'Jackson Hopper', 'ACT0039', 5, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL),
('TASK0104', 'Devin Snyder', 'ACT0041', 3, 0, 0, NULL, NULL, NULL, 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', NULL, '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_assigned_task`
--

CREATE TABLE `prj_assigned_task` (
  `ASSIGNED_ID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LOGIN_ID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TASK_ID` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_assigned_task`
--

INSERT INTO `prj_assigned_task` (`ASSIGNED_ID`, `LOGIN_ID`, `TASK_ID`) VALUES
('', 'USER00004', 'TASK0033'),
('', 'USER00004', 'TASK0046'),
('', 'USER00003', 'TASK0049');

-- --------------------------------------------------------

--
-- Table structure for table `prj_category`
--

CREATE TABLE `prj_category` (
  `CATEGORY_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NAME_CATEGORY` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_category`
--

INSERT INTO `prj_category` (`CATEGORY_ID`, `NAME_CATEGORY`) VALUES
('CTY0001', 'Hospital'),
('CTY0002', 'Bank'),
('CTY0003', 'School'),
('CTY0004', 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `prj_detail`
--

CREATE TABLE `prj_detail` (
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NAME_PROJECT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `REASONS` text COLLATE utf8_unicode_ci NOT NULL,
  `OBJECTIVE` text COLLATE utf8_unicode_ci NOT NULL,
  `LOCATION` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TARGET` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `BUDGET` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `RESULT` text COLLATE utf8_unicode_ci NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `RECORD_CREATOR` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_MANAGER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `TOTAL_DATE` int(50) NOT NULL,
  `IS_APPROVE` tinyint(4) NOT NULL DEFAULT 0,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> new, 1=>approved, 2=> on proggress, 3=> Complete,\r\n4=> Cancel',
  `CATEGORY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `INC_HOLIDAY` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> Not Include, 1=> Include',
  `INC_WEEKEND` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> Not Include, 1=> Include',
  `DURATION_TYPE` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => Day , 1 => Week',
  `APPROVED_BY` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `APPROVED_DATE` timestamp NULL DEFAULT NULL,
  `PROJECT_PERCENTAGE` tinyint(4) NOT NULL DEFAULT 0,
  `COMPLETED_BY` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COMPLETE_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_detail`
--

INSERT INTO `prj_detail` (`DETAIL_ID`, `NAME_PROJECT`, `REASONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `RESULT`, `DATE_START`, `DATE_END`, `created_at`, `RECORD_CREATOR`, `PROJECT_MANAGER`, `updated_at`, `TOTAL_DATE`, `IS_APPROVE`, `STATUS`, `CATEGORY_ID`, `INC_HOLIDAY`, `INC_WEEKEND`, `DURATION_TYPE`, `APPROVED_BY`, `APPROVED_DATE`, `PROJECT_PERCENTAGE`, `COMPLETED_BY`, `COMPLETE_DATE`) VALUES
('230002', 'School Website', '1-Help School\r\n2-Easy to Use\r\n3-Fast', '1-Help School\r\n2-Easy to Use\r\n3-Fast', 'Yala', 'Some School', '50000', '1-Help School\r\n2-Easy to Use\r\n3-Fast', '2023-01-02', '2023-05-12', '2023-01-18 09:10:14', 'USER00004', 'USER00005', '2023-02-23 20:51:50', 7, 1, 3, 'CTY0001', 0, 0, 1, 'USER00004', '2023-01-17 17:00:00', 100, NULL, '2023-02-23 17:00:00'),
('230003', 'TimeLine Test', 'Possimus adipisci d', 'Sed quidem officia e', 'HatYai', 'Beatae mollit possim', '10000', 'Voluptates voluptate', '2022-11-20', '2023-09-08', '2023-02-17 20:35:37', 'USER00004', 'USER0004', '2023-02-28 08:40:29', 30, 1, 2, 'CTY0002', 0, 0, 1, 'USER0004', '2023-02-17 17:00:00', 41, NULL, NULL),
('230004', 'Lillith Dillard', 'Voluptas animi et m', 'Nihil iste placeat', 'Similique laborum ex', 'Eligendi aute debiti', '58', 'Iure possimus qui e', '2023-03-08', '2023-10-03', '2023-02-19 08:06:13', 'USER00004', 'USER00005', '2023-02-26 20:49:50', 45, 1, 1, 'CTY0003', 0, 0, 0, 'USER0004', '2023-02-22 17:00:00', 11, NULL, NULL),
('230006', 'Ishmael Pate', 'Tenetur ea quisquam', 'Corrupti cupidatat', 'Vel quia autem dolor', 'Amet eos quis plac', '50000', 'Magna magnam volupta', '2023-02-24', '2023-03-30', '2023-02-23 19:55:15', 'USER00003', 'USER00005', '2023-03-02 13:46:04', 34, 1, 2, 'CTY0001', 1, 1, 0, 'USER0004', '2023-02-26 17:00:00', 66, NULL, NULL),
('230007', 'Samantha Mayo3', 'Et dolorem error rer', 'Deserunt ex duis ess', 'Sunt quis natus qui', 'Eius sunt est atqu', '50000', 'Sed ducimus ab hic', '2023-02-27', '2023-09-25', '2023-02-26 23:45:35', 'USER00004', 'USER0004', '2023-03-04 23:34:23', 150, 0, 4, 'CTY0001', 0, 0, 0, '', NULL, 0, NULL, NULL),
('230008', 'Quincy Shaffer', 'Illo inventore volup', 'Incidunt harum qui', 'Non perferendis plac', 'Nemo architecto eius', '51', 'Dolore nihil volupta', '2023-03-02', '2023-03-31', '2023-03-01 11:13:02', 'USER00007', 'USER00007', '2023-03-01 15:56:30', 3, 1, 2, 'CTY0002', 1, 0, 1, 'USER0004', '2023-02-28 17:00:00', 0, NULL, NULL),
('230009', 'Paloma Obrien', 'Dolorem voluptate at', 'Ipsum earum saepe fa', 'Accusantium unde ut', 'Amet aut sunt esse', '41', 'Vel explicabo Nostr', '1994-11-14', '1994-12-13', '2023-03-01 12:08:28', 'USER00004', 'USER00007', '2023-03-08 07:12:00', 3, 1, 4, 'CTY0003', 0, 0, 1, 'USER0004', '2023-02-28 17:00:00', 0, NULL, NULL),
('230010', 'New Test', 'Aliquip facere nulla', 'Dolor sed recusandae', 'Quis velit cillum m', 'Fugiat qui esse mol', '46', 'Eveniet dolores exp', '2023-03-08', '2023-07-26', '2023-03-08 07:38:41', 'USER00003', 'USER00005', '2023-03-08 07:38:41', 20, 0, 0, 'CTY0003', 0, 1, 1, '', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_holyday_date`
--

CREATE TABLE `prj_holyday_date` (
  `HOLYDAY_ID` varchar(20) NOT NULL,
  `HOLYDAY_NAME` varchar(50) NOT NULL,
  `HOLYDAY_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_holyday_date`
--

INSERT INTO `prj_holyday_date` (`HOLYDAY_ID`, `HOLYDAY_NAME`, `HOLYDAY_DATE`) VALUES
('01', 'New Year Holiday', '2023-01-02'),
('02', 'Chakri Day1', '2023-04-06'),
('03', 'Labour Day', '2022-02-04'),
('04', 'Coronation of King V', '2023-05-04'),
('05', 'Queen Suthida\'s Birthday Holiday', '2023-06-05'),
('06', 'King Vajiralongkorn\'s Birthday1', '2023-06-28'),
('07', ' Mother\'s Birthday Holiday', '2023-08-14'),
('08', 'Passing of His Majesty the Late King', '2023-10-13'),
('09', 'Chulalongkorn Memorial Day', '2023-10-23'),
('10', 'His Majesty the Late King\'s Birthday', '2023-12-05'),
('11', 'Constitution Day Holiday', '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `prj_position`
--

CREATE TABLE `prj_position` (
  `POS_ID` varchar(4) NOT NULL,
  `POS_NAME` varchar(50) NOT NULL,
  `POS_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_position`
--

INSERT INTO `prj_position` (`POS_ID`, `POS_NAME`, `POS_DESCRIPTION`) VALUES
('01', 'Admin', ''),
('02', 'Employee', ''),
('03', 'Project Manager', ''),
('04', 'Manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `prj_privilege`
--

CREATE TABLE `prj_privilege` (
  `PRIV_ID` varchar(4) NOT NULL,
  `PRI_NAME` varchar(50) NOT NULL,
  `PRI_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_privilege`
--

INSERT INTO `prj_privilege` (`PRIV_ID`, `PRI_NAME`, `PRI_DESCRIPTION`) VALUES
('01', 'Admin', 'All System'),
('02', 'Manager', ''),
('03', 'Project Manager', ''),
('04', 'Employee', '');

-- --------------------------------------------------------

--
-- Table structure for table `prj_profile`
--

CREATE TABLE `prj_profile` (
  `PROF_ID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LOGIN_ID` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IMG` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `NICKNAME` varchar(20) DEFAULT NULL,
  `CARD_ID` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEPHONE` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEPARTMENT` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `POS_ID` varchar(4) NOT NULL DEFAULT '04',
  `AGENCY` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_profile`
--

INSERT INTO `prj_profile` (`PROF_ID`, `LOGIN_ID`, `IMG`, `NICKNAME`, `CARD_ID`, `TELEPHONE`, `DEPARTMENT`, `POS_ID`, `AGENCY`, `created_at`, `updated_at`) VALUES
('PROF00001', '88', '1678284601.png', 'Hadi', NULL, '03243243', '32423fdg', '04', NULL, '2023-03-06 05:00:41', '2023-03-06 07:22:07'),
('PROF00003', 'USER00003', '1678284601.png', 'dhrah', '24563642462', '624426426', 'IT', '01', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41'),
('PROF00004', 'USER00004', '1678284601.png', 'Ahmed', NULL, NULL, NULL, '02', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41'),
('PROF00005', 'USER00005', '1678284601.png', NULL, NULL, NULL, NULL, '03', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41'),
('PROF00006', 'USER00006', '1678284601.png', NULL, NULL, NULL, NULL, '01', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41'),
('PROF00007', 'USER00007', '1678284601.png', NULL, NULL, NULL, NULL, '03', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41'),
('PROF00008', 'USER00008', '1678284601.png', NULL, NULL, NULL, NULL, '02', 'Test', '2023-03-06 01:50:48', '2023-03-06 01:50:48'),
('PROF00009', 'USER00009', '1678284601.png', NULL, NULL, NULL, NULL, '03', 'gw43g34', '2023-03-06 07:49:51', '2023-03-06 07:49:51'),
('PROF00010', 'USER00010', '1678284601.png', NULL, NULL, NULL, NULL, '01', 'gregae', '2023-03-06 07:52:53', '2023-03-06 07:52:53'),
('PROF0004', 'USER0004', '1678284601.png', NULL, NULL, NULL, NULL, '04', NULL, '2023-03-06 05:00:41', '2023-03-06 05:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_activity`
--

CREATE TABLE `prj_project_activity` (
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DAY_WEEK` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVITY_ORDER` tinyint(4) NOT NULL,
  `START_DATE` timestamp NULL DEFAULT NULL,
  `END_DATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_activity`
--

INSERT INTO `prj_project_activity` (`ACTIVITY_ID`, `ACTIVITY_NAME`, `DETAIL_ID`, `DAY_WEEK`, `STATUS`, `created_at`, `updated_at`, `ACTIVITY_ORDER`, `START_DATE`, `END_DATE`) VALUES
('ACT0004', 'Design UI', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-02 00:42:23', 5, '2023-01-01 17:00:00', '2023-01-17 17:00:00'),
('ACT0005', 'Login & Signup', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-23 20:51:50', 1, '2023-01-10 17:00:00', '2023-02-23 17:00:00'),
('ACT0006', 'Dashboard', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-02 00:42:23', 2, '2022-12-31 17:00:00', '2023-01-17 17:00:00'),
('ACT0007', 'Home Page', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-01-18 10:04:13', 3, '2023-01-05 17:00:00', '2023-01-17 17:00:00'),
('ACT0008', 'Testing', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-02 00:42:23', 6, '2023-01-06 17:00:00', '2023-01-17 17:00:00'),
('ACT0009', 'Deploy', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-01-18 10:27:33', 4, '2023-01-16 17:00:00', '2023-01-17 17:00:00'),
('ACT0010', 'Coby Knox', '230003', 'week', 0, '2023-02-17 20:35:37', '2023-02-17 20:37:37', 4, '2023-02-17 17:00:00', NULL),
('ACT0011', 'Jermaine Gentry', '230003', 'week', 0, '2023-02-17 20:35:37', '2023-02-17 20:37:44', 2, '2023-02-17 17:00:00', NULL),
('ACT0012', 'Heidi Gross', '230003', 'week', 0, '2023-02-17 20:35:37', '2023-03-06 19:22:16', 1, '2023-03-06 17:00:00', NULL),
('ACT0013', 'Myra Schwartz', '230003', 'week', 0, '2023-02-17 20:35:37', '2023-02-17 20:37:49', 3, '2023-02-17 17:00:00', NULL),
('ACT0014', 'Clio Rice', '230004', 'day', 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', 1, NULL, NULL),
('ACT0015', 'Quamar Doyle', '230004', 'day', 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', 2, NULL, NULL),
('ACT0016', 'Lane Hubbard', '230004', 'day', 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', 3, NULL, NULL),
('ACT0017', 'Lucas Black', '230004', 'day', 0, '2023-02-19 08:06:13', '2023-02-19 08:06:13', 4, NULL, NULL),
('ACT0019', 'Signe Chang', '230006', 'day', 1, '2023-02-23 19:55:15', '2023-02-26 23:37:51', 1, '2023-02-26 17:00:00', '2023-02-26 17:00:00'),
('ACT0020', 'Maya Santiago', '230006', 'day', 0, '2023-02-23 19:55:15', '2023-03-02 13:46:04', 2, '2023-03-01 17:00:00', NULL),
('ACT0021', 'Allegra Curry', '230006', 'day', 0, '2023-02-23 19:55:15', '2023-03-02 13:35:07', 3, '2023-03-01 17:00:00', NULL),
('ACT0022', 'Nissim Patton', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 1, NULL, NULL),
('ACT0023', 'Hadley Burks', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 3, NULL, NULL),
('ACT0024', 'Darrel Mckay', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 4, NULL, NULL),
('ACT0025', 'Germaine Merritt', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 5, NULL, NULL),
('ACT0026', 'Mufutau Bender', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 2, NULL, NULL),
('ACT0027', 'Tiger Brown', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 6, NULL, NULL),
('ACT0028', 'Lisandra West', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 7, NULL, NULL),
('ACT0029', 'Wanda Holden', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 8, NULL, NULL),
('ACT0030', 'Aphrodite Kelley', '230007', 'day', 0, '2023-02-26 23:45:35', '2023-02-26 23:45:35', 9, NULL, NULL),
('ACT0031', 'Donna Hays', '230008', 'week', 0, '2023-03-01 11:13:02', '2023-03-07 11:48:03', 1, '2023-03-06 17:00:00', NULL),
('ACT0032', 'Ora Guzman', '230008', 'week', 0, '2023-03-01 11:13:02', '2023-03-01 11:13:02', 2, NULL, NULL),
('ACT0033', 'Jacob Horn', '230009', 'week', 0, '2023-03-01 12:08:28', '2023-03-01 12:08:28', 1, NULL, NULL),
('ACT0034', 'Erasmus Duran', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 1, NULL, NULL),
('ACT0035', 'Fuller Aguirre', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 2, NULL, NULL),
('ACT0036', 'Cadman Stark', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 3, NULL, NULL),
('ACT0037', 'Bradley Wooten', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 4, NULL, NULL),
('ACT0038', 'Dean Hinton', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 5, NULL, NULL),
('ACT0039', 'Maris Cain', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 6, NULL, NULL),
('ACT0040', 'Allen Floyd', '230008', NULL, 0, '2023-03-07 11:48:21', '2023-03-07 11:48:21', 3, NULL, NULL),
('ACT0041', 'Lance Weiss', '230010', 'week', 0, '2023-03-08 07:38:41', '2023-03-08 07:38:41', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>NOT active, 1=>active, 2=> leave the company',
  `PRIV_ID` varchar(4) CHARACTER SET utf8mb4 NOT NULL,
  `LAST_LOGIN_AT` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `LAST_LOGIN_IP` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_login`
--

INSERT INTO `prj_project_login` (`LOGIN_ID`, `NAME`, `EMAIL`, `password`, `STATUS`, `PRIV_ID`, `LAST_LOGIN_AT`, `LAST_LOGIN_IP`, `updated_at`, `created_at`) VALUES
('88', 'Hadi', 'caca@gmail.com', '02222', 1, '02', '2023-03-06 14:19:47', NULL, '2023-01-03 13:06:56', '2023-01-03 13:06:56'),
('USER00003', 'Fin A', 'admin@admin.com', '$2y$10$JgYfYRKhh5AqzWiadRiN3OhuTB.3HWLa2UoERUBJNCXj1gqmMTw.K', 1, '01', '2023-03-06 08:59:06', NULL, '2023-01-04 02:06:30', '2023-01-04 02:06:30'),
('USER00004', 'Ahmed', 'user@gmail.com', '$2y$10$/I2TrHrQm1gg4SaesI7Bc.0HqmrncOYHzmeWA/gFZXtjhjyUVDji2', 1, '04', '2023-03-06 08:59:12', NULL, '2023-01-08 19:54:17', '2023-01-08 19:54:17'),
('USER00005', 'อับดุลรอมาน', 'projectmanager@manager.com', '$2y$10$t.IfkP1w.AenMvpqxch/..x5jOgmCkZhKBB7ORrxxuccvWsP592Hi', 1, '03', '2023-03-06 08:59:17', NULL, '2023-01-25 01:25:21', '2023-01-25 00:42:33'),
('USER00006', 'Abdulroman Mohamedsaleh', 'fatani-d@hotmail.com', '$2y$10$6dMK92ZYin39IwKzc.EWyelFHGVmo0KQK4ukOFnVcahJ/Gv8EmyQC', 1, '04', '2023-03-06 08:59:21', NULL, '2023-03-01 10:36:01', '2023-03-01 10:34:49'),
('USER00007', 'Boody', 'projectmanager@projectmanager.com', '$2y$10$xQLxytGj0U9gKH6tfsm2WeCS0LRyl2MxYLD.y0B2VSd.i37FMccom', 1, '03', '2023-03-06 08:59:24', NULL, '2023-03-01 11:09:59', '2023-03-01 11:09:07'),
('USER00008', 'Test', 'Test@gmail.com', '$2y$10$8x1jbPTAVgzZ0sE2b10HHu6g.8puupryhrrD1wgY98EUTuI16Jt5i', 1, '04', '2023-03-06 09:00:58', NULL, '2023-03-06 02:00:58', '2023-03-06 01:50:48'),
('USER00009', 'ewgfwwt4', 'ussddsdser@gmail.com', '$2y$10$C1mEmAUijtZ4kUYOjX1TjulrkEcTb9KsbmKGAUv.Xchyry07bpBIO', 1, '04', '2023-03-06 14:49:54', NULL, '2023-03-06 07:49:54', '2023-03-06 07:49:51'),
('USER00010', 'egewgewgew', 'admidsgdgsgdsn@admin.com', '$2y$10$H2Hm0OY2JU731an22DAX2.R6BeVwxNOkUZQ5Kg1tBvE4DKCW7H0Qu', 2, '04', '2023-03-07 18:32:51', NULL, '2023-03-06 07:52:57', '2023-03-06 07:52:53'),
('USER0004', 'Rashad Haney', 'manager@manager.com', '$2y$10$esEQBnFowrpG5c4216sYS.sGupwNS8T5BPqmwcSerEQYGJaaFrQbS', 1, '02', '2023-03-06 08:59:31', NULL, '2023-01-06 00:52:05', '2023-01-06 00:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_team`
--

CREATE TABLE `prj_project_team` (
  `TEAM_ID` int(11) NOT NULL,
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_team`
--

INSERT INTO `prj_project_team` (`TEAM_ID`, `LOGIN_ID`, `DETAIL_ID`) VALUES
(361, 'USER00004', '230002'),
(362, 'USER0004', '230002'),
(570, 'USER00003', '230003'),
(571, 'USER00004', '230003'),
(572, 'USER00003', '230003'),
(573, 'USER00004', '230003'),
(574, 'USER00004', '230004'),
(575, 'USER00005', '230004'),
(590, 'USER00003', '230006'),
(591, 'USER00004', '230006'),
(596, 'USER00003', '230007'),
(597, 'USER00005', '230007'),
(598, 'USER0004', '230007'),
(600, 'USER00003', '230008'),
(601, 'USER00007', '230008'),
(609, 'USER00004', '230009'),
(610, 'USER00005', '230009'),
(611, 'USER00007', '230009'),
(618, 'USER00004', '230008'),
(636, '88', '230010'),
(637, 'USER00003', '230010'),
(638, 'USER00004', '230010'),
(639, 'USER00005', '230010');

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
-- Indexes for dumped tables
--

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
-- Indexes for table `prj_activity_task`
--
ALTER TABLE `prj_activity_task`
  ADD PRIMARY KEY (`TASK_ID`),
  ADD KEY `ACTIVITY_ID` (`ACTIVITY_ID`);

--
-- Indexes for table `prj_assigned_task`
--
ALTER TABLE `prj_assigned_task`
  ADD KEY `LOGIN_ID` (`LOGIN_ID`),
  ADD KEY `prj_assigned_task_ibfk_2` (`TASK_ID`);

--
-- Indexes for table `prj_category`
--
ALTER TABLE `prj_category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `prj_detail`
--
ALTER TABLE `prj_detail`
  ADD PRIMARY KEY (`DETAIL_ID`),
  ADD KEY `prj_detail_ibfk_2` (`CATEGORY_ID`),
  ADD KEY `prj_detail_ibfk_1` (`PROJECT_MANAGER`),
  ADD KEY `RECORD_CREATOR` (`RECORD_CREATOR`);

--
-- Indexes for table `prj_holyday_date`
--
ALTER TABLE `prj_holyday_date`
  ADD PRIMARY KEY (`HOLYDAY_ID`);

--
-- Indexes for table `prj_position`
--
ALTER TABLE `prj_position`
  ADD PRIMARY KEY (`POS_ID`);

--
-- Indexes for table `prj_privilege`
--
ALTER TABLE `prj_privilege`
  ADD PRIMARY KEY (`PRIV_ID`);

--
-- Indexes for table `prj_profile`
--
ALTER TABLE `prj_profile`
  ADD PRIMARY KEY (`PROF_ID`),
  ADD KEY `POS_ID` (`POS_ID`),
  ADD KEY `prj_profile_ibfk_1` (`LOGIN_ID`);

--
-- Indexes for table `prj_project_activity`
--
ALTER TABLE `prj_project_activity`
  ADD PRIMARY KEY (`ACTIVITY_ID`),
  ADD KEY `DETAIL_ID` (`DETAIL_ID`);

--
-- Indexes for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  ADD PRIMARY KEY (`LOGIN_ID`),
  ADD KEY `prj_project_login_ibfk_1` (`PRIV_ID`);

--
-- Indexes for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  ADD PRIMARY KEY (`TEAM_ID`),
  ADD KEY `prj_project_team_ibfk_1` (`LOGIN_ID`),
  ADD KEY `prj_project_team_ibfk_2` (`DETAIL_ID`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prj_activity_task`
--
ALTER TABLE `prj_activity_task`
  ADD CONSTRAINT `prj_activity_task_ibfk_1` FOREIGN KEY (`ACTIVITY_ID`) REFERENCES `prj_project_activity` (`ACTIVITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prj_assigned_task`
--
ALTER TABLE `prj_assigned_task`
  ADD CONSTRAINT `prj_assigned_task_ibfk_1` FOREIGN KEY (`LOGIN_ID`) REFERENCES `prj_project_login` (`LOGIN_ID`),
  ADD CONSTRAINT `prj_assigned_task_ibfk_2` FOREIGN KEY (`TASK_ID`) REFERENCES `prj_activity_task` (`TASK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prj_detail`
--
ALTER TABLE `prj_detail`
  ADD CONSTRAINT `prj_detail_ibfk_1` FOREIGN KEY (`PROJECT_MANAGER`) REFERENCES `prj_project_login` (`LOGIN_ID`),
  ADD CONSTRAINT `prj_detail_ibfk_2` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `prj_category` (`CATEGORY_ID`),
  ADD CONSTRAINT `prj_detail_ibfk_3` FOREIGN KEY (`RECORD_CREATOR`) REFERENCES `prj_project_login` (`LOGIN_ID`);

--
-- Constraints for table `prj_profile`
--
ALTER TABLE `prj_profile`
  ADD CONSTRAINT `prj_profile_ibfk_1` FOREIGN KEY (`LOGIN_ID`) REFERENCES `prj_project_login` (`LOGIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prj_profile_ibfk_2` FOREIGN KEY (`POS_ID`) REFERENCES `prj_position` (`POS_ID`);

--
-- Constraints for table `prj_project_activity`
--
ALTER TABLE `prj_project_activity`
  ADD CONSTRAINT `prj_project_activity_ibfk_1` FOREIGN KEY (`DETAIL_ID`) REFERENCES `prj_detail` (`DETAIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  ADD CONSTRAINT `prj_project_login_ibfk_1` FOREIGN KEY (`PRIV_ID`) REFERENCES `prj_privilege` (`PRIV_ID`);

--
-- Constraints for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  ADD CONSTRAINT `prj_project_team_ibfk_1` FOREIGN KEY (`LOGIN_ID`) REFERENCES `prj_project_login` (`LOGIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prj_project_team_ibfk_2` FOREIGN KEY (`DETAIL_ID`) REFERENCES `prj_detail` (`DETAIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
