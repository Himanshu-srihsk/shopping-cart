-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2019 at 03:03 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Hp'),
(2, 'Samsung'),
(3, 'Apple'),
(5, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(1, 2, '0', 1, 'Samsung', 'demo.jpg', 1, 500, 500),
(26, 1, '0', 7, 'Samsung Dos', 'samsung.jpg', 1, 5000, 5000),
(27, 3, '0', 7, 'All Out', 'allout.jfif', 1, 250, 250),
(28, 4, '0', 7, 'Hp Laptop', 'laptop.jpg', 1, 50000, 50000),
(29, 2, '0', 7, 'camera', 'camera.jfif', 1, 25000, 25000),
(31, 2, '0', 0, 'camera', 'camera.jfif', 1, 25000, 25000),
(32, 1, '0', 0, 'Samsung Dos', 'samsung.jpg', 1, 5000, 5000),
(33, 3, '0', 0, 'All Out', 'allout.jfif', 1, 250, 250),
(55, 2, '0', 6, 'camera', 'camera.jfif', 5, 25000, 125000),
(56, 1, '0', 6, 'Samsung Dos', 'samsung.jpg', 1, 5000, 5000),
(58, 4, '0', 8, 'Hp Laptop', 'laptop.jpg', 1, 50000, 50000),
(59, 1, '0', 8, 'Samsung Dos', 'samsung.jpg', 1, 5000, 5000),
(60, 2, '0', 8, 'camera', 'camera.jfif', 1, 25000, 25000),
(61, 3, '0', 8, 'All Out', 'allout.jfif', 1, 250, 250),
(62, 5, '0', 8, 'shampoo', 'shampoo.jfif', 1, 120, 120),
(63, 3, '0', 6, 'All Out', 'allout.jfif', 1, 250, 250),
(64, 5, '0', 6, 'shampoo', 'shampoo.jfif', 1, 120, 120),
(69, 2, '0', 10, 'camera', 'camera.jfif', 10, 25000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wears');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `trx_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `prokeyword` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `prokeyword`) VALUES
(1, 1, 2, 'Samsung Dos', 5000, 'ultra feature powered by samsung', 'samsung.jpg', 'samsung mobile electronics'),
(2, 1, 3, 'camera', 25000, 'apple', 'camera.jfif', 'apple'),
(3, 2, 5, 'All Out', 250, 'Mosquito repellent', 'allout.jfif', 'mosquito killer'),
(4, 2, 2, 'Hp Laptop', 50000, 'I5 5th gen Nvidia Graphics 8Gb Ram', 'laptop.jpg', 'apple'),
(5, 1, 2, 'shampoo', 120, 'laurel paris', 'shampoo.jfif', 'conditioner free+ shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `trx_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Himanshu', 'kumar', 'himanshukumar9334004134@gmail.com', 'himanshu1', '8089125587', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'kerala'),
(3, 'shekhar', 'suman', 'himangi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8089125587', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'kochi'),
(4, 'sristi', 'keshri', 'sristi@gmail.com', '7f47fe9e7295c6f7c765ffa765095f05', '8089125587', 'patna', 'bihar'),
(5, 'surbhi', 'kumari', 'pizza@gmail.com', '326e02a4db651f0d2101044e597d5092', '8089125587', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'bihar'),
(6, 'amit', 'kumar', 'amit@gmail.com', '5eff1af3bd11e2d001a3593a09991f07', '8089125587', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'ghuil'),
(7, 'ankit', 'kumar', 'ankit@gmail.com', '18f29f6c388583d331c62f9a07c60770', '8089125587', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'mas'),
(8, 'sony', 'kri', 'sony@hotmail.com', '0fa5ac5e460a43b4604312cfec82917a', '8089125587', 'kumrahar patna', 'kumharar pana'),
(9, 'ggtrg', 'grgrttg', 'himanshukumar9334004@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '80891255', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'jmhmhhmh'),
(10, 'tiger', 'kr', 'tiger@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7848589674', 'Bait-al-noor flat,HMT colony,kalamaserry,near school of engineering main gate, cusat', 'dffeeey45y4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
