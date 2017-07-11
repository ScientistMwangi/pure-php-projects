-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 04:10 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonebook_table`
--

CREATE TABLE `phonebook_table` (
  `id` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonebook_table`
--

INSERT INTO `phonebook_table` (`id`, `number`, `name`) VALUES
(5, 98750965860, 'james Rod'),
(2, 2457845795, 'Susan Akinyi'),
(3, 716084907, 'Samuel Mwangi'),
(4, 716084907, 'Ngima'),
(6, 965860, 'Kim Joash'),
(7, 7362875825, 'Samuel Martin'),
(9, 965860, 'Van Damme'),
(13, 895650707, 'christopherartin1234'),
(11, 876596506, 'Micheal'),
(12, 597680567, 'paul walker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonebook_table`
--
ALTER TABLE `phonebook_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phonebook_table`
--
ALTER TABLE `phonebook_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
