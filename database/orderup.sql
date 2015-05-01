-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2015 at 07:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orderup`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(5) NOT NULL,
  `password` varchar(8) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `role` set('Koki','Pelayan','','') NOT NULL,
  `foto` varchar(32) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `id_meja` varchar(5) NOT NULL,
  `kode_masuk` int(6) NOT NULL,
  `deskripsi` varchar(32) NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` varchar(4) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` set('Makanan','Minuman') NOT NULL,
  `gambar` varchar(32) NOT NULL,
  `isRekomendasi` tinyint(1) NOT NULL,
  `endDateRekomendasi` date NOT NULL,
  `isPromosi` tinyint(1) NOT NULL,
  `endDatePromosi` date NOT NULL,
  `diskon` int(2) NOT NULL,
  `durasi_penyelesaian` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE IF NOT EXISTS `pelayanan` (
  `id_pemesanan` varchar(5) NOT NULL,
  `id_karyawan` varchar(5) NOT NULL,
  `durasi_masak` int(2) NOT NULL,
  `durasi_pengantaran` int(2) NOT NULL,
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_karyawan` (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemanggilan`
--

CREATE TABLE IF NOT EXISTS `pemanggilan` (
  `id_meja_pemanggilan` varchar(5) NOT NULL,
  `id_pemanggilan` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `pesan` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pemanggilan`),
  KEY `id_meja_pemanggilan` (`id_meja_pemanggilan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(5) NOT NULL,
  `id_meja` varchar(5) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL,
  `status` set('Queued','On Process','Done','') NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_meja` (`id_meja`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_makanan`
--

CREATE TABLE IF NOT EXISTS `review_makanan` (
  `id_review` varchar(5) NOT NULL,
  `id_meja` varchar(5) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` set('1','2','3','4','5') NOT NULL,
  `nama` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_meja` (`id_meja`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_restoran`
--

CREATE TABLE IF NOT EXISTS `review_restoran` (
  `id_review` varchar(5) NOT NULL,
  `id_meja` varchar(5) NOT NULL,
  `tanggal` text NOT NULL,
  `nama` varchar(15) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_meja` (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `pelayanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemanggilan`
--
ALTER TABLE `pemanggilan`
  ADD CONSTRAINT `pemanggilan_ibfk_1` FOREIGN KEY (`id_meja_pemanggilan`) REFERENCES `meja` (`id_meja`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`);

--
-- Constraints for table `review_makanan`
--
ALTER TABLE `review_makanan`
  ADD CONSTRAINT `review_makanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `review_makanan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`);

--
-- Constraints for table `review_restoran`
--
ALTER TABLE `review_restoran`
  ADD CONSTRAINT `review_restoran_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
