-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2020 pada 10.44
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `Nama` varchar(225) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `Nama`, `jk`, `avatar`) VALUES
(1, 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Bendi Tandayu Saputra', 'Laki-Laki', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari_libur`
--

INSERT INTO `hari_libur` (`id`, `tanggal`, `keterangan`, `is_deleted`) VALUES
(2, '2020-02-21', 'Hari Libur', 1),
(3, '2020-02-22', 'okok', 1),
(4, '2020-02-21', 'Liburrrrr', 1),
(5, '2020-02-24', 'Hari Libur', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`, `keterangan`, `is_deleted`) VALUES
(1, 'KJ01', 'Administrator', 'Baik', 0),
(2, '', 'Ketua', '', 1),
(3, 'KJ02', 'Staff Admin', 'Baik', 0),
(4, 'oko', 'ac43724f16e9241d990427ab7c8f4228', 'oakdoa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(11) NOT NULL,
  `kode_pangkat` varchar(20) NOT NULL,
  `pangkat` varchar(225) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id`, `kode_pangkat`, `pangkat`, `is_deleted`) VALUES
(1, 'KP001', 'Master', 0),
(3, '', 'Epic', 1),
(4, 'I/A', 'Lorem Ipsum A', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) NOT NULL,
  `nip` char(20) NOT NULL,
  `nama_pekerja` varchar(225) NOT NULL,
  `gelar_akademis` varchar(225) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` text NOT NULL,
  `no_ktp` char(20) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `golongan_darah` char(5) NOT NULL,
  `kode_unit_kerja` varchar(20) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `kode_pangkat` varchar(20) NOT NULL,
  `status_dinas` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `user_id` int(1) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_pekerja`, `gelar_akademis`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `no_ktp`, `jenis_kelamin`, `golongan_darah`, `kode_unit_kerja`, `kode_jabatan`, `kode_pangkat`, `status_dinas`, `is_deleted`, `foto`, `user_id`, `username`, `password`, `update_at`, `created_at`) VALUES
(1, '25102002', 'Bendi Tandayu Saputra', 'S4', 'Banjarnegara', '2002-10-25', 'Bondolharjo Rt 02/05, Punggelan, Jawa Tengah. Jawa, Indonesia, Asia Tenggara, Asia, Bumi, Galaksi Bima Sakti, Alam Semesta', '479841097419470', 'Laki-Laki', 'A', 'KUK001', 'KJ02', 'KP001', 0, 1, 'default.png', 0, 'bend', 'bend10', '2020-02-25 04:11:23', '0000-00-00 00:00:00'),
(2, '47024702', 'Bend', 's3', 'Jakarta', '0000-00-00', 'Jakarta', '9248027687', 'Laki-Laki', 'A', 'KUK001', 'KJ02', 'KP001', 0, 0, 'default.png', 1, 'admin', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2020-02-25 04:08:37', '0000-00-00 00:00:00'),
(5, '193799', 'Bendi Tandayu Saputra', 'Ir.', 'Banjarnegara', '0000-00-00', 'Mana ya', '4567890', 'Laki-Laki', 'A', 'KUK001', 'KJ01', 'KP001', 1, 0, '20200219095610.jpg', 0, 'bendi', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '2020-02-19 08:56:10', '0000-00-00 00:00:00'),
(6, '72472734', 'yhj', '8yu', 'huhj', '0000-00-00', 'gjjhj', 'bhjbjb', 'Laki-Laki', 'ij', 'KUK001', 'KJ01', 'KP001', 0, 1, '20200219095740.jpg', 0, 'ok', '7a85f4764bbd6daf1c3545efbbf0f279a6dc0beb', '2020-02-19 08:58:37', '0000-00-00 00:00:00'),
(7, '97274092', 'Fitriyani', 'Dr', 'Jakarta', '1997-02-21', 'Jakarta', '', 'Laki-Laki', '66986', 'KUK001', 'KJ01', 'KP001', 1, 0, '20200221105335.jpg', 0, 'pekerja', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '2020-02-21 09:53:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `terlambat` varchar(100) DEFAULT NULL,
  `pulang_awal` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah_jam_kerja` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `pegawai_id`, `tanggal`, `jam_masuk`, `jam_pulang`, `terlambat`, `pulang_awal`, `keterangan`, `jumlah_jam_kerja`) VALUES
(1, 7, '2020-02-21', '17:03:22', '17:03:28', '543 Menit, 22 Detik', '56 Menit, 31 Detik', 'Masuk', NULL),
(2, 2, '2020-02-24', '09:24:53', '16:02:04', '24 Menit, 52 Detik', '57 Menit, 55 Detik', 'Masuk, Terlambat, Pulang Awal', '5 Jam, 37 Menit, 11 Detik'),
(5, 2, '2020-02-25', NULL, '16:36:45', '516 Menit, 44 Detik', '23 Menit, 15 Detik', 'Masuk, Terlambat, Pulang Awal', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `kode_unit_kerja` varchar(20) NOT NULL,
  `unit_kerja` varchar(225) NOT NULL,
  `nip_atasan` varchar(20) NOT NULL,
  `nama_atasan` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `eselon` int(11) DEFAULT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `kode_unit_kerja`, `unit_kerja`, `nip_atasan`, `nama_atasan`, `keterangan`, `eselon`, `is_deleted`) VALUES
(1, 'KUK001', 'Produksi', '251020002', 'Bendi Tandayu Saputra', 'Baik Banget\r\n', NULL, 0),
(10, 'KUK002', 'Unit Song 1', '01289310', 'Erik Gayuh', 'Boleh Kosong ', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_kerja`
--

CREATE TABLE `waktu_kerja` (
  `id` int(11) NOT NULL,
  `hari` char(10) NOT NULL,
  `masuk_kerja` time NOT NULL,
  `pulang_kerja` time NOT NULL,
  `istirahat` int(11) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_kerja`
--

INSERT INTO `waktu_kerja` (`id`, `hari`, `masuk_kerja`, `pulang_kerja`, `istirahat`, `is_deleted`) VALUES
(1, '5', '08:00:00', '17:00:00', 0, 0),
(2, '3', '08:00:00', '17:00:00', 0, 0),
(3, '2', '08:00:00', '17:00:00', 0, 0),
(4, '0', '23:00:00', '02:00:00', 0, 1),
(6, '1', '08:00:00', '17:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_unit_kerja` (`kode_unit_kerja`);

--
-- Indeks untuk tabel `waktu_kerja`
--
ALTER TABLE `waktu_kerja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hari` (`hari`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `waktu_kerja`
--
ALTER TABLE `waktu_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
