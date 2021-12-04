-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Des 2021 pada 06.17
-- Versi server: 5.7.24
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswasd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `kd_beasiswa` int(15) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`kd_beasiswa`, `name`) VALUES
(1, 'beasiswa BSKM'),
(2, 'beasiswa Prestasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kd_hasil` int(11) NOT NULL,
  `kd_beasiswa` int(11) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kd_hasil`, `kd_beasiswa`, `nis`, `nilai`) VALUES
(1, 1, '11098942', 0.75),
(2, 1, '201700224', 0.866667),
(3, 1, '201700421', 0.525),
(4, 1, '201800332', 0.8),
(5, 2, '201800332', 0.95),
(6, 2, '201700421', 0.75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sifat` enum('max','min') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `kd_beasiswa`, `nama`, `sifat`) VALUES
(1, 1, 'Surat Ket Tidak Mampu', 'max'),
(2, 1, 'Penghasilan Orang Tua', 'min'),
(3, 1, 'Tanggungan Orang Tua', 'max'),
(4, 1, 'Kelas', 'max'),
(5, 2, 'Rangking', 'min'),
(6, 2, 'Penghasilan Orang Tua', 'min'),
(7, 2, 'Tanggungan Orang Tua', 'max'),
(8, 2, 'Kelas', 'max');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `kd_model` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`kd_model`, `kd_beasiswa`, `kd_kriteria`, `bobot`) VALUES
(1, 1, 1, '0.40'),
(2, 1, 2, '0.30'),
(3, 1, 3, '0.20'),
(4, 1, 4, '0.10'),
(5, 2, 5, '0.40'),
(6, 2, 6, '0.30'),
(7, 2, 7, '0.20'),
(8, 2, 8, '0.10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_beasiswa`, `kd_kriteria`, `nis`, `nilai`) VALUES
(5, 1, 1, '11098942', 1),
(6, 1, 2, '11098942', 1),
(7, 1, 3, '11098942', 3),
(8, 1, 4, '11098942', 1),
(9, 1, 1, '201700224', 2),
(10, 1, 2, '201700224', 1),
(11, 1, 3, '201700224', 1),
(12, 1, 4, '201700224', 2),
(13, 1, 1, '201700421', 1),
(14, 1, 2, '201700421', 4),
(15, 1, 3, '201700421', 4),
(16, 1, 4, '201700421', 2),
(17, 1, 1, '201800332', 2),
(18, 1, 2, '201800332', 2),
(19, 1, 3, '201800332', 3),
(20, 1, 4, '201800332', 4),
(21, 2, 5, '201800332', 2),
(22, 2, 6, '201800332', 1),
(23, 2, 7, '201800332', 2),
(24, 2, 8, '201800332', 2),
(25, 2, 5, '201700421', 2),
(26, 2, 6, '201700421', 2),
(27, 2, 7, '201700421', 1),
(28, 2, 8, '201700421', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `kd_beasiswa` int(1) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tg_ot` int(11) NOT NULL,
  `pd_ot` int(11) NOT NULL,
  `peringkat` int(11) NOT NULL,
  `dok_skm` varchar(200) DEFAULT NULL,
  `dok_kp` varchar(200) DEFAULT NULL,
  `dok_kk` varchar(200) DEFAULT NULL,
  `dok_rangking` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nis`, `kd_beasiswa`, `kelas`, `tg_ot`, `pd_ot`, `peringkat`, `dok_skm`, `dok_kp`, `dok_kk`, `dok_rangking`, `status`) VALUES
(10, '201700224', 1, 2, 1, 2, 1, '249023548_4343153242404589_9068352696010569944_n.jpg', '249023548_4343153242404589_9068352696010569944_n2.jpg', '249023548_4343153242404589_9068352696010569944_n1.jpg', 'ranking.pdf', 1),
(12, '201700224', 1, 4, 4, 3, 2, 'skm.pdf', '249023548_4343153242404589_9068352696010569944_n7.jpg', '249023548_4343153242404589_9068352696010569944_n6.jpg', '249023548_4343153242404589_9068352696010569944_n5.jpg', 1),
(13, '201700224', 1, 1, 1, 1, 1, 'skm.pdf', '', '249023548_4343153242404589_9068352696010569944_n8.jpg', '', 1),
(14, '201700224', 2, 2, 2, 3, 2, 'skm.pdf', '10_PROGRAM_PKK_HURUF1.pdf', '10_PROGRAM_PKK_HURUF.pdf', 'folder-blue-music-icon.png', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `kd_beasiswa`, `kd_kriteria`, `keterangan`, `bobot`) VALUES
(1, 1, 1, 'Ada', 6),
(2, 1, 1, 'Tidak Ada', 4),
(3, 1, 2, '<= 500.000', 1),
(4, 1, 2, '600.000 - 1.500.000', 2),
(5, 1, 2, '1.600.000 - 2.500.000', 3),
(6, 1, 2, '>= 2.600.000 ', 4),
(7, 1, 3, '1 ORANG ANAK', 1),
(8, 1, 3, '2 ORANG ANAK', 2),
(9, 1, 3, '3 ORANG ANAK', 3),
(10, 1, 3, '4 ORANG ANAK', 4),
(11, 1, 4, 'Kelas 1-2', 1),
(12, 1, 4, 'Kelas 3-4', 2),
(13, 1, 4, 'Kelas 5', 3),
(14, 1, 4, 'Kelas 6', 4),
(15, 2, 5, 'Peringkat 1', 4),
(16, 2, 5, 'Peringkat 2', 3),
(17, 2, 5, 'Peringkat 3-4', 2),
(18, 2, 5, 'Peringkat 5-10', 1),
(19, 2, 6, '<= 500.000', 1),
(20, 2, 6, '600.000 - 1.500.000', 2),
(21, 2, 6, '1.600.000 - 2.500.000', 3),
(22, 2, 6, '>= 2.600.000', 4),
(23, 2, 7, '1 ORANG ANAK', 1),
(24, 2, 7, '2 ORANG ANAK', 2),
(25, 2, 7, '3 ORANG ANAK', 3),
(26, 2, 7, '4 ORANG ANAK', 0),
(27, 2, 8, 'Kelas 1-2', 1),
(28, 2, 8, 'Kelas 3-4', 2),
(29, 2, 8, 'Kelas 5', 3),
(30, 2, 8, 'Kelas 6', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nis` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `file` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nis`, `name`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `no_tlp`, `image`, `password`, `file`, `role_id`, `is_active`, `date_created`) VALUES
(11098942, 'Muhamad Miqdam Agill', '2021-08-03', 'Laki-laki', 'agilmiqdam@yahoo.com', 'JAKARTA', '1111111112', 'FXXH9928.JPG', '$2y$10$sGU3jkw8n8HM.H2Hz45XZORnYH3hZCQkvLjEHGqhO9oU4uTTbUpSW', '', 1, 1, 1624699531),
(201700224, 'sadam', '2020-09-01', 'Laki-laki', 'sadaam@gmail.com', 'SAMARINDA', '2398427423', 'download_(3).jpg', '$2y$10$sGU3jkw8n8HM.H2Hz45XZORnYH3hZCQkvLjEHGqhO9oU4uTTbUpSW', '', 2, 1, 1631481569),
(201700421, 'Andriee', '2011-09-06', 'Laki-laki', 'andri@gmail.com', 'Tangerang', '0897654', 'avatar.jpg', '$2y$10$sGU3jkw8n8HM.H2Hz45XZORnYH3hZCQkvLjEHGqhO9oU4uTTbUpSW', '', 2, 1, 1635393872),
(201800332, 'agil', '1999-11-17', 'Laki-laki', 'agilmiqdam@gmail.com', '', '', 'avatar2.jpg', '$2y$10$sGU3jkw8n8HM.H2Hz45XZORnYH3hZCQkvLjEHGqhO9oU4uTTbUpSW', '', 2, 1, 1624699463);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'user/dashboard', 'fas fa-fw fa-landmark', 1),
(2, 2, 'Profil Saya', 'user/profil', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 2, 'Pendaftaran', 'user/pendaftaran', 'fas fa-fw fa-folder', 1),
(7, 2, 'Laporan Hasil Seleksi', 'user/seleksi', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Data Siswa', 'admin/datasiswa', 'fas fa-fw fa-users', 1),
(10, 2, 'Kriteria', 'user/kriteria', 'fas fa-fw fa-folder', 1),
(11, 1, 'Data Peserta', 'admin/datapeserta', 'fas fa-fw fa-user-graduate', 1),
(12, 1, 'Penilaian', 'admin/penilaian', 'fas fa-fw fa-calculator', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`kd_beasiswa`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kd_hasil`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`);

--
-- Indeks untuk tabel `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kd_model`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `kd_beasiswa` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `model`
--
ALTER TABLE `model`
  MODIFY `kd_model` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
