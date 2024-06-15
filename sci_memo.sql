-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 09:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sci_memo`
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
  `dep` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `rule` varchar(4) NOT NULL,
  `pass_update` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `field`, `name`, `email`, `pass`, `dep`, `status`, `image`, `rule`, `pass_update`) VALUES
(1, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ผู้ช่วยศาสตราจารย์ ดร.วิชัย พัวรุ่งโรจน์', 'wichai@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'wichai.jpg', '', '0'),
(2, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ดร.จักรกฤษณ์ พงษ์อินทร์วงศ์', 'Chakrit.pon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Chakrit.jpg', '', '0'),
(3, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ดร.เกรียงศักดิ์ โยธาภักดี', 'kriengsak@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '3', 'kriengsak.jpg', '8', '0'),
(4, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'นายทอแสง พิมพ์เบ้าธรรม', 'Thosang.phi@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Thosang.jpg', '', '0'),
(5, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'นายณรงค์ บุญสิริสัมพันธ์', 'narong.boo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'narong.jpg', '', '0'),
(6, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'นายดุลชาติ ศิริวัลลภ', 'dulachat.sir@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'chantana.jpg', '', '0'),
(7, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'ดร.สุไพลิน พิชัย', 'supailin.pic@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'supailin.jpg', '', '0'),
(8, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'นางสาวนรุวรรณ อยู่สำราญ', 'naruwan.y@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'naruwan.jpg', '', '0'),
(9, 'สาขาวิชาวิทยาการคอมพิวเตอร์', 'นายตันติกร โนนศรี', 'tuntigon.non@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'tuntigon.jpg', '', '0'),
(10, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'ผู้ช่วยศาสตราจารย์วีณา พรหมเทศ', 'weena.pro@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'weena.jpg', '', '0'),
(11, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'ผู้ช่วยศาสตราจารย์สุจิตรานันท์ มังคละไชยา', 'sujittraan.mun@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'sujittraan.jpg', '', '0'),
(12, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'ผู้ช่วยศาสตราจารย์จิตราภา  คนฉลาด', 'jittrapa.kon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'jittrapa.jpg', '', '0'),
(13, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'นายอิทธิชัย อินลุเพท', 'ittichai.inl@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'ittichai.jpg', '', '0'),
(14, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'นายธนานนท์ กลิ่นแก้ว', 'tananon.kli@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'tananon.jpg', '', '0'),
(15, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'นายสังสรรค์ หล้าพันธ์', 'sunksun.lap@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'sunksun.jpg', '9', '0'),
(16, 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', 'นายดุลดนัย วันธงชัย', 'duldanai.wan@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'duldanai.jpg', '', '0'),
(17, 'สาขาวิชาอาหารและโภชนาการ', 'ผู้ช่วยศาสตราจารย์จิตติมา พีรกมล', 'Chittima_w@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Chittima_w.jpg', '', '0'),
(18, 'สาขาวิชาอาหารและโภชนาการ', 'ผู้ช่วยศาสตราจารย์ ดร.สุพรรณี พฤกษา', 'supannee.pru@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'supannee.jpg', '', '0'),
(19, 'สาขาวิชาอาหารและโภชนาการ', 'ผู้ช่วยศาสตราจารย์สุระเดช ไชยตอกเกี้ย', 'aon5794@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Suradet_chai.jpg', '', '0'),
(20, 'สาขาวิชาอาหารและโภชนาการ', 'นางสาววันเพ็ญ  นาโสก', 'Wanpen1203nasok@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Wanpen1203nasok.jpg', '', '0'),
(21, 'สาขาวิชาสาธารณสุขศาสตร์', 'ดร.มธุรส ชลามาตย์', 'maturot.cha@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'maturot.jpg', '', '0'),
(22, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์ ดร.ธนัญชัย บุญหนัก', 'tanunchai.boo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'tanunchai.jpg', '', '0'),
(23, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์อรทัย ปานเพชร', 'Orathai_pan@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Orathai_pan.jpg', '', '0'),
(24, 'สาขาวิชาสาธารณสุขศาสตร์', 'ดร.จรินทร์ ย่นพันธ์', 'jarin.yon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'jarin.jpg', '', '0'),
(25, 'สาขาวิชาสาธารณสุขศาสตร์', 'ดร.ณัจฉรียา คำยัง', 'Natchareeya.kum@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Natchareeya.jpg', '', '0'),
(26, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์วิรยา วิฑูธีรศานต์', 'wiraya.wit@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'wiraya.jpg', '', '0'),
(27, 'สาขาวิชาสาธารณสุขศาสตร์', 'ดร.รุ่งกานต์ อินทวงศ์', 'rungkarn.int@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'rungkarn.jpg', '', '0'),
(28, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์บุญเลี้ยง สุพิมพ์', 'bunliang.sup@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'bunliang.jpg', '', '0'),
(29, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์ ดร.ปิยะพงษ์ ชุมศรี', 'choomseer@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'choomseer.jpg', '', '0'),
(30, 'สาขาวิชาสาธารณสุขศาสตร์', 'ดร.กีรติ ภูมิผักแว่น', 'kirati.poo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'kirati.jpg', '', '0'),
(31, 'สาขาวิชาสาธารณสุขศาสตร์', 'ผู้ช่วยศาสตราจารย์นพวรรณ ดวงหัสดี', 'nopawand@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'nopawand.jpg', '', '0'),
(32, 'สาขาวิชาวิทยาศาสตร์และเทคโนโลยีการอาหาร', 'นางสาวเกษร น้อยนาง', 'noinangk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'noinangk.jpg', '', '0'),
(33, 'สาขาวิชาวิทยาศาสตร์และเทคโนโลยีการอาหาร', 'ผู้ช่วยศาสตราจารย์เตือนใจ ศิริพาหนะกุล', 'siripahanakul@yahoo.co.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'siripahanakul.jpg', '', '0'),
(34, 'สาขาวิชาวิทยาศาสตร์และเทคโนโลยีการอาหาร', 'ผู้ช่วยศาสตราจารย์โสภา ธงศิลา', 'sopatongsila@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'sopatongsila.jpg', '', '0'),
(35, 'สาขาวิชาวิทยาศาสตร์และเทคโนโลยีการอาหาร', 'ผู้ช่วยศาสตราจารย์ ดร.สุภาวดี สำราญ', 'sumransupawadee@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'sumransupawadee.jpg', '', '0'),
(36, 'สาขาวิชาสัตวศาสตร์', 'ผู้ช่วยศาสตราจารย์ ดร.ชัยพฤกษ์ หงษ์ลัดดาพร', 'chaiyapruek.h@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'chaiyapruek.jpg', '', '0'),
(37, 'สาขาวิชาสัตวศาสตร์', 'ผู้ช่วยศาสตราจารย์สว่าง กุลวงษ์', 'skullawong@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'skullawong.jpg', '', '0'),
(38, 'สาขาวิชาสัตวศาสตร์', 'ผู้ช่วยศาสตราจารย์สุธาสินี ครุฑธกะ', 'kruttaga36@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'kruttaga36.jpg', '', '0'),
(39, 'สาขาวิชาสัตวศาสตร์', 'ผู้ช่วยศาสตราจารย์ ว่าที่ร้อยตรีศรุติวงศ์ บุญคง', 'saruttiwong.boo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'saruttiwong.jpg', '', '0'),
(40, 'สาขาวิชาเกษตรศาสตร์', 'ผู้ช่วยศาสตราจารย์สมศักดิ์ พินิจด่านกลาง', 'somsakdi.pinitdanklang@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'somsakdi.jpg', '', '0'),
(41, 'สาขาวิชาเกษตรศาสตร์', 'ดร.มาริษา เดอ เบลส์', 'marphirom@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'marphirom.jpg', '', '0'),
(42, 'สาขาวิชาเกษตรศาสตร์', 'นางสาวนฤมล โสตะ', 'narumol.sot@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'narumol.jpg', '', '0'),
(43, 'สาขาวิชาเกษตรศาสตร์', 'ดร.ชุตินันท์ เจริญชัย', 'Chutinan.jar@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Chutinan.jpg', '', '0'),
(44, 'สาขาวิชาเกษตรศาสตร์', 'นายนิธิภัทร บุญปก', 'nitipath.boo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'nitipath.jpg', '', '0'),
(45, 'สาขาวิชาเกษตรศาสตร์', 'นายประยูร ประเทศ', 'prayoon.par@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'prayoon.jpg', '', '0'),
(46, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'ผู้ช่วยศาสตราจารย์ ดร.วัลลภ ทาทอง', 'vanlop.lru@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'vanlop.jpg', '', '0'),
(47, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'ผู้ช่วยศาสตราจารย์ ดร.อรทัย จิตไธสง', 'Jitthaisong1976@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'Jitthaisong1976.jpg', '', '0'),
(48, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'นางมณีรัตน์ สุตันตั้งใจ', 'manee.suthan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'manee.jpg', '', '0'),
(49, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'นางสาวศิริรัตน์ แจ้งกรณ์', 's.jangkorn@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 's_jangkorn.jpg', '', '0'),
(50, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'ผู้ช่วยศาสตราจารย์ ดร.เนตรนภา พงเพ็ชร', 'netnapa.pon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'netnapa.jpg', '', '0'),
(51, 'สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม', 'นางสาวกานดา ปุ่มสิน', 'kanda.kai1128@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'kanda.jpg', '', '0'),
(52, 'สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย', 'นายอาทิตย์ ปัญญาคำ', 'artith123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'artith123.jpg', '', '0'),
(53, 'สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย', 'ผู้ช่วยศาสตราจารย์ ดร.วรศิษฎ์ ศรีบุรินทร์', 'worasit.sea@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'worasit.jpg', '', '0'),
(54, 'สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย', 'ดร.ยรรยงค์  พานเพ็ง', 'yanyong.pha@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'yanyong.jpg', '', '0'),
(55, 'สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย', 'นางสาวจรัสศรี ศรีโภคา', 'jaratsri.sri@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'jaratsri.jpg', '', '0'),
(56, 'สาขาวิชาวิทยาศาสตร์การกีฬาและการออกกำลังกาย', 'ว่าที่เรือโทวิชญ์วิสิษฐ์ วงษ์เขียว', 'witwisit.won@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '2', 'witwisit.jpg', '', '0'),
(57, 'สาขาวิชาคณิตศาสตร์', 'รองศาสตราจารย์ ดร.เกียรติศักดิ์  รัตนสีหา', 'kiattisak.rat@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'kiattisak.jpg', '', '0'),
(58, 'สาขาวิชาคณิตศาสตร์', 'รองศาสตราจารย์สมเจตน์  ดวงพิทักษ์', 'Somjate.dua@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Somjate.jpg', '', '0'),
(59, 'สาขาวิชาคณิตศาสตร์', 'นายสิทธิชัย  สมศรี', 'Sitthichai.som@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Sitthichai.jpg', '', '0'),
(60, 'สาขาวิชาคณิตศาสตร์', 'ผู้ช่วยศาสตราจารย์ศถิรวรรณ  สมบัติ', 'sathirawan.som@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'sathirawan.jpg', '', '0'),
(61, 'สาขาวิชาคณิตศาสตร์', 'ดร.จุไรรัตน์  อาจแก้ว', 'Jurairat.ard@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Jurairat.jpg', '', '0'),
(62, 'สาขาวิชาคณิตศาสตร์', 'ผู้ช่วยศาสตราจารย์ ดร.ศิวารักข์  พรหมรักษา', 'siwarak.pro@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'siwarak.jpg', '', '0'),
(63, 'สาขาวิชาคณิตศาสตร์', 'ผู้ช่วยศาสตราจารย์ฉันทนา  ซิมตระการกุล', 'chantana.sim@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'chantana.jpg', '', '0'),
(64, 'สาขาวิชาคณิตศาสตร์', 'นายวิสุทธิ์  กิจชัยนุกูล', 'wisut.kit@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'wisut.jpg', '9', '0'),
(65, 'สาขาวิชาคณิตศาสตร์', 'ผู้ช่วยศาสตราจารย์ ดร.มนตรี  ต่อวัฒนบุญ', 'montri.tor@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'montri.jpg', '', '0'),
(66, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์กิตติพงษ์  ชูจิตร', 'kittipong.cho@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'kittipong.jpg', '', '0'),
(67, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์ ดร.ธนาธิป  รักศิลป์', 'thanatip.ruk@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'thanatip.jpg', '', '0'),
(68, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์ ดร.ปานฤทัย  พุทธทองศรี', 'panruethai.put@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'panruethai.jpg', '', '0'),
(69, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์บุษบาวดี  พุทธานุ', 'bussabavadeeput@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'bussabavadeeput.jpg', '', '0'),
(70, 'สาขาวิชาเคมี', 'นางวิมลนันท์  พงศ์ภัทรกานต์', 'wimonnan@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'wimonnan.jpg', '', '0'),
(71, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์ฐิตินันท์  ธรรมโสม', 'thitinan.tha@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'thitinan.jpg', '', '0'),
(72, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์นภัสสร  วงเปรียว', 'aobnapatsorn@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'aobnapatsorn.jpg', '', '0'),
(73, 'สาขาวิชาเคมี', 'นางนิรมล  ศรีชนะ', 'Niramolsrichana13@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Niramolsrichana13.jpg', '', '0'),
(74, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์สุวัชชัย  มิสุนา', 'suwatchai.mis@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'suwatchai.jpg', '', '0'),
(75, 'สาขาวิชาเคมี', 'ผู้ช่วยศาสตราจารย์สุพัฒน์  พระเมืองคง', 'suphat.phr@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'suphat.jpg', '', '0'),
(76, 'สาขาวิชาเคมี', 'ดร.วิไลวรรณ  สิมเชื้อ', 'wilaiwan.sim@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'wilaiwan.jpg', '', '0'),
(77, 'สาขาวิชาเคมี', 'ดร.ภัทรานุช  ผงสุข', 'Pattranuch.pon@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Pattranuch.jpg', '', '0'),
(78, 'สาขาวิชาฟิสิกส์', 'ดร.นุวัติ  พิมพะบุตร', 'nuwat.phi@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '3', 'nuwat.jpg', '8', '0'),
(79, 'สาขาวิชาฟิสิกส์', 'ผู้ช่วยศาสตราจารย์โสฬส  ศรีหมื่นไวย', 'sorodsri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'sorodsri.jpg', '', '0'),
(80, 'สาขาวิชาฟิสิกส์', 'ผู้ช่วยศาสตราจารย์ ดร.สุรจิตร์  พระเมือง', 'surajitr.pra@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'surajitr.jpg', '', '0'),
(81, 'สาขาวิชาฟิสิกส์', 'ผู้ช่วยศาสตราจารย์อารีรัตน์  ดาวงษา', 'areerat.daw@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'areerat.jpg', '', '0'),
(82, 'สาขาวิชาฟิสิกส์', 'ผู้ช่วยศาสตราจารย์มัลลิกา  หล้าพันธ์', 'mallika.pud@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'mallika.jpg', '', '0'),
(83, 'สาขาวิชาฟิสิกส์', 'นายวีรชน  มีฐาน', 'weerachon.mee@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'weerachon.jpg', '', '0'),
(84, 'สาขาวิชาฟิสิกส์', 'นายณัฐวุฒิ  มาลีลัย', 'nmaleelai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'nmaleelai.jpg', '', '0'),
(85, 'สาขาวิชาฟิสิกส์', 'นายธีรภัทร์  อนุชาติ', 'teera.anu24@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'teera.jpg', '', '0'),
(86, 'สาขาวิชาชีววิทยา', 'ผู้ช่วยศาสตราจารย์ ดร.สุภาษร  สกุลใจตรง', 's.supasorn@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 's_supasorn.jpg', '', '0'),
(87, 'สาขาวิชาชีววิทยา', 'ผู้ช่วยศาสตราจารย์ ดร.สุปราณี  สิทธิพรหม', 'sitthip1969@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'sitthip1969.jpg', '', '0'),
(88, 'สาขาวิชาชีววิทยา', 'นายพิทักษ์  น้อยเมล์', 'pitak.noi@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'pitak.jpg', '', '0'),
(89, 'สาขาวิชาชีววิทยา', 'ผู้ช่วยศาสตราจารย์จารุวัลย์  รักษ์มณี', 'lekkykate@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '9', 'lekkykate.jpg', '99', '0'),
(90, 'สาขาวิชาชีววิทยา', 'นางสาวเนตรนภา  เกล็ดจีน', 'natenapha.kle@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'natenapha.jpg', '', '0'),
(91, 'สาขาวิชาชีววิทยา', 'นางสาวพันธ์ทิวา  กระจาย', 'Puntiwa.kra@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Puntiwa.jpg', '', '0'),
(92, 'สาขาวิชาชีววิทยา', 'ผู้ช่วยศาสตราจารย์ ดร.รัตนา  ขามฤทธิ์', 'rattana.kha@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'rattana.jpg', '', '0'),
(93, 'สาขาวิชาชีววิทยา', 'นางสาวพรชนก  บุญลับ', 'pornchanok.boo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'pornchanok.jpg', '', '0'),
(94, 'สาขาวิชาชีววิทยา', 'ดร.วิไลลักษณ์  สุดวิไล', 'wilailux.sud@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'wilailux.jpg', '', '0'),
(95, 'สาขาวิชาชีววิทยา', 'ดร.กิตติ  ตันเมืองปัก', 'landsnail2015@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'landsnail2015.jpg', '9', '0'),
(96, 'สาขาวิชาชีววิทยา', 'ดร.ขวัญคณิศร์  อินทรตระกูล', 'kwankanit.int@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'kwankanit.jpg', '', '0'),
(97, 'สาขาวิชาชีววิทยา', 'นางสาวฉันทนา  เคนศรี', 'chantana.khe@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'chantana.jpg', '', '0'),
(98, 'สาขาวิชาชีววิทยา', 'ดร.ชลธิชา  จินาพร', 'Chontichar.jin@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'Chontichar.jpg', '', '0'),
(99, 'สาขาวิชาชีววิทยา', 'นางสาวศิริกรณ์  ศรีโพธิ์', 'pasccb@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '2', 'pasccb.jpg', '', '0'),
(100, 'เจ้าที่บริหารงานทั่วไป', 'นางสาวธิติมา พันธุลาภ', 'thitimap@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'thitimap.jpg', '9', '0'),
(101, 'ผู้ปฏิบัติงานบริหาร', 'นางพรพิมล มุ่งดี', 'pwetchasit@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'pwetchasit.jpg', '7', '0'),
(102, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวชัญญภัทร  นามวงษ์', 'jenjira.nam@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์ประยุกต์', '1', 'jenjira.jpg', '8', '0'),
(103, 'ผู้ปฏิบัติงานบริหาร', 'นางสาวภาวิณี   อินปลัด', 'phawinee.inp@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'ภาควิชาวิทยาศาสตร์', '1', 'phawinee.jpg', '8', '0'),
(104, 'ผู้ปฏิบัติงานบริหาร', 'ว่าที่ ร.ต.หญิง ลภัสรดา  แก้วบุตรดี', 'daw-love53@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'daw-love53.jpg', '7', '0'),
(105, 'หัวหน้าสำนักงานคณบดี', 'นางภัสส์ศา ศรีลานนท์', 'Passa_23@hotmail.co.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Passa_23.jpg', '9', '0'),
(106, 'เจ้าที่บริหารงานทั่วไป', 'นางสาวปวีณา แก้วเกษศรี', 'paweena.kae@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'paweena.jpg', '6', '0'),
(107, 'นักวิชาการพัสดุ', 'นางสุภาพร  โยธาภักดี', 'dear-maw@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'dear-maw.jpg', '6', '0'),
(108, 'นักวิชาการการเงิน/บัญชี', 'นางนิชาภา  สีขาว', 'Seakaw_ss@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Seakaw_ss.jpg', '6', '0'),
(109, 'นักวิทยาศาสตร์', 'นายชนาธิป  สุธงษา', 'chanathip@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'chanathip.jpg', '6', '0'),
(110, 'นักวิทยาศาสตร์', 'นางสาวอัญชลีพร  เนื่องมัจฉา', 'Pat.25894@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Pat_25894.jpg', '6', '0'),
(111, 'นักวิทยาศาสตร์', 'นางสาวอัชฎาภรณ์  หารคำแพง', 'Piashare02072@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Piashare02072.jpg', '6', '0'),
(112, 'เจ้าพนักงานห้องสมุด', 'นางธนวรรณ  พลตื้อ', 'thanawan@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'thanawan.jpg', '6', '0'),
(113, 'ช่างเครื่องคอมพิวเตอร์', 'นายณัฐพงษ์  เพ็ญพลกรัง', 'Nutaapong.pen@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Nutaapong.jpg', '6', '0'),
(114, 'พนักงานทั่วไป', 'นายพัฒนชัย  ดวงแก้ว', 'Pattanachai-kk1986@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Pattanachai-kk1986.jpg', '6', '0'),
(115, 'ช่างเครื่องคอมพิวเตอร์', 'นายธีระพล  บุษบา', 'Shirohamarez@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Shirohamarez.jpg', '6', '0'),
(116, 'ผู้ปฏิบัติงานบริหาร', 'นายสมิง  ศรีกา', 'saming@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'saming.jpg', '6', '0'),
(117, 'นักวิชาการศึกษา', 'นายประเสริฐ  ลูกแก้ว', 'prasert.loo@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'prasert.jpg', '6', '0'),
(118, 'นักวิทยาศาสตร์', 'นางพนัดดา  โพนแก้ว', 'panadda@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'panadda.jpg', '6', '0'),
(119, 'นักวิทยาศาสตร์', 'นางอรอนงค์  ทับขันต์', 'taipook_ss@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'taipook_ss.jpg', '6', '0'),
(120, 'นักวิทยาศาสตร์', 'นางสาวพัชรีย์  พรรษา', 'Patchareepansa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'Patchareepansa.jpg', '6', '0'),
(121, 'นักวิทยาศาสตร์', 'นางสาวรัศมี  นนที', 'rasa8813@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'rasa8813.jpg', '6', '0'),
(122, 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'นายศุภชัย  มังดินดำ', 'supachaimangdindam8387@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'supachaimangdindam8387.jpg', '6', '0'),
(123, 'ผู้ปฏิบัติงานวิทยาศาสตร์', 'นางสาวปาจรีย์  นนทะโคตร', 'pajaree.non@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'pajaree.jpg', '6', '0'),
(124, 'นักวิทยาศาสตร์', 'นางสาวณัฐวดี  พลอาวุธ', 'natawadeephonarwut@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'natawadeephonarwut.jpg', '6', '0'),
(125, 'สาขาวิชาทดสอบ', 'นายทดสอบ ระบบ', 'testsciaj@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '2', 'testsci.jpg', '', '0'),
(126, 'ตำแหน่งทดสอบ', 'นายทดสอบ ระบบ', 'testsci@lru.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'สำนักงานคณบดี', '1', 'testsci.jpg', '6', '0');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(10) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `field` varchar(100) NOT NULL,
  `memo_id` int(10) NOT NULL,
  `memo_num_dep` varchar(20) NOT NULL,
  `memo_date` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `paragraph1` text NOT NULL,
  `paragraph2` text NOT NULL,
  `paragraph3` varchar(100) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `time_user` varchar(50) NOT NULL,
  `sign_officer` varchar(50) NOT NULL,
  `time_officer` varchar(50) NOT NULL,
  `sign_officer1` varchar(100) NOT NULL,
  `time_officer1` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `status_edit` char(1) NOT NULL,
  `comment1` varchar(200) NOT NULL,
  `comment2` varchar(200) NOT NULL,
  `depart_opinion` varchar(250) NOT NULL,
  `depart_opinion_time` varchar(100) NOT NULL,
  `memo_num_officer1` varchar(100) NOT NULL,
  `comment3` varchar(250) NOT NULL,
  `officer1_opinion` varchar(250) NOT NULL,
  `comment4` varchar(250) NOT NULL,
  `sign_head_officer` varchar(100) NOT NULL,
  `head_officer_opinion` varchar(250) NOT NULL,
  `head_officer_opinion_time` varchar(100) NOT NULL,
  `sign_admin` varchar(100) NOT NULL,
  `admin_opinion` varchar(250) NOT NULL,
  `admin_opinion_time` varchar(100) NOT NULL,
  `comment5` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
