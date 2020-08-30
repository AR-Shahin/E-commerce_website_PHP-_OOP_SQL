-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 30, 2020 at 08:15 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(2) NOT NULL,
  `brandname` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`) VALUES
(1, 'asus'),
(3, 'arcer'),
(4, 'lenovo'),
(6, 'Samsung'),
(7, 'LG'),
(9, 'Nokia'),
(10, 'Singer'),
(11, 'Dell'),
(13, 'Sun Disk'),
(14, 'Panasonic'),
(15, 'Mac');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(2) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `pid` int(3) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` float(5,2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `image` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `catname` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`) VALUES
(14, 'Hardware'),
(11, 'Laptop'),
(12, 'Mobile'),
(15, 'Others'),
(13, 'Softwere');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(2) NOT NULL,
  `cusid` int(2) NOT NULL,
  `proID` int(2) NOT NULL,
  `sid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `cusid`, `proID`, `sid`) VALUES
(20, 0, 31, 'c797agght9gqav9ripu492h6gr');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(80) NOT NULL,
  `zip` int(8) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(25) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES
(2, 'shahin', 'kachua', 1001, 'shahin@gmail.com', 'chandpur', 'Bangladesh', '+8801754100439', '202cb962ac59075b964b07152d234b70'),
(3, 'Anisur Rahman Shahin', 'Dhaka', 3630, 'mdshahinmije96@gmail.com', 'Mohakhali,dhaka', 'Bangladesh', '01994439594', '202cb962ac59075b964b07152d234b70'),
(4, 'Fariya', 'Dhaka', 3630, 'fariyanusrat907@gmail.com', 'mohakhali,dhaka', 'Bangladesh', '01994439594', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(2) NOT NULL,
  `cusId` int(2) NOT NULL,
  `productId` int(2) NOT NULL,
  `productName` varchar(150) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `sid` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cusId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`, `sid`) VALUES
(1, 4, 21, 'Sun Disk Card Rider', 1, 11.00, '947fa0321b.jpg', '2020-08-29 12:06:07', 3, 'ip70flsjbc78sgvl1kdmv5mqg8'),
(2, 3, 23, 'Nokia KIndly Tab ', 1, 222.53, '4dc9f2c1c0.png', '2020-08-29 12:10:29', 3, 'oeapibk0eaqf1dt7d3euvko0va'),
(3, 3, 13, 'Fujifilm FinePix S2950 Digital Camera', 2, 330.48, 'f396cb1cc4.jpg', '2020-08-29 12:11:38', 3, 'oeapibk0eaqf1dt7d3euvko0va'),
(4, 4, 20, 'Pendrive', 2, 44.00, '0f6d5e5699.jpg', '2020-08-29 12:40:14', 3, 'huqg2oous15ksuo2hdauudeoas'),
(5, 4, 16, 'Fujifilm FinePix S2950 Digital Camera', 1, 222.53, 'de2fcc41f5.jpg', '2020-08-29 18:40:58', 3, 'rrknap9bgnjj5lota5jg85oa6s'),
(6, 4, 22, 'Shoe Brown', 1, 27.50, 'f9b95577cf.jpg', '2020-08-29 18:59:27', 3, 'rrknap9bgnjj5lota5jg85oa6s'),
(7, 4, 22, 'Shoe Brown', 1, 27.50, 'f9b95577cf.jpg', '2020-08-29 19:11:31', 3, '5tkdnn558n5uu8mc334lnf6jjs'),
(8, 3, 31, 'Anti Virus-20', 2, 220.00, '789b8024ed.jpg', '2020-08-30 09:42:09', 3, 'c797agght9gqav9ripu492h6gr'),
(9, 3, 26, 'Silver Laptop With Cup', 2, 990.00, '98833510e5.jpg', '2020-08-30 09:51:03', 0, 'c797agght9gqav9ripu492h6gr'),
(10, 3, 28, 'Mac Book Pro', 1, 880.00, '9cf99a3222.jpg', '2020-08-30 09:51:03', 0, 'c797agght9gqav9ripu492h6gr'),
(11, 3, 29, 'Asus VivoBook N580', 1, 495.00, 'edbcf03188.jpg', '2020-08-30 09:51:03', 3, 'c797agght9gqav9ripu492h6gr'),
(12, 3, 31, 'Anti Virus-20', 1, 110.00, '789b8024ed.jpg', '2020-08-30 09:51:03', 3, 'c797agght9gqav9ripu492h6gr'),
(13, 3, 30, 'Dell Motherboard', 2, 264.00, '4e7a74c514.jpg', '2020-08-30 10:02:46', 3, 'c797agght9gqav9ripu492h6gr'),
(14, 3, 29, 'Asus VivoBook N580', 2, 990.00, 'edbcf03188.jpg', '2020-08-30 10:02:46', 3, 'c797agght9gqav9ripu492h6gr'),
(15, 3, 28, 'Mac Book Pro', 1, 880.00, '9cf99a3222.jpg', '2020-08-30 10:02:46', 3, 'c797agght9gqav9ripu492h6gr'),
(16, 3, 31, 'Anti Virus-20', 1, 110.00, '789b8024ed.jpg', '2020-08-30 10:02:46', 3, 'c797agght9gqav9ripu492h6gr');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` float(10,2) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `brand_id` int(2) NOT NULL,
  `description` text NOT NULL,
  `status` int(3) NOT NULL,
  `quantity` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `cat_id`, `brand_id`, `description`, `status`, `quantity`, `date`, `image`) VALUES
