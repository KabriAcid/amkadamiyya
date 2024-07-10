-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2024 at 06:35 PM
-- Server version: 10.5.24-MariaDB-cll-lve-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amkadami_result_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `index_no` varchar(10) NOT NULL DEFAULT 'NIA',
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `graduation_year` int(11) NOT NULL,
  `position_held` varchar(100) NOT NULL DEFAULT 'NIL',
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'UNKNOWN',
  `lga` varchar(100) NOT NULL DEFAULT 'Jalingo',
  `state` varchar(100) DEFAULT NULL,
  `nin_number` varchar(20) NOT NULL DEFAULT 'UNAVAILABLE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `first_name`, `second_name`, `last_name`, `index_no`, `date_of_birth`, `gender`, `graduation_year`, `position_held`, `email`, `phone_number`, `address`, `lga`, `state`, `nin_number`) VALUES
(101, 'Hassan', 'Adam', 'Kabri', '4350785008', '2005-05-05', 'Male', 1, 'Laboratory', 'hazanmeenat@gmail.com', '07045324656', 'Sabon Gari, Jalingo', 'Jalingo', 'Taraba', '29123216438'),
(102, 'Aseeya', 'Abdul-aziz', 'Faruq', '4350785001', '2007-12-03', 'Female', 1, 'Library Prefect', 'aseeyaabdul-azizfaruq@gmail.com', '08125594744', 'Behind Gdss Sabon Gari , Jalingo', 'Jalingo', 'Taraba', '99993440202'),
(103, 'Amina', 'Abdullahi', 'Modibbo', '4350785002', '2007-07-27', 'Female', 1, 'Vernacular Prefect', 'aminaabdullahimodibbo@gmail.com', '08101478667', '107 Palace Way Jalingo', 'Jalingo', 'Taraba', '55864734388'),
(104, 'Hadiyya', 'Abdullahi', 'Hassan', '4350785003', '2006-09-25', 'Female', 1, 'Mosque Prefect', 'hadiyyaabdullahihassan@gmail.com', '09036682485', 'Saminaka Junction Dadin Kowa', 'Jalingo', 'Taraba', '82484307038'),
(105, 'Harun', 'Abubakar', 'Kabri', '4350785005', '2008-03-12', 'Male', 1, 'Utility Prefect', 'abubakarkabrih@gmail.com', '07035414855', 'Behind Abattoir Sabon Gari Road Jalingo', 'Jalingo', 'Taraba', '95086843114'),
(106, 'Ibrahim', 'Abubakar', 'Kabri', '4350785006', '2005-07-24', 'Male', 1, 'Vernacular Prefect', 'iabubakarkabri@gmail.com', '07080539273', 'Behind Abbattoir, Jalingo', 'Jalingo', 'Taraba', '17951938852'),
(107, 'Abdurrahim', 'Adam', 'Usman', '4350785007', '2006-11-07', 'Male', 1, 'Mosque Prefect', 'abdurrahimadamusman7@gmail.com', '08124440769', 'Behind Mcan Mosque Jalingo', 'Jalingo', 'Taraba', '24627701587'),
(108, 'Khalid', 'Adam', 'Muhammad', '4350785009', '2004-11-24', 'Male', 1, 'Mosque Prefect', 'khaleeda053@gmail.com', '07033379481', '', 'Jalingo', 'Taraba', '20344496297'),
(109, 'Muhammad', 'Adam', 'Ahmad', '4350785010', '2006-07-08', 'Male', 1, 'Mosque Prefect', 'muhammadadamahmad@gmail.com', '09018460472', '', 'Sardauna', 'Taraba', '97169423869'),
(110, 'Rabi`atu', 'Adam', 'Dahiru', '4350785011', '2005-08-22', 'Female', 1, 'Mosque Prefect', 'rabiatuadamdahir@gmail.com', '09137211550', '', 'Jalingo', 'Taraba', '86934598716'),
(111, 'Hamidu', 'Adamu', 'Gamu', '4350785012', '1991-06-17', 'Male', 1, 'NIL', 'hamiduadamu163@gmail.com', '08136084763', 'Behind Abbattoir, Jalingo', 'Jalingo', 'Taraba', '77311079562'),
(112, 'Abubakar', 'Ahmad', 'Gamu', '4350785013', '2005-01-01', 'Male', 1, 'Vernacular Prefect', 'abubakarahmadgamu@gmail.comv', '09164121499', 'Behind Abbattoir, Jalingo', 'Ganye', 'Adamawa', '80922742553'),
(113, 'Muhammad', 'Aliyu', 'Modibbo', '4350785014', '2005-05-05', 'Male', 1, 'Head Boy', 'muhammadaliyumodee884@gmail.com', '09121658975', 'Saminaka Junction Dadin Kowa', 'Jalingo', 'Taraba', '31682676281'),
(114, 'Yasir', 'Aliyu', 'Modibbo', '4350785015', '2005-01-01', 'Male', 1, 'Uniform Prefect', 'yasiraliyumodibbo619@gmail.com', '08161587697', 'Saminaka Junction Dadin Kowa', 'Sardauna', 'Taraba', '12247325659'),
(115, 'Abdussalam', 'Dahiru', 'Sadiq', '4350785016', '2006-08-08', 'Male', 1, 'Mosque Prefect', 'abdussalamdahiru56@gmail.com', '09039792762', '', 'Jalingo', 'Taraba', '85963176019'),
(116, 'Abdullahi', 'Ibrahim', 'Banyang', '4350785018', '1995-06-08', 'Male', 1, 'NIL', 'ibrahimbanyangabdullahi@gmail.com', '08132833852', 'Behind Malam Sahabi Resident Jalingo', 'Jalingo', 'Taraba', '24026684227'),
(117, 'Najashi', 'Ibrahim', 'Waziri', '4350785019', '2007-05-09', 'Male', 1, 'Mosque Prefect', 'najashiibrahimwaziri@gmail.com', '09124085806', 'Behind Abbattoir, Jalingo Sabon Gari Road', 'Wukari', 'Taraba', '98972108212'),
(118, 'Abubakar', 'Muhammad', 'Abubakar', '4350785021', '2007-11-07', 'Male', 1, 'Time-keeper', 'sadiqabubakarmuhammad@gmail.com', '09138619561', 'Behind Gdss Sabon Gari , Jalingo', 'Gombe', 'Gombe', '17605168892'),
(119, 'Abubakar', 'Muhammad', 'Yusuf', '4350785022', '2007-07-22', 'Male', 1, 'Mosque Prefect', 'abubkarmuhammadyusuf677@gmail.com', '07061073860', 'Behind Takanaban Market Jalingo', 'Jalingo', 'Taraba', '49228811919'),
(120, 'Anisa', 'Muhammad', 'Hafiz', '4350785025', '2007-08-01', 'Female', 1, 'Uniform Prefect', 'anisamuhammadhafiz@gmail.com', '07061293247', 'Saminaka Junction Opposite Amkadamiyya School Jalingo', 'Sardauna', 'Taraba', '13346330231'),
(121, 'Jamila', 'Muhammad', 'Dabo', '4350785026', '2008-01-01', 'Female', 1, 'NIL', 'Jamilamuhammaddabo@gmail.com', '07041122521', 'Saminaka Junction Behind Amkadamiyya School Jalingo', 'Sardauna', 'Taraba', '75249245120'),
(122, 'Nusaiba', 'Muhammad', 'Adam', '4350785027', '2006-07-08', 'Female', 1, 'Vernacular Prefect', 'nusaibamuhammadadam0@gmail.com', '07049480629', 'Behind Gdss Sabon Gari , Jalingo', 'Jalingo', 'Taraba', '33312595144'),
(123, 'Salihu', 'Muhammad', 'Abubakar', '4350785028', '2005-12-27', 'Male', 1, 'Deputy Head Boy', 'abubkarsalihumuhammad2@gmail.com', '07065447675', 'Behind Abbattoir, Jalingo', 'Jalingo', 'Taraba', '59982518714'),
(124, 'Zainab', 'Muhammad', 'Inuwa', '4350785029', '2008-07-18', 'Female', 1, 'Lab Prefect', 'zainabmuhammadinuwakarim@gmail.com', '08142701695', '', 'Jalingo', 'Taraba', '46221763613'),
(125, 'Zakiya', 'Muhammad', 'Adam', '4350785030', '2006-03-27', 'Female', 1, 'Vernacular Prefect', 'zakiyamuhammadadam@gmail.com', '07044774609', 'Behind Gdss Sabon Gari , Jalingo', 'Jalingo', 'Taraba', '83414808177'),
(126, 'Adam', 'Muhammad', 'Salihu', '4350785023', '2006-02-14', 'Male', 1, 'NIL', 'adamsalihumuhmmad@gmail.com', '', '', 'Ibi', 'Taraba', 'nil'),
(131, 'Aisha', 'Abubakar', 'Muhammad', '4350785024', '2007-05-28', 'Female', 1, 'NIL', 'aishamuhammadabubakar@gmail.com', '09033347065', '', 'Jalingo', 'Taraba', '1'),
(132, 'Aisha', 'Sanusi', 'Sulaiman', '4350785031', '2008-01-02', 'Female', 1, 'Deputy Head Gril', 'aishasanusisuleiman@gmail.com', '08161515829', '', 'Jalingo', 'Taraba', '0'),
(136, 'Maryam', 'Ja`afar', 'Suleiman', '4350785032', '2008-05-28', 'Female', 1, 'NIL', 'maryamjaafarsuleiman@gmail.com', '09065873962', 'Behind Abbattoir, Jalingo', 'Jalingo', 'Taraba', '4011844246'),
(137, 'Muhammad', 'Auwal', 'Umar', '4350785033', '2006-04-19', 'Male', 1, 'NIL', 'muhammadauwalumar@gmail.com', '', '', 'Jalingo', 'Taraba', '6773479302'),
(138, 'Abubakar', 'Usman', 'Yawale', '4350785034', '2004-12-29', 'Male', 1, 'Labour Prefect', 'abubakarusman@gmail.com', '09061155063', 'Saminaka Junction Dadin Kowa', 'Jalingo', 'Taraba', '265412437'),
(139, 'Bashir', 'Abubakar', 'Muhammad', '4350785004', '2006-12-31', 'Male', 1, 'NIL', 'bashirabubakarmuhammad@gmail.com', '08137125252', 'Behind Abbattoir, Jalingo', 'Jalingo', 'Taraba', '5646587985'),
(140, 'Hassan', 'Muhammad', 'Iya', '4350785017', '2005-01-25', 'Male', 1, 'NIL', 'hassanmuhammadiya@gmail.com', '09034853288', 'Behind Abbattoir, Jalingo', 'Sardauna', 'Taraba', '21708892934'),
(141, 'Usman', 'Lawan', 'Sani', '4350785020', '2007-08-31', 'Male', 1, 'NIL', 'usmanlawansani@gmail.com', '07012226121', 'Behind Abbattoir, Jalingo', 'Lau', 'Taraba', '998765431');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'uploads/default.png',
  `parent_firstName` varchar(255) NOT NULL,
  `parent_lastName` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_address` varchar(255) NOT NULL,
  `parent_occupation` varchar(255) NOT NULL,
  `parent_maritalStatus` varchar(255) NOT NULL,
  `parent_phoneNumber` varchar(255) NOT NULL,
  `parent_altPhone` varchar(255) NOT NULL,
  `parent_birthState` varchar(255) NOT NULL,
  `parent_birthLGA` varchar(255) NOT NULL,
  `enrolling_class` varchar(255) NOT NULL,
  `application_code` varchar(255) NOT NULL,
  `admission_status` int(2) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `section_id`) VALUES
(1, 'Nursery 1A', 1),
(2, 'Nursery 1B', 1),
(3, 'Nursery 2A', 1),
(4, 'Nursery 2B', 1),
(5, 'Nursery 3A', 1),
(6, 'Nursery 3B', 1),
(7, 'Primary 1A', 2),
(8, 'Primary 1B', 2),
(9, 'Primary 2A', 2),
(10, 'Primary 2B', 2),
(11, 'Primary 3A', 3),
(12, 'Primary 3B', 3),
(13, 'Primary 4A', 3),
(14, 'Primary 4B', 3),
(15, 'Primary 5A', 3),
(16, 'Primary 5B', 3),
(17, 'JSS1', 4),
(18, 'JSS2', 4),
(19, 'JSS3', 4),
(20, 'SSS1', 5),
(21, 'SSS2 Art', 6),
(22, 'SSS2 Science', 7),
(23, 'SSS3 Art', 8),
(24, 'SSS3 Science', 9);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `submission_date`) VALUES
(1, 'Kabri', 'Acid', 'kabriacid01@gmail.com', '0904949384', 'Helloandwelcome', '2024-06-20 03:05:51'),
(2, 'Daquan', 'Weeks', 'kabri@xyz.abc', '12345678345678', 'Aut non molestiae iu', '2024-06-20 03:10:20'),
(3, 'Marny', 'England', 'fyvic@mailinator.com', '+1 (474) 296-1293', 'Et possimus magnam', '2024-06-20 03:10:41'),
(4, 'Odette', 'Mejia', 'kite@mailinator.com', '+1 (395) 321-53', 'Ut tempor in sed aut', '2024-06-20 03:11:01'),
(5, 'September', 'Schultz', 'xulavyfegy@mailinatorcom', '+1 (949) 429-1852', 'Quia exercitation ma', '2024-06-20 03:11:14'),
(6, 'Galena', 'Saunders', 'gocupu@mailinator.com', '+1 (772) 194-1791', 'Repudiandae ea accus', '2024-06-20 03:14:51'),
(7, 'John', 'Sykes', 'vifaniw@mailinator', '+1 (881) 762-9979', 'Velit tempora ut qui', '2024-06-20 03:15:03'),
(8, 'Gail', 'Diaz', 'gohore@mailinator.com', '16216971188', 'Mollit reiciendis qu', '2024-06-20 03:23:25'),
(9, 'Duncan', 'Summers', 'pacexitig@mailinator.com', '234802345678', 'Rerum dolor reprehen', '2024-06-20 03:27:16'),
(10, 'Ismail', 'Babaji', 'ismailjugulde@gmail.com', '08107530819', 'Hii ankle if it\'s not yet ðŸ™ƒ ðŸ™‚ can person if I call you doing something else that aging is allowed for me like ðŸ¤” and above the best on the app to', '2024-06-23 11:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `defaults`
--

CREATE TABLE `defaults` (
  `default_id` int(11) NOT NULL,
  `session_name` varchar(100) DEFAULT '2023/2024',
  `current_term` varchar(100) DEFAULT '3rd Term',
  `term_ending` varchar(100) DEFAULT '05-July-2024',
  `term_begins` varchar(100) DEFAULT '15-Aug-2024'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `defaults`
--

INSERT INTO `defaults` (`default_id`, `session_name`, `current_term`, `term_ending`, `term_begins`) VALUES
(1, '2023/2024', '3rd Term', '05-July-2024', '15-Aug-2024');

-- --------------------------------------------------------

--
-- Table structure for table `graduation_year`
--

CREATE TABLE `graduation_year` (
  `year_id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graduation_year`
--

INSERT INTO `graduation_year` (`year_id`, `year`) VALUES
(1, '2024'),
(2, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `nigerian_states`
--

CREATE TABLE `nigerian_states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nigerian_states`
--

INSERT INTO `nigerian_states` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` int(11) NOT NULL,
  `teacher_id` int(20) DEFAULT NULL,
  `not_level` varchar(255) NOT NULL,
  `not_title` varchar(255) NOT NULL,
  `not_content` varchar(255) NOT NULL,
  `not_icon` varchar(255) NOT NULL,
  `not_iconColor` varchar(255) NOT NULL,
  `not_bgColor` varchar(255) NOT NULL,
  `not_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`not_id`, `teacher_id`, `not_level`, `not_title`, `not_content`, `not_icon`, `not_iconColor`, `not_bgColor`, `not_timestamp`) VALUES
(1, 1042, '1', 'A subject has been uploaded.', 'The data for Arabic has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-20 19:33:35'),
(4, 1032, '1', 'A subject has been uploaded.', 'The data for Handwriting has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-21 20:32:52'),
(5, 1032, '1', 'A subject has been uploaded.', 'The data for Further Mathematics has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-21 20:34:57'),
(6, 1055, '1', 'New Student has been added.', 'Ibrahim Abubakar Saleh has been added successfully.', 'fa fa-user', 'text-info', 'bg-info-soft', '2024-06-22 20:43:37'),
(7, NULL, '', 'Ismail Babaji is trying to reach you.', 'Hii ankle if it\'s not yet ðŸ™ƒ ðŸ™‚ can person if I call you doing something else that aging is allowed for me like ðŸ¤” and above the best on the app to', 'fa fa-envelope', 'text-primary', 'bg-primary-soft', '2024-06-23 11:27:09'),
(8, 1042, '1', 'A subject has been uploaded.', 'The data for Agricultural Science has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-23 15:31:55'),
(9, 1042, '1', 'A subject has been uploaded.', 'The data for Biology has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-23 15:32:33'),
(10, 1042, '1', 'A subject has been uploaded.', 'The data for Chemistry has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-23 15:33:00'),
(11, 1042, '1', 'A subject has been uploaded.', 'The data for Civic Education has been successfully uploaded.', 'ni ni-upload-96', 'text-info', 'bg-info-soft', '2024-06-23 15:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `first_test` int(11) DEFAULT NULL,
  `second_test` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `grade` varchar(2) NOT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_class`
