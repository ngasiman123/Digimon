-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 05:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digimon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_of_materials`
--

CREATE TABLE `bill_of_materials` (
  `bom_id` int(11) NOT NULL,
  `packaging_id` int(11) NOT NULL,
  `movex_filter_master` varchar(20) NOT NULL,
  `sap_filter_master` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_code` varchar(3) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_code`, `brand_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
('CLS', 'CLASSIC FILTER AUTOMOTIF', '2019-08-15 00:00:00', '2019-08-15 00:00:00', '2019-08-15 00:00:00', 6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_code` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_code`, `name`, `address`, `email`, `phone_number`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
('CX0001', 'SF-FILTERS GMBH', 'STUTGART-GERMANY', 'gmnbhschupp@gmail.com', '111111', '2019-08-15 00:00:00', '2019-08-15 00:00:00', '2019-08-15 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `drawing_specs`
--

CREATE TABLE `drawing_specs` (
  `drawing_spec_id` int(11) NOT NULL,
  `request_detail_id` int(11) NOT NULL,
  `sakura_version_no` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `manufacture_code` varchar(3) NOT NULL,
  `manufacture_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manufacture_code`, `manufacture_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
('007', 'ELEMENT SELAMAT SEMPURNA', '2019-08-15 00:00:00', '2019-08-15 00:00:00', '2019-08-15 00:00:00', 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packagings`
--

CREATE TABLE `packagings` (
  `packaging_id` int(11) NOT NULL,
  `drawing_spec_id` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `inner_box_spec` varchar(50) DEFAULT NULL,
  `outter_box_spec` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `receive_id` int(11) NOT NULL,
  `bom_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_approves`
--

CREATE TABLE `request_approves` (
  `request_approve_id` int(11) NOT NULL,
  `request_header_id` int(11) NOT NULL,
  `approve_date` date NOT NULL,
  `approve_type` int(11) NOT NULL,
  `approve_by` int(11) NOT NULL,
  `approve_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `request_detail_id` int(11) NOT NULL,
  `request_header_id` int(11) NOT NULL,
  `customer_info_no` varchar(30) NOT NULL,
  `sakura_ref_no` varchar(20) NOT NULL,
  `brand_code` varchar(3) NOT NULL,
  `warehouse_code` varchar(3) NOT NULL,
  `manufacture_code` varchar(3) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `item_images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_headers`
--

CREATE TABLE `request_headers` (
  `request_no` varchar(25) NOT NULL,
  `request_header_id` int(11) NOT NULL,
  `customer_code` varchar(6) NOT NULL,
  `request_date` date NOT NULL,
  `po_number_customer` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `access_level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `address`, `email`, `phone_number`, `access_level`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'nurahman_1', '1234', 'Nurahman', 'Palembang', 'ngasiman21@gmail.com', '123456', 1, '2019-08-02 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(2, 'lavinia_J', '1234', 'Lavinia Jovita Samiana', 'Jakarta Selatan', 'lavina@gmail.com', '123456', 2, '2019-08-04 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(3, 'winanto_h', '1234', 'Winanto Heryan', 'Jakarta Barat', 'winanto@gmail.com', '123444', 3, '2019-08-04 00:00:00', '2019-08-04 00:00:00', NULL, 8, 8, NULL),
(4, 'ade_nurmansyah', '1234', 'Ade Nurmansyah', 'Tigaraksa', 'ade@gmail.com', '123456', 4, '2019-08-04 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(5, 'jijih_s', '1234', 'Jijih Saptujih', 'Curug', 'jijih@gmail.com', '123456', 5, '2019-08-04 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(6, 'didik_a', '1234', 'Didik Ardianto', 'Kadu Jaya', 'didik@gmail.com', '123456', 6, '2019-08-04 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(7, 'manto_1', '1234', 'Manto', 'Cikupa Jaya', 'manto@gmail.com', '123456', 7, '2019-08-04 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL),
(14, 'vonny_k', '1234', 'Vonny Kusrini', 'Jakarta Barat', 'vonny@gmail.com', '1234', 8, '2019-08-14 00:00:00', '2019-08-14 00:00:00', NULL, 8, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_code` varchar(3) NOT NULL,
  `warehouse_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_code`, `warehouse_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
('MTK', 'MAKE TO STOCK SAKURA ', '2019-08-15 00:00:00', '2019-08-15 00:00:00', '2019-08-15 00:00:00', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_of_materials`
--
ALTER TABLE `bill_of_materials`
  ADD PRIMARY KEY (`bom_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_code`);

--
-- Indexes for table `drawing_specs`
--
ALTER TABLE `drawing_specs`
  ADD PRIMARY KEY (`drawing_spec_id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manufacture_code`);

--
-- Indexes for table `packagings`
--
ALTER TABLE `packagings`
  ADD PRIMARY KEY (`packaging_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`receive_id`);

--
-- Indexes for table `request_approves`
--
ALTER TABLE `request_approves`
  ADD PRIMARY KEY (`request_approve_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`request_detail_id`);

--
-- Indexes for table `request_headers`
--
ALTER TABLE `request_headers`
  ADD PRIMARY KEY (`request_header_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
