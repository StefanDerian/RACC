-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 17, 2017 at 08:12 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `racc`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UserID` int(11) NOT NULL,
  `DisplayName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `UserName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(45) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UserID`, `DisplayName`, `UserName`, `Password`, `UserType`, `Created`) VALUES
(2, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'AGENT', '2017-06-23 02:23:44'),
(4, 'Micheal Moeidjiantho', 'mmoeidjiantho', '0192023a7bbd73250516f069df18b500', 'AGENT', '2017-06-23 02:23:44'),
(5, 'Cindy', 'cindy', '46f94c8de14fb36680850768ff1b7f2a', 'AGENT', '2017-06-26 01:15:33'),
(6, 'Buddy', 'Buddy', 'd41d8cd98f00b204e9800998ecf8427e', 'AGENT', '2017-07-14 01:16:46'),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-07-14 01:20:21'),
(8, '1231233242faefwef', 'asdfaa1231', '123123123', '', '2017-07-15 03:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PreferName` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DateofBirth` date NOT NULL,
  `Nationality` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Gender` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `ConsultantID` int(11) NOT NULL,
  `UserType` varchar(225) CHARACTER SET ucs2 NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`UserID`, `FirstName`, `LastName`, `PreferName`, `DateofBirth`, `Nationality`, `Gender`, `Mobile`, `Email`, `ConsultantID`, `UserType`, `Created`) VALUES
(1, 'First', 'name', '', '1999-02-02', 'Aus', 'Male', 413826038, 'awoefjw@gMAIL.COM', 2, '', '2017-06-27 09:05:07'),
(2, 'abc', 'abc', '', '2016-11-30', 'Australia', 'Female', 468638447, 'Email@email.com', 4, '', '2017-06-30 00:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `UserID`, `Content`, `Time`) VALUES
(1, 1, 'Hello, how are you', '2015-08-05 09:00:00'),
(2, 1, 'I\'m good, thanks', '2017-06-06 06:00:00'),
(3, 0, 'hellp', '2017-07-17 04:02:00'),
(4, 8, 'Hellp', '2017-07-17 21:19:00'),
(5, 8, 'how are you', '2017-07-16 00:34:00'),
(6, 1, 'GREAT', '2017-06-22 06:00:00'),
(7, 7, 'TEST', '2017-06-28 00:54:00'),
(8, 7, 'TEST2', '2017-07-01 14:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PreferName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `DateofBirth` date NOT NULL,
  `Nationality` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Gender` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Mobile` varchar(45) NOT NULL,
  `Email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `ConsultantID` int(11) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `Course` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Uni` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Uni_compl` date NOT NULL,
  `Visa` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Vexpiry` date NOT NULL,
  `Passport` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Pexpiry` date NOT NULL,
  `CurrentAddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Csuburb` varchar(255) NOT NULL,
  `Cpostcode` varchar(45) NOT NULL,
  `Cstate` varchar(255) NOT NULL,
  `Ccountry` varchar(255) NOT NULL,
  `HomeAddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Hcity` varchar(255) NOT NULL,
  `Hstate` varchar(255) NOT NULL,
  `Hcountry` varchar(255) NOT NULL,
  `Hpostcode` varchar(45) NOT NULL,
  `CurrentPointTest` int(11) NOT NULL,
  `GoalPointTest` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `CurrentStatus` varchar(255) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `PreferName`, `DateofBirth`, `Nationality`, `Gender`, `Mobile`, `Email`, `ConsultantID`, `UserType`, `Course`, `Uni`, `Uni_compl`, `Visa`, `Vexpiry`, `Passport`, `Pexpiry`, `CurrentAddress`, `Csuburb`, `Cpostcode`, `Cstate`, `Ccountry`, `HomeAddress`, `Hcity`, `Hstate`, `Hcountry`, `Hpostcode`, `CurrentPointTest`, `GoalPointTest`, `Comment`, `CurrentStatus`, `Created`) VALUES
