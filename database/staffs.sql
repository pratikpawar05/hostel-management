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
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `s_f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_e_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_type_id` bigint(20) UNSIGNED NOT NULL,
  `s_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`s_id`, `s_f_name`, `s_l_name`, `s_e_mail`, `s_status`, `s_type_id`, `s_password`, `s_created_at`) VALUES
(9, 'Moris', 'admin', 'admin@admin.in', '1', 1, '202cb962ac59075b964b07152d234b70', '2021-02-17 18:30:00'),
(10, 'Ila Clarks', 'Noel Haley', 'kybuhudeso@mailinator.com', '1', 3, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-19 18:30:00'),
(11, 'Aretha Suarez', 'Stella Collins', 'rabit@mailinator.com', '0', 2, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-19 18:30:00'),
(14, 'Charity Frederick', 'Gray Farley', 'lyrako@mailinator.com', '0', 3, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-20 18:30:00'),
(15, 'Aileen Diaz', 'Ariel Cain', 'neme@mailinator.com', '1', 2, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-20 18:30:00'),
(16, 'Barrett Mercado', 'Keiko Crosby', 'hilimygoc@mailinator.com', '0', 2, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-20 18:30:00'),
(17, 'Nicholas Adams', 'Shafira Everett', 'fyjihigino@mailinator.com', '0', 3, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-20 18:30:00'),
(18, 'Sheila Bowen', 'Meredith Harrison', 'fuvodisyk@mailinator.com', '0', 2, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-02-20 18:30:00'),
(19, 'complaint', 'Admin', 'godsevinayak79@gmail.com', '1', 9, '202cb962ac59075b964b07152d234b70', '2021-03-21 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `users_email_unique` (`s_e_mail`),
  ADD KEY `s_type_id` (`s_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `s_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`s_type_id`) REFERENCES `staff_type` (`s_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
