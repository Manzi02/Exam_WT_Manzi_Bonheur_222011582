-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 02:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_project_management_training_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`attendee_id`, `user_id`, `workshop_id`, `registration_date`) VALUES
(1, 3, 5, '2024-05-16 10:01:17'),
(2, 4, 2, '2024-05-16 10:01:17'),
(3, 2, 1, '2024-05-16 10:01:17'),
(4, 3, 3, '2024-05-16 10:01:17'),
(5, 1, 4, '2024-05-16 10:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificate_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`certificate_id`, `user_id`, `workshop_id`, `issue_date`) VALUES
(1, 3, 5, '2024-06-05'),
(2, 4, 2, '2024-06-20'),
(3, 2, 1, '2024-07-10'),
(4, 3, 3, '2024-07-05'),
(5, 1, 4, '2024-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `workshop_id`, `enrollment_date`) VALUES
(1, 3, 1, '2024-05-16 10:05:42'),
(2, 4, 2, '2024-05-16 10:05:42'),
(3, 2, 1, '2024-05-16 10:05:42'),
(4, 1, 3, '2024-05-16 10:05:42'),
(5, 4, 5, '2024-05-16 10:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `workshop_id`, `user_id`, `rating`, `comments`, `feedback_date`) VALUES
(1, 5, 3, 4, 'Great workshop, learned a lot about Agile.', '2024-05-16 10:03:56'),
(2, 2, 4, 1, 'Excellent presentation, very informative.', '2024-05-16 10:03:56'),
(3, 1, 1, 2, 'Enjoyed the interactive exercises.', '2024-05-16 10:03:56'),
(4, 3, 3, 5, 'Instructor was very knowledgeable and engaging.', '2024-05-16 10:03:56'),
(5, 4, 2, 3, 'Helpful for preparing for the CSM exam.', '2024-05-16 10:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `expertise_area` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `user_id`, `bio`, `expertise_area`) VALUES
(1, 1, 'Experienced project manager with 10+ years of experience.', 'Agile Methodology'),
(2, 2, 'Certified Scrum Master (CSM) and Agile Coach.', 'Scrum Framework'),
(42, 3, 'Certified Scrum Master (CSM) and Agile Coach.', 'Scrum Framework'),
(43, 4, 'John Doe is a highly experienced instructor with a background in computer science.', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `workshop_id`, `title`, `description`, `link`, `upload_date`) VALUES
(1, 4, 'Agile Fundamentals Slides', 'Presentation slides from the workshop.', 'https://example.com/agile-slides.pdf', '2024-05-16 10:06:17'),
(2, 5, 'Scrum Fundamentals Workbook', 'Workbook for Scrum fundamentals workshop.', 'https://example.com/scrum-workbook.pdf', '2024-05-16 10:06:17'),
(3, 3, 'Advanced Agile Techniques Video', 'Video recording of the workshop.', 'https://example.com/advanced-agile-video.mp4', '2024-05-16 10:06:17'),
(4, 1, 'CSM Training Guide', 'Study guide for CSM certification exam.', 'https://example.com/csm-training-guide.pdf', '2024-05-16 10:06:17'),
(5, 2, 'Agile Project Management Handbook', 'Comprehensive handbook for Agile project management.', 'https://example.com/agile-handbook.pdf', '2024-05-16 10:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `workshop_id`, `amount`, `payment_date`) VALUES
(1, 3, 1, 50.00, '2024-05-16 10:02:21'),
(2, 4, 2, 75.00, '2024-05-16 10:02:21'),
(3, 1, 5, 50.00, '2024-05-16 10:02:21'),
(4, 3, 3, 75.00, '2024-05-16 10:02:21'),
(5, 4, 4, 100.00, '2024-05-16 10:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `project_management_resources`
--

CREATE TABLE `project_management_resources` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_management_resources`
--

INSERT INTO `project_management_resources` (`resource_id`, `title`, `description`, `link`, `upload_date`) VALUES
(1, 'Agile Manifesto', 'The foundational document of Agile methodology.', 'https://agilemanifesto.org/', '2024-05-16 10:01:42'),
(2, 'Scrum Guide', 'Official guide to Scrum framework by Scrum.org.', 'https://scrumguides.org/', '2024-05-16 10:01:42'),
(3, 'Kanban Overview', 'Introduction to Kanban methodology.', 'https://kanbanize.com/kanban-resources/getting-started/what-is-kanban', '2024-05-16 10:01:42'),
(4, 'Project Management Institute (PMI)', 'Leading global association for the project management profession.', 'https://www.pmi.org/', '2024-05-16 10:01:42'),
(5, 'Agile Alliance', 'Non-profit organization dedicated to promoting Agile values and principles.', 'https://www.agilealliance.org/', '2024-05-16 10:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'Manzi', 'Bonheur', 'manzib', 'bonmanzi22@gmail.com', '0788903506', '$2y$10$TIfuidyDejvIoRNYUD7N2edutJ0pnhZb15tFj63RdCQp7StWgJtWm', '2024-05-16 09:50:25', '8888', 0),
(2, 'sandrine', 'tumukunde', 'tumukunde', 'tumukundesando@gmail.com', '0785976635', '$2y$10$.9UYntXiz610oiyGr3Y5cuguzGf2bBQbr0cs8QeercZKsqc5jjt5i', '2024-05-16 09:51:15', '456', 0),
(3, 'blaise', 'matuidi', 'blaisemtd', 'matuidbls@gmail.com', '0788999999', '$2y$10$wKLMj89WjWewMWieq76EzOIPtpoJIpUCbKFJVcMn8bV4ryZnL688q', '2024-05-16 09:51:59', '76543', 0),
(4, 'aline ', 'umuhoza', 'alinemuhoza', 'aumuhoza22@gmail.com', '074323233434', '$2y$10$DkOpfTiNWda8llbPZ9yoo.CGlqs8cuGUbxxxNAaMxj.lzE2pGxg/e', '2024-05-16 09:52:50', '998877', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `workshop_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`workshop_id`, `instructor_id`, `title`, `description`, `date`, `duration`, `location`, `max_capacity`) VALUES
(1, 42, 'Introduction to Agile', 'Learn the basics of Agile Methodology.', '0000-00-00', 120, 'Virtual', 50),
(2, 2, 'Scrum Fundamentals', 'Understand the principles and practices of Scrum.', '2024-06-15', 90, 'Online', 30),
(3, 1, 'Advanced Agile Techniques', 'Explore advanced Agile techniques and best practices.', '2024-07-01', 150, 'Virtual', 40),
(4, 43, 'Certified Scrum Master (CSM) Training', 'Prepare for the CSM certification exam.', '2024-07-15', 120, 'Online', 20),
(5, 1, 'Agile Project Management Workshop', 'Hands-on workshop on Agile project management.', '2024-08-01', 180, 'Virtual', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `project_management_resources`
--
ALTER TABLE `project_management_resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_management_resources`
--
ALTER TABLE `project_management_resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `attendees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `attendees_ibfk_2` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`);

--
-- Constraints for table `workshops`
--
ALTER TABLE `workshops`
  ADD CONSTRAINT `workshops_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
