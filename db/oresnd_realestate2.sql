-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 10:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oresnd_realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(10, 'About Our Company', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a website design and Web development Company dedicated to provide web based solutions to all type of businesses. Located in Ahmedabad, Gujarat (India).</p>\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a one stop solution for all your IT needs. It Provides full featured innovative and high quality cost effective IT web designing solutions ranging from customized web development, PHP web development, ASP.NET and all kind of programming to complete web solutions including web design, Web Development in PHP, eCommerce Solutions, Multimedia, and Print publication solutions, CSS/XHTML Web Design, Content Management, SEO (Web Promotion), Domain Registration, Web Hosting to businesses throughout the India.</p>\r\n<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a website design and Web development Company dedicated to provide web based solutions to all type of businesses. Located in Ahmedabad, Gujarat (India).</p>\r\n<p class=\"text_all_p_tag_css\">Pramukh Web Solution is a one stop solution for all your IT needs. It Provides full featured innovative and high quality cost effective IT web designing solutions ranging from customized web development, PHP web development, ASP.NET and all kind of programming to complete web solutions including web design, Web Development in PHP, eCommerce Solutions, Multimedia, and Print publication solutions, CSS/XHTML Web Design, Content Management, SEO (Web Promotion), Domain Registration, Web Hosting to businesses throughout the India.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'condos-pool.png');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `agent_name` varchar(150) NOT NULL,
  `agent_address` varchar(250) NOT NULL,
  `agent_contact` varchar(20) NOT NULL,
  `agent_email` varchar(25) NOT NULL,
  `status` char(20) NOT NULL DEFAULT 'active',
  `image` mediumblob DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `user_id`, `agent_name`, `agent_address`, `agent_contact`, `agent_email`, `status`, `image`, `deleted_at`) VALUES
