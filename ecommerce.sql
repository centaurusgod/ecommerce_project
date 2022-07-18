-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 03:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) DEFAULT NULL,
  `user_username` varchar(25) DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_username`, `admin_id`) VALUES
(64, 'centaur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(21, 'Clothes'),
(1, 'Electronics'),
(24, 'Fans'),
(14, 'Furnitures'),
(2, 'Household');

-- --------------------------------------------------------

--
-- Table structure for table `delete_me`
--

CREATE TABLE `delete_me` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delete_me`
--

INSERT INTO `delete_me` (`id`, `name`) VALUES
(1, 'ozone wagle');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `email_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `email_name`) VALUES
(22, 'ozan.762419@pasc.tu.edu.n'),
(21, 'ozonewagle998@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pending_supplier`
--

CREATE TABLE `pending_supplier` (
  `user_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `supplier_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_stock_number` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `product_details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`supplier_id`, `product_id`, `product_title`, `product_image`, `product_price`, `product_stock_number`, `category_name`, `product_details`) VALUES
(90, 3, 'Macbook Pro M2', 'macbookpro1.jpg', 360000, 0, 'Electronics', 'This MacBook pro comes with the world fastest processer M2 chip. This is the latest one of apple. It has nearly outperformed AMD 64 core server processer.'),
(90, 9, 'Anker SoundCore Verbe', '1021657967312ankersoundcore.jpg', 1800, 3, 'Electronics', 'These are the best earphones you will ever listen to in your life. They come with braided nylon, metalhead earbuds and gold plated connector.'),
(92, 10, 'LG 4k Monitor', '1111657972238510eVTJxoS._AC_SL1000_.jpg', 56000, 2, 'Electronics', 'It has HDR support. Refresh rate is 120Hz. Display is of 10bit depth.'),
(92, 11, 'Kore Studio Headphones', '1111657972381KoreStudios_Multilaser_Consumer_Electronics_04.jpg', 35000, 8, 'Electronics', 'Feel The Deep Bass and the ultimate clarity on sound. Supports Dolby Atomos.'),
(92, 12, 'Chinese Headphone', '11116579724865randomheadphone.jpg', 12000, 14, 'Electronics', 'This headphone is cheap, but the sound quality is awesome.'),
(93, 13, 'Amul Comfy Vest', '11216579734452a59b0be57bef4fe47fe30f08b215645.jpg', 250, 25, 'Clothes', 'Geniune Amul Vest. Size:42'),
(93, 14, 'Half Jeans', '1121657973494679e19650c886e7d91f4d3924a94c13d.jpg', 450, 11, 'Clothes', 'Good to wear in summer.'),
(93, 15, 'Nawaraj Jeans', '112165797357629799a4042ca90381b5aedefaf2cce0f.jpg', 1000, 3, 'Clothes', 'The jeans are comfortable to wear.'),
(93, 16, 'Nike Jacket Black', '1121657973609c0fb0e83111ebda04f52d61bd3aa7d32.png', 2100, 4, 'Clothes', 'The winter is coming soon. Buy it soon.'),
(93, 17, 'T-shirt Genx', '1121657973648images.jpg', 350, 12, 'Clothes', 'Comfortable to wear in summer but gets dirty easily.'),
(90, 18, 'WD Westen M.2 SSD 256GB', '10216579738711586236803-WDS120G2G0B-thb3.jpg', 5500, 7, 'Electronics', 'Sequential read is 2200MBps Sequential write is 1GBps'),
(92, 22, 'Acer Nitro Monitor ', '1111657979868acer nitrro monitor.jpg', 28000, 4, 'Electronics', 'Blazing 165Hz refresh rate with NVIDIAs G_SYNC and AMDs FREE_SYNC support. 1ms response time.');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sID` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sID`, `session_id`, `product_id`) VALUES
(77, 'd8uro00q6na46s6jtuqvr8fdum', '18');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`category_id`, `subcategory_id`, `subcategory_name`) VALUES
(1, 1, 'Laptop'),
(1, 2, 'Mobile_Accessories'),
(2, 3, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `user_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`user_id`, `supplier_id`, `supplier_name`, `supplier_address`) VALUES
(102, 90, 'Tilak Consultancy Pvt Ltd', 'Newroad-Pokhara'),
(111, 92, 'ZOZOHUB TRADERS', 'Amarsingh Chowk, Pokhara'),
(112, 93, 'Nawaraj Fancy Shop', 'Bagar-1 Pokahara');

-- --------------------------------------------------------

--
-- Table structure for table `temp_product`
--

CREATE TABLE `temp_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(25) NOT NULL,
  `product_price` decimal(7,0) NOT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_details` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_product`
--

INSERT INTO `temp_product` (`product_id`, `product_title`, `product_price`, `product_image`, `product_category`, `product_details`) VALUES
(31, 'Lenevo Legion 5', '175000', 'e9798ccac62379c12c54747ac21e0108.png', 'Electronics', 'Paras Has This Laptop. It looks awesome. It has 100% Color Accuracy.'),
(32, 'Acer Nitro 5', '110000', 'acer-nitro-5_an515-55_rgb-kb_modelpreview_7.png', 'Electronics', 'I own this laptop. This laptop is cheap in price and is a beast as well. It has very good display as comapred to its competitors.'),
(33, 'Dell ALeinware Laptop', '350000', '6461723cv7d.jpg', 'Electronics', 'I always wanted this laptop. But i dont have enough money to buy it.'),
(34, 'Dettol Shop', '350', '7.jpg', 'household', 'It kills 99.9% of the germs'),
(35, 'HP Pavilion Laptop', '75000', 'hplaptop.jpg', 'Electronics', 'It has good battery life. But  the display quality isnt that great. It is a budget laptop'),
(36, 'Dell G5 Gaming Laptop', '135000', 'delllaptop.jpg', 'Electronics', 'The display & other specs. quality is poor and the price is also high.'),
(37, 'Acer Aspire 5', '80000', 'Acer Aspire 5.jpg', 'Electronics', 'I think i will copy everything from now.'),
(38, 'Door', '15000', '1.jpg', 'household', 'I think i will copy everything from now.'),
(39, 'Coffee', '450', '6.jpg', 'household', 'I think i will copy everything from now.'),
(40, 'Skateboard', '2200', '3.jpg', 'household', 'This might be fun but i have never palyed in htis thing.'),
(41, 'Speakers', '75000', '4.jpg', 'household', 'I love to listen from the analogue speakers and want to feel the beat');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`user_id`, `product_id`, `transaction_id`, `product_quantity`, `total_price`, `product_price`) VALUES
(113, 3, 8, 1, 360000, 360000),
(113, 3, 10, 1, 360000, 360000),
(111, 3, 12, 1, 360000, 360000),
(102, 12, 13, 1, 12000, 12000),
(102, 3, 14, 1, 360000, 360000),
(102, 14, 15, 1, 450, 450),
(102, 10, 16, 1, 56000, 56000),
(102, 9, 17, 1, 1800, 1800),
(102, 9, 18, 1, 1800, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(35) DEFAULT NULL,
  `user_phone_number` decimal(10,0) DEFAULT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_bank_name` varchar(50) NOT NULL,
  `user_bank_branch_name` varchar(50) NOT NULL,
  `user_bank_account_number` decimal(16,0) DEFAULT NULL,
  `user_gender` varchar(6) DEFAULT NULL,
  `user_username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_phone_number`, `user_password`, `user_bank_name`, `user_bank_branch_name`, `user_bank_account_number`, `user_gender`, `user_username`) VALUES
(64, 'Ozone Wagle', 'ozonewagle998@gmail.com', '9846317003', '1234512345', 'Machbank', 'Lamachaur', '1233322222222222', 'male', 'centaur'),
(102, 'Tilak Khatri', 'khatritilak956@gmail.com', '9805175076', 'tilak12345', 'Machbank', 'Lamachaur', '1233322222255555', 'male', 'khatritilak123'),
(111, 'Manish Poudel', 'manish@gmail.com', '9846317004', 'manish12345', 'Machbank', 'Lamachaur', '1553322122222222', 'Male', 'Thedevil'),
(112, 'Nawaraj Gautam', 'nawaraj123@gmail.com', '9846317005', 'nawaraj12345', 'Machbank', 'Lamachaur', '1233322222222201', 'male', 'jionawaraj'),
(113, 'Manish Chhetri', 'manishchhetri123@gmail.com', '9846317006', 'chhetri12345', 'Machbank', 'Lamachaur', '1233322222222202', 'male', 'chhetridairocks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_username` (`user_username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `unique_email_id` (`email_name`);

--
-- Indexes for table `pending_supplier`
--
ALTER TABLE `pending_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `fk_category_name` (`category_name`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sID`),
  ADD UNIQUE KEY `system_and_product_relation` (`session_id`,`product_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD UNIQUE KEY `subcategory_name` (`subcategory_name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `temp_product`
--
ALTER TABLE `temp_product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_image` (`product_image`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_phone_number` (`user_phone_number`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_bank_account_number` (`user_bank_account_number`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pending_supplier`
--
ALTER TABLE `pending_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `temp_product`
--
ALTER TABLE `temp_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`user_username`) REFERENCES `user` (`user_username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending_supplier`
--
ALTER TABLE `pending_supplier`
  ADD CONSTRAINT `pending_supplier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_name` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp_product`
--
ALTER TABLE `temp_product`
  ADD CONSTRAINT `temp_product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_name`);

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
