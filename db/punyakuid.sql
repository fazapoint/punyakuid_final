-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 11:40 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `punyakuid`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `id_bh` int(5) NOT NULL,
  `id_ktg_barang` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama_bh` varchar(50) NOT NULL,
  `tgl_bh` date NOT NULL,
  `lokasi_bh` varchar(50) NOT NULL,
  `penyebab_bh` varchar(50) NOT NULL,
  `gambar_bh` varchar(110) NOT NULL,
  `pesan_bh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_hilang`
--

INSERT INTO `barang_hilang` (`id_bh`, `id_ktg_barang`, `id_user`, `id_kota`, `id_status`, `nama_bh`, `tgl_bh`, `lokasi_bh`, `penyebab_bh`, `gambar_bh`, `pesan_bh`) VALUES
(24, 2, 56, 3, 4, 'dompet', '2021-01-30', 'di sana', 'terjatuhh', '234-bb7.jpg', ''),
(27, 5, 62, 4, 3, 'buku a', '2021-01-05', 'aa', 'sadsad', '81-bb12.jpg', ''),
(28, 3, 62, 1, 3, 'rok', '2021-01-05', 'aasds', 'asdasd', '582-bb11.jpg', ''),
(29, 6, 56, 3, 1, 'dokumen penting', '2021-01-06', 'di jalan raya', 'terjatuh', '64-bb13.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_ktg_barang` int(5) NOT NULL,
  `ktg_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_ktg_barang`, `ktg_barang`) VALUES
(1, 'elektronik'),
(2, 'aksesoriss'),
(3, 'fashion'),
(5, 'buku'),
(6, 'dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Yogyakarta'),
(2, 'Solo'),
(3, 'Klaten'),
(4, 'Purworejo');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `perihal_pesan` varchar(100) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `perihal_pesan`, `isi_pesan`) VALUES
(3, 56, 'tambah kota', 'tambah kota samarinda'),
(5, 62, 'kehilangan', 'tambahin fitur orang dong min');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `ket_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `ket_status`) VALUES
(1, 'PENDING'),
(2, 'DITOLAK'),
(3, 'TERBIT'),
(4, 'TERSELESAIKAN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `level` varchar(15) NOT NULL,
  `gambar_user` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `alamat`, `no_hp`, `level`, `gambar_user`) VALUES
(50, 'Anisykurli faza ramadhanii', 'fazaramadhani99@gmail.com', 'faza', '$2y$10$IyRaite6oIyzVxDSBk7ZP.KtjugwGBoMYJp9wDxW18y.q3Lz.ysBK', 'krapyak', '08250182', 'admin', '79-pp8.jpg'),
(56, 'Imam faturohim', 'imam@gmail.com', 'imam', '$2y$10$glTldGVGIHbGY8ywWRpu/.YZ71cln/MpkpS8JagHl8hOPK6.hdUE2', 'kalongan', '91234831', 'user', '658-pp.jpg'),
(62, 'faraz lazurdi', 'faraz@gmail.com', 'faraz_', '$2y$10$0PdAnD2QVFBNRnhL.hsqBeC3x9RHq7URpjLzeKYvSHRKzWD90BTZK', 'kroya', '08123', 'user', '699-pp5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`id_bh`),
  ADD KEY `id_kategori_barang` (`id_ktg_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kota_on_barang_hilang` (`id_kota`),
  ADD KEY `id_status_on_barang_hilang` (`id_status`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_ktg_barang`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user_on_pesan` (`id_user`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  MODIFY `id_bh` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_ktg_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD CONSTRAINT `id_kategori_barang` FOREIGN KEY (`id_ktg_barang`) REFERENCES `kategori_barang` (`id_ktg_barang`),
  ADD CONSTRAINT `id_kota_on_barang_hilang` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `id_status_on_barang_hilang` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `id_user_on_barang_hilang` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `id_user_on_pesan` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
