/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 100113
Source Host           : 127.0.0.1:3306
Source Database       : db_sim_sekolah

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-08-08 15:51:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_gender
-- ----------------------------
DROP TABLE IF EXISTS `m_gender`;
CREATE TABLE `m_gender` (
  `gender_id` varchar(11) NOT NULL,
  `gender_nama` varchar(20) DEFAULT NULL,
  `gender_kode` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for m_hari
-- ----------------------------
DROP TABLE IF EXISTS `m_hari`;
CREATE TABLE `m_hari` (
  `hari_id` int(1) NOT NULL AUTO_INCREMENT,
  `hari_nama` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hari_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan` (
  `jabatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_jam
-- ----------------------------
DROP TABLE IF EXISTS `m_jam`;
CREATE TABLE `m_jam` (
  `jam_id` int(11) NOT NULL AUTO_INCREMENT,
  `jam_ke` varchar(255) DEFAULT NULL,
  `jam-active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jam_id`),
  KEY `jam-active` (`jam-active`),
  CONSTRAINT `m_jam_ibfk_1` FOREIGN KEY (`jam-active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `m_jurusan`;
CREATE TABLE `m_jurusan` (
  `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_nama` varchar(255) DEFAULT NULL,
  `jurusan_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`),
  KEY `jurusan_active` (`jurusan_active`),
  CONSTRAINT `m_jurusan_ibfk_1` FOREIGN KEY (`jurusan_active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `m_kecamatan`;
CREATE TABLE `m_kecamatan` (
  `kecamatan_id` varchar(32) NOT NULL,
  `kecamatan_kode` varchar(10) DEFAULT NULL COMMENT 'Kode Kecamatan',
  `m_kota_id` varchar(32) NOT NULL COMMENT 'Kota, ref ke Tabel m_kota',
  `kecamatan_nama` varchar(50) NOT NULL COMMENT 'Nama Kecamatan',
  `kecamatan_aktif` char(1) DEFAULT NULL,
  `kecamatan_created_by` varchar(50) DEFAULT NULL,
  `kecamatan_created_date` datetime(6) DEFAULT NULL,
  `kecamatan_updated_by` varchar(50) DEFAULT NULL,
  `kecamatan_updated_date` datetime(6) DEFAULT NULL,
  `kecamatan_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data master Kecamatan';

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(255) DEFAULT NULL,
  `kelas_active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kelas_id`),
  KEY `kelas_active` (`kelas_active`),
  CONSTRAINT `m_kelas_ibfk_1` FOREIGN KEY (`kelas_active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_kota
-- ----------------------------
DROP TABLE IF EXISTS `m_kota`;
CREATE TABLE `m_kota` (
  `kota_id` varchar(32) NOT NULL,
  `kota_kode` varchar(10) DEFAULT NULL COMMENT 'Kode Kota',
  `m_propinsi_id` varchar(32) NOT NULL COMMENT 'Propinsi, ref ke Tabel Propinsi',
  `kota_nama` varchar(50) NOT NULL COMMENT 'Nama propinsi',
  `kota_aktif` char(1) DEFAULT NULL,
  `kota_created_by` varchar(50) DEFAULT NULL,
  `kota_created_date` datetime(6) DEFAULT NULL,
  `kota_updated_by` varchar(50) DEFAULT NULL,
  `kota_updated_date` datetime(6) DEFAULT NULL,
  `kota_revised` int(11) DEFAULT NULL,
  `kota_counter` int(11) DEFAULT NULL,
  `kota_kab` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data master kota';

-- ----------------------------
-- Table structure for m_mapel
-- ----------------------------
DROP TABLE IF EXISTS `m_mapel`;
CREATE TABLE `m_mapel` (
  `mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_nama` varchar(255) DEFAULT NULL,
  `mapel_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mapel_id`),
  KEY `mapel_active` (`mapel_active`),
  CONSTRAINT `m_mapel_ibfk_1` FOREIGN KEY (`mapel_active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai` (
  `pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pegawai_nip` varchar(50) DEFAULT NULL,
  `pegawai_nama` varchar(50) DEFAULT NULL,
  `pegawai_jk` varchar(1) DEFAULT 'l',
  `pegawai_tgl_lahir` date DEFAULT NULL,
  `pegawai_golongan` varchar(2) DEFAULT NULL,
  `kota_id` varchar(11) DEFAULT NULL,
  `kecamatan_id` varchar(11) DEFAULT NULL,
  `pegawai_alamat` text,
  `pegawai_telp` varchar(15) DEFAULT NULL,
  `pegawai_foto` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`),
  KEY `user_id` (`user_id`),
  KEY `pegawai_jk` (`pegawai_jk`),
  KEY `kota_id` (`kota_id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  CONSTRAINT `m_pegawai_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`),
  CONSTRAINT `m_pegawai_ibfk_2` FOREIGN KEY (`pegawai_jk`) REFERENCES `m_gender` (`gender_id`),
  CONSTRAINT `m_pegawai_ibfk_3` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`kota_id`),
  CONSTRAINT `m_pegawai_ibfk_4` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_semester
-- ----------------------------
DROP TABLE IF EXISTS `m_semester`;
CREATE TABLE `m_semester` (
  `semester_id` int(1) NOT NULL AUTO_INCREMENT,
  `semester_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_nis` varchar(255) DEFAULT NULL,
  `siswa_nama` varchar(255) DEFAULT NULL,
  `siswa_jk` varchar(1) DEFAULT 'l',
  `siswa_tgl_lahir` varchar(255) DEFAULT NULL,
  `kota_id` varchar(11) DEFAULT NULL,
  `kecamatan_id` varchar(11) DEFAULT NULL,
  `siswa_alamat` text,
  `siswa_ayah` varchar(255) DEFAULT NULL,
  `siswa_ibu` varchar(255) DEFAULT NULL,
  `siswa_wali` varchar(255) DEFAULT NULL,
  `telp_ortu` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`siswa_id`),
  KEY `siswa_jk` (`siswa_jk`),
  KEY `kota_id` (`kota_id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  CONSTRAINT `m_siswa_ibfk_1` FOREIGN KEY (`siswa_jk`) REFERENCES `m_gender` (`gender_id`),
  CONSTRAINT `m_siswa_ibfk_2` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`kota_id`),
  CONSTRAINT `m_siswa_ibfk_3` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_status
-- ----------------------------
DROP TABLE IF EXISTS `m_status`;
CREATE TABLE `m_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_nama` varchar(20) DEFAULT NULL,
  `status_kode` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_ujian
-- ----------------------------
DROP TABLE IF EXISTS `m_ujian`;
CREATE TABLE `m_ujian` (
  `ujian_id` int(11) NOT NULL AUTO_INCREMENT,
  `ujian_kode` varchar(255) DEFAULT NULL,
  `ujian_nama` varchar(255) DEFAULT NULL,
  `ujian_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ujian_id`),
  KEY `ujian_active` (`ujian_active`),
  CONSTRAINT `m_ujian_ibfk_1` FOREIGN KEY (`ujian_active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_pass_verif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_absensi
-- ----------------------------
DROP TABLE IF EXISTS `t_absensi`;
CREATE TABLE `t_absensi` (
  `absensi_id` int(11) NOT NULL AUTO_INCREMENT,
  `jadwal_id` int(11) DEFAULT NULL,
  `t_siswa_id` int(11) DEFAULT NULL,
  `siswa` enum('h','i','s','a') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`absensi_id`),
  KEY `jadwal_id` (`jadwal_id`),
  KEY `t_siswa_id` (`t_siswa_id`),
  CONSTRAINT `t_absensi_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `t_jadwal` (`jadwal_id`),
  CONSTRAINT `t_absensi_ibfk_2` FOREIGN KEY (`t_siswa_id`) REFERENCES `t_siswa` (`t_siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `t_jadwal`;
CREATE TABLE `t_jadwal` (
  `jadwal_id` int(11) NOT NULL AUTO_INCREMENT,
  `jam_id` int(11) DEFAULT NULL,
  `hari_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `t_kelas_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `jadwal_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jadwal_id`),
  KEY `jam_id` (`jam_id`),
  KEY `hari_id` (`hari_id`),
  KEY `mapel_id` (`mapel_id`),
  KEY `t_kelas_id` (`t_kelas_id`),
  KEY `pegawai_id` (`pegawai_id`),
  CONSTRAINT `t_jadwal_ibfk_1` FOREIGN KEY (`jam_id`) REFERENCES `m_jam` (`jam_id`),
  CONSTRAINT `t_jadwal_ibfk_2` FOREIGN KEY (`hari_id`) REFERENCES `m_hari` (`hari_id`),
  CONSTRAINT `t_jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `m_mapel` (`mapel_id`),
  CONSTRAINT `t_jadwal_ibfk_4` FOREIGN KEY (`t_kelas_id`) REFERENCES `t_kelas` (`t_kelas_id`),
  CONSTRAINT `t_jadwal_ibfk_5` FOREIGN KEY (`pegawai_id`) REFERENCES `m_pegawai` (`pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_kelas
-- ----------------------------
DROP TABLE IF EXISTS `t_kelas`;
CREATE TABLE `t_kelas` (
  `t_kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_kelas_id`),
  KEY `semester_id` (`semester_id`),
  KEY `kelas_id` (`kelas_id`),
  KEY `jurusan_id` (`jurusan_id`),
  CONSTRAINT `t_kelas_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `m_jurusan` (`jurusan_id`),
  CONSTRAINT `t_kelas_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `m_semester` (`semester_id`),
  CONSTRAINT `t_kelas_ibfk_4` FOREIGN KEY (`kelas_id`) REFERENCES `m_kelas` (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_siswa
-- ----------------------------
DROP TABLE IF EXISTS `t_siswa`;
CREATE TABLE `t_siswa` (
  `t_siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `t_kelas_id` int(11) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `t_siswa_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_siswa_id`),
  KEY `t_kelas_id` (`t_kelas_id`),
  KEY `siswa_id` (`siswa_id`),
  CONSTRAINT `t_siswa_ibfk_2` FOREIGN KEY (`t_kelas_id`) REFERENCES `t_kelas` (`t_kelas_id`),
  CONSTRAINT `t_siswa_ibfk_3` FOREIGN KEY (`siswa_id`) REFERENCES `m_siswa` (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_ujian
-- ----------------------------
DROP TABLE IF EXISTS `t_ujian`;
CREATE TABLE `t_ujian` (
  `t_ujian_id` int(11) NOT NULL,
  `t_ujian_kode` varchar(50) DEFAULT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `t_ujian_tanggal` date DEFAULT NULL,
  `t_ujian_active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_ujian_id`),
  KEY `t_jadwal_id` (`t_jadwal_id`),
  KEY `ujian_id` (`ujian_id`),
  KEY `t_ujian_active` (`t_ujian_active`),
  CONSTRAINT `t_ujian_ibfk_1` FOREIGN KEY (`t_jadwal_id`) REFERENCES `t_jadwal` (`jadwal_id`),
  CONSTRAINT `t_ujian_ibfk_2` FOREIGN KEY (`ujian_id`) REFERENCES `m_ujian` (`ujian_id`),
  CONSTRAINT `t_ujian_ibfk_3` FOREIGN KEY (`t_ujian_active`) REFERENCES `m_status` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for t_ujian_nilai
-- ----------------------------
DROP TABLE IF EXISTS `t_ujian_nilai`;
CREATE TABLE `t_ujian_nilai` (
  `nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_ujian_id` int(11) DEFAULT NULL,
  `t_siswa_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nilai_id`),
  KEY `t_siswa_id` (`t_siswa_id`),
  KEY `t_ujian_id` (`t_ujian_id`),
  CONSTRAINT `t_ujian_nilai_ibfk_1` FOREIGN KEY (`t_siswa_id`) REFERENCES `t_siswa` (`t_siswa_id`),
  CONSTRAINT `t_ujian_nilai_ibfk_2` FOREIGN KEY (`t_ujian_id`) REFERENCES `t_ujian` (`t_ujian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- View structure for v_kelas
-- ----------------------------
DROP VIEW IF EXISTS `v_kelas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_kelas` AS SELECT
t_kelas.t_kelas_id,
t_kelas.kelas_id,
t_kelas.jurusan_id,
t_kelas.semester_id,
t_kelas.t_kelas_active,
t_kelas.tahun,
t_kelas.created_at,
t_kelas.updated_at,
t_kelas.deleted_at,
m_jurusan.jurusan_nama,
m_kelas.kelas_nama,
m_semester.semester_nama,
m_status.status_nama
FROM
t_kelas
left JOIN m_semester ON t_kelas.semester_id = m_semester.semester_id
left JOIN m_kelas ON t_kelas.kelas_id = m_kelas.kelas_id
left JOIN m_jurusan ON t_kelas.jurusan_id = m_jurusan.jurusan_id
left JOIN m_status ON t_kelas.t_kelas_active = m_status.status_id ;
