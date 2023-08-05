-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 08:33 AM
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
(8, 'Wujudkan Moderasi Beragama, Bupati Zahir Ikuti Launching Morab Center', '2023-06-19', 'Screenshot 2023-07-30 214658.png', 'BATU BARA - Kepala Kantor Wilayah Kementerian Agama Sumatera Utara H. Ahmad Qosbi, S.Ag., meluncurkan Moderasi Beragama (Morab) Center yang dibangun di lingkungan Kantor Kementerian Agama Kabupaten Batu Bara, Kecamatan Lima Puluh, Senin (15/05/2023).');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cluster_kriminalitas`
--

CREATE TABLE `tbl_cluster_kriminalitas` (
  `id_cluster` int(11) NOT NULL,
  `id_kecamatan` char(10) NOT NULL,
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
(1, 'KN01', 67, 54.46099521676, 53.301031884946, 'C3', 1),
(2, 'KN02', 21.679483388679, 21.840329667842, 19.849433241279, 'C3', 1),
(3, 'KN03', 0, 35.538711287834, 17.262676501632, 'C1', 1),
(4, 'KN04', 43.497126341863, 37.429934544426, 31.780497164141, 'C3', 1),
(5, 'KN05', 25.82634314029, 36.578682316344, 15.58845726812, 'C3', 1),
(6, 'KN06', 35.538711287834, 0, 34.10278580996, 'C2', 1),
(7, 'KN07', 41.170377700478, 31.717503054307, 30.577769702841, 'C3', 1),
(8, 'KN08', 75.186434946738, 55.731499172371, 65.138314377945, 'C2', 1),
(9, 'KN09', 17.262676501632, 34.10278580996, 0, 'C3', 1),
(10, 'KN10', 48.207883172776, 37.296112397943, 34.842502780369, 'C3', 1),
(11, 'KN11', 56.850681614208, 44.575778176045, 46.669047558312, 'C2', 1),
(12, 'KN12', 57.122675007391, 40.447496832313, 46.162755550335, 'C2', 1),
(13, 'KN01', 67, 23.612761380237, 34.916810757419, 'C2', 2),
(14, 'KN02', 21.679483388679, 38.865955539521, 22.204522429598, 'C1', 2),
(15, 'KN03', 0, 53.428105899423, 34.602406428054, 'C1', 2),
(16, 'KN04', 43.497126341863, 39.491296509484, 20.139817399817, 'C3', 2),
(17, 'KN05', 25.82634314029, 45.222367253385, 20.200020206092, 'C3', 2),
(18, 'KN06', 35.538711287834, 34.410209240863, 29.972095866193, 'C3', 2),
(19, 'KN07', 41.170377700478, 17.551709318468, 14.423620083964, 'C3', 2),
(20, 'KN08', 75.186434946738, 22.914242296004, 46.062512980088, 'C2', 2),
(21, 'KN09', 17.262676501632, 43.938166780147, 21.324987738351, 'C1', 2),
(22, 'KN10', 48.207883172776, 19.913877071028, 16.280074211334, 'C3', 2),
(23, 'KN11', 56.850681614208, 13.079086359528, 30.088644545945, 'C2', 2),
(24, 'KN12', 57.122675007391, 10.609547586961, 29.003166611068, 'C2', 2),
(25, 'KN01', 57.508453484877, 12.57229096068, 37.775124089803, 'C2', 3),
(26, 'KN02', 12.605113600793, 49.78014162294, 20.048940121612, 'C1', 3),
(27, 'KN03', 11.264496832477, 63.269759759304, 34.18128142712, 'C1', 3),
(28, 'KN04', 33.905096306537, 45.305214931617, 18.685823503394, 'C3', 3),
(29, 'KN05', 17.81073334319, 52.483926110763, 20.826905675112, 'C1', 3),
(30, 'KN06', 28.957823736523, 47.618930059379, 25.047155527125, 'C3', 3),
(31, 'KN07', 32.350510900997, 24.638638355234, 15.816447135814, 'C3', 3),
(32, 'KN08', 66.195837398502, 14.868170701199, 46.927177626616, 'C2', 3),
(33, 'KN09', 10.077477638554, 51.885089380283, 22.653035116734, 'C1', 3),
(34, 'KN10', 38.395601599952, 22.826793467327, 18.405433980214, 'C3', 3),
(35, 'KN11', 48.472214262973, 10.298664962023, 32.297987553406, 'C2', 3),
(36, 'KN12', 47.964106950464, 11.813657350711, 30.254916955761, 'C2', 3),
(37, 'KN01', 55.883248831828, 12.57229096068, 34.889110048839, 'C2', 4),
(38, 'KN02', 12.920429559423, 49.78014162294, 23.038012067017, 'C1', 4),
(39, 'KN03', 14.228053275132, 63.269759759304, 37.805422891432, 'C1', 4),
(40, 'KN04', 30.893971903917, 45.305214931617, 20.5, 'C3', 4),
(41, 'KN05', 13.358050007393, 52.483926110763, 26.03363209389, 'C1', 4),
(42, 'KN06', 30.065553379241, 47.618930059379, 24.191940806806, 'C3', 4),
(43, 'KN07', 31.669188496076, 24.638638355234, 13.067134345372, 'C3', 4),
(44, 'KN08', 65.402121525223, 14.868170701199, 42.868986458744, 'C2', 4),
(45, 'KN09', 8.799857953399, 51.885089380283, 26.762847382145, 'C1', 4),
(46, 'KN10', 36.392822094474, 22.826793467327, 16.755596080116, 'C3', 4),
(47, 'KN11', 47.92637582793, 10.298664962023, 29.073183520213, 'C2', 4),
(48, 'KN12', 47.222214052287, 11.813657350711, 26.753504443343, 'C2', 4),
(49, 'KN01', 55.883248831828, 12.57229096068, 34.889110048839, 'C2', 5),
(50, 'KN02', 12.920429559423, 49.78014162294, 23.038012067017, 'C1', 5),
(51, 'KN03', 14.228053275132, 63.269759759304, 37.805422891432, 'C1', 5),
(52, 'KN04', 30.893971903917, 45.305214931617, 20.5, 'C3', 5),
(53, 'KN05', 13.358050007393, 52.483926110763, 26.03363209389, 'C1', 5),
(54, 'KN06', 30.065553379241, 47.618930059379, 24.191940806806, 'C3', 5),
(55, 'KN07', 31.669188496076, 24.638638355234, 13.067134345372, 'C3', 5),
(56, 'KN08', 65.402121525223, 14.868170701199, 42.868986458744, 'C2', 5),
(57, 'KN09', 8.799857953399, 51.885089380283, 26.762847382145, 'C1', 5),
(58, 'KN10', 36.392822094474, 22.826793467327, 16.755596080116, 'C3', 5),
(59, 'KN11', 47.92637582793, 10.298664962023, 29.073183520213, 'C2', 5),
(60, 'KN12', 47.222214052287, 11.813657350711, 26.753504443343, 'C2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cluster_lakalantas`
--

