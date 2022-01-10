-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2019 at 06:59 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frnd_req_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'Sarnav Kundu', 'kundusarnav@gmail.com', '$2y$10$7b/nrViVRuZ9uHGmKb3yqOc1fDOtMtma8j1TnE1YT./88wEiJvNdS', '8.png'),
(2, 'Saurav Kumar', 'kumarsaurav@gmail.com', '$2y$10$LR8g9V4GMcQDcjDuNPGcXuM/XwN7lP9uBrhqy5Fee5zTTNM4ohtKS', '12.png'),
(4, 'Prakhar Kanchan', 'kanchanprakhar@gmail.com', '$2y$10$i3gQG4CIOExBF2kYOSIId.cbPhafFLP3QnkZF4JmNSjkbck81crcq', '4.png'),
(5, 'eeee', 'sarnav@gmail.com', '$2y$10$P8IXn/Z4wd0ZjmjocrFnIetTR5jrD6s/gqwiP5AqwNacYoe2l6aCO', '11.png'),
(6, 'aa', 'gasv@gmail.com', '$2y$10$wifEzBDAjPg5qUr257pWwOQZdkbawawZzr9VYL.RmyLT1K90Y1W4i', '7.png'),
(7, 'eeee', 'abc@gmail.com', '$2y$10$i0E0EnOAY5MCYfAMh84sWulCgE9iA/uwdJN1VkRkvW/HxCXQyW6Ma', '11.png'),
(8, 'Romit Kumar', 'kumarromit@gmail.com', '$2y$10$7DJYFPRlrtocwZvvGszYxu0iXAVMPLZ.j8He6mGgRJgI/cm6.Babu', '9.png'),
(9, 'Rohan Singh', 'aaaa@aa.aa', '$2y$10$4AQ5TvhekhEnue2zd9SZQuvsA5AfgGu5pWrRQBXUmNoGZk473wsI.', '4.png'),
(10, 'rrrrrrrrrr', 'rrrrrrr@ggg.hggg', '$2y$10$KPP3UmNHRXsl3H/1emIc0OxRQQmm97g4k6xP5nceISs/n/BLBQ6zq', '3.png'),
(11, 'Anurag Verma', 'vermaanurag@gmail.com', '$2y$10$LABm.cR6tZQItROxmERd6.gfDElCeh9knF/OcCaEuhVIv8NXFZwou', '8.png'),
(12, 'Yash Karanke', 'xxx@sss.com', '$2y$10$eW1J3Oz8zy8g2oJJTUw7hOc1Wh5WtVr6bcPQF0XOgYmp8b7J6d8cS', '2.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