(1, 17, 'Joseph K', '95, Henry Street, Indented Head, Victoria', '03 5321 1053', 'agent@gmail.com', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent_properties`
--

CREATE TABLE `agent_properties` (
  `id` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_properties`
--

INSERT INTO `agent_properties` (`id`, `agent_id`, `property_id`, `date`) VALUES
(1, 1, 20, '2024-02-13 06:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`, `sid`) VALUES
(9, 'navi mumbai', 3),
(10, 'vapi', 2),
(11, 'valsad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(2, 'demo', 'demo@gmail.com', '9765989689', 'demo', 'demo'),
(4, 'test', 'test@gmail.com', '7976976979', 'test', 'test'),
(5, 'final', 'final@gmail.com', '7697967967', 'final', 'final'),
(6, 'disha', 'disha@gmail.com', '7898797696', 'demo', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(2, 15, 'Magicbricks made my life easy. It helped me with the search for my first ever investment i.e. 1BHK apartment in Mira Road. Thanks to the team for providing relevant tools like EMI calculator and smart search.\r\n', 1, '2020-04-03'),
(3, 18, 'I am young professional, Magicbricks search helped me in shortlisting property in Navi Mumbai. I learned what kind of property will cost me how much and what are the types of amenities I will be getting?', 1, '2020-04-03'),
(4, 21, 'I was looking for a flat in Andheri and Magicbricks website helped me get one smoothly. I could choose not just the property but also check what others had to say about the area. The site is simple and user friendly.\r\n', 1, '2020-04-03'),
(5, 23, 'The constant touch through other true calls really surprised me.They sent their officer to get the photographs of my shop & promptly posted all the pics which helped me in getting the tenant fast. Hats off to Magicbricks.\r\n', 1, '2020-04-03'),
(6, 24, 'I moved to Mumbai from Delhi early this year and I looked online for a suitable apartment for rent in areas near my workplace in Andheri. Thanks Magicbricks for giving me so many options with Travel Time search.\r\n', 0, '2020-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `body` varchar(300) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `location`, `city`, `state`, `latitude`, `longitude`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`) VALUES
(11, 'final', '<p>final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final</p>\r\n<p>final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final&nbsp;</p>\r\n<p>final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final final&nbsp;</p>', 'office', '2 BHK', 'sale', 1, 2, 3, 4, 5, '3rd Floor', 4321, 897898, 'sabji market main road vapi', 'Abia', 'Abia', '5.806973', '7.481416', '<div class=\"col-md-4\">\n													<ul>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\n													\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\n													</ul>\n													</div>\n													<div class=\"col-md-4\">\n													<ul>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Appartment</li>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\n													\n													</ul>\n													</div>\n													<div class=\"col-md-4\">\n													<ul>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Alivator : </span>Yes</li>\n													<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\n													</ul>\n													</div>', '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 15, 'sold out', '', '', '', '', '2020-04-03 00:28:14'),
(20, 'Niramala Apartment', '<p>Magicbricks is an online platform where real estate trade is taking place in a much faster and newer manner. We not just help you with finding the ideal real estate, but also ensure that your buying journey is as smooth as it can be. We understand that while buying or renting a property, there are a lot of factors to be taken into consideration, like the locality, preferred area, budget, amenities, and a lot more. Magicbricks is the destination where you will end up finding the best suitable property available across India. Whether you are looking for a rented property or planning to build your dream abode, you can find anything and everything in real estate at our portal. We offer residential and commercial property listings for both sale and rent across the country. If you wish to make property investment in top cities, we present detailed information of various properties on sale, upcoming projects by renowned builders, budget residential apartments, commercial spaces, shops, etc. across cities like Bangalore, Pune, Mumbai, New Delhi, Chennai, Hyderabad, Kolkata, Noida, Gurgaon and many more. A wide variety of listing that is advertised here gives you an excellent overview of all property available in the area you are considering. Whether you are hunting for residential property, agricultural property, your next business set up, or an office space, Magicbricks aims at providing you the largest number of listing options in your preferred area to choose from.</p>', 'office', '1,2 BHK', 'rent', 99, 88, 77, 66, 55, '5th Floor', 1111, 9999500, 'boiser road near dmart', 'Abia', 'Abia', '5.806973', '7.481416', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>3 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Appartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>8 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Temple : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Alivator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', '01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', 15, 'available', 'floor.jpg', 'basement.jpg', 'ground.jpg', '12 Floor', '2020-04-03 20:30:34'),
(23, 'Voluptas quaerat non', '<p>Isuikwuato is a small area and a part of Abia state, which can be found in southern Nigeria, near the most urbanized living areas. It is a local business area filled with great houses, churches and lot more. It is a former mining area, where a lot of working class people moved to to work and live. The community is dominantly Christian, and the total population is estimated to be close to 50,000 people.</p>', 'bunglow', '2,3,4 BHK', 'rent', 0, 0, 0, 0, 0, '3rd Floor', 29, 210, 'abia, isuikwuato', 'Cross River', 'Cross River', NULL, NULL, '4', 'istockphoto-1399561967-612x612.jpg', 'istockphoto-608619582-612x612.jpg', 'pexels-picha-stock-3869641.jpg', 'pexels-photo-3869651.jpeg', 'download (2).jpg', 1, 'available', 'istockphoto-862596588-612x612.jpg', 'istockphoto-608619582-612x612.jpg', 'istockphoto-608619582-612x612.jpg', '9 Floor', '2024-02-13 10:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` int(11) NOT NULL,
  `property_id` int(10) DEFAULT NULL,
  `property_age` varchar(20) DEFAULT NULL,
  `swimming_pool` varchar(3) DEFAULT NULL,
  `parking` varchar(3) DEFAULT NULL,
  `gym` varchar(3) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `security` varchar(3) DEFAULT NULL,
  `dining_capacity` varchar(20) DEFAULT NULL,
  `temple` varchar(3) DEFAULT NULL,
  `third_party` varchar(3) DEFAULT NULL,
  `elevator` varchar(3) DEFAULT NULL,
  `cctv` varchar(3) DEFAULT NULL,
  `water_supply` varchar(50) DEFAULT NULL,
  `ceiling_fan` varchar(3) DEFAULT NULL,
  `curtains_drapes` varchar(3) DEFAULT NULL,
  `oven_range` varchar(3) DEFAULT NULL,
  `chandeliers` varchar(3) DEFAULT NULL,
  `freezer` varchar(3) DEFAULT NULL,
  `refrigerator` varchar(3) DEFAULT NULL,
  `convection_oven` varchar(3) DEFAULT NULL,
  `light_fixtures` varchar(3) DEFAULT NULL,
  `screens` varchar(3) DEFAULT NULL,
  `air_conditioning` varchar(3) DEFAULT NULL,
  `hotwater` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `property_id`, `property_age`, `swimming_pool`, `parking`, `gym`, `type`, `security`, `dining_capacity`, `temple`, `third_party`, `elevator`, `cctv`, `water_supply`, `ceiling_fan`, `curtains_drapes`, `oven_range`, `chandeliers`, `freezer`, `refrigerator`, `convection_oven`, `light_fixtures`, `screens`, `air_conditioning`, `hotwater`) VALUES
(1, 14, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL),
(2, 13, NULL, 'yes', NULL, NULL, 'yes', NULL, 'yes', 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', 'yes', 'yes', NULL, NULL),
(3, 20, 'yes', 'yes', NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `property_images` varchar(200) DEFAULT NULL,
  `property_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`property_images`, `property_id`) VALUES
('images/properties/bed-1-1.jpg', 1),
('images/properties/bed-1-2.jpg', 1),
('images/properties/liv-1-1.jpg', 1),
('images/properties/liv-1-2.jpg', 1),
('images/properties/kitchen-1-1.jpg', 1),
('images/properties/bed-1-1.jpg', 2),
('images/properties/bed-1-2.jpg', 2),
('images/properties/liv-1-1.jpg', 2),
('images/properties/liv-1-2.jpg', 2),
('images/properties/kitchen-1-1.jpg', 2),
('images/properties/bed-2-1.jpg', 2),
('images/properties/bed-2-2.jpg', 2),
('images/properties/liv-2-1.jpg', 2),
('images/properties/liv-2-2.jpg', 2),
('images/properties/kitchen-2-1.jpg', 2),
('images/properties/bed-3-1.jpg', 3),
('images/properties/bed-3-2.jpg', 3),
('images/properties/liv-3-1.jpg', 3),
('images/properties/liv-3-2.jpg', 3),
('images/properties/kitchen-3-1.jpg', 3),
('images/properties/bed-4-1.jpg', 4),
('images/properties/bed-4-2.jpg', 4),
('images/properties/liv-4-1.jpg', 4),
('images/properties/liv-4-2.jpg', 4),
('images/properties/kitchen-4-1.jpg', 4),
('images/properties/bed-5-1.jpg', 5),
('images/properties/bed-5-2.jpg', 5),
('images/properties/liv-5-1.jpg', 5),
('images/properties/liv-5-2.jpg', 5),
('images/properties/kitchen-5-1.jpg', 5),
('images/properties/bed-6-1.jpg', 6),
('images/properties/bed-6-2.jpg', 6),
('images/properties/liv-6-1.jpg', 6),
('images/properties/liv-6-2.jpg', 6),
('images/properties/kitchen-6-1.jpg', 6),
('images/properties/bed-7-1.jpg', 7),
('images/properties/bed-7-2.jpg', 7),
('images/properties/liv-7-1.jpg', 7),
('images/properties/liv-7-2.jpg', 7),
('images/properties/kitchen-7-1.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(2, 'gujarat'),
(3, 'goa'),
(4, 'maharashtra'),
(7, 'bihar'),
(9, 'chhattisgarh'),
(10, 'uttar pardesh'),
(15, 'rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_no` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `current_address` varchar(50) NOT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(30) DEFAULT NULL,
  `current_resindent_country` varchar(50) NOT NULL,
  `home_state` varchar(50) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `image` blob DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'inactive',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `id_no`, `password`, `phone`, `role`, `current_address`, `contact_person`, `contact_phone`, `current_resindent_country`, `home_state`, `home_address`, `image`, `status`, `deleted_at`) VALUES
(15, 'Admin Admin', 'admin@gmail.com', 34567334, '$2y$10$3MvRcbEReYoSy2Ydr9DMpexjftmPnimr0yI/XpkLBtnI.2Y.RLs3y', '0710897015', 'admin', '109', NULL, NULL, 'Kenya', 'Gombe', '00100', NULL, 'active', NULL),
(16, 'steven Client', 'client1@gmail.com', 987656789, '$2y$10$2PhXPuBhTifWiKe9XlcTGOWF0TZJfpUcwNryRiNu7rqjNN0WtR70K', '0710767095', 'client', '109', 'STEPHEN MAINA', '0710767000', 'Kenya', 'Gombe', '00100', NULL, 'inactive', NULL),
(17, 'Joseph K', 'agent@gmail.com', 787656786, '$2y$10$G5qt/NRLSI5c6.P/2sGGz.CRVALqerfRXXzD.PWeN8CdHp5dOwPaK', '0710767091', 'agent', '109', 'STEPHEN MAINA', '0710767007', 'Kenya', 'Gombe', '00100', NULL, '', NULL),
(21, 'Leigh Holt', 'pukili@mailinator.com', 89, '$2y$10$JIkGTpZpHqqFGnLdw0LVve7EzvS6/iZFihePRSfP0XGScCRXWhZne', '+1 (915) 874-1903', 'client', 'Corrupti aut quis d', 'Quidem aut ipsam fac', '+1 (894) 364-7468', 'Pitcairn', 'Bauchi', 'Qui cum qui accusamu', NULL, 'inactive', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `agent_properties`
--
ALTER TABLE `agent_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_properties`
--
ALTER TABLE `agent_properties`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
