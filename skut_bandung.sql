-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 02:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skut_bandung`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `id_destinasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `id_transaksi`, `id_destinasi`) VALUES
(1, 'kosong', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id` int(11) NOT NULL,
  `gambar_fitur` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id`, `gambar_fitur`, `judul`, `keterangan`, `tanggal`) VALUES
(1, 'Fitur QR Code.jpeg', 'Fitur QR Code', 'Fitur akses destinasi dengan qr code untuk transaksi pembayaran dimana saja dan kapan pun.', '2021-05-12 17:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id`, `fullname`, `username`, `email`, `nohp`, `alamat`, `password`, `tanggal`) VALUES
(1, 'Muhammad Ikhwan Fathulloh', 'Ikhwan', 'muhammadikhwanfathulloh17@gmail.com', '+62858982314356', 'Bandung', '1234', '2021-05-12 17:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `saldo` int(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `fullname`, `username`, `email`, `nohp`, `alamat`, `saldo`, `password`, `tanggal`) VALUES
('P-001', 'Muhammad Ikhwan Fathulloh', 'Ikhwan', 'muhammadikhwanfathulloh17@gmail.com', '+62858982314356', 'Bandung', 700000, '1234', '2021-05-12 17:45:23'),
('P-002', 'Shalih Rizaldy', 'Shalih', 'shalihpangandaran@gmail.com', '+62858982314356', 'Pangandaran', 700000, '1234', '2021-05-12 21:48:25'),
('P-003', 'Dimas Aji Permadi', 'Dimas', 'dajip@gmail.com', '+62858982314356', 'Bandung', 700000, '1234', '2021-05-12 21:49:06'),
('P-004', 'Muhammad Firman Hermawan', 'Firman', 'firman@gmail.com', '+6285898231923', 'Majalaya', 700000, '1234', '2021-05-13 13:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_code` varchar(100) NOT NULL,
  `id_pengguna` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0',
  `tanggal_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_code`, `id_pengguna`, `status`, `tanggal_transaksi`) VALUES
('T-001', 'DW-1111', 'P-001', '1', '2021-05-12 17:48:32'),
('T-002', 'DW-1114', 'P-002', '0', '2021-05-14 12:35:48'),
('T-003', 'DW-1111', 'P-003', '0', '2021-05-14 12:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Muhammad Ikhwan Fathulloh', 'muhammadikhwanfathulloh17@gmail.com', NULL, '$2y$10$fzfyfPchXoxdkDhah92K8ud82EFUTwn1sjVUvq56BlNs1Vt10XWyS', NULL, '2021-05-12 03:27:43', '2021-05-12 03:27:43', 2),
(2, 'Dimas Aji Permadi', 'dajip@gmail.com', NULL, '$2y$10$ue0z9jRhZygkWL1SvCFKheZMv7ao9lzBvDe6effCsgGAmG17s.qGu', NULL, '2021-05-12 04:54:06', '2021-05-12 04:54:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_code` varchar(11) NOT NULL,
  `gambar_wisata` varchar(100) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `alamat_wisata` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `harga_wisata` varchar(100) NOT NULL,
  `keterangan_destinasi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_code`, `gambar_wisata`, `nama_wisata`, `alamat_wisata`, `latitude`, `longitude`, `harga_wisata`, `keterangan_destinasi`, `tanggal`) VALUES
('DW-1111', 'DW-1111.jpeg', 'Tebing Keraton', 'Bandung', '31', '29', '5000', 'Keindahan', '2021-05-12 17:47:32'),
('DW-1112', 'DW-1112.jpeg', 'Gedung Sate', 'Bandung', '31', '29', '5000', 'Bersejarah', '2021-05-12 19:32:56'),
('DW-1113', 'DW-1113.jpeg', 'Taman Lily', 'Bandung', '31', '29', '5000', 'Tumbuhan', '2021-05-12 19:33:31'),
('DW-1114', 'DW-1114.jpeg', 'Dago Dream Park', 'Dago', '31', '29', '30000', 'Keindahan', '2021-05-12 19:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
