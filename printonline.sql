-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 02:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp_admin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `email`, `nohp_admin`) VALUES
('ADM001', 'Erlan Subowo', '', '', 'erlansubowo@gmail.com', '082263736371'),
('ADM002', 'Bima Bagaskara', '', '', 'bimakenong22@gmail.com', '087757221345'),
('ADM003', 'mohammad arief hidayatullah', 'admin', '$2y$10$jHxQTAYyz.0JOoqxW2SsyuR', 'mzboy2606@gmail.com', ''),
('ADM004', 'arfhdytllh', 'arfhdytllh', '$2y$10$uPHzVkO0Rd1F7Wj.AVuncuhGaNwiia1zjMaRnOMj6aJka6vJiYFha', 'mzboy2606@gmail.com', '087887879907'),
('ADM005', 'mohammad arief hidayatullah', 'joss', '$2y$10$65qNMGdZ7FdkmxBWo72v3.vVyjSj5jwT.BY/713vVeajYCTPAxwxa', 'mzboy2606@gmail.com', '087887879907');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `id_produk`, `stok`, `harga_satuan`) VALUES
('B001', 'Finel 150 g', 'P001', 200, 0),
('B002', 'Finel 200 g', 'P001', 200, 0),
('B003', 'Frontlite 280 gr', 'P001', 200, 0),
('B004', 'Frontlite 310 gr', 'P001', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pesan` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_krw` varchar(10) NOT NULL,
  `nama_krw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp_krw` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_krw`, `nama_krw`, `email`, `nohp_krw`) VALUES
('KRW001', 'Taufik Hariyanto', 'taufikprolink@gmail.com', '087713553441'),
('KRW002', 'Arief Yulistyo', 'arief77@gmail.com', '082287474112');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_stokbahan`
--

CREATE TABLE `masuk_stokbahan` (
  `id_masuk` varchar(10) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `id_bahan` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `stok_baru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `jangkauan` varchar(200) NOT NULL,
  `kodepos` varchar(7) NOT NULL,
  `ongkir` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`jangkauan`, `kodepos`, `ongkir`) VALUES
('Kec. Bondowoso, Kec. Tegalampel, Kec.Tenggarang, Kec. Curahdami', '68211', '2000'),
('Kec. Grujugan, Kec. Jambesari Darussolah, Kec. Taman Krocok, Kec. Wonosari, Kec. Pujer', '68212', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` varchar(10) NOT NULL,
  `id_pesan` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kodepos` varchar(7) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `ongkir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `id_krw` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `jenis_produk` varchar(10) NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_produk`, `gambar`) VALUES
('P001', 'Banner', '5dc906f06d3ae.png'),
('P002', 'id card ', '5dc92eeab461e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodepos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `nohp_user`, `alamat`, `kodepos`) VALUES
('USR001', 'Fabryzal Adam Pramud', 'ryzaldm@gmail.com', '082229024685', 'Jl. R.E Martadinata gg4 RT 24/RW 05, Kec. Bondowoso', '68211'),
('USR002', 'Mohammad Arief HIday', 'ariefhidayatullah@gmail.c', '087712178273', 'Kec. Tapen', '68212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `id_pesan` (`id_pesan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_krw`);

--
-- Indexes for table `masuk_stokbahan`
--
ALTER TABLE `masuk_stokbahan`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`kodepos`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_pemesanan` (`id_pesan`),
  ADD KEY `kodepos` (`kodepos`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_krw` (`id_krw`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `bahan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Constraints for table `masuk_stokbahan`
--
ALTER TABLE `masuk_stokbahan`
  ADD CONSTRAINT `masuk_stokbahan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `masuk_stokbahan_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kodepos`) REFERENCES `ongkir` (`kodepos`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_krw`) REFERENCES `karyawan` (`id_krw`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
