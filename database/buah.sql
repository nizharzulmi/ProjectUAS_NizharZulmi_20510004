-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 09:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buah`
--

-- --------------------------------------------------------

--
-- Table structure for table `buah`
--

CREATE TABLE `buah` (
  `kode_buah` int(11) NOT NULL,
  `jenis_buah` varchar(20) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `potongan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buah`
--

INSERT INTO `buah` (`kode_buah`, `jenis_buah`, `harga_jual`, `potongan`) VALUES
(1, 'Paramecia', 4500000, 5),
(2, 'Logia', 1700000, 10),
(4, 'Zoan', 2300000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nakama`
--

CREATE TABLE `nakama` (
  `id_nakama` int(11) NOT NULL,
  `nakama` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nakama`
--

INSERT INTO `nakama` (`id_nakama`, `nakama`, `alamat`) VALUES
(2, 'Kuma', 'Mariejoa'),
(6, 'Denjiro', 'Onigashima'),
(10, 'Shirahosi', 'Impel Down'),
(11, 'Kozuki Oden', 'Laugh Tale'),
(12, 'Zorro', 'Kota Okobore');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_nakama` int(11) NOT NULL,
  `kode_buah` int(11) NOT NULL,
  `berat` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_nakama`, `kode_buah`, `berat`, `tanggal_transaksi`) VALUES
(10, 6, 1, 17, '2021-12-30'),
(11, 10, 2, 25, '2021-12-28'),
(12, 11, 2, 13, '2021-12-27'),
(13, 11, 1, 2, '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(40) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `Last_Activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `FName`, `LName`, `Last_Activity`) VALUES
('asuradoji@gmail.com', 'asuradoji', 'asura', 'doji', '2022-01-03 05:08:44'),
('kozukioden@gmail.com', 'kozukioden', 'kozuki', 'oden', '2022-01-03 05:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buah`
--
ALTER TABLE `buah`
  ADD PRIMARY KEY (`kode_buah`);

--
-- Indexes for table `nakama`
--
ALTER TABLE `nakama`
  ADD PRIMARY KEY (`id_nakama`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_petani` (`id_nakama`),
  ADD KEY `kode_sawit` (`kode_buah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buah`
--
ALTER TABLE `buah`
  MODIFY `kode_buah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nakama`
--
ALTER TABLE `nakama`
  MODIFY `id_nakama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_nakama`) REFERENCES `nakama` (`id_nakama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_buah`) REFERENCES `buah` (`kode_buah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
