-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2022 at 04:05 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u175492522_reusesale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--


-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `list_id` int(11) NOT NULL,
  `list_productname` varchar(255) NOT NULL,
  `list_description` varchar(950) NOT NULL,
  `list_address` varchar(255) NOT NULL,
  `list_image` varchar(600) NOT NULL,
  `list_publishdate` varchar(20) NOT NULL,
  `list_price` int(255) NOT NULL,
  `list_condition` varchar(255) NOT NULL,
  `list_fueltype` varchar(255) NOT NULL,
  `list_registrationyear` int(255) NOT NULL,
  `list_vehicletype` varchar(255) NOT NULL,
  `list_model` varchar(255) NOT NULL,
  `list_enginecapacity` varchar(255) NOT NULL,
  `list_mileage` varchar(255) NOT NULL,
  `list_brand` varchar(255) NOT NULL,
  `list_transmission` varchar(255) NOT NULL,
  `list_negotiable` varchar(255) NOT NULL,
  `list_phone` int(20) NOT NULL,
  `image_one` mediumtext NOT NULL,
  `image_two` mediumtext NOT NULL,
  `image_three` mediumtext NOT NULL,
  `image_four` mediumtext NOT NULL,
  `image_five` mediumtext NOT NULL,
  `image_six` mediumtext NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- --------------------------------------------------------

--
-- Table structure for table `listing_temp`
--

CREATE TABLE `listing_temp` (
  `list_id` int(11) NOT NULL,
  `list_productname` varchar(255) NOT NULL,
  `list_description` varchar(950) NOT NULL,
  `list_address` varchar(255) NOT NULL,
  `list_image` varchar(600) NOT NULL,
  `list_publishdate` varchar(20) NOT NULL,
  `list_price` int(255) NOT NULL,
  `list_condition` varchar(255) NOT NULL,
  `list_fueltype` varchar(255) NOT NULL,
  `list_registrationyear` int(255) NOT NULL,
  `list_vehicletype` varchar(255) NOT NULL,
  `list_model` varchar(255) NOT NULL,
  `list_enginecapacity` varchar(255) NOT NULL,
  `list_mileage` varchar(255) NOT NULL,
  `list_brand` varchar(255) NOT NULL,
  `list_transmission` varchar(255) NOT NULL,
  `list_negotiable` varchar(255) NOT NULL,
  `list_phone` int(20) NOT NULL,
  `image_one` mediumtext NOT NULL,
  `image_two` mediumtext NOT NULL,
  `image_three` mediumtext NOT NULL,
  `image_four` mediumtext NOT NULL,
  `image_five` mediumtext NOT NULL,
  `image_six` mediumtext NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `u_email` varchar(255) NOT NULL,
  `token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(200) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(300) NOT NULL,
  `u_image` mediumtext NOT NULL,
  `code` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--



--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `listing_temp`
--
ALTER TABLE `listing_temp`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listing_temp`
--
ALTER TABLE `listing_temp`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2324;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
