-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 07:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monvellidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookroom`
--

CREATE TABLE `bookroom` (
  `roomID` int(11) NOT NULL,
  `userID` int(40) NOT NULL,
  `nameb` varchar(40) NOT NULL,
  `surnameb` varchar(40) NOT NULL,
  `emailb` varchar(40) NOT NULL,
  `guests` int(100) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookroom`
--

INSERT INTO `bookroom` (`roomID`, `userID`, `nameb`, `surnameb`, `emailb`, `guests`, `checkin`, `checkout`) VALUES
(2, 15, 'Adea', 'Mustafa', 'adea@gmail.com', 0, '2024-02-03', '2024-02-02'),
(4, 16, 'Arte', 'Mustafa', 'arta@gmail.com', 6, '2024-02-02', '2024-02-10'),
(5, 24, 'Rona', 'Hashani', 'rona12@gmail.com', 3, '2024-02-09', '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offersID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(40) NOT NULL,
  `price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offersID`, `name`, `description`, `price`) VALUES
(1, 'sdssdds', 'dreka', 12334);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `phoneNumber` int(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fname`, `phoneNumber`, `email`, `password`) VALUES
(5, 'Delfina', 44111111, 'dp@gmail.com', 'Delfina123'),
(9, 'Rrona', 1010100101, 'rr@gmail.com', 'Rrona123'),
(10, 'Delfina', 1010100101, 'delfinaplakolliii@gmail.com', 'Delfi123'),
(13, 'RRONAAAAA', 22222, 'ida.rusi@hotmail.com', 'Laida111'),
(15, 'Adea', 2147483647, 'adea@gmail.com', 'Adea1234'),
(16, 'Arta', 2147483647, 'arta@gmail.com', 'Arta1234'),
(17, 'Laida', 49199450, 'rusinovcilaida13@gmail.com', 'Laida123'),
(18, 'Elda', 5983221, 'elda@gmail.com', 'Elda1234'),
(20, 'Adrian', 49188765, 'adri1@gmail.com', 'Adrian123'),
(21, 'Adriana', 5983221, 'adri12@gmail.com', 'Laida1234'),
(22, 'Edi', 491998364, 'edi123@gmail.com', 'Ediedi123'),
(24, 'Rona', 98462, 'rona12@gmail.com', 'Rona1234'),
(25, 'Ardi', 49183745, 'ardi123@gmail.com', 'Ardi1234'),
(27, 'adriana', 0, 'adriana@gmail.com', 'adrinana123'),
(28, 'Lejla', 5983221, 'lejlag1@gmail.com', 'Lejla123'),
(29, 'Aldo', 491876, 'aldo12@gmail.com', 'Aldo1234'),
(31, 'Aldo', 491876, 'aldo12@gmail.com', 'Aldo1234'),
(32, 'Flora', 498163, 'flora123@gmail.com', 'Flora1234'),
(33, 'Klesta', 4981633, 'klestal@gmail.com', 'Klesta1234'),
(34, 'Ardit', 49883634, 'ardits@gmail.com', 'Ardit1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `bookroom`
--
ALTER TABLE `bookroom`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offersID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookroom`
--
ALTER TABLE `bookroom`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`offersID`);

--
-- Constraints for table `bookroom`
--
ALTER TABLE `bookroom`
  ADD CONSTRAINT `bookroom_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
