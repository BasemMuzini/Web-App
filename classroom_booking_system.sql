-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 03:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `ClassroomNameAndSymbol` varchar(20) NOT NULL,
  `BuildingNumber` int(11) NOT NULL,
  `ClassroomCapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`ClassroomNameAndSymbol`, `BuildingNumber`, `ClassroomCapacity`) VALUES
('G32', 105, 26),
('G33', 105, 28),
('G84', 105, 27),
('G85', 105, 17),
('G86', 105, 22),
('G87', 105, 25),
('G88', 105, 20),
('G89', 105, 21);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `ClassroomNameAndSymbol` varchar(20) NOT NULL,
  `BuildingNumber` int(11) NOT NULL,
  `EvaluationDate` date NOT NULL DEFAULT current_timestamp(),
  `EvaluationText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_mysql561_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`ClassroomNameAndSymbol`, `BuildingNumber`, `EvaluationDate`, `EvaluationText`) VALUES
('G32', 105, '0000-00-00', 'القاعة لا يوجد فيها بروجكتر'),
('G84', 105, '0000-00-00', 'القاعة لا يوجد فيها عدد كافي من الكراسي'),
('G86', 105, '0000-00-00', 'القاعة غير نظيفة'),
('G87', 105, '0000-00-00', 'لا يوجد سبورة في القاعة');

-- --------------------------------------------------------

--
-- Table structure for table `generalrequest`
--

CREATE TABLE `generalrequest` (
  `FullName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `BookingNumber` int(11) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `RequestsText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_mysql561_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalrequest`
--

INSERT INTO `generalrequest` (`FullName`, `BookingNumber`, `PhoneNumber`, `Email`, `RequestsText`) VALUES
('د. عمر', 3, 505398946, 'omar@gmail.com', 'طلب طاولة إضافية'),
('د. محمد', 4, 507874778, 'Dr.mohammad@gmail.co', 'طلب زيادة عدد الكراسي داخل القاعة\r\n'),
('د. خالد', 6, 507453625, 'Khalid83@gmail.com', 'طلب أوراق');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `JobNumber` int(11) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `JobNumber` int(11) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `JobNumber` int(11) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thebookings`
--

CREATE TABLE `thebookings` (
  `BookingNumber` int(11) NOT NULL,
  `BookingReason` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_mysql561_ci DEFAULT NULL,
  `BuildingNumber` int(11) DEFAULT NULL,
  `ClassroomNameAndSymbol` varchar(20) DEFAULT NULL,
  `BookingWeek` varchar(20) DEFAULT NULL,
  `BookingDay` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_mysql561_ci DEFAULT NULL,
  `BookingTime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thebookings`
--

INSERT INTO `thebookings` (`BookingNumber`, `BookingReason`, `BuildingNumber`, `ClassroomNameAndSymbol`, `BookingWeek`, `BookingDay`, `BookingTime`) VALUES
(2, 'ورشة عمل', 105, 'G84', 'Week 02', 'الثلاثاء', '11:30 - 12:45'),
(3, 'دورة علمية', 105, 'G88', 'Week 07', 'الأحد', '20:30 - 22:10'),
(4, 'محاضرة', 105, 'G85', 'Week 10', 'الثلاثاء', '09:00 - 10:15'),
(5, 'محاضرة', 105, 'G85', 'Week 03', 'الاثنين', '16:00 - 17:15'),
(6, 'دورة علمية', 105, 'G84', 'Week 03', 'الخميس', '14:30 - 15:45'),
(8, 'اجتماع', 105, 'G86', 'Week 08', 'الاثنين', '19:00 - 20:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`ClassroomNameAndSymbol`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`ClassroomNameAndSymbol`);

--
-- Indexes for table `generalrequest`
--
ALTER TABLE `generalrequest`
  ADD PRIMARY KEY (`BookingNumber`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `thebookings`
--
ALTER TABLE `thebookings`
  ADD PRIMARY KEY (`BookingNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thebookings`
--
ALTER TABLE `thebookings`
  MODIFY `BookingNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
