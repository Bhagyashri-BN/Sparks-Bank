-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 06:40 PM
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
-- Database: `bankingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `UserID` int(10) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Acc_Number` int(20) NOT NULL,
  `IFSC` varchar(20) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`UserID`, `Name`, `Email`, `Acc_Number`, `IFSC`, `Balance`) VALUES
(106749, 'Suruchi', 'suruchi28@gmail.com', 26784519, 'AC52914831', 40450),
(138717, 'Himanshu', 'himanshu@gmail.com', 58613017, 'AC5581966D', 99300),
(674632, 'Ayush', 'ayush69@gmail.com', 58910248, 'AS9928170S', 172740),
(321745, 'Divij', 'divij189@gmail.com', 29104562, 'AS98503921', 65101),
(198604, 'Priyanshu', 'priyanshu@gmail.com', 29746210, 'AC20536915', 73320),
(291847, 'saumya', 'saumya@gmail.com', 8593010, 'AS7711023Q', 40370),
(166733, 'Devansh', 'devansh21@gmail.com', 44928811, 'AC9102847S', 76790),
(881255, 'Manaswi', 'manaswi@gmail.com', 49302281, 'AS55912040', 55060),
(339010, 'Kartik', 'kartik11@gmail.com', 49391120, 'AC9010225S', 57800),
(887912, 'Shreya', 'shreya91@gmail.com', 29108227, 'AS1902491F', 80370);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transac_id` int(10) NOT NULL,
  `s_name` varchar(15) NOT NULL,
  `s_acc_no` int(20) NOT NULL,
  `r_name` varchar(15) NOT NULL,
  `r_acc_no` int(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transac_id`, `s_name`, `s_acc_no`, `r_name`, `r_acc_no`, `amount`, `date_time`) VALUES
(1, 'Devansh', 44928811, 'Ayush', 58910248, 100, '2021-11-12 13:39:46'),
(2, 'Manaswi', 49302281, 'Himanshu', 58613017, 500, '2021-11-12 14:15:00'),
(3, 'Shreya', 29108227, 'saumya', 8593010, 2000, '2021-11-12 14:40:20'),
(4, 'Kartik', 49391120, 'Divij', 29104562, 5100, '2021-11-12 14:41:35'),
(5, 'Suruchi', 26784519, 'Kartik', 49391120, 800, '2021-11-12 15:13:06'),
(6, 'Manaswi', 49302281, 'Priyanshu', 29746210, 500, '2021-11-12 15:49:32'),
(7, 'Shreya', 29108227, 'Ayush', 58910248, 8000, '2021-11-12 15:50:12'),
(8, 'saumya', 8593010, 'Suruchi', 26784519, 450, '2021-11-12 17:34:26'),
(10, 'Himanshu', 58613017, 'Manaswi', 49302281, 700, '2021-11-12 17:37:00'),
(11, 'Ayush', 58910248, 'Manaswi', 49302281, 360, '2021-11-12 17:37:41'),
(12, 'saumya', 8593010, 'Priyanshu', 29746210, 280, '2021-11-12 17:40:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
