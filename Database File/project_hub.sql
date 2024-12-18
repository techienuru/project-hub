-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 03:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_project`
--

CREATE TABLE `approved_project` (
  `project_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_tittle` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_file` varchar(255) NOT NULL,
  `supervisor's_name` varchar(255) NOT NULL,
  `supervisor's_email` varchar(255) NOT NULL,
  `approval_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `approved_project`
--

INSERT INTO `approved_project` (`project_id`, `student_name`, `project_tittle`, `project_description`, `project_file`, `supervisor's_name`, `supervisor's_email`, `approval_time`) VALUES
(1, 'Nuru Isah', 'project hub', 'drtfgyuhjikgvhbjnmk', 'projects/CMP 316 Data Communication and Networks WRITEUP update.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-16 12:17:46'),
(2, 'Nuru Isah', 'project hub', 'wertuyhjklasdxcfgvbhjnmkwrtfkl;wtfgjhkl', 'projects/Estimation in Statistics.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-16 12:53:34'),
(3, 'Samaila Sidi', 'project hub', 'This is a good project tpic ', 'projects/admission.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-16 15:57:13'),
(4, 'Samaila Sidi', 'Archve', 'Archve', 'projects/SIDI SAMAILA AGYA.pdf', 'Emmanuel Musa', 'emmanuelmusa@gmail.com', '2023-11-16 16:04:42'),
(5, 'Samaila Sidi', 'Data archiving', 'Scanning', 'projects/Undergraduate.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 12:17:51'),
(6, 'Samaila Sidi', 'Data archiving', 'correct', 'projects/Sidi_Samaila_Agya_Result_Slip.PDF', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 12:29:20'),
(7, 'Samaila Sidi', 'project hub', 'des', 'projects/zakariya emmanuel konde.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 12:30:29'),
(8, 'Samaila Sidi', 'project hub', 'xddfdsf', 'projects/Signs-Posts-on-the-Road-to-Success-Kenyon.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 13:30:28'),
(9, 'Samaila Sidi', 'project hub', 'lime', 'projects/Rachael.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 13:30:53'),
(10, 'Samaila Sidi', 'Data archiving', 'file', 'projects/Yang_2021_J._Phys.__Conf._Ser._1915_032074.pdf', 'sidi samaila', 'nuru@gmail.com', '2023-11-20 13:32:29'),
(12, 'Emmanuel james', 'Hospital Management System', 'Hospital Management System app', '', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-14 13:59:58'),
(13, 'student student', 'Data archiving', 'fyguhjk', 'projects/admission (5).pdf', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-15 10:27:51'),
(14, 'Emmanuel james', 'Archve', 'dfghjksfdghjk', 'projects/My credentials.pdf', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-15 10:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `approved_suggestion`
--

CREATE TABLE `approved_suggestion` (
  `project_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_tittle` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `supervisor's_name` varchar(255) NOT NULL,
  `supervisor's_email` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `approved_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `approved_suggestion`
--

INSERT INTO `approved_suggestion` (`project_id`, `student_name`, `project_tittle`, `project_description`, `supervisor's_name`, `supervisor's_email`, `upload_time`, `approved_time`) VALUES
(1, '$student_name', '$project_title', '$project_description', '$supervisors_name', '$supervisors_email', '2023-11-13 11:44:58', '2023-11-13 11:44:58'),
(3, 'Sidi Sam', 'project hub', 'PROJECT UPLOADING WEBSITE', 'Nuru Isah', 'nuru@gmail.com', '2023-11-06 16:26:23', '2023-11-13 12:01:00'),
(4, 'Nuru Ibro', 'Physiotherapy', 'medical related', 'Nuru Isah', 'n@gmail.com', '2023-11-13 12:11:27', '2023-11-14 10:44:58'),
(5, '', 'Data archiving', 'Scanning', 'sidi samaila', 'nuru@gmail.com', '2023-11-15 10:48:01', '2023-11-15 10:49:10'),
(6, 'Samaila Sidi', 'Data archiving', 'school', 'sidi samaila', 'nuru@gmail.com', '2023-11-16 10:10:34', '2023-11-16 10:10:46'),
(7, 'Nuru Isah', 'Data archiving', 'dfghj', 'sidi samaila', 'nuru@gmail.com', '2023-11-16 12:09:27', '2023-11-16 12:10:46'),
(11, 'Emmanuel james', 'Library Management System', 'Library Management System', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-14 12:05:33', '2023-12-14 12:20:17'),
(12, 'student student', 'School Management System', 'sedrtfyu', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-15 09:47:41', '2023-12-15 10:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `declined_suggestion`
--

CREATE TABLE `declined_suggestion` (
  `project_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_tittle` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `supervisor's_name` varchar(255) NOT NULL,
  `supervisor's_email` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `declined_message` varchar(3000) DEFAULT NULL,
  `declined_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `declined_suggestion`
--

INSERT INTO `declined_suggestion` (`project_id`, `student_name`, `project_tittle`, `project_description`, `supervisor's_name`, `supervisor's_email`, `upload_time`, `declined_message`, `declined_time`) VALUES
(2, 'Emmanuel james', 'project hub', 'project iploading hub for student', 'Nuru Isah Ibrahin', 'nuru@gmail.com', '2023-12-14 14:25:59', '', '2023-12-14 14:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `pending_project`
--

CREATE TABLE `pending_project` (
  `project_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_tittle` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_file` varchar(255) NOT NULL,
  `supervisor's_name` varchar(255) NOT NULL,
  `supervisor's_email` varchar(255) NOT NULL,
  `project_status` varchar(255) DEFAULT NULL,
  `decline_message` varchar(5000) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pending_project`
--

INSERT INTO `pending_project` (`project_id`, `student_name`, `project_tittle`, `project_description`, `project_file`, `supervisor's_name`, `supervisor's_email`, `project_status`, `decline_message`, `upload_time`) VALUES
(2, 'Emmanuel james', 'project hub', 'project iploading hub for student', 'projects/SEPLAT 2023_2024 -poster(1) (1).pdf', 'Nuru Isah Ibrahin', 'nuru@gmail.com', 'DECLINED', 'u&#39;ve got corrections to make', '2023-12-14 14:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `project_suggestion`
--

CREATE TABLE `project_suggestion` (
  `project_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `project_tittle` varchar(255) NOT NULL,
  `project_description` varchar(5000) NOT NULL,
  `supervisor's_name` varchar(255) NOT NULL,
  `supervisor's_email` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secret_id`
--

CREATE TABLE `secret_id` (
  `secret_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `secret_id`
