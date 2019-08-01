-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 04:52 PM
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
-- Table structure for table `tb_bill_of_material_status`
--

CREATE TABLE `tb_bill_of_material_status` (
  `sakura_version_no` varchar(20) NOT NULL,
  `customer_info_no` varchar(30) NOT NULL,
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
-- Table structure for table `tb_brands`
--

CREATE TABLE `tb_brands` (
  `brand_code` varchar(3) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customers`
--

CREATE TABLE `tb_customers` (
  `customer_code` varchar(6) NOT NULL,
  `zona_code` varchar(4) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_drawing_spec_status`
--

CREATE TABLE `tb_drawing_spec_status` (
  `drawing_spec_status_id` int(11) NOT NULL,
  `customer_info_no` varchar(30) NOT NULL,
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
-- Table structure for table `tb_manufactures`
--

CREATE TABLE `tb_manufactures` (
  `manufacture_code` varchar(3) NOT NULL,
  `manufacture_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_packaging_status`
--

CREATE TABLE `tb_packaging_status` (
  `sakura_version_no` varchar(20) NOT NULL,
  `customer_info_no` varchar(30) NOT NULL,
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
-- Table structure for table `tb_request_details`
--

CREATE TABLE `tb_request_details` (
  `request_detail_id` int(11) NOT NULL,
  `request_header_id` int(11) NOT NULL,
  `customer_info_no` varchar(30) NOT NULL,
  `sakura_ref_no` varchar(20) NOT NULL,
  `brand_code` varchar(3) NOT NULL,
  `warehouse_code` varchar(3) NOT NULL,
  `manufacture_code` varchar(3) NOT NULL,
  `order_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_request_headers`
--

CREATE TABLE `tb_request_headers` (
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
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zone_code` varchar(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `access_level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_warehouse`
--

CREATE TABLE `tb_warehouse` (
  `warehouse_code` varchar(3) NOT NULL,
  `warehouse_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_zone`
--

CREATE TABLE `tb_zone` (
  `zone_code` varchar(4) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bill_of_material_status`
--
ALTER TABLE `tb_bill_of_material_status`
  ADD PRIMARY KEY (`sakura_version_no`);

--
-- Indexes for table `tb_brands`
--
ALTER TABLE `tb_brands`
  ADD PRIMARY KEY (`brand_code`);

--
-- Indexes for table `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`customer_code`);

--
-- Indexes for table `tb_drawing_spec_status`
--
ALTER TABLE `tb_drawing_spec_status`
  ADD PRIMARY KEY (`drawing_spec_status_id`);

--
-- Indexes for table `tb_manufactures`
--
ALTER TABLE `tb_manufactures`
  ADD PRIMARY KEY (`manufacture_code`);

--
-- Indexes for table `tb_packaging_status`
--
ALTER TABLE `tb_packaging_status`
  ADD PRIMARY KEY (`sakura_version_no`);

--
-- Indexes for table `tb_request_details`
--
ALTER TABLE `tb_request_details`
  ADD PRIMARY KEY (`request_detail_id`);

--
-- Indexes for table `tb_request_headers`
--
ALTER TABLE `tb_request_headers`
  ADD PRIMARY KEY (`request_header_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_warehouse`
--
ALTER TABLE `tb_warehouse`
  ADD PRIMARY KEY (`warehouse_code`);

--
-- Indexes for table `tb_zone`
--
ALTER TABLE `tb_zone`
  ADD PRIMARY KEY (`zone_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
