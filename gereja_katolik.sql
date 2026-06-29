-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2026 at 03:03 AM
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
  `status_anggota` enum('Aktif','Tidak Aktif','Alumni') DEFAULT 'Aktif',
  `Id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `npm`, `fakultas`, `prodi`, `angkatan`, `no_hp`, `alamat`, `status_anggota`, `Id_user`) VALUES
(1, 'Yohanes Pratama', '347-371', 'Teknik', 'Informatika', '2022', '085712345678', 'Jl. Teratai No. 9, RT 01/RW 02, Kel. Pabuaran, Kec. Cibinong', 'Aktif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_laporan`
--

CREATE TABLE `tbl_detail_laporan` (
  `id_laporan` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `id_pengurus` int(20) DEFAULT NULL,
  `id_panitia` int(11) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `kendala` varchar(255) DEFAULT NULL,
  `hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_laporan`
--

INSERT INTO `tbl_detail_laporan` (`id_laporan`, `id_kegiatan`, `id_pengurus`, `id_panitia`, `uraian`, `kendala`, `hasil`) VALUES
(1, 1, 1, 1, 'Persiapan kegiatan berjalan sesuai rencana', 'Tidak ada kendala', 'Kegiatan berjalan sukses'),
(2, 1, 1, 1, 'Pelaksanaan kegiatan berlangsung lancar', 'Kendala teknis (sound/speaker)', 'Kegiatan selesai sesuai rencana'),
(3, 1, 1, 1, 'Pembagian tugas kepada panitia sudah dilakukan', 'Kendala teknis (sound/speaker)', 'Kegiatan berjalan cukup baik'),
(4, 1, 1, 1, 'Koordinasi antar pengurus berjalan baik', 'Keterlambatan peserta', 'Kegiatan selesai sesuai rencana');

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
(1, 'Liturgi', 'Yohanes', 'aktif', 'Ketua Divisi Liturgi');

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
(1, 'Misa Mingguan', 'Rapat koordinasi pengurus untuk membahas program kerja gereja.', '2026-07-05', 'Gereja Utama', 10, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal_laporan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `tanggal_laporan`, `keterangan`, `id_kegiatan`) VALUES
(1, '2026-06-01', 'Laporan Kegiatan Berjalan Lancar', 1),
(2, '2026-06-05', 'Laporan Kegiatan Berjalan Lancar', 1),
(3, '2026-06-10', 'Laporan Kegiatan Berjalan Lancar', 1),
(4, '2026-06-01', 'Laporan Kegiatan Berjalan Lancar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `id_panitia` int(11) NOT NULL,
  `nama_panitia` varchar(100) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `jabatan_panitia` varchar(100) DEFAULT NULL,
  `id_pengurus` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id_panitia`, `nama_panitia`, `nama_kegiatan`, `jabatan_panitia`, `id_pengurus`, `id_kegiatan`) VALUES
(1, 'Maria', 'Misa Mingguan', 'Ketua', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `nama_pendaftar` varchar(100) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `tanggal_daftar` varchar(100) DEFAULT NULL,
  `status` enum('menunggu','diterima','ditolak') DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_divisi` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengurus`
--

INSERT INTO `tbl_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `periode`, `status_pengurus`, `id_divisi`, `id_user`) VALUES
(1, 'Yohanes', 'Ketua Presidium', '2020-2021', 'Aktif', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Id_user` int(5) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role` enum('admin','pengurus','anggota') DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Id_user`, `Username`, `Password`, `Role`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'aktif'),
(2, 'pengurus', '1234', 'pengurus', 'aktif'),
(3, 'anggota', 'anggota', 'anggota', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tbl_user` (`Id_user`);

--
-- Indexes for table `tbl_detail_laporan`
--
ALTER TABLE `tbl_detail_laporan`
  ADD KEY `tbl_laporan` (`id_laporan`),
  ADD KEY `tbl_kegiatan` (`id_kegiatan`),
  ADD KEY `tbl_pengurus` (`id_pengurus`),
  ADD KEY `tbl_panitia` (`id_panitia`);

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
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `tbl_kegiatannn` (`id_kegiatan`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `tbl_pengurus` (`id_pengurus`),
  ADD KEY `tbl_kegiatann` (`id_kegiatan`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `tbl_anggota` (`id_anggota`),
  ADD KEY `tbl_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `tbl_divisi` (`id_divisi`),
  ADD KEY `tbl_user` (`id_user`);

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
  MODIFY `Id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `fk_anggota_user` FOREIGN KEY (`Id_user`) REFERENCES `tbl_users` (`Id_user`);

--
-- Constraints for table `tbl_detail_laporan`
--
ALTER TABLE `tbl_detail_laporan`
  ADD CONSTRAINT `fk_detail_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `fk_detail_laporan` FOREIGN KEY (`id_laporan`) REFERENCES `tbl_laporan` (`id_laporan`),
  ADD CONSTRAINT `fk_detail_panitia` FOREIGN KEY (`id_panitia`) REFERENCES `tbl_panitia` (`id_panitia`),
  ADD CONSTRAINT `fk_detail_pengurus` FOREIGN KEY (`id_pengurus`) REFERENCES `tbl_pengurus` (`id_pengurus`);

--
-- Constraints for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD CONSTRAINT `tbl_kegiatannn` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`);

--
-- Constraints for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD CONSTRAINT `tbl_kegiatann` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`),
  ADD CONSTRAINT `tbl_pengurus` FOREIGN KEY (`id_pengurus`) REFERENCES `tbl_pengurus` (`id_pengurus`);

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`),
  ADD CONSTRAINT `tbl_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`);

--
-- Constraints for table `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD CONSTRAINT `tbl_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `tbl_divisi` (`id_divisi`),
  ADD CONSTRAINT `tbl_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
