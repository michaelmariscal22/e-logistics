-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 05:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'To Be Approve',
  `pick_up` date DEFAULT NULL,
  `pick_up_time` time DEFAULT NULL,
  `real_pick_up` date DEFAULT NULL,
  `real_pick_up_time` time DEFAULT NULL,
  `driver_id` int(11) NOT NULL,
  `est` date DEFAULT NULL,
  `est_time` time DEFAULT NULL,
  `real_est` date DEFAULT NULL,
  `real_est_time` time DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `tracking_id` varchar(255) DEFAULT NULL,
  `parcel_location` varchar(255) NOT NULL DEFAULT 'not-defined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `fullname`, `address`, `contact`, `sender_id`, `status`, `pick_up`, `pick_up_time`, `real_pick_up`, `real_pick_up_time`, `driver_id`, `est`, `est_time`, `real_est`, `real_est_time`, `weight`, `rate`, `tracking_id`, `parcel_location`) VALUES
(1, 'Aiza Landero', 'Pardo, Cebu City', '09234235344', 3, 'Delivered', '2022-05-19', '16:06:00', '2022-05-19', '16:12:34', 2, '2022-05-19', '16:27:00', '2022-05-19', '17:37:34', '18', '40', 'DISTANT-6285ca686b900', 'Receiver Location'),
(2, 'John Doe', 'Santander, Cebu', '09345435346', 3, 'Approved', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '10', '30', 'DISTANT-62860a151149f', 'Approved'),
(3, 'Danah Caraca', 'Parian, Cebu City', '09345435435', 3, 'Delivered', '2022-05-20', '09:09:00', '2022-05-19', '18:07:31', 4, '2022-05-19', '16:08:00', '2022-05-19', '18:12:35', '50', '70', 'DISTANT-6286130b56b32', 'Receiver Location');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `report_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `report_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `report_desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `report_name`, `report_email`, `report_desc`, `phone`, `report_id`) VALUES
(1, 'Report User', 'reporter@gmail.com', 'Hi. I just want to report a bug issue in your system. Hi. I just want to report a bug issue in your system.Hi. I just want to report a bug issue in your system. Thanks!', '09345345435', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'U',
  `img` varchar(255) DEFAULT NULL,
  `vehicle` varchar(50) DEFAULT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `user_id` varchar(255) DEFAULT NULL,
  `driver_lic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `email`, `password`, `contact`, `role`, `img`, `vehicle`, `active`, `user_id`, `driver_lic`) VALUES
(1, 'ADMIN', 'Cebu City', 'admin@distant.com', '12341234', '09xxxxxxxxx', 'A', NULL, '-', 'Y', NULL, NULL),
(2, 'John Christopher', 'Balamban, Cebu', 'johnydeep@gmail.com', '12341234', '09258345783', 'D', '4. John Christopher.PNG', 'Motorcycle', 'Y', 'DRIVER-6285c2716579e', '1. Sample License.jpg'),
(3, 'Vincent Sayson', 'Labangon, Cebu City', 'vincentsayson257@gmail.com', '12341234', '09342342353', 'U', '5. Vincent Sayson.png', NULL, 'Y', 'USER-6285c58a15293', NULL),
(4, 'Robert Downey Jr.', 'Compostela, Cebu', 'stark3000@gmail.com', '12341234', '09034543543', 'D', '1. Robert Downey Jr..PNG', 'Truck', 'Y', 'DRIVER-628611e202f75', '2. Sample License.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
