-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 08:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gis_kmeans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'Admin', '12345', 'Admin'),
(2, 'Pimpinan', 'Pimpinan', '12345', 'Pimpinan'),
(3, 'Aryo Pratama', 'aryo', '12345', 'Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` text NOT NULL,
  `tgl_berita` date NOT NULL,
  `foto` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `tgl_berita`, `foto`, `keterangan`) VALUES
(1, 'Mubes MABMI XI dan Pelantikan PW MABMI Riau, Zahir : Kita Harus Jaga Adat Budaya', '2023-07-30', 'Screenshot 2023-07-30 211401.png', 'PEKAN BARU - Pengurus Besar Majelis Adat Budaya Melayu Indonesia (PB MABMI) menggelar musyawarah besar ke XI yang dibuka secara resmi di Balai Serindit Rumah Dinas Gubernur Riau, Jalan Diponegoro, Kota Pekanbaru, Riau, Sabtu (29/07/2023).'),
(2, 'Sambut Jamaah Haji Asal Batu Bara, Bupati Zahir Siapkan Tenaga Medis', '2023-07-18', 'Screenshot 2023-07-30 212127.png', 'MEDAN - Bupati Batu Bara Ir. H. Zahir bersama Wabup Oky Iqbal Frima dan Ketua TP PKK Batu Bara Ny. Hj. Maya Indriasari Zahir menyambut dengan penuh gembira dan hangat kepulangan jamaah haji asal Kabupaten Batu Bara Kloter 13 di Aula Madinah, Komplek Asrama Haji, Medan, Senin (17/07/2023).'),
(3, 'Apel Gelar Pasukan Ops Patuh Toba, Bupati Zahir Imbau Masyarakat Tertib Berlalulintas', '2023-07-10', 'Screenshot 2023-07-30 212438.png', 'BATU BARA - Guna meningkatkan kedisiplinan masyarakat dalam berlalulintas, Kepolisian Republik Indonesia (Polri) menggelar Operasi Patuh secara serentak di seluruh daerah.'),
(4, 'Pentas Seni Budaya Kabupaten Batu Bara Tampilkan Kesenian Berbagai Etnis', '2023-07-09', 'Screenshot 2023-07-30 214419.png', 'BATU BARA - Pentas seni budaya daerah Kabupaten Batu Bara tahun 2023 resmi ditutup Bupati Batu Bara Ir. H. Zahir, M.AP., di Lapangan Bola Kelurahan Labuhan Ruku, Kecamatan Talawi, Sabtu (08/07/2023).'),
(5, 'Idul Adha 1444 H, Pemkab Batu Bara Sembelih 40 Ekor Hewan Kurban', '2023-06-29', 'Screenshot 2023-07-30 214548.png', 'Bupati Batu Bara Ir. H. Zahir, M. AP., menyebut Pemkab Batu Bara menyembelih sebanyak 40 ekor hewan kurban yang tersebar di beberapa masjid. Nantinya daging kurban tersebut akan dibagikan kepada masyarakat muslim yang membutuhkan.'),
(6, 'Hadiri Wisuda Ponpes Al- Mumtaz, Bupati Zahir Pesan Tingkatkan Pendidikan', '2023-06-22', 'Screenshot 2023-07-30 214658.png', 'BATU BARA - Bupati Batu Bara Ir. H. Zahir, M.AP., didampingi Asisten I Setdakab Baru Bara Rusian Heri dan Direktur RSUD Batu Bara dr. Wahyu menghadiri wisuda Pondok Pesantren Al- Mumtaz, di Desa Pasar Lapan, Kecamatan Air Putih, Kamis (22/06/2023).'),
(7, 'Bupati Zahir Buka Grand Final Pemilihan Putra Putri Batu Bara 2023', '2023-06-19', 'Screenshot 2023-07-30 214810.png', 'BATU BARA - Bupati Batu Bara Ir. H. Zahir, M.AP., menghadiri sekaligus membuka grand final ajang pemilihan Putra Putri Batu Bara\r\ntahun 2023 yang digelar di Pendopo Perjuangan Simpang Dolok, Kecamatan Datuk Lima Puluh, Minggu (18/06/2023) malam.'),
(8, 'Wujudkan Moderasi Beragama, Bupati Zahir Ikuti Launching Morab Center', '2023-06-19', 'Screenshot 2023-07-30 214951.png', 'BATU BARA - Kepala Kantor Wilayah Kementerian Agama Sumatera Utara H. Ahmad Qosbi, S.Ag., meluncurkan Moderasi Beragama (Morab) Center yang dibangun di lingkungan Kantor Kementerian Agama Kabupaten Batu Bara, Kecamatan Lima Puluh, Senin (15/05/2023).');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cluster_kriminalitas`
--

CREATE TABLE `tbl_cluster_kriminalitas` (
  `id_cluster` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `group_cluster` varchar(10) NOT NULL,
  `iterasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cluster_kriminalitas`
--

INSERT INTO `tbl_cluster_kriminalitas` (`id_cluster`, `id_kecamatan`, `c1`, `c2`, `c3`, `group_cluster`, `iterasi`) VALUES
(1, 1, 67, 54.46099521676, 53.301031884946, 'C3', 1),
(2, 2, 21.679483388679, 21.840329667842, 19.849433241279, 'C3', 1),
(3, 3, 0, 35.538711287834, 17.262676501632, 'C1', 1),
(4, 4, 43.497126341863, 37.429934544426, 31.780497164141, 'C3', 1),
(5, 5, 25.82634314029, 36.578682316344, 15.58845726812, 'C3', 1),
(6, 6, 35.538711287834, 0, 34.10278580996, 'C2', 1),
(7, 7, 41.170377700478, 31.717503054307, 30.577769702841, 'C3', 1),
(8, 8, 75.186434946738, 55.731499172371, 65.138314377945, 'C2', 1),
(9, 9, 17.262676501632, 34.10278580996, 0, 'C3', 1),
(10, 10, 48.207883172776, 37.296112397943, 34.842502780369, 'C3', 1),
(11, 11, 56.850681614208, 44.575778176045, 46.669047558312, 'C2', 1),
(12, 12, 57.122675007391, 40.447496832313, 46.162755550335, 'C2', 1),
(13, 1, 67, 23.612761380237, 34.916810757419, 'C2', 2),
(14, 2, 21.679483388679, 38.865955539521, 22.204522429598, 'C1', 2),
(15, 3, 0, 53.428105899423, 34.602406428054, 'C1', 2),
(16, 4, 43.497126341863, 39.491296509484, 20.139817399817, 'C3', 2),
(17, 5, 25.82634314029, 45.222367253385, 20.200020206092, 'C3', 2),
(18, 6, 35.538711287834, 34.410209240863, 29.972095866193, 'C3', 2),
(19, 7, 41.170377700478, 17.551709318468, 14.423620083964, 'C3', 2),
(20, 8, 75.186434946738, 22.914242296004, 46.062512980088, 'C2', 2),
(21, 9, 17.262676501632, 43.938166780147, 21.324987738351, 'C1', 2),
(22, 10, 48.207883172776, 19.913877071028, 16.280074211334, 'C3', 2),
(23, 11, 56.850681614208, 13.079086359528, 30.088644545945, 'C2', 2),
(24, 12, 57.122675007391, 10.609547586961, 29.003166611068, 'C2', 2),
(25, 1, 57.508453484877, 12.57229096068, 37.775124089803, 'C2', 3),
(26, 2, 12.605113600793, 49.78014162294, 20.048940121612, 'C1', 3),
(27, 3, 11.264496832477, 63.269759759304, 34.18128142712, 'C1', 3),
(28, 4, 33.905096306537, 45.305214931617, 18.685823503394, 'C3', 3),
(29, 5, 17.81073334319, 52.483926110763, 20.826905675112, 'C1', 3),
(30, 6, 28.957823736523, 47.618930059379, 25.047155527125, 'C3', 3),
(31, 7, 32.350510900997, 24.638638355234, 15.816447135814, 'C3', 3),
(32, 8, 66.195837398502, 14.868170701199, 46.927177626616, 'C2', 3),
(33, 9, 10.077477638554, 51.885089380283, 22.653035116734, 'C1', 3),
(34, 10, 38.395601599952, 22.826793467327, 18.405433980214, 'C3', 3),
(35, 11, 48.472214262973, 10.298664962023, 32.297987553406, 'C2', 3),
(36, 12, 47.964106950464, 11.813657350711, 30.254916955761, 'C2', 3),
(37, 1, 55.883248831828, 12.57229096068, 34.889110048839, 'C2', 4),
(38, 2, 12.920429559423, 49.78014162294, 23.038012067017, 'C1', 4),
(39, 3, 14.228053275132, 63.269759759304, 37.805422891432, 'C1', 4),
(40, 4, 30.893971903917, 45.305214931617, 20.5, 'C3', 4),
(41, 5, 13.358050007393, 52.483926110763, 26.03363209389, 'C1', 4),
(42, 6, 30.065553379241, 47.618930059379, 24.191940806806, 'C3', 4),
(43, 7, 31.669188496076, 24.638638355234, 13.067134345372, 'C3', 4),
(44, 8, 65.402121525223, 14.868170701199, 42.868986458744, 'C2', 4),
(45, 9, 8.799857953399, 51.885089380283, 26.762847382145, 'C1', 4),
(46, 10, 36.392822094474, 22.826793467327, 16.755596080116, 'C3', 4),
(47, 11, 47.92637582793, 10.298664962023, 29.073183520213, 'C2', 4),
(48, 12, 47.222214052287, 11.813657350711, 26.753504443343, 'C2', 4),
(49, 1, 55.883248831828, 12.57229096068, 34.889110048839, 'C2', 5),
(50, 2, 12.920429559423, 49.78014162294, 23.038012067017, 'C1', 5),
(51, 3, 14.228053275132, 63.269759759304, 37.805422891432, 'C1', 5),
(52, 4, 30.893971903917, 45.305214931617, 20.5, 'C3', 5),
(53, 5, 13.358050007393, 52.483926110763, 26.03363209389, 'C1', 5),
(54, 6, 30.065553379241, 47.618930059379, 24.191940806806, 'C3', 5),
(55, 7, 31.669188496076, 24.638638355234, 13.067134345372, 'C3', 5),
(56, 8, 65.402121525223, 14.868170701199, 42.868986458744, 'C2', 5),
(57, 9, 8.799857953399, 51.885089380283, 26.762847382145, 'C1', 5),
(58, 10, 36.392822094474, 22.826793467327, 16.755596080116, 'C3', 5),
(59, 11, 47.92637582793, 10.298664962023, 29.073183520213, 'C2', 5),
(60, 12, 47.222214052287, 11.813657350711, 26.753504443343, 'C2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cluster_lakalantas`
--

