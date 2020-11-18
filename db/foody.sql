-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 12:29 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drinks'),
(5, 'Deserts'),
(6, 'Wine');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`product_id`, `product_name`, `product_price`, `product_category`, `product_desc`, `image`) VALUES
(4, 'Brownie', '125', 'Deserts', 'Chocolate filled Brownie', 'dessert-3.jpg'),
(5, 'Pancake', '190', 'Deserts', 'Mini pancakes layered with cream cheese,strawberry', 'dessert-1.jpg'),
(6, 'Mixed Berries', '190', 'Deserts', 'Fresh Mixed Berries with Brown Sugar and Chambord topped with Fresh Whipped Cream ', 'dessert-2.jpg'),
(7, 'Ice cream Cone', '50', 'Deserts', 'Strawberry Ice cream with Cone', 'dessert-4.jpg'),
(8, 'Ice cream ', '60', 'Deserts', 'Chocolate Ice Cream', 'dessert-5.jpg'),
(9, 'Salad', '60', 'Breakfast', 'Vegetable Grilled Salad', 'breakfast-2.jpg'),
(10, 'Egg Veggie Salad', '60', 'Breakfast', 'Protein rich Salad with egg White ,Vegetables,Avocado', 'breakfast-4.jpg'),
(11, 'Crispy Fried Chicken', '200', 'Breakfast', 'Very Crispy Chiken Fry', 'breakfast-5.jpg'),
(12, 'Fish Fry', '200', 'Breakfast', 'Fish Fry with Olive Oil,Spinach Salad', 'breakfast-7.jpg'),
(13, 'Oats', '50', 'Breakfast', 'Oats with Milk and Strawberry ', 'breakfast-8.jpg'),
(14, 'Grilled Tandoori Chicken', '200', 'Dinner', 'Grilled Tandoor Chicken with Salad', 'dinner-1.jpg'),
(15, 'Chicken Soupy Noodles', '250', 'Dinner', 'Chinese Soupy Noodles with Boiled Chiken', 'dinner-2.jpg'),
(16, 'Special Omlet', '250', 'Dinner', 'Very Fluffy Omlet with Grilled Vegies,Kabab ', 'dinner-3.jpg'),
(17, 'Meat Vegetable Soup', '250', 'Dinner', 'Roasted meat with Soup and Salad', 'dinner-4.jpg'),
(18, 'Nonveg Noodles', '300', 'Dinner', 'Noodles with meat,vegetable ', 'dinner-5.jpg'),
(19, 'Orange Strawberry Cocktail', '60', 'Drinks', 'Orange Strawberry Chilled Cocktail', 'drink-1.jpg'),
(20, 'Lime Fresh Juice', '50', 'Drinks', 'Lemon Fresh Juice', 'drink-2.jpg'),
(21, 'Orange Juice', '60', 'Drinks', 'Fresh Orange Juice', 'drink-3.jpg'),
(22, 'Diet Coke Cocktail', '120', 'Drinks', 'Cocktail with Coca Cola,Ice', 'drink-6.jpg'),
(23, 'The Rum and Coke', '250', 'Drinks', 'The Combination with Coca Cola,Rum,Lime,Ice', 'drink-4.jpg'),
(24, 'Singapur Sling', '300', 'Wine', 'This Wine Made of Cherry brandy,Pineapple Juice,Lemon tart', 'drink-7.jpg'),
(25, 'Roasted Meat', '450', 'Lunch', 'Meat Roasted with Olive Oil,and Garnish with Salad  ', 'lunch-1.jpg'),
(26, 'Chicken Leg Piece', '200', 'Lunch', 'Chicken Leg with Salad ', 'lunch-2.jpg'),
(27, 'Prawns Stick ', '300', 'Lunch', 'Prawns Stick with Soya Souce  and Griddled Greens', 'lunch-4.jpg'),
(28, 'Chicken Tandoori ', '500', 'Lunch', 'Chicken full Tandoori with Gravy ', 'lunch-7.jpg'),
(29, 'Mix Seafood', '500', 'Lunch', 'This Seafood Dish Having  Clam,Crab,fish,Prawns', 'lunch-5.jpg'),
(30, 'Red Wine', '350', 'Wine', 'Red Wine 250ML', 'wine-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_email` varchar(255) NOT NULL,
  `payment_address` varchar(255) NOT NULL,
  `sate` varchar(30) NOT NULL,
  `postal` varchar(7) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `name_on_card` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `payment_name`, `payment_email`, `payment_address`, `sate`, `postal`, `phone`, `name_on_card`, `date`) VALUES
(3, 2, 'rahul', 'rahul@example.com', 'saphale', 'maharashtra', '401102', '9876543221', 'Rahul', '2020-08-19 17:48:34'),
(4, 2, 'Rahul', 'rahul@example.com', 'saphale', 'maharashtra', '401102', '9876543210', 'Rahul', '2020-08-19 18:31:17'),
(5, 2, 'Rahul', 'rahul@example.com', 'saphale', 'maharashtra', '401102', '9876543210', 'Rahul', '2020-08-19 18:36:36'),
(6, 2, 'Rahul', 'rahul@example.com', 'saphale', 'maharashtra', '401101', '8989898989', 'Rahul', '2020-08-19 18:37:55'),
(8, 2, 'Rahul', 'rp@example.com', 'saphale', 'maharashtra', '401102', '9876543210', 'Rahul', '2020-08-20 14:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_email` varchar(255) NOT NULL,
  `res_phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `person` varchar(255) NOT NULL,
  `status` enum('Pending','Confirmed') NOT NULL,
  `bookedon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `user_id`, `res_name`, `res_email`, `res_phone`, `date`, `time`, `person`, `status`, `bookedon`) VALUES
(1, 2, 'Prajakra', 'mau@example.com', '9876543210', '2020-08-19', '17:04:00', '2', 'Confirmed', '2020-08-18'),
(3, 3, 'Rahul', 'rp@example.com', '9876543210', '2020-08-24', '17:00:00', '2', 'Confirmed', '2020-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_role` enum('admin','subscriber') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `city`, `address`, `date`, `user_role`) VALUES
(1, 'Admin', 'admin@example.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '9876543210', 'Saphale', 'Saphale', '2020-08-18', 'admin'),
(2, 'Mau', 'mau@example.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '9876541230', 'Saphale', 'Saphale', '2020-08-18', 'subscriber'),
(3, 'Rahul', 'rp@example.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '7894561230', 'Mumbai', 'Saphale', '2020-08-18', 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `order_status` enum('Added to cart','Order Pending','Order Confirmed','Order Cancelled') NOT NULL,
  `order_on` date NOT NULL,
  `order_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`order_id`, `user_id`, `item_id`, `quantity`, `cost`, `order_status`, `order_on`, `order_time`) VALUES
(34, 2, 11, 1, '200', 'Added to cart', '2020-08-20', '15:06:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
