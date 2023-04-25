-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.unaux.com
-- Generation Time: Apr 24, 2023 at 04:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unaux_33788194_onlinefoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '', '2023-03-12 09:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(15, 18, 'in process', 'ggg', '2023-03-13 14:28:28'),
(16, 19, 'in process', 'preparing', '2023-03-17 23:36:37'),
(17, 26, 'in process', 'ghjgjhbkb', '2023-04-05 14:32:45'),
(18, 27, 'rejected', 'k,pljk', '2023-04-21 14:28:00'),
(19, 27, 'in process', 'coming soon', '2023-04-21 17:04:01'),
(20, 27, 'rejected', 'hghg', '2023-04-22 07:55:53'),
(21, 28, 'in process', '', '2023-04-23 12:31:06'),
(22, 30, 'closed', '', '2023-04-23 12:31:22'),
(23, 27, 'in process', '', '2023-04-24 16:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(5, 9, 'Street Burger - Jaffna', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '6am', '9pm', '24hr-x7', 'Jaffna', '640f2fca620cf.png', '2023-03-13 14:14:34'),
(6, 10, 'Street Burger - Colombo', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '11am', '1am', '24hr-x7', 'Colombo', '640f3025cf008.png', '2023-03-13 14:16:05'),
(7, 11, 'Street Burger - Kandy', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '12pm', '8pm', '24hr-x7', 'Kandy', '640f306dd3732.png', '2023-03-13 14:17:17'),
(8, 12, 'Street Burger - one galle face mall', 'streetburgerjaffna@gmail.com', '1234567890', 'streetburger.com', '6am', '11pm', '24hr-x7', 'one galle face mall', '640f30c65c843.png', '2023-03-13 14:18:46'),
(9, 10, 'Gowry', 'niroshuthan24@gmail.com', '1234567890', 'kltnhkdenhiog.com', '10am', '3am', 'Mon-Sat', 'gjmjmj', '64154f71cb974.png', '2023-03-18 05:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(7, 'keerththan', 'keerththan', 'keerththan', 'keerththan@gmail.com', '1234567890', '4bc1df58ca9ee87b682b0d7ecdd2e535', 'keerththan', 1, '2023-04-24 16:17:44'),
(10, 'Gowry', 'sanga', 'shuthan', 'niroshuthan24@gmail.com', '1234567890', '3af00c6cad11f7ab5db4467b66ce503e', 'gjmjmj', 1, '2023-04-23 19:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`, `order_date`) VALUES
(27, 7, 'Hamburger ', 1, '299.00', 'in process', '2023-04-24 16:18:40', ''),
(28, 7, 'Cheeseburger ', 2, '399.00', 'in process', '2023-04-23 12:31:06', ''),
(30, 7, 'Hamburger ', 3, '299.00', 'closed', '2023-04-23 12:31:22', ''),
(39, 7, 'Cheeseburger ', 1, '399.00', NULL, '2023-04-24 15:43:54', '2023-04-24 11:43:53am'),
(42, 7, 'Turkey Avocado Burge', 19, '799.00', NULL, '2023-04-24 20:14:08', '2023-04-2404:14:08pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
