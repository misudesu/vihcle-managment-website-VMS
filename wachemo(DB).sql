-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 10:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wachemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Sirname` varchar(30) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Phone`, `Password`, `Email`) VALUES
(1, 'Patrick', 'Mvuma', 'Mr', '265999107724', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `alart`
--

CREATE TABLE `alart` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `enddate` date NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `colore` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alart`
--

INSERT INTO `alart` (`id`, `title`, `start`, `enddate`, `Activity`, `colore`, `status`) VALUES
(2, '  meeting', '2021-11-30', '2021-12-01', 'desalegn', 'alert-danger', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` int(13) NOT NULL,
  `driverid` varchar(255) NOT NULL,
  `carid` varchar(255) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `startime` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `registrationdeadline` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `dphoto` varchar(255) NOT NULL,
  `dlicense` varchar(255) NOT NULL,
  `AccountStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `fullname`, `email`, `phonenumber`, `driverid`, `carid`, `startdate`, `startime`, `enddate`, `endtime`, `registrationdeadline`, `timezone`, `age`, `country`, `address`, `zone`, `city`, `dphoto`, `dlicense`, `AccountStatus`) VALUES
(9, 'misael dessalegn tumdado', 'misaeldessalegn@gmail.com', 8900999, 'driver1', 'jkh', '	06/12/2014', '	1:20', '	4/12/2014', '	1:45', '	3/12/2014', 'GMT-12:00 Etc/GMT-12', 16, 'ethiopia', '	ethiopia hossana ', 'hadiya', 'hossnna', 'download (9).jpg', 'driverlicensingtwo.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` decimal(10,0) DEFAULT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `Title`, `Name`, `Type`, `Size`, `content`) VALUES
(1, 'Staff', 'staff.csv', 'application/vnd.ms-excel', '76', '');

-- --------------------------------------------------------

--
-- Table structure for table `full`
--

