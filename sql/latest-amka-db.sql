-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 08:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amkadami_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE `admin_notification` (
  `not_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `not_type` varchar(50) NOT NULL,
  `not_level` int(11) NOT NULL,
  `not_title` varchar(100) NOT NULL,
  `not_content` varchar(1000) NOT NULL,
  `not_icon` varchar(50) NOT NULL,
  `not_icon_color` varchar(50) NOT NULL,
  `not_bg_color` varchar(50) NOT NULL,
  `not_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admission_numbers`
--

CREATE TABLE `admission_numbers` (
  `admission_id` int(11) NOT NULL,
  `admission_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL DEFAULT 'UNKNOWN',
  `birth_date` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `lga` varchar(100) NOT NULL DEFAULT 'Jalingo',
  `index_no` varchar(10) NOT NULL DEFAULT 'NIA',
  `graduation_year` int(11) NOT NULL,
  `position_held` varchar(100) NOT NULL DEFAULT 'NIL',
  `photo` varchar(50) NOT NULL DEFAULT 'uploads/default.png',
  `nin_number` varchar(20) NOT NULL DEFAULT 'UNAVAILABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `first_name`, `second_name`, `last_name`, `phone_number`, `email`, `address`, `birth_date`, `gender`, `state`, `lga`, `index_no`, `graduation_year`, `position_held`, `photo`, `nin_number`) VALUES
(101, 'Hassan', 'Adam', 'Kabri', '07045324656', 'hazanmeenat@gmail.com', 'Sabon Gari, Jalingo', '2005-05-05', 'Male', 'Taraba', 'Jalingo', '4350785008', 2024, 'Laboratory', 'uploads/default.png', '29123216438'),
(102, 'Aseeya', 'Abdul-aziz', 'Faruq', '08125594744', 'aseeyaabdul-azizfaruq@gmail.com', 'Behind Gdss Sabon Gari , Jalingo', '2007-12-03', 'Female', 'Taraba', 'Jalingo', '4350785001', 2024, 'Library Prefect', 'uploads/default.png', '99993440202'),
(103, 'Amina', 'Abdullahi', 'Modibbo', '08101478667', 'aminaabdullahimodibbo@gmail.com', '107 Palace Way Jalingo', '2007-07-27', 'Female', 'Taraba', 'Jalingo', '4350785002', 2024, 'Vernacular Prefect', 'uploads/default.png', '55864734388'),
(104, 'Hadiyya', 'Abdullahi', 'Hassan', '09036682485', 'hadiyyaabdullahihassan@gmail.com', 'Saminaka Junction Dadin Kowa', '2006-09-25', 'Female', 'Taraba', 'Jalingo', '4350785003', 2024, 'Mosque Prefect', 'uploads/default.png', '82484307038'),
(105, 'Harun', 'Abubakar', 'Kabri', '07035414855', 'abubakarkabrih@gmail.com', 'Behind Abattoir Sabon Gari Road Jalingo', '2008-03-12', 'Male', 'Taraba', 'Jalingo', '4350785005', 2024, 'Utility Prefect', 'uploads/default.png', '95086843114'),
(106, 'Ibrahim', 'Abubakar', 'Kabri', '07080539273', 'iabubakarkabri@gmail.com', 'Behind Abbattoir, Jalingo', '2005-07-24', 'Male', 'Taraba', 'Jalingo', '4350785006', 2024, 'Vernacular Prefect', 'uploads/default.png', '17951938852'),
(107, 'Abdurrahim', 'Adam', 'Usman', '08124440769', 'abdurrahimadamusman7@gmail.com', 'Behind Mcan Mosque Jalingo', '2006-11-07', 'Male', 'Taraba', 'Jalingo', '4350785007', 2024, 'Mosque Prefect', 'uploads/default.png', '24627701587'),
(108, 'Khalid', 'Adam', 'Muhammad', '07033379481', 'khaleeda053@gmail.com', '', '2004-11-24', 'Male', 'Taraba', 'Jalingo', '4350785009', 2024, 'Mosque Prefect', 'uploads/default.png', '20344496297'),
(109, 'Muhammad', 'Adam', 'Ahmad', '09018460472', 'muhammadadamahmad@gmail.com', '', '2006-07-08', 'Male', 'Taraba', 'Sardauna', '4350785010', 2024, 'Mosque Prefect', 'uploads/default.png', '97169423869'),
(110, 'Rabi`atu', 'Adam', 'Dahiru', '09137211550', 'rabiatuadamdahir@gmail.com', '', '2005-08-22', 'Female', 'Taraba', 'Jalingo', '4350785011', 2024, 'Mosque Prefect', 'uploads/default.png', '86934598716'),
(111, 'Hamidu', 'Adamu', 'Gamu', '08136084763', 'hamiduadamu163@gmail.com', 'Behind Abbattoir, Jalingo', '1991-06-17', 'Male', 'Taraba', 'Jalingo', '4350785012', 2024, 'NIL', 'uploads/default.png', '77311079562'),
(112, 'Abubakar', 'Ahmad', 'Gamu', '09164121499', 'abubakarahmadgamu@gmail.comv', 'Behind Abbattoir, Jalingo', '2005-01-01', 'Male', 'Adamawa', 'Ganye', '4350785013', 2024, 'Vernacular Prefect', 'uploads/default.png', '80922742553'),
(113, 'Muhammad', 'Aliyu', 'Modibbo', '09121658975', 'muhammadaliyumodee884@gmail.com', 'Saminaka Junction Dadin Kowa', '2005-05-05', 'Male', 'Taraba', 'Jalingo', '4350785014', 2024, 'Head Boy', 'uploads/default.png', '31682676281'),
(114, 'Yasir', 'Aliyu', 'Modibbo', '08161587697', 'yasiraliyumodibbo619@gmail.com', 'Saminaka Junction Dadin Kowa', '2005-01-01', 'Male', 'Taraba', 'Sardauna', '4350785015', 2024, 'Uniform Prefect', 'uploads/default.png', '12247325659'),
(115, 'Abdussalam', 'Dahiru', 'Sadiq', '09039792762', 'abdussalamdahiru56@gmail.com', '', '2006-08-08', 'Male', 'Taraba', 'Jalingo', '4350785016', 2024, 'Mosque Prefect', 'uploads/default.png', '85963176019'),
(116, 'Abdullahi', 'Ibrahim', 'Banyang', '08132833852', 'ibrahimbanyangabdullahi@gmail.com', 'Behind Malam Sahabi Resident Jalingo', '1995-06-08', 'Male', 'Taraba', 'Jalingo', '4350785018', 2024, 'NIL', 'uploads/default.png', '24026684227'),
(117, 'Najashi', 'Ibrahim', 'Waziri', '09124085806', 'najashiibrahimwaziri@gmail.com', 'Behind Abbattoir, Jalingo Sabon Gari Road', '2007-05-09', 'Male', 'Taraba', 'Wukari', '4350785019', 2024, 'Mosque Prefect', 'uploads/default.png', '98972108212'),
(118, 'Abubakar', 'Muhammad', 'Abubakar', '09138619561', 'sadiqabubakarmuhammad@gmail.com', 'Behind Gdss Sabon Gari , Jalingo', '2007-11-07', 'Male', 'Gombe', 'Gombe', '4350785021', 2024, 'Time-keeper', 'uploads/default.png', '17605168892'),
(119, 'Abubakar', 'Muhammad', 'Yusuf', '07061073860', 'abubkarmuhammadyusuf677@gmail.com', 'Behind Takanaban Market Jalingo', '2007-07-22', 'Male', 'Taraba', 'Jalingo', '4350785022', 2024, 'Mosque Prefect', 'uploads/default.png', '49228811919'),
(120, 'Anisa', 'Muhammad', 'Hafiz', '07061293247', 'anisamuhammadhafiz@gmail.com', 'Saminaka Junction Opposite Amkadamiyya School Jali', '2007-08-01', 'Female', 'Taraba', 'Sardauna', '4350785025', 2024, 'Uniform Prefect', 'uploads/default.png', '13346330231'),
(121, 'Jamila', 'Muhammad', 'Dabo', '07041122521', 'Jamilamuhammaddabo@gmail.com', 'Saminaka Junction Behind Amkadamiyya School Jaling', '2008-01-01', 'Female', 'Taraba', 'Sardauna', '4350785026', 2024, 'NIL', 'uploads/default.png', '75249245120'),
(122, 'Nusaiba', 'Muhammad', 'Adam', '07049480629', 'nusaibamuhammadadam0@gmail.com', 'Behind Gdss Sabon Gari , Jalingo', '2006-07-08', 'Female', 'Taraba', 'Jalingo', '4350785027', 2024, 'Vernacular Prefect', 'uploads/default.png', '33312595144'),
(123, 'Salihu', 'Muhammad', 'Abubakar', '07065447675', 'abubkarsalihumuhammad2@gmail.com', 'Behind Abbattoir, Jalingo', '2005-12-27', 'Male', 'Taraba', 'Jalingo', '4350785028', 2024, 'Deputy Head Boy', 'uploads/default.png', '59982518714'),
(124, 'Zainab', 'Muhammad', 'Inuwa', '08142701695', 'zainabmuhammadinuwakarim@gmail.com', '', '2008-07-18', 'Female', 'Taraba', 'Jalingo', '4350785029', 2024, 'Lab Prefect', 'uploads/default.png', '46221763613'),
(125, 'Zakiya', 'Muhammad', 'Adam', '07044774609', 'zakiyamuhammadadam@gmail.com', 'Behind Gdss Sabon Gari , Jalingo', '2006-03-27', 'Female', 'Taraba', 'Jalingo', '4350785030', 2024, 'Vernacular Prefect', 'uploads/default.png', '83414808177'),
(126, 'Adam', 'Muhammad', 'Salihu', '', 'adamsalihumuhmmad@gmail.com', '', '2006-02-14', 'Male', 'Taraba', 'Ibi', '4350785023', 2024, 'NIL', 'uploads/default.png', 'nil'),
(131, 'Aisha', 'Abubakar', 'Muhammad', '09033347065', 'aishamuhammadabubakar@gmail.com', '', '2007-05-28', 'Female', 'Taraba', 'Jalingo', '4350785024', 2024, 'NIL', 'uploads/default.png', '1'),
(132, 'Aisha', 'Sanusi', 'Sulaiman', '08161515829', 'aishasanusisuleiman@gmail.com', '', '2008-01-02', 'Female', 'Taraba', 'Jalingo', '4350785031', 2024, 'Deputy Head Gril', 'uploads/default.png', '0'),
(136, 'Maryam', 'Ja`afar', 'Suleiman', '09065873962', 'maryamjaafarsuleiman@gmail.com', 'Behind Abbattoir, Jalingo', '2008-05-28', 'Female', 'Taraba', 'Jalingo', '4350785032', 2024, 'NIL', 'uploads/default.png', '4011844246'),
(137, 'Muhammad', 'Auwal', 'Umar', '', 'muhammadauwalumar@gmail.com', '', '2006-04-19', 'Male', 'Taraba', 'Jalingo', '4350785033', 2024, 'NIL', 'uploads/default.png', '6773479302'),
(138, 'Abubakar', 'Usman', 'Yawale', '09061155063', 'abubakarusman@gmail.com', 'Saminaka Junction Dadin Kowa', '2004-12-29', 'Male', 'Taraba', 'Jalingo', '4350785034', 2024, 'Labour Prefect', 'uploads/default.png', '265412437'),
(139, 'Bashir', 'Abubakar', 'Muhammad', '08137125252', 'bashirabubakarmuhammad@gmail.com', 'Behind Abbattoir, Jalingo', '2006-12-31', 'Male', 'Taraba', 'Jalingo', '4350785004', 2024, 'NIL', 'uploads/default.png', '5646587985'),
(140, 'Hassan', 'Muhammad', 'Iya', '09034853288', 'hassanmuhammadiya@gmail.com', 'Behind Abbattoir, Jalingo', '2005-01-25', 'Male', 'Taraba', 'Sardauna', '4350785017', 2024, 'NIL', 'uploads/default.png', '21708892934'),
(141, 'Usman', 'Lawan', 'Sani', '07012226121', 'usmanlawansani@gmail.com', 'Behind Abbattoir, Jalingo', '2007-08-31', 'Male', 'Taraba', 'Lau', '4350785020', 2024, 'NIL', 'uploads/default.png', '998765431');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `enrolling_class` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `parent_first_name` varchar(50) NOT NULL,
  `parent_last_name` varchar(50) NOT NULL,
  `parent_email` varchar(50) NOT NULL,
  `parent_address` varchar(50) NOT NULL,
  `parent_phone_number` varchar(50) NOT NULL,
  `admission_status` int(2) NOT NULL,
  `application_code` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `registration_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `enrolling_class`, `section_id`, `first_name`, `second_name`, `last_name`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`, `admission_status`, `application_code`, `timestamp`, `registration_id`) VALUES
