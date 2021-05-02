-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 11:53 AM
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
  `status` varchar(255) DEFAULT 'pending',
  `cancel_request` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`B_ID`, `B_CHECK_IN_DATE`, `B_CHECK_OUT_DATE`, `NUM_OF_ADULT`, `NUM_OF_CHILD`, `B_CREATION_DATE`, `C_ID`, `ROOM_ID`, `status`, `cancel_request`) VALUES
(65137060321, '2021-03-23 00:00:00', '2021-03-26 00:00:00', 1, 0, '2021-03-06 05:51:37', 17, 'GO-3', 'completed', '0'),
(70520060321, '2021-03-28 00:00:00', '2021-03-30 00:00:00', 1, 0, '2021-03-06 06:05:20', 17, 'GO-1', 'completed', '0'),
(70633060321, '2021-03-28 00:00:00', '2021-03-30 00:00:00', 1, 0, '2021-03-06 06:06:33', 17, 'GO-2', 'completed', '0'),
(73531060321, '2021-03-29 00:00:00', '2021-03-31 00:00:00', 1, 0, '2021-03-06 06:35:31', 17, 'GO-3', 'completed', '0'),
(73828060321, '2021-03-24 00:00:00', '2021-03-28 00:00:00', 2, 1, '2021-03-06 06:38:28', 17, 'FO-4', 'completed', '0'),
(102334040321, '2021-03-05 00:00:00', '2021-03-08 00:00:00', 1, 0, '2021-03-04 09:23:34', 17, 'GO-5', 'completed', '0'),
(102416040321, '2021-03-05 00:00:00', '2021-03-08 00:00:00', 2, 1, '2021-03-04 09:24:16', 17, 'FO-1', 'completed', '0'),
(112004020521, '2021-05-04 00:00:00', '2021-05-09 00:00:00', 1, 0, '2021-05-02 09:20:04', 17, 'GO-1', 'pending', '0'),
(112356020521, '2021-05-11 00:00:00', '2021-05-15 00:00:00', 1, 0, '2021-05-02 09:23:56', 17, 'GO-1', 'pending', '0');

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
