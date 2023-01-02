-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 02:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrowculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE `funding` (
  `Funding_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `Field` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `Bank_Acc` text NOT NULL,
  `Requested_Amount` bigint(20) NOT NULL,
  `Status` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`Funding_id`, `user_name`, `Field`, `DESCRIPTION`, `Bank_Acc`, `Requested_Amount`, `Status`, `Date`) VALUES
(39, 'NaziaOishee', 'Farming', 'I NEED FUNDING', 'AB-3456', 12000, 'A', '2022-10-23'),
(40, 'naziakarim', 'Crops', '12345', 'Ab-12345', 1000, 'P', '2022-10-23'),
(41, 'naziakarim', 'Crops', 'Requesting Funds', 'AB-123', 10000, 'P', '2022-10-23'),
(42, 'naziakarim', 'Fisheries', '..', 'AC-121', 5000, 'P', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `Investment_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `Field` varchar(200) NOT NULL,
  `Bank_Acc` text NOT NULL,
  `Provided_Amount` bigint(20) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`Investment_id`, `user_name`, `Field`, `Bank_Acc`, `Provided_Amount`, `Status`, `Date`) VALUES
(33, 'NaziaOishee', 'Crops', 'ABCDEFGHIJ', 11111111, 'D', '2022-10-23'),
(34, 'NaziaOishee', 'Crops', 'ABCDEFGHIJ', 11111, 'D', '2022-10-23'),
(35, 'naziakarim', 'Crops', 'Testing', 11111111, 'D', '2022-10-23'),
(36, 'naziakarim', 'Crops', 'AB-989', 1000, 'D', '2022-10-23'),
(37, 'naziakarim', 'Farming', '11111111111111111111111111', 12000, 'D', '2022-12-26'),
(38, 'naziakarim', 'Crops', 'ASDFGHJKL', 1000, 'D', '2022-12-26'),
(39, 'naziakarim', 'Crops', 'ASDFGHJKL', 10000, 'D', '2022-12-26'),
(40, 'naziakarim', 'Farming', 'AB-222', 12000, 'D', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Purchase_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `Seller_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Purchase_id`, `user_name`, `Seller_id`, `Quantity`, `Address`, `Date`) VALUES
(11, 'naziakarim', 4, 1, 'gazipur', '2022-12-29 04:21:43'),
(12, 'naziakarim', 4, 1, 'gazipur', '2022-12-29 04:22:29'),
(13, 'naziakarim', 4, 1, 'gazipur', '2022-12-29 04:25:12'),
(14, 'naziakarim', 4, 1, 'gazipur', '2022-12-29 04:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `Seller_id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Review` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_name`, `Seller_id`, `Date`, `Review`, `description`) VALUES
(31, 'naziakarim', 1, '2022-12-29 13:08:54', 5, 'A very good platform to connect the customers and the farmers together. User friendly UI. Loved it. Very good experience. I will 100% recommend it '),
(32, 'naziakarim', 1, '2022-12-29 10:07:30', 3, 'Nice'),
(33, 'naziakarim', 3, '2022-12-29 12:28:00', 1, 'Bad'),
(35, 'naziakarimkhan', 1, '2022-12-29 12:41:18', 4, 'vv nice good product. i like it');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `Seller_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `Field` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Bank_Acc` int(11) NOT NULL,
  `Status` text NOT NULL,
  `Date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`Seller_id`, `user_name`, `Field`, `Quantity`, `Bank_Acc`, `Status`, `Date`, `image`, `product_name`, `unit_price`) VALUES
(1, 'naziakarim', 'Vegetables', 2, 999, 'p', '2022-10-26', 'tomato.jfif', 'tomato', 12),
(2, 'naziakarim', 'Fruits', 10, 1, 'p', '2022-11-15', 'Screenshot (1).png', 'mango', 12),
(3, 'naziakarim', 'Vegetables', 2, 111111111, 'p', '2022-12-28', 'tomato.jfif', 'tomatoo', 12),
(4, 'naziakarim', 'Vegetables', 12, 1111111111, 'p', '2022-12-28', 'carrot.jfif', 'carrot', 20),
(5, 'naziakarim', 'Fruits', 20, 11111111, 'p', '2022-12-28', 'apple.jfif', 'apple', 20);

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `Seller_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(200) NOT NULL,
  `user_name` varchar(200) CHARACTER SET latin7 COLLATE latin7_general_cs NOT NULL,
  `MobileNumber` text NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `user_name`, `MobileNumber`, `email`, `status`, `password`) VALUES
('Nazia', 'NaziaOishee', '01321177912', 'naziakarim@iut-dhaka.edu', 1, '981831e6dd96ee526370ab0bfafe93d1'),
('nazia', 'naziakarim', '01321187912', 'naziakarimkhan5@gmail.com', 1, '$2y$10$Wi.BdjZB5RO2NC9CryCqjuXFBN21bjw0J6PPhHG31qJJVBrRxEzT.'),
('nazia', 'naziakarimkhan', '01321197912', 'oishee1401@gmail.com', 1, '$2y$10$fX/dDuWHOSnQrLDiYpEnrelVDWE47rxw/ZeaumU3zag/Uht5zUXsm'),
('nazia', 'naziakhan', '01321197912', 'naziakhanoishee@gmail.com', 1, '$2y$10$f6FZNFnPJRi1tBmM3.PaSeJyonL5kqWyxllZPlAKOeBJc0zflnpiS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
  ADD PRIMARY KEY (`Funding_id`),
  ADD KEY `FUNDINGID` (`Funding_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`Investment_id`),
  ADD UNIQUE KEY `Investment_id_2` (`Investment_id`),
  ADD UNIQUE KEY `Investment_id_3` (`Investment_id`),
  ADD KEY `Investment_id` (`Investment_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Purchase_id`),
  ADD KEY `Purchase_id` (`Purchase_id`),
  ADD KEY `Seller_id` (`Seller_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `sell` (`Seller_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`Seller_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `Exposure_id` (`Seller_id`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`Seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
  MODIFY `Funding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `Investment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `Seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funding`
--
ALTER TABLE `funding`
  ADD CONSTRAINT `funding_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investment`
--
ALTER TABLE `investment`
  ADD CONSTRAINT `investment_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`Seller_id`) REFERENCES `sell` (`Seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `sell` FOREIGN KEY (`Seller_id`) REFERENCES `sell` (`Seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_name` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temporary`
--
ALTER TABLE `temporary`
  ADD CONSTRAINT `temporary_ibfk_1` FOREIGN KEY (`Seller_id`) REFERENCES `sell` (`Seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
