-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 07:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bahrainc`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditorium`
--

CREATE TABLE `auditorium` (
  `aid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `seatno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditorium`
--

INSERT INTO `auditorium` (`aid`, `name`, `seatno`) VALUES
(1, 'Auditorium 1', 30),
(2, 'Auditorium 2', 30),
(3, 'Auditorium 3', 60),
(4, 'Auditorium 4', 60);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `BID` int(11) NOT NULL,
  `Credit` float DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`BID`, `Credit`, `UserID`) VALUES
(1, 5, 24),
(3, 20.5, 26),
(5, 0, 28),
(6, 0, 36),
(7, 0, 42),
(8, 0, 43),
(9, 0, 44),
(10, 0, 45),
(11, 30, 46),
(12, 0, 48),
(13, 0, 50),
(14, 0, 51),
(16, 2, 52);

-- --------------------------------------------------------

--
-- Table structure for table `mcomments`
--

CREATE TABLE `mcomments` (
  `cid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcomments`
--

INSERT INTO `mcomments` (`cid`, `mid`, `username`, `email`, `comment`) VALUES
(13, 3, 'zubair abdul rashid', '20140726@stu.uob.edu.bh', 'dasdas'),
(14, 3, 'zubair abdul rashid', '20140726@stu.uob.edu.bh', 'dsadasasd'),
(15, 3, 'zubair abdul rashid ', 'deathxlive.lx@gmail.com', 'ddsadasdasdasdsa'),
(16, 1, 'khalid', 'khalid@gmail.com', 'I loved this movie !'),
(17, 1, 'khalid', 'khalid@gmail.com', 'dasdas'),
(18, 1, 'fasfsa', 'deathxlive.lx@gmail.com', 'fdsfsdgwgw  egwwe we'),
(19, 6, 'fasfsa', 'deathxlive.lx@gmail.com', 'dasdas'),
(20, 6, 'fasfsa', 'deathxlive.lx@gmail.com', 'asdasdad'),
(22, 3, 'khalid', 'khalid@gmail.com', 'dsadsadasdasddsadsdadsdadas'),
(23, 5, 'khalid', 'khalid@gmail.com', 'dsadadasda');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mid` int(10) NOT NULL,
  `num` int(10) NOT NULL,
  `h2` varchar(50) NOT NULL,
  `src` varchar(50) NOT NULL,
  `cat` varchar(500) NOT NULL,
  `releasedate` varchar(200) NOT NULL,
  `agerestriction` varchar(200) NOT NULL,
  `runtime` varchar(200) NOT NULL,
  `trailer` varchar(100) NOT NULL,
  `p2` varchar(500) NOT NULL,
  `banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`mid`, `num`, `h2`, `src`, `cat`, `releasedate`, `agerestriction`, `runtime`, `trailer`, `p2`, `banner`) VALUES
(1, 0, 'Gurdian of the Galxy vol 2', 'images/pic01.jpg', 'Family,Fantasy,Musical', '16/03/2017', 'PG-13', '2h 10m.', 'https://www.youtube.com/embed/duGqrYw4usE', 'Set to the backdrop of \'Awesome Mixtape #2,\' Marvel\'s Guardians of the Galaxy Vol. 2 continues the team\'s adventures as they traverse the outer reaches of the cosmos. The Guardians must fight to keep their newfound family together as they unravel the mysteries of Peter Quill\'s true parentage. Old foes become new allies and fan-favorite characters from the classic comics will come to our heroes\' aid as the Marvel cinematic universe continues to expand. Written by Marvel Studios ', 'images/moviebanner/img01.jpg'),
(3, 1, 'Aftermath', 'images/pic02.jpg', 'Family,Fantasy,Musical', '', '', '', 'https://www.youtube.com/embed/oUXUm6he2-s', 'Two strangers\' lives become inextricably bound together after a devastating plane crash. Inspired by actual events, AFTERMATH tells a story of guilt and revenge after an air traffic controller\'s (Scoot McNairy) error causes the death of a construction foreman\'s (Arnold Schwarzenegger) wife and daughter. ', 'images/moviebanner/img02.jpg'),
(5, 2, 'Feugiat', 'images/pic03.jpg', 'ed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.', '', '', '', '', '0', ''),
(6, 3, 'Tempus', 'images/pic04.jpg', 'Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.', '', '', '', '', '0', ''),
(21, 4, 'resident evil', 'images/21.jpg', 'catogory:romance,fantasy,zombie<br/>runtime:2h 30min<br/>rate:13 pg<br/>', '', '', '', 'https://www.youtube.com/embed/79Sd4GtOXuI', 'Picking up immediately after the events in Resident Evil: Retribution, Alice (Milla Jovovich) is the only survivor of what was meant to be humanity\'s final stand against the undead. Now, she must return to where the nightmare began - The Hive in Raccoon City, where the Umbrella Corporation is gathering its forces for a final strike against the only remaining survivors of the apocalypse. Written by Screen Gems / Constantin ', 'images/moviebanner/21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `screenid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `seatid` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `TicketCode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `screenid`, `userid`, `seatid`, `active`, `TicketCode`) VALUES
(1, 3, 52, 50, 1, 0),
(3, 3, 51, 51, 1, 0),
(9, 3, 52, 59, 1, 0),
(23, 3, 52, 88, 1, 0),
(27, 3, 52, 79, 1, 0),
(28, 3, 52, 75, 1, 0),
(29, 3, 52, 89, 1, 0),
(30, 3, 52, 68, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `id` int(11) NOT NULL,
  `seatID` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `screeningID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `id` int(11) NOT NULL,
  `movieID` int(11) NOT NULL,
  `auditoriumID` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`id`, `movieID`, `auditoriumID`, `start`) VALUES
