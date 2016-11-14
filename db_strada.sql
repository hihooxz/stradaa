-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2016 at 09:18 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_strada`
--

-- --------------------------------------------------------

--
-- Table structure for table `st_class`
--

CREATE TABLE IF NOT EXISTS `st_class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `status_class` tinyint(4) NOT NULL COMMENT '0: Active, 1 : Nonactive',
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `st_class`
--

INSERT INTO `st_class` (`id_class`, `class_name`, `status_class`) VALUES
(1, 'X - 1', 0),
(2, 'XI IPS 1', 0),
(3, 'XI IPA 1', 0),
(4, 'XII IPA 1', 0),
(5, 'XII IPS 1', 0),
(6, 'X - 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `st_classroom`
--

CREATE TABLE IF NOT EXISTS `st_classroom` (
  `id_classroom` int(11) NOT NULL AUTO_INCREMENT,
  `name_classroom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_classroom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `st_classroom`
--

INSERT INTO `st_classroom` (`id_classroom`, `name_classroom`) VALUES
(1, 'Ruang 1'),
(2, 'Ruang 2'),
(3, 'Ruang 3');

-- --------------------------------------------------------

--
-- Table structure for table `st_schedule`
--

CREATE TABLE IF NOT EXISTS `st_schedule` (
  `id_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `id_class` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `name_schedule` varchar(100) NOT NULL,
  `hour_start` varchar(5) NOT NULL,
  `hour_end` varchar(5) NOT NULL,
  `date_schedule` date NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `st_schedule`
--

INSERT INTO `st_schedule` (`id_schedule`, `id_class`, `id_classroom`, `id_subject`, `name_schedule`, `hour_start`, `hour_end`, `date_schedule`, `date_insert`) VALUES
(12, 1, 1, 1, 'UTS', '07:00', '09:00', '2016-09-26', '2016-10-27 00:00:00'),
(13, 1, 1, 4, 'UTS', '09:30', '11:00', '2016-09-26', '2016-10-27 00:00:00'),
(14, 1, 1, 5, 'UTS', '11:30', '13:00', '2016-09-26', '2016-10-27 00:00:00'),
(15, 1, 1, 6, 'UTS', '07:00', '09:00', '2016-09-27', '2016-10-27 00:00:00'),
(16, 1, 1, 7, 'UTS', '09:30', '11:00', '2016-09-27', '2016-10-27 00:00:00'),
(17, 1, 1, 8, 'UTS', '07:00', '08:30', '2016-09-28', '2016-10-27 00:00:00'),
(18, 1, 1, 3, 'UTS', '09:00', '10:30', '2016-09-28', '2016-10-27 00:00:00'),
(19, 3, 2, 6, 'UTS', '07:00', '09:00', '2016-09-26', '2016-10-27 00:00:00'),
(20, 3, 2, 12, 'UTS', '09:30', '11:00', '2016-09-26', '2016-10-27 00:00:00'),
(21, 3, 2, 14, 'UTS', '07:00', '09:00', '2016-09-27', '2016-10-27 00:00:00'),
(22, 3, 2, 3, 'UTS', '09:30', '11:00', '2016-09-27', '2016-10-27 00:00:00'),
(23, 3, 2, 8, 'UTS', '07:00', '08:30', '2016-09-28', '2016-10-27 00:00:00'),
(24, 3, 2, 7, 'UTS', '09:00', '10:30', '2016-09-28', '2016-10-27 00:00:00'),
(25, 2, 2, 6, 'UTS', '07:00', '09:00', '2016-09-26', '2016-10-27 00:00:00'),
(26, 2, 2, 11, 'UTS', '07:00', '09:00', '2016-09-27', '2016-10-28 00:00:00'),
(27, 2, 2, 3, 'UTS', '09:30', '11:00', '2016-09-27', '2016-10-28 00:00:00'),
(28, 2, 2, 8, 'UTS', '07:00', '08:30', '2016-09-28', '2016-10-28 00:00:00'),
(29, 2, 2, 15, 'UTS', '09:00', '10:30', '2016-09-28', '2016-10-28 00:00:00'),
(30, 4, 3, 14, 'UTS', '07:00', '09:00', '2016-09-26', '2016-10-28 00:00:00'),
(31, 4, 3, 10, 'UTS', '09:30', '11:00', '2016-09-26', '2016-10-28 00:00:00'),
(32, 5, 3, 11, 'UTS', '07:00', '09:00', '2016-09-26', '2016-10-28 00:00:00'),
(33, 5, 3, 10, 'UTS', '09:30', '11:00', '2016-09-26', '2016-10-28 00:00:00'),
(34, 4, 3, 1, 'UTS', '07:00', '09:00', '2016-09-27', '2016-10-28 00:00:00'),
(35, 4, 3, 13, 'UTS', '09:30', '11:00', '2016-09-27', '2016-10-28 00:00:00'),
(36, 5, 3, 16, 'UTS', '07:00', '09:00', '2016-09-27', '2016-10-28 00:00:00'),
(37, 5, 3, 13, 'UTS', '09:30', '11:00', '2016-09-27', '2016-10-28 00:00:00'),
(38, 4, 3, 8, 'UTS', '07:00', '08:30', '2016-09-28', '2016-10-28 00:00:00'),
(39, 4, 3, 5, 'UTS', '09:00', '10:30', '2016-09-28', '2016-10-28 00:00:00'),
(40, 5, 3, 8, 'UTS', '07:00', '08:30', '2016-09-28', '2016-10-28 00:00:00'),
(41, 5, 3, 13, 'UTS', '09:00', '10:30', '2016-09-28', '2016-10-28 00:00:00'),
(42, 1, 2, 2, 'UTS', '07:00', '09:00', '2016-09-27', '2016-11-14 00:00:00'),
(43, 1, 2, 1, 'UTS', '07:00', '08:30', '2016-09-28', '2016-11-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `st_setting`
--

CREATE TABLE IF NOT EXISTS `st_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `title_website` varchar(100) NOT NULL,
  `downloadable_date` date NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st_setting`
--

INSERT INTO `st_setting` (`id_setting`, `title_website`, `downloadable_date`) VALUES
(1, 'Strada', '2016-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `st_student`
--

CREATE TABLE IF NOT EXISTS `st_student` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `id_class` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `st_student`
--

INSERT INTO `st_student` (`id_student`, `id_class`, `id_user`) VALUES
(3, 1, 5),
(4, 1, 6),
(5, 6, 7),
(6, 6, 8),
(7, 3, 9),
(9, 6, 10),
(10, 3, 11),
(11, 2, 12),
(12, 2, 13),
(13, 4, 14),
(14, 4, 15),
(15, 5, 16),
(16, 5, 17);

-- --------------------------------------------------------

--
-- Table structure for table `st_subject`
--

CREATE TABLE IF NOT EXISTS `st_subject` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `st_subject`
--

INSERT INTO `st_subject` (`id_subject`, `subject`, `description`) VALUES
(1, 'Fisika', 'Fisika'),
(2, 'Matematika', 'Matematika'),
(3, 'Agama', 'Agama'),
(4, 'Seni Budaya', 'Seni Budaya'),
(5, 'TIK', 'TIK'),
(6, 'Kewarganegaraan', 'Kewarganegaraan'),
(7, 'Biologi', 'Biologi'),
(8, 'Bahasa Indonesia', 'Bahasa Indonesia'),
(9, 'Bahasa Inggris', 'Bahasa Inggris'),
(10, 'Sejarah', 'Sejarah'),
(11, 'Ekonomi', 'Ekonomi'),
(12, 'Mandarin', 'Mandarin'),
(13, 'Olahraga', 'Olahraga'),
(14, 'Kimia ', 'Kimia '),
(15, 'Sosiologi', 'Sosiologi'),
(16, 'Geografi', 'Geografi');

-- --------------------------------------------------------

--
-- Table structure for table `st_teacher`
--

CREATE TABLE IF NOT EXISTS `st_teacher` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `id_schedule` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1: Pengawas 1, 2: Pengawas 2',
  PRIMARY KEY (`id_teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `st_teacher`
--

INSERT INTO `st_teacher` (`id_teacher`, `id_schedule`, `id_user`, `role`) VALUES
(3, 11, 2, 1),
(4, 11, 4, 2),
(5, 10, 4, 1),
(6, 10, 2, 2),
(7, 26, 19, 1),
(8, 26, 18, 2),
(9, 28, 18, 1),
(10, 28, 2, 2),
(11, 42, 18, 1),
(12, 42, 19, 1),
(13, 27, 2, 1),
(14, 30, 2, 1),
(15, 30, 18, 2),
(16, 43, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `st_user`
--

CREATE TABLE IF NOT EXISTS `st_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_input` datetime NOT NULL,
  `permission` tinyint(2) NOT NULL COMMENT '1 : Admin, 2 : Murid, 3 : Guru',
  `full_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1: Male, 2: Female',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `st_user`
--

INSERT INTO `st_user` (`id_user`, `username`, `password`, `email`, `last_login`, `date_input`, `permission`, `full_name`, `address`, `telephone`, `birthday`, `gender`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@strada.sch.id', '2016-10-25 00:00:00', '2016-10-25 00:00:00', 1, 'Admin Strada', 'Grogol grogol dekat trisakti trisaktiku, indonesiaku hebat sekali, bareng sama mall taman anggrek de', '081238139812', '0000-00-00', 0),
(2, 'johana', 'a8f5f167f44f4964e6c998dee827110c', 'johana@gmail.com', '2016-10-25 17:59:03', '2016-10-25 17:59:03', 2, 'Johana Juanita', '', '', '0000-00-00', 0),
(3, '1601217360', 'a8f5f167f44f4964e6c998dee827110c', 'vallent@gmail.com', '2016-10-25 17:59:26', '2016-10-25 17:59:26', 3, 'Vallent', '', '', '0000-00-00', 0),
(4, 'paula', 'a8f5f167f44f4964e6c998dee827110c', 'paula@gmail.com', '2016-10-25 18:29:51', '2016-10-25 18:29:51', 2, 'Paula Anderson', '', '', '0000-00-00', 0),
(5, '161710006', '06a2f9a939add23c8ac302c8ba854226', 'agnes@strada.com', '2016-10-27 17:17:55', '2016-10-27 17:17:55', 3, 'Agnes Claudya Stefanus', 'jakarta', '082309123', '0000-00-00', 0),
(6, '161710017', 'cbda7b7b1d5afd4632b4dd9ca662a31a', 'anastasia@strada.com', '2016-10-27 17:18:42', '2016-10-27 17:18:42', 3, 'Anastasia Dewanti Margono', '', '', '0000-00-00', 0),
(7, '16170087', '1bf2c412ca7d8d2dbcbcf3833645b69d', 'fiona@gmail.com', '2016-10-27 17:19:28', '2016-10-27 17:19:28', 3, 'Fiona Felicia', '', '', '0000-00-00', 0),
(8, '16710107', 'f6b73c5b7aaf079dbe2eecb27e964939', 'hindra@strada.com', '2016-10-27 17:20:13', '2016-10-27 17:20:13', 3, 'Hindra Pangadi Ghozali', '', '', '0000-00-00', 0),
(9, '151610012', 'a8f5f167f44f4964e6c998dee827110c', 'alvin@strada.com', '2016-10-27 17:22:22', '2016-10-27 17:22:22', 3, 'Alvin Septiawan', '', '', '0000-00-00', 0),
(10, '161710047', 'ffbe69502f351a7a2e94bc681e0e3f00', 'cindy@strada.com', '2016-10-27 17:24:55', '2016-10-27 17:24:55', 3, 'Cindy Novianti Sastra', '', '', '0000-00-00', 0),
(11, '151610072', '89cb2ad4502a94c540b2acbe47a6377a', 'elvira@strada.com', '2016-10-27 17:27:24', '2016-10-27 17:27:24', 3, 'Elvira', '', '', '0000-00-00', 0),
(12, '15160056', '421b3c7bc8f2e039dd62fcd956aae197', 'daniel@strada.com', '2016-10-27 17:28:35', '2016-10-27 17:28:35', 3, 'Daniel', '', '', '0000-00-00', 0),
(13, '151610134', '75e30e3c3d676ac6a060693545f9b603', 'kevin@strada.com', '2016-10-27 17:29:51', '2016-10-27 17:29:51', 3, 'Kevin', '', '', '0000-00-00', 0),
(14, '141510150', '8defde767759e88303e3a3583125c405', 'kezia@strada.com', '2016-10-27 17:32:50', '2016-10-27 17:32:50', 3, 'Kezia Manuela', '', '', '0000-00-00', 0),
(15, '141510194', '5acb2485d07f278d83863c8567db2858', 'niken@strada.com', '2016-10-27 17:33:12', '2016-10-27 17:33:12', 3, 'Niken', '', '', '0000-00-00', 0),
(16, '141510151', '94a4e96efff6602009f1a4a323324efe', 'kristian@strada.com', '2016-10-27 17:34:48', '2016-10-27 17:34:48', 3, 'Kristian Harijadi', '', '', '0000-00-00', 0),
(17, '141510174', '2b0aef3a41389c2e92402b7d61682335', 'marina@strada.com', '2016-10-27 17:35:14', '2016-10-27 17:35:14', 3, 'Marina', '', '', '0000-00-00', 0),
(18, 'radit', 'a8f5f167f44f4964e6c998dee827110c', 'radit@strada.com', '2016-10-29 08:48:06', '2016-10-29 08:48:06', 2, 'Radit', '', '', '0000-00-00', 0),
(19, 'fredericus', 'a8f5f167f44f4964e6c998dee827110c', 'fredericus@strada.com', '2016-10-29 08:48:38', '2016-10-29 08:48:38', 2, 'Fredericus Joko Wicaksono', 'Tangerang', '081241252555', '1988-11-23', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
