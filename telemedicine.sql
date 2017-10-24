-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 08:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telemedicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `email`, `nama_dokter`, `password`) VALUES
(4, 'testdokter@gmail.com', 'Dr.Test', 'e797b4fee3afb7bd7419ae0276662a45');

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `emergency_phone` varchar(100) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `id_dokter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`id_pasien`, `nama_pasien`, `email`, `password`, `device_id`, `alamat`, `jenis_kelamin`, `phone`, `emergency_phone`, `usia`, `id_dokter`) VALUES
(1, 'testdaftar', 'testdaftar@gmail.com', '1cdcb97dc82507dcd1400d133e015c51', 'testdaftar', 'testdaftar', 'Laki-laki', '', '', '', 4),
(2, 'testdaftar2', 'testdaftar2@gmail.com', '0e794688823b28b614dcbd052273f0ef', 'testdaftar2', 'testdaftar2', 'Laki-laki', '', '', '', 4),
(14, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'Laki', '', '', '', 4),
(15, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'Laki', '', '', '', 4),
(16, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'P', '', '', '', 4),
(17, 'testapi', 'testapi@gmail.com', 'c40b0c360f3d4959b53b103b25759542', 'testapi', 'testapi', '1', '', '', '', 4),
(18, 'testapi', 'testapi@gmail.com', 'c40b0c360f3d4959b53b103b25759542', 'testapi', 'testapi', 'Laki-laki', '', '', '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD CONSTRAINT `id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
