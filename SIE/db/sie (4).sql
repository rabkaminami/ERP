-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2016 at 06:56 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE IF NOT EXISTS `tbl_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `image` text NOT NULL,
  `approve1` int(1) NOT NULL,
  `approve2` int(1) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id`, `title`, `name`, `description`, `correction`, `correction_by`, `category`, `value`, `start_date`, `end_date`, `created_date`, `updated_date`, `created_by`, `updated_by`, `image`, `approve1`, `approve2`, `published`, `status`) VALUES
(1, 'Iklan Produk T001', 'Female Magazine', '<p>Iklan test</p>', 'bisa kurang gak valuenya ?\r\n----------------------------------------------\r\nSudah saya turunkan pak\r\n----------------------------------------------\r\nok \r\n----------------------------------------------\r\nBisa tidak di buat jadi 2 bulan ?\r\n----------------------------------------------\r\nSudah saya buat jadi 2 bulan pak\r\n----------------------------------------------\r\nok dari saya!\r\n----------------------------------------------', 0, 'print', 9000000, '05/01/2016', '06/30/2016', '05/01/2016 07:54:28', '05/01/2016 09:45:28', 3, 2, '1462107268.jpg', 1, 1, 1, 0),
(3, 'Iklan Tatuis', 'Net TV', '<p>Iklan berlangsung selama 12 hari.</p>', 'oke saya setuju\r\n-------------------------\r\noke saya juga setuju\r\n---------------------------', 0, 'tv', 20000000, '06/01/2016', '06/12/2016', '05/01/2016 08:20:50', '05/01/2016 10:09:29', 3, 2, '', 1, 1, 1, 0),
(4, 'Quiz Tatuis', 'Lesmana FM', '<p>Quiz tentang Tatuis yang akan di lakukan di Lesmana FM selama 1 bulan penuh pada bulan juli 2016.</p>', '', 0, 'radio', 15000000, '07/01/2016', '07/30/2016', '05/01/2016 08:22:19', '05/01/2016 08:22:19', 3, 3, '', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(20) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `acc_number` varchar(20) NOT NULL,
  `office` text NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id`, `bank`, `acc_name`, `acc_number`, `office`, `note`, `status`) VALUES
(1, 'BCA', 'PT. Tatuis Indonesia', '900-223-2224', 'Jl. Pajajaran Ruko Indah No.21 Bogor', '', 1),
(2, 'Bank Syariah Mandiri', 'PT. Tatuis Indonesia', 'Jl.  Pemda Raya Ruko', 'Jl.  Pemda Raya Ruko Pemuda No.5 Cibinong Bogor', '', 1),
(3, 'Mandiri', 'PT. Tatuis Indonesia', 'Ruko Graha Cibinong ', 'Ruko Graha Cibinong No. 27 Bogor', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_demand_rm`
--

CREATE TABLE IF NOT EXISTS `tbl_demand_rm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `production_planning` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_demand_rm`
--

INSERT INTO `tbl_demand_rm` (`id`, `title`, `production_planning`, `id_product`, `qty`, `start_date`, `end_date`, `created_by`, `updated_by`, `created_date`, `updated_date`, `correction`, `correction_by`, `published`, `status`) VALUES
(1, 'Produksi Tiara 131', 2, 2, 10000, '06/01/2016', '06/15/2016', 1, 0, '05/04/2016 04:26:04', '', 'ok!!', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_department` varchar(50) NOT NULL,
  `jml_karyawan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `nama_department`, `jml_karyawan`, `keterangan`, `status`) VALUES
(1, 'IT Support', 10, 'Melakukan semua tugas yang berhubungan dengan IT seperti :\r\n1. Jaringan\r\n2. System\r\n3. Komputer\r\n4. Perangkat Lunak\r\n5. Dll.', 1),
(2, 'Marketing Department', 5, 'Ruang lingkup kerja marketing :\r\n1. Membuat design produk baru\r\n2. Membuat design catalog dan materi promosi\r\n3. Mengatur jadwal iklan \r\n4. Membuat marketing plan dalam satu tahun ke depean\r\n5. Mengelola sosial media, website dan hubungan dengan media.', 1),
(3, 'Purchasing Department', 7, 'Ruang lingkup purchasing department :\r\n1. Melakukan pembelanjaan material / bahan-bahan baku\r\n2. Melakukam pembelanjaan kebutuhan perusahaan\r\n3.  Mengeluarkan PO untuk supplyer\r\n4. Menerima barang dari supplyer\r\n', 1),
(4, 'Operations Department', 100, 'Ruang lingkup operations department :\r\n1. Melakukan proses produksi produk baru maupun repeat produk\r\n2. Melakukan pngecekan proses pembuatan produk yang meliputi :\r\n     - Pola Material (membuat pola bahan baku)\r\n     - Sewing (jahit)\r\n     - Cutting (pemotongan)\r\n     - Finishing (tahap akhir)\r\n3. Menyelesaikan permintaan produk sesuai dengan jadwal\r\n', 1),
(5, 'Warehousing Department', 7, 'Ruang lingkup warehousing department : \r\n1. Menyimpan bahan-bahan baku dari supplyer\r\n2. Menyimpan bahan-bahan setengah jadi\r\n3. Menyimpan produk yang sudah jadi\r\n4. Menyimpan pula produk yang gagal (Retur)\r\n5. Menyimpan bahan-bahan setengah jadi yang gagal (Retur)\r\n6. Menyimpan barang-barang perusahaan di gudang.\r\n', 1),
(6, 'Finance Department', 10, 'Ruang lingkup finance department :\r\n1. Melakukan pendataan hasil penjualan\r\n2. Melakukan penagihan kepada distributor\r\n3. Menghitung jumlah pengeluaran perusahaan\r\n4. Mengeluarkan uang untuk pembelanjaan\r\n5. Menghitung jumlah pendapatan perusahaan', 1),
(7, 'Accounting Department', 4, 'Ruang lingkup accounting department :\r\n1. Melakukan rekap data keuangan perusahaan\r\n2. Mengelola buku besar perusahaan\r\n3. Menghitung laba rugi perusahaan\r\n4. Menghitung piutang perusahaan\r\n5. Menghitung utang perusahaan\r\n7. Membuat laporan keuangan perusahaan', 1),
(9, 'Board of Directors', 2, 'Ruang lingkup board of directors :\r\n1. Menerima laporan dari semua department\r\n2. Memberikan kebijakan yang berhubungan dengan perusahaan\r\n3. Mengeluaran keputusan-keputusan terkait perusahaan\r\n4. Menyetujui atau tidak menyetujui pengajuan dari semua department\r\n5. Meninjau perkembangan perusahaan', 1),
(10, 'Manager', 3, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE IF NOT EXISTS `tbl_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`id`, `name`, `stock`, `unit`, `description`, `published`, `status`) VALUES
(1, 'Bahan Silky Print', 740000, 'Yard', '<p>Bahan Silky Print<br></p>', 1, 1),
(2, 'Bahan Ceruti', 539097, 'Yard', '<p>Bahan Ceruti<br></p>', 1, 1),
(4, 'Sleting ykk', 229648, 'Pcs', '<p>Sleting ykk<br></p>', 1, 1),
(5, 'Benang Jahit', 2176, 'Yard', '<p>Benang Jahit<br></p>', 1, 1),
(6, 'Benang Karet', 25240, 'Yard', '<p>Benang Karet<br></p>', 1, 1),
(8, 'Bahan Rayon print', 959500, 'Yard', '<p>Bahan Rayon print<br></p>', 1, 1),
(9, 'Bahan Hero', 297324, 'Yard', '<p>Baaan Hero<br></p>', 1, 1),
(10, 'Renda Tile', 10000, 'Pcs', '<p>Renda Tile<br></p>', 1, 1),
(11, 'Bahan Silky ', 10500, 'Yard', '<p>Bahan Silky <br></p>', 1, 1),
(12, 'Bahan Cotton Paris', 79000, 'Yard', '<p>Bahan Cotton Paris<br></p>', 1, 1),
(13, 'Renda Sarang burung', 142000, 'Yard', '<p>Renda Sarang burung<br></p>', 1, 1),
(14, 'Bahan Bsy', 130000, 'Yard', '<p>Bahan Bsy<br></p>', 1, 1),
(15, 'Renda Karet Hitam', 166200, 'Yard', '', 1, 1),
(16, 'Karet Kepala', 80800, 'Yard', '', 1, 1),
(17, 'Karet Rok', 80516, 'Yard', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mkplan`
--

CREATE TABLE IF NOT EXISTS `tbl_mkplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `week` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mkplan`
--

INSERT INTO `tbl_mkplan` (`id`, `title`, `year`, `month`, `week`, `description`, `published`, `status`) VALUES
(1, 'Pameran di Mall Botani square', '2017', 'Januari', '1,2', '<p>Pameran dilakukan selama 2 minggu berturut-turut.</p>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_header`
--

CREATE TABLE IF NOT EXISTS `tbl_po_header` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `supplier` int(5) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `approve1` int(1) NOT NULL,
  `approve2` int(1) NOT NULL,
  `approve3` int(1) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_header`
--

INSERT INTO `tbl_po_header` (`id`, `title`, `supplier`, `created_date`, `due_date`, `correction`, `correction_by`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(1, 'PO Ammira  ( Bandung ) ', 36, '05/03/2016 04:36:42', '01/06/2016', '', 0, 1, 1, 1, 1, 1),
(2, 'PO Asia Garment', 9, '05/03/2016 04:36:42', '23/07/2016', '', 0, 1, 1, 1, 1, 1),
(3, 'PO YKK Timur', 15, '05/03/2016 04:36:42', '03/07/2016', '', 0, 1, 1, 1, 1, 1),
(6, 'PO Ammira  ( Bandung ) ', 36, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(7, 'PO Asia Garment', 9, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(8, 'PO Cindy Renda', 10, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(9, 'PO YKK Timur', 15, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(10, 'PO Damai', 14, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(11, 'PO Cendana', 11, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(12, 'PO Doa Bunda', 18, '05/29/2016 04:01:28', '29/05/2016', '', 0, 1, 1, 1, 1, 1),
(13, 'Ammira  ( Bandung ) ', 36, '05/30/2016 12:55:06', '21/06/2016', '', 0, 1, 1, 1, 1, 1),
(14, 'Ashok-D', 5, '05/30/2016 12:55:06', '21/06/2016', '', 0, 1, 1, 1, 1, 1),
(15, 'Cendana', 11, '05/30/2016 12:55:06', '21/06/2016', '', 0, 1, 1, 1, 1, 1),
(16, 'Doa Bunda', 18, '05/30/2016 12:55:06', '21/06/2016', '', 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_item`
--

CREATE TABLE IF NOT EXISTS `tbl_po_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_header` int(5) NOT NULL,
  `item` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `supplier` int(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbl_po_item`
--

INSERT INTO `tbl_po_item` (`id`, `po_header`, `item`, `price`, `supplier`, `qty`, `total`, `unit`, `description`, `created_date`, `status`) VALUES
(42, 6, 1, 45000, 36, 17500, 787500000, 'Yard', 'warna putih', '05/29/2016 04:01:28', 0),
(43, 7, 2, 62000, 9, 8883, 550746000, 'Yard', 'warna hijau', '05/29/2016 04:01:28', 1),
(44, 8, 15, 12000, 10, 2800, 33600000, 'Yard', 'hitam', '05/29/2016 04:01:28', 1),
(45, 9, 4, 20000, 15, 3900, 78000000, 'Yard', 'hitam', '05/29/2016 04:01:28', 1),
(46, 10, 5, 5000, 14, 2, 10000, 'Yard', 'biru', '05/29/2016 04:01:28', 1),
(47, 10, 6, 7000, 14, 230, 1610000, 'Yard', 'hitam', '05/29/2016 04:01:28', 1),
(48, 11, 16, 39000, 11, 475, 18525000, 'Yard', 'hitam', '05/29/2016 04:01:28', 1),
(49, 12, 17, 32000, 18, 307, 9824000, 'Yard', 'hitam', '05/29/2016 04:01:28', 1),
(50, 13, 14, 20000, 36, 4000, 80000000, 'Yard', 'Warna Cerah', '05/30/2016 12:55:06', 1),
(51, 14, 12, 41000, 5, 2000, 82000000, 'Yard', 'warna putih', '05/30/2016 12:55:06', 1),
(52, 15, 16, 39000, 11, 1000, 39000000, 'Yard', 'coklat tua', '05/30/2016 12:55:06', 1),
(53, 16, 17, 32000, 18, 1500, 48000000, 'Yard', 'Putih', '05/30/2016 12:55:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_list`
--

CREATE TABLE IF NOT EXISTS `tbl_price_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` int(10) NOT NULL,
  `material` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_price_list`
--

INSERT INTO `tbl_price_list` (`id`, `supplier`, `material`, `qty`, `unit`, `price`) VALUES
(1, 36, 14, 1, 'Yard', 20000),
(2, 36, 2, 1, 'Yard', 32000),
(3, 36, 12, 1, 'Yard', 27000),
(4, 36, 9, 1, 'Yard', 31000),
(5, 5, 14, 1, 'Yard', 43000),
(6, 5, 2, 1, 'Yard', 49000),
(7, 5, 12, 1, 'Yard', 41000),
(8, 9, 14, 1, 'Yard', 52000),
(9, 9, 2, 1, 'Yard', 62000),
(10, 9, 8, 1, 'Yard', 56000),
(11, 15, 4, 1, 'Yard', 20000),
(12, 6, 14, 1, 'Yard', 21000),
(13, 6, 2, 1, 'Yard', 40000),
(14, 6, 12, 1, 'Yard', 62000),
(15, 6, 9, 1, 'Yard', 54000),
(16, 11, 14, 1, 'Yard', 70000),
(17, 11, 2, 1, 'Yard', 82000),
(18, 11, 12, 1, 'Yard', 79000),
(19, 10, 15, 1, 'Yard', 12000),
(20, 10, 13, 1, 'Yard', 15000),
(21, 10, 10, 1, 'Yard', 11000),
(22, 14, 5, 1, 'Yard', 5000),
(23, 14, 6, 1, 'Yard', 7000),
(24, 35, 15, 1, 'Yard', 6000),
(26, 35, 13, 1, 'Yard', 5400),
(27, 36, 1, 1, 'Yard', 45000),
(28, 5, 1, 1, 'Yard', 35000),
(29, 11, 16, 1, 'Yard', 39000),
(30, 18, 17, 1, 'Yard', 32000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_item`
--

CREATE TABLE IF NOT EXISTS `tbl_production_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `production_planning` int(10) NOT NULL,
  `product` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `correction` text NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_production_item`
--

INSERT INTO `tbl_production_item` (`id`, `production_planning`, `product`, `qty`, `start_date`, `end_date`, `correction`, `created_date`, `status`) VALUES
(1, 4, 6, 1000, '05/02/2016', '05/07/2016', 'Dilakukan di minggu pertama', '05/30/2016 10:38:01', 0),
(3, 4, 5, 1000, '05/09/2016', '05/14/2016', 'Dilakukan di minggu ke dua', '05/30/2016 10:44:05', 0),
(4, 4, 2, 1000, '05/16/2016', '05/21/2016', 'Dilakukan di minggu ke tiga', '05/30/2016 10:49:40', 1),
(5, 4, 1, 1000, '05/23/2016', '05/31/2016', 'Dilakukan di minggu ke empat', '05/30/2016 10:49:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_planning`
--

CREATE TABLE IF NOT EXISTS `tbl_production_planning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `target` int(11) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `approve1` int(1) NOT NULL,
  `approve2` int(1) NOT NULL,
  `approve3` int(1) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_production_planning`
--

INSERT INTO `tbl_production_planning` (`id`, `title`, `target`, `start_date`, `end_date`, `created_by`, `updated_by`, `created_date`, `updated_date`, `correction`, `correction_by`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(4, 'Ramadhan', 4000, '06/01/2016', '06/30/2016', 1, 1, '05/30/2016 02:23:13', '05/30/2016 02:29:30', '', 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_header`
--

CREATE TABLE IF NOT EXISTS `tbl_product_header` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_header`
--

INSERT INTO `tbl_product_header` (`id`, `name`, `stock`, `updated_date`, `description`, `published`, `status`) VALUES
(1, 'Tiara 132', 160000, '05/04/2016 02:22:25', '', 1, 1),
(2, 'Tiara 131', 154980, '05/04/2016 02:34:23', '', 1, 1),
(5, 'Produk Tiara 190', 0, '', 'convert from RO', 1, 1),
(6, 'Produk Tiara 111 Anak', 1000, '', 'convert from RO', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_item`
--

CREATE TABLE IF NOT EXISTS `tbl_product_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_header` int(5) NOT NULL,
  `item` int(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_product_item`
--

INSERT INTO `tbl_product_item` (`id`, `product_header`, `item`, `qty`, `unit`, `description`, `created_date`, `status`) VALUES
(1, 1, 8, 16000, 'Yard', '-', '05/04/2016 02:22:25', 1),
(2, 1, 2, 8883, 'Yard', '-', '05/04/2016 02:22:25', 1),
(3, 1, 15, 2500, 'Yard', '', '05/04/2016 02:31:36', 1),
(4, 1, 4, 4, 'Yard', '', '05/04/2016 02:31:36', 1),
(5, 1, 5, 2, 'Yard', '', '05/04/2016 02:31:36', 1),
(6, 1, 6, 230, 'Yard', '', '05/04/2016 02:31:36', 1),
(7, 1, 16, 475, 'Yard', '', '05/04/2016 02:31:36', 1),
(8, 1, 17, 307, 'Yard', '', '05/04/2016 02:31:36', 1),
(9, 2, 8, 15500, 'Yard', '', '05/04/2016 02:34:23', 1),
(10, 2, 9, 8833, 'Yard', '', '05/04/2016 02:34:23', 1),
(11, 2, 13, 4000, 'Yard', '', '05/04/2016 02:34:23', 1),
(12, 2, 4, 3769, 'Yard', '', '05/04/2016 02:34:23', 1),
(13, 2, 5, 2, 'Yard', '', '05/04/2016 02:34:23', 1),
(14, 2, 6, 230, 'Yard', '', '05/04/2016 02:34:23', 1),
(15, 2, 16, 475, 'Yard', '', '05/04/2016 02:34:23', 1),
(16, 2, 17, 307, 'Yard', '', '05/04/2016 02:34:23', 1),
(33, 5, 1, 17500, 'Yard', 'warna putih', '05/29/2016 02:3', 1),
(34, 5, 2, 8883, 'Yard', 'warna hijau', '05/29/2016 02:3', 1),
(35, 5, 15, 2800, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(36, 5, 4, 3900, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(37, 5, 5, 2, 'Yard', 'biru', '05/29/2016 02:3', 1),
(38, 5, 6, 230, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(39, 5, 16, 475, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(40, 5, 17, 307, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(41, 6, 14, 4000, 'Yard', 'Warna Cerah', '05/30/2016 12:2', 1),
(42, 6, 12, 2000, 'Yard', 'warna putih', '05/30/2016 12:2', 1),
(43, 6, 16, 1000, 'Yard', 'coklat tua', '05/30/2016 12:2', 1),
(44, 6, 17, 1500, 'Yard', 'Putih', '05/30/2016 12:2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raw_process`
--

CREATE TABLE IF NOT EXISTS `tbl_raw_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `production_planning` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_material` int(5) NOT NULL,
  `created_date` varchar(15) NOT NULL,
  `updated_date` varchar(10) NOT NULL,
  `category` varchar(15) NOT NULL,
  `material_qty` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `reture` int(11) NOT NULL,
  `warehouse` varchar(15) NOT NULL,
  `correction` text NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_raw_process`
--

INSERT INTO `tbl_raw_process` (`id`, `production_planning`, `id_product`, `id_material`, `created_date`, `updated_date`, `category`, `material_qty`, `qty`, `reture`, `warehouse`, `correction`, `published`, `status`) VALUES
(11, 4, 6, 14, '31/05/2016', '', 'cuting', 1000, 1000, 0, 'rmw', '', 1, 0),
(15, 4, 6, 12, '31/05/2016', '', 'cuting', 1000, 1000, 0, 'rmw', '', 1, 0),
(17, 4, 5, 0, '31/05/2016', '', 'sewing', 1000, 1000, 0, 'rmw', '', 1, 0),
(18, 4, 6, 0, '31/05/2016', '31/05/2016', 'finishing', 1000, 1000, 0, 'fgw', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_header`
--

CREATE TABLE IF NOT EXISTS `tbl_request_header` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `department` int(5) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `created_date` varchar(15) NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `approve1` int(1) NOT NULL,
  `approve2` int(1) NOT NULL,
  `approve3` int(1) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request_header`
--

INSERT INTO `tbl_request_header` (`id`, `title`, `department`, `due_date`, `created_date`, `correction`, `correction_by`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(1, 'Pembelanjaan Produk Tiara 134', 4, '01/05/2016', '05/02/2016 07:3', 'PO-CREATED', 0, 1, 1, 1, 1, 1),
(2, 'Pembelanjaan Produk Tiara 125', 4, '01/06/2016', '05/02/2016 10:4', 'PO-CREATED', 0, 1, 1, 1, 1, 1),
(4, 'Produk Tiara 190', 4, '29/05/2016', '05/29/2016 02:3', 'PO-CREATED', 0, 1, 1, 1, 1, 1),
(5, 'Produk Tiara 111 Anak', 4, '21/06/2016', '05/30/2016 12:2', 'PO-CREATED', 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_item`
--

CREATE TABLE IF NOT EXISTS `tbl_request_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_header` int(11) NOT NULL,
  `department` int(5) NOT NULL,
  `item` int(5) NOT NULL,
  `supplier` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `created_date` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_request_item`
--

INSERT INTO `tbl_request_item` (`id`, `request_header`, `department`, `item`, `supplier`, `price`, `qty`, `total`, `unit`, `description`, `created_date`, `status`) VALUES
(19, 1, 4, 2, 36, 0, 501, 0, 'Yard', 'warna coklat tua', '05/02/2016 07:3', 1),
(20, 1, 4, 9, 36, 0, 1002, 0, 'Yard', 'warna putih', '05/02/2016 07:3', 1),
(21, 1, 4, 8, 9, 0, 250, 0, 'Yard', 'warna hijau', '05/02/2016 07:3', 1),
(22, 1, 4, 12, 36, 0, 120, 0, 'Yard', 'warna putih', '05/02/2016 07:3', 1),
(23, 1, 4, 1, 9, 0, 500, 0, 'Yard', 'warna hitam', '05/02/2016 07:3', 1),
(24, 1, 4, 11, 9, 0, 2100, 0, 'Yard', 'warna biru', '05/02/2016 09:4', 1),
(25, 1, 4, 4, 15, 0, 1000, 0, 'Pcs', 'Ukuran A2', '05/02/2016 09:4', 1),
(26, 1, 4, 10, 9, 0, 2000, 0, 'Pcs', 'Ukuran F3', '05/02/2016 09:4', 1),
(30, 2, 4, 14, 36, 0, 1300, 0, 'Yard', 'warna coklat tua', '05/02/2016 10:4', 1),
(31, 2, 4, 4, 15, 0, 4000, 0, 'Pcs', 'Ukuran kecil', '05/02/2016 10:4', 1),
(34, 2, 4, 12, 36, 0, 1201, 0, 'Yard', 'Warna Merah', '05/02/2016 10:4', 1),
(37, 4, 4, 1, 36, 45000, 17500, 787500000, 'Yard', 'warna putih', '05/29/2016 02:3', 1),
(38, 4, 4, 2, 9, 62000, 8883, 550746000, 'Yard', 'warna hijau', '05/29/2016 02:3', 1),
(39, 4, 4, 15, 10, 12000, 2800, 33600000, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(40, 4, 4, 4, 15, 20000, 3900, 78000000, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(41, 4, 4, 5, 14, 5000, 2, 10000, 'Yard', 'biru', '05/29/2016 02:3', 1),
(42, 4, 4, 6, 14, 7000, 230, 1610000, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(43, 4, 4, 16, 11, 39000, 475, 18525000, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(44, 4, 4, 17, 18, 32000, 307, 9824000, 'Yard', 'hitam', '05/29/2016 02:3', 1),
(45, 5, 4, 14, 36, 20000, 4000, 80000000, 'Yard', 'Warna Cerah', '05/30/2016 12:2', 0),
(46, 5, 4, 12, 5, 41000, 2000, 82000000, 'Yard', 'warna putih', '05/30/2016 12:2', 0),
(47, 5, 4, 16, 11, 39000, 1000, 39000000, 'Yard', 'coklat tua', '05/30/2016 12:2', 0),
(48, 5, 4, 17, 18, 32000, 1500, 48000000, 'Yard', 'Putih', '05/30/2016 12:2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rpm`
--

CREATE TABLE IF NOT EXISTS `tbl_rpm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_header` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `created_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `method` varchar(20) NOT NULL,
  `bank` int(5) NOT NULL,
  `transfer_to` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `approve1` int(5) NOT NULL,
  `approve2` int(5) NOT NULL,
  `approve3` int(5) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_rpm`
--

INSERT INTO `tbl_rpm` (`id`, `po_header`, `title`, `created_date`, `due_date`, `method`, `bank`, `transfer_to`, `total`, `correction`, `correction_by`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(1, 16, 'Doa Bunda', '06/01/2016 02:1', '21/06/2016', 'transfer', 2, 'BCA a/n H Tri Murti 287.218.7759', 48000000, '', 0, 1, 1, 1, 1, 1),
(2, 15, 'Cendana', '06/01/2016 05:0', '21/06/2016', 'transfer', 1, 'BCA a/n Vivi Cendana Mariadi 001.601.3221', 39000000, '', 0, 1, 1, 1, 1, 1),
(3, 14, 'Ashok-D', '06/01/2016 05:2', '21/06/2016', 'cash', 0, '', 82000000, '', 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE IF NOT EXISTS `tbl_saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `bank` int(3) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`id`, `title`, `bank`, `saldo`, `date`, `note`, `status`) VALUES
(1, 'Cash', 0, 4918000000, '01/01/2016', '', 1),
(2, 'BCA', 1, 1922000000, '01/06/2016', '', 1),
(3, 'BSM', 2, 3402000000, '01/06/2016', '', 1),
(4, 'Mandiri', 3, 7895000000, '01/06/2016', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sp_header`
--

CREATE TABLE IF NOT EXISTS `tbl_sp_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `date` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `correction` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `correction_by` int(5) NOT NULL,
  `approve1` int(5) NOT NULL,
  `approve2` int(5) NOT NULL,
  `approve3` int(5) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_sp_header`
--

INSERT INTO `tbl_sp_header` (`id`, `title`, `date`, `created_date`, `correction`, `image`, `correction_by`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(1, 'Produk Tiara 190', '20/06/2016', '05/28/2016 12:06:48', 'RO-CREATED', '1464368808.jpg', 0, 1, 1, 1, 1, 1),
(2, 'Produk Tiara 111 Anak', '21/06/2016', '05/30/2016 12:07:41', 'RO-CREATED', '1464541661.jpg', 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sp_item`
--

CREATE TABLE IF NOT EXISTS `tbl_sp_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_header` int(10) NOT NULL,
  `item` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_sp_item`
--

INSERT INTO `tbl_sp_item` (`id`, `sp_header`, `item`, `qty`, `unit`, `description`, `created_date`, `status`) VALUES
(1, 1, 1, 17500, 'Yard', 'Ungu Polos', '05/28/2016 12:06:48', 1),
(2, 1, 2, 8883, 'Yard', 'Motif Bunga-bunga', '05/28/2016 12:06:48', 1),
(3, 1, 15, 2800, 'Yard', 'warna hitam', '05/28/2016 12:06:48', 1),
(4, 1, 4, 3900, 'Yard', 'ukuran sedang', '05/28/2016 12:06:48', 1),
(5, 1, 5, 2, 'Yard', 'roll', '05/28/2016 12:06:48', 1),
(6, 1, 6, 230, 'Yard', 'hitam', '05/28/2016 12:06:48', 1),
(7, 1, 16, 475, 'Yard', 'putih', '05/28/2016 12:06:48', 1),
(8, 1, 17, 307, 'Yard', 'hijau', '05/28/2016 12:06:48', 1),
(9, 2, 14, 4000, 'Yard', 'Warna Cerah', '05/30/2016 12:07:41', 1),
(10, 2, 12, 2000, 'Yard', 'warna putih', '05/30/2016 12:07:41', 1),
(11, 2, 16, 1000, 'Yard', 'coklat tua', '05/30/2016 12:07:41', 1),
(12, 2, 17, 1500, 'Yard', 'Putih', '05/30/2016 12:07:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submissions`
--

CREATE TABLE IF NOT EXISTS `tbl_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `correction` text NOT NULL,
  `correction_by` int(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `image` varchar(50) NOT NULL,
  `approve1` int(5) NOT NULL,
  `approve2` int(5) NOT NULL,
  `approve3` int(5) NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_submissions`
--

INSERT INTO `tbl_submissions` (`id`, `title`, `description`, `correction`, `correction_by`, `category`, `created_date`, `updated_date`, `created_by`, `updated_by`, `image`, `approve1`, `approve2`, `approve3`, `published`, `status`) VALUES
(2, 'Tiara 191 Anak', 'Produk dengan motif bunga-bunga dan terdiri dari  (Bahan Silky Print, Bahan Ceruti, Renda Karet)', '', 0, 'product', '05/01/2016 01:24:01', '05/25/2016 05:02:11', 1, 12, '1462040641.jpg', 1, 0, 0, 1, 0),
(3, 'Tiara 132', 'Bahan Rayon print	  16.000 	Yard&nbsp;<div>Bahan Ceruti	           8.833 	Yard&nbsp;</div><div>Renda Karet Hitam	   2.500 	Yard&nbsp;</div><div>Sleting ykk	                   3.900 	Yard&nbsp;</div><div>Benang Jahit	           2 	Yard&nbsp;</div><div>Benang Karet	           230&nbsp;</div><div>&nbsp;Karet Kepala	           475&nbsp;</div><div>&nbsp;Karet Rok	                   307 	\r\n</div>', '', 0, 'product', '05/01/2016 01:34:55', '05/17/2016 12:11:45', 1, 4, '1462041295.jpg', 1, 1, 0, 1, 0),
(4, 'Tiara 131', 'Bahan Rayon Print	         15.500 	Yard\r\nBahan Hero	                 8.833 	Yard\r\nRenda Sarang burung	 4.000 	Yard\r\nSleting ykk	                         3.769 	Yard\r\nBenang Jahit	                 2 	Yard\r\nBenang Karet	                 230 	\r\nKaret Kepala	                475 	\r\nKaret Rok	                        307 	\r\n', 'Ok welldone!\r\n\r\nNext Directur Utama\r\n\r\n------------------------------------\r\nUdah bagus sih kalo menurut saya.  \r\nok naik  produksi!\r\n\r\ndirektur utama\r\n', 0, 'product', '05/01/2016 01:36:46', '05/01/2016 03:31:37', 1, 2, '1462041406.jpg', 1, 1, 0, 1, 1),
(5, 'Tiara 200', 'Bahan Silky	 15.500 	Yard\r\nBahan Ceruti	 8.833 	Yard\r\nRenda Karet Hitam	 2.500 	Yard\r\nSleting ykk	 3.900 	Yard\r\nBenang Jahit	 2 	Yard\r\nBenang Karet	 230 	\r\nKaret Kepala	 475 	\r\nKaret Rok	 307 	\r\n', 'ok lanjut ', 0, 'product', '05/01/2016 01:37:30', '05/01/2016 03:34:12', 1, 4, '1462041878.jpg', 1, 0, 0, 1, 0),
(9, 'Tiara 193', 'Bahan Rayon Print	 15.500&nbsp;<div>&nbsp;Yard\r\nBahan Hero	 8.833 	Yard&nbsp;</div><div>Bahan Ceruti	 14.500 	Yard&nbsp;</div><div>Sleting ykk	 3.769 	Yard&nbsp;</div><div>Benang Jahit	 2 	Yard&nbsp;</div><div>Benang Karet	 230&nbsp;</div><div>&nbsp;Karet Kepala	 475&nbsp;</div><div>&nbsp;Karet Rok	 307 	\r\n</div>', 'lanjuuuut', 0, 'product', '05/01/2016 01:54:56', '05/17/2016 12:06:57', 1, 2, '1462042496.jpg', 1, 1, 1, 1, 1),
(10, 'Tiara 196', 'Bahan Silky 	 15.500 	Yard<div>&nbsp;Bahan Ceruti	 8.833 	Yard&nbsp;</div><div>Renda Sarang burung	 2.800 	Yard&nbsp;</div><div>Sleting ykk	 3.900 	Yard&nbsp;</div><div>Benang Jahit	 2 	Yard&nbsp;</div><div>Benang Karet	 230&nbsp;</div><div>&nbsp;Karet Kepala	 475&nbsp;</div><div>&nbsp;Karet Rok	 307 	\r\n</div>', '', 0, 'product', '05/01/2016 01:55:55', '05/17/2016 12:25:09', 1, 12, '1462042555.jpg', 1, 0, 0, 1, 0),
(11, 'Tiara 199 Model 039', 'Bahan Silky Print	 16.500 Yard&nbsp;<div>Bahan Ceruti	 8.833 	Yard&nbsp;</div><div>Renda Karet Hitam	 2.500 	Yard&nbsp;</div><div>Sleting ykk	 3.900 	Yard&nbsp;</div><div>Benang Jahit	 2 	Yard&nbsp;</div><div>Benang Karet	 230&nbsp;</div><div>&nbsp;Karet Kepala	 475&nbsp;</div><div>&nbsp;Karet Rok	 307</div>', 'Motifnya kurang bagus\r\n-----------------------------------------------------------------\r\nSudah saya update pak terima kasih.\r\n-----------------------------------------------------------------\r\nOk lanjut ke Bpk Direktur Utama ..thnx!\r\n-----------------------------------------------------------------\r\nAda masukan dari saya talinya pake karet aja!..\r\n-----------------------------------------------------------------\r\nSudah saya perbaiki pak...mohon approvalnya..\r\nterima kasih banyak..\r\n-----------------------------------------------------------------\r\nOk welldone! naik produksi...\r\n-----------------------------------------------------------------', 0, 'product', '05/01/2016 01:57:07', '05/17/2016 12:09:44', 1, 2, '1462042627.jpg', 1, 1, 1, 1, 1),
(12, 'Catalog bulan Mei 2016', 'Catalog ini akan digunakan untuk menampilkan produk-produk Tatuis beserta harga, catalog ini akan di bagian kepada distributor dan client-client tatuis.', 'Warna merahnya sesuai corporate color ya..\r\n--------------------------------------------------------------------------\r\n#MKT : Sudah saya ganti pak....mohon di cek. thnx\r\n--------------------------------------------------------------------------\r\nOk..lanjut ke bpk ya,\r\n--------------------------------------------------------------------------\r\nCoba direnggangin sedkit gambarnya...\r\n--------------------------------------------------------------------------\r\nSudah pak...mohon approvalnya\r\n--------------------------------------------------------------------------\r\nOke .. naik cetak ya!\r\n--------------------------------------------------------------------------', 0, 'catalog', '05/01/2016 04:27:16', '05/01/2016 04:42:50', 3, 2, '1462052133.jpg', 1, 1, 0, 1, 1),
(13, 'Iklan Majalah Female', 'Iklan majalah femele edisi 27, dengan nilai ikilan Rp. 5.000.000', 'Kalo bisa ditambahkan facebook dan twitter\r\n----------------------------------------------------------------------------\r\nok pak sudah\r\n-----------------------------------------------------------------------------\r\nok, lanjut ke bpk direktur utama\r\n-----------------------------------------------------------------------------\r\nApakah warnanya sudah sesuai dengan corporate colour kita ?\r\n--------------------------------------------------------------------------------------\r\nSudah pak, sudah saya pastikan\r\n--------------------------------------------------------------------------------------\r\nOk! naik tayang ya!\r\n--------------------------------------------------------------------------------------', 0, 'promomaterials', '05/01/2016 12:15:16', '05/01/2016 12:27:18', 3, 2, '1462079716.jpg', 1, 1, 0, 1, 1),
(14, 'Tiara 193', '<p>Harga-Harga Raw Material  &nbsp; <br>Bahan Rayon Print &nbsp; 15.500 &nbsp; Yard<br>Bahan Hero &nbsp; 8.833 &nbsp; Yard<br>Bahan Ceruti &nbsp; 14.500 &nbsp; Yard<br>Sleting ykk &nbsp; 3.769 &nbsp; Yard<br>Benang Jahit &nbsp; 2 &nbsp; Yard<br>Benang Karet &nbsp; 230 &nbsp; <br>Karet Kepala &nbsp; 475 &nbsp; <br>Karet Rok &nbsp; 307 &nbsp; <br><br></p>', 'ok!', 0, 'product', '05/03/2016 10:25:53', '05/03/2016 10:30:40', 3, 2, '1462289153.jpg', 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `pic` varchar(20) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `published` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `name`, `telp`, `pic`, `cp`, `address`, `norek`, `description`, `published`, `status`) VALUES
(1, 'SION', '(021) 380-739', 'Ayens', '', '', 'BCA a/n Ong Vianny Ongkowidjaya 369.301.9300', '<p>Katun, Rayon, Asahi<br><br></p>', 1, 1),
(2, 'Youbel Union (Karuniatex)', '(021) 380-4225/(021) 7054-4118', 'Linda,Evi', '', '', 'BCA a/n K.Merry 396.018.3888 / Mandiri a/n Daud Cornelius 121.001.133.3881\r\n', '<p>Katun, Rayon<br></p>', 1, 1),
(3, 'NEWSONA', '(021) 7076-7054', 'Lia', '', '', 'BCA a/n Kishore K D Raisinghani 369.108.4556\r\n', '<p>Satin/Tafeta<br></p>', 1, 1),
(4, 'Multi Sandang', '(021) 390-8862', 'Yati', '', '', 'BCA a/n Hendra Soegianto 369.300.9380\r\n', '<p>Silky Nilon<br></p>', 1, 1),
(5, 'Ashok-D', '', '', '', '', 'BCA a/n Ashok D Mahtani 093.108.8075\r\n', '<p>Cerruti<br><br></p>', 1, 1),
(6, 'Asiantex', '(021) 9322-2389/(021) 391-6138', 'San-san', '', '', '', '<p>Mandiri a/n Benny K 121.000.494.7119<br><br></p>', 1, 1),
(7, 'Sundjaya', '(021) 3192-4081', 'Ci Vera', '', '', 'BCA a/n Don Sudianto 369-116-7982\r\n', '<p>Parasit, Abutai<br><br></p>', 1, 1),
(8, 'PT. Ever Shine Tex Tbk', '(0251) 865-2412', 'Ida', '', '', 'BCA a/n Ever Shinetex PT 028.308.3389\r\n', '<p>Kain ( Parasit )<br></p>', 1, 1),
(9, 'Asia Garment', '(021) 2357-1818', 'Erni', '', '', 'BCA a/n Bong Hoi Siong 160.751.9919\r\n', '<p>Renda<br><br></p>', 1, 1),
(10, 'Cindy Renda', '(021) 314-5566', 'Simon', '', '', 'BCA a/n Thio Andhi 162-301-2470\r\n', '<p>Renda<br><br></p>', 1, 1),
(11, 'Cendana', '(021) 659-9391', 'Mba Yuni', '', '', 'BCA a/n Vivi Cendana Mariadi 001.601.3221\r\n', '<p>Renda<br><br></p>', 1, 1),
(12, 'Renda Buana ', '(021) 316-0390', 'Pak Ridwan', '', '', 'BCA a/n Hilda Cokrojoyo 065.676.5555\r\n', '<p>Renda<br><br></p>', 1, 1),
(13, 'Surya Jaya', '(021) 345-4581', 'Mba Yanti', '', '', 'BCA a/n Tjioe Mariska Suryanti 626.015.6789\r\n', '<p>Karet Putra<br><br></p>', 1, 1),
(14, 'Damai', '(021) 3193-0064', 'Mba Nurma', '', '', 'BCA a/n Lam Khian Fo 369.600.8900\r\n', '<p>Karet Rok<br><br></p>', 1, 1),
(15, 'YKK Timur', '(021) 690-3308', '', '', '', 'BCA a/n Linggar Savitri C 001-303-4513\r\n', '<p>Sleting YKK<br><br></p>', 1, 1),
(16, 'Fajar Baru', '(021) 314-1451', '', '', '', 'BCA a/n Setiandy Sanjaya 028.149.0655\r\n', '<p>Trikot utk Sajadah<br><br></p>', 1, 1),
(17, 'Empat Delapan', '(021) 314-0764/(021) 315-4848', '', '', '', 'BCA a/n Cikian Andi 004.106.0131 / Mandiri a/n Cikian Andi 121.003.154.8484\r\n\r\n ', '<p>Alat Konfeksi, pita</p><p>benang, kancing DLL<br><br><br></p>', 1, 1),
(18, 'Doa Bunda', '(021) 3261-8948', '', '', '', 'BCA a/n H Tri Murti 287.218.7759\r\n', '<p>Gagang Tas<br><br></p>', 1, 1),
(19, 'Timbul Jaya', '(021) 690-1511', '', '', '', 'BCA a/n Sentosa Hiday BDN TMB JY 530.004.2483\r\n', '<p>Kertas Marker<br><br></p>', 1, 1),
(20, 'PD Putra Labelindo Print', '(021) 9228-0275', '', '', '', 'BCA a/n Kenny Gunthoro 313.109.3061\r\nBCA a/n Pinkan Wijaya Ang 004.121.7811\r\n', '<p>Label &amp; Hantag<br><br></p>', 1, 1),
(21, 'UD. Sumber Rezeki', '0818-725-631', '', '', '', '', '<p>Rak Besi DLL<br><br></p>', 1, 1),
(22, 'Indah Plastik', '(021) 9516-8687', 'Yunita Liem', '', '', 'BCA a/n Yunita 533-500-1939\r\n', '<p>Plastik<br></p>', 1, 1),
(23, 'Toko Pelangi', '(0251) 798-3318', '', '', '', 'BCA a/n Wong Tjhomg Miauw 091-117-9015\r\n', '<p>Karton Duplex<br><br></p>', 1, 1),
(24, 'JNE', '(0251) 215-6156', '', '', '', 'BCA a/n Tiki Jalur Nugraha EkaKu 738.016.0701\r\n', '<p>Expedisi<br><br></p>', 1, 1),
(25, 'PT. Indah Logistik', '0858-1086-1410', 'Lina', '0858-1086-1410', '', '', '<p>Expedisi<br><br></p>', 1, 1),
(26, 'Grafika Mardiyuana', '(0251) 832-5074 / (0251) 832-0', 'Euis', '', '', 'BCA a/n Franciscus Xaverius Sutanta 737.025.9695\r\n', '<p>Cetak Katalog<br><br></p>', 1, 1),
(27, 'Nizzy', '(0251) 832-7719', 'Pak Adi', '', '', 'BCA a/n Heryadi 737.017.4606\r\n', '<p>Percetakan<br><br></p>', 1, 1),
(28, 'Majalah UMMI', '(021) 819-3242', 'Jefri', '', '', 'BCA a/n Insan Media Pratama PT 580.014.6111\r\n', '<p>Iklan Majalah<br><br></p>', 1, 1),
(29, 'Sinar Kencana ', '(021) 641-1937', '', '', '', 'BCA a/n bang Sui Fong 487. 030. 2199 \r\n', '<p>Benang</p>', 1, 1),
(30, 'Serba Indah ', '(021) 345- 3859 ', '', '', '', '', '', 1, 1),
(31, 'Toko 129 Jakarta ', '0878-2298-1229', '', '0878-2298-1229', '', 'BCA a/n Adi Cahaya 157. 143. 1888\r\n', '<p>Spandex (In ) <br><br></p>', 1, 1),
(32, 'Mutiara Renda ', '', '', '', '', 'Mandiri a/n Suharianto Tjoa . 121.00.8188811.1\r\nBCA a/n Suharianto Tjoa . 546. 011. 8133\r\n', '<p>Renda Mutiara <br><br></p>', 1, 1),
(33, 'Toko Mir ', '', '', '', '', 'BCA a/n Tjen Lie Djoe. 001. 140 . 6474 \r\n', '<p><u></u>Bahan Ceruti <br><u></u><br></p>', 1, 1),
(34, 'PT. Media Cahaya Abadi ', '', '', '', '', 'BRI 113. 401. 000.100.301 \r\n', '<p>Global Phone <br><br></p>', 1, 1),
(35, 'Toko Syafira ', '(021) 9300-7179', '', '', '', 'BCA a/n Yaseth Tjoa  6050. 0858.89 \r\n', '<p>Safira Renda <br><br></p>', 1, 1),
(36, 'Ammira  ( Bandung ) ', '', '', '', '', 'BCA . Elvia Widyadipradia . 282.007.771.1 \r\n', '<p>Bahan Ceruti <br><br></p>', 1, 1),
(37, 'Ramatex ', '', '', '', '', 'BCA.  Sutrisna Tirtadinata 001.373.4132 \r\n', '<p>Bahan Ceruti / Satin<br><br></p>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `department` int(11) NOT NULL,
  `image` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `level`, `department`, `image`, `keterangan`, `status`) VALUES
(1, 'admin', 'admin', 'Administrator', 1, 1, '1462029049.png', 'We are can do anything!', 0),
(2, 'dir001', '123456', 'Direktur Utama', 3, 9, '1462006639.png', 'Sebagai board of directors', 0),
(3, 'mkt_dept', '123456', 'Spv Marketing', 2, 2, '1462029348.png', 'Marketing Department', 0),
(4, 'dir002', '123456', 'Direktur Operational', 3, 9, '1462029496.png', 'Direktur Operational', 0),
(5, 'mkt_dept2', '123456', 'Staff Marketing', 2, 2, '1462029579.png', 'Marketing Department', 0),
(6, 'purchasing001', '123456', 'Staff Purchasing', 2, 3, '1462029742.png', 'Purchasing Department', 0),
(7, 'opr_dept001', '123456', 'Spv Operational', 2, 4, '1462029813.png', 'Operations Department', 0),
(8, 'opr_dept002', '123456', 'Quality Control', 2, 4, '1462029932.png', 'Operational Department', 0),
(9, 'wrhouse_dept001', '123456', 'Staff Gudang', 2, 5, '1462030046.jpg', 'Warehousing Department', 0),
(10, 'fnc_dept001', '123456', 'Staff Finance', 2, 6, '1462030111.jpg', 'Finance Department', 0),
(11, 'acc_dept001', '123456', 'Staff Accounting', 2, 7, '1462030217.jpg', 'Accounting Department', 0),
(12, 'mngr_opr', '123456', 'Manager Operational', 3, 10, '1462206397.jpg', '', 0),
(13, 'mngr_fn', '123456', 'Finance Manager', 2, 6, '1464770628.jpg', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
