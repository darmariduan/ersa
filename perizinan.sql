-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 02:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perizinan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`) VALUES
(1, 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_instansi` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_pks` varchar(128) NOT NULL,
  `ketua_instansi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `user_id`, `nama_instansi`, `alamat`, `no_pks`, `ketua_instansi`) VALUES
(10, 11, 'Erasites Citra Digital Indonesia', 'Malang', '123/ABC', 'Rama Dhana');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id`, `nama_layanan`) VALUES
(1, 'Pelayanan Pencatatan Biodata Penduduk '),
(2, 'Penerbitan Kartu Keluarga'),
(3, 'Penerbitan E-KTP'),
(4, 'Penerbitan Kartu Identitas Anak'),
(6, 'Pencatatan Dan Penerbitan Kutipan Akta Kelahiran'),
(7, 'Pencatatan Dan Penerbitan Kutipan Akta Kematian'),
(8, 'Pencatatan Dan Penerbitan Kutipan Akta Perkawinan'),
(9, 'Pencatatan Dan Penerbitan Surat Keterangan Pembatalan Perkawinan'),
(10, 'Pencatatan Dan Penerbitan Kutipan Akta Perceraian'),
(11, 'Pencatatan Dan Penerbitan Surat Keterangan Pembatalan Perceraian'),
(12, 'Pencatatan Pengangkatan Anak'),
(13, 'Pencatatan Dan Penerbitan Kutipan Akta Pengakuan Anak'),
(14, 'Pencatatan Dan Penerbitan Akta Pengesahan Anak'),
(15, 'Pencatatan Perubahan Nama'),
(16, 'Pencatatan Perubahan Status Kewarganegaraan'),
(17, 'Pencatatan Peristiwa Penting Dan Pembetulan Akta Pencatatan Sipil'),
(18, 'Pembatalan Akta Pencatatan Sipil'),
(19, 'Legalisasi Dokumen Kependudukan'),
(20, 'Permintaan Data Kependudukan');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sub_layanan`
--

CREATE TABLE `sub_layanan` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_sub` varchar(128) NOT NULL,
  `uraian` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_layanan`
--

INSERT INTO `sub_layanan` (`id`, `id_layanan`, `nama_sub`, `uraian`) VALUES
(1, 3, 'KTP', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor purus non enim praesent elementum facilisis leo. Congue nisi vitae suscipit tellus mauris. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Morbi tristique senectus et netus et malesuada fames ac. Morbi tincidunt augue interdum velit euismod in pellentesque massa placerat. Convallis convallis tellus id interdum velit laoreet id donec. Odio ut sem nulla pharetra. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus. Eu turpis egestas pretium aenean. Dignissim suspendisse in est ante in.</p>\r\n\r\n<p>Duis ut diam quam nulla. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Magna etiam tempor orci eu lobortis elementum. Aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Mollis aliquam ut porttitor leo a diam. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et. Leo urna molestie at elementum eu facilisis sed. Proin sagittis nisl rhoncus mattis rhoncus urna. Vel elit scelerisque mauris pellentesque pulvinar pellentesque.</p>\r\n'),
(2, 6, 'Akta Kelahiran', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor purus non enim praesent elementum facilisis leo. Congue nisi vitae suscipit tellus mauris. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Morbi tristique senectus et netus et malesuada fames ac. Morbi tincidunt augue interdum velit euismod in pellentesque massa placerat. Convallis convallis tellus id interdum velit laoreet id donec. Odio ut sem nulla pharetra. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus. Eu turpis egestas pretium aenean. Dignissim suspendisse in est ante in.</p>\r\n\r\n<p>Duis ut diam quam nulla. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Magna etiam tempor orci eu lobortis elementum. Aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Mollis aliquam ut porttitor leo a diam. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et. Leo urna molestie at elementum eu facilisis sed. Proin sagittis nisl rhoncus mattis rhoncus urna. Vel elit scelerisque mauris pellentesque pulvinar pellentesque.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role_id`, `status`, `image`, `created_at`) VALUES
(1, 'erasites2021@gmail.com', '$2y$10$WzEM8z6qFmm/jhPqcNmX.OMNBVpeQRAMd6QKxTi/4DbPUwXUDPcbK', 1, 1, '11678671568.jpg', '0000-00-00'),
(11, 'ramakun72@gmail.com', '$2y$10$3Yqj.OFSW9QjwHiV9JOrmu20c5Al6NP66GBizzv1MiJiuOh.mhm/u', 2, 1, 'default.jpg', '2023-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_layanan`
--
ALTER TABLE `sub_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_layanan`
--
ALTER TABLE `sub_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
