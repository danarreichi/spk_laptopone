-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 04:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_laptopone`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(255) DEFAULT NULL,
  `PASSWORD_USER` varchar(15) NOT NULL,
  `TIPE_USER` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_USER`, `NAMA_USER`, `PASSWORD_USER`, `TIPE_USER`) VALUES
(5, 'admin', 'admin', 'adm'),
(6, 'Danar', 'danar', 'adm'),
(8, 'user', 'user', 'usr'),
(9, 'daffa', 'daffa', 'usr');

-- --------------------------------------------------------

--
-- Table structure for table `master_kriteria`
--

CREATE TABLE `master_kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `NAMA_KRITERIA` varchar(255) DEFAULT NULL,
  `TIPE_KRITERIA` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_kriteria`
--

INSERT INTO `master_kriteria` (`ID_KRITERIA`, `NAMA_KRITERIA`, `TIPE_KRITERIA`) VALUES
(1, 'HARGA', 'cos'),
(2, 'UKURAN LAYAR', 'cos'),
(3, 'JENIS PROSESOR', 'ben'),
(4, 'KAPASITAS MEMORI', 'ben'),
(5, 'TIPE MEMORI', 'ben'),
(6, 'KAPASITAS HARD DISK', 'ben'),
(7, 'AKSESORIS', 'ben');

-- --------------------------------------------------------

--
-- Table structure for table `master_laptop`
--

