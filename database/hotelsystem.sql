-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 07:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `checkin_date` datetime NOT NULL,
  `checkout_date` datetime NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_no` bigint(20) NOT NULL,
  `booking_id` varchar(500) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `c_id`, `checkin_date`, `checkout_date`, `booking_date`, `room_no`, `booking_id`, `payment_status`, `payment_amount`) VALUES
(82, 1, '2021-02-20 19:54:51', '2021-02-22 19:54:51', '2021-02-19 14:25:48', 101, '11100011', 'paid', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_nic` bigint(20) UNSIGNED DEFAULT NULL,
  `c_e_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_dob` date DEFAULT NULL,
  `c_gender` enum('Male','Female','Transgender') COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_type`, `c_f_name`, `c_l_name`, `c_address`, `c_postal_code`, `c_country`, `c_nic`, `c_e_mail`, `c_dob`, `c_gender`, `c_mobile`, `c_city`, `c_password`, `c_created_at`) VALUES
(4, 'International', 'Justina Kent', 'Amela Bass', 'Eos error id dolore  ', 'Ut voluptatem sequi ', 'Autem nesciunt null', NULL, 'qixagaloho@mailinator.com', '2020-07-13', 'Transgender', 'Sunt unde eaque at ', 'Et aute est asperna', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-17 18:30:00'),
(5, 'International', 'Griffith Moss', 'Alexander Compton', 'Ut quia temporibus o ', 'Rem dicta labore rem', 'Officia consequatur', NULL, 'qiqapi@mailinator.com', '1994-09-21', 'Male', 'Et labore sit sint ', 'Doloremque obcaecati', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-17 18:30:00'),
(6, 'Student', 'GODSE', 'HARISHCHANDRA', 'A/P:VIDANI, ', '415523', 'India', NULL, 'VINAYAKGODSE97@GMAIL.COM', '2021-01-27', 'Male', '9404846862', 'Satara', '202cb962ac59075b964b07152d234b70', '2021-02-17 18:30:00'),
(7, 'Student', 'Harishchandra', 'Godse', 'A/p:vidani, ', '415523', 'India', NULL, 'harishgodse973@gmail.com', '2021-02-20', 'Male', '08779961334', 'phaltan', '202cb962ac59075b964b07152d234b70', '2021-02-17 18:30:00'),
(8, 'International', 'Harishchandra', 'Godse', 'A/p:vidani, ', '415523', 'India', NULL, 'harishgodse97@gmail.com', '2021-02-20', 'Male', '08779961334', 'phaltan', 'c20ad4d76fe97759aa27a0c99bff6710', '2021-02-18 18:30:00'),
(9, 'Student', 'Harishchandra', 'Godse', 'A/p:vidani, ', '415523', 'India', NULL, 'harishgodse9@gmail.com', '2021-02-20', 'Male', '08779961334', 'phaltan', '202cb962ac59075b964b07152d234b70', '2021-02-18 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` bigint(10) NOT NULL,
  `room_level` varchar(255) NOT NULL,
  `room_status` varchar(255) NOT NULL,
  `room_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `room_level`, `room_status`, `room_type_id`) VALUES
(1, 101, 'ground floor', 'Available', 1),
(2, 102, 'ground floor', 'Available', 1),
(3, 103, 'ground floor', 'Available', 1),
(4, 104, 'ground floor', 'Available', 1),
(5, 105, 'ground floor', 'Available', 3),
(6, 106, 'ground floor', 'Available', 3),
(7, 107, 'ground floor', 'Available', 3),
(8, 201, 'first floor', 'Available', 2),
(9, 202, 'first floor', 'Available', 2),
(10, 203, 'first floor', 'Available', 2),
(11, 204, 'first floor', 'Available', 2),
(12, 205, 'first floor', 'Available', 4),
(13, 206, 'first floor', 'Available', 4),
(14, 207, 'first floor', 'Available', 4);

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
(4, '30ft', 2, 2, 12000, 'It\'s Ac with double bed room', 'Ac with double bed', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@admin.com', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '2021-02-16 18:30:00', NULL),
(5, 'Germane_Simon', 'fosiq@mailinator.com', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '2021-02-16 18:30:00', NULL),
(6, 'vinayak godse', 'VINAYAKGODSE97@GMAIL.COM', NULL, '62911ad86d6181442022683afb480067', NULL, '2021-02-16 18:30:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `users_email_unique` (`c_e_mail`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
