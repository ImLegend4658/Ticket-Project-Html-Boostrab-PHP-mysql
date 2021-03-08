-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2021 at 08:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Forms`
--

CREATE TABLE `Forms` (
  `idForm` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Forms`
--

INSERT INTO `Forms` (`idForm`, `name`) VALUES
(1, 'Genenral Issues'),
(2, 'Network'),
(34, 'New hardware');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `Admin_Email` varchar(100) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Tickits`
--

CREATE TABLE `Tickits` (
  `TickID` int(11) NOT NULL,
  `name_problem` varchar(20) DEFAULT NULL,
  `Discrip` varchar(500) DEFAULT NULL,
  `Affect` enum('Yes','No') DEFAULT 'No',
  `Importent` enum('low','mid','hight') DEFAULT 'low',
  `status` enum('Open','On_Hold','CLOSED') DEFAULT 'Open',
  `Create_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `idForm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tickits`
--

INSERT INTO `Tickits` (`TickID`, `name_problem`, `Discrip`, `Affect`, `Importent`, `status`, `Create_AT`, `UserID`, `idForm`) VALUES
(124, 'my network is down', 'Hello, please fix the network as soon as possible.', 'Yes', 'hight', 'Open', '2021-03-08 06:46:12', 1, 2),
(125, 'sd', '?', 'Yes', 'low', 'Open', '2021-03-08 06:47:45', 1, 1),
(126, 'computer is slow', 'Hi, I need to upgrade my Ram please.\r\nThanks', 'Yes', 'hight', 'Open', '2021-03-08 06:49:00', 1, 1),
(127, 'A new laptop', 'Hello, please get me a new laptop and ssd too.', 'No', 'low', 'Open', '2021-03-08 06:50:46', 3, 34),
(128, 'test', 'test', 'Yes', 'mid', 'Open', '2021-03-08 06:51:05', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `names` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `job` varchar(30) DEFAULT NULL,
  `locations` varchar(50) DEFAULT NULL,
  `roles` enum('user','Superadvisor','admin') DEFAULT 'user',
  `creat_AT` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `names`, `email`, `Password`, `job`, `locations`, `roles`, `creat_AT`) VALUES
(1, 'MrAziz', 'Aziz@gmail.com', '$2y$10$nmhaBNMRLYpJ3OwyZjwVG.AOrMk5IY4w9K9Ro4Inc1DMDQbn16jYS', 'Information Technology', 'Dammam', 'admin', '2021-03-06 21:25:20'),
(2, 'Khalid', 'K@gmail.com', '$2y$10$amn0ggU/eY.hHEm/mrJPE.vEs2h/LyRezvwn0a.yIAIXgFJIXr70y', 'Adminstritor', 'Khaber', 'Superadvisor', '2021-03-06 21:25:20'),
(3, 'Saud', 's@gmail.com', '$2y$10$ilYWkbJIxapKkTenGhFzP.5h8DRCfzfXh/5ZQS5P3wtz5VMg1xgY2', 'hr', 'Alhasa', 'user', '2021-03-06 21:26:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Forms`
--
ALTER TABLE `Forms`
  ADD PRIMARY KEY (`idForm`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tickits`
--
ALTER TABLE `Tickits`
  ADD PRIMARY KEY (`TickID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Forms`
--
ALTER TABLE `Forms`
  MODIFY `idForm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tickits`
--
ALTER TABLE `Tickits`
  MODIFY `TickID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
