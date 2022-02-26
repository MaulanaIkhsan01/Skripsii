-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 01:33 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `hasil` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_project`, `c1`, `c2`, `c3`, `c4`, `c5`, `hasil`) VALUES
(1, 1, 4, 5, 4, 4, 5, '2.697'),
(2, 2, 4, 4, 3, 3, 4, '2.867'),
(3, 3, 4, 3, 5, 4, 1, '3.13'),
(4, 4, 3, 3, 2, 2, 3, '3.922'),
(5, 5, 3, 3, 2, 2, 3, '3.922'),
(14, 7, 4, 4, 3, 3, 4, '2.867'),
(15, 8, 4, 3, 5, 4, 1, '3.13');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(30) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `job_desc` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `job_desc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Programming', 'Maulana 1997', 'Maulana 1997', '2021-06-15 15:32:12', '2021-06-15 15:32:12'),
(2, 'Project Manager', 'Manage Project', 'Maulana 01', 'Maulana 01', '2021-06-04 13:34:23', '2021-06-04 13:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(30) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Brosur Digital', 'Berbagai Jenis Serta Design Brosur', 'Maulana 01', 'Maulana 01', '2021-06-04 13:34:48', '2021-06-28 12:32:24'),
(2, 'Social Media', 'Layanan Pemeliharaan Akun Sosial Media', '', '', '2021-06-28 12:35:18', '2021-06-28 12:35:18'),
(3, 'Katalog Produk', 'Daftar untuk mempromosikan fitur produk yang anda sediakan', '', '', '2021-06-28 12:35:18', '2021-06-28 12:35:18'),
(4, 'Website Online', 'Berbagai jenis website untuk promosi usaha kamu di internet', '', '', '2021-06-28 12:35:18', '2021-06-28 12:35:18'),
(5, 'Custom Design', 'Design yang menarik sesuai dengan kebutuhan usaha kamu', '', '', '2021-06-28 12:35:18', '2021-06-28 12:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(150) NOT NULL,
  `bobot` varchar(150) NOT NULL,
  `nilai` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `nilai`) VALUES
