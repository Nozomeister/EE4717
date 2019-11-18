-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2019 at 10:16 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f33ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(13) NOT NULL,
  `author` char(50) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `price`) VALUES
('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
('0-672-31697-8', 'Michael Morgan', 'Java 2 for Professional Developers', 34.99),
('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
('0-672-31769-9', 'Thomas Schenk', 'Caldera OpenLinux System Administration Unleashed', 49.99),
('1234', '44315435', '324214', 99.99);

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE IF NOT EXISTS `book_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_reviews`
--

INSERT INTO `book_reviews` (`isbn`, `review`) VALUES
('0-672-31697-8', 'Morgan''s book is clearly written and goes well beyond most of the basic Java books out there.');

-- --------------------------------------------------------

--
-- Table structure for table `class33`
--

CREATE TABLE IF NOT EXISTS `class33` (
  `ID` int(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class33`
--

INSERT INTO `class33` (`ID`, `Username`, `Password`) VALUES
(0, 'Eli', '3214142144'),
(1, 'Eli', '3214142144');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`) VALUES
(3, 'Julie Smith', '25 Oak Street', 'Airport West'),
(4, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
(5, 'Michelle Arthur', '357 North Road', 'Yarraville');

-- --------------------------------------------------------

--
-- Table structure for table `GnC_Menu`
--

CREATE TABLE IF NOT EXISTS `GnC_Menu` (
  `ItemID` int(40) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(40) NOT NULL,
  `Price` double NOT NULL,
  `ItemType` varchar(40) NOT NULL,
  `Picture` varchar(40) NOT NULL,
  `Descriptions` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemID`),
  UNIQUE KEY `ItemName` (`ItemName`),
  UNIQUE KEY `ItemID` (`ItemID`),
  KEY `ItemID_2` (`ItemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `GnC_Menu`
--

INSERT INTO `GnC_Menu` (`ItemID`, `ItemName`, `Price`, `ItemType`, `Picture`, `Descriptions`) VALUES
(1, 'Pork Platter', 85, 'Promotions', 'promotion.jpg', 'Pork chop, pork ribs and pork cutlet'),
(2, 'Barbecue Party', 70, 'Promotions', 'promotion2.jpg', 'Combo of Beef, Pork and Chicken BBQ'),
(3, 'Kobe Beef Steak', 40, 'Promotions', 'promotion1.jpg', 'Ribeye Steak from Kobe, Japan'),
(4, 'Family Jumbo Platter', 60, 'ForFamily', 'fam1.jpg', 'Family Platter with Chicken and Beef'),
(5, 'Family Platter', 45, 'ForFamily', 'fam2.jpg', 'Platter with Chicken and Pork BBQ'),
(6, 'Family Meal', 30, 'ForFamily', 'fam3.jpg', 'Platter with Chicken and Garlic Bread'),
(7, 'Chicken Chop', 9, 'AlaCarte', 'bg2.jpg', 'Tasty Chicken Chop'),
(8, 'Chargrill Chicken', 9, 'AlaCarte', 'bg3.jpg', 'Tasty Chargrill Chicken '),
(9, 'Fish n Chips', 11, 'AlaCarte', 'ala3.jpg', 'British Fish n Chips'),
(10, 'Lamb Chop', 14, 'AlaCarte', 'ala4.jpg', 'Mexican Lamb Chop'),
(11, 'Pork Ribs', 14, 'AlaCarte', 'ala5.jpg', 'New Zealand Pork Ribs'),
(12, 'Ribeye Steak', 18, 'AlaCarte', 'ala6.jpg', 'Authentic America Beef'),
(13, 'Surf n Turf', 18, 'Sets', 'set1.jpg', 'Lobster n Chicken'),
(14, 'Pig n Chick', 19, 'Sets', 'set2.jpg', 'Pork Ribs and Chicken Popcorn'),
(15, 'Lamb n Steak', 23, 'Sets', 'set3.jpg', 'Lamb and Beef steak'),
(16, 'Caesar Salad', 5, 'Sides', 'side1.jpg', 'Freshly made Caesar Salad'),
(17, 'Potato Salad', 6, 'Sides', 'side2.jpg', 'Authentic Russia Potato Salad'),
(18, 'Garlic Bread', 4, 'Sides', 'side3.jpg', 'Tasty Garlic Bread'),
(19, 'Beer', 7.5, 'Beverages', 'drink1.jpg', 'Fresh Beer'),
(20, 'Soft Drink', 6, 'Beverages', 'drink2.jpg', 'Coke, Sprite and Fanta'),
(21, 'Mineral Water', 3, 'Beverages', 'drink3.jpg', 'Evian or Aquafina');

-- --------------------------------------------------------

--
-- Table structure for table `GnC_Order`
--

CREATE TABLE IF NOT EXISTS `GnC_Order` (
  `OrderID` int(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Amount` double NOT NULL,
  `OrderDate` varchar(40) NOT NULL,
  `OrderAddress` varchar(100) NOT NULL,
  `OrderStatus` varchar(40) NOT NULL,
  PRIMARY KEY (`OrderID`),
  UNIQUE KEY `OrderID` (`OrderID`),
  KEY `OrderID_2` (`OrderID`),
  KEY `OrderID_3` (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GnC_Order`
--

INSERT INTO `GnC_Order` (`OrderID`, `Username`, `Amount`, `OrderDate`, `OrderAddress`, `OrderStatus`) VALUES
(350200007, 'Elimeister', 128, '04/11/2019', '50 Nanyang Walk, Singapore, Hall 16E, #02-14', 'Ordered'),
(564711930, 'Elimeister', 360, '04/11/2019', '50 Nanyang Walk, Singapore, Hall 16E, #02-14', 'Ordered'),
(917182398, 'Elimeister', 2860, '04/11/2019', '70 nanyang walk', 'Ordered'),
(975284879, 'Elimeister', 44, '04/11/2019', '', 'Ordered'),
(981456424, 'Elimeister', 18, '04/11/2019', '', 'Ordered'),
(984018742, 'Elimeister', 60, '04/11/2019', '', 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `GnC_Order_Details`
--

CREATE TABLE IF NOT EXISTS `GnC_Order_Details` (
  `Index` int(40) NOT NULL AUTO_INCREMENT,
  `OrderID` int(40) NOT NULL,
  `ItemID` int(40) NOT NULL,
  `ItemName` varchar(40) NOT NULL,
  `Quantity` int(40) NOT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `GnC_Order_Details`
--

INSERT INTO `GnC_Order_Details` (`Index`, `OrderID`, `ItemID`, `ItemName`, `Quantity`) VALUES
(2, 975284879, 2, 'Thanksgiving Meal', 1),
(3, 975284879, 3, 'No Nut November Meal', 2),
(4, 984018742, 3, 'No Nut November Meal', 5),
(5, 981456424, 8, 'Chargrill Chicken', 2),
(6, 802130333, 1, 'Halloween Meal', 123),
(7, 564711930, 6, 'Family Meal', 12),
(8, 917182398, 2, 'Thanksgiving Meal', 143),
(9, 350200007, 5, 'Family Platter', 2),
(10, 350200007, 14, 'Pig n Chick', 2);

-- --------------------------------------------------------

--
-- Table structure for table `GnC_User`
--

CREATE TABLE IF NOT EXISTS `GnC_User` (
  `UserID` int(40) NOT NULL AUTO_INCREMENT,
  `Username` varchar(40) NOT NULL,
  `Userpassword` varchar(128) NOT NULL,
  `Phone` int(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID` (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `GnC_User`
--

INSERT INTO `GnC_User` (`UserID`, `Username`, `Userpassword`, `Phone`, `Email`) VALUES
(28, 'Elimeister', 'ae8c47ebbf65d6c7dfb1d7a7910a74e2', 0, ''),
(29, 'Elimeister1', 'd41d8cd98f00b204e9800998ecf8427e', 0, ''),
(30, '', 'd41d8cd98f00b204e9800998ecf8427e', 0, ''),
(31, 'Elimeister2', 'ae8c47ebbf65d6c7dfb1d7a7910a74e2', 68382828, 'testing@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `itemprice`
--

CREATE TABLE IF NOT EXISTS `itemprice` (
  `ID` int(40) NOT NULL AUTO_INCREMENT,
  `Item` varchar(40) NOT NULL,
  `Price` double NOT NULL,
  `TypeOfShot` int(40) NOT NULL,
  `SaleAmount` int(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `itemprice`
--

INSERT INTO `itemprice` (`ID`, `Item`, `Price`, `TypeOfShot`, `SaleAmount`) VALUES
(1, 'JustJava', 3, 1, 80),
(2, 'AuLaitSingle', 3, 1, 23),
(3, 'AuLaitDouble', 3, 2, 81),
(4, 'IceCapSingle', 4.75, 1, 47),
(5, 'IceCapDouble', 10, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `MyGuests`
--

CREATE TABLE IF NOT EXISTS `MyGuests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `MyGuests`
--

INSERT INTO `MyGuests` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'John', 'Doe', 'john@example.com', '2019-10-08 06:15:57'),
(2, 'John', 'Sam', 'john@example.com', '2019-10-08 06:27:33'),
(4, 'John', 'Doe', 'john@example.com', '2019-10-08 06:18:05'),
(5, 'John', 'Doe', 'john@example.com', '2019-10-08 06:18:07'),
(6, 'John', 'Doe', 'john@example.com', '2019-10-08 06:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`) VALUES
(1, 3, 69.98, '2007-04-02'),
(2, 1, 49.99, '2007-04-15'),
(3, 2, 74.98, '2007-04-19'),
(4, 3, 24.99, '2007-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `quantity` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `quantity`) VALUES
(1, '0-672-31697-8', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(3, '0-672-31769-9', 1),
(4, '0-672-31745-1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('abc', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
