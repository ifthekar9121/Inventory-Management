-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 11:06 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(1, '0', 16, 'Canon EOS 7D', 0, 0),
(2, '0', 16, 'Canon EOS 7D', 0, 0),
(3, '0', 16, 'Canon EOS 7D', 0, 0),
(4, '0', 16, 'Canon EOS 7D', 1, 889),
(5, '0', 16, 'Canon EOS 7D', 0, 0),
(6, '0', 16, 'Canon EOS 7D', 1, 889),
(7, '0', 16, 'Canon EOS 7D', 0, 2667),
(8, '0', 16, 'Canon EOS 7D', 0, 0),
(9, '0', 16, 'Canon EOS 7D', 0, 0),
(10, '0', 16, 'Canon EOS 7D', 0, 0),
(11, '0', 0, '', 0, 0),
(12, '0', 0, '', 1, 0),
(13, '0', 0, '', 1, 0),
(18, 'fahad@gmail.com', 7, 'Samsung s7 edge ', 0, 0),
(19, 'fahad@gmail.com', 7, 'Samsung s7 edge ', 0, 2240),
(23, '', 17, 'Nexus 6P ', 2, 99800),
(24, '', 7, 'Samsung s7 edge ', 2, 80000),
(25, '', 7, 'Samsung s7 edge ', 2, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(44, 'ifthekaralam@gmail.com', 7, 'Samsung s7 edge ', 1, 40000),
(45, 'v@gmail.com', 8, 'Iphone 7 ', 3, 210000);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `picture`, `id_produit`) VALUES
(13, 'Samsung-Galaxy-S6-edge-Gold-Platinum..jpg', 2),
(14, 'samsung-galaxy-s7-edge.jpg', 2),
(15, 'galaxy-s7-edge-black.png', 2),
(16, 'MMY72_AV2.jpg', 8),
(17, 'iphone7-plus-rosegold-select-2016.jpg', 8),
(18, 'blue-iphone.jpg', 8),
(19, 'Hero5-Black-Carousel-3.png', 9),
(20, 'gopro-hero-5-release-date-price-frame.jpg', 9),
(21, 'gopro_hero_5_black_review_display.jpg', 9),
(25, 'oculus_rift_1.jpg', 10),
(26, 'OculusRift.jpg', 10),
(27, '61EsR4QA0PL._SL1500_.jpg', 10),
(28, 'five_pictures1_100259_201506200523405584885cedd68.png', 12),
(29, 'pi_ms-gp622qe-035za1.jpg', 12),
(30, 'pi_ms-gp622qe-035za3.jpg', 12),
(31, 'amazon_b00x4whp5e_echo_1187819.jpg', 13),
(32, 'amazonecho_4-100599473-orig.jpg', 13),
(33, 'amazon-echo-part-1-a-consumer-pr.jpg', 13),
(34, 'og-img.png', 14),
(35, 'h_51561794.jpg', 14),
(36, 'apple-watch-thumbnail-100571651-orig.jpg', 14),
(37, 'pixel.png', 15),
(38, 'GoogleBlue.jpg', 15),
(39, 'etui-diztronic-matte-tpu-google-pixel-xl-alloy-grey.jpg', 15),
(40, 'D3S_4695-1200.jpg', 16),
(41, 'highres-Canon-EOS-7D-MarkII-8_1417776370.jpg', 16),
(42, 'highres-Canon-EOS-7D-Mark-II-with-lens-1_1411133185.jpg', 16),
(43, 'nexus-6p-9444.0.jpg', 17),
(44, 'nexus-6p-9693.0.jpg', 17),
(45, 'Google-Nexus-6P-Review-Conc.jpg', 17),
(46, 'Taslim.jpg', 18),
(47, '20900571_1570639436330701_8289424113626431097_o.jpg', 18),
(48, '20900571_1570639436330701_8289424113626431097_o (3).jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `quantity`, `thumbnail`) VALUES
(7, 'Samsung s7 edge', '5.50-inch 1440x2560 display powered by 1.6GHz octa-core processor alongside 4GB of RAM and 12-megapixel', 40000, 13, 'galaxy-s7-edge-black.png'),
(8, 'Iphone 7', 'Features 3G, 4.7â€³ LED-backlit IPS LCD display, 12 MP camera, Wi-Fi, GPS, Bluetooth', 70000, 8, 'rsz_iphone-7-jet-black.jpg'),
(9, 'Gopro Hero 5', ' GoPro HERO5 Black features Supports 4K30, 2.7K60, 1080p120 Video, Capture 12MP Photos at 30fps', 45000, 5, 'gopro5.png'),
(11, 'Oculus rift', 'The Oculus Rift is a virtual reality system that completely immerses you inside virtual worlds', 60000, 3, 'Oculus_Product_Dynamic 45.jpg'),
(12, 'MSI GP62 Leopard Pro', 'In-depth review of the MSI GP62-2QEi781FD (Intel Core i7 5700HQ, NVIDIA GeForce GTX 950M, 15.6\", 2.3 kg) ... The MSI GE series is already the manufacturer\'s entry-level gaming series. ..... ', 83900, 4, 'msi-gp62-6qf-product_pictures-3d1.png'),
(13, 'Amazon Echo', 'Amazon Echo is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports ...', 17900, 2, 'amazon-echo-image.jpg'),
(14, 'Apple Watch', 'The new Apple Watch is the ultimate device for your healthy life. Choose from a range of models including Apple Watch Series 2 and Apple Watch Nike+', 34900, 11, 'apple-watch-premium-design-vs-pebble-time-round-classic-design.jpg'),
(15, 'Google Pixel XL', 'XL 5.5\" Phone 128GB Quite Black Cell Smart. GOOGLE PIXEL XL 5.5\" Black 32GB TRUE ANDROID PHONE CDMA+GSM WORLD UNLOCKED', 64900, 19, 'pixel.png'),
(16, 'Canon EOS 7D', 'The EOS 7D features a Canon-designed 18.0 Megapixel APS-C size CMOS sensor that captures such a high level of resolution it\'s easy to crop images for ...', 88900, 17, 'EOS 7D Mark II Hero.jpg'),
(17, 'Nexus 6P', 'All-metal design Unlocked, LTE smartphone with a powerful 2GHz Snapdragon 810 V2.1 Processor and the newest Android software, Android 6.0 marshmallow.', 49900, 13, 'nexus-6p-topic-full.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `sex`, `email`, `password`, `phone`, `address`) VALUES
(15, 'Rahat', 'male', 'fahad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '01719009988', 'Dhaka'),
(19, 'ifte', 'female', 'ifthekaralam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1'),
(20, 'b', 'male', 'v@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '091387', 'djhfbg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