(3, 1, 2, '2017-05-25 03:10:00'),
(4, 3, 1, '2017-05-25 01:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `sid` int(11) NOT NULL,
  `row` char(1) NOT NULL,
  `number` int(1) NOT NULL,
  `auditoriumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`sid`, `row`, `number`, `auditoriumID`) VALUES
(0, 'A', 0, 1),
(1, 'A', 1, 1),
(2, 'A', 2, 1),
(3, 'A', 3, 1),
(4, 'A', 4, 1),
(5, 'A', 5, 1),
(6, 'A', 6, 1),
(7, 'A', 7, 1),
(8, 'A', 8, 1),
(9, 'A', 9, 1),
(10, 'B', 0, 1),
(11, 'B', 1, 1),
(12, 'B', 2, 1),
(13, 'B', 3, 1),
(14, 'B', 4, 1),
(15, 'B', 5, 1),
(16, 'B', 6, 1),
(17, 'B', 7, 1),
(18, 'B', 8, 1),
(19, 'B', 9, 1),
(20, 'C', 0, 1),
(21, 'C', 1, 1),
(22, 'C', 2, 1),
(23, 'C', 3, 1),
(24, 'C', 4, 1),
(25, 'C', 5, 1),
(26, 'C', 6, 1),
(27, 'C', 7, 1),
(28, 'C', 8, 1),
(29, 'C', 9, 1),
(30, 'D', 0, 1),
(31, 'D', 1, 1),
(32, 'D', 2, 1),
(33, 'D', 3, 1),
(34, 'D', 4, 1),
(35, 'D', 5, 1),
(36, 'D', 6, 1),
(37, 'D', 7, 1),
(38, 'D', 8, 1),
(39, 'D', 9, 1),
(40, 'E', 0, 1),
(41, 'E', 1, 1),
(42, 'E', 2, 1),
(43, 'E', 3, 1),
(44, 'E', 4, 1),
(45, 'E', 5, 1),
(46, 'E', 6, 1),
(47, 'E', 7, 1),
(48, 'E', 8, 1),
(49, 'E', 9, 1),
(50, 'A', 0, 2),
(51, 'A', 1, 2),
(52, 'A', 2, 2),
(53, 'A', 3, 2),
(54, 'A', 4, 2),
(55, 'A', 5, 2),
(56, 'A', 6, 2),
(57, 'A', 7, 2),
(58, 'A', 8, 2),
(59, 'A', 9, 2),
(60, 'B', 0, 2),
(61, 'B', 1, 2),
(62, 'B', 2, 2),
(63, 'B', 3, 2),
(64, 'B', 4, 2),
(65, 'B', 5, 2),
(66, 'B', 6, 2),
(67, 'B', 7, 2),
(68, 'B', 8, 2),
(69, 'B', 9, 2),
(70, 'C', 0, 2),
(71, 'C', 1, 2),
(72, 'C', 2, 2),
(73, 'C', 3, 2),
(74, 'C', 4, 2),
(75, 'C', 5, 2),
(76, 'C', 6, 2),
(77, 'C', 7, 2),
(78, 'C', 8, 2),
(79, 'C', 9, 2),
(80, 'D', 0, 2),
(81, 'D', 1, 2),
(82, 'D', 2, 2),
(83, 'D', 3, 2),
(84, 'D', 4, 2),
(85, 'D', 5, 2),
(86, 'D', 6, 2),
(87, 'D', 7, 2),
(88, 'D', 8, 2),
(89, 'D', 9, 2),
(90, 'E', 0, 2),
(91, 'E', 1, 2),
(92, 'E', 2, 2),
(93, 'E', 3, 2),
(94, 'E', 4, 2),
(95, 'E', 5, 2),
(96, 'E', 6, 2),
(97, 'E', 7, 2),
(98, 'E', 8, 2),
(99, 'E', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topupreq`
--

CREATE TABLE `topupreq` (
  `rid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `pmethod` varchar(100) NOT NULL,
  `exp` varchar(100) NOT NULL,
  `cnum` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profilepic` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `profilepic`, `firstname`, `lastname`, `email`, `password`, `birthdate`, `type`) VALUES
(24, 'khfgkh', '', 'mkhgf', 'ahmed', 'dead@gravyard.com', '123', ' 	2017-08-08', 'user'),
(26, 'khalid', '', 'khalid', 'ahmed', 'sdadsdsanl@dsgdgs.com', '123456', '2017-05-08', 'user'),
(28, 'ali1231', 'upload/28.jpg', 'khalid', 'moh', 'Alive@hotmail.com', '123456', '2017-04-21', 'user'),
(36, 'dsadasd', '', 'dsadas', 'dasdas', 'sdadsanl@dsgdgs.comds', '1111', '2017-05-01', 'user'),
(37, 'ali1', '', 'ali', 'khalid', 'dasdas@gmail.com', '123', '20-may-2017', 'ADMIN'),
(41, 'aliA', '', 'ali', 'khalid', 'dasdhhas@gmail.com', '202cb962ac59075b964b07152d234b70', '20-may-2017', 'ADMIN'),
(42, 'aaa', '', 'aaaa', 'dvsfds', 'aaaa@gmail.com', 'aaa', 'fafsafasafsfas', 'user'),
(43, 'moh1033', '', 'moh\'d', 'ali', 'lovetheworld@gmail.com', '55eaaef04f65edffada43eafff720852', '2017-03-21', 'user'),
(44, 'ali123', '', 'khalid', 'ahmed', 'deathxlive.lx@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-02-1', 'user'),
(45, 'admin', 'upload/45.jpg', 'ADMIN', 'admin', 'admin@c.gof', '21232f297a57a5a743894a0e4a801fc3', '', 'ADMIN'),
(46, 'aaaa', 'upload/46.jpg', 'aaaa', 'aaa', 'aaa@gmail.v', '74b87337454200d4d33f80c4663dc5e5', '', 'user'),
(47, 'houssam', '', 'sam', 'jam', 'samjsam@hotmail.com', '202cb962ac59075b964b07152d234b70', '2017-03-03', 'user'),
(48, 'daniel', '', 'daniel', 'jam', 'danny@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '2017-05-04', 'user'),
(50, 'danny', '', 'aa', 'aa', 'aa@gmail.con', 'd9b1d7db4cd6e70935368a1efb10e377', '2017-05-03', 'user'),
(51, 'danny1', '', 'hello', 'itsme', 'one@gmail', 'ec6a6536ca304edf844d1d248a4f08dc', '2017-05-02', 'user'),
(52, 'danny2', '', 'aaa', 'aaa', '1234@gmail', '81dc9bdb52d04dc20036dbd8313ed055', '2017-05-09', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditorium`
--
ALTER TABLE `auditorium`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `mcomments`
--
ALTER TABLE `mcomments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `screenid` (`screenid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `seatid` (`seatid`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seatID` (`seatID`),
  ADD KEY `reservationID` (`reservationID`),
  ADD KEY `screeningID` (`screeningID`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movieID` (`movieID`),
  ADD KEY `auditoriumID` (`auditoriumID`),
  ADD KEY `auditoriumID_2` (`auditoriumID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `auditoriumID` (`auditoriumID`);

--
-- Indexes for table `topupreq`
--
ALTER TABLE `topupreq`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditorium`
--
ALTER TABLE `auditorium`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mcomments`
--
ALTER TABLE `mcomments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `topupreq`
--
ALTER TABLE `topupreq`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`uid`);

--
-- Constraints for table `mcomments`
--
ALTER TABLE `mcomments`
  ADD CONSTRAINT `mcomments_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movies` (`mid`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`screenid`) REFERENCES `screening` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`seatid`) REFERENCES `seat` (`sid`) ON UPDATE CASCADE;

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`seatID`) REFERENCES `seat` (`sid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserved_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reserved_ibfk_3` FOREIGN KEY (`screeningID`) REFERENCES `screening` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `screening_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movies` (`mid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `screening_ibfk_2` FOREIGN KEY (`auditoriumID`) REFERENCES `auditorium` (`aid`) ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`auditoriumID`) REFERENCES `auditorium` (`aid`) ON UPDATE CASCADE;

--
-- Constraints for table `topupreq`
--
ALTER TABLE `topupreq`
  ADD CONSTRAINT `topupreq_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
