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
-- Table structure for table `tbl_ikm_question`
--

DROP TABLE IF EXISTS `tbl_ikm_question`;
CREATE TABLE IF NOT EXISTS `tbl_ikm_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `question_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ikm_question`
--

INSERT INTO `tbl_ikm_question` (`question_id`, `question`, `question_status`) VALUES
(1, 'Bagaimana kepuasan anda dalam pelayanan uji', 1),
(2, 'Bagaimana keramahan dalam pelayanan uji', 1),
(3, 'Bagaimana kecepatan dalam pelayanan uji', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
