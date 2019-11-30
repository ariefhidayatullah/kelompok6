-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 02:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `prov`
--

CREATE TABLE `prov` (
  `id_prov` int(2) NOT NULL,
  `nama_prov` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prov`
--

INSERT INTO `prov` (`id_prov`, `nama_prov`) VALUES
(11, 'Aceh\r'),
(12, 'Sumatera Utara\r'),
(13, 'Sumatera Barat\r'),
(14, 'Riau\r'),
(15, 'Jambi\r'),
(16, 'Sumatera Selatan\r'),
(17, 'Bengkulu\r'),
(18, 'Lampung\r'),
(19, 'Kepulauan Bangka Belitung\r'),
(21, 'Kepulauan Riau\r'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat\r'),
(33, 'Jawa Tengah\r'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur\r'),
(36, 'Banten\r'),
(51, 'Bali\r'),
(52, 'Nusa Tenggara Barat\r'),
(53, 'Nusa Tenggara Timur\r'),
(61, 'Kalimantan Barat\r'),
(62, 'Kalimantan Tengah\r'),
(63, 'Kalimantan Selatan\r'),
(64, 'Kalimantan Timur\r'),
(71, 'Sulawesi Utara\r'),
(72, 'Sulawesi Tengah\r'),
(73, 'Sulawesi Selatan\r'),
(74, 'Sulawesi Tenggara\r'),
(75, 'Gorontalo\r'),
(76, 'Sulawesi Barat\r'),
(81, 'Maluku\r'),
(82, 'Maluku Utara\r'),
(91, 'Papua Barat\r'),
(94, 'Papua\r');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prov`
--
ALTER TABLE `prov`
  ADD PRIMARY KEY (`id_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
