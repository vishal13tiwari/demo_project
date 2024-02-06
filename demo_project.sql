-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 05:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




-- CREATE DATABASE `demo_project`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_user_data`
--

CREATE TABLE `article_user_data` (
  `id_user` int(11) NOT NULL,
  `article_name` text NOT NULL,
  `article_content` varchar(255) NOT NULL,
  `verification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_user_data`
--

INSERT INTO `article_user_data` (`id_user`, `article_name`, `article_content`, `verification`) VALUES
(2, 'Data', 'Admin Demo', 1),
(3, 'Sports', 'Cricket, BasketBall', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `mobile` int(18) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `mobile`, `gender`, `email`, `image`, `password`, `designation`, `status`, `date_added`) VALUES
(1, 'Vishal Tiwari', 123456789, 'male', 'vishal@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2024-02-04 18:16:40'),
(2, 'Ritesh Kumar', 984615, 'male', 'ritesh@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'regular', 1, '2024-02-04 18:17:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_user_data`
--
ALTER TABLE `article_user_data`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_user_data`
--
ALTER TABLE `article_user_data`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
