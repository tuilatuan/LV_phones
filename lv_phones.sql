-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 06:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_phones`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(30) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `fullname`, `username`, `password`, `phone`, `role`, `email`, `address`, `reg_date`) VALUES
(6, 'admin', 'admin', '$2y$10$dh5U.bBXbsPFJZpP.Y5B8eIW5J1qPEoqwfzXOJVqrWsKrp3RWJHAu', '0123456789', '1', 'admin@gmai.com', '', '2023-05-05 12:45:12'),
(7, 'staff', 'staff', '$2y$10$vvYzC2BAGa9YnHk//7rz2O6vWVTVSReqbd/w5UMr8W0WH2vT0taJu', '0123456788', '2', 'staff@gmail.com', '', '2023-05-05 12:45:26'),
(8, 'thanh tuan', 'tuan', '$2y$10$eZ95QwrYfO3z4lqknQGfQ.IURzfhRNc7g./L0UMhEtgAUOBCZqAtO', '0961312654 ', '0', 'tuan@gmail.com', '', '2023-05-05 14:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `totalProduct` int(20) NOT NULL,
  `totalPrice` varchar(50) NOT NULL,
  `billDate` date NOT NULL DEFAULT current_timestamp(),
  `billStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billID`, `accountID`, `address`, `totalProduct`, `totalPrice`, `billDate`, `billStatus`) VALUES
(16, 8, '7280 Tran Xuan Soan Q7', 3, '40800000', '2023-05-03', '0'),
(17, 8, '7280 Tran Xuan Soan Q7', 2, '29950000', '2023-05-04', '0');

-- --------------------------------------------------------

--
-- Table structure for table `billdetails`
--

CREATE TABLE `billdetails` (
  `productID` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `billDetailsID` int(11) NOT NULL,
  `billID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billdetails`
--

INSERT INTO `billdetails` (`productID`, `productQuantity`, `billDetailsID`, `billID`) VALUES
(1, 1, 20, 16),
(7, 1, 21, 16),
(6, 1, 22, 16),
(1, 1, 23, 17),
(3, 1, 24, 17);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productImage` varchar(50) NOT NULL,
  `productPrice` varchar(50) NOT NULL,
  `cartQuantity` int(11) NOT NULL,
  `accountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `productID`, `productName`, `productImage`, `productPrice`, `cartQuantity`, `accountID`) VALUES
(45, 1, 'Iphone 12 Pro', 'phone-1.jpg', '27500000', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) UNSIGNED NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Oppo'),
(4, 'Xiaomi'),
(5, 'Realme'),
(6, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerPhone` varchar(255) NOT NULL,
  `customerAddress` varchar(255) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `accountID` int(11) NOT NULL,
  `customerThanhToan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `email` text NOT NULL,
  `answer` mediumtext NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `accountID`, `content`, `email`, `answer`, `time`) VALUES
(1, 8, 'tuialatuan', 'tuan@gmail.com', '', '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `phuongthuc_tbl`
--

CREATE TABLE `phuongthuc_tbl` (
  `thanhtoanID` int(11) NOT NULL,
  `thanhtoanName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuongthuc_tbl`
--

INSERT INTO `phuongthuc_tbl` (`thanhtoanID`, `thanhtoanName`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán qua thẻ ngân hàng'),
(3, 'Thanh toán bằng ví MOMO');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) UNSIGNED NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(100) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` varchar(50) NOT NULL,
  `productDetail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `categoryID`, `productName`, `productPrice`, `productQuantity`, `productImage`, `productDetail`) VALUES
(1, 1, 'Iphone 12 Pro', '27500000', 5, 'phone-1.jpg', 'Iphone'),
(2, 5, 'Realme 9', '11000000', 0, 'phone-2.jpg', 'Realme'),
(3, 5, 'Realme C35', '2450000', 7, 'phone-3.jpg', 'Realme'),
(4, 2, 'Samsung galaxy S22', '24000000', 5, 'phone-4.jpg', 'Samsung'),
(5, 2, 'Samsung galaxy Z Flip 3', '23000000', 3, 'phone-5.jpg', 'Samsung'),
(6, 2, 'Samsung galaxy note 8', '11000000', 4, 'phone-6.jpg', 'Samsung'),
(7, 4, 'Xiaomi 11 Lite', '2300000', 5, 'phone-7.jpg', 'Xiaomi'),
(8, 4, 'Xiaomi 12 Pro', '5600000', 5, 'phone-8.jpg', 'Xiaomi'),
(9, 4, 'Xiaomi 12', '7800000', 4, 'phone-9.jpg', 'Xiaomi'),
(10, 4, 'Xiaomi 11t', '5600000', 5, 'phone-10.jpg', 'Xiaomi'),
(11, 1, 'Iphone 11', '16000000', 3, 'phone-11.jpg', 'Iphone'),
(12, 1, 'Iphone XR', '14500000', 3, 'phone-12.jpg', 'Iphone'),
(13, 1, 'Iphone SE', '9000000', 3, 'phone-13.jpg', 'Iphone'),
(14, 1, 'iphone 6', '3000000', 4, 'phone-14.jpg', 'Iphone'),
(15, 1, 'Iphone 13 Mini', '16500000', 3, 'phone-15.jpg', 'Iphone'),
(16, 1, 'Iphone 12 Pro', '23000000', 4, 'phone-16.jpg', 'Iphone'),
(17, 1, 'Iphone X', '7500000', 5, 'phone-17.jpg', 'Iphone'),
(18, 6, 'Tai nghe ', '540000', 45, 'phone-18.jpg', 'phụ kiện'),
(19, 3, 'Oppo A55', '4400000', 30, 'phone-19.jpg', 'Oppo'),
(20, 3, 'Oppo Reno 7', '15500000', 4, 'phone-20.jpg', 'Oppo'),
(21, 1, 'Iphone XS Gold', '17000000', 45, 'phone-21.jpg', 'Iphone'),
(22, 2, 'Samsung Galaxy Z Flip4', '17900000', 10, 'phone-22.jpg', 'Samsung'),
(23, 3, 'OPPO Find N2 Flip', '19900000', 3, 'phone-23.jpg', 'Oppo'),
(24, 1, 'Iphone 13 Pro Max', '33300000', 4, 'phone-24.jpg', 'Iphone'),
(25, 2, 'Samsung Galaxy A73', '22200000', 2, 'phone-25.jpg', 'Samsung'),
(26, 2, 'Samsung Galaxy A52s', '2350000', 1, 'phone-26.jpg', 'Samsung'),
(28, 4, 'Xiaomi Redmi K50', '15600000', 3, 'phone-28.jpg', 'Xiaomi'),
(29, 4, 'Xiaomi Redmi 10s', '147000000', 4, 'phone-29.jpg', 'Xiaomi'),
(30, 4, 'Realme C21', '1300000', 5, 'phone-30.jpg', 'Realme'),
(31, 1, 'Iphone 7 Plus', '15500000', 5, 'phone-31.jpg', 'Iphone'),
(32, 2, 'Samsung Galaxy A03s', '22000000', 3, 'phone-32.jpg', 'Samsung'),
(33, 3, 'Oppo A16k', '1900000', 1, 'phone-33.jpg', 'Oppo'),
(34, 5, 'Realme C11', '1500000', 5, 'phone-34.jpg', 'Realme'),
(35, 5, 'Realme 8 Pro', '1450000', 3, 'phone-35.jpg', 'Realme'),
(36, 6, 'Sạc dự phòng Polymer 10000mah', '350000', 3, 'phone-36.jpg', 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `product_sample`
--

CREATE TABLE `product_sample` (
  `productHot` int(11) NOT NULL,
  `product_sample` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sample`
