-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 11:20 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sellerla_selly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL,
  `coinpayment_merchant` varchar(256) DEFAULT NULL,
  `ipn_secret` varchar(10) DEFAULT NULL,
  `paypal_email` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `contact`, `email`, `img`, `coinpayment_merchant`, `ipn_secret`, `paypal_email`) VALUES
(1, 'ben', 'ben', 123, 'shahzaibmehfooz420@gmail.com', 'char2.jpg', 'a2bd0cfbe250ab62ed52037588ad5936', 'sellyadmin', 'example@paypal.com');

-- --------------------------------------------------------

--
-- Table structure for table `client_query`
--

CREATE TABLE `client_query` (
  `id` int(11) NOT NULL,
  `title` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `vendor_id` varchar(1000) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_query`
--

INSERT INTO `client_query` (`id`, `title`, `email`, `message`, `vendor_id`, `user_id`) VALUES
(8, 'Title', 'xyz@gmail.com', 'This is my message', '4', 37),
(9, 'This is NEW Query Title', 'xyzxyz@gmail.com', 'This is message new', '4', 37),
(10, 'this is test', 'shahzaib@gmail.com', 'This is my message', '4', 37);

-- --------------------------------------------------------

--
-- Table structure for table `client_query_reply`
--

CREATE TABLE `client_query_reply` (
  `id` int(11) NOT NULL,
  `client_query_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_query_reply`
--

INSERT INTO `client_query_reply` (`id`, `client_query_id`, `reply`, `user_id`, `vendor_id`, `created_at`) VALUES
(13, 8, 'This is vender reply', 0, 4, '2019-07-22 22:05:36'),
(14, 8, 'This is user reply', 37, 0, '2019-07-22 22:05:50'),
(15, 9, 'This is my reply\r\n', 37, 0, '2019-07-22 22:10:33'),
(16, 9, 'This is vender Reply', 0, 4, '2019-07-22 22:10:55'),
(17, 10, 'testing ', 0, 4, '2019-08-01 17:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `coinpayment_accept_coins`
--

CREATE TABLE `coinpayment_accept_coins` (
  `id` int(11) NOT NULL,
  `acronym` varchar(10) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coinpayment_accept_coins`
--

INSERT INTO `coinpayment_accept_coins` (`id`, `acronym`, `name`) VALUES
(1, 'BTC', 'Bitcoin'),
(2, 'LTC', 'Litecoin'),
(3, 'LTCT', 'Litecoin Test');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `codes` varchar(20) NOT NULL,
  `vender_id` char(100) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `codes`, `vender_id`, `discount`) VALUES
