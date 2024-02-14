-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 11:13 PM
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
-- Database: `gymme`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `NIK` bigint(17) NOT NULL,
  `paket` varchar(8) NOT NULL,
  `tgl_msk` date NOT NULL,
  `tgl_klr` date NOT NULL,
  `biaya` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `gender`, `NIK`, `paket`, `tgl_msk`, `tgl_klr`, `biaya`) VALUES
(1008, 'nadiv', 'laki-laki', 3213131, '3', '2024-02-09', '2024-08-09', '600000'),
(1010, 'lol', 'perempuan', 3213131, '3', '2024-01-23', '2024-04-23', '300000'),
(1013, 'ddsa', 'kotak', 32, '4', '2024-02-08', '2025-02-09', '1000000'),
(1015, 'sadd', 'laki-laki', 9328231, '3', '2024-02-08', '2024-08-09', '600000'),
(1016, 'zayan', 'tank', 2352634242, '12', '2024-01-25', '2025-01-25', '1000000'),
(1017, 'hapis', 'serbet', 420690171945, '12', '2024-01-25', '2025-01-25', '1000000'),
(1018, 'eqeq', 'perempuan', 31321, '1', '2024-02-05', '2024-03-05', '100000'),
(1019, 'kilo', 'laki-laki', 9328231, '3', '2024-02-08', '2024-05-08', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `id_kar` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `wkt_msk` datetime NOT NULL,
  `wkt_klr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `id_kar`, `foto`, `nama`, `password`, `email`, `tgl_lahir`, `wkt_msk`, `wkt_klr`) VALUES
(4, 1001, '65c4e69769f9d.png', 'Uray Aquila Ubadah', '$2y$10$WU2hDPEw9oUku3rVKolar.K0deKn5i2RJ0xSPGQBZAA77iN8imq6.', 'mboh@gmail.com', '2000-06-11', '2024-01-25 19:42:47', '2024-01-25 19:43:31'),
(5, 1002, '659e90f34b064.png', 'Zidane Al Gifari Rahman', '$2y$10$jRVlTvUPf9.tf25kR.c5IePFJ9I14DPQFr2fnTqeRfq1HyC4wBxES', 'malas@gmail.com', '2000-06-11', '2024-01-13 17:58:36', '2024-01-13 18:15:23'),
(7, 1004, '659e91718f9a6.png', 'Naufal Raissatama', '$2y$10$SIKxYz01KdMYbIYqDZOQ4OzaPD0y4yXlA9wZONxsbIlgDstj8YJsm', 'turu@gmail.com', '2000-06-11', '2024-01-12 08:56:39', '2024-01-13 18:15:23'),
(8, 1005, '659e91e0bb1e6.png', 'Akshan Naufal Siswanto', '$2y$10$IT74ddVYDrDTzO79SX0SUOyQsV4hVR7VhonHsk98AwnLb2oO9BG36', 'bola@gmail.com', '2002-07-11', '2024-01-12 08:57:09', '2024-01-13 18:15:23'),
(9, 1006, '659e921f4758f.png', 'Fadhli Dzil Ikram', '$2y$10$RmNMu71QtiKizX.sB38rkebarWRoRAYxsJtv/.WIS942c8yfp8wDq', 'psikologi@gmail.com', '1990-07-11', '2024-01-13 18:11:45', '2024-01-13 18:15:23'),
(10, 1, '65a2deaff1951.png', 'admin', '$2y$10$thLdlKjsi4WdDon/hMJKbeuCua9mYwe5nlobL8CkUqXyDrk5T7Kdm', 'osodso@gmail.com', '0000-00-00', '2024-02-11 19:25:46', '2024-02-11 19:25:43'),
(35, 1000, '65c4e6a3b50e3.jpg', 'Aimar Nadiv Ramazahran', '$2y$10$Mev7TVYUXN4b6PCFTtFB6OCNuewkHpIj25meOxJOwBrrg5V2NReNW', 'aimarnadiv55@gmail.com', '1999-10-11', '2024-02-09 20:11:28', '2024-02-09 20:11:57'),
(39, 1003, '65a9fe5f4a896.png', 'tsabat', '$2y$10$Z1AHf87qPRa3ekFdYtBbn.KoZX/KfUYjE17wSTNV1dJbistP4LGci', 'dasdasd@sdaasdsad', '2001-10-11', '2024-02-08 21:40:03', '2024-02-08 21:40:07'),
(42, 1234, '65c801712bccb.jpg', 'kmcsklamca', '$2y$10$mnxmzLneFxv/vfzu6n5.SuaSSQummNn6ST5Sxaqcpt46D0V8lA83y', 'kejumanis100@gmail.com', '2004-10-11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `paket` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya` varchar(20) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_m`, `paket`, `tgl_bayar`, `biaya`, `ket`) VALUES
(47, 1008, 1, '2024-01-23', '100000', 'lunas'),
(48, 1010, 3, '2024-01-23', '300000', 'lunas'),
(49, 1013, 6, '2024-01-23', '600000', 'lunas'),
(50, 1015, 12, '2024-01-23', '1000000', 'lunas'),
(51, 1008, 3, '2024-01-23', '300000', 'lunas'),
(52, 1016, 12, '2024-01-25', '1000000', 'lunas'),
(53, 1017, 12, '2024-01-25', '1000000', 'lunas'),
(54, 1008, 12, '2024-02-05', '1000000', 'lunas'),
(55, 1018, 1, '2024-02-08', '100000', 'lunas'),
(56, 1019, 3, '2024-02-08', '300000', 'lunas'),
(57, 1008, 1, '2024-02-08', '100000', 'lunas'),
(60, 1008, 2, '2024-02-09', '300000', 'lunas'),
(61, 1013, 4, '2024-02-09', '1000000', 'lunas'),
(62, 1015, 3, '2024-02-09', '600000', 'lunas'),
(63, 1008, 4, '2024-02-09', '1000000', 'lunas'),
(64, 1008, 3, '2024-02-09', '600000', 'lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_m`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_member` FOREIGN KEY (`id_m`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
