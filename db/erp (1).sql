-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 03:19 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `full_name` varchar(35) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(35) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `mob` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `address`, `country`, `phone`, `mob`) VALUES
(1, 'M/S. Qureshi & Sons Co.', 'Building # 81 A street # 10 Mag town, Sialkot', 'Pakistan', '+92-524-598233', '+92-335-8311414'),
(2, 'Ali Yousaf', 'Saidpur Gondal Road Bharth', 'Pakistan', '0524267259', '03157806663');

-- --------------------------------------------------------

--
-- Table structure for table `editpos`
--

CREATE TABLE `editpos` (
  `id` int(10) NOT NULL,
  `descrip` varchar(250) NOT NULL,
  `qty` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `inv_type` varchar(35) NOT NULL,
  `client_name` varchar(35) NOT NULL,
  `client_address` varchar(150) NOT NULL,
  `inv_notify` varchar(150) NOT NULL,
  `inv_pgd` varchar(150) NOT NULL,
  `inv_no` varchar(35) NOT NULL,
  `inv_date` varchar(35) NOT NULL,
  `inv_eform` varchar(35) NOT NULL,
  `inv_mos` varchar(35) NOT NULL,
  `inv_mop` varchar(35) NOT NULL,
  `shipmark` varchar(35) NOT NULL,
  `curreny` varchar(35) NOT NULL,
  `inv_po` varchar(35) NOT NULL,
  `inv_desc` varchar(350) NOT NULL,
  `inv_hscode` varchar(35) NOT NULL,
  `inv_qty` varchar(35) NOT NULL,
  `inv_price` varchar(35) NOT NULL,
  `inv_amount` varchar(35) NOT NULL,
  `inv_fraight` varchar(35) NOT NULL,
  `inv_insurance` varchar(35) NOT NULL,
  `inv_discount` varchar(35) NOT NULL,
  `inv_grand_ttl` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `inv_type`, `client_name`, `client_address`, `inv_notify`, `inv_pgd`, `inv_no`, `inv_date`, `inv_eform`, `inv_mos`, `inv_mop`, `shipmark`, `curreny`, `inv_po`, `inv_desc`, `inv_hscode`, `inv_qty`, `inv_price`, `inv_amount`, `inv_fraight`, `inv_insurance`, `inv_discount`, `inv_grand_ttl`) VALUES
(1, 'Invoice', 'M/S. Qureshi & Sons Co.', 'Building # 81 A street # 10 Mag town, Sialkot, Pakistan', 'asad ali', '17 cartons containing dental tools', '1501', '20/01/2021', '78945612363512', 'By Air', 'Advance', 'New York', 'US $', '1', 'PL-51201 Chai', '9018.9090', '1200', '1.60', '1920', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `packing`
--

CREATE TABLE `packing` (
  `id` int(10) NOT NULL,
  `inv_no` varchar(35) NOT NULL,
  `inv_date` varchar(35) NOT NULL,
  `carton_no` varchar(35) NOT NULL,
  `qty` varchar(35) NOT NULL,
  `desc_of_goods` varchar(350) NOT NULL,
  `po_no` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packing`
--

INSERT INTO `packing` (`id`, `inv_no`, `inv_date`, `carton_no`, `qty`, `desc_of_goods`, `po_no`) VALUES
(1, '', '2021-01-21', '1', '200 Pcs', 'PL-51201 ', '1112121'),
(2, '', '2021-01-21', '2', '200 Pcs', 'PL-51202', '112212');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(10) NOT NULL,
  `po_no` varchar(35) NOT NULL,
  `po_date` varchar(35) NOT NULL,
  `po_client` varchar(35) NOT NULL,
  `description` varchar(250) NOT NULL,
  `qty` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `art_no` varchar(35) NOT NULL,
  `description` varchar(250) NOT NULL,
  `hs_code` varchar(35) NOT NULL,
  `price` varchar(35) NOT NULL,
  `currency` varchar(35) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `art_no`, `description`, `hs_code`, `price`, `currency`, `status`) VALUES
(1, 'PL-51201', 'PL-51201 Chai', '9018.9090', '1.60', '$', ''),
(2, 'PL-51202', 'PL-51202 Chain nose super fine series 115mm with spring, PVC, S.S', '2536', '2.87', '$', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editpos`
--
ALTER TABLE `editpos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packing`
--
ALTER TABLE `packing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editpos`
--
ALTER TABLE `editpos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packing`
--
ALTER TABLE `packing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
