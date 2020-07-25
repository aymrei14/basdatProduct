-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 04:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubeslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `idberkas` varchar(200) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `tema` varchar(300) NOT NULL,
  `berkas` varchar(500) NOT NULL,
  `statusberkas` enum('Terkirim','Lolos','Gagal') NOT NULL,
  `idpeserta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`idberkas`, `waktu`, `tema`, `berkas`, `statusberkas`, `idpeserta`) VALUES
('0BMHQ9', '2020-06-10 00:49:05', 'Satu dua tiga', 'IMG_20180523_000118.jpg', 'Gagal', '2GU4NP'),
('2JK6XA', '2020-07-07 05:15:40', 'Aku ingin begini', 'IMG-20180818-WA0008.jpg', 'Terkirim', '2GU4NP'),
('C2ZJEN', '2020-06-10 00:48:44', 'Apa Siapa Dimana Kapan', 'IMG_20180523_000420.jpg', 'Terkirim', '2GU4NP'),
('DQZTYM', '2020-07-06 07:18:01', 'Happy', 'WhatsApp Image 2020-06-26 at 12.49.29 PM (5).jpeg', 'Terkirim', 'FA9GM4'),
('FBLGOA', '2020-07-03 01:26:37', 'Day6', 'WhatsApp Image 2020-06-26 at 1.12.41 PM.jpeg', 'Lolos', 'FA9GM4'),
('H8SRGL', '2020-07-07 05:17:20', 'ZXCDSA', '82af32e65d81ebcb59f2a09eaefd9343.jpg', 'Terkirim', '2GU4NP'),
('HO71D8', '2020-07-06 10:45:37', 'Ghin', 'IMG_0006.jpg', 'Terkirim', 'FA9GM4'),
('Y9CHU3', '2020-07-06 07:15:27', 'azsxdcfvgbhnjm', 'hh.PNG', 'Lolos', '2GU4NP'),
('YTKP8X', '2020-06-10 00:47:44', 'Aku ingin begituuuu', 'IMG_20171201_185512.jpg', 'Lolos', '2GU4NP');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` varchar(100) NOT NULL,
  `emailperusahaan` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `idlevel` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `emailperusahaan`, `password`, `idlevel`) VALUES
('BLANKPUBLISH024', 'blankpublishcompetition@gmail.com', 'blank000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `idpeserta` varchar(200) NOT NULL,
  `namadepan` varchar(200) NOT NULL,
  `namabelakang` varchar(200) NOT NULL,
  `status` enum('Mahasiswa/i','Siswa/i','Umum') NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idlevel` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`idpeserta`, `namadepan`, `namabelakang`, `status`, `alamat`, `nohp`, `email`, `password`, `idlevel`) VALUES
('2GU4NP', 'Ghina', 'Khoerunnisaa', 'Mahasiswa/i', 'Jl. Unib Permai blok 1 no. 3 RT 11 RW 03 Pematang Gubernur, Kec Muara Bangkahulu\r\nJl. Umayah 1 Kav 6 Kos Rumah Asri Bandung, Jawa Barat', '085279630592', 'gkhoerunnisa@gmail.com', 'asd', 2),
('FA9GM4', 'Sungjin', 'Park', 'Umum', 'Jl. blablabla', '1234567890', 'psjdeisik@gmail.com', 'psj', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`idberkas`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idperusahaan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`idpeserta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
