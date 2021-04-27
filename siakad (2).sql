-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 01:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `eimport`
--

CREATE TABLE `eimport` (
  `idimport` int(2) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `hari` varchar(125) NOT NULL,
  `kehadiran` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `nama`, `hari`, `kehadiran`) VALUES
(1, 'arpinsyah agi', 'selasa', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `kd_dosen` varchar(5) NOT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama_dosen` varchar(30) DEFAULT NULL,
  `nama_makul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`kd_dosen`, `nidn`, `nama_dosen`, `nama_makul`) VALUES
('001', 'D001', 'Muhamad Rafli', 'Sistem Algoritma Dasar'),
('002', 'D002', 'Arpiansyah Agi', 'Sistem Basis Data');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jam_mulai` varchar(9) NOT NULL,
  `jam_selesai` varchar(9) NOT NULL,
  `nidn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `hari`, `kode_makul`, `nama_makul`, `nama_prodi`, `jam_mulai`, `jam_selesai`, `nidn`) VALUES
(4, 'Senin', 'MK01', 'Basis Data ', 'TEKNIK', '08:00', '10:00', 'D001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsentrasi`
--

CREATE TABLE `tbl_konsentrasi` (
  `konsentrasi_id` int(11) NOT NULL,
  `nama_konsentrasi` varchar(100) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `krs_id` int(11) NOT NULL,
  `kode_makul` varchar(20) NOT NULL,
  `nama_makul` varchar(30) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sks` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `makul_id` int(11) NOT NULL,
  `kode_makul` varchar(11) NOT NULL,
  `nama_makul` varchar(60) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `nama_semester` varchar(25) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`makul_id`, `kode_makul`, `nama_makul`, `nidn`, `sks`, `nama_semester`, `nama_prodi`, `jam`) VALUES
(1, 'MK01', 'Basis Data', 'D002', 4, 'semester 1', 'TEKNIK INFORMATIKA', 4),
(2, 'MK02', 'Algoritma Dasar', 'D002', 4, 'semester 1', 'TEKNIK INFORMATIKA', 4),
(3, 'MK03', 'Web', 'D002', 4, 'semester 1', 'TEKNIK INFORMATIKA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliahh`
--

CREATE TABLE `tbl_matakuliahh` (
  `makul_id` int(11) NOT NULL,
  `kode_makul` varchar(125) NOT NULL,
  `nama_makul` varchar(125) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(125) NOT NULL,
  `dosen` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matakuliahh`
--

INSERT INTO `tbl_matakuliahh` (`makul_id`, `kode_makul`, `nama_makul`, `sks`, `semester`, `dosen`) VALUES
(1, 'KDF1101', 'Pancasila', 2, 'Semester 1', 'isnull'),
(2, 'KDF1102', 'Kewarganegaraan', 2, 'Semester 1', 'isnull'),
(3, 'KDF1103', 'Bahasa Inggris I', 3, 'Semester 1', 'isnull'),
(4, 'KDF1104', 'Bahasa Arab I', 3, 'Semester 1', 'isnull'),
(5, 'KDF1105', 'Bahasa Indonesia', 3, 'Semester 1', 'isnull'),
(6, 'KDF1106', 'Ilmu Sosial Dasar', 2, 'Semester 1', 'isnull'),
(7, 'KDF1107', 'Metodologi Studi Islam', 3, 'Semester 1', 'isnull'),
(8, 'KUMPI 1108', 'Perkembangan Pemikiran Modern Dunia Islam', 3, 'Semester 1', 'isnull'),
(9, 'KDF1201', 'Bahasa Inggris II', 3, 'Semester 2', 'isnull'),
(10, 'KDF1102', 'Bahasa Arab II', 3, 'Semester 2', 'isnull'),
(11, 'KUMPI1203', 'Dasar-dasar Manajemen', 3, 'Semester 2', 'isnull'),
(12, 'KDF1204', 'Ulumul Quran', 3, 'Semester 2', 'isnull'),
(13, 'KDF1205', 'Tahsin Al-Quran', 3, 'Semester 2', 'isnull'),
(14, 'KDF1206', 'Tsaqofah Islamiyah', 2, 'Semester 2', 'isnull'),
(15, 'KDF1207', 'Akidah Ahlaq', 2, 'Semester 2', 'isnull'),
(16, 'KDF2301', 'Bahasa Inggris III', 3, 'Semeser 3', 'isnull'),
(17, 'KDF2302', 'Bahasa Arab III', 3, 'Semester 3', 'isnull'),
(18, 'KDF2303', 'Ulumul Hadits', 3, 'Semester 3', 'isnull'),
(19, 'KUMPI2304', 'Siroh Nabawiyah(Manajemen)', 3, 'Semester 3', 'isnull'),
(20, 'KDF2305', 'Ushul Fiqh', 3, 'Semester 3', 'isnull'),
(21, 'KUMPI2306', 'Dasar-dasar Pendidikan', 3, 'Semester 3', 'isnull'),
(22, 'KUMPI2307', 'Tafsir Ayat Manajemen Pendidikan Islam', 3, 'Semester 3', 'isnull'),
(23, 'KDF2401', 'Sejarah dan Peradaban Islam', 2, 'Semester 4', 'isnull'),
(24, 'KDF2402', 'Fiqih Ibadah', 3, 'Semester 4', 'isnull'),
(25, 'KDF2403', 'Fiqih Da\'wah', 3, 'Semester 4', 'isnull'),
(26, 'KDF2404', 'Statistik', 3, 'Semester 4', 'isnull'),
(27, 'KDF2405', 'Psikologi Pendidikan', 3, 'Semester 4', 'isnull'),
(28, 'KUMPI2406', 'Hadits Manajemen Pendidikan Islam', 3, 'Semester 4', 'isnull'),
(29, 'KUMPI122', 'Sejarah Pendidikan Islam', 2, 'Semester 4', 'isnull'),
(30, 'KUMPI3501', 'Sistem Informasi Manajemen(TI)', 3, 'Semester 5', 'isnull'),
(31, 'KUMPI3502', 'Perencanaan dan Evaluasi Pendidikan', 3, 'Semester 5', 'isnull'),
(32, 'KUMPI3503', 'Perencanaan Sistem Kependidikan Islam', 3, 'Semester 5', 'isnull'),
(33, 'KUMPI3504', 'Strategi Belajar Mengajar', 3, 'Semester 5', 'isnull'),
(34, 'KDF3505', 'Metode Penelitian', 3, 'Semester 5', 'isnull'),
(35, 'KUMPI3506', 'Profesi Kependidikan', 2, 'Semester 5', 'isnull'),
(36, 'KUMPI3507', 'Manajemen Pendidikan Luar Sekolah', 2, 'Semester 5', 'isnull'),
(37, 'KTMPI3508', 'Manajemen Pra Sekolah (Pilihan)', 2, 'Semester 5', 'isnull'),
(38, 'KTMPI3509', 'Manajemen Diklat(Pilihan)', 2, 'Semester 5', 'isnull'),
(39, 'KDF3601', 'Praktik Kerja Lapangan (PKL)', 3, 'Semester 6', 'isnull'),
(40, 'KUMPI3602', 'Manajemen Kurikulum Kependidikan Islam', 3, 'Semester 6', 'isnull'),
(41, 'KUMPI3603', 'Media Pembelajaran', 3, 'Semester 6', 'isnull'),
(42, 'KUMPI3604', 'Enterpreuneurship Pendidikan', 3, 'Semester 6', 'isnull'),
(43, 'KUMPI3605', 'Pengembangan Pusat Sumber Belajar', 3, 'Semester 6', 'isnull'),
(44, 'KUMPI3606', 'Manajemen Kesiswaan', 3, 'Semester 6', 'isnull'),
(45, 'KUMPI3607', 'Manajemen Pesantren(Pilihan)', 2, 'Semester 6', 'isnull'),
(46, 'KUMPI3608', 'Manajemen Masjid(Pilihan)', 2, 'Semester 6', 'isnull'),
(47, 'KUMPI4701', 'Manajemen Keuangan Pendididikan', 3, 'Semester 7', 'isnull'),
(48, 'KUMPI4702', 'Manajemen Perpustakaan', 3, 'Semester 7', 'isnull'),
(49, 'KUMPI4703', 'Manajemen Kurikulum', 3, 'Semester 7', 'isnull'),
(50, 'KUMPI4704', 'Manajemen SDM dan Kepemimpinan Kependidikan Islam', 3, 'Semester 7', 'isnull'),
(51, 'KUMPI4705', 'Administrasi dan Supervisi Kependidikan Islam', 3, 'Semester 7', 'isnull'),
(52, 'KUMPI4706', 'Penelitian Tindakan Kelas dan Sekolah', 3, 'Semester 7', 'isnull'),
(53, 'KDFI4707', 'Kuliah Kerja Nyata', 3, 'Semester 7', 'isnull'),
(54, 'KDF120', 'Seminar Hasil', 2, 'Semester 8', 'isnull'),
(55, 'KDF119', 'Sidang Kompreherensif', 4, 'Semester 8', 'isnull');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `prodi_id` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `ketua` varchar(70) NOT NULL,
  `no_izin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`prodi_id`, `nama_prodi`, `ketua`, `no_izin`) VALUES
(1, 'TEKNIK MESIN', 'Muhamad Rafli', 'IKL19'),
(2, 'TEKNIK INFORMATIKA', 'Arpiansyah Agi', 'KJD12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `nama_semester` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
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
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name`, `username`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'agi ganteng', 'agiw', 'default.jpg', '$2y$10$AVicAR7LoOX.NHhFzv2DEeahRPFOPny2xiJcs4K7QxV/PKdSja5x6', 2, 1, 1574922270),
(9, 'agi arpinsyah', 'gigi', 'default.jpg', '$2y$10$w/MyvxaqGcAG/m78QsqhNuhZf.2f2OrnGD1qWFOTHStJT1Gzcf8MK', 1, 1, 1575014884),
(10, 'bapak budi', 'dosen', 'default.jpg', '$2y$10$HP8eOfLtNaorltwYQXWrcewYqb08Vbk9BJHJTC8b/09E1QjK0WbSW', 3, 1, 1575030615),
(11, 'bapak adi', 'pegawai', 'default.jpg', '$2y$10$KcO5C3qEyQTq5SHkqHO2w.8uYuoOCyfIwDgvfH2Vp1rDCKFKle.j.', 4, 1, 1575030638),
(12, 'Muhamad Yusuf', 'yusuf', 'default.jpg', '$2y$10$lqR05ToxLSvQzPs/PuSmkOyR4tVfPqXfKWCYNGvAxRIBTR/1ELH92', 2, 1, 1576035601),
(13, 'admin', 'admin', 'default.jpg', '$2y$10$yY4/SbUUDE.VQJTrum3fC.5O33lEHBD5MZEUzS2HAzvTrvXqEGhKm', 4, 1, 1576035609),
(14, 'Muhamad Bahar', 'bahar', 'default.jpg', '$2y$10$oRFvIevAKUanjr0YiL7iGOCF2wu7iIc3CkgRV1qw2hRGwcUtY.YUW', 3, 1, 1576035622);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user'),
(3, 'dosen'),
(4, 'pegawai');

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
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 3, 4),
(12, 4, 5),
(13, 1, 6),
(14, 2, 6),
(15, 4, 2),
(17, 4, 4),
(18, 4, 6),
(19, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
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
-- Table structure for table `user_sub_menu`
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
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(16, 1, 'role', 'admin/role', 'fas fa-fw fa-user', 1),
(18, 5, 'Jadwal', 'pegawai/jadwal', 'fas fa-fw fa-user-tie', 1),
(19, 6, 'KRS', 'mahasiswa/krs', 'fas fa-fw fa-user-tie', 1),
(23, 5, 'Matakuliah', 'pegawai/matkul', 'fas fa-fw fa-user-tie', 1),
(24, 5, 'Prodi', 'pegawai/prodi', 'fas fa-fw fa-user-tie', 1),
(25, 6, 'Mahasiswa', 'mahasiswa', 'fas fa-fw fa-user-tie', 1),
(26, 4, 'Dosen', 'dosen', 'fas fa-fw fa-user-tie', 1),
(27, 2, 'user ', 'user/user_aku', 'fas fa-fw fa-user-tie', 1),
(28, 4, 'Absensi', 'dosen/absensi_mahasiswa', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eimport`
--
ALTER TABLE `eimport`
  ADD PRIMARY KEY (`idimport`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`kd_dosen`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`krs_id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_matakuliahh`
--
ALTER TABLE `tbl_matakuliahh`
  ADD UNIQUE KEY `makul_id` (`makul_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `krs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
