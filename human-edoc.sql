-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2022 at 05:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `human-edoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `memo_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded_on`, `memo_id`, `user_id`) VALUES
(1, 'บันทึกขอส่งโครงการ_แก้ไขโครงการ.docx', '2022-02-22 14:48:07', '0001', '4'),
(2, 'ขอส่งเค้าโครงวิจัย_แก้ไขตามข้อเสนอแนะ.doc', '2022-02-22 14:55:05', '0002', '4'),
(3, '', '2022-02-23 02:27:41', '0003', '1'),
(4, '3. แบบ TOR(60).docx', '2022-02-23 02:29:55', '0003', '1');

-- --------------------------------------------------------

--
-- Table structure for table `files_letter`
--

CREATE TABLE `files_letter` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `letter_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files_letter`
--

INSERT INTO `files_letter` (`id`, `file_name`, `uploaded_on`, `letter_id`, `user_id`) VALUES
(1, 'สังสรรค์_หล้าพันธ์_โครงการหลักยุทธศาสตร์-65-ระบบสารสนเทศเพื่อบริหารจัดการโครงการธนาคารข.pdf', '2022-02-21 04:30:12', '0001', '12'),
(2, '02.1 แผนความเชือมโยง 65-ยุทธศาสตร์ที่ 1 การพัฒนาท้องถิ่น.pdf', '2022-02-21 04:44:35', '0002', '12'),
(3, 'สังสรรค์_หล้าพันธ์_โครงการหลักยุทธศาสตร์-65-ระบบสารสนเทศเพื่อบริหารจัดการโครงการธนาคารข.docx', '2022-02-21 04:52:28', '0003', '12'),
(4, 'ภาพถ่ายหน้าจอ 2565-02-21 เวลา 10.08.56.png', '2022-02-21 07:53:45', '0004', '15'),
(5, '3. แบบ TOR(60).docx', '2022-02-23 02:20:07', '0005', '12'),
(6, 'ขอส่งเค้าโครงวิจัย_แก้ไขตามข้อเสนอแนะ.doc', '2022-02-23 02:33:42', '0006', '12');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` int(10) NOT NULL,
  `letter_id` varchar(10) NOT NULL,
  `letter_date` varchar(100) NOT NULL,
  `letter_time` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `letter_id`, `letter_date`, `letter_time`, `title`, `details`, `name`, `position`) VALUES
(1, '0001', '21 กุมภาพันธ์ 2565', '11:30', 'แจ้งตารางขอเข้านอเทศออนไลน์', 'ดังเอกสารแนบ', 'นางสาวสุนีนารถ พลซา', 'ผู้ปฏิบัติงานบริหาร'),
(2, '0002', '21 กุมภาพันธ์ 2565', '11:44', 'ss', 'ss', 'นางสาวสุนีนารถ พลซา', 'ผู้ปฏิบัติงานบริหาร'),
(3, '0003', '21 กุมภาพันธ์ 2565', '11:52', 'dd', 'dd', 'นางสาวสุนีนารถ พลซา', 'ผู้ปฏิบัติงานบริหาร'),
(4, '0004', '21 กุมภาพันธ์ 2565', '14:53', 'หนังสือแจ้งหน่วยงาน', 'ดด', 'นางสาวจิรวรรณ บุตรเต', 'นักวิชาการเงินและบัญชี'),
(5, '0005', '23 กุมภาพันธ์ 2565', '09:20', 'qa', 'qa', 'นางสาวสุนีนารถ พลซา', 'ผู้ปฏิบัติงานบริหาร'),
(6, '0006', '23 กุมภาพันธ์ 2565', '09:33', 'wwwwww', 'wwwwww', 'นางสาวสุนีนารถ พลซา', 'ผู้ปฏิบัติงานบริหาร');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(4) NOT NULL,
  `field` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `line_token` varchar(255) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `rule` varchar(4) NOT NULL,
  `pass_update` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `field`, `name`, `email`, `pass`, `line_token`, `dep`, `status`, `image`, `rule`, `pass_update`) VALUES
