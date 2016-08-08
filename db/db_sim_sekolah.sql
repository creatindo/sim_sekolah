/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 100113
Source Host           : 127.0.0.1:3306
Source Database       : db_sim_sekolah

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-08-08 12:39:10
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
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('15', 'Menu Management', 'menu', 'fa', '1', '21', '2016-08-07 14:41:31', '2016-07-26 05:34:08', null);
INSERT INTO `menu` VALUES ('20', 'Siswa', 'siswa', 'fa', '1', '47', '2016-08-07 14:41:35', '2016-08-07 08:42:37', null);
INSERT INTO `menu` VALUES ('21', 'Setting', '#', 'fa fa-cog', '1', '0', '2016-07-25 09:33:30', null, null);
INSERT INTO `menu` VALUES ('23', 'Hari', 'hari', 'fa', '1', '46', '2016-07-26 05:33:46', '2016-08-07 08:45:57', null);
INSERT INTO `menu` VALUES ('24', 'Semester', 'semester', 'fa', '1', '45', '2016-07-26 05:41:12', '2016-08-07 08:36:04', null);
INSERT INTO `menu` VALUES ('26', 'Jam Pelajaran', 'jam', 'fa', '1', '46', '2016-07-28 18:58:53', '2016-08-07 08:45:23', null);
INSERT INTO `menu` VALUES ('27', 'Mata Pelajaran', 'mapel', 'fa', '1', '46', '2016-07-28 19:02:20', '2016-08-07 08:46:06', null);
INSERT INTO `menu` VALUES ('28', 'Jurusan', 'jurusan', 'fa', '1', '45', '2016-07-28 19:03:02', '2016-08-07 08:37:12', null);
INSERT INTO `menu` VALUES ('29', 'Jabatan', 'jabatan', 'fa', '1', '44', '2016-07-28 19:04:55', '2016-07-28 19:16:32', null);
INSERT INTO `menu` VALUES ('30', 'Pegawai', 'pegawai', 'fa', '1', '44', '2016-07-28 19:05:29', '2016-07-28 19:16:07', null);
INSERT INTO `menu` VALUES ('31', 'Jenis Ujian', 'ujian', 'fa', '1', '48', '2016-07-28 19:07:50', '2016-07-28 19:17:59', null);
INSERT INTO `menu` VALUES ('32', 'Kelas', 'kelas', 'fa', '1', '45', '2016-07-28 19:09:17', '2016-08-07 08:39:09', null);
INSERT INTO `menu` VALUES ('33', 'Jadwal Pelajaran', 'jadwal', 'fa', '1', '46', '2016-07-28 19:11:38', '2016-07-28 19:21:48', null);
INSERT INTO `menu` VALUES ('34', 'Data Siswa', 't_siswa', 'fa', '1', '47', '2016-07-28 19:12:13', '2016-08-07 08:42:43', null);
INSERT INTO `menu` VALUES ('35', 'Data Ujian', 't_ujian', 'fa', '1', '48', '2016-07-28 19:13:18', '2016-08-07 08:43:45', null);
INSERT INTO `menu` VALUES ('36', 'Absensi', 't_absensi', 'fa', '1', '49', '2016-07-28 19:14:58', '2016-08-07 09:32:22', null);
INSERT INTO `menu` VALUES ('39', 'Nilai', 't_ujian_nilai', 'fa', '1', '48', '2016-07-28 19:29:44', '2016-07-31 04:40:34', null);
INSERT INTO `menu` VALUES ('40', 'Data Kelas', 't_kelas', 'fa', '1', '45', '2016-07-31 05:47:52', '2016-08-07 08:41:34', null);
INSERT INTO `menu` VALUES ('42', 'Data Pegawai', 't_pegawai', 'fa', '1', '44', '2016-08-07 08:48:39', '2016-08-07 08:48:58', null);
INSERT INTO `menu` VALUES ('44', 'Pegawai', '#', 'fa fa-user', '1', '0', '2016-07-28 19:15:23', null, null);
INSERT INTO `menu` VALUES ('45', 'Kelas', '#', 'fa fa-list', '1', '0', '2016-08-07 08:34:59', null, null);
INSERT INTO `menu` VALUES ('46', 'Jadwal Pelajaran', '#', 'fa fa-home', '1', '0', '2016-07-26 05:42:16', '2016-08-07 08:44:50', null);
INSERT INTO `menu` VALUES ('47', 'Siswa', '#', 'fa fa-th-large', '1', '0', '2016-07-26 05:29:29', '2016-07-28 19:19:41', null);
INSERT INTO `menu` VALUES ('48', 'Ujian', '#', 'fa fa-pencil', '1', '0', '2016-07-28 19:16:53', null, null);
INSERT INTO `menu` VALUES ('49', 'Absensi', '#', 'fa fa-calendar', '1', '0', '2016-08-07 09:32:08', null, null);

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
-- Records of m_hari
-- ----------------------------
INSERT INTO `m_hari` VALUES ('1', 'Senin', null, null, null);
INSERT INTO `m_hari` VALUES ('2', 'Selasa', null, null, null);
INSERT INTO `m_hari` VALUES ('3', 'Rabu', null, null, null);
INSERT INTO `m_hari` VALUES ('4', 'Kamis', null, null, null);
INSERT INTO `m_hari` VALUES ('5', 'Jumat', null, null, null);
INSERT INTO `m_hari` VALUES ('6', 'Sabtu', null, null, null);
INSERT INTO `m_hari` VALUES ('7', 'Minggu', null, null, null);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for m_jam
-- ----------------------------
DROP TABLE IF EXISTS `m_jam`;
CREATE TABLE `m_jam` (
  `jam_id` int(11) NOT NULL AUTO_INCREMENT,
  `jam_ke` varchar(255) DEFAULT NULL,
  `jam-active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_jam
-- ----------------------------

-- ----------------------------
-- Table structure for m_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `m_jurusan`;
CREATE TABLE `m_jurusan` (
  `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_nama` varchar(255) DEFAULT NULL,
  `jurusan_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_jurusan
-- ----------------------------
INSERT INTO `m_jurusan` VALUES ('1', 'umum', '1', null, '2016-07-31 05:24:16', null);

-- ----------------------------
-- Table structure for m_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_kelas`;
CREATE TABLE `m_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(255) DEFAULT NULL,
  `kelas_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_kelas
-- ----------------------------
INSERT INTO `m_kelas` VALUES ('1', '1 a', '1', '2016-07-31 05:27:19', '2016-07-31 06:09:46', null);
INSERT INTO `m_kelas` VALUES ('2', '1 b', '1', '2016-07-31 06:09:56', null, null);

-- ----------------------------
-- Table structure for m_mapel
-- ----------------------------
DROP TABLE IF EXISTS `m_mapel`;
CREATE TABLE `m_mapel` (
  `mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_nama` varchar(255) DEFAULT NULL,
  `mapel_active` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mapel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_mapel
-- ----------------------------

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai` (
  `pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pegawai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_pegawai
-- ----------------------------
INSERT INTO `m_pegawai` VALUES ('1', '1', '1', 'l', '0000-00-00', '1', '1', '1', '1', '1', '1', '0000-00-00', '2016-08-08 06:57:34', null, null);

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
-- Records of m_semester
-- ----------------------------
INSERT INTO `m_semester` VALUES ('1', 'Semester 1', null, '2016-08-08 04:37:51', null);
INSERT INTO `m_semester` VALUES ('2', 'Semester 2', null, null, null);
INSERT INTO `m_semester` VALUES ('3', 'Semester 3', null, null, null);
INSERT INTO `m_semester` VALUES ('4', 'Semester 4', null, null, null);
INSERT INTO `m_semester` VALUES ('5', 'Semester 5', null, null, null);
INSERT INTO `m_semester` VALUES ('6', 'Semester 6', null, null, null);
INSERT INTO `m_semester` VALUES ('7', 'Semester 7', null, null, null);
INSERT INTO `m_semester` VALUES ('8', 'Semester 8', null, null, null);
INSERT INTO `m_semester` VALUES ('9', 'Semester 9', null, null, null);
INSERT INTO `m_semester` VALUES ('10', 'Semester 10', null, null, null);
INSERT INTO `m_semester` VALUES ('11', 'Semester 11', null, null, null);
INSERT INTO `m_semester` VALUES ('12', 'Semester 12', null, null, null);

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_siswa
-- ----------------------------
INSERT INTO `m_siswa` VALUES ('1', '1', '1', 'l', '1', '1', '1', '1', '1', '1', '1', null, '2016-07-25 09:06:47', null, '2016-07-25 14:09:09');
INSERT INTO `m_siswa` VALUES ('2', '123', 'bulyan', 'l', '01/11/2000', '1', '1', 'sumenep', 'abdullah', 'tulani', 'wali', '456789', '2016-07-31 05:22:04', null, '2016-07-31 05:22:38');

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
-- Records of m_status
-- ----------------------------
INSERT INTO `m_status` VALUES ('0', 'Tidak Aktif', '0', '2016-07-26 09:19:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `m_status` VALUES ('1', 'Aktif', '1', '2016-07-26 09:19:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for m_ujian
-- ----------------------------
DROP TABLE IF EXISTS `m_ujian`;
CREATE TABLE `m_ujian` (
  `ujian_id` int(11) NOT NULL AUTO_INCREMENT,
  `ujian_kode` varchar(255) DEFAULT NULL,
  `ujian_nama` varchar(255) DEFAULT NULL,
  `ujian_active` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ujian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_ujian
-- ----------------------------

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `t_pegawai_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_pass_verif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `t_pegawai_id` (`t_pegawai_id`),
  CONSTRAINT `m_user_ibfk_1` FOREIGN KEY (`t_pegawai_id`) REFERENCES `t_pegawai` (`t_pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_user
-- ----------------------------

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
-- Records of t_absensi
-- ----------------------------

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
  `jadwal_active` enum('1','0') DEFAULT '1',
  `pegawai_id` int(11) DEFAULT NULL,
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
  CONSTRAINT `t_jadwal_ibfk_5` FOREIGN KEY (`pegawai_id`) REFERENCES `t_pegawai` (`t_pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_jadwal
-- ----------------------------

-- ----------------------------
-- Table structure for t_kelas
-- ----------------------------
DROP TABLE IF EXISTS `t_kelas`;
CREATE TABLE `t_kelas` (
  `t_kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `t_kelas_active` enum('1','0') DEFAULT '1',
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
-- Records of t_kelas
-- ----------------------------
INSERT INTO `t_kelas` VALUES ('1', '1', '1', '1', '0', '2016', '2016-07-31 06:10:21', '2016-07-31 06:54:38', null);
INSERT INTO `t_kelas` VALUES ('2', '2', '1', '1', '1', '2016', '2016-07-31 06:28:37', null, null);

-- ----------------------------
-- Table structure for t_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
  `t_pegawai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagawai_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `t_pegawai_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_pegawai_id`),
  KEY `jabatan_id` (`jabatan_id`),
  KEY `pagawai_id` (`pagawai_id`),
  CONSTRAINT `t_pegawai_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `m_jabatan` (`jabatan_id`),
  CONSTRAINT `t_pegawai_ibfk_3` FOREIGN KEY (`pagawai_id`) REFERENCES `m_pegawai` (`pegawai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for t_siswa
-- ----------------------------
DROP TABLE IF EXISTS `t_siswa`;
CREATE TABLE `t_siswa` (
  `t_siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `t_kelas_id` int(11) DEFAULT NULL,
  `tahun` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
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
-- Records of t_siswa
-- ----------------------------
INSERT INTO `t_siswa` VALUES ('1', null, null, null, '1', '2016-07-26 09:21:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `t_siswa` VALUES ('2', '2', '1', '0000-00-00 00:00:00', '0', '2016-07-31 07:09:05', '2016-07-31 09:57:47', null);

-- ----------------------------
-- Table structure for t_ujian
-- ----------------------------
DROP TABLE IF EXISTS `t_ujian`;
CREATE TABLE `t_ujian` (
  `t_ujian_id` int(11) NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `t_jadwal_id` int(11) DEFAULT NULL,
  `t_ujian_active` enum('1','0') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`t_ujian_id`),
  KEY `t_jadwal_id` (`t_jadwal_id`),
  KEY `ujian_id` (`ujian_id`),
  CONSTRAINT `t_ujian_ibfk_1` FOREIGN KEY (`t_jadwal_id`) REFERENCES `t_jadwal` (`jadwal_id`),
  CONSTRAINT `t_ujian_ibfk_2` FOREIGN KEY (`ujian_id`) REFERENCES `m_ujian` (`ujian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ujian
-- ----------------------------

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
-- Records of t_ujian_nilai
-- ----------------------------

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
