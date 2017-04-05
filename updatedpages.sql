-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 01:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

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
('13', 'cody', 'siegmann', 'cs', 'codysieg', ''),
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
(21, 'ISBN'),
(22, 'title'),
(23, 'authorFirst'),
(24, 'authorLast'),
(25, 'pcity'),
(26, 'publisher'),
(27, 'pdate'),
(28, 'genre');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(30) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `authorFirst` varchar(20) NOT NULL,
  `authorLast` varchar(20) NOT NULL,
  `pcity` varchar(20) NOT NULL,
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
('0747532699', 'Harry Potter and the Philosopher''s Stone', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1997', 'Fantasy'),
('0747538492', 'Harry Potter and the Chamber of Secrets', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1998', 'Fantasy'),
('0747542155', 'Harry Potter and the Prisoner of Azkaban', 'Joanne', 'Rowling', 'Bloomsbury', 'Bloomsbury Publishing', '1999', 'Fantasy'),
('0802042031', 'Concise Historical Atlas of Canada', 'William', 'Dean', 'Toronto', 'University of Toronto Press', '1998', 'History'),
('1292018194', 'Java: How to Program : Early Objects', 'Paul', 'Deitel', 'New York City', 'Pearson Education', '2014', 'Education'),
('281927401', 'Seven Stones to Stand or Fall', 'Diana', 'Gabaldon', 'Toronto', 'Toronto Publishing', '2017', 'Fiction'),
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
(2, '1292018194'),
(1, '9780007308187');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `tid` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `firstAtt` varchar(20) NOT NULL,
  `firstStyle` varchar(10) NOT NULL,
  `firstSep` varchar(10) NOT NULL,
  `secondAtt` varchar(20) NOT NULL,
  `secondStyle` varchar(10) NOT NULL,
  `secondSep` varchar(10) NOT NULL,
  `thirdAtt` varchar(20) NOT NULL,
  `thirdStyle` varchar(10) NOT NULL,
  `thirdSep` varchar(10) NOT NULL,
  `fourthAtt` varchar(20) NOT NULL,
  `fourthStyle` varchar(10) NOT NULL,
  `fourthSep` varchar(10) NOT NULL,
  `fifthAtt` varchar(20) NOT NULL,
  `fifthStyle` varchar(10) NOT NULL,
  `fifthSep` varchar(10) NOT NULL,
  `sixthAtt` varchar(20) NOT NULL,
  `sixthStyle` varchar(10) NOT NULL,
  `sixthSep` varchar(10) NOT NULL,
  `seventhAtt` varchar(20) NOT NULL,
  `seventhStyle` varchar(10) NOT NULL,
  `seventhSep` varchar(10) NOT NULL,
  `eigthAtt` varchar(20) NOT NULL,
  `eigthStyle` varchar(10) NOT NULL,
  `eigthSep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`tid`, `tname`, `firstAtt`, `firstStyle`, `firstSep`, `secondAtt`, `secondStyle`, `secondSep`, `thirdAtt`, `thirdStyle`, `thirdSep`, `fourthAtt`, `fourthStyle`, `fourthSep`, `fifthAtt`, `fifthStyle`, `fifthSep`, `sixthAtt`, `sixthStyle`, `sixthSep`, `seventhAtt`, `seventhStyle`, `seventhSep`, `eigthAtt`, `eigthStyle`, `eigthSep`) VALUES
(2, 'MLA', 'authorLast', '', '', 'authorFirst', '', '', 'title', 'italics', '', 'publisher', '', '', 'pdate', '', '', '', '', '', '', '', '', '', '', '');

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
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
