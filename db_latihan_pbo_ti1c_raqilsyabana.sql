-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2026 at 06:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_raqilsyabana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Batman', '2026-06-16 13:00:00', 50, '40000.00', 'Regular', 'Dolby Digital', 'A-M', NULL, NULL, NULL, NULL),
(2, 'Spiderman', '2026-06-16 15:30:00', 45, '40000.00', 'Regular', 'Dolby Digital', 'B-N', NULL, NULL, NULL, NULL),
(3, 'Inception', '2026-06-16 18:00:00', 60, '45000.00', 'Regular', 'Standard Stereo', 'A-L', NULL, NULL, NULL, NULL),
(4, 'Interstellar', '2026-06-16 21:00:00', 55, '45000.00', 'Regular', 'Dolby Digital', 'C-O', NULL, NULL, NULL, NULL),
(5, 'The Matrix', '2026-06-17 12:00:00', 40, '40000.00', 'Regular', 'Standard Stereo', 'A-K', NULL, NULL, NULL, NULL),
(6, 'Avatar', '2026-06-17 14:45:00', 50, '40000.00', 'Regular', 'Dolby Digital', 'D-P', NULL, NULL, NULL, NULL),
(7, 'Gladiator', '2026-06-17 19:30:00', 42, '45000.00', 'Regular', 'Dolby Digital', 'B-M', NULL, NULL, NULL, NULL),
(8, 'Dune: Part Two', '2026-06-16 14:00:00', 30, '75000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-A', 'GLASSES-01', 'Dual Laser 4K', NULL, NULL),
(9, 'Oppenheimer', '2026-06-16 17:30:00', 35, '75000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-B', 'GLASSES-02', '70mm IMAX Fitur', NULL, NULL),
(10, 'Top Gun: Maverick', '2026-06-16 20:45:00', 28, '80000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-C', 'GLASSES-03', 'Laser Real 3D', NULL, NULL),
(11, 'Avengers: Endgame', '2026-06-17 13:00:00', 40, '75000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-A', 'GLASSES-04', 'Dual Laser 4K', NULL, NULL),
(12, 'Tenet', '2026-06-17 16:15:00', 32, '75000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-D', 'GLASSES-05', '70mm IMAX Fitur', NULL, NULL),
(13, 'Gravity', '2026-06-17 19:00:00', 30, '80000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-B', 'GLASSES-06', 'Laser Real 3D', NULL, NULL),
(14, 'Star Wars', '2026-06-17 22:00:00', 35, '75000.00', 'IMAX', 'Dolby Atmos 12.1', 'Row VIP-C', 'GLASSES-07', 'Dual Laser 4K', NULL, NULL),
(15, 'La La Land', '2026-06-16 14:30:00', 12, '150000.00', 'Velvet', NULL, 'Sofa-01', NULL, NULL, 'Premium Pack A', 'Personal Butler Service'),
(16, 'Titanic', '2026-06-16 18:30:00', 10, '150000.00', 'Velvet', NULL, 'Sofa-02', NULL, NULL, 'Premium Pack B', 'Food & Drink Butler Delivery'),
(17, 'The Godfather', '2026-06-16 21:30:00', 14, '160000.00', 'Velvet', NULL, 'Sofa-03', NULL, NULL, 'Premium Pack A', 'Full Service Butler'),
(18, 'Casablanca', '2026-06-17 13:30:00', 12, '150000.00', 'Velvet', NULL, 'Sofa-04', NULL, NULL, 'Premium Pack B', 'Personal Butler Service'),
(19, 'Amelie', '2026-06-17 16:30:00', 10, '150000.00', 'Velvet', NULL, 'Sofa-05', NULL, NULL, 'Premium Pack A', 'Food & Drink Butler Delivery'),
(20, 'Past Lives', '2026-06-17 20:00:00', 14, '160000.00', 'Velvet', NULL, 'Sofa-06', NULL, NULL, 'Premium Pack B', 'Full Service Butler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
