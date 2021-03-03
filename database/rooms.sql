-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:33 PM
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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ROOM_ID` varchar(255) NOT NULL,
  `ROOM_LEVEL` varchar(255) NOT NULL,
  `ROOM_STATUS` varchar(255) NOT NULL,
  `ROOM_TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ROOM_ID`, `ROOM_LEVEL`, `ROOM_STATUS`, `ROOM_TYPE_ID`) VALUES
('FO-1', 'first floor', 'Available', 2),
('FO-2', 'first floor', 'Available', 2),
('FO-3', 'first floor', 'Available', 2),
('FO-4', 'first floor', 'Available', 5),
('FO-5', 'first floor', 'Available', 4),
('FO-6', 'first floor', 'Available', 4),
('FO-7', 'first floor', 'Available', 4),
('GO-1', 'ground floor', 'Available', 1),
('GO-2', 'ground floor', 'Available', 1),
('GO-3', 'ground floor', 'Available', 1),
('GO-4', 'ground floor', 'Available', 5),
('GO-5', 'ground floor', 'Available', 3),
('GO-6', 'ground floor', 'Available', 3),
('GO-7', 'ground floor', 'Available', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ROOM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
