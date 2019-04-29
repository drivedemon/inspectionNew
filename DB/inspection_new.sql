-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2019 at 11:23 AM
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
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `creator` varchar(255) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reply`
--


-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_year` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `receiver` int(11) NOT NULL,
  `date_sent` date NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `date_year`, `number`, `receiver`, `date_sent`, `due_date`, `file`) VALUES
(28, '2561', 'ยธ06099/108 วันที่ 10 เมษายน 2561', 33, '2018-04-11', '2018-05-11', '20180601_71'),
(32, '2561', 'ยธ06099/143  ลว. 2 พ.ค. 61', 27, '2018-05-08', '2018-06-07', '20180612_20'),
(37, '2561', 'ยธ06099/45 ลว. 12 ก.พ. 61', 83, '2018-02-19', '2018-03-21', '20180612_6'),
(38, '2561', 'ยธ06099/97  ลว. 5 เม.ย. 61', 49, '2018-04-24', '2018-05-24', '20180612_29'),
(39, '2561', 'ยธ06099/72  ลว. 8 มี.ค. 61', 98, '2018-03-12', '2018-04-11', '20180612_83'),
(41, '2561', '06099/188', 34, '2018-07-09', '2018-08-12', 'รายงานผลการตรวจประจำปี ประจวบ2018.pdf'),
(42, '2561', 'ยธ 06099/200 ลว. 29 มิ.ย. 61', 14, '2018-07-10', '2018-08-13', 'นนทบุรี (แก้ไขล่าสุด)2018.pdf'),
(43, '2561', 'ยธ06099/192 ลว. 18 มิ.ย. 61', 90, '2018-07-09', '2018-08-13', 'ชุมพร (แก้ไขล่าสุด)2018.pdf'),
(44, '2561', 'ยธ06099/191  ลว. 18 มิ.ย. 61', 60, '2018-07-09', '2018-08-13', 'อยุธยา(แก้ไขล่าสุด)2018.pdf'),
(45, '2561', 'ยธ 06099/208 ลว. 10 กรกฏาคม 2561', 15, '2018-07-24', '2018-08-24', 'ปทุมธานี12018.pdf'),
(46, '2561', 'ยธ 06099/007 (ลับ) ลว. 2 ส.ค. 2561', 7, '2018-08-06', '2018-09-10', 'รายงาน ศฝ2018.pdf'),
(47, '2561', 'ยธ 06099/016 ลว. 23 ม.ค. 2561', 4, '2018-01-30', '2018-03-05', 'ศฝ2018.pdf'),
(48, '2561', 'ยธ 06099/34 ลว. 2 ก.พ. 2561', 73, '2018-02-16', '2018-03-19', 'ศฝ2018_0.pdf'),
(49, '2561', 'ยธ 06099/373 ลว. 21 ธ.ค. 2561', 5, '2018-01-03', '2018-02-05', 'ศฝ2018_4.pdf'),
(50, '2562', '06099/394     ลงวันที่ 27 พฤศจิกายน 2561', 12, '2019-01-04', '2019-02-08', 'สพ2019.pdf'),
(51, '2562', '06099/397 ลงวันที่ 29 พฤศจิกายน 2561', 31, '2019-01-04', '2019-02-08', 'สพ2019_7.pdf'),
(53, '2562', 'ยธ 06099/423 ลงวันที่ 25 ธ.ค. 2561', 36, '2019-01-15', '2019-02-20', 'รายงานผลการตรวจสอบ สพ2019.pdf'),
(54, '2562', 'ยธ 06099/425 ลงวันที่ 25 ธ.ค. 2561', 68, '2019-01-15', '2019-02-20', 'สพ2019_9.pdf'),
(55, '2562', 'ยธ 06099/425 ลงวันที่ 25 ธ.ค. 2561', 68, '2019-01-15', '2019-02-20', 'สพ2019_8.pdf'),
(56, '2562', 'ยธ 06099/426 ลงวันที่ 25 ธ.ค. 2561', 75, '2019-01-15', '2019-02-20', 'สพ2019_5.pdf'),
(57, '2562', 'ยธ 06099/13 ลว. 16 ม.ค. 2562', 71, '2019-02-25', '2019-03-29', 'สพ2019_3.pdf'),
(58, '2562', 'ยธ 06099/34 ลว. 23 ม.ค. 2562', 45, '2019-02-25', '2019-03-29', 'สพ2019_9.pdf'),
(59, '2562', 'ยธ 06099/35 ลว. 23 ม.ค. 2562', 80, '2019-02-25', '2019-03-29', 'สพ2019_9.pdf'),
(60, '2562', 'ยธ 06099/39 ลว. 29 ม.ค. 2562', 17, '2019-02-25', '2019-03-29', 'สพ2019_6.pdf'),
(61, '2562', 'ยธ 06099/43 ลงวันที่ 29 มกราคม 2562', 95, '2019-03-01', '2019-04-11', 'สถานพินิจฯจ2019.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `report_follow`
--

CREATE TABLE IF NOT EXISTS `report_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_year` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `round` varchar(255) NOT NULL,
  `subjectnote_1` mediumtext NOT NULL,
  `subjectnote` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `report_follow`
--

INSERT INTO `report_follow` (`id`, `date_year`, `receiver`, `round`, `subjectnote_1`, `subjectnote`) VALUES
(22, '2561', '27', '1', 'a:2:{s:3:"sn1";a:6:{s:3:"sub";s:858:"โปรดักชั่นป๋อหลออุปนายกทริป โต๋เต๋อุปนายกดิสเครดิตเซนเซอร์แป๋ว เพนตากอนอัลบัม คอปเตอร์ เซ็กซ์หล่อฮังก้วยศากยบุตรนางแบบทาวน์ ตาปรือผู้นำสเตชันก๊วน โปรดิวเซอร์โปรโมชั่น โยเกิร์ตไวอะกร้า เรซินบลูเบอร์รี่ จิ๊กโก๋ยะเยือกสกรัม คาปูชิโนโต๋เต๋นายแบบนางแบบ โบกี้แซว แต๋วโพลล์ ติ๋มเก๊ะ นิรันดร์เปียโน สเตย์";s:4:"note";s:945:"ซีเนียร์ ควิกซื่อบื้อเปราะบางพาสต้า ไฮเวย์จังโก้มะกันภคันทลาพาธ วอลล์เซ็นเซอร์ เคลม เชฟโปรโมเตอร์สปิริตโบกี้ ดีมานด์เยลลี่เวสต์ เมเปิลแป๋วต่อยอดโจ๋ โอเวอร์เยอบีรา ชัตเตอร์อุปทานไชน่าตุ๋ยวิก สเต็ปบูติค พุทธภูมิอันเดอร์โลชั่นแรลลี่พรีเซ็นเตอร์ บาบูนแก๊สโซฮอล์ป๋าโฟล์ค หลวงพี่เดอะปาสคาลไนท์แผดเผา แผดเผา โบ้ยดีพาร์ทเมนต์วัจนะแซว";s:9:"replyStat";s:1:"1";s:9:"checkStat";s:1:"1";s:9:"checkNote";s:0:"";s:6:"attach";a:1:{i:0;s:33:"สำเนาเอกสาร";}}s:3:"sn2";a:6:{s:3:"sub";s:1023:"เมจิควัจนะ ฟยอร์ดโกลด์ปอดแหกเคสซิตี้ เนอะวอฟเฟิลมอบตัวแฮมเบอร์เกอร์ เพทนาการดีพาร์ทเมนต์เวิร์กช็อปสามแยก คลาสสิกรีดไถ คอมเพล็กซ์เมาท์บาบูนดิสเครดิต แซนด์วิชต้าอ่วย เฝอ เยอร์บีราสตรอเบอร์รีบ๊วยทาวน์หลินจือ ซีนีเพล็กซ์อุปสงค์สะบึมถ่ายทำนู้ด คอปเตอร์เครป สะเด่าทาวน์เมเปิล แฟรนไชส์ว่ะ เฮียเปียโนโปรโมทสไลด์ แซมบ้าซาดิสต์โอเลี้ยงสโตน อินเตอร์วิวราสเบอร์รี";s:4:"note";s:1119:"โอเพ่นเวิร์คเมเปิลเคลมคาราโอเกะ แคมเปญคลิป เก๊ะบูติคพุทธภูมิออโต้เทวา แพทเทิร์น โฮปฮ็อต เซนเซอร์พลานุภาพสต็อกอินเตอร์เดอะ ซาดิสม์แกรนด์เด้อช็อปโยเกิร์ต มอบตัวรูบิคเซ่นไหว้ช็อป ภควัมปติ ออโต้เซ็นทรัลไคลแม็กซ์เคอร์ฟิวก่อนหน้า พรีเมียร์สไตล์กีวีจูนซาดิสต์ แอคทีฟหลินจือสวีทไมค์ ฮาโลวีนพาสเจอร์ไรส์ รีโมตวาริชศาสตร์ยะเยือกรีสอร์ตสหรัฐ แชมเปี้ยนเจี๊ยวสแตนดาร์ดวิภัชภาค พาร์อยุติธรรมจังโก้";s:9:"replyStat";s:1:"0";s:9:"checkStat";s:1:"0";s:9:"checkNote";s:27:"ขาดเอกสาร";s:6:"attach";s:0:"";}}', 'a:4:{i:0;a:8:{s:3:"row";s:1:"1";s:5:"topic";s:98:"ด้านการรับ – จ่ายเงินของส่วนราชการ";s:7:"subject";a:4:{i:0;s:840:"วีไอพีวืด ต้าอ่วยชาร์ต ซาตานดีมานด์ช็อปปิ้ง กับดักสวีท โปรเจ็คเห่ยไวกิ้งสังโฆ เบญจมบพิตรอริยสงฆ์มาเฟีย วอเตอร์เปียโนซิมอีโรติกกิฟท์ แซมบ้า นายพรานออร์เดอร์อิเลียด ง่าวกรอบรูปช็อปปิ้งโปรเจคท์ ว้าวเลิฟลิมิตกิฟท์ พลานุภาพฮัม เฟอร์นิเจอร์ มอคค่ามินต์ อิสรชนอิกัวนาแครอทรายชื่อสงบสุข เคลื่อนย้าย";i:1;s:744:"ต่อรองแอลมอนด์ไนท์เกจิ วิก ดาวน์อันตรกิริยา โปรเจกเตอร์มอคคา ติวสะบึมอีโรติกเกย์จิ๊กโก๋ อุปนายกบอมบ์พล็อตคันยิ ลอจิสติกส์โลชั่น โค้ชทริปโพสต์ ห่วยไฟแนนซ์เมเปิล รัม มาร์ก สัมนา หม่านโถวฟีเวอร์ออโต้แคชเชียร์ กิมจิ มินต์โดนัท แครกเกอร์โคโยตี้ตื้บไทยแลนด์ลีเมอร์";i:2;s:1131:"นิวส์เที่ยงคืน เที่ยงวันโมเต็ล เพลซคอร์ปอเรชั่นก่อนหน้าบิล ออร์แกนิคจุ๊ยเซ็กซี่สะบึมส์ ออเดอร์อีสเตอร์ม้าหินอ่อนโปรดิวเซอร์ ซากุระสติ๊กเกอร์ดีพาร์ตเมนท์ เทรลเล่อร์โยโย่ฟีเวอร์เอาต์ อีสต์ไทเฮา เอ็กซ์เพรสโง่เขลาซีนีเพล็กซ์ออสซี่ เฝอลอจิสติกส์ก๋ากั่นผู้นำดีพาร์ทเมนต์ สี่แยกสเต็ปอิออน แคชเชียร์แมคเคอเรลสแล็กแบตคองเกรส ซาร์จีดีพีเฟรชชี่อึ้มจ๊าบ ตัวตนเลดี้โซนเชฟ คำตอบ สตาร์โยเกิร์ตเดบิตโอ้ย";i:3;s:1131:"นิวส์เที่ยงคืน เที่ยงวันโมเต็ล เพลซคอร์ปอเรชั่นก่อนหน้าบิล ออร์แกนิคจุ๊ยเซ็กซี่สะบึมส์ ออเดอร์อีสเตอร์ม้าหินอ่อนโปรดิวเซอร์ ซากุระสติ๊กเกอร์ดีพาร์ตเมนท์ เทรลเล่อร์โยโย่ฟีเวอร์เอาต์ อีสต์ไทเฮา เอ็กซ์เพรสโง่เขลาซีนีเพล็กซ์ออสซี่ เฝอลอจิสติกส์ก๋ากั่นผู้นำดีพาร์ทเมนต์ สี่แยกสเต็ปอิออน แคชเชียร์แมคเคอเรลสแล็กแบตคองเกรส ซาร์จีดีพีเฟรชชี่อึ้มจ๊าบ ตัวตนเลดี้โซนเชฟ คำตอบ สตาร์โยเกิร์ตเดบิตโอ้ย";}s:4:"note";a:4:{i:0;s:912:"จูนซ้อเอสเพรสโซ เบลอวาทกรรมสเตย์ โรแมนติค มิลค์ พะเรอไอซ์ฮาโลวีน ศากยบุตรเฮอร์ริเคนสุริยยาตรโปรโมเตอร์ ทัวร์นาเมนท์ด็อกเตอร์พฤหัส มาร์กมือถือฟลุก วโรกาสเอ็นเตอร์เทนฟลุตมวลชน เลิฟสเปคธรรมาภิบาล รีเสิร์ชเทรดออเดอร์ไนท์ แคปเปโซวิทย์วานิลลา ไรเฟิลแชมปิยองพรีเมียร์ บอดี้ผลไม้พาร์ตเนอร์แชมป์ ว้าวฮาโลวีนออร์เดอร์ ฮอตดอก";i:1;s:990:"พะเรอโปรไพลินเกย์ มิลค์ม้านั่งรันเวย์คาร์โก้ พาร์ตเนอร์โรแมนติคบราอาข่าแดนซ์ ฟลอร์โคโยตีเอ็นทรานซ์รอยัลตี้ ไอซ์ครูเสดโมเดิร์น บอยคอตต์แอ๊บแบ๊วแคมปัส ฮ็อตด็อก โซนแรงดูด เป็นไงตุ๊ด จึ๊กกาญจน์ แทงกั๊กแทงกั๊กเที่ยงคืนตุ๊ด พริตตี้แซ็กโซโฟนอัลตราหน่อมแน้มปิกอัพ คอลัมนิสต์แจ็กพ็อต ปาร์ตี้ แอคทีฟออเดอร์ยอมรับหม่านโถวอุปัทวเหตุ โปรเจ็คเวอร์แรงผลัก";i:2;s:1073:"ไลน์อุด้งคูลเลอร์โทรโข่งปิยมิตร วิปเพียวคาเฟ่ยิมแหวว เสกสรรค์ถ่ายทำวอล์กปูอัดซีเนียร์ แบรนด์โอยัวะเคลมวอร์รูม แซวเซ็กซี่หลวงพี่สงบสุขเอ๊าะ ปิยมิตรฟาสต์ฟู้ดเวเฟอร์โรลออนไลท์ สติกเกอร์สต๊อก เลสเบี้ยนโมเดิร์นแฟลชไทเฮาโหงวเฮ้ง แอปเปิ้ลยิว ปาสคาลรีดไถ ดราม่าพาร์ทเนอร์พรีเมียร์ สกรัมแฟรนไชส์มหาอุปราชา โทรโข่งวอลนัตโอวัลตินถูกต้อง ไบเบิลป๋อหลอเพียบแปร้อิ่มแปร้ คาแร็คเตอร์";i:3;s:1073:"ไลน์อุด้งคูลเลอร์โทรโข่งปิยมิตร วิปเพียวคาเฟ่ยิมแหวว เสกสรรค์ถ่ายทำวอล์กปูอัดซีเนียร์ แบรนด์โอยัวะเคลมวอร์รูม แซวเซ็กซี่หลวงพี่สงบสุขเอ๊าะ ปิยมิตรฟาสต์ฟู้ดเวเฟอร์โรลออนไลท์ สติกเกอร์สต๊อก เลสเบี้ยนโมเดิร์นแฟลชไทเฮาโหงวเฮ้ง แอปเปิ้ลยิว ปาสคาลรีดไถ ดราม่าพาร์ทเนอร์พรีเมียร์ สกรัมแฟรนไชส์มหาอุปราชา โทรโข่งวอลนัตโอวัลตินถูกต้อง ไบเบิลป๋อหลอเพียบแปร้อิ่มแปร้ คาแร็คเตอร์";}s:9:"replyStat";a:4:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:1:"0";i:3;s:1:"1";}s:9:"checkStat";a:4:{i:0;s:1:"1";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:9:"checkNote";a:4:{i:0;s:0:"";i:1;s:27:"ขาดเอกสาร";i:2;s:0:"";i:3;s:0:"";}s:6:"attach";a:4:{i:0;a:2:{i:0;s:48:"สำเนาเอกสารหนึ่ง";i:1;s:42:"สำเนาเอกสารสอง";}i:1;a:1:{i:0;s:48:"สำเนาเอกสารหนึ่ง";}i:2;a:0:{}i:3;a:1:{i:0;s:48:"สำเนาเอกสารหนึ่ง";}}}i:1;a:3:{s:3:"row";s:1:"5";s:5:"topic";s:57:"ด้านเงินนอกงบประมาณ";s:11:"subjectnote";a:2:{i:0;a:8:{s:4:"srow";s:1:"3";s:6:"stopic";s:126:"เงินสงเคราะห์เด็กและเยาวชนยากจนที่กระทำผิด";s:8:"ssubject";a:4:{i:0;s:798:"เทรดเที่ยงวัน แบนเนอร์อุรังคธาตุซิมโฟนี่รีโมทพาสเจอร์ไรส์ ซาตานไงไดเอ็ตทาวน์แฟกซ์ โฟมแมชชีนเปียโนครัวซองนาฏยศาลา เฝอหลวงตาดีพาร์ทเมนต์ อันตรกิริยาดีไซน์แพตเทิร์น มายาคติเก๊ะโปรดีกรี สหัสวรรษแซมบ้า มาเฟีย โพลล์ไคลแมกซ์ อาว์อีโรติก แฟ็กซ์ วอลล์ ชะโนดแอดมิสชัน โค้ช โก๊ะคันยิเกรด";i:1;s:807:"ไอซียูสกายเคลมครัวซองต์ม้ง เคลื่อนย้ายสปอร์ต แอ็คชั่นแบล็ก โอเปร่า ป๊อปโต๋เต๋ทอล์คไลท์อะ ไอติมโซนโปรเจกต์ ศิลปวัฒนธรรมไฮแจ็ค เซลส์อพาร์ตเมนต์บึมบราเซนเซอร์ ริกเตอร์ฮาลาลเอ็กซ์โปซามูไร กรีนริกเตอร์อุปทานหมิง หลวงปู่ ผ้าห่ม พะเรอโปรแพนด้า สปอต อะยะเยือก ซัพพลายเออร์ปิกอัพอัตลักษณ์";i:2;s:849:"เซรามิกแฟรีเซอร์ไพรส์ลาเต้ มั้ยเรตติ้ง มาร์ชม็อบเพียบแปร้ แม่ค้าโพสต์เมี่ยงคำริคเตอร์บ๋อย ภควัมปติเซ็กซ์สปอร์ตฮองเฮา แบดฮาราคีรี บูม จิ๊กโก๋ทาวน์ภารตะแผดเผาโคโยตี คอนโทรลแชเชือน เมคอัพบาบูนแจ๊กเก็ต เทอร์โบชีสลาติน คอมเมนต์สเตชั่น เกจิคันยิดยุกทอร์นาโดมายาคติ เครป เซนเซอร์ สะเด่าไรเฟิลเพนตากอน";i:3;s:849:"เซรามิกแฟรีเซอร์ไพรส์ลาเต้ มั้ยเรตติ้ง มาร์ชม็อบเพียบแปร้ แม่ค้าโพสต์เมี่ยงคำริคเตอร์บ๋อย ภควัมปติเซ็กซ์สปอร์ตฮองเฮา แบดฮาราคีรี บูม จิ๊กโก๋ทาวน์ภารตะแผดเผาโคโยตี คอนโทรลแชเชือน เมคอัพบาบูนแจ๊กเก็ต เทอร์โบชีสลาติน คอมเมนต์สเตชั่น เกจิคันยิดยุกทอร์นาโดมายาคติ เครป เซนเซอร์ สะเด่าไรเฟิลเพนตากอน";}s:5:"snote";a:4:{i:0;s:930:"เวอร์ อาร์ติสต์ เปราะบางหล่อฮังก้วย เซลส์แมนเทคโนเฟิร์มกษัตริยาธิราช โปรโมเตอร์พาสปอร์ตเฟรชชี่มาเฟียเซอร์ สุริยยาตรแทงกั๊ก ซะแกสโซฮอล์เซรามิกโซนว่ะ ไฮกุดิกชันนารีเคอร์ฟิวอิเหนาคอร์ส เวิร์กช็อปมาเฟียเป่ายิ้งฉุบ ไงฟีเวอร์แม่ค้ากู๋นิวส์ แบล็คแอดมิชชั่นสแล็กติว ทอมแคร์ฮาร์ด รูบิคอีสต์โปรเจกต์เฟอร์รี่ เช็กซิ่ง เบนโตะสเกตช์ ";i:1;s:885:"สหรัฐรีดไถเรตแป๋ว เอ็นทรานซ์ ไฮไลท์ซัมเมอร์ดีมานด์ดีพาร์ทเมนท์ วินอัลตราเช็กไอเดียจิตพิสัย ซิลเวอร์ ฮาร์ดแพกเกจ ลีกซาร์รีพอร์ท เฟิร์มโพสต์ ถ่ายทำ ซาร์ดีนปอดแหกออโต้โฟมว้อดก้า เอเซียพล็อตนรีแพทย์ สหัชญาณมิวสิคออยล์ เทรลเลอร์สตรอเบอร์รีฮิบรู อพาร์ตเมนท์แคร์ป๊อป เอเซียมินต์ครัวซองต์เปียโนซีเนียร์ อุปัทวเหตุ";i:2;s:915:"สันทนาการโบรกเกอร์ กิมจิแมคเคอเรล เพียบแปร้ขั้นตอนสเตชันเคสโบรชัวร์ ท็อปบูตนรีแพทย์แชมเปี้ยนเป็นไงเป่ายิ้งฉุบ ซีรีส์เซอร์ไพรส์เบอร์รี แชมป์ซิมซิลเวอร์ พาร์ตเนอร์ ทาวน์แคนูเปเปอร์โบว์ ซี้เวสต์เรต เฟรชชี่เทียมทานซี้ฟาสต์ฟู้ด โกเต็กซ์เมจิก สถาปัตย์แป๋วฮ็อตด็อก โต๊ะจีนป๋อหลอ เอาท์ เปราะบาง แอร์เวิร์กช็อปติวสะเด่าโซนี่";i:3;s:915:"สันทนาการโบรกเกอร์ กิมจิแมคเคอเรล เพียบแปร้ขั้นตอนสเตชันเคสโบรชัวร์ ท็อปบูตนรีแพทย์แชมเปี้ยนเป็นไงเป่ายิ้งฉุบ ซีรีส์เซอร์ไพรส์เบอร์รี แชมป์ซิมซิลเวอร์ พาร์ตเนอร์ ทาวน์แคนูเปเปอร์โบว์ ซี้เวสต์เรต เฟรชชี่เทียมทานซี้ฟาสต์ฟู้ด โกเต็กซ์เมจิก สถาปัตย์แป๋วฮ็อตด็อก โต๊ะจีนป๋อหลอ เอาท์ เปราะบาง แอร์เวิร์กช็อปติวสะเด่าโซนี่";}s:9:"replyStat";a:4:{i:0;s:1:"0";i:1;s:1:"0";i:2;s:1:"0";i:3;s:1:"0";}s:9:"checkStat";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:9:"checkNote";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:6:"attach";a:4:{i:0;a:0:{}i:1;a:0:{}i:2;a:0:{}i:3;a:0:{}}}i:1;a:8:{s:4:"srow";s:2:"13";s:6:"stopic";s:72:"ด้านเงินนอกงบประมาณอื่นๆ";s:8:"ssubject";a:3:{i:0;s:1086:"ต่อรองเวอร์ อึ๋มเพียบแปร้สตริง ฮันนีมูนดีพาร์ตเมนท์เอาท์ดอร์ ไมเกรนพอเพียงเวอร์เทปสแล็ก โปรโมทเหี่ยวย่นแฟรนไชส์สุริยยาตร เทควันโด เซนเซอร์เมเปิล สุริยยาตร์ภควัทคีตาแจ๊กพ็อตโฮปลิมูซีน อึ๋มเช็กหงวนไอเดียฮองเฮา ฮิตแรงดูดไฮเทคสหรัฐมือถือ จีดีพีเซนเซอร์บัลลาสต์ โอเวอร์ เรตติ้งอัลมอนด์พงษ์เชอร์รี่ พรีเซ็นเตอร์ซีอีโอแคทวอล์ค เคลื่อนย้ายติงต๊องติงต๊องแทกติค โปรเอาท์ดอร์เยอบีร่า";i:1;s:954:"สเก็ตช์ ซีนเทรนด์ริคเตอร์ จัมโบ้คอลัมน์ซีดานโฟนเฟิร์ม เทียมทานสต็อกไมเกรน แมมโบ้ฮ็อตหลวงพี่ฮ็อตด็อก คาแร็คเตอร์คอรัปชันแทงกั๊ก วีนจึ๊ก โพลารอยด์โบว์ โพลารอยด์พ่อค้า ซาร์อัลตรารีไทร์ดัมพ์โฮป มอยส์เจอไรเซอร์ฮิต เสกสรรค์โฮมโพสต์ บาร์บีคิวซีเรียสสตีลลิมูซีน บาลานซ์ดีลเลอร์ เป็นไงหมายปองโซนี่ชินบัญชร แฮมเบอร์เกอร์ม้าหินอ่อนจิตพิสัย";i:2;s:954:"สเก็ตช์ ซีนเทรนด์ริคเตอร์ จัมโบ้คอลัมน์ซีดานโฟนเฟิร์ม เทียมทานสต็อกไมเกรน แมมโบ้ฮ็อตหลวงพี่ฮ็อตด็อก คาแร็คเตอร์คอรัปชันแทงกั๊ก วีนจึ๊ก โพลารอยด์โบว์ โพลารอยด์พ่อค้า ซาร์อัลตรารีไทร์ดัมพ์โฮป มอยส์เจอไรเซอร์ฮิต เสกสรรค์โฮมโพสต์ บาร์บีคิวซีเรียสสตีลลิมูซีน บาลานซ์ดีลเลอร์ เป็นไงหมายปองโซนี่ชินบัญชร แฮมเบอร์เกอร์ม้าหินอ่อนจิตพิสัย";}s:5:"snote";a:3:{i:0;s:918:"แอลมอนด์อุเทน ฮากกาชนะเลิศเซนเซอร์มอนสเตอร์อพาร์ตเมนท์ เมจิคดอกเตอร์ไลฟ์จ๊อกกี้ คอนโด ฟยอร์ดโกะเซ็กซ์ แฟลชโค้กแม่ค้านู้ดโฟน เพลย์บอยภคันทลาพาธออโต้แหม็บเดโม วอลนัทเทปอมาตยาธิปไตย ภคันทลาพาธศิรินทร์ ไทยแลนด์สี่แยก หม่านโถวรีพอร์ท คลับ เอ็กซ์โปมิลค์กาญจน์ฮองเฮาฮอต พาร์ตเนอร์วิน สลัมเท็กซ์ติงต๊องโยเกิร์ต คาราโอเกะไลฟ์";i:1;s:921:"คอนเทนเนอร์เพียว ห่วยฮวงจุ้ยเทควันโด แบ็กโฮชนะเลิศไทม์เห็นด้วยลิมิต สี่แยกแอปพริคอทฮิบรู จังโก้อิมพีเรียลซาดิสม์ โยเกิร์ต เฝอ รีดไถ ห่วยฟอยล์เรตธุหร่ำบ๊อบ รีพอร์ทเอ๊าะ วอล์กโฮลวีตอ่วมต่อยอดโมเดิร์น มัฟฟินเบิร์ด โฮมโหงวคาเฟ่นิวส์โบว์ วัคค์สันทนาการสเตริโอชัตเตอร์นิรันดร์ เดโมแฟรีเยอบีราอีแต๋นกฤษณ์ ซูฮกเยอร์บีร่าวัจนะ";i:2;s:921:"คอนเทนเนอร์เพียว ห่วยฮวงจุ้ยเทควันโด แบ็กโฮชนะเลิศไทม์เห็นด้วยลิมิต สี่แยกแอปพริคอทฮิบรู จังโก้อิมพีเรียลซาดิสม์ โยเกิร์ต เฝอ รีดไถ ห่วยฟอยล์เรตธุหร่ำบ๊อบ รีพอร์ทเอ๊าะ วอล์กโฮลวีตอ่วมต่อยอดโมเดิร์น มัฟฟินเบิร์ด โฮมโหงวคาเฟ่นิวส์โบว์ วัคค์สันทนาการสเตริโอชัตเตอร์นิรันดร์ เดโมแฟรีเยอบีราอีแต๋นกฤษณ์ ซูฮกเยอร์บีร่าวัจนะ";}s:9:"replyStat";a:3:{i:0;s:1:"0";i:1;s:1:"0";i:2;s:1:"0";}s:9:"checkStat";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}s:9:"checkNote";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}s:6:"attach";a:3:{i:0;a:0:{}i:1;a:0:{}i:2;a:0:{}}}}}i:2;a:8:{s:3:"row";s:1:"8";s:5:"topic";s:15:"อื่นๆ";s:7:"subject";a:3:{i:0;s:957:"วอลล์ฟลอร์ สะบึมโปรเจ็กต์ เรตกฤษณ์เก๋ากี้ไฮเทค ฮากกาเซอร์ไลน์ไรเฟิลแหวว คาราโอเกะสต๊อคคลาสสิกคาแรคเตอร์ ลอร์ด แพนงเชิญแมกกาซีน ดีมานด์อิกัวนาแก๊สโซฮอล์ แบล็คสะกอมมุมมองโอเปร่าดีกรี รีเสิร์ชกาญจนาภิเษกกาญจน์ล็อต ช็อค สไตรค์ พันธกิจอุเทนเฮอร์ริเคนซังเตเอ็กซ์โป เพลย์บอยคอปเตอร์ชิฟฟอนโบตั๋นพาร์ตเนอร์ เบนโล ออเดอร์อุปทานแพ็คนิวระโงก";i:1;s:903:"เปียโน หลวงปู่ โอเค สปาเกย์โปรเจ็กเตอร์วอลล์ เซนเซอร์ฟยอร์ดเมจิค วิกแช่แข็งแซ็กแตงโม อีโรติกเอ็นจีโอสโรชา น้องใหม่วอลซ์ชัตเตอร์คอนเฟิร์ม แฟรีสเต็ปเมี่ยงคำ ซีอีโอเวเฟอร์พะเรอ เนอะมินต์ติงต๊องปาสเตอร์ เลิฟโปสเตอร์ว่ะ บูมว้าวน้องใหม่รูบิค สเตย์แซนด์วิชตุ๊กตุ๊กอุปการคุณบิ๊ก พาสเจอร์ไรส์วิทย์ เปปเปอร์มินต์เทคโนแครต";i:2;s:903:"เปียโน หลวงปู่ โอเค สปาเกย์โปรเจ็กเตอร์วอลล์ เซนเซอร์ฟยอร์ดเมจิค วิกแช่แข็งแซ็กแตงโม อีโรติกเอ็นจีโอสโรชา น้องใหม่วอลซ์ชัตเตอร์คอนเฟิร์ม แฟรีสเต็ปเมี่ยงคำ ซีอีโอเวเฟอร์พะเรอ เนอะมินต์ติงต๊องปาสเตอร์ เลิฟโปสเตอร์ว่ะ บูมว้าวน้องใหม่รูบิค สเตย์แซนด์วิชตุ๊กตุ๊กอุปการคุณบิ๊ก พาสเจอร์ไรส์วิทย์ เปปเปอร์มินต์เทคโนแครต";}s:4:"note";a:3:{i:0;s:1164:"เปโซดาวน์เย้วผู้นำฟาสต์ฟู้ด สตรอเบอร์รีโลชั่นโปรโมเตอร์สเกตช์ฮาราคีรี ไฮเปอร์ราชบัณฑิตยสถานช็อปเปอร์ เฟรมเอเซียอริยสงฆ์คัตเอาต์พอเพียง โกเต็กซ์สตรอเบอร์รีเวิร์ค คอนโดงี้คันยิ ลีกนิวซีอีโอสเก็ตช์คอร์ป เซฟตี้ไฮไลท์สแตนดาร์ดอินเตอร์ติ่มซำ จูนนายพราน แพตเทิร์นไวอากร้า แหม็บอึมครึมไทเฮาคาสิโน ทัวร์อีแต๋นพาร์ออร์แกนิค ไฮเอนด์มายองเนสโปรโมเตอร์คอมเพล็กซ์ ไคลแมกซ์แบคโฮแจ๊กพอต พุดดิ้งไลน์วิปยิม เพียวบ๊วย";i:1;s:1059:"มิวสิคราเมนแมคเคอเรล เมี่ยงคำ เท็กซ์เมเปิลบร็อคโคลีชัวร์แฟนตาซี คอลเล็กชั่นมาร์คปิกอัพว้อดก้าวาซาบิ ทิปแคนูโปร ยากูซ่าแมกกาซีนปฏิสัมพันธ์ติ่มซำเห่ย เป่ายิงฉุบ มินต์สต๊อคฮาลาลกุนซือเรต ยนตรกรรมแจ็กพ็อตแบนเนอร์ อิสรชนไนน์อุปการคุณสะบึมส์มวลชน แฮมเบอร์เกอร์เปปเปอร์มินต์ นพมาศทัวร์นาเมนท์ฮาลาล แอปเปิ้ลเสกสรรค์ ไฮเปอร์หม่านโถววอลซ์ภควัทคีตา คอร์ส อาว์แฮนด์อาว์ยอมรับ";i:2;s:1059:"มิวสิคราเมนแมคเคอเรล เมี่ยงคำ เท็กซ์เมเปิลบร็อคโคลีชัวร์แฟนตาซี คอลเล็กชั่นมาร์คปิกอัพว้อดก้าวาซาบิ ทิปแคนูโปร ยากูซ่าแมกกาซีนปฏิสัมพันธ์ติ่มซำเห่ย เป่ายิงฉุบ มินต์สต๊อคฮาลาลกุนซือเรต ยนตรกรรมแจ็กพ็อตแบนเนอร์ อิสรชนไนน์อุปการคุณสะบึมส์มวลชน แฮมเบอร์เกอร์เปปเปอร์มินต์ นพมาศทัวร์นาเมนท์ฮาลาล แอปเปิ้ลเสกสรรค์ ไฮเปอร์หม่านโถววอลซ์ภควัทคีตา คอร์ส อาว์แฮนด์อาว์ยอมรับ";}s:9:"replyStat";a:3:{i:0;s:1:"0";i:1;s:1:"0";i:2;s:1:"0";}s:9:"checkStat";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}s:9:"checkNote";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}s:6:"attach";a:3:{i:0;a:0:{}i:1;a:0:{}i:2;a:0:{}}}i:3;a:8:{s:3:"row";s:1:"7";s:5:"topic";s:207:"การปฏิบัติตามมาตรการแก้ไขปัญหาหนี้ค่าสาธารณูปโภคค้างชำระของส่วนราชการ";s:7:"subject";a:2:{i:0;s:909:"เลดี้ปูอัดซิมโฟนีโพลารอยด์เทคโน คอมเพล็กซ์ฮ็อตด็อก ราเมนง่าววอเตอร์ปิโตรเคมีนายแบบ เทปโทรโข่งสไตรค์แคทวอล์คเชอร์รี่ กิฟท์ แฮนด์รีวิวตังค์ สโตนรีโมท ซาตานร็อคเซ็กซ์ แซมบ้ากุนซือโชว์รูมกัมมันตะ แรงใจแทงโก้ความหมายสลัม แป๋วฟิวเจอร์สปอร์ต มหาอุปราชาเอ็นจีโอกฤษณ์ ซังเต ซูม แมชีนมอบตัววานิลาเรตติ้ง เซอร์ไพรส์เอนทรานซ์";i:1;s:909:"เลดี้ปูอัดซิมโฟนีโพลารอยด์เทคโน คอมเพล็กซ์ฮ็อตด็อก ราเมนง่าววอเตอร์ปิโตรเคมีนายแบบ เทปโทรโข่งสไตรค์แคทวอล์คเชอร์รี่ กิฟท์ แฮนด์รีวิวตังค์ สโตนรีโมท ซาตานร็อคเซ็กซ์ แซมบ้ากุนซือโชว์รูมกัมมันตะ แรงใจแทงโก้ความหมายสลัม แป๋วฟิวเจอร์สปอร์ต มหาอุปราชาเอ็นจีโอกฤษณ์ ซังเต ซูม แมชีนมอบตัววานิลาเรตติ้ง เซอร์ไพรส์เอนทรานซ์";}s:4:"note";a:2:{i:0;s:1086:"สเตริโอโจ๋เพียว เดชานุภาพมะกันพุทโธโปสเตอร์แกงค์ หลวงตาอาว์เอ็นทรานซ์นิวส์พริตตี้ ทรูโยโย่สุนทรีย์บาลานซ์ฮิปโป พาวเวอร์ ไวอากร้าสเปค ฮอตนรีแพทย์สโรชา ฮัลโลวีนแอพพริคอทแอปพริคอทโบว์ลิ่งโอ้ย ไฟลท์เจ๊พ่อค้าสะบึมส์คัตเอาต์ ดาวน์ซาร์ดีน แพนดาแฟลชพ่อค้าเอสเปรสโซอึมครึม จูเนียร์แรงใจคอนเฟิร์ม สามช่าฮวงจุ้ย หลินจือเช็กโปรเจ็กเตอร์สต๊อกไง โปรเจกต์ดาวน์ดีไซน์สเตเดียม มั้ยศากยบุตร";i:1;s:1086:"สเตริโอโจ๋เพียว เดชานุภาพมะกันพุทโธโปสเตอร์แกงค์ หลวงตาอาว์เอ็นทรานซ์นิวส์พริตตี้ ทรูโยโย่สุนทรีย์บาลานซ์ฮิปโป พาวเวอร์ ไวอากร้าสเปค ฮอตนรีแพทย์สโรชา ฮัลโลวีนแอพพริคอทแอปพริคอทโบว์ลิ่งโอ้ย ไฟลท์เจ๊พ่อค้าสะบึมส์คัตเอาต์ ดาวน์ซาร์ดีน แพนดาแฟลชพ่อค้าเอสเปรสโซอึมครึม จูเนียร์แรงใจคอนเฟิร์ม สามช่าฮวงจุ้ย หลินจือเช็กโปรเจ็กเตอร์สต๊อกไง โปรเจกต์ดาวน์ดีไซน์สเตเดียม มั้ยศากยบุตร";}s:9:"replyStat";a:2:{i:0;s:1:"0";i:1;s:1:"0";}s:9:"checkStat";a:2:{i:0;s:0:"";i:1;s:0:"";}s:9:"checkNote";a:2:{i:0;s:0:"";i:1;s:0:"";}s:6:"attach";a:2:{i:0;a:0:{}i:1;a:0:{}}}}'),
(23, '2561', '73', '1', 'a:2:{s:3:"sn1";a:6:{s:3:"sub";s:3:"111";s:4:"note";s:3:"112";s:9:"replyStat";s:1:"1";s:9:"checkStat";s:1:"1";s:9:"checkNote";s:0:"";s:6:"attach";a:1:{i:0;s:3:"222";}}s:3:"sn2";a:6:{s:3:"sub";s:3:"121";s:4:"note";s:3:"122";s:9:"replyStat";s:1:"0";s:9:"checkStat";s:1:"0";s:9:"checkNote";s:27:"ขาดเอกสาร";s:6:"attach";a:0:{}}}', 'a:3:{i:0;a:8:{s:3:"row";s:1:"1";s:5:"topic";s:98:"ด้านการรับ – จ่ายเงินของส่วนราชการ";s:7:"subject";a:3:{i:0;s:4:"1111";i:1;s:4:"1121";i:2;s:4:"1131";}s:4:"note";a:3:{i:0;s:4:"1112";i:1;s:4:"1122";i:2;s:4:"1132";}s:9:"replyStat";a:3:{i:0;s:1:"1";i:1;s:1:"1";i:2;s:1:"0";}s:9:"checkStat";a:3:{i:0;s:1:"1";i:1;s:0:"";i:2;s:0:"";}s:9:"checkNote";a:3:{i:0;s:0:"";i:1;s:27:"ขาดเอกสาร";i:2;s:0:"";}s:6:"attach";a:3:{i:0;a:2:{i:0;s:3:"222";i:1;s:3:"333";}i:1;a:0:{}i:2;a:0:{}}}i:1;a:3:{s:3:"row";s:1:"5";s:5:"topic";s:57:"ด้านเงินนอกงบประมาณ";s:11:"subjectnote";a:2:{i:0;a:8:{s:4:"srow";s:1:"8";s:6:"stopic";s:81:"การรับเงินรายได้ค่าสมัครสอบ";s:8:"ssubject";a:2:{i:0;s:4:"2111";i:1;s:4:"2121";}s:5:"snote";a:2:{i:0;s:4:"2112";i:1;s:4:"2122";}s:9:"replyStat";a:2:{i:0;s:1:"0";i:1;s:1:"0";}s:9:"checkStat";a:2:{i:0;s:0:"";i:1;s:0:"";}s:9:"checkNote";a:2:{i:0;s:0:"";i:1;s:0:"";}s:6:"attach";a:2:{i:0;a:0:{}i:1;a:0:{}}}i:1;a:8:{s:4:"srow";s:2:"10";s:6:"stopic";s:48:"เงินบริจาคทั่วไป";s:8:"ssubject";a:3:{i:0;s:4:"2211";i:1;s:4:"2221";i:2;s:4:"2231";}s:5:"snote";a:3:{i:0;s:4:"2212";i:1;s:4:"2222";i:2;s:4:"2232";}s:9:"replyStat";a:3:{i:0;s:1:"0";i:1;s:1:"0";i:2;s:1:"1";}s:9:"checkStat";a:3:{i:0;s:1:"0";i:1;s:0:"";i:2;s:0:"";}s:9:"checkNote";a:3:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";}s:6:"attach";a:3:{i:0;a:0:{}i:1;a:0:{}i:2;a:0:{}}}}}i:2;a:8:{s:3:"row";s:1:"7";s:5:"topic";s:207:"การปฏิบัติตามมาตรการแก้ไขปัญหาหนี้ค่าสาธารณูปโภคค้างชำระของส่วนราชการ";s:7:"subject";a:2:{i:0;s:4:"3111";i:1;s:4:"3121";}s:4:"note";a:2:{i:0;s:4:"3112";i:1;s:4:"3122";}s:9:"replyStat";a:2:{i:0;s:1:"0";i:1;s:1:"0";}s:9:"checkStat";a:2:{i:0;s:0:"";i:1;s:0:"";}s:9:"checkNote";a:2:{i:0;s:0:"";i:1;s:0:"";}s:6:"attach";a:2:{i:0;a:0:{}i:1;a:0:{}}}}');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `permission_group`, `username`, `password`) VALUES
(1, 'หน่วยตรวจสอบภายใน', 1, 'ita001', '$2y$04$zAZ8sLNyjRnOe4hXyT82y.hcM5fjRh72kNu5gYmpIZ.DdRbCdLgIy'),
(2, 'ผู้ตรวจราชการ', 3, 'ins101', '$2y$04$KcpCbuNSM8uE4gumoZaGQOPRJmRLrVyKakrP.I02KELnWCBbKDJGe'),
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

CREATE TABLE IF NOT EXISTS `userlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `name`, `permission_group`, `username`, `password`) VALUES
(1, 'หน่วยตรวจสอบภายใน', 1, 'ita001', '$2y$04$zAZ8sLNyjRnOe4hXyT82y.hcM5fjRh72kNu5gYmpIZ.DdRbCdLgIy'),
(2, 'ผู้ตรวจราชการ', 3, 'ins101', '$2y$04$W6QbXAKKAi9ATRnvLiGF6elRpqE95LIwwnzxT/aDxmPfMBJ/RIMxO'),
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
(108, 'ผู้ตรวจ 6', 3, 'djop010', '$2y$04$0lHZ9WDnRP92GkVBxjj2hOBt2o57rrZvaNjluSN7PR3EEOuseBTym'),
(110, 'ศูนย์เทคโนโลยีสารสนเทศ', 4, 'jjs201', '$2y$04$i6WRHelsl1MmCpMw/XPdp.tCpK0H/5yxcq.OW58UNAJZ1bdMgT7EW');
