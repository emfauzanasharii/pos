-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 07:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('528e0d3da762d3c6840b377966a4531c', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599046373, ''),
('535344f312243ca86da27fded915cb1d', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599035108, 'a:8:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";s:5:"nofak";s:12:"020920000001";s:13:"cart_contents";a:3:{s:32:"96f0c17b8f9ae809ab9bb83b350f1f16";a:10:{s:5:"rowid";s:32:"96f0c17b8f9ae809ab9bb83b350f1f16";s:2:"id";s:13:"8993345845110";s:4:"name";s:13:"Lilin Matador";s:6:"satuan";s:3:"Box";s:6:"harpok";s:4:"4500";s:5:"price";s:4:"5500";s:4:"disc";s:1:"0";s:3:"qty";s:2:"10";s:6:"amount";s:4:"5500";s:8:"subtotal";i:55000;}s:11:"total_items";i:10;s:10:"cart_total";i:55000;}}'),
('59354bdda8b8a3269fe33289c3bb6750', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599062120, 'a:6:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";}'),
('91f81e8785d358d84021a52099d4d2b9', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599038171, 'a:7:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";s:13:"cart_contents";a:3:{s:32:"0d5730ea67f5e47cfb2be3c4d398f559";a:10:{s:5:"rowid";s:32:"0d5730ea67f5e47cfb2be3c4d398f559";s:2:"id";s:13:"8991102987639";s:4:"name";s:6:"Tanggo";s:6:"satuan";s:3:"PCS";s:6:"harpok";s:4:"3000";s:5:"price";s:4:"5000";s:4:"disc";s:1:"0";s:3:"qty";s:1:"2";s:6:"amount";s:4:"5000";s:8:"subtotal";i:10000;}s:11:"total_items";i:2;s:10:"cart_total";i:10000;}}'),
('e13b14adcf232bc78529188c0ff5cefd', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599039060, 'a:7:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";s:13:"cart_contents";a:3:{s:32:"0d5730ea67f5e47cfb2be3c4d398f559";a:10:{s:5:"rowid";s:32:"0d5730ea67f5e47cfb2be3c4d398f559";s:2:"id";s:13:"8991102987639";s:4:"name";s:6:"Tanggo";s:6:"satuan";s:3:"PCS";s:6:"harpok";s:4:"3000";s:5:"price";s:4:"5000";s:4:"disc";s:1:"0";s:3:"qty";s:2:"12";s:6:"amount";s:4:"5000";s:8:"subtotal";i:60000;}s:11:"total_items";i:12;s:10:"cart_total";i:60000;}}'),
('e78921c80f60785546e99f2257eea14f', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599037756, 'a:7:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";s:13:"cart_contents";a:3:{s:32:"0d5730ea67f5e47cfb2be3c4d398f559";a:10:{s:5:"rowid";s:32:"0d5730ea67f5e47cfb2be3c4d398f559";s:2:"id";s:13:"8991102987639";s:4:"name";s:6:"Tanggo";s:6:"satuan";s:3:"PCS";s:6:"harpok";s:4:"3000";s:5:"price";s:4:"5000";s:4:"disc";s:1:"0";s:3:"qty";s:1:"7";s:6:"amount";s:4:"5000";s:8:"subtotal";i:35000;}s:11:"total_items";i:7;s:10:"cart_total";i:35000;}}'),
('f58ca431c8c2e267803547b7814c6be2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599046008, 'a:6:{s:9:"user_data";s:0:"";s:5:"masuk";b:1;s:4:"user";s:5:"admin";s:5:"akses";s:1:"1";s:7:"idadmin";s:1:"1";s:4:"nama";s:5:"Admin";}'),
('fbd438e9723128fed44f644ac8368db8', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1599046214, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `barang_id` varchar(50) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_stok` float DEFAULT '0',
  `barang_min_stok` float DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
('8991102987639', 'Tanggo', 'PCS', 3000, 5000, 98, 5, '2020-09-02 08:03:01', NULL, 42, 1),
('8993345845110', 'Lilin Matador', 'Kotak', 5000, 5500, 50, 2, '2020-09-02 08:27:39', NULL, 40, 1),
('BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 45.7, 1, '2020-07-29 09:04:15', '2020-09-01 14:20:18', 40, 1),
('BR000002', 'gery malkis', 'PCS', 4500, 5000, 80, 1, '2020-07-29 09:04:50', '2020-09-01 11:47:50', 42, 1),
('BR000003', 'minuman', 'Mm', 4000, 4500, 40, 0, '2020-07-29 09:05:37', '2020-09-01 11:50:16', 40, 1),
('BR000004', 'bawang merah', 'Kilogram', 30000, 35000, 50.5, 1, '2020-08-04 05:43:57', '2020-09-01 11:48:24', 40, 1),
('BR000005', 'bawang putih', 'Kg', 35000, 38000, 41.7, 1, '2020-08-04 05:44:36', NULL, 40, 1),
('BR000006', 'shampo pantin', 'PCS', 2300, 2600, 50, 1, '2020-08-28 09:20:14', '2020-09-01 11:41:09', 40, 1),
('BR000007', 'permen', 'PCS', 1000, 1300, 99, 5, '2020-08-28 09:21:36', NULL, 42, 1),
('BR000008', 'Beras Naga Hijau', 'Kg', 9500, 11000, 49, 3, '2020-08-28 09:22:08', NULL, 40, 1),
('BR000009', 'bahan pokok', 'Liter', 10000, 13000, 25, 0, '2020-08-28 09:22:46', '2020-09-01 11:38:00', 40, 1),
('BR000010', 'minyak sanco', 'Liter', 13000, 15000, 40, 2, '2020-08-28 09:23:20', '2020-09-01 14:12:30', 40, 1),
('BR000011', 'gerry salut', 'PCS', 1000, 1300, 50, 3, '2020-08-28 09:24:01', NULL, 42, 1),
('BR000012', 'susu ultra milk', 'PCS', 3000, 4500, 60, 5, '2020-09-01 07:37:40', NULL, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_beli` (
`d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` float DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_jual` (
`d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` float DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(35, '290720000001', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 2.5, 0, 28750),
(36, '290720000001', 'BR000003', 'fanta', 'Botol', 4000, 4500, 4, 0, 18000),
(37, '290720000002', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 2, 0, 23000),
(38, '290720000003', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 5.3, 0, 60950),
(39, '290720000003', 'BR000002', 'gery malkis', 'PCS', 4500, 5000, 5, 0, 25000),
(40, '270820000001', 'BR000005', 'bawang putih', 'Kg', 35000, 20000, 6, 0, 60000),
(41, '270820000001', 'BR000004', 'bawang merah', 'Kg', 30000, 20000, 6, 0, 60000),
(42, '280820000001', 'BR000007', 'permen', 'PCS', 1000, 1300, 1, 0, 1300),
(43, '280820000001', 'BR000002', 'gery malkis', 'PCS', 4500, 5000, 1, 0, 5000),
(44, '280820000001', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 1, 0, 11500),
(45, '280820000001', 'BR000004', 'bawang merah', 'Kg', 30000, 35000, 1, 0, 35000),
(46, '280820000001', 'BR000006', 'shampo pantin', 'PCS', 2300, 2600, 1, 0, 2600),
(47, '280820000001', 'BR000009', 'minyak royal', 'Liter', 10000, 13000, 1, 0, 13000),
(48, '280820000001', 'BR000003', 'fanta', 'Botol', 4000, 4500, 1, 0, 4500),
(49, '280820000001', 'BR000010', 'minyak sanco', 'Liter', 13000, 15000, 1, 0, 15000),
(50, '280820000001', 'BR000008', 'Beras Naga Hijau', 'Kg', 9500, 11000, 1, 0, 11000),
(51, '280820000001', 'BR000005', 'bawang putih', 'Kg', 35000, 38000, 1, 0, 38000),
(52, '280820000002', 'BR000004', 'bawang merah', 'Kilogram', 30000, 35000, 0.4, 0, 14000),
(53, '280820000002', 'BR000005', 'bawang putih', 'Kilogram', 35000, 38000, 1.3, 0, 49400),
(54, '280820000003', 'BR000004', 'bawang merah', 'Kg', 30000, 35000, 0.6, 0, 21000),
(55, '280820000003', 'BR000002', 'gery malkis', 'PCS', 4500, 5000, 1, 0, 5000),
(56, '280820000003', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 2, 0, 23000),
(57, '290820000001', 'BR000004', 'bawang merah', 'Kg', 30000, 35000, 1.5, 0, 52500),
(58, '290820000002', 'BR000004', 'bawang merah', 'Kg', 30000, 35000, 1, 0, 35000),
(59, '290820000002', 'BR000001', 'Beras Naga Merah', 'Kg', 9500, 11500, 1.5, 0, 17250),
(60, '290820000002', 'BR000002', 'gery malkis', 'PCS', 4500, 5000, 10, 0, 50000),
(61, '020920000001', '8991102987639', 'Tanggo', 'PCS', 3000, 5000, 2, 0, 10000),
(62, '020920000001', '8993345845110', 'Lilin Matador', 'Box', 4500, 5500, 1, 0, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
('020920000001', '2020-09-02 08:09:18', 15500, 50000, 34500, 1, 'eceran'),
('270820000001', '2020-08-27 03:40:00', 120000, 150000, 30000, 1, 'eceran'),
('280820000001', '2020-08-28 10:03:30', 136900, 150000, 13100, 1, 'eceran'),
('280820000002', '2020-08-28 11:59:18', 63400, 70000, 6600, 1, 'eceran'),
('280820000003', '2020-08-28 12:02:06', 49000, 50000, 1000, 1, 'eceran'),
('290720000001', '2020-07-29 09:11:16', 46750, 50000, 3250, 1, 'eceran'),
('290720000002', '2020-07-29 09:22:08', 23000, 24000, 1000, 1, 'eceran'),
('290720000003', '2020-07-29 09:28:22', 85950, 100000, 14050, 1, 'eceran'),
('290820000001', '2020-08-29 11:35:34', 52500, 55000, 2500, 1, 'eceran'),
('290820000002', '2020-08-29 12:10:07', 102250, 103000, 750, 1, 'eceran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
`kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(40, 'bahan pokok'),
(41, 'minuman'),
(42, 'Jajan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE IF NOT EXISTS `tbl_retur` (
`retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` float DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE IF NOT EXISTS `tbl_suplier` (
`suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`) VALUES
(1, 'Mirota Kampus', 'Jogja', '08656789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(2, 'Kasir', 'kasir', 'e10adc3949ba59abbe56e057f20f883e', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
 ADD PRIMARY KEY (`barang_id`), ADD KEY `barang_user_id` (`barang_user_id`), ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
 ADD PRIMARY KEY (`beli_kode`), ADD KEY `beli_user_id` (`beli_user_id`), ADD KEY `beli_suplier_id` (`beli_suplier_id`), ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
 ADD PRIMARY KEY (`d_beli_id`), ADD KEY `d_beli_barang_id` (`d_beli_barang_id`), ADD KEY `d_beli_nofak` (`d_beli_nofak`), ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
 ADD PRIMARY KEY (`d_jual_id`), ADD KEY `d_jual_barang_id` (`d_jual_barang_id`), ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
 ADD PRIMARY KEY (`jual_nofak`), ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
 ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
 ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
 ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
