-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 11:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `TID` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `task` varchar(256) NOT NULL,
  `status` varchar(28) NOT NULL,
  `UID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`TID`, `username`, `task`, `status`, `UID`) VALUES
('', 'Mani', 'debug', 'In progress', 'UID20230810222254352'),
('TID20230810203259270', 'Manish', 'full stack', 'In progress', 'UID20230810185229118'),
('TID20230810203405129', 'Manish', 'frontend designer', 'In progress', 'UID20230810185911355'),
('TID20230812122017753', 'Manish111', 'test', 'In progress', 'UID20230812121908002'),
('TID20230812122027052', 'Manish', 'code review', 'In progress', 'UID20230810185911355');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `username`) VALUES
('', 'Manish'),
('UID20230810185229118', 'Manish'),
('UID20230810185651555', 'Manish'),
('UID20230810185911355', 'Manish'),
('UID20230810190509351', 'Manish3'),
('UID20230810222254352', 'Mani'),
('UID20230812121908002', 'Manish111'),
('UID20230812121926610', 'Manish1111111'),
('UID20230812121954721', 'Mani1233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
