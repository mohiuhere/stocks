-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 05:35 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `user_id`, `company_id`, `cost`, `created_at`, `updated_at`) VALUES
(3, 30, 2, 200, '2021-12-14 20:04:22', '2021-12-14 20:04:22'),
(6, 31, 2, 200, '2021-12-17 10:58:29', '2021-12-17 10:58:29'),
(7, 32, 5, 200, '2021-12-17 11:04:04', '2021-12-17 11:04:04'),
(8, 30, 1, 200, '2021-12-17 16:43:07', '2021-12-17 16:43:07'),
(9, 30, 5, 200, '2021-12-17 16:45:47', '2021-12-17 16:45:47'),
(10, 31, 1, 200, '2021-12-17 16:46:17', '2021-12-17 16:46:17'),
(11, 31, 5, 200, '2021-12-17 16:46:25', '2021-12-17 16:46:25'),
(12, 32, 1, 200, '2021-12-17 16:46:41', '2021-12-17 16:46:41'),
(13, 32, 2, 200, '2021-12-17 16:46:46', '2021-12-17 16:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) UNSIGNED NOT NULL,
  `volume` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `price`, `volume`, `created_at`, `updated_at`) VALUES
(1, 'Apple Inc', 178.11, 68, '2021-12-10 19:53:01', '2021-12-10 19:53:01'),
(2, 'Microsoft Corporation', 339.86, 35, '2021-12-10 20:00:21', '2021-12-10 20:00:21'),
(5, 'Alphabet Inc. - Class A', 200.00, 68, '2021-12-13 13:30:18', '2021-12-13 13:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_account`
--

CREATE TABLE `company_account` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `company_id`, `seller_id`, `is_active`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(9, 5, 30, 1, 200, 20, '2021-12-17 17:14:15', '2021-12-17 17:14:15'),
(10, 2, 30, 1, 300, 50, '2021-12-17 17:14:58', '2021-12-17 17:14:58'),
(11, 1, 30, 1, 100, 60, '2021-12-17 17:16:28', '2021-12-17 17:16:28'),
(12, 1, 30, 1, 10, 2, '2021-12-17 17:17:27', '2021-12-17 17:17:27'),
(13, 1, 30, 0, 10, 1, '2021-12-17 17:18:17', '2021-12-17 17:18:17'),
(14, 1, 31, 0, 200, 52, '2021-12-17 17:18:45', '2021-12-17 17:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `id` int(10) UNSIGNED NOT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `total_cost` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `buyer_id`, `item_id`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 30, 11, 6000, '2021-12-18 07:25:42', '2021-12-18 07:25:42'),
(2, 30, 11, 6000, '2021-12-18 07:26:30', '2021-12-18 07:26:30'),
(4, 30, 14, 10400, '2021-12-18 09:30:55', '2021-12-18 09:30:55'),
(5, 31, 13, 10, '2021-12-18 09:33:32', '2021-12-18 09:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `passwd`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Mohiuddin', 'Tamim', 'mohio', 'mohiuddintamim999@gmail.com', 'a5ee1f6d1a261a1a1dc90b2145b7d7dc', '+8801747884473', 'admin', '2021-12-11 09:22:56', '2021-12-11 09:22:56'),
(28, 'Zubayer', 'Rashid', 'ratul', 'zubayer102019@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801847353818', 'admin', '2021-12-11 09:54:45', '2021-12-11 09:54:45'),
(30, 'Shamsul', 'Faruquei', 'shamsulfaruquei', 'enam.revan.2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801234567891', 'user', '2021-12-11 09:58:54', '2021-12-11 09:58:54'),
(31, 'Moinul', 'Ehtesam', 'moinulehtesam', 'moinulehtesamchy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801234567891', 'user', '2021-12-11 18:59:07', '2021-12-11 18:59:07'),
(32, 'Hasibul Hasan', 'Shourav', 'shourav', 'hasibulhasan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+8801234567891', 'user', '2021-12-12 05:48:07', '2021-12-12 05:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `balance`, `created_at`, `updated_at`) VALUES
(30, 9610, '2021-12-11 09:58:54', '2021-12-11 09:58:54'),
(31, 22790, '2021-12-11 18:59:07', '2021-12-11 18:59:07'),
(32, 5000, '2021-12-12 05:48:07', '2021-12-12 05:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_stocks`
--

CREATE TABLE `user_stocks` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_stocks`
--

INSERT INTO `user_stocks` (`user_id`, `company_id`, `quantity`, `created_at`, `updated_at`) VALUES
(30, 1, 210, '2021-12-17 17:12:28', '2021-12-17 17:12:28'),
(30, 2, 442, '2021-12-17 17:12:31', '2021-12-17 17:12:31'),
(30, 5, 274, '2021-12-17 17:12:32', '2021-12-17 17:12:32'),
(31, 1, 378, '2021-12-17 17:12:28', '2021-12-17 17:12:28'),
(31, 2, 130, '2021-12-17 17:12:31', '2021-12-17 17:12:31'),
(31, 5, 359, '2021-12-17 17:12:33', '2021-12-17 17:12:33'),
(32, 1, 200, '2021-12-17 17:12:28', '2021-12-17 17:12:28'),
(32, 2, 393, '2021-12-17 17:12:31', '2021-12-17 17:12:31'),
(32, 5, 299, '2021-12-17 17:12:33', '2021-12-17 17:12:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_account`
--
ALTER TABLE `company_account`
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_stocks`
--
ALTER TABLE `user_stocks`
  ADD PRIMARY KEY (`user_id`,`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `company_account`
--
ALTER TABLE `company_account`
  ADD CONSTRAINT `company_account_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `trade`
--
ALTER TABLE `trade`
  ADD CONSTRAINT `trade_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `trade_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
