-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2021 at 08:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cedcoss`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `msg` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `fname`, `mname`, `email`, `pass`, `gender`, `dob`, `mobile`, `msg`, `address`, `city`, `zip`) VALUES
(1, 'Satyam Tiwari', 'father', 'mother', 'satyam@gmail.com', '1234', 'male', '2021-02-16', 23254362, 'no', 'jhghjgh', 'nawabo ka sher', 3221),
(2, 'Wahid Hussain', 'father', 'mother', 'wahid@gmail.com', '1234', 'male', '2021-02-16', 23254362, 'no', 'klhgjhjkh jbjihohoj', 'dfg', 65675),
(3, 'ram', 'sfdg', 'sfg', 'satya@gmail.com', '1234', 'male', '2021-02-16', 23254362, 'no', 'rjdufku jkfgh fghf', 'ttfgfg gfg', 67746),
(4, 'sdgds', 'sfdg', 'sfg', 'sgf@gmj.com', '754545', 'male', '2021-02-16', 23254362, 'no', 'ghg hgjg jkgjh jgjh', 'nawabo ka sher', 3254);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
