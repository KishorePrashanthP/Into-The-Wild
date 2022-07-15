-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 09:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safari`
--

-- --------------------------------------------------------

--
-- Table structure for table `safari_1`
--

CREATE TABLE `safari_1` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `locations` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `rating` float NOT NULL,
  `min_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safari_1`
--

INSERT INTO `safari_1` (`id`, `image`, `names`, `locations`, `country`, `category`, `rating`, `min_price`) VALUES
(1, 'ongava.jpg', 'ONGAVA PARK', 'NAMIBIA', 'AFRICA', 'International', 4.5, 90),
(2, 'okavango.jpg', 'OKAVANGO DELTA', 'BOTSWANA', 'AFRICA', 'International', 4.8, 80),
(3, 'nyungwe.jpg', 'NYUNGWE FOREST NATIONAL PARK', 'RWANDA', 'AFRICA', 'International', 4.8, 50),
(4, 'kruger.jpg', 'KRUGER NATIONAL PARK', 'SOUTH AFRICA', 'AFRICA', 'International', 4.7, 10),
(5, 'zambezi.jpg', 'ZAMBEZI RIVER', 'ZAMBIA', 'AFRICA', 'International', 4.1, 40),
(6, 'hwange.jpg', 'HWANGE NATIONAL PARK', 'ZIMBABWE', 'AFRICA', 'International', 4.4, 10),
(7, 'serengeti.jpg', 'SERENGETI ', 'TANZANIA', 'AFRICA', 'International', 4.9, 30),
(8, 'patagonia.jpg', 'PATAGONIA', 'CHILE', 'SOUTH AMERICA', 'International', 4.5, 20),
(9, 'mazaimara.jpg', 'MAZAI MARA', 'NDIRO-ARE ROAD', 'KENYA', 'International', 4.8, 40),
(10, 'ranthombore.jpg', 'RANTHAMBORE NATIONAL PARK', 'RAJASTHAN', 'INDIA', 'National', 4.9, 20),
(11, 'hemis.jpg', 'HEMIS NATIONAL PARK', 'LADAKH', 'INDIA', 'National', 4.8, 20),
(12, 'jimcorbett.jpg', 'JIM CORBETT', 'UTTARAKHAND', 'INDIA', 'National', 4.8, 80),
(13, 'bandhavargh.jpg', 'BANDHAVARGH NATIONAL PARK', 'MADHYA PRADESH', 'INDIA', 'National', 4.5, 60),
(14, 'kanha.jpg', 'KANHA NATIONAL PARK', 'MADHYA PRADESH', 'INDIA', 'National', 4.1, 80),
(15, 'pench.jpg', 'PENCH NATIONAL PARK', 'MADHYA PRADESH', 'INDIA', 'National', 4.4, 30),
(16, 'satpura.jpg', 'SATPURA NATIONAL PARK', 'MADHYA PRADESH', 'INDIA', 'National', 4.8, 20),
(17, 'sasangir.jpg', 'SASAN - GIR WILDLIFE SANCTUARY', 'GUJARAT', 'INDIA', 'National', 4.8, 25),
(18, 'taboda.jpg', 'TABODA NATIONAL PARK', 'MAHARASHTRA', 'INDIA', 'National', 4.5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `safari_1`
--
ALTER TABLE `safari_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `safari_1`
--
ALTER TABLE `safari_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