--

INSERT INTO `secret_id` (`secret_id`) VALUES
('{1234}');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `matricno` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_time` timestamp NULL DEFAULT current_timestamp(),
  `photos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `othername`, `matricno`, `level`, `email`, `password`, `reg_time`, `photos`) VALUES
(2, '$new_firstname', '$new_lastname', '$new_othername', '$new_matricno', '$new_level', '$new_email', '$new_password', '2023-10-19 14:05:49', ''),
(4, 'Nuru1', 'nn1', 'nn1', '9938dd.', '100 Level', 'nueegh@g', '1', '2023-11-01 10:27:01', ''),
(5, 'Nuru', 'ibro', 'shehu', '0219047000204', '100 Level', 'nur@gmail.com', '1', '2023-11-01 10:51:04', ''),
(6, 'Samaila', 'Sidi', 'Agyaw', '0219047000847', '400 Level', 'sidisamailaagya@gmail.com', '11', '2023-11-06 12:05:34', 'photos/_DSC8248.jpg'),
(7, 'Nuru', 'Isah', 'shehu', '02190', '400 Level', 'samnuru@gmail.com', '1', '2023-11-07 09:58:27', 'photos/IMG_20200708_172617_720.jpg'),
(8, 'student', 'student', '', 'student', '400 Level', 'student@gmail.com', '1', '2023-11-22 15:02:20', ''),
(9, 'Emmanuel', 'james', '', '12345', '500 Level', 'ej@gmail.com', '1', '2023-11-22 15:43:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `photos` varchar(255) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `firstname`, `lastname`, `othername`, `email`, `password`, `reg_time`, `photos`, `update_time`) VALUES
(1, 'Nuru', 'Isah', 'Ibrahin', 'nuru@gmail.com', '1', '2023-11-07 12:54:18', 'supervisor-images/DSC_0024.JPG', '2023-11-14 10:21:09'),
(4, 'Nuru', 'Sidi', 'Agya', 'nurusidi@gmail.com', '1', '2023-11-15 14:16:38', '', '2023-11-15 14:16:38'),
(9, 'Supervise', 'Supervise', '', 'sup@gmail.com', '1', '2023-11-22 15:00:39', '', '2023-11-22 15:00:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_project`
--
ALTER TABLE `approved_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `approved_suggestion`
--
ALTER TABLE `approved_suggestion`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `declined_suggestion`
--
ALTER TABLE `declined_suggestion`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `pending_project`
--
ALTER TABLE `pending_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_suggestion`
--
ALTER TABLE `project_suggestion`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_project`
--
ALTER TABLE `approved_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `approved_suggestion`
--
ALTER TABLE `approved_suggestion`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `declined_suggestion`
--
ALTER TABLE `declined_suggestion`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_project`
--
ALTER TABLE `pending_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_suggestion`
--
ALTER TABLE `project_suggestion`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
