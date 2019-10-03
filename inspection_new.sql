-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 05:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspection_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `center_reason`
--

CREATE TABLE `center_reason` (
  `id` int(10) NOT NULL,
  `r_cen1_1_1` text,
  `r_cen1_1_2` text,
  `r_cen1_2_1` text,
  `r_cen1_2_2` text,
  `r_cen1_3_1` text,
  `r_cen1_3_2` text,
  `r_cen1_4_1` text,
  `r_cen1_4_2` text,
  `r_cen1_5_1` text,
  `r_cen1_5_2` text,
  `r_cen1_5_3` text,
  `r_cen2_1_1` text,
  `r_cen2_1_2` text,
  `r_cen2_1_3` text,
  `r_cen2_2_1` text,
  `r_cen2_2_2` text,
  `r_cen2_2_3` text,
  `r_cen2_3_1` text,
  `r_cen2_3_2` text,
  `r_cen2_3_3` text,
  `r_cen2_4_1` text,
  `r_cen2_4_2` text,
  `r_cen2_5_1` text,
  `r_cen2_5_2` text,
  `r_cen2_6_1` text,
  `r_cen2_6_2` text,
  `r_cen2_6_3` text,
  `r_cen2_7_1` text,
  `r_cen2_7_2` text,
  `r_cen2_7_3` text,
  `r_cen3_1_1` text,
  `r_cen3_1_2` text,
  `r_cen3_1_3` text,
  `r_cen3_2_1` text,
  `r_cen3_2_2` text,
  `r_cen3_2_3` text,
  `r_cen3_3_1` text,
  `r_cen3_3_2` text,
  `r_cen3_3_3` text,
  `r_cen3_4_1` text,
  `r_cen3_4_2` text,
  `r_cen3_4_3` text,
  `r_cen3_5_1` text,
  `r_cen3_5_2` text,
  `r_cen3_5_3` text,
  `r_cen3_6_1` text,
  `r_cen3_6_2` text,
  `r_cen3_7_1` text,
  `r_cen3_7_2` text,
  `r_cen3_7_3` text,
  `r_cen3_8_1` text,
  `r_cen3_8_2` text,
  `r_cen3_9_1` text,
  `r_cen3_10_1` text,
  `insert_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `center_reason`
--

INSERT INTO `center_reason` (`id`, `r_cen1_1_1`, `r_cen1_1_2`, `r_cen1_2_1`, `r_cen1_2_2`, `r_cen1_3_1`, `r_cen1_3_2`, `r_cen1_4_1`, `r_cen1_4_2`, `r_cen1_5_1`, `r_cen1_5_2`, `r_cen1_5_3`, `r_cen2_1_1`, `r_cen2_1_2`, `r_cen2_1_3`, `r_cen2_2_1`, `r_cen2_2_2`, `r_cen2_2_3`, `r_cen2_3_1`, `r_cen2_3_2`, `r_cen2_3_3`, `r_cen2_4_1`, `r_cen2_4_2`, `r_cen2_5_1`, `r_cen2_5_2`, `r_cen2_6_1`, `r_cen2_6_2`, `r_cen2_6_3`, `r_cen2_7_1`, `r_cen2_7_2`, `r_cen2_7_3`, `r_cen3_1_1`, `r_cen3_1_2`, `r_cen3_1_3`, `r_cen3_2_1`, `r_cen3_2_2`, `r_cen3_2_3`, `r_cen3_3_1`, `r_cen3_3_2`, `r_cen3_3_3`, `r_cen3_4_1`, `r_cen3_4_2`, `r_cen3_4_3`, `r_cen3_5_1`, `r_cen3_5_2`, `r_cen3_5_3`, `r_cen3_6_1`, `r_cen3_6_2`, `r_cen3_7_1`, `r_cen3_7_2`, `r_cen3_7_3`, `r_cen3_8_1`, `r_cen3_8_2`, `r_cen3_9_1`, `r_cen3_10_1`, `insert_date`, `create_date`, `create_by`, `update_by`) VALUES
(9, 'ปปปปปปปปปปปปป', 'wwwww', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xxxx', 'sss', '2019-07-11 16:11:54', '2019-07-11 13:42:28', 'ins101', 'ins101'),
(10, 'ให้ กบค ดูเอา', 'ดูว้ายยยยยยยยยยยย', 'แผนแผนผแนผแนผแนผแนผแน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'กกพบยศ', 'สตาร์วอ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-22 11:16:14', '2019-07-12 09:15:28', 'ins101', 'ins101'),
(11, 'ccccccccccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-24 13:28:04', '2019-07-24 13:28:04', 'ins101', NULL),
(12, 'กบค งายจ๊ะ', 'ไจเด เจได', 'แผนคิดซิ้', 'คลังยืมเงินที', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 14:05:12', '2019-08-01 14:05:12', 'ins101', NULL),
(13, 'กกๆบกๆงกๆกกๆบกๆงกๆ', 'ไจเด เวเดอร์ไจเด เวเดอร์', 'สามแผนสี่เหล้าสามแผนสี่เหล้า', 'มณีอีฟีคลังมณีอีฟีคลัง', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ไอคอกแคกด้อกแด้กไอคอกแคกด้อกแด้ก', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 14:48:55', '2019-08-26 13:53:38', 'ins101', 'ins101');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `type_locate` int(1) DEFAULT NULL COMMENT '1=สถานพินิจ, 2=ศูนย์ฝึก',
  `inspect_level` varchar(1) DEFAULT NULL,
  `inspector` int(11) NOT NULL,
  `division` varchar(6) NOT NULL,
  `boss_name` varchar(100) NOT NULL,
  `inspect_type` varchar(1) NOT NULL COMMENT '1=ปกติ, 2=พิเศษ, 3=บูรณาการ',
  `inspect_date` date NOT NULL,
  `inspect_no` varchar(10) NOT NULL,
  `inspect_doc` varchar(20) NOT NULL,
  `inspect_doc_date` date NOT NULL,
  `personnel1` int(11) NOT NULL,
  `personnel2` int(11) NOT NULL,
  `personnel3` int(11) NOT NULL,
  `personnel4` int(11) NOT NULL,
  `personnel5` int(11) NOT NULL,
  `cm` int(11) DEFAULT NULL,
  `fc` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `case53` int(11) DEFAULT NULL,
  `case_f` int(11) DEFAULT NULL,
  `case132` int(11) DEFAULT NULL,
  `case_sp` int(11) DEFAULT NULL,
  `tr1` int(11) DEFAULT NULL,
  `tr2` int(11) DEFAULT NULL,
  `tr3` int(11) DEFAULT NULL,
  `tr4` int(11) DEFAULT NULL,
  `tr5` int(11) DEFAULT NULL,
  `tr6` int(11) DEFAULT NULL,
  `tr7` int(11) DEFAULT NULL,
  `tr8` int(11) DEFAULT NULL,
  `center_id` int(10) DEFAULT NULL,
  `center_follow_round` int(1) NOT NULL DEFAULT '1',
  `pr_fileid` int(10) DEFAULT NULL,
  `pr_follow_round` int(1) NOT NULL DEFAULT '1',
  `r1_1` text,
  `cb1_1` int(5) DEFAULT NULL,
  `sub_pr1_1` text,
  `cen1_1` text,
  `r1_2` text,
  `cb1_2` int(5) DEFAULT NULL,
  `sub_pr1_2` text,
  `cen1_2` text,
  `r1_3` text,
  `cb1_3` int(5) DEFAULT NULL,
  `sub_pr1_3` text,
  `cen1_3` text,
  `r1_4` text,
  `cb1_4` int(5) DEFAULT NULL,
  `sub_pr1_4` text,
  `cen1_4` text,
  `r1_5` text,
  `cb1_5` int(5) DEFAULT NULL,
  `sub_pr1_5` text,
  `cen1_5` text,
  `r2_1` text,
  `cb2_1` int(5) DEFAULT NULL,
  `sub_pr2_1` text,
  `cen2_1` text,
  `r2_2` text,
  `cb2_2` int(5) DEFAULT NULL,
  `sub_pr2_2` text,
  `cen2_2` text,
  `r2_3` text,
  `cb2_3` int(5) DEFAULT NULL,
  `sub_pr2_3` text,
  `cen2_3` text,
  `r2_4` text,
  `cb2_4` int(5) DEFAULT NULL,
  `sub_pr2_4` text,
  `cen2_4` text,
  `r2_5` text,
  `cb2_5` int(5) DEFAULT NULL,
  `sub_pr2_5` text,
  `cen2_5` text,
  `r2_6` text,
  `cb2_6` int(5) DEFAULT NULL,
  `sub_pr2_6` text,
  `cen2_6` text,
  `r2_7` text,
  `cb2_7` int(5) DEFAULT NULL,
  `sub_pr2_7` text,
  `cen2_7` text,
  `r3_1` text,
  `cb3_1` int(5) DEFAULT NULL,
  `sub_pr3_1` text,
  `cen3_1` text,
  `r3_2` text,
  `cb3_2` int(5) DEFAULT NULL,
  `sub_pr3_2` text,
  `cen3_2` text,
  `r3_3` text,
  `cb3_3` int(5) DEFAULT NULL,
  `sub_pr3_3` text,
  `cen3_3` text,
  `r3_4` text,
  `cb3_4` int(5) DEFAULT NULL,
  `sub_pr3_4` text,
  `cen3_4` text,
  `r3_5` text,
  `cb3_5` int(5) DEFAULT NULL,
  `sub_pr3_5` text,
  `cen3_5` text,
  `r3_6` text,
  `cb3_6` int(5) DEFAULT NULL,
  `sub_pr3_6` text,
  `cen3_6` text,
  `r3_7` text,
  `cb3_7` int(5) DEFAULT NULL,
  `sub_pr3_7` text,
  `cen3_7` text,
  `r3_8` text,
  `cb3_8` int(5) DEFAULT NULL,
  `sub_pr3_8` text,
  `cen3_8` text,
  `r3_9` text,
  `cb3_9` int(5) DEFAULT NULL,
  `sub_pr3_9` text,
  `cen3_9` text,
  `r3_10` text,
  `cb3_10` int(5) DEFAULT NULL,
  `sub_pr3_10` text,
  `cen3_10` text,
  `insert_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `update_by` varchar(20) DEFAULT NULL,
  `budget_year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `type_locate`, `inspect_level`, `inspector`, `division`, `boss_name`, `inspect_type`, `inspect_date`, `inspect_no`, `inspect_doc`, `inspect_doc_date`, `personnel1`, `personnel2`, `personnel3`, `personnel4`, `personnel5`, `cm`, `fc`, `cc`, `case53`, `case_f`, `case132`, `case_sp`, `tr1`, `tr2`, `tr3`, `tr4`, `tr5`, `tr6`, `tr7`, `tr8`, `center_id`, `center_follow_round`, `pr_fileid`, `pr_follow_round`, `r1_1`, `cb1_1`, `sub_pr1_1`, `cen1_1`, `r1_2`, `cb1_2`, `sub_pr1_2`, `cen1_2`, `r1_3`, `cb1_3`, `sub_pr1_3`, `cen1_3`, `r1_4`, `cb1_4`, `sub_pr1_4`, `cen1_4`, `r1_5`, `cb1_5`, `sub_pr1_5`, `cen1_5`, `r2_1`, `cb2_1`, `sub_pr2_1`, `cen2_1`, `r2_2`, `cb2_2`, `sub_pr2_2`, `cen2_2`, `r2_3`, `cb2_3`, `sub_pr2_3`, `cen2_3`, `r2_4`, `cb2_4`, `sub_pr2_4`, `cen2_4`, `r2_5`, `cb2_5`, `sub_pr2_5`, `cen2_5`, `r2_6`, `cb2_6`, `sub_pr2_6`, `cen2_6`, `r2_7`, `cb2_7`, `sub_pr2_7`, `cen2_7`, `r3_1`, `cb3_1`, `sub_pr3_1`, `cen3_1`, `r3_2`, `cb3_2`, `sub_pr3_2`, `cen3_2`, `r3_3`, `cb3_3`, `sub_pr3_3`, `cen3_3`, `r3_4`, `cb3_4`, `sub_pr3_4`, `cen3_4`, `r3_5`, `cb3_5`, `sub_pr3_5`, `cen3_5`, `r3_6`, `cb3_6`, `sub_pr3_6`, `cen3_6`, `r3_7`, `cb3_7`, `sub_pr3_7`, `cen3_7`, `r3_8`, `cb3_8`, `sub_pr3_8`, `cen3_8`, `r3_9`, `cb3_9`, `sub_pr3_9`, `cen3_9`, `r3_10`, `cb3_10`, `sub_pr3_10`, `cen3_10`, `insert_date`, `create_date`, `create_by`, `update_by`, `budget_year`) VALUES
(642, 2, 'd', 37, 'tr5030', 'วาริกา มานิอิอิ', '1', '2019-05-16', '12', '1', '2019-05-16', 0, 2, 3, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 7, 8, 9, 10, 11, 12, 13, 0, 1, 0, 1, 'people', 12, NULL, NULL, NULL, NULL, NULL, NULL, 'location', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-10 14:23:45', '2019-05-16 14:19:34', 'ins101', 'ins101', '2558'),
(644, 1, 'd', 37, 'sp8110', 'นางสาวสุมาลี ญาณภาพ', '1', '2019-02-14', '1', 'ยธ06098/143', '2019-02-07', 20, 5, 10, 0, 0, 124, 73, 118, 0, 0, 55, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 'ไม่มี', NULL, NULL, NULL, 'ให้หน่วยรับการตรวจปฏิบัติและเจ้าหน้าที่ที่รับผิดชอบปฏิบัติงานตามกฎหมายและระเบียบเกี่ยวกับการเบิกจ่ายเงินของกรมพินิจและคุ้มครองเด็กและเยาวชน (ปรับปรุงครั้งที่ 1) อย่างเคร่งครัด', 4, NULL, NULL, 'ให้หน่วยรับการตรวจหมั่นพัฒนา ปรับปรุงอาคารสถานที่อย่างสม่ำเสมอให้มีบรรยากาศที่เอื้อต่อการแก้ไขบำบัดฟื้นฟูเด็กและเยาวชน และมีบรรยากาศน่าอยู่น่าทำงาน ส่วนหน่วยบริการสาขาฝาง มีบรรยากาศไม่เหมาะสมต่อการควบคุมเด็กและเยาวชน ให้หน่วยรับการตรวจประสานกองบริหารงานคลัง และกองยุทธศาสตร์และแผนงาน เพื่อขอสนับสนุนง', 34, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ให้หน่วยรับการตรวจจัดทำรายงานข้อเท็จจริงเด็กและเยาวชนเสนอศาล ให้เป็นไปตามมาตรฐานและเป็นการคุ้มครองสิทธิและประโยชน์ของเด็กและเยาวชน', 6, NULL, NULL, 'แนะนำให้หน่วยรับการตรวจพิจารณาใช้มาตรการพิเศษแทนการดำเนินคดีอาญาให้กับเด็กและเยาวชน โดยทำความเข้าใจกับผู้เสียหายและผู้ปกครองในการใช้มาตรการทางเลือกเพื่อแก้ไขเด็กและเยาวชน ที่อาจสามารถกลับตัวเป็นคนดีได้โดยไม่ต้องฟ้อง และแสดงถึงประสิทธิภาพและประสิทธิผลถึงระดับความสำเร็จในการบรรลุเป้าหมายตัวชี้วัดของหน', 6, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'เน้นย้ำให้หน่วยรับการตรวจตรวจปัสสาวะเด็กและเยาวชนและตรวจค้นอย่างต่อเนื่องเพื่อป้องกันมิให้เด็กและเยาวชนไปเกี่ยวข้องยาเสพติดและให้ปฏิบัติตามระเบียบว่าสิ่งของต้องห้ามในสถานที่ควบคุม พ.ศ. 2556 อย่างเคร่งครัด และมอบหมายผู้รับผิดชอบในการดูแลกล้องวงจรปิด หากพบการชำรุดขอให้ซ่อมแซมให้อยู่ในสภาพพร้อมใช้งานตล', 6, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, 'ไม่มี', NULL, NULL, NULL, '2019-05-23 11:10:10', '2019-05-23 11:10:10', 'ins101', NULL, '2562'),
(648, 2, 'd', 37, 'tr5030', 'วาริกา มานิ', '1', '2019-05-16', '122', '1', '2019-05-16', 0, 2, 3, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 7, 8, 9, 10, 11, 12, 13, 0, 1, 0, 1, 'people', 12, NULL, NULL, NULL, NULL, NULL, NULL, 'location', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-10 14:23:26', '0000-00-00 00:00:00', NULL, 'ins101', '2558'),
(649, 1, 'd', 36, 'sp8110', 'dfsdffsdfd', '1', '2019-07-27', '231', '32', '2019-07-02', 28, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, '8ewfwewefew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-11 09:07:21', '2019-07-11 09:07:21', 'ins101', NULL, '2558'),
(650, 1, 'd', 36, 'sp8110', 'wqdwqdqwdwq', '1', '2019-07-05', '21', '21', '2019-07-03', 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, 0, 1, '8wqwqwqwqwqwqwqqwwq', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-11 10:28:12', '2019-07-11 10:28:12', 'ins101', NULL, '2558'),
(653, 1, 'd', 37, 'sp2610', 'saka oremanga', '1', '2019-07-25', '1', '2', '2019-07-16', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, 0, 1, 'baabbbaaabaa', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-11 13:37:31', '2019-07-11 13:37:31', 'ins101', NULL, '2561'),
(654, 1, 'd', 36, 'sp8110', 'rererrereerer', '1', '2019-07-25', '122', '12', '2019-07-10', 39, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdasdsadasdsadsa', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-11 13:41:43', '2019-07-11 13:41:43', 'ins101', NULL, '2558'),
(655, 1, 'd', 36, 'sp8110', 'vvvvvvvvvvvvvvvvvvvvvvvvvv', '2', '2019-07-05', '12', '1', '2019-07-03', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1, 0, 1, 'woowowwoowwo', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eeeeeeeeeeeeeee', 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-11 16:11:54', '2019-07-11 13:42:28', 'ins101', 'ins101', '2558'),
(656, 1, 'd', 37, 'sp1010', 'อากิระ มานิตะ', '1', '2019-07-12', '1', '1', '2019-07-12', 1, 1, 2, 2, 2, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 2, 22, 5, 'คนค้นค้นคน', 12, 'four', '1;hhhhhhhhhhhhhhhhh|2;ดูล้าวล้าว', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'เด็กไงไงไงไงไง', 62, 'four42', '2;เวร์เดอร์ตูตูตูดดดดดมมมม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 09:27:00', '2019-07-12 09:15:28', 'ins101', 'sp1010', '2562'),
(657, 1, 'd', 38, 'sp7110', 'อายิโนะ โมโต้ะ', '1', '2019-08-01', '1', '1', '2019-08-01', 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 2, 23, 2, 'บุคๆ บุค 1 ไง', 12, 'บุคไรวะ บุคลากรหรอออออออออ', '1;จ๋าจ๊ะ รู้แล่้ว|2;ตือดือดือ ตื่อดึดือ ตื่อดึดือ', 'งบไม่มีขอหน่อย', 34, '2บาทพอป่ะ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'เอาเงินไป ที่ละ 10ล้าน', NULL, 'เลข บช ใต้เก้าอี้จ้า', NULL, '2019-08-01 14:25:59', '2019-08-01 14:05:12', 'ins101', 'jdi100', '2562'),
(658, 1, 'd', 37, 'sp1010', 'อากิระ มานิตะ', '1', '2019-07-12', '1', '1', '2019-07-12', 1, 1, 2, 2, 2, 9, 9, 9, 9, 9, 9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 2, 22, 5, 'คนค้นค้นคน', 12, 'four', '1;hhhhhhhhhhhhhhhhh|2;ดูล้าวล้าว', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'เด็กไงไงไงไงไง', 62, 'four42', '2;เวร์เดอร์ตูตูตูดดดดดมมมม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, ''),
(659, 2, 'd', 36, 'tr1036', 'มาใหม่ ซายา', '1', '2019-08-26', '1', '1', '2019-08-26', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 13, 3, 24, 2, 'บุคกี้อรุยามานี', 12, 'อามาโน้ะโอการิมานะ', '2;wordermore ครุคริ วีทรูนะจ๊ะอ่ะฮ๊ะ|1;ดกบงมาทีนา', 'มาใหม่ฉายลาย', 34, 'ใหม่พรอมอตออ่ะ', '4;อวเจนเมนมา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ทีอาทาลี', 7, 'ไทรูมูนา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 09:26:58', '2019-08-26 13:53:38', 'ins101', 'jdi100', '2562');

-- --------------------------------------------------------

--
-- Table structure for table `inspector`
--

CREATE TABLE `inspector` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `titlename` int(1) NOT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `area` text COMMENT 'เขตการตรวจราชการ',
  `sub_ins` varchar(100) DEFAULT NULL COMMENT 'รองกำกับที่ดูแล',
  `sub_insname` text COMMENT ' ผต.ยธที่ดูแล',
  `tr_locate` varchar(100) DEFAULT NULL COMMENT 'ศฝ ที่อบรม',
  `mar` int(1) DEFAULT NULL COMMENT '	เปิดใช้(1=ใช้,0=ไม่ใช้)',
  `create_date` datetime DEFAULT NULL COMMENT 'วันที่เพิ่มข้อมูล',
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inspector`
--

INSERT INTO `inspector` (`id`, `titlename`, `firstname`, `lastname`, `area`, `sub_ins`, `sub_insname`, `tr_locate`, `mar`, `create_date`, `update_date`) VALUES
(32, 2, 'wwwww', 'wwwwwwwwwwwwwwww', 'area|area2|area3', '5|2|1', 'nam1|nam2|nam3', '4|1|1', 1, '2019-05-15 15:01:33', '2019-05-16 13:37:24'),
(36, 1, 'wwwww', 'wwwwwwwwwwwwwwww', 'area|area2', '2|1', 'nam1111|nam2222', '4|3', 1, '2019-05-15 15:01:33', '2019-05-15 15:01:33'),
(37, 1, 'สมปอง', 'สมหมาย', 'กาญจนบุรี|กรุงเทพ|ชลบุรี|เชียงใหม่ อิอิ|ลพบุรี', '1|4|2|4|5', 'กาญจนา อิอิ|กรุงมาลี คริคริ|ปีนัง มังตา|วาริน มินสุตา|ลอบิง ลิงกัง', '3|2|4|1|4', 1, '2019-05-16 13:52:03', '2019-05-16 14:08:15'),
(38, 1, 'เทสเตอร์', 'เอ้อเออร์', 'ปีนัง|วากานด้า|ขามะกิ', '1|2|3', 'ลอบิง ลิงกัง|วาริน มินสุตา|ลิโป้ โมโตะ', '1|2|3', 1, '2019-08-01 14:03:15', '2019-08-01 14:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'หน่วยงานในสังกัด'),
(3, 'ผู้บริหาร'),
(4, 'หน่วยงานส่วนกลาง');

-- --------------------------------------------------------

--
-- Table structure for table `pr_filelocate`
--

CREATE TABLE `pr_filelocate` (
  `id` int(10) NOT NULL,
  `data_id` int(10) NOT NULL,
  `track_round` int(1) NOT NULL DEFAULT '1',
  `pr1_1` varchar(29) DEFAULT NULL,
  `pr1_2` varchar(29) DEFAULT NULL,
  `pr1_3` varchar(29) DEFAULT NULL,
  `pr1_4` varchar(29) DEFAULT NULL,
  `pr1_5` varchar(29) DEFAULT NULL,
  `pr2_1` varchar(29) DEFAULT NULL,
  `pr2_2` varchar(29) DEFAULT NULL,
  `pr2_3` varchar(29) DEFAULT NULL,
  `pr2_4` varchar(29) DEFAULT NULL,
  `pr2_5` varchar(29) DEFAULT NULL,
  `pr2_6` varchar(29) DEFAULT NULL,
  `pr2_7` varchar(29) DEFAULT NULL,
  `pr3_1` varchar(29) DEFAULT NULL,
  `pr3_2` varchar(29) DEFAULT NULL,
  `pr3_3` varchar(29) DEFAULT NULL,
  `pr3_4` varchar(29) DEFAULT NULL,
  `pr3_5` varchar(29) DEFAULT NULL,
  `pr3_6` varchar(29) DEFAULT NULL,
  `pr3_7` varchar(29) DEFAULT NULL,
  `pr3_8` varchar(29) DEFAULT NULL,
  `pr3_9` varchar(29) DEFAULT NULL,
  `pr3_10` varchar(29) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_filelocate`
--

INSERT INTO `pr_filelocate` (`id`, `data_id`, `track_round`, `pr1_1`, `pr1_2`, `pr1_3`, `pr1_4`, `pr1_5`, `pr2_1`, `pr2_2`, `pr2_3`, `pr2_4`, `pr2_5`, `pr2_6`, `pr2_7`, `pr3_1`, `pr3_2`, `pr3_3`, `pr3_4`, `pr3_5`, `pr3_6`, `pr3_7`, `pr3_8`, `pr3_9`, `pr3_10`) VALUES
(13, 656, 1, 'sp1010_1_1_656_190719.jpg', NULL, NULL, NULL, NULL, 'sp1010_2_1_656_190719.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 656, 2, 'r2_sp1010_1_1_656_190719.pdf', NULL, NULL, NULL, NULL, 'r2_sp1010_2_1_656_190719.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 656, 3, 'r3_sp1010_1_1_656_190719.pdf', NULL, NULL, NULL, NULL, 'r3_sp1010_2_1_656_190719.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 656, 4, 'r4_sp1010_1_1_656_010819.pdf', NULL, NULL, NULL, NULL, 'r4_sp1010_2_1_656_010819.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 657, 1, 'r1_sp7110_1_1_657_010819.jpg', 'r1_sp7110_1_2_657_010819.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 659, 1, 'r1_tr1036_1_1_659_260819.jpg', 'r1_tr1036_1_2_659_260819.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r1_tr1036_2_7_659_260819.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `date_year` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `receiver` int(11) NOT NULL,
  `date_sent` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `insert_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `date_year`, `number`, `receiver`, `date_sent`, `file`, `insert_date`) VALUES
(2, '2562', '1', 2, '2019-08-13', 'ตัวอย่างทดสอบส่งรายงาน2019.pdf', '2019-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `report_follow`
--

CREATE TABLE `report_follow` (
  `id` int(10) NOT NULL,
  `data_id` int(10) NOT NULL,
  `division` varchar(6) DEFAULT NULL,
  `track_round` int(1) NOT NULL DEFAULT '1',
  `r1_1` text,
  `r1_2` text,
  `r1_3` text,
  `r1_4` text,
  `r1_5` text,
  `r2_1` text,
  `r2_2` text,
  `r2_3` text,
  `r2_4` text,
  `r2_5` text,
  `r2_6` text,
  `r2_7` text,
  `r3_1` text,
  `r3_2` text,
  `r3_3` text,
  `r3_4` text,
  `r3_5` text,
  `r3_6` text,
  `r3_7` text,
  `r3_8` text,
  `r3_9` text,
  `r3_10` text,
  `create_date` datetime NOT NULL,
  `create_by` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_follow`
--

INSERT INTO `report_follow` (`id`, `data_id`, `division`, `track_round`, `r1_1`, `r1_2`, `r1_3`, `r1_4`, `r1_5`, `r2_1`, `r2_2`, `r2_3`, `r2_4`, `r2_5`, `r2_6`, `r2_7`, `r3_1`, `r3_2`, `r3_3`, `r3_4`, `r3_5`, `r3_6`, `r3_7`, `r3_8`, `r3_9`, `r3_10`, `create_date`, `create_by`) VALUES
(26, 656, 'sp1010', 1, 'jjjjjjjj', NULL, NULL, NULL, NULL, 'fffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-19 13:55:56', 'sp1010'),
(31, 656, 'sp1010', 2, 'ggggggg', NULL, NULL, NULL, NULL, 'dddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-19 14:28:30', 'sp1010'),
(32, 656, 'sp1010', 3, 'ooooooo', NULL, NULL, NULL, NULL, 'kkkkkkkkkkkkkkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-19 14:28:46', 'sp1010'),
(34, 656, 'hrm101', 1, 'gggggggggggggggggggggggggggggggggggggggggggggggggfffffffffffffffffffffffffffffffffffffffffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-24 11:53:03', 'hrm101'),
(35, 656, 'hrm101', 2, 'hhhhhhhhhhhhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-24 13:50:57', 'hrm101'),
(38, 656, 'jdi100', 1, 'ดูล้าวล้าว', NULL, NULL, NULL, NULL, 'เวร์เดอร์ตูตูตูดดดดดมมมม', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-26 11:31:18', 'jdi100'),
(40, 656, 'sp1010', 4, 'four', NULL, NULL, NULL, NULL, 'four42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 09:27:00', 'sp1010'),
(41, 657, 'sp7110', 1, 'บุคไรวะ บุคลากรหรอออออออออ', '2บาทพอป่ะ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'เลข บช ใต้เก้าอี้จ้า', '2019-08-01 14:07:04', 'sp7110'),
(42, 657, 'hrm101', 1, 'จ๋าจ๊ะ รู้แล่้ว', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 14:25:21', 'hrm101'),
(43, 657, 'jdi100', 1, 'ตือดือดือ ตื่อดึดือ ตื่อดึดือ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 14:25:59', 'jdi100'),
(44, 658, 'sp1010', 1, 'cccccccccccccccccccccccccccccccxxxxx', NULL, NULL, NULL, NULL, 'fffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-19 13:55:56', 'sp1010'),
(45, 659, 'tr1036', 1, 'อามาโน้ะโอการิมานะ', 'ใหม่พรอมอตออ่ะ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ไทรูมูนา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 13:57:58', 'tr1036'),
(46, 659, 'jdi100', 1, 'wordermore ครุคริ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 13:58:45', 'jdi100'),
(47, 659, 'hrm101', 1, 'ดกบงมาทีนา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 13:59:26', 'hrm101'),
(48, 659, 'fin201', 1, NULL, 'อวเจนเมนมา', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 13:59:54', 'fin201'),
(49, 659, 'jdi100', 2, 'แนะนำให้หน่วยรับการตรวจพิจารณาใช้มาตรการพิเศษแทนการดำเนินคดีอาญาให้กับเด็กและเยาวชน โดยทำความเข้าใจกับผู้เสียหายและผู้ปกครองในการใช้มาตรการทางเลือกเพื่อแก้ไขเด็กและเยาวชน ที่s43อาจสามารถกลับตัวเป็นคนดีได้โดยไม่ต้องฟ้อง และแสดงถึงประสิทธิภาพและประสิทธิผลถึงระดับความสำเร็จในการบรรลุเป้าหมายตัวชี้วัดของหน', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 09:26:58', 'jdi100');

-- --------------------------------------------------------

--
-- Table structure for table `subins_zone`
--

CREATE TABLE `subins_zone` (
  `id` int(1) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subins_zone`
--

INSERT INTO `subins_zone` (`id`, `name`) VALUES
(0, '-'),
(1, 'รอง 1'),
(2, 'รอง 2'),
(3, 'รอง 3'),
(4, 'รอง 4'),
(5, 'รอง 5');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `title_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `tr_locate`
--

CREATE TABLE `tr_locate` (
  `id` int(1) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_locate`
--

INSERT INTO `tr_locate` (`id`, `name`) VALUES
(0, '-'),
(1, 'เขต 1'),
(2, 'เขต 2'),
(3, 'เขต 3'),
(4, 'เขต 4'),
(5, 'กรุณา'),
(6, 'บ้านบึง');

-- --------------------------------------------------------

--
-- Table structure for table `type_reason`
--

CREATE TABLE `type_reason` (
  `id` int(11) NOT NULL,
  `typeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_reason`
--

INSERT INTO `type_reason` (`id`, `typeName`) VALUES
(1, 'กบค'),
(2, 'JDI'),
(3, 'แผน'),
(4, 'คลัง'),
(5, 'กพร'),
(6, 'กพย'),
(7, 'กองสุขภาพ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `permission_group`, `username`, `password`) VALUES
(1, 'ผู้ตรวจราชการ', 1, 'ins101', '$2y$04$KcpCbuNSM8uE4gumoZaGQOPRJmRLrVyKakrP.I02KELnWCBbKDJGe'),
(2, 'หน่วยตรวจสอบภายใน', 1, 'ita001', '$2y$04$zAZ8sLNyjRnOe4hXyT82y.hcM5fjRh72kNu5gYmpIZ.DdRbCdLgIy'),
(3, 'ศฝฯ หญิงบ้านปรานี', 2, 'tr1031', '$2y$04$PiLfOXEV5mDiOrt8hQc4EuUSVxd1qG9l6s1J0veGGHcbd8bYrxF32'),
(4, 'ศฝฯ ชายบ้านกรุณา', 2, 'tr1032', '$2y$04$gD49GjKeE7ET/ifge3uKsuEaN4gpL8BCGppDFFKsCn/MSRzmdxSli'),
(5, 'ศฝฯ ชายบ้านมุทิตา', 2, 'tr1033', '$2y$04$2utN2patQGkh/tus3V4keeUd02WS4Ql192b1PvtjngKsa4fLwhm1S'),
(6, 'ศฝฯ ชายบ้านอุเบกขา', 2, 'tr1034', '$2y$04$Xg/y2JKG1zUjZuLCdxHgDuHpFab1dqQBNxkz/j8h5/n6Yt9xT.c..'),
(7, 'ศฝฯ ชายสิรินธร', 2, 'tr1035', '$2y$04$K/nowcpJtdEo5uX..zWmLeXn.ytw72gvJ90Z4wfVx/7DGdaitDmBm'),
(8, 'ศฝฯ กาญจนาภิเษก', 2, 'tr1036', '$2y$04$yk8IDNm57.Gw6.Bqe644PewLl7T8T3iFjHEgmN/W2jgROIWxuDkru'),
(9, 'ศฝฯ พระนครศรีอยุธยา', 2, 'tr1430', '$2y$04$Gs3IM4PRPgOGJyjBe6AL.O7uYe0Vy0QLtzDJnxZc4TSVh08I6uQlu'),
(10, 'สพฯ ชายบ้านเมตตา', 2, 'sp1021', '$2y$04$Bl2LjH6bs8k/lDybQ9wz5erwj7HQgmpFdohczwLkIDukQsIPrViIu'),
(11, 'สพฯ หญิงบ้านปรานี', 2, 'sp1022', '$2y$04$f5iyyoz0cCsdYkfId/uub.UPpPEgAy80XSGXyGIt86tzKIH99xCJ2'),
(12, 'สพฯ กรุงเทพมหานคร', 2, 'sp1010', '$2y$04$rfHTuq8wdNPpfzlK9CEi9O0Rx8iPOGytJ7L07DIoABijxO8DVUUeO'),
(13, 'สพฯ สมุทรปราการ', 2, 'sp1110', '$2y$04$kSL7DEZdnAuspaLPEHWUxue6Dg8n7z4IIHQcCj3b7cncVyIMMMfFy'),
(14, 'สพฯ นนทบุรี', 2, 'sp1210', '$2y$04$qMk4Buh/q66KgIPxaW1UxON9mYuVDPSmhCqiSIEIy5zQPhBMXDrV2'),
(15, 'สพฯ ปทุมธานี', 2, 'sp1310', '$2y$04$XfaYa0xX38U7yAB.M7JwquVAj3YdN0q.5ihln2/LviwpfXFvey/du'),
(16, 'สพฯ ฉะเชิงเทรา', 2, 'sp2410', '$2y$04$Xzz1BVg1aTiShlu3Clo/Z.Ga63LwcjLLw.hdPxPNjPliVJa6.BvVq'),
(17, 'สพฯ นครนายก', 2, 'sp2610', '$2y$04$/AdCi0858BvTXuaP/WwkeeJ43SMYA3E5DLG4P9Azt3F0.9qYoC1C2'),
(18, 'สพฯ ชลบุรี', 2, 'sp2010', '$2y$04$kYehy31FZ08D59VN.ELFheayprSi/Pl7/IM4Sy7TBeXd2RaJ2D7aq'),
(19, 'ศฝฯ บ้านบึง', 2, 'tr2030', '$2y$04$6rmajXmWBCnU9npSEJtTvuzWqCQ8l1uVB2BLNp2iMqF2ig5ud5PfW'),
(20, 'สพฯ ระยอง', 2, 'sp2110', '$2y$04$Oa89SXhkNgIw8fDHWwLY7OBl42gnrLzc3.ohzVpLMiTqxmZQFeZqa'),
(21, 'ศฝฯ ระยอง', 2, 'tr2130', '$2y$04$bW2ZahTsVUmSBDXcdPtQL.16JaplcsrkB29pXnSdx9dfU0deZ2vbK'),
(22, 'สพฯ จันทบุรี', 2, 'sp2210', '$2y$04$W8d9Easid61AKtjWqIEEUOLVLawFeviQv/QkBY0qtoWnfKoJVIbIa'),
(23, 'สพฯ ตราด', 2, 'sp2310', '$2y$04$mlGG7p59K2S4XsRjIShwYO.GAOOvC3bicblGUB7krIEZx98IgwcIu'),
(24, 'สพฯ ปราจีนบุรี', 2, 'sp2510', '$2y$04$bIJTkTQFmrZ/U47lu.OuBubo33Yn8EMk8m.PyJKfO1qrAKGnzf7Qu'),
(25, 'สพฯ สระแก้ว', 2, 'sp2710', '$2y$04$3R/mCMXj3cx7Wp6vwIMMhuvjwwB3QrGoNTwm7NajeLm61y6qZaNbu'),
(26, 'ศฝฯ ราชบุรี', 2, 'tr7030', '$2y$04$ltBUiUx5oJSJXd9MX33MlO16g/b50l.AbEmq9WSK/zZBYnl6utN/S'),
(27, 'สพฯ ราชบุรี', 2, 'sp7010', '$2y$04$mLacPZ5CPnT3vw.5TAx/iuMdI1KFhXLMgaShpwkgnGH6/fLJZ4.zO'),
(28, 'สพฯ กาญจนบุรี', 2, 'sp7110', '$2y$04$Ou76SPiIgS2rdyBOk3i5rO29XA/k2vI29QFglVFV/CzYv3JgEaUI6'),
(29, 'สพฯ สุพรรณบุรี', 2, 'sp7210', '$2y$04$u9UerHZv./5ACpvAyYPzJeF4ixyD1BNo/R15TwDUviKZ88i3vOFaS'),
(30, 'สพฯ นครปฐม', 2, 'sp7310', '$2y$04$4ZnUs1UX02zkko26nwFUxehk2ko50Mf.c6T8vWFL4c9tdksKghnwC'),
(31, 'สพฯ สมุทรสาคร', 2, 'sp7410', '$2y$04$Jvh.bVEEkZUY790ucnqQn.EPd/AOcqo2dx7rI8BGkrXP0VLcfnoTy'),
(32, 'สพฯ สมุทรสงคราม', 2, 'sp7510', '$2y$04$Uuc2Cqk5In/R0eYc0OcQGOhiXfc9Cv.sWq23NYAdpzsvhFvFNxwxW'),
(33, 'สพฯ เพชรบุรี', 2, 'sp7610', '$2y$04$24VPuHwEgIMthdjBkSn4r.aL5lxGSv71CA6gw.9m6060D.LY3wBoW'),
(34, 'สพฯ ประจวบคีรีขันธ์', 2, 'sp7710', '$2y$04$MM5NupzowN7zHUHM/SAD5O8LvUrO/oB/zp3GoUvQN/Lk9viCNH3Hu'),
(35, 'ศฝฯ นครราชสีมา', 2, 'tr3030', '$2y$04$Gpbg5aeOp9e8EVRzOto3.uVsZ9Mpi0msgHamAw2NlCYxVlaMTbuAW'),
(36, 'สพฯ สระบุรี', 2, 'sp1910', '$2y$04$dFXqbTAeIUklRSjEz6/rSOfpWLFPHiKUYSSpapNsmwdNDslH9pN66'),
(37, 'สพฯ นครราชสีมา', 2, 'sp3010', '$2y$04$ji7gnEXBRAOcfMyGBwV/aeGrm8Yh8d0PPCGGShwi53ki9KgT/QMy6'),
(38, 'สพฯ บุรีรัมย์', 2, 'sp3110', '$2y$04$jZcTkXycwMYqnLXk2uMj.edZV3cJb2XpDTqZthq.To09yjFi5aGgq'),
(39, 'สพฯ สุรินทร์', 2, 'sp3210', '$2y$04$3HKZjVYB4YYQBzsiCIYx3.weQETswsptxdcdolGgFB1mJxdSiDF12'),
(40, 'สพฯ ชัยภูมิ', 2, 'sp3610', '$2y$04$TmKN1JQeTvwdWUcTneJIhe0B8.N.CTZNtykv8gig3w9k5bIy.Gh6m'),
(41, 'ศฝฯ ขอนแก่น', 2, 'tr4030', '$2y$04$fJqVa3OOACnZSYWFYoDSZOuqNOPG/LcFzWKdTaTi56zfzXSnu2aYu'),
(42, 'สพฯ หนองบัวลำภู', 2, 'sp3910', '$2y$04$IdE3oqRDYOIhpOuhAWsymO38jEP5shPvZhWnhAMWtBwRB20hRM5RO'),
(43, 'สพฯ ขอนแก่น', 2, 'sp4010', '$2y$04$5/Ta/iabPb2wiIIv3/b22ueD4oZ9LXHfRMKi9QaZ0tYHi52DP3BXC'),
(44, 'สพฯ อุดรธานี', 2, 'sp4110', '$2y$04$RxXYDvlqpUUCRyFnJWAZ5ePprALBQPR3z4gz1TOMkxYGuih.B5e7m'),
(45, 'สพฯ เลย', 2, 'sp4210', '$2y$04$ugTklDc9ddkC4E78ciBBs..ThaMtuwfwKrvJ0XEg6QBDvyYDUcE3a'),
(46, 'สพฯ หนองคาย', 2, 'sp4310', '$2y$04$57qrJqFUjHRUM3OWZrAEVeYa9r9Pk38xqpE6v0o1eDaF2vnsKiGvG'),
(47, 'สพฯ มหาสารคาม', 2, 'sp4410', '$2y$04$P76giF..JDlJRW8HIA.UqeF1qh1RPxMZsL23YRiPuMAdPYVHRVLL6'),
(48, 'สพฯ ร้อยเอ็ด', 2, 'sp4510', '$2y$04$qqA3KOIH3Uso4.xbkUB91.bFh2tCCLBlg6jydyfBemu2LKCAYqbyq'),
(49, 'สพฯ กาฬสินธุ์', 2, 'sp4610', '$2y$04$e3p4McgAfNg34z3sUpk/D.LMVTs5ooFBe/M7E5hDlk4Axd02KXJyK'),
(50, 'สพฯ สกลนคร', 2, 'sp4710', '$2y$04$8WJegslqmxhCgOX.151VmOD8zdU8lzEvUmHXr86lXCDOs4Nqrr4ki'),
(51, 'สพฯ บึงกาฬ', 2, 'sp3810', '$2y$04$Ks.u0uscgaDK4q0y0OTUBebT2N.Ku49zkySzo7p/gNe0fNGKyXWMC'),
(52, 'ศฝฯ อุบลราชธานี', 2, 'tr3430', '$2y$04$e9EleL6CI/2o.qTlkxyKROLvaXXz2nj5dxbQYNzach6IMMaEL7OXK'),
(53, 'สพฯ ศรีสะเกษ', 2, 'sp3310', '$2y$04$JMRAa6SPbHgbgnMYRwnvou7aR1lBfu.YNShMzVSqWk4siJOCC9Khe'),
(54, 'สพฯ อุบลราชธานี', 2, 'sp3410', '$2y$04$gIICc0NBBRHcMgGjEvHaAuLREi5YpREiCqAYTJpOHu5yySToKyLna'),
(55, 'สพฯ ยโสธร', 2, 'sp3510', '$2y$04$C8lf7.PFTp88N5yozYXdiuGT501ZycsczTw9qeIvj8LvgrWSsJEkW'),
(56, 'สพฯ อำนาจเจริญ', 2, 'sp3710', '$2y$04$ZlWAeQQZY59j3XSG8Q6bUOhh3Aown8VxbipbbzzvNBApmOyQkNvYu'),
(57, 'สพฯ นครพนม', 2, 'sp4810', '$2y$04$JLd/E/O8BBu5BM/0vEmHlOEQG2eGGaFos69FrX398DvOPgSRP61A.'),
(58, 'สพฯ มุกดาหาร', 2, 'sp4910', '$2y$04$5KdDEMsazZOl.2Ziso5mSud8c3qDtsYGnl6JYOZGcR9w/ckYzCqoG'),
(59, 'ศฝฯ นครสวรรค์', 2, 'tr6030', '$2y$04$RrLVAcLvWem/9a3FNOR.KeCa0j7.Une4tadIGbD7tEeHgDiqQK.CK'),
(60, 'สพฯ พระนครศรีอยุธยา', 2, 'sp1410', '$2y$04$PwB3OsDcOkdAR8kszZB3Ue6/6I3ekGA2hqwa8GslffrtU64.81S5.'),
(61, 'สพฯ อ่างทอง', 2, 'sp1510', '$2y$04$nHwATdhCezc/crfQ2Wz/jO79K5mGy.eA4UiKtOBUl8U4N1Z.Tjac2'),
(62, 'สพฯ ลพบุรี', 2, 'sp1610', '$2y$04$r72XTJ7y3HutQ5TL7UB5I.VgGe1vjdqQbg/87NDoNWOy6smHYy9gW'),
(63, 'สพฯ สิงห์บุรี', 2, 'sp1710', '$2y$04$G1QVQWSA9Y/ImHDhAsTV.e0vA8N47RbEsj3yKzJeTwmp8PW1BYCNO'),
(64, 'สพฯ ชัยนาท', 2, 'sp1810', '$2y$04$4f0a5MrWpcYGcjLHA3lQIul3eAayZySzfC4jJzDZ7a.8yV2xG/iOe'),
(65, 'สพฯ นครสวรรค์', 2, 'sp6010', '$2y$04$RHK2dVPqZjVGihL5junDkeAhrF4wz/mBIzu1mBpg/Ytz3aXe3aiLu'),
(66, 'สพฯ อุทัยธานี', 2, 'sp6110', '$2y$04$7kr.nX9uHuWIsG7JMfjLzuyyl..nvktE9DmKl4Dp/F7PoMV0r0Q1.'),
(67, 'สพฯ กำแพงเพชร', 2, 'sp6210', '$2y$04$GnfhgQlQr9juMvCxTFnYm.YIbeb9DNiZbpZoEDub/RDMRek9gmM3G'),
(68, 'สพฯ ตาก', 2, 'sp6310', '$2y$04$lvY6TUUg8rZr.ArH3n70VOAp6Ms5akKl9cO4FhSfAeNMEsnzUxeR6'),
(69, 'สพฯ สุโขทัย', 2, 'sp6410', '$2y$04$RUu5PKaCuY88IOTOtyhFHuHhxmwU6oVtseCdeAaqgH8hBuD3TptBi'),
(70, 'สพฯ พิษณุโลก', 2, 'sp6510', '$2y$04$8JHMNRLPOA5Y8hYpgW8K9uRsSSI2VqEhoB/t4fp5F.I8xOhONi5pG'),
(71, 'สพฯ พิจิตร', 2, 'sp6610', '$2y$04$FKhN2MBMlY6MX1fGqEC5rOs1u.WSM36oDZvHe/y3lU1lc2inn1NUe'),
(72, 'สพฯ เพชรบูรณ์', 2, 'sp6710', '$2y$04$aNpK2LDzl5KYFW1w/ydmQ.KKoptRBKWWQppIeEECBtVP7oC20jS7u'),
(73, 'ศฝฯ เชียงใหม่', 2, 'tr5030', '$2y$04$ejoe2hEL1TE6IJJiN06GmubvPwddxjb3QzohQgm3dErMKKmM6jbYi'),
(74, 'สพฯ เชียงใหม่', 2, 'sp5010', '$2y$04$EnAM5SxJMx9Tj6Q3XMmteeBs1psljk0UwVYpkH0NRGNptWgkdgnLa'),
(75, 'สพฯ ลำพูน', 2, 'sp5110', '$2y$04$VjX.04pAX/gMt/urvYJdQOD1PsnUSv5f7PtTYQuCmFAiBKcd6DlIK'),
(76, 'สพฯ ลำปาง', 2, 'sp5210', '$2y$04$hg/NP7JezT4wpq.Ag9d3.e/zj7k9YYSUjBOX4Q6aYg7SM6AThaZ9e'),
(77, 'สพฯ อุตรดิตถ์', 2, 'sp5310', '$2y$04$btpH..S6ZoAR6eMXsj5zb.MtvkG/1W9HmW6T61cgoqefC.GbLbLfK'),
(78, 'สพฯ แพร่', 2, 'sp5410', '$2y$04$YECxh8OJccCqokAWGoBgRu25xeJL6LoZiiDhPzqMvSMnRuyOhYkxG'),
(79, 'สพฯ น่าน', 2, 'sp5510', '$2y$04$RXiab1j2f7IMyALCGMkuCOmoZmsbY1xRp/YcGv9A0b5rbQd3Z6qgK'),
(80, 'สพฯ พะเยา', 2, 'sp5610', '$2y$04$3T8xSmiBLGhychY0H5bpbOq3mQT81bZ02nw0YbU/bzF3yJxzzLyj6'),
(81, 'สพฯ เชียงราย', 2, 'sp5710', '$2y$04$9PTJsSm01Yl6jHG0xXaa9udk.7Fy1RlkEh.ktl1reFbFMllkDrwoa'),
(82, 'สพฯ แม่ฮ่องสอน', 2, 'sp5810', '$2y$04$OAPooGHmet01BzHrJfODk.9gmbLZNWVK33QA9/GNt832kGoeA8L4y'),
(83, 'ศฝฯ สุราษฎร์ธานี', 2, 'tr8430', '$2y$04$sFc5k2DH8wbm0gnljj5J..ExA5D95ZXRD02nBQhYedYumMe1IJ/VS'),
(84, 'สพฯ นครศรีธรรมราช', 2, 'sp8010', '$2y$04$3tSnDokfvBV32JSO3.U1tuxNokP6GkTR6De1DPgD.tTWzun2zmIqG'),
(85, 'สพฯ กระบี่', 2, 'sp8110', '$2y$04$2/Abw.N9ke7VmzSnP238Cu5nu5n8WM41WJ5v6YfTKp0qV4eNLkC.W'),
(86, 'สพฯ พังงา', 2, 'sp8210', '$2y$04$0fKGDu./dMx4nbkxdKVNkeNs1Z4PVH52QycKNjucIHsu1Ey2bAd32'),
(87, 'สพฯ ภูเก็ต', 2, 'sp8310', '$2y$04$5mmKDr8F3ewsoazN8lWdVuZrOzpITi31/1iIQIrQphvLe9Wbclk.6'),
(88, 'สพฯ สุราษฎร์ธานี', 2, 'sp8410', '$2y$04$HuaqT2n79iUsxQH4guWhI.g4Y78YwY7jK5XxzinTsCqDCvwvhHbvy'),
(89, 'สพฯ ระนอง', 2, 'sp8510', '$2y$04$6qFciDGzV3x4ulLPekCJge4C4eOnOclQpzQoD2aSgCrrbbD5VzNaq'),
(90, 'สพฯ ชุมพร', 2, 'sp8610', '$2y$04$NVLg5np1sRPNTLE6xC5Vxeg.lR7CoSfvg0VCHrVLIiD2LBoPcende'),
(91, 'ศฝฯ สงขลา', 2, 'tr9030', '$2y$04$h3yIZBJqTrusP0w6TL1ksO9KmK5hjKogkJUHc8llCvwuLw7zQGeOy'),
(92, 'สพฯ สงขลา', 2, 'sp9010', '$2y$04$xmXt1nalljgUPzB0I/qXNO/CGsImm7STVfY/2J.6q2jErp2ZggTSO'),
(93, 'สพฯ สตูล', 2, 'sp9110', '$2y$04$pe1KPKl3c50vfeqQr7mFyuiCajmlY4bWNkp3FBapwufnbVVuX1pj.'),
(94, 'สพฯ ตรัง', 2, 'sp9210', '$2y$04$/RlK1R7cmgUqS4v0Dl.7yuBGZJaFhh33WBH7.t0T/Z70yM7m4OtB6'),
(95, 'สพฯ พัทลุง', 2, 'sp9310', '$2y$04$0w5jwHecdHALsRptUTt1WO3LI9TCLxzQNqTJGRwFQX21FnRQXUAtu'),
(96, 'สพฯ ปัตตานี', 2, 'sp9410', '$2y$04$HUsTQ5Lf7O7NRwq/0tZAEeKV0.h6j9qGbHutH/krDEbJrYkfBbW6i'),
(97, 'สพฯ ยะลา', 2, 'sp9510', '$2y$04$hZkm7wllnfuj8uTE33zAruw5pEdqr/vioPgysjk5Ox.BdM7IuEv0G'),
(98, 'สพฯ นราธิวาส', 2, 'sp9610', '$2y$04$yq8rdONzSEpJA97aQlVBu.5D6Wml71W6yQKxPgqZFtZ8HDAncX4jG'),
(99, 'อธิบดี', 3, 'djop001', '$2y$04$6l1wdk8UUAy8yi.s0PPTPOuNy/9PiEBg8kb9c8lbguuHixBFUf596'),
(100, 'รองอธิบดี 1', 3, 'djop002', '$2y$04$6tiKD6PRT3wKVSjUWIwQ.ejykPyU2Qv5g8IVHcxvOzsAYDmeWLeX2'),
(101, 'รองอธิบดี 2', 3, 'djop003', '$2y$04$eP386AYZpSYWCihruN5WUOi9aVT3K5.9QH8008.wLWKOWxAYdSHW2'),
(102, 'รองอธิบดี 3', 3, 'djop004', '$2y$04$iMmv0ukPyCddDidMov9kEOd2K50GIeQ7AUsTfmatKmjZbvDN6eBKq'),
(103, 'ผู้ตรวจ 1', 3, 'djop005', '$2y$04$BmxmMo4ODNglyBZNzSyIzOnfKLL9V0eYg9kVt2sWiml2kDAJO3pj.'),
(104, 'ผู้ตรวจ 2', 3, 'djop006', '$2y$04$Nk1eVyh2noIitiGBuf7CbehOk2oXjaDphDPCnaPitNhava2h5WiLe'),
(105, 'ผู้ตรวจ 3', 3, 'djop007', '$2y$04$mmLVZDMaNiUjO7TUF12SHe9LuboGjHna/97wHUJ1m4mBSbiPilcU2'),
(106, 'ผู้ตรวจ 4', 3, 'djop008', '$2y$04$UhkLwIsUj1AOWsxzrUh2ueUJbPhmZ35WX/xNOqslCEW2XpNkSX9qi'),
(107, 'ผู้ตรวจ 5', 3, 'djop009', '$2y$04$L0zmM3cQy5O0ieiYXKKWF.q0hxaNmoWbqDq6xlRRU9MPD7ZphQhlu'),
(108, 'ผู้ตรวจ 6', 3, 'djop010', '$2y$04$0lHZ9WDnRP92GkVBxjj2hOBt2o57rrZvaNjluSN7PR3EEOuseBTym');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `name`, `permission_group`, `username`, `password`) VALUES
(1, 'ผู้ตรวจราชการ', 1, 'ins101', '$2y$04$W6QbXAKKAi9ATRnvLiGF6elRpqE95LIwwnzxT/aDxmPfMBJ/RIMxO'),
(2, 'ศฝฯ หญิงบ้านปรานี', 2, 'tr1031', '$2y$04$PiLfOXEV5mDiOrt8hQc4EuUSVxd1qG9l6s1J0veGGHcbd8bYrxF32'),
(3, 'ศฝฯ ชายบ้านกรุณา', 2, 'tr1032', '$2y$04$gD49GjKeE7ET/ifge3uKsuEaN4gpL8BCGppDFFKsCn/MSRzmdxSli'),
(4, 'ศฝฯ ชายบ้านมุทิตา', 2, 'tr1033', '$2y$04$2utN2patQGkh/tus3V4keeUd02WS4Ql192b1PvtjngKsa4fLwhm1S'),
(5, 'ศฝฯ ชายบ้านอุเบกขา', 2, 'tr1034', '$2y$04$Xg/y2JKG1zUjZuLCdxHgDuHpFab1dqQBNxkz/j8h5/n6Yt9xT.c..'),
(6, 'ศฝฯ ชายสิรินธร', 2, 'tr1035', '$2y$04$K/nowcpJtdEo5uX..zWmLeXn.ytw72gvJ90Z4wfVx/7DGdaitDmBm'),
(7, 'ศฝฯ กาญจนาภิเษก', 2, 'tr1036', '$2y$04$yk8IDNm57.Gw6.Bqe644PewLl7T8T3iFjHEgmN/W2jgROIWxuDkru'),
(8, 'ศฝฯ พระนครศรีอยุธยา', 2, 'tr1430', '$2y$04$Gs3IM4PRPgOGJyjBe6AL.O7uYe0Vy0QLtzDJnxZc4TSVh08I6uQlu'),
(9, 'สพฯ ชายบ้านเมตตา', 2, 'sp1021', '$2y$04$Bl2LjH6bs8k/lDybQ9wz5erwj7HQgmpFdohczwLkIDukQsIPrViIu'),
(10, 'สพฯ หญิงบ้านปรานี', 2, 'sp1022', '$2y$04$f5iyyoz0cCsdYkfId/uub.UPpPEgAy80XSGXyGIt86tzKIH99xCJ2'),
(11, 'สพฯ กรุงเทพมหานคร', 2, 'sp1010', '$2y$04$rfHTuq8wdNPpfzlK9CEi9O0Rx8iPOGytJ7L07DIoABijxO8DVUUeO'),
(12, 'สพฯ สมุทรปราการ', 2, 'sp1110', '$2y$04$kSL7DEZdnAuspaLPEHWUxue6Dg8n7z4IIHQcCj3b7cncVyIMMMfFy'),
(13, 'สพฯ นนทบุรี', 2, 'sp1210', '$2y$04$qMk4Buh/q66KgIPxaW1UxON9mYuVDPSmhCqiSIEIy5zQPhBMXDrV2'),
(14, 'สพฯ ปทุมธานี', 2, 'sp1310', '$2y$04$XfaYa0xX38U7yAB.M7JwquVAj3YdN0q.5ihln2/LviwpfXFvey/du'),
(15, 'สพฯ ฉะเชิงเทรา', 2, 'sp2410', '$2y$04$Xzz1BVg1aTiShlu3Clo/Z.Ga63LwcjLLw.hdPxPNjPliVJa6.BvVq'),
(16, 'สพฯ นครนายก', 2, 'sp2610', '$2y$04$/AdCi0858BvTXuaP/WwkeeJ43SMYA3E5DLG4P9Azt3F0.9qYoC1C2'),
(17, 'สพฯ ชลบุรี', 2, 'sp2010', '$2y$04$kYehy31FZ08D59VN.ELFheayprSi/Pl7/IM4Sy7TBeXd2RaJ2D7aq'),
(18, 'ศฝฯ บ้านบึง', 2, 'tr2030', '$2y$04$6rmajXmWBCnU9npSEJtTvuzWqCQ8l1uVB2BLNp2iMqF2ig5ud5PfW'),
(19, 'สพฯ ระยอง', 2, 'sp2110', '$2y$04$Oa89SXhkNgIw8fDHWwLY7OBl42gnrLzc3.ohzVpLMiTqxmZQFeZqa'),
(20, 'ศฝฯ ระยอง', 2, 'tr2130', '$2y$04$bW2ZahTsVUmSBDXcdPtQL.16JaplcsrkB29pXnSdx9dfU0deZ2vbK'),
(21, 'สพฯ จันทบุรี', 2, 'sp2210', '$2y$04$W8d9Easid61AKtjWqIEEUOLVLawFeviQv/QkBY0qtoWnfKoJVIbIa'),
(22, 'สพฯ ตราด', 2, 'sp2310', '$2y$04$mlGG7p59K2S4XsRjIShwYO.GAOOvC3bicblGUB7krIEZx98IgwcIu'),
(23, 'สพฯ ปราจีนบุรี', 2, 'sp2510', '$2y$04$bIJTkTQFmrZ/U47lu.OuBubo33Yn8EMk8m.PyJKfO1qrAKGnzf7Qu'),
(24, 'สพฯ สระแก้ว', 2, 'sp2710', '$2y$04$3R/mCMXj3cx7Wp6vwIMMhuvjwwB3QrGoNTwm7NajeLm61y6qZaNbu'),
(25, 'ศฝฯ ราชบุรี', 2, 'tr7030', '$2y$04$ltBUiUx5oJSJXd9MX33MlO16g/b50l.AbEmq9WSK/zZBYnl6utN/S'),
(26, 'สพฯ ราชบุรี', 2, 'sp7010', '$2y$04$mLacPZ5CPnT3vw.5TAx/iuMdI1KFhXLMgaShpwkgnGH6/fLJZ4.zO'),
(27, 'สพฯ กาญจนบุรี', 2, 'sp7110', '$2y$04$Ou76SPiIgS2rdyBOk3i5rO29XA/k2vI29QFglVFV/CzYv3JgEaUI6'),
(28, 'สพฯ สุพรรณบุรี', 2, 'sp7210', '$2y$04$u9UerHZv./5ACpvAyYPzJeF4ixyD1BNo/R15TwDUviKZ88i3vOFaS'),
(29, 'สพฯ นครปฐม', 2, 'sp7310', '$2y$04$4ZnUs1UX02zkko26nwFUxehk2ko50Mf.c6T8vWFL4c9tdksKghnwC'),
(30, 'สพฯ สมุทรสาคร', 2, 'sp7410', '$2y$04$Jvh.bVEEkZUY790ucnqQn.EPd/AOcqo2dx7rI8BGkrXP0VLcfnoTy'),
(31, 'สพฯ สมุทรสงคราม', 2, 'sp7510', '$2y$04$Uuc2Cqk5In/R0eYc0OcQGOhiXfc9Cv.sWq23NYAdpzsvhFvFNxwxW'),
(32, 'สพฯ เพชรบุรี', 2, 'sp7610', '$2y$04$24VPuHwEgIMthdjBkSn4r.aL5lxGSv71CA6gw.9m6060D.LY3wBoW'),
(33, 'สพฯ ประจวบคีรีขันธ์', 2, 'sp7710', '$2y$04$MM5NupzowN7zHUHM/SAD5O8LvUrO/oB/zp3GoUvQN/Lk9viCNH3Hu'),
(34, 'ศฝฯ นครราชสีมา', 2, 'tr3030', '$2y$04$Gpbg5aeOp9e8EVRzOto3.uVsZ9Mpi0msgHamAw2NlCYxVlaMTbuAW'),
(35, 'สพฯ สระบุรี', 2, 'sp1910', '$2y$04$dFXqbTAeIUklRSjEz6/rSOfpWLFPHiKUYSSpapNsmwdNDslH9pN66'),
(36, 'สพฯ นครราชสีมา', 2, 'sp3010', '$2y$04$ji7gnEXBRAOcfMyGBwV/aeGrm8Yh8d0PPCGGShwi53ki9KgT/QMy6'),
(37, 'สพฯ บุรีรัมย์', 2, 'sp3110', '$2y$04$jZcTkXycwMYqnLXk2uMj.edZV3cJb2XpDTqZthq.To09yjFi5aGgq'),
(38, 'สพฯ สุรินทร์', 2, 'sp3210', '$2y$04$3HKZjVYB4YYQBzsiCIYx3.weQETswsptxdcdolGgFB1mJxdSiDF12'),
(39, 'สพฯ ชัยภูมิ', 2, 'sp3610', '$2y$04$TmKN1JQeTvwdWUcTneJIhe0B8.N.CTZNtykv8gig3w9k5bIy.Gh6m'),
(40, 'ศฝฯ ขอนแก่น', 2, 'tr4030', '$2y$04$fJqVa3OOACnZSYWFYoDSZOuqNOPG/LcFzWKdTaTi56zfzXSnu2aYu'),
(41, 'สพฯ หนองบัวลำภู', 2, 'sp3910', '$2y$04$IdE3oqRDYOIhpOuhAWsymO38jEP5shPvZhWnhAMWtBwRB20hRM5RO'),
(42, 'สพฯ ขอนแก่น', 2, 'sp4010', '$2y$04$5/Ta/iabPb2wiIIv3/b22ueD4oZ9LXHfRMKi9QaZ0tYHi52DP3BXC'),
(43, 'สพฯ อุดรธานี', 2, 'sp4110', '$2y$04$RxXYDvlqpUUCRyFnJWAZ5ePprALBQPR3z4gz1TOMkxYGuih.B5e7m'),
(44, 'สพฯ เลย', 2, 'sp4210', '$2y$04$ugTklDc9ddkC4E78ciBBs..ThaMtuwfwKrvJ0XEg6QBDvyYDUcE3a'),
(45, 'สพฯ หนองคาย', 2, 'sp4310', '$2y$04$57qrJqFUjHRUM3OWZrAEVeYa9r9Pk38xqpE6v0o1eDaF2vnsKiGvG'),
(46, 'สพฯ มหาสารคาม', 2, 'sp4410', '$2y$04$P76giF..JDlJRW8HIA.UqeF1qh1RPxMZsL23YRiPuMAdPYVHRVLL6'),
(47, 'สพฯ ร้อยเอ็ด', 2, 'sp4510', '$2y$04$qqA3KOIH3Uso4.xbkUB91.bFh2tCCLBlg6jydyfBemu2LKCAYqbyq'),
(48, 'สพฯ กาฬสินธุ์', 2, 'sp4610', '$2y$04$e3p4McgAfNg34z3sUpk/D.LMVTs5ooFBe/M7E5hDlk4Axd02KXJyK'),
(49, 'สพฯ สกลนคร', 2, 'sp4710', '$2y$04$8WJegslqmxhCgOX.151VmOD8zdU8lzEvUmHXr86lXCDOs4Nqrr4ki'),
(50, 'สพฯ บึงกาฬ', 2, 'sp3810', '$2y$04$Ks.u0uscgaDK4q0y0OTUBebT2N.Ku49zkySzo7p/gNe0fNGKyXWMC'),
(51, 'ศฝฯ อุบลราชธานี', 2, 'tr3430', '$2y$04$e9EleL6CI/2o.qTlkxyKROLvaXXz2nj5dxbQYNzach6IMMaEL7OXK'),
(52, 'สพฯ ศรีสะเกษ', 2, 'sp3310', '$2y$04$JMRAa6SPbHgbgnMYRwnvou7aR1lBfu.YNShMzVSqWk4siJOCC9Khe'),
(53, 'สพฯ อุบลราชธานี', 2, 'sp3410', '$2y$04$gIICc0NBBRHcMgGjEvHaAuLREi5YpREiCqAYTJpOHu5yySToKyLna'),
(54, 'สพฯ ยโสธร', 2, 'sp3510', '$2y$04$C8lf7.PFTp88N5yozYXdiuGT501ZycsczTw9qeIvj8LvgrWSsJEkW'),
(55, 'สพฯ อำนาจเจริญ', 2, 'sp3710', '$2y$04$ZlWAeQQZY59j3XSG8Q6bUOhh3Aown8VxbipbbzzvNBApmOyQkNvYu'),
(56, 'สพฯ นครพนม', 2, 'sp4810', '$2y$04$JLd/E/O8BBu5BM/0vEmHlOEQG2eGGaFos69FrX398DvOPgSRP61A.'),
(57, 'สพฯ มุกดาหาร', 2, 'sp4910', '$2y$04$5KdDEMsazZOl.2Ziso5mSud8c3qDtsYGnl6JYOZGcR9w/ckYzCqoG'),
(58, 'ศฝฯ นครสวรรค์', 2, 'tr6030', '$2y$04$RrLVAcLvWem/9a3FNOR.KeCa0j7.Une4tadIGbD7tEeHgDiqQK.CK'),
(59, 'สพฯ พระนครศรีอยุธยา', 2, 'sp1410', '$2y$04$PwB3OsDcOkdAR8kszZB3Ue6/6I3ekGA2hqwa8GslffrtU64.81S5.'),
(60, 'สพฯ อ่างทอง', 2, 'sp1510', '$2y$04$nHwATdhCezc/crfQ2Wz/jO79K5mGy.eA4UiKtOBUl8U4N1Z.Tjac2'),
(61, 'สพฯ ลพบุรี', 2, 'sp1610', '$2y$04$r72XTJ7y3HutQ5TL7UB5I.VgGe1vjdqQbg/87NDoNWOy6smHYy9gW'),
(62, 'สพฯ สิงห์บุรี', 2, 'sp1710', '$2y$04$G1QVQWSA9Y/ImHDhAsTV.e0vA8N47RbEsj3yKzJeTwmp8PW1BYCNO'),
(63, 'สพฯ ชัยนาท', 2, 'sp1810', '$2y$04$4f0a5MrWpcYGcjLHA3lQIul3eAayZySzfC4jJzDZ7a.8yV2xG/iOe'),
(64, 'สพฯ นครสวรรค์', 2, 'sp6010', '$2y$04$RHK2dVPqZjVGihL5junDkeAhrF4wz/mBIzu1mBpg/Ytz3aXe3aiLu'),
(65, 'สพฯ อุทัยธานี', 2, 'sp6110', '$2y$04$7kr.nX9uHuWIsG7JMfjLzuyyl..nvktE9DmKl4Dp/F7PoMV0r0Q1.'),
(66, 'สพฯ กำแพงเพชร', 2, 'sp6210', '$2y$04$GnfhgQlQr9juMvCxTFnYm.YIbeb9DNiZbpZoEDub/RDMRek9gmM3G'),
(67, 'สพฯ ตาก', 2, 'sp6310', '$2y$04$lvY6TUUg8rZr.ArH3n70VOAp6Ms5akKl9cO4FhSfAeNMEsnzUxeR6'),
(68, 'สพฯ สุโขทัย', 2, 'sp6410', '$2y$04$RUu5PKaCuY88IOTOtyhFHuHhxmwU6oVtseCdeAaqgH8hBuD3TptBi'),
(69, 'สพฯ พิษณุโลก', 2, 'sp6510', '$2y$04$8JHMNRLPOA5Y8hYpgW8K9uRsSSI2VqEhoB/t4fp5F.I8xOhONi5pG'),
(70, 'สพฯ พิจิตร', 2, 'sp6610', '$2y$04$FKhN2MBMlY6MX1fGqEC5rOs1u.WSM36oDZvHe/y3lU1lc2inn1NUe'),
(71, 'สพฯ เพชรบูรณ์', 2, 'sp6710', '$2y$04$aNpK2LDzl5KYFW1w/ydmQ.KKoptRBKWWQppIeEECBtVP7oC20jS7u'),
(72, 'ศฝฯ เชียงใหม่', 2, 'tr5030', '$2y$04$ejoe2hEL1TE6IJJiN06GmubvPwddxjb3QzohQgm3dErMKKmM6jbYi'),
(73, 'สพฯ เชียงใหม่', 2, 'sp5010', '$2y$04$EnAM5SxJMx9Tj6Q3XMmteeBs1psljk0UwVYpkH0NRGNptWgkdgnLa'),
(74, 'สพฯ ลำพูน', 2, 'sp5110', '$2y$04$VjX.04pAX/gMt/urvYJdQOD1PsnUSv5f7PtTYQuCmFAiBKcd6DlIK'),
(75, 'สพฯ ลำปาง', 2, 'sp5210', '$2y$04$hg/NP7JezT4wpq.Ag9d3.e/zj7k9YYSUjBOX4Q6aYg7SM6AThaZ9e'),
(76, 'สพฯ อุตรดิตถ์', 2, 'sp5310', '$2y$04$btpH..S6ZoAR6eMXsj5zb.MtvkG/1W9HmW6T61cgoqefC.GbLbLfK'),
(77, 'สพฯ แพร่', 2, 'sp5410', '$2y$04$YECxh8OJccCqokAWGoBgRu25xeJL6LoZiiDhPzqMvSMnRuyOhYkxG'),
(78, 'สพฯ น่าน', 2, 'sp5510', '$2y$04$RXiab1j2f7IMyALCGMkuCOmoZmsbY1xRp/YcGv9A0b5rbQd3Z6qgK'),
(79, 'สพฯ พะเยา', 2, 'sp5610', '$2y$04$3T8xSmiBLGhychY0H5bpbOq3mQT81bZ02nw0YbU/bzF3yJxzzLyj6'),
(80, 'สพฯ เชียงราย', 2, 'sp5710', '$2y$04$9PTJsSm01Yl6jHG0xXaa9udk.7Fy1RlkEh.ktl1reFbFMllkDrwoa'),
(81, 'สพฯ แม่ฮ่องสอน', 2, 'sp5810', '$2y$04$OAPooGHmet01BzHrJfODk.9gmbLZNWVK33QA9/GNt832kGoeA8L4y'),
(82, 'ศฝฯ สุราษฎร์ธานี', 2, 'tr8430', '$2y$04$sFc5k2DH8wbm0gnljj5J..ExA5D95ZXRD02nBQhYedYumMe1IJ/VS'),
(83, 'สพฯ นครศรีธรรมราช', 2, 'sp8010', '$2y$04$3tSnDokfvBV32JSO3.U1tuxNokP6GkTR6De1DPgD.tTWzun2zmIqG'),
(84, 'สพฯ กระบี่', 2, 'sp8110', '$2y$04$2/Abw.N9ke7VmzSnP238Cu5nu5n8WM41WJ5v6YfTKp0qV4eNLkC.W'),
(85, 'สพฯ พังงา', 2, 'sp8210', '$2y$04$0fKGDu./dMx4nbkxdKVNkeNs1Z4PVH52QycKNjucIHsu1Ey2bAd32'),
(86, 'สพฯ ภูเก็ต', 2, 'sp8310', '$2y$04$5mmKDr8F3ewsoazN8lWdVuZrOzpITi31/1iIQIrQphvLe9Wbclk.6'),
(87, 'สพฯ สุราษฎร์ธานี', 2, 'sp8410', '$2y$04$HuaqT2n79iUsxQH4guWhI.g4Y78YwY7jK5XxzinTsCqDCvwvhHbvy'),
(88, 'สพฯ ระนอง', 2, 'sp8510', '$2y$04$6qFciDGzV3x4ulLPekCJge4C4eOnOclQpzQoD2aSgCrrbbD5VzNaq'),
(89, 'สพฯ ชุมพร', 2, 'sp8610', '$2y$04$NVLg5np1sRPNTLE6xC5Vxeg.lR7CoSfvg0VCHrVLIiD2LBoPcende'),
(90, 'ศฝฯ สงขลา', 2, 'tr9030', '$2y$04$h3yIZBJqTrusP0w6TL1ksO9KmK5hjKogkJUHc8llCvwuLw7zQGeOy'),
(91, 'สพฯ สงขลา', 2, 'sp9010', '$2y$04$xmXt1nalljgUPzB0I/qXNO/CGsImm7STVfY/2J.6q2jErp2ZggTSO'),
(92, 'สพฯ สตูล', 2, 'sp9110', '$2y$04$pe1KPKl3c50vfeqQr7mFyuiCajmlY4bWNkp3FBapwufnbVVuX1pj.'),
(93, 'สพฯ ตรัง', 2, 'sp9210', '$2y$04$/RlK1R7cmgUqS4v0Dl.7yuBGZJaFhh33WBH7.t0T/Z70yM7m4OtB6'),
(94, 'สพฯ พัทลุง', 2, 'sp9310', '$2y$04$0w5jwHecdHALsRptUTt1WO3LI9TCLxzQNqTJGRwFQX21FnRQXUAtu'),
(95, 'สพฯ ปัตตานี', 2, 'sp9410', '$2y$04$HUsTQ5Lf7O7NRwq/0tZAEeKV0.h6j9qGbHutH/krDEbJrYkfBbW6i'),
(96, 'สพฯ ยะลา', 2, 'sp9510', '$2y$04$hZkm7wllnfuj8uTE33zAruw5pEdqr/vioPgysjk5Ox.BdM7IuEv0G'),
(97, 'สพฯ นราธิวาส', 2, 'sp9610', '$2y$04$yq8rdONzSEpJA97aQlVBu.5D6Wml71W6yQKxPgqZFtZ8HDAncX4jG'),
(98, 'ศูนย์เทคโนโลยีสารสนเทศ', 4, 'jjs201', '$2y$04$i6WRHelsl1MmCpMw/XPdp.tCpK0H/5yxcq.OW58UNAJZ1bdMgT7EW'),
(99, 'กองพัฒนาระบบงานยุติธรรมเด็กและเยาวชน (กพย)', 2, 'jjs120', '$2y$04$xppMt846sIeuZ1focUTzEupXvz/Swpzf/1ww18aR6HHDVjxmk.9fa'),
(100, 'กองพัฒนาระบบสุขภาพเด็กและเยาวชน (กองสุขภาพ)', 2, 'heh100', '$2y$04$Lu1XdFuU7X0Pl9GHS2.CNejOxdh8pRjVffqh52v/7svGnJJRTA7iO'),
(101, 'กองบริหารทรัพยากรบุคคล (กบค)', 2, 'hrm101', '$2y$04$L1yXVXcPMfUwyPjDe6lgSehKo8zpNQdBRT/p7L.UiwLkbN3bevmPK'),
(102, 'กองแผนงานงบประมาณ (แผน)', 2, 'jjs801', '$2y$04$Wq6ZasQhzgD6ZTtvOcr.p.wCXSqnIzoqpCIqDpA.NdpYCzfiFohQ2'),
(103, 'กลุ่มพัฒนาระบบบริหาร (กพร)', 2, 'psd001', '$2y$04$MzugBuTsrwbP6J9loU7Pv.R2945JGHl4HCVAS15OhGv75Ei5ok0P6'),
(104, 'กลุ่มงานคลัง (คลัง)', 2, 'fin201', '$2y$04$jl.bhBcsK90zj5hbFHDxe.8sWWiHx6noK/W.kuM655Zowq2jUzAAW'),
(105, 'สถาบันพัฒนาบุคคลากร (JDI)', 2, 'jdi100', '$2y$04$JtkJgElHkZPYLLF9mA3z1.SoXKnvFzOCMUIOETmvYiPuzn/TNulRa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center_reason`
--
ALTER TABLE `center_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspector`
--
ALTER TABLE `inspector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_filelocate`
--
ALTER TABLE `pr_filelocate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_follow`
--
ALTER TABLE `report_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subins_zone`
--
ALTER TABLE `subins_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_locate`
--
ALTER TABLE `tr_locate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_reason`
--
ALTER TABLE `type_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center_reason`
--
ALTER TABLE `center_reason`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=660;

--
-- AUTO_INCREMENT for table `inspector`
--
ALTER TABLE `inspector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pr_filelocate`
--
ALTER TABLE `pr_filelocate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report_follow`
--
ALTER TABLE `report_follow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_reason`
--
ALTER TABLE `type_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
