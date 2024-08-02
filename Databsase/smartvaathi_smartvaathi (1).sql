-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2024 at 12:41 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RaagamaInstitute_RaagamaInstitute`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(1500) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(2, 'dimantha', 'walallawitad@gmail.com', 'dimantha123'),
(3, 'admin', 'RaagamaInstituteadmin@gmail.com', 'RaagamaInstitute@admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(9, 'Algorithm'),
(7, 'Machine Laring'),
(6, 'Python'),
(5, 'Web Designing'),
(10, 'Wordpress'),
(4, 'WordPress Design');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `instructor_name` varchar(50) NOT NULL,
  `instructor_email` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `s_description` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `category` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `language` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `imagePath` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `status`, `instructor_id`, `instructor_name`, `instructor_email`, `course_title`, `s_description`, `description`, `category`, `level`, `language`, `price`, `keywords`, `imagePath`) VALUES
(3, 'Pending', 57, 'Dimantha', 'walallawitafdfdt@gmail.com', 'Wordpress', '“At its core, WordPress is the simplest, most popular way to create your own website or blog. In fact, WordPress powers over 42.7% of all the websites on the Internet. Yes – more than one in four websites that you visit are likely powered by WordPress. On a slightly more technical level, WordPress is an open-source content management system licensed under GPLv2, which means that anyone can use or modify the WordPress software for free. A content management system is basically a tool that makes i', '', 0, 'Development', 'English', 5000, 'wordpress, webdisign', '../course/3.png'),
(4, 'Pending', 57, 'Dimantha', 'walallawitafdfdt@gmail.com', 'Python', '“Python is an interpreted, object-oriented, high-level programming language with dynamic semantics. Its high-level built-in data structures, combined with dynamic typing and dynamic binding, make it very attractive for Rapid Application Development, as well as for use as a scripting or glue language to connect existing components together.” \\r\\n', '', 0, '1', 'English', 5000, 'python, Machine Learning', '../course/30490291888.png');

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE `Instructors` (
  `id` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Address2` varchar(500) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `ZipCode` int(11) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `imagePath` varchar(5000) NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `EducationL` varchar(50) NOT NULL,
  `DegreeP` varchar(50) NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `ExperienceLevel` varchar(50) NOT NULL,
  `pdfPath` varchar(800) DEFAULT NULL,
  `verification` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`id`, `Status`, `FirstName`, `LastName`, `Address`, `Address2`, `Country`, `City`, `ZipCode`, `Phone`, `imagePath`, `Email`, `Password`, `EducationL`, `DegreeP`, `Experience`, `ExperienceLevel`, `pdfPath`, `verification`) VALUES
