-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2024 at 01:26 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(2, 'dimantha', 'walallawitad@gmail.com', 'dimantha123');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instructor_id` int NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `course` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_id` (`instructor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `instructor_id`, `announcement`, `course`, `message`) VALUES
(5, 58, 'Class Start', 'PHP And Database Design', 'Attention students! Classes start tomorrow at 8:00 a.m. See you there!'),
(4, 58, 'Class Time CHanged', 'JavaScript Basic', 'Your class time changed. We\'ll let you know the date and the time.'),
(6, 58, 'Special Session for Advanced Js', 'JavaScript Basic', 'Discover the intricacies of advanced JavaScript in our upcoming session scheduled for tomorrow. Join us to deepen your understanding!');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(5, 'Web Designing'),
(4, 'WordPress Design'),
(6, 'Python'),
(7, 'Machine Laring'),
(10, 'Wordpress'),
(9, 'Algorithm'),
(11, 'documsccent'),
(12, 'Animation'),
(13, 'Hello\\');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instructor_id` int NOT NULL,
  `course_id` int NOT NULL,
  `grade` char(2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `instructor_id`, `course_id`, `grade`, `status`) VALUES
(1, 1, 1, 'A', 'Pass'),
(2, 1, 2, 'B', 'Fail'),
(3, 1, 3, 'A', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `instructor_id` int NOT NULL,
  `instructor_name` varchar(50) NOT NULL,
  `instructor_email` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `s_description` varchar(500) NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(1500) NOT NULL,
  `level` varchar(20) NOT NULL,
  `language` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `imagePath` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `status`, `instructor_id`, `instructor_name`, `instructor_email`, `course_title`, `s_description`, `description`, `category`, `level`, `language`, `price`, `keywords`, `imagePath`) VALUES
(6, 'Approved', 58, 'Dimantha', 'q@gmail.com', 'Python', 'fwefwf', '', '0', '1', 'English', 5000, 'python, Machine Learning', '../course/WhatsApp Image 2024-01-12 at 01.43.04.jpeg'),
(7, 'Approved', 58, 'Dimantha', 'q@gmail.com', 'Python', 'fwefwf', '', 'Python', '12', 'Sinhala', 5000, 'python, Machine Learning', '../course/WhatsApp Image 2024-01-12 at 01.43.04.jpeg'),
(8, 'Approved', 57, 'Dimantha', 'walallawitafdfdt@gmail.com', 'Animation Blender', 'fwefwf', '', 'Animation', '1', 'English', 5000, 'Blender, 3D', '../course/WhatsApp Image 2024-01-12 at 01.43.04.jpeg'),
(9, 'Approved', 2, 'Dimantha', 'walallawitafdfdt@gmail.com', 'Animation Blender', 'tey', '', 'Animation', '1', 'English', 5000, 'Blender, 3D', '../course/ecoResort packge1.jpg'),
(10, 'Approved', 53, 'Dimantha', 'walallawitad@gmail.com', 'Animation Blender', 'rger', '', 'Animation', 'Development', 'English', 5000, 'Blender, 3D', '../course/stock-vector--s-retro-vaporwave-aesthetics-digital-screen-user-interface-cute-old-computer-ui-elements-2128036841-removebg-preview.png'),
(11, 'Deactivate', 53, 'Dimantha', 'walallawitad@gmail.com', 'Animation Blender', 'adada', '', 'Algorithm', 'Development', 'Sinhala', 5000, 'Blender, 3D', '../course/awreteiahenrgopi.png'),
(12, 'Approved', 53, 'Dimantha', 'walallawitad@gmail.com', 'python', 'dwef', '', 'Python', '', 'Thelgu', 6000, 'Blender, 3D', '../course/stock-vector--s-retro-vaporwave-aesthetics-digital-screen-user-interface-cute-old-computer-ui-elements-2128036841-removebg-preview.png'),
(67, 'Approved', 58, 'Fanta', 'q@gmail.com', 'JAVA', 'Java Course', 'ashjdbjhbafddfv ', ' n', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submission_date`) VALUES
(4, 'Kottawa Gamage Gayan Sachintha', 'gayan.huslter@gmail.com', 'jk', '2024-04-17 12:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Status` varchar(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Address2` varchar(500) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `ZipCode` int NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `imagePath` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(130) NOT NULL,
  `EducationL` varchar(50) NOT NULL,
  `DegreeP` varchar(50) NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `ExperienceLevel` varchar(50) NOT NULL,
  `pdfPath` varchar(800) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `Status`, `FirstName`, `LastName`, `Address`, `Address2`, `Country`, `City`, `ZipCode`, `Phone`, `imagePath`, `Email`, `Password`, `EducationL`, `DegreeP`, `Experience`, `ExperienceLevel`, `pdfPath`) VALUES
(54, 'Approved', 'Thihara', 'Basnayake', 'Kandy', 'Katugasthota', 'Sri Lanka', 'Kandy', 21245, '0714485963', '../uploads/33967731591.png', 'walallawitat@gmail.com', '$2y$10$NdmMmKE7Bm09XLxp9SuWrue', 'bachelors', 'IT', '5<', 'Postgraduates', '../resume/Configuration Management Plan.pdf'),
(48, 'Blocked', 'Amara', 'weerakone', 'colombo 7', '1st lane,', 'Sri Lanka', 'Colombo', 20555, '715896325', '../uploads/image(2).png', 'dimntha@gmail.com', '$2y$10$3I9fG4Y/pW1hAdkPuQlPZe4', 'bachelors', 'IT', '>1', 'Advanced', ''),
(49, 'Pending', 'Deruwan', 'lakmal', 'Athurugirity', '1st lane,', 'Sri Lanka', 'Colombo', 20555, '0714589632', '../uploads/25915852483.png', 'deruwan@gmail.com', '$2y$10$A4wPBfSQjc/6RGyA33G.iet', 'bachelors', 'Commerce', '>1', 'Advanced', '../resume/msa contents-2.pdf'),
(53, 'Blocked', 'Dimantha', 'Thihara', 'Kandy', 'Katugasthota', 'Sri Lanka', 'Kandy', 20120, '0714485969', '../uploads/33967731591.png', 'walallawitad@gmail.com', '$2y$10$cXQb8u.Gw7HUVJdO00rRvut', 'bachelors', 'IT', '5<', 'Advanced', '../resume/ICT_Sylabus.pdf'),
(55, 'Approved', 'Kamals', 'pereraa', 'colombo', 'Kandy', 'Sri Lanka', 'Kandy', 21245, '0714485969', '../uploads/image(2).png', 'kamalperera@gmail.com', '$2y$10$DbsBXZjCtKvyHPypFabww.9', 'bachelors', 'tyh', '>1', 'Advanced', '../resume/Configuration Management Plan.pdf'),
(57, 'Approved', 'Dimantha', 'dimantha', 'kandy', 'kskks', 'Sri Lanka', 'Kandy', 20120, '0714485969', '', 'walallawitafdfdt@gmail.com', '$2y$10$FLHqvFV8RrDljE.VGf8CtOY', 'Diploma', 'IT', '>1', 'Undergraduates', '../resume/Configuration Management Plan.pdf'),
(56, 'Approved', 'Vikas', 'aaaaa', 'India', 'hhh', 'India', 'Kandy', 20120, '0714485969', '../uploads/image(2).png', 'test@gmail.com', '$2y$10$pcR2/4n8iWwTvs57r8cTSeG', 'masters', 'IT', '>1', 'Advanced', '../resume/Configuration Management Plan.pdf'),
(45, 'Blocked', 'Gayan', 'Sachintha', 'Galle', 'Galle', 'Sri Lanka', 'Galle', 4858, '3748924872', '', 'g@gmail.com', '1111', 'fdf', 'ddf', 'sdsf', 'sff', '../resume/Configuration Management Plan.pdf\n'),
(58, 'Approved', 'Fanta', 'boy', 'Hello', 'Galle', 'Sri Lanka', 'Galle', 34, '763616537', '', 'q@gmail.com', '$2y$10$vHda2Cwj1GbnrEH/E90TFuR', 'masters', 'gyfdhv', 'none', 'Postgraduates', '../resume/Session two 2024.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'Hindi'),
(2, 'Sinhala'),
(3, 'English'),
(4, 'Tamil'),
(5, 'Thelgu');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sectionID` int NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `courseID` int NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `InstructorName` varchar(100) NOT NULL,
  `InstructorID` int NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sourse` varchar(50) NOT NULL,
  `youtubeLink` varchar(1000) NOT NULL,
  `externalLink` varchar(1000) NOT NULL,
  `video` varchar(1000) NOT NULL,
  `cover` varchar(1000) NOT NULL,
  `lesson_duration` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `s_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `sectionID`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, `lesson_name`, `type`, `sourse`, `youtubeLink`, `externalLink`, `video`, `cover`, `lesson_duration`, `start_date`, `end_date`, `s_description`, `description`) VALUES
(284, 0, 'Week 01', 10, 'Animation Blender', 'Dimantha', 53, 'Animatiom', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-12', '2024-04-18', 'fwef', ''),
(283, 0, 'Week 01', 9, 'Animation Blender', 'Dimantha', 2, 'Animatiom', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-12', '2024-04-19', 'dfewqd', ''),
(282, 0, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, 'Wordpress Login Details', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-04', '2024-04-25', 'asc', ''),
(281, 0, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, 'Python ', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-17', '2024-04-17', 'rt', ''),
(280, 0, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, 'Python ', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-17', '2024-04-17', 'rt', ''),
(279, 0, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, 'Advanced Learning ', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-17', '2024-04-24', 'edfwefwe', ''),
(278, 0, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, 'Advanced Learning ', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-17', '2024-04-24', 'edfwefwe', ''),
(277, 0, 'Week 01', 8, 'Animation Blender', 'Dimantha', 57, 'Wordpress Installation', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-11', '2024-04-17', 'rgeger', ''),
(276, 0, 'Week 01', 8, 'Animation Blender', 'Dimantha', 57, 'Python ', 'Text Lesson', '', '', '', '', '', 'Python ', '0000-00-00', '0000-00-00', 'Python ', 'Python '),
(285, 0, 'Week 01', 10, 'Animation Blender', 'Dimantha', 53, 'Animatiom', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-19', '2024-05-01', 'ergv', ''),
(286, 20, 'Week 01', 10, 'Animation Blender', 'Dimantha', 53, 'myBad', 'Video Lesson', 'html', '', '', '../uploads/video/awreteiahenrgopi.png', '../uploads/cover/95275283837.png', '5 Month', '2024-04-12', '2024-04-24', 'ascac', ''),
(287, 0, 'Week 01', 12, 'python', 'Dimantha', 53, 'Animatiom', 'Text Lesson', '', '', '', '', '', '5 Month', '2024-04-11', '2024-04-12', 'efw', ''),
(288, 23, 'Week 01', 12, 'python', 'Dimantha', 53, 'myBad', 'Video Lesson', 'html', '', '', '../uploads/video/stock-vector--s-retro-vaporwave-aesthetics-digital-screen-user-interface-cute-old-computer-ui-elements-2128036841-removebg-preview.png', '../uploads/cover/stock-vector--s-retro-vaporwave-aesthetics-digital-screen-user-interface-cute-old-computer-ui-elements-2128036841-removebg-preview.png', '5 Month', '2024-04-05', '2024-04-13', 'qdqd', '');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sectionName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courseID` int NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `InstructorName` varchar(100) NOT NULL,
  `InstructorID` int NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sectionName`, `courseID`, `courseName`, `InstructorName`, `InstructorID`, `date`) VALUES
(18, 'Week 02', 8, 'Animation Blender', 'Dimantha', 57, '2024-04-02 06:22:53'),
(17, 'Week 01', 8, 'Animation Blender', 'Dimantha', 57, '2024-04-02 06:03:37'),
(19, 'Week 01', 9, 'Animation Blender', 'Dimantha', 2, '2024-04-03 05:42:52'),
(20, 'Week 01', 10, 'Animation Blender', 'Dimantha', 53, '2024-04-04 05:49:43'),
(21, 'Week 02', 10, 'Animation Blender', 'Dimantha', 53, '2024-04-04 09:32:30'),
(22, 'Week 03 - Assignment', 10, 'Animation Blender', 'Dimantha', 53, '2024-04-04 09:55:44'),
(23, 'Week 01', 12, 'python', 'Dimantha', 53, '2024-04-04 10:14:26'),
(24, 'Week 02', 12, 'python', 'Dimantha', 53, '2024-04-04 10:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(12) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `Pphone` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `education` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `status`, `firstName`, `lastName`, `email`, `password`, `Gender`, `Pname`, `Pphone`, `address`, `country`, `city`, `zipcode`, `phone`, `education`) VALUES
(1, 'Active', 'Dimantha', 'dimantha', 'walallawitat@gmail.com', '$2y$10$egj1mtH4qpvby', 'Male', 'cdsc', 'dsac', 'kandy', 'Sri Lanka', 'Kandy', '20120', '714485963', '12'),
(2, 'Active', 'Kamals', 'pereraa', 'kamalperera@gmail.com', '$2y$10$u/w4vCxEYfYj5', 'Male', 'cdsc', 'dsac', 'colombo', 'Sri Lanka', 'Kandy', '2565', '715896358', '12'),
(34, 'Active', 'Gayan', 'Sachintha', 's@gmail.com', '1111', 'Male', 'dffd', '4959394449', 'sndvjnx,asdj', 'Sri Lanka', 'Galle', '3843498', '8340293849', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

DROP TABLE IF EXISTS `work_experience`;
CREATE TABLE IF NOT EXISTS `work_experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instructor_id` int NOT NULL,
  `company` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `years` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_id` (`instructor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `instructor_id`, `company`, `job_title`, `years`) VALUES
(1, 58, 'j', 'n', 0),
(2, 58, 'hellow ', 'Conapny', 46),
(3, 58, 'ad', 'adsc', 0),
(13, 58, 'qqqqqqqqqq', 'qqqqqqqqqqqqqqq', 1111111111),
(12, 58, 'asd', 'asd', 432),
(11, 58, 'sadc', 'sd', 2147483647),
(14, 58, 'gfn', 'fgn', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
