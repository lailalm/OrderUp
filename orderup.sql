-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 02:37 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `name`, `email`, `password`, `role`, `telepon`, `photoname`, `mime`, `original_photoname`, `alamat`, `tanggal_mulai`, `remember_token`) VALUES
(1, 'Laila Mauhibah', 'laila.mauhibah@gmail.com', '$2y$10$pgj7iTq1UNdp5itu.nLM3.y./9T/5rbun2cMajTOVFhc/TE13ByY2', 'Manajer', '444', 'php2B25.tmp.jpg', 'image/jpeg', 'photo.jpg', 'huhu', '2015-04-21', 'ES7pRHxBihG9xqegCdndtBHyvFiVQ7FREiM3T5bHjlQRHVOJAEvzgfrq4k2o'),
(14, '13', 'pAW1k', '$2y$10$1GvyskHU4iru7fpV/pcUGuz6PqfqQ0SBAObtObQxWTXULvCXMbesa', 'Meja', '', '', '', '', '', '0000-00-00', 'RS3PFVKntSx98adviSyNvcmDPRtdmNNfm0dLUtU4yKVbn76jppHtWdKVTJ1b'),
(17, 'Ayu Zenitha', 'ayuzenitha@gmail.com', '$2y$10$1jQs9HXd8fU0NooxF1ba8.VqfkKEn1xodulRbToUsSCHLJ6etPABS', 'Pelayan', '081617658897', 'php4E50.tmp.jpg', 'image/jpeg', 'pelayan1.jpg', 'Jl. Pepaya No 30 Lebak Bulus', '2015-04-01', '2KZ3WgphQK3E5Y3hm6b839w6edNWd6jTYemiCdg5P1QbbJFUsWRiiN6DiGl5'),
(19, 'Aulia Arshad', 'aulia.arshad@ui.ac.id', '$2y$10$fDaO2XqSMlUFYmu6VuVmrOcc7rdoNr5oesYI5X/611F8cFSVS5m2S', 'Koki', '90991888', 'phpF21F.tmp.jpg', 'image/jpeg', 'koki2.jpg', 'Jalan Kenari 4 No.29', '2015-01-01', 'Le1gXC0oB1tnGJkePdeHpiioQ897R2v6dPMoZBlNqM224zVgrG2Neved7tNG'),
(20, '14', 'hOMoG', '$2y$10$q4W789B1pu3b5yLoKOwreu12TbOXxRj1yRe7AwAHIxRU40tIKSmWm', 'Meja', '', '', '', '', '', '0000-00-00', 'sO35N24ddRu3N9zONrZ2jEWFchCqxGiQXDuKJIecxMCeFohZDutvOM6MmAt3'),
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `nomormeja`, `kodemasuk`, `deskripsi`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemanggilan`
--

INSERT INTO `pemanggilan` (`id_pemanggilan`, `id_meja`, `timestamp`, `pesan`, `status_pemanggilan`) VALUES
(1, 14, '2015-04-14 10:45:50', 'Membayar pemesanan dengan kartu debit', 0),
(2, 14, '2015-04-14 10:46:06', 'Membayar pemesanan dengan kartu kredit', 0),
(3, 14, '2015-04-14 10:53:44', 'Membayar pemesanan dengan uang tunai ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
`id_pemesanan` int(10) unsigned NOT NULL,
  `id_meja` int(10) unsigned NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Queued','On Process','Done','Paid','') COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_meja`, `id_menu`, `jumlah`, `waktu`, `status`, `keterangan`) VALUES
(1, 14, 25, 13, '0000-00-00 00:00:00', 'Paid', '');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
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
 ADD PRIMARY KEY (`id_karyawan`), ADD UNIQUE KEY `karyawan_email_unique` (`email`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
 ADD PRIMARY KEY (`id_pelayanan`), ADD KEY `pelayanan_id_pemesanan_foreign` (`id_pemesanan`), ADD KEY `pelayanan_id_karyawan_foreign` (`id_karyawan`);

--
-- Indexes for table `pemanggilan`
--
ALTER TABLE `pemanggilan`
 ADD PRIMARY KEY (`id_pemanggilan`), ADD KEY `pemanggilan_id_meja_foreign` (`id_meja`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`), ADD KEY `pemesanan_id_meja_foreign` (`id_meja`), ADD KEY `pemesanan_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `review_makanan`
--
ALTER TABLE `review_makanan`
 ADD PRIMARY KEY (`id_review`), ADD KEY `review_makanan_id_meja_foreign` (`id_meja`), ADD KEY `review_makanan_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `review_restoran`
--
ALTER TABLE `review_restoran`
 ADD PRIMARY KEY (`id_review`), ADD KEY `review_restoran_id_meja_foreign` (`id_meja`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
MODIFY `id_meja` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
MODIFY `id_pelayanan` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemanggilan`
--
ALTER TABLE `pemanggilan`
MODIFY `id_pemanggilan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `id_pemesanan` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
ADD CONSTRAINT `pelayanan_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
ADD CONSTRAINT `pelayanan_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemanggilan`
--
ALTER TABLE `pemanggilan`
ADD CONSTRAINT `pemanggilan_id_meja_foreign` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
ADD CONSTRAINT `pemesanan_id_meja_foreign` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pemesanan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_makanan`
--
ALTER TABLE `review_makanan`
ADD CONSTRAINT `review_makanan_id_meja_foreign` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`),
ADD CONSTRAINT `review_makanan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `review_restoran`
--
ALTER TABLE `review_restoran`
ADD CONSTRAINT `review_restoran_id_meja_foreign` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
