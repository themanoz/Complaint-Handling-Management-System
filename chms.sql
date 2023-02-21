-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 05:42 AM
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
-- Database: `chms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `sno` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `dept` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `status_msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`sno`, `email`, `dept`, `title`, `description`, `date`, `status`, `status_msg`) VALUES
(89, 'manojkumarbonala3@gmail.com', 'IT Infra', 'Network issue', 'Routers are not working', '20-09-2022', 'pending', ''),
(90, 'manojkumarbonala3@gmail.com', 'IT Infra', 'Network Issue', 'Router not working', '2022-09-20', 'pending', ''),
(91, 'manojkumarbonala3@gmail.com', 'Electrical', 'Ports issue', 'charging Ports are not working\n', '2022-09-20', 'pending', ''),
(92, 'tarun@gmail.com', 'Medical', 'Health Issue', 'Leg fractured', '2022-09-20', 'pending', ''),
(93, 'tarun@gmail.com', 'Academics', 'Faculty Issue', 'lack of faculty', '2022-09-20', 'pending', ''),
(94, 's170599@rguktsklm.ac.in', 'Medical', 'Doctors', 'no experts\n', '2022-09-21', 'pending', ''),
(95, 's170503@rguktsklm.ac.in', 'IT Infra', 'Network Issue', 'No internet available', '2022-09-21', 'pending', ''),
(96, 'manojkumarbonala3@gmail.com', 'Medical', 'Health Issue', 'Hit by bike ', '2022-09-21', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `sno` int(11) NOT NULL,
  `department` varchar(500) NOT NULL,
  `head` varchar(500) NOT NULL,
  `employee` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`sno`, `department`, `head`, `employee`) VALUES
(1, 'IT Infra', 'Laxmi', 'Rajesh'),
(2, 'Academics ', 'Dean', 'Jashwanth'),
(3, 'Medical', 'Chandra', 'Kumar'),
(4, 'Electrical', 'Rajesh', 'Vijay');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `sno` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `dept` varchar(500) NOT NULL,
  `phno` int(10) NOT NULL,
  `email` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`sno`, `name`, `dept`, `phno`, `email`) VALUES
(1, 'Satish', 'IT infra', 2136472612, 'satish@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sno`, `name`, `email`, `phno`, `password`, `type`) VALUES
(1, 'Manoj', 'mk@gmail.com', 987654347, '1234', 'Student'),
(3, 'Tarun', 'tarun@gmail.com', 2147483647, 'tt@12', 'Admin'),
(4, 'Jai', '', 2147483647, 'jai', 'Admin'),
(5, 'jack', '', 2147483647, '123', 'Student'),
(6, 'sriram', '', 987654342, 'sri', 'Student'),
(7, 'Ron', '', 987659876, 'ron', 'Student'),
(8, 'rocky', '', 2147483647, 'roc', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