--

CREATE TABLE `school_class` (
  `id` int(11) NOT NULL,
  `class_alias` int(100) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_class`
--

INSERT INTO `school_class` (`id`, `class_alias`, `class_name`) VALUES
(1, 1, 'Pre-Nursery 1'),
(2, 2, 'Nursery 1'),
(3, 3, 'Nursery 2'),
(4, 4, 'Nursery 3'),
(5, 5, 'Primary 1'),
(6, 6, 'Primary 2'),
(7, 7, 'Primary 3'),
(8, 8, 'Primary 4'),
(9, 9, 'Primary 5'),
(10, 10, 'JSS 1'),
(11, 11, 'JSS 2'),
(12, 12, 'JSS 3'),
(13, 13, 'SSS 1'),
(14, 14, 'SSS 2'),
(15, 15, 'SSS 3');

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `session_id` int(11) NOT NULL,
  `session_name` varchar(9) NOT NULL,
  `active_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`session_id`, `session_name`, `active_session`) VALUES
(1, '2018/2019', 0),
(2, '2019/2020', 0),
(3, '2020/2021', 0),
(4, '2021/2022', 0),
(5, '2022/2023', 0),
(6, '2023/2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`) VALUES
(1, 'Nursery Section'),
(2, 'Lower Primary'),
(3, 'Upper Primary'),
(4, 'Junior Secondary'),
(5, 'SSS1'),
(6, 'SSS2 Art'),
(7, 'SSS2 Science'),
(8, 'SSS3 Art'),
(9, 'SSS3 Science');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'Taraba',
  `lga` varchar(50) NOT NULL DEFAULT 'Jalingo',
  `class_id` int(11) NOT NULL,
  `section_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `second_name`, `last_name`, `gender`, `state`, `lga`, `class_id`, `section_id`, `timestamp`) VALUES
(1001, 'Yasir', 'Abubakar', 'Sani', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:29:12'),
(1002, 'Yusuf', 'Abubakar', 'Kabri', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:29:37'),
(1003, 'Muhsin', 'Muhammad', 'Bello', 'Male', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:30:11'),
(1004, 'Abubakar', 'Idris', 'Ahmad', 'Male', 'Adamawa', 'Ganye', 21, 6, '2024-06-10 10:30:53'),
(1005, 'Fawaz', 'Aminu', '', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:31:35'),
(1006, 'Marwan', 'Abdul-hamid', '', 'Male', 'Taraba', 'Sardauna', 22, 7, '2024-06-10 10:32:06'),
(1007, 'Al-qasim', 'Usman', 'Mafindi', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:33:17'),
(1008, 'Jibril', 'Abubakar', 'Kabri', 'Male', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:33:46'),
(1009, 'Umar', 'Mustafa', 'Muhammad', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:34:33'),
(1010, 'Ahmad', 'Muhammad', 'Murtala', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:35:08'),
(1011, 'Alyasa`u', 'Abubakar', '', 'Male', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:35:55'),
(1012, 'Abubakar', 'Abdulkareem', 'Abubakar', 'Male', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:36:33'),
(1013, 'Muktar', 'Abubakar', 'Idris', 'Male', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:37:33'),
(1014, 'Hannatu', 'Ali', '', 'Female', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:38:38'),
(1015, 'Fatima', 'Abubakar', 'Kabri', 'Female', 'Taraba', 'Sardauna', 21, 6, '2024-06-10 10:39:14'),
(1016, 'Takiyya', 'Muhammad', 'Bello', 'Female', 'Taraba', 'Sardauna', 21, 6, '2024-06-10 10:40:01'),
(1017, 'Fatima', 'Muhammad', 'Auwal', 'Female', 'Taraba', 'Bali', 21, 6, '2024-06-10 10:40:33'),
(1018, 'Firdausi', 'Dahir', '', 'Female', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:41:02'),
(1019, 'Hafsat', 'Abdul-aziz', 'Jibrin', 'Female', 'Taraba', 'Wukari', 21, 6, '2024-06-10 10:41:40'),
(1020, 'Bilkisu', 'Muhammad', 'Adam', 'Female', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:42:11'),
(1021, 'Khadija', 'Adam', 'Okala', 'Female', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:42:37'),
(1022, 'Jamila', 'Abubakar', 'Sahabi', 'Female', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:43:00'),
(1023, 'Fatima', 'Shukuranu', '', 'Female', 'Taraba', 'Jalingo', 21, 6, '2024-06-10 10:43:38'),
(1024, 'Fatima', 'Muhammad', 'Salihu', 'Female', 'Taraba', 'Ibi', 21, 6, '2024-06-10 10:44:13'),
(1025, 'Sakina', 'Abubakar', 'Kabri', 'Female', 'Taraba', 'Jalingo', 22, 7, '2024-06-10 10:44:41'),
(1026, 'Dahiru', 'Ahmad', 'Modibbo', 'Male', 'Adamawa', 'Ganye', 19, 4, '2024-06-10 10:51:18'),
(1027, 'Yunusa', 'Abubakar ', 'Usman', 'Male', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:51:51'),
(1028, 'Isa', 'Yakubu', '', 'Male', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:52:17'),
(1029, 'Dahiru', 'Naziru', 'Jalo', 'Male', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:52:43'),
(1030, 'Adama', 'Jafar', 'Gadu', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:53:49'),
(1031, 'Amina', 'Saleh', 'Abdullahi', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:54:16'),
(1032, 'Hannatu', 'Abubakar', 'Ibrahim', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:54:55'),
(1033, 'Habiba', 'Abubakar', 'Jibril', 'Female', 'Bauchi', 'Bauchi', 19, 4, '2024-06-10 10:55:57'),
(1034, 'Khadija', 'Adam', 'Muhammad', 'Female', 'Gombe', 'Gombe', 19, 4, '2024-06-10 10:56:32'),
(1035, 'Maryam', 'Yahya', 'Adam', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:56:57'),
(1036, 'Maryam', 'Yahya', 'Adam', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:57:54'),
(1037, 'Ramlat', 'Muhammad', 'Abdallah', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:58:44'),
(1038, 'Aisha', 'Usman', 'Mafindi', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 10:59:12'),
(1039, 'Hajara', 'Muhammad', 'Salihu', 'Female', 'Taraba', 'Ibi', 19, 4, '2024-06-10 10:59:42'),
(1040, 'Fatima', 'Saleh', 'Abdullahi', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 11:00:07'),
(1041, 'Aisha', 'Muhammad', 'Salihu', 'Female', 'Taraba', 'Ibi', 19, 4, '2024-06-10 11:00:35'),
(1042, 'Ummusalma', 'Isa', 'Muhammad', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 11:01:12'),
(1043, 'Nuaimat', 'Abubakar', 'Maiyaki', 'Female', 'Taraba', 'Wukari', 19, 4, '2024-06-10 11:02:00'),
(1044, 'Fatima', 'Jibrila', 'Abdullahi', 'Female', 'Taraba', 'Sardauna', 19, 4, '2024-06-10 11:02:41'),
(1045, 'Aisha', 'Jafar', 'Suleiman', 'Female', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 11:03:58'),
(1046, 'Yusuf', 'Adamu', 'Ahmad', 'Male', 'Taraba', 'Jalingo', 19, 4, '2024-06-10 11:10:17'),
(1047, 'Aisha', 'Abubakar', 'Kabri', 'Female', 'Taraba', '', 18, 4, '2024-06-17 22:15:14'),
(1051, 'Amina', 'Dauda', 'Mai-anguwa', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:17:51'),
(1052, 'Nazifa', 'Uamr', 'Ahmad', 'Female', 'Taraba', 'Lau', 18, 4, '2024-06-17 22:18:26'),
(1053, 'Umaidat', 'Abdul-aziz', 'Jibril', 'Female', 'Taraba', 'Wukari', 18, 4, '2024-06-17 22:19:19'),
(1054, 'Aisha', 'Adam', 'Kabri', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:19:55'),
(1055, 'Khadija ', 'Usman', 'Muhammad', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:20:38'),
(1056, 'Fatima', 'Rabiu', 'Saidu', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:21:10'),
(1058, 'Fatima', 'Salihu', 'Abubakar', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:22:29'),
(1059, 'Firdausi', 'Ibrahim', 'Auwal', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:23:30'),
(1060, 'Faiza', 'Abdullahi', '', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:24:16'),
(1061, 'Fatima', 'Abubakar', 'Musa', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:25:49'),
(1062, 'Khafilat', 'Lawan', 'Akintobi', 'Female', 'Fct', 'Abubja', 18, 4, '2024-06-17 22:28:17'),
(1063, 'Zunnira ', 'Umar', 'Jibril', 'Female', 'Taraba', 'Bali', 18, 4, '2024-06-17 22:29:37'),
(1064, 'Zannira', 'Usman', 'Towi', 'Female', 'Taraba', 'Karim Lamido', 18, 4, '2024-06-17 22:32:55'),
(1065, 'Hamida', 'Usman', 'Malami', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:33:33'),
(1066, 'Arifa', 'Umar', 'Sani', 'Female', 'Taraba', 'Lau', 18, 4, '2024-06-17 22:34:16'),
(1067, 'Nusaiba', 'Danjuma', 'Hussaini', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:34:54'),
(1068, 'Khadija', 'Muhammad', 'Salihu', 'Female', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:35:43'),
(1069, 'Salwa', 'Yusha`u', 'Abubakar', 'Female', 'Taraba', 'Wukari', 18, 4, '2024-06-17 22:36:20'),
(1070, 'Sadiya', 'Abubakar', 'Jibril', 'Female', 'Bauchi', 'Bauchi', 18, 4, '2024-06-17 22:37:15'),
(1071, 'Salma', 'Yusha`u', 'Abubakar', 'Female', 'Taraba', 'Wukari', 18, 4, '2024-06-17 22:38:13'),
(1073, 'Salma', 'Yusha`u', 'Abubakar', 'Female', 'Taraba', 'Wukari', 18, 4, '2024-06-17 22:39:19'),
(1074, 'Hauwa', 'Dauda', 'Hammanjoda', 'Female', 'Taraba', 'Sardauna', 18, 4, '2024-06-17 22:39:57'),
(1075, 'Muhammad  ', 'Muhammad', 'Tukur', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:40:38'),
(1076, 'Raisu', 'Inuwa', 'Sambo', 'Male', 'Taraba', 'Sardauna', 18, 4, '2024-06-17 22:41:36'),
(1077, 'Muhammad  ', 'Adam', 'Kabri', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:43:11'),
(1078, 'Umar', 'Shuaibu', 'Chikito', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:43:58'),
(1079, 'Sani', 'Abubakar', 'Sani', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:44:29'),
(1084, 'Umar', 'Muhammad', 'Tukur', 'Male', 'Taraba', 'Sardauna', 18, 4, '2024-06-17 22:47:39'),
(1085, 'Abdul-jalal', 'Yahya', 'Yunusa', 'Male', 'Cross River', 'Calaba', 18, 4, '2024-06-17 22:48:57'),
(1086, 'Suleiman', 'Umar', 'Lere', 'Male', 'Kaduna', 'Lere', 18, 4, '2024-06-17 22:49:47'),
(1087, 'Hassan', 'Umar', 'Hassan', 'Male', 'Taraba', 'Ibi', 18, 4, '2024-06-17 22:50:38'),
(1088, 'Muhammad  ', 'Lawan', 'Muhammad', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:52:11'),
(1089, 'Ibrahim', 'Musa', 'Abba Tukur', 'Male', 'Taraba', 'Jalingo', 18, 4, '2024-06-17 22:53:05'),
(1091, 'Yusuf', 'Abubakar', '', 'Male', 'Taraba', 'Ardo-kola', 18, 4, '2024-06-17 22:54:39'),
(1092, 'Abdul-hadi', 'Shuaibu', '', 'Male', 'Taraba', 'Gassol', 18, 4, '2024-06-17 22:55:34'),
(1093, 'Abdul-kadir', 'Yakubu', '', 'Male', 'Taraba', 'Gassol', 18, 4, '2024-06-17 22:56:54'),
(1094, 'Abdullahi', 'Muhammad', '', 'Male', 'Borno', 'Dambuwa', 18, 4, '2024-06-18 03:25:53'),
(1095, 'Mubarak', 'Dahiru', '', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:28:04'),
(1096, 'Fatima', 'Dauda', 'Mai-anguwa', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:28:49'),
(1097, 'Yuhanasu', 'Haruna', 'Kinda', 'Female', 'Taraba', 'Wukari', 20, 5, '2024-06-18 03:29:25'),
(1098, 'Salamatu', 'Bello', '', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:30:25'),
(1099, 'Hafsat', 'Muhammad', 'Tukur', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:30:57'),
(1100, 'Hauwa`u', 'Abubakar', 'Kabri', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:31:54'),
(1101, 'Fatima', 'Lawan', 'Maigari', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:32:21'),
(1102, 'Zulaika', 'Muhammad', 'Lawan', 'Female', 'Taraba', 'Lau', 20, 5, '2024-06-18 03:33:45'),
(1103, 'Nana Fatima', 'Adamu', 'Ardo', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:34:34'),
(1104, 'Khadija', 'Muhammad', 'Aliyu', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:35:17'),
(1105, 'Zainab', 'Khalid', 'Umar', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:36:09'),
(1106, 'Rabi`atu', 'Abbas', 'Abdullahi', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:36:49'),
(1107, 'Maryam', 'Muhammad', 'Bawange', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:37:28'),
(1108, 'Zulaihat', 'Shehu', 'Umar', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:38:16'),
(1109, 'Hafsat', 'Adam', 'Ahmad', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:39:06'),
(1110, 'Fatima', 'Abubakar', 'Sadiq', 'Female', 'Adamawa', 'Yola South', 20, 5, '2024-06-18 03:39:51'),
(1111, 'Abida', 'Abubakar', 'Yaro', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:40:28'),
(1112, 'Abdul-qahar', 'Adam', 'Muhammad', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:41:20'),
(1115, 'Hafsat', 'Harun', 'Adam', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:44:38'),
(1116, 'Zainul-abideen', 'Buhari', 'Ahmad', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:45:50'),
(1117, 'Hauwa', 'Yahya', 'Muhammad', 'Female', 'Gombe', 'Gombe', 20, 5, '2024-06-18 03:46:44'),
(1118, 'Bilal', 'Adamu', '', 'Male', 'Taraba', 'Ardo-kola', 20, 5, '2024-06-18 03:47:15'),
(1119, 'Ramadan', 'Aliyu', 'Modibbo', 'Male', 'Taraba', 'Sardauna', 20, 5, '2024-06-18 03:47:52'),
(1120, 'Fatima', 'Isa', '', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:48:46'),
(1124, 'Amin', 'Bashir', 'Amin', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:52:32'),
(1125, 'Auwal', 'Hussaini', '', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:53:07'),
(1126, 'Abubakar', 'Ayuba', 'Also', 'Male', 'Taraba', 'Sardauna', 20, 5, '2024-06-18 03:53:48'),
(1127, 'Haruna', 'Muhammad', 'Yusuf', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:55:00'),
(1128, 'Nuruddeen', 'Dauda', 'Mai-anguwa', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 03:55:54'),
(1129, 'Abubakar', 'Usman', 'Aliyu', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 04:25:08'),
(1130, 'Sulaiman', 'Abdul-qadir', 'Sulaiman', 'Male', 'Taraba', 'Wukari', 20, 5, '2024-06-18 04:26:04'),
(1131, 'Sani', 'Usman', 'Yawale', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 04:29:44'),
(1132, 'Fahad', 'Muhammad', 'Tukur', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 04:30:22'),
(1133, 'Jibril', 'Alhassan', '', 'Male', 'Borno', 'Dambuwa', 20, 5, '2024-06-18 04:30:53'),
(1134, 'Muhammad', 'Muhammad', 'Laro', 'Male', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 04:31:23'),
(1135, 'Fatima', 'Dauda', 'Abubakar', 'Female', 'Taraba', 'Sardauna', 20, 5, '2024-06-18 04:33:13'),
(1136, 'Fatima', 'Ibrahim', 'Bammi', 'Female', 'Taraba', 'Jalingo', 20, 5, '2024-06-18 04:34:04'),
(1137, 'Ibrahim', 'Abubakar', 'Saleh', 'Male', 'Taraba', 'Jalingo', 22, 7, '2024-06-22 20:43:37'),
(1138, 'Ibrahim', 'Suleiman', 'Adamu', 'Male', 'Gombe', 'Gombe', 24, 9, '2024-06-26 09:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_section` varchar(50) NOT NULL,
  `subject_class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_section`, `subject_class`) VALUES
(1, 'Agricultural Science', '4-5-7-9', '17-20-22-24'),
(2, 'Arabic', '1-9', '1-22'),
(3, 'Basic Science', '2-4', '7-19'),
(4, 'Basic Technology', '2-4', '7-19'),
(5, 'Biology', '5-7-9', '20-21-23'),
(6, 'Business Studies', '4', '17-19'),
(7, 'Chemistry', '5-7-9', '20-21-23'),
(8, 'Civic Education', '3-9', '11-24'),
(9, 'Computer Studies', '2-9', '7-24'),
(10, 'Economics', '5-6-8', '20-21-23'),
(11, 'English Language', '1-9', '1-22'),
(12, 'Financial Accounting', '5-6-8', '20-21-23'),
(13, 'Further Mathematics', '5-7-9', '20-21-23'),
(14, 'Geography', '5-9', '20-24'),
(15, 'Government', '5-6-8', '20-21-23'),
(16, 'Handwriting', '1-3', '1-16'),
(17, 'History', '5-6-8', '20-21-23'),
(18, 'Huruf', '1-3', '1-16'),
(19, 'Islamic Studies', '4-9', '17-24'),
(20, 'Islamiyyat', '1-9', '1-22'),
(21, 'Literature', '5-6-8', '20-21-23'),
(22, 'Marketing', '5-9', '20-24'),
(23, 'Mathematics', '1-9', '1-22'),
(24, 'Phonics', '1-3', '1-16'),
(25, 'Physics', '5-7-9', '20-21-23'),
(26, 'Pre-Vocational Studies', '1-4', '1-19'),
(27, 'Pre-Vocational Studies I', '2-4', '7-19'),
(28, 'Pre-Vocational Studies II', '2-4', '7-19'),
(29, 'Quran', '1-9', '1-22'),
(30, 'RNV I', '4', '17-19'),
(31, 'RNV II', '4', '17-19'),
(32, 'Science Habits', '1', '1-6'),
(33, 'Verbal Reasoning', '2-3', '7-15');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '17d6fd4cc26f3a47e491f6b3304bf802',
  `photo` varchar(255) NOT NULL DEFAULT 'uploads/default.png',
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `access_level` int(10) NOT NULL DEFAULT 2,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `first_name`, `last_name`, `phone_number`, `username`, `password`, `photo`, `subject_id`, `class_id`, `access_level`, `timestamp`) VALUES
(1002, 'Abdullahi', 'Kabri', '07037943396', 'kabriacid', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/icon.jpg', 22, 21, 1, '2024-06-26 14:52:19'),
(1032, 'Abubakar', 'Kabri Abubakar', '07038341242', 'Abubakar42', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/667399a09849a.jpg', 23, 19, 2, '2024-06-20 02:53:20'),
(1033, 'Fatima', 'Idris', '08161660772', 'Fatima72', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 29, 2, 2, '2024-06-10 13:42:56'),
(1034, 'Yagana', 'Hassan', '07068592642', 'Yagana42', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 20, 3, 2, '2024-06-10 09:47:37'),
(1035, 'Hafsat', 'Ishaq Aliyu', '09030709101', 'Hafsat01', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 11, 1, 2, '2024-06-10 09:48:41'),
(1036, 'Sadika', 'Dauda', '08138323326', 'Sadika26', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 23, 4, 2, '2024-06-10 09:49:50'),
(1037, 'Mansur', 'Muhammed Boyi', '07049281305', 'Mansur05', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 16, 9, 2, '2024-06-10 09:51:40'),
(1038, 'Abbas', 'Abdul-rasheed Maikarfi', '08061209973', 'Abbas73', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 8, 17, 2, '2024-06-10 09:53:22'),
(1039, 'Maryam', 'Bello', '08136414626', 'Maryam26', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 3, 8, 2, '2024-06-10 09:54:21'),
(1040, 'Zainab', 'Hamman-adam', '08061602122', 'Zainab22', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 2, 6, 2, '2024-06-10 09:57:47'),
(1041, 'Khadija', 'Yusuf', '08062524049', 'Khadija49', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 33, 10, 2, '2024-06-10 09:58:40'),
(1042, 'Adam', 'Mahmud', '07060753078', 'Adam78', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 3, 20, 2, '2024-06-10 10:00:10'),
(1043, 'Abubakar', 'Sadiq Abubakar', '08134816835', 'Abubakar35', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 17, 22, 2, '2024-06-10 10:02:56'),
(1044, 'Abubakar', 'Sadiq Abubakar', '08134816835', 'Abubakar30', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 9, 21, 2, '2024-06-10 13:39:06'),
(1045, 'Zulaihatu', 'Yahya', '07037600511', 'Zulaihatu11', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 11, 12, 2, '2024-06-10 10:05:55'),
(1046, 'Muhammad  ', 'Fatihu  Mahmud', '08100098915', 'Muhammad  15', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 8, 13, 2, '2024-06-10 10:07:34'),
(1047, 'Nasir', 'Usman', '08065842339', 'Nasir39', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 9, 18, 2, '2024-06-10 10:08:26'),
(1048, 'Abdul-fatah', 'Habibu', '08100862656', 'Abdul-fatah56', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 18, 11, 2, '2024-06-10 10:09:26'),
(1049, 'Sadik', 'Bukar', '08081522140', 'Sadik40', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 24, 7, 2, '2024-06-10 10:10:13'),
(1050, 'Hafiz', 'Isa  Bello', '09023608601', 'Hafiz01', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 28, 15, 2, '2024-06-10 10:11:11'),
(1051, 'Hassan', 'Adam Umar', '09061760712', 'Hassan12', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 23, 15, 2, '2024-06-10 10:12:02'),
(1052, 'Musa', 'Abubakar  Kabri', '08163526382', 'Musa82', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 29, 14, 2, '2024-06-10 10:12:46'),
(1053, 'Isa', 'Aliyu', '08066126748', 'Isa48', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 25, 20, 2, '2024-06-10 10:13:43'),
(1054, 'Hajara', 'Hussaini  Yusuf', '09138284668', 'Hajara68', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', 11, 5, 2, '2024-06-10 10:47:55'),
(1055, 'Abubakar', 'Abubakar Kabri', '07038341242', 'kabri08', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/66670250d027d.jpg', NULL, NULL, 1, '2024-06-10 13:41:06'),
(1056, 'Abubakar', 'Kabri', '08030631546', 'amka01', '17d6fd4cc26f3a47e491f6b3304bf802', 'uploads/default.png', NULL, NULL, 1, '2024-06-10 13:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `class_id` int(25) NOT NULL,
  `grand_total` int(255) NOT NULL,
  `average` decimal(10,2) NOT NULL,
  `position` int(50) NOT NULL,
  `subject_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nin_number` (`nin_number`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defaults`
--
ALTER TABLE `defaults`
  ADD PRIMARY KEY (`default_id`);

--
-- Indexes for table `graduation_year`
--
ALTER TABLE `graduation_year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `fk_result_1` (`student_id`),
  ADD KEY `fk_result_2` (`subject_id`),
  ADD KEY `fk_result_4` (`class_id`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_1` (`class_id`),
  ADD KEY `fk_student_2` (`section_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_teachers_1` (`subject_id`),
  ADD KEY `fk_teachers_2` (`class_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `fk_uploads_1` (`student_id`),
  ADD KEY `fk_uploads_2` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `defaults`
--
ALTER TABLE `defaults`
  MODIFY `default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `graduation_year`
--
ALTER TABLE `graduation_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_sessions`
--
ALTER TABLE `school_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1139;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_result_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_result_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_result_4` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teachers_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_uploads_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uploads_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
