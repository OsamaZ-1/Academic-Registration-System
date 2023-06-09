-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2023 at 02:16 AM
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
  `Prerequisite` varchar(20) NOT NULL,
  `Major` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Optional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`CourseId`, `CourseCode`, `CourseName`, `Credits`, `Prerequisite`, `Major`, `Year`, `Semester`, `Optional`) VALUES
(1, 'I1100', 'Introduction to Computer Science', 3, '', 1, 1, 1, 0),
(2, 'M1100', 'Algebra 1', 6, '', 1, 1, 1, 0),
(3, 'M1101', 'Analysis 1', 6, '', 1, 1, 1, 0),
(4, 'P1100', 'Mechanics', 6, '', 1, 1, 1, 0),
(5, 'P1101', 'Electricity and Magnetism', 6, '', 1, 1, 1, 0),
(6, 'S1101', 'Statistics', 3, '', 1, 1, 1, 0),
(7, 'I1101', 'Algorithm programming', 6, '', 1, 1, 2, 0),
(8, 'M1102', 'Algebra 2', 3, '', 1, 1, 2, 0),
(9, 'M1103', 'Algebra 3', 6, '', 1, 1, 2, 0),
(10, 'M1104', 'Analysis 2', 6, '', 1, 1, 2, 0),
(11, 'M1105', 'Analysis 3', 6, '', 1, 1, 2, 0),
(12, 'M1106', 'Analysis 4', 3, '', 1, 1, 2, 0),
(13, 'M2250', 'Mathematics For CS', 3, 'M1100-M1102', 1, 2, 1, 0),
(14, 'S2250', 'Probability Calculation', 4, '', 1, 2, 1, 0),
(15, 'I2201', 'Client-side Web dev', 4, '', 1, 2, 1, 0),
(16, 'I2202', 'Computer Organization', 4, '', 1, 2, 1, 0),
(17, 'I2203', 'Operating System 1', 4, '', 1, 2, 1, 0),
(18, 'I2204', 'Imperative Programming', 5, 'I1101', 1, 2, 1, 0),
(19, 'I2205', 'Graph Theory', 3, '', 1, 2, 1, 0),
(20, 'M2251', 'Numerical Analysis', 3, '', 1, 2, 1, 1),
(21, 'I2231', 'Operational Research', 3, '', 1, 2, 1, 1),
(22, 'I2232', 'Functional Programming', 3, '', 1, 2, 1, 1),
(23, 'I2206', 'Data Structures', 5, 'I1101', 1, 2, 2, 0),
(24, 'I2207', 'Computer Architecture', 4, '', 1, 2, 2, 0),
(25, 'I2208', 'IT Networks', 4, '', 1, 2, 2, 0),
(26, 'I2209', 'Logical Programming', 4, '', 1, 2, 2, 0),
(27, 'I2210', 'Database 1', 5, '', 1, 2, 2, 0),
(28, 'I2211', 'Object Oriented Programming', 5, 'I1101', 1, 2, 2, 0),
(29, 'I2233', 'Infography', 3, '', 1, 2, 2, 1),
(30, 'I2234', 'Image Processing', 3, '', 1, 2, 2, 1),
(31, 'DRH300', 'Human Rights', 3, '', 1, 3, 1, 0),
(32, 'I3301', 'Software Engineering', 4, '', 1, 3, 1, 0),
(33, 'I3302', 'Server-side Web dev', 4, '', 1, 3, 1, 0),
(34, 'I3303', 'Operating System 2', 4, 'I2203', 1, 3, 1, 0),
(35, 'I3304', 'Administration & Network Security', 4, '', 1, 3, 1, 0),
(36, 'I3305', 'GUI & Application', 3, '', 1, 3, 1, 0),
(37, 'I3306', 'Database 2', 3, 'I2210', 1, 3, 1, 0),
(38, 'I3350', 'Mobile App Development', 5, '', 1, 3, 1, 1),
(39, 'I3351', 'Administration Systems', 5, 'I2203', 1, 3, 1, 1),
(40, 'L3300', 'Language', 3, '', 1, 3, 2, 0),
(41, 'I3307', 'Theory of Language', 4, '', 1, 3, 2, 0),
(42, 'I3308', 'Project', 4, '', 1, 3, 2, 0),
(43, 'I3330', 'Project Management', 3, '', 1, 3, 2, 1),
(44, 'I3331', 'Info & Society', 3, '', 1, 3, 2, 1),
(45, 'I3332', 'Next Generation Programming Language', 3, '', 1, 3, 2, 1),
(46, 'I3333', 'Image Synthesis', 3, '', 1, 3, 2, 1),
(47, 'I3340', 'Parallel Programming', 4, '', 1, 3, 2, 1),
(48, 'I3341', 'Advanced Algorithms', 4, '', 1, 3, 2, 1),
(49, 'I3342', 'Advanced Logic Ciruits', 3, '', 1, 3, 2, 1),
(50, 'I3343', 'Environment & Pollution', 3, '', 1, 3, 2, 1),
(51, 'I3344', 'Numerical Simulation and Modeling', 6, '', 1, 3, 2, 1),
(52, 'INFO400', 'Compiling', 5, '', 1, 4, 1, 0),
(53, 'INFO401', 'Software Engineering 2', 5, '', 1, 4, 1, 0),
(54, 'INFO402', 'Network Interconnection & Securit', 5, '', 1, 4, 1, 0),
(55, 'INFO403', 'Advanced Operating System', 5, '', 1, 4, 1, 0),
(56, 'INFO404', 'Advanced OOP Programing', 5, '', 1, 4, 1, 0),
(57, 'LANG400', 'Technics of expression', 5, '', 1, 4, 1, 0),
(58, 'INFO407', 'Artificial Intelligence', 5, '', 1, 4, 2, 0),
(59, 'INFO408', 'Programing of Distributed Applications', 5, '', 1, 4, 2, 0),
(60, 'INFO409', 'Advanced Databases', 5, '', 1, 4, 2, 0),
(61, 'INFO430', 'Multimedia', 5, '', 1, 4, 2, 0),
(62, 'INFO437', 'Intro to Data Warehouse and Data Mining', 5, '', 1, 4, 2, 0),
(63, 'INFO448', 'Cloud Computing', 5, '', 1, 4, 2, 0);

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

--
-- Dumping data for table `Grades`
--

INSERT INTO `Grades` (`StudentId`, `CourseId`, `Major`, `Grade`, `EnrollmentDate`) VALUES
('677833', 1, 1, '80.50', '2022-2023'),
('677833', 2, 1, '55.00', '2022-2023'),
('677833', 3, 1, '45.80', '2022-2023'),
('677833', 4, 1, '39.00', '2022-2023'),
('677833', 5, 1, '90.00', '2022-2023'),
('677833', 6, 1, '40.00', '2022-2023'),
('677833', 7, 1, '79.00', '2022-2023'),
('677833', 8, 1, '0.00', '2022-2023'),
('677833', 9, 1, '82.50', '2022-2023'),
('677833', 10, 1, '68.00', '2022-2023'),
('677833', 11, 1, '77.00', '2022-2023'),
('677833', 12, 1, '50.00', '2022-2023');

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

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`Id`, `StudentId`, `Fname`, `Lname`, `Email`, `Password`, `Major`, `Year`, `EnrollmentDate`) VALUES
(1, '677833', 'Obaida', 'Ammar', 'obaidaammar99@gmail.com', 'OA99', 1, 1, '2022-2023');

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
  ADD PRIMARY KEY (`StudentId`,`CourseId`),
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
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `Majors`
--
ALTER TABLE `Majors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