CREATE TABLE `master_laptop` (
  `ID_LAPTOP` int(11) NOT NULL,
  `ID_MERK` int(11) DEFAULT NULL,
  `NAMA_LAPTOP` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_laptop`
--

INSERT INTO `master_laptop` (`ID_LAPTOP`, `ID_MERK`, `NAMA_LAPTOP`) VALUES
(1, 1, 'ASUS ROG ZEPHYRUS GX551QS - R938E6T-O | R9-5900HX | 300HZ | RTX3090'),
(2, 1, 'ASUS TP470EZ - EC552TS | I5-1135G7 | SSD 512GB | TRANSPERANT SILVER'),
(3, 3, 'LENOVO IDEAPAD SLIM 3 14ALC6 - DAID | R3-5300U | SSD 512GB | ARTIC GREY'),
(4, 5, 'HP OMEN 15 - EN1029AX | R7-5800H | SSD 1TB | RTX3060 6GB | 144HZ'),
(5, 3, 'LENOVO IDEAPAD FLEX 5 14ARE05 - EKID | R5-4500U | GRAPHITE GREY'),
(6, 5, 'HP PAVILION GAMING 15 - DK1141TX | I7-10750H | GTX1660TI 6GB | 144HZ'),
(7, 7, 'MSI GL76 11UDK - 254ID PULSE | I7-11800H | RTX3050TI 4GB | 1TB NVME | 144HZ'),
(8, 7, 'MSI BRAVO 15 B5DD - 046ID | R7-5800H | RX5500M 4GB | 144HZ'),
(9, 7, 'MSI GF65 10UE - 263ID | I7-10750H | RTX3060 | 512GB SSD | 144HZ'),
(10, 1, 'ASUS ROG STRIX G733QR - R937D6T-O | R9-5900HX | RTX3070 | BLACK'),
(11, 1, 'ASUS TUF FX506HE - I7R5B6G-O | I7-11800H | RTX3050Ti 4GB | Gray | 144Hz');

-- --------------------------------------------------------

--
-- Table structure for table `memiliki`
--

CREATE TABLE `memiliki` (
  `ID_LAPTOP` int(11) DEFAULT NULL,
  `ID_KRITERIA` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `VALUE` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memiliki`
--

INSERT INTO `memiliki` (`ID_LAPTOP`, `ID_KRITERIA`, `KETERANGAN`, `VALUE`) VALUES
(1, 1, 'Rp 69,999,000', '6'),
(1, 2, '15.6-inch', '4'),
(1, 3, 'AMD Ryzen™ 9 5900HX Processor 3.1 GHz (16M Cache, up to 4.5 GHz)', '8606'),
(1, 4, '64GB', '4'),
(1, 5, 'DDR4 3200Mhz', '3'),
(1, 6, '1TB X 2 M.2 NVMe™ PCIe® 3.0 SSD', '4'),
(1, 7, 'BACKPACK + MOUSE', '2'),
(2, 1, 'Rp 13,999,000', '2'),
(2, 2, '14-inch', '3'),
(2, 3, 'Intel® Core™ i5-1135G7 Processor 2.4 GHz (8M Cache, up to 4.2 GHz, 4 cores)', '4909'),
(2, 4, '8GB', '3'),
(2, 5, 'LPDDR4X', '4'),
(2, 6, '8GB', '3'),
(2, 7, 'ASUS Sleeve, Stylus', '2'),
(3, 1, 'Rp. 7.999.000', '1'),
(3, 2, '14-inch', '3'),
(3, 3, 'AMD Ryzen 3 5300U', '3269'),
(3, 4, '8GB', '3'),
(3, 5, '4GB DDR4 x2 3200Mhz ', '3'),
(3, 6, '8GB', '3'),
(3, 7, 'Tas Lenovo', '2'),
(4, 1, 'Rp 21,999,000', '2'),
(4, 2, '15.6', '4'),
(4, 3, 'AMD Ryzen™ 7 5800H (3.2GHz; 16MB Cache; up to 4.4GHz; 8 Cores; 16 Threads)', '8240'),
(4, 4, '16GB (2x8GB)', '4'),
(4, 5, '3200Mhz DDR4', '3'),
(4, 6, '16GB (2x8GB)', '4'),
(4, 7, 'Backpack', '2'),
(5, 1, 'Rp 9,999,000', '1'),
(5, 2, '14\" FHD (1920x1080) WVA 250nits Glossy / 10-point Multi-touch', '3'),
(5, 3, 'AMD Ryzen™ 5 4500U Processor (6C / 6T, 2.3 / 4.0GHz, 3MB L2 / 8MB L3)', '4847'),
(5, 4, '8GB', '3'),
(5, 5, 'DDR4 2666MHz', '2'),
(5, 6, '8GB', '3'),
(5, 7, 'TAS LENOVO', '2'),
(6, 1, 'Rp. 14.999.000', '2'),
(6, 2, '15.6-inch', '4'),
(6, 3, 'Intel® Core™ i7-10750H', '5612'),
(6, 4, '8GB', '3'),
(6, 5, 'DDR4 2666MHz', '2'),
(6, 6, '8GB', '3'),
(6, 7, 'Backpack', '2'),
(7, 1, 'Rp 21,999,000', '2'),
(7, 2, '17.3\" FHD (1920*1080), 144Hz 72%NTSC IPS-Level, close to 100% sRGB', '6'),
(7, 3, 'Intel® Core™ i7-11800H Processor (24M Cache, up to 4.60 GHz)', '7471'),
(7, 4, '16GB (8GBx2)', '4'),
(7, 5, 'DDR4 3200MHz', '3'),
(7, 6, '16GB (8GBx2)', '4'),
(7, 7, 'Air Gaming Backpack', '2'),
(8, 1, 'Rp. 14.499.000', '2'),
(8, 2, '15.6-inch', '4'),
(8, 3, 'AMD Ryzen™ 7 5800H', '6907'),
(8, 4, '8GB', '3'),
(8, 5, 'DDR4 3200MHz', '3'),
(8, 6, '8GB', '3'),
(8, 7, 'MSI Essential Backpack', '2'),
(9, 1, 'Rp 18,999,000', '2'),
(9, 2, '15.6\" FHD (1920*1080), 144Hz 45% IPS', '4'),
(9, 3, 'Intel® Core™ i5-10200H Processor (8M Cache, up to 4.10 GHz)', '5612'),
(9, 4, '16GB', '4'),
(9, 5, 'DDR4 2933MHz', '3'),
(9, 6, '16GB', '3'),
(9, 7, 'Air Gaming Backpack', '2'),
(10, 1, 'Rp. 40.999.000', '4'),
(10, 2, '17.3-inch', '6'),
(10, 3, 'AMD Ryzen™ 9 5900HX', '8369'),
(10, 4, '2X 16GB DDR4', '4'),
(10, 5, 'DDR4 2666MHz', '3'),
(10, 6, '2X 16GB DDR4', '4'),
(10, 7, 'BACKPACK + MOUSE', '2'),
(11, 1, 'Rp 18,999,000', '2'),
(11, 2, '15.6', '4'),
(11, 3, 'Intel Core i7-11800H Processor 2.3 GHz (24M Cache, up to 4.6 GHz, 8 Cores)', '7718'),
(11, 4, '8GB', '3'),
(11, 5, 'DDR4-3200 SO-DIMM', '3'),
(11, 6, '8GB', '3'),
(11, 7, 'TUF GAMING BACKPACK', '2');

-- --------------------------------------------------------

--
-- Table structure for table `merk_laptop`
--

CREATE TABLE `merk_laptop` (
  `ID_MERK` int(11) NOT NULL,
  `MERK` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk_laptop`
--

INSERT INTO `merk_laptop` (`ID_MERK`, `MERK`) VALUES
(1, 'ASUS'),
(2, 'ACER'),
(3, 'Lenovo'),
(4, 'Apple'),
(5, 'Hewlett Packard'),
(6, 'DELL'),
(7, 'MSI'),
(8, 'Razer'),
(9, 'SAMSUNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `master_kriteria`
--
ALTER TABLE `master_kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- Indexes for table `master_laptop`
--
ALTER TABLE `master_laptop`
  ADD PRIMARY KEY (`ID_LAPTOP`),
  ADD KEY `FK_MASTER_L_MEMBUAT_MERK_LAP` (`ID_MERK`);

--
-- Indexes for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD KEY `FK_MEMILIKI_RELATIONS_MASTER_L` (`ID_LAPTOP`),
  ADD KEY `FK_MEMILIKI_RELATIONS_MASTER_K` (`ID_KRITERIA`);

--
-- Indexes for table `merk_laptop`
--
ALTER TABLE `merk_laptop`
  ADD PRIMARY KEY (`ID_MERK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_laptop`
--
ALTER TABLE `master_laptop`
  ADD CONSTRAINT `FK_MASTER_L_MEMBUAT_MERK_LAP` FOREIGN KEY (`ID_MERK`) REFERENCES `merk_laptop` (`ID_MERK`);

--
-- Constraints for table `memiliki`
--
ALTER TABLE `memiliki`
  ADD CONSTRAINT `FK_MEMILIKI_RELATIONS_MASTER_K` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `master_kriteria` (`ID_KRITERIA`),
  ADD CONSTRAINT `FK_MEMILIKI_RELATIONS_MASTER_L` FOREIGN KEY (`ID_LAPTOP`) REFERENCES `master_laptop` (`ID_LAPTOP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
