-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `datax`
--

CREATE TABLE `datax` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datax`
--

INSERT INTO `datax` (`id`, `first_name`, `last_name`, `dob`, `country`, `contact`, `username`, `password`, `profile_picture`) VALUES
(2, 'Aditya Kumar', 'Gupta', '2002-07-11', 'India', '8789490130', '22BCS11354', '$2y$10$4MWEX9W6rJWjqt8TD02zquUZQHCjccgGZwZrrdA8Pe2wU3MjqkO0K', 'uploads/iron-man-robert-downey-ou-1920x1080.jpg'),
(4, 'Abhi', 'Grover', '2003-01-04', 'India', '8077943314', '22BCS12610', '$2y$10$Q7NH1dMbbh7nbFjOJkGNQuacpUvd.MeYz7eWF543TFyqNm.JNqyGm', NULL),
(6, 'Aditya Kumar', 'Gupta', '2002-07-11', 'India', '8789490130', 'Aditya_Kumar_Gupta', '$2y$10$U.lrpNGmXKRkU73O6OFBhu2BuBwgSvwDAIZJBkGH6FcK7V19Mijeq', NULL),
(7, 'Shobhit', 'Sharma', '2024-08-13', 'India', '5345677890', '22BCS10353', '$2y$10$b6XXcRTjRDhbbfLPyiG6Ped9vv0byBV3LRBv2aDYxM6VyswefMULm', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datax`
--
ALTER TABLE `datax`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datax`
--
ALTER TABLE `datax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
