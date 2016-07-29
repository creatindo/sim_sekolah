-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 08:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Menu Management', 'menu', 'fa', 1, 21, NULL, '2016-07-25 22:34:08', NULL),
(20, 'Siswa', 'siswa', 'fa', 1, 22, NULL, '2016-07-25 22:34:47', NULL),
(21, 'Setting', '#', 'fa fa-cog', 1, 0, '2016-07-25 02:33:30', NULL, NULL),
(22, 'Siswa', '#', 'fa fa-th-large', 1, 0, '2016-07-25 22:29:29', '2016-07-28 12:19:41', NULL),
(23, 'Hari', 'hari', 'fa', 1, 21, '2016-07-25 22:33:46', '2016-07-28 12:06:25', NULL),
(24, 'Semester', 'semester', 'fa', 1, 21, '2016-07-25 22:41:12', NULL, NULL),
(25, 'Akademik', '#', 'fa fa-home', 1, 0, '2016-07-25 22:42:16', '2016-07-25 22:43:06', NULL),
(26, 'Jam Pelajaran', 'jam', 'fa', 1, 21, '2016-07-28 11:58:53', NULL, NULL),
(27, 'Mata pelajaran', 'mapel', 'fa', 1, 22, '2016-07-28 12:02:20', NULL, NULL),
(28, 'Jurusan', 'jurusan', 'fa', 1, 21, '2016-07-28 12:03:02', '2016-07-28 12:22:09', NULL),
(29, 'Jabatan', 'jabatan', 'fa', 1, 37, '2016-07-28 12:04:55', '2016-07-28 12:16:32', NULL),
(30, 'Pegawai', 'pegawai', 'fa', 1, 37, '2016-07-28 12:05:29', '2016-07-28 12:16:07', NULL),
(31, 'Jenis Ujian', 'ujian', 'fa', 1, 38, '2016-07-28 12:07:50', '2016-07-28 12:17:59', NULL),
(32, 'Kelas', 'kelas', 'fa', 1, 21, '2016-07-28 12:09:17', '2016-07-28 12:22:37', NULL),
(33, 'Jadwal Pelajaran', 'jadwal', 'fa', 1, 25, '2016-07-28 12:11:38', '2016-07-28 12:21:48', NULL),
(34, 'Siswa', 't_siswa', 'fa', 1, 25, '2016-07-28 12:12:13', NULL, NULL),
(35, 'Ujian', 't_ujian', 'fa', 1, 38, '2016-07-28 12:13:18', '2016-07-28 12:18:59', NULL),
(36, 'Absensi', 't_absensi', 'fa', 1, 25, '2016-07-28 12:14:58', NULL, NULL),
(37, 'Pegawai', '#', 'fa fa-user', 1, 0, '2016-07-28 12:15:23', NULL, NULL),
(38, 'Ujian', '#', 'fa fa-pencil', 1, 0, '2016-07-28 12:16:53', NULL, NULL),
(39, 'Nilai', 'nilai', 'fa', 1, 38, '2016-07-28 12:29:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_hari`
--

CREATE TABLE `m_hari` (
  `hari_id` int(1) NOT NULL,
  `hari_nama` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_hari`
--

INSERT INTO `m_hari` (`hari_id`, `hari_nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Senin', NULL, NULL, NULL),
(2, 'Selasa', NULL, NULL, NULL),
(3, 'Rabu', NULL, NULL, NULL),
(4, 'Kamis', NULL, NULL, NULL),
(5, 'Jumat', NULL, NULL, NULL),
(6, 'Sabtu', NULL, NULL, NULL),
(7, 'Minggu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_jabatan`
--

CREATE TABLE `m_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_jam`
--

CREATE TABLE `m_jam` (
  `jam_id` int(11) NOT NULL,
  `jam_ke` varchar(255) DEFAULT NULL,
  `jam-active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_jurusan`
--

CREATE TABLE `m_jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(255) DEFAULT NULL,
  `jurusan_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jurusan`
--

INSERT INTO `m_jurusan` (`jurusan_id`, `jurusan_nama`, `jurusan_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'd', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(255) DEFAULT NULL,
  `kelas_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_mapel`
--

CREATE TABLE `m_mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_nama` varchar(255) DEFAULT NULL,
  `mapel_active` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `pegawai_id` varchar(50) NOT NULL,
  `pegawai_nip` varchar(50) DEFAULT NULL,
  `pegawai_nama` varchar(50) DEFAULT NULL,
  `pegawai_jk` enum('l','p') DEFAULT 'l',
  `pegawai_tgl_lahir` date DEFAULT NULL,
  `pegawai_golongan` varchar(2) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `pegawai_alamat` varchar(255) DEFAULT NULL,
  `pegawai_telp` varchar(15) DEFAULT NULL,
  `pegawai_foto` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_semester`
--

CREATE TABLE `m_semester` (
  `semester_id` int(1) NOT NULL,
  `semester_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(255) DEFAULT NULL,
  `siswa_nama` varchar(255) DEFAULT NULL,
  `siswa_jk` enum('l','p') DEFAULT 'l',
  `siswa_tgl_lahir` varchar(255) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `siswa_alamat` varchar(255) DEFAULT NULL,
  `siswa_ayah` varchar(255) DEFAULT NULL,
  `siswa_ibu` varchar(255) DEFAULT NULL,
  `siswa_wali` varchar(255) DEFAULT NULL,
  `telp_ortu` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_siswa`
--

INSERT INTO `m_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jk`, `siswa_tgl_lahir`, `kota_id`, `kecamatan_id`, `siswa_alamat`, `siswa_ayah`, `siswa_ibu`, `siswa_wali`, `telp_ortu`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, '1', '1', 'l', '1', 1, 1, '1', '1', '1', '1', NULL, '2016-07-25 02:06:47', NULL, '2016-07-25 07:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `status_id` int(11) NOT NULL,
  `status_label` varchar(20) DEFAULT NULL,
  `status_kode` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`status_id`, `status_label`, `status_kode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aktif', '1', '2016-07-26 02:19:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tidak Aktif', '0', '2016-07-26 02:19:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_ujian`
--

CREATE TABLE `m_ujian` (
  `ujian_id` int(11) NOT NULL,
  `ujian_kode` varchar(255) DEFAULT NULL,
  `ujian_nama` varchar(255) DEFAULT NULL,
  `ujian_active` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `t_pegawai_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_pass_verif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi`
--

CREATE TABLE `t_absensi` (
  `absensi_id` int(11) NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `t_siswa_id` int(11) DEFAULT NULL,
  `siswa` enum('h','i','s','a') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `jam_id` int(11) DEFAULT NULL,
  `hari_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `t_kelas_id` int(11) DEFAULT NULL,
  `jadwal_active` enum('1','0') DEFAULT '1',
  `pegawai_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `t_kelas_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `t_kelas_active` enum('1','0') DEFAULT '1',
  `tahun` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `t_pegawai_id` int(11) NOT NULL,
  `pagawai_id` varchar(50) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `t_pegawai_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `t_siswa_id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `t_kelas_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `t_siswa_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`t_siswa_id`, `siswa_id`, `t_kelas_id`, `create_date`, `t_siswa_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, '1', '2016-07-26 02:21:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_ujian`
--

CREATE TABLE `t_ujian` (
  `t_ujian_id` int(11) NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `t_ujian_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_ujian_nilai`
--

CREATE TABLE `t_ujian_nilai` (
  `nilai_id` int(11) NOT NULL,
  `t_ujian_id` int(11) DEFAULT NULL,
  `t_siswa_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_hari`
--
ALTER TABLE `m_hari`
  ADD PRIMARY KEY (`hari_id`);

--
-- Indexes for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `m_jam`
--
ALTER TABLE `m_jam`
  ADD PRIMARY KEY (`jam_id`);

--
-- Indexes for table `m_jurusan`
--
ALTER TABLE `m_jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `m_semester`
--
ALTER TABLE `m_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `m_ujian`
--
ALTER TABLE `m_ujian`
  ADD PRIMARY KEY (`ujian_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `t_pegawai_id` (`t_pegawai_id`);

--
-- Indexes for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `t_siswa_id` (`t_siswa_id`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `jam_id` (`jam_id`),
  ADD KEY `hari_id` (`hari_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `t_kelas_id` (`t_kelas_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`t_kelas_id`),
  ADD KEY `m_kelas_id` (`kelas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`t_pegawai_id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `pagawai_id` (`pagawai_id`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`t_siswa_id`),
  ADD KEY `t_kelas_id` (`t_kelas_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `t_ujian`
--
ALTER TABLE `t_ujian`
  ADD PRIMARY KEY (`t_ujian_id`),
  ADD KEY `t_jadwal_id` (`t_jadwal_id`),
  ADD KEY `ujian_id` (`ujian_id`);

--
-- Indexes for table `t_ujian_nilai`
--
ALTER TABLE `t_ujian_nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `t_siswa_id` (`t_siswa_id`),
  ADD KEY `t_ujian_id` (`t_ujian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `m_hari`
--
ALTER TABLE `m_hari`
  MODIFY `hari_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_jabatan`
--
ALTER TABLE `m_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_jam`
--
ALTER TABLE `m_jam`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_semester`
--
ALTER TABLE `m_semester`
  MODIFY `semester_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_siswa`
--
ALTER TABLE `m_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_ujian`
--
ALTER TABLE `m_ujian`
  MODIFY `ujian_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_absensi`
--
ALTER TABLE `t_absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `t_kelas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `t_pegawai_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `t_siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_ujian_nilai`
--
ALTER TABLE `t_ujian_nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_ibfk_1` FOREIGN KEY (`t_pegawai_id`) REFERENCES `t_pegawai` (`t_pegawai_id`);

--
-- Constraints for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD CONSTRAINT `t_absensi_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `t_jadwal` (`jadwal_id`),
  ADD CONSTRAINT `t_absensi_ibfk_2` FOREIGN KEY (`t_siswa_id`) REFERENCES `t_siswa` (`t_siswa_id`);

--
-- Constraints for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD CONSTRAINT `t_jadwal_ibfk_1` FOREIGN KEY (`jam_id`) REFERENCES `m_jam` (`jam_id`),
  ADD CONSTRAINT `t_jadwal_ibfk_2` FOREIGN KEY (`hari_id`) REFERENCES `m_hari` (`hari_id`),
  ADD CONSTRAINT `t_jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `m_mapel` (`mapel_id`),
  ADD CONSTRAINT `t_jadwal_ibfk_4` FOREIGN KEY (`t_kelas_id`) REFERENCES `t_kelas` (`t_kelas_id`),
  ADD CONSTRAINT `t_jadwal_ibfk_5` FOREIGN KEY (`pegawai_id`) REFERENCES `t_pegawai` (`t_pegawai_id`);

--
-- Constraints for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD CONSTRAINT `t_kelas_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `m_kelas` (`kelas_id`),
  ADD CONSTRAINT `t_kelas_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `m_jurusan` (`jurusan_id`),
  ADD CONSTRAINT `t_kelas_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `m_semester` (`semester_id`);

--
-- Constraints for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `m_jabatan` (`jabatan_id`),
  ADD CONSTRAINT `t_pegawai_ibfk_3` FOREIGN KEY (`pagawai_id`) REFERENCES `m_pegawai` (`pegawai_id`);

--
-- Constraints for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD CONSTRAINT `t_siswa_ibfk_2` FOREIGN KEY (`t_kelas_id`) REFERENCES `t_kelas` (`t_kelas_id`),
  ADD CONSTRAINT `t_siswa_ibfk_3` FOREIGN KEY (`siswa_id`) REFERENCES `m_siswa` (`siswa_id`);

--
-- Constraints for table `t_ujian`
--
ALTER TABLE `t_ujian`
  ADD CONSTRAINT `t_ujian_ibfk_1` FOREIGN KEY (`t_jadwal_id`) REFERENCES `t_jadwal` (`jadwal_id`),
  ADD CONSTRAINT `t_ujian_ibfk_2` FOREIGN KEY (`ujian_id`) REFERENCES `m_ujian` (`ujian_id`);

--
-- Constraints for table `t_ujian_nilai`
--
ALTER TABLE `t_ujian_nilai`
  ADD CONSTRAINT `t_ujian_nilai_ibfk_1` FOREIGN KEY (`t_siswa_id`) REFERENCES `t_siswa` (`t_siswa_id`),
  ADD CONSTRAINT `t_ujian_nilai_ibfk_2` FOREIGN KEY (`t_ujian_id`) REFERENCES `t_ujian` (`t_ujian_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
