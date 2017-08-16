-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2017 at 05:26 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Department 1'),
(2, 'Department 2'),
(3, 'Department 3');

-- --------------------------------------------------------

--
-- Table structure for table `in_department`
--

CREATE TABLE `in_department` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_department`
--

INSERT INTO `in_department` (`id`, `person_id`, `department_name`) VALUES
(1, 1, 'Gryffindor'),
(2, 2, 'Slytherin'),
(3, 3, 'Ravenclaw'),
(4, 4, 'Gryffindor'),
(5, 5, 'Slytherin');

-- --------------------------------------------------------

--
-- Table structure for table `in_group`
--

CREATE TABLE `in_group` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_group`
--

INSERT INTO `in_group` (`id`, `person_id`, `group_name`) VALUES
(1, 1, 'Transfiguration'),
(2, 2, 'Potions'),
(3, 3, 'Charms'),
(4, 4, 'Gryffindor Quidditch'),
(5, 5, 'Inquisitorial Squad');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `office` varchar(50) NOT NULL,
  `mailbox` varchar(50) NOT NULL,
  `group_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `photo`, `title`, `email`, `phone`, `office`, `mailbox`, `group_id`) VALUES
(1, 'Minerva', 'McGonagall', '', 'Head of Gryffindor', 'catlady@hogwarts.edu', '123456789', 'Gryfindor Tower', 'Cat', '1'),
(2, 'Severus ', 'Snape', '', 'Head of Slytherin', 'lilylover@hogwarts.edu', '123456789', 'Slytherin Dungeon', 'Doe', '1'),
(3, 'Filius', 'Flitwick', '', 'Head of Ravenclaw', 'litleone@hogwarts.edu', '123456789', 'Ravenclaw Tower', 'non-corporeal', '1'),
(4, 'Harry', 'Potter', '', 'Null', 'chosenone@hogwarts.edu', '123456789', 'Gryffindor Commonroom', 'Stag', '2'),
(5, 'Draco', 'Malfoy', '', 'Null', 'pureblood@hogwarts.edu', '132456789', 'Slytherin Dungeon', 'Not Possible', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_department`
--
ALTER TABLE `in_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_group`
--
ALTER TABLE `in_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `in_department`
--
ALTER TABLE `in_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `in_group`
--
ALTER TABLE `in_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
