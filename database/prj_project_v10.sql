-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:30 AM
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
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `TASK_BUDGET` int(10) NOT NULL DEFAULT 0,
  `TASK_NOTE` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `COPLETE_TIME` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `START_DATE` timestamp NULL DEFAULT NULL,
  `TASK_TRACKER` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TASK_ORDER` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `TASK_BUDGET`, `TASK_NOTE`, `COPLETE_TIME`, `START_DATE`, `TASK_TRACKER`, `TASK_ORDER`, `created_at`, `updated_at`) VALUES
('TASK0007', 'Design Login', 'ACT0004', 2, 1, 400, NULL, '2023-01-31 15:09:32', '2023-01-10 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 09:41:46'),
('TASK0008', 'Design Dashboard', 'ACT0004', 3, 1, 0, NULL, '2023-01-19 02:59:52', '2023-01-08 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:02:33'),
('TASK0009', 'Design Home Page', 'ACT0004', 2, 1, 0, NULL, '2023-02-07 17:18:01', '2023-01-31 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:02:45'),
('TASK0010', 'Create TABLE', 'ACT0005', 1, 1, 0, NULL, '2023-02-02 07:40:17', '2023-01-02 17:00:00', 'Ahmed,23/01/18', 3, '2023-01-18 09:10:14', '2023-01-18 10:03:00'),
('TASK0011', 'Make Controller', 'ACT0005', 2, 1, 0, NULL, '2023-02-02 07:40:17', '2023-01-06 17:00:00', 'Ahmed,23/01/18', 2, '2023-01-18 09:10:14', '2023-01-18 10:03:15'),
('TASK0012', 'Test', 'ACT0005', 1, 1, 0, NULL, '2023-02-02 07:40:17', '2023-01-06 17:00:00', 'Ahmed,23/01/18', 1, '2023-01-18 09:10:14', '2023-01-18 10:03:20'),
('TASK0013', 'Code The Ui', 'ACT0006', 2, 1, 0, NULL, '2023-01-18 17:21:25', '2023-01-03 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:03:42'),
('TASK0014', 'Add Functionality', 'ACT0006', 3, 1, 0, NULL, '2023-01-18 17:18:23', '2023-01-04 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:03:46'),
('TASK0015', 'Test', 'ACT0006', 1, 1, 0, NULL, '2023-01-18 17:21:19', '2023-01-12 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:03:56'),
('TASK0016', 'Make Logo', 'ACT0007', 2, 1, 0, NULL, '2023-01-18 17:21:16', '2023-01-07 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:06'),
('TASK0017', 'Test', 'ACT0007', 1, 1, 0, NULL, '2023-01-18 17:18:26', '2023-01-13 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:13'),
('TASK0018', 'Test Ui', 'ACT0008', 4, 1, 0, NULL, '2023-01-18 17:21:09', '2023-01-10 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:24'),
('TASK0019', 'Test Functionality', 'ACT0008', 4, 1, 0, NULL, '2023-01-18 17:18:32', '2023-01-06 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 09:10:14', '2023-01-18 10:04:34'),
('TASK0020', 'Buy Domain Name', 'ACT0009', 1, 1, 10000, NULL, '2023-02-02 08:31:21', '2023-01-17 17:00:00', 'Ahmed,23/01/18', 3, '2023-01-18 09:10:14', '2023-01-18 10:24:32'),
('TASK0021', 'Buy Host', 'ACT0009', 2, 1, 0, NULL, '2023-02-02 07:43:07', '2023-01-02 17:00:00', 'Ahmed,23/01/18', 4, '2023-01-18 09:10:14', '2023-01-18 10:27:24'),
('TASK0022', 'Config the host', 'ACT0009', 4, 1, 10000, NULL, '2023-02-02 08:30:36', '2023-01-06 17:00:00', 'Ahmed,23/01/18', 2, '2023-01-18 09:10:14', '2023-01-18 10:27:28'),
('TASK0023', 'Deploy', 'ACT0009', 2, 1, 5000, NULL, '2023-02-02 08:18:01', '2023-01-03 17:00:00', 'Ahmed,23/01/18', 1, '2023-01-18 09:10:14', '2023-01-18 10:27:33'),
('TASK0024', 'Felicia Benson', 'ACT0010', 1, 0, 0, 'efeefe', '2023-01-25 23:35:32', '2023-01-24 17:00:00', NULL, 0, '2023-01-18 10:27:03', '2023-01-18 10:27:03'),
('TASK0025', 'Haley Graves', 'ACT0010', 1, 0, 4233, NULL, '2023-01-19 02:20:24', NULL, NULL, 0, '2023-01-18 10:27:03', '2023-01-18 10:27:03'),
('TASK0026', 'ytydtdthdtdtdth', 'ACT0011', 3, 1, 0, NULL, '2023-01-19 02:09:36', '2023-01-08 17:00:00', 'Ahmed,23/01/19', 0, '2023-01-18 19:06:59', '2023-01-18 19:08:56'),
('TASK0027', 'efe', 'ACT0011', 2, 1, 0, NULL, '2023-01-19 02:11:04', '2023-01-07 17:00:00', 'Ahmed,23/01/19', 0, '2023-01-18 19:06:59', '2023-01-18 19:10:05'),
('TASK0028', 'ewttew', 'ACT0011', 1, 0, 0, NULL, '2023-01-19 02:54:48', '2023-01-18 17:00:00', NULL, 0, '2023-01-18 19:06:59', '2023-01-18 19:06:59'),
('TASK0029', 'gddssd', 'ACT0012', 2, 1, 0, NULL, '2023-01-18 17:00:00', '2023-01-18 17:00:00', 'Ahmed,23/01/19', 0, '2023-01-18 19:06:59', '2023-01-18 19:10:19'),
('TASK0030', 'Jessamine Strickland', 'ACT0013', 5, 1, 0, NULL, '2023-01-18 17:00:00', NULL, 'Ahmed,23/01/19', 0, '2023-01-18 20:24:47', '2023-01-19 00:59:58'),
('TASK0031', 'Rachel Villarreal', 'ACT0013', 5, 1, 0, NULL, '2023-01-18 17:00:00', NULL, 'Ahmed,23/01/19', 0, '2023-01-18 20:24:47', '2023-01-19 01:00:54'),
('TASK0032', 'Todd Blair', 'ACT0014', 5, 0, 0, NULL, '2023-01-19 08:20:42', '2023-01-18 17:00:00', NULL, 0, '2023-01-18 20:24:47', '2023-01-18 20:24:47'),
('TASK0033', 'Jamal Sanchez', 'ACT0014', 100, 0, 0, NULL, '2023-01-19 08:20:56', '2023-01-18 17:00:00', NULL, 0, '2023-01-18 20:24:47', '2023-01-18 20:24:47'),
('TASK0040', 'Kiayada Farrell', 'ACT0021', 75, 1, 0, NULL, '2023-01-18 17:00:00', '2023-01-18 17:00:00', 'Ahmed,23/01/19', 0, '2023-01-19 01:04:40', '2023-01-19 01:09:22'),
('TASK0041', 'Tanner Nunez', 'ACT0021', 93, 0, 0, NULL, '2023-01-19 08:09:26', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0042', 'Karly Sanchez', 'ACT0021', 72, 0, 0, NULL, '2023-01-19 08:09:31', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0043', 'Vera Franco', 'ACT0021', 93, 0, 0, NULL, '2023-01-19 08:18:49', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0044', 'Odessa Wheeler', 'ACT0022', 22, 0, 0, NULL, '2023-01-19 08:09:04', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0045', 'Oprah Salazar', 'ACT0022', 20, 0, 0, NULL, '2023-01-19 08:09:10', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0046', 'Rudyard Dickson', 'ACT0022', 82, 0, 0, NULL, '2023-01-19 08:16:48', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0047', 'Camilla Lara', 'ACT0023', 82, 0, 0, NULL, '2023-01-19 08:09:39', '2023-01-18 17:00:00', NULL, 0, '2023-01-19 01:04:40', '2023-01-19 01:04:40'),
('TASK0048', 'Velma Mays', 'ACT0018', 6, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-01-25 02:03:21', '2023-01-25 02:03:21'),
('TASK0049', 'Honorato Jacobs', 'ACT0018', 84, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-01-25 02:03:21', '2023-01-25 02:03:21'),
('TASK0050', 'Inga Hodge', 'ACT0019', 47, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-01-25 02:03:21', '2023-01-25 02:03:21'),
('TASK0051', 'gewgew', 'ACT0024', 32767, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-01 19:04:07', '2023-02-01 19:04:07'),
('TASK0052', '3232', 'ACT0024', 432, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-01 19:04:07', '2023-02-01 19:04:07'),
('TASK0053', '4224', 'ACT0026', 4242, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-01 09:04:41', '2023-02-01 09:04:41'),
('TASK0054', 'Go to shcool 1', 'ACT0025', 10, 0, 1000, NULL, '2023-02-02 08:49:59', NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0055', 'Go to shcool 2', 'ACT0025', 10, 0, 1000, NULL, '2023-02-02 08:50:45', NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0056', 'Draft and design', 'ACT0027', 5, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0057', 'edit', 'ACT0027', 5, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0058', 'Present at school', 'ACT0028', 5, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0059', 'Implement', 'ACT0028', 5, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0060', 'Pubblish', 'ACT0029', 5, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0061', 'MA', 'ACT0029', 1, 0, 0, NULL, NULL, NULL, NULL, 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24'),
('TASK0123', 'Cooper Diaz', 'ACT0046', 2, 1, 50, 'reywywyw', '2023-02-02 03:20:27', '2023-01-29 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-02-01 20:20:27'),
('TASK0124', 'Ignatius Walters', 'ACT0046', 3, 1, 0, NULL, '2023-01-17 17:00:00', '2023-01-11 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-01-18 08:26:42'),
('TASK0125', 'Shaine Neal', 'ACT0047', 4, 1, 0, NULL, '2023-01-18 15:29:01', '2023-01-15 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-01-18 08:28:16'),
('TASK0126', 'Cameron Richard', 'ACT0047', 6, 1, 0, NULL, '2023-02-01 13:20:21', '2023-01-15 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-02-01 06:20:21'),
('TASK0127', 'Whilemina Sharp', 'ACT0048', 2, 1, 0, NULL, '2023-01-18 17:20:45', '2022-12-31 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-01-18 08:28:33'),
('TASK0128', 'Desirae Vance', 'ACT0048', 2, 1, 0, NULL, '2023-01-18 17:20:25', '2023-01-03 17:00:00', 'Ahmed,23/01/18', 0, '2023-01-18 07:43:56', '2023-01-18 08:28:43');

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
('CTY0001', 'School1'),
('CTY0002', 'Bank'),
('CTY0003', 'School');

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
  `TOTAL_DATE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IS_APPROVE` tinyint(4) NOT NULL DEFAULT 0,
  `STATUS` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New Release',
  `CATEGORY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_detail`
--

INSERT INTO `prj_detail` (`DETAIL_ID`, `NAME_PROJECT`, `REASONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `RESULT`, `DATE_START`, `DATE_END`, `created_at`, `RECORD_CREATOR`, `PROJECT_MANAGER`, `updated_at`, `TOTAL_DATE`, `IS_APPROVE`, `STATUS`, `CATEGORY_ID`) VALUES
('230002', 'School Website', '1-Help School\r\n2-Easy to Use\r\n3-Fast', '1-Help School\r\n2-Easy to Use\r\n3-Fast', 'Yala', 'Some School', '50000', '1-Help School\r\n2-Easy to Use\r\n3-Fast', '2023-01-18', '2023-03-28', '2023-01-18 09:10:14', 'USER00004', 'USER0004', '2023-01-18 10:27:33', '7 week', 1, 'New Release,Approved,Progress,Completed', 'CTY0001'),
('230003', 'Jakeem Davis', 'Et ad ipsum vero lab', 'Facere consequatur', 'Sed sit eu ea expli', 'Recusandae Sed volu', '16', 'Dolores magnam id es', '1983-03-23', '1983-03-25', '2023-01-18 10:27:03', 'USER00004', 'USER0004', '2023-01-25 16:35:32', '2 day', 1, 'New Release,Approved,Progress,workingOn', 'CTY0002'),
('230004', 'Test Task Counter Test Task Counter', '1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', 'Yala', 'Test Task Counter', '50000', '1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\r\n\r\n1914 translation by H. Rackham\r\n\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '2023-01-19', '2023-02-17', '2023-01-18 19:06:59', 'USER00004', 'USER0004', '2023-01-18 19:08:56', '3 week', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('230005', 'Wanda Montgomerydgdssa', 'Voluptas blanditaiisdsfdgfgd', 'Quia et alias eum si', 'Consequatur et ut a', 'Veniam siddfss d', '69', 'Eu assumenda et sdsdnobsdisd', '1996-11-16', '1997-04-25', '2023-01-18 20:24:47', 'USER00004', 'USER0004', '2023-01-19 01:20:42', '115 day', 1, 'New Release,Approved,Progress,workingOn', 'CTY0002'),
('230007', 'Hayden Guy', 'Dolor voluptas simil', 'Sunt reiciendis recu', 'Sapiente in eveniet', 'Architecto adipisici', '64', 'Dolor culpa sed aliq', '2016-04-14', '2023-01-31', '2023-01-25 02:03:21', 'USER00003', 'USER0004', '2023-01-25 02:03:21', '4176991 day', 0, 'New Release,workingOn', 'CTY0001'),
('230008', 'New schoolme', 'Resolution Guyot, formerly known as Huevo, is a guyot (tablemount) in the underwater Mid-Pacific Mountains. It is a circular flat mountain, rising 500 metres (1,600 ft) above the seafloor to a depth of about 1,320 metres (4,330 ft), with a', 'Resolution Guyot, formerly known as Huevo, is a guyot (tablemount) in the underwater Mid-Pacific Mountains. It is a circular flat mountain, rising 500 metres (1,600 ft) above the seafloor to a depth of about 1,320 metres (4,330 ft), with a', 'HYD', 'Student', '10000', '... that Katō Kanji (pictured), leader of the fleet faction, shouted that \"war with America starts now\" after the signing of the Washington Naval Treaty?\r\n... that the music video for David Bowie\'s \"Ashes to Ashes\" was, at a cost of £250,000, the most expensive made at the time?\r\n... that Jack Champion had to film all his scenes in Avatar: The Way of Water twice?', '2023-02-02', '2023-04-03', '2023-02-02 01:45:24', 'USER00003', 'USER0004', '2023-02-02 01:45:24', '60 day', 0, 'New Release,workingOn', 'CTY0001'),
('230012', 'Test T\\Start date', 'Repudiandae voluptat', 'Quas harum nihil ut', 'Architecto placeat', 'Sed ad ipsum omnis a', '1', 'Consectetur molesti', '1977-02-25', '2023-01-23', '2023-01-19 01:04:40', 'USER00004', 'USER0004', '2023-01-19 01:09:04', '8700850 week', 1, 'New Release,Approved,Progress,workingOn', 'CTY0001'),
('230023', 'Test the trart date', 'Aspernatur dignissim', 'Quam maiores et dolo', 'Eius commodo enim cu', 'Consequatur Autem v', '77', 'Aliquip repellendus', '1985-12-20', '1986-01-20', '2022-01-18 07:43:55', 'USER00004', 'USER0004', '2022-01-18 08:28:43', '3 week', 1, 'New Release,Approved,Progress,Completed', 'CTY0001');

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
('06', 'King Vajiralongkorn\'s Birthday', '2023-06-28'),
('07', ' Mother\'s Birthday Holiday', '2023-08-14'),
('08', 'Passing of His Majesty the Late King', '2023-10-13'),
('09', 'Chulalongkorn Memorial Day', '2023-10-23'),
('10', 'His Majesty the Late King\'s Birthday', '2023-12-05'),
('11', 'Constitution Day Holiday', '2023-10-11'),
('HDAY0012', 'Test 2024', '2024-06-27');

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
('ACT0005', 'Login & Signup', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-01-18 10:03:20', 3, '2023-01-10 17:00:00', '2023-01-17 17:00:00'),
('ACT0006', 'Dashboard', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-02 00:42:23', 4, '2022-12-31 17:00:00', '2023-01-17 17:00:00'),
('ACT0007', 'Home Page', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-01-18 10:04:13', 2, '2023-01-05 17:00:00', '2023-01-17 17:00:00'),
('ACT0008', 'Testing', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-02-02 00:42:23', 6, '2023-01-06 17:00:00', '2023-01-17 17:00:00'),
('ACT0009', 'Deploy', '230002', 'week', 1, '2023-01-18 09:10:14', '2023-01-18 10:27:33', 1, '2023-01-16 17:00:00', '2023-01-17 17:00:00'),
('ACT0010', 'Cullen Leon', '230003', 'week', 0, '2023-01-18 10:27:03', '2023-01-25 16:35:32', 1, '2023-01-24 17:00:00', NULL),
('ACT0011', 'egsdsdgsgsges', '230004', 'week', 0, '2023-01-18 19:06:59', '2023-01-18 19:08:56', 1, '2023-01-18 17:00:00', NULL),
('ACT0012', 'dsvdsgds', '230004', 'week', 1, '2023-01-18 19:06:59', '2023-01-18 19:10:19', 2, '2023-01-18 17:00:00', '2023-01-18 17:00:00'),
('ACT0013', 'Tanner Tanner', '230005', 'day', 1, '2023-01-18 20:24:47', '2023-01-19 01:00:54', 1, NULL, '2023-01-18 17:00:00'),
('ACT0014', 'Zachary Albert', '230005', 'day', 0, '2023-01-18 20:24:47', '2023-01-19 01:20:56', 2, '2023-01-18 17:00:00', NULL),
('ACT0018', 'Cain Butler', '230007', 'day', 0, '2023-01-25 02:03:21', '2023-01-25 02:03:21', 1, NULL, NULL),
('ACT0019', 'Harrison Spears', '230007', 'day', 0, '2023-01-25 02:03:21', '2023-01-25 02:03:21', 2, NULL, NULL),
('ACT0021', 'Venus Franklin', '230012', 'week', 0, '2023-01-19 01:04:40', '2023-01-19 01:09:15', 1, '2023-01-18 17:00:00', NULL),
('ACT0022', 'Karen Chaney', '230012', 'week', 0, '2023-01-19 01:04:40', '2023-01-19 01:16:48', 2, '2023-01-18 17:00:00', NULL),
('ACT0023', 'Kylan Quinn', '230012', 'week', 0, '2023-01-19 01:04:40', '2023-01-19 01:09:39', 3, '2023-01-18 17:00:00', NULL),
('ACT0024', 'efsgew', '230023', NULL, 0, '2023-02-01 19:04:07', '2023-02-01 19:04:07', 5, NULL, NULL),
('ACT0025', 'Requirement', '230008', 'day', 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24', 1, NULL, NULL),
('ACT0026', 'sdgsdgsdgsd', '230023', NULL, 0, '2023-02-01 09:04:41', '2023-02-01 09:04:59', 2, NULL, NULL),
('ACT0027', 'Design system and prototype', '230008', 'day', 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24', 2, NULL, NULL),
('ACT0028', 'Present', '230008', 'day', 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24', 3, NULL, NULL),
('ACT0029', 'pubblishing', '230008', 'day', 0, '2023-02-02 01:45:24', '2023-02-02 01:45:24', 4, NULL, NULL),
('ACT0046', 'Alfonso Tanner 2', '230023', 'week', 1, '2023-01-18 07:43:56', '2023-02-01 09:04:59', 1, '2023-01-02 17:00:00', '2023-01-17 17:00:00'),
('ACT0047', 'Emerson Webb', '230023', 'week', 1, '2023-01-18 07:43:56', '2023-02-01 19:03:50', 4, '2023-01-15 17:00:00', '2023-01-17 17:00:00'),
('ACT0048', 'Orson Mcgowan', '230023', 'week', 1, '2023-01-18 07:43:56', '2023-02-01 19:03:50', 3, '2023-01-16 17:00:00', '2023-01-17 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NICKNAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARD_ID` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEPHONE` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DEPARTMENT` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POSITION` tinyint(4) DEFAULT 0 COMMENT '0=> Employee, 1=> Admin, 2=> Project Manager, 3=> Manager',
  `IS_ACTIVE` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_login`
--

INSERT INTO `prj_project_login` (`LOGIN_ID`, `EMAIL`, `password`, `NAME`, `IMG`, `NICKNAME`, `CARD_ID`, `TELEPHONE`, `DEPARTMENT`, `POSITION`, `IS_ACTIVE`, `updated_at`, `created_at`) VALUES
('88', 'caca@gmail.com', '02222', 'Hadi', NULL, 'Hadi', 'gs234234', '03243243', '32423fdg', 0, 1, '2023-01-03 13:06:56', '2023-01-03 13:06:56'),
('USER00003', 'admin@admin.com', '$2y$10$JgYfYRKhh5AqzWiadRiN3OhuTB.3HWLa2UoERUBJNCXj1gqmMTw.K', 'Fin', '1674682804.jpg', 'dhrah', '24563642462', '624426426', 'Graphic', 1, 1, '2023-01-04 02:06:30', '2023-01-04 02:06:30'),
('USER00004', 'user@gmail.com', '$2y$10$/I2TrHrQm1gg4SaesI7Bc.0HqmrncOYHzmeWA/gFZXtjhjyUVDji2', 'Ahmed', '1674674582.jpg', 'fdd', '53', '443', NULL, 0, 1, '2023-01-08 19:54:17', '2023-01-08 19:54:17'),
('USER00005', 'boodyfatani2070ftu@ftu.ac.th', '$2y$10$t.IfkP1w.AenMvpqxch/..x5jOgmCkZhKBB7ORrxxuccvWsP592Hi', 'อับดุลรอมาน', NULL, NULL, NULL, NULL, 'rere', 0, 1, '2023-01-25 01:25:21', '2023-01-25 00:42:33'),
('USER0004', 'manager@manager.com', '$2y$10$esEQBnFowrpG5c4216sYS.sGupwNS8T5BPqmwcSerEQYGJaaFrQbS', 'Rashad Haney', '1674686180.jpg', 'Kiona Stephens', '73', '55', 'Miriam Mcclure', 3, 1, '2023-01-06 00:52:05', '2023-01-06 00:52:05');

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
(360, 'USER00004', '230023'),
(361, 'USER00004', '230002'),
(362, 'USER0004', '230002'),
(364, 'USER00003', '230003'),
(365, 'USER00004', '230003'),
(366, 'USER0004', '230003'),
(367, 'USER00003', '230004'),
(368, 'USER00004', '230004'),
(390, 'USER00003', '230003'),
(392, 'USER0004', '230003'),
(393, 'USER00004', '230005'),
(394, 'USER0004', '230005'),
(413, 'USER0004', '230005'),
(415, 'USER0004', '230005'),
(417, 'USER0004', '230005'),
(419, 'USER0004', '230005'),
(421, 'USER0004', '230005'),
(423, 'USER0004', '230005'),
(425, 'USER0004', '230005'),
(427, 'USER0004', '230005'),
(429, 'USER0004', '230005'),
(431, 'USER0004', '230005'),
(433, 'USER0004', '230005'),
(435, 'USER0004', '230005'),
(437, 'USER0004', '230005'),
(439, 'USER0004', '230005'),
(441, 'USER0004', '230005'),
(443, 'USER0004', '230005'),
(445, 'USER0004', '230005'),
(447, 'USER0004', '230005'),
(449, 'USER0004', '230005'),
(451, 'USER0004', '230005'),
(453, 'USER0004', '230005'),
(455, 'USER0004', '230005'),
(466, 'USER00003', '230012'),
(467, 'USER0004', '230012'),
(468, 'USER00003', '230007'),
(469, 'USER0004', '230007'),
(470, '88', '230008'),
(471, 'USER00004', '230008'),
(472, 'USER0004', '230008');

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
  `PROJECT_PERCENTAGE` varchar(4) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prj_project_track`
--

INSERT INTO `prj_project_track` (`PROJECT_TRACK_ID`, `PROJECT_ID`, `STATUS`, `TRACKER`, `USER_TRACKER`, `APPROVED_BY`, `DATE_TRACKER`, `PROJECT_PERCENTAGE`, `updated_at`) VALUES
('PTR0002', '230002', 3, 'New Release,Approved,Progress,Completed', NULL, 'Ali,23/01/18', NULL, '100', '2023-01-18 10:27:33'),
('PTR0003', '230003', 2, 'New Release,Approved,Progress,workingOn', NULL, 'Ali,23/01/19', NULL, '0', '2023-01-25 16:35:32'),
('PTR0004', '230004', 2, 'New Release,Approved,Progress,workingOn', NULL, 'Ali,23/01/19', NULL, '75', '2023-01-18 19:10:19'),
('PTR0005', '230005', 2, 'New Release,Approved,Progress,workingOn', NULL, 'Ali,23/01/19', NULL, '50', '2023-01-19 01:20:42'),
('PTR0007', '230007', 0, 'New Release', NULL, NULL, NULL, '0', '2023-01-25 09:03:21'),
('PTR0008', '230008', 0, 'New Release', NULL, NULL, NULL, '0', '2023-02-02 08:45:24'),
('PTR0012', '230012', 2, 'New Release,Approved,Progress,workingOn', NULL, 'Ali,23/01/19', NULL, '12', '2023-01-19 01:09:22'),
('PTR0023', '230023', 3, 'New Release,Approved,Progress,Completed', NULL, 'Ali,23/01/18', NULL, '100', '2023-01-18 08:28:43');

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
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

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
