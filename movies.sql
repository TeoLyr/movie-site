-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 12:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actid` int(11) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `copies`
--

CREATE TABLE `copies` (
  `barcode` int(11) NOT NULL,
  `mid` int(11) DEFAULT NULL,
  `medium` varchar(10) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `did` int(11) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pyear` int(11) DEFAULT NULL,
  `production` varchar(3) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `mid` int(11) NOT NULL,
  `actid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movie_cat`
--

CREATE TABLE `movie_cat` (
  `mid` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `copies`
--
ALTER TABLE `copies`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `fk_mid` (`mid`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `fk_did` (`did`);

--
-- Indexes for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`mid`,`actid`),
  ADD KEY `fk_actid` (`actid`);

--
-- Indexes for table `movie_cat`
--
ALTER TABLE `movie_cat`
  ADD PRIMARY KEY (`mid`,`catid`),
  ADD KEY `fk_catid` (`catid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `copies`
--
ALTER TABLE `copies`
  ADD CONSTRAINT `fk_mid` FOREIGN KEY (`mid`) REFERENCES `movies` (`mid`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `fk_did` FOREIGN KEY (`did`) REFERENCES `directors` (`did`);

--
-- Constraints for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `fk1_mid` FOREIGN KEY (`mid`) REFERENCES `movies` (`mid`),
  ADD CONSTRAINT `fk_actid` FOREIGN KEY (`actid`) REFERENCES `actors` (`actid`);

--
-- Constraints for table `movie_cat`
--
ALTER TABLE `movie_cat`
  ADD CONSTRAINT `fk2_mid` FOREIGN KEY (`mid`) REFERENCES `movies` (`mid`),
  ADD CONSTRAINT `fk_catid` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
