-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 03:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nomor_rekening` varchar(25) NOT NULL,
  `nama_nasabah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `nomor_rekening`, `nama_nasabah`) VALUES
(1, 'BCA', '12345678921', 'Semakar Adventure'),
(2, 'MANDIRI', '78777886765', 'Semakar Adventure'),
(7, 'BNI', '23342342423', 'Semakar Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(30) NOT NULL,
  `email_kontak` varchar(30) NOT NULL,
  `subject_kontak` varchar(255) DEFAULT NULL,
  `pesan_kontak` text DEFAULT NULL,
  `tanggal_laporan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id_kontak`, `nama_kontak`, `email_kontak`, `subject_kontak`, `pesan_kontak`, `tanggal_laporan`) VALUES
(22, 'Dicky', 'dickyzs155@gmail.com', 'Tolong tambahkan Warna di halaman detail', 'Tolong Min di proses,Terima kasih', 'Sunday, 12-03-2023  06:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merek`
--

CREATE TABLE `tbl_merek` (
  `id_merek` int(11) NOT NULL,
  `kode_merek` varchar(50) NOT NULL,
  `nama_merek` varchar(50) NOT NULL,
  `gambar_merek` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_merek`
--

INSERT INTO `tbl_merek` (`id_merek`, `kode_merek`, `nama_merek`, `gambar_merek`) VALUES
(9, 'EIG', 'Eiger', '2ab5538823abaa59813525f1a70e7d6f.png'),
(10, 'CON', 'Consina', '432021f6278adbcf5f44a05bc72bf6f8.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `email_pelanggan` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gambar_pelanggan` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nik_ktp` varchar(20) DEFAULT NULL,
  `upload_ktp` varchar(50) DEFAULT NULL,
  `no_sim` varchar(20) DEFAULT NULL,
  `upload_sim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password`, `gambar_pelanggan`, `is_active`, `status`, `nik_ktp`, `upload_ktp`, `no_sim`, `upload_sim`) VALUES
(19, 'Zainul', 'zainularifin2897@gmail.com', '12345', '3fcbe31747189f2aa93374f37102b8fb.jpeg', 1, 1, '32232422332423', '4b635694d4968eaa92cba695b71203ae.jpeg', '12321231231233', 'aed91b3fa284debfd99bbf681f5ac253.jpg'),
(20, 'dicky', 'dickyzs155@gmail.com', '12345', '08528dd112e8b7fb775845c02b95b5c5.png', 1, 1, '123123123', 'ca9d71131ee38cfe28f2c0d8999c59bb.png', '4564645', '87b57b72f6b55af4469fbc3811824de3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama_produk` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(228) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_produk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `warna` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kapasitas` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_type`, `id_merek`, `nama_produk`, `slug`, `no_produk`, `warna`, `kapasitas`, `status`, `harga`, `gambar`) VALUES
(1, 33, 9, 'Tenda Camping Eiger Guardian 8P Kapasitas 8 Orang 3785', 'tenda-camping-eiger-guardian-8p-kapasitas-8-orang-3785', '3785', 'Coklat - Hitam', '8', '1', 80000, 'd4a2aaf797755b7366d4a3c95ada084b.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(20) NOT NULL,
  `nama_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id_type`, `kode_type`, `nama_type`) VALUES
(33, 'TDA', 'Tenda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL,
  `photo_user` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level_user`, `status_user`, `photo_user`) VALUES
(1, 'admin1', 'admin@gmail.com', '12345', 1, 1, '555c9bc4d25aa0e0fa9aaa65f2e75ee0.jpg'),
(5, 'karyawan', 'user@gmail.com', '12345', 2, 1, 'acfa1a2fe93a36df7a5f680465b40350.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_order` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status_message` varchar(50) NOT NULL,
  `gross_amount` int(20) NOT NULL,
  `bank` varchar(28) NOT NULL,
  `va_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_order`, `nama`, `email`, `status_message`, `gross_amount`, `bank`, `va_number`) VALUES
(797289331, 'TAS PUMA', 'zainularifin2897@gmail.com', 'Transaksi sedang diproses', 100000, 'bca', '92611931072'),
(1511231572, 'JAM Tangan Test', 'arifin281297@gmail.com', 'Transaksi sedang diproses', 88000, 'bca', '92611426668');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `harga` varchar(120) NOT NULL,
  `berapa_hari` varchar(128) NOT NULL,
  `sub_total` varchar(128) NOT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `total_bayar` int(120) DEFAULT NULL,
  `atas_nama_pelanggan` varchar(128) DEFAULT NULL,
  `nama_bank_pelanggan` varchar(128) DEFAULT NULL,
  `nomor_rekening_pelanggan` varchar(128) DEFAULT NULL,
  `bukti_pembayaran` varchar(120) DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status_pengembalian` varchar(50) DEFAULT NULL,
  `total_denda` int(120) DEFAULT NULL,
  `status_rental` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_produk`, `tanggal_rental`, `tanggal_kembali`, `harga`, `berapa_hari`, `sub_total`, `status_pembayaran`, `total_bayar`, `atas_nama_pelanggan`, `nama_bank_pelanggan`, `nomor_rekening_pelanggan`, `bukti_pembayaran`, `tanggal_pengembalian`, `status_pengembalian`, `total_denda`, `status_rental`) VALUES
(74, 2, 56, '2023-02-08', '2023-02-08', '200000', '1', '200000', 3, 200000, 'ari', 'BCA', '12345678887', 'cc972cfed949cebab29afba9acaf12b5.jpg', '2023-02-08', '1', 0, '1'),
(76, 19, 56, '2023-02-13', '2023-02-13', '200000', '1', '200000', 3, 200000, 'Zainul', 'BCA', '37746647373', '8f04ae0dc00da929ef1176c5b9196131.jpg', '2023-02-13', '1', 0, '1'),
(77, 20, 1, '2023-04-29', '2023-04-30', '80000', '2', '160000', 1, 160000, 'ARYA DUTA', 'BCA', '1231232132', '93643731221b40e619419739300d1d3a.png', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1511231573;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
