-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Aug 02, 2024 at 08:27 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `img` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `price`, `img`) VALUES
(1, 'Black Coffee', 25, 'img-1.png'),
(2, 'Iced Coffee with Milk', 30, 'img-2.png'),
(3, 'Cappuccino', 35, 'img-3.png'),
(4, 'Espresso', 30, 'img-4.png'),
(5, 'Latte', 35, 'img-5.png'),
(6, 'Mocha', 40, 'img-6.png'),
(7, 'Americano', 30, 'img-7.png'),
(8, 'Macchiato', 35, 'img-8.png'),
(9, 'Affogato', 45, 'img-9.png'),
(10, 'Cold Brew', 40, 'img-10.png');

-- --------------------------------------------------------

--
-- Table structure for table `flag`
--

CREATE TABLE `flag` (
  `flag` varchar(80) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flag`
--

INSERT INTO `flag` (`flag`) VALUES
('Flag{Flag2}');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `id_user`, `msg`) VALUES
(1, 1, 'demo'),
(2, 1, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(6) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`) VALUES
(1, 'linh', 'linh@gmail.com', '1234', 'Member'),
(2, 'dummy', 'dummy@gmail.com', '2345', 'Member'),
(3, 'river_shen', 'river_shen@gmail.com', '2345', 'Member'),
(5, 'admin', 'admin@gmail.com', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
