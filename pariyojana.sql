-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2021 at 11:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariyojana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_fname`, `user_email`, `user_pass`, `college`) VALUES
(1, 'Vishnu Nepali', 'vishnepal@gmail.com', 'bmVwYWwxMjM=', 'Nepali College'),
(3, 'Rajesh KC', 'rajkc123@gmail.com', 'cmFqZXNoMTIz', 'Himal College');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(100) NOT NULL,
  `admin_no` int(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `blog` longtext NOT NULL,
  `role` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `admin_no`, `college`, `blog`, `role`, `user_name`) VALUES
(3, 1, 'Nepali College', 'Project Management System is much faster & simpler now.\r\n', 'Co-ordinator', 'Vishnu Nepali'),
(5, 1, 'Nepali College', 'Dear Student/supervisors, Welcome to PMS portal of Nepali College.', 'Co-ordinator', 'Vishnu Nepali');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `project_no` int(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `email`, `user_name`, `project_no`, `project_type`, `comment`, `role`) VALUES
(1, 'johndoe@gmail.com', 'John Doe', 1, 'Project-I', 'needs improvement', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `project_no` int(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `def_type` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `lang`, `project_no`, `project_type`, `def_type`, `location`) VALUES
(4, 'Hangman', 'C#', 1, 'Project-I', 'proposal', 'uploads/1_Project-I_proposal_Project Management System.pdf'),
(5, 'Hangman', 'C#', 1, 'Project-I', 'final', 'uploads/1_Project-I_final_Project Management System.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `id` int(100) NOT NULL,
  `admin_no` int(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `heading` longtext NOT NULL,
  `guides` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`id`, `admin_no`, `college`, `heading`, `guides`) VALUES
(1, 1, 'Nepali College', 'Introduction', 'This guideline applies to all BE CE, Elx, IT and SE students, who are required to take project\r\nworks in different semesters. The project works are, as named by Pokhara University, Project\r\nI (a.k.a. One Project), Project II (a.k.a. Minor Project) and Project III (a.k.a. Major Project)\r\nand they carry 1, 3 and 4 / 5 credits respectively.\r\nBeing a partial requirement of the fulfillment of the degree to be awarded by the university,\r\nthis course called Project Work requires students to work in a team and defend proposal,\r\nwork progress and final outcome in the team. The project may be carried out using any\r\nhardware and software tools relevant to their study and practically useful in daily life e.g.\r\nrobotics, mobile computing, programming, scientific application, information system, games,\r\nsimulations etc. Students are required to do thorough analysis, design, coding, testing of the\r\nsystem/work they develop/do. The project work must comply with the syllabus provided by\r\nthe university.'),
(2, 1, 'Nepali College', 'Project Activities and Timing', 'Students have to make their proposal presentation, mid-term progress presentation and final\r\npresentation in defenses organized by the college and must duly pass. These activities are in\r\nsequence and students failing to accomplish one activity cannot proceed to another. In case of\r\nProject I, the midterm presentation is not mandatory but the project progress can be\r\nmonitored and reviewed either by the Project Co-ordinator and/or expert(s) / teacher(s)\r\nassigned by the Project Review Committee.\r\nThe timing of various project work activities is given by the following table: -\r\nS. No. Activities Normal Timings\r\n1 Project Proposal Defense Beginning of semester\r\n2 Mid Term Progress Middle of semester\r\n\r\n(at least 4 weeks after the Proposal Defense)\r\n\r\n3 Final Project Defense +\r\nReport Submission\r\n\r\nEnd of semester\r\n(at least 4 weeks after the Mid-term Defense)\r\nHowever, taking into the account the efforts required for a project or with the intent of adding\r\nvalue and imparting quality to the project, the Proposal Defense may be organized before the\r\nsemester starts or even in the previous semester also. A minimum gap between two\r\n\r\nsuccessive defenses is 4 (four) weeks, and this doesn’t apply for a re-defense.');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `id` int(100) NOT NULL,
  `mem1_marks` int(100) NOT NULL,
  `mem2_marks` int(100) NOT NULL,
  `mem3_marks` int(100) NOT NULL,
  `project_no` int(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `def_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`id`, `mem1_marks`, `mem2_marks`, `mem3_marks`, `project_no`, `project_type`, `def_type`) VALUES
