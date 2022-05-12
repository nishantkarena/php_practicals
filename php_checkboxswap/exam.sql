-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 06:34 AM
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
(73, 'Checkbox9', ''),
(74, 'Checkbox6', ''),
(75, 'Checkbox7', ''),
(76, 'Checkbox3', ''),
(77, 'Checkbox4', ''),
(78, 'Checkbox5', ''),
(79, 'Checkbox1', ''),
(80, 'Checkbox2', ''),
(81, 'Checkbox1', ''),
(82, 'Checkbox2', ''),
(83, 'Checkbox3', ''),
(84, 'Checkbox4', ''),
(85, 'Checkbox3', ''),
(86, 'Checkbox4', ''),
(87, 'Checkbox5', ''),
(88, 'Checkbox6', ''),
(89, 'Checkbox7', ''),
(90, 'Checkbox6', ''),
(91, 'Checkbox7', ''),
(92, 'Checkbox8', ''),
(93, 'Checkbox6', ''),
(94, 'Checkbox7', ''),
(95, 'Checkbox8', ''),
(96, 'Checkbox6', ''),
(97, 'Checkbox7', ''),
(98, 'Checkbox8', ''),
(99, 'Checkbox1', ''),
(100, 'Checkbox8', ''),
(101, 'Checkbox9', ''),
(102, 'checkbox4', ''),
(103, 'Checkbox4', ''),
(104, 'Checkbox5', ''),
(105, 'Checkbox6', ''),
(106, 'Checkbox7', ''),
(107, 'Checkbox8', ''),
(108, 'Checkbox9', ''),
(109, 'Checkbox7', ''),
(110, 'Checkbox8', ''),
(111, 'Checkbox9', ''),
(112, 'Checkbox8', ''),
(113, 'Checkbox9', ''),
(114, 'Checkbox10', ''),
(115, 'Checkbox8', ''),
(116, 'Checkbox9', ''),
(117, 'Checkbox10', ''),
(118, 'Checkbox8', ''),
(119, 'Checkbox9', ''),
(120, 'Checkbox10', ''),
(121, 'Checkbox8', ''),
(122, 'Checkbox9', ''),
(123, 'Checkbox10', ''),
(124, 'Checkbox8', ''),
(125, 'Checkbox9', ''),
(126, 'Checkbox10', ''),
(127, 'Checkbox8', ''),
(128, 'Checkbox9', ''),
(129, 'Checkbox10', ''),
(130, 'Checkbox8', ''),
(131, 'Checkbox9', ''),
(132, 'Checkbox10', ''),
(133, 'Checkbox8', ''),
(134, 'Checkbox9', ''),
(135, 'Checkbox10', ''),
(136, 'Checkbox5', ''),
(137, 'Checkbox6', ''),
(138, 'Checkbox7', ''),
(139, 'Checkbox7', ''),
(140, 'Checkbox5', ''),
(141, 'Checkbox6', ''),
(142, 'Checkbox7', ''),
(143, 'Checkbox5', ''),
(144, 'Checkbox6', ''),
(145, 'Checkbox7', ''),
(146, 'Checkbox5', ''),
(147, 'Checkbox6', ''),
(148, 'Checkbox7', ''),
(149, 'Checkbox5', ''),
(150, 'Checkbox6', ''),
(151, 'Checkbox7', ''),
(152, 'Checkbox5', ''),
(153, 'Checkbox6', ''),
(154, 'Checkbox7', ''),
(155, 'Checkbox5', ''),
(156, 'Checkbox6', ''),
(157, 'Checkbox7', ''),
(158, 'Checkbox5', ''),
(159, 'Checkbox6', ''),
(160, 'Checkbox7', ''),
(161, 'Checkbox5', ''),
(162, 'Checkbox6', ''),
(163, 'Checkbox7', ''),
(164, 'Checkbox5', ''),
(165, 'Checkbox6', ''),
(166, 'Checkbox7', ''),
(167, 'Checkbox5', ''),
(168, 'Checkbox6', ''),
(169, 'Checkbox7', ''),
(170, 'Checkbox5', ''),
(171, 'Checkbox6', ''),
(172, 'Checkbox7', ''),
(173, 'Checkbox5', ''),
(174, 'Checkbox6', ''),
(175, 'Checkbox7', ''),
(176, 'Checkbox1', ''),
(177, 'Checkbox2', ''),
(178, 'Checkbox3', ''),
(179, 'Checkbox4', ''),
(180, 'Checkbox1', ''),
(181, 'Checkbox2', ''),
(182, 'Checkbox3', ''),
(183, 'Checkbox4', ''),
(184, 'Checkbox1', ''),
(185, 'Checkbox2', ''),
(186, 'Checkbox1', ''),
(187, 'Checkbox2', ''),
(188, 'Checkbox1', ''),
(189, 'Checkbox2', ''),
(190, 'Checkbox1', ''),
(191, 'Checkbox1', ''),
(192, 'Checkbox2', ''),
(193, 'Checkbox3', ''),
(194, 'Checkbox4', ''),
(195, 'Checkbox3', ''),
(196, 'Checkbox4', ''),
(197, 'Checkbox3', ''),
(198, 'Checkbox4', ''),
(199, 'Checkbox3', ''),
(200, 'Checkbox4', ''),
(201, 'Checkbox5', ''),
(202, 'Checkbox6', ''),
(203, 'Checkbox3', ''),
(204, 'Checkbox4', ''),
(205, 'Checkbox5', ''),
(206, 'Checkbox6', ''),
(207, 'Checkbox3', ''),
(208, 'Checkbox4', ''),
(209, 'Checkbox5', ''),
(210, 'Checkbox6', ''),
(211, 'Checkbox7', ''),
(212, 'Checkbox3', ''),
(213, 'Checkbox4', ''),
(214, 'Checkbox5', ''),
(215, 'Checkbox6', ''),
(216, 'Checkbox7', ''),
(217, 'Checkbox3', ''),
(218, 'Checkbox4', ''),
(219, 'Checkbox5', ''),
(220, 'Checkbox6', ''),
(221, 'Checkbox7', ''),
(222, 'Checkbox3', ''),
(223, 'Checkbox4', ''),
(224, 'Checkbox5', ''),
(225, 'Checkbox6', ''),
(226, 'Checkbox7', ''),
(227, 'Checkbox3', ''),
(228, 'Checkbox4', ''),
(229, 'Checkbox5', ''),
(230, 'Checkbox6', ''),
(231, 'Checkbox7', ''),
(232, 'Checkbox3', ''),
(233, 'Checkbox4', ''),
(234, 'Checkbox5', ''),
(235, 'Checkbox6', ''),
(236, 'Checkbox7', ''),
(237, 'Checkbox9', ''),
(238, 'Checkbox10', ''),
(239, 'Checkbox9', ''),
(240, 'Checkbox10', ''),
(241, 'Checkbox6', ''),
(242, 'Checkbox7', ''),
(243, 'Checkbox8', ''),
(244, 'Checkbox6', ''),
(245, 'Checkbox7', ''),
(246, 'Checkbox8', ''),
(247, 'Checkbox8', ''),
(248, 'Checkbox9', ''),
(249, 'Checkbox10', ''),
(250, 'Checkbox8', ''),
(251, 'Checkbox9', ''),
(252, 'Checkbox10', ''),
(253, 'Checkbox8', ''),
(254, 'Checkbox9', ''),
(255, 'Checkbox10', ''),
(256, 'Checkbox8', ''),
(257, 'Checkbox9', ''),
(258, 'Checkbox10', ''),
(259, 'Checkbox8', ''),
(260, 'Checkbox9', ''),
(261, 'Checkbox10', ''),
(262, 'Checkbox8', ''),
(263, 'Checkbox9', ''),
(264, 'Checkbox10', ''),
(265, 'Checkbox8', ''),
(266, 'Checkbox9', ''),
(267, 'Checkbox10', ''),
(268, 'Checkbox8', ''),
(269, 'Checkbox9', ''),
(270, 'Checkbox10', ''),
(271, 'Checkbox8', ''),
(272, 'Checkbox9', ''),
(273, 'Checkbox10', ''),
(274, 'Checkbox8', ''),
(275, 'Checkbox9', ''),
(276, 'Checkbox10', ''),
(277, 'Checkbox8', ''),
(278, 'Checkbox9', ''),
(279, 'Checkbox10', ''),
(280, 'Checkbox8', ''),
(281, 'Checkbox9', ''),
(282, 'Checkbox10', ''),
(283, 'Checkbox8', ''),
(284, 'Checkbox9', ''),
(285, 'Checkbox10', ''),
(286, 'Checkbox8', ''),
(287, 'Checkbox9', ''),
(288, 'Checkbox10', ''),
(289, 'Checkbox8', ''),
(290, 'Checkbox9', ''),
(291, 'Checkbox10', ''),
(292, 'Checkbox8', ''),
(293, 'Checkbox9', ''),
(294, 'Checkbox10', ''),
(295, 'Checkbox8', ''),
(296, 'Checkbox9', ''),
(297, 'Checkbox10', ''),
(298, 'Checkbox8', ''),
(299, 'Checkbox9', ''),
(300, 'Checkbox10', ''),
(301, 'Checkbox8', ''),
(302, 'Checkbox9', ''),
(303, 'Checkbox10', ''),
(304, 'Checkbox8', ''),
(305, 'Checkbox9', ''),
(306, 'Checkbox10', ''),
(307, 'Checkbox8', ''),
(308, 'Checkbox9', ''),
(309, 'Checkbox10', ''),
(310, 'Checkbox8', ''),
(311, 'Checkbox9', ''),
(312, 'Checkbox10', ''),
(313, 'Checkbox8', ''),
(314, 'Checkbox9', ''),
(315, 'Checkbox10', ''),
(316, 'Checkbox8', ''),
(317, 'Checkbox9', ''),
(318, 'Checkbox10', ''),
(319, 'Checkbox3', ''),
(320, 'Checkbox5', ''),
(321, 'Checkbox8', ''),
(322, 'Checkbox3', ''),
(323, 'Checkbox5', ''),
(324, 'Checkbox8', ''),
(325, 'Checkbox3', ''),
(326, 'Checkbox5', ''),
(327, 'Checkbox8', ''),
(328, 'Checkbox6', ''),
(329, 'Checkbox7', ''),
(330, 'Checkbox8', ''),
(331, 'Checkbox6', ''),
(332, 'Checkbox7', ''),
(333, 'Checkbox8', '');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `formdata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `formdata`) VALUES
(73, 'checkbox1'),
(76, 'checkbox2'),
(77, 'checkbox3');

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `formdata2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table2`
--

INSERT INTO `table2` (`id`, `formdata2`) VALUES
(62, 'checkbox4'),
(70, 'checkbox5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampledata`
--
ALTER TABLE `sampledata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampledata`
--
ALTER TABLE `sampledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
