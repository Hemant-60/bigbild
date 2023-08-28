-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2020 at 06:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d14982929_creat`
--

-- --------------------------------------------------------

--
-- Table structure for table `clips`
--

CREATE TABLE `clips` (
  `id` int(11) NOT NULL,
  `clipped_by` int(11) NOT NULL,
  `clipped` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clips`
--

INSERT INTO `clips` (`id`, `clipped_by`, `clipped`, `date`, `time`) VALUES
(11, 3, 3, '2019-07-09', '10:24:02'),
(15, 14, 3, '2019-07-15', '01:55:34'),
(18, 19, 14, '2019-08-22', '05:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `clipwork`
--

CREATE TABLE `clipwork` (
  `id` int(11) NOT NULL,
  `clipped_by` int(11) NOT NULL,
  `clipped` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clipwork`
--

INSERT INTO `clipwork` (`id`, `clipped_by`, `clipped`, `date`, `time`, `category`) VALUES
(1, 3, 1, '2019-06-06', '02:39:32', 'startup'),
(3, 14, 1, '2019-07-15', '01:57:00', 'startup');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpass`
--

CREATE TABLE `forgotpass` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgotpass`
--

INSERT INTO `forgotpass` (`id`, `email`, `email_key`) VALUES
(1, 'hemant.rana199760@gmail.com', 69707787),
(2, 'hemant.rana199760@gmail.com', 17229312);

-- --------------------------------------------------------

--
-- Table structure for table `investor_info`
--

CREATE TABLE `investor_info` (
  `user_id` int(11) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `investments_no` int(11) NOT NULL,
  `qualities` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_id`, `receiver_id`, `date`, `time`, `message`, `status`) VALUES
(4, 3, 5, '2019-06-07', '13:51:53', 'Hello Archit , thanx for registering for bigbild , hope you like it.', 0),
(5, 6, 3, '2019-06-12', '16:52:31', 'Yo', 1),
(6, 3, 6, '2019-06-12', '17:20:04', 'Yo', 0),
(7, 3, 6, '2019-06-12', '17:20:12', 'Wassup?', 0),
(8, 3, 13, '2019-07-10', '05:39:41', 'Hello', 0),
(9, 14, 3, '2019-07-15', '13:56:46', 'Hii kanjar', 1),
(10, 3, 14, '2019-07-16', '12:42:50', 'hello', 0),
(11, 3, 14, '2019-08-02', '04:15:35', 'Hello bhai ', 0),
(12, 3, 14, '2019-08-02', '04:16:53', 'Kya chal rha hai, placement ke liye prepare kar liya? ', 0),
(13, 15, 3, '2019-08-05', '10:17:34', 'Hello', 1),
(14, 3, 15, '2019-08-07', '04:31:58', 'Hello', 0),
(15, 19, 17, '2019-08-22', '17:42:12', 'Hello', 0),
(16, 19, 3, '2019-08-22', '17:42:40', 'I would like to collaborate', 1),
(17, 3, 19, '2019-08-30', '11:19:22', 'sur', 0),
(18, 3, 19, '2019-08-30', '11:19:32', 'sure*', 0),
(19, 3, 13, '2019-09-28', '10:55:50', 'yo.', 0),
(20, 3, 19, '2019-09-28', '17:11:38', 'Hello', 0),
(21, 3, 19, '2019-10-05', '04:25:23', 'Hello', 0),
(22, 3, 21, '2019-10-09', '17:08:35', 'hello', 0),
(23, 3, 14, '2019-10-21', '16:59:04', 'Hello', 0),
(24, 3, 21, '2019-10-21', '16:59:55', 'Yo', 0),
(25, 3, 19, '2019-10-23', '18:28:35', '?', 0),
(26, 3, 19, '2019-10-23', '18:29:00', '?', 0),
(27, 3, 23, '2019-10-27', '07:49:38', 'yo', 0),
(28, 3, 23, '2020-07-13', '14:55:11', 'Blahbhalag7snrgrofufjgjrl9r4', 0),
(29, 3, 23, '2020-09-04', '14:04:56', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `reported_user` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `submitted_by`, `subject`, `review`, `date`, `time`) VALUES
(2, 3, 'working', 'the left navigator tends to fall a bit on some pages', '2019-09-28', '11:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `login_time` time NOT NULL,
  `logout_time` time NOT NULL,
  `logout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `date`, `login_time`, `logout_time`, `logout_date`) VALUES
(3, 3, '2019-06-06', '09:52:15', '09:54:50', '2019-06-06'),
(4, 3, '2019-06-06', '10:03:12', '10:05:28', '2019-06-06'),
(5, 3, '2019-06-06', '10:11:09', '10:13:16', '2019-06-06'),
(6, 3, '2019-06-06', '10:17:21', '10:18:10', '2019-06-06'),
(7, 3, '2019-06-06', '10:20:12', '10:24:13', '2019-06-06'),
(8, 3, '2019-06-06', '10:26:20', '00:00:00', '0000-00-00'),
(9, 3, '2019-06-06', '10:34:49', '10:36:00', '2019-06-06'),
(10, 3, '2019-06-06', '10:39:03', '10:42:19', '2019-06-06'),
(11, 3, '2019-06-06', '10:42:45', '10:43:21', '2019-06-06'),
(12, 3, '2019-06-06', '12:32:15', '12:35:11', '2019-06-06'),
(13, 3, '2019-06-06', '12:35:20', '12:37:28', '2019-06-06'),
(14, 3, '2019-06-06', '14:36:48', '14:42:27', '2019-06-06'),
(16, 3, '2019-06-06', '16:03:53', '16:05:32', '2019-06-06'),
(19, 3, '2019-06-06', '16:40:23', '16:47:08', '2019-06-06'),
(20, 3, '2019-06-06', '16:51:56', '16:53:23', '2019-06-06'),
(21, 3, '2019-06-06', '17:17:16', '17:17:37', '2019-06-06'),
(22, 3, '2019-06-06', '17:18:31', '17:19:10', '2019-06-06'),
(23, 3, '2019-06-06', '17:19:18', '17:20:49', '2019-06-06'),
(24, 3, '2019-06-07', '03:14:13', '03:14:21', '2019-06-07'),
(25, 3, '2019-06-07', '06:12:22', '06:12:37', '2019-06-07'),
(26, 3, '2019-06-07', '06:14:17', '06:27:11', '2019-06-07'),
(27, 3, '2019-06-07', '12:42:19', '12:42:40', '2019-06-07'),
(28, 3, '2019-06-07', '13:37:27', '13:38:16', '2019-06-07'),
(29, 5, '2019-06-07', '13:43:41', '00:00:00', '0000-00-00'),
(30, 3, '2019-06-07', '13:50:47', '13:53:45', '2019-06-07'),
(31, 6, '2019-06-07', '13:51:11', '00:00:00', '0000-00-00'),
(32, 3, '2019-06-07', '15:27:38', '15:29:14', '2019-06-07'),
(33, 3, '2019-06-07', '16:36:40', '16:36:57', '2019-06-07'),
(34, 7, '2019-06-07', '17:05:06', '00:00:00', '0000-00-00'),
(35, 8, '2019-06-07', '17:54:52', '00:00:00', '0000-00-00'),
(36, 3, '2019-06-08', '05:05:31', '05:08:26', '2019-06-08'),
(37, 3, '2019-06-08', '07:56:57', '07:57:12', '2019-06-08'),
(38, 3, '2019-06-08', '08:03:05', '08:06:49', '2019-06-08'),
(39, 3, '2019-06-08', '10:35:49', '10:36:12', '2019-06-08'),
(40, 3, '2019-06-08', '11:50:19', '11:51:35', '2019-06-08'),
(41, 3, '2019-06-08', '12:53:16', '12:53:46', '2019-06-08'),
(42, 3, '2019-06-08', '18:07:52', '18:09:41', '2019-06-08'),
(43, 3, '2019-06-09', '12:07:16', '12:07:51', '2019-06-09'),
(44, 9, '2019-06-09', '20:59:56', '00:00:00', '0000-00-00'),
(45, 3, '2019-06-10', '02:32:21', '02:36:09', '2019-06-10'),
(46, 3, '2019-06-10', '03:31:57', '03:32:15', '2019-06-10'),
(47, 3, '2019-06-10', '04:40:23', '04:41:37', '2019-06-10'),
(48, 10, '2019-06-10', '08:02:19', '00:00:00', '0000-00-00'),
(49, 3, '2019-06-12', '13:33:12', '13:33:41', '2019-06-12'),
(50, 3, '2019-06-12', '14:41:00', '14:41:19', '2019-06-12'),
(51, 3, '2019-06-12', '17:19:19', '17:24:05', '2019-06-12'),
(52, 3, '2019-06-12', '17:30:53', '17:33:05', '2019-06-12'),
(53, 11, '2019-06-12', '19:13:05', '19:24:48', '2019-06-12'),
(54, 3, '2019-06-13', '03:47:55', '03:48:28', '2019-06-13'),
(55, 3, '2019-06-13', '04:29:54', '04:30:21', '2019-06-13'),
(56, 3, '2019-06-13', '09:39:31', '09:41:48', '2019-06-13'),
(57, 3, '2019-06-14', '05:01:50', '05:04:00', '2019-06-14'),
(58, 3, '2019-06-14', '12:33:53', '12:34:47', '2019-06-14'),
(59, 3, '2019-06-14', '16:56:33', '16:56:43', '2019-06-14'),
(60, 3, '2019-06-15', '10:51:02', '10:51:41', '2019-06-15'),
(61, 3, '2019-06-15', '17:52:37', '17:52:44', '2019-06-15'),
(62, 3, '2019-06-15', '17:54:33', '17:54:42', '2019-06-15'),
(63, 3, '2019-06-17', '11:37:43', '11:38:34', '2019-06-17'),
(64, 3, '2019-06-18', '10:16:46', '10:17:44', '2019-06-18'),
(65, 3, '2019-06-19', '11:33:04', '11:35:51', '2019-06-19'),
(66, 3, '2019-06-20', '09:04:06', '09:05:25', '2019-06-20'),
(67, 3, '2019-06-21', '13:08:18', '13:08:35', '2019-06-21'),
(68, 3, '2019-06-22', '11:38:38', '11:38:48', '2019-06-22'),
(69, 3, '2019-06-23', '14:03:56', '14:05:20', '2019-06-23'),
(70, 3, '2019-06-24', '11:45:44', '11:46:20', '2019-06-24'),
(71, 3, '2019-06-25', '08:26:51', '08:27:07', '2019-06-25'),
(72, 3, '2019-06-27', '09:15:52', '09:16:22', '2019-06-27'),
(73, 3, '2019-06-28', '10:26:34', '10:26:48', '2019-06-28'),
(74, 3, '2019-06-28', '11:08:12', '11:08:49', '2019-06-28'),
(75, 3, '2019-06-29', '11:41:06', '11:42:27', '2019-06-29'),
(76, 3, '2019-06-29', '12:32:29', '12:33:34', '2019-06-29'),
(77, 3, '2019-06-30', '05:17:39', '05:18:00', '2019-06-30'),
(78, 3, '2019-07-02', '03:26:06', '03:30:01', '2019-07-02'),
(79, 3, '2019-07-02', '16:07:30', '16:07:38', '2019-07-02'),
(80, 3, '2019-07-04', '06:22:38', '06:24:20', '2019-07-04'),
(81, 3, '2019-07-04', '14:41:33', '14:41:51', '2019-07-04'),
(82, 3, '2019-07-05', '09:05:31', '09:05:50', '2019-07-05'),
(83, 3, '2019-07-06', '11:27:07', '11:27:31', '2019-07-06'),
(84, 3, '2019-07-07', '03:38:27', '03:38:49', '2019-07-07'),
(85, 12, '2019-07-07', '05:18:44', '05:19:11', '2019-07-07'),
(86, 3, '2019-07-07', '05:49:49', '05:50:36', '2019-07-07'),
(87, 3, '2019-07-07', '08:47:50', '08:48:38', '2019-07-07'),
(88, 3, '2019-07-07', '17:34:34', '17:34:43', '2019-07-07'),
(89, 3, '2019-07-08', '16:06:08', '16:06:26', '2019-07-08'),
(90, 3, '2019-07-09', '10:23:54', '10:25:34', '2019-07-09'),
(91, 3, '2019-07-09', '18:12:23', '18:12:38', '2019-07-09'),
(92, 13, '2019-07-09', '20:11:52', '00:00:00', '0000-00-00'),
(93, 3, '2019-07-10', '05:38:12', '05:40:05', '2019-07-10'),
(94, 3, '2019-07-10', '12:43:49', '12:46:20', '2019-07-10'),
(95, 3, '2019-07-11', '03:12:01', '03:13:54', '2019-07-11'),
(96, 3, '2019-07-11', '05:56:54', '05:57:35', '2019-07-11'),
(97, 3, '2019-07-13', '05:08:44', '05:10:08', '2019-07-13'),
(98, 14, '2019-07-15', '13:53:37', '14:07:38', '2019-07-15'),
(99, 3, '2019-07-16', '12:42:27', '12:43:14', '2019-07-16'),
(100, 3, '2019-07-17', '06:07:11', '06:08:50', '2019-07-17'),
(101, 3, '2019-07-19', '12:04:36', '12:04:59', '2019-07-19'),
(102, 3, '2019-07-20', '15:05:24', '15:06:05', '2019-07-20'),
(103, 3, '2019-07-25', '05:47:13', '05:47:25', '2019-07-25'),
(104, 3, '2019-07-26', '08:25:09', '08:25:38', '2019-07-26'),
(105, 3, '2019-07-27', '10:24:13', '10:24:25', '2019-07-27'),
(106, 3, '2019-07-30', '18:33:49', '18:34:22', '2019-07-30'),
(107, 3, '2019-07-31', '07:34:48', '07:34:59', '2019-07-31'),
(108, 3, '2019-08-02', '03:28:36', '00:00:00', '0000-00-00'),
(109, 3, '2019-08-02', '03:53:30', '04:01:03', '2019-08-02'),
(110, 3, '2019-08-02', '04:12:26', '04:17:54', '2019-08-02'),
(111, 3, '2019-08-02', '09:09:58', '09:10:33', '2019-08-02'),
(112, 3, '2019-08-03', '11:57:23', '11:57:36', '2019-08-03'),
(113, 15, '2019-08-05', '10:16:11', '10:18:05', '2019-08-05'),
(114, 16, '2019-08-06', '09:05:17', '00:00:00', '0000-00-00'),
(115, 17, '2019-08-06', '10:00:19', '10:03:31', '2019-08-06'),
(116, 3, '2019-08-06', '13:37:18', '13:38:35', '2019-08-06'),
(117, 3, '2019-08-06', '13:58:16', '14:00:00', '2019-08-06'),
(118, 3, '2019-08-06', '15:12:10', '15:12:29', '2019-08-06'),
(119, 3, '2019-08-07', '04:30:28', '04:33:27', '2019-08-07'),
(120, 3, '2019-08-07', '15:19:52', '15:24:45', '2019-08-07'),
(121, 18, '2019-08-09', '01:55:13', '00:00:00', '0000-00-00'),
(122, 3, '2019-08-09', '14:10:50', '14:12:28', '2019-08-09'),
(123, 3, '2019-08-10', '11:09:18', '11:10:06', '2019-08-10'),
(124, 3, '2019-08-14', '11:51:00', '11:53:36', '2019-08-14'),
(125, 3, '2019-08-16', '14:02:55', '14:04:25', '2019-08-16'),
(126, 3, '2019-08-16', '18:58:48', '19:00:06', '2019-08-16'),
(127, 3, '2019-08-20', '13:20:34', '13:21:10', '2019-08-20'),
(128, 19, '2019-08-22', '17:40:40', '17:43:48', '2019-08-22'),
(129, 3, '2019-08-30', '11:18:38', '11:20:09', '2019-08-30'),
(130, 3, '2019-09-04', '12:19:46', '12:21:16', '2019-09-04'),
(131, 3, '2019-09-28', '10:53:13', '11:12:47', '2019-09-28'),
(133, 3, '2019-09-28', '17:10:03', '17:11:52', '2019-09-28'),
(134, 3, '2019-09-29', '04:43:32', '04:44:43', '2019-09-29'),
(135, 3, '2019-10-05', '04:22:58', '04:25:34', '2019-10-05'),
(136, 3, '2019-10-06', '15:57:14', '15:57:30', '2019-10-06'),
(137, 3, '2019-10-07', '12:26:44', '12:29:36', '2019-10-07'),
(138, 21, '2019-10-08', '06:51:24', '06:53:57', '2019-10-08'),
(139, 3, '2019-10-08', '08:25:57', '08:27:39', '2019-10-08'),
(140, 3, '2019-10-09', '17:08:00', '17:08:40', '2019-10-09'),
(141, 3, '2019-10-13', '16:40:00', '16:40:33', '2019-10-13'),
(142, 3, '2019-10-15', '16:33:52', '16:34:53', '2019-10-15'),
(143, 3, '2019-10-16', '19:07:13', '19:07:25', '2019-10-16'),
(144, 22, '2019-10-16', '19:13:18', '00:00:00', '0000-00-00'),
(145, 3, '2019-10-17', '07:27:22', '07:28:40', '2019-10-17'),
(146, 3, '2019-10-18', '12:32:33', '12:32:58', '2019-10-18'),
(147, 3, '2019-10-19', '16:04:47', '16:05:57', '2019-10-19'),
(148, 3, '2019-10-21', '16:54:58', '17:00:55', '2019-10-21'),
(149, 3, '2019-10-23', '18:28:07', '18:29:17', '2019-10-23'),
(150, 3, '2019-10-26', '06:18:22', '06:19:11', '2019-10-26'),
(151, 23, '2019-10-26', '15:29:48', '00:00:00', '0000-00-00'),
(152, 3, '2019-10-27', '07:49:08', '07:50:04', '2019-10-27'),
(153, 3, '2019-10-30', '06:09:32', '06:09:49', '2019-10-30'),
(154, 3, '2019-10-31', '13:55:26', '13:56:04', '2019-10-31'),
(155, 3, '2019-11-03', '18:20:39', '18:21:04', '2019-11-03'),
(156, 3, '2019-11-06', '06:03:21', '06:04:32', '2019-11-06'),
(157, 3, '2019-11-22', '05:54:21', '05:54:41', '2019-11-22'),
(158, 3, '2019-11-27', '18:13:52', '18:14:43', '2019-11-27'),
(159, 3, '2019-12-07', '04:41:50', '04:42:12', '2019-12-07'),
(160, 3, '2019-12-07', '07:57:48', '07:58:18', '2019-12-07'),
(161, 3, '2019-12-14', '06:20:37', '06:21:52', '2019-12-14'),
(162, 3, '2020-01-14', '09:59:58', '10:00:18', '2020-01-14'),
(163, 3, '2020-01-19', '13:56:36', '13:57:10', '2020-01-19'),
(164, 3, '2020-01-22', '10:18:01', '10:19:05', '2020-01-22'),
(165, 3, '2020-02-02', '16:34:01', '16:35:39', '2020-02-02'),
(166, 3, '2020-02-17', '10:39:45', '10:40:27', '2020-02-17'),
(167, 3, '2020-02-18', '11:14:42', '11:14:51', '2020-02-18'),
(168, 3, '2020-02-23', '12:24:17', '12:24:37', '2020-02-23'),
(169, 3, '2020-03-05', '14:38:06', '14:39:50', '2020-03-05'),
(170, 3, '2020-03-16', '05:11:57', '05:12:17', '2020-03-16'),
(171, 3, '2020-03-27', '05:47:56', '05:48:58', '2020-03-27'),
(172, 3, '2020-03-28', '13:35:57', '13:38:52', '2020-03-28'),
(173, 3, '2020-04-03', '11:32:19', '11:32:54', '2020-04-03'),
(174, 3, '2020-04-19', '08:37:02', '08:37:16', '2020-04-19'),
(175, 3, '2020-05-02', '10:23:15', '10:23:32', '2020-05-02'),
(176, 3, '2020-05-13', '04:56:38', '04:56:53', '2020-05-13'),
(177, 3, '2020-05-19', '12:05:13', '12:06:04', '2020-05-19'),
(178, 3, '2020-06-01', '06:03:38', '06:04:18', '2020-06-01'),
(179, 3, '2020-07-09', '05:31:16', '05:31:37', '2020-07-09'),
(180, 3, '2020-07-13', '14:53:55', '14:55:24', '2020-07-13'),
(181, 3, '2020-08-18', '05:41:42', '05:41:59', '2020-08-18'),
(182, 3, '2020-09-04', '14:04:44', '14:09:38', '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `startup_info`
--

CREATE TABLE `startup_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `edate` date NOT NULL,
  `technology` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `startup_info`
--

INSERT INTO `startup_info` (`id`, `name`, `date`, `time`, `description`, `owner_id`, `location`, `field`, `edate`, `technology`, `logo`, `category`) VALUES
(1, 'BigBild', '2019-06-06', '14:39:20', 'We help people to find a great team for their projects , startups or research work ', 3, 'Gurgaon , Haryana', 'Social Network , Web application', '2019-06-06', 'PHP , Html , Css , jQuery , Sql', '', 'startup');

-- --------------------------------------------------------

--
-- Table structure for table `user_additional_info`
--

CREATE TABLE `user_additional_info` (
  `user_id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `country` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_additional_info`
--

INSERT INTO `user_additional_info` (`user_id`, `qualification`, `skills`, `dob`, `hometown`, `phone`, `country`, `profession`, `picture`, `status`) VALUES
(3, 'BTech Cse', 'Web development PHP Java  Machine learning', '1997-12-17', 'Gurgaon', '+91 9654355403', 'India', 'Student', '5d8f3c18b09d33.30939858.jpg', 'Looking for a team for my startup'),
(5, 'B.Tech. in CSE', 'Web development (MERN)', '1999-10-07', '', '', '', '', 'default.png', ''),
(6, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(7, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(8, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(9, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(10, 'B.tech', 'C, c++, java', '1999-01-29', 'Kanpur ', '7742695627', 'India', 'Project training engineer', '5cfe0f10b7c942.51505238.jpg', 'Project trainee '),
(11, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(12, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(13, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(14, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(15, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(16, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(17, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(18, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(19, 'Computer Science Undergraduate', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(21, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(22, '', '', '0000-00-00', '', '', '', '', 'default.png', ''),
(23, 'BTech', '', '0000-00-00', '', '', '', '', 'default.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_time` time NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `password`, `reg_time`, `reg_date`) VALUES
(3, 'Hemant Rana', 'hemant.rana199760@gmail.com', '5e2c815968a693f8d6f6c8f85cfba388', '09:52:15', '2019-06-06'),
(5, 'Archit Kaushik', 'asarchit65@gmail.com', '5074e002837a576481129578517d55e2', '13:43:41', '2019-06-07'),
(6, 'Ankit', 'dwivedi.ankit21@gmail.com', '49172fffbbac5b6cbdf039cd51348a0c', '13:51:11', '2019-06-07'),
(7, 'Pawan', 'piratesofrails23@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', '17:05:06', '2019-06-07'),
(8, 'shivalika goel', 'shivalikagoel12@gmail.com', '461f00413834798d9ca319fe5137853d', '17:54:52', '2019-06-07'),
(9, 'Cesbrs gazf', 'yachts@Gmail.com', 'beee47d70a7fc4c0c2cd2b517cc4b134', '20:59:56', '2019-06-09'),
(10, 'Vaishnavi Pandey ', 'vaishnavipandey2901@gmail.com', '785d0ef1e2a0c982e155c50e30fc353f', '08:02:19', '2019-06-10'),
(11, 'Vikas Akhtar', 'jesah@topmailer.info', 'aa4fa74a93e7c1082a06eb0cad9295ae', '19:13:05', '2019-06-12'),
(12, 'sdsd', 'sdsd@sgs', '827ccb0eea8a706c4c34a16891f84e7b', '05:18:44', '2019-07-07'),
(13, 'Rohit kumar ', 'rohit301048@gmail.com', 'e71a84a9da41d2b7b32f7644f395ecc0', '20:11:52', '2019-07-09'),
(14, 'Arvind', 'arvind.rana1998@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '13:53:37', '2019-07-15'),
(15, 'Raju', 'vermanitin1998@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '10:16:11', '2019-08-05'),
(16, 'Ayan Kumar Pahari', 'pahari.ayan@gmail.com', '7314c3604def934d4702360535d04a95', '09:05:17', '2019-08-06'),
(17, 'Shubham rana', 'tussi.rana@gmail.com', '25f9e794323b453885f5181f1b624d0b', '10:00:19', '2019-08-06'),
(18, 'Saksham Jain', 'Sakshamjn655@gmail.com', '6d0007e52f7afb7d5a0650b0ffb8a4d1', '01:55:13', '2019-08-09'),
(19, 'Hemant Rana', 'hemant.rana19979@gmail.com', '25d55ad283aa400af464c76d713c07ad', '17:40:40', '2019-08-22'),
(21, 'Sheetal rana', 'sheetal@vdbapp.com', '827ccb0eea8a706c4c34a16891f84e7b', '06:51:24', '2019-10-08'),
(22, 'MAYANK BANSAL', 'mkblgnj@gmail.com', '308a3820e4cccbe043cb5228de5e71e3', '19:13:18', '2019-10-16'),
(23, 'Manish mahalwal', 'manishmahalwal007@gmail.com', '9001dffd4bab50b81c1ea0471c629f1d', '15:29:48', '2019-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `verify` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `user_id`, `code`, `verify`) VALUES
(3, 3, 7407, 1),
(5, 5, 8947, 1),
(6, 6, 9133, 1),
(7, 7, 6065, 1),
(8, 8, 1667, 1),
(9, 9, 5333, 0),
(10, 10, 3479, 1),
(11, 11, 8896, 1),
(12, 12, 4936, 0),
(13, 13, 7278, 0),
(14, 14, 3916, 1),
(15, 15, 6056, 1),
(16, 16, 9509, 1),
(17, 17, 3810, 1),
(18, 18, 2270, 1),
(19, 19, 4361, 1),
(20, 20, 4686, 1),
(21, 21, 3938, 1),
(22, 22, 9625, 1),
(23, 23, 8257, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clips`
--
ALTER TABLE `clips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clipwork`
--
ALTER TABLE `clipwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotpass`
--
ALTER TABLE `forgotpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investor_info`
--
ALTER TABLE `investor_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `startup_info`
--
ALTER TABLE `startup_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_additional_info`
--
ALTER TABLE `user_additional_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clips`
--
ALTER TABLE `clips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clipwork`
--
ALTER TABLE `clipwork`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forgotpass`
--
ALTER TABLE `forgotpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `investor_info`
--
ALTER TABLE `investor_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `startup_info`
--
ALTER TABLE `startup_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_additional_info`
--
ALTER TABLE `user_additional_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
