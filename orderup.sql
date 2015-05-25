-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2015 at 04:34 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `id_karyawan` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_photoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `name`, `email`, `password`, `role`, `telepon`, `photoname`, `mime`, `original_photoname`, `alamat`, `tanggal_mulai`, `remember_token`) VALUES
(1, 'Laila Mauhibah', 'laila.mauhibah@gmail.com', '$2y$10$pgj7iTq1UNdp5itu.nLM3.y./9T/5rbun2cMajTOVFhc/TE13ByY2', 'Manajer', '444', 'php2B25.tmp.jpg', 'image/jpeg', 'photo.jpg', 'huhu', '2015-04-21', '2rZ6xaltJJNtfmnDcYgeMMFZiBO9QEMqdI5dLCH35FTX79V6JK8Whuw7rbOe'),
(4, 'aditya', 'budiajah@gmail.com', '$2y$10$HG8GEiwMaHH6Aw/wsEb1VO5z1pHWtr2FpuH7R/lboTdCdOG8vaBmq', 'Koki', '123123', 'php6AA.tmp.jpg', 'image/jpeg', 'andi.jpg', '12313', '2015-04-23', 'HijjN2BGpyxEjUrCqVyhAiCmFr609RjAarGFMfQBFoEFooW3U2knHgPsQdT5'),
(6, '5', 'sYKa4', '$2y$10$HWNl/Du5.mjU9EFa5hrdmOkzU5IfSrEaoKGKa8rP4o.ArxFwgk/1a', 'Meja', '', '', '', '', '', '0000-00-00', 'Da0j0L6DHHiSs0jxwhdfMb8U4VvTMteKoB2rT4pv6uThTmrWSOmMZ4IuO13B'),
(7, '6', 'B0IgX', '$2y$10$P2BIPw032pWGeAUjJkMxEOa.Mla4WDYRUNTA1lja.FsciPmXOds5i', 'Meja', '', '', '', '', '', '0000-00-00', 'I9RKwRDYtEVhbrsKU1slKJy3V6Nw2mWN507ua8rt6wdgOiO8AIz2e5uzalkM'),
(14, '13', 'pAW1k', '$2y$10$1GvyskHU4iru7fpV/pcUGuz6PqfqQ0SBAObtObQxWTXULvCXMbesa', 'Meja', '', '', '', '', '', '0000-00-00', 'RS3PFVKntSx98adviSyNvcmDPRtdmNNfm0dLUtU4yKVbn76jppHtWdKVTJ1b'),
(17, 'Ayu Zenitha', 'ayuzenitha@gmail.com', '$2y$10$1jQs9HXd8fU0NooxF1ba8.VqfkKEn1xodulRbToUsSCHLJ6etPABS', 'Pelayan', '081617658897', 'php4E50.tmp.jpg', 'image/jpeg', 'pelayan1.jpg', 'Jl. Pepaya No 30 Lebak Bulus', '2015-04-01', '2KZ3WgphQK3E5Y3hm6b839w6edNWd6jTYemiCdg5P1QbbJFUsWRiiN6DiGl5'),
(19, 'Aulia Arshad', 'aulia.arshad@ui.ac.id', '$2y$10$fDaO2XqSMlUFYmu6VuVmrOcc7rdoNr5oesYI5X/611F8cFSVS5m2S', 'Koki', '90991888', 'phpF21F.tmp.jpg', 'image/jpeg', 'koki2.jpg', 'Jalan Kenari 4 No.29', '2015-01-01', 'Le1gXC0oB1tnGJkePdeHpiioQ897R2v6dPMoZBlNqM224zVgrG2Neved7tNG'),
(20, '14', 'hOMoG', '$2y$10$q4W789B1pu3b5yLoKOwreu12TbOXxRj1yRe7AwAHIxRU40tIKSmWm', 'Meja', '', '', '', '', '', '0000-00-00', 'DtZWM0jMHQIZQiFBBfpJOKoeNF2KcXYvbEFBt2LDxJhOhHyTNECMHTaLUDFp'),
(21, '15', 'RWtY7', '$2y$10$ltmyQ/3GoM4mkVsDVDR7uei0Mtk1T.zrOP8XyfkGVnYlMtv0c4n6.', 'Meja', '', '', '', '', '', '0000-00-00', 'OaPkNvYhqYdiBJ2r88hBSscowggjKOlN2KFrtGcGj6TMGDLkDkITcO49Gcz6'),
(24, 'Aditya Zulfahmi', 'adityazulfahmii@gmail.com', '$2y$10$pgj7iTq1UNdp5itu.nLM3.y./9T/5rbun2cMajTOVFhc/TE13ByY2', 'Koki', '0856976542383', 'php126E.tmp.jpg', 'image/jpeg', 'koki1.jpg', 'Jl. Cendrawasih no 13', '2014-09-13', NULL),
(27, '16', '7Fko1', '$2y$10$Q7xcnb50P6l7kgT1J50FsexvUVFE0zcjcMz.xg4l0WtjKnGFx9Twu', 'Meja', '', '', '', '', '', '0000-00-00', NULL),
(30, '16', 'W8g23', '$2y$10$2g.RP2O7SXAsKQCgH2OC5OW0rLfx9PmXRQGT2qmI4SycNVDQiEhz6', 'Meja', '', '', '', '', '', '0000-00-00', NULL),
(31, '17', 'wqYhC', '$2y$10$wEF6kee9TLT33H2woCZr6.hjW6dUQwaXgACAkkqmSgesfqmAt95tu', 'Meja', '', '', '', '', '', '0000-00-00', NULL),
(32, '18', 'PMI96', '$2y$10$a8pMwwE73hZ6Nl9qg9b3y.dItVNVaiBZSj3fIkuHv4szHwg7KuHsK', 'Meja', '', '', '', '', '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `id_meja` int(10) unsigned NOT NULL,
  `nomormeja` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `kodemasuk` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `nomormeja`, `kodemasuk`, `deskripsi`) VALUES
