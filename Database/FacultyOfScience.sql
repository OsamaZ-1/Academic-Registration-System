-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 12:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FacultyOfScience`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `CourseId` int(11) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  `CourseName` varchar(60) NOT NULL,
  `Credits` int(11) NOT NULL,
  `Major` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Optional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`CourseId`, `CourseCode`, `CourseName`, `Credits`, `Major`, `Year`, `Semester`, `Optional`) VALUES
(1, 'I1100', 'Introduction to Computer Science', 3, 1, 1, 1, 0),
(2, 'M1100', 'Algebra 1', 6, 1, 1, 1, 0),
(3, 'M1101', 'Analysis 1', 6, 1, 1, 1, 0),
(4, 'P1100', 'Mechanics', 6, 1, 1, 1, 0),
(5, 'P1101', 'Electricity and Magnetism', 6, 1, 1, 1, 0),
(6, 'S1101', 'Statistics', 3, 1, 1, 1, 0),
(7, 'I1101', 'Algorithm programming', 6, 1, 1, 2, 0),
(8, 'M1102', 'Algebra 2', 3, 1, 1, 2, 0),
(9, 'M1103', 'Algebra 3', 6, 1, 1, 2, 0),
(10, 'M1104', 'Analysis 2', 6, 1, 1, 2, 0),
(11, 'M1105', 'Analysis 3', 6, 1, 1, 2, 0),
(12, 'M1106', 'Analysis 4', 3, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Grades`
--

CREATE TABLE `Grades` (
  `StudentId` varchar(10) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Major` int(11) NOT NULL,
  `Grade` decimal(4,2) DEFAULT NULL,
  `EnrollmentDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Majors`
--

CREATE TABLE `Majors` (
  `Id` int(11) NOT NULL,
  `Major` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Majors`
--

INSERT INTO `Majors` (`Id`, `Major`) VALUES
(1, 'Computer Science'),
(2, 'Mathematics'),
(3, 'Physics'),
(4, 'Biology'),
(5, 'Chemistry'),
(6, 'BioChemistry'),
(7, 'Statistics'),
(8, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `Id` int(11) NOT NULL,
  `StudentId` varchar(10) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` char(60) NOT NULL,
  `Major` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `EnrollmentDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `UserId` varchar(10) DEFAULT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` char(60) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `UserId`, `Fname`, `Lname`, `Email`, `Password`, `Admin`) VALUES
(1, NULL, 'Admin', 'Admin', 'admin1_ad@gmail.com', 'admin@ad1', 1),
(2, NULL, 'Obaida', 'Ammar', 'obaidaammar99@gmail.com', 'obAmmar99', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`CourseId`),
  ADD KEY `Major` (`Major`);

--
-- Indexes for table `Grades`
--
ALTER TABLE `Grades`
  ADD PRIMARY KEY (`StudentId`),
  ADD KEY `CourseId` (`CourseId`,`Major`),
  ADD KEY `Major` (`Major`);

--
-- Indexes for table `Majors`
--
ALTER TABLE `Majors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`),
  ADD KEY `Major` (`Major`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Majors`
--
ALTER TABLE `Majors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`Major`) REFERENCES `Majors` (`Id`);

--
-- Constraints for table `Grades`
--
ALTER TABLE `Grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`StudentId`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`Major`) REFERENCES `Majors` (`Id`),
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`CourseId`) REFERENCES `Courses` (`CourseId`);

--
-- Constraints for table `Students`
--
ALTER TABLE `Students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Major`) REFERENCES `Majors` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
