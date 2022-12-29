-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:18 PM
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
('TASK0001', 'Regina Rios', 'ACT0001', 37, 0, 0, NULL, '2022-12-28 14:28:27', '2022-12-28 07:28:27', '2022-12-28 07:28:27'),
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
('TASK0015', 'Brady Mason', 'ACT0008', 53, 0, 0, NULL, '2022-12-28 15:07:34', '2022-12-28 08:07:34', '2022-12-28 08:07:34');

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
('CTY0001', 'School');

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
('220002', 'Lila Tillman', 'Dolor velit autem te', 'Corrupti ut sint do', 'Quam quisquam pariat', 'Ut velit nulla quisq', '79', 'Sed consequat Cillu', '2001-12-20', '2022-12-28', '2022-12-28 08:07:34', '88', '88', '2022-12-28 08:07:58', '3608485 week', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001');

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
('HDAY0012', 'TestHolyDays', '2023-01-03'),
('HDAY0013', 'Test1', '2023-01-04');

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
('ACT0008', 'Rose Lindsay', '220002', 'week', 0, '2022-12-28 08:07:34', '2022-12-28 08:07:34', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NICKNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CARD_ID` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `TELEPHONE` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `AGENCY` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `POSITION` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PERUSE` int(2) NOT NULL,
  `CONFIRM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_login`
--

INSERT INTO `prj_project_login` (`LOGIN_ID`, `EMAIL`, `PASSWORD`, `NAME`, `NICKNAME`, `CARD_ID`, `TELEPHONE`, `AGENCY`, `POSITION`, `PERUSE`, `CONFIRM`) VALUES
('1', 'ping@gmail.com', '123456', 'arifin sotaloh', 'ping', '195999000674626', '02121231313', 'yru', 'admin', 0, 1),
('2', 'nat@hotmail.com', '1234', 'นาย ก', 'nat', '1565555', '1233', 'yru', 'user', 0, 1),
('4', 'arifn@gmial.com', '123456', 'นาย ข', 'test', '445451212212', '02121231313', 'sadas', 'user', 0, 1),
('5', 'na@gmail.com', 'za123456', 'นาย ว', 'ping', '445451212212', '02121231313', 'yru', 'user', 0, 1),
('6', 'you@gmail.com', '123456', 'นาย ย', 'jp', '445451212212', '02121231313', 'yru', 'user', 0, 1),
('88', 'caca@gmail.com', '02222', 'Hadi', 'Hadi', 'gs234234', '03243243', '32423fdg', 'project manager', 0, 1);

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
(245, '6', '220001'),
(247, '2', '220002'),
(248, '6', '220002'),
(249, '88', '220002');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_track`
--

CREATE TABLE `prj_project_track` (
  `PROJECT_TRACK_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT 0,
  `TRACKER` varchar(100) NOT NULL DEFAULT 'New Release'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_project_track`
--

INSERT INTO `prj_project_track` (`PROJECT_TRACK_ID`, `PROJECT_ID`, `STATUS`, `TRACKER`) VALUES
('PTR0001', '220001', 0, 'New Release'),
('PTR0002', '220002', 0, 'New Release');

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
  ADD KEY `prj_detail_ibfk_1` (`PROJECT_MANAGER`);

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
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

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
  ADD CONSTRAINT `prj_detail_ibfk_2` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `prj_category` (`CATEGORY_ID`);

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
