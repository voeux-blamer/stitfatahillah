-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2020 pada 10.44
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatahillah_stit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `eimport`
--

CREATE TABLE `eimport` (
  `idimport` int(2) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `title`, `file_name`, `created`, `modified`, `status`) VALUES
(1, 'new photo', 'gggg.PNG', '2020-02-13 10:53:38', '2020-02-13 10:53:38', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_makul` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` enum('masuk','sakit','izin','alfa') NOT NULL DEFAULT 'masuk',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `nim`, `kode_makul`, `tanggal`, `absen`, `keterangan`) VALUES
(1, 'rafli', 'KDF 102', '2020-02-21', 'izin', 'liburan ke maldives');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kd_dosen` int(30) NOT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `TMT` date NOT NULL,
  `prodi_id` int(30) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kd_dosen`, `nidn`, `image`, `nama_dosen`, `TMT`, `prodi_id`, `ket`) VALUES
(2, 'D001', 'avatar_2x.png', 'rafli', '2020-01-17', 1, ''),
(3, 'D002', 'avatar_2x.png', 'Agi', '2020-01-17', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `prodi_id` int(50) NOT NULL,
  `jam_mulai` varchar(9) NOT NULL,
  `jam_selesai` varchar(9) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `hari`, `kode_makul`, `nama_makul`, `prodi_id`, `jam_mulai`, `jam_selesai`, `nidn`, `keterangan`) VALUES
