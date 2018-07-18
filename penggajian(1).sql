-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2018 pada 03.20
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
(35, '01180701001', '2018-07-14', '21:42:21', '21:42:25', 'Hadir', 'Telat 822 Menit.'),
(36, '02180101001', '2018-07-14', '21:46:59', NULL, 'Hadir', 'Telat 826 Menit.'),
(37, '01180701001', '2018-07-16', '03:23:10', NULL, 'Hadir', 'Telat -277 Menit.');

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
  `alamat_admin` text,
  `foto_admin` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `agama_admin`, `password_admin`, `jk_admin`, `status_kerja`, `alamat_admin`, `foto_admin`) VALUES
('0218010001', 'Vicko', 'mail@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'admin', 'L', 'Aktif', 'Jakarta', NULL),
('0218070001', 'Admin Vicko', 'vick@gmail.com', '1996-06-17', 'Jakarta', 'Islam', '1996-06-17', 'L', 'Tidak Aktif', 'Jakarta', NULL);

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
('0118070001', 'Bambang A', 'bambang@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'karyawan', 'L', 'JBT01', 'JKT', NULL),
('0118070002', 'Andi Satria', 'Andi@mail.com', '1995-01-02', 'Jakarta', 'Islam', 'kry02', 'L', 'JBT01', NULL, NULL),
('0118070003', 'Firman Sandi', 'Firman@mail.com', '1995-01-03', 'Jakarta', 'Islam', 'kry03', 'L', 'JBT02', NULL, NULL),
('0118070004', 'Liko Adnan', 'Liko@mail.com', '1995-01-04', 'Jakarta', 'Islam', 'kry04', 'L', 'JBT03', NULL, NULL),
('0118070005', 'Muhammad Fathan', 'Muhammad@mail.com', '1995-01-05', 'Jakarta', 'Islam', 'kry05', 'L', 'JBT04', NULL, NULL),
('0118070006', 'Zi Aulia', 'Zi@mail.com', '1995-01-06', 'Jakarta', 'Islam', 'kry06', 'P', 'JBT05', NULL, NULL),
('0118070007', 'Fitri', 'Fit@gmail.com', '1997-06-17', 'Jakarta', 'Islam', '1997-06-17', 'P', 'JBT01', 'Jakarta Selatan', '2pcs-set-Naruto-Uzumaki-Naruto-Hyuuga-Hinata-PVC-Action-Figures-Collectible-Model-Toys.jpg');

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
  `jk_pimpinan` enum('L','P') DEFAULT NULL,
  `foto_pimpinan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `nama_pimpinan`, `email_pimpinan`, `tanggal_lahir_pimpinan`, `tempat_lahir_pimpinan`, `agama_pimpinan`, `password_pimpinan`, `alamat_pimpinan`, `jk_pimpinan`, `foto_pimpinan`) VALUES
('0318070001', 'Vicko Bambang', 'vb@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'pimpinan', 'Jakarta', 'L', NULL),
('0318070002', 'Safina Dewi', 'sd@mail.com', '1995-01-02', 'Jakarta', 'Islam', 'pmp02', 'Jakarta', 'P', NULL);

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
(26, '0118070001', '2018-07', 'JBT01', 9000000, 350000, 0, 0, 0, 10, 100000, 7650000, '0218010001', 'pending'),
(27, '0118070002', '2018-07', 'JBT01', 9000000, 0, 600000, 0, 0, 10, 0, 8700000, '0218010001', 'pending'),
(28, '0118070003', '2018-07', 'JBT02', 8000000, 0, 600000, 0, 0, 10, 0, 7800000, '0218010001', 'pending'),
(29, '0118070004', '2018-07', 'JBT03', 7000000, 0, 600000, 500000, 0, 10, 0, 7400000, '0218010001', 'pending'),
(30, '0118070005', '2018-07', 'JBT04', 6000000, 350000, 0, 500000, 0, 10, 0, 5550000, '0218010001', 'pending'),
(31, '0118070006', '2018-07', 'JBT05', 5150000, 350000, 0, 500000, 500000, 10, 0, 5285000, '0218010001', 'pending'),
(32, '0118070007', '2018-07', 'JBT01', 9000000, 350000, 600000, 500000, 500000, 10, 0, 9350000, '0218010001', 'pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slip_gaji`
--
ALTER TABLE `slip_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
