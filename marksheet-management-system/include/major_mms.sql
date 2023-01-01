-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 06:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `major_mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `mobile`, `creationDate`, `updationdate`) VALUES
(44, 'ram', '81dc9bdb52d04dc20036dbd8313ed055', 9754630296, '2021-02-19 12:36:43', '2021-02-19 12:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `classestbl`
--

CREATE TABLE `classestbl` (
  `id` int(11) NOT NULL,
  `className` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classestbl`
--

INSERT INTO `classestbl` (`id`, `className`, `year`, `creationDate`, `updationDate`) VALUES
(175, 'BCA', 'First year', '2021-02-13 09:38:53', NULL),
(177, 'BCA', 'Final year', '2021-02-15 08:28:53', NULL),
(178, 'BCA', 'Second year', '2021-02-17 11:23:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resultstbl`
--

CREATE TABLE `resultstbl` (
  `id` int(11) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `classId` int(11) DEFAULT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultstbl`
--

INSERT INTO `resultstbl` (`id`, `studentId`, `classId`, `subjectId`, `marks`, `postingDate`, `updationDate`) VALUES
(66, 41, 175, 35, 53, '2021-02-13 12:35:01', NULL),
(68, 46, 177, 37, 90, '2021-02-17 11:52:37', NULL),
(69, 46, 177, 38, 89, '2021-02-17 11:52:37', NULL),
(70, 46, 177, 39, 91, '2021-02-17 11:52:37', NULL),
(71, 46, 177, 40, 95, '2021-02-17 11:52:37', NULL),
(72, 46, 177, 41, 89, '2021-02-17 11:52:37', NULL),
(73, 47, 177, 37, 99, '2021-02-17 12:10:11', NULL),
(74, 47, 177, 38, 89, '2021-02-17 12:10:11', NULL),
(75, 47, 177, 39, 88, '2021-02-17 12:10:11', NULL),
(76, 47, 177, 40, 95, '2021-02-17 12:10:12', NULL),
(77, 47, 177, 41, 91, '2021-02-17 12:10:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentstbl`
--

CREATE TABLE `studentstbl` (
  `studentId` int(11) NOT NULL,
  `studentName` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `rollNo` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `emailId` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `dob` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `classId` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentstbl`
--

INSERT INTO `studentstbl` (`studentId`, `studentName`, `rollNo`, `emailId`, `gender`, `dob`, `fatherName`, `motherName`, `village`, `classId`, `imagename`, `regDate`, `updationDate`) VALUES
(41, 'Anuj', '1000', '', 'Male', '2000-01-01', '', '', '', 175, 'IMG_20181225_082752.jpg', '2021-02-13 12:19:05', '2021-02-14 12:43:07'),
(43, 'Raja', '1002', 'raja@gmail.com', 'Male', '2000-02-11', '', '', '', 175, 'user.png', '2021-02-16 00:32:06', NULL),
(45, 'Ravi', '1003', 'ravi@gmail.com', 'Male', '2000-11-11', 'kamlesh', 'Tara', 'Sandalpur', 177, 'book.jpg', '2021-02-16 18:08:25', NULL),
(46, 'Ramkrishna Kushwah', '1005', 'ram@gmail.com', 'Male', '1998-05-10', 'Karansingh Kushwah', 'Balkumari Kushwah', 'Khategaon', 177, 'ram.jpeg', '2021-02-17 11:50:52', NULL),
(47, 'Shubham Kushwah', '1006', 'sk@gmail.com', 'Male', '2000-06-07', 'Leeladhar Kushwah', 'Vaijanti Kushwah', 'Kannod', 177, 'shubham_pic.jpeg', '2021-02-17 12:08:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjectstbl`
--

CREATE TABLE `subjectstbl` (
  `id` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `subjectCode` varchar(100) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectstbl`
--

INSERT INTO `subjectstbl` (`id`, `classId`, `subjectName`, `subjectCode`, `creationDate`, `updationDate`) VALUES
(35, 175, 'MIS ', 'mis1', '2021-02-13 09:39:26', NULL),
(36, 175, 'Operating System', 'OS10', '2021-02-16 16:47:27', NULL),
(37, 177, 'ASP.NET', 'ASP12', '2021-02-17 11:32:35', NULL),
(38, 177, 'Microprocessor and Interfacing', 'MPI11', '2021-02-17 11:39:00', NULL),
(39, 177, 'Programming with java', 'java13', '2021-02-17 11:40:47', NULL),
(40, 177, 'Artificial Intelligence', 'AI14', '2021-02-17 11:45:12', NULL),
(41, 177, 'CGM', 'CGM19', '2021-02-17 11:46:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classestbl`
--
ALTER TABLE `classestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultstbl`
--
ALTER TABLE `resultstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentstbl`
--
ALTER TABLE `studentstbl`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `subjectstbl`
--
ALTER TABLE `subjectstbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `classestbl`
--
ALTER TABLE `classestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `resultstbl`
--
ALTER TABLE `resultstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `studentstbl`
--
ALTER TABLE `studentstbl`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subjectstbl`
--
ALTER TABLE `subjectstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
