-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 01:00 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter_test3_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(20) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_author`) VALUES
(1, 'Tom Jones', 'Henry Fielding'),
(2, 'Pride and Prejudice', 'Jane Austen'),
(3, 'David Copperfield', 'Charles Dickens'),
(4, 'Madame Bovary', 'Gustave Flaubert'),
(5, 'Wuthering Heights', 'Emily '),
(6, 'madolduwa', 'martin wickramasignhe'),
(7, 'Araliyamala', 'Somathilaka Maddumabandara');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE IF NOT EXISTS `borrowers` (
  `borrower_id` int(20) NOT NULL AUTO_INCREMENT,
  `borrower_name` varchar(100) NOT NULL,
  `borrower_contact` int(10) NOT NULL,
  PRIMARY KEY (`borrower_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`borrower_id`, `borrower_name`, `borrower_contact`) VALUES
(1, 'Saman Kumara', 712387654),
(2, 'Susith Darshana', 719876543),
(3, 'Pathum Jayamaha', 770987654),
(4, 'Wasantha Timira', 786754329);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing_detail`
--

CREATE TABLE IF NOT EXISTS `borrowing_detail` (
  `borrowing_id` int(20) NOT NULL AUTO_INCREMENT,
  `borrower_name` varchar(100) NOT NULL,
  `borrowed_book` varchar(100) NOT NULL,
  `borrowed_date` date NOT NULL,
  `lending_date` date NOT NULL,
  PRIMARY KEY (`borrowing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `borrowing_detail`
--

INSERT INTO `borrowing_detail` (`borrowing_id`, `borrower_name`, `borrowed_book`, `borrowed_date`, `lending_date`) VALUES
(1, 'Saman Kumara	', 'Tom Jones', '2018-03-01', '2018-03-15'),
(2, 'Susith Darshana', 'Pride and Prejudice', '2018-03-02', '2018-03-16'),
(3, 'Pathum Jayamaha', 'Madame Bovary', '2018-03-08', '2018-03-22'),
(4, 'dgs', 'zvsv', '0000-00-00', '0000-00-00'),
(5, 'Susith Darshana', 'Madame Bovary', '2018-03-08', '2018-03-22'),
(6, 'Pathum Jayamaha', 'wrwer', '2018-03-08', '2018-03-22'),
(7, 'Susith Darshana', 'madolduwa', '2018-03-08', '2018-03-22'),
(8, 'Wasantha Timira', 'Araliyamala', '2018-03-08', '2018-03-22');
