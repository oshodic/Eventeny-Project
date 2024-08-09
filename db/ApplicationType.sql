-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Aug 05, 2024 at 04:53 AM
-- Server version: 9.0.1
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `ApplicationType`
--

CREATE TABLE `ApplicationType` (
  `application_type_id` int NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ApplicationType`
--

INSERT INTO `ApplicationType` (`application_type_id`, `application_type`, `description`) VALUES
(1, 'Food Truck', 'This application is for vendors applying for Food Truck stalls at Foodventeny.'),
(2, 'Music', 'This application is for applying to be a Music vendor at Foodventeny.'),
(3, 'Community Outreach', 'This application is for vendors applying for Community Outreach stalls at Foodventeny.'),
(4, 'Animal Shelters', 'This application is for Animal Shelters applying for vendor stalls at Foodventeny.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ApplicationType`
--
ALTER TABLE `ApplicationType`
  ADD PRIMARY KEY (`application_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ApplicationType`
--
ALTER TABLE `ApplicationType`
  MODIFY `application_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
