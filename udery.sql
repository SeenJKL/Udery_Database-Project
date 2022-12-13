-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 03:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udery`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` bigint(10) UNSIGNED NOT NULL DEFAULT current_timestamp(),
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(10) UNSIGNED ZEROFILL NOT NULL,
  `password` text NOT NULL,
  `password_encrypt` varchar(255) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstname`, `lastname`, `email`, `phone`, `password`, `password_encrypt`, `address1`, `address2`) VALUES
(20221113233804, 'Jakkarin', 'Lapmoon', 'jakarinsn@gmail.com', 0917593776, '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '143/237 Rimkhlongprapa Rd. Bangsue Bankok 10800', ''),
(20221114185320, 'Loksicow', 'Specle', 'seasun2344@gmail.com', 0123456789, 'Jakkarin', 'b620e68443fc4d5fd134823a3c0c2a3d0828ca07', 'Jaknnfei 994', ''),
(20221116170018, 'L2', 'Jske', 'AAAAA@gmail.com', 0917593723, 'Jakkarin', 'b620e68443fc4d5fd134823a3c0c2a3d0828ca07', '143/237 Rimkhlongprapa Rd. Bangsue Bankok 10800', ''),
(20221116171849, 'Admin', 'Main', 'Admin@gmail.com', 0912223333, '987654', 'dea742e166979027ae70b28e0a9006fb1010e760', 'Jskokfnb 23/23', 'Bangkok'),
(20221117142641, 'Jakkarin', 'Lapmoon', 'asdf@hfae.om', 0917593776, '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '143/237 Rimkhlongprapa Rd. Bangsue Bankok 10800', ''),
(20221117151825, 'Sirinyaporn', 'Jiraporn', 'sirin.jrp@gmail.com', 0809196919, '321', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', '100/10', 'SamutSongkhram'),
(20221117232323, 'Aom', 'Aommy', 'Aommy@gmail.com', 0917592345, '852', '2dcc3820e64b3d1a7866b22935c695fd6aa3980a', '233/567', 'Samutprakan'),
(20221119131002, 'Nuttakarn', 'Chaiyabud', 'Pear@gmail.com', 0221115888, '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '8/91', 'Ratchaburi');

-- --------------------------------------------------------

--
-- Table structure for table `deliverycompany`
--

CREATE TABLE `deliverycompany` (
  `companyID` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `PCS` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverycompany`
--

INSERT INTO `deliverycompany` (`companyID`, `companyName`, `method`, `PCS`) VALUES
(1, 'Kerry Express', 'Cars', 1.00),
(2, 'J&T Express', 'Cars', 0.80),
(3, 'Flash Express', 'Cars', 0.85),
(4, 'FedEx Express', 'Cars', 1.50),
(5, 'ThaiPost Express', 'Cars', 0.80);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` bigint(10) UNSIGNED NOT NULL DEFAULT current_timestamp(),
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL,
  `price` float(7,2) NOT NULL,
  `customerID` bigint(10) UNSIGNED NOT NULL,
  `productID` bigint(10) UNSIGNED NOT NULL,
  `companyID` int(11) NOT NULL,
  `CardNum` bigint(16) UNSIGNED NOT NULL,
  `CardName` varchar(50) NOT NULL,
  `CardNum_encrypt` varchar(255) NOT NULL,
  `CCV` int(3) UNSIGNED NOT NULL,
  `CCV_encrypt` varchar(255) NOT NULL,
  `ExpDate` date NOT NULL,
  `orderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `orderDate`, `quantity`, `price`, `customerID`, `productID`, `companyID`, `CardNum`, `CardName`, `CardNum_encrypt`, `CCV`, `CCV_encrypt`, `ExpDate`, `orderStatus`) VALUES