--

INSERT INTO `product_sample` (`productHot`, `product_sample`) VALUES
(1, 'Brand New'),
(2, 'Flash Sale'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `slideID` int(11) NOT NULL,
  `slideName` varchar(255) NOT NULL,
  `slideImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideID`, `slideName`, `slideImage`) VALUES
(1, 'Banner 1 	', 'banner-1.png'),
(2, 'Banner 2', 'banner-2.png'),
(4, 'Banner 4', 'banner-4.png'),
(5, 'Banner 5', 'banner-5.png'),
(6, 'Banner 6', 'banner-6.png'),
(7, 'Banner 7', 'banner-7.png'),
(8, 'Banner 8', 'banner-8.png'),
(9, 'Banner 9', 'banner-9.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`);

--
-- Indexes for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`billDetailsID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `phuongthuc_tbl`
--
ALTER TABLE `phuongthuc_tbl`
  ADD PRIMARY KEY (`thanhtoanID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);
ALTER TABLE `product` ADD FULLTEXT KEY `productName` (`productName`,`productDetail`);

--
-- Indexes for table `product_sample`
--
ALTER TABLE `product_sample`
  ADD PRIMARY KEY (`productHot`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slideID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `billDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phuongthuc_tbl`
--
ALTER TABLE `phuongthuc_tbl`
  MODIFY `thanhtoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `product_sample`
--
ALTER TABLE `product_sample`
  MODIFY `productHot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