CREATE TABLE `full` (
  `id` int(11) NOT NULL,
  `targas` varchar(255) DEFAULT NULL,
  `cartype` varchar(255) DEFAULT NULL,
  `newgej` varchar(255) DEFAULT NULL,
  `privwgej` varchar(255) DEFAULT NULL,
  `prviewfull` varchar(255) DEFAULT NULL,
  `resentfull` varchar(255) DEFAULT NULL,
  `musttravl` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `kernedag` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `full`
--

INSERT INTO `full` (`id`, `targas`, `cartype`, `newgej`, `privwgej`, `prviewfull`, `resentfull`, `musttravl`, `name`, `kernedag`, `file`, `date`) VALUES
(7, 'et123', 'bus', '123', '0', '0', '0', '0', 'misael', '0', '00', '0'),
(8, 'ET34543', 'bus', '56', '0', '0', '767.26', '1534.52,በቀጣይ መሄድ ያለበት 1534.52', 'doc', '2.39L ከመጠን በላይ ነዳጅ   ', '', '21-12-12'),
(9, 'ET34543', 'bus', '850', '56;', '767.26', '852.51', '1705.02,በቀጣይ መሄድ ያለበት NaN', 'misu', '0.47L ቀሪ ነዳጅ  ', '', '21-12-24'),
(10, 'ET34543', 'bus', '721', '850;', '852.51', '1449.28', '2898.56,በቀጣይ መሄድ ያለበት NaN', 'kitsi 19 ', '5.50L ከመጠን በላይ ነዳጅ   ', '', '21-12-24'),
(11, 'et123', 'bus', '721', '123', '0', '767.26', '1534.52,በቀጣይ መሄድ ያለበት 1657.52', 'kitsi 19 ', '25.49L ከመጠን በላይ ነዳጅ   ', '', '21-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `idcard`
--

CREATE TABLE `idcard` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Sirname` varchar(255) DEFAULT NULL,
  `Mtitle` varchar(255) DEFAULT NULL,
  `Rank` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `Online` varchar(255) DEFAULT NULL,
  `Picname` varchar(255) DEFAULT NULL,
  `Time` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idcard`
--

INSERT INTO `idcard` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Rank`, `Department`, `Email`, `Staffid`, `Online`, `Picname`, `Time`) VALUES
(0, '12/23/2021', 'misael', '', 'gobora', 'et123', '2:01', '10:00', 'Offline', 'Mechanic.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inorg`
--

CREATE TABLE `inorg` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `Phone` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(300) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pname` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `megazin`
--

CREATE TABLE `megazin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `megazin`
--

INSERT INTO `megazin` (`id`, `name`, `file`, `who`, `date`) VALUES
(8, 'melaku', 'download (5).png', 'publisher', '2021-11-30'),
(9, 'ሪፕርት 2014', 'የ30 ቀን ሪፖርት ማድረጉን አረጋግጣለው ስም እና ፊርሚያ.......................................................... ቀን ..................pdf', 'admin', '2021-11-30'),
(10, 'ሪፖርት 2014 ', 'Titulo de tabla en pdf (3).pdf', 'publisher', '2021-11-30'),
(11, 'problem recost', 'viforya.pdf', 'driver', '2021-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `monthlyschedule`
--

CREATE TABLE `monthlyschedule` (
  `id` int(255) NOT NULL,
  `weekoneid` varchar(255) DEFAULT NULL,
  `driverid` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `codnum1` varchar(255) DEFAULT NULL,
  `hospitalteregna` varchar(255) DEFAULT NULL,
  `codnum2` varchar(255) DEFAULT NULL,
  `satandsund` varchar(255) DEFAULT NULL,
  `codnum3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orgfile`
--

CREATE TABLE `orgfile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgfile`
--

INSERT INTO `orgfile` (`id`, `name`, `username`, `date`, `file`, `catagory`) VALUES
(31, 'amu', 'amu', '2021-11-29', 'download.pdf', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `orgreport`
--

CREATE TABLE `orgreport` (
  `id` int(255) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgreport`
--

INSERT INTO `orgreport` (`id`, `orgname`, `date`, `file`, `status`) VALUES
(5, ' amu', '2021-11-28', 'download.pdf', 'new'),
(6, ' amu', '2021-11-30', '4U0A9349.JPG', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `orgtable`
--

CREATE TABLE `orgtable` (
  `id` int(11) NOT NULL,
  `orgID` varchar(255) DEFAULT NULL,
  `orgName` varchar(255) DEFAULT NULL,
  `orgAddress` varchar(255) DEFAULT NULL,
  `orgFile` varchar(255) DEFAULT NULL,
  `StartDate` varchar(255) DEFAULT NULL,
  `StartTime` varchar(255) DEFAULT NULL,
  `EndDate` varchar(255) DEFAULT NULL,
  `EndTime` varchar(255) DEFAULT NULL,
  `AccountStates` varchar(255) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgtable`
--

INSERT INTO `orgtable` (`id`, `orgID`, `orgName`, `orgAddress`, `orgFile`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `AccountStates`) VALUES
(10, 'amu', 'amu', 'hossansa', 'download.pdf', '2021-11-29', '00:24', '	2021-11-29', '	00:24', 'Panding');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `ids` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `Size` decimal(10,0) DEFAULT NULL,
  `content` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profilepictures`
--

CREATE TABLE `profilepictures` (
  `id` int(11) NOT NULL,
  `ids` varchar(30) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proreport`
--

CREATE TABLE `proreport` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proreport`
--

INSERT INTO `proreport` (`id`, `file`, `date`, `name`, `message`, `status`) VALUES
(8, 'Screenshot (60).png', '2021-11-02', 'misael', 'ia am in adis at holy city center', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `carid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `travllocation` varchar(255) NOT NULL,
  `arrivedate` varchar(255) NOT NULL,
  `km` varchar(255) NOT NULL,
  `travldate` varchar(255) NOT NULL,
  `carlocation` varchar(255) NOT NULL,
  `gej` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `stutes` varchar(255) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `carid`, `date`, `travllocation`, `arrivedate`, `km`, `travldate`, `carlocation`, `gej`, `comment`, `file`, `stutes`) VALUES
(7, 'melaku', 'car124', '2021-12-25', '2021-12-25', '2021-11-25', '		4566', '2021-11-25', '	መኪናው ከጊቢ ውጭ ነው', '	56', '	nope', '	', 'seen'),
(8, 'misael', 'car124', '2021-12-25', '2021-11-27', '2021-11-26', '	456', '2021-11-27', '	መኪናው ጊቢ ውስጥ ነው', '	56', '		nope0909', '	', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `colore` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `title`, `start`, `enddate`, `Activity`, `colore`, `status`) VALUES
(34, ' EXECUTIVES SCHEDULE', '2021-11-30', '2021-12-01', 'ቦሎ እድሳት ', 'text-danger', 'New'),
(35, ' EXECUTIVES SCHEDULE', '2021-11-30', '2021-12-11', 'bolo car 3', 'text-warning', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `traveldoc`
--

CREATE TABLE `traveldoc` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `who` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traveldoc`
--

INSERT INTO `traveldoc` (`id`, `name`, `file`, `who`, `date`) VALUES
(1, 'ብልሽት ', 'የ30 ቀን ሪፖርት ማድረጉን አረጋግጣለው ስም እና ፊርሚያ.......................................................... ቀን ..................pdf', 'ሚሳኤል ደሳለኝ ', '2021-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `EventTitle` varchar(255) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `StartTime` varchar(255) DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `EndTime` varchar(255) DEFAULT NULL,
  `RegistrationDeadline` varchar(255) DEFAULT NULL,
  `Timezone` varchar(255) DEFAULT NULL,
  `startLocation` varchar(255) DEFAULT NULL,
  `endLocation` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `carID` varchar(255) DEFAULT NULL,
  `divID` varchar(255) DEFAULT NULL,
  `seen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `EventTitle`, `StartDate`, `StartTime`, `EndDate`, `EndTime`, `RegistrationDeadline`, `Timezone`, `startLocation`, `endLocation`, `City`, `State`, `Country`, `Description`, `carID`, `divID`, `seen`) VALUES
(4, 'ምደባ', '0000-00-00 00:00:00', '5:2', '0000-00-00 00:00:00', '5:2', '6/12/2022', 'GMT-12:00 Etc/GMT-12', 'እየሩሳሌም', 'ዋቸሞ ጊቢ', 'out city', 'hadya', 'ethiopa', '', 'jkh', 'driver1', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `accounttype` varchar(255) NOT NULL DEFAULT 'Admin',
  `stutes` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `accounttype`, `stutes`) VALUES
(12, 'admin', '01044def8243ccaf4f1e70f542fc4718', 'abush', 'Admin', 'Active'),
(27, 'driver1', '01044def8243ccaf4f1e70f542fc4718', 'misael dessalegn tumdado', 'driver', 'Active'),
(43, 'adm', '827ccb0eea8a706c4c34a16891f84e7b', 'misael dessalegn', 'Admin', 'Panding'),
(45, 'amu', '01044def8243ccaf4f1e70f542fc4718', 'amu', 'org', 'Panding'),
(47, 'admin2', '01044def8243ccaf4f1e70f542fc4718', 'mela', 'distrpution', 'Active'),
(48, 'admin3', '01044def8243ccaf4f1e70f542fc4718', 'desu', 'distrpution', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `gov` varchar(255) NOT NULL,
  `model` varchar(256) NOT NULL,
  `chansi` varchar(256) NOT NULL,
  `mid` int(11) NOT NULL,
  `cc` varchar(256) NOT NULL,
  `price` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `targa` varchar(256) NOT NULL,
  `intakecapacityhuman` varchar(255) NOT NULL,
  `intakecapacityltr` int(255) NOT NULL,
  `intakecapacitykuntal` int(255) NOT NULL,
  `carid` varchar(256) NOT NULL,
  `fueltype` varchar(256) NOT NULL,
  `loads` varchar(256) NOT NULL,
  `bookid` varchar(256) NOT NULL,
  `location` varchar(255) NOT NULL DEFAULT 'in city',
  `cartype` varchar(255) NOT NULL,
  `photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `gov`, `model`, `chansi`, `mid`, `cc`, `price`, `year`, `targa`, `intakecapacityhuman`, `intakecapacityltr`, `intakecapacitykuntal`, `carid`, `fueltype`, `loads`, `bookid`, `location`, `cartype`, `photo`) VALUES
(22, 'wcu', 'ivcko', '56789', 56789, '678', 767676, 2021, '', '', 0, 0, '767676', 'fuel', '67', '456789', 'in city', 'Bus', 'compact.png');

-- --------------------------------------------------------

--
-- Table structure for table `weekfour`
--

CREATE TABLE `weekfour` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `weekoneid` varchar(255) DEFAULT NULL,
  `driverid` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `codnum1` varchar(255) DEFAULT NULL,
  `hospitalteregna` varchar(255) DEFAULT NULL,
  `codnum2` varchar(255) DEFAULT NULL,
  `satandsund` varchar(255) DEFAULT NULL,
  `codnum3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekfour`
--

INSERT INTO `weekfour` (`id`, `date`, `weekoneid`, `driverid`, `drivername`, `location`, `codnum1`, `hospitalteregna`, `codnum2`, `satandsund`, `codnum3`) VALUES
(3, '3/3/2024', 'weekfour', 'driver1', 'driver1', 'gonbora', '67', '12', '00', 'melaku', '00'),
(4, '3/3/2024', 'weekfour', 'driver1', 'driver1', 'gonbora', '67', '12', '00', 'melaku', '00');

-- --------------------------------------------------------

--
-- Table structure for table `weekone`
--

CREATE TABLE `weekone` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `weekoneid` varchar(255) DEFAULT NULL,
  `driverid` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `codnum1` varchar(255) DEFAULT NULL,
  `hospitalteregna` varchar(255) DEFAULT NULL,
  `codnum2` varchar(255) DEFAULT NULL,
  `satandsund` varchar(255) DEFAULT NULL,
  `codnum3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekone`
--

INSERT INTO `weekone` (`id`, `date`, `weekoneid`, `driverid`, `drivername`, `location`, `codnum1`, `hospitalteregna`, `codnum2`, `satandsund`, `codnum3`) VALUES
(5, '3/3/2024', 'weekone', 'driver1', 'driver1', 'eyerualm', '09', 'melaku', '567', 'misael', '4568');

-- --------------------------------------------------------

--
-- Table structure for table `weekthree`
--

CREATE TABLE `weekthree` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `weekoneid` varchar(255) DEFAULT NULL,
  `driverid` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `codnum1` varchar(255) DEFAULT NULL,
  `hospitalteregna` varchar(255) DEFAULT NULL,
  `codnum2` varchar(255) DEFAULT NULL,
  `satandsund` varchar(255) DEFAULT NULL,
  `codnum3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekthree`
--

INSERT INTO `weekthree` (`id`, `date`, `weekoneid`, `driverid`, `drivername`, `location`, `codnum1`, `hospitalteregna`, `codnum2`, `satandsund`, `codnum3`) VALUES
(3, '3/3/2024', 'weekthree', 'driver1', 'driver1', 'menarya', '456', '5567', '90', 'desalegn', '111'),
(4, '3/3/2024', 'weekthree', 'driver1', 'driver1', 'menarya', '456', '5567', '90', 'desalegn', '111');

-- --------------------------------------------------------

--
-- Table structure for table `weektwo`
--

CREATE TABLE `weektwo` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `weekoneid` varchar(255) DEFAULT NULL,
  `driverid` varchar(255) DEFAULT NULL,
  `drivername` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `codnum1` varchar(255) DEFAULT NULL,
  `hospitalteregna` varchar(255) DEFAULT NULL,
  `codnum2` varchar(255) DEFAULT NULL,
  `satandsund` varchar(255) DEFAULT NULL,
  `codnum3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weektwo`
--

INSERT INTO `weektwo` (`id`, `date`, `weekoneid`, `driverid`, `drivername`, `location`, `codnum1`, `hospitalteregna`, `codnum2`, `satandsund`, `codnum3`) VALUES
(3, '3/3/2024', 'weektwo', 'driver1', 'driver1', 'eyerualm', '123', '234', '34', 'misael', '78000'),
(4, '3/3/2024', 'weektwo', 'driver1', 'driver1', 'eyerualm', '123', '234', '34', 'misael', '78000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alart`
--
ALTER TABLE `alart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full`
--
ALTER TABLE `full`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idcard`
--
ALTER TABLE `idcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inorg`
--
ALTER TABLE `inorg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `megazin`
--
ALTER TABLE `megazin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlyschedule`
--
ALTER TABLE `monthlyschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgfile`
--
ALTER TABLE `orgfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgreport`
--
ALTER TABLE `orgreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgtable`
--
ALTER TABLE `orgtable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orgID` (`orgID`),
  ADD UNIQUE KEY `orgName` (`orgName`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepictures`
--
ALTER TABLE `profilepictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proreport`
--
ALTER TABLE `proreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traveldoc`
--
ALTER TABLE `traveldoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekfour`
--
ALTER TABLE `weekfour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekone`
--
ALTER TABLE `weekone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekthree`
--
ALTER TABLE `weekthree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weektwo`
--
ALTER TABLE `weektwo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alart`
--
ALTER TABLE `alart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `full`
--
ALTER TABLE `full`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inorg`
--
ALTER TABLE `inorg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `megazin`
--
ALTER TABLE `megazin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `monthlyschedule`
--
ALTER TABLE `monthlyschedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orgfile`
--
ALTER TABLE `orgfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orgreport`
--
ALTER TABLE `orgreport`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orgtable`
--
ALTER TABLE `orgtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profilepictures`
--
ALTER TABLE `profilepictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proreport`
--
ALTER TABLE `proreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `traveldoc`
--
ALTER TABLE `traveldoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `weekfour`
--
ALTER TABLE `weekfour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weekone`
--
ALTER TABLE `weekone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weekthree`
--
ALTER TABLE `weekthree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weektwo`
--
ALTER TABLE `weektwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
