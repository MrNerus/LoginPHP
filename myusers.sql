-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 04:55 AM
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
-- Database: `myusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `item_Code` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `ppu` decimal(15,2) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`item_Code`, `item_name`, `ppu`, `qty`, `description`, `image`) VALUES
(2, 'Potato', 160.00, 20, 'This is a potato\" ', 'StaticFiles/imgs/2.jpg'),
(3, 'Sugar', 150.00, 300, 'Cubical Sugar.', 'StaticFiles/imgs/3.jpg'),
(4, 'Wai Wai', 20.00, 150, 'Wai Wai Noodle', 'StaticFiles/imgs/4.jpg'),
(5, 'Laptop', 20000.00, 3, 'aptop', 'StaticFiles/imgs/5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userdatas`
--

CREATE TABLE `userdatas` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdatas`
--

INSERT INTO `userdatas` (`u_id`, `fname`, `lname`, `email`, `phno`, `dob`, `gender`) VALUES
(4, 'a', 'b', 'aaa@a.com', '9876543210', '2000-01-01', 'M'),
(5, 'Ard', 'Nerus', 'mr.ard.nerus@gmail.com', '9876543210', '2002-10-12', 'M'),
(6, 'Demo', 'User', 'DemoUser@localhost.com', '+977 (987) 6543210', '1970-01-01', 'Male'),
(7, 'Ard', 'Nerus', 'mrnerus@123.com', '+9779876543210', '1970-01-01', 'Male'),
(8, 'Abishek', 'Sigdel', 'abishek@gmail.com', '+977987543210', '1998-05-22', 'Male'),
(9, 'Ard', 'Nerus', 'mr.ard.nerus@gmail.com', '9840522155', '2002-10-12', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `logType` varchar(5) NOT NULL,
  `logTimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`id`, `u_id`, `logType`, `logTimeStamp`) VALUES
(1, 6, 'LO', '2023-08-04 16:39:26'),
(2, 6, 'LO', '2023-08-04 16:44:10'),
(3, 6, 'LI', '2023-08-04 16:44:21'),
(4, 6, 'LI', '2023-08-05 03:38:41'),
(5, 8, 'LI', '2023-08-06 11:11:04'),
(6, 6, 'LI', '2023-08-20 01:04:19'),
(7, 6, 'LO', '2023-08-20 01:37:23'),
(8, 6, 'LI', '2023-09-28 02:32:19'),
(9, 6, 'LO', '2023-09-28 03:08:54'),
(10, 6, 'LI', '2023-10-04 00:57:51'),
(11, 6, 'SE', '2023-10-04 01:56:24'),
(12, 6, 'LI', '2023-10-04 01:56:34'),
(13, 6, 'SE', '2023-10-04 03:32:17'),
(14, 6, 'LI', '2023-10-04 03:32:26'),
(15, 7, 'LI', '2023-10-08 12:34:43'),
(16, 7, 'LI', '2023-10-11 12:13:10'),
(17, 7, 'SE', '2023-10-11 13:04:12'),
(18, 7, 'LI', '2023-10-11 13:04:50'),
(19, 7, 'SE', '2023-10-11 15:20:48'),
(20, 7, 'LI', '2023-10-11 15:20:55'),
(21, 7, 'LI', '2023-10-12 01:21:58'),
(22, 7, 'LI', '2023-10-12 02:50:17'),
(23, 7, 'LO', '2023-10-12 12:42:51'),
(24, 7, 'LI', '2023-10-12 12:45:05'),
(25, 7, 'LI', '2023-10-12 12:51:20'),
(26, 9, 'LI', '2024-01-18 02:25:32'),
(27, 9, 'SE', '2024-01-18 03:09:51'),
(28, 9, 'LI', '2024-01-18 03:09:57'),
(29, 9, 'LI', '2024-01-19 03:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `userpasswords`
--

CREATE TABLE `userpasswords` (
  `u_id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userpasswords`
--

INSERT INTO `userpasswords` (`u_id`, `password`) VALUES
(4, 'K5m8vG9l1ALko'),
(5, 'K5hZIzk/LPVBg'),
(6, 'K5MHiZ7QRUsdA'),
(7, 'K5MHiZ7QRUsdA'),
(8, 'K5hZIzk/LPVBg'),
(9, 'K5tknOqSTYojw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(4, 'a'),
(8, 'abi'),
(9, 'admin'),
(7, 'demo'),
(6, 'demoUser'),
(5, 'mrnerus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`item_Code`);

--
-- Indexes for table `userdatas`
--
ALTER TABLE `userdatas`
  ADD KEY `fk_userdatas_u_id` (`u_id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_u_id` (`u_id`);

--
-- Indexes for table `userpasswords`
--
ALTER TABLE `userpasswords`
  ADD KEY `fk_u_Id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userdatas`
--
ALTER TABLE `userdatas`
  ADD CONSTRAINT `fk_userdatas_u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD CONSTRAINT `fk_users_u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userpasswords`
--
ALTER TABLE `userpasswords`
  ADD CONSTRAINT `fk_u_Id` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