(3, 20, 0, 0, 1, 'Project-I', 'proposal'),
(4, 20, 0, 0, 1, 'Project-I', 'mid'),
(5, 20, 0, 0, 1, 'Project-I', 'final'),
(6, 20, 0, 0, 1, 'Project-I', 'final'),
(7, 20, 20, 0, 1, 'Project-I', 'proposal'),
(8, 15, 15, 0, 1, 'Project-I', 'mid'),
(9, 20, 20, 0, 1, 'Project-I', 'final');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `admin_no` int(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `heading` longtext NOT NULL,
  `notice` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `admin_no`, `college`, `heading`, `notice`) VALUES
(1, 1, 'Nepali College', 'proposal deadline this friday', 'This is to notify all the students of IV.VI,VIII that the deadline for this week proposal is on friday'),
(2, 1, 'Nepali College', 'defense date on sunday 2020', 'defense has been scheduled this Sunday. Students are required to appear as per time.');

-- --------------------------------------------------------

--
-- Table structure for table `notificat`
--

CREATE TABLE `notificat` (
  `id` int(100) NOT NULL,
  `email_note` varchar(100) NOT NULL,
  `notify` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `status_note` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificat`
--

INSERT INTO `notificat` (`id`, `email_note`, `notify`, `project_type`, `status_note`, `sender`) VALUES
(1, 'kumlax@gmail.com', 'Ram Kumar has added you to his team.', 'Project-I', 'stall', 'kumram@gmail.com'),
(2, 'vishnepal@gmail.com', 'Team no #1 has submitted proposal for Project-I.', 'Project-I', 'read', 'kumram@gmail.com'),
(3, 'kumram@gmail.com', 'Your submitted proposal for Project-I has been Accepted.', 'Project-I', 'stall', 'vishnepal@gmail.com'),
(4, 'kumlax@gmail.com', 'Your submitted proposal for Project-I has been Accepted.', 'Project-I', 'stall', 'vishnepal@gmail.com'),
(5, 'johndoe@gmail.com', 'You are assigned to supervise a project.', 'Project-I', 'read', 'kumram@gmail.com'),
(6, 'kumram@gmail.com', 'John Doe has been assigned as your Project-I supervisor.', 'Project-I', 'stall', 'vishnepal@gmail.com'),
(7, 'kumlax@gmail.com', 'John Doe has been assigned as your Project-I supervisor.', 'Project-I', 'stall', 'vishnepal@gmail.com'),
(8, 'kumram@gmail.com', 'John Doe has commented on your Project-I.', 'Project-I', 'stall', 'johndoe@gmail.com'),
(9, 'kumlax@gmail.com', 'John Doe has commented on your Project-I.', 'Project-I', 'stall', 'johndoe@gmail.com'),
(10, 'kumram@gmail.com', 'Your mid for Project-I has been Accepted.', 'Project-I', 'read', 'johndoe@gmail.com'),
(11, 'kumlax@gmail.com', 'Your mid for Project-I has been Accepted.', 'Project-I', 'stall', 'johndoe@gmail.com'),
(12, 'vishnepal@gmail.com', 'Team no #1 has submitted final document for Project-I.', 'Project-I', 'read', 'kumram@gmail.com'),
(13, 'kumram@gmail.com', 'Your submitted final for Project-I has been Accepted.', 'Project-I', 'stall', 'vishnepal@gmail.com'),
(14, 'kumlax@gmail.com', 'Your submitted final for Project-I has been Accepted.', 'Project-I', 'stall', 'vishnepal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `project1`
--

CREATE TABLE `project1` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_name` varchar(100) NOT NULL,
  `mem1_email` varchar(100) NOT NULL,
  `mem1_name` varchar(100) NOT NULL,
  `mem2_email` varchar(100) NOT NULL,
  `mem2_name` varchar(100) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `mid` varchar(100) NOT NULL,
  `final` varchar(100) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project1`
--

INSERT INTO `project1` (`id`, `email`, `email_name`, `mem1_email`, `mem1_name`, `mem2_email`, `mem2_name`, `proposal`, `mid`, `final`, `sup_name`, `sup_email`, `college`) VALUES
(1, 'kumram@gmail.com', 'Ram Kumar', 'kumlax@gmail.com', 'Laxman Kumar', 'none', 'none', 'Accepted', 'Accepted', 'Accepted', 'John Doe', 'johndoe@gmail.com', 'Nepali College');

-- --------------------------------------------------------

--
-- Table structure for table `project2`
--

CREATE TABLE `project2` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_name` varchar(100) NOT NULL,
  `mem1_email` varchar(100) NOT NULL,
  `mem1_name` varchar(100) NOT NULL,
  `mem2_email` varchar(100) NOT NULL,
  `mem2_name` varchar(100) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `mid` varchar(100) NOT NULL,
  `final` varchar(100) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project3`
--

CREATE TABLE `project3` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_name` varchar(100) NOT NULL,
  `mem1_email` varchar(100) NOT NULL,
  `mem1_name` varchar(100) NOT NULL,
  `mem2_email` varchar(100) NOT NULL,
  `mem2_name` varchar(100) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `mid` varchar(100) NOT NULL,
  `final` varchar(100) NOT NULL,
  `sup_name` varchar(100) NOT NULL,
  `sup_email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `id` int(100) NOT NULL,
  `proposal_statement` varchar(100) NOT NULL,
  `mid_statement` varchar(100) NOT NULL,
  `final_statement` varchar(100) NOT NULL,
  `project_no` int(100) NOT NULL,
  `project_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `proposal_statement`, `mid_statement`, `final_statement`, `project_no`, `project_type`) VALUES
