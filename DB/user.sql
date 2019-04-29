-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2019 at 03:22 PM
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
