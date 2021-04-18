-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 03:17 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `B_ID` bigint(20) NOT NULL,
  `B_CHECK_IN_DATE` datetime NOT NULL,
  `B_CHECK_OUT_DATE` datetime NOT NULL,
  `NUM_OF_ADULT` int(11) NOT NULL,
  `NUM_OF_CHILD` int(11) NOT NULL,
  `B_CREATION_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `C_ID` bigint(20) NOT NULL,
  `ROOM_ID` varchar(500) NOT NULL,
  `status` varchar(255) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`B_ID`, `B_CHECK_IN_DATE`, `B_CHECK_OUT_DATE`, `NUM_OF_ADULT`, `NUM_OF_CHILD`, `B_CREATION_DATE`, `C_ID`, `ROOM_ID`, `status`) VALUES
(64442060321, '2021-03-22 00:00:00', '2021-03-25 00:00:00', 1, 0, '2021-03-06 05:44:42', 17, 'GO-1', 'completed'),
(64703060321, '2021-03-22 00:00:00', '2021-03-25 00:00:00', 1, 0, '2021-03-06 05:47:03', 17, 'GO-2', 'completed'),
(65137060321, '2021-03-23 00:00:00', '2021-03-26 00:00:00', 1, 0, '2021-03-06 05:51:37', 17, 'GO-3', 'completed'),
(70520060321, '2021-03-28 00:00:00', '2021-03-30 00:00:00', 1, 0, '2021-03-06 06:05:20', 17, 'GO-1', 'completed'),
(70633060321, '2021-03-28 00:00:00', '2021-03-30 00:00:00', 1, 0, '2021-03-06 06:06:33', 17, 'GO-2', 'completed'),
(73531060321, '2021-03-29 00:00:00', '2021-03-31 00:00:00', 1, 0, '2021-03-06 06:35:31', 17, 'GO-3', 'completed'),
(73828060321, '2021-03-24 00:00:00', '2021-03-28 00:00:00', 2, 1, '2021-03-06 06:38:28', 17, 'FO-4', 'completed'),
(102334040321, '2021-03-05 00:00:00', '2021-03-08 00:00:00', 1, 0, '2021-03-04 09:23:34', 17, 'GO-5', 'completed'),
(102416040321, '2021-03-05 00:00:00', '2021-03-08 00:00:00', 2, 1, '2021-03-04 09:24:16', 17, 'FO-1', 'completed'),
(102659040321, '2021-03-05 00:00:00', '2021-03-08 00:00:00', 1, 0, '2021-03-04 09:26:59', 17, 'FO-2', 'completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`B_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
