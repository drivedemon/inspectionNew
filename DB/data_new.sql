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
  `rs1_1` text NOT NULL,
  `rs1_2` text NOT NULL,
  `rs1_3` text NOT NULL,
  `rs1_4` text NOT NULL,
  `rs1_5` text NOT NULL,
  `rs2_1` text NOT NULL,
  `rs2_2` text NOT NULL,
  `rs2_3` text NOT NULL,
  `rs2_4` text NOT NULL,
  `rs2_5` text NOT NULL,
  `rs2_6` text NOT NULL,
  `rs3_1` text NOT NULL,
  `rs3_2` text NOT NULL,
  `rs3_3` text NOT NULL,
  `rs3_4` text NOT NULL,
  `rs3_5` text NOT NULL,
  `rs3_6` text NOT NULL,
  `rs3_7` text NOT NULL,
  `rs3_8` text NOT NULL,
  `rs3_9` text NOT NULL,
  `rs3_10` text NOT NULL,
  `re1_1` text NOT NULL,
  `re1_2` text NOT NULL,
  `re1_3` text NOT NULL,
  `re1_4` text NOT NULL,
  `re1_5` text NOT NULL,
  `re2_1` text NOT NULL,
  `re2_2` text NOT NULL,
  `re2_3` text NOT NULL,
  `re2_4` text NOT NULL,
  `re2_5` text NOT NULL,
  `re2_6` text NOT NULL,
  `re3_1` text NOT NULL,
  `re3_2` text NOT NULL,
  `re3_3` text NOT NULL,
  `re3_4` text NOT NULL,
  `re3_5` text NOT NULL,
  `re3_6` text NOT NULL,
  `re3_7` text NOT NULL,
  `re3_8` text NOT NULL,
  `re3_9` text NOT NULL,
  `re3_10` text NOT NULL,
  `or1_1` text NOT NULL,
  `or1_2` text NOT NULL,
  `or1_3` text NOT NULL,
  `or1_4` text NOT NULL,
  `or1_5` text NOT NULL,
  `or2_1` text NOT NULL,
  `or2_2` text NOT NULL,
  `or2_3` text NOT NULL,
  `or2_4` text NOT NULL,
  `or2_5` text NOT NULL,
  `or2_6` text NOT NULL,
  `or3_1` text NOT NULL,
  `or3_2` text NOT NULL,
  `or3_3` text NOT NULL,
  `or3_4` text NOT NULL,
  `or3_5` text NOT NULL,
  `or3_6` text NOT NULL,
  `or3_7` text NOT NULL,
  `or3_8` text NOT NULL,
  `or3_9` text NOT NULL,
  `or3_10` text NOT NULL,
  `insert_date` datetime NOT NULL,
  `budget_year` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=625 ;

