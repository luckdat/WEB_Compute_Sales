-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2024 at 11:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm2_computer`
--
CREATE DATABASE IF NOT EXISTS `asm2_computer` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci;
USE `asm2_computer`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int NOT NULL,
  `UserID` int NOT NULL,
  `ProductID` int NOT NULL,
  `Quantity` int NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `UserID`, `ProductID`, `Quantity`, `CreatedAt`) VALUES
(1, 1, 1, 2, '2024-11-22 03:10:52'),
(2, 2, 2, 1, '2024-11-22 03:10:52'),
(3, 3, 3, 2, '2024-11-22 03:10:52'),
(4, 4, 4, 1, '2024-11-22 03:10:52'),
(5, 5, 5, 1, '2024-11-22 03:10:52'),
(6, 6, 6, 3, '2024-11-22 03:10:52'),
(7, 7, 7, 1, '2024-11-22 03:10:52'),
(8, 8, 8, 2, '2024-11-22 03:10:52'),
(9, 9, 9, 5, '2024-11-22 03:10:52'),
(10, 10, 10, 1, '2024-11-22 03:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`) VALUES
(1, 'Electronics', 'Electronic devices and gadgets'),
(2, 'Books', 'All kinds of books and reading materials'),
(3, 'Clothing', 'Men and women clothing items'),
(4, 'Home Appliances', 'Household appliances for daily use'),
(5, 'Toys', 'Toys for children of all ages'),
(6, 'Sports', 'Sports equipment and accessories'),
(7, 'Beauty', 'Beauty and personal care products'),
(8, 'Groceries', 'Food and daily essentials'),
(9, 'Furniture', 'Home and office furniture'),
(10, 'Automotive', 'Car parts and accessories'),
(11, 'Health', 'Healthcare and fitness products'),
(12, 'Pet Supplies', 'Products for pets and animals'),
(13, 'Electronics', 'Electronic devices and gadgets'),
(14, 'Books', 'All kinds of books and reading materials'),
(15, 'Clothing', 'Men and women clothing items'),
(16, 'Home Appliances', 'Household appliances for daily use'),
(17, 'Toys', 'Toys for children of all ages'),
(18, 'Sports', 'Sports equipment and accessories'),
(19, 'Beauty', 'Beauty and personal care products'),
(20, 'Groceries', 'Food and daily essentials'),
(21, 'Furniture', 'Home and office furniture'),
(22, 'Automotive', 'Car parts and accessories'),
(23, 'Health', 'Healthcare and fitness products'),
(24, 'Pet Supplies', 'Products for pets and animals');

-- --------------------------------------------------------

--
-- Table structure for table `contactmessages`
--

