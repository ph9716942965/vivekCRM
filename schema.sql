-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 04:55 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposition`
--

CREATE TABLE if not exists  `disposition` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `operation_rule` text NOT NULL,
  `order_list` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposition`
--

INSERT INTO `disposition` (`id`, `name`, `operation_rule`, `order_list`) VALUES
(1, 'not intrested', 'never call', 1),
(2, 'ringing', 'ringing', 2),
(3, 'busy', 'busy', 3),
(4, 'switch off', 'switch off', 4),
(5, 'call back', 'call back', 5),
(6, 'sale done', 'sale done', 6);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE if not exists  `leads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `disposition_id` int(11) DEFAULT NULL,
  `name` tinytext,
  `phone` varchar(14) DEFAULT NULL,
  `email` tinytext,
  `problem` text,
  `next_calling_after` datetime DEFAULT NULL,
  `address` text,
  `city` tinytext,
  `state` tinytext,
  `pincode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `user_id`, `disposition_id`, `name`, `phone`, `email`, `problem`, `next_calling_after`, `address`, `city`, `state`, `pincode`) VALUES
(1, 1, 4, 'ravi shahtri', '123456', 'not@intrested.com', 'calling problem', '2019-11-25 19:55:00', 'test me', 'delhi', 'delhi', 110006);

-- --------------------------------------------------------

--
-- Table structure for table `leads_log`
--

CREATE TABLE if not exists  `leads_log` (
  `id` int(11) NOT NULL,
  `disposition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leads_id` int(11) NOT NULL,
  `old_record` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads_log`
--

INSERT INTO `leads_log` (`id`, `disposition_id`, `user_id`, `leads_id`, `old_record`) VALUES
(1, 4, 1, 1, '\"{\\\"address\\\":\\\"no add\\\",\\\"phone\\\":\\\"00000000\\\",\\\"city\\\":\\\"delhi\\\",\\\"state\\\":\\\"delhi\\\",\\\"pincode\\\":\\\"110006\\\",\\\"problem\\\":\\\"no problem\\\",\\\"next_calling_after\\\":\\\"2019-11-23 18:55:00\\\"}\"'),
(2, 4, 1, 1, '\"{\\\"address\\\":\\\"test me\\\",\\\"phone\\\":\\\"00000000\\\",\\\"city\\\":\\\"delhi\\\",\\\"state\\\":\\\"delhi\\\",\\\"pincode\\\":\\\"110006\\\",\\\"problem\\\":\\\"no problem\\\",\\\"next_calling_after\\\":\\\"2019-11-23 18:55:00\\\"}\"'),
(3, 4, 1, 1, '\"{\\\"address\\\":\\\"test me\\\",\\\"phone\\\":\\\"123456\\\",\\\"city\\\":\\\"delhi\\\",\\\"state\\\":\\\"delhi\\\",\\\"pincode\\\":\\\"110006\\\",\\\"problem\\\":\\\"calling problem\\\",\\\"next_calling_after\\\":\\\"2019-11-25 19:55\\\"}\"');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE if not exists  `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1574400444),
('m130524_201442_init', 1574400446),
('m190124_110200_add_verification_token_column_to_user_table', 1574400446);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE if not exists  `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'nasir', 'rKCi7ODpMTCiDznM5ZP45Ic0WZ6ew9-g', '$2y$13$uiF/Wb2bX0nLBdMHowqUrO6HIzCX6MXHE1KD.P2U9agT4I2/tn93C', NULL, 'nasir@programmer.net', 10, 1574416472, 1574416472, '9-5tL5tASbg3k0Lq6tw6rWK-c3S6mBl7_1574416472');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `disposition_id` (`disposition_id`);

--
-- Indexes for table `leads_log`
--
ALTER TABLE `leads_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposition`
--
ALTER TABLE `disposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads_log`
--
ALTER TABLE `leads_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
