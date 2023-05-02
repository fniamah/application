-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 02:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bravery_hills`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE `cart_temp` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `pid` varchar(30) NOT NULL DEFAULT '',
  `qty` int(3) DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment`
--

CREATE TABLE `pos_payment` (
  `id` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `tend` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dbal` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales`
--

CREATE TABLE `pos_sales` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `cid` varchar(50) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL DEFAULT '',
  `qty` int(5) NOT NULL DEFAULT 0,
  `sales_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_tax`
--

CREATE TABLE `pos_tax` (
  `id` int(11) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `taxid` varchar(10) NOT NULL,
  `dval` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_temp`
--

CREATE TABLE `pos_temp` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL DEFAULT '',
  `qty` int(5) NOT NULL DEFAULT 0,
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_master`
--

CREATE TABLE `products_master` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `pname` varchar(100) NOT NULL DEFAULT '',
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(4) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_master_history`
--

CREATE TABLE `products_master_history` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL DEFAULT '',
  `pname` varchar(100) NOT NULL DEFAULT '',
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(4) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT '',
  `changedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pnameo` varchar(100) NOT NULL DEFAULT '',
  `spriceo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cpriceo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qtyo` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_summary`
--

CREATE TABLE `sales_summary` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL,
  `tot_sales` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `transdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `pid` varchar(30) NOT NULL DEFAULT '',
  `qty` int(3) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT '',
  `ordernum` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `transid` varchar(100) NOT NULL DEFAULT '',
  `prev` int(10) NOT NULL DEFAULT 0,
  `cur` int(10) NOT NULL DEFAULT 0,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `stfid` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_temp`
--
ALTER TABLE `cart_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_payment`
--
ALTER TABLE `pos_payment`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pos_sales`
--
ALTER TABLE `pos_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_tax`
--
ALTER TABLE `pos_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_temp`
--
ALTER TABLE `pos_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_master`
--
ALTER TABLE `products_master`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products_master_history`
--
ALTER TABLE `products_master_history`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sales_summary`
--
ALTER TABLE `sales_summary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_temp`
--
ALTER TABLE `cart_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_payment`
--
ALTER TABLE `pos_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_sales`
--
ALTER TABLE `pos_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_tax`
--
ALTER TABLE `pos_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_temp`
--
ALTER TABLE `pos_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_master`
--
ALTER TABLE `products_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_master_history`
--
ALTER TABLE `products_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_summary`
--
ALTER TABLE `sales_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
