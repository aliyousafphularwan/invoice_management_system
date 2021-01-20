-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 01:05 PM
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
  `inv_ntn` varchar(35) NOT NULL,
  `shipmark` varchar(35) NOT NULL,
  `inv_po` varchar(35) NOT NULL,
  `inv_desc` varchar(35) NOT NULL,
  `inv_hscode` varchar(35) NOT NULL,
  `inv_qty` varchar(35) NOT NULL,
  `inv_price` varchar(35) NOT NULL,
  `inv_amount` varchar(35) NOT NULL,
  `inv_fraight` varchar(35) NOT NULL,
  `inv_insurance` varchar(35) NOT NULL,
  `inv_discount` varchar(35) NOT NULL,
  `inv_grand_ttl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `inv_type`, `client_name`, `client_address`, `inv_notify`, `inv_pgd`, `inv_no`, `inv_date`, `inv_eform`, `inv_mos`, `inv_mop`, `inv_ntn`, `shipmark`, `inv_po`, `inv_desc`, `inv_hscode`, `inv_qty`, `inv_price`, `inv_amount`, `inv_fraight`, `inv_insurance`, `inv_discount`, `inv_grand_ttl`) VALUES
(1, 'Invoice', 'Ali Yousaf', 'sialkot cantt', '', '', '1501', '12/01/2021', '78945612363512', 'By Air', 'Partial', '', 'New York', '1', 'product 1', '1425', '1000', '10', '', 'No', 'No', 'No', 0),
(2, 'Invoice', 'Ali Yousaf', 'sialkot cantt', '', '', '1501', '12/01/2021', '78945612363512', 'By Air', 'Partial', '', 'New York', '1', 'product 2', '1425', '1200', '12', '', 'No', 'No', 'No', 0),
(3, 'Invoice', 'Ali Yousaf', 'sialkot cantt', '', '', '1501', '12/01/2021', '78945612363512', 'By Air', 'Partial', '', 'New York', '1', 'product 3', '2536', '1500', '1.5', '', 'No', 'No', 'No', 0),
(4, 'Invoice', 'Ali Yousaf', 'sialkot cantt', '', '', '1501', '12/01/2021', '78945612363512', 'By Air', 'Partial', '', 'New York', '2', 'product 4', '5263', '1200', '1.2', '', 'No', 'No', 'No', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
