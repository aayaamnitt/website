-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2015 at 08:36 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aayaam`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `postid` int(10) NOT NULL,
  `commenttext` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='table for comments';

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `username`, `postid`, `commenttext`, `timestamp`) VALUES
(1, 'shweta', 'shweta@live.com', 0, '', '2015-07-18 16:49:59'),
(2, 'shweta', 'shweta@live.com', 0, 'really good pic\r\n', '2015-07-18 16:54:17'),
(3, 'shweta', 'shweta@live.com', 0, 'really good pic\r\n', '2015-07-18 17:25:16'),
(4, 'shweta', 'shweta@live.com', 14, 'mast pic be', '2015-07-18 17:28:15'),
(5, 'shweta', 'shweta@live.com', 14, 'mast pic be', '2015-07-18 17:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `posthead` text NOT NULL,
  `posttext` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `imageurl` text
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='table for posts';

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `username`, `posthead`, `posttext`, `timestamp`, `verified`, `imageurl`) VALUES
(14, 'test1', 'test1@gmail.com', 'my head', '\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs\r\npost\r\nlosl\r\nksks\r\nssjs\r\nsjsjssjsjssjjssjs', '2015-06-29 11:12:24', 0, 'upload/img_2015-06-29_1435576344'),
(15, 'pradeep', 'pradeep@gmail.com', 'pradeep', 'post\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\npost\r\n', '2015-06-29 11:52:51', 0, 'upload/img_2015-06-29_1435578771'),
(16, 'pradeep', 'pradeep@gmail.com', 'haha', 'teting testing', '2015-06-29 11:55:45', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` int(10) NOT NULL COMMENT 'same as id in userlogin table',
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` bigint(10) NOT NULL,
  `current_city` text NOT NULL,
  `dob` date NOT NULL,
  `batch` int(11) NOT NULL,
  `dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userslogin`
--

CREATE TABLE IF NOT EXISTS `userslogin` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `emailverified` tinyint(1) NOT NULL DEFAULT '0',
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='table for login, email verification and member verificatio';

--
-- Dumping data for table `userslogin`
--

INSERT INTO `userslogin` (`id`, `name`, `username`, `password`, `emailverified`, `verified`) VALUES
(1, 'pradeepsng30@gmail.com', 'pradeepsng30@gmail.com', 'root2', 0, 0),
(2, 'hi', 'ji', 'i', 0, 0),
(3, 'hi', 'ji', 'i', 0, 0),
(4, 'test1', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(5, 'test1', 'test1@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 0, 0),
(6, 'pradeepsng30@gmail.com', 'pradeepsng30@gmail.com', 'root2', 0, 0),
(7, 'pradeep', 'p@gmail.com', 'febc8f8ac083f5fc27e032c81e7b536a', 0, 0),
(8, 'pradeep', 'p@gmail.com', 'febc8f8ac083f5fc27e032c81e7b536a', 0, 0),
(9, 'pradeep', 'pradeep@gmail.com', 'febc8f8ac083f5fc27e032c81e7b536a', 0, 0),
(10, 'shweta', 'shweta@live.com', '4207e1e6e3809688a8b9ed1b2c1b7faa', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userslogin`
--
ALTER TABLE `userslogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `userslogin`
--
ALTER TABLE `userslogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;