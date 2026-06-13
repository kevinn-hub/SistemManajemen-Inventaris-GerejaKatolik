-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2026 at 08:54 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gereja_katolik`
--
CREATE DATABASE IF NOT EXISTS `gereja_katolik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gereja_katolik`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(20) NOT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `npm` varchar(20) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `status_anggota` enum('Aktif','Tidak Aktif','Alumni') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `npm`, `fakultas`, `prodi`, `angkatan`, `no_hp`, `alamat`, `status_anggota`) VALUES
(1, 'leo', '345-349', 'Teknik', 'Informatika', '2022', '20920820820820', '38003803830', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id_divisi` int(10) NOT NULL,
  `nama_divisi` varchar(100) DEFAULT NULL,
  `penanggung_jawab` varchar(100) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id_divisi`, `nama_divisi`, `penanggung_jawab`, `status`, `keterangan`) VALUES
(1, 'sekre', 'Yohanes', 'tidak aktif', 'ketua Hub. Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `tanggal_kegiatan` varchar(20) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `kuota_peserta` int(11) DEFAULT NULL,
  `status_kegiatan` enum('aktif','selesai','dibatalkan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `tanggal_kegiatan`, `lokasi`, `kuota_peserta`, `status_kegiatan`) VALUES
(1, 'Retret OMK', 'harus datang ya', '2008-08-08', 'Ruang Pertemuan', 2, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `tanggal_laporan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `nama_kegiatan`, `tanggal_laporan`, `keterangan`) VALUES
(1, 'Retret OMK', '0055-05-05', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama_panitia` varchar(100) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `jabatan_panitia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id_panitia`, `nama_panitia`, `nama_kegiatan`, `jabatan_panitia`) VALUES
(1, 'Yohanes', 'Retret OMK', 'Wakil Ketua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `nama_pendaftar` varchar(100) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `tanggal_daftar` varchar(100) DEFAULT NULL,
  `status` enum('menunggu','diterima','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_daftar`, `nama_pendaftar`, `nama_kegiatan`, `tanggal_daftar`, `status`) VALUES
(1, 'Maria', 'Misa Mingguan', '0066-07-07', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengurus`
--

CREATE TABLE `tbl_pengurus` (
  `id_pengurus` int(20) NOT NULL,
  `nama_pengurus` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `status_pengurus` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `nama_divisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengurus`
--

INSERT INTO `tbl_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `periode`, `status_pengurus`, `nama_divisi`) VALUES
(1, 'leo', 'Ketua Predisium', '2020-2021', 'Aktif', 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Id_user` int(5) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role` enum('admin','pengurus','anggota') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Id_user`, `Username`, `Password`, `Role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'pengurus', '1234', 'pengurus'),
(3, 'anggota', 'anggota', 'anggota'),
(4, '', '1234', 'pengurus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `Id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
