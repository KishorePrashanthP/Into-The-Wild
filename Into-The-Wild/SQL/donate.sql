-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 09:32 AM
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
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `toanimal` varchar(50) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `names`, `email`, `toanimal`, `amount`) VALUES
(9, 'Kishore', 'kishore@gmail.com', 'tiger', 0.0019),
(10, 'Kishore', 'kishore@gmail.com', 'rhino', 0.0038),
(11, 'Kishore', 'kishore@gmail.com', 'gorilla', 0.0038),
(12, 'kishore', 'k@gmail.com', 'wolf', 0.077),
(13, 'Kishore', 'k@gmail.com', 'tiger', 1),
(14, 'Kishore', 'k@gmail.com', 'rhino', 1),
(15, 'Kishore', 'k@gmail.com', 'gorilla', 0.0019),
(16, 'abc', 'abc@gmail.com', 'wolf', 0.001),
(17, 'abc', 'k@gmail.com', 'tiger', 0.0001),
(18, 'Kishore', 'k@gmail.com', 'tiger', 0.0001),
(19, 'abc', 'k@gmail.com', 'tiger', 0.001),
(20, 'abc', 'k@gmail.com', 'tiger', 0.001),
(21, 'abc', 'k@gmail.com', 'tiger', 0.001),
(22, 'abc', 'k@gmail.com', 'rhino', 0.001),
(23, 'Kishore', 'k@gmail.com', 'rhino', 0.0001),
(24, 'abc', 'abc@gmail.com', 'wolf', 0.0001),
(25, 'abc', 'k@gmail.com', 'wolf', 0.0001),
(26, 'Kishore', 'kishore@gmail.com', 'rhino', 0.0001),
(27, 'Purushothaman', 'rajapurushoth72@gmail.com', 'gorilla', 0.001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
