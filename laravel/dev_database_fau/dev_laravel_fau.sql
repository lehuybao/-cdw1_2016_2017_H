-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 03:53 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_laravel_fau`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(251) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_img`) VALUES
(1, 'cmm.png');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `detail_id` int(11) NOT NULL,
  `detail_code` varchar(255) DEFAULT NULL,
  `detail_img` varchar(255) DEFAULT NULL,
  `detail_desription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`detail_id`, `detail_code`, `detail_img`, `detail_desription`) VALUES
(1, 'bapcun', 'baocun.png', 'baocun baocun baocun baocun baocun baocun ');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `event_news` varchar(255) DEFAULT NULL,
  `event_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_img`, `event_news`, `event_title`) VALUES
(1, 'g.jpg', 'qewqwqe', 'qwewqwqe');

-- --------------------------------------------------------

--
-- Table structure for table `introduces`
--

DROP TABLE IF EXISTS `introduces`;
CREATE TABLE `introduces` (
  `introduce_id` int(11) NOT NULL,
  `introduce_img` varchar(255) DEFAULT NULL,
  `introduce_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `introduces`
--

INSERT INTO `introduces` (`introduce_id`, `introduce_img`, `introduce_info`) VALUES
(1, NULL, 'fddds');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `list_img` varchar(255) DEFAULT NULL,
  `list_code` varchar(255) DEFAULT NULL,
  `list_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `list_img`, `list_code`, `list_info`) VALUES
(1, 'sada', 'asdsad', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `merits`
--

DROP TABLE IF EXISTS `merits`;
CREATE TABLE `merits` (
  `merit_id` int(11) NOT NULL,
  `merit_img` varchar(255) DEFAULT NULL,
  `merit_prize` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merits`
--

INSERT INTO `merits` (`merit_id`, `merit_img`, `merit_prize`) VALUES
(1, 'abc.png', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE `slideshows` (
  `slideshow_id` int(11) NOT NULL,
  `slideshow_img` varchar(255) DEFAULT NULL,
  `slideshow_title` varchar(255) DEFAULT NULL,
  `slideshow_code` varchar(255) DEFAULT NULL,
  `slideshow_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`slideshow_id`, `slideshow_img`, `slideshow_title`, `slideshow_code`, `slideshow_info`) VALUES
(1, 'abc.png', 'abcz', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', 'hsadkjhasdjhsadjsahdjashd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `introduces`
--
ALTER TABLE `introduces`
  ADD PRIMARY KEY (`introduce_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `merits`
--
ALTER TABLE `merits`
  ADD PRIMARY KEY (`merit_id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`slideshow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `introduces`
--
ALTER TABLE `introduces`
  MODIFY `introduce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merits`
--
ALTER TABLE `merits`
  MODIFY `merit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