(1, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ผู้ช่วยศาสตราจารย์ ดร.วิชัย พัวรุ่งโรจน์', 'wichai@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', '', 'ภาคมนุษยศาสตร์', '2', 'wichai.jpg', '', '1'),
(2, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ดร.จักรกฤษณ์ พงษ์อินทร์วงศ์', 'Chakrit.pon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคมนุษยศาสตร์', '2', 'Chakrit.jpg', '', '0'),
(3, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ดร.เกรียงศักดิ์ โยธาภักดี', 'kriengsak@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'ภาคมนุษยศาสตร์', '3', 'kriengsak.jpg', '8', '1'),
(4, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'นายสังสรรค์ หล้าพันธ์', 'sunksun.lap@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', 'yV0alRpsJ0x84Twhb0OnV06QvHt9Q52a6ygpeTmNbFL', 'ภาคมนุษยศาสตร์', '2', 'sunksun.jpg', '9', '1'),
(5, 'สาขาวิชาคณิตศาสตร์', 'นายวิสุทธิ์  กิจชัยนุกูล', 'wisut.kit@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคสังคมศาสตร์', '2', 'wisut.jpg', '9', '0'),
(6, 'สาขาวิชาฟิสิกส์', 'ดร.นุวัติ  พิมพะบุตร', 'nuwat.phi@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', '', 'ภาคสังคมศาสตร์', '3', 'nuwat.jpg', '8', '1'),
(7, 'สาขาวิชาชีววิทยา', 'ผู้ช่วยศาสตราจารย์จารุวัลย์  รักษ์มณี', 'lekkykate@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'ภาคสังคมศาสตร์', '9', 'lekkykate.jpg', '99', '1'),
(8, 'สาขาวิชาชีววิทยา', 'ดร.กิตติ  ตันเมืองปัก    ', 'landsnail2015@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคสังคมศาสตร์', '2', 'landsnail2015.jpg', '9', '0'),
(9, 'สาขาวิชาชีววิทยา', 'ดร.ขวัญคณิศร์  อินทรตระกูล         ', 'kwankanit.int@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคสังคมศาสตร์', '2', 'kwankanit.jpg', '', '0'),
(10, 'สาขาวิชาชีววิทยา', 'นางสาวฉันทนา  เคนศรี', 'chantana.khe@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', 'XpkK7HGtM4JJ9sZ32Jj2sOjXTVGrYIrqcNrr5sj80cT', 'ภาคสังคมศาสตร์', '2', 'chantana.jpg', '', '1'),
(11, 'หัวหน้าสำนักงานคณบดี', 'นางสาวบัวบาล จุตะโน', 'thitimap@hotmail.com', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'สำนักงานคณะ', '1', 'thitimap.jpg', '9', '1'),
(12, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวสุนีนารถ พลซา', 'pwetchasit@hotmail.com', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'ภาคมนุษยศาสตร์', '1', 'pwetchasit.jpg', '7', '1'),
(13, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวมยุรี ก้อนคำใหญ่', 'jenjira.nam@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', '', 'ภาคสังคมศาสตร์', '1', 'jenjira.jpg', '7', '1'),
(14, 'ผู้ปฏิบัติงานบริหาร', 'นางวันเพ็ญ บุญทะวงศ์', 'phawinee.inp@lru.ac.th', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'สำนักงานคณะ', '1', 'phawinee.jpg', '8', '1'),
(15, 'นักวิชาการเงินและบัญชี', 'นางสาวจิรวรรณ บุตรเต', 'daw-love53@hotmail.com', 'b59c67bf196a4758191e42f76670ceba', 'eJ2jPq62f5zm0i1dbDGg0NOdGOn5e3VfdSwrnYeXhzw', 'สำนักงานคณะ', '1', 'daw-love53.jpg', '8', '1'),
(16, 'นักวิชาการศึกษา', 'นางสาวศกุลตรา นามวงษ์', 'Passa_23@hotmail.co.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'Passa_23.jpg', '9', '0'),
(17, 'นักวิชาการศึกษา', 'นางสาวปุยฝ้าย อเนกบุณย์', 'paweena.kae@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'paweena.jpg', '6', '0'),
(18, 'นักวิชาการพัสดุ', 'นางสาวภัทร์ชยาวีร์ ศรีไตรภพ', 'dear-maw@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'dear-maw.jpg', '6', '0'),
(19, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวกุสุมา อินทรา', 'Seakaw_ss@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'Seakaw_ss.jpg', '6', '0'),
(20, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวสุภาพร เมืองจันทร์', 'chanathip@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'chanathip.jpg', '6', '0'),
(21, 'นักวิทยาศาสตร์', 'นางสาววิภาพร สวัสดี', 'Pat.25894@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคสังคมศาสตร์', '1', 'Pat_25894.jpg', '6', '0'),
(22, 'บรรณารักษ์', 'นางสาวศิริลักษณ์ ราชพัฒน์', 'Piashare02072@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'ภาคสังคมศาสตร์', '1', 'Piashare02072.jpg', '6', '0'),
(23, 'เจ้าหน้าที่บริหารงานทั่วไป', 'นางวิไลภรณ์ สีสมพร', 'thanawan@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'thanawan.jpg', '6', '0'),
(24, 'เจ้าหน้าที่บริการอัดสำเนา', 'นายครรชิต  จันทร์อ่อน', 'Nutaapong.pen@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', '', 'สำนักงานคณะ', '1', 'Nutaapong.jpg', '6', '0');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(10) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `memo_id` varchar(10) NOT NULL,
  `memo_num_dep` varchar(20) NOT NULL,
  `memo_date` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `paragraph1` text NOT NULL,
  `paragraph2` text NOT NULL,
  `paragraph3` text NOT NULL,
  `sign` varchar(100) NOT NULL,
  `time_user` varchar(50) NOT NULL,
  `sign_officer` varchar(250) NOT NULL,
  `time_officer` varchar(50) NOT NULL,
  `sign_officer1` varchar(250) NOT NULL,
  `time_officer1` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `status` char(1) NOT NULL,
  `status_edit` char(1) NOT NULL,
  `comment1` varchar(250) NOT NULL,
  `comment2` varchar(250) NOT NULL,
  `sign_depart` varchar(250) NOT NULL,
  `depart_opinion` text NOT NULL,
  `depart_opinion_time` varchar(50) NOT NULL,
  `memo_num_officer1` varchar(100) NOT NULL,
  `comment3` varchar(250) NOT NULL,
  `officer1_opinion` varchar(250) NOT NULL,
  `comment4` varchar(250) NOT NULL,
  `sign_head_officer` varchar(250) NOT NULL,
  `head_officer_opinion` text NOT NULL,
  `head_officer_opinion_time` varchar(100) NOT NULL,
  `sign_admin` varchar(250) NOT NULL,
  `admin_opinion` varchar(250) NOT NULL,
  `admin_opinion_time` varchar(100) NOT NULL,
  `comment5` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `dep`, `field`, `user_id`, `memo_id`, `memo_num_dep`, `memo_date`, `title`, `paragraph1`, `paragraph2`, `paragraph3`, `sign`, `time_user`, `sign_officer`, `time_officer`, `sign_officer1`, `time_officer1`, `name`, `position`, `status`, `status_edit`, `comment1`, `comment2`, `sign_depart`, `depart_opinion`, `depart_opinion_time`, `memo_num_officer1`, `comment3`, `officer1_opinion`, `comment4`, `sign_head_officer`, `head_officer_opinion`, `head_officer_opinion_time`, `sign_admin`, `admin_opinion`, `admin_opinion_time`, `comment5`) VALUES
(1, 'ภาคมนุษยศาสตร์', 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', '4', '0001', 'ภม.001/64', '22 กุมภาพันธ์ 2565', 'ขอส่งโครงการภายใต้โครงการยุทธศาสตร์มหาวิทยาลัยราชภัฏเพื่อการพัฒนาท้องถิ่น', 'ตามที่ข้าพเจ้าได้รับแจ้งจาก รองอธิการบดีฝ่ายนโยบายและแผน และกิจการพิเศษ เรื่อง     แจ้งข้อเสนอแนะจากคณะกรรมการกลั่นกรองข้อเสนอโครงการแผนงานยุทธศาสตร์เสริมสร้างพลังทางสังคม โครงการยุทธศาสตร์มหาวิทยาลัยราชภัฏเพื่อการพัฒนาท้องถิ่น ประจำปีงบประมาณ พ.ศ. 2565 ให้ปรับแก้ไขโครงการฯ เรื่อง “การพัฒนาระบบสารสนเทศเพื่อบริหารจัดการโครงการธนาคารขยะชุมชนสร้างความมั่นคงให้ครอบครัวพัฒนาชุมชนอย่างยั่งยืน ต.ปากชม อ.ปากชม จ.เลย” ยุทธศาสตร์ที่ 1 การพัฒนาท้องถิ่น จากงบประมาณ 127,200 บาท เป็น 90,000 บาท และให้เพิ่มวัตถุประสงค์ด้านการเพิ่มรายได้ บัดนี้ข้าพเจ้าได้ปรับแก้ไขโครงการเสร็จเรียบร้อยแล้ว จึงขอส่งโครงการยุทธศาสตร์มหาวิทยาลัยราชภัฏเพื่อการพัฒนาท้องถิ่น ประจำปีงบประมาณ พ.ศ. 2565 รายละเอียดดังเอกสารแนบ', '', 'จึงเรียนมาเพื่อโปรดพิจารณา', 'สังสรรค์  หล้าพันธ์ ', '21:48', 'สุนีนารถ พลซา', '21:50', 'ภาวินี', '22:59', 'นายสังสรรค์ หล้าพันธ์', 'หัวหน้าโครงการ', '5', '', '', '', 'ดร.ลี', 'เพื่อโปรดทราบ ', '22:41', 'มศ.001/64', '', 'อ.สังสรรค์ หล้าพันธ์ ขอส่งโครงการ', '', 'บัวบาน', 'เรียน ครฐดี\r\nเพื่อโปรดพิจารณา', '23:12', 'จารุวัณ', 'อนุญาต', '23:14', ''),
(2, 'ภาคมนุษยศาสตร์', 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', '4', '0002', 'ภม.002/64', '22 กุมภาพันธ์ 2565', 'ขอเชิญประชุม', 'ตามที่ข้าพเจ้า นายสังสรรค์ หล้าพันธ์ สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ ได้รับทุนสนับสนุนการวิจัยของบุคลากร มหาวิทยาลัยราชภัฏเลย ประจำปีงบประมาณ ๒๕๖๓ เรื่อง ระบบบริหารจัดการพัสดุครุภัณฑ์และสารเคมี ศูนย์วิทยาศาสตร์ มหาวิทยาลัยราชภัฏเลย ในการนี้ จึงขอเรียนเชิญท่านเข้าร่วมประชุมให้ข้อมูลความต้องการใช้งานระบบฯ ในวันพุธที่ ๑๑ พฤศจิกายน ๒๕๖๓ เวลา ๑๕.๐๐ น.                ณ ห้องประชุม ๒ อาคารเรียนวิทยาศาสตร์และห้องปฏิบัติการ คณะวิทยาศาสตร์และเทคโนโลยี', '', 'จึงเรียนมาเพื่อโปรดพิจารณาเข้าร่วมประชุม', 'สังสรรค์  หล้าพันธ์ ', '21:55', 'สุนีนารถ พลซา', '21:57', 'ภาวินี', '23:01', 'นายสังสรรค์ หล้าพันธ์', 'อาจารย์สาขาวิชาเทคโนโลยีสารสนเทศ', '5', '', '', '', 'ดร.ลี', 'เพื่อโปรดทราบ ', '22:39', 'มศ.002/64', '', 'อ.สังสรรค์ หล้าพันธ์ ขอเชิญประชุม', '', 'บัวบาน', 'เรียน คณบดี\r\nเพื่อโปรดทราบ', '23:12', 'จารุวัณ', 'แก้ไขใหม่', '23:15', ''),
(3, 'ภาคมนุษยศาสตร์', 'สาขาวิชาวิทยาการคอมพิวเตอร์', '1', '0003', 'ภม.003/64', '23 กุมภาพันธ์ 2565', 'ffffffffffff', 'fffffffff', 'ffffff', 'ffffff', 'fffff', '09:29', 'ออย', '09:32', 'ภาวินี', '09:49', 'ผู้ช่วยศาสตราจารย์ ดร.วิชัย พัวรุ่งโรจน์', 'อาจารย์', '5', '', '', '', 'ดร.ลี', 'เพื่อโปรดพิจารณา ss', '09:42', 'มศ.003/64', '', 'aaaaa', '', 'บัวบาน', 'dddd', '10:43', 'จารุวัณ', 'asas', '10:54', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_letter`
--
ALTER TABLE `files_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files_letter`
--
ALTER TABLE `files_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
