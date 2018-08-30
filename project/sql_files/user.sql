-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2016 at 05:15 AM
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `sfid` varchar(1000) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `sfid`) VALUES
(1, 'jagadeeshwar', 'reddy', 'jagadeeshwarr95@gmail.com', 'chintu', 'chintu', '13311A0598'),
(2, 'rajeshwar', 'reddy', 'rajeshwarreddy246@gmail.com', 'admin', 'admin', '13311B0595'),
(3, 'chanukya', 'naik ', 'bhukyachanukyanaik21@gmail', 'abc', 'abc', '13311A05A1'),
(4, 'charan', 'kottapalli', 'kottapallicharan@gmail.com', 'charan', '123', '13311A05B3'),
(5, 'vishnu', 'rao', 'vishnumechineni.kmit@gmail.com', 'vishnu rao', 'snistforum', '13311K0555'),
(6, 'srikar', 'dupati', 'dupatisrikar12@gmail.com', 'srikar', 'srikar', '13311A0595'),
(7, 'Ravi', 'Teja', 'raavipudiraviteja96@gmail.com', 'Ravi', 'ravi', '13311A0569'),
(8, 'Anusha', 'Anu', 'anusha.guguloth4@gmail.com', 'Anusha', 'sweetyanu', '13311A05FK'),
(9, 'Tejaswini ', 'Boppana ', 'bsr1966d@gmail.com', 'rahultejuboppana@gmail.com', 'Rahulteju23', '13311A04K9'),
(10, 'sangam', 'shayideep', 'sangamshayideep@gmail.com', 'shayideep', '123', '13311A05B4'),
(11, 'Vidya', 'Sagar', 'd.vidya381@gmail.com', 'vidya', 'vidya', '13311A05D6'),
(12, 'sampath', 'kumar', 'sampathvootkuri25@gmail.com', 'sampathkumar', 'vskvskvsk2525', '14311A0524'),
(29, 'Nihar', 'Tadichetty', 'tadichetty.nihar@gmail.com', 'tadichetty.nihar@gmail.com', 'password', '13311A05B2'),
(13, 'Badrinath', 'Reddy', 'desambadrinathreddy@gmail.com', 'Badri', 'nani123', '13311A05I0'),
(14, 'manaswitha', 'manu', 'manumanaswitha9849@gmail.com', 'manu', 'manaswitha', '14311A1299'),
(15, 'khan', 'khan', 'mdak471@gmail.com', 'khan', 'khan', '13311A0568'),
(16, 'sainath', 'oruganti', 'sainath.nani06@gmail.com', 'sainath', 'sainath', '14315A0533'),
(17, 'maneesh kumar', 'vuppugalla', 'vman9849@gmail.com', 'vman9849@gmail.com', 'satish98', '13311A1238'),
(18, 'Bhanu', 'Prakash', 'sunnybommarapu@gmail.com', 'Bhanu Prakash', '9700621914', '14315A0526'),
(19, 'sandeep reddy', 'peesarla', 'sandeep.peesarla08@gmail.com', 'sandeep.peesarla08', 'mylifemywish', '13311A05A3'),
(20, 'bhargavi', 'davuluri', 'bhargavismiley6@gmail.com', '13311A1933', 'bhagi143', '13311A1933'),
(21, 'vamshi', 'pallerla', 'vamshiii@outlook.com', 'vamshi', 'vamshi', '13311A05D1'),
(24, 'sagar', 'cherry', 'sagar2594@gmail.com', 'sagarcherry', 'sagar123', '14315A0531'),
(25, 'Vinesh ', 'Tatineni ', 'vinesh9876@gmail.com', 'Vinesh ', 'password', '13311A05G9'),
(26, 'lingam', 'chigullapally', 'chigullapallysailingam@gmail.com', 'lingam', '8374951100lingam', '13311A05F5'),
(27, 'Akshit ', 'Mandal ', 'akshitm1996@gmail.com', 'akshitmandal', 'akshit', '13311A05E0 '),
(22, 'rama', 'krishna', 'ramakrishnab.1508@gmail.com', 'ramakrishna', '20081995', '13311A05C4'),
(23, 'Apuroop', 'Reddy', 'apuroop1reddy@gmail.com', 'Apuroop', '123456', '13311A05E5'),
(28, 'dj', 'pt', 'dj.kiddybuddy@gmail.com', 'djpt', 'mankala', '13311A05B1'),
(30, 'tarun', 'abhinav', 'tarungvv96@gmail.com', 'tarun abhinav', 'tarun123', '13311A05F2'),
(73, 'Sandeep', 'Reddy', 'sandeepreddy0242@gmail.com', 'sandeepreeddy', 'sandeepreddy', '13311A05H2'),
(74, 'godasree', 'mamilla', 'mgodasree@gmail.com', 'mgodasree', 'Ganeshji3', '13311A05B0'),
(76, 'prathibha', 'maloth', 'prathiprathi.332@gmail.com', 'prathibha', 'saianna', '13311A05D3'),
(77, 'pramada', 'nadgouni', 'n.pramadareddy@gmail.com', '13311A0419', '13311a0419', '13311A0419'),
(78, 'mahipal', 'reddy', 'bmahipalreddy777@gmail.com', 'mahipalreddy', '9490073662', '13311A05E6'),
(79, 'chandana', 'nishankara', 'nishankarachandana@gmail.com', 'chandana', 'wtf12345!"Â£$%', '13311A1216'),
(80, 'Murlidhar', 'Sarda', 'murlidhar.sarda@gmail.com', 'Murlidhar Sarda', 'sreenidhi.edu.in', '13311A0544'),
(81, 'Kalyani ', 'Krishna ', 'Kalyanikushi22@gmail.com', 'Kalyani ', 'opositive', '13311A05F4'),
(82, 'nikhil', 'muppidi', 'sainikhil190@gmail.com', 'nikhilmuppidi', 'nikhil07', '13311A05C3'),
(83, 'madan', 'bachu', 'saimadhan4742@gmail.com', 'madanbachu', 'madanbachu@1', '12311A0379'),
(84, 'suman', 'vasa', 'suman.vasa@gmail.com', 'suman', 'alimunir', '13311A1276'),
(85, 'harsha', 'chilu', 'harsa@gmail.com', 'harsh', 'kcuf', '13311B1299'),
(86, 'Samba', 'Shiva', 'sambashiva.t786@gmail.com', 'Samba', 'samba', '12311A05B1'),
(87, 'shiva', 'jyothi', 'rega.shivajyothi@gmail.com', 'shiva jyothi', '2702jyothi', '13311A1205'),
(88, 'Saketh ', 'Vns', 'vsaketh72@gmail.com', 'Saketh', '14041997898499978601', '14311A0403'),
(89, 'Shyam', 'Mohan', 'mohan.shyam619@gmail.com', 'Shyam619', 'shyam1435', '13311A03E1'),
(90, 'naresh', 'nani', 'badavathnaresh3@gmail.com', 'Nani', 'nanisiri', '14315A0528'),
(91, 'Varsha', 'Varshini', 'mvarsha2406@gmail.com', 'Varsha Varshini', '20111424MV!', '13311A05B5'),
(92, 'amarendar', 'posanpally', 'amarendraluck160@gmail.com', 'amarendar', 'amar0509', '13311A05C6'),
(93, 'Divya', 'Gaikwad', 'divyagaikwad755@gmail.com', 'Divya Gaikwad', 'divyalekha', '13311A05C2'),
(94, 'Ajit', 'Pattepu', 'pattepu_ajit@yahoo.in', 'Pattepu.ajit@gmail.com', '8142576338', '13311A05E2'),
(95, 'Ashraf', 'Mohammed', 'mohammedashrafyou@gmail.com', 'Ashraf', '213ammi201', '12311A0213'),
(96, 'Fff', 'Et huh', 'vvvv@gmaol.cj', 'Sfv', 'vbb', '13311a9'),
(97, 'E Mohankrishna', 'Reddy', 'mohankrishnar129@gmail.com', 'Mohankrishna', 'qpalzm', '13311A05I2'),
(98, 'Sahaja', 'G', 'sahajag@yahoo.com', 'sahaja', 'sahaja', '13311A0534'),
(99, 'mohana', 'samala', 'samalamohanakrishna@gmail.com', 'mohanasamala', '9848592033', '14315A0525'),
(100, 'Aruna', 'Eslampure', 'arunadigu@gmail.com', 'Aruna', 'appy', '13311A05C7'),
(101, 'Divya', 'Madani', 'divyamadani5@gmail.com', '13311A05A9', 'sairam', '13311A05A9'),
(102, 'krishnaveni', 'thota', 'krishnavent9@gmail.com', 'krishnaveni', 'rikky4567', '13311A05A2'),
(103, 'uday', 'kiran', 'udaykiran281@gmail.com', 'udaykiran', 'uday', '14315A0536'),
(104, 'swapna', 'borra', 'swapna.borra@gmail.com', 'swapna', 'snistforumnotes', '14311E0253'),
(105, 'charan', 'kottapalli', 'kottapallicharan@rediffmail.com', 'a31234569', '12456asdfg', '131Aswssss'),
(106, 'sowmya', 'kothapalli', 'sowmyakothapalli698@gmail.com', 'sowmya', 'Sowmya@123', '13311A0501');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `sfid` (`sfid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
