-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2024 at 09:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elogbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `matric_number` int(11) NOT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `name_of_company` varchar(100) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password_hash`, `matric_number`, `middle_name`, `name_of_company`, `address`, `user_type`) VALUES
(3, 'OLUWASEGUN', 'LAWRENCE', '$2y$10$EIzlhwyiQU4etuTx3etmE.3cyjx8DFmxX7.Yd6B7VOhlyUsb2X/mW', 200591079, 'tunmise', 'ikeja', 'ikeja lagos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_report`
--

CREATE TABLE `weekly_report` (
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `monday` text DEFAULT NULL,
  `tuesday` text DEFAULT NULL,
  `wednesday` text DEFAULT NULL,
  `thursday` text DEFAULT NULL,
  `friday` text DEFAULT NULL,
  `matric_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_report`
--

INSERT INTO `weekly_report` (`user_id`, `id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `matric_no`) VALUES
(1, 1, '                                                            how are you doing?', '                                                            Im okay?', '                                                            Good boy', NULL, NULL, 200591079),
(1, 3, 'Im him', NULL, NULL, NULL, NULL, 200591079);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD UNIQUE KEY `unique_user_week` (`user_id`,`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
