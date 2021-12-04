-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 01:15 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `kd_beasiswa` int(15) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`kd_beasiswa`, `name`) VALUES
(1, 'beasiswa BSKM'),
(2, 'beasiswa Prestasi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sifat` enum('max','min') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
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
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `kd_model` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
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
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `kd_beasiswa` int(1) NOT NULL,
  `dok_skm` varchar(200) NOT NULL,
  `dok_kp` varchar(200) NOT NULL,
  `dok_kk` varchar(200) NOT NULL,
  `dok_rangking` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nis`, `kd_beasiswa`, `dok_skm`, `dok_kp`, `dok_kk`, `dok_rangking`) VALUES
(1, '201700421', 1, 'skm.pdf', 'kp.pdf', 'kk.pdf', 'ranking.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(15) NOT NULL,
  `kd_beasiswa` int(15) NOT NULL,
  `kd_kriteria` int(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `kd_beasiswa`, `kd_kriteria`, `keterangan`, `bobot`) VALUES
(1, 1, 1, 'Ada', 1),
(2, 1, 1, 'Tidak Ada', 2),
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
(15, 2, 5, 'Peringkat 1', 1),
(16, 2, 5, 'Peringkat 2', 2),
(17, 2, 5, 'Peringkat 3-4', 3),
(18, 2, 5, 'Peringkat 5-10', 4),
(19, 2, 6, '<= 500.000', 1),
(20, 2, 6, '600.000 - 1.500.000', 2),
(21, 2, 6, '1.600.000 - 2.500.000', 3),
(22, 2, 6, '>= 2.600.000', 4),
(23, 2, 7, '1 ORANG ANAK', 1),
(24, 2, 7, '2 ORANG ANAK', 2),
(25, 2, 7, '3 ORANG ANAK', 3),
(26, 2, 7, '4 ORANG ANAK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`nis`, `name`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `no_tlp`, `image`, `password`, `file`, `role_id`, `is_active`, `date_created`) VALUES
(11098942, 'Muhamad Miqdam Agill', '2021-08-03', 'Laki-laki', 'agilmiqdam@yahoo.com', 'JAKARTA', '1111111112', 'FXXH9928.JPG', '$2y$10$PdaHgzMo0uB4CrAzBwzODO9C/IwZ3LNz56IL5LT2cj0frzAjcnWqi', '', 1, 1, 1624699531),
(201700224, 'sadam', '2020-09-01', 'Laki-laki', 'sadaam@gmail.com', 'SAMARINDA', '2398427423', 'download_(3).jpg', '$2y$10$kvT5hVNeHtMI68S22wIolOAQ8AHoqhmw9oqI8G.nrRi8BXf7WCzdO', '', 2, 1, 1631481569),
(201700421, 'Andriee', '2011-09-06', 'Laki-laki', 'andri@gmail.com', 'Tangerang', '0897654', 'avatar.jpg', '$2y$10$ehZ1BdBpdbqX0gQmUX3CzuYmmTneQw8TVGi5dttKVDrP8DJTnk9bS', '', 2, 1, 1635393872),
(201800332, 'agil', '1999-11-17', 'Laki-laki', 'agilmiqdam@gmail.com', '', '', 'avatar2.jpg', '$2y$10$tnAVbY3A1fH5IV0QYbAsYuaabtFDnoVU3CLu8a5Ekbs4fj/2.KtA2', '', 2, 1, 1624699463);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
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
-- Dumping data for table `user_sub_menu`
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
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`kd_beasiswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kd_model`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `kd_beasiswa` (`kd_beasiswa`),
  ADD KEY `kd_kriteria` (`kd_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `kd_beasiswa` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `kd_model` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
