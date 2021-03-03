-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:32 PM
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
  `ROOM_ID` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`B_ID`, `B_CHECK_IN_DATE`, `B_CHECK_OUT_DATE`, `NUM_OF_ADULT`, `NUM_OF_CHILD`, `B_CREATION_DATE`, `C_ID`, `ROOM_ID`) VALUES
(120906030321, '2021-03-04 00:00:00', '2021-03-08 00:00:00', 1, 0, '2021-03-03 11:09:06', 6, 'GO-1'),
(121351030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 0, '2021-03-03 11:13:51', 6, 'FO-4'),
(121406030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 0, '2021-03-03 11:14:06', 6, 'GO-4'),
(122327030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 0, '2021-03-03 11:23:27', 6, 'GO-1'),
(122401030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 0, '2021-03-03 11:24:01', 6, 'GO-2'),
(122410030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 0, '2021-03-03 11:24:10', 6, 'GO-3'),
(140224030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 1, '2021-03-03 13:02:24', 6, 'FO-1'),
(140238030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 1, '2021-03-03 13:02:38', 6, 'FO-2'),
(140241030321, '2021-03-04 00:00:00', '2021-03-07 00:00:00', 1, 1, '2021-03-03 13:02:41', 6, 'FO-3'),
(185548030321, '2021-03-10 00:00:00', '2021-03-14 00:00:00', 2, 2, '2021-03-03 17:55:48', 6, 'FO-4'),
(185559030321, '2021-03-10 00:00:00', '2021-03-14 00:00:00', 2, 2, '2021-03-03 17:55:59', 6, 'GO-4');

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