(13, 6, 1, 'Allegra', 'Oconnor', 'Butler', '1983-08-17', 'Benue', 'Oju', 'Male', 'Jared', 'Raymond', 'zuwuqimi@gmail.com', '461 East Green First Road', '08029891242', 1, 'E9A4-84BA-C215', '2024-07-18 16:56:41', '6380b19b70e6bd11'),
(14, 19, 4, 'Isaiah', 'Montgomery', 'Mayo', '2003-06-20', 'Ekiti', 'Ijero', 'Male', 'Ava', 'Brennan', 'xoverop@gmail.com', '757 Oak Freeway', '08079423362', 1, '5999-5386-4D1B', '2024-07-18 16:55:47', '81f2d7311d937dae'),
(25, 13, 3, 'Hu', 'Donaldson', 'Woods', '1998-11-20', 'Ebonyi', 'Abakaliki', 'Female', 'Lester', 'Jacobson', 'sibebeca@gmail.com', '25 West Old Freeway', '08056196955', 1, '5BB0-0769-2E0C', '2024-07-18 14:00:06', '867b64b49da714e0bd74de955c7730e5'),
(30, 1, 1, 'Austin', 'Morin', 'Gallagher', '1977-05-25', 'Ogun', 'Ogun Waterside', 'Male', 'Darius', 'Walters', 'wyfalinina@gmail.com', '791 West Second Street', '08059857617', 1, '7C81-AA03-C6EF', '2024-07-18 13:52:03', '3198ce35b5553f7e947c9c6e5df2a539'),
(31, 4, 1, 'Leigh', 'Duncan', 'Grimes', '2021-01-25', 'Edo', 'Owan West', 'Male', 'Aphrodite', 'Brown', 'selodi@gmail.com', '821 Green Second Extension', '08037861390', 1, '6A29-6BF4-FD07', '2024-07-18 13:49:31', '3ab704519eb0c89bba9d9f846a7f2b00'),
(32, 11, 3, 'Madison', 'Cunningham', 'Bullock', '2002-06-10', 'Borno', 'Guzamala', 'Male', 'Lois', 'Mcmahon', 'zutoge@gmail.com', '865 West Cowley Court', '08014480383', 1, 'C64D-20A4-BDC9', '2024-07-18 13:50:48', '1302652a985902f8308f201156c43031'),
(33, 12, 3, 'Jasper', 'Eaton', 'Roy', '2021-11-10', 'Kebbi', 'Wasagu Danko', 'Male', 'Ocean', 'White', 'pasesajyb@gmail.com', '95 South Green Old Parkway', '08019889654', 0, 'AD7A-620A-7D68', '2024-07-18 16:57:34', '685b21481cc5fe4eaa657e8296837c59'),
(34, 20, 5, 'Hakeem', 'Luna', 'Curtis', '2013-03-16', 'Imo', 'Oru East', 'Female', 'Bradley', 'Wiggins', 'wofuc@gmail.com', '817 Oak Court', '08072442877', 1, 'C161-C474-A9DE', '2024-07-18 17:12:38', 'f488b222f148df829a44e932fe39e771'),
(35, 19, 4, 'Jesse', 'Solomon', 'Ramos', '1980-02-28', 'Imo', 'Oguta', 'Male', 'Zeus', 'Franks', 'menunebo@gmail.com', '448 Green Nobel Road', '08052913358', 1, '236A-C1F4-C321', '2024-07-18 17:11:44', '2a766f4855c0a695f8e31bde97e57985'),
(36, 10, 2, 'Musa', 'Shannon', 'Abdulkadir', '1987-06-03', 'Ekiti', 'Ekiti South-west', 'Male', 'Ignatius', 'Conner', 'zakoji@gmail.com', '15 West Nobel Boulevard', '08048240915', 1, '70F0-6CDE-6465', '2024-07-18 17:10:52', '6ba261e34b4a1d81ee04cf0a67be1fc6'),
(37, 6, 1, 'Adamu', 'Adamu', 'Lallami', '2011-10-22', 'Ekiti', 'Moba', 'Female', 'Eve', 'Lee', 'hyjine@gmail.com', '88 West Nobel Street', '08044127898', 1, 'D93F-A7FD-EDE9', '2024-07-18 16:59:32', 'cd2621f4a8b5923622c0485d821025a8');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `blog_title` varchar(50) NOT NULL,
  `blog_category` varchar(50) NOT NULL,
  `blog_thumbnail` varchar(255) NOT NULL,
  `blog_content` varchar(1000) NOT NULL,
  `blog_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(23, 'SSS3 Art', 6),
(24, 'SSS3 Science', 7),
(25, 'null', 8);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `first_name`, `last_name`, `email`, `phone_number`, `message`, `submission_date`) VALUES
(1, 'Abdullahi', 'Kabri', 'kabriacid01@gmail.com', '07037943396', 'eertyukltyedtr6dtuiojerxdgfvxjkgduyrsjrtsidkudghdghkxmdjfusiydtkjcjhfg', '2024-06-22 20:23:20'),
(2, 'Abdullahi', 'Kabri', 'kabriacid01@gmail.com', '07037943396', 'eertyukltyedtr6dtuiojerxdgfvxjkgduyrsjrtsidkudghdghkxmdjfusiydtkjcjhfg', '2024-06-22 20:25:02'),
(3, 'Abdullahi', 'Kabri', 'kabriacid01@gmail.com', '07037943396', 'eertyukltyedtr6dtuiojerxdgfvxjkgduyrsjrtsidkudghdghkxmdjfusiydtkjcjhfg', '2024-06-22 20:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `defaults`
--

CREATE TABLE `defaults` (
  `default_id` int(11) NOT NULL,
  `session_name` varchar(100) DEFAULT '2023/2024',
  `current_term` varchar(100) DEFAULT '3rd Term',
  `term_begins` varchar(100) DEFAULT '15-Aug-2024',
  `term_ending` varchar(100) DEFAULT '05-July-2024'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `defaults`
--

INSERT INTO `defaults` (`default_id`, `session_name`, `current_term`, `term_begins`, `term_ending`) VALUES
(1, '2023/2024', '3rd Term', '15-Aug-2024', '05-July-2024');

-- --------------------------------------------------------

--
-- Table structure for table `general_class`
--

CREATE TABLE `general_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_class`
--

INSERT INTO `general_class` (`class_id`, `class_name`) VALUES
(1, 'Pre-Nursery 1'),
(2, 'Nursery 1'),
(3, 'Nursery 2'),
(4, 'Nursery 3'),
(5, 'Primary 1'),
(6, 'Primary 2'),
(7, 'Primary 3'),
(8, 'Primary 4'),
(9, 'Primary 5'),
(10, 'JSS 1'),
(11, 'JSS 2'),
(12, 'JSS 3'),
(13, 'SSS 1'),
(14, 'SSS 2'),
(15, 'SSS 3');

-- --------------------------------------------------------

--
-- Table structure for table `general_section`
--

CREATE TABLE `general_section` (
  `section_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `serial_start` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_section`
--

INSERT INTO `general_section` (`section_id`, `name`, `prefix`, `serial_start`) VALUES
(1, 'Nursery Section', '1000', 1001),
(2, 'Primary Section', '2000', 2001),
(3, 'Junior Secondary Section', '3000', 3001),
(4, 'Senior Secondary Section', '4000', 4001),
(5, 'Null', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `government_levels`
--

CREATE TABLE `government_levels` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `government_levels`
--

INSERT INTO `government_levels` (`level_id`, `level_name`) VALUES
(1, 'Level 1'),
(2, 'Level 2'),
(3, 'Level 3'),
(4, 'Level 4'),
(5, 'Level 5'),
(6, 'Level 6'),
(7, 'Level 7'),
(8, 'Level 8'),
(9, 'Level 9'),
(10, 'Level 10'),
(11, 'Level 11'),
(12, 'Level 12'),
(13, 'Level 13'),
(14, 'Level 14'),
(15, 'Level 15'),
(16, 'Level 16'),
(17, 'Level 17');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `invoice_amount` int(255) NOT NULL,
  `payment_session` varchar(20) NOT NULL,
  `payment_term` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `invoice_timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nigerian_banks`
--

CREATE TABLE `nigerian_banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nigerian_banks`
--

INSERT INTO `nigerian_banks` (`bank_id`, `bank_name`) VALUES
(1, 'Access Bank'),
(2, 'Citibank'),
(3, 'Ecobank'),
(4, 'Fidelity Bank'),
(5, 'First Bank of Nigeria'),
(6, 'First City Monument Bank (FCMB)'),
(7, 'Globus Bank'),
(8, 'Guaranty Trust Bank (GTBank)'),
(9, 'Heritage Bank'),
(10, 'Keystone Bank'),
(11, 'Polaris Bank'),
(12, 'Providus Bank'),
(13, 'Stanbic IBTC Bank'),
(14, 'Standard Chartered Bank'),
(15, 'Sterling Bank'),
(16, 'SunTrust Bank'),
(17, 'Union Bank'),
(18, 'United Bank for Africa (UBA)'),
(19, 'Unity Bank'),
(20, 'Wema Bank'),
(21, 'Zenith Bank'),
(22, 'Kuda Microfinance Bank'),
(23, 'Moniepoint Microfinance Bank'),
(24, 'Opay'),
(25, 'Others'),
(26, 'Access Bank'),
(27, 'Citibank'),
(28, 'Ecobank'),
(29, 'Fidelity Bank'),
(30, 'First Bank of Nigeria'),
(31, 'First City Monument Bank (FCMB)'),
(32, 'Globus Bank'),
(33, 'Guaranty Trust Bank (GTBank)'),
(34, 'Heritage Bank'),
(35, 'Keystone Bank'),
(36, 'Polaris Bank'),
(37, 'Providus Bank'),
(38, 'Stanbic IBTC Bank'),
(39, 'Standard Chartered Bank'),
(40, 'Sterling Bank'),
(41, 'SunTrust Bank'),
(42, 'Union Bank'),
(43, 'United Bank for Africa (UBA)'),
(44, 'Unity Bank'),
(45, 'Wema Bank'),
(46, 'Zenith Bank'),
(47, 'Kuda Microfinance Bank'),
(48, 'Moniepoint Microfinance Bank'),
(49, 'Opay'),
(50, 'Others'),
(51, 'VFD Microfinance Bank'),
(52, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `nigerian_states`
--

CREATE TABLE `nigerian_states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `q_id` int(11) NOT NULL,
  `qualification_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`q_id`, `qualification_name`) VALUES
(1, 'BSc'),
(2, 'MSc'),
(3, 'PhD'),
(4, 'PGD'),
(5, 'OND'),
(6, 'HND'),
(7, 'NCE'),
(8, 'SSCE'),
(9, 'Diploma'),
(10, 'Certificate'),
(11, 'Professional Certification'),
(12, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `registration_number`
--

CREATE TABLE `registration_number` (
  `admission_id` int(11) NOT NULL,
  `admission_number` int(50) NOT NULL,
  `student_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_number`
--

INSERT INTO `registration_number` (`admission_id`, `admission_number`, `student_name`) VALUES
(1001, 1001, 'Yusuf Abdulkadir');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `first_test` int(11) DEFAULT NULL,
  `second_test` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `grade` varchar(2) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `class_id`, `subject_id`, `first_test`, `second_test`, `exam`, `total`, `grade`, `remark`, `status`) VALUES
(113, 1003, 7, 18, 13, 0, 20, 33, 'F', 'Fail', 1),
(114, 1002, 7, 18, 7, 2, 0, 9, 'F', 'Fail', 1),
(115, 1004, 7, 18, 19, 14, 3, 36, 'F', 'Fail', 1),
(116, 1005, 7, 18, 6, 1, 17, 24, 'F', 'Fail', 1),
(117, 1009, 7, 18, 12, 18, 14, 44, 'D', 'Pass', 1),
(118, 1007, 7, 18, 20, 7, 12, 39, 'F', 'Fail', 1),
(119, 1006, 7, 18, 17, 8, 9, 34, 'F', 'Fail', 1),
(120, 1008, 7, 18, 11, 8, 1, 20, 'F', 'Fail', 1),
(121, 1003, 7, 2, 5, 6, 10, 21, 'F', 'Fail', 1),
(122, 1002, 7, 2, 0, 16, 12, 28, 'F', 'Fail', 1),
(123, 1004, 7, 2, 0, 10, 11, 21, 'F', 'Fail', 1),
(124, 1005, 7, 2, 2, 0, 1, 3, 'F', 'Fail', 1),
(125, 1009, 7, 2, 11, 15, 13, 39, 'F', 'Fail', 1),
(126, 1007, 7, 2, 5, 19, 11, 35, 'F', 'Fail', 1),
(127, 1006, 7, 2, 6, 19, 15, 40, 'D', 'Pass', 1),
(128, 1008, 7, 2, 2, 20, 11, 33, 'F', 'Fail', 1),
(129, 1003, 7, 20, 14, 8, 9, 31, 'F', 'Fail', 1),
(130, 1002, 7, 20, 19, 2, 13, 34, 'F', 'Fail', 1),
(131, 1004, 7, 20, 5, 1, 2, 8, 'F', 'Fail', 1),
(132, 1005, 7, 20, 1, 8, 7, 16, 'F', 'Fail', 1),
(133, 1009, 7, 20, 5, 3, 15, 23, 'F', 'Fail', 1),
(134, 1007, 7, 20, 2, 1, 7, 10, 'F', 'Fail', 1),
(135, 1006, 7, 20, 12, 20, 4, 36, 'F', 'Fail', 1),
(136, 1008, 7, 20, 1, 9, 13, 23, 'F', 'Fail', 1),
(137, 1003, 7, 3, 12, 9, 14, 35, 'F', 'Fail', 1),
(138, 1002, 7, 3, 18, 4, 9, 31, 'F', 'Fail', 1),
(139, 1004, 7, 3, 1, 10, 14, 25, 'F', 'Fail', 1),
(140, 1005, 7, 3, 0, 19, 7, 26, 'F', 'Fail', 1),
(141, 1009, 7, 3, 10, 1, 17, 28, 'F', 'Fail', 1),
(142, 1007, 7, 3, 2, 20, 1, 23, 'F', 'Fail', 1),
(143, 1006, 7, 3, 1, 17, 3, 21, 'F', 'Fail', 1),
(144, 1008, 7, 3, 12, 11, 18, 41, 'D', 'Pass', 1),
(145, 1003, 7, 16, 20, 4, 14, 38, 'F', 'Fail', 1),
(146, 1002, 7, 16, 9, 13, 6, 28, 'F', 'Fail', 1),
(147, 1004, 7, 16, 2, 14, 13, 29, 'F', 'Fail', 1),
(148, 1005, 7, 16, 20, 1, 17, 38, 'F', 'Fail', 1),
(149, 1009, 7, 16, 15, 18, 7, 40, 'D', 'Pass', 1),
(150, 1007, 7, 16, 19, 15, 20, 54, 'C', 'Good', 1),
(151, 1006, 7, 16, 2, 6, 10, 18, 'F', 'Fail', 1),
(152, 1008, 7, 16, 16, 6, 11, 33, 'F', 'Fail', 1),
(153, 1003, 7, 33, 10, 2, 18, 30, 'F', 'Fail', 1),
(154, 1002, 7, 33, 12, 1, 14, 27, 'F', 'Fail', 1),
(155, 1004, 7, 33, 20, 11, 9, 40, 'D', 'Pass', 1),
(156, 1005, 7, 33, 15, 15, 10, 40, 'D', 'Pass', 1),
(157, 1009, 7, 33, 20, 2, 10, 32, 'F', 'Fail', 1),
(158, 1007, 7, 33, 9, 2, 0, 11, 'F', 'Fail', 1),
(159, 1006, 7, 33, 0, 16, 14, 30, 'F', 'Fail', 1),
(160, 1008, 7, 33, 6, 3, 18, 27, 'F', 'Fail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_levy`
--

