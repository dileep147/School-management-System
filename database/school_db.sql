-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 11:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lg_setting`
--

CREATE TABLE `lg_setting` (
  `id` int(11) NOT NULL,
  `language` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lg_setting`
--

INSERT INTO `lg_setting` (`id`, `language`) VALUES
(1, 'engilsh');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` text NOT NULL,
  `science` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `maths` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `student_id`, `grade`, `science`, `english`, `maths`) VALUES
(1, 8, '6', 30, 40, 20),
(2, 8, '7', 60, 77, 20),
(3, 10, '6', 65, 75, 55),
(4, 13, '6', 77, 77, 77);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `address`, `footer_text`) VALUES
(1, 'Vehicle Managements', 'dhaka', 'footer text');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `initial` varchar(255) CHARACTER SET latin1 NOT NULL,
  `student_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` int(10) NOT NULL,
  `last_log_date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `surname` varchar(500) NOT NULL,
  `user_pic` text NOT NULL,
  `gender` text NOT NULL,
  `log_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `initial`, `student_id`, `password`, `type`, `last_log_date`, `active`, `surname`, `user_pic`, `gender`, `log_status`) VALUES
(1, 'A', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-21 02:52:52', 1, '', '', '', '1'),
(2, 'S ', 'ST 01', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2021-09-21 12:55:00', 1, 'Somarathna', '', 'male', '0'),
(3, 'D', 'ST 02', '202cb962ac59075b964b07152d234b70', 0, '2021-09-21 12:53:29', 1, 'Surangani', '', 'female', '0'),
(4, 'T', 'ST 03', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2021-09-21 12:56:20', 1, 'Gayan', '', 'male', '0'),
(5, 'P ', 'ST 04', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2021-09-21 12:58:52', 1, 'Herath', '', 'male', '0'),
(8, 'O', 'ST 07', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-21 02:49:36', 1, 'Oshini', '', 'female', '0'),
(9, 'G', 'ST 08', '202cb962ac59075b964b07152d234b70', 0, '2021-09-21 01:10:28', 1, 'Kamal', '', 'male', '0'),
(10, 'I', 'St 09', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-21 01:12:44', 1, 'Yamuna', '', 'female', '1'),
(11, 'F', 'ST 10', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-21 02:30:45', 1, 'Fathima', '', 'female', '1'),
(12, 'R ', 'ST 11', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-21 02:38:22', 1, 'Rajapaksha', '', 'male', '0'),
(13, 'T', 'ST 12', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2021-09-21 02:51:10', 1, 'Tharidu', '', 'male', '1');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `values` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lg_setting`
--
ALTER TABLE `lg_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
