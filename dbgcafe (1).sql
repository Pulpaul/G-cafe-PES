-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 10:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` varchar(5) NOT NULL,
  `marshall` varchar(100) NOT NULL,
  `cafename` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `eventdate` date NOT NULL,
  `time` time NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `upLn` varchar(100) NOT NULL,
  `upLt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `marshall_id` varchar(100) NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(100) NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `cafe_name` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `marshall_id`, `time_in`, `time_out`, `event_date`, `cafe_name`, `feedback`, `status`, `state`) VALUES
(3, '511', '01:00', '', '2018-12-12', 'sample', '', 'Incomplete', 'Seen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marshall`
--

CREATE TABLE `tbl_marshall` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marshall`
--

INSERT INTO `tbl_marshall` (`id`, `username`, `email`, `password`, `firstname`, `mname`, `lastname`, `location`, `number`) VALUES
(509, 'marshall', 'weare_e@yahoo.com', '701fb90716e10ecc7a43852e0eae27f1', 'aldrin', 'serpa', 'juan', 'caloocan', '21312321'),
(510, 'payat', 'weare_e@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 'danielpayat', 'polpol', 'laurena', 'Bagumong', '321321'),
(511, 'aldrin', 'serpa@gmail.com', 'aldrin', 'Aldrin', 'Dela', 'Serpa', 'silangangan', '09977265410'),
(513, 'hskjahdsakjdhsa', 'marshalllaurena@gmail.com', '8ed1d86e541cf5b1c7adb80e5ee2af87', 'marshalldaniel', 'marshallpl', 'marshalllauerana', 'ghgfchghj', '2147483647'),
(514, 'Japepe', 'jape@gmail.com', '0a283e48e15fedbef2e7ea38bb03f1cc', 'Jape', 'Cordita', 'Montano', 'sjakgkjsagd', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` int(20) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `username`, `email`, `address`, `number`, `user_type`, `password`) VALUES
(75, 'Aldrin', 'DelaCruz', 'SerpaJuan', 'manager', 'manager@gmail.com', 'caloocan city', 312421421, 'manager', '1d0258c2440a8d19e716292b231e3190'),
(76, 'jape', 'CORDITA', 'montano', 'japepe', 'asihdsah@yahoo.com', 'sladld;lsakd;lsadk', 3242342, 'manager', 'eda916e63474b17e39f3f74f8643c545'),
(77, 'JohnPaul', 'CorditA', 'Montano', 'Jape', 'johnpaaulcorditamontano99@gmail.com', 'sajdhakjsdh', 9628131, 'manager', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(80, 'aldrin', 'DelaCruz', 'SerpaJuan', 'aldrin', 'admin@gmail.com', '421412', 4941, 'admin', '3a681583681d775953796c4941887d6e'),
(81, 'managerandrei', 'managertogonon', 'managerdelaps', 'managerpaul', 'managerpaul@gmail.com', 'Caloocan CIty', 2147483647, 'manager', 'ca7beb8f996b0a4a30c68bfd409917e1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marshall`
--
ALTER TABLE `tbl_marshall`
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
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_marshall`
--
ALTER TABLE `tbl_marshall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
