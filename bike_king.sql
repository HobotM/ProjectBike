-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 12:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_king`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_password` varchar(300) NOT NULL,
  `customer_active` tinyint(1) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `customer_email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_password`, `customer_active`, `user_type`, `customer_email`, `first_name`, `last_name`) VALUES
(36, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin', 'admin@gmail.com', '', ''),
(37, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 'user', 'user@gmail.com', '', ''),
(39, 'matt', 'ce86d7d02a229acfaca4b63f01a1171b', 0, 'user', 'matt@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(100) NOT NULL,
  `offer_description` varchar(400) NOT NULL,
  `offer_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_name`, `offer_description`, `offer_price`) VALUES
(2, 'Offer 1', 'Get this amazing Thule ProRide 591 Roof Mounted Bike Rack with a 20% discount all summer 2021. The frame holder and the wheel tray are designed to position the bike correctly in place.', 103),
(3, 'Thule 583 Cable Lock 180cm', 'The Thule 583 Cable Lock is a 180mm long steel cable lock that can be used for additional security. It has an external protective plastic outing coating which makes it durable and guaranteed to last.', 40),
(4, 'CycleCare for 1 Year With Cable Brakes', 'Keep the good times going with our new CycleCare for 1 Year With Cable Brakes. Simply pay a one-off fee either when you collect your new bike, or up to 6 weeks after purchase, and you\'ll be covered for the year.', 25),
(5, 'Halfords Trail Helmet - Medium (54-58cm), Large (58-61cm)', 'The Halfords Trail Helmet combines a lightweight yet durable in-mould construction with sealed padding & an adjustable fit system to deliver a helmet that you\'ll forget you\'re wearing. And the modern design and premium matt finish will have you looking great on every ride.', 50),
(6, 'HardnutZ Silver Carbon Fibre High Vis Helmet (54-62cm)', 'Featuring a great design, the HardnutZ Silver Carbon Fibre High Vis Helmet has 13 reflective panels that light up under the car\'s headlamps - so you\'re sure to stand out when cycling at night! Made from a strong PC outer shell, this helmet also has air vents to keep you cool when riding.', 40),
(7, 'Cateye EL135/LD155 Bike Light Set', 'The Cateye EL135/LD155 Set is an absolute must have for all of those who appreciate safety and they love a good hard working light. Stylish, hassle-free to fit and with 3 different modes available, you are set for any ride.', 15),
(8, 'Ridge Unisex Waterproof Jacket - Fluorescent Yellow', 'Whether for leisure, fitness or commuting this Ridge Unisex Waterproof Jacket - Fluorescent Yellow with removeable hood is perfect for on and off the bike.  A rear zipped pocket is perfect for keeping your essentials safe. The bright colour and reflective details are great for improved visibility and will help keep you safe on the road.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_username` varchar(50) NOT NULL,
  `staff_password` varchar(150) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
