-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 02:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `sampledata`
--

CREATE TABLE `sampledata` (
  `id` int(11) NOT NULL,
  `form_data` varchar(255) NOT NULL,
  `form_text_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampledata`
--

INSERT INTO `sampledata` (`id`, `form_data`, `form_text_data`) VALUES
(1, 'Checkbox9,Checkbox10', ''),
(2, 'Checkbox9,Checkbox10', ''),
(3, 'Checkbox9,Checkbox10', ''),
(4, 'Checkbox9,Checkbox10', ''),
(5, 'Checkbox7,Checkbox8,Checkbox9,Checkbox10', ''),
(6, 'Checkbox7,Checkbox8,Checkbox9,Checkbox10', ''),
(7, 'Checkbox6,Checkbox8,Checkbox9', ''),
(8, 'Array', ''),
(9, 'Array', ''),
(10, 'Array', ''),
(11, 'Checkbox8', ''),
(12, 'Checkbox9', ''),
(13, 'Checkbox10', ''),
(14, 'Checkbox8', ''),
(15, 'Checkbox9', ''),
(16, 'Checkbox10', ''),
(17, 'Checkbox8', ''),
(18, 'Checkbox9', ''),
(19, 'Checkbox10', ''),
(20, 'Checkbox8', ''),
(21, 'Checkbox9', ''),
(22, 'Checkbox10', ''),
(23, 'Checkbox8', ''),
(24, 'Checkbox9', ''),
(25, 'Checkbox10', ''),
(26, 'Checkbox8', ''),
(27, 'Checkbox9', ''),
(28, 'Checkbox10', ''),
(29, 'Checkbox8', ''),
(30, 'Checkbox9', ''),
(31, 'Checkbox10', ''),
(32, 'Checkbox8', ''),
(33, 'Checkbox8', ''),
(34, 'Checkbox8', ''),
(35, 'Checkbox8', ''),
(36, 'Checkbox8', ''),
(37, 'Checkbox8', ''),
(38, 'Checkbox8', ''),
(39, 'Checkbox8', ''),
(40, 'Checkbox8', ''),
(41, 'Checkbox8', ''),
(42, 'Checkbox8', ''),
(43, 'Checkbox8', ''),
(44, 'Checkbox8', ''),
(45, 'Checkbox8', ''),
(46, 'Checkbox8', ''),
(47, 'Checkbox8', ''),
(48, 'Checkbox9', ''),
(49, 'Checkbox10', ''),
(50, 'Checkbox8', ''),
(51, 'Checkbox9', ''),
(52, 'Checkbox10', ''),
(53, 'Checkbox8', ''),
(54, 'Checkbox9', ''),
(55, 'Checkbox10', ''),
(56, 'Checkbox8', ''),
(57, 'Checkbox9', ''),
(58, 'Checkbox10', ''),
(59, 'Checkbox8', ''),
(60, 'Checkbox9', ''),
(61, 'Checkbox10', ''),
(62, 'Checkbox8', ''),
(63, 'Checkbox9', ''),
(64, 'Checkbox10', ''),
(65, 'Checkbox8', ''),
(66, 'Checkbox9', ''),
(67, 'Checkbox10', ''),
(68, 'Checkbox6', ''),
(69, 'Checkbox8', ''),
(70, 'Checkbox9', ''),
(71, 'Checkbox6', ''),
(72, 'Checkbox8', ''),
(73, 'Checkbox9', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampledata`
--
ALTER TABLE `sampledata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampledata`
--
ALTER TABLE `sampledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