(1, 'Buddy', 'Siu', '', '2017-01-02', 'Australia', '', '123123123', 'email@gmail.com', 2, '', '', '', '2017-11-16', '', '0000-00-00', '', '2018-08-13', '', '', '0', '', '', '', '', '', '', '0', 0, 0, '', 'contacted', '2017-06-23 00:52:17'),
(4, 'cindy', 'Huo', 'Cindy', '2015-12-07', 'Australia', '', '123123123', 'cindy@gmail.com', 2, '', 'BICT', '', '2018-06-07', '', '2017-10-06', '', '0000-00-00', '', '', '0', '', '', '', '', '', '', '0', 2, 2, '', '', '2017-06-24 04:00:41'),
(5, 'abc', 'cba', '', '2017-07-10', 'Australia', '', '123123123', 'abc@gmail.com', 5, '', '', '', '0000-00-00', '', '2018-02-01', '', '2018-09-01', '', '', '0', '', '', '', '', '', '', '0', 0, 0, '', '', '2017-06-24 04:08:49'),
(7, 'Buddy', 'Siu', '', '2017-01-02', 'Australia', '', '123123123', 'email@gmail.com', 2, '', '', '', '2017-11-16', '', '0000-00-00', '', '2018-08-13', '', '', '0', '', '', '', '', '', '', '0', 0, 0, '', 'contacted', '2017-06-23 00:52:17'),
(8, 'asdf', '', '', '0000-00-00', 'Australia', '', '', '', 2, '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '2017-06-23 00:52:17'),
(9, 'Cindy', 'Huo', 'Cindy', '2017-07-17', 'Australia', 'Female', '0416638250', 'cindy.huo0@gmail.com', 2, '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '2017-07-15 04:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `userAccount`
--

CREATE TABLE `userAccount` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `LastName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PreferName` varchar(45) CHARACTER SET latin1 NOT NULL,
  `DateofBirth` date NOT NULL,
  `Nationality` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Gender` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Who` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userAccount`
--

INSERT INTO `userAccount` (`UserID`, `FirstName`, `LastName`, `PreferName`, `DateofBirth`, `Nationality`, `Gender`, `Mobile`, `Email`, `Who`, `Created`) VALUES
(1, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-20 07:43:35'),
(2, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-20 07:45:03'),
(3, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-20 07:46:20'),
(4, 'Buddy', 'Siu', 'BuddyPreferred', '1995-08-04', 'Australian', 'Male', 413826038, 'bsiu26@gmail.com', 'Cindy', '2017-06-20 07:47:02'),
(5, 'Buddy', 'Siu', 'BuddyPreferred', '1995-08-04', 'Australian', 'Male', 413826038, 'bsiu26@gmail.com', 'Cindy', '2017-06-20 07:47:43'),
(6, 'Buddy', 'Siu', 'BuddyPreferred', '1995-08-04', 'Australian', 'Male', 413826038, 'bsiu26@gmail.com', 'Cindy', '2017-06-20 07:48:40'),
(7, 'Buddy', 'Siu', 'BuddyPreferred', '1995-08-04', 'Australian', 'Male', 413826038, 'bsiu26@gmail.com', 'Cindy', '2017-06-21 01:31:36'),
(8, 'Buddy', 'Siu', 'BuddyPreferred', '1995-08-04', 'Australian', 'Male', 413826038, 'bsiu26@gmail.com', 'Cindy', '2017-06-21 01:38:51'),
(9, 'First', 'Last', 'Prefer', '0000-00-00', 'nationality', 'Male', 3656, 'Email@email.com', 'Who', '2017-06-21 01:39:19'),
(10, 'First', 'Last', 'Prefer', '1998-07-05', 'nationality', 'Male', 12345678, 'Email@email.com', 'Who', '2017-06-21 01:48:24'),
(11, 'First', 'Last', 'Prefer', '1998-07-05', 'nationality', 'Male', 12345678, 'Email@email.com', 'Who', '2017-06-21 01:48:48'),
(12, 'First', 'Last', 'Prefer', '1998-07-05', 'nationality', 'Male', 12345678, 'Email@email.com', 'Who', '2017-06-21 02:17:00'),
(13, 'First', 'Last', 'Prefer', '1998-07-05', 'nationality', 'Male', 12345678, 'Email@email.com', 'Who', '2017-06-21 02:31:13'),
(14, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 02:31:15'),
(15, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 02:33:04'),
(16, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:28:31'),
(17, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:29:22'),
(18, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:31:20'),
(19, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:32:13'),
(20, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:32:20'),
(21, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 06:34:46'),
(22, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-21 08:31:04'),
(23, 'C', 'test', '', '0000-00-00', 'china', '', 142323, 'Email@email.com', '', '2017-06-22 08:24:04'),
(24, 'C', 'test', '', '0000-00-00', 'china', '', 142323, 'Email@email.com', '', '2017-06-22 08:24:59'),
(25, 'C', 'test', '', '0000-00-00', 'china', '', 142323, 'Email@email.com', '', '2017-06-22 08:38:27'),
(26, 'C', 'test', 'cindy', '0000-00-00', 'china', '', 142323, 'Email@email.com', '', '2017-06-22 09:01:12'),
(27, 'C', 'test', 'cindy', '0000-00-00', 'china', '', 142323, 'Email@email.com', '', '2017-06-22 09:01:19'),
(28, 'C', 'test', 'cindy', '0000-00-00', 'china', '', 142323, 'Email@email.com', 'michael', '2017-06-22 09:02:31'),
(29, 'C', 'test', 'cindy', '1998-03-12', 'china', 'Female', 142323, 'Email@email.com', 'michael', '2017-06-22 09:03:36'),
(30, 'C', 'test', 'cindy', '1998-03-12', 'china', 'Female', 142323, 'Email@email.com', 'michael', '2017-06-22 09:06:23'),
(31, 'C', 'test', 'cindy', '1998-03-12', 'china', 'Female', 142323, 'Email@email.com', 'michael', '2017-06-22 09:08:57'),
(32, 'C', 'test', 'cindy', '1998-03-12', 'china', 'Female', 142323, 'Email@email.com', 'michael', '2017-06-22 09:13:01'),
(33, 'C', 'test', 'cindy', '1998-03-12', 'china', '', 142323, 'Email@email.com', 'none', '2017-06-22 09:13:05'),
(34, 'C', 'test', 'cindy', '1998-03-12', 'china', '', 142323, 'Email@email.com', 'none', '2017-06-22 11:17:15'),
(35, 'C', '', 'cindy', '1998-03-12', 'china', '', 142323, 'Email@email.com', 'none', '2017-06-22 11:18:13'),
(36, 'C', '', 'cindy', '1998-03-12', 'china', '', 142323, 'Email@email.com', 'none', '2017-06-22 11:19:17'),
(37, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-22 11:19:21'),
(38, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-22 11:19:43'),
(39, 'Cindu', 'Huo', '', '1876-05-04', 'China', '', 1234534, 'Email@email.com', 'michael', '2017-06-22 11:20:18'),
(40, 'Cindu', 'Huo', '', '1876-05-04', 'China', 'Female', 1234534, 'Email@email.com', 'michael', '2017-06-22 11:20:51'),
(41, 'Cindu', 'Huo', '', '1876-05-04', 'China', 'Female', 1234534, 'Email@email.com', 'michael', '2017-06-23 00:04:19'),
(42, 'Cindu', 'Huo', '', '1876-05-04', 'China', 'Female', 1234534, 'Email@email.com', 'michael', '2017-06-23 00:04:50'),
(43, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:04:53'),
(44, 'qwe', 'qwe', 'qwe', '1212-12-12', 'qwe', 'Male', 123, 'qwe@qwe', 'none', '2017-06-23 00:05:37'),
(45, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:06:12'),
(46, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:08:09'),
(47, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:11:33'),
(48, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:11:56'),
(49, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:12:15'),
(50, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:15:33'),
(51, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:15:45'),
(52, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:16:02'),
(53, 'qwe', 'qwe', '', '1212-01-01', 'qwe', 'Male', 123, '123qwe@qwe', 'none', '2017-06-23 00:18:21'),
(54, 'qwe', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:18:26'),
(55, 'qwe', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:19:12'),
(56, 'qwe', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:19:17'),
(57, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:19:58'),
(58, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:20:02'),
(59, 'Cindy', 'Huo', '', '1212-12-12', 'China', 'Female', 123123123, '123@qwe.com', 'michael', '2017-06-23 00:37:30'),
(60, 'Buddy', 'Huo', 'Cindy', '2011-12-30', 'Australia', 'Female', 0, '', 'none', '2017-06-23 00:38:06'),
(61, 'qwe', 'Huo', 'Cindy', '2016-11-30', 'Australia', 'Female', 3343, 'Email@email.com', 'michael', '2017-06-23 00:38:45'),
(62, 'qwe', 'Huo', 'Cindy', '2016-11-30', 'Australia', 'Female', 3343, 'Email@email.com', 'michael', '2017-06-23 00:40:20'),
(63, 'mko', 'mko', '', '0909-09-09', 'mko', 'Male', 123, 'mko@email.com', 'angela', '2017-06-23 00:40:51'),
(64, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-23 00:42:32'),
(65, 'mko', 'mko', '', '0909-09-09', 'mko', 'Male', 123, 'mko@email.com', 'angela', '2017-06-23 00:43:45'),
(66, '', '', '', '0000-00-00', '', '', 0, '', 'none', '2017-06-23 00:43:47'),
(67, 'qwe', 'Huo', 'Cindy', '2013-11-30', 'Australia', 'Female', 4233, 'Email@email.com', 'michael', '2017-06-23 00:44:13'),
(68, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-06-23 02:28:53'),
(69, 'qwe', 'Huo', '', '0000-00-00', '', '', 0, '', '', '2017-06-23 02:29:10'),
(70, 'qwe', 'Huo', 'Cindy', '2015-12-31', 'Australia', 'Female', 5242646, 'Email@email.com', 'Cindy', '2017-06-23 02:29:35'),
(71, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-07-14 01:20:45'),
(72, '', '', '', '0000-00-00', '', '', 0, '', '', '2017-07-14 01:21:14'),
(73, 'h', '', '', '0000-00-00', '', '', 0, '', '', '2017-07-14 01:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userAccount`
--
ALTER TABLE `userAccount`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `userAccount`
--
ALTER TABLE `userAccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
