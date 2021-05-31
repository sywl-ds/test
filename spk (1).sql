-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 02:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `nama` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `lmusaha` int(10) NOT NULL,
  `df` int(10) NOT NULL,
  `hrg` int(10) NOT NULL,
  `inv` int(10) NOT NULL,
  `opr` int(10) NOT NULL,
  `pen` int(11) NOT NULL,
  `suhu` int(2) NOT NULL,
  `kecerahan` int(2) NOT NULL,
  `do` int(2) NOT NULL,
  `ph` int(2) NOT NULL,
  `npv` float(25,9) NOT NULL DEFAULT 0.000000000,
  `roi` float(15,9) NOT NULL DEFAULT 0.000000000,
  `bcr` float(15,9) NOT NULL DEFAULT 0.000000000,
  `pbp` float(15,9) NOT NULL DEFAULT 0.000000000,
  `bep` float(15,9) NOT NULL DEFAULT 0.000000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`nama`, `id`, `lmusaha`, `df`, `hrg`, `inv`, `opr`, `pen`, `suhu`, `kecerahan`, `do`, `ph`, `npv`, `roi`, `bcr`, `pbp`, `bep`) VALUES
('ikan 1', 23, 1, 12, 30000, 18950500, 52775000, 105000000, 1, 1, 1, 1, 77972576.000000000, 3.114539385, 1.989578366, 1.000000000, 1759.166625977),
('ikan 2', 24, 1, 12, 23000, 18657000, 50657000, 90570000, 1, 1, 1, 1, 35123440.000000000, 0.882587790, 1.787906885, 0.230714813, 2202.478271484),
('ikan 3', 25, 1, 12, 30000, 18950500, 52775000, 105000000, 1, 1, 1, 1, 77972576.000000000, 3.114539385, 1.989578366, 0.202138662, 1759.166625977),
('ikan 4', 26, 1, 12, 30000, 18950500, 52775000, 105000000, 1, 1, 1, 1, 45958000.000000000, 1.425160289, 1.989578366, 0.202138662, 1759.166625977);

-- --------------------------------------------------------

--
-- Table structure for table `matriks`
--

CREATE TABLE `matriks` (
  `id` int(11) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `nama_ikan` char(50) DEFAULT NULL,
  `kualifikasi` varchar(50) DEFAULT NULL,
  `value` float(25,8) DEFAULT NULL,
  `cb` varchar(50) DEFAULT NULL,
  `kriteria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL,
  `criteria` char(50) DEFAULT NULL,
  `value` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ikan`
-- (See below for the actual view)
--
CREATE TABLE `v_ikan` (
`nama` varchar(20)
,`npv` float(25,9)
,`npvp` double
,`roip` double
,`bcrp` double
,`pbpp` double
,`BEPP` double
,`suhup` double
,`kecerahanp` double
,`dop` double
,`ph` double
);

-- --------------------------------------------------------

--
-- Structure for view `v_ikan`
--
DROP TABLE IF EXISTS `v_ikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ikan`  AS  select `ikan`.`nama` AS `nama`,`ikan`.`npv` AS `npv`,pow(`ikan`.`npv`,2) AS `npvp`,pow(`ikan`.`roi`,2) AS `roip`,pow(`ikan`.`bcr`,2) AS `bcrp`,pow(`ikan`.`pbp`,2) AS `pbpp`,pow(`ikan`.`bep`,2) AS `BEPP`,pow(`ikan`.`suhu`,2) AS `suhup`,pow(`ikan`.`kecerahan`,2) AS `kecerahanp`,pow(`ikan`.`do`,2) AS `dop`,pow(`ikan`.`ph`,2) AS `ph` from `ikan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriks`
--
ALTER TABLE `matriks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `matriks`
--
ALTER TABLE `matriks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
