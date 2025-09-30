-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2025 at 01:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_ekonomi`
--

CREATE TABLE `bobot_ekonomi` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kurang` double NOT NULL,
  `cukup` double NOT NULL,
  `mampu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bobot_ekonomi`
--

INSERT INTO `bobot_ekonomi` (`id`, `id_prodi`, `kurang`, `cukup`, `mampu`) VALUES
(2, 5, 0.1, 0.6, 1),
(3, 6, 0.5, 0.7, 1),
(4, 7, 0.2, 0.6, 1),
(5, 8, 0.4, 0.7, 1),
(6, 9, 0.2, 0.7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_jurusan`
--

CREATE TABLE `bobot_jurusan` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `ipa` double NOT NULL,
  `ips` double NOT NULL,
  `bahasa` double NOT NULL,
  `multimedia` double NOT NULL,
  `akuntansi` double NOT NULL,
  `pemasaran` double NOT NULL,
  `teknik_sepeda_motor` double NOT NULL,
  `teknik_komputer_dan_jaringan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bobot_jurusan`
--

INSERT INTO `bobot_jurusan` (`id`, `id_prodi`, `ipa`, `ips`, `bahasa`, `multimedia`, `akuntansi`, `pemasaran`, `teknik_sepeda_motor`, `teknik_komputer_dan_jaringan`) VALUES
(2, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 6, 1, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1),
(4, 7, 0.8, 0.1, 0.2, 0.2, 0.1, 0.1, 0.4, 0.8),
(5, 8, 0.7, 0.6, 0.3, 0.9, 0.6, 0.6, 0.4, 0.8),
(6, 9, 1, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_minat`
--

CREATE TABLE `bobot_minat` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kesehatan` double NOT NULL,
  `teknik` double NOT NULL,
  `komputer` double NOT NULL,
  `sosial` double NOT NULL,
  `ekonomi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bobot_minat`
--

INSERT INTO `bobot_minat` (`id`, `id_prodi`, `kesehatan`, `teknik`, `komputer`, `sosial`, `ekonomi`) VALUES
(2, 5, 1, 0, 0, 0, 0),
(3, 6, 1, 0.2, 0.1, 0.1, 0.1),
(4, 7, 0, 1, 0.5, 0, 0),
(5, 8, 0.1, 0.4, 1, 0.1, 0.3),
(6, 9, 0.1, 1, 0.4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `matematika` double NOT NULL,
  `fisika` double NOT NULL,
  `kimia` double NOT NULL,
  `biologi` double NOT NULL,
  `tik` double NOT NULL,
  `bahasa_inggris` double NOT NULL,
  `bahasa_indonesia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`id`, `id_prodi`, `matematika`, `fisika`, `kimia`, `biologi`, `tik`, `bahasa_inggris`, `bahasa_indonesia`) VALUES
(3, 5, 0.1, 0.1, 0.2, 0.4, 0.1, 0.1, 0),
(4, 6, 0.1, 0.1, 0.1, 0.4, 0.1, 0.1, 0.1),
(5, 7, 0.2, 0.3, 0.2, 0.1, 0.1, 0.1, 0),
(6, 8, 0.2, 0.1, 0.1, 0.1, 0.3, 0.1, 0.1),
(7, 9, 0.1, 0.4, 0.2, 0.1, 0.1, 0.1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `jenis` enum('benefit','cost') DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` int(11) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `konsumsi_bbm` decimal(5,2) DEFAULT NULL,
  `fitur_keselamatan` int(11) DEFAULT NULL,
  `berat` decimal(5,2) DEFAULT NULL,
  `tahun_produksi` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`) VALUES
(5, 'Kedokteran'),
(6, 'Perawat'),
(7, 'Teknik Elektro'),
(8, 'Sistem Informasi'),
(9, 'Teknik Pertambangan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `minat` int(11) NOT NULL,
  `ekonomi` int(11) NOT NULL,
  `nilai_matematika` int(11) NOT NULL,
  `nilai_fisika` int(11) NOT NULL DEFAULT 0,
  `nilai_kimia` int(11) NOT NULL DEFAULT 0,
  `nilai_biologi` int(11) NOT NULL DEFAULT 0,
  `nilai_tik` int(11) NOT NULL DEFAULT 0,
  `nilai_bahasa_inggris` int(11) NOT NULL,
  `nilai_bahasa_indonesia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `jurusan`, `minat`, `ekonomi`, `nilai_matematika`, `nilai_fisika`, `nilai_kimia`, `nilai_biologi`, `nilai_tik`, `nilai_bahasa_inggris`, `nilai_bahasa_indonesia`) VALUES
(2, 'Anjuang Dari', 0, 1, 1, 78, 80, 75, 80, 90, 85, 85),
(3, 'Hilman Tristian', 0, 1, 2, 0, 100, 100, 100, 100, 0, 0),
(5, 'Bujang Mantap', 1, 2, 0, 65, 10, 10, 20, 10, 12, 15),
(7, 'Khatami Husaini M.', 0, 0, 0, 0, 80, 80, 80, 80, 0, 0),
(8, 'Norman Syarif', 0, 1, 2, 0, 85, 70, 10, 100, 0, 0),
(9, 'Aisyah', 3, 0, 0, 65, 75, 75, 75, 90, 65, 75),
(10, 'Obet', 0, 1, 1, 76, 75, 60, 79, 88, 70, 90),
(11, 'Habliansyah', 1, 4, 1, 78, 0, 0, 0, 85, 79, 84),
(13, 'Johan', 3, 2, 0, 90, 90, 90, 90, 98, 90, 90),
(14, 'Abigail Sentosa', 7, 4, 2, 78, 78, 89, 77, 87, 88, 77),
(15, 'Lionel', 0, 3, 1, 88, 88, 88, 88, 88, 88, 88),
(16, 'Johan', 3, 2, 1, 88, 77, 87, 78, 93, 90, 85),
(18, 'Johannes Krisnawan Saputro', 0, 2, 1, 88, 80, 75, 81, 93, 90, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_ekonomi`
--
ALTER TABLE `bobot_ekonomi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `bobot_minat`
--
ALTER TABLE `bobot_minat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_ekonomi`
--
ALTER TABLE `bobot_ekonomi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bobot_minat`
--
ALTER TABLE `bobot_minat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_ekonomi`
--
ALTER TABLE `bobot_ekonomi`
  ADD CONSTRAINT `ekonomi_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  ADD CONSTRAINT `jurusan_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_minat`
--
ALTER TABLE `bobot_minat`
  ADD CONSTRAINT `minat_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD CONSTRAINT `nilai_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
