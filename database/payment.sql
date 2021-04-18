-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 03:18 PM
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
('p064442060321', 'room', 'offline', 'unpaid', '1500', NULL, '064442060321', '9'),
('p064703060321', 'room', 'offline', 'paid', '1500', NULL, '064703060321', '9'),
('p065137060321', 'room', 'offline', 'unpaid', '1500', NULL, '065137060321', '9'),
('p070520060321', 'room', 'offline', 'unpaid', '1000', NULL, '070520060321', '9'),
('p070633060321', 'room', 'offline', 'unpaid', '1000', NULL, '070633060321', '9'),
('p102334040321', 'room', 'offline', 'paid', '3000', NULL, '102334040321', '9'),
('pay_GiWgUmGfen8kRR', 'room', 'online', 'paid', '2100', NULL, '102416040321', NULL),
('pay_GiWjNCaKjT3XOz', 'room', 'online', 'paid', '2100', NULL, '102659040321', NULL),
('pay_GjGsVNnKLEXjs2', 'room', 'online', 'paid', '1000', NULL, '073531060321', NULL),
('pay_GjGvcotbhqNVsm', 'room', 'online', 'paid', '6000', NULL, '073828060321', NULL);

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
