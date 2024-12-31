-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `appointment_date`, `created_at`) VALUES
(1, 3, '2024-08-05', '2024-08-04 10:57:24'),
(2, 3, '2024-08-06', '2024-08-04 10:57:34'),
(3, 3, '2024-08-05', '2024-08-04 11:01:33'),
(4, 1, '2024-08-30', '2024-08-05 08:15:10'),
(5, 4, '2024-08-13', '2024-08-05 14:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'ian muriuki', 'ianmuriuki.inc@gmail.com', 'hmm the experience and services at the place were amazing though the place so feminist.', '2024-08-04 11:37:21'),
(2, 'ian muriuki', 'ianmuriuki.inc@gmail.com', 'hmm i personally liked your services.', '2024-08-04 11:37:57'),
(3, 'pinnah mkam', 'pinnahmkamb@gmail.com', 'my boyfriend told me to never come at that place again.ati its nexpensive,imma guess who\'s now single', '2024-08-04 11:40:39'),
(4, 'pinnah mkam', 'pinnahmkamb@gmail.com', 'my boyfriend told me to never come at that place again.ati its expensive,imma guess who\'s now single', '2024-08-04 11:42:37'),
(5, 'pinnah mkam', 'pinnahmkamb@gmail.com', 'my boyfriend told me to never come at that place again.ati its expensive,imma guess who\'s now single', '2024-08-04 11:43:22'),
(6, 'pinnah mkam', 'pinnahmkamb@gmail.com', 'my boyfriend told me to never come at that place again.ati its expensive,imma guess who\'s now single', '2024-08-04 11:49:46'),
(7, 'ian muriuki', 'ianmuriuki.inc@gmail.com', 'i liked the services at your place.', '2024-08-05 08:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'ian muriuki', 'ianmuriuki.inc@gmail.com', '$2y$10$VsvT3/hkf31tmGY9dqr0e.Emu2Cv6.OTgBaFPnpJWx7bX5OAnzHNO', '2024-08-02 20:57:57'),
(2, 'pinnah mkam', 'pinnahmkamb@gmail.com', '$2y$10$Ijk5YVjbNSl/nL3voVc/FeGcsdlfQJM8dhdpeeAsJMWsU6dZ68jOG', '2024-08-02 22:57:50'),
(3, 'milla mish', 'mishmilla@gmail.com', '$2y$10$oURIquh7I8zZ1xa3xmzMMuPImCnY3qcu009SswVcCMfRJLE4Z7cUi', '2024-08-03 11:39:32'),
(4, 'pinnah', 'philipinahmkamburi@gmail.com', '$2y$10$GCgflHP4g9ytFQ4qs/dyLekef3mBEIwFeAQ3EjxzdgMNrCXi.XKjq', '2024-08-05 14:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
