-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 04:38 PM
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
-- Database: `learners_notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active,0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `contact`, `status`) VALUES
(1, 'Punith', '9999999999', 1),
(2, 'Foreseekh', '9876543212', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active,0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'CBSE', 1),
(2, 'ICSE', 1),
(3, 'Karnataka State Board', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `slides` text NOT NULL,
  `pdf` text NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0-deleted,1-active,2-suspended',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `url`, `author_id`, `category_id`, `price`, `slides`, `pdf`, `description`, `status`, `create_date`, `created_by`) VALUES
(1, 'ee', 'sskkjjhhgggg', 2, 1, 654, 'uploads/slides/1733645437_PAN.PNG', 'uploads/pdf/1733645437_shetty.pdf', '<p>dwd</p>\r\n<p><em>dsad</em></p>\r\n<p>dsa</p>\r\n<p><strong>fdsfds</strong></p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>sda</strong>dsad</li>\r\n<li>sds</li>\r\n<li>sad</li>\r\n</ol>', 1, '2024-12-06 12:52:58', 0),
(2, 'ee', 'ss', 1, 3, 33, 'uploads/slides/1733469845_aadhar.PNG,uploads/slides/1733469846_aadhar-b.PNG,uploads/slides/1733469847_PAN.PNG,uploads/slides/1733469845_aadhar.PNG,uploads/slides/1733469846_aadhar-b.PNG,uploads/slides/1733469847_PAN.PNG', 'uploads/pdf/1733469845_PUNIT - Print _ Udyam Registration Certificate.pdf', '<p>dwd</p>', 1, '2024-12-06 12:54:05', 0),
(3, 'Test', 'ssfrt', 1, 2, 22, 'uploads/slides/1733645503_aadhar-b.PNG', 'uploads/pdf/1733645503_shetty.pdf', '<p>wdw</p>', 1, '2024-12-08 13:41:43', 0),
(4, 'CBSE Test course', 'sds-sad-spp', 1, 1, 344, 'uploads/slides/1734593023_PAN.PNG', 'uploads/pdf/1734593023_shetty.pdf', '<p>tesy</p>', 1, '2024-12-19 12:53:43', 0),
(5, 'ededed', 'de', 1, 1, 44, 'uploads/slides/1734594785_aadhar-b.PNG', 'uploads/pdf/1734594785_shetty.pdf', '<p>sxss</p>', 1, '2024-12-19 13:23:05', 0),
(6, 'eer44rr', 'yyyui8', 1, 1, 22, 'uploads/slides/1734594811_aadhar.PNG', 'uploads/pdf/1734594811_shetty.pdf', '<p>dde</p>', 1, '2024-12-19 13:23:31', 0),
(7, 'wwee', '5ttgg', 1, 1, 3, 'uploads/slides/1734594876_PAN.PNG', 'uploads/pdf/1734594876_shetty.pdf', '<p>swdwqd</p>', 1, '2024-12-19 13:24:36', 0),
(8, 'Complete Maths Notes PDF | Color Handwritten Notes – JEE', 'complete-maths-notes', 1, 1, 599, 'uploads/slides/1734678225_aadhar.PNG,uploads/slides/1734678226_PAN.PNG', 'uploads/pdf/1734678225_shetty.pdf', '<h2>Download our comprehensive Maths Notes for&nbsp;<strong>(IIT JEE | A Level)</strong></h2>\r\n<p>&nbsp;</p>\r\n<p><strong>Product: Maths Study Notes<br>Quality: High Quality Pages A4 size<br>Format: PDF<br>Pages: Colored<br>Length: 726 Pages</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Exam Level:</strong>&nbsp;A Level | High School Grade 11th &amp; 12th | IIT JEE (World&rsquo;s Toughest exams)</p>\r\n<p><strong>Topics:</strong> Algebra, Trigonometry, Co-ordinate Geometry, Vector and 3D Geometry, Differential Calculus,&nbsp;Integral Calculus</p>\r\n<p>&nbsp;</p>\r\n<p><strong>WHY BUY THESE NOTES<br></strong><span id=\"emoji-info-value\"><strong>**</strong></span>&nbsp;One Time Pay &amp; Lifetime Access<br><span id=\"emoji-info-value\"><strong>**</strong></span>&nbsp;Instant Download PDF after Purchased<br><span id=\"emoji-info-value\"><strong>**</strong></span>&nbsp;Easily Accessible on Mobile, Tab, Laptop, &amp; PC<br><span id=\"emoji-info-value\"><strong>**</strong>&nbsp;Ultimate Notes for Teachers, Students, and Learners<br><strong>**</strong>&nbsp;Created by Experienced Experts<br><strong>**</strong>&nbsp;Save Time, Avoid Burnout &amp; Ace your Exams!<br><strong>**</strong>&nbsp;Revision Friendly (Highlighted Important Terms)</span><br><strong>**</strong> Super Colorful and Aesthetic Notes (Make studying Enjoyable, Engaging, Efficient, &amp; Memorize Easily)<br><br></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Topics Include in Maths Notes (IIT JEE | A Level) PDF:</strong><br>? Algebra (Complex Number, Determinants &amp; Matrix, Permutation &amp; Combination, Inequalities &amp; Graphs, Binomial Theorem)<br>? Trigonometry (Solution of Triangle, Inverse Trigonometry Functions)<br>? Co-ordinate Geometry (Straight Lines, Circles, Parabola, Ellipse, Hyperbola)<br>? Vector and 3D Geometry (Vectors, 3D Geometry)<br>? Differential Calculus (Sets, Relations and Functions, Limits, Continuity, Differentiability and Differentiation, Tangent &amp; Normals, Between Curves, Monotonocity, Critical Points, Points of Inflection, Nature of roots of Cubic, Maxima and Minima, Rolle&rsquo;s Theorem, LMVT)<br>? Integral Calculus (Indefinite Integration, Definite Integration, Area Under Curve, Differential Equation)</p>\r\n<p>Description<br>Looking for comprehensive and visually stunning study materials to ace your High School and competitive Math&nbsp; exams? Look no further than our collection of Aesthetic Study Notes, covering all the essential topics in Mathematics.</p>\r\n<p>?? Covered all important topics with clear and easiest explanation<br>?? These notes will help you to achieve A* in Chemistry A level | IIT JEE [World&rsquo;s Toughest exam]<br>?? Includes Handmade diagrams<br>?? Super colorful and aesthetic study notes<br>?? High Quality (HD) Scanned pages PDF<br>?? All stuff in well design manner<br>?? Includes Tables, Charts, Diagrams etc&hellip;to memories easily<br>?? Colored notes will help you to make interest and keep focus for a Long Time<br>?? Covers almost all important formulas for Maths<br>?? Latest notes for Upcoming exams 2024<br>?? Absolutely wonderful resource! you&rsquo;ll getting so engaged with the lessons that accompanied these notes.</p>', 1, '2024-12-20 12:33:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `notes_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `razor_pay_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `notes_ids` varchar(255) NOT NULL,
  `status_rz` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `paymentid_rz` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `failed_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `email`, `phone`, `address`, `amount`, `notes_ids`, `status_rz`, `create_date`, `paymentid_rz`, `signature`, `failed_reason`) VALUES
