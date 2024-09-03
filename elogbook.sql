-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 10:26 PM
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
(1, 'OLUWASEGUN', 'LAWRENCE', '$2y$10$EIzlhwyiQU4etuTx3etmE.3cyjx8DFmxX7.Yd6B7VOhlyUsb2X/mW', 200591079, 'tunmise', 'ikeja', 'ikeja lagos', 1),
(2, 'Sanni', 'Abdullah', '$2y$10$cQ.DyiSIMGIGzPZCupspCOze1ku9ilbM0xFYTwm9cXWAw8WsiiM8S', 200591123, '', 'Somewhere', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_report`
--

CREATE TABLE `weekly_report` (
  `matric_number` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `monday` text DEFAULT NULL,
  `tuesday` text DEFAULT NULL,
  `wednesday` text DEFAULT NULL,
  `thursday` text DEFAULT NULL,
  `friday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_report`
--

INSERT INTO `weekly_report` (`matric_number`, `id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
(200591079, 1, 'Hello world', 'How are you doing?', 'Im good', 'Is it', 'perfect'),
(200591123, 2, 'Started something today', NULL, NULL, NULL, NULL),
(200591079, 6, NULL, 'Im trying to do something', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_matric_number` (`matric_number`);

--
-- Indexes for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matric_number` (`matric_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekly_report`
--
ALTER TABLE `weekly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD CONSTRAINT `weekly_report_ibfk_1` FOREIGN KEY (`matric_number`) REFERENCES `users` (`matric_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
