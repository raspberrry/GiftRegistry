-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 08:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_name` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `item_desc` varchar(200) CHARACTER SET ascii DEFAULT NULL,
  `item_href` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `item_src` varchar(100) CHARACTER SET ascii DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_name`, `item_desc`, `item_href`, `item_src`) VALUES
('Shoulder Bag', 'A trendy bag to reflect the season\'s styles. Functional and fashionable!', 'bag.html', 'bag.png'),
('Baby Carrier', 'A functional gift for moms-to-be, carry your baby along where ever you go!', 'babycarrier.html', 'babycarrier.png'),
('Iphone7', 'A 32GB phone with cutting edge technology. Makes your life easier!', 'iphone.html', 'iphone.png'),
('Book', 'An enticing fiction book to awaken the bookworm in you!', 'book.html', 'book.png'),
('Watch', 'Always be on time with this fashionable timepiece!', 'watch.html', 'watch.png'),
('Shoes', 'Wear this pair to the party, and be the talk of the town!', 'shoes.html', 'shoes.png'),
('Jacket', 'This comfortable and trendy jacket will be your companion on all your adventures!', 'jacket.html', 'jacket.png'),
('Pendrive', 'Store all your files in this handy pendrive! Never leave your documents behind', 'pendrive.html', 'pendrive.png'),
('Jeans', 'Wear this pair out and have the best day ever! Made of denim and love', 'jeans.html', 'jeans.png'),
('Laptop', 'Work with this powerful device, and get ahead in life! Use this to get things done', 'laptop.html', 'laptop.png'),
('Camera', 'Capture the most important moments in you life! Take high quality pictures and videos.', 'camera.html', 'camera.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
