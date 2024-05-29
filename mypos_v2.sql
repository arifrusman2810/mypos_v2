-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 06:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(2, 'Marni', 'P', '074567356', 'Jepara', '2021-02-16 21:41:39', '2021-02-16 15:56:47'),
(4, 'Doddy', 'L', '053725423455', 'Pati', '2021-02-16 22:07:09', NULL),
(5, 'Doni Sumarno', 'L', '23583478956', 'Jl. Dua', '2023-01-24 21:05:17', '2023-01-24 15:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(2, 'Makanan', '2021-02-18 09:31:09', '2021-03-04 07:43:26'),
(3, 'Minuman', '2021-02-18 09:38:59', '2021-03-04 07:43:34'),
(4, 'Kategori 3', '2021-02-18 09:41:15', NULL),
(5, 'Sabun', '2023-01-24 21:05:44', NULL),
(6, 'Lain-lain', '2023-01-24 21:05:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(1, 'A001', 'Permen 1', 2, 3, 1000, 3, 'item221222-f6280a2746.jpg', '2021-02-27 22:48:30', '2022-12-22 14:45:48'),
(3, 'A002', 'Snack 1', 2, 2, 3000, 3, 'item221222-d396e68164.jpg', '2021-03-01 23:11:27', '2022-12-22 14:47:12'),
(4, 'A003', 'Teh Bulat', 3, 3, 2000, 5, 'item221222-25416006f1.jpg', '2021-03-06 09:59:24', '2022-12-22 14:48:18'),
(5, 'B001', 'Sabun MB', 4, 3, 5000, 5, NULL, '2022-12-29 20:08:31', NULL),
(6, 'B002', 'Shampo BW', 4, 3, 7500, 5, NULL, '2022-12-29 20:08:59', NULL),
(7, '089686010190', 'Indomie Rasa Kari Ayam', 2, 6, 1700, 37, NULL, '2023-01-15 10:52:27', NULL),
(8, 'C001', 'Sabun Mandi', 5, 6, 2000, 18, NULL, '2023-01-24 21:07:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(2, 'Kilogram', '2021-02-18 09:31:09', '2021-02-25 07:38:55'),
(3, 'Buah', '2021-02-18 09:38:59', '2021-02-25 07:39:01'),
(5, 'asdasd', '2021-02-25 13:39:18', NULL),
(6, 'pcs', '2023-01-15 10:51:48', NULL),
(7, 'dus', '2023-01-24 21:06:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `crearted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `crearted`, `updated`) VALUES
(1, 'Toko A', '08653463256', NULL, NULL, '2021-02-14 14:13:16', NULL),
(2, 'Toko B', '064335467788', 'Kudus', 'Toko Oke', '2021-02-14 14:13:16', '2021-02-16 08:44:49'),
(3, 'Bpk Tomo', '076374354', 'Jl. Satu', 'asfsdf', '2023-01-24 21:04:14', '2023-01-24 15:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cart`
--

INSERT INTO `t_cart` (`cart_id`, `item_id`, `price`, `qty`, `discount_item`, `total`, `user_id`, `status`) VALUES
(1, 7, 1700, 5, 0, 8500, 1, '0'),
(2, 1, 1000, 3, 0, 3000, 1, '0'),
(3, 1, 1000, 2, 0, 2000, 1, '0'),
(4, 4, 2000, 3, 100, 5700, 1, '0'),
(5, 4, 2000, 2, 0, 4000, 1, '0'),
(6, 3, 3000, 7, 100, 20300, 6, '0'),
(7, 8, 2000, 2, 0, 4000, 6, '0'),
(8, 7, 1700, 5, 0, 8500, 6, '1'),
(9, 1, 1000, 2, 0, 2000, 1, '0'),
(10, 7, 1700, 3, 0, 5100, 1, '1');

--
-- Triggers `t_cart`
--
DELIMITER $$
CREATE TRIGGER `add_cart` AFTER INSERT ON `t_cart` FOR EACH ROW BEGIN 
	UPDATE p_item SET stock=stock-NEW.qty
	WHERE item_id=NEW.item_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cancel_cart` AFTER DELETE ON `t_cart` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = p_item.stock + OLD.qty
	WHERE item_id = OLD.item_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_cart` AFTER UPDATE ON `t_cart` FOR EACH ROW BEGIN 
	UPDATE p_item SET stock = stock - (NEW.qty-OLD.qty)
	WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_name`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(4, 'MP2301220001', 'Umum', 11500, 0, 11500, 12000, 500, '', '2023-01-22', 1, '2023-01-22 16:21:48'),
(5, 'MP2301220002', 'Umum', 7700, 1000, 6700, 10000, 3300, 'ada diskon', '2023-01-22', 1, '2023-01-22 16:22:37'),
(6, 'MP2301220003', 'Umum', 4000, 0, 4000, 5000, 1000, '', '2023-01-22', 1, '2023-01-22 16:23:03'),
(7, 'MP2301240001', 'Umum', 24300, 1000, 23300, 25000, 1700, 'ada diskon', '2023-01-24', 6, '2023-01-24 21:14:22'),
(8, 'MP2312110001', 'Umum', 2000, 0, 2000, 5000, 3000, '', '2023-12-11', 1, '2023-12-11 20:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `sale_detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`sale_detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(6, 4, 7, 1700, 5, 0, 8500),
(7, 4, 1, 1000, 3, 0, 3000),
(8, 5, 1, 1000, 2, 0, 2000),
(9, 5, 4, 2000, 3, 100, 5700),
(10, 6, 4, 2000, 2, 0, 4000),
(11, 7, 3, 3000, 7, 100, 20300),
(12, 7, 8, 2000, 2, 0, 4000),
(13, 8, 1, 1000, 2, 0, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 1, 'in', 'Kulakan', NULL, 20, '2021-03-17', '2021-03-17 08:26:42', 1),
(4, 3, 'in', 'Bonus', NULL, 2, '2021-03-29', '2021-03-29 21:01:22', 1),
(5, 1, 'in', 'Kulakan', 2, 5, '2021-03-31', '2021-03-31 08:42:21', 1),
(8, 1, 'out', 'kadaluarsa', NULL, 5, '2022-12-29', '2022-12-29 14:04:41', 1),
(9, 5, 'in', 'Kulakan', 1, 10, '2022-12-30', '2022-12-30 16:58:44', 1),
(10, 7, 'in', 'Kulakan', 2, 20, '2023-01-15', '2023-01-15 10:53:21', 1),
(11, 8, 'in', 'Pembelian', 1, 20, '2023-01-24', '2023-01-24 21:08:53', 6),
(12, 7, 'in', 'Kulakan', 1, 40, '2023-12-31', '2023-12-31 11:52:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Arif', 'Pati', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Andi', 'Kudus', 2),
(6, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Andi', 'Jl Satu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`sale_detail_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `invoice` (`sale_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_cart`
--
ALTER TABLE `t_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
