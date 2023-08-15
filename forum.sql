-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 11:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `acgpage`
--

CREATE TABLE `acgpage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploader` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `anonymous` tinyint(1) DEFAULT 0,
  `page_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acgpage`
--

INSERT INTO `acgpage` (`id`, `title`, `description`, `uploader`, `date`, `reply`, `anonymous`, `page_type`) VALUES
(10, '123', '2323', 'Admin', '2023-07-27', NULL, 0, 'acgpage');

-- --------------------------------------------------------

--
-- Table structure for table `acg_replies`
--

CREATE TABLE `acg_replies` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `anonymous` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acg_replies`
--

INSERT INTO `acg_replies` (`id`, `post_id`, `content`, `uploader`, `date`, `anonymous`) VALUES
(1, 31, '123', 'Admin', '2023-07-27 15:10:11', 0),
(2, 31, '123', 'Admin', '2023-07-27 15:10:16', 0),
(3, 31, 'nxa', 'Low', '2023-07-27 15:19:56', 0),
(4, 31, '打算', 'Jim', '2023-07-31 13:00:08', 0),
(5, 31, '是我', 'Anonymous', '2023-07-31 13:00:18', 0),
(6, 31, 'mjhg', 'Low', '2023-08-02 10:42:16', 0),
(7, 31, 'pppp\r\n', 'Low', '2023-08-03 15:43:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `esportpage`
--

CREATE TABLE `esportpage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploader` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `anonymous` tinyint(1) DEFAULT 0,
  `page_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esportpage`
--

INSERT INTO `esportpage` (`id`, `title`, `description`, `uploader`, `date`, `reply`, `anonymous`, `page_type`) VALUES
(11, '123', '2323', 'Admin', '2023-07-27', NULL, 0, 'esportpage'),
(12, 'fd', 'dsd', 'Anonymous', '2023-07-31', NULL, 1, 'esportpage');

-- --------------------------------------------------------

--
-- Table structure for table `esport_replies`
--

CREATE TABLE `esport_replies` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `anonymous` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `esport_replies`
--

INSERT INTO `esport_replies` (`id`, `post_id`, `content`, `uploader`, `date`, `anonymous`) VALUES
(1, 32, '12323', 'Admin', '2023-07-27 15:12:36', 0),
(2, 32, 'da', 'Anonymous', '2023-07-27 15:20:05', 0),
(3, 37, 'zxz', 'Jim', '2023-07-31 13:02:22', 0),
(4, 37, 'xcx', 'Anonymous', '2023-07-31 13:02:31', 0),
(5, 37, 'PP', 'Low', '2023-08-03 15:43:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feitpage`
--

CREATE TABLE `feitpage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploader` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `anonymous` tinyint(1) DEFAULT 0,
  `page_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feitpage`
--

INSERT INTO `feitpage` (`id`, `title`, `description`, `uploader`, `date`, `reply`, `anonymous`, `page_type`) VALUES
(30, '1232', '2323232', 'Admin', '2023-07-27', NULL, 0, 'feitpage'),
(31, 'bbcmabsmcaa', 'caca', 'Low', '2023-07-27', NULL, 0, 'feitpage'),
(32, 'dffdf', '求求你', 'Anonymous', '2023-07-31', NULL, 1, 'feitpage'),
(34, 'houodwo', 'nncak', 'Low', '2023-08-04', NULL, 0, 'feitpage'),
(35, 'test', 'test', 'Low', '2023-08-10', NULL, 0, 'feitpage'),
(36, 'test', 'test', 'Admin', '2023-08-10', NULL, 0, 'feitpage');

-- --------------------------------------------------------

--
-- Table structure for table `feit_replies`
--

CREATE TABLE `feit_replies` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `anonymous` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feit_replies`
--

INSERT INTO `feit_replies` (`id`, `post_id`, `content`, `uploader`, `date`, `anonymous`) VALUES
(1, 34, 'kjhgfgio', 'Low', '2023-08-02 10:48:33', 0),
(2, 34, 'kka', 'Low', '2023-08-03 15:42:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uploader` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `page_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `uploader`, `date`, `page_type`) VALUES
(30, '1232', '2323232', 'Admin', '2023-07-27', 'feitpage'),
(31, '123', '2323', 'Admin', '2023-07-27', 'acgpage'),
(32, '123', '2323', 'Admin', '2023-07-27', 'esportpage'),
(33, 'bbcmabsmcaa', 'caca', 'Low', '2023-07-27', 'feitpage'),
(34, 'dffdf', '求求你', 'Anonymous', '2023-07-31', 'feitpage'),
(36, 'fd', 'dsd', 'Anonymous', '2023-07-31', 'esportpage'),
(37, 'xzx', 'dsds', 'Jim', '2023-07-31', 'esportpage'),
(38, 'houodwo', 'nncak', 'Low', '2023-08-04', 'feitpage'),
(40, 'test', 'test', 'Admin', '2023-08-10', 'feitpage');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Low', 'andylow1223@gmail.com', '$2y$10$0D1F5qCCrbfP37UJUnWWuOZ.4PEfPsvZuaXpuPC37tGRJN2lGkwBq', NULL),
(4, 'Admin', 'admin@gmail.com', '$2y$10$.YGpAkHCKXzI0mM5Wc7BrOGcidDCIDgzhFj3oVTzKEU5Xto2BHdOG', NULL),
(6, 'Jim', 'jim@gmail.com', '$2y$10$4fI2GvvBu17F6wcFMMrMaebPbbjn0K5x8S6mfTNTR7wQSS4WR6b9y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acgpage`
--
ALTER TABLE `acgpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acg_replies`
--
ALTER TABLE `acg_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acg_replies_ibfk_1` (`post_id`);

--
-- Indexes for table `esportpage`
--
ALTER TABLE `esportpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esport_replies`
--
ALTER TABLE `esport_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `esport_replies_ibfk_1` (`post_id`);

--
-- Indexes for table `feitpage`
--
ALTER TABLE `feitpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feit_replies`
--
ALTER TABLE `feit_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feit_replies_ibfk_1` (`post_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acgpage`
--
ALTER TABLE `acgpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `acg_replies`
--
ALTER TABLE `acg_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `esportpage`
--
ALTER TABLE `esportpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `esport_replies`
--
ALTER TABLE `esport_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feitpage`
--
ALTER TABLE `feitpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feit_replies`
--
ALTER TABLE `feit_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acg_replies`
--
ALTER TABLE `acg_replies`
  ADD CONSTRAINT `acg_replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `esport_replies`
--
ALTER TABLE `esport_replies`
  ADD CONSTRAINT `esport_replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feit_replies`
--
ALTER TABLE `feit_replies`
  ADD CONSTRAINT `feit_replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `feitpage` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
