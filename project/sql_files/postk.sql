-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2016 at 05:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doubts`
--

-- --------------------------------------------------------

--
-- Table structure for table `postk`
--

CREATE TABLE IF NOT EXISTS `postk` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(25) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postk`
--

INSERT INTO `postk` (`id`, `body`, `date_added`, `added_by`, `category`) VALUES
(45, 'if u people want any notes,previous papers,regarding your subject doubts u can post here.', '2015-11-29', 'admin', 'CSE 1st year'),
(44, 'toc[notes,videos] ,operation research[notes]updated', '2015-11-29', 'admin', 'ECE 2nd Year'),
(49, 'hi hello eveyone', '2015-12-20', 'charan', 'MECH-1st year'),
(50, 'hello i want to know about the cse', '2015-12-22', 'charan', 'CSE-1st year'),
(51, 'hello charan', '2015-12-22', 'charan', 'EEE-2nd year'),
(57, 'hello jaggu..fuck you alll', '2015-12-24', 'charan', 'CSE-3rd year'),
(56, 'hi jagdeesh', '2015-12-23', 'charan', 'ECE-2nd year'),
(58, 'hey this is chanukya', '2015-12-24', 'charan', 'EEE-2nd year'),
(59, 'hello welcome to snistforum', '2015-12-26', 'charan', 'CSE-1st year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postk`
--
ALTER TABLE `postk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postk`
--
ALTER TABLE `postk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
