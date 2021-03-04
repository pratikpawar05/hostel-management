-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 10:28 AM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` varchar(255) NOT NULL,
  `PAYMENT_TYPE` varchar(255) NOT NULL,
  `PAYMENT_METHOD` varchar(255) NOT NULL,
  `PAYMENT_STATUS` varchar(255) NOT NULL,
  `PAYMENT_AMOUNT` varchar(255) NOT NULL,
  `MEAL_ORDER_ID` varchar(255) DEFAULT NULL,
  `B_ID` varchar(255) DEFAULT NULL,
  `STAFF_ID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `PAYMENT_TYPE`, `PAYMENT_METHOD`, `PAYMENT_STATUS`, `PAYMENT_AMOUNT`, `MEAL_ORDER_ID`, `B_ID`, `STAFF_ID`) VALUES
('p102334040321', 'room', 'offline', 'unpaid', '3000', NULL, '102334040321', NULL),
('pay_GiWgUmGfen8kRR', 'room', 'online', 'paid', '2100', NULL, '102416040321', NULL),
('pay_GiWjNCaKjT3XOz', 'room', 'online', 'paid', '2100', NULL, '102659040321', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
