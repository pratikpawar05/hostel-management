-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 03:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_size` varchar(255) NOT NULL,
  `no_of_beds` int(11) NOT NULL,
  `max_occupancy` int(11) NOT NULL,
  `daily_rate` bigint(20) NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `r_type_name` varchar(255) NOT NULL,
  `monthly_rate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_size`, `no_of_beds`, `max_occupancy`, `daily_rate`, `room_desc`, `r_type_name`, `monthly_rate`) VALUES
(1, '30ft', 1, 1, 500, 'it\'s a single bed room', 'single bed', 20000),
(2, '30ft', 2, 2, 700, 'it\'s double bed room', 'double bed', 30000),
(3, '30ft', 1, 1, 1000, 'it\'s a single be ac room.', 'Ac with single bed', 40000),
(4, '30ft', 2, 2, 1200, 'It\'s Ac with double bed room', 'Ac with double bed', 50000),
(5, '30ft', 2, 6, 1500, 'It\'s family room', 'Family room', 60000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