(5, '321', 'sYKa4', 'asus'),
(6, '122', 'B0IgX', 'sdfsdd'),
(14, 'MA-09', 'hOMoG', 'Meja yang ada coretannya');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(10) unsigned NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` enum('Menu Pembuka','Menu Utama','Menu Sampingan','Menu Penutup','Menu Minuman') COLLATE utf8_unicode_ci NOT NULL,
  `photoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_photoname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_rekomendasi` tinyint(1) NOT NULL,
  `end_date_rekomendasi` date NOT NULL,
  `is_promosi` tinyint(1) NOT NULL,
  `end_date_promosi` date NOT NULL,
  `diskon` int(11) NOT NULL,
  `durasi_penyelesaian` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name`, `harga`, `kategori`, `photoname`, `mime`, `original_photoname`, `is_rekomendasi`, `end_date_rekomendasi`, `is_promosi`, `end_date_promosi`, `diskon`, `durasi_penyelesaian`, `status`, `deskripsi`) VALUES
(1, 'fahmi', 1000, 'Menu Pembuka', 'php2E62.tmp.jpg', 'image/jpeg', 'andi.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'kmalskdn'),
(2, 'asdasd', 123123, 'Menu Pembuka', 'phpF9F1.tmp.jpg', 'image/jpeg', 'andi.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'asdasdasda'),
(3, 'Babi Asap Euyyy Nikmat', 100000, 'Menu Utama', 'php9351.tmp.jpg', 'image/jpeg', 'Rizda(2).jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'asdasdasda asdasd'),
(25, 'Beef Satay', 45000, 'Menu Pembuka', 'php9517.tmp.jpg', 'image/jpeg', 'sate.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Beef Satay'),
(26, 'Spaghetti', 24000, 'Menu Utama', 'phpF6F0.tmp.jpg', 'image/jpeg', 'spaghetti.jpg', 1, '0000-00-00', 0, '0000-00-00', 0, 0, 0, 'Pasta nikmat dengan bumbu keju luar biasa menggugah selera yummy!'),
(27, 'Beef Hamburger', 30000, 'Menu Utama', 'phpCD6A.tmp.jpg', 'image/jpeg', 'makanan1.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Roti ala paman sam dengan keju double yang sangat nikmat dan Beef Ham yang dikirim langsung dari Australia yang terkenal dengan sapinya.'),
(28, 'Nasi Uduk Betawi', 90000, 'Menu Utama', 'php1D46.tmp.jpg', 'image/jpeg', 'nasi-uduk-betawi.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Nasi Uduk Komplit'),
(29, 'Ice Flavored Tea', 14000, 'Menu Minuman', 'php5739.tmp.jpg', 'image/jpeg', 'minuman1.jpg', 1, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Es teh manis dengan pilihan rasa: peach, apel, stroberi, leci, blackcurrant dan mangga'),
(30, 'Sate Ayam Bakar', 45000, 'Menu Pembuka', 'php70A6.tmp.jpg', 'image/jpeg', 'TKBlog-chicken-satay-9.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Dengan tekstur daging yang lembut selembut sutra, dan bumbu khas Mas Sulam yang menggugah selera.'),
(31, 'Blue Diamond', 20000, 'Menu Minuman', 'phpB05E.tmp.jpg', 'image/jpeg', 'KTM(1).jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Cocktail(minuman beralkohol) campuran vodka yang memiliki aroma yang khas dan pepsi blue yang memperindah.'),
(33, 'Pasta', 76880, 'Menu Pembuka', 'php78E1.tmp.jpg', 'image/jpeg', 'pasta1.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'Pazzzzzta!'),
(35, 'Waffle', 23000, 'Menu Penutup', 'phpBC0F.tmp.jpg', 'image/jpeg', 'makanan2.jpg', 0, '0000-00-00', 1, '2015-04-01', 0, 0, 1, 'Waffle Kak Taufan.'),
(36, 'Menu lala', 123, 'Menu Pembuka', 'php17C0.tmp.jpg', 'image/jpeg', 'makanan1.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'ku lelah butuh pasangan'),
(37, 'Menu lala hihi', 123, 'Menu Pembuka', 'php5712.tmp.jpg', 'image/jpeg', 'minuman1.jpg', 0, '0000-00-00', 0, '0000-00-00', 0, 0, 1, 'weeeew');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_30_071531_create_karyawan_table', 1),
('2015_03_30_121613_create_meja_table', 1),
('2015_03_30_123605_create_menu_table', 1),
('2015_03_30_124242_create_pemesanan_table', 1),
('2015_03_30_125407_create_pelayanan_table', 1),
('2015_03_30_125659_create_pemanggilan_table', 1),
('2015_03_30_130019_create_review_makanan_table', 1),
('2015_03_30_130418_create_review_restoran_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('laila.mauhibah@gmail.com', '7537cb0bd7e3a0075d5458bacdf6b6d9b7c072849f250cadceab77358ab59169', '2015-04-12 20:28:41'),
('aulia.arshad@ui.ac.id', 'c0e145397a4ef6e3caa9ecb45045ab41e1cf1e3411293819cdba0e3d5640d794', '2015-04-14 03:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE IF NOT EXISTS `pelayanan` (
  `id_pelayanan` int(10) unsigned NOT NULL,
  `id_pemesanan` int(10) unsigned NOT NULL,
  `id_karyawan` int(10) unsigned NOT NULL,
  `durasi_masak` int(11) NOT NULL,
  `durasi_pengantaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemanggilan`
--

CREATE TABLE IF NOT EXISTS `pemanggilan` (
  `id_pemanggilan` int(10) unsigned NOT NULL,
  `id_meja` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan` text COLLATE utf8_unicode_ci NOT NULL,
  `status_pemanggilan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemanggilan`
--

INSERT INTO `pemanggilan` (`id_pemanggilan`, `id_meja`, `timestamp`, `pesan`, `status_pemanggilan`) VALUES
(1, 14, '2015-04-14 10:45:50', 'Membayar pemesanan dengan kartu debit', 0),
(2, 14, '2015-04-14 10:46:06', 'Membayar pemesanan dengan kartu kredit', 0),
(3, 14, '2015-04-14 10:53:44', 'Membayar pemesanan dengan uang tunai ', 0),
(0, 14, '2015-05-12 16:32:21', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 17:08:37', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:34:31', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:35:19', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:36:27', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:36:59', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:37:38', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:40:56', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:41:19', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:53:07', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:53:30', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:53:53', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:54:21', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:54:37', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:55:11', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:55:46', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:55:48', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:56:07', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:56:18', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:56:46', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:58:55', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:59:29', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:59:37', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 17:59:50', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:00:21', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:00:29', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:01:45', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:10:48', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:12:09', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:13:01', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:13:36', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:14:44', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:15:43', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:16:14', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:16:24', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:18:10', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:18:25', 'Membayar pemesanan dengan uang tunai 80000', 0),
(0, 14, '2015-05-12 18:19:25', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:19:45', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:19:59', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:20:26', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:21:22', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:28:13', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:28:36', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:38:18', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:38:39', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:38:59', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:39:13', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:44:49', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 18:50:42', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 19:03:57', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 19:04:27', 'Membayar pemesanan dengan uang tunai 25000', 0),
(0, 14, '2015-05-12 19:05:06', 'Membayar pemesanan dengan uang tunai 40000', 0),
(0, 14, '2015-05-12 19:06:02', 'Membayar pemesanan dengan uang tunai 40000', 0),
(0, 14, '2015-05-12 19:07:11', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:07:34', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:09:17', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:10:18', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:11:59', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:12:17', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:12:19', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:14:31', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:15:52', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:16:05', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:16:53', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:17:42', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:17:47', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:17:55', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:34:32', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:34:54', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:35:10', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:35:14', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:35:38', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:35:51', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:39:13', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:39:52', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:45:42', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:48:33', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 19:49:10', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 20:05:08', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 20:05:53', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 20:06:24', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-12 20:08:28', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:11:06', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:11:57', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:12:14', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:12:33', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:13:00', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:13:29', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:13:44', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:14:50', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:15:02', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:16:03', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:16:24', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:16:34', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:17:05', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:17:54', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:18:23', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:18:45', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:19:12', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:19:45', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:23:29', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:32:17', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:32:31', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:32:40', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:33:12', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:34:02', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 20:34:07', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:05:11', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:05:54', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:07:01', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:07:57', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:08:38', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:08:56', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:09:04', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:09:13', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:09:37', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:09:50', 'Membayar pemesanan dengan uang tunai 500000', 0),
(0, 14, '2015-05-12 21:11:04', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 21:11:08', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 21:12:09', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 21:12:50', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 21:13:16', 'Membayar pemesanan dengan uang tunai 10000', 0),
(0, 14, '2015-05-12 23:36:44', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:38:30', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:45:39', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:45:48', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:49:44', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:50:25', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:51:59', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:52:34', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:52:59', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:53:14', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:55:15', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:55:48', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:57:48', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-12 23:58:05', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:00:21', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:02:41', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:03:30', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:15:13', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:40:15', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:41:15', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:41:32', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:47:52', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:50:17', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:50:34', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:51:32', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 00:51:33', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 01:30:01', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 01:56:38', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 01:57:10', 'Membayar pemesanan dengan uang tunai 1000000', 0),
(0, 14, '2015-05-13 02:00:35', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:00:57', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:15:41', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:16:03', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:34:41', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:36:13', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-13 02:37:28', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:40:08', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:46:48', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-13 02:49:19', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-18 15:32:12', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 15:45:10', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:03:43', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:04:15', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:08:52', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:11:55', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:16:20', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:19:14', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 16:31:25', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:13:38', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:13:59', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:14:41', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:16:13', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:27:44', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:40:21', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:40:42', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:40:52', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:40:58', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:41:06', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:41:17', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:41:32', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:41:46', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:46:18', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:46:30', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:46:39', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:46:48', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:02', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:13', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:20', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:28', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:36', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:47:42', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 17:54:01', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:04:26', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:04:39', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:04:49', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:05:10', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:05:34', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:07:37', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:13:43', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:16:25', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:17:38', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:38:59', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:39:23', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:44:13', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:45:19', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 18:47:36', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-19 20:09:35', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-20 02:11:07', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-24 11:26:23', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 01:39:31', 'Membayar pemesanan dengan kartu debit', 0),
(0, 0, '2015-05-25 01:51:18', 'Membayar pemesanan dengan kartu debit', 0),
(0, 14, '2015-05-25 02:13:05', 'Membayar pemesanan dengan kartu debit', 0),
(0, 0, '2015-05-25 02:18:43', 'Membayar pemesanan dengan kartu debit', 0),
(0, 0, '2015-05-25 02:18:43', 'Membayar pemesanan dengan kartu debit', 0),
(0, 0, '2015-05-25 02:20:21', 'Membayar pemesanan dengan kartu debit', 0),
(0, 0, '2015-05-25 02:20:26', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:20:43', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:20:54', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:21:08', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:22:00', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:22:33', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 0, '2015-05-25 02:22:53', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:23:34', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:24:04', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:26:07', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:26:35', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:26:50', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:27:06', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:27:06', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:27:52', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:28:05', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:28:20', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:28:40', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:29:32', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:29:40', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:29:51', 'Membayar pemesanan dengan kartu kredit', 0),
(0, 14, '2015-05-25 02:30:26', 'Membayar pemesanan dengan kartu kredit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(10) unsigned NOT NULL,
  `id_meja` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Queued','On Process','Done','Paid','') COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_meja`, `id_menu`, `jumlah`, `waktu`, `status`, `keterangan`) VALUES
(1, 14, 33, 100, '2015-05-24 11:26:03', 'Paid', ''),
(2, 14, 25, 12, '2015-05-25 01:39:28', 'Paid', ''),
(3, 0, 35, 400, '2015-05-25 01:51:14', 'Paid', ''),
(4, 14, 29, 2, '2015-05-25 02:13:03', 'Paid', ''),
(5, 0, 33, 21, '2015-05-25 02:18:40', 'Paid', ''),
(6, 0, 27, 1, '2015-05-25 02:21:06', 'Paid', ''),
(7, 14, 2, 2, '2015-05-25 02:23:29', 'Paid', ''),
(8, 14, 35, 4, '2015-05-25 02:27:49', 'Paid', ''),
(9, 14, 27, 4, '2015-05-25 02:29:15', 'Paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `review_makanan`
--

CREATE TABLE IF NOT EXISTS `review_makanan` (
  `id_review` int(10) unsigned NOT NULL,
  `id_meja` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_restoran`
--

CREATE TABLE IF NOT EXISTS `review_restoran` (
  `id_review` int(10) unsigned NOT NULL,
  `id_meja` int(10) unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `karyawan_email_unique` (`email`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `review_makanan`
--
ALTER TABLE `review_makanan`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `review_restoran`
--
ALTER TABLE `review_restoran`
  ADD PRIMARY KEY (`id_review`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `review_makanan`
--
ALTER TABLE `review_makanan`
  MODIFY `id_review` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review_restoran`
--
ALTER TABLE `review_restoran`
  MODIFY `id_review` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
