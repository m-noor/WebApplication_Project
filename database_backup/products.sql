-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 09:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outdoor_adventures_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `product_description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `image_name`, `product_description`, `price`) VALUES
(1, 'backpack.jpg', 'JanSport Right Pack', 20),
(2, 'bike.jpg', 'GT Bike', 250),
(3, 'carabiner.jpg', 'Black Diamond - high-quality carabiner', 30),
(4, 'compass.png', 'Compass - designed and made in-house', 50),
(5, 'fishing-reel.jpg', 'Shimano Fishing reel', 300),
(6, 'hiking-shoes.jpg', 'Cabela\'s GORE-TEX Hiking Shoes', 80),
(7, 'jackknife.jpg', 'Old Timer Knife', 20),
(8, 'snowboard.jpg', 'Airhead Snowboard', 40),
(9, 'sunglasses.jpg', 'Bolle King Polarized Sunglasses', 100),
(10, 'tent.jpg', 'Kodiak Canvas Deluxe Tent', 600),
(11, 'towels.jpg', 'Sea To Summit Large Tek Towel', 20),
(12, 'tripod.jpg', 'Vanguard Espod Tripod', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`),
  ADD UNIQUE KEY `product_ID` (`product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
