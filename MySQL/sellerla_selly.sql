-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 06:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
  `img` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `contact`, `email`, `img`) VALUES
(1, 'ben', 'ben', 123, 'ben@gmail.com', '64679071_107239193895428_4012795800147984384_n.jpg');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `codes` int(11) NOT NULL,
  `vender_id` char(100) NOT NULL,
  `discount` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `codes`, `vender_id`, `discount`) VALUES
(1, 1001, '4', '20'),
(2, 1002, '4', '30');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(19, '4', '13', ' this is just a feedbackk\r\n', '37', '2019-07-22 17:43:29');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `title`, `type`, `price`) VALUES
(4, 'basic', 'Paid', 4);

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
  `account_type` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `wholesale_price`, `quantity`, `image`, `date`, `user_id`, `des`, `account_type`) VALUES
(12, 'abccc', 1, 1, 1, '15.jpg', '2019-07-03', '4', 'lorem ', 'vender'),
(13, 'suama2323', 1000, 900, 2, '15.jpg', '2019-07-03', '4', 'lorem ', 'vender'),
(14, 'Shoes', 1200, 1000, 3, '15.jpg', '2019-07-11', '4', 'lotem', 'vender'),
(15, 'qwe', 120, 123, 123, '15.jpg', '2019-07-11', '4', 'lotem', 'vender'),
(17, 'store', 1000, 100, 4, '15.jpg', '2019-07-11', '1', 'lorem is design ', 'admin'),
(21, 'abc', 1000, 0, 4, '15.jpg', '2019-07-11', '4', 'this a product', 'vender'),
(22, 'abc', 100, 90, 1, '15.jpg', '2019-07-11', '1', 'This is test', 'admin'),
(24, 'shoes', 1000, 1000, 4, '15.jpg', '2019-07-11', '4', 'dfkdlfkvkdlk', 'vender'),
(25, 'tyu', 100, 80, 2, '15.jpg', '2019-07-11', '4', 'this is a product', 'vender'),
(26, 'qwe', 10000, 29999, 1, '15.jpg', '2019-07-11', '1', 'This is a store', 'admin'),
(28, 'bed sheet', 1200, 1000, 12, '15.jpg', '2019-07-12', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'vender'),
(29, 'ALikaram BedSheet', 1500, 1300, 10, '15.jpg', '2019-07-12', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'vender'),
(30, 'AliSheri Bed Sheet', 2000, 1500, 20, '15.jpg', '2019-07-12', '14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'vender'),
(31, 'T-Shirt', 1200, 1000, 10, '15.jpg', '2019-07-12', '15', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore magni sed ut. Aliquid deserunt distinctio doloremque iste odio quod rem unde voluptate? Accusantium aliquid aspernatur dolore iusto molestiae molestias, quae!', 'vender'),
(32, 'UnderWare', 1500, 1000, 12, '15.jpg', '2019-07-12', '15', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore magni sed ut. Aliquid deserunt distinctio doloremque iste odio quod rem unde voluptate? Accusantium aliquid aspernatur dolore iusto molestiae molestias, quae!', 'vender'),
(33, 'mobile', 1000, 8000, 8, '15.jpg', '2019-07-12', '16', '\r\nLorem ipsum dolor sit amet, cnsectetur adipisicing elit. Architecto delectus dicta, distinctio dolore dolores id, iste magni nulla perferendis, possimus quam sapiente tempore temporibus! Deserunt ducimus est facere sint tenetur.', 'vender'),
(34, 'UnderWare', 1000, 800, 12, '15.jpg', '2019-07-12', '17', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus dicta earum hic quae quisquam tempora totam. Architecto asperiores consectetur cum doloremque, itaque modi non perferendis quam sequi velit voluptate!', 'vender'),
(35, 'T_Shirt', 1500, 1000, 12, '15.jpg', '2019-07-12', '18', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, at debitis dolor doloribus ducimus earum eius libero molestiae molestias odit officia quae quo sed, vel voluptatem voluptates voluptatum. Obcaecati, placeat.', 'vender'),
(36, 'Fancy_TShirt', 2000, 1500, 10, '15.jpg', '2019-07-12', '19', 'Great Fancy T-Shirt for beautiful girls!', 'vender');

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
(5, 'iop', 200, '361.jpg', 11, '11', '2019-06-25');

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
  `ip_address` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `ip_address`) VALUES
(35, 'Bilal', 'mohammedbilalmansoor@gmail.com', 'bilal123456', 'Active', '185.89.250.131'),
(37, 'xyz', 'xyz@gmail.com', '111111', 'Inactive', '202.47.35.83'),
(38, 'user', 'usamaasif8809@gmail.com', '111111', 'Active', '202.47.35.83'),
(39, 'usasjaksj', 'abc@gmail.com', '1234567890', 'Active', '202.47.35.83'),
(40, 'saosaiso', 'omer@gmail.com', '1234567890', 'Active', '202.47.35.83'),
(41, 'Slacker', 'slackerisinsane@gmail.com', 'slacker12345678', 'Active', '202.47.35.83'),
(42, 'Jawwy', 'muhammadjawad0090@gmail.com', 'jawwy12345678', 'Active', '185.205.204.159'),
(43, 'Jawwy123', 'muhammadjawad00@yahoo.com', 'jawwy12345678', 'Active', '185.205.204.159'),
(44, 'Jawwad123', 'muhammadjawwad00@hotmail.com', 'jawwad12345678', 'Active', '136.0.99.239'),
(45, 'Codegasm', 'info@codegasm.co.uk', 'codegasm123', 'Active', '136.0.99.239'),
(46, '', '', '', '', '');

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
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `username`, `email`, `password`, `address`, `cnic`, `phone`, `gender`, `join_date`, `account_type`, `status`, `store_name`, `img`) VALUES
(4, 'ken', 'usamaasif4190@gmail.com', 'lora', '', '', '203923092303920', 'male', '', 'premium', 'active', 'khan', 'img.png'),
(6, 'abc', 'abc@gmail.com', 'abc', '', '', '939283298323', 'male', '', 'free', 'active', 'abc', 'img.png'),
(8, 'faboloso', 'faboloso@gmail.com', 'Abc123456789', '', '', '14185649890', 'male', '', '', 'active', 'faboloso', 'img.png'),
(9, 'rbrown', 'rachelbrown1976@gmail.com', 'FuckThisShit', '', '', '18881111111', 'male', '', '', 'active', 'rbrown', 'img.png'),
(10, 'ken', 'ken@gmail.com', 'qwerty1234', '', '', '12345678912', 'male', '', '', 'active', 'ken', 'img.png'),
(11, 'terry', 'terry@gmail.com', 'terry12345', '', '', '1234567890789', 'male', '', '', 'active', 'chocalate', 'img.png'),
(12, 'ken', 'kim@gmail.com', '1234567890123', '', '', '1234567890123', 'male', '', '', 'active', 'kim', 'img.png'),
(13, 'jado', 'jadi@gmail.com', 'jadi1234567890', '', '', '03456413071', 'male', '', '', 'active', 'jadi', 'img.png'),
(14, 'Sammay', 'sammay@gmail.com', 'sammay1234567890', '', '', '03456413071', '', '', '', 'active', 'Sammay', 'img.png'),
(15, 'alicashi', 'alicashi@gmail.com', '1234567890', '', '', '03456413071', '', '', '', 'active', 'chiaWala', 'img.png'),
(16, 'teawala', 'teawala@gmail.com', '1234567890', '', '', '12345678901', '', '', '', 'active', 'teawala', 'img.png'),
(17, 'fypes', 'fypes@gmail.com', '1234567890', '', '', '12345678901', '', '', '', 'active', 'fyp', 'img.png'),
(18, 'milli', 'milli@gmail.com', '1234567890', '', '', '12345678901', '', '', '', 'active', 'milli_Shop', 'img.png'),
(19, 'code', 'code@gmail.com', '1234567890', '', '', '12345678901', '', '', '', 'active', 'Codegasm', 'img.png'),
(20, 'owais', 'owaisa976@gmail.com', '12345678901', '', '', '12345678901', '', '', '', 'active', 'owais', '');

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_query_reply`
--
ALTER TABLE `client_query_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `my_message`
--
ALTER TABLE `my_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
