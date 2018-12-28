-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 07:00 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `FullName` text NOT NULL,
  `AdminEmail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `UserName`, `Password`, `FullName`, `AdminEmail`) VALUES
(1, 'admin', '123456', '', 'abdoo.osama2013@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `IdAuthor` int(11) NOT NULL,
  `AuthorName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`IdAuthor`, `AuthorName`) VALUES
(1, 'Abdallah'),
(3, 'mohamed'),
(4, 'Abdelrahman '),
(5, 'jouan'),
(6, 'aymen');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `BookName` text NOT NULL,
  `BookPrice` int(11) NOT NULL,
  `DatePublish` date NOT NULL,
  `BestOfCollection` text,
  `number_of_pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `ISBN`, `BookName`, `BookPrice`, `DatePublish`, `BestOfCollection`, `number_of_pages`) VALUES
(68, 321312, 'happiness', 2000, '2010-10-10', 'no', 200);

-- --------------------------------------------------------

--
-- Table structure for table `books_has_author`
--

CREATE TABLE `books_has_author` (
  `books_ID` int(11) NOT NULL,
  `author_IdAuthor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_has_author`
--

INSERT INTO `books_has_author` (`books_ID`, `author_IdAuthor`) VALUES
(68, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `IdCategory` int(11) NOT NULL,
  `CategoryName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`IdCategory`, `CategoryName`) VALUES
(1, 'action'),
(2, 'comedy'),
(3, 'actions'),
(4, 'new'),
(6, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `category_has_books`
--

CREATE TABLE `category_has_books` (
  `category_IdCategory` int(11) NOT NULL,
  `books_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_has_books`
--

INSERT INTO `category_has_books` (`category_IdCategory`, `books_ID`) VALUES
(6, 68);

-- --------------------------------------------------------

--
-- Table structure for table `edition`
--

CREATE TABLE `edition` (
  `IdEdition` int(11) NOT NULL,
  `EditionNumber` int(11) NOT NULL,
  `PrintDate` date NOT NULL,
  `books_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edition`
--

INSERT INTO `edition` (`IdEdition`, `EditionNumber`, `PrintDate`, `books_ID`) VALUES
(39, 5, '2011-11-11', 68);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `idformat` int(11) NOT NULL,
  `formatname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`idformat`, `formatname`) VALUES
(1, 'CD'),
(2, 'DVD'),
(3, 'E-Book');

-- --------------------------------------------------------

--
-- Table structure for table `format_has_books`
--

CREATE TABLE `format_has_books` (
  `format_idformat` int(11) NOT NULL,
  `books_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format_has_books`
--

INSERT INTO `format_has_books` (`format_idformat`, `books_ID`) VALUES
(1, 68),
(2, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`IdAuthor`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ISBN_UNIQUE` (`ISBN`);

--
-- Indexes for table `books_has_author`
--
ALTER TABLE `books_has_author`
  ADD PRIMARY KEY (`books_ID`,`author_IdAuthor`),
  ADD KEY `fk_books_has_author_author1_idx` (`author_IdAuthor`),
  ADD KEY `fk_books_has_author_books1_idx` (`books_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IdCategory`);

--
-- Indexes for table `category_has_books`
--
ALTER TABLE `category_has_books`
  ADD PRIMARY KEY (`category_IdCategory`,`books_ID`),
  ADD KEY `fk_category_has_books_books1_idx` (`books_ID`),
  ADD KEY `fk_category_has_books_category1_idx` (`category_IdCategory`);

--
-- Indexes for table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`IdEdition`),
  ADD KEY `fk_edition_books1_idx` (`books_ID`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`idformat`);

--
-- Indexes for table `format_has_books`
--
ALTER TABLE `format_has_books`
  ADD PRIMARY KEY (`format_idformat`,`books_ID`),
  ADD KEY `fk_format_has_books_books1_idx` (`books_ID`),
  ADD KEY `fk_format_has_books_format_idx` (`format_idformat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `IdAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `edition`
--
ALTER TABLE `edition`
  MODIFY `IdEdition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `idformat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_has_author`
--
ALTER TABLE `books_has_author`
  ADD CONSTRAINT `fk_books_has_author_author1` FOREIGN KEY (`author_IdAuthor`) REFERENCES `author` (`IdAuthor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_books_has_author_books1` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_has_books`
--
ALTER TABLE `category_has_books`
  ADD CONSTRAINT `fk_category_has_books_books1` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_has_books_category1` FOREIGN KEY (`category_IdCategory`) REFERENCES `category` (`IdCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `fk_edition_books1` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `format_has_books`
--
ALTER TABLE `format_has_books`
  ADD CONSTRAINT `fk_format_has_books_books1` FOREIGN KEY (`books_ID`) REFERENCES `books` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_format_has_books_format` FOREIGN KEY (`format_idformat`) REFERENCES `format` (`idformat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