CREATE TABLE `school_levy` (
  `levy_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `item_amount` decimal(10,2) NOT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_levy`
--

INSERT INTO `school_levy` (`levy_id`, `item`, `item_amount`, `class_id`) VALUES
(1, 'Library Levy', '2000.00', 1),
(2, 'Sports Levy', '1500.00', 2),
(3, 'Laboratory Levy', '3000.00', 3),
(4, 'Examination Levy', '2500.00', 4),
(5, 'Building Maintenance Levy', '1000.00', 5),
(6, 'PTA Levy', '800.00', 6),
(7, 'Health Levy', '500.00', 7),
(8, 'ICT Levy', '1800.00', 8),
(9, 'Transportation Levy', '2500.00', 9),
(10, 'Cultural Day Levy', '1200.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `school_post`
--

CREATE TABLE `school_post` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_post`
--

INSERT INTO `school_post` (`position_id`, `position_name`, `position_number`) VALUES
(1, 'Digital Manager', 1),
(2, 'Director', 2),
(3, 'Accountant', 2),
(4, 'Exam Officer', 3),
(5, 'Admission Officer', 4),
(6, 'General Secretary', 5),
(7, 'Co-ordinator', 6),
(8, 'Principal', 5),
(9, 'Vice Principal', 5),
(10, 'Headmaster', 6),
(11, 'Senior Master', 6),
(12, 'Staff', 7),
(14, 'Non-Staff', 8);

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `session_id` int(11) NOT NULL,
  `session_year` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`session_id`, `session_year`) VALUES
(8, '2018/2019'),
(9, '2019/2020'),
(10, '2020/2021'),
(11, '2021/2022'),
(12, '2022/2023'),
(13, '2023/2024'),
(14, '2024/2025');

-- --------------------------------------------------------

--
-- Table structure for table `school_terms`
--

CREATE TABLE `school_terms` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_terms`
--

INSERT INTO `school_terms` (`term_id`, `term_name`) VALUES
(1, '1st Term'),
(2, '2nd Term'),
(3, '3rd Term');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `serial_start` int(11) NOT NULL,
  `general_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `serial_start`, `general_section`) VALUES
(1, 'Nursery Section', 1001, 1),
(2, 'Lower Primary', 2001, 2),
(3, 'Upper Primary', 2001, 2),
(4, 'Junior Secondary', 3001, 3),
(5, 'SSS1', 4001, 4),
(6, 'SSS Art', 4001, 4),
(7, 'SSS Science', 4001, 4),
(8, 'Null', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `section_subjects`
--

CREATE TABLE `section_subjects` (
  `sec_sub_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_subjects`
--

INSERT INTO `section_subjects` (`sec_sub_id`, `section_id`, `subject_id`) VALUES
(1, 1, 29),
(2, 1, 2),
(3, 1, 20),
(4, 1, 11),
(5, 1, 23),
(6, 1, 32),
(7, 1, 16),
(8, 2, 18),
(9, 2, 2),
(10, 2, 20),
(11, 2, 11),
(12, 2, 23),
(13, 2, 3),
(14, 2, 16),
(15, 2, 33),
(16, 2, 24),
(17, 3, 18),
(18, 3, 2),
(19, 3, 20),
(20, 3, 11),
(21, 3, 23),
(22, 3, 3),
(23, 3, 16),
(24, 3, 33),
(25, 3, 24),
(26, 3, 8),
(27, 3, 9),
(28, 3, 27),
(29, 3, 28),
(30, 4, 29),
(31, 4, 2),
(32, 4, 20),
(33, 4, 11),
(34, 4, 23),
(35, 4, 3),
(36, 4, 4),
(37, 4, 6),
(38, 4, 26),
(39, 4, 8),
(40, 4, 9),
(41, 4, 30),
(42, 4, 31),
(43, 4, 17),
(44, 5, 2),
(45, 5, 20),
(46, 5, 11),
(47, 5, 5),
(48, 5, 23),
(49, 5, 7),
(50, 5, 25),
(51, 5, 1),
(52, 5, 9),
(53, 5, 8),
(54, 5, 19),
(55, 5, 14),
(56, 5, 10),
(57, 5, 12),
(58, 5, 17),
(59, 5, 15),
(60, 5, 13),
(61, 5, 21),
(62, 5, 22),
(63, 5, 29),
(64, 6, 2),
(65, 6, 20),
(66, 6, 11),
(67, 6, 23),
(68, 6, 9),
(69, 6, 8),
(70, 6, 21),
(71, 6, 12),
(72, 6, 17),
(73, 6, 15),
(74, 6, 10),
(75, 6, 19),
(76, 6, 22),
(77, 6, 14),
(78, 6, 29),
(79, 7, 2),
(80, 7, 20),
(81, 7, 11),
(82, 7, 5),
(83, 7, 23),
(84, 7, 7),
(85, 7, 25),
(86, 7, 1),
(87, 7, 9),
(88, 7, 8),
(89, 7, 19),
(90, 7, 13),
(91, 7, 22),
(92, 7, 29);

-- --------------------------------------------------------

--
-- Table structure for table `serial_numbers`
--

CREATE TABLE `serial_numbers` (
  `section_id` int(11) NOT NULL,
  `entry_year` int(11) NOT NULL,
  `current_serial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serial_numbers`
--

INSERT INTO `serial_numbers` (`section_id`, `entry_year`, `current_serial`) VALUES
(1, 24, 1022),
(2, 24, 2020),
(3, 24, 3035),
(4, 24, 4010),
(5, 24, 4),
(6, 24, 1),
(7, 24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `session_term`
--

CREATE TABLE `session_term` (
  `st_id` int(11) NOT NULL,
  `active_session` int(10) NOT NULL,
  `active_term` int(10) NOT NULL,
  `active_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `qualification` varchar(11) NOT NULL,
  `discipline` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'uploads/default.png',
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` int(50) NOT NULL,
  `account_number` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `first_name`, `last_name`, `class_id`, `section_id`, `subject_id`, `position_id`, `qualification`, `discipline`, `bank_name`, `birth_date`, `state`, `lga`, `gender`, `photo`, `email`, `password`, `phone_number`, `status`, `address`, `salary`, `account_number`, `timestamp`) VALUES
(3001, 'kabriacid', 'Abdullahi', 'Kabri', 15, 3, 11, 1, 'BSc', 'Accounting', 'Access Bank', '1985-07-25', 'Taraba', 'Jalingo', 'Male', 'uploads/ullahi-kabri66928d234c7ff_icon.heic', 'kabriacid01@gmail.com', '$2y$10$Z0ZeQ0vXT9yaBmzexCJ1teiQSPXuognqmTJwpo6pjjWZl2UyUGMDW', '07037943396', '1', 'Inec Office, Sabon Gari Jalingo,', 80000, 472452423, '2024-07-16 17:08:28'),
(3031, 'Yagana42', 'Yagana', 'Hassan', 3, 3, 20, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/ana-hassan66944dccb745a_yagana.jpg', '', '$2y$10$pWzhT9ArPV5CvkwxsvPmKeSHlQ6LASI3CirEARXO/6bBjzV9zjV4C', '07068592642', '1', '', 0, 0, '2024-07-16 18:04:44'),
(3032, 'Hafsat01', 'Hafsat', 'Ishaq Aliyu', 1, 3, 11, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09030709101', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3033, 'Sadika26', 'Sadika', 'Dauda', 4, 3, 23, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08138323326', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3034, 'Mansur05', 'Mansur', 'Muhammed Boyi', 9, 3, 16, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '07049281305', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3035, 'Abbas73', 'Abbas', 'Abdul-rasheed Maikarfi', 17, 3, 8, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08061209973', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3036, 'Maryam26', 'Maryam', 'Bello', 8, 3, 3, 12, '', '', '', '0000-00-00', 'Taraba', 'Jalingo', 'Female', 'uploads/yam-bello669439a186b7f_anty.jpg', '', '$2y$10$zJ4MD8bvsDIuq4N0/OwbpeyU6ya3xPtanjP9XVhQ8a4Vx50mHMUxG', '08136414626', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3037, 'Zainab22', 'Zainab', 'Hamman-adam', 6, 3, 2, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/nab-hamman-adam66944dd91ce61_asmau.jpg', '', '', '08061602122', '1', '', 0, 0, '2024-07-14 22:14:49'),
(3038, 'Khadija49', 'Khadija', 'Yusuf', 10, 3, 33, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/KHADIJA-YUSUF6694585C882C3.jpg', '', '', '08062524049', '1', '', 0, 0, '2024-07-14 22:59:40'),
(3039, 'Adam78', 'Adam', 'Mahmud', 20, 3, 3, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/m-mahmud66944d89ad1ec_zayyad.jpg', '', '$2y$10$ywlCqPNjKBbd9rJMBb1uaucRsh8SIJSx64eWYitePWmG2oZI.OEiO', '07060753078', '1', '', 0, 0, '2024-07-16 17:43:26'),
(3040, 'Abubakar35', 'Abubakar', 'Sadiq Abubakar', 22, 3, 17, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08134816835', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3041, 'Abubakar30', 'Abubakar', 'Sadiq Abubakar', 21, 3, 9, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08134816835', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3042, 'Zulaihatu11', 'Zulaihatu', 'Yahya', 12, 3, 11, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/aihatu-yahya66944d276e61f_zulai.jpg', '', '$2y$10$faRy2/Cto8C/XF2TebwmXONVHsuDi9PDR98In.QtdD7ARlJEFqe42', '07037600511', '1', '', 0, 0, '2024-07-16 16:33:39'),
(3043, 'Muhammad15', 'Muhammad', 'Fatihu Mahmud', 13, 3, 8, 5, 'BSc', 'Accounting', 'Access Bank', '0000-00-00', '', '', 'Male', 'uploads/ammad-fatihu mahmud66944d3a17446_fatihu.jpg', '', '$2y$10$fFKhAFyDB85cQELZPS7t9.Jw.4C7tOR6UNazvhp8cAMT52uNQ9ODG', '08100098915', '1', '', 0, 0, '2024-07-16 18:00:38'),
(3044, 'Nasir39', 'Nasir', 'Usman', 18, 3, 9, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08065842339', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3045, 'Abdul-fatah56', 'Abdul-fatah', 'Habibu', 11, 3, 18, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08100862656', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3046, 'Sadik40', 'Sadik', 'Bukar', 7, 3, 24, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08081522140', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3047, 'Hafiz01', 'Hafiz', 'Isa Bello', 15, 3, 28, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09023608601', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3048, 'Hassan12', 'Hassan', 'Adam Umar', 15, 3, 23, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09061760712', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3049, 'Musa82', 'Musa', 'Abubakar Kabri', 14, 3, 29, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08163526382', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3050, 'Isa48', 'Isa', 'Aliyu', 20, 3, 25, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08066126748', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3051, 'Hajara68', 'Hajara', 'Hussaini Yusuf', 5, 3, 11, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09138284668', '1', '', 0, 0, '2024-07-14 20:57:01'),
(3052, 'kabri08', 'Abubakar', 'Abubakar Kabri', 7, 2, 3, 4, 'BSc', 'Accounting', 'Guaranty Trust Bank (GTBank)', '0000-00-00', '', '', 'Male', 'uploads/bakar-abubakar kabri66943a1989bf4_6648a10629074.jpg', '', '$2y$10$ZZm9NWnOtDaSA/hWCt3M5eJWHOM3RhlrgtoPKHHrgKkvDLz1kB1nm', '07038341242', '1', '', 60000, 472452423, '2024-07-16 17:46:43'),
(3053, 'amka01', 'Abubakar', 'Kabri', 25, 8, 34, 2, 'BSc', 'Accounting', 'Access Bank', '1959-07-14', 'Taraba', 'Jalingo', 'Male', 'uploads/bakar-kabri66943aa388a8e_director.jpg', 'abubakarkabri@gmail.com', '$2y$10$sH4UdS6N3sQYYze0DYkIwObqYmviDe7qljTvygQg5PFHhCNt6f7kK', '08030631546', '1', 'Behind Jalingo Main Abbatoir', 300000, 1000345456, '2024-07-16 17:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `admission_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `parent_first_name` varchar(50) NOT NULL,
  `parent_last_name` varchar(50) NOT NULL,
  `parent_email` varchar(50) NOT NULL,
  `parent_address` varchar(50) NOT NULL,
  `parent_phone_number` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `class_id`, `section_id`, `admission_id`, `first_name`, `second_name`, `last_name`, `status`, `password`, `birth_date`, `state`, `lga`, `gender`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_address`, `parent_phone_number`, `timestamp`) VALUES
(1002, 7, 2, 'AMK/24/2011', 'Carla', 'Caldwell', 'Drake', '1', '$2y$10$KgNINEo/zp4Y/tc6cVY7SuNofSTea29aWChLa4AjBSIWljXzIktsa', '1982-07-08', 'Borno', 'Gwoza', 'Female', 'Wang', 'Vinson', 'xoliguj@gmail.com', '83 Oak Drive', '08074594497', '2024-07-14 21:59:12'),
(1003, 7, 2, 'AMK/24/2012', 'Brynne', 'England', 'West', '1', '$2y$10$8gnQF9SSWrTYcFLMwWuNwed4StC9DWxIptxz9YzopsTDVaRcc/lCe', '1984-10-10', 'Niger', 'Kontagora', 'Male', 'Karleigh', 'Bruce', 'qoqupawara@gmail.com', '125 Nobel Boulevard', '08090473921', '2024-07-14 21:59:19'),
(1004, 7, 2, 'AMK/24/2013', 'Chava', 'Avery', 'Russell', '1', '$2y$10$V6KhOwslwDIAG/rXoo5/OuXY.0gamnLyHtZIqPukSViwYonqnJqFC', '2012-04-25', 'Plateau', 'Qua an Pan', 'Male', 'Nehru', 'Norton', 'hezifisi@gmail.com', '196 East Old Boulevard', '08088818552', '2024-07-14 21:59:28'),
(1005, 7, 2, 'AMK/24/2014', 'Galvin', 'Kirk', 'Norris', '1', '$2y$10$PsnfQvSl5KNe9HVlLAsEu.UpO0cWIA0XdExNlQtYZoa9x6XgYb3py', '2019-12-25', 'Cross River', 'Yakuur', 'Male', 'Allistair', 'Townsend', 'kogytatig@gmail.com', '20 Old Road', '08064797376', '2024-07-14 22:00:35'),
(1006, 7, 2, 'AMK/24/2015', 'Randall', 'Dejesus', 'Foster', '1', '$2y$10$189SYu893/T2Piu..Xb5uOqUdAYhEqygz7.vRyFTurUzH/mDb6tSG', '2022-10-07', 'Kebbi', 'Augie', 'Female', 'Laurel', 'Galloway', 'cededuh@gmail.com', '75 South Clarendon Extension', '08071276846', '2024-07-14 22:00:42'),
(1007, 7, 2, 'AMK/24/2016', 'Pearl', 'Diaz', 'Gallagher', '1', '$2y$10$DhD6j7wvqOlNVTvkA/6Ol.QQksJXl0mYR59TGkBqbGSrN18tMmFQ2', '2022-06-20', 'Ondo', 'Akoko South-East', 'Male', 'Keaton', 'Duran', 'rovajos@gmail.com', '575 Oak Freeway', '08059519790', '2024-07-14 22:00:49'),
(1008, 7, 2, 'AMK/24/2017', 'Teegan', 'Hodge', 'Conner', '1', '$2y$10$vjKJ2Zeuz1TAiiNWrFYzaODVFJOtRE4A9N5z5EySvGQUTpC84qK0.', '1989-12-09', 'Abia', 'Isuikwuato', 'Female', 'Brittany', 'Sharp', 'vocoduq@gmail.com', '19 West Second Lane', '08033743887', '2024-07-14 22:00:56'),
(1009, 7, 2, 'AMK/24/2018', 'Jemima', 'Bryant', 'Diaz', '1', '$2y$10$5dfIozOeeiU5Ce66WJPgC.LPt9GFF61skUSqtz956hsXQbhjxqGVq', '2023-06-11', 'Sokoto', 'Sabon Birni', 'Male', 'Leo', 'Blevins', 'cabibiqowa@gmail.com', '218 Nobel Extension', '08054279784', '2024-07-14 22:01:02'),
(1010, 5, 1, 'AMK/24/1018', 'Ainsley', 'Snider', 'Barker', '1', '$2y$10$jjnE.Pp8PzT/joP5eXQw0.Hk8nl8VWWmJsAChmtiaFGMNnOmBMyLS', '1980-11-26', 'Kogi', 'Lokoja', 'Female', 'Blake', 'Vance', 'jefusewox@gmail.com', '77 First Extension', '08059239795', '2024-07-14 22:01:08'),
(1011, 7, 2, 'AMK/24/2019', 'Dakota', '', 'Bailey', '1', '$2y$10$y0jtHyf09X1kikaz5RKMR.N7e0UNOfDaj33zFPinOK8NSP/WfRo4C', '1995-09-24', 'Niger', 'Agaie', 'Male', 'Maggy', 'Sandoval', 'cusyp@mailinator.com', 'Quas Sequi Quis Esse', '09023456786', '2024-07-18 12:34:23'),
(1012, 4, 1, 'AMK/24/1019', 'Leigh', '', 'Grimes', '1', '$2y$10$e6OC98few9oefoxl3sECW.PI03.g7.ZKTLbQMSNwJ38xaLUM.RyZy', '2021-01-25', 'Edo', 'Owan West', 'Male', 'Aphrodite', 'Brown', 'selodi@gmail.com', '821 Green Second Extension', '08037861390', '2024-07-18 13:49:31'),
(1013, 11, 3, 'AMK/24/3034', 'Madison', '', 'Bullock', '1', '$2y$10$MdxNjQua3fRGpD5dSEHuwuoQo8cKJ2QgR3sllWOXPAbuUmQvQ8VWC', '2002-06-10', 'Borno', 'Guzamala', 'Male', 'Lois', 'Mcmahon', 'zutoge@gmail.com', '865 West Cowley Court', '08014480383', '2024-07-18 13:50:48'),
(1014, 1, 1, 'AMK/24/1020', 'Austin', '', 'Gallagher', '1', '$2y$10$F4qtrMI.B3P9.5Uk3ApZ2OVRI60YLHm6Bs7OY6TWsvsBLI6ukS6Di', '1977-05-25', 'Ogun', 'Ogun Waterside', 'Male', 'Darius', 'Walters', 'wyfalinina@gmail.com', '791 West Second Street', '08059857617', '2024-07-18 13:52:03'),
(1015, 13, 3, 'AMK/24/3035', 'Hu', '', 'Woods', '1', '$2y$10$Y8OhFT9nZxO1uN4Jki20EeRiUgo3VRcNLb386vgxqFNJUrRSNM9gC', '1998-11-20', 'Ebonyi', 'Abakaliki', 'Female', 'Lester', 'Jacobson', 'sibebeca@gmail.com', '25 West Old Freeway', '08056196955', '2024-07-18 14:00:06'),
(1016, 19, 4, 'AMK/24/4008', 'Isaiah', '', 'Mayo', '1', '$2y$10$q6G2cArLXt0JCkcx9/kCi.AN/u/OfLFz4u4hbYyywfMeSq09YEYFi', '2003-06-20', 'Ekiti', 'Ijero', 'Male', 'Ava', 'Brennan', 'xoverop@gmail.com', '757 Oak Freeway', '08079423362', '2024-07-18 16:55:47'),
(1017, 12, 3, 'AMK/24/1021', 'Musa', 'Abdulkadir', 'Abukur', '1', '$2y$10$N63huw93btVWppGUHnG7ju8yx6CZFb/FTgvCUXrbIXHvQhvH5CRjO', '1983-08-17', 'Benue', 'Oju', 'Male', 'Jared', 'Raymond', 'zuwuqimi@gmail.com', '461 East Green First Road', '08029891242', '2024-07-18 17:08:30'),
(1019, 10, 2, 'AMK/24/2020', 'Musa', '', 'Abdulkadir', '1', '$2y$10$mrXQOT31wRiZL2m4Xt7EjeJ3Crp4nctruuQv93Z0HQggYfJmZeV/.', '1987-06-03', 'Ekiti', 'Ekiti South-west', 'Male', 'Ignatius', 'Conner', 'zakoji@gmail.com', '15 West Nobel Boulevard', '08048240915', '2024-07-18 17:10:52'),
(1020, 19, 4, 'AMK/24/4009', 'Jesse', '', 'Ramos', '1', '$2y$10$9d.9fB1rMrhdWJB.a451ZOoMce/XRSlAZvKoge0E5ghyOH3dni.CS', '1980-02-28', 'Imo', 'Oguta', 'Male', 'Zeus', 'Franks', 'menunebo@gmail.com', '448 Green Nobel Road', '08052913358', '2024-07-18 17:11:44'),
(1022, 18, 4, 'AMK/24/4010', 'Shelby', 'Mosley', 'Workman', '1', '$2y$10$xaP9MenHcrD61O4FJnkBSOZAoPMldO47mQAPnk74B6TIBr9Cr4Xhq', '2019-09-10', 'Ekiti', 'Moba', 'Female', 'Kim', 'Berg', 'qekov@gmail.com', '47 Clarendon Freeway', '08057918133', '2024-07-18 17:14:33'),
(1023, 22, 7, 'AMK/24/6', 'Wang', 'Espinoza', 'Moss', '1', '$2y$10$QOavW.LzSJ0ZxRemuxsYI.KOE/y/5a0rhgd1BE7.6Y.KDl/o/Tb8a', '1987-07-18', 'Jigawa', 'Miga', 'Female', 'Ori', 'Moses', 'togu@gmail.com', '34 West Hague Parkway', '08089563938', '2024-07-18 17:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_notification`
--

CREATE TABLE `student_notification` (
  `not_id` int(11) NOT NULL DEFAULT 0,
  `staff_id` int(11) NOT NULL,
  `not_type` varchar(50) NOT NULL,
  `not_level` int(11) NOT NULL,
  `not_title` varchar(100) NOT NULL,
  `not_content` varchar(1000) NOT NULL,
  `not_icon` varchar(50) NOT NULL,
  `not_icon_color` varchar(50) NOT NULL,
  `not_bg_color` varchar(50) NOT NULL,
  `not_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Agricultural Science'),
(2, 'Arabic'),
(3, 'Basic Science'),
(4, 'Basic Technology'),
(5, 'Biology'),
(6, 'Business Studies'),
(7, 'Chemistry'),
(8, 'Civic Education'),
(9, 'Computer Studies'),
(10, 'Economics'),
(11, 'English Language'),
(12, 'Financial Accounting'),
(13, 'Further Mathematics'),
(14, 'Geography'),
(15, 'Government'),
(16, 'Handwriting'),
(17, 'History'),
(18, 'Huruf'),
(19, 'Islamic Studies'),
(20, 'Islamiyyat'),
(21, 'Literature'),
(22, 'Marketing'),
(23, 'Mathematics'),
(24, 'Phonics'),
(25, 'Physics'),
(26, 'Pre-Vocational Studies'),
(27, 'Pre-Vocational Studies I'),
(28, 'Pre-Vocational Studies II'),
(29, 'Quran'),
(30, 'RNV I'),
(31, 'RNV II'),
(32, 'Science Habits'),
(33, 'Verbal Reasoning'),
(34, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `university_disciplines`
--

CREATE TABLE `university_disciplines` (
  `discipline_id` int(11) NOT NULL,
  `discipline_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university_disciplines`
--

INSERT INTO `university_disciplines` (`discipline_id`, `discipline_name`) VALUES
(1, 'Accounting'),
(2, 'Architecture'),
(3, 'Biochemistry'),
(4, 'Business Administration'),
(5, 'Chemical Engineering'),
(6, 'Civil Engineering'),
(7, 'Computer Science'),
(8, 'Economics'),
(9, 'Education'),
(10, 'Electrical Engineering'),
(11, 'English Language'),
(12, 'Geology'),
(13, 'History'),
(14, 'Law'),
(15, 'Marketing'),
(16, 'Mass Communication'),
(17, 'Mechanical Engineering'),
(18, 'Medicine'),
(19, 'Nursing'),
(20, 'Pharmacy'),
(21, 'Physics'),
(22, 'Political Science'),
(23, 'Psychology'),
(24, 'Sociology'),
(25, 'Software Engineering'),
(26, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `class_id` int(25) NOT NULL,
  `grand_total` int(255) NOT NULL,
  `average` decimal(10,2) NOT NULL,
  `position` int(50) NOT NULL,
  `subject_count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `student_id`, `class_id`, `grand_total`, `average`, `position`, `subject_count`) VALUES
(15, 1002, 7, 157, '26.17', 7, 6),
(16, 1003, 7, 188, '31.33', 2, 6),
(17, 1004, 7, 159, '26.50', 6, 6),
(18, 1005, 7, 147, '24.50', 8, 6),
(19, 1006, 7, 179, '29.83', 3, 6),
(20, 1007, 7, 172, '28.67', 5, 6),
(21, 1008, 7, 177, '29.50', 4, 6),
(22, 1009, 7, 206, '34.33', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `ad_not_ibfk_1` (`staff_id`);

--
-- Indexes for table `admission_numbers`
--
ALTER TABLE `admission_numbers`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `applicants_fk_1` (`enrolling_class`),
  ADD KEY `applicants_fk_2` (`section_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `staff_ibfk_1` (`staff_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `defaults`
--
ALTER TABLE `defaults`
  ADD PRIMARY KEY (`default_id`);

--
-- Indexes for table `general_class`
--
ALTER TABLE `general_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `general_section`
--
ALTER TABLE `general_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `government_levels`
--
ALTER TABLE `government_levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `nigerian_banks`
--
ALTER TABLE `nigerian_banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `registration_number`
--
ALTER TABLE `registration_number`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `school_levy`
--
ALTER TABLE `school_levy`
  ADD PRIMARY KEY (`levy_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `school_post`
--
ALTER TABLE `school_post`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `school_terms`
--
ALTER TABLE `school_terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `sections_ibfk_1` (`general_section`);

--
-- Indexes for table `section_subjects`
--
ALTER TABLE `section_subjects`
  ADD PRIMARY KEY (`sec_sub_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  ADD PRIMARY KEY (`section_id`,`entry_year`);

--
-- Indexes for table `session_term`
--
ALTER TABLE `session_term`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staff_ibfk_1_subject` (`subject_id`),
  ADD KEY `staff_ibfk_1_class` (`class_id`),
  ADD KEY `staff_ibfk_1_section` (`section_id`),
  ADD KEY `staff_ibfk_1_school_post` (`position_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `admission_id` (`admission_id`),
  ADD KEY `students_ibfk_1` (`class_id`),
  ADD KEY `students_ibfk_2` (`section_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `university_disciplines`
--
ALTER TABLE `university_disciplines`
  ADD PRIMARY KEY (`discipline_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notification`
--
ALTER TABLE `admin_notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_numbers`
--
ALTER TABLE `admission_numbers`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `defaults`
--
ALTER TABLE `defaults`
  MODIFY `default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_class`
--
ALTER TABLE `general_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `government_levels`
--
ALTER TABLE `government_levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nigerian_banks`
--
ALTER TABLE `nigerian_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registration_number`
--
ALTER TABLE `registration_number`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `school_levy`
--
ALTER TABLE `school_levy`
  MODIFY `levy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_post`
--
ALTER TABLE `school_post`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school_sessions`
--
ALTER TABLE `school_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school_terms`
--
ALTER TABLE `school_terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section_subjects`
--
ALTER TABLE `section_subjects`
  MODIFY `sec_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3054;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `university_disciplines`
--
ALTER TABLE `university_disciplines`
  MODIFY `discipline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD CONSTRAINT `ad_not_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_fk_1` FOREIGN KEY (`enrolling_class`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicants_fk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_levy`
--
ALTER TABLE `school_levy`
  ADD CONSTRAINT `school_levy_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`general_section`) REFERENCES `general_section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_subjects`
--
ALTER TABLE `section_subjects`
  ADD CONSTRAINT `section_subjects_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_1_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_1_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
