-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 05:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Manoj Kumar', 'manojkumarbonala3@gmail.com', '$2y$10$zo81O5fk9fg8JnZYPqmmTO5nU9fa4JX521JMkRMxFIKeB2sz7u3O2', 0, 'verified'),
(2, 'Kumar', 's170986@rguktsklm.ac.in', '$2y$10$iHia9ANwdGswf2fouxqlUe8EPLVFAvRvHe0WAxz1liS.JjcXaOPtW', 500398, 'verified'),
(3, 'Tarun', 'tarun@gmail.com', '$2y$10$6HZPbqyJ7V/M.rdXYPQh9el1dVhjXeH36yzZVgcfeZmzVg6M3Hs6C', 0, 'verified'),
(4, 'Naveen', 's170599@rguktsklm.ac.in', '$2y$10$NjR95c9X6nWqyIV4b.Wku.SXMxtqdBBMGdiYGSWrkkKCNfJRKxyVu', 0, 'verified'),
(5, 'Priya', 's170503@rguktsklm.ac.in', '$2y$10$ey/YrNdgmGv3iNh4F73sqOiD2TjbgIjOZJO0SUNoinoRaS.YXWtzi', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
