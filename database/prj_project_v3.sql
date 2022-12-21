-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 07:51 AM
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
  `TASK_ID` int(11) NOT NULL,
  `TASK_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ACTIVITY_ID` int(10) NOT NULL,
  `DAY` smallint(10) DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_activity_task`
--

INSERT INTO `prj_activity_task` (`TASK_ID`, `TASK_NAME`, `ACTIVITY_ID`, `DAY`, `STATUS`, `created_at`, `updated_at`) VALUES
(11, 'aaa', 33, 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(12, 'ddd', 33, 4, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(13, 'dddddddd', 33, 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(14, 'dddddddddd', 33, 5, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(15, 'ssss', 34, 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(16, 'ssssssssssss', 34, 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(20, 'ข้าว', 37, 5, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(21, 'ไข่', 37, 5, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(22, 'asdasasda', 42, 1, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(23, 'adasdasasd', 43, 2, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(24, 'kdlsjflsdjkf', 44, 2, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(25, 'adsas', 45, 4, 0, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(26, 'ข้าวผัด', 46, 1, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05'),
(27, 'ข้าว2', 46, 2, 1, '2022-12-21 04:48:05', '2022-12-21 04:48:05');

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
  `PROJECT_MANAGER` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_detail`
--

INSERT INTO `prj_detail` (`DETAIL_ID`, `NAME_PROJECT`, `REASONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `RESULT`, `DATE_START`, `DATE_END`, `created_at`, `RECORD_CREATOR`, `PROJECT_MANAGER`, `updated_at`) VALUES
('220001', 'ping', 'test', 'test', 'yala', 'user', '50000', 'asd', '2022-12-07', '2022-12-08', '2022-12-06 17:00:00', 'nat kk', 'jop k', '2022-12-21 06:23:22'),
('220002', 'project2', 'dsssds', 'dsdssds', 'dssds', 'dsdssds', 'sdsds', 'sdsds', '2022-12-08', '2022-12-14', '2022-12-06 17:00:00', 'nat kk', 'nat kk', '2022-12-21 06:23:22'),
('220003', 'โครงการปรับเปลี่ยนบริการดิจิทัลสู่กสู่ ารเป็นมหาวิ', 'ปัจจุบันบั เทคโนโลยีดิยี ดิจิทัลส่งส่ ผลกระทบต่อการดํา เนินงานของหน่วน่ ยงานของรัฐและเอกชนเป็นอย่าย่ งมาก และกระทบในทุก ๆ ด้าน\r\nโดยเฉพาะกับภาคการศึกศึษาที่พบว่าเทคโนโลยีดิจิทัลส่งส่ ผลต่อการเปลี่ยนแปลงหลักสูตรรูปแบบที่นํา มาใช้ในการเรียนการสอนการติดต่อ\r\nส', '1. เพื่อพื่พัฒพั นา Smart YRU Booking สํา หรับรั การให้บริกริาร\r\n2. เพื่อพื่ประเมินมิ ติดตามระบบฐานข้อมูลสารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียน', 'ราชภัฎยะลา', 'พัฒนาระบบ Smart YRU Booking สํา หรับการให้บริกริาร จํา นวน 1 ระบบ\r\n\r\nมีกมีารประเมินมิ ติดตามระบบฐานข้อมูลมู สารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียนการสอนการ\r\nปฏิบัติงาน จํา นวน 1 ครั้งรั้', '500000', 'ระบบสารสนเทศของมหาวิทยาลัยที่ใช้งานสามารถรองรับรั ', '2022-12-08', '2022-12-08', '2022-12-07 17:00:00', 'nat kk', 'nat kk', '2022-12-21 06:23:22'),
('220004', 'tessss', 'dasdasd', 'dasdasd', 'dasdas', 'dasdas', 'dasdas', 'dasdas', '2022-12-15', '2022-12-15', '2022-12-13 17:00:00', 'นาย ก', 'นาย ก', '2022-12-21 06:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_activity`
--

CREATE TABLE `prj_project_activity` (
  `ACTIVITY_ID` int(10) NOT NULL,
  `ACTIVITY_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DAY_WEEK` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_activity`
--

INSERT INTO `prj_project_activity` (`ACTIVITY_ID`, `ACTIVITY_NAME`, `DETAIL_ID`, `DAY_WEEK`, `created_at`, `updated_at`) VALUES
(31, '1.good', '220001', '', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(32, '2.verygood', '220001', '', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(33, 'ddddd', '220002', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(34, 'ddddddd', '220002', 'week', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(37, 'ข้าวผัด', '220003', 'day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(42, 'dasdas', '220004', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(43, 'dasd', '220004', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(44, 'dasdas', '220004', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(45, 'dasdasda', '220004', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(46, 'ดูงานที่ไป่กฟสาหด่ฟาห่กาฟห่ดาห่กด้าห่กด้ห่ก้ด่หก้ด', '220005', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(47, 'ดา่ฟหาด่ฟหา่ดกฟาด่าฟหด่ฟห', '220005', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(48, 'ด้หากด้ากห้ดาหก้ดาหก่ดาห้กาา', '220005', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31'),
(49, 'กฟ่หก้ฟหาด่ฟหาด้ฟหา้ฟาหกาฟ', '220005', 'Day', '2022-12-21 04:50:31', '2022-12-21 04:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `LOGIN_ID` int(10) NOT NULL,
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
(1, 'ping@gmail.com', '123456', 'arifin sotaloh', 'ping', '195999000674626', '02121231313', 'yru', 'admin', 0, 1),
(2, 'nat@hotmail.com', '1234', 'นาย ก', 'nat', '1565555', '1233', 'yru', 'user', 0, 1),
(4, 'arifn@gmial.com', '123456', 'นาย ข', 'test', '445451212212', '02121231313', 'sadas', 'user', 0, 1),
(5, 'na@gmail.com', 'za123456', 'นาย ว', 'ping', '445451212212', '02121231313', 'yru', 'user', 0, 1),
(6, 'you@gmail.com', '123456', 'นาย ย', 'jp', '445451212212', '02121231313', 'yru', 'user', 0, 1),
(88, 'caca@gmail.com', '02222', 'Hadi', 'Hadi', 'gs234234', '03243243', '32423fdg', 'project manager', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_team`
--

CREATE TABLE `prj_project_team` (
  `ID_NAME` int(11) NOT NULL,
  `LOGIN_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_team`
--

INSERT INTO `prj_project_team` (`ID_NAME`, `LOGIN_ID`, `DETAIL_ID`) VALUES
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
(19, '2', '220005'),
(20, '4', '220005'),
(21, '6', '220005'),
(22, '4', '220004'),
(23, '5', '220004'),
(24, '6', '220004'),
(25, '4', '220005'),
(26, '5', '220005'),
(27, '6', '220005');

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
  ADD PRIMARY KEY (`DETAIL_ID`);

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
  ADD PRIMARY KEY (`ID_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prj_activity_task`
--
ALTER TABLE `prj_activity_task`
  MODIFY `TASK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  MODIFY `LOGIN_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `prj_project_team`
--
ALTER TABLE `prj_project_team`
  MODIFY `ID_NAME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
