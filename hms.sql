-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 12:48 PM
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
(12, 'admin', 'admin', '$2y$10$i0pr2drnGtOyD9gTskzGweJ9tc/P6tQxTS3tHiCEXvt/uMPkurdx6');

-- --------------------------------------------------------

--
-- Table structure for table `pasients`
--

CREATE TABLE `pasients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `indication` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasients`
--

INSERT INTO `pasients` (`id`, `name`, `phone`, `address`, `indication`) VALUES
(1, 'Radit', '081234324326', 'Bulak Roma', 'Sakit Berat'),
(3, 'Satya', '081234453234', 'Bulak Lor Jatibarang', 'Sakit Ringan'),
(4, 'Teguh', '089123489355', 'Jl. Babadan Kecamata Sliyeg', 'Sakit Ringan'),
(5, 'Nara', '085123489238', 'Jl. Gandara Blok Senda Sleman', 'Sakit Ringan'),
(6, 'Ibra', '081234987623', 'Jl. Sukamta Blok Sana Kecamatan Tambi Lor', 'Sakit Berat'),
(7, 'Agung', '081456923039', 'Jl. Kepadean Blok Tambi Kecamatan Tambi', 'Sakit Ringan'),
(8, 'Rani', '081238473290', 'Jatibarang Baru Blok Bedeng', 'Sakit Berat'),
(9, 'Ganda', '089563890234', 'Gg. Kulit Blok Roma', 'Sakit Ringan'),
(10, 'Aditya', '081237903899', 'Jl. Raya Bulak Gg. Mekar Sari No. 11', 'Sakit Berat'),
(11, 'Nanda', '081284903499', 'Gg. Panser Blok Roma ', 'Sakit Ringan'),
(12, 'Nuril', '087712334988', 'Jatibarang Baru', 'Sakit Ringan'),
(13, 'Nana', '089123845733', 'Blok Sana Gang Jaya', 'Sakit Berat'),
(14, 'Pratama', '081228347238', 'Jl. Kuningan No. 23 Kepadean', 'Sakit Ringan'),
(15, 'Sarah', '085384732899', 'Gg. Pare Jl. Aran Kecamatan Sliyeg', 'Sakit Berat'),
(16, 'Jaya', '081327483990', 'Jl. Kembar Gg. Suci Kecamatan Tambi', 'Sakit Berat'),
(17, 'Rina', '081237489399', 'Gg. Serma Kecamatan Jatibarang', 'Sakit Berat'),
(40, 'Dwi', '081232876477', 'Jl. Kaliurang No. 12 Kepadatan', 'Sakit Ringan'),
(41, 'Galih', '087234889192', 'Jl. Raya Jatibarang Blok Gudang', 'Sakit Berat'),
(43, 'Hani', '081273889201', 'Gg. Subur Blok Sana No. 23', 'Sakit Ringan'),
(44, 'Abi', '089242188911', 'Jl. Kepata Blok Kedari', 'Sakit Berat'),
(45, 'Ibnu', '089123822932', 'Desan Anjatan Blok Kendali No. 14', 'Sakit Ringan'),
(46, 'Chandra', '081453785902', 'Jl. Raya Sleman Blok Kenari', 'Sakit Berat'),
(47, 'Adit', '085394990123', 'Jl. Kemangi Desa Tambi Lor', 'Sakit Ringan'),
(49, 'Suryo', '081399283923', 'Jl. Panut Gg. Jaya No. 13', 'Sakit Ringan'),
(51, 'Anggara', '08122985933', 'Jl. Jerami Blok Kendali Kecamatan Anjatan', 'Sakit Ringan'),
(52, 'Fajar', '087534899031', 'Gg. Prapat Blok Radar No. 34', 'Sakit Berat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasients`
--
ALTER TABLE `pasients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pasients`
--
ALTER TABLE `pasients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