(1, 'Biaya', '30', 0),
(2, 'Skala Kecil', '10', 0),
(3, 'Skala Besar', '20', 0),
(4, 'Waktu', '10', 0),
(5, 'Urgent', '30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(150) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `penilaian` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `username`, `password`, `id_jabatan`, `tempatlahir`, `tanggallahir`, `tel`, `email`, `alamat`, `image`, `penilaian`, `level`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Maulana Nurul Ikhsan', 'Laki-Laki', 'Maulana 1997', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Jakarta', '1997-07-01', '087786546760', 'maulananurulikhsan@gmail.com', 'Bekasi', '456-298-unnamed.png', '1', 'Admin', 1, 'Maulana 01', 'Maulana 01', '2021-06-05 08:58:20', '2021-09-07 01:51:31'),
(2, 'Aziz', 'Laki-Laki', 'Aziz 02', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Bekasi', '1996-01-02', '08989148124', 'aziz@gmail.com', 'Jakarta', '889-default.jpg', '', 'Pegawai', 1, 'Amarudin 22', 'Amarudin 22', '2021-06-06 15:33:52', '2021-07-11 23:28:27'),
(3, 'Amira', 'Perempuan', 'Amira 22', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Jakarta', '1993-08-11', '08979147124912', 'amira@gmail.com', 'Bekasi', '298-unnamed.png', '', 'Admin', 1, 'Maulana 01', 'Maulana 01', '2021-06-06 15:08:50', '2021-07-11 23:28:30'),
(4, 'Eka Arsana', 'Laki-Laki', 'Eka', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Jakarta', '1999-04-07', '08979914712', 'ekaarsana@gmail.com', 'Bekasi', '298-unnamed.png', '', 'Pegawai', 1, 'Maulana 01', 'Maulana 01', '2021-06-28 12:40:57', '2021-07-11 23:32:23'),
(5, 'Andi Samsudin', 'Laki-Laki', 'Andi220', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Jogjakarta', '1995-06-01', '08799149128', 'andi@gmail.com', 'Jakarta', '298-unnamed.png', '', 'pegawai', 1, 'Maulana 01', 'Maulana 01', '2021-06-28 12:48:08', '2021-07-11 23:32:25'),
(6, 'Panji Saputra', 'Laki-Laki', 'Panji 111', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Sumatra', '1995-06-02', '08789134812', 'panji@gmail.com', 'Jakarta', '298-unnamed.png', '', 'pegawai', 1, 'Maulana 01', 'Maulana 01', '2021-06-28 12:48:08', '2021-06-28 12:49:18'),
(7, 'Wahyu Utama', 'Laki-Laki', 'Wahyu12', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Bandung', '1992-06-15', '0887248123', 'wahyuutama@gmail.com', 'Bekasi', '889-default.jpg', '', 'pegawai', 1, 'Maulana 01', 'Maulana 01', '2021-06-28 13:02:49', '2021-06-28 13:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `deskripsii` varchar(150) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_case` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_priority` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `deskripsii`, `id_kategori`, `id_case`, `id_tracking`, `id_pegawai`, `id_priority`, `start_date`, `due_date`, `is_delete`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Voucher', 'Pembuatan Voucher', 1, 3, 6, 2, 2, '2021-11-02', '2021-11-30', 0, 'Maulana 1997', '2021-11-01 18:10:03', 'Maulana 1997', '2021-11-22 13:12:10'),
(4, 'E-Puskesmas', 'Sistem Informasi Puskemas', 4, 1, 3, 2, 2, '2021-06-28', '2021-07-31', 0, 'Maulana 1997', '2021-06-28 07:38:28', 'Maulana 1997', '2021-06-28 07:38:28'),
(5, 'Sistem Informasi Sekolah', 'Sistem informasi sekolah', 4, 1, 3, 6, 2, '2021-06-28', '2021-07-28', 0, 'Maulana 1997', '2021-06-28 09:05:29', 'Maulana 1997', '2021-06-28 09:05:29'),
(6, 'E-SIM', 'Pembuatan Elektronik SIM', 4, 1, 3, 3, 2, '2021-06-11', '2021-07-31', 0, 'Maulana Nurul Ikhsan', '2021-07-11 17:50:46', 'Maulana Nurul Ikhsan', '2021-07-11 17:50:46'),
(7, 'E-Tilang', 'Membuat tilang elektronik', 4, 1, 3, 1, 2, '2021-11-22', '2021-12-11', 0, 'Maulana 1997', '2021-11-22 13:29:53', 'Maulana 1997', '2021-11-22 13:29:53'),
(8, 'Portal', 'Membuat Portal Akademik', 4, 3, 1, 1, 2, '2021-11-22', '2021-12-11', 0, 'Maulana 1997', '2021-11-22 13:30:33', 'Maulana 1997', '2021-11-22 13:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_case`
--

CREATE TABLE `project_case` (
  `id_case` int(11) NOT NULL,
  `nama_case` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_case`
--

INSERT INTO `project_case` (`id_case`, `nama_case`) VALUES
(1, 'Build'),
(2, 'Bug'),
(3, 'Feature'),
(4, 'Doc & Adm');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rule` int(11) NOT NULL,
  `konsep_diri` varchar(150) NOT NULL,
  `pengetahuan` varchar(150) NOT NULL,
  `keterampilan` varchar(150) NOT NULL,
  `penilaian` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rule`, `konsep_diri`, `pengetahuan`, `keterampilan`, `penilaian`) VALUES
(1, 'Kurang', 'Kurang', 'Baik', 'Tidak Kompeten'),
(2, 'Kurang', 'Kurang', 'Cukup', 'Tidak Kompeten'),
(3, 'Kurang', 'Kurang', 'Kurang', 'Tidak Kompeten'),
(4, 'Kurang', 'Cukup', 'Baik', 'Kompeten'),
(5, 'Kurang', 'Cukup', 'Cukup', 'Kompeten'),
(6, 'CUkup', 'Cukup', 'Kurang', 'Kompeten'),
(7, 'Cukup', 'Baik', 'Baik', 'Kompeten'),
(8, 'Cukup', 'Baik', 'Cukup', 'Kompeten'),
(9, 'Cukup', 'Baik', 'Kurang', 'Kompeten'),
(10, 'Cukup', 'Kurang', 'Baik', 'Kompeten'),
(11, 'Baik', 'Kurang', 'Cukup', 'Kompeten'),
(12, 'Baik', 'Kurang', 'Kurang', 'Tidak Kompeten'),
(13, 'Baik', 'Cukup', 'Baik', 'Kompeten'),
(14, 'Baik', 'Cukup', 'Cukup', 'Kompeten'),
(15, 'Baik', 'Cukup', 'Kurang', 'Kompeten');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `nama_task` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_by` varchar(255) NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `nama_task`, `id_project`, `deskripsi`, `start_date`, `due_date`, `id_status`, `create_by`, `create_at`, `update_by`, `update_at`) VALUES
(1, 'Membuat Tampilan', 2, 'Membuat Design', '2021-06-09', '2021-06-15', 5, 'Aziz 02', '2021-11-22 07:27:27', 'Aziz 02', '2021-11-22 07:27:27'),
(2, 'Desain', 4, 'membuat design tampilan', '2021-11-22', '2021-12-11', 4, 'Aziz 02', '2021-11-22 07:29:58', 'Aziz 02', '2021-11-22 07:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id_status`, `nama_status`) VALUES
(1, 'Pending'),
(2, 'Started'),
(3, 'On-Progress'),
(4, 'On-Hold'),
(5, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tb_priority`
--

CREATE TABLE `tb_priority` (
  `id_priority` int(11) NOT NULL,
  `nama_priority` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_priority`
--

INSERT INTO `tb_priority` (`id_priority`, `nama_priority`) VALUES
(1, 'Low'),
(2, 'Normal'),
(3, 'Hight'),
(4, 'Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tracking`
--

CREATE TABLE `tb_tracking` (
  `id_tracking` int(11) NOT NULL,
  `nama_tracking` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tracking`
--

INSERT INTO `tb_tracking` (`id_tracking`, `nama_tracking`) VALUES
(1, 'Pending'),
(3, 'Pengerjaan'),
(4, 'Testing'),
(5, 'Deploy'),
(6, 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`, `image`, `last_activity`, `is_active`) VALUES
(1, 'Maulana Nurul Ikhsan', 'Maulana 01', 'maulananurulikhsan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '476-278-IMG_0517.JPEG', '2021-05-05 05:00:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `nama_variabel` varchar(150) NOT NULL,
  `kurang` varchar(10) NOT NULL,
  `cukup` varchar(10) NOT NULL,
  `baik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `nama_variabel`, `kurang`, `cukup`, `baik`) VALUES
(1, 'Konsep Diri', '1-3', '2-4', '3-5'),
(2, 'Pengetahuan', '1-3', '2-4', '3-5'),
(3, 'Keterampilan', '1-3', '2-4', '3-5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_case` (`id_case`,`id_tracking`,`id_pegawai`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_priority` (`id_priority`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_tracking` (`id_tracking`);

--
-- Indexes for table `project_case`
--
ALTER TABLE `project_case`
  ADD PRIMARY KEY (`id_case`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_priority`
--
ALTER TABLE `tb_priority`
  ADD PRIMARY KEY (`id_priority`);

--
-- Indexes for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_case`
--
ALTER TABLE `project_case`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_priority`
--
ALTER TABLE `tb_priority`
  MODIFY `id_priority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_5` FOREIGN KEY (`id_priority`) REFERENCES `tb_priority` (`id_priority`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_6` FOREIGN KEY (`id_tracking`) REFERENCES `tb_tracking` (`id_tracking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_7` FOREIGN KEY (`id_case`) REFERENCES `project_case` (`id_case`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `task_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
