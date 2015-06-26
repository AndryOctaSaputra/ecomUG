-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2015 at 06:59 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_shopping`
--
CREATE DATABASE IF NOT EXISTS `db_shopping` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_shopping`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` longtext NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`(100))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` longtext,
  `id_kategori` longtext,
  `harga` int(11) DEFAULT '0',
  `foto` varchar(20) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `foto`, `detail`) VALUES
(55, 'Asus Maximus V Formula', '33', 3327000, 'mb1155asus.jpg', '<p>Asus Maximus V Formula intel Socket 1155</p>\r\n'),
(58, 'MSI GTX 750 Ti Twin Frozr', '31', 2287000, 'msigtx750.jpg', '<p>&nbsp;MSI GTX 750 Ti Twin Frozr&nbsp;2GB DDR5 N750TI-TF 2GD5/OC (2 Fan) NVidia PCI Exp.</p>\r\n'),
(59, 'intel i7 4790K Box', '24', 4381000, 'inteli74790.jpg', '<p>intel i7 4790K Box (4.0GHz, C8MB, Haswell Series, For Z97 / H97) Intel LGA 1150</p>\r\n'),
(60, 'intel i7 3960X (Box) ', '25', 14168000, 'inteli73960x.jpg', '<p>intel i7 3960X (Box) (3.3Ghz,C15Mb,LGA2011) Intel LGA 2011</p>\r\n'),
(61, 'intel E6600 Core 2 Duo (Tray+Fan) ', '26', 132000, 'intele6600.jpg', '<p>intel E6600 Core 2 Duo (Tray+Fan) (2.4Ghz,C4Mb,Fsb 1066Mhz,Lga 775) intel LGA775</p>\r\n'),
(62, 'AMD Athlon 64 3500+ Tray ', '29', 385000, 'amd64.jpg', '<p>AMD Athlon 64 3500+ Tray (2.2Ghz,512KB) AMD AM2</p>\r\n'),
(63, 'AMD Vishera FX-9590', '28', 3420000, 'amdfx9590.jpg', '<p>AMD Vishera FX-9590 (4.7Ghz Cache 4x2MB 220W) AMD AM3</p>\r\n'),
(64, 'AMD Kaveri A10-7850K ', '27', 2020000, 'amdkave.jpg', '<p>AMD Kaveri A10-7850K FM2+ (Radeon R7 series) 3.9Ghz Cache 2x2MB 95W AMD FM</p>\r\n'),
(65, 'Gigabyte GA-Z97X-Gaming ', '33', 6668000, 'gygbbe.jpg', '<p>Gigabyte GA-Z97X-Gaming G1 WIFI-BK (Black Edition) intel Socket 1150</p>\r\n'),
(66, 'Asus Rampage IV Extreme Intel Socket 2011', '34', 6654000, 'mbasusrem.jpg', '<p>Asus Rampage IV Extreme Intel Socket 2011</p>\r\n'),
(67, 'MSI C847MS-E33 ', '35', 1107000, 'msi775.jpg', '<p>MSI C847MS-E33 (On Board support Intel C847 chipset NM70, DDR3) intel Socket LGA</p>\r\n'),
(68, 'Asus A88X (Bolton D4) (FM2+) CROSSBLADE RANGER ', '36', 2707000, 'asusfm2.jpg', '<p>Asus A88X (Bolton D4) (FM2+) CROSSBLADE RANGER AMD Socket FM2</p>\r\n'),
(69, 'Asus Crosshair V Formula-Z (R.O.G Motherboard)', '37', 3407000, 'mbam3.jpg', '<p>Asus Crosshair V Formula-Z windows 8 Ready AMD Socket AM3</p>\r\n'),
(70, 'Gigabyte GA-E350N', '38', 132000, 'mbgigam2.jpg', '<p>Gigabyte GA-E350N-Win8 (AMD Dual Core E350 1.6Ghz, DDR3, SATA3, USB 3) AMD Socket AM2</p>\r\n'),
(71, 'Corsair CML8GX3M2A1600C9W', '30', 1035000, 'memddr.jpg', '<p>Corsair CML8GX3M2A1600C9W (2x4Gb) Vengeance White PC12800 8GB DDR3</p>\r\n'),
(72, 'Asus R9 290X', '32', 8568000, 'vgraasus.jpg', '<p>Asus R9 290X DirectCU II OC 4Gb 512Bit DDR5 Ati Radeon PCI Exp.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Reza Septa', 'septa@gmail.com', 'Cikarang', '087773456231'),
(2, 'Yanu Darmawan', 'yanu@gmail.com', 'Cibinong', '098709870987');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` longtext,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `detail`) VALUES
(32, 'Radeon Card', ''),
(33, 'Mb. LGA 1155', ''),
(34, 'Mb. LGA 2011', ''),
(35, 'Mb. LGA 775', ''),
(36, 'Mb. AMD FM2', ''),
(37, 'Mb. AMD AM3', ''),
(38, 'Mb. AMD AM2', ''),
(27, 'AMD FM2', ''),
(28, 'AMD AM3', ''),
(29, 'AMD AM2', ''),
(30, 'Memory DDR3', ''),
(31, 'Nvidia Card', ''),
(25, 'Intel LGA 2011', ''),
(26, 'Intel LGA 775', ''),
(24, 'Intel LGA 1155', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2015-06-25', 1),
(2, '2015-06-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 2, 1, 80),
(2, 55, 1, 3327000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `name`, `description`, `price`, `picture`) VALUES
(1, 'View Sonic LCD', '19" View Sonic Black LCD, with 10 months warranty', 250, 'images/lcd.jpg'),
(2, 'IBM CDROM Drive', 'IBM CDROM Drive', 80, 'images/cdrom-drive.jpg'),
(3, 'Laptop Charger', 'Dell Laptop Charger with 6 months warranty', 50, 'images/charger.jpg'),
(4, 'Seagate Hard Drive', '80 GB Seagate Hard Drive in 10 months warranty', 40, 'images/hard-drive.jpg'),
(5, 'Atech Mouse', 'Black colored laser mouse. No warranty', 5, 'images/mouse.jpg'),
(6, 'Nokia 5800', 'Nokia 5800 XpressMusic is a mobile device with 3.2" widescreen display brings photos, video clips and web content to life', 299, 'images/mobile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE IF NOT EXISTS `simpan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(55) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`id`, `gambar`, `keterangan`) VALUES
(10, 'asusfm2.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