(8, 'get20', '4', 20);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `vendor_id` char(100) NOT NULL,
  `pro_id` char(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `client_id` char(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `vendor_id`, `pro_id`, `message`, `client_id`, `created_at`) VALUES
(4, '4', '13', ' abc\r\n', '2', '2019-07-22 17:35:37'),
(5, '4', '10', ' feebback\r\n', '1', '2019-07-22 17:35:37'),
(6, '5', '11', ' abc', '4', '2019-07-22 17:35:37'),
(9, '4', '10', ' hello', '8', '2019-07-22 17:35:37'),
(10, '4', '25', ' this is user', '3', '2019-07-22 17:35:37'),
(11, '15', '31', ' that is very good', '23', '2019-07-22 17:35:37'),
(12, '18', '35', ' this is good ', '1', '2019-07-22 17:35:37'),
(19, '4', '13', ' this is just a feedbackk\r\n', '37', '2019-07-22 17:43:29'),
(21, '4', '12', ' You can post feedback', '38', '2019-07-22 22:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `my_message`
--

CREATE TABLE `my_message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` char(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `username` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_message`
--

INSERT INTO `my_message` (`id`, `user_id`, `account_type`, `message`, `username`) VALUES
(22, 4, 'vendor', 'This is vender abc here need admin support', 'ken'),
(23, 4, 'admin', 'Admin Here...', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(191) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL,
  `transaction_id` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `coupon_used` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `title`, `type`, `price`, `is_default`) VALUES
(1, 'basic', 'Free', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `wholesale_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `user_id` char(100) NOT NULL,
  `des` text NOT NULL,
  `account_type` char(100) NOT NULL,
  `product_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `wholesale_price`, `quantity`, `image`, `date`, `user_id`, `des`, `account_type`, `product_group_id`) VALUES
(44, 'shoes rbk', 100, 50, 99, '15.png', '2019-08-06 08:59:24', '4', ' this', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

CREATE TABLE `product_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `group_name`, `vendor_id`) VALUES
(3, 'Garments', 5),
(5, 'shoes', 4);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `vender_id` char(100) NOT NULL,
  `account_type` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `title`, `user_id`, `price`, `date`, `vender_id`, `account_type`) VALUES
(4, 'abc', 1, 100, '12-01-19', '1', 'admin'),
(5, 'abc', 1, 100, '12-01-19', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `title`, `price`, `image`, `stock`, `description`, `date`) VALUES
(5, 'iop', 200, '361.jpg', 11, '11', '2019-06-25'),
(6, 'test', 1001, 'user-default.png', 999, 'This is test', '2019-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` char(100) NOT NULL,
  `ip_address` char(100) NOT NULL,
  `email_verified` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `ip_address`, `email_verified`, `created_at`) VALUES
(35, 'Bilal', 'mohammedbilalmansoor@gmail.com', 'bilal123456', 'Active', '185.89.250.131', 0, '2019-08-01 12:16:27'),
(37, 'xyz', 'xyz@gmail.com', '111111', 'Active', '202.47.35.83', 1, '2019-08-01 12:16:27'),
(38, 'user', 'usamaasif8809@gmail.com', '111111', 'Active', '202.47.35.83', 0, '2019-08-01 12:16:27'),
(48, 'newuser', 'nnnnn@gmail.com', '1111111111', 'Active', '', 0, '2019-08-01 12:16:27'),
(49, 'adad', 'adad@gmail.com', '1111111111', 'Active', '', 0, '2019-08-01 12:16:50'),
(50, 'xxxx', 'xxxx@gmail.com', 'xxxxxxxxxx', 'Active', '::1', 0, '2019-08-01 12:18:59'),
(52, 'aaaaa', 'aaaa@gmail.com', 'aaaaaaaaaa', 'Active', '::1', 1, '2019-08-01 12:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `username` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cnic` char(100) NOT NULL,
  `phone` char(20) NOT NULL,
  `gender` char(100) NOT NULL,
  `join_date` char(100) NOT NULL,
  `account_type` char(100) NOT NULL,
  `status` char(100) NOT NULL,
  `store_name` char(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `username`, `email`, `password`, `address`, `cnic`, `phone`, `gender`, `join_date`, `account_type`, `status`, `store_name`, `img`, `created_at`, `email_verified`) VALUES
(4, 'ken', 'usamaasif4190@gmail.com', 'ken', '', '', '203923092303920', 'male', '', '1', 'active', 'khan', 'img.png', '2019-07-31 10:53:47', 1),
(5, 'this', 'this@gmail.com', '1111111111', '', '', '123123123123', '', '', '1', 'active', 'this is', '', '2019-08-01 08:04:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment_details`
--

CREATE TABLE `vendor_payment_details` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `coinpayment_wallet_address` varchar(256) DEFAULT NULL,
  `ipn_secret` varchar(10) DEFAULT NULL,
  `coinpayment_status` int(11) NOT NULL DEFAULT 1,
  `paypal_status` int(11) NOT NULL DEFAULT 1,
  `paypal_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_payment_details`
--

INSERT INTO `vendor_payment_details` (`id`, `vendor_id`, `coinpayment_wallet_address`, `ipn_secret`, `coinpayment_status`, `paypal_status`, `paypal_email`, `created_at`, `updated_at`) VALUES
(8, 4, 'your merchant id', 'secret', 1, 1, 'example@paypal.com', '2019-07-31 23:18:30', '2019-07-31 23:18:45'),
(9, 5, 'update your merchant id', NULL, 1, 1, 'example@paypal.com', '2019-08-01 08:04:20', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_query`
--
ALTER TABLE `client_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_query_reply`
--
ALTER TABLE `client_query_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coinpayment_accept_coins`
--
ALTER TABLE `coinpayment_accept_coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codes` (`codes`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_message`
--
ALTER TABLE `my_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_group_id` (`product_group_id`);

--
-- Indexes for table `product_group`
--
ALTER TABLE `product_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `store_name` (`store_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor_payment_details`
--
ALTER TABLE `vendor_payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_query`
--
ALTER TABLE `client_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_query_reply`
--
ALTER TABLE `client_query_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coinpayment_accept_coins`
--
ALTER TABLE `coinpayment_accept_coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `my_message`
--
ALTER TABLE `my_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_group`
--
ALTER TABLE `product_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_payment_details`
--
ALTER TABLE `vendor_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_group_id`) REFERENCES `product_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
