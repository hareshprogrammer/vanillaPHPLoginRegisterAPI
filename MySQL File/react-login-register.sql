-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 12:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `react-login-register`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `last_name`, `email`, `profile`, `password`) VALUES
(1, 'Ranbir', 'Kapoor', 'ranbir@gmail.com', '663058a6627fa_Ranbir_Kapoor_promoting_Brahmastra.jpg', 'c67ac42d2b3de7bc8f5b8505a49f0121'),
(2, 'Aishwarya', 'Rai', 'aishwarya@gmail.com', '663058e5aad91_Aishwarya_Rai_Cannes_2017.jpg', '68a24878cc568766b735c62be5f306ed'),
(3, 'Sahid', 'Kapoor', 'sahid@gmail.com', '6630597043d97_bollywood-actor-shahid-kapoor.jpg', '7476249e693645e61beed0e2d2953f74'),
(4, 'Deepika', 'Padukone', 'deepika@gmail.com', '663059df92321_download.jpg', '23fc6d5934b22f37624e419f80753932'),
(5, 'TEST1', 'TEST1', 'test1@gmail.com', '6639f2cf21225_tanya-ravichandran-4.jpg', 'a3fe2c0b846d21cef58f06284c57f276');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
