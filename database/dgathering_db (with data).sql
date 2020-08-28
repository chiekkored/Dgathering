-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 02:00 PM
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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `slug`, `event_image`, `event_startDate`, `event_endDate`, `event_time`, `event_venue`, `event_created`, `event_type`, `event_guide`, `event_remarks`, `created_by`, `event_status`) VALUES
(1, 'Online Choreo Challenge', 'online-choreo-challenge', 'e90ae61e976c8a4f443d63df84cd98a2.jpg', '2020-04-29', '0000-00-00', '18:00:00', '', '2020-04-09 06:59:43', 1, '', '', 'chiekkored', 2),
(2, 'Sample Percentage Event', 'sample-percentage-event', '6ac8c5232d93a672221a323d09dec0b3.jpg', '2020-04-19', '0000-00-00', '15:00:00', '', '2020-04-09 07:01:06', 2, '', '', 'chiekkored', 2),
(3, 'Sample Score Range', 'sample-score-range', '01e80ffe7ea1135801a9a8eb76e14563.jpg', '2020-04-25', '0000-00-00', '12:00:00', '', '2020-04-09 07:02:13', 3, '', '', 'chiekkored', 2),
(4, 'To be cancelled', 'to-be-cancelled', '4833e908c110c6935cd078f9c28fbc4e.jpg', '2020-04-10', '0000-00-00', '18:06:00', '', '2020-04-09 07:41:15', 1, '', '', 'chiekkored', 3),
(5, 'To be removed', 'to-be-removed', '62f9463e6de0045c46b5463a79d1502c.jpg', '2020-04-13', '0000-00-00', '14:22:00', '', '2020-04-09 07:41:54', 1, '', '', 'chiekkored', 4),
(6, 'Test', 'test', '84aa348b6735514675769146648aa4d3.jpg', '2020-04-21', '0000-00-00', '05:51:00', '', '2020-04-09 10:15:30', 3, '', '', 'chiekkored', 4),
(7, 'Online Freestyle Challenge', 'online-freestyle-challenge', '61d24a0aa0b112cc9a0b1d6143ea08e6.jpg', '2020-04-20', '0000-00-00', '18:00:00', '', '2020-04-18 14:09:07', 4, '', '', 'chiekkored', 2),
(8, 'Test', 'test', '61d24a0aa0b112cc9a0b1d6143ea08e6.jpg', '2020-04-29', '2020-05-01', '03:33:00', 'Here', '2020-04-28 03:51:24', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut condimentum felis. Sed vel finibus metus. Fusce non pulvinar risus. Pellentesque pretium varius sem, in congue ipsum varius nec. Fusce rhoncus leo et enim auctor lacinia. Etiam non justo magna. Praesent a odio et turpis viverra hendrerit. Vestibulum sed fermentum neque.\r\n\r\nSed suscipit tortor non quam vehicula porta. Mauris at ultrices neque. Aenean ut sem in lectus faucibus posuere. Nunc massa dui, elementum sed fringilla et', 'Remarks', 'chiekkored', 2),
(9, 'Etheh', 'etheh', 'c29729c5fbc20966a0759cde34d06a5e.png', '2020-04-30', '2020-05-01', '14:22:00', '', '2020-04-28 06:25:21', 1, '<p>adwad awd a</p><p>erhrthrh</p><p><br></p>', '', 'chiekkored', 0),
(10, 'Hrthrt', 'hrthrt', '65ee1fac173dc700cf32faad340cca6c.jpg', '2020-05-09', '2020-06-06', '11:11:00', 'Grgrg', '2020-04-28 06:31:52', 1, '<p>sffefe <span style=\"font-size: 1rem;\">f s</span></p><p>ef</p><p>sef</p><p>s&nbsp;</p><p><br></p>', 'Andjawd da ', 'chiekkored', 2),
(11, 'Adwad', 'adwad', '3b2960716ab76257897036274e3a38dd.png', '2020-05-09', '2020-06-06', '11:11:00', '', '2020-04-28 21:08:00', 1, 'Mechhhhhhhhhh', '', 'chiekkored', 0),
(12, 'Sample', 'sample', 'addf446d1a95ac3fedb38ba12f1cf92c.png', '2020-05-19', '2020-05-22', '11:11:00', '', '2020-05-02 00:22:28', 2, '<ol><li>One</li><li>Two</li><li>Three</li></ol>', '', 'chiekkored', 4),
(13, 'Jjjjjjjjjjjjj', 'jjjjjjjjjjjjj', '20733df4731c953e6035b80c2462dade.jpg', '2020-05-26', '0000-00-00', '14:22:00', '', '2020-05-02 03:44:03', 3, '<p>aaaaa</p>', '', 'chiekkored', 0),
(14, '123123123', '123123123', '813573cfa06a69d821e5ed43422bde02.jpg', '2020-05-02', '2020-05-03', '11:11:00', '', '2020-05-02 04:01:36', 2, '<p>aaa</p>', '', 'chiekkored', 0);

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

--
-- Dumping data for table `event_criteria`
--

INSERT INTO `event_criteria` (`event_criteria_id`, `event_id`, `criteria_name`, `criteria_percent`, `max_range`) VALUES
(1, 2, 'Creativity', 30, 0),
(2, 2, 'Choreography', 30, 0),
(3, 2, 'Originality', 40, 0),
(4, 3, 'Choreography', 0, 10),
(5, 3, 'Originality', 0, 10),
(6, 3, 'Creativity', 0, 10),
(7, 6, 'Hey', 0, 18),
(8, 6, 'Heyyy', 0, 18),
(9, 12, 'Crit 1', 50, 0),
(10, 12, 'Crit 2', 50, 0),
(11, 13, 'Crit 1', 0, 10),
(12, 13, 'Crit 2', 0, 10),
(13, 14, 'Crit1', 50, 0),
(14, 14, 'Crit2', 50, 0);

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

--
-- Dumping data for table `event_participants`
--

INSERT INTO `event_participants` (`event_participants_id`, `event_id`, `fname`, `bname`, `hometown`, `remark`, `event_participants_status`) VALUES
(1, 1, 'John', 'Smith', '', '', 0),
(2, 1, 'Paul', 'Mcdonals', '', '', 0),
(3, 1, 'Thomas', 'Blaque', '', '', 0),
(4, 3, 'Charles', 'Gray', '', '', 0),
(5, 3, 'James', 'Bryan', '', '', 0),
(6, 2, 'Aaron', 'Tim', '', '', 0),
(7, 2, 'Lili', 'Tekken', '', '', 0),
(8, 7, 'Russel', 'Balucos', '', '', 0),
(9, 7, 'Shihanmaui', 'Ricablanca', '', '', 0),
(10, 7, 'Christian Brent', 'Tabalin', '', '', 0),
(11, 7, 'Markboy aUXTERO', 'Sevilla', '', '', 0),
(12, 7, 'Jasmin', 'Estenzo', '', '', 0),
(13, 7, 'Jepoy Casas', 'Toledo', '', '', 0),
(14, 7, 'Ronnie', 'Torren', '', '', 0),
(15, 7, 'Elsh', 'Fernandez', '', '', 0),
(16, 7, 'Earl', 'Ocampo', '', '', 0),
(17, 7, 'Jayrald', 'Espinosa', '', '', 0),
(18, 7, 'Regie', 'Lavestre', '', '', 0),
(19, 7, 'Jeremiah', 'Sarencio', '', '', 0),
(20, 7, 'James Clydel', 'Phala', '', '', 0),
(21, 7, 'Christian', 'Peligro', '', '', 0),
(22, 7, 'Mark Joseph', 'Trazona', '', '', 0),
(23, 7, 'Burnok', 'Ross', '', '', 0),
(24, 8, 'Frelyn', 'TCHALLA', 'CEBUUU', 'https://www.facebook.com/chiekko.red', 0),
(25, 8, 'Chiekko Red', 'Chikoredo', 'Cebu', 'This is a test remark', 0),
(26, 12, 'Name Sample 1', 'Battle Name 1', 'Cebu', 'Remark 1', 0),
(27, 12, 'Name Sample 2', 'Battle Name 2', 'Cebuu', 'https://www.facebook.com/dgathering2020', 0),
(28, 13, 'Part 1', 'Bat 1', 'Cc', 'Https://www.facebook.com/', 0),
(29, 13, 'Part 2', 'Bat 2', 'Cebuu', 'Remark 2', 0),
(30, 14, 'P1', 'B1', 'Cebu', 'Https://www.facebook.com/', 0),
(31, 14, 'P2', 'B2', 'Cc', 'Remark', 0),
(32, 10, 'Full Name 1', 'Bat Name 1', 'Cc', 'Https://twitter.com/home', 0),
(33, 10, 'Full Name 2', 'Bat Name 2', 'Cebuu', 'None', 0),
(34, 13, 'A', '', 'A', '', 0),
(35, 13, 'B', '', 'B', '', 0);

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

--
-- Dumping data for table `judges_event`
--

INSERT INTO `judges_event` (`judges_event_id`, `event_id`, `judge_id`, `status`) VALUES
(1, 1, 5, 2),
(2, 1, 4, 2),
(3, 2, 3, 2),
(4, 2, 2, 2),
(5, 3, 5, 2),
(6, 3, 4, 2),
(7, 3, 3, 2),
(8, 3, 2, 2),
(9, 4, 5, 0),
(10, 4, 4, 0),
(11, 4, 3, 0),
(12, 4, 2, 0),
(13, 5, 4, 0),
(14, 5, 3, 0),
(15, 6, 2, 0),
(16, 7, 9, 2),
(17, 7, 8, 2),
(18, 7, 7, 2),
(19, 7, 6, 2),
(20, 7, 4, 2),
(21, 8, 9, 0),
(22, 9, 8, 1),
(23, 10, 7, 1),
(24, 11, 6, 0),
(25, 11, 5, 0),
(26, 11, 4, 0),
(27, 9, 8, 1),
(28, 9, 8, 1),
(29, 9, 8, 1),
(30, 9, 8, 1),
(31, 9, 8, 1),
(32, 9, 8, 1),
(33, 9, 8, 1),
(34, 9, 8, 0),
(35, 10, 7, 1),
(36, 10, 7, 1),
(37, 10, 7, 1),
(38, 10, 7, 1),
(39, 10, 7, 2),
(40, 12, 5, 2),
(41, 12, 3, 0),
(42, 13, 8, 2),
(43, 13, 7, 1),
(44, 13, 8, 2),
(45, 13, 7, 1),
(46, 13, 8, 2),
(47, 13, 7, 0),
(48, 14, 2, 0);

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

--
-- Dumping data for table `judges_scores`
--

INSERT INTO `judges_scores` (`judges_scores_id`, `event_participants_id`, `event_id`, `judge_id`, `event_criteria_id`, `score`) VALUES
(1, 1, 1, 5, 0, 88),
(2, 2, 1, 5, 0, 95),
(3, 3, 1, 5, 0, 51),
(4, 1, 1, 4, 0, 89),
(5, 2, 1, 4, 0, 32),
(6, 3, 1, 4, 0, 46),
(7, 6, 2, 2, 1, 8),
(8, 6, 2, 2, 2, 6),
(9, 6, 2, 2, 3, 9),
(10, 7, 2, 2, 1, 9),
(11, 7, 2, 2, 2, 9),
(12, 7, 2, 2, 3, 6),
(13, 6, 2, 3, 1, 5),
(14, 6, 2, 3, 2, 6),
(15, 6, 2, 3, 3, 2),
(16, 7, 2, 3, 1, 4),
(17, 7, 2, 3, 2, 6),
(18, 7, 2, 3, 3, 8),
(19, 4, 3, 5, 4, 3.8),
(20, 4, 3, 5, 5, 5.5),
(21, 4, 3, 5, 6, 4),
(22, 5, 3, 5, 4, 8),
(23, 5, 3, 5, 5, 10),
(24, 5, 3, 5, 6, 10),
(25, 4, 3, 4, 4, 2),
(26, 4, 3, 4, 5, 3),
(27, 4, 3, 4, 6, 2),
(28, 5, 3, 4, 4, 8),
(29, 5, 3, 4, 5, 7),
(30, 5, 3, 4, 6, 9),
(31, 4, 3, 3, 4, 5),
(32, 4, 3, 3, 5, 3),
(33, 4, 3, 3, 6, 7),
(34, 5, 3, 3, 4, 8),
(35, 5, 3, 3, 5, 10),
(36, 5, 3, 3, 6, 9),
(37, 4, 3, 2, 4, 7),
(38, 4, 3, 2, 5, 7),
(39, 4, 3, 2, 6, 8.5),
(40, 5, 3, 2, 4, 8),
(41, 5, 3, 2, 5, 10),
(42, 5, 3, 2, 6, 10),
(43, 8, 7, 4, 0, 14),
(44, 9, 7, 4, 0, 9),
(45, 10, 7, 4, 0, 3),
(46, 11, 7, 4, 0, 15),
(47, 12, 7, 4, 0, 16),
(48, 13, 7, 4, 0, 20),
(49, 14, 7, 4, 0, 9),
(50, 15, 7, 4, 0, 11),
(51, 16, 7, 4, 0, 4),
(52, 17, 7, 4, 0, 12),
(53, 18, 7, 4, 0, 2),
(54, 19, 7, 4, 0, 12),
(55, 20, 7, 4, 0, 4),
(56, 21, 7, 4, 0, 6),
(57, 22, 7, 4, 0, 1),
(58, 23, 7, 4, 0, 22),
(59, 8, 7, 9, 0, 7),
(60, 9, 7, 9, 0, 9),
(61, 10, 7, 9, 0, 15),
(62, 11, 7, 9, 0, 14),
(63, 12, 7, 9, 0, 10),
(64, 13, 7, 9, 0, 21),
(65, 14, 7, 9, 0, 13),
(66, 15, 7, 9, 0, 11),
(67, 16, 7, 9, 0, 8),
(68, 17, 7, 9, 0, 12),
(69, 18, 7, 9, 0, 2),
(70, 19, 7, 9, 0, 6),
(71, 20, 7, 9, 0, 4),
(72, 21, 7, 9, 0, 3),
(73, 22, 7, 9, 0, 1),
(74, 23, 7, 9, 0, 20),
(75, 8, 7, 6, 0, 19),
(76, 9, 7, 6, 0, 20),
(77, 10, 7, 6, 0, 3),
(78, 11, 7, 6, 0, 5),
(79, 12, 7, 6, 0, 8),
(80, 13, 7, 6, 0, 15),
(81, 14, 7, 6, 0, 6),
(82, 15, 7, 6, 0, 17),
(83, 16, 7, 6, 0, 10),
(84, 17, 7, 6, 0, 7),
(85, 18, 7, 6, 0, 1),
(86, 19, 7, 6, 0, 24),
(87, 20, 7, 6, 0, 9),
(88, 21, 7, 6, 0, 4),
(89, 22, 7, 6, 0, 2),
(90, 23, 7, 6, 0, 22),
(91, 8, 7, 7, 0, 6),
(92, 9, 7, 7, 0, 9),
(93, 10, 7, 7, 0, 5),
(94, 11, 7, 7, 0, 21),
(95, 12, 7, 7, 0, 16),
(96, 13, 7, 7, 0, 13),
(97, 14, 7, 7, 0, 3),
(98, 15, 7, 7, 0, 19),
(99, 16, 7, 7, 0, 15),
(100, 17, 7, 7, 0, 11),
(101, 18, 7, 7, 0, 2),
(102, 19, 7, 7, 0, 17),
(103, 20, 7, 7, 0, 3),
(104, 21, 7, 7, 0, 6),
(105, 22, 7, 7, 0, 1),
(106, 23, 7, 7, 0, 9),
(107, 8, 7, 8, 0, 9),
(108, 9, 7, 8, 0, 13),
(109, 10, 7, 8, 0, 3),
(110, 11, 7, 8, 0, 11),
(111, 12, 7, 8, 0, 11),
(112, 13, 7, 8, 0, 6),
(113, 14, 7, 8, 0, 2),
(114, 15, 7, 8, 0, 10),
(115, 16, 7, 8, 0, 23),
(116, 17, 7, 8, 0, 14),
(117, 18, 7, 8, 0, 5),
(118, 19, 7, 8, 0, 20),
(119, 20, 7, 8, 0, 4),
(120, 21, 7, 8, 0, 8),
(121, 22, 7, 8, 0, 1),
(122, 23, 7, 8, 0, 6),
(123, 26, 12, 5, 0, 69),
(124, 26, 12, 5, 0, 69),
(125, 27, 12, 5, 0, 96),
(126, 27, 12, 5, 0, 96),
(127, 26, 12, 5, 9, 1),
(128, 26, 12, 5, 10, 2),
(129, 26, 12, 5, 9, 1),
(130, 26, 12, 5, 9, 2),
(131, 27, 12, 5, 10, 3),
(132, 27, 12, 5, 10, 4),
(133, 26, 12, 5, 9, 66),
(134, 26, 12, 5, 9, 67),
(135, 27, 12, 5, 9, 68),
(136, 27, 12, 5, 9, 69),
(137, 26, 12, 5, 9, 35),
(138, 26, 12, 5, 10, 36),
(139, 27, 12, 5, 9, 37),
(140, 27, 12, 5, 10, 38),
(141, 28, 13, 8, 11, 3),
(142, 28, 13, 8, 12, 2),
(143, 29, 13, 8, 11, 6),
(144, 29, 13, 8, 12, 5),
(145, 32, 10, 7, 0, 40),
(146, 33, 10, 7, 0, 50);

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
(1, 0, '2020-04-09 06:51:01', ' has logged in'),
(2, 0, '2020-04-09 06:52:57', ' has logged in'),
(3, 0, '2020-04-09 06:52:58', ' has logged in'),
(4, 0, '2020-04-09 06:53:45', ' has logged in'),
(5, 0, '2020-04-09 06:54:11', ' has logged in'),
(6, 0, '2020-04-09 06:54:13', ' has logged in'),
(7, 0, '2020-04-09 06:54:15', ' has logged in'),
(8, 0, '2020-04-09 06:54:22', ' has logged in'),
(9, 0, '2020-04-09 06:56:12', ' has logged in'),
(10, 1, '2020-04-09 06:56:17', 'chiekkored has logged in'),
(11, 1, '2020-04-09 06:57:37', 'chiekkored has added a user entry: joshua.'),
(12, 1, '2020-04-09 06:57:55', 'chiekkored has added a user entry: dale.'),
(13, 1, '2020-04-09 06:58:14', 'chiekkored has added a user entry: kaycee.'),
(14, 1, '2020-04-09 06:58:30', 'chiekkored has added a user entry: dave.'),
(15, 1, '2020-04-09 06:59:43', 'chiekkored added an event: Online Choreo Challenge'),
(16, 1, '2020-04-09 07:01:08', 'chiekkored added an event: Sample Percentage Event'),
(17, 1, '2020-04-09 07:02:13', 'chiekkored added an event: Sample Score Range'),
(18, 1, '2020-04-09 07:04:30', 'chiekkored has logged out'),
(19, 5, '2020-04-09 07:04:34', 'dave has logged in'),
(20, 5, '2020-04-09 07:04:48', 'dave has logged out'),
(21, 1, '2020-04-09 07:04:52', 'chiekkored has logged in'),
(22, 1, '2020-04-09 07:04:59', 'chiekkored activated the event: Online Choreo Challenge'),
(23, 1, '2020-04-09 07:05:17', 'chiekkored has logged out'),
(24, 5, '2020-04-09 07:05:20', 'dave has logged in'),
(25, 5, '2020-04-09 07:05:37', 'dave has logged out'),
(26, 1, '2020-04-09 07:05:41', 'chiekkored has logged in'),
(27, 1, '2020-04-09 07:05:49', 'chiekkored paused the event: Online Choreo Challenge'),
(28, 1, '2020-04-09 07:06:13', 'chiekkored added participant(s) to event: Online Choreo ChallengeSample Score RangeSample Percentage Event'),
(29, 1, '2020-04-09 07:06:34', 'chiekkored added participant(s) to event: Online Choreo ChallengeSample Score RangeSample Percentage Event'),
(30, 1, '2020-04-09 07:07:09', 'chiekkored added participant(s) to event: Online Choreo ChallengeSample Score RangeSample Percentage Event'),
(31, 1, '2020-04-09 07:07:25', 'chiekkored has logged out'),
(32, 5, '2020-04-09 07:07:28', 'dave has logged in'),
(33, 5, '2020-04-09 07:07:34', 'dave has logged out'),
(34, 1, '2020-04-09 07:07:38', 'chiekkored has logged in'),
(35, 1, '2020-04-09 07:07:44', 'chiekkored activated the event: Online Choreo Challenge'),
(36, 1, '2020-04-09 07:07:46', 'chiekkored has logged out'),
(37, 5, '2020-04-09 07:07:49', 'dave has logged in'),
(38, 5, '2020-04-09 07:09:14', 'dave has logged out'),
(39, 1, '2020-04-09 07:09:18', 'chiekkored has logged in'),
(40, 1, '2020-04-09 07:16:02', 'chiekkored has logged out'),
(41, 5, '2020-04-09 07:16:05', 'dave has logged in'),
(42, 5, '2020-04-09 07:16:10', 'dave has logged out'),
(43, 1, '2020-04-09 07:16:15', 'chiekkored has logged in'),
(44, 1, '2020-04-09 07:16:50', 'chiekkored has logged out'),
(45, 4, '2020-04-09 07:16:54', 'kaycee has logged in'),
(46, 4, '2020-04-09 07:17:21', 'kaycee has logged out'),
(47, 1, '2020-04-09 07:17:25', 'chiekkored has logged in'),
(48, 1, '2020-04-09 07:17:55', 'chiekkored toggled done to event: Online Choreo Challenge'),
(49, 1, '2020-04-09 07:29:50', 'chiekkored activated the event: Sample Percentage Event'),
(50, 1, '2020-04-09 07:29:52', 'chiekkored has logged out'),
(51, 2, '2020-04-09 07:29:56', 'joshua has logged in'),
(52, 2, '2020-04-09 07:31:37', 'joshua has logged out'),
(53, 3, '2020-04-09 07:31:42', 'dale has logged in'),
(54, 3, '2020-04-09 07:32:08', 'dale has logged out'),
(55, 1, '2020-04-09 07:32:12', 'chiekkored has logged in'),
(56, 1, '2020-04-09 07:32:36', 'chiekkored toggled done to event: Sample Percentage Event'),
(57, 1, '2020-04-09 07:36:45', 'chiekkored activated the event: Sample Score Range'),
(58, 1, '2020-04-09 07:36:47', 'chiekkored has logged out'),
(59, 5, '2020-04-09 07:36:52', 'dave has logged in'),
(60, 5, '2020-04-09 07:38:15', 'dave has logged out'),
(61, 4, '2020-04-09 07:38:20', 'kaycee has logged in'),
(62, 4, '2020-04-09 07:38:40', 'kaycee has logged out'),
(63, 3, '2020-04-09 07:38:44', 'dale has logged in'),
(64, 3, '2020-04-09 07:39:02', 'dale has logged out'),
(65, 1, '2020-04-09 07:39:06', 'chiekkored has logged in'),
(66, 1, '2020-04-09 07:39:17', 'chiekkored has logged out'),
(67, 2, '2020-04-09 07:39:20', 'joshua has logged in'),
(68, 2, '2020-04-09 07:39:42', 'joshua has logged out'),
(69, 1, '2020-04-09 07:39:47', 'chiekkored has logged in'),
(70, 1, '2020-04-09 07:40:22', 'chiekkored toggled done to event: Sample Score Range'),
(71, 1, '2020-04-09 07:41:15', 'chiekkored added an event: To be cancelled'),
(72, 1, '2020-04-09 07:41:25', 'chiekkored cancelled the event: To be cancelled'),
(73, 1, '2020-04-09 07:41:56', 'chiekkored added an event: To be removed'),
(74, 1, '2020-04-09 07:42:03', 'chiekkored deleted the event: To be removed'),
(75, 1, '2020-04-09 07:42:31', 'chiekkored has logged out'),
(76, 1, '2020-04-09 07:45:42', 'chiekkored has logged in'),
(77, 1, '2020-04-09 07:46:15', 'chiekkored has logged out'),
(78, 1, '2020-04-09 07:46:19', 'chiekkored has logged in'),
(79, 1, '2020-04-09 10:15:05', 'chiekkored has logged in'),
(80, 1, '2020-04-09 10:15:30', 'chiekkored added an event: Test'),
(81, 1, '2020-04-09 10:21:46', 'chiekkored has logged out'),
(82, 2, '2020-04-09 10:21:50', 'joshua has logged in'),
(83, 2, '2020-04-09 10:25:30', 'joshua has logged out'),
(84, 1, '2020-04-09 10:25:33', 'chiekkored has logged in'),
(85, 1, '2020-04-09 10:25:41', 'chiekkored deleted the event: Test'),
(86, 1, '2020-04-09 10:25:43', 'chiekkored has logged out'),
(87, 2, '2020-04-09 10:25:47', 'joshua has logged in'),
(88, 2, '2020-04-09 11:20:58', 'joshua has logged out'),
(89, 1, '2020-04-09 11:21:37', 'chiekkored has logged in'),
(90, 1, '2020-04-09 12:09:07', 'chiekkored has logged out'),
(91, 1, '2020-04-11 03:39:42', 'chiekkored has logged in'),
(92, 1, '2020-04-11 03:48:52', 'chiekkored has edited the account: chiekkored.'),
(93, 1, '2020-04-11 03:48:55', 'chiekkored has logged out'),
(94, 0, '2020-04-11 03:49:00', ' has logged in'),
(95, 0, '2020-04-11 03:49:03', ' has logged in'),
(96, 1, '2020-04-11 03:49:07', 'chiekkored has logged in'),
(97, 1, '2020-04-11 03:49:18', 'chiekkored has edited the account: chiekkored.'),
(98, 1, '2020-04-11 03:52:33', 'chiekkored has logged out'),
(99, 1, '2020-04-18 14:03:04', 'chiekkored has logged in'),
(100, 1, '2020-04-18 14:03:10', 'chiekkored has logged in'),
(101, 1, '2020-04-18 14:03:55', 'chiekkored has added a user entry: chester.'),
(102, 1, '2020-04-18 14:04:39', 'chiekkored has added a user entry: francis.'),
(103, 1, '2020-04-18 14:07:16', 'chiekkored has added a user entry: lawrence.'),
(104, 1, '2020-04-18 14:07:51', 'chiekkored has added a user entry: yeshua.'),
(105, 1, '2020-04-18 14:09:07', 'chiekkored added an event: Online Freestyle Challenge'),
(106, 1, '2020-04-18 14:09:37', 'chiekkored has logged out'),
(107, 0, '2020-04-18 14:09:42', ' has logged in'),
(108, 4, '2020-04-18 14:09:47', 'kaycee has logged in'),
(109, 4, '2020-04-18 14:09:55', 'kaycee has logged out'),
(110, 1, '2020-04-18 14:09:59', 'chiekkored has logged in'),
(111, 1, '2020-04-18 14:12:48', 'chiekkored added participant(s) to event: Online Choreo ChallengeSample Score RangeOnline Freestyle ChallengeSample Percentage EventTo be cancelled'),
(112, 1, '2020-04-18 14:13:12', 'chiekkored activated the event: Online Freestyle Challenge'),
(113, 1, '2020-04-18 14:13:15', 'chiekkored has logged out'),
(114, 4, '2020-04-18 14:13:19', 'kaycee has logged in'),
(115, 4, '2020-04-18 14:14:28', 'kaycee has logged out'),
(116, 9, '2020-04-18 14:14:33', 'yeshua has logged in'),
(117, 9, '2020-04-18 14:15:26', 'yeshua has logged out'),
(118, 6, '2020-04-18 14:15:29', 'chester has logged in'),
(119, 6, '2020-04-18 14:16:45', 'chester has logged out'),
(120, 7, '2020-04-18 14:16:50', 'francis has logged in'),
(121, 7, '2020-04-18 14:17:28', 'francis has logged out'),
(122, 8, '2020-04-18 14:17:32', 'lawrence has logged in'),
(123, 8, '2020-04-18 14:21:49', 'lawrence has logged out'),
(124, 1, '2020-04-18 14:21:54', 'chiekkored has logged in'),
(125, 1, '2020-04-18 14:28:42', 'chiekkored activated the event: Online Freestyle Challenge'),
(126, 1, '2020-04-18 14:32:53', 'chiekkored has logged in'),
(127, 1, '2020-04-18 14:55:33', 'chiekkored paused the event: Online Freestyle Challenge'),
(128, 1, '2020-04-18 15:00:53', 'chiekkored activated the event: Online Freestyle Challenge'),
(129, 1, '2020-04-18 15:00:54', 'chiekkored toggled done to event: Online Freestyle Challenge'),
(130, 1, '2020-04-18 17:34:31', 'chiekkored has logged in'),
(131, 1, '2020-04-27 22:05:46', 'chiekkored has logged in'),
(132, 1, '2020-04-27 22:05:51', 'chiekkored has logged in'),
(133, 1, '2020-04-27 22:09:25', 'chiekkored has logged in'),
(134, 1, '2020-04-27 22:09:39', 'chiekkored has logged in'),
(135, 1, '2020-04-28 00:19:37', 'chiekkored deactivated the user: yeshua'),
(136, 1, '2020-04-28 00:19:40', 'chiekkored activated the user: yeshua'),
(137, 1, '2020-04-28 02:20:19', 'chiekkored has logged in'),
(138, 1, '2020-04-28 03:51:25', 'chiekkored added an event: Test'),
(139, 1, '2020-04-28 04:50:34', 'chiekkored added participant(s) to event: Test'),
(140, 1, '2020-04-28 05:01:27', 'chiekkored added participant(s) to event: Test'),
(141, 1, '2020-04-28 05:05:10', 'chiekkored added participant(s) to event: Test'),
(142, 1, '2020-04-28 06:25:21', 'chiekkored added an event: etheh'),
(143, 1, '2020-04-28 06:31:53', 'chiekkored added an event: hrthrt'),
(144, 1, '2020-04-28 20:12:51', 'chiekkored has logged in'),
(145, 1, '2020-04-28 20:17:28', 'chiekkored has logged in'),
(146, 1, '2020-04-28 21:04:16', 'chiekkored added participant(s) to event: HrthrtEthehTest'),
(147, 1, '2020-04-28 21:08:00', 'chiekkored added an event: adwad'),
(148, 1, '2020-04-29 12:59:45', 'chiekkored has logged in'),
(149, 1, '2020-04-29 12:59:53', 'chiekkored has logged in'),
(150, 1, '2020-04-30 03:13:23', 'chiekkored has logged in'),
(151, 1, '2020-04-30 03:13:31', 'chiekkored has logged in'),
(152, 1, '2020-04-30 23:19:18', 'chiekkored has logged in'),
(153, 1, '2020-05-01 08:17:40', 'chiekkored has logged in'),
(154, 1, '2020-05-01 08:32:07', 'chiekkored has logged in'),
(155, 1, '2020-05-01 08:58:47', 'chiekkored has logged out'),
(156, 1, '2020-05-01 08:58:50', 'chiekkored has logged in'),
(157, 1, '2020-05-01 20:24:57', 'chiekkored has logged in'),
(158, 1, '2020-05-01 20:32:27', 'chiekkored has logged in'),
(159, 1, '2020-05-01 20:47:48', 'chiekkored activated the event: Etheh'),
(160, 1, '2020-05-01 20:47:49', 'chiekkored paused the event: Etheh'),
(161, 1, '2020-05-01 21:11:53', 'chiekkored has logged in'),
(162, 0, '2020-05-01 21:19:01', ' activated the event: Test'),
(163, 0, '2020-05-01 21:19:05', ' toggled done to event: Test'),
(164, 1, '2020-05-01 21:19:52', 'chiekkored has logged in'),
(165, 1, '2020-05-01 21:22:22', 'chiekkored activated the event: Hrthrt'),
(166, 1, '2020-05-01 21:22:29', 'chiekkored paused the event: Hrthrt'),
(167, 1, '2020-05-01 22:01:54', 'chiekkored updated an event: Etheh'),
(168, 1, '2020-05-01 22:02:08', 'chiekkored updated an event: Etheh'),
(169, 1, '2020-05-01 22:02:46', 'chiekkored updated an event: Etheh'),
(170, 1, '2020-05-01 22:03:32', 'chiekkored updated an event: Etheh'),
(171, 1, '2020-05-01 22:08:01', 'chiekkored updated an event: Etheh'),
(172, 1, '2020-05-01 22:11:14', 'chiekkored updated an event: Etheh'),
(173, 1, '2020-05-01 22:14:27', 'chiekkored updated an event: Etheh'),
(174, 1, '2020-05-01 22:31:21', 'chiekkored updated an event: Etheh'),
(175, 1, '2020-05-01 22:37:05', 'chiekkored updated an event: Hrthrt'),
(176, 1, '2020-05-01 22:40:38', 'chiekkored updated an event: Hrthrt'),
(177, 1, '2020-05-01 22:51:49', 'chiekkored updated an event: Hrthrt'),
(178, 1, '2020-05-01 22:52:14', 'chiekkored updated an event: Hrthrt'),
(179, 1, '2020-05-01 22:52:28', 'chiekkored updated an event: Hrthrt'),
(180, 1, '2020-05-01 22:54:50', 'chiekkored activated the event: Hrthrt'),
(181, 1, '2020-05-01 22:54:58', 'chiekkored paused the event: Hrthrt'),
(182, 1, '2020-05-02 00:22:28', 'chiekkored added an event: Sample'),
(183, 1, '2020-05-02 00:23:16', 'chiekkored added participant(s) to event: SampleHrthrtAdwadEtheh'),
(184, 1, '2020-05-02 00:24:05', 'chiekkored activated the event: Sample'),
(185, 1, '2020-05-02 00:24:33', 'chiekkored has logged out'),
(186, 5, '2020-05-02 00:24:37', 'dave has logged in'),
(187, 5, '2020-05-02 02:52:04', 'dave has logged out'),
(188, 1, '2020-05-02 02:52:07', 'chiekkored has logged in'),
(189, 1, '2020-05-02 03:44:03', 'chiekkored added an event: j'),
(190, 1, '2020-05-02 03:44:22', 'chiekkored updated an event: Jjjjjjjjjjjjj'),
(191, 1, '2020-05-02 03:45:16', 'chiekkored updated an event: Jjjjjjjjjjjjj'),
(192, 1, '2020-05-02 03:45:59', 'chiekkored activated the event: Jjjjjjjjjjjjj'),
(193, 1, '2020-05-02 03:46:00', 'chiekkored toggled done to event: Sample'),
(194, 1, '2020-05-02 03:46:35', 'chiekkored deleted the event: Sample'),
(195, 1, '2020-05-02 03:46:45', 'chiekkored has logged out'),
(196, 0, '2020-05-02 03:46:53', ' has logged in'),
(197, 8, '2020-05-02 03:47:00', 'lawrence has logged in'),
(198, 8, '2020-05-02 03:47:12', 'lawrence has logged out'),
(199, 1, '2020-05-02 03:47:19', 'chiekkored has logged in'),
(200, 1, '2020-05-02 03:47:25', 'chiekkored paused the event: Jjjjjjjjjjjjj'),
(201, 1, '2020-05-02 03:48:10', 'chiekkored added participant(s) to event: JjjjjjjjjjjjjHrthrtAdwadEtheh'),
(202, 1, '2020-05-02 03:48:13', 'chiekkored activated the event: Jjjjjjjjjjjjj'),
(203, 1, '2020-05-02 03:48:15', 'chiekkored has logged out'),
(204, 8, '2020-05-02 03:48:22', 'lawrence has logged in'),
(205, 8, '2020-05-02 03:57:35', 'lawrence has logged out'),
(206, 3, '2020-05-02 03:57:38', 'dale has logged in'),
(207, 3, '2020-05-02 03:58:34', 'dale has logged out'),
(208, 1, '2020-05-02 03:58:39', 'chiekkored has logged in'),
(209, 1, '2020-05-02 03:59:30', 'chiekkored activated the event: Sample'),
(210, 1, '2020-05-02 03:59:33', 'chiekkored has logged out'),
(211, 3, '2020-05-02 03:59:37', 'dale has logged in'),
(212, 3, '2020-05-02 04:00:48', 'dale has logged out'),
(213, 1, '2020-05-02 04:00:52', 'chiekkored has logged in'),
(214, 1, '2020-05-02 04:01:36', 'chiekkored added an event: 123123123'),
(215, 1, '2020-05-02 04:01:40', 'chiekkored activated the event: 123123123'),
(216, 1, '2020-05-02 04:01:42', 'chiekkored paused the event: 123123123'),
(217, 1, '2020-05-02 04:02:27', 'chiekkored added participant(s) to event: HrthrtAdwad123123123Etheh'),
(218, 1, '2020-05-02 04:02:31', 'chiekkored activated the event: 123123123'),
(219, 1, '2020-05-02 04:02:36', 'chiekkored has logged out'),
(220, 2, '2020-05-02 04:02:41', 'joshua has logged in'),
(221, 2, '2020-05-02 04:08:06', 'joshua has logged out'),
(222, 8, '2020-05-02 04:08:12', 'lawrence has logged in'),
(223, 8, '2020-05-02 04:11:43', 'lawrence has logged out'),
(224, 1, '2020-05-02 04:11:47', 'chiekkored has logged in'),
(225, 1, '2020-05-02 16:08:52', 'chiekkored has logged in'),
(226, 1, '2020-05-02 16:55:50', 'chiekkored activated the event: Hrthrt'),
(227, 1, '2020-05-02 16:55:54', 'chiekkored has logged out'),
(228, 7, '2020-05-02 16:55:59', 'francis has logged in'),
(229, 7, '2020-05-02 16:56:14', 'francis has logged out'),
(230, 1, '2020-05-02 16:56:19', 'chiekkored has logged in'),
(231, 1, '2020-05-02 16:57:08', 'chiekkored paused the event: Jjjjjjjjjjjjj'),
(232, 1, '2020-05-02 16:57:10', 'chiekkored paused the event: 123123123'),
(233, 1, '2020-05-02 16:57:20', 'chiekkored paused the event: Hrthrt'),
(234, 1, '2020-05-02 16:58:06', 'chiekkored added participant(s) to event: JjjjjjjjjjjjjHrthrtAdwad123123123Etheh'),
(235, 1, '2020-05-02 16:58:26', 'chiekkored activated the event: Hrthrt'),
(236, 1, '2020-05-02 16:58:29', 'chiekkored has logged out'),
(237, 7, '2020-05-02 16:58:35', 'francis has logged in'),
(238, 7, '2020-05-02 18:58:14', 'francis has logged out'),
(239, 1, '2020-05-02 18:58:17', 'chiekkored has logged in'),
(240, 1, '2020-05-02 18:58:36', 'chiekkored toggled done to event: Hrthrt'),
(241, 1, '2020-05-02 19:43:17', 'chiekkored added participant(s) to event: '),
(242, 1, '2020-05-02 19:44:08', 'chiekkored added participant(s) to event: Jjjjjjjjjjjjj'),
(243, 1, '2020-05-02 19:48:40', 'chiekkored deactivated the user: yeshua'),
(244, 1, '2020-05-02 19:52:33', 'chiekkored has logged out'),
(245, 9, '2020-05-02 19:52:36', 'yeshua has logged in'),
(246, 9, '2020-05-02 19:52:54', 'yeshua has logged out'),
(247, 1, '2020-05-02 19:53:17', 'chiekkored has logged in'),
(248, 1, '2020-05-02 19:54:13', 'chiekkored has logged out'),
(249, 9, '2020-05-02 19:54:18', 'yeshua has logged in'),
(250, 9, '2020-05-02 19:54:31', 'yeshua has logged out'),
(251, 9, '2020-05-02 19:55:24', 'yeshua has logged in'),
(252, 9, '2020-05-02 19:55:35', 'yeshua has logged out'),
(253, 9, '2020-05-02 19:55:44', 'yeshua has logged in'),
(254, 9, '2020-05-02 19:55:51', 'yeshua has logged out'),
(255, 0, '2020-05-02 19:57:55', ' has logged in'),
(256, 0, '2020-05-02 19:58:02', ' has logged in'),
(257, 1, '2020-05-02 19:58:05', 'chiekkored has logged in'),
(258, 1, '2020-05-02 19:58:12', 'chiekkored has logged out');

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
(1, '3feb8c953ff744c96d491f6b431446e0.jpg', 'chiekkored', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chiekko', 'Red', 'Administrator', 0),
(2, '4a0c74ab6dc9abbfe0ecd0e4e0ebec26.jpg', 'joshua', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Joshua', 'Sarsonas', 'Judge', 0),
(3, '5cedab933a060bc3ab988c91d6c81d66.jpg', 'dale', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dale', 'Siao', 'Judge', 0),
(4, '7248b1c0683d8ca6bfeffcec449e2b5c.jpg', 'kaycee', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Kaycee', 'Velez', 'Judge', 0),
(5, '1bb9ca49525c888b7e04c16373543855.jpg', 'dave', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dave', 'Velez', 'Judge', 0),
(6, '8fc04e48c33d02cc7fa2d651175eda0d.jpg', 'chester', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chester', 'Mabanag', 'Judge', 0),
(7, '76b24d0e6682233a5bd6f766e8dc3a4b.jpg', 'francis', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Francis', 'Del Mundo', 'Judge', 0),
(8, '7dce1caba5eb5c32dc5543877033108e.jpg', 'lawrence', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Lawrence', 'Salvador', 'Judge', 0),
(9, 'a0dcb81c2122601a3596d2a41565f640.jpg', 'yeshua', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Yeshua', 'Nate', 'Judge', 1);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event_criteria`
--
ALTER TABLE `event_criteria`
  MODIFY `event_criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `event_participants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `judges_event`
--
ALTER TABLE `judges_event`
  MODIFY `judges_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `judges_scores`
--
ALTER TABLE `judges_scores`
  MODIFY `judges_scores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
