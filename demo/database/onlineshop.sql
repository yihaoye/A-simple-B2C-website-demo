-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2015 at 08:35 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img_source` varchar(255) NOT NULL,
  `img_source2` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `title`, `price`, `description`, `number`, `category`, `img_source`, `img_source2`) VALUES
(1, 'apple', 2.1, 'Newzealand local apple', 5, 'fruit', 'images/apple.jpg', 'images/apple1.jpg'),
(2, 'Chocolate Milk', 7.5, 'Famous Chocolate Milk', 8, 'drink', 'images/ChocMilk.jpg', ''),
(3, 'Feijoa', 3.3, 'Local feijoa, grown in south pacific', 20, 'fruit', 'images/feijoas.jpg', ''),
(4, 'Pure Milk', 15.8, 'For baby', 5, 'drink', 'images/pure-milk.jpg', ''),
(5, 'Milk Powder', 20, 'For baby', 3, 'drink', 'images/milk-powder.jpg', ''),
(6, 'honey', 13.5, 'Wild Flower honey', 8, 'others', 'images/honey.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`user_id`, `firstname`, `lastname`, `email_address`, `password`) VALUES
(1, 'Yihao', 'Ye', '470803539@qq.com', '470803539');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
