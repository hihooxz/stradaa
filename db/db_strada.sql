-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Okt 2016 pada 06.06
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_strada`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_class`
--

CREATE TABLE IF NOT EXISTS `st_class` (
  `id_class` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `st_class`
--

INSERT INTO `st_class` (`id_class`, `class_name`) VALUES
(1, 'X-2'),
(2, 'X-1'),
(3, 'X-0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_schedule`
--

CREATE TABLE IF NOT EXISTS `st_schedule` (
  `id_schedule` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `name_schedule` varchar(100) NOT NULL,
  `hour_start` varchar(5) NOT NULL,
  `hour_end` varchar(5) NOT NULL,
  `date_schedule` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_schedule_teachier`
--

CREATE TABLE IF NOT EXISTS `st_schedule_teachier` (
  `id_schedule_teacher` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_teacher1` int(11) NOT NULL,
  `id_teacher2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_setting`
--

CREATE TABLE IF NOT EXISTS `st_setting` (
  `id_setting` int(11) NOT NULL,
  `title_website` varchar(100) NOT NULL,
  `downloadable_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `st_setting`
--

INSERT INTO `st_setting` (`id_setting`, `title_website`, `downloadable_date`) VALUES
(1, 'testzzz', '2016-10-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_student`
--

CREATE TABLE IF NOT EXISTS `st_student` (
  `id_student` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_student_class`
--

CREATE TABLE IF NOT EXISTS `st_student_class` (
  `id_student_class` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_subject`
--

CREATE TABLE IF NOT EXISTS `st_subject` (
  `id_subject` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `st_subject`
--

INSERT INTO `st_subject` (`id_subject`, `subject`, `description`) VALUES
(1, 'FLUXCUP', 'PAPP'),
(2, 'irwin', 'balalalalalalbalblablalbla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_teacher`
--

CREATE TABLE IF NOT EXISTS `st_teacher` (
  `id_teacher` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `st_user`
--

CREATE TABLE IF NOT EXISTS `st_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_input` datetime NOT NULL,
  `permission` tinyint(2) NOT NULL COMMENT '1.admin,2.guru.3murid',
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `st_user`
--

INSERT INTO `st_user` (`id_user`, `username`, `password`, `email`, `last_login`, `date_input`, `permission`, `full_name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@strada', '2016-10-21 10:11:25', '2016-10-21 10:16:25', 1, 'admin strada'),
(3, 'zuhdijung', '7815696ecbf1c96e6894b779456d330e', 'zuhdiaa@gmail.com', '2016-10-21 09:59:28', '2016-10-21 09:59:28', 3, 'zuhdi anak tangerang jung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `st_class`
--
ALTER TABLE `st_class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `st_schedule`
--
ALTER TABLE `st_schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `st_schedule_teachier`
--
ALTER TABLE `st_schedule_teachier`
  ADD PRIMARY KEY (`id_schedule_teacher`);

--
-- Indexes for table `st_setting`
--
ALTER TABLE `st_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `st_student`
--
ALTER TABLE `st_student`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `st_student_class`
--
ALTER TABLE `st_student_class`
  ADD PRIMARY KEY (`id_student_class`);

--
-- Indexes for table `st_subject`
--
ALTER TABLE `st_subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indexes for table `st_teacher`
--
ALTER TABLE `st_teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `st_user`
--
ALTER TABLE `st_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `st_class`
--
ALTER TABLE `st_class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `st_schedule`
--
ALTER TABLE `st_schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_schedule_teachier`
--
ALTER TABLE `st_schedule_teachier`
  MODIFY `id_schedule_teacher` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_setting`
--
ALTER TABLE `st_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `st_student`
--
ALTER TABLE `st_student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_student_class`
--
ALTER TABLE `st_student_class`
  MODIFY `id_student_class` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_subject`
--
ALTER TABLE `st_subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `st_teacher`
--
ALTER TABLE `st_teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st_user`
--
ALTER TABLE `st_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