(1, 'okay', 'okay', 'okay', 1, 'Project-I');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `verify` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_fname`, `user_email`, `user_pass`, `role`, `college`, `verify`) VALUES
(2, 'Ram Kumar', 'kumram@gmail.com', 'a3VtYXIxMjM=', 'student', 'Nepali College', 'Yes'),
(3, 'Laxman Kumar', 'kumlax@gmail.com', 'bGF4MTIz', 'student', 'Nepali College', 'Yes'),
(4, 'Bharat KC', 'bharatkc@gmail.com', 'YmhhcmF0MTIz', 'student', 'Nepali College', 'Yes'),
(5, 'John Doe', 'johndoe@gmail.com', 'ZG9lMTIz', 'supervisor', 'Nepali College', 'Yes'),
(6, 'Jigme Sherpa', 'jigsherpa@gmail.com', 'c2hlcnBhMTIz', 'student', 'Nepali College', 'Yes'),
(7, 'James Corden', 'jamie123@gmail.com', 'amFtZXMxMjM=', 'student', 'Nepali College', 'Yes'),
(8, 'Jimmy Kimmel', 'jimkim@gmail.com', 'amltMTIz', 'supervisor', 'Nepali College', 'Yes'),
(9, 'Peter Griiffin', 'petegif@gmail.com', 'cGV0ZTEyMw==', 'student', 'Nepali College', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificat`
--
ALTER TABLE `notificat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project1`
--
ALTER TABLE `project1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project2`
--
ALTER TABLE `project2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project3`
--
ALTER TABLE `project3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificat`
--
ALTER TABLE `notificat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project1`
--
ALTER TABLE `project1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project2`
--
ALTER TABLE `project2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project3`
--
ALTER TABLE `project3`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
