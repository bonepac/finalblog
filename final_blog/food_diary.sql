-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 03:48 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(11) NOT NULL,
  `dietname` varchar(50) NOT NULL,
  `howtocook` text NOT NULL,
  `healthbenefit` text NOT NULL,
  `description` text NOT NULL,
  `submittedby` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`diet_id`, `dietname`, `howtocook`, `healthbenefit`, `description`, `submittedby`, `image`) VALUES
(1, 'Bean', 'This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n      This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n', 'vitamin', 'sweet', 'Aliyu', '90.jpeg'),
(2, 'Coco', 'This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n      This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n', 'protein', '', 'Nuhu', '5.jpeg'),
(3, 'Tuwo ', 'This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n      This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n', 'class form control name description', 'class form control name description', 'Vivian', '12.jpeg'),
(4, 'Yam', 'This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n      This is some sample text. This is some sample text. \n      This is some sample text. This is some sample text.\n', 'it give energy due to carbohydrate', 'yam can be eaten any time ', 'Sunday David', '4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'bello', 'Nuhu'),
(2, 'admin12345', 'admin12345', 'yemish', 'Nuhu'),
(3, 'sunday@gmail.com', 'David', 'Sunday', 'David');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `diet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