CREATE TABLE `contactmessages` (
  `MessageID` int NOT NULL,
  `Name` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Subject` varchar(150) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Message` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `contactmessages`
--

INSERT INTO `contactmessages` (`MessageID`, `Name`, `Email`, `Subject`, `Message`, `CreatedAt`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'Order Inquiry', 'I have a question about my recent order.', '2024-11-22 03:10:51'),
(2, 'Jane Doe', 'jane.doe@example.com', 'Product Availability', 'Is the smartphone available in stock?', '2024-11-22 03:10:51'),
(3, 'Mike Smith', 'mike.smith@example.com', 'Shipping Details', 'When will my order be delivered?', '2024-11-22 03:10:51'),
(4, 'Susan Clark', 'susan.clark@example.com', 'Return Policy', 'What is your return policy?', '2024-11-22 03:10:51'),
(5, 'Lisa Brown', 'lisa.brown@example.com', 'Technical Issue', 'I am unable to login to my account.', '2024-11-22 03:10:51'),
(6, 'Tom Hanks', 'tom.hanks@example.com', 'Feedback', 'Great experience shopping here!', '2024-11-22 03:10:51'),
(7, 'Emma White', 'emma.white@example.com', 'Discounts', 'Do you offer discounts for bulk purchases?', '2024-11-22 03:10:51'),
(8, 'Paul Black', 'paul.black@example.com', 'Product Query', 'What is the warranty on your laptops?', '2024-11-22 03:10:51'),
(9, 'Alice Green', 'alice.green@example.com', 'Payment Issue', 'I am facing issues with payment.', '2024-11-22 03:10:51'),
(10, 'Bob Grey', 'bob.grey@example.com', 'Order Cancellation', 'I would like to cancel my order.', '2024-11-22 03:10:51'),
(11, 'Charlie Brown', 'charlie.brown@example.com', 'New Arrivals', 'When will new arrivals be available?', '2024-11-22 03:10:51'),
(12, 'Diana Rose', 'diana.rose@example.com', 'Membership Benefits', 'What are the benefits of being a member?', '2024-11-22 03:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int NOT NULL,
  `UserID` int NOT NULL,
  `ProductID` int NOT NULL,
  `FeedbackText` text COLLATE utf8mb3_unicode_ci,
  `Rating` int DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `UserID`, `ProductID`, `FeedbackText`, `Rating`, `CreatedAt`) VALUES
(1, 2, 1, 'Amazing product!', 5, '2024-11-22 03:10:51'),
(2, 3, 2, 'Good value for money.', 4, '2024-11-22 03:10:51'),
(3, 6, 3, 'Interesting book.', 5, '2024-11-22 03:10:51'),
(4, 7, 4, 'Fits perfectly.', 5, '2024-11-22 03:10:51'),
(5, 2, 5, 'Works as expected.', 4, '2024-11-22 03:10:51'),
(6, 3, 6, 'Kids loved it.', 5, '2024-11-22 03:10:51'),
(7, 6, 7, 'Perfect for yoga.', 5, '2024-11-22 03:10:51'),
(8, 7, 8, 'Lovely color.', 4, '2024-11-22 03:10:51'),
(9, 2, 9, 'Good quality rice.', 5, '2024-11-22 03:10:51'),
(10, 3, 10, 'Comfortable chair.', 5, '2024-11-22 03:10:51'),
(11, 6, 11, 'Durable tire.', 4, '2024-11-22 03:10:51'),
(12, 7, 12, 'Very useful.', 5, '2024-11-22 03:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int NOT NULL,
  `OrderID` int NOT NULL,
  `ProductID` int NOT NULL,
  `Quantity` int NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
(1, 1, 1, 2, '699.99'),
(2, 1, 3, 1, '19.99'),
(3, 2, 4, 3, '9.99'),
(4, 2, 6, 1, '29.99'),
(5, 3, 2, 1, '1099.99'),
(6, 3, 5, 1, '89.99'),
(7, 4, 7, 2, '19.99'),
(8, 4, 8, 3, '14.99'),
(9, 5, 9, 1, '12.99'),
(10, 5, 10, 1, '129.99'),
(11, 6, 11, 2, '99.99'),
(12, 6, 12, 1, '49.99');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int NOT NULL,
  `UserID` int NOT NULL,
  `OrderDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TotalAmount` decimal(10,2) NOT NULL,
  `Status` enum('Pending','Processing','Completed','Cancelled') COLLATE utf8mb3_unicode_ci DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`, `TotalAmount`, `Status`) VALUES
(1, 2, '2024-11-22 03:10:51', '120.50', 'Pending'),
(2, 3, '2024-11-22 03:10:51', '80.99', 'Processing'),
(3, 6, '2024-11-22 03:10:51', '199.99', 'Completed'),
(4, 7, '2024-11-22 03:10:51', '45.00', 'Cancelled'),
(5, 3, '2024-11-22 03:10:51', '130.75', 'Pending'),
(6, 2, '2024-11-22 03:10:51', '59.99', 'Processing'),
(7, 6, '2024-11-22 03:10:51', '89.90', 'Completed'),
(8, 7, '2024-11-22 03:10:51', '180.00', 'Cancelled'),
(9, 2, '2024-11-22 03:10:51', '240.00', 'Pending'),
(10, 3, '2024-11-22 03:10:51', '150.50', 'Processing'),
(11, 6, '2024-11-22 03:10:51', '100.00', 'Completed'),
(12, 7, '2024-11-22 03:10:51', '75.99', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `ProductName` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb3_unicode_ci,
  `Price` decimal(10,2) NOT NULL,
  `Stock` int NOT NULL DEFAULT '0',
  `CategoryID` int NOT NULL,
  `ImageURL` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Price`, `Stock`, `CategoryID`, `ImageURL`, `CreatedAt`) VALUES
(1, 'Latitude 5420', 'A high-end laptop.', '1200000.00', 50, 1, 'anh1.png', '2024-11-22 03:10:51'),
(2, 'PC Gaming', '14-inch lightweight.', '8600000.00', 30, 1, 'anh6.png', '2024-11-22 03:10:51'),
(3, 'Novel Book', 'A bestselling novel.', '1700000.00', 200, 2, 'anh2.png', '2024-11-22 03:10:51'),
(4, 'PC Novel', 'Dell cotton t-shirt.', '5300000.00', 500, 3, 'anh7.png', '2024-11-22 03:10:51'),
(5, 'Latitude 7400', 'Latitude 7400 - a compact.', '1800000.00', 40, 4, 'anh3.png', '2024-11-22 03:10:51'),
(6, 'Dell', 'Remote control toy crafted.', '6900000.00', 150, 5, 'anh7.png', '2024-11-22 03:10:51'),
(7, 'Latitude Mat', 'Eco-friendly yoga  made .', '1900000.00', 100, 6, 'anh4.png', '2024-11-22 03:10:51'),
(8, 'Lipstick', 'Long-lasting lipstick .', '2390000.00', 200, 7, 'anh8.png', '2024-11-22 03:10:51'),
(9, 'Rice Bag', 'Premium quality rice bag .', '1490000.00', 300, 8, 'anh5.png', '2024-11-22 03:10:51'),
(10, 'Office Chair', 'Ergonomic office of work.', '7200000.00', 20, 9, 'anh9.png', '2024-11-22 03:10:51'),
(11, 'Dell Tire', 'All-season car conditions.', '5700000.00', 50, 10, 'anh1.png', '2024-11-22 03:10:51'),
(12, 'Dumbbells', 'Adjustable dumbbells Dell.', '9900000.00', 100, 11, 'anh6.png', '2024-11-22 03:10:51'),
(13, 'Latitude 7000', 'Cao cấp 1', '2222222.00', 333, 11, 'anh3.png', '2024-11-22 12:22:03'),
(14, 'Latitude 7000', 'Cao cấp 1', '11333.00', 12, 12, 'anh1.png', '2024-11-28 01:40:36'),
(15, 'Latitude 999', 'Cao cấp 1', '123322.00', 20, 13, 'anh3.png', '2024-11-28 07:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Username` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `FullName` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `PhoneNumber` varchar(15) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Address` text COLLATE utf8mb3_unicode_ci,
  `UserRole` enum('Admin','Customer','Staff') COLLATE utf8mb3_unicode_ci DEFAULT 'Customer',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `FullName`, `Email`, `PhoneNumber`, `Address`, `UserRole`, `CreatedAt`) VALUES
(1, 'admin', '123', 'Admin User', 'admin@example.com', '0123456789', '123 Admin St', 'Admin', '2024-11-22 03:10:51'),
(2, 'customer', '123', 'John Doe', 'john.doe@example.com', '0987654321', '456 Customer Rd', 'Customer', '2024-11-22 03:10:51'),
(3, 'jane_doe', 'password_hash_3', 'Jane Doe', 'jane.doe@example.com', '0911223344', '789 Customer Ln', 'Customer', '2024-11-22 03:10:51'),
(4, 'staff', '123', 'Staff One', 'staff1@example.com', '0933445566', '22 Staff Blvd', 'Staff', '2024-11-22 03:10:51'),
(5, 'staff2', 'password_hash_5', 'Staff Two', 'staff2@example.com', '0944556677', '33 Staff Blvd', 'Staff', '2024-11-22 03:10:51'),
(6, 'mike_smith', 'password_hash_6', 'Mike Smith', 'mike.smith@example.com', '0955667788', '555 Elm St', 'Customer', '2024-11-22 03:10:51'),
(7, 'susan_clark', 'password_hash_7', 'Susan Clark', 'susan.clark@example.com', '0966778899', '666 Pine Ave', 'Customer', '2024-11-22 03:10:51'),
(8, 'admin2', 'password_hash_8', 'Second Admin', 'admin2@example.com', '0123467890', '111 Admin Pl', 'Customer', '2024-11-22 03:10:51'),
(9, 'lisa_brown', 'password_hash_9', 'Lisa Brown', 'lisa.brown@example.com', '0977889900', '777 Maple Dr', 'Customer', '2024-11-22 03:10:51'),
(10, 'tom_hanks', 'password_hash_10', 'Tom Hanks', 'tom.hanks@example.com', '0988990011', '888 Oak St', 'Customer', '2024-11-22 03:10:51'),
(11, 'emma_white', 'password_hash_11', 'Emma White', 'emma.white@example.com', '0999001122', '999 Cedar Rd', 'Customer', '2024-11-22 03:10:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `contactmessages`
--
ALTER TABLE `contactmessages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contactmessages`
--
ALTER TABLE `contactmessages`
  MODIFY `MessageID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