CREATE TABLE `tbl_cluster_lakalantas` (
  `id_cluster` int(11) NOT NULL,
  `id_lalulintas` char(10) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `group_cluster` varchar(10) NOT NULL,
  `iterasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cluster_lakalantas`
--

INSERT INTO `tbl_cluster_lakalantas` (`id_cluster`, `id_lalulintas`, `c1`, `c2`, `c3`, `group_cluster`, `iterasi`) VALUES
(1, 'LS01', 440.2044979325, 517.00386845748, 295.48096385385, 'C3', 1),
(2, 'LS02', 35.355339059327, 43.185645763378, 179.21216476568, 'C1', 1),
(3, 'LS03', 39.395431207184, 45.880278987818, 182.22239159884, 'C1', 1),
(4, 'LS04', 0, 77.466121627457, 144.95861478367, 'C1', 1),
(5, 'LS05', 166.9011683602, 244.00204917172, 22.203603311175, 'C3', 1),
(6, 'LS06', 65.299310869258, 18.02775637732, 210.06903627141, 'C2', 1),
(7, 'LS07', 26.925824035673, 57.775427302617, 168.77203559832, 'C1', 1),
(8, 'LS08', 77.466121627457, 0, 222.19360926903, 'C2', 1),
(9, 'LS09', 28.178005607211, 52.773099207835, 172.00290695218, 'C1', 1),
(10, 'LS10', 506.58168146904, 580.5945228815, 366.74241641784, 'C3', 1),
(11, 'LS11', 20.615528128088, 94.794514609233, 127.78106275971, 'C1', 1),
(12, 'LS12', 144.95861478367, 222.19360926903, 0, 'C3', 1),
(13, 'LS01', 457.50786271325, 523.03324729674, 129.15591353089, 'C3', 2),
(14, 'LS02', 20.883273476903, 49.602867300635, 346.18528276055, 'C1', 2),
(15, 'LS03', 22.718078948518, 49.055524097133, 351.41037264145, 'C1', 2),
(16, 'LS04', 17.400510848184, 83.000669341344, 313.21119073239, 'C1', 2),
(17, 'LS05', 184.16327297024, 249.8448407401, 147.69309394823, 'C3', 2),
(18, 'LS06', 47.945570992301, 19.62424803938, 378.50132100166, 'C2', 2),
(19, 'LS07', 12.45436112818, 61.688284499121, 338.00332838598, 'C1', 2),
(20, 'LS08', 60.760001462951, 8.0069414329762, 389.36518847992, 'C2', 2),
(21, 'LS09', 11.318617897566, 57.135316962842, 340.86984319532, 'C1', 2),
(22, 'LS10', 523.93935187619, 587.3727758228, 198.78694625151, 'C3', 2),
(23, 'LS11', 37.297601948532, 100.98239670578, 294.64597400949, 'C1', 2),
(24, 'LS12', 162.1741176774, 227.94468139831, 169.87716150207, 'C1', 2),
(25, 'LS01', 434.35443535229, 523.03324729674, 77.230535124105, 'C3', 3),
(26, 'LS02', 41.731160970172, 49.602867300635, 402.38359255262, 'C1', 3),
(27, 'LS03', 44.333844813171, 49.055524097133, 407.93368197403, 'C1', 3),
(28, 'LS04', 6.396746622068, 83.000669341344, 369.62578673873, 'C1', 3),
(29, 'LS05', 160.99974648224, 249.8448407401, 204.31810709991, 'C1', 3),
(30, 'LS06', 71.091920950906, 19.62424803938, 434.89526197567, 'C2', 3),
(31, 'LS07', 31.331017427802, 61.688284499121, 394.53714090762, 'C1', 3),
(32, 'LS08', 83.646730421482, 8.0069414329762, 445.5441117954, 'C2', 3),
(33, 'LS09', 33.403226044861, 57.135316962842, 397.35025131768, 'C1', 3),
(34, 'LS10', 501.28854373667, 587.3727758228, 143.8085146606, 'C3', 3),
(35, 'LS11', 17.449635982403, 100.98239670578, 350.91056157121, 'C1', 3),
(36, 'LS12', 139.00638658063, 227.94468139831, 226.50288200276, 'C1', 3),
(37, 'LS01', 414.23206433713, 523.03324729674, 53.723830838837, 'C3', 4),
(38, 'LS02', 61.122443709328, 49.602867300635, 503.97346160289, 'C2', 4),
(39, 'LS03', 64.067957084646, 49.055524097133, 509.94534020814, 'C2', 4),
(40, 'LS04', 26.128588270322, 83.000669341344, 471.50424176247, 'C1', 4),
(41, 'LS05', 140.87477817196, 249.8448407401, 306.47716064986, 'C1', 4),
(42, 'LS06', 91.215147453699, 19.62424803938, 536.72921478153, 'C2', 4),
(43, 'LS07', 50.788316815976, 61.688284499121, 496.56444697542, 'C1', 4),
(44, 'LS08', 103.58186677696, 8.0069414329762, 547.08797281607, 'C2', 4),
(45, 'LS09', 53.380269060768, 57.135316962842, 499.30676943138, 'C1', 4),
(46, 'LS10', 481.56510787743, 587.3727758228, 53.723830838837, 'C3', 4),
(47, 'LS11', 14.881301186388, 100.98239670578, 452.61048374955, 'C1', 4),
(48, 'LS12', 118.88630335325, 227.94468139831, 328.66129982096, 'C1', 4),
(49, 'LS01', 393.77323564599, 504.05793317832, 53.723830838837, 'C3', 5),
(50, 'LS02', 81.300027333602, 31.400636936215, 503.97346160289, 'C2', 5),
(51, 'LS03', 84.26957405322, 30.88041450499, 509.94534020814, 'C2', 5),
(52, 'LS04', 46.576400796016, 63.924956003114, 471.50424176247, 'C1', 5),
(53, 'LS05', 120.40498789963, 230.81074498385, 306.47716064986, 'C1', 5),
(54, 'LS06', 111.68121795738, 6.3245553203368, 536.72921478153, 'C2', 5),
(55, 'LS07', 70.892132458013, 42.934834342291, 496.56444697542, 'C2', 5),
(56, 'LS08', 123.97591611994, 15, 547.08797281607, 'C2', 5),
(57, 'LS09', 73.749764594728, 38.1418405429, 499.30676943138, 'C2', 5),
(58, 'LS10', 461.64599833398, 569.01265363786, 53.723830838837, 'C3', 5),
(59, 'LS11', 31.321362961688, 82.215570301495, 452.61048374955, 'C1', 5),
(60, 'LS12', 98.409151561789, 208.88322096329, 328.66129982096, 'C1', 5),
(61, 'LS01', 357.76563557726, 493.10356158618, 53.723830838837, 'C3', 6),
(62, 'LS02', 116.51287482506, 22.721472358156, 503.97346160289, 'C2', 6),
(63, 'LS03', 120.40037375357, 19.70444889162, 509.94534020814, 'C2', 6),
(64, 'LS04', 82.439371661846, 52.901332879316, 471.50424176247, 'C2', 6),
(65, 'LS05', 84.5, 219.77841345412, 306.47716064986, 'C1', 6),
(66, 'LS06', 147.69647930807, 12.568993270614, 536.72921478153, 'C2', 6),
(67, 'LS07', 107.01051350218, 31.379832337841, 496.56444697542, 'C2', 6),
(68, 'LS08', 159.51880766856, 26.422006906736, 547.08797281607, 'C2', 6),
(69, 'LS09', 109.86924046338, 26.591774084848, 499.30676943138, 'C2', 6),
(70, 'LS10', 425.77135883007, 558.79728718317, 53.723830838837, 'C3', 6),
(71, 'LS11', 65.124880038277, 71.758381434662, 452.61048374955, 'C1', 6),
(72, 'LS12', 62.699681019922, 197.79818616201, 328.66129982096, 'C1', 6),
(73, 'LS01', 330.28607129107, 486.49115164101, 53.723830838837, 'C3', 7),
(74, 'LS02', 143.88961818777, 17.375, 503.97346160289, 'C2', 7),
(75, 'LS03', 147.75505255508, 15.087764082196, 509.94534020814, 'C2', 7),
(76, 'LS04', 109.91916221579, 46.288666269401, 471.50424176247, 'C2', 7),
(77, 'LS05', 57.057475895412, 213.16810414553, 306.47716064986, 'C1', 7),
(78, 'LS06', 175.17102753849, 19.108653144583, 536.72921478153, 'C2', 7),
(79, 'LS07', 134.33995020924, 25.419296312054, 496.56444697542, 'C2', 7),
(80, 'LS08', 186.94532771791, 32.479079805315, 547.08797281607, 'C2', 7),
(81, 'LS09', 137.2985392817, 20.295088691602, 499.30676943138, 'C2', 7),
(82, 'LS10', 398.98273424075, 552.26319868791, 53.723830838837, 'C3', 7),
(83, 'LS11', 92.379050054051, 65.212273576375, 452.61048374955, 'C2', 7),
(84, 'LS12', 35.466729323253, 191.19137173262, 328.66129982096, 'C1', 7),
(85, 'LS25', 106.88779163216, 29.832867780353, 251.79356624028, 'C2', 1),
(86, 'LS25', 89.883875701436, 23.946700074216, 419.18522159065, 'C2', 2),
(87, 'LS25', 112.96739641623, 23.946700074216, 475.37447227306, 'C2', 3),
(88, 'LS25', 133.01298103945, 23.946700074216, 576.91962178453, 'C2', 4),
(89, 'LS25', 153.4612690913, 43.074354319014, 576.91962178453, 'C2', 5),
(90, 'LS25', 189.15932438027, 54.485721776912, 576.91962178453, 'C2', 6),
(91, 'LS25', 216.6115314464, 60.98885656413, 576.91962178453, 'C2', 7),
(92, 'LS01', 284.43145044105, 479.33681037218, 53.723830838837, 'C3', 8),
(93, 'LS02', 190.06380507608, 12.018504251547, 503.97346160289, 'C2', 8),
(94, 'LS03', 193.28541072725, 13.408123574079, 509.94534020814, 'C2', 8),
(95, 'LS04', 155.92065289756, 39.137932722332, 471.50424176247, 'C2', 8),
(96, 'LS05', 11.101801655587, 206.0382920182, 306.47716064986, 'C1', 8),
(97, 'LS06', 221.07295176027, 26.352313834736, 536.72921478153, 'C2', 8),
(98, 'LS07', 179.83673150944, 20.135651080719, 496.56444697542, 'C2', 8),
(99, 'LS08', 233.08850250495, 38.937271490323, 547.08797281607, 'C2', 8),
(100, 'LS09', 183.03619860563, 14.391355429949, 499.30676943138, 'C2', 8),
(101, 'LS10', 355.76853430285, 545.01753284744, 53.723830838837, 'C3', 8),
(102, 'LS11', 138.56857508108, 57.966465401222, 452.61048374955, 'C2', 8),
(103, 'LS12', 11.101801655587, 184.08361626657, 328.66129982096, 'C1', 8),
(104, 'LS25', 262.71895630122, 67.902708177051, 576.91962178453, 'C2', 8),
(105, 'LS01', 284.43145044105, 479.33681037218, 53.723830838837, 'C3', 9),
(106, 'LS02', 190.06380507608, 12.018504251547, 503.97346160289, 'C2', 9),
(107, 'LS03', 193.28541072725, 13.408123574079, 509.94534020814, 'C2', 9),
(108, 'LS04', 155.92065289756, 39.137932722332, 471.50424176247, 'C2', 9),
(109, 'LS05', 11.101801655587, 206.0382920182, 306.47716064986, 'C1', 9),
(110, 'LS06', 221.07295176027, 26.352313834736, 536.72921478153, 'C2', 9),
(111, 'LS07', 179.83673150944, 20.135651080719, 496.56444697542, 'C2', 9),
(112, 'LS08', 233.08850250495, 38.937271490323, 547.08797281607, 'C2', 9),
(113, 'LS09', 183.03619860563, 14.391355429949, 499.30676943138, 'C2', 9),
(114, 'LS10', 355.76853430285, 545.01753284744, 53.723830838837, 'C3', 9),
(115, 'LS11', 138.56857508108, 57.966465401222, 452.61048374955, 'C2', 9),
(116, 'LS12', 11.101801655587, 184.08361626657, 328.66129982096, 'C1', 9),
(117, 'LS25', 262.71895630122, 67.902708177051, 576.91962178453, 'C2', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` char(10) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `cluster_kriminalitas` varchar(10) NOT NULL,
  `ket_kriminalitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `nama_kecamatan`, `longitude`, `latitude`, `c1`, `c2`, `c3`, `cluster_kriminalitas`, `ket_kriminalitas`) VALUES
('KN01', 'Kecamatan Air Putih', 3.2861, 99.3889, 55.883248831828, 12.57229096068, 34.889110048839, 'C2', 'Rawan'),
('KN02', 'Kecamatan Datuk Lima Puluh', 3.2083, 99.4911, 12.920429559423, 49.78014162294, 23.038012067017, 'C1', 'Cukup Rawan'),
('KN03', 'Kecamatan Datuk Tanah Datar', 3.1311, 99.5367, 14.228053275132, 63.269759759304, 37.805422891432, 'C1', 'Cukup Rawan'),
('KN04', 'Kecamatan Laut Tador', 3.3133, 99.2867, 30.893971903917, 45.305214931617, 20.5, 'C3', 'Sangat Rawan'),
('KN05', 'Kecamatan Lima Puluh', 3.1847, 99.4206, 13.358050007393, 52.483926110763, 26.03363209389, 'C1', 'Cukup Rawan'),
('KN06', 'Kecamatan Lima Puluh Pesisir', 3.2717, 99.4869, 30.065553379241, 47.618930059379, 24.191940806806, 'C3', 'Sangat Rawan'),
('KN07', 'Kecamatan Medang Deras', 3.3789, 99.3628, 31.669188496076, 24.638638355234, 13.067134345372, 'C3', 'Sangat Rawan'),
('KN08', 'Kecamatan Nibung Hangus', 3.1722, 99.6558, 65.402121525223, 14.868170701199, 42.868986458744, 'C2', 'Rawan'),
('KN09', 'Kecamatan Sei Balai', 3.1, 99.5756, 8.799857953399, 51.885089380283, 26.762847382145, 'C1', 'Cukup Rawan'),
('KN10', 'Kecamatan Sei Suka', 3.3322, 99.3917, 36.392822094474, 22.826793467327, 16.755596080116, 'C3', 'Sangat Rawan'),
('KN11', 'Kecamatan Talawi', 3.1994, 99.5622, 47.92637582793, 10.298664962023, 29.073183520213, 'C2', 'Rawan'),
('KN12', 'Kecamatan Tanjung Tiram', 3.2211, 99.5922, 47.222214052287, 11.813657350711, 26.753504443343, 'C2', 'Rawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriminalitas`
--

CREATE TABLE `tbl_kriminalitas` (
  `id_kriminalitas` int(11) NOT NULL,
  `id_kecamatan` char(10) NOT NULL,
  `id_kriteria` char(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriminalitas`
--

INSERT INTO `tbl_kriminalitas` (`id_kriminalitas`, `id_kecamatan`, `id_kriteria`, `nilai`) VALUES
(1, 'KN01', 'K01', 77),
(2, 'KN01', 'K02', 72),
(3, 'KN01', 'K03', 35),
(4, 'KN01', 'K04', 24),
(5, 'KN01', 'K05', 21),
(6, 'KN01', 'K06', 6),
(7, 'KN01', 'K07', 7),
(8, 'KN01', 'K08', 4),
(9, 'KN01', 'K09', 2),
(10, 'KN01', 'K10', 3),
(11, 'KN02', 'K01', 47),
(12, 'KN02', 'K02', 36),
(13, 'KN02', 'K03', 10),
(14, 'KN02', 'K04', 14),
(15, 'KN02', 'K05', 11),
(16, 'KN02', 'K06', 14),
(17, 'KN02', 'K07', 8),
(18, 'KN02', 'K08', 6),
(19, 'KN02', 'K09', 1),
(20, 'KN02', 'K10', 5),
(21, 'KN03', 'K01', 30),
(22, 'KN03', 'K02', 33),
(23, 'KN03', 'K03', 15),
(24, 'KN03', 'K04', 6),
(25, 'KN03', 'K05', 7),
(26, 'KN03', 'K06', 9),
(27, 'KN03', 'K07', 7),
(28, 'KN03', 'K08', 2),
(29, 'KN03', 'K09', 5),
(30, 'KN03', 'K10', 2),
(31, 'KN04', 'K01', 55),
(32, 'KN04', 'K02', 49),
(33, 'KN04', 'K03', 13),
(34, 'KN04', 'K04', 11),
(35, 'KN04', 'K05', 36),
(36, 'KN04', 'K06', 18),
(37, 'KN04', 'K07', 9),
(38, 'KN04', 'K08', 8),
(39, 'KN04', 'K09', 7),
(40, 'KN04', 'K10', 6),
(41, 'KN05', 'K01', 40),
(42, 'KN05', 'K02', 38),
(43, 'KN05', 'K03', 17),
(44, 'KN05', 'K04', 17),
(45, 'KN05', 'K05', 27),
(46, 'KN05', 'K06', 8),
(47, 'KN05', 'K07', 7),
(48, 'KN05', 'K08', 6),
(49, 'KN05', 'K09', 5),
(50, 'KN05', 'K10', 2),
(51, 'KN06', 'K01', 64),
(52, 'KN06', 'K02', 32),
(53, 'KN06', 'K03', 12),
(54, 'KN06', 'K04', 7),
(55, 'KN06', 'K05', 5),
(56, 'KN06', 'K06', 17),
(57, 'KN06', 'K07', 4),
(58, 'KN06', 'K08', 3),
(59, 'KN06', 'K09', 8),
(60, 'KN06', 'K10', 5),
(61, 'KN07', 'K01', 60),
(62, 'KN07', 'K02', 58),
(63, 'KN07', 'K03', 23),
(64, 'KN07', 'K04', 12),
(65, 'KN07', 'K05', 13),
(66, 'KN07', 'K06', 10),
(67, 'KN07', 'K07', 11),
(68, 'KN07', 'K08', 2),
(69, 'KN07', 'K09', 6),
(70, 'KN07', 'K10', 6),
(71, 'KN08', 'K01', 89),
(72, 'KN08', 'K02', 73),
(73, 'KN08', 'K03', 26),
(74, 'KN08', 'K04', 25),
(75, 'KN08', 'K05', 8),
(76, 'KN08', 'K06', 7),
(77, 'KN08', 'K07', 15),
(78, 'KN08', 'K08', 6),
(79, 'KN08', 'K09', 3),
(80, 'KN08', 'K10', 1),
(81, 'KN09', 'K01', 37),
(82, 'KN09', 'K02', 41),
(83, 'KN09', 'K03', 22),
(84, 'KN09', 'K04', 9),
(85, 'KN09', 'K05', 17),
(86, 'KN09', 'K06', 9),
(87, 'KN09', 'K07', 3),
(88, 'KN09', 'K08', 3),
(89, 'KN09', 'K09', 2),
(90, 'KN09', 'K10', 3),
(91, 'KN10', 'K01', 65),
(92, 'KN10', 'K02', 53),
(93, 'KN10', 'K03', 31),
(94, 'KN10', 'K04', 20),
(95, 'KN10', 'K05', 21),
(96, 'KN10', 'K06', 6),
(97, 'KN10', 'K07', 8),
(98, 'KN10', 'K08', 7),
(99, 'KN10', 'K09', 5),
(100, 'KN10', 'K10', 6),
(101, 'KN11', 'K01', 70),
(102, 'KN11', 'K02', 69),
(103, 'KN11', 'K03', 26),
(104, 'KN11', 'K04', 19),
(105, 'KN11', 'K05', 7),
(106, 'KN11', 'K06', 5),
(107, 'KN11', 'K07', 11),
(108, 'KN11', 'K08', 5),
(109, 'KN11', 'K09', 3),
(110, 'KN11', 'K10', 1),
(111, 'KN12', 'K01', 74),
(112, 'KN12', 'K02', 59),
(113, 'KN12', 'K03', 33),
(114, 'KN12', 'K04', 23),
(115, 'KN12', 'K05', 9),
(116, 'KN12', 'K06', 13),
(117, 'KN12', 'K07', 9),
(118, 'KN12', 'K08', 4),
(119, 'KN12', 'K09', 2),
(120, 'KN12', 'K10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` char(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`) VALUES
('K01', 'Pencurian', 'Kriminalitas'),
('K02', 'Penganiayaan', 'Kriminalitas'),
('K03', 'Penipuan', 'Kriminalitas'),
('K04', 'Pencabulan Anak', 'Kriminalitas'),
('K05', 'Penggelapan', 'Kriminalitas'),
('K06', 'KDRT', 'Kriminalitas'),
('K07', 'Perjudian', 'Kriminalitas'),
('K08', 'Pengerusakan', 'Kriminalitas'),
('K09', 'Pencemaran Nama', 'Kriminalitas'),
('K10', 'Pengancaman', 'Kriminalitas'),
('K11', 'Kecelakaan', 'Lakalantas'),
('K12', 'Kemacetan', 'Lakalantas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lakalantas`
--

CREATE TABLE `tbl_lakalantas` (
  `id_lakalantas` int(11) NOT NULL,
  `id_lalulintas` char(10) NOT NULL,
  `id_kriteria` char(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lakalantas`
--

INSERT INTO `tbl_lakalantas` (`id_lakalantas`, `id_lalulintas`, `id_kriteria`, `nilai`) VALUES
(5, 'LS01', 'K11', 378),
(6, 'LS01', 'K12', 397),
(7, 'LS02', 'K11', 49),
(8, 'LS02', 'K12', 56),
(9, 'LS03', 'K11', 64),
(10, 'LS03', 'K12', 37),
(11, 'LS04', 'K11', 80),
(12, 'LS04', 'K12', 73),
(13, 'LS05', 'K11', 196),
(14, 'LS05', 'K12', 193),
(15, 'LS06', 'K11', 38),
(16, 'LS06', 'K12', 23),
(17, 'LS07', 'K11', 73),
(18, 'LS07', 'K12', 47),
(19, 'LS08', 'K11', 20),
(20, 'LS08', 'K12', 24),
(21, 'LS09', 'K11', 67),
(22, 'LS09', 'K12', 48),
(23, 'LS10', 'K11', 351),
(24, 'LS10', 'K12', 501),
(25, 'LS11', 'K11', 85),
(26, 'LS11', 'K12', 93),
(27, 'LS12', 'K11', 183),
(28, 'LS12', 'K12', 175),
(29, 'LS25', 'K12', 1),
(30, 'LS25', 'K11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lalulintas`
--

CREATE TABLE `tbl_lalulintas` (
  `id_lalulintas` char(10) NOT NULL,
  `nama_lalulintas` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `cluster_lakalantas` varchar(10) NOT NULL,
  `ket_lakalantas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lalulintas`
--

INSERT INTO `tbl_lalulintas` (`id_lalulintas`, `nama_lalulintas`, `longitude`, `latitude`, `c1`, `c2`, `c3`, `cluster_lakalantas`, `ket_lakalantas`) VALUES
('LS01', 'Simpang 4 Lima Puluh Kota', 3.169766, 99.417157, 284.43145044105, 479.33681037218, 53.723830838837, 'C3', 'Sangat Rawan'),
('LS02', 'Perlintasan Rel KA Lima Puluh Kota', 3.173659, 99.414684, 190.06380507608, 12.018504251547, 503.97346160289, 'C2', 'Rawan'),
('LS03', 'Simpang 3 Taman Lima Puluh Kota', 3.169774, 99.414644, 193.28541072725, 13.408123574079, 509.94534020814, 'C2', 'Rawan'),
('LS04', 'Pintu Keluar TOL Lima Puluh', 3.168566, 99.391797, 155.92065289756, 39.137932722332, 471.50424176247, 'C2', 'Rawan'),
('LS05', 'Perbatasan Batu Bara - Simalungun (Perlanaan)', 3.169584, 99.37216, 11.101801655587, 206.0382920182, 306.47716064986, 'C1', 'Cukup Rawan'),
('LS06', 'Simpang 4 Simpang Dolok', 3.195287, 99.492966, 221.07295176027, 26.352313834736, 536.72921478153, 'C2', 'Rawan'),
('LS07', 'Simpang 3 Padang Genting', 3.19826, 99.558063, 179.83673150944, 20.135651080719, 496.56444697542, 'C2', 'Rawan'),
('LS08', 'Tugu Simpang 4 Tanjung Tiram', 3.217206, 99.577115, 233.08850250495, 38.937271490323, 547.08797281607, 'C2', 'Rawan'),
('LS09', 'Jalan Pasar Tanjung Tiram', 3.22179, 99.581194, 183.03619860563, 14.391355429949, 499.30676943138, 'C2', 'Rawan'),
('LS10', 'Simpang Pantai Bunga', 3.222466, 99.567518, 355.76853430285, 545.01753284744, 53.723830838837, 'C3', 'Sangat Rawan'),
('LS11', 'Simpang Jalan Perintis Manunggal', 3.226295, 99.556828, 138.56857508108, 57.966465401222, 452.61048374955, 'C2', 'Rawan'),
('LS12', 'Simpang Limau Manis', 3.147825, 99.457638, 11.101801655587, 184.08361626657, 328.66129982096, 'C1', 'Cukup Rawan'),
('LS13', 'Jalan SPBU Petatal', 3.135479, 99.484177, 0, 0, 0, '?', '?'),
('LS14', 'Simpang Sei Bejangkar', 3.12222, 99.562553, 0, 0, 0, '?', '?'),
('LS15', 'Perlintasan KA Petatal', 3.126525, 99.511334, 0, 0, 0, '?', '?'),
('LS16', 'Jalan Istana Niat Lima Laras', 3.204544, 99.601611, 0, 0, 0, '?', '?'),
('LS17', 'Simpang 4 Jalan Ujung Kubu', 3.181764, 99.635668, 0, 0, 0, '?', '?'),
('LS18', 'Jalan Pajak Selasa Simpang Gambus', 3.251973, 99.411357, 0, 0, 0, '?', '?'),
('LS19', 'Jalan Lintas Sumut Tanah Gambus', 3.232606, 99.420918, 0, 0, 0, '?', '?'),
('LS20', 'Jalan Lintas Sukaraja', 3.259737, 99.389396, 0, 0, 0, '?', '?'),
('LS21', 'Simpang 4 Tanah Merah', 3.276054, 99.371818, 0, 0, 0, '?', '?'),
('LS22', 'Jalan Lintas Indrapura', 3.28319, 99.369459, 0, 0, 0, '?', '?'),
('LS23', 'Jalan SPBU Indrapura', 3.293372, 99.365321, 0, 0, 0, '?', '?'),
('LS24', 'Pintu Tol Indrapura', 3.300371, 99.349758, 0, 0, 0, '?', '?'),
('LS25', 'Simpang 3 Tugu Inalum', 3.30169, 99.338149, 262.71895630122, 67.902708177051, 576.91962178453, 'C2', 'Rawan'),
('LS26', 'Simpang 3 Bandar Tinggi', 3.302139, 99.329583, 0, 0, 0, '?', '?'),
('LS27', 'Simpang Tanjung Kasau', 3.317193, 99.288868, 0, 0, 0, '?', '?'),
('LS28', 'Jalan Access Road Inalum', 3.354516, 99.38051, 0, 0, 0, '?', '?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan_kriminalitas`
--

CREATE TABLE `tbl_pengaduan_kriminalitas` (
  `id_pengaduan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `id_kriteria` char(10) NOT NULL,
  `id_kecamatan` char(10) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(12) NOT NULL,
  `ket_pengaduan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan_kriminalitas`
--

INSERT INTO `tbl_pengaduan_kriminalitas` (`id_pengaduan`, `id_akun`, `foto`, `tgl_kejadian`, `id_kriteria`, `id_kecamatan`, `alamat`, `telepon`, `ket_pengaduan`, `status`, `sumber`) VALUES
(1, 3, 'gmbr-contoh.jpeg', '2023-08-03', 'K01', 'KN01', 'Jln KL Yos Sudarso KM.9', '082133445566', 'Terajadi pencurian dengan kekerasan', 'Valid', 'Masyarakat'),
(3, 1, '-', '2023-08-03', 'K01', 'KN01', 'Jln Marelan IV', '0', 'Pencurian & Kekerasan', 'Valid', 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan_lakalantas`
--

CREATE TABLE `tbl_pengaduan_lakalantas` (
  `id_pengaduan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `id_kriteria` char(10) NOT NULL,
  `id_lalulintas` char(10) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(12) NOT NULL,
  `ket_pengaduan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `sumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan_lakalantas`
--

INSERT INTO `tbl_pengaduan_lakalantas` (`id_pengaduan`, `id_akun`, `foto`, `tgl_kejadian`, `id_kriteria`, `id_lalulintas`, `alamat`, `telepon`, `ket_pengaduan`, `status`, `sumber`) VALUES
(1, 3, 'aksi-pencurian.jpeg', '2023-08-03', 'K11', 'LS01', 'Jln Baru Karya Ujung', '082145678080', 'Telah terjadi kecelakaan barusan saja', 'Valid', 'Masyarakat'),
(2, 1, '-', '2023-08-03', 'K11', 'LS01', 'Jln Bawal 1', '0', 'Telah terjadi kecelakaan', 'Valid', 'ADMINISTRATOR'),
(3, 1, '-', '2023-08-05', 'K12', 'LS25', 'Simpang 3 Inalum', '0', 'Truk Rusak', 'Valid', 'ADMINISTRATOR'),
(4, 1, '-', '2023-08-04', 'K11', 'LS25', 'Simpang 3 Inalum', '0', 'Kecelakaan Kecil', 'Valid', 'ADMINISTRATOR');

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
-- Indexes for table `tbl_lalulintas`
--
ALTER TABLE `tbl_lalulintas`
  ADD PRIMARY KEY (`id_lalulintas`);

--
-- Indexes for table `tbl_pengaduan_kriminalitas`
--
ALTER TABLE `tbl_pengaduan_kriminalitas`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tbl_pengaduan_lakalantas`
--
ALTER TABLE `tbl_pengaduan_lakalantas`
  ADD PRIMARY KEY (`id_pengaduan`);

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
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_kriminalitas`
--
ALTER TABLE `tbl_kriminalitas`
  MODIFY `id_kriminalitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_lakalantas`
--
ALTER TABLE `tbl_lakalantas`
  MODIFY `id_lakalantas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_pengaduan_kriminalitas`
--
ALTER TABLE `tbl_pengaduan_kriminalitas`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengaduan_lakalantas`
--
ALTER TABLE `tbl_pengaduan_lakalantas`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
