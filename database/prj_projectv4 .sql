-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 04:19 AM
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
-- Table structure for table `prj_activity_task`
--

CREATE TABLE `prj_activity_task` (
  `TASK_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TASK_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DAY` smallint(10) DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `created_at`, `updated_at`) VALUES
('11', 'aaa', '33', 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('12', 'ddd', '33', 4, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('13', 'dddddddd', '33', 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('14', 'dddddddddd', '33', 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('15', 'ssss', '34', 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('16', 'ssssssssssss', '34', 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('20', 'ข้าว', '37', 5, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('21', 'ไข่', '37', 5, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('22', 'asdasasda', '42', 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('23', 'adasdasasd', '43', 2, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('24', 'kdlsjflsdjkf', '44', 2, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('25', 'adsas', '45', 4, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('26', 'ข้าวผัด', '46', 1, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('27', 'ข้าว2', '46', 2, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
('PRJ0015', 'Task 1.1', '862', 11, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0016', 'Task 1.2', '862', 1, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0017', 'Task 2.1', '978', 4, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0018', 'Task 2.2', '978', 7, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0019', 'Task 2.3', '978', 4, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0020', 'Task 2.4', '978', 8, 0, '2022-12-21 09:40:58', '2022-12-21 09:40:58'),
('PRJ0021', 'Doris Durham', '121', 65, 0, '2022-12-21 19:03:58', '2022-12-21 19:03:58'),
('PRJ0022', 'Ciara Crawford', '4823', 46, 0, '2022-12-21 19:03:58', '2022-12-21 19:03:58'),
('PRJ0023', 'Ariana Day', '942', 68, 0, '2022-12-21 19:03:58', '2022-12-21 19:03:58'),
('PRJ0024', 'Molly Albert', '2885', 29, 0, '2022-12-21 23:25:29', '2022-12-21 23:25:29'),
('PRJ0025', 'Ulla Oneill', '2885', 21, 0, '2022-12-21 23:25:29', '2022-12-21 23:25:29'),
('PRJ0026', 'Maggie Yates', '29', NULL, 0, '2022-12-21 23:33:00', '2022-12-21 23:33:00'),
('PRJ0027', 'Clark Mills', '2479', 75, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0028', 'Whitney Aguilar', '2479', 90, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0029', 'Forrest Kaufman', '2445', 2, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0030', 'Ulysses Murray', '2445', 5, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0031', 'Stone Heath', '2445', 29, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0032', 'Tanisha Craig', '4186', 36, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0033', 'Ulric Wise', '4186', 68, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0034', 'Selma Aguirre', '1410', 14, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0035', 'Trevor Klein', '1410', 40, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0036', 'Rafael Hatfield', '1410', 37, 0, '2022-12-23 07:41:31', '2022-12-23 07:41:31'),
('PRJ0037', 'Task 1.1', '946', 1, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0038', 'Task 1.2', '946', 2, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0039', 'Task 1.2', '946', 4, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0040', 'Task 2.1', '3109', 5, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0041', 'Task 2.2', '3109', 6, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0042', 'Task 3.1', '1617', 4, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0043', 'Task 3.2', '1617', 2, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0044', 'Task 3.3', '1617', 2, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0045', 'Task 3.4', '1617', 6, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0046', 'Task 3.4', '4239', 7, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0047', 'Task 5.1', '2241', 5, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0048', 'Task 5.2', '2241', 4, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0049', 'Task 5.3', '2241', 6, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0050', 'Task 5.4', '2241', 7, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0051', 'Task 5.5', '2241', 5, 0, '2022-12-23 08:41:49', '2022-12-23 08:41:49'),
('PRJ0052', 'Task 1.1', '2859', NULL, 0, '2022-12-23 08:52:14', '2022-12-23 08:52:14'),
('PRJ0053', 'Task 1.2', '2859', NULL, 0, '2022-12-23 08:52:14', '2022-12-23 08:52:14'),
('PRJ0054', 'Task 2.2', '3643', NULL, 0, '2022-12-23 08:52:14', '2022-12-23 08:52:14'),
('PRJ0055', 'Task 1.1', '1654', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0056', 'Task 1.2', '1654', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0057', 'Task 2.2', '4386', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0058', 'Task 3.1', '3236', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0059', 'Task 3.2', '3236', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0060', 'Task 3.3', '3236', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0061', 'Task 3.4', '3236', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0062', 'Task 4.1', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0063', 'Task 4.2', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0064', 'Task 4.3', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0065', 'Task 4.4', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0066', 'Task 4.5', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0067', 'Task 4.6', '1367', NULL, 0, '2022-12-23 08:52:27', '2022-12-23 08:52:27'),
('PRJ0068', 'Jonas Day', '2880', 13, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0069', 'George Estrada', '2880', 27, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0070', 'Yetta Gould', '2880', 36, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0071', 'Genevieve Osborn', '2880', 24, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0072', 'Callum Bridges', '706', 85, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0073', 'Neil Graham', '706', 73, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0074', 'Ciara Madden', '2057', 31, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0075', 'Lesley Daniel', '2057', 16, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0076', 'Nathaniel Nicholson', '2874', 19, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0077', 'Meredith Sullivan', '2874', 83, 0, '2022-12-23 08:54:57', '2022-12-23 08:54:57'),
('PRJ0078', 'Task 1.1', '915', NULL, 0, '2022-12-25 19:24:14', '2022-12-25 19:24:14'),
('PRJ0079', 'Task 2.1', '915', NULL, 0, '2022-12-25 19:24:14', '2022-12-25 19:24:14'),
('PRJ0080', 'Task 3.1', '4341', NULL, 0, '2022-12-25 19:24:14', '2022-12-25 19:24:14'),
('PRJ0081', 'Task 3.2', '1909', NULL, 0, '2022-12-25 19:24:14', '2022-12-25 19:24:14'),
('PRJ0082', 'Task 1.1', '1723', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0083', 'Task 1.2', '1723', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0084', 'Task 2.1', '4886', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0085', 'Task 3.1', '4875', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0086', 'Task 3.2', '4875', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0087', 'Task 3.3', '4875', NULL, 0, '2022-12-25 19:27:32', '2022-12-25 19:27:32'),
('PRJ0088', 'retr', '3835', NULL, 0, '2022-12-25 19:28:46', '2022-12-25 19:28:46'),
('PRJ0089', 'etw', '2093', NULL, 0, '2022-12-25 19:28:46', '2022-12-25 19:28:46'),
('PRJ0090', 'wet', '1117', NULL, 0, '2022-12-25 19:28:46', '2022-12-25 19:28:46'),
('PRJ0091', 'wet', '900', NULL, 0, '2022-12-25 19:28:46', '2022-12-25 19:28:46'),
('PRJ0092', 'ewr', 'ACT0001', NULL, 0, '2022-12-25 19:44:11', '2022-12-25 19:44:11'),
('PRJ0093', 'er', 'ACT0002', NULL, 0, '2022-12-25 19:44:11', '2022-12-25 19:44:11'),
('PRJ0094', 'e', 'ACT0003', NULL, 0, '2022-12-25 19:44:11', '2022-12-25 19:44:11'),
('PRJ0095', 'rew', 'ACT0003', NULL, 0, '2022-12-25 19:44:11', '2022-12-25 19:44:11'),
('PRJ0096', 'Task 1.1', 'ACT0001', NULL, 0, '2022-12-25 19:45:40', '2022-12-25 19:45:40'),
('PRJ0097', 'Task 1.2', 'ACT0001', NULL, 0, '2022-12-25 19:45:40', '2022-12-25 19:45:40'),
('PRJ0098', 'Task 1.1', 'ACT0061', NULL, 0, '2022-12-25 19:47:59', '2022-12-25 19:47:59'),
('PRJ0099', 'Task 1.2', 'ACT0061', NULL, 0, '2022-12-25 19:47:59', '2022-12-25 19:47:59'),
('PRJ0100', 'Task 2.1', 'ACT0062', NULL, 0, '2022-12-25 19:47:59', '2022-12-25 19:47:59'),
('PRJ0101', 'Task 3.1', 'ACT0063', NULL, 0, '2022-12-25 19:47:59', '2022-12-25 19:47:59'),
('PRJ0102', 'Task 4.1', 'ACT0064', NULL, 0, '2022-12-25 19:47:59', '2022-12-25 19:47:59'),
('TASK0103', 'Task 1.1', 'ACT0065', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0104', 'Task 1.2', 'ACT0065', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0105', 'Task 2.1', 'ACT0066', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0106', 'Task 2.2', 'ACT0066', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0107', 'Task 2.3', 'ACT0066', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0108', 'Task 3.1', 'ACT0067', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0109', 'Task 4.1', 'ACT0068', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0110', 'Task 4.2', 'ACT0068', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0111', 'Task 4.3', 'ACT0068', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35'),
('TASK0112', 'Task 5.1', 'ACT0069', NULL, 0, '2022-12-25 19:51:35', '2022-12-25 19:51:35');

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
  `BUDGET` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RESULT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `RECORD_CREATOR` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PROJECT_MANAGER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `TOTAL_DATE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `IS_APPROVE` tinyint(4) NOT NULL DEFAULT 0,
  `STATUS` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New Release'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_detail`
--

INSERT INTO `prj_detail` (`DETAIL_ID`, `NAME_PROJECT`, `REASONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `RESULT`, `DATE_START`, `DATE_END`, `created_at`, `RECORD_CREATOR`, `PROJECT_MANAGER`, `updated_at`, `TOTAL_DATE`, `IS_APPROVE`, `STATUS`) VALUES
('220001', 'ping', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'yala', 'user', '50000', 'asd', '2022-12-07', '2022-12-08', '2022-12-06 17:00:00', 'nat kk', '1', '2022-12-21 20:49:07', '', 1, 'Progress'),
('220002', 'project2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'dssds', 'dsdssds', 'sdsds', 'sdsds', '2022-12-08', '2022-12-14', '2022-12-06 17:00:00', 'nat kk', '88', '2022-12-21 21:31:22', '', 1, 'Progress'),
('220003', 'โครงการปรับเปลี่ยนบริการดิจิทัลสู่กสู่ ารเป็นมหาวิ', 'ปัจจุบันบั เทคโนโลยีดิยี ดิจิทัลส่งส่ ผลกระทบต่อการดํา เนินงานของหน่วน่ ยงานของรัฐและเอกชนเป็นอย่าย่ งมาก และกระทบในทุก ๆ ด้าน\r\nโดยเฉพาะกับภาคการศึกศึษาที่พบว่าเทคโนโลยีดิจิทัลส่งส่ ผลต่อการเปลี่ยนแปลงหลักสูตรรูปแบบที่นํา มาใช้ในการเรียนการสอนการติดต่อ\r\nส', '1. เพื่อพื่พัฒพั นา Smart YRU Booking สํา หรับรั การให้บริกริาร\r\n2. เพื่อพื่ประเมินมิ ติดตามระบบฐานข้อมูลสารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียน', 'ราชภัฎยะลา', 'พัฒนาระบบ Smart YRU Booking สํา หรับการให้บริกริาร จํา นวน 1 ระบบ\r\n\r\nมีกมีารประเมินมิ ติดตามระบบฐานข้อมูลมู สารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียนการสอนการ\r\nปฏิบัติงาน จํา นวน 1 ครั้งรั้', '500000', 'ระบบสารสนเทศของมหาวิทยาลัยที่ใช้งานสามารถรองรับรั ', '2022-12-08', '2022-12-08', '2022-12-07 17:00:00', 'nat kk', '6', '2022-12-21 06:23:22', '', 0, 'New Release'),
('220004', 'tessss', 'dasdasd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'dasdas', 'dasdas', 'dasdas', 'dasdas', '2022-12-15', '2022-12-15', '2022-12-13 17:00:00', 'นาย ก', '5', '2022-12-21 06:23:22', '', 0, 'New Release'),
('220005', 'Malcolm Whitney', 'Expedita a saepe sed', 'Voluptas molestiae q', 'Quis fugiat cupidata', 'Non ex expedita est', '57', 'Enim nulla dolore at', '2001-04-30', '2014-12-10', '2022-12-21 09:40:58', 'นาย ก', '88', '2022-12-21 09:40:58', '710 week', 0, 'New Release'),
('220006', 'Beatrice Travis', 'Ex consectetur corr', 'Est elit delectus', 'Nostrum consectetur', 'Debitis dolorem magn', '66', 'Consequatur ea fuga', '1971-12-27', '2010-01-09', '2022-12-21 19:03:58', 'นาย ก', '1', '2022-12-21 19:03:58', '13893 Day', 0, 'New Release'),
('220007', 'Lance Blackwell', 'Iure cupiditate ut e', 'Tenetur quia vel exe', 'Voluptas reiciendis', 'Sed quis soluta nihi', '6', 'Est culpa sit ea', '1975-01-03', '2005-04-17', '2022-12-21 23:25:29', '88', '88', '2022-12-21 23:25:29', '368 Month', 0, 'New Release'),
('220008', 'Miranda French', 'Voluptate error odit', 'Ipsum libero accusa', 'Repudiandae minima l', 'Aliqua Qui omnis ma', '2', 'Accusamus voluptates', '1988-09-02', '2010-02-18', '2022-12-21 23:33:00', '88', '88', '2022-12-21 23:33:00', '7839 Day', 0, 'New Release'),
('220009', 'Addison Levy', 'Incididunt rem volup', 'Sed minima eum ab fu', 'Consectetur non vol', 'Harum quibusdam ut v', '2', 'Eos vero dolor unde', '1971-05-12', '1985-08-11', '2022-12-21 23:33:47', '88', '88', '2022-12-21 23:33:47', '173 Month', 0, 'New Release'),
('220010', 'Tyrone Logan', 'In veniam est aut i', 'Et ducimus exceptur', 'Aut quos dolorum sit', 'Vel quae deserunt ve', '45', 'Similique et ipsam i', '2017-09-10', '2017-09-12', '2022-12-23 02:11:30', '88', '88', '2022-12-23 02:11:30', '0', 0, 'New Release'),
('220011', 'Aurora Hammond', 'Aliquid aut enim iur', 'Ullam quis perspicia', 'Dolor et adipisicing', 'Corporis est perfere', '56', 'Id ut id voluptas vo', '1970-03-02', '1970-03-03', '2022-12-23 07:35:13', '88', '88', '2022-12-23 07:35:13', '0', 0, 'New Release'),
('220012', 'Steel Simon', 'Laborum et et autem', 'Sunt porro accusant', 'Reprehenderit sint', 'Sunt voluptatum sin', '73', 'Nobis consectetur i', '2003-07-17', '2003-07-18', '2022-12-23 07:36:37', '88', '88', '2022-12-23 07:36:37', '0', 0, 'New Release'),
('220013', 'Test Task Counter', 'Ullam officia vel vi', 'Molestiae minus cupi', 'Qui eu rerum irure v', 'Quaerat commodo mole', '62', 'Mollit ut exercitati', '2000-09-29', '2000-09-30', '2022-12-23 07:38:48', '88', '88', '2022-12-23 07:38:48', '0', 0, 'New Release'),
('220014', '1111111111111111', 'Et dolor tempor pari', 'Et sed est rem irur', 'Accusantium suscipit', 'Est ab asperiores om', '77', 'Non asperiores vel i', '2007-10-30', '2007-11-06', '2022-12-23 07:41:31', '88', '88', '2022-12-23 07:41:31', '0', 0, 'New Release'),
('220015', 'Project 1', 'Vero magna magnam al', 'Ipsum velit officia', 'Fuga Dolor culpa ad', 'Illo adipisci volupt', '5', 'Nobis ipsum natus o', '1981-03-28', '1981-03-29', '2022-12-23 08:41:49', '88', '88', '2022-12-23 08:41:49', '0', 0, 'New Release'),
('220016', 'Project 100', 'Laboris itaque quisq', 'Impedit magnam laud', 'Perferendis id nesci', 'Labore dolor et dict', '69', 'Sit officiis volupt', '2009-06-21', '2009-06-22', '2022-12-23 08:52:14', '88', '88', '2022-12-23 08:52:14', '0', 0, 'New Release'),
('220017', 'Project 100', 'Laboris itaque quisq', 'Impedit magnam laud', 'Perferendis id nesci', 'Labore dolor et dict', '69', 'Sit officiis volupt', '2009-06-21', '2009-06-22', '2022-12-23 08:52:27', '88', '88', '2022-12-23 08:52:27', '0', 0, 'New Release'),
('220018', 'Giselle Rodriquez', 'Voluptate beatae ull', 'Autem vero commodo e', 'Sed dolore magnam in', 'Excepturi rerum dolo', '64', 'Amet proident dolo', '1991-12-29', '1992-01-05', '2022-12-23 08:54:57', '88', '88', '2022-12-23 08:54:57', '0', 0, 'New Release'),
('220019', 'Nolan Ruiz', 'Suscipit aut totam p', 'Dolores in totam aut', 'Et voluptas pariatur', 'Qui beatae eos volup', '1', 'Odit debitis rem por', '2011-07-16', '2011-07-18', '2022-12-25 19:24:14', '88', '88', '2022-12-25 19:24:14', '0', 0, 'New Release'),
('220020', 'Maris Parker', 'Ipsum voluptate vel', 'Et nihil quo est ut', 'Et maxime dolore exc', 'Facilis corporis et', '48', 'Ex architecto pariat', '1971-12-20', '1971-12-23', '2022-12-25 19:27:32', '88', '88', '2022-12-25 19:27:32', '0', 0, 'New Release'),
('220021', 'Christen Rose', 'Fugiat quis numquam', 'Delectus beatae opt', 'Qui consequuntur sae', 'Pariatur Et et odit', '43', 'Quia dolor veniam a', '1971-07-28', '1971-07-30', '2022-12-25 19:28:46', '88', '88', '2022-12-25 19:28:46', '0', 0, 'New Release'),
('220022', 'Clio Wilkinson', 'Voluptate corrupti', 'Ut ab sunt quis per', 'Ut et ut maxime aspe', 'Cum minima ea veniam', '6', 'Elit officia ut inc', '1994-11-16', '1994-11-23', '2022-12-25 19:37:32', '88', '88', '2022-12-25 19:37:32', '0', 0, 'New Release'),
('220023', 'Clio Wilkinson', 'Voluptate corrupti', 'Ut ab sunt quis per', 'Ut et ut maxime aspe', 'Cum minima ea veniam', '6', 'Elit officia ut inc', '1994-11-16', '1994-11-23', '2022-12-25 19:39:03', '88', '88', '2022-12-25 19:39:03', '0', 0, 'New Release'),
('220024', 'Clio Wilkinson', 'Voluptate corrupti', 'Ut ab sunt quis per', 'Ut et ut maxime aspe', 'Cum minima ea veniam', '6', 'Elit officia ut inc', '1994-11-16', '1994-11-23', '2022-12-25 19:44:11', '88', '88', '2022-12-25 19:44:11', '0', 0, 'New Release'),
('220025', 'Colin Dickerson', 'Excepturi eu facere', 'Dolore omnis non ut', 'Earum velit eligendi', 'Ut excepteur aliquam', '70', 'Nisi sunt ut offici', '1991-12-15', '1991-12-17', '2022-12-25 19:45:40', '88', '88', '2022-12-25 19:45:40', '0', 0, 'New Release'),
('220026', 'Colin Dickerson', 'Excepturi eu facere', 'Dolore omnis non ut', 'Earum velit eligendi', 'Ut excepteur aliquam', '70', 'Nisi sunt ut offici', '1991-12-15', '1991-12-17', '2022-12-25 19:47:49', '88', '88', '2022-12-25 19:47:49', '0', 0, 'New Release'),
('220027', 'Colin Dickerson', 'Excepturi eu facere', 'Dolore omnis non ut', 'Earum velit eligendi', 'Ut excepteur aliquam', '70', 'Nisi sunt ut offici', '1991-12-15', '1991-12-17', '2022-12-25 19:47:59', '88', '88', '2022-12-25 19:47:59', '0', 0, 'New Release'),
('220028', 'Aurora Vega', 'Totam iste ratione c', 'Qui reprehenderit s', 'Similique repellendu', 'Doloremque quibusdam', '22', 'Rerum tempor et et r', '2007-02-18', '2007-02-25', '2022-12-25 19:51:35', '88', '88', '2022-12-25 19:51:35', '0', 0, 'New Release');

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
('11', 'Constitution Day Holiday', '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_activity`
--

CREATE TABLE `prj_project_activity` (
  `ACTIVITY_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DAY_WEEK` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACTIVITY_ORDER` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_activity`
--

INSERT INTO `prj_project_activity` (`ACTIVITY_ID`, `ACTIVITY_NAME`, `DETAIL_ID`, `DAY_WEEK`, `created_at`, `updated_at`, `ACTIVITY_ORDER`) VALUES
('1117', 'A3', '220021', '2', '2022-12-25 19:28:46', '2022-12-25 19:28:46', 3),
('1135', 'Rhoda Pittman', '220013', '1', '2022-12-23 07:38:48', '2022-12-23 07:38:48', 0),
('121', 'Rebecca Rodriguez', '220006', 'day', '2022-12-21 19:03:58', '2022-12-21 19:03:58', 0),
('1367', 'A4', '220017', '1', '2022-12-23 08:52:27', '2022-12-23 08:52:27', 0),
('1410', 'Ralph Summers', '220014', '1', '2022-12-23 07:41:31', '2022-12-23 07:41:31', 0),
('1550', 'Lani Mcfarland', '220012', '1', '2022-12-23 07:36:37', '2022-12-23 07:36:37', 0),
('1617', 'Activity 3', '220015', '1', '2022-12-23 08:41:49', '2022-12-23 08:41:49', 0),
('1654', 'A1', '220017', '1', '2022-12-23 08:52:27', '2022-12-23 08:52:27', 0),
('1723', 'A1', '220020', '3', '2022-12-25 19:27:32', '2022-12-25 19:27:32', 1),
('203', 'Fleur Kennedy', '220010', '2', '2022-12-23 02:11:30', '2022-12-23 02:11:30', 0),
('2051', 'Mark Santos', '220012', '1', '2022-12-23 07:36:37', '2022-12-23 07:36:37', 0),
('2057', 'A3', '220018', '1', '2022-12-23 08:54:57', '2022-12-23 08:54:57', 0),
('2093', 'A2', '220021', '2', '2022-12-25 19:28:46', '2022-12-25 19:28:46', 2),
('2241', 'Activity 5', '220015', '1', '2022-12-23 08:41:49', '2022-12-23 08:41:49', 0),
('2445', 'Francesca Rogers', '220014', '1', '2022-12-23 07:41:31', '2022-12-23 07:41:31', 0),
('2479', 'Harlan Sharp', '220014', '1', '2022-12-23 07:41:31', '2022-12-23 07:41:31', 0),
('2819', 'Baxter Harrell', '220011', '1', '2022-12-23 07:35:13', '2022-12-23 07:35:13', 0),
('2859', 'A1', '220016', '1', '2022-12-23 08:52:14', '2022-12-23 08:52:14', 0),
('2874', 'A4', '220018', '1', '2022-12-23 08:54:57', '2022-12-23 08:54:57', 0),
('2875', 'Malachi Hunt', '220013', '1', '2022-12-23 07:38:48', '2022-12-23 07:38:48', 0),
('2880', 'A1', '220018', '1', '2022-12-23 08:54:57', '2022-12-23 08:54:57', 0),
('2885', 'Hasad Fitzgerald', '220007', '100', '2022-12-21 23:25:29', '2022-12-21 23:25:29', 0),
('29', 'Raja Hubbard', '220008', '43', '2022-12-21 23:33:00', '2022-12-21 23:33:00', 0),
('31', '1.good', '220001', '', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('3109', 'Activity 2', '220015', '1', '2022-12-23 08:41:49', '2022-12-23 08:41:49', 0),
('32', '2.verygood', '220001', '', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('3236', 'A3', '220017', '1', '2022-12-23 08:52:27', '2022-12-23 08:52:27', 0),
('33', 'ddddd', '220002', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('3344', 'Xander Tucker', '220013', '1', '2022-12-23 07:38:48', '2022-12-23 07:38:48', 0),
('3384', 'Jared Burks', '220013', '1', '2022-12-23 07:38:48', '2022-12-23 07:38:48', 0),
('34', 'ddddddd', '220002', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('341', 'Suki Fulton', '220011', '1', '2022-12-23 07:35:13', '2022-12-23 07:35:13', 0),
('3643', 'Jaden Peters', '220010', '2', '2022-12-23 02:11:30', '2022-12-23 02:11:30', 0),
('3677', 'Clementine Kramer', '220010', '2', '2022-12-23 02:11:30', '2022-12-23 02:11:30', 0),
('37', 'ข้าวผัด', '220003', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('3835', 'A1', '220021', '2', '2022-12-25 19:28:46', '2022-12-25 19:28:46', 1),
('4035', 'Imelda Leach', '220013', '1', '2022-12-23 07:38:48', '2022-12-23 07:38:48', 0),
('4186', 'Libby Bolton', '220014', '1', '2022-12-23 07:41:31', '2022-12-23 07:41:31', 0),
('42', 'dasdas', '220004', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('4239', 'Activity 4', '220015', '1', '2022-12-23 08:41:49', '2022-12-23 08:41:49', 0),
('43', 'dasd', '220004', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('4310', 'Gemma Cross', '220009', '82', '2022-12-21 23:33:47', '2022-12-21 23:33:47', 0),
('4341', 'A2', '220019', '2', '2022-12-25 19:24:14', '2022-12-25 19:24:14', 2),
('4386', 'A2', '220017', '1', '2022-12-23 08:52:27', '2022-12-23 08:52:27', 0),
('44', 'dasdas', '220004', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('45', 'dasdasda', '220004', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31', 0),
('4823', 'Florence Mcfarland', '220006', 'day', '2022-12-21 19:03:58', '2022-12-21 19:03:58', 0),
('4857', 'Rina Cole', '220012', '1', '2022-12-23 07:36:37', '2022-12-23 07:36:37', 0),
('4875', 'A3', '220020', '3', '2022-12-25 19:27:32', '2022-12-25 19:27:32', 3),
('4886', 'A2', '220020', '3', '2022-12-25 19:27:32', '2022-12-25 19:27:32', 2),
('706', 'A2', '220018', '1', '2022-12-23 08:54:57', '2022-12-23 08:54:57', 0),
('862', 'A1', '220005', 'week', '2022-12-21 09:40:58', '2022-12-21 09:40:58', 0),
('900', 'A4', '220021', '2', '2022-12-25 19:28:46', '2022-12-25 19:28:46', 4),
('915', 'A1', '220019', '2', '2022-12-25 19:24:14', '2022-12-25 19:24:14', 1),
('942', 'Holly Bush', '220006', 'day', '2022-12-21 19:03:58', '2022-12-21 19:03:58', 0),
('946', 'Activity 1', '220015', '1', '2022-12-23 08:41:49', '2022-12-23 08:41:49', 0),
('978', 'A2', '220005', 'week', '2022-12-21 09:40:58', '2022-12-21 09:40:58', 0),
('ACT0001', 'A1', '220024', '1', '2022-12-25 19:44:11', '2022-12-25 19:44:11', 1),
('ACT0002', 'A2', '220024', '1', '2022-12-25 19:44:11', '2022-12-25 19:44:11', 2),
('ACT0003', 'A3', '220024', '1', '2022-12-25 19:44:11', '2022-12-25 19:44:11', 3),
('ACT0061', 'A1', '220027', '2', '2022-12-25 19:47:59', '2022-12-25 19:47:59', 1),
('ACT0062', 'A2', '220027', '2', '2022-12-25 19:47:59', '2022-12-25 19:47:59', 2),
('ACT0063', 'A3', '220027', '2', '2022-12-25 19:47:59', '2022-12-25 19:47:59', 3),
('ACT0064', 'A4', '220027', '2', '2022-12-25 19:47:59', '2022-12-25 19:47:59', 4),
('ACT0065', 'A1', '220028', '1', '2022-12-25 19:51:35', '2022-12-25 19:51:35', 1),
('ACT0066', 'A2', '220028', '1', '2022-12-25 19:51:35', '2022-12-25 19:51:35', 2),
('ACT0067', 'A3', '220028', '1', '2022-12-25 19:51:35', '2022-12-25 19:51:35', 3),
('ACT0068', 'A4', '220028', '1', '2022-12-25 19:51:35', '2022-12-25 19:51:35', 4),
('ACT0069', 'A5', '220028', '1', '2022-12-25 19:51:35', '2022-12-25 19:51:35', 5);

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
(7, '2', '220001'),
(8, '4', '220001'),
(9, '5', '220001'),
(10, '2', '220002'),
(11, '4', '220002'),
(12, '5', '220002'),
(13, '4', '220003'),
(14, '5', '220003'),
(15, '6', '220003'),
(16, '2', '220004'),
(17, '5', '220004'),
(18, '6', '220004'),
(22, '4', '220004'),
(23, '5', '220004'),
(24, '6', '220004'),
(88, '2', '220005'),
(89, '4', '220005'),
(90, '88', '220005'),
(91, '4', '220006'),
(92, '5', '220006'),
(93, '88', '220006'),
(94, '2', '220007'),
(95, '4', '220007'),
(96, '6', '220007'),
(97, '88', '220007'),
(98, '6', '220008'),
(99, '4', '220009'),
(100, '5', '220009'),
(101, '6', '220009'),
(102, '88', '220009'),
(103, '4', '220010'),
(104, '6', '220010'),
(105, '88', '220011'),
(106, '2', '220012'),
(107, '4', '220012'),
(108, '6', '220012'),
(109, '88', '220012'),
(110, '2', '220013'),
(111, '5', '220013'),
(112, '6', '220013'),
(113, '5', '220014'),
(114, '88', '220014'),
(115, '2', '220015'),
(116, '5', '220015'),
(117, '6', '220015'),
(118, '88', '220015'),
(119, '4', '220016'),
(120, '6', '220016'),
(121, '4', '220017'),
(122, '6', '220017'),
(123, '2', '220018'),
(124, '5', '220018'),
(125, '6', '220018'),
(126, '88', '220019'),
(127, '2', '220020'),
(128, '4', '220020'),
(129, '5', '220020'),
(130, '6', '220020'),
(131, '88', '220020'),
(132, '88', '220021'),
(133, '2', '220022'),
(134, '4', '220022'),
(135, '5', '220022'),
(136, '6', '220022'),
(137, '88', '220022'),
(138, '2', '220023'),
(139, '4', '220023'),
(140, '5', '220023'),
(141, '6', '220023'),
(142, '88', '220023'),
(143, '2', '220024'),
(144, '4', '220024'),
(145, '5', '220024'),
(146, '6', '220024'),
(147, '88', '220024'),
(148, '4', '220025'),
(149, '4', '220026'),
(150, '4', '220027'),
(151, '4', '220028'),
(152, '88', '220028');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prj_activity_task`
--
ALTER TABLE `prj_activity_task`
  ADD PRIMARY KEY (`TASK_ID`),
  ADD KEY `ACTIVITY_ID` (`ACTIVITY_ID`);

--
-- Indexes for table `prj_detail`
--
ALTER TABLE `prj_detail`
  ADD PRIMARY KEY (`DETAIL_ID`),
  ADD KEY `PROJECT_MANAGER` (`PROJECT_MANAGER`);

--
-- Indexes for table `prj_holyday_date`
--
ALTER TABLE `prj_holyday_date`
  ADD PRIMARY KEY (`HOLYDAY_ID`);

--
-- Indexes for table `prj_project_activity`
--
ALTER TABLE `prj_project_activity`
  ADD PRIMARY KEY (`ACTIVITY_ID`);

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
  ADD KEY `LOGIN_ID` (`LOGIN_ID`),
  ADD KEY `DETAIL_ID` (`DETAIL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  MODIFY `TEAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prj_detail`
--
ALTER TABLE `prj_detail`
  ADD CONSTRAINT `prj_detail_ibfk_1` FOREIGN KEY (`PROJECT_MANAGER`) REFERENCES `prj_project_login` (`LOGIN_ID`);

--
-- Constraints for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  ADD CONSTRAINT `prj_project_team_ibfk_1` FOREIGN KEY (`LOGIN_ID`) REFERENCES `prj_project_login` (`LOGIN_ID`),
  ADD CONSTRAINT `prj_project_team_ibfk_2` FOREIGN KEY (`DETAIL_ID`) REFERENCES `prj_detail` (`DETAIL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
