-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 01:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(10) NOT NULL,
  `rname` varchar(30) DEFAULT NULL,
  `age` int(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `lvl` varchar(10) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `rname`, `age`, `course`, `lvl`, `comments`) VALUES
(1, 'vxvsd', 12, 'BSCS', '3rd Year', ''),
(2, 'vxvsd', 12, 'ACT', '1st Year', ''),
(3, 'vxvsd', 15, 'BSIT', '2nd Year', ''),
(4, 'hfghfnb', 67, 'BSCS', '3rd Year', ''),
(5, 'Darwin Salvacion', 23, 'BSCS', '4th Year', 'NIce'),
(6, 'Zyron', 23, 'BSIT', '4th Year', 'da232f'),
(7, 'vxvsd', 23, 'BSIT', '3rd Year', 'fsdasd'),
(8, 'dsdas', 23, 'BSIT', '3rd Year', 'fsfsdfsdfsf'),
(9, 'williamows', 23, 'BSCS', '2nd Year', 'Cool kalang happy kalang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online`
--

CREATE TABLE `tbl_online` (
  `id` int(10) NOT NULL,
  `rname` varchar(30) DEFAULT NULL,
  `age` int(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `lvl` varchar(10) NOT NULL,
  `question11` varchar(5) NOT NULL,
  `question12` varchar(5) NOT NULL,
  `question13` varchar(5) NOT NULL,
  `question14` varchar(5) NOT NULL,
  `question15` varchar(5) NOT NULL,
  `question16` varchar(5) NOT NULL,
  `question17` varchar(5) NOT NULL,
  `question18` varchar(5) NOT NULL,
  `question19` varchar(5) NOT NULL,
  `question20` varchar(5) NOT NULL,
  `question21` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_online`
--

INSERT INTO `tbl_online` (`id`, `rname`, `age`, `course`, `lvl`, `question11`, `question12`, `question13`, `question14`, `question15`, `question16`, `question17`, `question18`, `question19`, `question20`, `question21`) VALUES
(1, 'vxvsd', 12, 'BSCS', '3rd Year', 'SD', 'D', 'D', 'SD', 'D', 'SD', 'D', 'SD', 'D', 'SD', 'SD'),
(2, 'vxvsd', 12, 'ACT', '1st Year', 'SD', 'D', 'SD', 'D', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(3, 'vxvsd', 15, 'BSIT', '2nd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'D', 'D'),
(4, 'hfghfnb', 67, 'BSCS', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(5, 'Darwin Salvacion', 23, 'BSCS', '4th Year', 'SA', 'A', 'A', 'A', 'N', 'A', 'A', 'N', 'A', 'N', 'A'),
(6, 'Zyron', 23, 'BSIT', '4th Year', 'N', 'D', 'A', 'N', 'A', 'N', 'N', 'A', 'N', 'A', 'N'),
(7, 'vxvsd', 23, 'BSIT', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(8, 'dsdas', 23, 'BSIT', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(9, 'williamows', 23, 'BSCS', '2nd Year', 'N', 'A', 'SA', 'A', 'N', 'N', 'A', 'SA', 'A', 'N', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traditional`
--

CREATE TABLE `tbl_traditional` (
  `id` int(10) NOT NULL,
  `rname` varchar(30) DEFAULT NULL,
  `age` int(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `lvl` varchar(10) NOT NULL,
  `question1` varchar(5) NOT NULL,
  `question2` varchar(5) NOT NULL,
  `question3` varchar(5) NOT NULL,
  `question4` varchar(5) NOT NULL,
  `question5` varchar(5) NOT NULL,
  `question6` varchar(5) NOT NULL,
  `question7` varchar(5) NOT NULL,
  `question8` varchar(5) NOT NULL,
  `question9` varchar(5) NOT NULL,
  `question10` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_traditional`
--

INSERT INTO `tbl_traditional` (`id`, `rname`, `age`, `course`, `lvl`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`) VALUES
(1, 'vxvsd', 12, 'BSCS', '3rd Year', 'SD', 'D', 'SD', 'D', 'SD', 'D', 'SD', 'D', 'SD', 'D'),
(2, 'vxvsd', 12, 'ACT', '1st Year', 'SD', 'D', 'N', 'D', 'SD', 'D', 'D', 'SD', 'D', 'SD'),
(3, 'vxvsd', 15, 'BSIT', '2nd Year', 'SD', 'D', 'SD', 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(4, 'hfghfnb', 67, 'BSCS', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(5, 'Darwin Salvacion', 23, 'BSCS', '4th Year', 'SA', 'SA', 'A', 'SA', 'SA', 'SA', 'SA', 'SA', 'SA', 'N'),
(6, 'Zyron', 23, 'BSIT', '4th Year', 'N', 'A', 'N', 'A', 'A', 'A', 'A', 'A', 'N', 'N'),
(7, 'vxvsd', 23, 'BSIT', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(8, 'dsdas', 23, 'BSIT', '3rd Year', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD', 'SD'),
(9, 'williamows', 23, 'BSCS', '2nd Year', 'D', 'SA', 'A', 'N', 'SA', 'N', 'A', 'A', 'SA', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_online`
--
ALTER TABLE `tbl_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_traditional`
--
ALTER TABLE `tbl_traditional`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_online`
--
ALTER TABLE `tbl_online`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_traditional`
--
ALTER TABLE `tbl_traditional`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
