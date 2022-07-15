-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 09:31 AM
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
-- Database: `bookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `safari` varchar(50) NOT NULL,
  `people` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardno` varchar(50) NOT NULL,
  `expmonth` varchar(50) NOT NULL,
  `expyear` int(50) NOT NULL,
  `cvv` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`names`, `email`, `safari`, `people`, `amount`, `date`, `cardname`, `cardno`, `expmonth`, `expyear`, `cvv`) VALUES
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 1, 0, '2021-07-15', 'Kishore Prashanth', '2147483647', 'May', 2345, 111),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 1, 0, '2021-07-15', 'Kishore Prashanth', '2147483647', 'May', 2345, 111),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 2, 100, '2021-07-30', 'Kishore Prashanth', '2147483647', 'March', 2345, 111),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 5, 250, '2021-07-18', 'Kishore Prashanth', '2147483647', 'March', 2333, 333),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 1, 50, '2021-07-06', 'Kishore Prashanth', '2147483647', 'January', 2345, 111),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 4, 200, '2021-07-06', 'Kishore Prashanth', '123456789012', 'March', 2345, 111),
('kishore', 'kishorep3105@gmail.com', '', 6, 0, '2021-07-16', 'Kishore Prashanth', '123456789012', 'March', 2345, 234),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 3, 150, '2021-07-30', 'Kishore Prashanth', '123456789012', 'January', 2345, 222),
('kishore', 'kishorep3105@gmail.com', 'NYUNGWE FOREST NATIONAL PARK', 3, 150, '2021-07-30', 'Kishore Prashanth', '123456789012', 'January', 2345, 222),
('Kishore', 'kishorep3105@gmail.com', 'SASAN - GIR WILDLIFE SANCTUARY', 3, 75, '2021-07-31', 'Kishore Prashanth', '123456789012', 'April', 2022, 345),
('Kishore', 'kishorep3105@gmail.com', 'SASAN - GIR WILDLIFE SANCTUARY', 5, 125, '2021-07-29', 'Kishore Prashanth', '123456789012', 'July', 2222, 234),
('Kishore', 'kishorep3105@gmail.com', 'ZAMBEZI RIVER', 5, 200, '2021-07-28', 'Kishore Prashanth', '123456789012', 'March', 2345, 111),
('Kishore', 'kishorep3105@gmail.com', 'OKAVANGO DELTA', 7, 560, '2021-07-16', 'Kishore Prashanth', '123456789012', 'August', 2022, 111),
('Kishore', 'kishorep3105@gmail.com', 'SERENGETI ', 4, 120, '2021-07-30', 'Kishore Prashanth', '123456789012', 'May', 2022, 345),
('kishore', 'kishorep3105@gmail.com', 'KRUGER NATIONAL PARK', 4, 40, '2021-07-25', 'Kishore Prashanth', '123456789012', 'October', 2022, 123);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
