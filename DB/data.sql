-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2019 at 10:43 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inspection_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inspect_level` varchar(1) NOT NULL,
  `inspector` int(11) NOT NULL,
  `division` varchar(6) NOT NULL,
  `boss_name` varchar(255) NOT NULL,
  `inspect_type` varchar(1) NOT NULL COMMENT '0=ปกติ, 1=พิเศษ, 2=บูรณาการ',
  `inspect_date` date NOT NULL,
  `inspect_no` varchar(10) NOT NULL,
  `inspect_doc` varchar(20) NOT NULL,
  `inspect_doc_date` date NOT NULL,
  `personnel1` int(11) NOT NULL,
  `personnel2` int(11) NOT NULL,
  `personnel3` int(11) NOT NULL,
  `personnel4` int(11) NOT NULL,
  `personnel5` int(11) NOT NULL,
  `cm` int(11) NOT NULL,
  `fc` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `case53` int(11) NOT NULL,
  `case_f` int(11) NOT NULL,
  `case132` int(11) NOT NULL,
  `case_sp` int(11) NOT NULL,
  `tr1` int(11) NOT NULL,
  `tr2` int(11) NOT NULL,
  `tr3` int(11) NOT NULL,
  `tr4` int(11) NOT NULL,
  `tr5` int(11) NOT NULL,
  `tr6` int(11) NOT NULL,
  `tr7` int(11) NOT NULL,
  `tr8` int(11) NOT NULL,
  `r1` text NOT NULL,
  `r2` text NOT NULL,
  `r3` text NOT NULL,
  `r4` text NOT NULL,
  `r5` text NOT NULL,
  `r6` text NOT NULL,
  `r7` text NOT NULL,
  `r8` text NOT NULL,
  `r9` text NOT NULL,
  `r10` text NOT NULL,
  `r11` text NOT NULL,
  `r12` text NOT NULL,
  `r13` text NOT NULL,
  `r14` text NOT NULL,
  `insert_date` datetime NOT NULL,
  `budget_year` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=625 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `inspect_level`, `inspector`, `division`, `boss_name`, `inspect_type`, `inspect_date`, `inspect_no`, `inspect_doc`, `inspect_doc_date`, `personnel1`, `personnel2`, `personnel3`, `personnel4`, `personnel5`, `cm`, `fc`, `cc`, `case53`, `case_f`, `case132`, `case_sp`, `tr1`, `tr2`, `tr3`, `tr4`, `tr5`, `tr6`, `tr7`, `tr8`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`, `r11`, `r12`, `r13`, `r14`, `insert_date`, `budget_year`) VALUES
(622, 'd', 35, 'tr1034', 'ทดสอบ1  ทดสอบ1', '1', '2018-03-12', '1', '06098/01', '2018-02-08', 10, 5, 10, 2, 2, 20, 5, 5, 1, 2, 1, 2, 5, 1, 2, 3, 4, 6, 0, 2, 'พพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพ', 'รรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรร      ', 'นนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนน      ', 'ยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยย      ', 'บบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบ      ', 'ลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลล      ', 'ฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟ      ', 'หหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหห     ', 'กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก      ', 'ดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดด     ', 'สสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสส      ', 'ววววววววววววววววววววววววววววววววววววววววววววววววววววววว      ', 'ผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผ      ', 'อออออออออออออออออออออออออออออออออออออออออ      ', '2018-04-26 09:48:39', '2561'),
(623, 'd', 32, 'tr1036', 'ทดสอบ2 ทดสอบ2', '0', '2018-03-26', '1', '06098/02', '2018-04-23', 10, 5, 15, 3, 2, 20, 5, 5, 1, 2, 1, 2, 5, 1, 2, 3, 4, 6, 0, 2, 'พพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพพ ', 'รรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรรร ', 'นนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนนน ', 'ยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยยย ', 'บบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบบ ', 'ลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลลล ', 'ฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟฟ ', 'หหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหหห ', 'กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก ', 'ดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดดด ', 'สสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสสส ', 'ววววววววววววววววววววววววววววววววววววววววววววววววววววววว ', 'ผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผผ ', 'อออออออออออออออออออออออออออออออออออออออออ ', '2018-04-26 09:48:39', '2561'),
(624, 'd', 37, 'sp1410', 'ทดสอบ3 ทดสอบ3', '2', '2018-03-01', '1', '06098/03', '2018-02-05', 30, 5, 15, 3, 2, 30, 20, 10, 2, 2, 2, 2, 10, 5, 3, 2, 1, 0, 0, 3, '1111111111ฟ', '2222222222ห    ', '3333333333ส  ', '4444444444ย      ', '5555555555บ      ', '6666666666ป', '7777777777ท      ', '8888888888ย     ', '9999999999บ     ', '1010101010ก     ', '2020202020ต      ', '3030303030ห      ', '4040404040ม      ', '5050505050น      ', '2018-04-26 10:29:50', '2561');
