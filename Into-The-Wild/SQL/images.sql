-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 09:35 AM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `descriptions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `username`, `images`, `descriptions`) VALUES
(5, 'Kishore', 'pic1.jpeg', '$ORANGOTAN'),
(6, 'Kishore', 'pic2.jpeg', '#ZEBRA HD #INTOTHEWILD #JUNGLE_SAFARI #HELPWILDANIMALS'),
(7, 'Kishore', 'pic3.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consectetur pretium est. Fusce sodales j'),
(8, 'Kishore', 'pic4.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consectetur pretium est. Fusce sodales j'),
(9, 'Kishore', 'pic5.jpeg', 'OWLLLL......OWLLLLLL...!!!!!!'),
(10, 'Purushothaman', 'new11.jpg', 'Hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
