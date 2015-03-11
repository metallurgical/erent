-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2015 at 06:18 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erent`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `date_send` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `subject`, `descr`, `date_send`) VALUES
(1, 'xxx', 'xxxx@gmail.com', 'xx', 'xxx', NULL),
(2, 'xx', 'xxxx@gmail.com', 'xxxxx', 'xxx', NULL),
(3, 'xxx', 'badhazam@gmail.com', 'xx', 'xxx', NULL),
(4, 'xxx', 'xxxx', 'xxx', 'xxxx', '2014-12-30 15:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
`id` int(11) NOT NULL,
  `kawasan_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `tajuk` text NOT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `gambar_rumah` varchar(40) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `poskod` varchar(100) DEFAULT NULL,
  `no_tel` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `type_properties` varchar(100) DEFAULT NULL,
  `bedroom` varchar(100) DEFAULT NULL,
  `bath_room` varchar(100) DEFAULT NULL,
  `furnished` varchar(100) DEFAULT NULL,
  `price_rent` varchar(100) DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `notis` varchar(300) NOT NULL DEFAULT 'Tiada Notis',
  `created_by` varchar(100) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_bayaran` varchar(100) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `valid_until` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `kawasan_id`, `user_id`, `tajuk`, `nama_pemilik`, `gambar_rumah`, `alamat`, `poskod`, `no_tel`, `email`, `location`, `type_properties`, `bedroom`, `bath_room`, `furnished`, `price_rent`, `descr`, `notis`, `created_by`, `created_dt`, `updated_by`, `updated_dt`, `status_bayaran`, `status`, `valid_until`) VALUES
(2, 0, 0, '', NULL, 'Bila sakit.jpg', 'dungun', '23000', '01111004432', 'a@gmail.com', 'dungun', 'test', '2', '2', 'full', '300', 'test', '', 'Hazam', '2015-03-09 02:19:46', NULL, '2015-01-15 06:42:16', NULL, 1, '2015-08-09'),
(3, 0, 0, '', NULL, 'Bila sakit.jpg', 'cxvxc', 'xc', 'xcb', 'cxbxcb', 'cxbxc', 'xcbxc', 'xcbxc', 'bxccb', 'bxcb', 'cxbxcb', 'cbxcb', '', 'Hazam', '2015-03-09 01:46:45', NULL, '2015-01-15 06:42:16', NULL, 1, '0000-00-00'),
(4, 0, 0, '', NULL, 'Bila sakit.jpg', 'dd', '  dd', '', '', '', '', '', '', '', '', '', '', 'Hazam', '2015-03-09 01:44:06', NULL, '2015-01-15 06:42:16', NULL, 2, '0000-00-00'),
(5, 0, 0, '', NULL, 'Bila sakit.jpg', 'dd', '  dd', '', '', '', '', '', '', '', '', '', '', 'Hazam', '2015-03-09 01:44:06', NULL, '2015-01-15 06:42:16', NULL, 2, '0000-00-00'),
(8, 0, 0, '', NULL, 'Qad kafani.jpg', 'xxx', 'xx', 'xx', 'xx', 'xxx', 'xxx', 'xx', 'xx', 'xx', 'xx', 'xx', '', 'Hazam', '2015-03-09 01:45:28', NULL, '2015-01-15 06:42:16', NULL, 1, '0000-00-00'),
(9, 0, 0, '', NULL, 'Alien 1.bmp', 'xxx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xxx', 'Sila jelaskan bayaran anda untuk menyambung servis. Bayaran dikenakan sebanyak RM10/Sebulan dari tempoh iklan anda berhenti.', '', '2015-03-11 01:56:46', NULL, '2015-01-15 06:42:16', NULL, 2, '0000-00-00'),
(11, 0, 4, '', 'sdfsdf', '1.PNG', 'sdfdsf', '234', '567567', 'ngarutjah@yahoo.com', 'dungun', 'sdfs', '3', '4', '5', '44', 'sdfsf', '', 'Xx', '2015-03-09 02:19:53', NULL, '0000-00-00 00:00:00', 'belum_jelas', 1, '2015-08-09'),
(12, 1, 4, 'double storey', 'Bb2', '1.PNG', 'Sdfsf', '435345', '456', 'Ww@yahoo.com', NULL, 'sdfs', '3', '2', '5', '44', 'asdad', 'Tiada Notis', 'Xx', '2015-03-11 03:58:48', NULL, '0000-00-00 00:00:00', 'belum_jelas', 1, '2015-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `kawasan`
--

CREATE TABLE IF NOT EXISTS `kawasan` (
`kawasan_id` int(5) NOT NULL,
  `kawasan_name` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kawasan`
--

INSERT INTO `kawasan` (`kawasan_id`, `kawasan_name`) VALUES
(1, 'taman cina'),
(2, 'taman cenderawasih'),
(3, 'taman permint'),
(4, 'taman desa permai'),
(5, 'taman batu tujuh');

-- --------------------------------------------------------

--
-- Table structure for table `negeri`
--

CREATE TABLE IF NOT EXISTS `negeri` (
`id` int(2) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `negeri`
--

INSERT INTO `negeri` (`id`, `nama`) VALUES
(1, 'JOHOR'),
(2, 'MELAKA'),
(3, 'NEGERI SEMBILAN'),
(48, 'SELANGOR'),
(5, 'PERAK'),
(6, 'KEDAH'),
(7, 'PULAU PINANG'),
(8, 'PERLIS'),
(9, 'KELANTAN'),
(10, 'TERENGGANU'),
(11, 'PAHANG'),
(12, 'KUALA LUMPUR'),
(13, 'SABAH'),
(14, 'SARAWAK'),
(15, 'W/PERSEKUTUAN LABUAN'),
(16, 'W/PERSEKUTUAN KL'),
(17, 'W/P PUTRAJAYA');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
`id` int(11) NOT NULL,
  `image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `image`) VALUES
(1, 'ssss'),
(2, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0'),
(3, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0'),
(4, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0'),
(5, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0'),
(6, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0'),
(7, 'ÿØÿà\0JFIF\0\0\0\0\0\0ÿá\0*Exif\0\0II*\0\0\0\0\0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(100) NOT NULL,
  `nama` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `no_tel` varchar(1000) DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `daerah` varchar(1000) DEFAULT NULL,
  `poskod` varchar(1000) DEFAULT NULL,
  `negeri` varchar(1000) DEFAULT NULL,
  `username` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `date_register` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `no_tel`, `alamat`, `daerah`, `poskod`, `negeri`, `username`, `password`, `role`, `date_register`) VALUES
(1, 'Hazam', 'A@gmail.com', '1111', 'Xxxx', 'ddd', '33', '2', 'Hazam', '123456', 'admin', '2015-01-15 11:02:51'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yaya', '123456', 'staff', NULL),
(3, 'e', 'bb', '657', 'dfgdfg', 'iii', '89', '33', 'Ayu', '123456', 'penyewa', NULL),
(4, 'Bb2', 'Ww@yahoo.com', '456', 'Sdfsf', 'Dsfsdf', '435345', '16', 'Xx', 'Xx', 'pemilik', NULL),
(5, 'mmm', 'bb@yahoo.com', '78', 'fgbfg', 'hhh', '567', '1', 'r', 't', 'penyewa', '2015-03-11 04:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kawasan`
--
ALTER TABLE `kawasan`
 ADD PRIMARY KEY (`kawasan_id`);

--
-- Indexes for table `negeri`
--
ALTER TABLE `negeri`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kawasan`
--
ALTER TABLE `kawasan`
MODIFY `kawasan_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `negeri`
--
ALTER TABLE `negeri`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
