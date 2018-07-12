-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jul 2018 pada 16.58
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(15) DEFAULT NULL,
  `tanggal_absensi` date DEFAULT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `kehadiran` enum('Hadir','Tidak Hadir') DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `id_karyawan`, `tanggal_absensi`, `waktu_masuk`, `waktu_keluar`, `kehadiran`, `keterangan`) VALUES
(1, 'KRY0001', '2018-06-01', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(2, 'KRY0001', '2018-06-04', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(3, 'KRY0001', '2018-06-05', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(4, 'KRY0001', '2018-06-06', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(5, 'KRY0001', '2018-06-07', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(6, 'KRY0001', '2018-06-08', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(7, 'KRY0001', '2018-06-11', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(8, 'KRY0001', '2018-06-12', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(9, 'KRY0001', '2018-06-13', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(10, 'KRY0001', '2018-06-14', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(11, 'KRY0001', '2018-06-15', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(12, 'KRY0001', '2018-06-18', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(13, 'KRY0001', '2018-06-19', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(14, 'KRY0001', '2018-06-20', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(15, 'KRY0001', '2018-06-21', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(16, 'KRY0001', '2018-06-22', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(17, 'KRY0001', '2018-06-25', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(18, 'KRY0001', '2018-06-26', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(19, 'KRY0001', '2018-06-27', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(20, 'KRY0001', '2018-06-28', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(21, 'KRY0001', '2018-06-29', '08:00:00', '16:00:00', 'Hadir', 'Tepat Waktu'),
(30, 'adm0001', '2018-07-03', '14:47:31', '14:47:32', 'Hadir', 'Telat 407 Menit.'),
(31, 'adm0001', '2018-07-04', '14:14:09', '14:14:11', 'Hadir', 'Telat 374 Menit.'),
(32, 'KRY0001', '2018-07-11', '22:47:18', '22:48:58', 'Hadir', 'Telat 887 Menit.'),
(33, 'adm0001', '2018-07-11', '23:26:09', '23:26:11', 'Hadir', 'Telat 926 Menit.'),
(34, 'adm0001', '2018-07-12', '14:56:59', '14:57:02', 'Hadir', 'Telat 416 Menit.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `tanggal_lahir_admin` date DEFAULT NULL,
  `tempat_lahir_admin` varchar(40) DEFAULT NULL,
  `agama_admin` varchar(15) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `jk_admin` enum('L','P') DEFAULT NULL,
  `status_kerja` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `alamat_admin` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `agama_admin`, `password_admin`, `jk_admin`, `status_kerja`, `alamat_admin`) VALUES
('adm0001', 'Vicko', 'mail@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'admin', 'L', 'Aktif', 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(15) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan_bpjs` double DEFAULT NULL,
  `tunjangan_konsumsi` double DEFAULT NULL,
  `tunjangan_transport` double DEFAULT NULL,
  `tunjangan_keluarga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan_bpjs`, `tunjangan_konsumsi`, `tunjangan_transport`, `tunjangan_keluarga`) VALUES
('JBT01', 'SUPERVISOR', 9000000, 350000, 600000, 500000, 500000),
('JBT02', 'MANAGER', 8000000, 350000, 600000, 500000, 500000),
('JBT03', 'GENERAL MANAGER', 7000000, 350000, 600000, 500000, 500000),
('JBT04', 'SENIOR STAFF', 6000000, 350000, 600000, 500000, 500000),
('JBT05', 'STAFF', 5150000, 350000, 600000, 500000, 500000),
('JBT06', 'JUNIOR STAFF', 4700000, 300000, 350000, 500000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `email_karyawan` varchar(100) DEFAULT NULL,
  `tanggal_lahir_karyawan` date DEFAULT NULL,
  `tempat_lahir_karyawan` varchar(40) DEFAULT NULL,
  `agama_karyawan` varchar(15) DEFAULT NULL,
  `password_karyawan` varchar(100) DEFAULT NULL,
  `jk_karyawan` enum('L','P') DEFAULT NULL,
  `id_jabatan` varchar(15) DEFAULT NULL,
  `alamat_karyawan` text,
  `foto_karyawan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `email_karyawan`, `tanggal_lahir_karyawan`, `tempat_lahir_karyawan`, `agama_karyawan`, `password_karyawan`, `jk_karyawan`, `id_jabatan`, `alamat_karyawan`, `foto_karyawan`) VALUES
('KRY0001', 'Bambang A', 'bambang@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'karyawan', 'L', 'JBT01', 'JKT', NULL),
('KRY0002', 'Andi Satria', 'Andi@mail.com', '1995-01-02', 'Jakarta', 'Islam', 'kry02', 'L', 'JBT01', NULL, NULL),
('KRY0003', 'Firman Sandi', 'Firman@mail.com', '1995-01-03', 'Jakarta', 'Islam', 'kry03', 'L', 'JBT02', NULL, NULL),
('KRY0004', 'Liko Adnan', 'Liko@mail.com', '1995-01-04', 'Jakarta', 'Islam', 'kry04', 'L', 'JBT03', NULL, NULL),
('KRY0005', 'Muhammad Fathan', 'Muhammad@mail.com', '1995-01-05', 'Jakarta', 'Islam', 'kry05', 'L', 'JBT04', NULL, NULL),
('KRY0006', 'Zi Aulia', 'Zi@mail.com', '1995-01-06', 'Jakarta', 'Islam', 'kry06', 'P', 'JBT05', NULL, NULL),
('KRY0007', 'Ichan', 'ichsan.clay@gmail.com', '1997-06-17', 'Jakarta', 'Islam', '1997-06-17', '', 'JBT01', 'Bekasi', '2pcs-set-Naruto-Uzumaki-Naruto-Hyuuga-Hinata-PVC-Action-Figures-Collectible-Model-Toys.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `ID` int(11) NOT NULL,
  `id_karyawan` varchar(15) DEFAULT NULL,
  `perihal_keluhan` varchar(50) DEFAULT NULL,
  `tanggal_keluhan` date DEFAULT NULL,
  `keluhan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`ID`, `id_karyawan`, `perihal_keluhan`, `tanggal_keluhan`, `keluhan`) VALUES
(1, 'KRY0001', 'Kenaikan Gaji', '2018-06-28', 'Mohon dinaikkan gaji saya. Terima Kasih.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` varchar(15) NOT NULL,
  `nama_pimpinan` varchar(100) DEFAULT NULL,
  `email_pimpinan` varchar(100) DEFAULT NULL,
  `tanggal_lahir_pimpinan` date DEFAULT NULL,
  `tempat_lahir_pimpinan` varchar(40) DEFAULT NULL,
  `agama_pimpinan` varchar(15) DEFAULT NULL,
  `password_pimpinan` varchar(100) DEFAULT NULL,
  `alamat_pimpinan` text,
  `jk_pimpinan` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `nama_pimpinan`, `email_pimpinan`, `tanggal_lahir_pimpinan`, `tempat_lahir_pimpinan`, `agama_pimpinan`, `password_pimpinan`, `alamat_pimpinan`, `jk_pimpinan`) VALUES
('PMP0001', 'Vicko Bambang', 'vb@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'pimpinan', 'Jakarta', 'L'),
('PMP0002', 'Safina Dewi', 'sd@mail.com', '1995-01-02', 'Jakarta', 'Islam', 'pmp02', 'Jakarta', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slip_gaji`
--

CREATE TABLE `slip_gaji` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(15) DEFAULT NULL,
  `periode` varchar(25) DEFAULT NULL,
  `id_jabatan` varchar(15) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan_bpjs` double DEFAULT NULL,
  `tunjangan_konsumsi` double DEFAULT NULL,
  `tunjangan_transport` double DEFAULT NULL,
  `tunjangan_keluarga` double DEFAULT NULL,
  `pajak` double DEFAULT NULL,
  `potongan_gaji` double DEFAULT NULL,
  `gaji_diterima` double DEFAULT NULL,
  `id_admin` varchar(15) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slip_gaji`
--

INSERT INTO `slip_gaji` (`id`, `id_karyawan`, `periode`, `id_jabatan`, `gaji_pokok`, `tunjangan_bpjs`, `tunjangan_konsumsi`, `tunjangan_transport`, `tunjangan_keluarga`, `pajak`, `potongan_gaji`, `gaji_diterima`, `id_admin`, `keterangan`) VALUES
(7, 'KRY0001', '2018-07', 'JBT01', 9000000, 350000, 600000, 0, 500000, 10, 1000, 9549000, '0330036805', 'Disetujui'),
(8, 'KRY0002', '2018-07', 'JBT01', 9000000, 350000, 600000, 0, 0, 10, 0, 9050000, '0330036805', 'pending'),
(9, 'KRY0003', '2018-07', 'JBT02', 8000000, 350000, 600000, 500000, 0, 10, 0, 8650000, '0330036805', 'pending'),
(10, 'KRY0004', '2018-07', 'JBT03', 7000000, 350000, 600000, 500000, 500000, 10, 0, 8250000, '0330036805', 'pending'),
(11, 'KRY0005', '2018-07', 'JBT04', 6000000, 0, 0, 0, 0, 10, 0, 5400000, '0330036805', 'pending'),
(12, 'KRY0006', '2018-07', 'JBT05', 5150000, 350000, 600000, 0, 500000, 10, 0, 6085000, '0330036805', 'pending'),
(13, 'KRY0001', '2018-06', 'JBT01', 9000000, 350000, 600000, 0, 0, 10, 1000, 9049000, 'adm0001', 'Disetujui'),
(14, 'KRY0002', '2018-06', 'JBT01', 9000000, 350000, 600000, 0, 0, 10, 0, 9050000, 'adm0001', 'pending'),
(15, 'KRY0003', '2018-06', 'JBT02', 8000000, 0, 0, 0, 0, 10, 0, 7200000, 'adm0001', 'pending'),
(16, 'KRY0004', '2018-06', 'JBT03', 7000000, 0, 0, 0, 0, 10, 0, 6300000, 'adm0001', 'pending'),
(17, 'KRY0005', '2018-06', 'JBT04', 6000000, 0, 0, 0, 0, 10, 0, 5400000, 'adm0001', 'pending'),
(18, 'KRY0006', '2018-06', 'JBT05', 5150000, 0, 0, 0, 0, 10, 0, 4635000, 'adm0001', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