CREATE TABLE `tbl_cluster_lakalantas` (
  `id_cluster` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `group_cluster` varchar(10) NOT NULL,
  `iterasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cluster_lakalantas`
--

INSERT INTO `tbl_cluster_lakalantas` (`id_cluster`, `id_kecamatan`, `c1`, `c2`, `c3`, `group_cluster`, `iterasi`) VALUES
(1, 1, 438.17918709131, 514.93106334732, 293.50979540724, 'C3', 1),
(2, 2, 35.355339059327, 43.185645763378, 179.21216476568, 'C1', 1),
(3, 3, 39.395431207184, 45.880278987818, 182.22239159884, 'C1', 1),
(4, 4, 0, 77.466121627457, 144.95861478367, 'C1', 1),
(5, 5, 166.9011683602, 244.00204917172, 22.203603311175, 'C3', 1),
(6, 6, 65.299310869258, 18.02775637732, 210.06903627141, 'C2', 1),
(7, 7, 26.925824035673, 57.775427302617, 168.77203559832, 'C1', 1),
(8, 8, 77.466121627457, 0, 222.19360926903, 'C2', 1),
(9, 9, 28.178005607211, 52.773099207835, 172.00290695218, 'C1', 1),
(10, 10, 506.58168146904, 580.5945228815, 366.74241641784, 'C3', 1),
(11, 11, 20.615528128088, 94.794514609233, 127.78106275971, 'C1', 1),
(12, 12, 144.95861478367, 222.19360926903, 0, 'C3', 1),
(13, 1, 455.49143180135, 509.13480533155, 127.40413062378, 'C3', 2),
(14, 2, 20.883273476903, 38.160843806184, 345.69178830282, 'C1', 2),
(15, 3, 22.718078948518, 37.513330963805, 350.95628289005, 'C1', 2),
(16, 4, 17.400510848184, 71.072146442893, 312.74000783398, 'C1', 2),
(17, 5, 184.16327297024, 237.94799852069, 147.28310323998, 'C3', 2),
(18, 6, 47.945570992301, 9.01387818866, 378.0281900864, 'C2', 2),
(19, 7, 12.45436112818, 49.882361612097, 337.55119982012, 'C1', 2),
(20, 8, 60.760001462951, 9.01387818866, 388.87056008394, 'C2', 2),
(21, 9, 11.318617897566, 45.213382974513, 340.40830263083, 'C1', 2),
(22, 10, 523.93935187619, 575.92555942587, 199.06735669115, 'C3', 2),
(23, 11, 37.297601948532, 89.253851457514, 294.15780203829, 'C1', 2),
(24, 12, 162.1741176774, 216.02835462041, 169.46330723788, 'C1', 2),
(25, 1, 432.34236244826, 509.13480533155, 75.431352161345, 'C3', 3),
(26, 2, 41.731160970172, 38.160843806184, 401.73982736205, 'C2', 3),
(27, 3, 44.333844813171, 37.513330963805, 407.33551554244, 'C2', 3),
(28, 4, 6.396746622068, 71.072146442893, 369.00888275969, 'C1', 3),
(29, 5, 160.99974648224, 237.94799852069, 203.77002287437, 'C1', 3),
(30, 6, 71.091920950906, 9.01387818866, 434.27436284246, 'C2', 3),
(31, 7, 31.331017427802, 49.882361612097, 393.94147901546, 'C1', 3),
(32, 8, 83.646730421482, 9.01387818866, 444.89761618702, 'C2', 3),
(33, 9, 33.403226044861, 45.213382974513, 396.74369000093, 'C1', 3),
(34, 10, 501.28854373667, 575.92555942587, 144.10836971607, 'C3', 3),
(35, 11, 17.449635982403, 89.253851457514, 350.27497135187, 'C1', 3),
(36, 12, 139.00638658063, 216.02835462041, 225.95107631717, 'C1', 3),
(37, 1, 391.76824923813, 491.35940257616, 53.366656256505, 'C3', 4),
(38, 2, 81.300027333602, 21.910328614605, 503.03578401541, 'C2', 4),
(39, 3, 84.26957405322, 21.343910138491, 509.06286448729, 'C2', 4),
(40, 4, 46.576400796016, 53.212428059618, 470.60067998251, 'C1', 4),
(41, 5, 120.40498789963, 220.11261322332, 305.65503431156, 'C1', 4),
(42, 6, 111.68121795738, 12.90590949914, 535.81806613812, 'C2', 4),
(43, 7, 70.892132458013, 32.543240465571, 495.68538408955, 'C2', 4),
(44, 8, 123.97591611994, 25.26979422156, 546.1446694787, 'C2', 4),
(45, 9, 73.749764594728, 27.514768761522, 498.41448614582, 'C2', 4),
(46, 10, 461.64599833398, 558.72539095695, 53.366656256505, 'C3', 4),
(47, 11, 31.321362961688, 71.756968302737, 451.68573145496, 'C1', 4),
(48, 12, 98.409151561789, 198.16675427528, 327.83532451522, 'C1', 4),
(49, 1, 355.74323605657, 482.16323884022, 53.366656256505, 'C3', 5),
(50, 2, 116.51287482506, 17.070116838759, 503.03578401541, 'C2', 5),
(51, 3, 120.40037375357, 12.358083274611, 509.06286448729, 'C2', 5),
(52, 4, 82.439371661846, 44.023352388881, 470.60067998251, 'C2', 5),
(53, 5, 84.5, 210.8286560746, 305.65503431156, 'C1', 5),
(54, 6, 147.69647930807, 21.277270083876, 535.81806613812, 'C2', 5),
(55, 7, 107.01051350218, 22.569645298252, 495.68538408955, 'C2', 5),
(56, 8, 159.51880766856, 35.261719879905, 546.1446694787, 'C2', 5),
(57, 9, 109.86924046338, 17.551511489201, 498.41448614582, 'C2', 5),
(58, 10, 425.77135883007, 550.2642294591, 53.366656256505, 'C3', 5),
(59, 11, 65.124880038277, 63.230179151696, 451.68573145496, 'C2', 5),
(60, 12, 62.699681019922, 188.82634585483, 327.83532451522, 'C1', 5),
(61, 1, 282.45220834683, 468.89499424178, 53.366656256505, 'C3', 6),
(62, 2, 190.06380507608, 12.031858750833, 503.03578401541, 'C2', 6),
(63, 3, 193.28541072725, 13.875, 509.06286448729, 'C2', 6),
(64, 4, 155.92065289756, 30.716699448346, 470.60067998251, 'C2', 6),
(65, 5, 11.101801655587, 197.59938164124, 305.65503431156, 'C1', 6),
(66, 6, 221.07295176027, 34.612362314641, 535.81806613812, 'C2', 6),
(67, 7, 179.83673150944, 13.856970267703, 495.68538408955, 'C2', 6),
(68, 8, 233.08850250495, 47.357846498759, 546.1446694787, 'C2', 6),
(69, 9, 183.03619860563, 7.7952309138344, 498.41448614582, 'C2', 6),
(70, 10, 355.76853430285, 536.89898083811, 53.366656256505, 'C3', 6),
(71, 11, 138.56857508108, 49.885024055321, 451.68573145496, 'C2', 6),
(72, 12, 11.101801655587, 175.63033799717, 327.83532451522, 'C1', 6),
(73, 1, 282.45220834683, 468.89499424178, 53.366656256505, 'C3', 7),
(74, 2, 190.06380507608, 12.031858750833, 503.03578401541, 'C2', 7),
(75, 3, 193.28541072725, 13.875, 509.06286448729, 'C2', 7),
(76, 4, 155.92065289756, 30.716699448346, 470.60067998251, 'C2', 7),
(77, 5, 11.101801655587, 197.59938164124, 305.65503431156, 'C1', 7),
(78, 6, 221.07295176027, 34.612362314641, 535.81806613812, 'C2', 7),
(79, 7, 179.83673150944, 13.856970267703, 495.68538408955, 'C2', 7),
(80, 8, 233.08850250495, 47.357846498759, 546.1446694787, 'C2', 7),
(81, 9, 183.03619860563, 7.7952309138344, 498.41448614582, 'C2', 7),
(82, 10, 355.76853430285, 536.89898083811, 53.366656256505, 'C3', 7),
(83, 11, 138.56857508108, 49.885024055321, 451.68573145496, 'C2', 7),
(84, 12, 11.101801655587, 175.63033799717, 327.83532451522, 'C1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `cluster_kriminalitas` varchar(10) NOT NULL,
  `cluster_lakalantas` varchar(10) NOT NULL,
  `ket_kriminalitas` varchar(50) NOT NULL,
  `ket_lakalantas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `longitude`, `latitude`, `cluster_kriminalitas`, `cluster_lakalantas`, `ket_kriminalitas`, `ket_lakalantas`) VALUES
(1, 'Kecamatan Air Putih', 3.2861, 99.3889, 'C2', 'C3', 'Rawan', 'Sangat Rawan'),
(2, 'Kecamatan Datuk Lima Puluh', 3.2083, 99.4911, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(3, 'Kecamatan Datuk Tanah Datar', 3.1311, 99.5367, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(4, 'Kecamatan Laut Tador', 3.3133, 99.2867, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(5, 'Kecamatan Lima Puluh', 3.1847, 99.4206, 'C1', 'C1', 'Cukup Rawan', 'Cukup Rawan'),
(6, 'Kecamatan Lima Puluh Pesisir', 3.2717, 99.4869, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(7, 'Kecamatan Medang Deras', 3.3789, 99.3628, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(8, 'Kecamatan Nibung Hangus', 3.1722, 99.6558, 'C2', 'C2', 'Rawan', 'Rawan'),
(9, 'Kecamatan Sei Balai', 3.1, 99.5756, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(10, 'Kecamatan Sei Suka', 3.3322, 99.3917, 'C3', 'C3', 'Sangat Rawan', 'Sangat Rawan'),
(11, 'Kecamatan Talawi', 3.1994, 99.5622, 'C2', 'C2', 'Rawan', 'Rawan'),
(12, 'Kecamatan Tanjung Tiram', 3.2211, 99.5922, 'C2', 'C1', 'Rawan', 'Cukup Rawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kejadian`
--

CREATE TABLE `tbl_kejadian` (
  `id_kejadian` int(11) NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `ket_kejadian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kejadian`
--

INSERT INTO `tbl_kejadian` (`id_kejadian`, `tgl_kejadian`, `id_kriteria`, `id_kecamatan`, `alamat`, `ket_kejadian`) VALUES
(1, '2023-07-30', 2, 1, 'Desa Indrasakti', 'Pencurian Sendal'),
(2, '2023-07-30', 2, 1, 'Desa Indrasakti', 'Pencurian Sendal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriminalitas`
--

CREATE TABLE `tbl_kriminalitas` (
  `id_kriminalitas` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriminalitas`
--

INSERT INTO `tbl_kriminalitas` (`id_kriminalitas`, `id_kecamatan`, `id_kriteria`, `nilai`) VALUES
(1, 1, 2, 75),
(2, 1, 3, 72),
(3, 1, 4, 35),
(4, 1, 5, 24),
(5, 1, 6, 21),
(6, 1, 7, 6),
(7, 1, 8, 7),
(8, 1, 9, 4),
(9, 1, 10, 2),
(10, 1, 11, 3),
(11, 2, 2, 47),
(12, 2, 3, 36),
(13, 2, 4, 10),
(14, 2, 5, 14),
(15, 2, 6, 11),
(16, 2, 7, 14),
(17, 2, 8, 8),
(18, 2, 9, 6),
(19, 2, 10, 1),
(20, 2, 11, 5),
(21, 3, 2, 30),
(22, 3, 3, 33),
(23, 3, 4, 15),
(24, 3, 5, 6),
(25, 3, 6, 7),
(26, 3, 7, 9),
(27, 3, 8, 7),
(28, 3, 9, 2),
(29, 3, 10, 5),
(30, 3, 11, 2),
(31, 4, 2, 55),
(32, 4, 3, 49),
(33, 4, 4, 13),
(34, 4, 5, 11),
(35, 4, 6, 36),
(36, 4, 7, 18),
(37, 4, 8, 9),
(38, 4, 9, 8),
(39, 4, 10, 7),
(40, 4, 11, 6),
(41, 5, 2, 40),
(42, 5, 3, 38),
(43, 5, 4, 17),
(44, 5, 5, 17),
(45, 5, 6, 27),
(46, 5, 7, 8),
(47, 5, 8, 7),
(48, 5, 9, 6),
(49, 5, 10, 5),
(50, 5, 11, 2),
(51, 6, 2, 64),
(52, 6, 3, 32),
(53, 6, 4, 12),
(54, 6, 5, 7),
(55, 6, 6, 5),
(56, 6, 7, 17),
(57, 6, 8, 4),
(58, 6, 9, 3),
(59, 6, 10, 8),
(60, 6, 11, 5),
(61, 7, 2, 60),
(62, 7, 3, 58),
(63, 7, 4, 23),
(64, 7, 5, 12),
(65, 7, 6, 13),
(66, 7, 7, 10),
(67, 7, 8, 11),
(68, 7, 9, 2),
(69, 7, 10, 6),
(70, 7, 11, 6),
(71, 8, 2, 89),
(72, 8, 3, 73),
(73, 8, 4, 26),
(74, 8, 5, 25),
(75, 8, 6, 8),
(76, 8, 7, 7),
(77, 8, 8, 15),
(78, 8, 9, 6),
(79, 8, 10, 3),
(80, 8, 11, 1),
(81, 9, 2, 37),
(82, 9, 3, 41),
(83, 9, 4, 22),
(84, 9, 5, 9),
(85, 9, 6, 17),
(86, 9, 7, 9),
(87, 9, 8, 3),
(88, 9, 9, 3),
(89, 9, 10, 2),
(90, 9, 11, 3),
(91, 10, 2, 65),
(92, 10, 3, 53),
(93, 10, 4, 31),
(94, 10, 5, 20),
(95, 10, 6, 21),
(96, 10, 7, 6),
(97, 10, 8, 8),
(98, 10, 9, 7),
(99, 10, 10, 5),
(100, 10, 11, 6),
(101, 11, 2, 70),
(102, 11, 3, 69),
(103, 11, 4, 26),
(104, 11, 5, 19),
(105, 11, 6, 7),
(106, 11, 7, 5),
(107, 11, 8, 11),
(108, 11, 9, 5),
(109, 11, 10, 3),
(110, 11, 11, 1),
(111, 12, 2, 74),
(112, 12, 3, 59),
(113, 12, 4, 33),
(114, 12, 5, 23),
(115, 12, 6, 9),
(116, 12, 7, 13),
(117, 12, 8, 9),
(118, 12, 9, 4),
(119, 12, 10, 2),
(120, 12, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`) VALUES
(2, 'Pencurian', 'Kriminalitas'),
(3, 'Penganiayaan', 'Kriminalitas'),
(4, 'Penipuan', 'Kriminalitas'),
(5, 'Pencabulan Anak', 'Kriminalitas'),
(6, 'Penggelapan', 'Kriminalitas'),
(7, 'KDRT', 'Kriminalitas'),
(8, 'Perjudian', 'Kriminalitas'),
(9, 'Pengerusakan', 'Kriminalitas'),
(10, 'Pencemaran Nama', 'Kriminalitas'),
(11, 'Pengancaman', 'Kriminalitas'),
(12, 'Kecelakaan', 'Lakalantas'),
(13, 'Kemacetan', 'Lakalantas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lakalantas`
--

CREATE TABLE `tbl_lakalantas` (
  `id_lakalantas` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lakalantas`
--

INSERT INTO `tbl_lakalantas` (`id_lakalantas`, `id_kecamatan`, `id_kriteria`, `nilai`) VALUES
(5, 1, 12, 375),
(6, 1, 13, 397),
(7, 2, 12, 49),
(8, 2, 13, 56),
(9, 3, 12, 64),
(10, 3, 13, 37),
(11, 4, 12, 80),
(12, 4, 13, 73),
(13, 5, 12, 196),
(14, 5, 13, 193),
(15, 6, 12, 38),
(16, 6, 13, 23),
(17, 7, 12, 73),
(18, 7, 13, 47),
(19, 8, 12, 20),
(20, 8, 13, 24),
(21, 9, 12, 67),
(22, 9, 13, 48),
(23, 10, 12, 351),
(24, 10, 13, 501),
(25, 11, 12, 85),
(26, 11, 13, 93),
(27, 12, 12, 183),
(28, 12, 13, 175);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(12) NOT NULL,
  `ket_pengaduan` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `id_akun`, `foto`, `tgl_kejadian`, `id_kriteria`, `id_kecamatan`, `alamat`, `telepon`, `ket_pengaduan`, `status`) VALUES
(1, 3, 'aksi-pencurian.jpeg', '2023-07-30', 2, 5, 'Desa Antara, No. 10', '082161965317', 'Aksi Pencurian', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titiklaka`
--

CREATE TABLE `tbl_titiklaka` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `cluster_kriminalitas` varchar(10) NOT NULL,
  `cluster_lakalantas` varchar(10) NOT NULL,
  `ket_kriminalitas` varchar(50) NOT NULL,
  `ket_lakalantas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_titiklaka`
--

INSERT INTO `tbl_titiklaka` (`id_kecamatan`, `nama_kecamatan`, `longitude`, `latitude`, `cluster_kriminalitas`, `cluster_lakalantas`, `ket_kriminalitas`, `ket_lakalantas`) VALUES
(13, 'Simpang 4 Lima Puluh Kota', 3.169766, 99.417157, '?', '?', '?', '?'),
(14, 'Perlintasan Rel KA Lima Puluh Kota', 3.173659, 99.414684, '?', '?', '?', '?'),
(15, 'Simpang 3 Taman Lima Puluh Kota', 3.169774, 99.414644, '?', '?', '?', '?'),
(16, 'Pintu Keluar TOL Lima Puluh', 3.168566, 99.391797, '?', '?', '?', '?'),
(17, 'Perbatasan Batu Bara - Simalungun (Perlanaan)', 3.169584, 99.37216, '?', '?', '?', '?'),
(18, 'Simpang 4 Simpang Dolok', 3.195287, 99.492966, '?', '?', '?', '?'),
(19, 'Simpang 3 Padang Genting', 3.19826, 99.558063, '?', '?', '?', '?'),
(20, 'Tugu Simpang 4 Tanjung Tiram', 3.217206, 99.577115, '?', '?', '?', '?'),
(21, 'Jalan Pasar Tanjung Tiram', 3.22179, 99.581194, '?', '?', '?', '?'),
(22, 'Simpang Pantai Bunga', 3.222466, 99.567518, '?', '?', '?', '?'),
(23, 'Simpang Jalan Perintis Manunggal', 3.226295, 99.556828, '?', '?', '?', '?'),
(24, 'Simpang Limau Manis', 3.147825, 99.457638, '?', '?', '?', '?'),
(25, 'Jalan SPBU Petatal', 3.135479, 99.484177, '?', '?', '?', '?'),
(26, 'Simpang Sei Bejangkar', 3.12222, 99.562553, '?', '?', '?', '?'),
(27, 'Perlintasan KA Petatal', 3.126525, 99.511334, '?', '?', '?', '?'),
(28, 'Jalan Istana Niat Lima Laras', 3.204544, 99.601611, '?', '?', '?', '?'),
(29, 'Simpang 4 Jalan Ujung Kubu', 3.181764, 99.635668, '?', '?', '?', '?'),
(30, 'Jalan Pajak Selasa Simpang Gambus', 3.251973, 99.411357, '?', '?', '?', '?'),
(31, 'Jalan Lintas Sumut Tanah Gambus', 3.232606, 99.420918, '?', '?', '?', '?'),
(32, 'Jalan Lintas Sukaraja', 3.259737, 99.389396, '?', '?', '?', '?'),
(33, 'Simpang 4 Tanah Merah', 3.276054, 99.371818, '?', '?', '?', '?'),
(34, 'Jalan Lintas Indrapura', 3.28319, 99.369459, '?', '?', '?', '?'),
(35, 'Jalan SPBU Indrapura', 3.293372, 99.365321, '?', '?', '?', '?'),
(36, 'Pintu Tol Indrapura', 3.300371, 99.349758, '?', '?', '?', '?'),
(37, 'Simpang 3 Tugu Inalum', 3.30169, 99.338149, '?', '?', '?', '?'),
(38, 'Simpang 3 Bandar Tinggi', 3.302139, 99.329583, '?', '?', '?', '?'),
(39, 'Simpang Tanjung Kasau', 3.317193, 99.288868, '?', '?', '?', '?'),
(40, 'Jalan Access Road Inalum', 3.354516, 99.38051, '?', '?', '?', '?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_titiklokasi`
--

CREATE TABLE `tbl_titiklokasi` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `cluster_kriminalitas` varchar(10) NOT NULL,
  `cluster_lakalantas` varchar(10) NOT NULL,
  `ket_kriminalitas` varchar(50) NOT NULL,
  `ket_lakalantas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_titiklokasi`
--

INSERT INTO `tbl_titiklokasi` (`id_kecamatan`, `nama_kecamatan`, `longitude`, `latitude`, `cluster_kriminalitas`, `cluster_lakalantas`, `ket_kriminalitas`, `ket_lakalantas`) VALUES
(1, 'Simpang 4 Lima Puluh Kota', 3.2861, 99.3888, 'C2', 'C3', 'Rawan', 'Sangat Rawan'),
(2, 'Kecamatan Datuk Lima Puluh', 3.2083, 99.4911, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(3, 'Kecamatan Datuk Tanah Datar', 3.1311, 99.5367, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(4, 'Kecamatan Laut Tador', 3.3133, 99.2867, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(5, 'Kecamatan Lima Puluh', 3.1847, 99.4206, 'C1', 'C1', 'Cukup Rawan', 'Cukup Rawan'),
(6, 'Kecamatan Lima Puluh Pesisir', 3.2717, 99.4869, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(7, 'Kecamatan Medang Deras', 3.3789, 99.3628, 'C3', 'C2', 'Sangat Rawan', 'Rawan'),
(8, 'Kecamatan Nibung Hangus', 3.1722, 99.6558, 'C2', 'C2', 'Rawan', 'Rawan'),
(9, 'Kecamatan Sei Balai', 3.1, 99.5756, 'C1', 'C2', 'Cukup Rawan', 'Rawan'),
(10, 'Kecamatan Sei Suka', 3.3322, 99.3917, 'C3', 'C3', 'Sangat Rawan', 'Sangat Rawan'),
(11, 'Kecamatan Talawi', 3.1994, 99.5622, 'C2', 'C2', 'Rawan', 'Rawan'),
(12, 'Kecamatan Tanjung Tiram', 3.2211, 99.5922, 'C2', 'C1', 'Rawan', 'Cukup Rawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_cluster_kriminalitas`
--
ALTER TABLE `tbl_cluster_kriminalitas`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `tbl_cluster_lakalantas`
--
ALTER TABLE `tbl_cluster_lakalantas`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tbl_kejadian`
--
ALTER TABLE `tbl_kejadian`
  ADD PRIMARY KEY (`id_kejadian`);

--
-- Indexes for table `tbl_kriminalitas`
--
ALTER TABLE `tbl_kriminalitas`
  ADD PRIMARY KEY (`id_kriminalitas`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_lakalantas`
--
ALTER TABLE `tbl_lakalantas`
  ADD PRIMARY KEY (`id_lakalantas`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tbl_titiklaka`
--
ALTER TABLE `tbl_titiklaka`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tbl_titiklokasi`
--
ALTER TABLE `tbl_titiklokasi`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cluster_kriminalitas`
--
ALTER TABLE `tbl_cluster_kriminalitas`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_cluster_lakalantas`
--
ALTER TABLE `tbl_cluster_lakalantas`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_kejadian`
--
ALTER TABLE `tbl_kejadian`
  MODIFY `id_kejadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kriminalitas`
--
ALTER TABLE `tbl_kriminalitas`
  MODIFY `id_kriminalitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_lakalantas`
--
ALTER TABLE `tbl_lakalantas`
  MODIFY `id_lakalantas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_titiklaka`
--
ALTER TABLE `tbl_titiklaka`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_titiklokasi`
--
ALTER TABLE `tbl_titiklokasi`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;