(13, 'Fujifilm FinePix S2950 Digital Camera', 150.22, 14, 6, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).\r\n                        14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 1, 10, '2020-08-25 10:03:46', 'f396cb1cc4.jpg'),
(14, 'Fujifilm FinePix S2950 Digital Camera', 111.00, 14, 7, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).\r\n                        14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 1, 10, '2020-08-25 10:05:12', '239a7f85df.jpg'),
(15, 'Fujifilm FinePix S2950 Digital Camera', 222.30, 14, 10, 'Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 1, 10, '2020-08-25 10:07:28', '09c1335295.jpg'),
(16, 'Fujifilm FinePix S2950 Digital Camera', 202.30, 14, 11, 'Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 1, 10, '2020-08-25 10:07:46', 'de2fcc41f5.jpg'),
(17, 'Camera', 202.30, 14, 9, 'Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 3, 15, '2020-08-25 10:10:34', '7c60ef0e9f.jpg'),
(18, 'Fujifilm FinePix S2950 Digital Camera', 110.00, 14, 7, 'Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 3, 35, '2020-08-25 10:10:33', '3bf9e8c77a.jpg'),
(19, 'Mini SD Card', 50.00, 11, 1, 'Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).                         Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).                         Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 2, 10, '2020-08-25 12:44:56', '707d036ad4.jpg'),
(20, 'Pendrive', 20.00, 14, 11, 'arning/eco Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).                         Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 2, 20, '2020-08-25 12:55:17', '0f6d5e5699.jpg'),
(21, 'Sun Disk Card Rider', 10.00, 14, 13, 'Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).                         Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 2, 10, '2020-08-25 12:49:49', '947fa0321b.jpg'),
(22, 'Shoe Brown', 25.00, 15, 4, 'Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).                         Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 2, 10, '2020-08-25 12:50:42', 'f9b95577cf.jpg'),
(23, 'Nokia KIndly Tab ', 202.30, 12, 9, 'Weight 0.437kg (including battery and memory card). Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos \r\nand 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced \r\nresolution. \r\n                            Tracking Auto Focus. Motion Panorama Mode. \r\nFace Detection technology with Blink detection and Smile and shoot mode.\r\n 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. \r\n                            Weight 0.341kg (excluding battery and memory\r\n card). Weight 0.437kg (including battery and memory card).', 1, 10, '2020-08-25 12:53:22', '4dc9f2c1c0.png'),
(25, 'cosmetic', 15.00, 15, 10, 'Cosmetics comprise a range of products that \r\nare used to care for the face and body or to enhance or change the \r\nappearance of the face or body. The products&nbsp;...Cosmetics comprise a range of products that \r\nare used to care for the face and body or to enhance or change the \r\nappearance of the face or body. The products&nbsp;...Cosmetics comprise a range of products that \r\nare used to care for the face and body or to enhance or change the \r\nappearance of the face or body. The products&nbsp;...Cosmetics comprise a range of products that \r\nare used to care for the face and body or to enhance or change the \r\nappearance of the face or body. The products&nbsp;...', 1, 10, '2020-08-29 16:10:21', '5ae030db8d.jpg'),
(26, 'Silver Laptop With Cup', 450.00, 11, 1, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 15, '2020-08-29 16:12:54', '98833510e5.jpg'),
(27, 'Black Laptop', 500.00, 11, 3, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 10, '2020-08-29 16:14:03', 'ab5b23e39e.jpg'),
(28, 'Mac Book Pro', 800.00, 11, 15, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 15, '2020-08-29 16:17:06', '9cf99a3222.jpg'),
(29, 'Asus VivoBook N580', 450.00, 11, 1, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 15, '2020-08-29 16:19:27', 'edbcf03188.jpg'),
(30, 'Dell Motherboard', 120.00, 14, 11, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 5, '2020-08-29 16:28:58', '4e7a74c514.jpg'),
(31, 'Anti Virus-20', 100.00, 13, 1, 'Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes \r\nknown, is dummy text used in laying out print, graphic or web designs. \r\nThe passage is attributed to an unknown typesetter in the 15th century \r\nwho is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et\r\n Malorum for use in a type specimen book.', 1, 10, '2020-08-29 16:33:04', '789b8024ed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `date`) VALUES
(2, 'Anisur Rahman', 'shahin', 'ars@gmail.com', '123456', '', '2020-08-21 13:38:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catname` (`catname`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
