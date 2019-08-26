-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 09:45 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_prodi` char(2) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nik`, `nama`, `kd_prodi`, `jabatan`) VALUES
('0911001', 'Mahfur Hudori ,S.T.,M.T', '11', 'Head of Study Program'),
('0931001', 'Tony Wibowo,S.Kom.,MMSI', '31', 'Head of Study Program'),
('0941001', 'Ria Karina ,S.E.,MM', '41', 'Head of Study Program'),
('0942001', 'Evi', '42', 'Head of Study Program');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kouhai`
--

CREATE TABLE `tb_kouhai` (
  `npm` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_prodi` char(2) NOT NULL,
  `npm_senpai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kouhai`
--

INSERT INTO `tb_kouhai` (`npm`, `nama`, `kd_prodi`, `npm_senpai`) VALUES
('0831011', 'Dea', '31', '1731013'),
('0831012', 'Alvin', '31', '1731075'),
('1811003', 'Derwin', '31', '1711001'),
('1831001', 'Alex Setiawan', '31', '1731092'),
('1831002', 'Rosita Tandiono', '31', '1731092'),
('1831003', 'Hendi', '31', '1731050'),
('1831005', 'Dhea', '31', '1731013'),
('1831006', 'Hartono', '31', '1731001'),
('1831015', 'Hartono', '31', '1731092'),
('1831022', 'Arif', '31', '1731101');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kd_prodi` char(2) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`kd_prodi`, `nama_prodi`) VALUES
('11', 'Civil Engineer'),
('21', 'Electronic Engineer'),
('31', 'Information System'),
('41', 'Accounting'),
('42', 'Management'),
('43', 'Tourism'),
('51', 'Law Science'),
('61', 'English Education');

-- --------------------------------------------------------

--
-- Table structure for table `tb_senpai`
--

CREATE TABLE `tb_senpai` (
  `npm` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_prodi` char(2) NOT NULL,
  `semester` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_senpai`
--

INSERT INTO `tb_senpai` (`npm`, `nama`, `kd_prodi`, `semester`) VALUES
('1711001', 'Rahmad Fadillah Rasul', '11', '3'),
('1711003', 'Novia Siti Rohana', '11', '3'),
('1731001', 'Fuqih Yuandivo Alhambra', '31', '3'),
('1731013', 'Erwin', '31', '3'),
('1731035', 'Arif', '31', '3'),
('1731050', 'Cindpay Adonia Gunawan', '31', '3'),
('1731075', 'Jimmy Chandra', '31', '3'),
('1731092', 'Alvin Matthew Pratama', '31', '3'),
('1731101', 'Noza Angray', '31', '3'),
('1742001', 'Jack', '42', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `kd_surat` varchar(10) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_date` datetime NOT NULL,
  `sender` varchar(10) NOT NULL,
  `receiver` varchar(10) NOT NULL,
  `read_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`kd_surat`, `subject`, `message`, `sent_date`, `sender`, `receiver`, `read_status`) VALUES
('12181', 'SnK Beta Test WEB', 'Beta Testing', '2018-12-17 09:52:25', 'admin', 'all', 'unread'),
('3112182', 'TEST Message', 'Hello My Head of Study Program', '2018-12-17 09:55:26', '1731092', '0931001', 'unread'),
('3112183', 'TEST Message', 'Hello my Student!', '2018-12-17 09:55:53', '0931001', '1731092', 'unread'),
('3112184', 'TEST Annouce', 'Hello All my Student', '2018-12-17 09:56:15', '0931001', '31', 'unread'),
('12185', 'Hallo Selamat Pagi', 'Untuk Semuanya', '2018-12-18 09:55:30', 'admin', 'all', 'unread'),
('3112186', 'Test Project Hari ini', 'Test', '2018-12-18 09:57:24', '0931001', '1731092', 'unread'),
('3112187', 'Added to be your Kouhai', '1831022 - Arif <br>\r\n	Telah ditambahkan menjadi kouhai, Mohon bimbingannya.\r\n	', '2018-12-18 09:58:42', 'admin', '1731101', 'unread'),
('3112188', 'Test hi sir', 'Test', '2018-12-18 09:59:38', '1731101', '0931001', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kd_user` varchar(10) DEFAULT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `kd_user`, `type_id`) VALUES
('0911001', '12345', '0911001', 1),
('0931001', '12345', '0931001', 1),
('0941001', '12345', '0941001', 1),
('0942001', '12345', '0942001', 1),
('1711001', '12345', '1711001', 2),
('1711002', '12345', '1711002', 2),
('1731001', '12345', '1731001', 2),
('1731013', '12345', '1731013', 2),
('1731035', '12345', '1731035', 2),
('1731050', '12345', '1731050', 2),
('1731075', '12345', '1731075', 2),
('1731092', '12345', '1731092', 2),
('1731101', '12345', '1731101', 2),
('1742001', '12345', '1742001', 2),
('admin', 'admin', 'admin', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `FK_Prodi` (`kd_prodi`);

--
-- Indexes for table `tb_kouhai`
--
ALTER TABLE `tb_kouhai`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `FK_Prodikouhai` (`kd_prodi`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tb_senpai`
--
ALTER TABLE `tb_senpai`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `FK_ProdiSenpai` (`kd_prodi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `FK_Prodi` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_kouhai`
--
ALTER TABLE `tb_kouhai`
  ADD CONSTRAINT `FK_Prodikouhai` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_senpai`
--
ALTER TABLE `tb_senpai`
  ADD CONSTRAINT `FK_ProdiSenpai` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
