-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 08:32 AM
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
  `COPLETE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TASK_TRACKER` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `TASK_BUDGET`, `TASK_NOTE`, `COPLETE_TIME`, `TASK_TRACKER`, `created_at`, `updated_at`) VALUES
('TASK0001', 'Magee Roach', 'ACT0001', 58, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0002', 'Jackson Smith', 'ACT0001', 79, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0003', 'Quintessa Wooten', 'ACT0001', 9, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0004', 'Madeline Bradley', 'ACT0001', 7, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0005', 'Orla Benson', 'ACT0002', 31, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0006', 'Aimee Hebert', 'ACT0003', 84, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0007', 'Dominique Santos', 'ACT0003', 61, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0008', 'Salvador Jacobs', 'ACT0003', 68, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0009', 'Fritz Day', 'ACT0003', 90, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0010', 'Jessamine Burton', 'ACT0003', 26, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0011', 'Ashely Mendez', 'ACT0003', 41, 0, 0, NULL, '2023-01-11 04:11:05', NULL, '2023-01-10 21:11:05', '2023-01-10 21:11:05'),
('TASK0012', 'Jamal Hernandez', 'ACT0004', 60, 1, 0, NULL, '2023-01-10 17:00:00', 'Ahmed,23/01/11', '2023-01-10 21:18:41', '2023-01-10 21:32:42'),
('TASK0013', 'Britanni Padilla', 'ACT0005', 56, 0, 0, NULL, '2023-01-11 04:18:41', NULL, '2023-01-10 21:18:41', '2023-01-10 21:18:41'),
('TASK0014', 'Idola Barlow', 'ACT0005', 64, 0, 0, NULL, '2023-01-11 04:18:41', NULL, '2023-01-10 21:18:41', '2023-01-10 21:18:41'),
('TASK0015', 'Joelle Hickman', 'ACT0006', 47, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0016', 'Nasim Jenkins', 'ACT0006', 62, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0017', 'Eaton Swanson', 'ACT0006', 92, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0018', 'Dante Jacobs', 'ACT0006', 26, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0019', 'Zena Jarvis', 'ACT0007', 41, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0020', 'Lillith Wade', 'ACT0007', 65, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0021', 'Gay Torres', 'ACT0007', 62, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0022', 'Russell Barnett', 'ACT0007', 13, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0023', 'Tanek Cote', 'ACT0008', 7, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0024', 'Hayfa Cole', 'ACT0008', 100, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0025', 'Yen Lowe', 'ACT0008', 94, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0026', 'Jillian Wiley', 'ACT0008', 60, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0027', 'Daniel Donaldson', 'ACT0008', 67, 0, 0, NULL, '2023-01-11 06:57:43', NULL, '2023-01-10 23:57:43', '2023-01-10 23:57:43'),
('TASK0028', 'Heather Hanson', 'ACT0009', 75, 0, 0, NULL, '2023-01-11 07:24:08', NULL, '2023-01-11 00:24:08', '2023-01-11 00:24:08'),
('TASK0029', 'Claudia Flores', 'ACT0010', 87, 0, 0, NULL, '2023-01-11 07:26:11', NULL, '2023-01-11 00:26:11', '2023-01-11 00:26:11'),
('TASK0030', 'James Farley', 'ACT0011', 65, 0, 0, NULL, '2023-01-11 07:29:11', NULL, '2023-01-11 00:29:11', '2023-01-11 00:29:11'),
('TASK0031', 'Ivana Wooten', 'ACT0012', 33, 0, 0, NULL, '2023-01-11 07:29:43', NULL, '2023-01-11 00:29:43', '2023-01-11 00:29:43');

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
('230001', 'Quail Scott', 'In quas atque molest', 'Non velit dolorem r', 'Labore qui corporis', 'Nihil nulla laborum', '85', 'Odit similique imped', '1974-05-31', '2023-01-13', '2023-01-10 21:11:05', 'USER00004', '88', '2023-01-10 21:12:03', '6994196 day', 1, 'New Release,Approved,workingOn', 'CTY0001'),
('230002', 'Ignatius Richmond', 'Nostrud facilis qui', 'Dolor adipisci nostr', 'Autem laborum Incid', 'Est adipisicing dol', '33', 'Exercitation a do ex', '1979-01-10', '2023-01-13', '2023-01-10 21:18:41', 'USER00004', '88', '2023-01-10 21:32:42', '9883999 month', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('230003', 'Prescott Martin', 'Qui dolore quas lore', 'Officia consequuntur', 'Cillum necessitatibu', 'Repellendus Ut dolo', '35', 'Ipsam quasi incidunt', '2019-01-08', '2023-01-13', '2023-01-10 23:57:43', 'USER00004', '88', '2023-01-10 23:57:43', '9320274 week', 0, 'New Release,workingOn', 'CTY0001'),
('230004', 'Kane Wall', 'Iste tempore sed ea', 'Atque perspiciatis', 'In ipsam iusto neque', 'In nobis maiores con', '23', 'Iure labore incididu', '1970-08-26', '2023-01-13', '2023-01-11 00:24:08', 'USER00004', 'USER00004', '2023-01-11 00:24:08', '3460246 month', 0, 'New Release,workingOn', 'CTY0002'),
('230005', 'Kellie Garcia', 'Velit ut dolor cons', 'Non error aut minim', 'Sit veritatis aut e', 'Quo exercitationem v', '89', 'Recusandae Dolor eo', '2019-10-15', '2023-01-13', '2023-01-11 00:26:11', 'USER00004', '88', '2023-01-11 00:26:11', '8331812 week', 0, 'New Release,workingOn', 'CTY0002'),
('230006', 'Laith Rasmussen', 'Voluptate sed offici', 'Sequi irure eos nat', 'Ullam velit quia neq', 'Neque id pariatur T', '79', 'Perspiciatis quia q', '1987-05-28', '2023-01-11', '2023-01-11 00:29:11', 'USER00004', 'USER00004', '2023-01-11 00:29:11', '8485909 month', 0, 'New Release,workingOn', 'CTY0002'),
('230007', 'Camilla Martinez', 'Maiores fuga Harum', 'Dolor cillum dolorem', 'Quia ratione sed a p', 'Fugit enim eum repe', '67', 'Voluptas numquam pla', '2015-03-08', '2023-01-13', '2023-01-11 00:29:43', 'USER00004', 'USER00004', '2023-01-11 00:29:43', '443796 month', 0, 'New Release,workingOn', 'CTY0002');

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
('ACT0001', 'Henry Reese', '230001', 'day', 0, '2023-01-10 21:11:05', '2023-01-10 21:11:05', 1),
('ACT0002', 'Mallory Kerr', '230001', 'day', 0, '2023-01-10 21:11:05', '2023-01-10 21:11:05', 2),
('ACT0003', 'Germane Gillespie', '230001', 'day', 0, '2023-01-10 21:11:05', '2023-01-10 21:11:05', 3),
('ACT0004', 'Claudia Murray', '230002', 'month', 1, '2023-01-10 21:18:41', '2023-01-10 21:32:42', 1),
('ACT0005', 'Cadman Frank', '230002', 'month', 0, '2023-01-10 21:18:41', '2023-01-10 21:18:41', 2),
('ACT0006', 'Deanna Cohen', '230003', 'week', 0, '2023-01-10 23:57:43', '2023-01-10 23:57:43', 1),
('ACT0007', 'Caryn Finch', '230003', 'week', 0, '2023-01-10 23:57:43', '2023-01-10 23:57:43', 2),
('ACT0008', 'Lila Hunter', '230003', 'week', 0, '2023-01-10 23:57:43', '2023-01-10 23:57:43', 3),
('ACT0009', 'Maxine Maddox', '230004', 'month', 0, '2023-01-11 00:24:08', '2023-01-11 00:24:08', 1),
('ACT0010', 'Pandora Klein', '230005', 'week', 0, '2023-01-11 00:26:11', '2023-01-11 00:26:11', 1),
('ACT0011', 'Clarke Rasmussen', '230006', 'month', 0, '2023-01-11 00:29:11', '2023-01-11 00:29:11', 1),
('ACT0012', 'Darrel Pierce', '230007', 'month', 0, '2023-01-11 00:29:43', '2023-01-11 00:29:43', 1);

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
(267, 'USER00003', '230001'),
(268, 'USER00004', '230001'),
(269, 'USER0004', '230001'),
(270, 'USER00003', '230002'),
(271, 'USER0004', '230003'),
(272, 'USER00004', '230004'),
(273, 'USER00004', '230005'),
(274, 'USER00003', '230006'),
(275, 'USER0004', '230006'),
(276, 'USER00003', '230007'),
(277, 'USER0004', '230007');

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
('PTR0001', '230001', 1, 'New Release,Approved,workingOn', NULL, 'Ali,23/01/11', NULL, '2023-01-11 04:19:28'),
('PTR0002', '230002', 1, 'New Release,Approved,workingOn', NULL, 'Ali,23/01/11', NULL, '2023-01-10 21:19:03'),
('PTR0003', '230003', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 06:57:43'),
('PTR0004', '230004', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 07:24:08'),
('PTR0005', '230005', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 07:26:11'),
('PTR0006', '230006', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 07:29:11'),
('PTR0007', '230007', 0, 'New Release', NULL, NULL, NULL, '2023-01-11 07:29:43');

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
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

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
