-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 08:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Nahid Parvez Mafi', 'admin', '53c8f03f8cd8947ab96c056a8dd69fab'),
(6, 'Afsana Setu', 'setu', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Agroforestry', 'product_Category_7615.jpg', 'Yes', 'Yes'),
(2, 'Horticulture Supplies', 'Product_Category_2223.png', 'Yes', 'Yes'),
(3, 'Farm Machinery', 'Product_Category_4489.jpg', 'Yes', 'Yes'),
(4, 'Chemical Fertilizer', 'Product_Category_1738.jpg', 'Yes', 'Yes'),
(5, 'Organic Fertilizer', 'Product_Category_9099.jpg', 'Yes', 'Yes'),
(6, 'Insect Trap', 'Product_Category_8103.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(11) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(20, 'Baromashi Data', 15.00, 4, 60.00, '2024-05-16', 'Delivered', 'Octavia Mendoza', '+1 (391) 71', 'tonemi@mailinator.com', 'Obcaecati qui ration'),
(21, 'Mower', 30000.00, 2, 60000.00, '2024-05-16', 'Cancelled', 'Deanna Jenkins', '+1 (257) 88', 'favycabyni@mailinator.com', 'Sunt cupiditate lab'),
(22, 'Kumra', 22.00, 5, 110.00, '2024-05-20', 'Ordered', 'McKenzie Gentry', '+1 (999) 38', 'nejaxu@mailinator.com', 'Consequatur soluta '),
(23, 'Kumra', 22.00, 226, 4972.00, '2024-05-20', 'Ordered', 'Michael Ortiz', '+1 (256) 77', 'faned@mailinator.com', 'Quod reprehenderit d'),
(24, 'Baromashi Data', 15.00, 195, 2925.00, '2024-05-20', 'Ordered', 'Reese Richards', '+1 (976) 51', 'batupizux@mailinator.com', 'Debitis nihil simili'),
(25, 'Baromashi Data', 15.00, 310, 4650.00, '2024-05-20', 'Delivered', 'Phillip Le', '+1 (972) 91', 'qixohesyx@mailinator.com', 'Ea iste et et ut quo'),
(26, 'Kumra', 22.00, 7, 154.00, '2024-05-20', 'Ordered', 'Octavius Ward', '+1 (655) 81', 'mifukow@mailinator.com', 'Exercitationem corru'),
(27, 'Jar Trap', 250.00, 105, 26250.00, '2024-05-21', 'Ordered', 'Brynne Spence', '+1 (585) 57', 'kudab@mailinator.com', 'Voluptate qui delect'),
(28, 'Kumra', 22.00, 237, 5214.00, '2024-05-21', 'Ordered', 'Yolanda Harris', '+1 (731) 24', 'havolysy@mailinator.com', 'Saepe a ab dolor qui'),
(29, 'Kumra', 22.00, 7, 154.00, '2024-05-22', 'Ordered', 'Alvin Myers', '+1 (948) 85', 'losube@mailinator.com', 'Dolores aut reprehen'),
(30, 'Urea', 950.00, 103, 97850.00, '2024-05-22', 'Ordered', 'Herman Morin', '+1 (781) 63', 'ducynyfa@mailinator.com', 'Autem velit est magn'),
(31, 'Kumra', 22.00, 176, 3872.00, '2024-05-23', 'Ordered', 'Adrienne Whitney', '+1 (661) 71', 'gekig@mailinator.com', 'Proident in nemo re'),
(32, 'Jar Trap', 250.00, 969, 242250.00, '2024-06-05', 'Ordered', 'Hadley Camacho', '+1 (683) 58', 'jukowirafy@mailinator.com', 'Necessitatibus dolor'),
(33, 'Urea', 950.00, 1, 950.00, '2024-06-05', 'Ordered', 'Md. Tanvir Ibna Azaz', '01517832781', 'mdtanvir3571@gnail.com', 'Palbari Vaskorjer Mor, Jessore sadar, Jessore'),
(34, 'Jar Trap', 250.00, 871, 217750.00, '2024-06-05', 'Ordered', 'Justine Fernandez', '+1 (147) 72', 'nyzaryb@mailinator.com', 'Temporibus sunt dol'),
(35, 'Tractor', 18400.00, 205, 3772000.00, '2024-06-06', 'Ordered', 'Alika Frye', '+1 (925) 83', 'hiqebapeqe@mailinator.com', 'Eu officia libero ni'),
(36, 'Sprayer', 1500.00, 628, 942000.00, '2024-06-06', 'Ordered', 'Brendan Cline', '+1 (869) 47', 'cywosidu@mailinator.com', 'Autem ipsam necessit'),
(37, 'Baromashi Data', 15.00, 439, 6585.00, '2024-06-06', 'Ordered', 'Carlos Roberts', '+1 (584) 47', 'wihohenaq@mailinator.com', 'Sit maxime praesenti'),
(38, 'Urea', 950.00, 479, 455050.00, '2024-06-06', 'Ordered', 'Jared Woods', '+1 (857) 47', 'pygiveqo@mailinator.com', 'Consequuntur fugiat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `video_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `video_name`) VALUES
(1, 'Baromashi Data', 'baromashi data, onek moja', 15.00, 'product-Name-17302.jpg', 2, 'Yes', 'Yes', ''),
(7, 'Kumra', 'kumra', 22.00, 'product-Name-45256.jpg', 2, 'Yes', 'Yes', ''),
(21, 'Jar Trap', 'Jar trap with net and plastic border', 250.00, 'Product-Name-98808.jpg', 6, 'Yes', 'Yes', ''),
(22, 'Mower', 'KOSHIN Hand Push Lawn Mower EBC 35C.', 30000.00, 'Product-Name-7605.jpeg', 3, 'Yes', 'Yes', ''),
(23, 'Urea', 'Urea fertilizer 50 kg per packet', 950.00, 'Product-Name-53409.jpeg', 4, 'Yes', 'Yes', ''),
(24, 'Potassium Fertilizer', 'Organic Potassium Fertilizer Powder - 50lb Bag', 12585.00, 'Product-Name-47258.jpg', 4, 'Yes', 'Yes', ''),
(25, 'Puishak Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 20.00, 'Product-Name-22646.jpg', 1, 'Yes', 'Yes', ''),
(26, 'Morich Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 25.00, 'Product-Name-39697.jpg', 1, 'Yes', 'Yes', ''),
(27, 'Borboti Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 30.00, 'Product-Name-12969.jpg', 1, 'Yes', 'Yes', ''),
(28, 'Mishti Kumra Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 30.00, 'Product-Name-26488.jpg', 1, 'Yes', 'Yes', ''),
(29, 'Chichinga', 'These authentic baits are genetically pure, uniform and disease resistance.', 25.00, 'Product-Name-63833.jpg', 1, 'Yes', 'Yes', ''),
(30, 'Lau Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 35.00, 'Product-Name-2104.jpg', 1, 'Yes', 'Yes', ''),
(31, 'Kathal Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 50.00, 'Product-Name-90232.jpg', 1, 'Yes', 'Yes', ''),
(32, 'Papaya Bait', 'These authentic baits are genetically pure, uniform and disease resistance.', 50.00, 'Product-Name-16283.jpg', 1, 'Yes', 'Yes', ''),
(33, 'Plow', 'Model : Captain Reversible', 65000.00, 'Product-Name-89303.jpg', 3, 'Yes', 'Yes', ''),
(34, 'Tractor', 'Unmatched Power , Highest Torque 167 Nm , Fingertip control hydraulics Uniform depth better yi , Maximum Fly Up Speed - 36.09 km/h , Best speed in category', 400000.00, 'Product-Name-88939.jpeg', 3, 'Yes', 'Yes', ''),
(35, 'Sprayer', '8 Litre manual sprayer SO8 M', 1500.00, 'Product-Name-35233.jpg', 3, 'Yes', 'Yes', ''),
(36, 'Harrow', 'A field, removing ridges and mole hills to make the ground easier to mow during the warmer months, whilst helping to spread fertiliser, droppings, and manure to nourish the ground.', 115000.00, 'Product-Name-6178.jpg', 3, 'Yes', 'Yes', ''),
(37, ' Calcium Nitrate Fertilizer', 'Bulk Pricing: 1 Pound Calcium Nitrate Fertilizer 15.5-0-0', 2335.00, 'Product-Name-30116.jpg', 4, 'Yes', 'Yes', ''),
(38, 'Diammonium Phosphate Fertilizer ', 'Diammonium Phosphate Fertilizer - 50 kg', 900.00, 'Product-Name-13182.png', 4, 'Yes', 'Yes', ''),
(39, 'Phosphorus Fertilizer', 'High-Phosphorus Fertilizer for All Plants: Indoor, Outdoor, Gardens, Lawns. -50 lbs', 3155.00, 'Product-Name-4277.png', 4, 'Yes', 'Yes', ''),
(40, 'Compost', 'Aadi compost - 1 kg', 40.00, 'Product-Name-76050.jpeg', 5, 'Yes', 'Yes', ''),
(41, 'Magshar', 'Organic fertilizer- 1 kg', 340.00, 'Product-Name-44163.jpg', 5, 'Yes', 'Yes', ''),
(42, 'Seaweed Extract ', 'Organic fertilizer seaweed extract 25 kg per packet', 2512.00, 'Product-Name-61479.png', 5, 'Yes', 'Yes', ''),
(43, 'Grain meal organic fertilizer ', 'Grain meal organic fertilizer 1 kg per packet', 60.00, 'Product-Name-68156.png', 5, 'Yes', 'Yes', ''),
(44, 'Solar Insect Trap', 'Metal Yellow & Blue Light Combination Solar Insect Trap, Packaging Type: Box, 12V', 3500.00, 'Product-Name-84396.png', 6, 'Yes', 'Yes', ''),
(45, 'Pheromone trap', 'Solid body pheromone trap per piece', 1200.00, 'Product-Name-54956.jpg', 6, 'Yes', 'Yes', ''),
(46, 'Electric insect trap', 'Electric insect trap with 15 V, small size', 1500.00, 'Product-Name-74750.jpeg', 6, 'Yes', 'Yes', ''),
(47, 'Bucket trap', 'Plastic bucket flying insect trap', 300.00, 'Product-Name-3851.png', 6, 'Yes', 'Yes', ''),
(48, 'Funnel Trap', 'Funnel trap with plastic and polythene bag', 350.00, 'Product-Name-87026.png', 6, 'No', 'No', ''),
(49, 'Tractor', 'Smooth Tractor for farming', 18400.00, 'product-Name19331.jpeg', 5, 'Yes', 'Yes', 'Product-Name-46526.mp4'),
(50, 'Tractor', 'Smooth Tractor', 18400.00, 'Product-Name-87414.jpeg', 3, 'Yes', 'Yes', 'Product-Video-98020.mp4'),
(51, 'Plow', 'Plow', 65000.00, 'Product-Name-34792.jpg', 3, 'Yes', 'Yes', 'Product-Video-76828.mp4'),
(52, 'Harrow', 'A field, removing ridges and mole hills to make the ground easier to mow during the warmer months, whilst helping to spread fertiliser, droppings, and manure to nourish the ground.', 115000.00, 'Product-Name-21131.jpg', 3, 'Yes', 'Yes', 'Product-Video-43028.mp4'),
(53, 'Sprayer', '8 Litre manual sprayer SO8 M', 1500.00, 'Product-Name-25716.jpg', 3, 'Yes', 'Yes', 'Product-Video-69802.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