(0, 'Selasa', 'KDF', 'Pancasila', 1, '11:00', '11:16', 'D001', 'Ruangan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsentrasi`
--

CREATE TABLE `tbl_konsentrasi` (
  `konsentrasi_id` int(11) NOT NULL,
  `nama_konsentrasi` varchar(100) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `krs_id` int(30) NOT NULL,
  `makul_id` int(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_semester` varchar(30) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`krs_id`, `makul_id`, `nim`, `nama_semester`, `nama_prodi`, `nilai`) VALUES
(13, 77, 'rafli ', 'semester 1', 'PGMI', ''),
(14, 78, 'rafli ', 'semester 1', 'PGMI', ''),
(15, 79, 'rafli ', 'semester 1', 'PGMI', ''),
(16, 80, 'rafli ', 'semester 1', 'PGMI', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `prodi_id` int(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `tempat`, `jk`, `ijazah`, `asal_sekolah`, `nama_ortu`, `alamat`, `angkatan`, `prodi_id`, `image`, `status`, `date`, `email`) VALUES
(37, 'rafli', 'Muhamad Rafli', 'jonggol', 'laki-laki', 'IMG_20170926_173351_027.jpg', 'smk fatahillah', 'yusuf', 'jonggol', 2020, 2, 'IMG_20180610_151457.jpg', 0, '2020-02-21', 'muhamadrafly198@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `makul_id` int(20) NOT NULL,
  `kode_makul` varchar(11) NOT NULL,
  `nama_makul` varchar(60) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `nama_semester` varchar(25) NOT NULL,
  `prodi_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`makul_id`, `kode_makul`, `nama_makul`, `nidn`, `sks`, `nama_semester`, `prodi_id`) VALUES
(22, 'KDF 1103', 'Bahasa Inggris 1', 'D002', 3, 'semester 1', 1),
(25, 'KDF 1101', 'Pancasila', 'D001', 2, 'semester 1', 1),
(26, 'KDF 1102', 'Kewarganegaraan', 'D001', 2, 'semester 1', 1),
(27, 'KDF 1104', 'Bahasa Arab 1', 'D001', 3, 'semester 1', 1),
(28, 'KDF 1105', 'Bahasa Indonesia', 'D001', 3, 'semester 1', 1),
(29, 'KDF 1106', 'Ilmu Sosial Dasar', 'D001', 2, 'semester 1', 1),
(30, 'KDF 1107', 'Metodologi Studi Islam', 'D001', 3, 'semester 1', 1),
(31, 'KUMPI 1108', 'Perkembangan Pemikiran Modern Dunia Islam', 'D001', 3, 'semester 1', 1),
(32, 'KDF 1202', 'Bahasa Arab 2', 'D001', 3, 'semester 2', 1),
(33, 'KUMPI 1203', 'Dasar-dasar Manajemen', 'D001', 3, 'semester 2', 1),
(34, 'KDF 1204', 'Ulumul Quran', 'D001', 3, 'semester 2', 1),
(35, 'KDF 1205', 'Tahsin Al-Quran', 'D001', 3, 'semester 2', 1),
(36, 'KDF 1206', 'Tsaqofah Islamiyah', 'D001', 2, 'semester 2', 1),
(37, 'KDF 1207', 'Akidah Akhlaq', 'D001', 2, 'semester 2', 1),
(38, 'KDF 2301', 'Bhs Inggris III', 'D001', 3, 'semester 3', 1),
(39, 'KDF 2302', 'Bhs Arab III', 'D001', 3, 'semester 3', 1),
(40, 'KDF 2303', 'Ulumul Hadits', 'D001', 3, 'semester 3', 1),
(41, 'KUMPI 2304', 'Siroh Nabawiyah (Manajemen)', 'D001', 3, 'semester 3', 1),
(42, 'KDF 2305', 'Ushul Fiqh', 'D001', 3, 'semester 3', 1),
(43, 'KUMPI 2306', 'Dasar-dasar Pendidikan', 'D001', 3, 'semester 3', 1),
(44, 'KUMPI 2307', 'Tafsir Ayat Manajemen Pendidikan Islam', 'D001', 3, 'semester 3', 1),
(45, 'KUMPI 3501', 'Sistem Informasi Manajemen (TI)', 'D001', 3, 'semester 5', 1),
(46, 'KUMPI 3502', 'Perencanaan dan Evaluasi Pendidikan', 'D001', 3, 'semester 5', 1),
(47, 'KUMPI 3503', 'Perencanaan Sistem Kependidikan Islam', 'D001', 3, 'semester 5', 1),
(48, 'KDF 2401', 'Sejarah dan Peradaban Islam', 'D001', 2, 'semester 4', 1),
(49, 'KDF 2402', 'Fiqh Ibadah', 'D001', 3, 'semester 4', 1),
(50, 'KDF 2403', 'Fiqh Da’wah', 'D001', 3, 'semester 4', 1),
(51, 'KDF 2404', 'Statistik', 'D001', 3, 'semester 4', 1),
(52, 'KDF 2405', 'Psikologi Pendidikan', 'D001', 3, 'semester 4', 1),
(53, 'KUMPI 2406', 'Hadits Manajemen Pendidikan Islam', 'D001', 3, 'semester 4', 1),
(54, 'KUMPI 122', 'Sejarah Pendidikan Islam', 'D001', 2, 'semester 4', 1),
(55, 'KUMPI 3504', 'Strategi Belajar Mengajar', 'D001', 3, 'semester 5', 1),
(56, 'KDF 3505', 'Metode Penelitian', 'D001', 3, 'semester 5', 1),
(57, 'KUMPI 3506', 'Profesi Kependidikan', 'D001', 2, 'semester 5', 1),
(58, 'KTMPI 3508', 'Manajemen Pra Sekolah (Pilihan)', 'D001', 2, 'semester 5', 1),
(59, 'KTMPI 3509', 'Manajemen Diklat (Pilihan)', 'D001', 2, 'semester 5', 1),
(60, 'KDF 3601', 'Praktik Kerja Lapangan (PKL)', 'D001', 3, 'semester 6', 1),
(61, 'KUMPI 3602', 'Manajemen Kurikulum Kependidikan Islam', 'D001', 3, 'semester 6', 1),
(62, 'KUMPI 3603', 'Media Pembelajaran', 'D001', 3, 'semester 6', 1),
(63, 'KUMPI 3604', 'Enterpreneurship Pendidikan', 'D001', 3, 'semester 6', 1),
(64, 'KUMPI 3605', 'Pengembangan Pusat Sumber Belajar', 'D001', 3, 'semester 6', 1),
(65, 'KUMPI 3606', 'Manajemen Kesiswaan', 'D001', 3, 'semester 6', 1),
(66, 'KTMPI 3607', 'Manajemen Pesantren (Pilihan)', 'D001', 2, 'semester 6', 1),
(67, 'KTMPI 3608', 'Manajemen Masjid (Pilihan)', 'D001', 2, 'semester 6', 1),
(68, 'KUMPI 4701', 'Manajemen Keuangan Pendidikan', 'D001', 3, 'semester 7', 1),
(69, 'KUMPI 4702', 'Manajemen Perpustakaan', 'D001', 3, 'semester 7', 1),
(70, 'KUMPI 4703', 'Manajemen Kurikulum', 'D001', 3, 'semester 7', 1),
(71, 'KUMPI 4704', 'Manajemen SDM dan Kepemimpinan Kependidikan Islam', 'D001', 3, 'semester 7', 1),
(72, 'KUMPI 4705', 'Administrasi dan Supervisi Kependidikan Islam', 'D001', 3, 'semester 7', 1),
(73, 'KUMPI 4706', 'Penelitian Tindakan Kelas dan Sekolah', 'D001', 3, 'semester 7', 1),
(74, 'KDF 4707', 'Kuliah Kerja Nyata', 'D001', 3, 'semester 7', 1),
(75, 'KDF 120', 'Seminar Hasil', 'D001', 2, 'semester 8', 1),
(76, 'KDF 119', 'Sidang Komprehensif', 'D001', 4, 'semester 8', 1),
(77, 'KDF 101', 'Pancasila', 'D002', 2, 'semester 1', 2),
(78, 'KDF 102', 'Kewarganegaraan', 'D002', 2, 'semester 1', 2),
(79, 'KDF 103', 'Bahasa Inggris I', 'D002', 3, 'semester 1', 2),
(80, 'KDF 105', 'Bahasa Arab I', 'D002', 3, 'semester 1', 2),
(81, 'KDF 107', 'Bahasa Indonesia', 'D002', 3, 'semester 1', 2),
(82, 'KDF 108', 'Ilmu Sosial Dasar', 'D002', 2, 'semester 1', 2),
(83, 'KDF 109', 'Metodologi Studi Islam', 'D002', 3, 'semester 1', 2),
(84, 'KUPGM 202', 'Landasan Pendidikan', 'D002', 3, 'semester 1', 2),
(85, 'KDF 104', 'Bahasa Inggris II', 'D002', 3, 'semester 2', 2),
(86, 'KDF 106', 'Bahasa Arab II', 'D002', 3, 'semester 2', 2),
(87, 'KUPGM 236', 'Perencanaan Pembelajaran', 'D002', 3, 'semester 2', 2),
(88, 'KDF 113', 'Ulumul Quran', 'D002', 3, 'semester 2', 2),
(89, 'KDF 115', 'Tahsin Al-Quran', 'D002', 2, 'semester 2', 2),
(90, 'KDF 116', 'Tsaqofah Islamiyah', 'D002', 2, 'semester 2', 2),
(91, 'KDF 114', 'Akidah Akhlaq', 'D002', 3, 'semester 2', 2),
(92, 'KUPGM 205', 'Profesi Keguruan', 'D002', 2, 'semester 2', 2),
(93, 'KDF 118', 'Bhs Inggris III', 'D002', 3, 'semester 3', 2),
(94, 'KDF 119', 'Bhs Arab III', 'D002', 3, 'semester 3', 2),
(95, 'KDF 112', 'Ulumul Hadits', 'D002', 3, 'semester 3', 2),
(96, 'KDF 111', 'Ushul Fiqh', 'D002', 3, 'semester 3', 2),
(97, 'KUPGM 206', 'Aqidah Akhlaq MI', 'D002', 2, 'semester 3', 2),
(98, 'KUPGM 207', 'Pembelajaran Aqidah Akhlaq MI', 'D002', 2, 'semester 3', 2),
(99, 'KUPGM 208', 'Al-Qur’an Hadits MI', 'D002', 2, 'semester 3', 2),
(100, 'KUPGM 209', 'Pembelajaran Al-Qur’an Hadits MI', 'D002', 2, 'semester 3', 2),
(101, 'KDF 116', 'Sejarah dan Peradaban Islam', 'D002', 2, 'semester 4', 2),
(102, 'KDF 117', 'Fiqh Ibadah', 'D002', 3, 'semester 4', 2),
(103, 'KDF 120', 'Fiqh Da’wah', 'D002', 3, 'semester 4', 2),
(104, 'KDF 117', 'Fiqh Da’wah', 'D002', 3, 'semester 4', 2),
(105, 'KDF 117', 'Statistik', 'D002', 3, 'semester 4', 2),
(106, 'KDF 117', 'Psikologi Pendidikan', 'D002', 3, 'semester 4', 2),
(107, 'KUPGM 215', 'Bahasa Indonesia MI ', 'D002', 2, 'semester 4', 2),
(108, 'KUPGM 216', 'Pembelajaran Bahasa Indonesia MI', 'D002', 2, 'semester 4', 2),
(109, 'KUPGM 221', 'Ilmu Pengetahuan Sosial  MI', 'D002', 2, 'semester 4', 2),
(110, 'KUPGM 222', 'Pembelajaran Ilmu Pengetahuan Sosial MI', 'D002', 2, 'semester 4', 2),
(111, 'KUPGM 217', 'Matematika MI', 'D002', 2, 'semester 5', 2),
(112, 'KUPGM 218', 'Pembelajaran Matematika MI', 'D002', 2, 'semester 5', 2),
(113, 'KUPGM 223', 'Pendidikan Kewarganegaraan MI', 'D002', 2, 'semester 5', 2),
(114, 'KUPGM 224', 'Pembelajaran Pendidikan Kewarganegaraan MI', 'D002', 2, 'semester 5', 2),
(115, 'KUMPI 102', 'Metode Penelitian', 'D002', 3, 'semester 5', 2),
(116, 'KUPGM 225', 'Bahasa Arab MI', 'D002', 2, 'semester 5', 2),
(117, 'KUPGM 226', 'Pembelajaran Bahasa Arab MI', 'D002', 2, 'semester 5', 2),
(118, 'KUPGM 204', 'Bimbingan Konseling (Pilihan)', 'D002', 2, 'semester 5', 2),
(119, 'KTPGM 209', 'Building Character (Pilihan)', 'D002', 2, 'semester 5', 2),
(120, 'KDF 110', 'Praktik Kerja Lapangan (PKL)', 'D002', 3, 'semester 6', 2),
(121, 'KDF 111', 'Media Pembelajaran', 'D002', 3, 'semester 6', 2),
(122, 'KUPGM 234', 'Bahasa Inggris  MI', 'D002', 2, 'semester 6', 2),
(123, 'KUPGM 235', 'Pembelajaran Bahasa Inggris  MI', 'D002', 2, 'semester 6', 2),
(124, 'KUPGM 230', 'Pendidikan Jasmani dan Kesehatan MI', 'D002', 2, 'semester 6', 2),
(125, 'KUPGM 231', 'Pembelajaran Penjaskes MI', 'D002', 2, 'semester 6', 2),
(126, 'KUPGM 228', 'Seni Budaya dan Keterampilan MI', 'D002', 2, 'semester 6', 2),
(127, 'KUPGM 229', 'Pembelajaran Seni Budaya dan Keterampilan MI', 'D002', 2, 'semester 6', 2),
(128, 'KTPGM 203', 'Media Da\'wah (Pilihan)', 'D002', 2, 'semester 6', 2),
(129, 'KTPGM 206', 'Pendidikan Parenting(Pilihan)', 'D002', 2, 'semester 6', 2),
(130, 'KUPGM 232', 'Bahasa Sunda MI', 'D002', 2, 'semester 7', 2),
(131, 'KUPGM 233', 'Pembelajaran Bahasa Sunda MI', 'D002', 2, 'semester 7', 2),
(132, 'KUPGM 237', 'Pengembangan Kurikulum  MI', 'D002', 3, 'semester 7', 2),
(133, 'KUPGM 227', 'Pembelajaran Tematik', 'D002', 3, 'semester 7', 2),
(134, 'KUPGM 240', 'Teknologi Informasi dan Komunikasi (TIK) MI', 'D002', 2, 'semester 7', 2),
(135, 'KUPGM 241', 'Pembelajaran TIK MI', 'D002', 2, 'semester 7', 2),
(136, 'KTPGM 205', 'Psikologi Dakwah (Pilihan Dai)', 'D002', 2, 'semester 7', 2),
(137, 'KTPGM 210', 'Pendidikan Inklusi (Pilihan Kons)', 'D002', 2, 'semester 7', 2),
(138, 'KDF 118', 'Kuliah Kerja Nyata', 'D002', 4, 'semester 7', 2),
(139, 'KDF 120', 'Seminar Hasil', 'D002', 2, 'semester 8', 2),
(140, 'KDF 119', 'Sidang Komprehensif', 'D002', 4, 'semester 8', 2),
(141, '3213', 'dfad', '1702', 3412, 'semester 2', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ortu`
--

CREATE TABLE `tbl_ortu` (
  `id_pmb` int(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `usia_ayah` int(3) NOT NULL,
  `usia_ibu` int(3) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `pd_ayah` varchar(30) NOT NULL,
  `pd_ibu` varchar(303) NOT NULL,
  `stat_ayah` varchar(30) NOT NULL,
  `stat_ibu` varchar(30) NOT NULL,
  `alamat_ortu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ortu`
--

INSERT INTO `tbl_ortu` (`id_pmb`, `nama_ayah`, `nama_ibu`, `usia_ayah`, `usia_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pd_ayah`, `pd_ibu`, `stat_ayah`, `stat_ibu`, `alamat_ortu`) VALUES
(15, '', '', 0, 0, '', '', '', '', '', '', 'udhsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pmb` int(11) NOT NULL,
  `sd` varchar(30) NOT NULL,
  `smp` varchar(30) NOT NULL,
  `sma` varchar(30) NOT NULL,
  `kuliah` varchar(30) NOT NULL,
  `lulus_sd` int(30) NOT NULL,
  `lulus_smp` int(30) NOT NULL,
  `lulus_sma` int(30) NOT NULL,
  `lulus_kuliah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pmb`, `sd`, `smp`, `sma`, `kuliah`, `lulus_sd`, `lulus_smp`, `lulus_sma`, `lulus_kuliah`) VALUES
(15, '', '', '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `prodi_id` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `ketua` varchar(70) NOT NULL,
  `no_izin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`prodi_id`, `nama_prodi`, `ketua`, `no_izin`) VALUES
(1, 'MPI', 'Jaenal S.Pd', 'KZI18'),
(2, 'PGMI', 'Lisa', 'KIUY18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id` int(20) NOT NULL,
  `kode_ruangan` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id`, `kode_ruangan`, `keterangan`) VALUES
(1, 'L-01', 'Ruangan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_semester`
--

INSERT INTO `tbl_semester` (`id`, `nama_semester`) VALUES
(1, 'semester 1'),
(2, 'semester 2'),
(3, 'semester 3'),
(4, 'semester 4'),
(5, 'semester 5'),
(6, 'semester 6'),
(7, 'semester 7'),
(8, 'semester 8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(30) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `nama_file` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `nidn`, `title`, `nama_file`, `created`, `modified`, `status`) VALUES
(9, 'D002', 'r222', 'DATA_PENGAJUAN_NIRM_MAHASISWA_STIT_FAT_2019.xlsx', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(30) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nim`, `name`, `username`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin', 'admin.png', '$2y$10$0PqrJzneB7TJFE5.x7r5ke9JuOfkDbcFKNwM1e71wCKOPmsfYMMl.', 4, 1, 1576035609),
(3, 'D001', 'rafli', 'rafli', 'default.jpg', '$2y$10$zzLs6v9V3wfroZGrnBUQO.WuBdIsJDBVXcp/cMg1TpkMZ1KXpaJ46', 3, 1, 1579233544),
(4, 'D002', 'Agi', 'Agi', 'avatar_2x.png', '$2y$10$.X80k9fFEKWsfZvYlzAGMejrk9XnKnhF0QezJY5sOf5KUOvDu/bC2', 3, 1, 1579233557),
(41, 'rafli', 'rafli', 'rafli', 'IMG_20180610_151457.jpg', '$2y$10$dralrVYn.GIJLgxM0rvm3.UuVtur2YrVn9Tfnl.H7ZDvaATmZSo6a', 2, 1, 1582252420),
(44, '3213', 'sa', 'sa', 'avatar_2x1.png', '$2y$10$9hBqIFMBZarVd3rzwjw2.ugkOKLFzD85BNJxi.V66vTCRxbGJdZlq', 3, 1, 1582449094);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user'),
(3, 'dosen'),
(4, 'pegawai');

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
(8, 1, 3),
(9, 1, 4),
(11, 3, 4),
(12, 4, 5),
(13, 1, 6),
(14, 2, 6),
(15, 4, 2),
(17, 4, 4),
(19, 3, 2),
(21, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(4, 'dosen'),
(5, 'pegawai'),
(6, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 0, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'user', 'fas fa-fw fa-home', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(16, 0, 'Setting Akses', 'admin/role', 'fas fa-fw fa-wrench', 1),
(18, 5, 'Jadwal', 'pegawai/jadwal', 'far fa-fw fa-calendar-alt', 1),
(19, 6, 'KRS', 'mahasiswa/krs', 'fas fa-fw fa-book-open', 1),
(23, 5, 'Matakuliah', 'pegawai/matkul', 'fas fa-fw fa-list-ul', 1),
(24, 5, 'Prodi', 'pegawai/prodi', 'fas fa-fw fa-book', 1),
(25, 6, 'Mahasiswa', 'mahasiswa', 'fas fa-fw fa-address-card', 1),
(26, 4, 'Dosen', 'dosen', 'fas fa-fw fa-address-card', 1),
(28, 4, 'Absensi', 'dosen/absensi_mahasiswa', 'fas fa-fw fa-tasks', 1),
(31, 0, 'sdasdasdsfafsad', 'afdafadfaasfdafad', 'asdsa', 1),
(32, 0, 'ggsf', 'aaddsa', 'dsad', 1),
(34, 1, 'Akses Menu', 'Admin/role', 'fas fa-fw fa-wrench', 1),
(35, 5, 'PMB', 'pegawai/pmb', 'fas fa-fw fa-registered', 1),
(37, 5, 'Mahasiswa', 'Mahasiswa', 'fas fa-fw fa-tasks', 1),
(38, 5, 'Ruangan', 'pegawai/ruangan', 'far fa-hospital', 1),
(39, 4, 'Input nilai', 'dosen/inputNilai', 'fas fa-fw fa-file-upload', 1),
(40, 6, 'Download modul', 'mahasiswa/download_aksi', 'fas fa-fw fa-file-download', 1),
(41, 5, 'Upload', 'pegawai/addUpload', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `eimport`
--
ALTER TABLE `eimport`
  ADD PRIMARY KEY (`idimport`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`krs_id`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `kd_dosen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `krs_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
