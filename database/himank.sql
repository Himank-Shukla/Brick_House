-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 05:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himank`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `unhash` (IN `user` VARCHAR(255))  NO SQL
SELECT id, username, password FROM users WHERE users.username=user$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `property_id` int(11) NOT NULL,
  `amenities` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`property_id`, `amenities`) VALUES
(1, 'cctv'),
(1, 'pool'),
(1, 'garden'),
(2, 'cctv'),
(2, 'pool'),
(2, 'garden'),
(2, 'parking'),
(2, 'tennis court'),
(3, 'cctv'),
(3, 'pool'),
(3, 'garden'),
(4, 'pool'),
(4, 'bar'),
(4, 'parking'),
(4, 'cctv'),
(4, 'sea facing'),
(5, 'cctv'),
(5, 'lawn'),
(5, 'pool'),
(5, 'tennis court'),
(6, 'cctv'),
(6, 'lawn'),
(6, 'pool'),
(6, 'tennis court'),
(7, 'cricket ground'),
(7, 'swimming pool'),
(7, 'bar'),
(8, 'cricket ground'),
(8, 'swimming pool'),
(8, 'bar'),
(8, 'football ground');

-- --------------------------------------------------------

--
-- Table structure for table `area_table`
--

CREATE TABLE `area_table` (
  `pincode` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area_table`
--

INSERT INTO `area_table` (`pincode`, `city`, `state`) VALUES
('24455', 'mumbai', 'maharashtra'),
('305001', 'ajmer', 'rajasthan'),
('320001', 'mumbai', 'maharashtra'),
('325009', 'mumbai', 'maharashtra'),
('560018', 'bangalore', 'karnataka'),
('560078', 'bangalore', 'Karnataka'),
('560111', 'bangalore', 'Karnataka'),
('785612', 'guwahati', 'assam');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`property_id`, `user_id`, `rating`) VALUES
(4, 2, 'dice'),
(1, 5, 'nice'),
(1, 6, 'great'),
(7, 6, 'amazing'),
(1, 5, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `property_id` int(11) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`property_id`, `images`) VALUES
(1, 'property-3.jpg'),
(1, 'property-7.jpg'),
(1, 'slide-1.jpg'),
(2, 'post-4.jpg'),
(2, 'post-5.jpg'),
(2, 'property-1.jpg'),
(3, 'post-1.jpg'),
(3, 'post-2.jpg'),
(3, 'post-4.jpg'),
(4, 'agent-1.jpg'),
(4, 'post-7.jpg'),
(4, 'post-single-1.jpg'),
(4, 'property-9.jpg'),
(4, 'property-10.jpg'),
(4, 'slide-1.jpg'),
(5, 'property-9.jpg'),
(5, 'property-10.jpg'),
(6, 'slide-1.jpg'),
(6, 'slide-2.jpg'),
(6, 'slide-3.jpg'),
(7, 'property-3.jpg'),
(7, 'property-4.jpg'),
(7, 'property-5.jpg'),
(8, 'slide-about-1.jpg'),
(8, 'testimonial-1.jpg'),
(8, 'testimonial-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `location`, `price`, `pincode`, `user_id`) VALUES
(1, 'A residency', 'jayanagar', '99L', '560111', 1),
(2, 'B residency', 'ks layout', '1.2CR', '560078', 1),
(3, 'C residency', 'andheri', '89L', '320001', 1),
(4, 'D residency', 'vaishali nagar', '80L', '305001', 2),
(5, 'F Residency', 'sardar nagar', '88L', '325009', 4),
(6, 'ABC residency', 'vv puram', '88L', '560018', 5),
(7, 'tooste de', 'lal mati', '90l', '785612', 6),
(8, 'mannat', 'zuhu beach', '500cr', '24455', 7);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `property_id` int(11) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`property_id`, `bhk`, `size`, `category`) VALUES
(1, '4', '300msq', 'villa'),
(2, '3', '900msq', 'apartment'),
(3, '4', '1200msq', 'apartment'),
(4, '2', '800msq', 'apartment'),
(5, '3', '1100mq', 'apartment'),
(6, '3', '1100mq', 'villa'),
(7, '2', '1500msq', 'villa'),
(8, '8', '15000msq', 'villa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `phone`) VALUES
(1, 'hmk@gmail.com', '$2y$10$yaXdilLMbRFzjWXdfyD9SeC0ut4Rv.gSbyHt0hdKv3VtTrbzOgyTK', 'himankS', '1212121111'),
(2, 'ayush@gamil.com', '$2y$10$qJATXexHoo3VwQUJPBxpEOsD2k9L/fL177K6l2km968XIJqvfte5i', 'aayushman', '23232332'),
(3, 'a@gmail.com', 'Y?`W?a??ӊ6??!?', 'Aniket', '2323233'),
(4, 'h@gmail.com', '698d51a19d8a121ce581499d7b701668', 'him', '676676767'),
(5, 'user@gmail.com', '698d51a19d8a121ce581499d7b701668', 'user1', '7878787777'),
(6, 'ay@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Aayushman', '8737236472'),
(7, 'ra@gmail', '698d51a19d8a121ce581499d7b701668', 'srk', '74298'),
(8, 'bera@gmail.com', '698d51a19d8a121ce581499d7b701668', 'ashok', '46777665'),
(9, 'ya@gmail.com', '698d51a19d8a121ce581499d7b701668', 'ram', '65657');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `hash` BEFORE INSERT ON `users` FOR EACH ROW set new.password =MD5(new.password)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_table`
--
ALTER TABLE `area_table`
  ADD PRIMARY KEY (`pincode`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
