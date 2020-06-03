-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(10, 'Bangus'),
(11, 'Shrimp'),
(12, 'Lamayo');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(25, 10, 'Bangus Small 3:1', 170, 'upload/download_1589269906.jpg'),
(26, 11, 'Shrimp Small', 192, 'upload/photo-1565680018434-b513d5e5fd47_1589269918.jpg'),
(27, 10, 'bangus 5:!', 192, 'upload/download_1589335333.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`, `delivery_date`, `address`, `phone`, `status`) VALUES
(29, 'Reyvern Mahinay', 724, '2020-05-12 15:52:46', NULL, 'Sawmill 3, Brgy. Bata, Bacood City', '09094306837', 'Pending'),
(30, 'juan dela cruz', 724, '2020-05-12 16:19:21', NULL, 'Sawmill 3, Brgy. Bata, Bacood City', '12787873878', 'Pending'),
(31, 'Reyvern Mahinay', 0, '2020-05-12 17:59:41', '2020-05-20 00:00:00', 'Brgy. Granada, Bacolod City', '09094306837', 'Pending'),
(32, 'Reyvern Mahinay', 916, '2020-05-12 18:09:31', '2020-05-12 00:00:00', 'Sawmill 3, Brgy. bata', '09094306837', 'Pending'),
(33, 'JUAN TAMAD', 2940, '2020-05-12 19:54:08', '2020-05-16 00:00:00', 'Lacson Street', '09094306837', 'Pending'),
(34, 'Reyvern Mahinay', 1920, '2020-05-13 20:42:11', '2020-05-16 00:00:00', 'Lacson street', '09094306837', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(46, 29, 25, 2),
(47, 29, 26, 2),
(48, 30, 25, 2),
(49, 30, 26, 2),
(50, 0, 25, 1),
(51, 0, 26, 2),
(52, 0, 25, 1),
(53, 0, 26, 2),
(54, 0, 25, 1),
(55, 0, 25, 1),
(56, 0, 26, 1),
(57, 0, 25, 1),
(58, 0, 26, 1),
(59, 0, 25, 1),
(60, 0, 26, 1),
(61, 0, 25, 1),
(62, 0, 26, 1),
(63, 0, 25, 1),
(64, 0, 26, 1),
(65, 0, 25, 1),
(66, 0, 26, 1),
(67, 0, 25, 1),
(68, 0, 26, 1),
(69, 0, 25, 1),
(70, 0, 26, 1),
(71, 0, 25, 1),
(72, 0, 26, 1),
(73, 0, 25, 1),
(74, 0, 26, 1),
(75, 0, 25, 1),
(76, 0, 26, 1),
(77, 0, 25, 1),
(78, 0, 26, 1),
(79, 0, 25, 1),
(80, 0, 26, 1),
(81, 0, 25, 1),
(82, 0, 26, 1),
(83, 0, 25, 1),
(84, 0, 26, 1),
(85, 0, 25, 1),
(86, 0, 26, 1),
(87, 0, 25, 1),
(88, 0, 26, 1),
(89, 0, 25, 1),
(90, 0, 26, 1),
(91, 0, 25, 1),
(92, 0, 26, 1),
(93, 0, 25, 1),
(94, 0, 26, 1),
(95, 31, 25, 0),
(96, 32, 25, 2),
(97, 32, 26, 3),
(98, 33, 25, 6),
(99, 33, 26, 10),
(100, 34, 27, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
