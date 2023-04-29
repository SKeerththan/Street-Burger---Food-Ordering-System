-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2023 at 07:16 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '', '2023-03-12 09:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE IF NOT EXISTS `dishes` (
  `d_id` int(222) NOT NULL AUTO_INCREMENT,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(20, 5, 'Hamburger ', 'A hamburger, or simply burger, is a sandwich consisting of fillingsâ€”usually a patty of ground meat, typically beefâ€”placed inside a sliced bun or bread roll', '299.00', '640f38bc1b3d7.jpg'),
(21, 5, 'Cheeseburger ', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty.', '399.00', '640f38fe728a8.jpg'),
(22, 6, 'Turkey Burgers ', 'Gather all ingredients. Â· Mix ground turkey, seasoned bread crumbs, onion, egg whites, parsley, garlic, salt, and pepper together in a large bowl.', '199.00', '640f3956d65bb.jpg'),
(23, 6, 'Baguette Burger ', 'Ground beef, quail eggs, panko bread crumbs, tomato, milk', '599.00', '640f398e4169e.jpg'),
(24, 7, 'Turkey Avocado Burge', 'In a large bowl, combine the turkey, mayo, salt, pepper, chili powder, dried oregano, cumin, and 2 tablespoons of tapioca flour.', '799.00', '640f39cdbc914.jpg'),
(25, 8, 'Chicken Burger ', 'These burgers are loaded with tender & succulent chicken patties, dressed with a simple sauce.', '999.00', '640f3a5d7c3dd.jpg'),
(26, 8, 'Ham Sandwich ', 'The ham sandwich is a common type of sandwich. The bread may be fresh or toasted, and it can be made with a variety of toppings including cheese and vegetables like lettuce, tomato, onion or pickle slices.', '799.00', '640f3ac95d4eb.jpg'),
(28, 8, 'Beef Burger ', 'Rolls, beef steak mince, olive oil, ketchup, egg', '199.00', '640f3fa41b965.jpg'),
(29, 8, 'Fish Sandwich ', 'A fish sandwich is, most generally, any kind of sandwich made with fish.', '2999.00', '640f3febe1cd0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
CREATE TABLE IF NOT EXISTS `remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(15, 18, 'in process', 'ggg', '2023-03-13 14:28:28'),
(16, 23, 'closed', 'tyt', '2023-04-17 05:19:16'),
(17, 25, 'in process', 'hhhhhhhhh', '2023-04-22 20:13:20'),
(18, 23, 'in process', 'uh', '2023-04-22 20:13:59'),
(19, 30, 'closed', 'ssss', '2023-04-22 22:59:16'),
(20, 29, 'in process', 'ws', '2023-04-22 23:00:20'),
(21, 29, 'in process', 'wesedwe', '2023-04-22 23:00:28'),
(22, 29, 'rejected', 'fggf', '2023-04-22 23:05:59'),
(23, 23, 'closed', 'nbb', '2023-04-22 23:11:09'),
(24, 23, 'in process', '', '2023-04-22 23:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `rs_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`rs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(5, 9, 'Street Burger - Jaffna', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '6am', '9pm', '24hr-x7', 'Jaffna', '640f2fca620cf.png', '2023-03-13 14:14:34'),
(6, 10, 'Street Burger - Colombo', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '11am', '1am', '24hr-x7', 'Colombo', '640f3025cf008.png', '2023-03-13 14:16:05'),
(7, 11, 'Street Burger - Kandy', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '12pm', '8pm', '24hr-x7', 'Kandy', '640f306dd3732.png', '2023-03-13 14:17:17'),
(8, 12, 'Street Burger - one galle face mall', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '6am', '11pm', '24hr-x7', 'one galle face mall', '640f30c65c843.png', '2023-03-13 14:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

DROP TABLE IF EXISTS `res_category`;
CREATE TABLE IF NOT EXISTS `res_category` (
  `c_id` int(222) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(9, 'Breakfast', '2023-03-12 18:44:57'),
(10, 'Lunch', '2023-03-12 18:45:01'),
(11, 'Dinner', '2023-03-12 18:45:05'),
(12, 'Anytime', '2023-03-12 18:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `token` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `token`, `date`) VALUES
(7, 'sss', 'sss', 'sss', '', 'ssssss', '4bc1df58ca9ee87b682b0d7ecdd2e535', 'ssssss', 1, '', '2023-04-27 17:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

DROP TABLE IF EXISTS `users_orders`;
CREATE TABLE IF NOT EXISTS `users_orders` (
  `o_id` int(222) NOT NULL AUTO_INCREMENT,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_date` varchar(500) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `order_date`) VALUES
(23, 7, 'Hamburger ', 5, '299.00', 'in process', '2023-04-25 01:18:26', '0000-00-00'),
(29, 7, 'Hamburger ', 1, '299.00', 'rejected', '2023-04-25 01:18:30', '0000-00-00'),
(30, 7, 'Cheeseburger ', 1, '399.00', 'closed', '2023-04-25 01:18:34', '0000-00-00'),
(74, 7, 'Hamburger ', 4, '299.00', NULL, '2023-04-28 14:03:02', '2023-04-2802:03:02pm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
