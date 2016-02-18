-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2016 at 06:09 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(10) NOT NULL AUTO_INCREMENT,
  `id_jadwal_mahasiswa` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time DEFAULT NULL,
  `status` enum('alfa','hadir','izin') NOT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `id_jadwal_mahasiswa` (`id_jadwal_mahasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_jadwal_mahasiswa`, `tanggal`, `jam`, `status`) VALUES
(1, 2, '2015-07-06', '00:00:00', 'hadir'),
(2, 5, '2015-07-06', '00:00:00', 'hadir'),
(3, 3, '2015-07-06', '00:00:00', 'hadir'),
(4, 11, '2015-07-06', '00:00:00', 'hadir'),
(5, 2, '2015-07-13', '00:00:00', 'alfa'),
(6, 5, '2015-07-13', '00:00:00', 'alfa'),
(7, 3, '2015-07-13', '00:00:00', 'hadir'),
(8, 11, '2015-07-13', '00:00:00', 'hadir'),
(9, 2, '2015-07-20', '00:00:00', 'hadir'),
(10, 5, '2015-07-20', '00:00:00', 'hadir'),
(11, 3, '2015-07-20', '00:00:00', 'hadir'),
(12, 11, '2015-07-20', '00:00:00', 'alfa'),
(13, 2, '2015-07-27', '00:00:00', 'hadir'),
(14, 5, '2015-07-27', '00:00:00', 'hadir'),
(15, 3, '2015-07-27', '00:00:00', 'hadir'),
(16, 11, '2015-07-27', '00:00:00', 'hadir'),
(17, 2, '2015-08-03', '00:00:00', 'hadir'),
(18, 5, '2015-08-03', '00:00:00', 'hadir'),
(19, 3, '2015-08-03', '00:00:00', 'hadir'),
(20, 11, '2015-08-03', '00:00:00', 'hadir'),
(21, 2, '2015-08-10', '00:00:00', 'hadir'),
(22, 5, '2015-08-10', '00:00:00', 'hadir'),
(23, 3, '2015-08-10', '00:00:00', 'hadir'),
(24, 11, '2015-08-10', '00:00:00', 'hadir'),
(25, 2, '2015-08-17', '00:00:00', 'hadir'),
(26, 5, '2015-08-17', '00:00:00', 'hadir'),
(27, 3, '2015-08-17', '00:00:00', 'hadir'),
(28, 11, '2015-08-17', '00:00:00', 'hadir'),
(29, 2, '2015-08-24', '00:00:00', 'hadir'),
(30, 5, '2015-08-24', '00:00:00', 'hadir'),
(31, 3, '2015-08-24', '00:00:00', 'hadir'),
(32, 11, '2015-08-24', '00:00:00', 'alfa'),
(33, 2, '2015-08-31', '00:00:00', 'hadir'),
(34, 5, '2015-08-31', '00:00:00', 'hadir'),
(35, 3, '2015-08-31', '00:00:00', 'hadir'),
(36, 11, '2015-08-31', '00:00:00', 'hadir'),
(37, 2, '2015-09-07', '00:00:00', 'hadir'),
(38, 5, '2015-09-07', '00:00:00', 'hadir'),
(39, 3, '2015-09-07', '00:00:00', 'alfa'),
(40, 11, '2015-09-07', '00:00:00', 'alfa'),
(41, 2, '2015-09-14', '00:00:00', 'hadir'),
(42, 5, '2015-09-14', '00:00:00', 'hadir'),
(43, 3, '2015-09-14', '00:00:00', 'hadir'),
(44, 11, '2015-09-14', '00:00:00', 'hadir'),
(45, 2, '2015-09-21', '00:00:00', 'hadir'),
(46, 5, '2015-09-21', '00:00:00', 'hadir'),
(47, 3, '2015-09-21', '00:00:00', 'alfa'),
(48, 11, '2015-09-21', '00:00:00', 'hadir'),
(49, 8, '2015-07-07', '00:00:00', 'hadir'),
(50, 8, '2015-07-14', '00:00:00', 'hadir'),
(51, 8, '2015-07-21', '00:00:00', 'hadir'),
(52, 8, '2015-07-28', '00:00:00', 'hadir'),
(53, 8, '2015-08-04', '00:00:00', 'hadir'),
(54, 8, '2015-08-11', '00:00:00', 'hadir'),
(55, 8, '2015-08-18', '00:00:00', 'hadir'),
(56, 8, '2015-08-25', '00:00:00', 'hadir'),
(57, 8, '2015-09-01', '00:00:00', 'hadir'),
(58, 8, '2015-09-08', '00:00:00', 'hadir'),
(59, 8, '2015-09-15', '00:00:00', 'alfa'),
(60, 8, '2015-09-22', '00:00:00', 'hadir'),
(61, 6, '2015-07-08', '00:00:00', 'hadir'),
(62, 9, '2015-07-08', '00:00:00', 'hadir'),
(63, 4, '2015-07-08', '00:00:00', 'hadir'),
(64, 12, '2015-07-08', '00:00:00', 'hadir'),
(65, 7, '2015-07-08', '00:00:00', 'hadir'),
(66, 10, '2015-07-08', '00:00:00', 'alfa'),
(67, 6, '2015-07-15', '00:00:00', 'hadir'),
(68, 9, '2015-07-15', '00:00:00', 'hadir'),
(69, 4, '2015-07-15', '00:00:00', 'hadir'),
(70, 12, '2015-07-15', '00:00:00', 'hadir'),
(71, 7, '2015-07-15', '00:00:00', 'hadir'),
(72, 10, '2015-07-15', '00:00:00', 'hadir'),
(73, 6, '2015-07-22', '00:00:00', 'hadir'),
(74, 9, '2015-07-22', '00:00:00', 'hadir'),
(75, 4, '2015-07-22', '00:00:00', 'hadir'),
(76, 12, '2015-07-22', '00:00:00', 'hadir'),
(77, 7, '2015-07-22', '00:00:00', 'hadir'),
(78, 10, '2015-07-22', '00:00:00', 'hadir'),
(79, 6, '2015-07-29', '00:00:00', 'hadir'),
(80, 9, '2015-07-29', '00:00:00', 'hadir'),
(81, 4, '2015-07-29', '00:00:00', 'alfa'),
(82, 12, '2015-07-29', '00:00:00', 'hadir'),
(83, 7, '2015-07-29', '00:00:00', 'hadir'),
(84, 10, '2015-07-29', '00:00:00', 'hadir'),
(85, 6, '2015-08-05', '00:00:00', 'hadir'),
(86, 9, '2015-08-05', '00:00:00', 'hadir'),
(87, 4, '2015-08-05', '00:00:00', 'hadir'),
(88, 12, '2015-08-05', '00:00:00', 'hadir'),
(89, 7, '2015-08-05', '00:00:00', 'hadir'),
(90, 10, '2015-08-05', '00:00:00', 'hadir'),
(91, 6, '2015-08-12', '00:00:00', 'hadir'),
(92, 9, '2015-08-12', '00:00:00', 'hadir'),
(93, 4, '2015-08-12', '00:00:00', 'hadir'),
(94, 12, '2015-08-12', '00:00:00', 'hadir'),
(95, 7, '2015-08-12', '00:00:00', 'alfa'),
(96, 10, '2015-08-12', '00:00:00', 'hadir'),
(97, 6, '2015-08-19', '00:00:00', 'hadir'),
(98, 9, '2015-08-19', '00:00:00', 'alfa'),
(99, 4, '2015-08-19', '00:00:00', 'hadir'),
(100, 12, '2015-08-19', '00:00:00', 'hadir'),
(101, 7, '2015-08-19', '00:00:00', 'hadir'),
(102, 10, '2015-08-19', '00:00:00', 'hadir'),
(103, 6, '2015-08-26', '00:00:00', 'hadir'),
(104, 9, '2015-08-26', '00:00:00', 'hadir'),
(105, 4, '2015-08-26', '00:00:00', 'hadir'),
(106, 12, '2015-08-26', '00:00:00', 'alfa'),
(107, 7, '2015-08-26', '00:00:00', 'hadir'),
(108, 10, '2015-08-26', '00:00:00', 'hadir'),
(109, 6, '2015-09-02', '00:00:00', 'hadir'),
(110, 9, '2015-09-02', '00:00:00', 'hadir'),
(111, 4, '2015-09-02', '00:00:00', 'hadir'),
(112, 12, '2015-09-02', '00:00:00', 'alfa'),
(113, 7, '2015-09-02', '00:00:00', 'alfa'),
(114, 10, '2015-09-02', '00:00:00', 'hadir'),
(115, 6, '2015-09-09', '00:00:00', 'hadir'),
(116, 9, '2015-09-09', '00:00:00', 'hadir'),
(117, 4, '2015-09-09', '00:00:00', 'alfa'),
(118, 12, '2015-09-09', '00:00:00', 'hadir'),
(119, 7, '2015-09-09', '00:00:00', 'hadir'),
(120, 10, '2015-09-09', '00:00:00', 'hadir'),
(121, 6, '2015-09-16', '00:00:00', 'hadir'),
(122, 9, '2015-09-16', '00:00:00', 'hadir'),
(123, 4, '2015-09-16', '00:00:00', 'hadir'),
(124, 12, '2015-09-16', '00:00:00', 'hadir'),
(125, 7, '2015-09-16', '00:00:00', 'hadir'),
(126, 10, '2015-09-16', '00:00:00', 'hadir'),
(127, 6, '2015-09-23', '00:00:00', 'alfa'),
(128, 9, '2015-09-23', '00:00:00', 'alfa'),
(129, 4, '2015-09-23', '00:00:00', 'hadir'),
(130, 12, '2015-09-23', '00:00:00', 'hadir'),
(131, 7, '2015-09-23', '00:00:00', 'hadir'),
(132, 10, '2015-09-23', '00:00:00', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(10) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`) VALUES
(1, 'Arif Widyantoro'),
(2, 'Fakhrurifqi'),
(3, 'Isnoor L'),
(4, 'Indargo Adi');

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint`
--

CREATE TABLE IF NOT EXISTS `fingerprint` (
  `id_fingerprint` int(3) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  PRIMARY KEY (`id_fingerprint`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fingerprint`
--

INSERT INTO `fingerprint` (`id_fingerprint`, `ip_address`) VALUES
(1, '192.168.1.201'),
(2, '192.168.1.202'),
(3, '192.168.1.203'),
(4, '192.168.1.204'),
(5, '192.168.1.205'),
(6, '192.168.1.206');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
  `id_hari` int(1) NOT NULL,
  `hari` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(0, 'Minggu'),
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum''at'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_kuliah` int(5) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `semester` int(1) NOT NULL,
  `id_ruang` int(3) NOT NULL,
  `id_hari` int(1) NOT NULL,
  `id_sesi` int(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_ruang` (`id_ruang`),
  KEY `id_hari` (`id_hari`),
  KEY `id_sesi` (`id_sesi`),
  KEY `id_dosen` (`id_dosen`),
  KEY `semester` (`semester`),
  KEY `id_mata_kuliah` (`id_mata_kuliah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mata_kuliah`, `id_dosen`, `semester`, `id_ruang`, `id_hari`, `id_sesi`) VALUES
(1, 1, 3, 3, 1, 1, 1),
(2, 2, 3, 3, 1, 2, 1),
(3, 3, 2, 5, 2, 1, 2),
(4, 4, 2, 5, 2, 3, 1),
(5, 5, 1, 3, 1, 3, 2),
(6, 6, 1, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jadwal_kuliah`
--
CREATE TABLE IF NOT EXISTS `jadwal_kuliah` (
`id_jadwal` int(11)
,`mata_kuliah` varchar(20)
,`nama_dosen` varchar(20)
,`ruang` varchar(10)
,`hari` varchar(10)
,`jam` time
);
-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `jadwal_mahasiswa` (
  `id_jadwal_mahasiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nim` int(15) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal_mahasiswa`),
  KEY `nim` (`nim`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jadwal_mahasiswa`
--

INSERT INTO `jadwal_mahasiswa` (`id_jadwal_mahasiswa`, `nim`, `id_jadwal`) VALUES
(2, 331, 1),
(3, 331, 3),
(4, 331, 5),
(5, 332, 1),
(6, 332, 4),
(7, 332, 6),
(8, 333, 2),
(9, 333, 4),
(10, 333, 6),
(11, 334, 3),
(12, 334, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(10) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'komsi'),
(2, 'elins'),
(3, 'rekam medis'),
(4, 'meteorologi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` int(15) NOT NULL,
  `nama_mahasiswa` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `semester` int(2) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `semester` (`semester`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `alamat`, `telepon`, `id_jurusan`, `semester`) VALUES
(331, 'Efendi Hasan', 'Klaten', '1994-07-29', 'Islam', 'L', 'Klaten', '085643944895', 1, 7),
(332, 'Hasan', 'Jogja', '1995-09-06', 'Islam', 'L', 'Jogjakarta', '08776445556', 1, 5),
(333, 'Aziz', 'Muntilan', '1994-08-24', 'Islam', 'L', 'Muntilan ', '0887766777677', 1, 5),
(334, 'Rio', 'Magelang', '1997-12-01', 'Islam', 'L', 'Magelang', '086445445445', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id_mata_kuliah` int(5) NOT NULL,
  `kode_mata_kuliah` varchar(10) NOT NULL,
  `mata_kuliah` varchar(20) NOT NULL,
  `semester` int(2) NOT NULL,
  PRIMARY KEY (`id_mata_kuliah`),
  KEY `semester` (`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mata_kuliah`, `kode_mata_kuliah`, `mata_kuliah`, `semester`) VALUES
(1, 'VMK2001', 'Alpro A', 3),
(2, 'VMK2001', 'Alpro B', 3),
(3, 'VMK2002', 'PBO A', 5),
(4, 'VMK2002', 'PBO B', 5),
(5, 'VMK2003', 'SPK A', 3),
(6, 'VMK2003', 'SPK B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `id_ruang` int(3) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `id_fingerprint` int(15) NOT NULL,
  PRIMARY KEY (`id_ruang`),
  KEY `id_fingerprint` (`id_fingerprint`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `ruang`, `id_fingerprint`) VALUES
(1, 'SV101', 1),
(2, 'SV102', 2),
(3, 'SV103', 3),
(4, 'SV104', 4),
(5, 'SV105', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ruangan`
--
CREATE TABLE IF NOT EXISTS `ruangan` (
`ruang` varchar(10)
,`ip_address` varchar(15)
);
-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `semester` int(2) NOT NULL,
  `jenis_semester` enum('ganjil','genap') NOT NULL,
  PRIMARY KEY (`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`, `jenis_semester`) VALUES
(1, 'ganjil'),
(2, 'genap'),
(3, 'ganjil'),
(4, 'genap'),
(5, 'ganjil'),
(6, 'genap'),
(7, 'ganjil'),
(8, 'genap'),
(9, 'ganjil'),
(10, 'genap'),
(11, 'ganjil'),
(12, 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `sesi`
--

CREATE TABLE IF NOT EXISTS `sesi` (
  `id_sesi` int(1) NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id_sesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `jam`) VALUES
(1, '07:00:00'),
(2, '09:00:00'),
(3, '11:00:00'),
(4, '13:00:00'),
(5, '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user1', '24c9e15e52afc47c225b');

-- --------------------------------------------------------

--
-- Structure for view `jadwal_kuliah`
--
DROP TABLE IF EXISTS `jadwal_kuliah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_kuliah` AS select `jadwal`.`id_jadwal` AS `id_jadwal`,`mata_kuliah`.`mata_kuliah` AS `mata_kuliah`,`dosen`.`nama_dosen` AS `nama_dosen`,`ruang`.`ruang` AS `ruang`,`hari`.`hari` AS `hari`,`sesi`.`jam` AS `jam` from (((((`jadwal` join `mata_kuliah`) join `dosen`) join `ruang`) join `hari`) join `sesi`) where ((`jadwal`.`id_mata_kuliah` = `mata_kuliah`.`id_mata_kuliah`) and (`jadwal`.`id_dosen` = `dosen`.`id_dosen`) and (`jadwal`.`id_ruang` = `ruang`.`id_ruang`) and (`jadwal`.`id_hari` = `hari`.`id_hari`) and (`jadwal`.`id_sesi` = `sesi`.`id_sesi`));

-- --------------------------------------------------------

--
-- Structure for view `ruangan`
--
DROP TABLE IF EXISTS `ruangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ruangan` AS select `ruang`.`ruang` AS `ruang`,`fingerprint`.`ip_address` AS `ip_address` from (`ruang` join `fingerprint`) where (`fingerprint`.`id_fingerprint` = `ruang`.`id_fingerprint`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_jadwal_mahasiswa`) REFERENCES `jadwal_mahasiswa` (`id_jadwal_mahasiswa`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_sesi`) REFERENCES `sesi` (`id_sesi`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `jadwal_ibfk_6` FOREIGN KEY (`semester`) REFERENCES `semester` (`semester`),
  ADD CONSTRAINT `jadwal_ibfk_7` FOREIGN KEY (`id_mata_kuliah`) REFERENCES `mata_kuliah` (`id_mata_kuliah`),
  ADD CONSTRAINT `jadwal_ibfk_8` FOREIGN KEY (`id_mata_kuliah`) REFERENCES `mata_kuliah` (`id_mata_kuliah`);

--
-- Constraints for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD CONSTRAINT `jadwal_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `jadwal_mahasiswa_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `semester` (`semester`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`semester`) REFERENCES `semester` (`semester`);

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`id_fingerprint`) REFERENCES `fingerprint` (`id_fingerprint`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
