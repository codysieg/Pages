-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2017 at 08:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pages`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `aid` varchar(20) NOT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`aid`, `firstName`, `lastName`, `email`, `userName`, `pass`) VALUES
('1', 'Cody', 'Siegmann', 'cs@abc.com', 'codysieg', 'pass'),
('10', 'James', 'Yu', 'jyu@gmail.com', 'JamesYu', 'pass'),
('11', 'bob', 'joe', 'bjoe@gmail.com', 'bjoe', 'pass'),
('12', 'bob', 'joe', 'bjoe@gmail.com', 'bjoe', 'pass'),
('13', 'Arvind', 'Dhindsa', 'arvind.dhindsa1@gmai', 'Arvind', ''),
('2', 'Mike', 'Vasko', 'mv@abc.com', 'mikevasko', 'pass'),
('3', 'John', 'Doe', 'jdoe@gmail.com', 'jdoe', 'pass'),
('4', 'Jane', 'Doe', 'janedoe@abc.com', 'janedoe', '123pass'),
('5', 'Cody', 'Siegmann', 'codysieg2@gmail.com', 'cooody', 'pass'),
('6', 'Courtney', 'Wright', 'cwight@abc.com', 'soccerlover123horse', 'soccerlover123horse'),
('7', 'banana', 'boe', 'cvhsau', 'banana', 'pass'),
('8', 'Steven', 'Phillips', 'sphillips@abc.com', 'sphillips', 'pass'),
('9', 'Zack', 'Dupont', 'zdupont@abc.com', 'zdupont', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attID` int(11) NOT NULL,
  `attName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attID`, `attName`) VALUES
(1, 'title'),
(2, 'authorFirst'),
(3, 'authorLast'),
(8, 'pcity'),
(9, 'publisher'),
(10, 'ISBN'),
(11, 'genre'),
(12, 'pdate');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `authorFirst` varchar(20) DEFAULT NULL,
  `authorLast` varchar(20) DEFAULT NULL,
  `pcity` varchar(20) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `pdate` varchar(15) DEFAULT NULL,
  `genre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `title`, `authorFirst`, `authorLast`, `pcity`, `publisher`, `pdate`, `genre`) VALUES
('0026515628', 'Glencoe Health, A Guide to Wellness, Student Edition', 'Hill', 'McGraw', 'Atlanta', 'McGraw-Hill Education', '2005', 'Education'),
('0670032735', 'The Book on Bush: How George W. (Mis)leads America', 'Eric', 'Alterman', 'New York', 'The New Yorker', '2004', 'Politics'),
('0747532699', 'Harry Potter and the Philosopher\'s Stone', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1997', 'Fantasy'),
('0747538492', 'Harry Potter and the Chamber of Secrets', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1998', 'Fantasy'),
('0747542155', 'Harry Potter and the Prisoner of Azkaban', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1999', 'Fantasy'),
('0802042031', 'Concise Historical Atlas of Canada', 'William', 'Dean', 'Toronto', 'University of Toronto Press', '1998', 'History'),
('1292018194', 'Java: How to Program : Early Objects', 'Paul', 'Deitel', 'New York City', 'Pearson Education', '2014', 'Education'),
('9780007308187', 'Practical Fly Fishing', 'Larry', 'St John', 'New York', 'MacMillan Company', '1920', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `cid` int(11) NOT NULL,
  `ISBN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`cid`, `ISBN`) VALUES
(8, '0026515628'),
(7, '0670032735'),
(6, '0747532699'),
(5, '0747538492'),
(4, '0747542155'),
(3, '0802042031'),
(2, '1292018194');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