(20221116172258, '2022-11-16', 1, 23.04, 20221116171849, 1, 1, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172317, '2022-11-16', 1, 26.44, 20221116171849, 2, 1, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172336, '2022-11-16', 1, 21.00, 20221116171849, 3, 1, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172355, '2022-11-16', 1, 22.85, 20221116171849, 4, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172424, '2022-11-16', 1, 7.20, 20221116171849, 5, 2, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172450, '2022-11-16', 1, 18.35, 20221116171849, 6, 5, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172512, '2022-11-16', 1, 58.75, 20221116171849, 7, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172540, '2022-11-16', 1, 75.48, 20221116171849, 101, 2, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172658, '2022-11-16', 1, 23.16, 20221116171849, 102, 2, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172720, '2022-11-16', 1, 24.72, 20221116171849, 103, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172734, '2022-11-16', 1, 25.80, 20221116171849, 104, 5, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172753, '2022-11-16', 1, 226.53, 20221116171849, 105, 4, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172809, '2022-11-16', 1, 85.44, 20221116171849, 106, 1, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172833, '2022-11-16', 1, 79.61, 20221116171849, 107, 2, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172847, '2022-11-16', 1, 5.33, 20221116171849, 201, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172906, '2022-11-16', 1, 5.69, 20221116171849, 202, 4, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172931, '2022-11-16', 1, 61.60, 20221116171849, 203, 5, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116172951, '2022-11-16', 1, 13.49, 20221116171849, 204, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116173006, '2022-11-16', 1, 17.66, 20221116171849, 205, 2, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116173024, '2022-11-16', 1, 9.27, 20221116171849, 206, 3, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116173040, '2022-11-16', 1, 9.38, 20221116171849, 207, 4, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Order Complete'),
(20221116210436, '2022-11-16', 1, 23.04, 20221116171849, 1, 1, 4444555566667777, 'Admin', '1218e549f250acf848899afa4f7493c152d1c209', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-30', 'Quality Check'),
(20221116221810, '2022-11-16', 3, 68.52, 20221113233804, 1, 2, 1111222233334444, 'Jakkarin', '5b434c778490889697170e225029f56aff19ca47', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-29', 'Order Complete'),
(20221117111806, '2022-11-17', 2, 49.34, 20221113233804, 103, 5, 9999888877776666, 'Jakkarin', '894aeeaca71863f8b06d6fc549352a91957c18ba', 987, '8abcda2dba9a5c5c674e659333828582122c5f56', '2022-11-26', 'Order Complete'),
(20221117152039, '2022-11-17', 1, 13.44, 20221117151825, 204, 5, 1111222233334444, 'Sirin', '5b434c778490889697170e225029f56aff19ca47', 123, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-11-17', 'Order Complete'),
(20221117153659, '2022-11-17', 2, 123.20, 20221117151825, 203, 5, 1111222233334444, 'Sirin', '5b434c778490889697170e225029f56aff19ca47', 520, '0b6a63765cf0acb1022fc7c84ed8dcb104f221ed', '2024-09-23', 'Order Complete'),
(20221117232920, '2022-11-17', 5, 117.50, 20221117232323, 4, 4, 8888777766665555, 'Aommy', 'e72a88852c5cea79243ab84b29c2c4433fdacba3', 888, 'eaa67f3a93d0acb08d8a5e8ff9866f51983b3c3b', '2022-12-30', 'Order Complete'),
(20221117235933, '2022-11-17', 4, 235.00, 20221117232323, 7, 3, 8888777766665555, 'Aommy', 'e72a88852c5cea79243ab84b29c2c4433fdacba3', 888, 'eaa67f3a93d0acb08d8a5e8ff9866f51983b3c3b', '2022-12-30', 'Confirmed Order'),
(20221119131309, '2022-11-19', 9, 560.70, 20221119131002, 203, 4, 44445555666667777, 'Pear', '1515cfb07b464706394cc63dfec08fd1ddcc991b', 456, '51eac6b471a284d3341d8c0c63d0f1a286262a18', '2022-12-30', 'Order Complete'),
(20221121205835, '2022-11-21', 1, 7.40, 20221117232323, 5, 1, 8888777766665555, 'Aommy', 'e72a88852c5cea79243ab84b29c2c4433fdacba3', 888, 'eaa67f3a93d0acb08d8a5e8ff9866f51983b3c3b', '2022-12-30', 'Confirmed Order'),
(20221121205940, '2022-11-21', 1, 85.44, 20221117232323, 106, 1, 7777666655554444, 'Aommy', '2541b1a44f52bafefaf18b03b2aec11b89e612b8', 432, 'a2092f63a2f91825e2c72496b104e027c2a5b0f0', '2022-12-30', 'Order Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` bigint(10) UNSIGNED NOT NULL,
  `productName` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'None',
  `productPhoto` varchar(300) NOT NULL,
  `productPrice` float(7,2) NOT NULL,
  `benefits` varchar(100) NOT NULL,
  `protection1` varchar(50) NOT NULL,
  `protection2` varchar(50) NOT NULL,
  `protection3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `category`, `productPhoto`, `productPrice`, `benefits`, `protection1`, `protection2`, `protection3`) VALUES
(1, 'Scale 1/96 Classics Antique Ship Model Building Kits HARVEY 1847 Wooden Sailboat DIY Hobby Boat', 'Models', 'https://i.ibb.co/RBgFcPc/Scale-1-96-Classics-Antique-Ship-Model-Building-Kits-HARVEY-1847-Wooden-Sailboat-DIY-Hobby-Boat-jpg.png', 22.04, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(2, '1/100 f-18 f18 super hornet Strike Fighter Toy Jet Aircraft Metal Military Diecast Plane Model for Collection or Gift', 'Models', 'https://i.ibb.co/QvDb35m/ezgif-5-6e06028cdb.png', 25.44, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(3, '1/24 Resin model kits resin figure DIY toy Resin soldier self-assembled （Limited Special）TD-2980', 'Models', 'https://i.ibb.co/QFyD5s9/ezgif-5-0c71e3c069.png', 20.00, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(4, '1/24 Resin figure model kits DIY toy soldier colorless and self-assembled A-1020', 'Models', 'https://i.ibb.co/0Bvrv9P/1-24-Resin-figure-model-kits-DIY-toy-soldier-colorless-and-self-assembled-A-1020-jpg-Q90.webp', 22.00, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(5, '35mm Resin Model Figure GK, unassembled and unpainted kit', 'Models', 'https://i.ibb.co/QFZdsJ6/35mm-Resin-Model-Figure-GK-Unassembled-and-unpainted-kit-jpg-Q90.webp', 6.40, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(6, 'Japanese Anime Hokage Shippuden Uzumaki PVC Action FigureToy Anime PVC Adult Game Statue Collectible Model Doll Gifts', 'Models', 'https://i.ibb.co/ckVgVjC/Naruto-models.png', 17.55, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(7, 'Piececool 3D Metal Puzzle Er-Lang God DIY Model Jigsaw Building Kit Toys for Teens Brain Teaser Gifts', 'Models', 'https://i.ibb.co/zQ7vNmq/Gosoru.png', 57.90, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(101, 'Brand Men\'s Badminton Shoes Women\'s Outdoor Professional Volleyball Sneakers Men\'s Spring Lightweight Table Tennis Shoes', 'Sports', 'https://i.ibb.co/cLRnTRM/Professional-jpg-Q90.webp', 74.68, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(102, 'Tennis T-Shirts For Men Women V- Collar Quick Dry Tennis T-Shirt Badminton Clothes Boys Kits Table Tee Shirts', 'Sports', 'https://i.ibb.co/9H6fTqf/Tenis-TShirt.webp', 22.36, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(103, 'Women Gradient Shirts Badminton Custom Quick Dry Team Game Sports Short Sleeves Training Gym Volleyball Golf Ping Pong Shirts', 'Sports', 'https://i.ibb.co/2sW2WLF/Women-Gradient-Shirts-Badminton.webp', 23.87, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(104, 'KELME Compression Tights Men\'s Long-Sleeved Sports Soccer Fitness Quick-Drying Training Football Kids Fleece Base Shirt 3891113-1', 'Sports', 'https://i.ibb.co/kcpcKjm/KELME-Compression-Tights-Mens.webp', 25.00, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(105, 'ADIDAS 4DFWD X PARLEY SHOES', 'Sports', 'https://i.ibb.co/LY501bW/Shoe.webp', 225.03, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(106, 'EQ21 RUN SHOES', 'Sports', 'https://i.ibb.co/rfWcFV5/Shoe2.webp', 84.44, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(107, 'ADICOLOR CLASSICS FIREBIRD PRIMEBLUE TRACK JACKET', 'Sports', 'https://i.ibb.co/vZ8DtzL/SH.webp', 78.81, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(201, '4U2 JELLY TINT', 'Beauty', 'https://i.ibb.co/vVw5HC0/Liquid-lip-4-U2.webp', 4.48, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(202, 'BLUSH 2P ORIGINAL', 'Beauty', 'https://i.ibb.co/HBZc82z/Blush-2P.webp', 4.19, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(203, 'Mega-Mushroom Magic', 'Beauty', 'https://i.ibb.co/qdjXNsP/Mega-Mushroom-Magic.webp', 60.80, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(204, 'Marshmallow Finish Power - Abloom', 'Beauty', 'https://i.ibb.co/g3qY1zh/Marshmallow-Finish-Power-Abloom.webp', 12.64, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee', 'Refund Policy'),
(205, 'Anti Hair Fall Growth Booster Ampoule', 'Beauty', 'https://i.ibb.co/zZQvnRy/Anti-Hair-Fall-Growth-Booster-Ampoule.webp', 16.86, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(206, 'Fit Me Fresh Tint Spf50/02 AS', 'Beauty', 'https://i.ibb.co/FnFFpk6/Fit-Me-Fresh-Tint-Spf5002-AS.webp', 8.42, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy'),
(207, 'Cream Cheek (Pearl Type) P02', 'Beauty', 'https://i.ibb.co/LCKMmPH/Cream-Cheek-Pearl-Type-P02.webp', 7.88, 'Quick Refund', 'Trade Assurance', 'On-time Delivery Guarantee ', 'Refund Policy');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` bigint(10) UNSIGNED NOT NULL,
  `rate` int(1) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `publishedDate` date NOT NULL,
  `publishedTime` time NOT NULL,
  `customerID` bigint(10) UNSIGNED NOT NULL,
  `productID` bigint(10) UNSIGNED NOT NULL,
  `orderID` bigint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `rate`, `comment`, `publishedDate`, `publishedTime`, `customerID`, `productID`, `orderID`) VALUES
(4, 5, 'The quality of the build is incredible, I love it! The packaging was great, it arrived without a scratch.', '2022-11-16', '17:34:06', 20221116171849, 1, 20221116172258),
(5, 4, 'This model was priced right and sturdy. My grandson loves it. The colors are nice and this was easy for my grandson to put together', '2022-11-16', '19:29:46', 20221116171849, 2, 20221116172317),
(6, 5, 'Nice and comfortable. Works well. Have been using it for about 3 months now.', '2022-11-16', '21:57:33', 20221116171849, 101, 20221116172540),
(7, 1, 'Received this item today and found it to be totally different from what is shown in pics.\r\n\r\n', '2022-11-16', '21:58:14', 20221116171849, 104, 20221116172734),
(8, 4, 'These shoes are very comfortable and I loved them', '2022-11-16', '21:58:27', 20221116171849, 105, 20221116172753),
(9, 4, 'They look great, feel nice and snug on your feet, and they feel great when walking on the fairway.', '2022-11-16', '21:58:50', 20221116171849, 106, 20221116172809),
(10, 4, ' I like jackets because they’re comfortable and lightweight. Great for windy days. It’s not made for cold weather but more for early fall/spring/summe', '2022-11-16', '21:59:55', 20221116171849, 107, 20221116172833),
(11, 2, 'The texture is dry and the color on the lip is not as described true in the tube, too pale. The lipstick didn’t have a lasting staying power and neede', '2022-11-16', '22:00:12', 20221116171849, 201, 20221116172847),
(12, 4, 'The shade is a bit different than shown on the app. But it is a beautiful pink shade suitable for fair to medium skin tones.', '2022-11-16', '22:04:42', 20221116171849, 202, 20221116172906),
(13, 5, 'My facial skin is sensitive. After using, it gets much better', '2022-11-16', '22:04:54', 20221116171849, 203, 20221116172931),
(14, 5, 'I absolutely love this. I have always used a colored pressed powder. This exceeded my expectations.', '2022-11-16', '22:07:00', 20221116171849, 204, 20221116172951),
(15, 5, 'This is the best mascara I have tried. My eyes are very stubborn so I decided to try this waterproof one and it works so well.', '2022-11-16', '22:07:40', 20221116171849, 205, 20221116173006),
(16, 5, 'I have used many but this is amazing. I have combined skin and this keeps my dry parts hydrated and my oily zoned under control.', '2022-11-16', '22:07:51', 20221116171849, 206, 20221116173024),
(17, 4, 'None...', '2022-11-16', '22:07:59', 20221116171849, 207, 20221116173040),
(18, 3, ' The strings running from the masts to the ship and running horizontally across the top of the ship are all tangled with one of the horizontal strings', '2022-11-16', '22:19:11', 20221113233804, 1, 20221116221810),
(19, 2, 'Great.....', '2022-11-17', '11:21:52', 20221113233804, 103, 20221117111806),
(20, 4, 'Very nice powder from Udery!!!', '2022-11-17', '15:33:48', 20221117151825, 204, 20221117152039),
(21, 4, 'The best skincare!!!', '2022-11-17', '15:56:01', 20221117151825, 203, 20221117153659),
(22, 3, 'This model is really nice.....', '2022-11-17', '23:34:55', 20221117232323, 4, 20221117232920),
(23, 4, 'This product is good.', '2022-11-19', '13:15:29', 20221119131002, 203, 20221119131309),
(24, 5, 'I really like Narutooo.', '2022-11-20', '13:55:13', 20221116171849, 6, 20221116172450),
(25, 5, 'None...', '2022-11-21', '20:31:20', 20221116171849, 7, 20221116172512),
(26, 5, 'This\'is a really nice models....', '2022-11-21', '21:46:45', 20221116171849, 3, 20221116172336);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `deliverycompany`
--
ALTER TABLE `deliverycompany`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`,`productID`),
  ADD KEY `ppgefe1` (`productID`),
  ADD KEY `Comfefgerg` (`companyID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Comfefgerg` FOREIGN KEY (`companyID`) REFERENCES `deliverycompany` (`companyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cssqf2fa1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ppgefe1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `CCSSR2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adaw` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
