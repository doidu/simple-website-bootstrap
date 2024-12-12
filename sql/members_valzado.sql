-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 05:46 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_valzado`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `fname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `psword` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`) VALUES
(13, 'aeron', 'valzado', 'ron@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2024-10-16 10:34:04'),
(14, 'yosh', 'takamura', 'yoshie@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2024-10-16 11:13:57'),
(20, 'von', 'ang', 'von@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:24:24'),
(21, 'abe', 'ete', 'abe@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:24:40'),
(22, 'eron', 'salonga', 'eron@gamil.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:24:57'),
(23, 'jed', 'cruz', 'jed@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:25:21'),
(24, 'kenjie', 'wu', 'kenjie@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:25:35'),
(26, 'drei', 'mariano', 'drei@gmil.com', '202cb962ac59075b964b07152d234b70', '2024-10-30 12:26:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
