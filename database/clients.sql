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
  `c_nic` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_e_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_dob` date DEFAULT NULL,
  `c_gender` enum('Male','Female','Transgender') COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_otp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_otp_verification_status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `c_created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_type`, `c_f_name`, `c_l_name`, `c_address`, `c_postal_code`, `c_country`, `c_nic`, `c_e_mail`, `c_dob`, `c_gender`, `c_mobile`, `c_city`, `c_password`, `c_otp`, `c_otp_verification_status`, `c_created_at`) VALUES
(4, 'International', 'Justina Kent', 'Amela Bass', 'Eos error id dolore  ', 'Ut voluptatem sequi ', 'Autem nesciunt null', NULL, 'qixagaloho@mailinator.com', '2020-07-13', 'Transgender', 'Sunt unde eaque at ', 'Et aute est asperna', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-17 18:30:00'),
(5, 'International', 'Griffith Moss', 'Alexander Compton', 'Ut quia temporibus o ', 'Rem dicta labore rem', 'Officia consequatur', NULL, 'qiqapi@mailinator.com', '1994-09-21', 'Male', 'Et labore sit sint ', 'Doloremque obcaecati', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-17 18:30:00'),
(6, 'International', 'Shelly Koch', 'Brenda Malone', 'Modi velit et unde c ', 'Laboriosam est quia', 'Nam velit laudantium', NULL, 'admin@admin.com', '1975-10-03', 'Male', 'Ut tenetur error asp', 'Voluptates nihil ips', '5f4dcc3b5aa765d61d8327deb882cf99', 'IHU25', '1', '2021-02-17 18:30:00'),
(7, 'Student', 'Malcolm', 'Gloria', 'Eius quis modi quae  ', '123', 'Possimus magna quod', NULL, 'sufumimi@mailinator.com', '1983-11-01', 'Female', 'Aperiam quia neque q', 'Rem dolorem ad offic', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-17 18:30:00'),
(8, 'Student', 'Steven Sweet', 'Carolyn Clark', 'Deserunt ea aut quae ', 'Aliquid quia soluta ', 'Fugiat qui quia rei', '99', 'pubitexome@mailinator.com', '2004-06-17', 'Male', 'Laborum Hic dolor e', 'Blanditiis delectus', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-18 18:30:00'),
(9, '', 'pratik', 'pawar', '\"VISHWAREKHA\" Plot No. 7, Swami Muktanand Nagar(Board No.4), Bhadgaon Road ', '424101', 'India', '11111111111111', 'icanpratikpawar@gmail.com', '2021-02-26', 'Male', '08830081411', 'Chalisgaon', 'dc1fe64bac63ad21054534afce389e65', NULL, '0', '2021-02-20 18:30:00'),
(10, 'Student', 'Jakeem', 'May', 'In perspiciatis et  ', '17', 'Et do sit pariatur ', 'Velquinostru', 'cukiwip@mailinator.com', '1985-02-09', 'Male', '8830081411', 'Nobis vel exercitati', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-21 18:30:00'),
(11, '', 'Urielle', 'Chantale', 'Architecto alias omn ', '6', 'Consequatur porro c', 'Ealapaun', 'sosuvuhudo@mailinator.com', '2014-03-21', 'Male', '77', 'Quo aspernatur archi', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-21 18:30:00'),
(12, '', 'Unity', 'Berk', 'Rerum ducimus delec ', '100', 'Aut ullam blanditiis', 'Voluptatibu', 'pezerezu@mailinator.com', '2007-04-24', 'Male', '13', 'Consequatur animi ', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-21 18:30:00'),
(13, '', 'Solomon', 'Bird', 'Ut adipisci ducimus ', '87', 'Esse nulla do id sin', 'Illumfugiat', 'xomuto@mailinator.com', '2018-08-17', 'Male', '82', 'Animi eos nemo est ', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '0', '2021-02-21 18:30:00'),
(14, 'Student', 'Lester', 'Alvin', 'Excepteur provident ', '63', 'Ea ', 'Facilis', 'ritep@mailinator.com', '1972-04-20', 'Male', '69', 'Assumenda velit eum', 'b59c67bf196a4758191e42f76670ceba', NULL, '0', '2021-02-21 18:30:00'),
(15, 'International', 'Travis', 'Ocean', 'Sunt irure non lauda', '9', 'Esse saepe voluptati', 'Ametsss', 'qoxit@mailinator.com', '2009-07-02', 'Female', '51', 'Eum unde eu id qui u', '5f4dcc3b5aa765d61d8327deb882cf99', 'nIxUW', '1', '2021-03-02 18:30:00'),
(16, 'Student', 'Rogan', 'Quamar', 'Dignissimos consequa ', '88', 'Eligendi voluptate c', 'Ducimu', 'riqodapu@mailinator.com', '2017-09-22', 'Female', '96', 'Non odit sint omnis', '5f4dcc3b5aa765d61d8327deb882cf99', 'lFBkX', '1', '2021-03-02 18:30:00'),
(17, 'Student', 'GODSE', 'HARISHCHANDRA', 'A/P:VIDANI, ', '415523', 'India', '1111111', 'VINAYAKGODSE97@GMAIL.COM', '2021-03-03', 'Male', '9404846862', 'Satara', '202cb962ac59075b964b07152d234b70', 'wMSgt', '1', '2021-03-03 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `users_email_unique` (`c_e_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
