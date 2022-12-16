-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 02:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `prj_project_clause`
--

CREATE TABLE `prj_project_clause` (
  `CLAUSE_ID` int(11) NOT NULL,
  `NAME_CLAUSE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_METHOD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DAY` int(10) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_clause`
--

INSERT INTO `prj_project_clause` (`CLAUSE_ID`, `NAME_CLAUSE`, `ID_METHOD`, `DAY`, `STATUS`) VALUES
(11, 'aaa', '33', 5, 0),
(12, 'ddd', '33', 4, 0),
(13, 'dddddddd', '33', 5, 0),
(14, 'dddddddddd', '33', 5, 0),
(15, 'ssss', '34', 1, 0),
(16, 'ssssssssssss', '34', 1, 0),
(20, 'ข้าว', '37', 5, 1),
(21, 'ไข่', '37', 5, 1),
(22, 'asdasasda', '42', 1, 0),
(23, 'adasdasasd', '43', 2, 0),
(24, 'kdlsjflsdjkf', '44', 2, 0),
(25, 'adsas', '45', 4, 0),
(26, 'ข้าวผัด', '46', 1, 1),
(27, 'ข้าว2', '46', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_detail`
--

CREATE TABLE `prj_project_detail` (
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NAME_PROJECT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PRINCIPLES_RESONS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OBJECTIVE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LOCATION` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TARGET` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `BUDGET` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EXPECTED_RESULTS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_END` date NOT NULL,
  `DATE_SAVE` date NOT NULL,
  `NAME_SAVE_PROJECT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PROPONEN_NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_detail`
--

INSERT INTO `prj_project_detail` (`DETAIL_ID`, `NAME_PROJECT`, `PRINCIPLES_RESONS`, `OBJECTIVE`, `LOCATION`, `TARGET`, `BUDGET`, `EXPECTED_RESULTS`, `DATE_START`, `DATE_END`, `DATE_SAVE`, `NAME_SAVE_PROJECT`, `PROPONEN_NAME`) VALUES
('220001', 'ping', 'test', 'test', 'yala', 'user', '50000', 'asd', '2022-12-07', '2022-12-08', '2022-12-07', 'nat kk', 'jop k'),
('220002', 'project2', 'dsssds', 'dsdssds', 'dssds', 'dsdssds', 'sdsds', 'sdsds', '2022-12-08', '2022-12-14', '2022-12-07', 'nat kk', 'nat kk'),
('220003', 'โครงการปรับเปลี่ยนบริการดิจิทัลสู่กสู่ ารเป็นมหาวิ', 'ปัจจุบันบั เทคโนโลยีดิยี ดิจิทัลส่งส่ ผลกระทบต่อการดํา เนินงานของหน่วน่ ยงานของรัฐและเอกชนเป็นอย่าย่ งมาก และกระทบในทุก ๆ ด้าน\r\nโดยเฉพาะกับภาคการศึกศึษาที่พบว่าเทคโนโลยีดิจิทัลส่งส่ ผลต่อการเปลี่ยนแปลงหลักสูตรรูปแบบที่นํา มาใช้ในการเรียนการสอนการติดต่อ\r\nส', '1. เพื่อพื่พัฒพั นา Smart YRU Booking สํา หรับรั การให้บริกริาร\r\n2. เพื่อพื่ประเมินมิ ติดตามระบบฐานข้อมูลสารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียน', 'ราชภัฎยะลา', 'พัฒนาระบบ Smart YRU Booking สํา หรับการให้บริกริาร จํา นวน 1 ระบบ\r\n\r\nมีกมีารประเมินมิ ติดตามระบบฐานข้อมูลมู สารสนเทศของมหาวิทยาลัยให้สามารถสนับสนุนการเรียนการสอนการ\r\nปฏิบัติงาน จํา นวน 1 ครั้งรั้', '500000', 'ระบบสารสนเทศของมหาวิทยาลัยที่ใช้งานสามารถรองรับรั ', '2022-12-08', '2022-12-08', '2022-12-08', 'nat kk', 'nat kk'),
('220004', 'tessss', 'dasdasd', 'dasdasd', 'dasdas', 'dasdas', 'dasdas', 'dasdas', '2022-12-15', '2022-12-15', '2022-12-14', 'นาย ก', 'นาย ก'),
('220005', 'พัฒนาครูสู่มืออาชีพ', 'การปฏิรูปการศึกษาที่สําคัญที่สุดและมีผลต่อการพัฒนาคนให้เป็นคนดีคนเก่งและสามารถดํารง\r\nตนในสังคมได้อย่างมีความสุขได้นั้น ได้แกการปฏิรูปการเรียนการสอน โดยครูผู้สอนทกคนต้องมีความรู้\r\nความสามารถในการจัดการเรียนรู้ที่เน้นผู้เรียนเป็นสําคัญ เปลี่ยนวัฒนธรรมการเรี', 'เพื่อรายงานผลการดําเนินงานโครงการพัฒนาครูสู่มืออาชีพ', 'โรงเรียน', '1. ครูผู้สอนทุกคนได้รับการพัฒนาตามศักยภาพ ความต้องการและความจำเป็น \r\n2. ครูผู้สอนร้อยละ 75 จัดการเรียนรู้ได้อย่างมีประสิทธิภาพ \r\n3. ผู้มีส่วนเกี่ยวของร้อยละ 90 มีความพึงพอใจต่อกิจกรรมพัฒนาครู\r\n', '5000', 'dasdasd', '2022-12-14', '2022-12-15', '2022-12-14', 'นาย ก', 'นาย ข');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_login`
--

CREATE TABLE `prj_project_login` (
  `ID_LOGIN` int(10) NOT NULL,
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

INSERT INTO `prj_project_login` (`ID_LOGIN`, `EMAIL`, `PASSWORD`, `NAME`, `NICKNAME`, `CARD_ID`, `TELEPHONE`, `AGENCY`, `POSITION`, `PERUSE`, `CONFIRM`) VALUES
(1, 'ping@gmail.com', '123456', 'arifin sotaloh', 'ping', '195999000674626', '02121231313', 'yru', 'admin', 0, 1),
(2, 'nat@hotmail.com', '1234', 'นาย ก', 'nat', '1565555', '1233', 'yru', 'user', 0, 1),
(4, 'arifn@gmial.com', '123456', 'นาย ข', 'test', '445451212212', '02121231313', 'sadas', 'user', 0, 1),
(5, 'na@gmail.com', 'za123456', 'นาย ว', 'ping', '445451212212', '02121231313', 'yru', 'user', 0, 1),
(6, 'you@gmail.com', '123456', 'นาย ย', 'jp', '445451212212', '02121231313', 'yru', 'user', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_method_operation`
--

CREATE TABLE `prj_project_method_operation` (
  `ID_METHOD` int(10) NOT NULL,
  `METHOD_OPERATIO_DETAILN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DAY_WEEK` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_method_operation`
--

INSERT INTO `prj_project_method_operation` (`ID_METHOD`, `METHOD_OPERATIO_DETAILN`, `DETAIL_ID`, `DAY_WEEK`) VALUES
(31, '1.good', '220001', ''),
(32, '2.verygood', '220001', ''),
(33, 'ddddd', '220002', 'week'),
(34, 'ddddddd', '220002', 'week'),
(37, 'ข้าวผัด', '220003', 'day'),
(42, 'dasdas', '220004', 'Day'),
(43, 'dasd', '220004', 'Day'),
(44, 'dasdas', '220004', 'Day'),
(45, 'dasdasda', '220004', 'Day'),
(46, 'ดูงานที่ไป่กฟสาหด่ฟาห่กาฟห่ดาห่กด้าห่กด้ห่ก้ด่หก้ด', '220005', 'Day'),
(47, 'ดา่ฟหาด่ฟหา่ดกฟาด่าฟหด่ฟห', '220005', 'Day'),
(48, 'ด้หากด้ากห้ดาหก้ดาหก่ดาห้กาา', '220005', 'Day'),
(49, 'กฟ่หก้ฟหาด่ฟหาด้ฟหา้ฟาหกาฟ', '220005', 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `prj_project_name`
--

CREATE TABLE `prj_project_name` (
  `ID_NAME` int(11) NOT NULL,
  `RELATED_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prj_project_name`
--

INSERT INTO `prj_project_name` (`ID_NAME`, `RELATED_NAME`, `DETAIL_ID`) VALUES
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
-- Indexes for table `prj_project_clause`
--
ALTER TABLE `prj_project_clause`
  ADD PRIMARY KEY (`CLAUSE_ID`);

--
-- Indexes for table `prj_project_detail`
--
ALTER TABLE `prj_project_detail`
  ADD PRIMARY KEY (`DETAIL_ID`);

--
-- Indexes for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  ADD PRIMARY KEY (`ID_LOGIN`);

--
-- Indexes for table `prj_project_method_operation`
--
ALTER TABLE `prj_project_method_operation`
  ADD PRIMARY KEY (`ID_METHOD`);

--
-- Indexes for table `prj_project_name`
--
ALTER TABLE `prj_project_name`
  ADD PRIMARY KEY (`ID_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prj_project_clause`
--
ALTER TABLE `prj_project_clause`
  MODIFY `CLAUSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `prj_project_login`
--
ALTER TABLE `prj_project_login`
  MODIFY `ID_LOGIN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prj_project_method_operation`
--
ALTER TABLE `prj_project_method_operation`
  MODIFY `ID_METHOD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `prj_project_name`
--
ALTER TABLE `prj_project_name`
  MODIFY `ID_NAME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