(1, 'order_PaIIzUakGRlWbq', 'uuuuu', 'yyyy@ww', '000999999', '', 132, '132', '', '0000-00-00 00:00:00', 'pay_PaIJJpAMwvm5Pz', 'ca34943976cf150d8ab538de955c6156584d86a17079767631af7beda87532cb', ''),
(2, 'order_PaIMJRHfg3dUfu', 'uuuuu', 'yyyy@ww', '000999999', 'hhhhhhhhhhhhhhhhhh', 132, '132', '', '0000-00-00 00:00:00', 'pay_PaIMrpKVLDeNOG', 'abec212087d057bab0338e072aeae9f4534608f44723c9caf44fccc49726bd5a', ''),
(3, 'order_PaINQ9xtuqxM3f', 'uuuuu', 'yyyy@ww', '000999999', 'hhhhhhhhhhhhhhhhhh', 132, '132', '', '0000-00-00 00:00:00', 'pay_PaINwsFfGELsUN', 'c20b7607d5645bf025beccf2905f6e6be4afa9998e1c2063d4fa3744e17fee40', ''),
(4, 'order_PaIUb5AkeHkrBJ', 'wwwwww', 'ww@ww', '33333333', 'ddddddddddddddddddddddddd', 132, '2', '', '0000-00-00 00:00:00', 'pay_PaIUuB0L7tphzZ', '62b5dfa5390087a521d458fbe83e91481fb99e326f965ba18ef0b6fef299d591', ''),
(5, 'order_PaIY9Nnaezx31F', 'wwwwww', 'ww@ww', '33333333', 'ddddddddddddddddddddddddd', 132, '2', '', '0000-00-00 00:00:00', 'pay_PaIYI8ivnqouer', 'ec493dd4e28baa52b98a2974d27530662d8e4241097c9b5397a0761d8a6ee765', ''),
(6, 'order_PaIapDmmIhesiq', 'ddddd', 'ddd@wwww', '33333333', 'sddddddddddddddddddddddd', 132, '2-4', '', '0000-00-00 00:00:00', 'pay_PaIazWJzOIOhtg', '02d699cd909b92e7b50a6ad65875fac612500d167913022bc422a7cd44c8b01f', ''),
(7, 'order_PatIogp5IelhpS', 'sssss', 'ss@ww.ll', '44444444', 'f fd fffffff ffvvv', 132, '2-4', '', '0000-00-00 00:00:00', 'pay_PatJPihDuLTzeF', '3ad88c56d903431e163766edad5132e2e9afa9e5db7e2a19860853ef21c41a97', ''),
(8, 'order_PatMQwV37TUjTO', 'sdss', 'dd@hh.ll', '23323233', 'ccc dd ff gg gg ', 176, '2-4,5-1', '', '0000-00-00 00:00:00', 'pay_PatMe5OUAt8i1e', 'ac4e91234aad7dfc9a5f5266269edb71e07f048076ab2dcc91d67b4fadb79574', ''),
(9, 'order_PatlnhNsnbiQWi', 'sssss', 'sss@ww.ll', '999999999', 'ffffffffffffffffffffffff', 176, '2-4,5-1', '', '2024-12-24 11:00:41', 'pay_PatmIb2uzfYbj6', '3e998887010379b73b2353acfa57724dda5ff6b38dde5edc3e7e852d820151ef', ''),
(10, 'order_Patnx9Mjmzi1UA', 'sssss', 'sss@ww.ll', '999999999', 'ffffffffffffffffffffffff', 176, '2-4,5-1', '', '2024-12-24 11:02:23', 'pay_Pato53D4tAF3aK', '729b5cb80cbdeb308d335e1b63c1772149ae3facf7d6e37055035730e567c8a2', ''),
(11, 'order_PazbpNFucRA7YJ', 'ggggg', 'ggg@ww', '88888888888', 'uuuuuuuuuuuuuuuuuuuuuuuuu', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:43:03', 'pay_PazbyaC2U2Cp69', '55ff1ae03626040390b77e5f9d5e124556bf6bb82b728fc8c796d9f6f1731acd', ''),
(12, 'order_PazeusStyZHcIi', 'ssssss', 'ss@ww.ll', '444444444444', 'ededeeeeeeeeeeeeeeeeeeee', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:45:55', 'pay_Pazezmu3PLfBJS', '35b8adcd597c2185694e08a6b14c5ac31c379ff6ad6b7a8110f19f0131deeb03', ''),
(13, 'order_Pazgo6BhnxdJPN', 'sssssss', 'ssss@ssss', '333333333', 'dddddddddddddddddddddddd', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:47:41', 'pay_PazgsFGct5QpcX', 'aff61700cb19c887ef0ba71fd9e0e850573140ee2e247772b198940863c4caf3', ''),
(14, 'order_PaziOsfsUqWBXh', 'dddddd', 'ttt2wsss@ss', '33333333', 'ddds dsdsdsddddddddddddddddddddd', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:49:11', 'pay_PaziSFsLdF47he', '16920e67f2e34017436539301f3dcd4ab9dc1793ff2340b134826d5433ff09b4', ''),
(15, 'order_PazmZlC0By3dzz', 'ewewe', 'jj@dd', '444444444', 'fdffffffffffffffffffffff', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:53:09', 'pay_PazmdiiVNFa5n9', 'abc3a0f8829efe0c039e2afe8d94ed2abbdace41a2db73424b29e21983e39daf', ''),
(16, 'order_Pazo5kOdXPkGUF', 'dsdsd', 'sd@ww.ll', '3333333333', 'cdcdcccccccccccccccccc', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:54:38', 'pay_PazoCXB1bjmoSP', '222ca3eed3ff6645af3cfac2e65a1311ed5c2391c42b3b524e895f55ad521704', ''),
(17, 'order_Pazr38Xrn3oksz', 'ffffff', 'dd@ww', '777777777777', 'hhhhhhhhhhhhhhhhhh', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:57:30', 'pay_PazrFWKrFDei8Q', 'fb0c38dd607d75d74d90b8ade94f92240d4ad4dc21a4a2fd22fa67a12d7439c1', ''),
(18, 'order_PaztEEJWtzcwq9', 'tttttttt', 'ddd@ww', '8888888888', 'hhhhhhhhhhhhhhhhhhh', 1874, '8-2,1-1,6-1', '', '2024-12-24 16:59:30', 'pay_PaztMcUx1MQxIz', '817def2d92c0b9bf633a169837166b1886e50b07ab509b21d88314eb3f6ce32b', ''),
(19, 'order_PazxG6T9KnFTvo', 'ggggggg', 'h@ww', 'gggggggj', 'ggggggggggggggggggggg', 1874, '8-2,1-1,6-1', '', '2024-12-24 17:03:22', 'pay_PazxRxzqjkWd40', '05be7157a10c6a3adcce341f0c7369d0fc0fe64b115e1b21363fb7ba911bae46', ''),
(20, 'order_Pb00bXdywDbv3c', 'gggggggg', 'gg@ww', '77777777', 'nnnnnnnnnnnnnnnnnnnnnnn', 1874, '8-2,1-1,6-1', '', '2024-12-24 17:06:28', 'pay_Pb00ivSsnZp7HM', '0a6c84893a78c38ea33a914bb99c385d548752f78e6606e6191af62c38472977', ''),
(21, 'order_Pb01RlB5gnh1YX', 'gggggggg', 'gg@ww', '77777777', 'nnnnnnnnnnnnnnnnnnnnnnn', 1874, '8-2,1-1,6-1', '', '2024-12-24 17:07:35', 'pay_Pb01tJSPrLvSaH', '754d31b694f3205a735131eafb32447f268b5cbfbb1c4b1e4fa2bba850439098', ''),
(22, 'order_Pb03ChLO0JZwKE', 'dddddddd', 'zzz@www', 'jjjjjjjjjj', 'hhhhhhhhhhhhkkbv', 1874, '8-2,1-1,6-1', '', '2024-12-24 17:08:56', 'pay_Pb03KJaEp6edZj', 'c1537e634e484925fab3422b534e45808d2f3b7281dd7f3617072bd06f9d6a6b', ''),
(23, 'order_Pb2r7Ag2NXeJYj', 'ssssss', 'ssss@ss.cc', '111111111', 'ddddddddddddddddddddd', 1198, '8-2', '', '2024-12-24 19:53:44', 'pay_Pb2rOTyCwX7xVM', '697bde8a7d26f881943f73a8c6a4c44787293f27d46947ca2a63fe242b27db1a', ''),
(24, 'order_Pb3Blq2mygQmeI', 'sdsdsd', 'sds@ss.kk', '44444444', 'ffffffffffffffffffffffffff', 1198, '8-2', '', '2024-12-24 20:13:08', 'pay_Pb3BtJibh9pGuN', 'b013ddd7cdacc413c154f76eb0b85a5506aaed2c21e22d186c87448d06fb6714', ''),
(25, 'order_Pb3HKdEs1a1i7p', 'ssssssss', 'sss@ww.kk', '444444444', 'ffffffffffffffffffffffff', 1198, '8-2', '', '2024-12-24 20:18:24', 'pay_Pb3HRtBPKqKQUD', '3ae14af02f597232d2cf4264cff003d907959263c1f3ebed8fee3559af542cf6', ''),
(26, 'order_Pb3J3OAD4e8oeX', 'ddddddd', 'ddd@ww.kk', '333333333', 'fedf efffffffffffffffffffffffffff', 1198, '8-2', '', '2024-12-24 20:20:01', 'pay_Pb3JAH0TKRA9YB', '12f509e08baa0508273f46d1e0b361cba0b3eec6caf567f9976bba28a9930ee4', ''),
(27, 'order_Pb3LwpAvu8Djy3', 'ddddddddd', 'ddd@ss', '333333333', 'fffff vvf ff ff ff', 1198, '8-2', '', '2024-12-24 20:22:48', 'pay_Pb3M6Hen0JXVO5', '2b010134456bf8b8e2c4b0269e482a3905d6d57426c5e32b4dbbde3cef3f9e18', ''),
(28, 'order_Pb3O8IWLS1yS4Y', 'sssssssssssss', 'sss@sss', '33333333', 'f vvvvvv fffffffff ', 1198, '8-2', '', '2024-12-24 20:24:51', 'pay_Pb3OGG9vy8XO5g', '4d143eb441f07744fa37b4e958719d7a2e1d9c2a887619e19ea7fe1503a664ad', ''),
(29, 'order_Pb3a3n76XvVFCs', 'sssss', 'fff@ss.ll', '3333333333', 'fff ff gggr rrr', 44, '5-1', '', '2024-12-24 20:36:07', 'pay_Pb3aAF2pxoBPGP', 'cf0217f66779fcf4891fc19512c3e15fd180af3b1dfa325990ff22d71f8a4803', ''),
(30, 'order_Pb3dVV9VJT3Omy', 'ggggg', 'ggg@dd.ll', '66666666', 'ggggggggggggggggg', 654, '1-1', '', '2024-12-24 20:39:37', 'pay_Pb3dZirYesHltZ', 'bcdbd02ba1e066a7cc7a2b62238ea1494b065dda4a9b97e1eb4d4e4f66c6b2cf', ''),
(31, 'order_Pb3eh3YHHdXIKc', 'ff gg jjjj', 'dddd@sss', '77777777', 'ggggggggggggggggg', 654, '1-1', '', '2024-12-24 20:40:29', 'pay_Pb3elkQpVt1ypN', '26ee6c92abf9cecff4767da52f837caa38ef20433dba75e7181818487e0b9a08', ''),
(32, 'order_Pb3kmBUEcXHoqc', 'ffffff', 'fff@www', '77777777', 'fff vv bb hh ujk', 654, '1-1', '', '2024-12-24 20:46:17', 'pay_Pb3ktW6NVhQmeG', 'aee888f95aaae12a9f224aea4bfd90e538f85aff15e16b78532803a870b966b5', ''),
(33, 'order_Pb3vtfOUnLOXBi', 'hhhh', 'gg@www', '9989888888', 'ggdhvgfffffddssx', 654, '1-1', '', '2024-12-24 20:56:47', 'pay_Pb3vzVsFaDoWfx', '47780eb7434f45ef2c0580bc89e17135fb30ff22e4562a6c54214e09f6136cdb', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-admin,2-student,3-office staff',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0-inactive,1-active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`, `status`) VALUES
(1, 1, 'learners', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
