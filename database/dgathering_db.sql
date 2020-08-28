-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 07:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgathering_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_startDate` date NOT NULL,
  `event_endDate` date NOT NULL,
  `event_time` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_created` datetime NOT NULL DEFAULT current_timestamp(),
  `event_type` int(11) NOT NULL,
  `event_guide` longtext NOT NULL,
  `event_remarks` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `event_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_criteria`
--

CREATE TABLE `event_criteria` (
  `event_criteria_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL,
  `criteria_percent` int(11) NOT NULL,
  `max_range` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `event_participants_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `event_participants_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judges_event`
--

CREATE TABLE `judges_event` (
  `judges_event_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judges_scores`
--

CREATE TABLE `judges_scores` (
  `judges_scores_id` int(11) NOT NULL,
  `event_participants_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `event_criteria_id` int(11) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `date`, `message`) VALUES
(1, 0, '2020-05-02 20:06:47', ' has logged in'),
(2, 1, '2020-05-02 20:06:52', 'chiekkored has logged in'),
(3, 1, '2020-05-02 20:08:51', 'chiekkored has logged out'),
(4, 1, '2020-05-02 20:08:54', 'chiekkored has logged in');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_image`, `username`, `password`, `fname`, `lname`, `role`, `status`) VALUES
(1, '2c94764ef97ed8d76b109389eb781093.jpg', 'chiekkored', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chiekko', 'Red', 'Administrator', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_criteria`
--
ALTER TABLE `event_criteria`
  ADD PRIMARY KEY (`event_criteria_id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`event_participants_id`);

--
-- Indexes for table `judges_event`
--
ALTER TABLE `judges_event`
  ADD PRIMARY KEY (`judges_event_id`);

--
-- Indexes for table `judges_scores`
--
ALTER TABLE `judges_scores`
  ADD PRIMARY KEY (`judges_scores_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_criteria`
--
ALTER TABLE `event_criteria`
  MODIFY `event_criteria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `event_participants_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judges_event`
--
ALTER TABLE `judges_event`
  MODIFY `judges_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judges_scores`
--
ALTER TABLE `judges_scores`
  MODIFY `judges_scores_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
