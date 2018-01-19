-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2018 at 07:00 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `racc`
--

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
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastContacted` date NOT NULL,
  `know` varchar(255) NOT NULL,
  `urgent` int(11) NOT NULL,
  `wechat` varchar(255) NOT NULL,
  `prevStudy` varchar(255) NOT NULL,
  `prevComp` date NOT NULL,
  `service` varchar(255) NOT NULL,
  `prevUni` varchar(255) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `PreferName`, `DateofBirth`, `Nationality`, `Gender`, `Mobile`, `Email`, `ConsultantID`, `UserType`, `Course`, `Uni`, `Uni_compl`, `Visa`, `Vexpiry`, `Passport`, `Pexpiry`, `CurrentAddress`, `Csuburb`, `Cpostcode`, `Cstate`, `Ccountry`, `HomeAddress`, `Hcity`, `Hstate`, `Hcountry`, `Hpostcode`, `CurrentPointTest`, `GoalPointTest`, `Comment`, `CurrentStatus`, `Created`, `lastContacted`, `know`, `urgent`, `wechat`, `prevStudy`, `prevComp`, `service`, `prevUni`, `duedate`) VALUES
(1, 'HENRIETTE MAE', 'GARZON', '', '0000-00-00', 'FILIPINO', 'Female', '0424975818', '112894hgarzon@gmail.com', 4, '', 'business', 'lawson college', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '191 inkeman st St.KIlda Vic 3182', '', '', '', '', 'davao city', '', '', '', '', 0, 0, '', 'new client', '2017-12-20 00:44:19', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(2, 'Angelica', 'Mariss', '', '0000-00-00', 'Indonesia', 'Female', '0416281901', 'angelicamariss@gmail.com', 4, '', 'Bachelor of Tourism and Hospitality Management', 'William Angliss Institute of TAFE', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '5/26 Railway Parade, Highett 3190', '', '', '', '', 'Jalan Kapten Muslim Dalam No 1B - Medan, Sumatera Utara', '', '', '', '', 0, 0, '', 'new client', '2017-12-20 23:58:01', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(3, 'leanne', 'mah', '', '0000-00-00', 'malaysian', 'Female', '0452519669', 'yeohleanne@gmail.com', 0, '', 'pharmacy', 'monash', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '8 franklin st', '', '', '', '', 'bandar utama PJ', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 00:31:51', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(5, 'Dhenvirg ', 'Ugot', '', '0000-00-00', 'Filipino', 'Male', '0406607549', 'dhenvirgugot@gmail.com', 4, '', 'BS hotel and restaurant management', 'Lyceum of the Philippines University', '2012-04-10', '', '0000-00-00', '', '0000-00-00', '3 Compton St., Truganina VIC', '', '', '', '', '10, Abao St. Laloma, Quezon city, Philippines', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 01:10:42', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(6, 'tynal', 'chruy', '', '0000-00-00', 'cambodia', 'Male', '0422286096', 'tinal_ct@yahoo.com', 4, '', 'Business (Accountancy)', 'RMIT', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '7 lynette court, noble park, 3174, VIC', '', '', '', '', 'Phnom Penh 103BE0', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 02:19:10', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(7, 'cheng sim', 'chiu', '', '0000-00-00', 'malaysian', 'Female', '0413657434', 'aa.chengsim94@gmail.com', 0, '', 'bachelor of business in marketing and international business', 'monash ', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '504/151 Berkeley st, melbourne, VIC 3000', '', '', '', '', '504/151 Berkeley st, melbourne, VIC 3000', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 02:50:57', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(10, 'Khoon Yaw', 'Lau', '', '0000-00-00', 'Malaysian', 'Male', '0412845778', 'kylau_515@hotmail.com', 0, '', 'Master of Architecture', 'RMIT', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '3701 / 500 Elizabeth Street, VIC Melbourne 3000', '', '', '', '', '3701/ 500 Elizabeth Street,VIC, Melbourne,3000', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 04:10:33', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(11, 'Verity', 'Wai-Smith', '', '0000-00-00', 'British', 'Female', '0450321214', 'veritywaismith@gmail.com', 0, '', 'Arts and Business (Management) ', 'Monash University', '2014-12-17', '', '0000-00-00', '', '0000-00-00', 'Unit 2/115 Moriah Street Clayton Vic 3168', '', '', '', '', '7 Farrer Road Tulip Garden #05-06 S(268819)', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 04:16:21', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(12, 'Adam', 'Han', '', '0000-00-00', 'South Korea', 'Male', '0401064758', 'bkhy80@gmail.com', 0, '', 'Diploma of Hospitality management', 'William angliss institute', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '1907/557 Little Lonsdale st, Melbourne VIC 3000', '', '', '', '', 'x', '', '', '', '', 0, 0, '', 'new client', '2017-12-21 23:27:23', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(13, 'Sean ', 'Ng', '', '0000-00-00', 'Singaporean', 'Male', '0410200834', 'wsng1991@gmail.com', 0, '', 'Banking and Finance ', 'Monash ', '2014-12-17', '', '0000-00-00', '', '0000-00-00', '2/33 Renver Road Clayton 3168', '', '', '', '', 'Block 325 Tampines Street 32 #08-410 Singapore 520325', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 00:06:57', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(14, 'Yi Ting', 'Tu', '', '0000-00-00', 'Taiwanese', 'Female', '0452597952', 'joycetu1201@gmail.com', 0, '', 'Banking and Finance', 'Monash', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '2/33 Renver Rd Clayton 3168', '', '', '', '', '12F No472 WanBan Rd., Banqiao Disc., New Taipei City, Taiwan', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 00:08:56', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(15, 'Ju Ee', 'Ong', '', '1991-06-02', 'Malaysia', 'Female', '+60183576299', 'sheepyee@gmail.com', 15, '', 'Accounting, Banking and Finance', 'Monash University', '2013-06-30', '', '0000-00-00', '', '0000-00-00', '2 Jalan USJ 11/1A, 47620 Subang Jaya, Selangor, Malaysia.', '', '', '', '', '2 Jalan USJ 11/1A, 47620 Subang Jaya, Selangor, Malaysia.', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 00:43:27', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(16, 'joyce', 'Wong', '', '1997-03-28', 'Malaysia', 'Female', '0450533816', 'joyce.f.wong@gmail.com', 4, '', 'Accounting and management ', 'university of melbourne ', '2018-06-15', '', '0000-00-00', '', '0000-00-00', '3 Torwood avenue', '', '', '', '', 'simpang 1273-29, kg. tanjung bunut, bandar seri begawan, negara brunei darussalam', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 00:56:21', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(17, 'Selma', 'Halida', '', '1996-11-01', 'Indonesia', 'Female', '0401557556', 'selmahalida@hotmail.com', 4, '', 'Commerce (Marketing and Management)', 'University of Melbourne', '2017-12-09', '', '0000-00-00', '', '0000-00-00', '410 Elizabeth Street, Melbourne, VIC 3000', '', '', '', '', 'Jl. Warung Silah no 31, Ciganjur, Jakarta Selatan', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 02:50:47', '0000-00-00', '', 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(18, 'Pei Yee', 'Lim', '', '1997-03-21', 'Malaysia', 'Female', '0452407372', 'amandalim321@gmail.com', 4, '', 'Accounting', 'Swinburne of Technology', '2018-12-31', '', '0000-00-00', '', '0000-00-00', '28A, Mark Street, North Melbourne 3051, VIC', '', '', '', '', '33-05-29, Desa Sri Swarna, Lorong Semarak Api 3, 11500 Air Itam, Penang, Malaysia', '', '', '', '', 0, 0, '', 'new client', '2017-12-22 04:29:17', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(19, 'sas', 'ssss', '', '2018-01-15', 'Indada', 'Male', '0878787878', 'stefan.derian@outlook.com', 0, '', 'MIT', 'Monash', '2018-01-30', '', '0000-00-00', '', '0000-00-00', '65 UIYTTR', '', '', '', '', '456 tyutytyt', '', '', '', '', 0, 0, '', 'new client', '2018-01-10 03:15:15', '0000-00-00', 'Facebook', 1, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(20, 'Dererere', 'trtrt', '', '2018-01-17', 'China', 'Male', '0878787878', 'SHAR0012@STUDENT.MONASH.EDU', 5, '', 'MBIS', 'monash', '2018-01-17', 'Student', '2018-01-16', 'B5565575', '2018-02-05', '656 yutytytytyt', '', '', '', '', 'ererererere', '', '', '', '', 0, 0, '', 'on progress', '2018-01-10 03:18:48', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(21, 'rrrr', 'ffffffff', '', '2018-01-22', 'INDIA', 'Male', '089768786878', 'SHAR0012@STUDENT.MONASH.EDU', 0, '', 'MIT', 'monash', '2018-01-16', 'Student', '2018-01-21', 'B5565575', '2018-01-22', '3456 GURTRTR', '', '', '', '', '4567 HUHUHU', '', '', '', '', 0, 0, '', 'new client', '2018-01-10 03:44:46', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(22, 'Stefan', 'Ferib', '', '2018-01-17', 'Indonesia', '', '0086886868', 'stefan.derian@gmail.com', 0, '', 'MBIS', 'Monash', '2018-01-13', '', '0000-00-00', '', '0000-00-00', 'sdsdsd', '', '', '', '', '', '', '', '', '', 0, 0, '', 'new client', '2018-01-11 01:15:22', '0000-00-00', 'Facebook', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(23, 'rere', 'hartono', '', '2018-01-18', 'Indonesia', '', '089969', 'stefan.derian@gmail.com', 4, '', 'MBIS', 'Monash', '2018-01-12', 'Student', '2018-01-16', 'B8349343', '2018-01-23', '456 hui', '', '', '', '', '', '', '', '', '', 0, 0, '', 'new client', '2018-01-11 01:48:33', '0000-00-00', '', 0, '', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(24, 'SAS', 'SSASAS', '', '2018-01-16', 'Indonesia', '', '0086886868', 'stefan.derian@gmail.com', 4, '', 'MBIS', 'Monash', '2018-01-21', 'Student', '2018-01-31', '', '0000-00-00', '456 hui', '', '', '', '', '555 TURT', '', '', '', '', 0, 0, '', 'new client', '2018-01-16 01:28:50', '0000-00-00', 'Facebook', 1, 'stefan', 'Mbis', '2018-01-14', 'migration', 'mit', '0000-00-00'),
(25, 'Deri2', 'Daniel', '', '2018-01-18', 'Indonesia', '', '09453535353', 'stefan.derian@gmail.com', 4, '', 'MBIS', 'Monash', '2018-01-06', 'Student', '2018-01-11', 'B8349343', '0000-00-00', '1367 Gablak', '', '', '', '', '234 TRUTH', '', '', '', '', 0, 0, '', 'new client', '2018-01-16 02:53:57', '0000-00-00', 'Facebook', 0, '', 'Mbis', '2018-01-11', 'education', 'Mbis', '2018-01-12'),
(27, 'SAS', 'SSASAS', '', '2018-01-16', 'Indonesia', '', '089969', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'moka', '2018-01-06', 'Student', '2018-01-24', 'B8349343', '2018-01-22', '21 DRERERE', '', '', '', '', '23 RERERE', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 05:30:25', '0000-00-00', 'Facebook', 0, 'stefan', 'Mbis', '2018-01-13', 'migration', 'Mbis', '2018-01-17'),
(28, 'SAS', 'SSASAS', '', '2018-01-16', 'Indonesia', '', '089969', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'moka', '2018-01-06', 'Student', '2018-01-24', 'B8349343', '2018-01-22', '21 DRERERE', '', '', '', '', '23 RERERE', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 05:31:55', '0000-00-00', 'Facebook', 0, 'stefan', 'Mbis', '2018-01-13', 'migration', 'Mbis', '0000-00-00'),
(29, 'SAS22', 'SSASAS22', '', '2018-01-24', 'Indonesia', '', '0086886868', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'Monash', '2018-01-31', 'Student', '2018-01-15', 'NBFGFGFG', '0000-00-00', '21 DRERERE', '', '', '', '', '23 RERERE', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 05:34:44', '0000-00-00', 'Facebook', 0, 'stefan', 'Mbis', '2018-01-16', 'migration', 'Mbis', '0000-00-00'),
(30, 'SAS23232', 'SSASAS2323232', '', '2018-01-22', 'Indonesia', '', '09453535353', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'Monash', '2018-01-17', 'Student', '2018-01-22', 'B8349343', '2018-01-30', '23 gt', '', '', '', '', '234 TRUTH', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 05:42:58', '0000-00-00', 'Student', 0, 'stefan', 'Mbis', '2018-01-24', 'migration', 'Mbis', '2018-01-24'),
(31, 'SAS232323', 'SSASAS23232323', '', '2018-01-23', 'Indonesia', '', '089969', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'Monash', '2018-01-24', 'Student', '2018-01-30', '', '0000-00-00', '21 DRERERE', '', '', '', '', '23 RERERE', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 05:48:28', '0000-00-00', 'Facebook', 0, '', 'Mbis', '2018-01-30', 'migration', 'Mbis', '0000-00-00'),
(32, 'test2', 'Ferib', '', '2018-01-22', 'Indonesia', '', '0865656565', 'stefan.derian@gmail.com', 2, '', 'MBIS', 'Monash', '2018-01-30', 'Student', '2018-01-16', '', '0000-00-00', '23 gt', '', '', '', '', '343 GRTRT', '', '', '', '', 0, 0, '', 'new client', '2018-01-18 06:31:25', '0000-00-00', 'Student', 0, '', 'IPA', '2018-01-17', 'migration', 'IPA', '0000-00-00'),
(33, 'rererer', 'rererer', '', '2018-01-10', 'rererererer', '', '0909008080', 'shar0012@student.monash.edu', 6, '', 'sasa', 'Monash', '2018-01-11', 'Student', '2018-01-31', 'B8349343', '2018-01-23', '123 roostrt', '', '', '', '', '1234 HAHA', '', '', '', '', 0, 0, '', 'new client', '2018-01-19 05:17:05', '0000-00-00', 'Student', 0, 'stefan', 'Mbis', '2018-01-30', 'migration', 'Mbis', '2018-01-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
