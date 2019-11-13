-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 02.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `email`, `nohp_admin`) VALUES
('ADM001', 'Erlan Subowo', '', '', 'erlansubowo@gmail.com', '082263736371'),
('ADM002', 'Bima Bagaskara', '', '', 'bimakenong22@gmail.com', '087757221345'),
('ADM003', 'mohammad arief hidayatullah', 'admin', '$2y$10$jHxQTAYyz.0JOoqxW2SsyuR', 'mzboy2606@gmail.com', ''),
('ADM004', 'arfhdytllh', 'arfhdytllh', '$2y$10$uPHzVkO0Rd1F7Wj.AVuncuhGaNwiia1zjMaRnOMj6aJka6vJiYFha', 'mzboy2606@gmail.com', '087887879907'),
('ADM005', 'mohammad arief hidayatullah', 'joss', '$2y$10$65qNMGdZ7FdkmxBWo72v3.vVyjSj5jwT.BY/713vVeajYCTPAxwxa', 'mzboy2606@gmail.com', '087887879907'),
('ADM006', 'taufik kasrun', 'hahafik', '$2y$10$.t0nKsQHuUacjTRj4LTt7.nELEaUS8KXVs7nlsCKAVQ6zIIbbskES', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `id_produk`, `stok`, `harga_satuan`) VALUES
('B001', 'Finel 150 g', 'P001', 200, 0),
('B002', 'Finel 200 g', 'P001', 200, 0),
('B003', 'Frontlite 280 gr', 'P001', 200, 0),
('B004', 'Frontlite 310 gr', 'P001', 200, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_krw` varchar(10) NOT NULL,
  `nama_krw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp_krw` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_krw`, `nama_krw`, `email`, `nohp_krw`) VALUES
('KRW001', 'Taufik Hariyanto', 'taufikprolink@gmail.com', '087713553441'),
('KRW002', 'Arief Yulistyo', 'arief77@gmail.com', '082287474112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk_stokbahan`
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
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `kodepos` varchar(7) NOT NULL,
  `ongkir` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`kodepos`, `ongkir`) VALUES
('68211', '2000'),
('68212', '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pesan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kodepos` varchar(7) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `ongkir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `id_krw` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `jenis_produk` varchar(10) NOT NULL,
  `gambar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_produk`, `gambar`) VALUES
('P001', 'Bannerere', '5dc906f06d3ae.png'),
('P002', 'Ban', ''),
('P003', 'Bus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kodepos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `id_pesan` (`id_pesan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_krw`);

--
-- Indeks untuk tabel `masuk_stokbahan`
--
ALTER TABLE `masuk_stokbahan`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`kodepos`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD KEY `id_pemesanan` (`id_pesan`),
  ADD KEY `kodepos` (`kodepos`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_krw` (`id_krw`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `bahan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Ketidakleluasaan untuk tabel `masuk_stokbahan`
--
ALTER TABLE `masuk_stokbahan`
  ADD CONSTRAINT `masuk_stokbahan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `masuk_stokbahan_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kodepos`) REFERENCES `ongkir` (`kodepos`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_krw`) REFERENCES `karyawan` (`id_krw`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
