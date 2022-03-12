-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2019 at 12:53 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ikm`
--

DROP TABLE IF EXISTS `tbl_ikm`;
CREATE TABLE IF NOT EXISTS `tbl_ikm` (
  `id_ikm` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_ikm` date NOT NULL,
  `no_kendaraan` varchar(20) NOT NULL,
  `jawaban` varchar(20) NOT NULL,
  `jawaban1` varchar(20) NOT NULL,
  `jawaban2` varchar(20) NOT NULL,
  `jawaban3` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ikm`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ikm`
--

INSERT INTO `tbl_ikm` (`id_ikm`, `tgl_ikm`, `no_kendaraan`, `jawaban`, `jawaban1`, `jawaban2`, `jawaban3`) VALUES
(1, '2019-02-03', '-', '1B,2B,3B', '1B', '2B', '3B'),
(2, '2019-02-03', '-', '1A,2B,3C', '1A', '2B', '3C'),
(3, '2019-02-03', '-', '1B,2B,3B', '1B', '2B', '3B'),
(4, '2019-02-03', '-', '1B,2B,3A', '1B', '2B', '3A'),
(5, '2019-02-03', '-', '1B,2B,3B', '1B', '2B', '3B'),
(6, '2019-02-03', '-', '1B,2B,3B', '1B', '2B', '3B'),
(7, '2019-02-03', '-', '1C,2C,3C', '1C', '2C', '3C'),
(8, '2019-02-03', '-', '1B,2B,3B', '1B', '2B', '3B'),
(9, '2019-02-03', '-', '1B,2B,3B', 'B', 'B', 'B'),
(10, '2019-02-03', '-', '1A,2A,3A', 'A', 'A', 'A'),
(11, '2019-02-03', '-', '1B,2B,3B', 'B', 'B', 'B'),
(12, '2019-02-03', '-', '1A,2A,3A', 'A', 'A', 'A'),
(13, '2019-02-03', '-', '1B,2B,3B', 'B', 'B', 'B'),
(14, '2019-02-04', '-', '1B,2B,3B', 'B', 'B', 'B');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
