-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:08 AM
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
-- Database: `nishant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `hobbies`, `password`) VALUES
(3, 'sahil savaliya', 'sahil@gmail.com', 'Male', 'Cricket,Singing,Swimming', '12345'),
(4, 'Nishant', 'karenanishant9@gmail.com', 'Male', 'Cricket,Singing,Swimming', '12345678'),
(5, 'Hetasvi', 'hetuayer@gmail.com', 'Female', 'Shopping', 'hetu1544'),
(10, 'Miliindaa', 'Milind@gmail.com', 'Male', 'Singing,Swimming,Shopping', 'asdfg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`) VALUES
(7, 'Electronics', 'Yes'),
(9, 'Appliances', 'Yes'),
(10, 'Sports', 'Yes'),
(11, 'Furniture', 'Yes'),
(12, 'Cars', 'No'),
(13, 'test', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `createdbyuser` varchar(255) NOT NULL,
  `active` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `images`, `createdbyuser`, `active`) VALUES
(4, 'Mobile', 7, '1013979002OIP.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(9, 'milind', 7, '668427681image1.jpg', 'testuser@kcsitglobal.com', 'No'),
(10, 'Printer', 7, '2105327420printer.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(11, 'Watch', 7, '1404209439watch.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(12, 'Cells', 7, '1154995609Cells.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(13, 'USB', 7, '233719165Usb.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(14, 'Washing_Machine', 9, '975701425Washing.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(15, 'Fridge', 9, '400900549Fridge.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(16, 'Mixture', 9, '123011515Mixture.jpg', 'testuser@kcsitglobal.com', 'Yes'),
(17, 'demohello', 10, '1217769802image3.png', 'testuser@kcsitglobal.com', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `email`, `password`) VALUES
(1, 'testuser@kcsitglobal.com', 'secret');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
