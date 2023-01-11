-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 05:09 AM
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
  `TASK_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DAY` smallint(10) DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `TASK_BUDGET` int(10) NOT NULL DEFAULT 0,
  `TASK_NOTE` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `COPLATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `TASK_BUDGET`, `TASK_NOTE`, `COPLATE_TIME`, `created_at`, `updated_at`) VALUES
('TASK0001', 'Regina Rios', 'ACT0001', 37, 1, 0, NULL, '2023-01-04 17:00:00', '2022-12-28 07:28:27', '2023-01-04 19:24:52'),
('TASK0002', 'Dara Byers', 'ACT0001', 92, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0003', 'Leah Slater', 'ACT0001', 76, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0004', 'Lacy Byrd', 'ACT0002', 38, 1, 0, NULL, '2022-12-27 17:00:00', '2022-12-28 07:28:27', '2022-12-28 07:58:30'),
('TASK0005', 'Lani Salinas', 'ACT0002', 53, 1, 0, NULL, '2022-12-27 17:00:00', '2022-12-28 07:28:27', '2022-12-28 07:59:19'),
('TASK0006', 'Brynne Atkinson', 'ACT0003', 87, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0007', 'Zenaida Prince', 'ACT0003', 94, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0008', 'Delilah Hendricks', 'ACT0004', 62, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0009', 'Daniel Witt', 'ACT0005', 68, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
('TASK0010', 'Damian Hansen', 'ACT0006', 18, 1, 0, NULL, '2022-12-27 17:00:00', '2022-12-28 08:07:34', '2022-12-28 08:07:58'),
('TASK0011', 'Kermit Brewer', 'ACT0007', 57, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34'),
('TASK0012', 'Destiny Hogan', 'ACT0007', 72, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34'),
('TASK0013', 'Xyla Patel', 'ACT0007', 72, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34'),
('TASK0014', 'Aristotle Lloyd', 'ACT0008', 56, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34'),
('TASK0015', 'Brady Mason', 'ACT0008', 53, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34'),
('TASK0016', 'Roary Hewitt', 'ACT0009', 59, 0, 0, NULL, '2022-12-28 19:40:17', '2022-12-28 12:40:17', '2022-12-28 12:40:17'),
('TASK0017', 'Leo Nolan', 'ACT0010', 83, 0, 0, NULL, '2023-01-05 02:07:30', '2023-01-04 19:07:30', '2023-01-04 19:07:30'),
('TASK0018', 'Dieter Cameron', 'ACT0011', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0019', 'Anthony Rodgers', 'ACT0011', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0020', 'Oliver Newman', 'ACT0011', 2, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0021', 'Karyn Gibson', 'ACT0011', 2, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0022', 'Stacey Morse', 'ACT0012', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0023', 'Alfonso Osborn', 'ACT0012', 2, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0024', 'Jin Jacobson', 'ACT0012', 2, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0025', 'Tatyana Bailey', 'ACT0013', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0026', 'Uriel Romero', 'ACT0013', 2, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0027', 'Paki Britt', 'ACT0014', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0028', 'Halla Hansen', 'ACT0015', 1, 0, 0, NULL, '2023-01-06 04:02:12', '2023-01-05 21:02:12', '2023-01-05 21:02:12'),
('TASK0029', 'Isadora Goodman', 'ACT0016', 73, 0, 0, NULL, '2023-01-09 05:05:17', '2023-01-08 22:05:17', '2023-01-08 22:05:17'),
('TASK0030', 'Heidi Espinoza', 'ACT0017', 22, 0, 0, NULL, '2023-01-09 05:06:05', '2023-01-08 22:06:05', '2023-01-08 22:06:05'),
('TASK0031', 'Idona Heath', 'ACT0018', 64, 0, 0, NULL, '2023-01-10 07:16:33', '2023-01-10 00:16:33', '2023-01-10 00:16:33'),
('TASK0032', 'Sigourney Reilly', 'ACT0019', 80, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0033', 'Burke Alvarado', 'ACT0019', 7, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0034', 'Chester Davenport', 'ACT0019', 2, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0035', 'Kyle Nichols', 'ACT0020', 92, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0036', 'Kellie Gordon', 'ACT0020', 76, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0037', 'Martena Holland', 'ACT0020', 33, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0038', 'Phelan Vazquez', 'ACT0020', 50, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0039', 'Deanna Mcintosh', 'ACT0021', 27, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0040', 'Prescott Cole', 'ACT0021', 7, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0041', 'Josiah Meyers', 'ACT0021', 76, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0042', 'Ezra Gibson', 'ACT0021', 81, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0043', 'Tiger Richmond', 'ACT0021', 63, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0044', 'Velma Sloan', 'ACT0021', 57, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0045', 'Julie Hutchinson', 'ACT0021', 14, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0046', 'Ronan Griffin', 'ACT0022', 33, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0047', 'Irma Watson', 'ACT0022', 89, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0048', 'Joshua Acosta', 'ACT0022', 34, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0049', 'Linus Francis', 'ACT0022', 19, 0, 0, NULL, '2023-01-11 03:22:57', '2023-01-10 20:22:57', '2023-01-10 20:22:57'),
('TASK0050', 'Quintessa Atkinson', 'ACT0023', 36, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0051', 'Nichole Glenn', 'ACT0023', 75, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0052', 'Asher Walters', 'ACT0024', 93, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0053', 'Sylvia Camacho', 'ACT0024', 81, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0054', 'Desiree Christian', 'ACT0024', 65, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0055', 'Jenette Haynes', 'ACT0024', 47, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0056', 'Robert Curry', 'ACT0024', 57, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0057', 'Janna Sanford', 'ACT0024', 53, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0058', 'Riley Higgins', 'ACT0024', 25, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0059', 'Jaime Adams', 'ACT0025', 92, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0060', 'Alika Hunt', 'ACT0025', 17, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0061', 'Zeus Bates', 'ACT0025', 5, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0062', 'Buckminster Adkins', 'ACT0025', 53, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0063', 'Hammett Horton', 'ACT0025', 59, 0, 0, NULL, '2023-01-11 03:23:50', '2023-01-10 20:23:50', '2023-01-10 20:23:50'),
('TASK0064', 'Madison Wilkinson', 'ACT0026', 88, 1, 0, NULL, '2023-01-10 17:00:00', '2023-01-10 20:24:36', '2023-01-10 21:01:58'),
('TASK0065', 'Olivia Morrow', 'ACT0027', 99, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0066', 'Angelica Dodson', 'ACT0027', 86, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0067', 'Fallon Benton', 'ACT0027', 63, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0068', 'Penelope Goff', 'ACT0027', 91, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0069', 'Tobias Tate', 'ACT0027', 48, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0070', 'Mira Harding', 'ACT0027', 48, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0071', 'September Velez', 'ACT0027', 58, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0072', 'Yael Whitaker', 'ACT0027', 68, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0073', 'Ebony Mann', 'ACT0027', 27, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0074', 'Hamilton Clayton', 'ACT0027', 21, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0075', 'Mari Herman', 'ACT0028', 53, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0076', 'Dennis Briggs', 'ACT0028', 99, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0077', 'Signe Gilmore', 'ACT0028', 47, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0078', 'Wang Beard', 'ACT0028', 17, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0079', 'Iris Snider', 'ACT0028', 85, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0080', 'Amity Nunez', 'ACT0028', 1, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0081', 'Channing Gay', 'ACT0028', 8, 0, 0, NULL, '2023-01-11 03:24:36', '2023-01-10 20:24:36', '2023-01-10 20:24:36'),
('TASK0082', 'Caleb Logan', 'ACT0029', 89, 0, 0, NULL, '2023-01-11 03:29:05', '2023-01-10 20:29:05', '2023-01-10 20:29:05');

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
('CTY0001', 'School'),
('CTY0002', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `prj_detail`
--

CREATE TABLE `prj_detail` (
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NAME_PROJECT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `REASONS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OBJECTIVE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LOCATION` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TARGET` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `BUDGET` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `RESULT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `RECORD_CREATOR` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_MANAGER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `TOTAL_DATE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IS_APPROVE` tinyint(4) NOT NULL DEFAULT 0,
  `STATUS` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New Release',
  `CATEGORY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_detail`
--

INSERT INTO `prj_detail` (`DETAIL_ID`, `NAME_PROJECT`, `REASONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `RESULT`, `DATE_START`, `DATE_END`, `created_at`, `RECORD_CREATOR`, `PROJECT_MANAGER`, `updated_at`, `TOTAL_DATE`, `IS_APPROVE`, `STATUS`, `CATEGORY_ID`) VALUES
('220001', 'Marsden Blanchard', 'Rerum aut obcaecati', 'Qui harum minima duc', 'Quia non nihil irure', 'Veniam earum ex ut', '1', 'Corrupti ut rerum q', '1973-12-06', '2022-12-28', '2022-12-28 07:28:26', '88', '88', '2022-12-28 07:59:19', '6080750 day', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('220002', 'Lila Tillman', 'Dolor velit autem te', 'Corrupti ut sint do', 'Quam quisquam pariat', 'Ut velit nulla quisq', '79', 'Sed consequat Cillu', '2001-12-20', '2022-12-28', '2022-12-28 08:07:34', '88', '88', '2022-12-28 08:07:58', '3608485 week', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('220003', 'Bryar Delaney', 'Facilis maiores dolo', 'Lorem hic vero minim', 'Eligendi dolor tenet', 'Aspernatur commodo e', '46', 'Dolor officia amet', '1983-10-08', '2022-12-28', '2022-12-28 12:40:17', '88', '88', '2023-01-04 19:27:56', '8427446 week', 1, 'New Release,Approved,workingOn', 'CTY0001'),
('230004', 'Lara Cox', 'Tenetur doloribus te', 'Dolores soluta ut no', 'Laboris asperiores i', 'Omnis excepteur pers', '92', 'Fugiat non eos magn', '1970-10-09', '1971-01-01', '2023-01-04 19:05:11', '88', '88', '2023-01-04 19:05:11', '2 month', 0, 'New Release,workingOn', 'CTY0001'),
('230005', 'Ralph Cherry43', 'Ut facilis eos mole', 'In ex totam tenetur', 'Vel fugiat laborum', 'Ullam esse soluta qu', '41', 'Non est iure fuga', '2002-07-04', '2003-06-12', '2023-01-04 19:07:30', '88', '88', '2023-01-06 01:02:03', '35 week', 1, 'New Release,Approved,workingOn', 'CTY0001'),
('230006', 'New Test', 'Est aspernatur ipsum', 'Fugit et culpa duci', 'Velit iusto sunt dol', 'Obcaecati sed totam', '97', 'Sunt ipsam ad et vo', '2023-01-06', '2023-01-26', '2023-01-05 21:02:12', 'USER00003', '88', '2023-01-06 01:00:37', '2 week', 1, 'New Release,Approved,workingOn', 'CTY0001'),
('230007', 'Amir Gallagher', 'Elit qui incidunt', 'Nesciunt irure temp', 'Alias voluptatibus q', 'Cum sint nesciunt', '12', 'Id unde iusto impedi', '1985-11-16', '1986-01-03', '2023-01-08 22:05:17', 'USER00004', '88', '2023-01-08 22:05:17', '5 week', 0, 'New Release,workingOn', 'CTY0001'),
('230008', 'Ivana Hatfield', 'Cumque exercitation', 'Laboris aut velit su', 'Do elit illum quis', 'Itaque corrupti sin', '94', 'Dolore ad illum qua', '2016-06-05', '2023-01-09', '2023-01-08 22:06:05', 'USER00004', '88', '2023-01-08 22:06:05', '6493481 day', 0, 'New Release,workingOn', 'CTY0002'),
('230009', 'Sopoline Osborn', 'Est voluptas omnis s', 'Est voluptatem volup', 'Iusto iste magna aut', 'Reiciendis nostrum d', '89', 'Iste cillum consequa', '1995-08-04', '2023-01-10', '2023-01-10 00:16:32', 'USER00004', '88', '2023-01-10 00:16:32', '2253950 week', 0, 'New Release,workingOn', 'CTY0001'),
('230010', 'Melinda Tyson', 'Fugit exercitation', 'Ad facilis excepteur', 'Elit libero repelle', 'Est vero dolores il', '80', 'Dolore sit non facil', '1979-07-31', '2023-01-13', '2023-01-10 20:22:57', 'USER00004', '88', '2023-01-10 20:22:57', '5417779 month', 0, 'New Release,workingOn', 'CTY0001'),
('230011', 'Noah Edwards', 'Ex impedit dolor di', 'Qui eiusmod repellen', 'Rerum ex est at ut v', 'Velit aute dicta qui', '36', 'Tenetur nesciunt ea', '1980-11-17', '2023-01-11', '2023-01-10 20:23:50', 'USER00004', '88', '2023-01-10 20:23:50', '7847563 day', 0, 'New Release,workingOn', 'CTY0001'),
('230012', 'Armando Porter', 'Ex eiusmod optio po', 'Irure quis elit ape', 'Molestiae voluptate', 'Consectetur blandit', '88', 'Consequat Occaecat', '1973-06-12', '2023-01-11', '2023-01-10 20:24:35', 'USER00004', '88', '2023-01-10 21:01:58', '6785943 day', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('230013', 'Sophia Hyde', 'Facere voluptate lab', 'Ducimus voluptate q', 'Es', 'Eos consectetur dol', '100', 'Odio deserunt conseq', '2013-05-08', '2023-01-11', '2023-01-10 20:29:05', 'USER00004', '88', '2023-01-10 20:37:36', '7023438 week', 1, 'New Release,Approved,workingOn', 'CTY0002');

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
('02', 'Chakri Day', '2023-04-06'),
('03', 'Labour Day ', '2023-05-01'),
('04', 'Coronation of King V', '2023-05-04'),
('05', 'Queen Suthida\'s Birthday Holiday', '2023-06-05'),
('06', 'King Vajiralongkorn\'s Birthday', '2023-06-28'),
('07', ' Mother\'s Birthday Holiday', '2023-08-14'),
('08', 'Passing of His Majesty the Late King', '2023-10-13'),
('09', 'Chulalongkorn Memorial Day', '2023-10-23'),
('10', 'His Majesty the Late King\'s Birthday', '2023-12-05'),
('11', 'Constitution Day Holiday', '2023-10-11'),
('HDAY0013', 'Test1', '2023-01-04'),
('HDAY0014', 'Eid 2', '2023-03-10'),
('HDAY0015', 'Test12424234c', '2023-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_activity`
--

CREATE TABLE `prj_project_activity` (
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DAY_WEEK` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVITY_ORDER` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_activity`
--

INSERT INTO `prj_project_activity` (`ACTIVITY_ID`, `ACTIVITY_NAME`, `DETAIL_ID`, `DAY_WEEK`, `STATUS`, `created_at`, `updated_at`, `ACTIVITY_ORDER`) VALUES
('ACT0001', 'Tate Moody', '220001', 'day', 0, '2022-12-28 07:28:27', '2022-12-28 07:28:27', 1),
('ACT0002', 'Dexter Conner', '220001', 'day', 1, '2022-12-28 07:28:27', '2022-12-28 07:59:19', 2),
('ACT0003', 'Barclay Craig', '220001', 'day', 0, '2022-12-28 07:28:27', '2022-12-28 07:28:27', 3),
('ACT0004', 'Regina Frederick', '220001', 'day', 0, '2022-12-28 07:28:27', '2022-12-28 07:28:27', 4),
('ACT0005', 'Ignacia Casey', '220001', 'day', 0, '2022-12-28 07:28:27', '2022-12-28 07:28:27', 5),
('ACT0006', 'Sacha Reid', '220002', 'week', 1, '2022-12-28 08:07:34', '2022-12-28 08:07:58', 1),
('ACT0007', 'Damon Hess', '220002', 'week', 0, '2022-12-28 08:07:34', '2022-12-28 08:07:34', 2),
('ACT0008', 'Rose Lindsay', '220002', 'week', 0, '2022-12-28 08:07:34', '2022-12-28 08:07:34', 3),
('ACT0009', 'Griffin Bradley', '220003', 'week', 0, '2022-12-28 12:40:17', '2022-12-28 12:40:17', 1),
('ACT0010', 'Yetta Jacobson', '230005', 'week', 0, '2023-01-04 19:07:30', '2023-01-04 19:07:30', 1),
('ACT0011', 'Brenna Mccarthy', '230006', 'week', 0, '2023-01-05 21:02:12', '2023-01-05 21:02:12', 1),
('ACT0012', 'Medge Jimenez', '230006', 'week', 0, '2023-01-05 21:02:12', '2023-01-05 21:02:12', 2),
('ACT0013', 'Axel Eaton', '230006', 'week', 0, '2023-01-05 21:02:12', '2023-01-05 21:02:12', 3),
('ACT0014', 'Chloe Chavez', '230006', 'week', 0, '2023-01-05 21:02:12', '2023-01-05 21:02:12', 4),
('ACT0015', 'Norman Stafford', '230006', 'week', 0, '2023-01-05 21:02:12', '2023-01-05 21:02:12', 5),
('ACT0016', 'Gary Pearson', '230007', 'week', 0, '2023-01-08 22:05:17', '2023-01-08 22:05:17', 1),
('ACT0017', 'Kim Velazquez', '230008', 'day', 0, '2023-01-08 22:06:05', '2023-01-08 22:06:05', 1),
('ACT0018', 'Alden Stephens', '230009', 'week', 0, '2023-01-10 00:16:33', '2023-01-10 00:16:33', 1),
('ACT0019', 'Madison Ramos', '230010', 'month', 0, '2023-01-10 20:22:57', '2023-01-10 20:22:57', 1),
('ACT0020', 'TaShya Spears', '230010', 'month', 0, '2023-01-10 20:22:57', '2023-01-10 20:22:57', 2),
('ACT0021', 'Hiram Mcfarland', '230010', 'month', 0, '2023-01-10 20:22:57', '2023-01-10 20:22:57', 3),
('ACT0022', 'Demetria Sparks', '230010', 'month', 0, '2023-01-10 20:22:57', '2023-01-10 20:22:57', 4),
('ACT0023', 'Maris Price', '230011', 'day', 0, '2023-01-10 20:23:50', '2023-01-10 20:23:50', 1),
('ACT0024', 'Autumn Powers', '230011', 'day', 0, '2023-01-10 20:23:50', '2023-01-10 20:23:50', 2),
('ACT0025', 'Brock Buckley', '230011', 'day', 0, '2023-01-10 20:23:50', '2023-01-10 20:23:50', 3),
('ACT0026', 'Josephine Mayer', '230012', 'day', 1, '2023-01-10 20:24:36', '2023-01-10 21:01:58', 1),
('ACT0027', 'Samantha Albert', '230012', 'day', 0, '2023-01-10 20:24:36', '2023-01-10 20:24:36', 2),
('ACT0028', 'Libby May', '230012', 'day', 0, '2023-01-10 20:24:36', '2023-01-10 20:24:36', 3),
('ACT0029', 'Roary Ortega', '230013', 'week', 0, '2023-01-10 20:29:05', '2023-01-10 20:29:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NICKNAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARD_ID` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEPHONE` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AGENCY` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POSITION` tinyint(4) DEFAULT 0 COMMENT '0=> Employee, 1=> Admin, 2=> Project Manager, 3=> Manager',
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_login`
--

INSERT INTO `prj_project_login` (`LOGIN_ID`, `EMAIL`, `password`, `NAME`, `NICKNAME`, `CARD_ID`, `TELEPHONE`, `AGENCY`, `POSITION`, `IS_ACTIVE`, `updated_at`, `created_at`) VALUES
('88', 'caca@gmail.com', '02222', 'Hadi', 'Hadi', 'gs234234', '03243243', '32423fdg', 0, 1, '2023-01-03 13:06:56', '2023-01-03 13:06:56'),
('USER00003', 'admin@admin.com', '$2y$10$JgYfYRKhh5AqzWiadRiN3OhuTB.3HWLa2UoERUBJNCXj1gqmMTw.K', 'ddd', NULL, NULL, NULL, NULL, 1, 1, '2023-01-04 02:06:30', '2023-01-04 02:06:30'),
('USER00004', 'user@gmail.com', '$2y$10$/I2TrHrQm1gg4SaesI7Bc.0HqmrncOYHzmeWA/gFZXtjhjyUVDji2', 'Ahmed', NULL, NULL, NULL, NULL, 0, 1, '2023-01-08 19:54:17', '2023-01-08 19:54:17'),
('USER0004', 'manager@manager.com', '$2y$10$esEQBnFowrpG5c4216sYS.sGupwNS8T5BPqmwcSerEQYGJaaFrQbS', 'Ali', NULL, NULL, NULL, NULL, 3, 1, '2023-01-06 00:52:05', '2023-01-06 00:52:05');

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
(249, '88', '220002'),
(252, 'USER00003', '230005'),
(253, 'USER00003', '230006'),
(254, 'USER00003', '230007'),
(255, 'USER00004', '230007'),
(256, 'USER00003', '230008'),
(257, 'USER00004', '230008'),
(258, 'USER0004', '230008'),
(259, 'USER00004', '230009'),
(260, 'USER0004', '230010'),
(261, 'USER00004', '230011'),
(262, 'USER0004', '230011'),
(263, 'USER00003', '230012'),
(264, 'USER00004', '230012'),
(265, 'USER0004', '230012'),
(266, 'USER00004', '230013');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_track`
--

CREATE TABLE `prj_project_track` (
  `PROJECT_TRACK_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=> new, 1=>approved, 2=> on proggress, 3=> Complate',
  `TRACKER` varchar(100) NOT NULL DEFAULT 'New Release',
  `USER_TRACKER` varchar(255) DEFAULT NULL,
  `APPROVED_BY` varchar(50) DEFAULT NULL,
  `DATE_TRACKER` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_project_track`
--

INSERT INTO `prj_project_track` (`PROJECT_TRACK_ID`, `PROJECT_ID`, `STATUS`, `TRACKER`, `USER_TRACKER`, `APPROVED_BY`, `DATE_TRACKER`, `updated_at`) VALUES
('PTR0001', '220001', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0002', '220002', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0003', '220003', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0004', '230005', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0005', '230006', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0006', '230007', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0007', '230008', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0008', '230009', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0009', '230010', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0010', '230011', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49'),
('PTR0011', '230012', 1, 'New Release,Approved,workingOn', NULL, NULL, NULL, '2023-01-10 20:44:09'),
('PTR0012', '230013', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 03:41:49');

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
-- Indexes for table `prj_project_activity`
--
ALTER TABLE `prj_project_activity`
  ADD PRIMARY KEY (`ACTIVITY_ID`),
  ADD KEY `DETAIL_ID` (`DETAIL_ID`);

--
-- Indexes for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  ADD PRIMARY KEY (`LOGIN_ID`);

--
-- Indexes for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  ADD PRIMARY KEY (`TEAM_ID`),
  ADD KEY `prj_project_team_ibfk_1` (`LOGIN_ID`),
  ADD KEY `prj_project_team_ibfk_2` (`DETAIL_ID`);

--
-- Indexes for table `prj_project_track`
--
ALTER TABLE `prj_project_track`
  ADD PRIMARY KEY (`PROJECT_TRACK_ID`),
  ADD KEY `PROJECT_ID` (`PROJECT_ID`);

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
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

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
-- Constraints for table `prj_detail`
--
ALTER TABLE `prj_detail`
  ADD CONSTRAINT `prj_detail_ibfk_1` FOREIGN KEY (`PROJECT_MANAGER`) REFERENCES `prj_project_login` (`LOGIN_ID`),
  ADD CONSTRAINT `prj_detail_ibfk_2` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `prj_category` (`CATEGORY_ID`),
  ADD CONSTRAINT `prj_detail_ibfk_3` FOREIGN KEY (`RECORD_CREATOR`) REFERENCES `prj_project_login` (`LOGIN_ID`);

--
-- Constraints for table `prj_project_activity`
--
ALTER TABLE `prj_project_activity`
  ADD CONSTRAINT `prj_project_activity_ibfk_1` FOREIGN KEY (`DETAIL_ID`) REFERENCES `prj_detail` (`DETAIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  ADD CONSTRAINT `prj_project_team_ibfk_1` FOREIGN KEY (`LOGIN_ID`) REFERENCES `prj_project_login` (`LOGIN_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prj_project_team_ibfk_2` FOREIGN KEY (`DETAIL_ID`) REFERENCES `prj_detail` (`DETAIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prj_project_track`
--
ALTER TABLE `prj_project_track`
  ADD CONSTRAINT `prj_project_track_ibfk_1` FOREIGN KEY (`PROJECT_ID`) REFERENCES `prj_detail` (`DETAIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
