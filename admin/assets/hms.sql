-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(13, 'admin', 'admin', '$2y$10$s/GLLa/2xCZCz5XzkE3ffezm/sy6esEuz4L9RNPxqwlZbYCLokfK.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `name`, `address`, `email`, `phone`, `specialist`, `agenda`, `image`) VALUES
(1, 'drg. Linda Iriana', 'Jl. Suka Rela Blok Margadadi No. 32 Kecamatan Balongan', 'lindairiana@mail.com', '081326874899', 'Gigi', 'Senin - Rabu', 'doctor9.jpg'),
(2, 'dr. Indra Gunawan, Sp. Rad', 'Jl. Kenanga Blok Pari No. 12 Kecamatan Anjatan', 'indragunawan@mail.com', '085739843744', 'Radiologi', 'Jum\'at - Sabtu', 'doctor10.jpg'),
(3, 'drg. Rahmad Setiawan', 'Jl. Kembang Sari Blok Kencana No. 83 Kecamatan Arahan', 'rahmadsetiawan@mail.com', '089675876922', 'Gigi', 'Selasa - Jum\'at', 'doctor11.jpg'),
(4, 'dr. Ina Rodina, Sp. M', 'Jl. Anggar Jaya Blok Kembar No. 24 Kecamatan Babakanjaya', 'inarodina@mail.com', '081645874988', 'Mata', 'Rabu - Sabtu', 'doctor12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `indication` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `address`, `indication`) VALUES
(1, 'Radit', '081234324326', 'Bulak Roma', 'Sakit Berat'),
(4, 'Teguh', '089123489355', 'Jl. Babadan Kecamata Sliyeg', 'Sakit Ringan'),
(5, 'Nara', '085123489238', 'Jl. Gandara Blok Senda Sleman', 'Sakit Ringan'),
(6, 'Ibra', '081234987623', 'Jl. Sukamta Blok Sana Kecamatan Tambi Lor', 'Sakit Berat'),
(7, 'Agung', '081456923039', 'Jl. Kepadean Blok Tambi Kecamatan Tambi', 'Sakit Ringan'),
(8, 'Rani', '081238473290', 'Jatibarang Baru Blok Bedeng', 'Sakit Berat'),
(9, 'Ganda', '089563890234', 'Gg. Kulit Blok Roma', 'Sakit Ringan'),
(10, 'Aditya', '081237903899', 'Jl. Raya Bulak Gg. Mekar Sari No. 11', 'Sakit Berat'),
(11, 'Nanda', '081284903499', 'Gg. Panser Blok Roma ', 'Melahirkan'),
(12, 'Nuril', '087712334988', 'Jatibarang Baru', 'Sakit Ringan'),
(13, 'Nana', '089123845733', 'Blok Sana Gang Jaya', 'Sakit Berat'),
(14, 'Pratama', '081228347238', 'Jl. Kuningan No. 23 Kepadean', 'Sakit Ringan'),
(15, 'Sarah', '085384732899', 'Gg. Pare Jl. Aran Kecamatan Sliyeg', 'Sakit Berat'),
(16, 'Jaya', '081327483990', 'Jl. Kembar Gg. Suci Kecamatan Tambi', 'Kepala Bocor'),
(17, 'Rina', '081237489399', 'Gg. Serma Kecamatan Jatibarang', 'Sakit Berat'),
(40, 'Dwi', '081232876477', 'Jl. Kaliurang No. 12 Kepadatan', 'Sakit Ringan'),
(41, 'Galih', '087234889192', 'Jl. Raya Jatibarang Blok Gudang', 'Sakit Berat'),
(43, 'Hani', '081273889201', 'Gg. Subur Blok Sana No. 23', 'Patah Tulang'),
(44, 'Abi', '089242188911', 'Jl. Kepata Blok Kedari', 'Sakit Berat'),
(45, 'Ibnu', '089123822932', 'Desan Anjatan Blok Kendali No. 14', 'Sakit Ringan'),
(46, 'Chandra', '081453785902', 'Jl. Raya Sleman Blok Kenari', 'Sakit Berat'),
(47, 'Adit', '085394990123', 'Jl. Kemangi Desa Tambi Lor', 'Sakit Ringan'),
(49, 'Suryo', '081399283923', 'Jl. Panut Gg. Jaya No. 13', 'Sakit Kepala'),
(51, 'Anggara', '08122985933', 'Jl. Jerami Blok Kendali Kecamatan Anjatan', 'Sakit Perut'),
(52, 'Fajar', '087534899031', 'Gg. Prapat Blok Radar No. 34', 'Sakit Berat'),
(53, 'Dara', '0877123873877', 'Jl. Merpati Blok Rencana No. 24', 'Sakit Ringan'),
(61, 'Ara', '081293488298', 'Jl. Manggis Kecamatan Lohbener', 'Sakit Leher'),
(62, 'Randi', '081238746099', 'Jl. Rambat Blok Rengas No. 32', 'Sakit Ringan'),
(67, 'Kurniawan', '081875635682', 'Jl. Raya Babadan Blok Menara Desa Kesupan', 'Sakit Perut'),
(68, 'Sudirman', '081834984833', 'Jl. Singajaya Blok Bala No. 32', 'Sakit Ringan'),
(69, 'Rara', '081324764873', 'Jl. Muntur Blok Barat Desa Wanasari', 'Sakit Jantung'),
(70, 'Renggana', '081983745822', 'Desa Ronggo Jl. Cemara Blok Gudang No. 12', 'Sakit Mata'),
(71, 'Hara', '081456834923', 'Desa Krimun Kelurahan Babasan No. 34', 'Sakit Gigi'),
(72, 'Gunawan', '089823748988', 'Desa Cakingan Kecamatan Kedokan Bunder', 'Sakit Pinggang'),
(73, 'Raden', '0819388743822', 'Desa Terusa Jl. Anggar Jati Kecamatan Indramayu', 'Sakit Ringan'),
(74, 'Pipit', '085623987288', 'Jl. Megardadi Desa Sukareja No. 23', 'Sakit Kepala'),
(75, 'Bagus', '081456909389', 'Desa Teluk Agung Kelurahan Daratan', 'Sakit Ringan'),
(79, 'Ratna', '081647908652', 'Jl. Margadadi Blok Ampera Desa Wira', 'Sakit Biasa'),
(124, 'Andri', '089875839487', 'Jl. Kendokan Blok Rengan No. 31', 'Sakit Paru-paru'),
(128, 'Ali', '081345983988', 'Jl. Rata Blok Rampas No. 32', 'Sakit Perut'),
(163, 'Dhea', '089765732644', 'Desa Ketata Kelurahan Taman Burjo Kecamatan Bangodua', 'Sakit Leher'),
(171, 'Hani', '081743738923', 'Jl. Bunderan Blok Dusun No. 42', 'Melahirkan'),
(173, 'Setiawan', '081834738899', 'Jl. Panser Blok Sana Kecamatan Jatibarang', 'Memar'),
(177, 'Dera', '081343874983', 'Desa Cilandak Kecamatan Anjatan', 'Sakit Perut'),
(179, 'Ruben', '081327837873', 'Jl. Kopyah Blok Wanguk Kecamatan Anjatan', 'Sakit Kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
