-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 07:09 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stipino_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(14, 15, 10, '2016-08-20 20:27:07', '2016-08-20 20:27:07'),
(13, 10, 10, '2016-08-20 20:27:07', '2016-08-20 20:27:07'),
(12, 15, 9, '2016-08-20 16:10:16', '2016-08-20 16:10:16'),
(11, 6, 9, '2016-08-20 16:10:16', '2016-08-20 16:10:16'),
(10, 15, 8, '2016-08-20 15:25:26', '2016-08-20 15:25:26'),
(9, 6, 8, '2016-08-20 15:25:26', '2016-08-20 15:25:26'),
(8, 1, 8, '2016-08-20 15:25:26', '2016-08-20 15:25:26'),
(15, 21, 10, '2016-08-20 20:27:07', '2016-08-20 20:27:07'),
(16, 14, 10, '2016-08-20 20:27:07', '2016-08-20 20:27:07'),
(17, 16, 10, '2016-08-20 20:27:07', '2016-08-20 20:27:07'),
(18, 1, 11, '2016-08-20 21:18:19', '2016-08-20 21:18:19'),
(19, 32, 12, '2016-08-20 21:38:56', '2016-08-20 21:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
