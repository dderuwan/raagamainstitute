-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 09:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RaagamaInstitute`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_message`
--

CREATE TABLE `student_message` (
  `id` int(11) NOT NULL,
  `studentNo` int(11) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `instructuerEmail` varchar(100) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `startedTime` datetime NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_message`
--

INSERT INTO `student_message` (`id`, `studentNo`, `studentName`, `instructuerEmail`, `topic`, `message`, `startedTime`, `status`) VALUES
(17, 4, '', 'dderuwan1000@gmail.com', 'hello', 'hello', '0000-00-00 00:00:00', 'pending'),
(18, 4, '', 'dderuwan1000@gmail.com', 'hello', 'hello', '0000-00-00 00:00:00', 'pending'),
(19, 4, '', 'dderuwan1000@gmail.com', 'hello', 'helloba', '0000-00-00 00:00:00', 'pending'),
(20, 4, 'Gayan', 'dderuwan1000@gmail.com', 'hello', 'hello', '0000-00-00 00:00:00', 'pending'),
(21, 4, 'Gayan', 'dderuwan1000@gmail.com', 'asdsadasdasdas', 'dasdasdasdsadasdasdasdasdasd', '0000-00-00 00:00:00', 'pending'),
(22, 4, 'Gayan', 'dderuwan1000@gmail.com', 'hello new', 'hello new', '0000-00-00 00:00:00', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_message`
--
ALTER TABLE `student_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_message`
--
ALTER TABLE `student_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