(48, 'Pending', 'Amara', 'weerakone', 'colombo 7', '1st lane,', 'Sri Lanka', 'Colombo', 20555, '715896325', '../uploads/image(2).png', 'dimntha@gmail.com', '$2y$10$3I9fG4Y/pW1hAdkPuQlPZe4', 'bachelors', 'IT', '>1', 'Advanced', '', NULL),
(49, 'Approved', 'Deruwan', 'lakmal', 'Athurugirity', '1st lane,', 'Sri Lanka', 'Colombo', 20555, '0714589632', '../uploads/25915852483.png', 'deruwan@gmail.com', '$2y$10$A4wPBfSQjc/6RGyA33G.iet', 'bachelors', 'Commerce', '>1', 'Advanced', '../resume/msa contents-2.pdf', NULL),
(50, 'Approved', 'Sasanthi', 'rajapaksha', 'colombo', 'Kollupitiya', 'Sri Lanka', 'Colombo', 21245, '0714485963', '../uploads/95275283837.png', 'sasanthi@gmail.com', '$2y$10$4KjI1tzZBg0Wxdgv3z4Nc.G', 'Diploma', 'IT', '5<', 'Postgraduates', '../resume/Configuration Management Plan.pdf', NULL),
(53, 'Approved', 'Dimantha', 'Thihara', 'Kandy', 'Katugasthota', 'Sri Lanka', 'Kandy', 20120, '0714485969', '../uploads/33967731591.png', 'walallawitad@gmail.com', '$2y$10$cXQb8u.Gw7HUVJdO00rRvut', 'bachelors', 'IT', '5<', 'Advanced', '../resume/ICT_Sylabus.pdf', '085052'),
(54, 'Blocked', 'Deruwan', 'Chalithanga', '115/5 Rukmale', 'pannipitiya', 'Sri Lanka', 'Colombo', 10280, '0779138787', '../uploads/1Deruwan profile (1).jpg', 'dderuwan1000@gmail.com', '$2y$10$KhRu6kkDxZ/qL5XFkuJzcOn6JAisGWhV5awhCL6MJowiXe6zrScHu', 'masters', 'BEng(Computer Science)', '>1', 'Undergraduates', '../resume/Deruwan Resume new.pdf', '586436'),
(55, 'Pending', 'Deruwan', 'Chalithanga', '115/5 Rukmale', 'pannipitiya', 'Sri Lanka', 'Colombo', 10280, '0779138787', '', 'deruwan1000@gmail.com', '$2y$10$1e.PkiBZ7MchCQAgbcp9puREUlVRBmLI.qkAuAIpa63hYkZ0iCVAm', 'bachelors', 'BSc(Computer Science)', '>1', 'Undergraduates', '../resume/Deruwan Resume new.pdf', '569640'),
(56, 'Approved', 'Namal', 'Rajapaksha', 'Madamulana, Rd, Angoda', '69', 'Sri Lanka', 'Colombo', 9669, '077114545', '', 'rashmiswa09@gmail.com', '$2y$10$2W7QUNQZJv6VCMoYzTOBgecwt.0veJoYjElo.X4WaDGyLw/uw2Yv.', 'bachelors', 'Software Enginnering', '>1', 'Ordinary', '../resume/english-2024-1-.pdf', '964696'),
(57, 'Pending', 'Nimal', 'Lasnsa', '15/5 Kottawa , Pannipitiya', '12', 'india', 'Chennai', 1542, '121451000', '', 'jddcstore@gmail.com', '$2y$10$nBziCFc/LvIi3A8ZL9GwiuBaIAPhnT3aw39MiyhJe/Fpbl.0w5SYS', 'bachelors', 'Software Enginnering', '>1', 'Ordinary', '../resume/Gazette - 2024-03-01 S - www.gazette.lk.pdf', '557532'),
(58, 'Pending', 'sasini', 'charika', 'colombo', 'kandy', 'srilanka', 'Thalawathugoda ', 150, '265488877', '', 'sasini09@gmail.com', '$2y$10$/c9/9WddxPQq1pa41Mn6Kuv/G2zz.uKV4PSk6lcSss4KvnJYnJMgS', 'bachelors', 'abc', '>1', 'Undergraduates', '../resume/Smart Vaathi-time frame.pdf', '660802');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'Hindi'),
(2, 'Sinhala'),
(3, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `courseID` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `InstructorName` varchar(100) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `lesson_duration` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `s_description` longtext NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `sectionID`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, `lesson_name`, `type`, `lesson_duration`, `start_date`, `end_date`, `s_description`, `description`) VALUES
(4, 0, 'Week 01', 1, 'Wordpress', 'Dimantha', 57, 'Wordpress Installation', 'Text Lesson', 'Wordpress Installation', '0000-00-00', '0000-00-00', 'Wordpress Installation', 'Wordpress Installation'),
(5, 0, 'Week 01', 1, 'Wordpress', 'Dimantha', 57, 'Wordpress Login Details', 'Text Lesson', 'Wordpress Login Details', '0000-00-00', '0000-00-00', 'Wordpress Login Details', 'Wordpress Login Details'),
(6, 0, 'Week 02', 1, 'Wordpress', 'Dimantha', 57, 'Wordpress Login Details', 'Text Lesson', 'Wordpress Login Details', '0000-00-00', '0000-00-00', 'Wordpress Login Details', 'Wordpress Login Details'),
(7, 0, 'Week 04', 1, 'Wordpress', 'Dimantha', 57, 'Python ', 'Text Lesson', 'Python ', '0000-00-00', '0000-00-00', 'Python ', 'Python ');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `courseID` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `InstructorName` varchar(100) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, `date`) VALUES
(1, 'Week 01', 1, 'Wordpress', 'Dimantha', 57, '2024-03-22 06:24:21'),
(2, 'Week 02', 1, 'Wordpress', 'Dimantha', 57, '2024-03-22 06:59:28'),
(3, 'Week 03 - Assignment', 1, 'Wordpress', 'Dimantha', 57, '2024-03-22 07:31:34'),
(4, 'Week 04', 1, 'Wordpress', 'Dimantha', 57, '2024-03-22 10:27:25'),
(5, 'Week 01', 3, 'Wordpress', 'Dimantha', 57, '2024-03-25 08:12:27'),
(6, 'Week 01', 4, 'Python', 'Dimantha', 57, '2024-03-25 08:12:58'),
(7, 'Installation', 3, 'Wordpress', 'Dimantha', 57, '2024-03-25 08:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `Pphone` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `education` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `status`, `firstName`, `lastName`, `email`, `password`, `Gender`, `Pname`, `Pphone`, `address`, `country`, `city`, `zipcode`, `phone`, `education`) VALUES
(1, 'Active', 'Dimantha', 'dimantha', 'walallawitat@gmail.com', '$2y$10$egj1mtH4qpvby', 'Male', 'cdsc', 'dsac', 'kandy', 'Sri Lanka', 'Kandy', '20120', '714485963', '12'),
(2, 'Active', 'Kamals', 'pereraa', 'kamalperera@gmail.com', '$2y$10$u/w4vCxEYfYj5', 'Male', 'cdsc', 'dsac', 'colombo', 'Sri Lanka', 'Kandy', '2565', '715896358', '12'),
(3, 'Active', 'rashmi', 'sewwandi', 'rashmiswa09@gmail.com', '$2y$10$XMYYXt1v27yl8', 'Female', 'Mrs. Inoka', '0712442046', '262/Hokandara road,thalawathugoda ', 'srilanka', 'Thalawathugoda ', '123', '768622299', 'SITC Campus');

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `id` int(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
