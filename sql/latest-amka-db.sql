-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 06:56 PM
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
(33, 12, 3, 'Jasper', 'Eaton', 'Roy', '2021-11-10', 'Kebbi', 'Wasagu Danko', 'Male', 'Ocean', 'White', 'pasesajyb@gmail.com', '95 South Green Old Parkway', '08019889654', 1, 'AD7A-620A-7D68', '2024-07-18 22:52:57', '685b21481cc5fe4eaa657e8296837c59'),
(34, 20, 5, 'Hakeem', 'Luna', 'Curtis', '2013-03-16', 'Imo', 'Oru East', 'Female', 'Bradley', 'Wiggins', 'wofuc@gmail.com', '817 Oak Court', '08072442877', 1, 'C161-C474-A9DE', '2024-07-18 17:12:38', 'f488b222f148df829a44e932fe39e771'),
(35, 19, 4, 'Jesse', 'Solomon', 'Ramos', '1980-02-28', 'Imo', 'Oguta', 'Male', 'Zeus', 'Franks', 'menunebo@gmail.com', '448 Green Nobel Road', '08052913358', 1, '236A-C1F4-C321', '2024-07-18 17:11:44', '2a766f4855c0a695f8e31bde97e57985'),
(36, 10, 2, 'Musa', 'Shannon', 'Abdulkadir', '1987-06-03', 'Ekiti', 'Ekiti South-west', 'Male', 'Ignatius', 'Conner', 'zakoji@gmail.com', '15 West Nobel Boulevard', '08048240915', 1, '70F0-6CDE-6465', '2024-07-18 17:10:52', '6ba261e34b4a1d81ee04cf0a67be1fc6'),
(37, 6, 1, 'Adamu', 'Adamu', 'Lallami', '2011-10-22', 'Ekiti', 'Moba', 'Female', 'Eve', 'Lee', 'hyjine@gmail.com', '88 West Nobel Street', '08044127898', 1, 'D93F-A7FD-EDE9', '2024-07-18 16:59:32', 'cd2621f4a8b5923622c0485d821025a8'),
(38, 15, 3, 'Yusuf', '', 'Abdulkadir', '2001-05-25', 'Katsina', 'Rimi', 'Male', 'Abdulkadir', 'Jibrin', 'yusufabdulkadir1514@gmail.com', 'Abukur, Shaiskawa', '09015141557', 1, '378B-7398-DA60', '2024-07-20 14:06:54', '0e081b90ecbe1b2d3fa6cc1f44010e14'),
(39, 13, 3, 'Musty', 'Abukur', 'Sirajo', '1972-09-20', 'Kaduna', 'Igabi', 'Male', 'Sirajo', 'Abukur', 'mysterio0@gmail.com', 'Shaiskawa Abukur, Rimi', '08096321056', 1, '9838-89D3-438C', '2024-07-22 21:14:06', '084539819c0616d307d5078ed566322c');

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

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `staff_id`, `blog_title`, `blog_category`, `blog_thumbnail`, `blog_content`, `blog_timestamp`) VALUES
(1, 3001, 'Summoning All Staff', 'Sports', 'uploads/thumb_669d78c3b87780.94148582.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempora eum soluta optio accusamus aliquid totam ipsam consequuntur cumque fugit numquam assumenda quos, asperiores labore facilis expedita vitae sed corrupti!', '2024-07-21 21:08:19'),
(2, 3057, 'The  New Dawn', 'Events', 'uploads/thumb_669d7ac357e087.37624021.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempora eum soluta optio accusamus aliquid totam ipsam consequuntur cumque fugit numquam assumenda quos, asperiores labore facilis expedita vitae sed corrupti!', '2024-07-21 21:16:51'),
(3, 3066, 'Exquisiteness In It\'s Prime', 'Academic', 'uploads/thumb_669d87a2942534.21643165.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum tempora eum soluta optio accusamus aliquid totam ipsam consequuntur cumque fugit numquam assumenda quos, asperiores labore facilis expedita vitae sed corrupti!', '2024-07-21 22:11:46');

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
(26, 'null', 9);

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
(3, 'Abdullahi', 'Kabri', 'kabriacid01@gmail.com', '07037943396', 'eertyukltyedtr6dtuiojerxdgfvxjkgduyrsjrtsidkudghdghkxmdjfusiydtkjcjhfg', '2024-06-22 20:25:16'),
(4, 'Helen', 'Petersen', 'qohyce@gmail.com', '08061210167', 'Vitae reiciendis qui\'', '2024-07-23 09:43:20'),
(5, 'Orli', 'Madden', 'qebatu@gmail.com', '08071285921', 'Asperiores p\'erspicia\'', '2024-07-23 09:44:11'),
(6, 'Leah', 'Roy', 'todipeb@gmail.com', '08082244168', 'La\'boriosam quis n\'is', '2024-07-23 09:45:13'),
(7, 'Hiram', 'Manning', 'hamawaci@gmail.com', '08069187269', 'Voluptatem nemo numq', '2024-07-23 09:46:27'),
(8, 'Malcolm', 'Todd', 'ronejoh@gmail.com', '08030874773', 'Quaerat ad sint eius', '2024-07-23 09:52:18'),
(9, 'Len', 'Rasmussen', 'lyqytatag@gmail.com', '08062586150', 'Totam dolore aperiam', '2024-07-23 16:43:10'),
(10, 'Samuel', 'Richmond', 'fohibib@gmail.com', '08030818378', 'Dolore maxime repudi', '2024-07-23 16:43:22'),
(11, 'Colton', 'Gross', 'galyw@gmail.com', '08076790249', 'Fugiat autem cupidi', '2024-07-23 16:46:03');

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
(5, 'null', '0000', 0);

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
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsletter_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`newsletter_id`, `email`, `timestamp`) VALUES
(1, 'wexupe@gmail.com', '2024-07-23 16:47:00'),
(2, 'mustyabukur@gmail.com', '2024-07-23 16:47:22');

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
(25, '360 Bank');

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
(1, 1089, 10, 18, 8, 9, 46, 63, 'B', 'V. Good', 0),
(2, 1071, 10, 18, 15, 1, 6, 22, 'F', 'Fail', 0),
(3, 1019, 10, 18, 17, 12, 35, 64, 'B', 'V. Good', 0),
(4, 1086, 10, 18, 4, 1, 53, 58, 'C', 'Good', 0),
(5, 1110, 10, 18, 0, 7, 29, 36, 'F', 'Fail', 0),
(6, 1089, 10, 2, 20, 20, 0, 40, 'D', 'Pass', 1),
(7, 1071, 10, 2, 11, 8, 17, 36, 'F', 'Fail', 1),
(8, 1019, 10, 2, 4, 1, 45, 50, 'C', 'Good', 1),
(9, 1086, 10, 2, 8, 6, 45, 59, 'C', 'Good', 1),
(10, 1110, 10, 2, 17, 7, 53, 77, 'A', 'Excellent', 1),
(11, 1089, 10, 20, 12, 11, 36, 59, 'C', 'Good', 0),
(12, 1071, 10, 20, 19, 14, 60, 93, 'A', 'Excellent', 0),
(13, 1019, 10, 20, 6, 17, 54, 77, 'A', 'Excellent', 0),
(14, 1086, 10, 20, 2, 4, 23, 29, 'F', 'Fail', 0),
(15, 1110, 10, 20, 15, 18, 49, 82, 'A', 'Excellent', 0),
(16, 1089, 10, 11, 20, 18, 59, 97, 'A', 'Excellent', 0),
(17, 1071, 10, 11, 1, 17, 7, 25, 'F', 'Fail', 0),
(18, 1019, 10, 11, 13, 0, 10, 23, 'F', 'Fail', 0),
(19, 1086, 10, 11, 10, 19, 18, 47, 'D', 'Pass', 0),
(20, 1110, 10, 11, 8, 8, 33, 49, 'D', 'Pass', 0),
(21, 1089, 10, 23, 13, 6, 60, 79, 'A', 'Excellent', 0),
(22, 1071, 10, 23, 15, 16, 34, 65, 'B', 'V. Good', 0),
(23, 1019, 10, 23, 11, 8, 15, 34, 'F', 'Fail', 0),
(24, 1086, 10, 23, 12, 16, 26, 54, 'C', 'Good', 0),
(25, 1110, 10, 23, 9, 19, 9, 37, 'F', 'Fail', 0),
(26, 1089, 10, 3, 16, 4, 12, 32, 'F', 'Fail', 1),
(27, 1071, 10, 3, 18, 11, 32, 61, 'B', 'V. Good', 1),
(28, 1019, 10, 3, 13, 8, 30, 51, 'C', 'Good', 1),
(29, 1086, 10, 3, 4, 19, 51, 74, 'A', 'Excellent', 1),
(30, 1110, 10, 3, 3, 17, 14, 34, 'F', 'Fail', 1),
(31, 1089, 10, 16, 7, 20, 48, 75, 'A', 'Excellent', 0),
(32, 1071, 10, 16, 5, 9, 35, 49, 'D', 'Pass', 0),
(33, 1019, 10, 16, 13, 13, 32, 58, 'C', 'Good', 0),
(34, 1086, 10, 16, 8, 6, 7, 21, 'F', 'Fail', 0),
(35, 1110, 10, 16, 0, 1, 9, 10, 'F', 'Fail', 0),
(36, 1089, 10, 33, 19, 17, 50, 86, 'A', 'Excellent', 0),
(37, 1071, 10, 33, 2, 8, 35, 45, 'D', 'Pass', 0),
(38, 1019, 10, 33, 2, 12, 55, 69, 'B', 'V. Good', 0),
(39, 1086, 10, 33, 15, 16, 4, 35, 'F', 'Fail', 0),
(40, 1110, 10, 33, 5, 15, 17, 37, 'F', 'Fail', 0),
(41, 1089, 10, 24, 19, 14, 12, 45, 'D', 'Pass', 0),
(42, 1071, 10, 24, 13, 1, 24, 38, 'F', 'Fail', 0),
(43, 1019, 10, 24, 20, 20, 60, 100, 'A', 'Excellent', 0),
(44, 1086, 10, 24, 8, 19, 33, 60, 'B', 'V. Good', 0),
(45, 1110, 10, 24, 19, 5, 52, 76, 'A', 'Excellent', 0),
(46, 1095, 17, 29, 2, 20, 13, 35, 'F', 'Fail', 0),
(47, 1125, 17, 29, 20, 1, 52, 73, 'A', 'Excellent', 0),
(48, 1080, 17, 29, 8, 1, 22, 31, 'F', 'Fail', 0),
(49, 1074, 17, 29, 19, 15, 48, 82, 'A', 'Excellent', 0),
(50, 1138, 17, 29, 20, 9, 16, 45, 'D', 'Pass', 0),
(51, 1062, 17, 29, 13, 9, 13, 35, 'F', 'Fail', 0),
(52, 1059, 17, 29, 20, 12, 48, 80, 'A', 'Excellent', 0),
(53, 1095, 17, 2, 18, 20, 33, 71, 'A', 'Excellent', 1),
(54, 1125, 17, 2, 7, 12, 39, 58, 'C', 'Good', 1),
(55, 1080, 17, 2, 4, 9, 7, 20, 'F', 'Fail', 1),
(56, 1074, 17, 2, 1, 2, 53, 56, 'C', 'Good', 1),
(57, 1138, 17, 2, 7, 11, 16, 34, 'F', 'Fail', 1),
(58, 1062, 17, 2, 20, 13, 25, 58, 'C', 'Good', 1),
(59, 1059, 17, 2, 20, 19, 27, 66, 'B', 'V. Good', 1),
(60, 1095, 17, 20, 10, 20, 25, 55, 'C', 'Good', 0),
(61, 1125, 17, 20, 16, 15, 27, 58, 'C', 'Good', 0),
(62, 1080, 17, 20, 20, 11, 14, 45, 'D', 'Pass', 0),
(63, 1074, 17, 20, 2, 19, 19, 40, 'D', 'Pass', 0),
(64, 1138, 17, 20, 6, 7, 24, 37, 'F', 'Fail', 0),
(65, 1062, 17, 20, 18, 17, 52, 87, 'A', 'Excellent', 0),
(66, 1059, 17, 20, 11, 8, 1, 20, 'F', 'Fail', 0),
(67, 1095, 17, 11, 0, 8, 18, 26, 'F', 'Fail', 0),
(68, 1125, 17, 11, 9, 16, 36, 61, 'B', 'V. Good', 0),
(69, 1080, 17, 11, 16, 3, 19, 38, 'F', 'Fail', 0),
(70, 1074, 17, 11, 10, 19, 0, 29, 'F', 'Fail', 0),
(71, 1138, 17, 11, 10, 17, 8, 35, 'F', 'Fail', 0),
(72, 1062, 17, 11, 10, 19, 4, 33, 'F', 'Fail', 0),
(73, 1059, 17, 11, 4, 2, 17, 23, 'F', 'Fail', 0),
(74, 1095, 17, 23, 7, 7, 39, 53, 'C', 'Good', 0),
(75, 1125, 17, 23, 0, 6, 17, 23, 'F', 'Fail', 0),
(76, 1080, 17, 23, 13, 19, 37, 69, 'B', 'V. Good', 0),
(77, 1074, 17, 23, 18, 17, 45, 80, 'A', 'Excellent', 0),
(78, 1138, 17, 23, 15, 4, 25, 44, 'D', 'Pass', 0),
(79, 1062, 17, 23, 17, 10, 31, 58, 'C', 'Good', 0),
(80, 1059, 17, 23, 8, 18, 3, 29, 'F', 'Fail', 0),
(81, 1095, 17, 3, 7, 4, 8, 19, 'F', 'Fail', 1),
(82, 1125, 17, 3, 18, 0, 23, 41, 'D', 'Pass', 1),
(83, 1080, 17, 3, 1, 17, 31, 49, 'D', 'Pass', 1),
(84, 1074, 17, 3, 20, 4, 4, 28, 'F', 'Fail', 1),
(85, 1138, 17, 3, 0, 2, 38, 40, 'D', 'Pass', 1),
(86, 1062, 17, 3, 4, 4, 39, 47, 'D', 'Pass', 1),
(87, 1059, 17, 3, 14, 8, 19, 41, 'D', 'Pass', 1),
(88, 1095, 17, 4, 10, 12, 26, 48, 'D', 'Pass', 0),
(89, 1125, 17, 4, 20, 17, 48, 85, 'A', 'Excellent', 0),
(90, 1080, 17, 4, 3, 10, 41, 54, 'C', 'Good', 0),
(91, 1074, 17, 4, 15, 3, 52, 70, 'A', 'Excellent', 0),
(92, 1138, 17, 4, 14, 10, 59, 83, 'A', 'Excellent', 0),
(93, 1062, 17, 4, 15, 6, 57, 78, 'A', 'Excellent', 0),
(94, 1059, 17, 4, 16, 18, 9, 43, 'D', 'Pass', 0),
(95, 1095, 17, 6, 12, 17, 7, 36, 'F', 'Fail', 0),
(96, 1125, 17, 6, 15, 2, 38, 55, 'C', 'Good', 0),
(97, 1080, 17, 6, 4, 2, 18, 24, 'F', 'Fail', 0),
(98, 1074, 17, 6, 3, 14, 9, 26, 'F', 'Fail', 0),
(99, 1138, 17, 6, 6, 9, 4, 19, 'F', 'Fail', 0),
(100, 1062, 17, 6, 7, 1, 53, 61, 'B', 'V. Good', 0),
(101, 1059, 17, 6, 11, 5, 28, 44, 'D', 'Pass', 0),
(102, 1095, 17, 26, 14, 7, 18, 39, 'F', 'Fail', 0),
(103, 1125, 17, 26, 4, 13, 16, 33, 'F', 'Fail', 0),
(104, 1080, 17, 26, 0, 1, 48, 49, 'D', 'Pass', 0),
(105, 1074, 17, 26, 0, 19, 23, 42, 'D', 'Pass', 0),
(106, 1138, 17, 26, 2, 8, 52, 62, 'B', 'V. Good', 0),
(107, 1062, 17, 26, 7, 8, 5, 20, 'F', 'Fail', 0),
(108, 1059, 17, 26, 8, 5, 10, 23, 'F', 'Fail', 0),
(109, 1095, 17, 8, 8, 9, 2, 19, 'F', 'Fail', 0),
(110, 1125, 17, 8, 12, 2, 50, 64, 'B', 'V. Good', 0),
(111, 1080, 17, 8, 8, 7, 37, 52, 'C', 'Good', 0),
(112, 1074, 17, 8, 18, 4, 24, 46, 'D', 'Pass', 0),
(113, 1138, 17, 8, 16, 16, 18, 50, 'C', 'Good', 0),
(114, 1062, 17, 8, 1, 7, 11, 19, 'F', 'Fail', 0),
(115, 1059, 17, 8, 17, 8, 52, 77, 'A', 'Excellent', 0),
(116, 1095, 17, 9, 10, 7, 30, 47, 'D', 'Pass', 0),
(117, 1125, 17, 9, 2, 5, 23, 30, 'F', 'Fail', 0),
(118, 1080, 17, 9, 17, 3, 46, 66, 'B', 'V. Good', 0),
(119, 1074, 17, 9, 2, 8, 37, 47, 'D', 'Pass', 0),
(120, 1138, 17, 9, 5, 18, 36, 59, 'C', 'Good', 0),
(121, 1062, 17, 9, 3, 9, 9, 21, 'F', 'Fail', 0),
(122, 1059, 17, 9, 10, 6, 28, 44, 'D', 'Pass', 0),
(123, 1095, 17, 30, 13, 15, 1, 29, 'F', 'Fail', 0),
(124, 1125, 17, 30, 9, 11, 43, 63, 'B', 'V. Good', 0),
(125, 1080, 17, 30, 8, 18, 50, 76, 'A', 'Excellent', 0),
(126, 1074, 17, 30, 2, 10, 57, 69, 'B', 'V. Good', 0),
(127, 1138, 17, 30, 17, 10, 31, 58, 'C', 'Good', 0),
(128, 1062, 17, 30, 7, 4, 13, 24, 'F', 'Fail', 0),
(129, 1059, 17, 30, 4, 8, 10, 22, 'F', 'Fail', 0),
(130, 1095, 17, 31, 16, 16, 34, 66, 'B', 'V. Good', 0),
(131, 1125, 17, 31, 17, 11, 42, 70, 'A', 'Excellent', 0),
(132, 1080, 17, 31, 13, 18, 50, 81, 'A', 'Excellent', 0),
(133, 1074, 17, 31, 18, 3, 10, 31, 'F', 'Fail', 0),
(134, 1138, 17, 31, 9, 18, 37, 64, 'B', 'V. Good', 0),
(135, 1062, 17, 31, 4, 11, 7, 22, 'F', 'Fail', 0),
(136, 1059, 17, 31, 0, 3, 5, 8, 'F', 'Fail', 0),
(137, 1095, 17, 17, 17, 5, 27, 49, 'D', 'Pass', 0),
(138, 1125, 17, 17, 7, 12, 18, 37, 'F', 'Fail', 0),
(139, 1080, 17, 17, 9, 7, 33, 49, 'D', 'Pass', 0),
(140, 1074, 17, 17, 17, 4, 47, 68, 'B', 'V. Good', 0),
(141, 1138, 17, 17, 19, 9, 25, 53, 'C', 'Good', 0),
(142, 1062, 17, 17, 18, 12, 38, 68, 'B', 'V. Good', 0),
(143, 1059, 17, 17, 5, 18, 19, 42, 'D', 'Pass', 0),
(144, 1063, 18, 20, 4, 0, 9, 13, 'F', 'Fail', 0),
(145, 1139, 18, 20, 17, 16, 3, 36, 'F', 'Fail', 0),
(146, 1075, 18, 20, 13, 6, 7, 26, 'F', 'Fail', 0),
(147, 1022, 18, 20, 18, 10, 30, 58, 'C', 'Good', 0),
(148, 1063, 18, 4, 11, 5, 23, 39, 'F', 'Fail', 0),
(149, 1139, 18, 4, 8, 15, 2, 25, 'F', 'Fail', 0),
(150, 1075, 18, 4, 4, 8, 59, 71, 'A', 'Excellent', 0),
(151, 1022, 18, 4, 13, 5, 38, 56, 'C', 'Good', 0),
(152, 1088, 13, 11, 5, 3, 13, 21, 'F', 'Fail', 0),
(153, 1083, 13, 11, 4, 13, 10, 27, 'F', 'Fail', 0),
(154, 1045, 13, 11, 20, 12, 11, 43, 'D', 'Pass', 0),
(155, 1015, 13, 11, 4, 15, 11, 30, 'F', 'Fail', 0),
(156, 1173, 13, 11, 15, 20, 40, 75, 'A', 'Excellent', 0),
(157, 1039, 13, 11, 0, 12, 8, 20, 'F', 'Fail', 0),
(158, 1088, 13, 18, 17, 3, 3, 23, 'F', 'Fail', 0),
(159, 1083, 13, 18, 1, 9, 9, 19, 'F', 'Fail', 0),
(160, 1045, 13, 18, 13, 10, 0, 23, 'F', 'Fail', 0),
(161, 1015, 13, 18, 11, 14, 10, 35, 'F', 'Fail', 0),
(162, 1173, 13, 18, 8, 2, 13, 23, 'F', 'Fail', 0),
(163, 1039, 13, 18, 18, 15, 5, 38, 'F', 'Fail', 0),
(164, 1088, 13, 2, 15, 10, 11, 36, 'F', 'Fail', 0),
(165, 1083, 13, 2, 19, 0, 6, 25, 'F', 'Fail', 0),
(166, 1045, 13, 2, 1, 7, 17, 25, 'F', 'Fail', 0),
(167, 1015, 13, 2, 6, 17, 12, 35, 'F', 'Fail', 0),
(168, 1173, 13, 2, 3, 20, 12, 35, 'F', 'Fail', 0),
(169, 1039, 13, 2, 16, 16, 11, 43, 'D', 'Pass', 0),
(170, 1088, 13, 23, 3, 14, 3, 20, 'F', 'Fail', 0),
(171, 1083, 13, 23, 6, 4, 16, 26, 'F', 'Fail', 0),
(172, 1045, 13, 23, 7, 14, 10, 31, 'F', 'Fail', 0),
(173, 1015, 13, 23, 13, 15, 3, 31, 'F', 'Fail', 0),
(174, 1173, 13, 23, 9, 2, 0, 11, 'F', 'Fail', 0),
(175, 1039, 13, 23, 19, 7, 18, 44, 'D', 'Pass', 0),
(176, 1088, 13, 8, 14, 15, 10, 39, 'F', 'Fail', 0),
(177, 1083, 13, 8, 19, 4, 2, 25, 'F', 'Fail', 0),
(178, 1045, 13, 8, 19, 12, 14, 45, 'D', 'Pass', 0),
(179, 1015, 13, 8, 13, 16, 15, 44, 'D', 'Pass', 0),
(180, 1173, 13, 8, 0, 15, 15, 30, 'F', 'Fail', 0),
(181, 1039, 13, 8, 1, 14, 19, 34, 'F', 'Fail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_levy`
--

CREATE TABLE `school_levy` (
  `levy_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `item_amount` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_levy`
--

INSERT INTO `school_levy` (`levy_id`, `item`, `item_amount`, `section_id`) VALUES
(1, 'Medical Fee', 1000, 1),
(2, 'Games Fee', 650, 4);

-- --------------------------------------------------------

--
-- Table structure for table `school_position`
--

CREATE TABLE `school_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_position`
--

INSERT INTO `school_position` (`position_id`, `position_name`, `position_number`) VALUES
(1, 'Digital Manager', 1),
(2, 'Director', 2),
(3, 'Accountant', 2),
(4, 'Exam Officer', 3),
(5, 'Admission Officer', 4),
(6, 'General Secretary', 5),
(7, 'Co-ordinator', 6),
(8, 'Principal', 6),
(9, 'Vice Principal', 6),
(10, 'Headmaster', 7),
(11, 'Senior Master', 7),
(12, 'Staff', 8),
(14, 'Non-Staff', 9);

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
(9, 'null', 0, 5);

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
(1, 24, 1067),
(2, 24, 2041),
(3, 24, 3083),
(4, 24, 4029),
(5, 24, 4001),
(7, 24, 4003);

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
  `salary` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `first_name`, `last_name`, `class_id`, `section_id`, `subject_id`, `position_id`, `qualification`, `discipline`, `bank_name`, `birth_date`, `state`, `lga`, `gender`, `photo`, `email`, `password`, `phone_number`, `status`, `address`, `salary`, `account_number`, `timestamp`) VALUES
(3001, 'kabriacid', 'Abdullahi', 'Kabri', 13, 3, 34, 1, 'BSc', 'Software Engineering', 'Guaranty Trust Bank (GTBank)', '2001-01-31', 'Taraba', 'Jalingo', 'Male', 'uploads/ullahi-kabri66928d234c7ff_icon.heic', 'kabriacid01@gmail.com', '$2y$10$Z0ZeQ0vXT9yaBmzexCJ1teiQSPXuognqmTJwpo6pjjWZl2UyUGMDW', '07037943396', '1', 'Inec Office, Sabon Gari Jalingo,', '60000', '0472452423', '2024-07-22 21:16:51'),
(3031, 'Yagana42', 'Yagana', 'Hassan', 3, 3, 20, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/ana-hassan66944dccb745a_yagana.jpg', '', '$2y$10$pWzhT9ArPV5CvkwxsvPmKeSHlQ6LASI3CirEARXO/6bBjzV9zjV4C', '07068592642', '1', '', '0', '0', '2024-07-16 18:04:44'),
(3032, 'Hafsat01', 'Hafsat', 'Ishaq Aliyu', 1, 3, 11, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09030709101', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3033, 'Sadika26', 'Sadika', 'Dauda', 17, 4, 21, 10, 'BSc', 'Accounting', 'Access Bank', '1998-01-31', 'Gombe', 'Billiri', 'Female', 'uploads/SADIKA-DAUDA669D36BBE94B8.jpg', '', '$2y$10$u/DUHrvuRCX6uT5lG.Q7NOg2eRNRREoRTKLsdVHWA8/d9gbF2EPlq', '08138323326', '1', '', '67876', '2345678987', '2024-07-21 16:56:39'),
(3034, 'Mansur05', 'Mansur', 'Muhammed Boyi', 26, 9, 34, 14, 'BSc', 'Accounting', 'Access Bank', '0000-00-00', 'Bayelsa', 'Nembe', 'Male', 'uploads/default.png', '', '', '07049281305', '1', '', '12345', '0234567898', '2024-07-21 17:08:48'),
(3035, 'Abbas73', 'Abbas', 'Abdul-rasheed Maikarfi', 17, 4, 34, 5, 'BSc', 'Accounting', 'Access Bank', '0000-00-00', '', '', 'Male', 'uploads/ABBAS-ABDUL-RASHEED MAIKARFI669D3550F0244.png', '', '', '08061209973', '1', '', '678909', '0234567890', '2024-07-21 16:20:33'),
(3036, 'Maryam26', 'Maryam', 'Bello', 8, 2, 3, 11, 'BSc', 'Accounting', 'Access Bank', '1997-08-06', 'Taraba', 'Jalingo', 'Female', 'uploads/yam-bello669439a186b7f_anty.jpg', '', '$2y$10$9550KUFjEpq.LKNsSRdXw.MYIsLUgFVjipzr7OWo0OV5csDE6N7v2', '08136414626', '1', '', '345678', '0345678909', '2024-07-21 16:23:56'),
(3037, 'Zainab22', 'Zainab', 'Hamman-adam', 6, 3, 2, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/nab-hamman-adam66944dd91ce61_asmau.jpg', '', '', '08061602122', '1', '', '0', '0', '2024-07-14 22:14:49'),
(3038, 'Khadija49', 'Khadija', 'Yusuf', 26, 9, 32, 8, 'Diploma', 'History', 'Access Bank', '2024-07-12', 'Taraba', 'Sardauna', 'Female', 'uploads/KHADIJA-YUSUF6694585C882C3.jpg', '', '$2y$10$m68KV0YkQS3QvtyD/pMwmOXb8L.sDkdg5b8AujjlRqkipb8EQuani', '08062524049', '1', '', '90000', '2147483647', '2024-07-21 16:17:32'),
(3039, 'Adam78', 'Adam', 'Mahmud', 20, 3, 3, 12, '', '', '', '0000-00-00', '', '', 'Male', 'uploads/m-mahmud66944d89ad1ec_zayyad.jpg', '', '$2y$10$ywlCqPNjKBbd9rJMBb1uaucRsh8SIJSx64eWYitePWmG2oZI.OEiO', '07060753078', '1', '', '0', '0', '2024-07-16 17:43:26'),
(3040, 'Abubakar35', 'Nevada', 'Harrell', 22, 3, 17, 12, '', '', '', '2022-12-15', 'Kebbi', 'Argungu', 'Female', 'uploads/NEVADA-HARRELL669D34E70BB77.png', '', '', '08014122882', '1', '736 Nobel Boulevard', '0', '0', '2024-07-21 16:18:47'),
(3041, 'Abubakar30', 'Abubakar', 'Sadiq Abubakar', 21, 3, 9, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08134816835', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3042, 'Zulaihatu11', 'Zulaihatu', 'Yahya', 4, 1, 11, 12, 'BSc', 'Accounting', 'Access Bank', '0000-00-00', '', '', 'Male', 'uploads/aihatu-yahya66944d276e61f_zulai.jpg', '', '$2y$10$faRy2/Cto8C/XF2TebwmXONVHsuDi9PDR98In.QtdD7ARlJEFqe42', '07037600511', '1', '', '45678', '3456787654', '2024-07-21 16:55:08'),
(3043, 'Muhammad15', 'Muhammad', 'Fatihu Mahmud', 14, 3, 8, 10, 'BSc', 'Accounting', 'Access Bank', '1996-07-08', 'Taraba', 'Wukari', 'Male', 'uploads/ammad-fatihu mahmud66944d3a17446_fatihu.jpg', '', '$2y$10$fFKhAFyDB85cQELZPS7t9.Jw.4C7tOR6UNazvhp8cAMT52uNQ9ODG', '08100098915', '1', '', '900000', '2147483647', '2024-07-21 15:48:43'),
(3044, 'Nasir39', 'Nasir', 'Usman', 18, 3, 9, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08065842339', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3045, 'Abdul-fatah56', 'Abdul-fatah', 'Habibu', 11, 3, 18, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08100862656', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3046, 'Sadik40', 'Sadik', 'Bukar', 7, 3, 24, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08081522140', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3047, 'Hafiz01', 'Hafiz', 'Isa Bello', 26, 9, 29, 7, 'BSc', 'Accounting', 'Access Bank', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09023608601', '1', '', '78989', '2344567897', '2024-07-21 16:21:34'),
(3048, 'Hassan12', 'Hassan', 'Adam Umar', 15, 3, 23, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09061760712', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3049, 'Musa82', 'Musa', 'Abubakar Kabri', 14, 3, 29, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08163526382', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3050, 'Isa48', 'Isa', 'Aliyu', 20, 3, 25, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '08066126748', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3051, 'Hajara68', 'Hajara', 'Hussaini Yusuf', 5, 3, 11, 12, '', '', '', '0000-00-00', '', '', '', 'uploads/default.png', '', '', '09138284668', '1', '', '0', '0', '2024-07-14 20:57:01'),
(3052, 'kabri08', 'Abubakar', 'Abubakar Kabri', 26, 9, 34, 4, 'BSc', 'Accounting', 'Guaranty Trust Bank (GTBank)', '0000-00-00', '', '', 'Male', 'uploads/bakar-abubakar kabri66943a1989bf4_6648a10629074.jpg', '', '$2y$10$ZZm9NWnOtDaSA/hWCt3M5eJWHOM3RhlrgtoPKHHrgKkvDLz1kB1nm', '07038341242', '1', '', '60000', '472452423', '2024-07-21 16:16:03'),
(3054, 'Kennan72', 'Kennan', 'Castaneda', 12, 3, 14, 9, 'Training', 'Nursing', 'First City Monument Bank (FCMB)', '1972-02-02', 'Cross River', 'Ikom', 'Male', 'uploads/KENNAN-CASTANEDA669D31D5C51C7.png', 'hason@gmail.com', '$2y$10$Otio/qDSUUG52sevd6bKg.xqFPhL2HhcMxXoLNzVtFR0oltRDutUC', '08064182472', '0', '870 South Rocky New Lane', '3786942', '3648949768', '2024-07-21 16:05:41'),
(3055, 'amka01', 'Abubakar', 'Kabri', 26, 9, 34, 2, 'BSc', 'Accounting', 'Ecobank', '1959-07-14', 'Taraba', 'Jalingo', 'Male', 'uploads/ABUBAKAR-KABRI669D426FB815B.jpg', 'abubakarkabri@gmail.com', '$2y$10$4TfQH9wjXpXmM9o1OJR8GOdRnzoP/nrjiPUKQzQ5JoCiL5vD.Wf/.', '08030631546', '1', 'Inec Office, Sabon Gari Jalingo,', '7876326', '4174265678', '2024-07-21 17:17:22'),
(3056, 'Amela18', 'Amela', 'Hurley', 26, 9, 34, 3, 'BSc', 'Accounting', 'Access Bank', '1983-08-08', 'Oyo', 'Ibadan South-West', 'Male', 'uploads/AMELA-HURLEY669D324DA780C.jpg', 'qemyvibyqe@gmail.com', '$2y$10$pJ82fcOT6zRoRTTqCITjDefqk7DK/w4Rv9VdSkz1ld2waM1Viyot.', '08066643618', '1', '323 North First Parkway', '60000', '6789409869', '2024-07-21 16:15:00'),
(3057, 'Sharon72', 'Sharon', 'Long', 26, 9, 34, 14, 'BSc', 'Accounting', 'Wema Bank', '2001-01-12', 'Gombe', 'Balanga', 'Male', 'uploads/SHARON-LONG669D327C20B47.jpg', 'nonoxiligy@gmail.com', '$2y$10$9Teqa8GNCyL90HoGkNTuX.yA/ugu82WQ9k04XhnEbCY47PznO4pKC', '08017365772', '1', '126 Rocky Second Court', '80000', '6789034567', '2024-07-21 21:18:24'),
(3058, 'Rhea31', 'Rhea', 'Hutchinson', 24, 7, 16, 12, 'Professiona', 'Economics', 'Globus Bank', '2018-02-24', 'Rivers', 'Degema', 'Male', 'uploads/RHEA-HUTCHINSON669D32A1EEE6F.jpg', 'zynyxacuty@gmail.com', '$2y$10$LtMffpYphA0xIP5sWs5zlekqNT5xxP2V.xb7ZMOxzr9DEBuo.iyn6', '08089127231', '1', '920 South Clarendon Parkway', '8007114', '3434400890', '2024-07-21 16:09:06'),
(3059, 'Penelope38', 'Penelope', 'Moore', 5, 1, 16, 12, 'OND', 'English Language', 'Sterling Bank', '1990-01-02', 'Adamawa', 'Gayuk', 'Male', 'uploads/PENELOPE-MOORE669D32E521F7E.jpg', 'joxizexan@gmail.com', '$2y$10$qtRG.wkj6k.0oBg7cJqMoeCSjf/ouipRLGnZn8jLLZ0gN/LaNG0AW', '08090548738', '0', '559 Cowley Boulevard', '1646165', '4168899122', '2024-07-21 16:10:13'),
(3060, 'Wesley80', 'Wesley', 'Osborne', 8, 2, 13, 11, 'NCE', 'Economics', 'SunTrust Bank', '1981-08-31', 'Enugu', 'Udi', 'Female', 'uploads/WESLEY-OSBORNE669D32FFAB724.jpg', 'qafy@gmail.com', '$2y$10$Bkkbp1NtQURx3JS34nuwCuUvzd.C5tSXX88YMllnO.QqCXEHEdn3i', '08083685680', '0', '408 East Old Boulevard', '7855179', '4336732345', '2024-07-21 16:10:39'),
(3061, 'Candace96', 'Candace', 'Roth', 26, 9, 34, 6, 'OND', 'Psychology', 'Fidelity Bank', '2014-05-07', 'Adamawa', 'Hong', 'Male', 'uploads/CANDACE-ROTH669D33456F8A0.png', 'qetavy@gmail.com', '$2y$10$0hYqjO4P4.a8bLHuJZYwqeWhrltcZlKuS7nB/IYFK3Pw6k4pSJFBe', '08048993096', '1', '65 Nobel Drive', '50000', '1139769678', '2024-07-21 21:09:38'),
(3062, 'Ishmael88', 'Ishmael', 'Woods', 17, 4, 16, 11, 'Training', 'Political Science', 'Access Bank', '1985-05-21', 'Bayelsa', 'Kolokuma Opokuma', 'Female', 'uploads/ISHMAEL-WOODS669D3E356F414.jpg', 'qinonywy@gmail.com', '$2y$10$Tc4X475M6vI.A2bZ49hi1Ova1QNMyW9ZK59KUqpTZVU1j6R7REeGO', '08063857788', '1', '324 Cowley Lane', '67889', '2345678887', '2024-07-21 16:58:29'),
(3063, 'Sopoline68', 'Sopoline', 'Bowen', 13, 3, 1, 12, 'BSc', 'Accounting', 'Unity Bank', '2009-10-09', 'Taraba', 'Sardauna', 'Male', 'uploads/SOPOLINE-BOWEN669D3E9DED906.jpg', 'fysi@gmail.com', '$2y$10$TJrG/8w18vhBPa9cg1Cvqu6HwH7Dh6HZkrFaCLejKOXltSlmR/HH6', '08096273768', '1', '53 East Cowley Boulevard', '23465', '2345676543', '2024-07-21 17:00:14'),
(3064, 'Alice36', 'Alice', 'Pearson', 10, 2, 1, 14, 'BSc', 'Accounting', 'Keystone Bank', '1980-02-23', 'Adamawa', 'Demsa', 'Male', 'uploads/ALICE-PEARSON669D3ED2C9B2D.jpg', 'cevyselo@gmail.com', '$2y$10$EH01Kxug0NhWF7UcKJwZbOHm6V/ENw1ZtThCmaBcpVqwbOk11Rgua', '08037574836', '1', '183 South Second Extension', '489056', '8945018567', '2024-07-21 17:01:06'),
(3065, 'Mohammad51', 'Mohammad', 'Casey', 19, 4, 1, 14, 'BSc', 'Accounting', 'Guaranty Trust Bank (GTBank)', '2016-04-11', 'Niger', 'Agaie', 'Female', 'uploads/MOHAMMAD-CASEY669D3EF3BDADB.jpg', 'fozohom@gmail.com', '$2y$10$bTax9WM/izONKngnDMGcJu64eX3j5o4gGeKg1KGmNl9GUVxEfMqTS', '08016682651', '1', '37 Clarendon Street', '98323', '8456118456', '2024-07-21 17:01:39'),
(3066, 'Zeph14', 'Zeph', 'Kemp', 18, 4, 7, 12, 'MSc', 'Chemical Engineering', 'Guaranty Trust Bank (GTBank)', '1972-09-07', 'Imo', 'Isiala Mbano', 'Female', 'uploads/default.png', 'hetago@gmail.com', '$2y$10$cTKV85dKSW2F306e5w0F5uFGDY.zwLqao5/Ap5s7dE55IHHfc7cnC', '08089149114', '0', '39 Cowley Court', '12816', '5357681987', '2024-07-21 21:26:08'),
(3067, 'Oliver56', 'Oliver', 'Reid', 16, 3, 6, 9, 'SSCE', 'Physics', 'Union Bank', '2012-11-02', 'Bauchi', 'Gamawa', 'Female', 'uploads/default.png', 'hujubyhudi@gmail.com', '$2y$10$XkmppGFdd490g6PnET.ag.iXB3uFYFA58tkMOgoEq5Cf/RE46i7Su', '08043235656', '1', '59 Oak Street', '1949014', '5269213345', '2024-07-21 17:02:39'),
(3068, 'Irma32', 'Irma', 'Clarke', 19, 4, 29, 12, 'NCE', 'Electrical Engineering', 'Kuda Microfinance Bank', '2015-04-04', 'Plateau', 'Wase', 'Female', 'uploads/default.png', 'habyrim@gmail.com', '$2y$10$DazmIQLN2wWRwtXldFG8zefC9CNRTuMIC2JkeCWS7z9Bk7/K.lfkC', '08044741032', '1', '383 New Parkway', '611878', '6169082456', '2024-07-21 17:03:12'),
(3069, 'Chandler36', 'Chandler', 'Foreman', 9, 2, 9, 12, 'Diploma', 'Architecture', 'Union Bank', '1992-03-20', 'Imo', 'Ehime Mbano', 'Male', 'uploads/default.png', 'lucyd@gmail.com', '$2y$10$FAMDd.2UQGYxhfReN83xr.6614eJ1euFKwHC74y76rlviIoJhuNJC', '08014658536', '1', '764 Hague Street', '2855024', '9199155345', '2024-07-21 17:03:52'),
(3070, 'Oren81', 'Oren', 'Jackson', 26, 9, 34, 14, 'Certificate', 'Law', 'Keystone Bank', '2002-11-07', 'Kebbi', 'Aleiro', 'Female', 'uploads/default.png', 'zicozaca@gmail.com', '$2y$10$tCtyFLAeOZSZBVZAsrxAVejAJK.W8cf4uwwClicSBP/knX8At9IgS', '08027825881', '1', '79 North New Street', '54864', '8327194123', '2024-07-21 17:07:37');

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
(1002, 7, 2, 'AMK/24/2011', 'Carla', 'Caldwell', 'Drake', '1', '$2y$10$KgNINEo/zp4Y/tc6cVY7SuNofSTea29aWChLa4AjBSIWljXzIktsa', '1982-07-08', 'Ebonyi', 'Ivo', 'Female', 'Iliana', 'Edwards', 'xoliguj@gmail.com', '83 Oak Drive', '08074594497', '2024-07-21 11:44:37'),
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
(1024, 12, 3, 'AMK/24/3036', 'Ross', 'Macdonald', 'Griffin', '1', '$2y$10$mvPnm9KP2h9bGT2.LN/g2e396CT4cQmg3zBqJpAjWKBfFY.LTXwry', '1974-02-04', 'Osun', 'Ifedayo', 'Male', 'Louis', 'Santiago', 'wulubub@gmail.com', '96 North New Street', '08055288484', '2024-07-18 18:54:45'),
(1025, 12, 3, 'AMK/24/3037', 'Jasper', '', 'Roy', '1', '$2y$10$ExVbFKq2BkiigXKkhJscM.46Cdq8n/Zisg5E1iWruwI6VsUjr0DE6', '2021-11-10', 'Kebbi', 'Wasagu Danko', 'Male', 'Ocean', 'White', 'pasesajyb@gmail.com', '95 South Green Old Parkway', '08019889654', '2024-07-18 22:52:57'),
(1026, 15, 3, 'AMK/24/3038', 'Yusuf', '', 'Abdulkadir', '1', '$2y$10$NRpKYiHqA4f1TNtXe/TwYu4rqTuoCS8N3A2T2XL2ybomddaWO641q', '2001-05-25', 'Katsina', 'Rimi', 'Male', 'Abdulkadir', 'Jibrin', 'yusufabdulkadir1514@gmail.com', 'Abukur, Shaiskawa', '09015141557', '2024-07-20 14:06:54'),
(1027, 15, 3, 'AMK/24/3039', 'Beverly', 'Newman', 'Daniel', '1', '$2y$10$yChfThkTN6iQRvupMDF01.E.d8CWZut5jIV7FDxGCXwKciR2JULqu', '1996-11-28', 'Jigawa', 'Kaugama', 'Female', 'Noelle', 'Rich', 'puwipal@gmail.com', '447 West White Cowley Parkway', '08038135163', '2024-07-21 10:02:55'),
(1028, 15, 3, 'AMK/24/3040', 'Beverly', 'Newman', 'Daniel', '1', '$2y$10$T8G6WAA9fsCjQhayYKGhi.H4MlfxRuIcJDMrntWm7rK/JrFG3tQnK', '1996-11-28', 'Jigawa', 'Kaugama', 'Female', 'Noelle', 'Rich', 'puwipal@gmail.com', '447 West White Cowley Parkway', '08038135163', '2024-07-21 10:02:55'),
(1029, 15, 3, 'AMK/24/3041', 'Henry', 'Duffy', 'George', '1', '$2y$10$Bf8AET.Pz2RpHAbfKcchW.360ZgfCYN0g5NhOTT/AJfrO/A41s59O', '1972-03-19', 'Abia', 'Isuikwuato', 'Female', 'Bertha', 'Flowers', 'zywovifapu@gmail.com', '828 North Second Avenue', '08083869945', '2024-07-21 10:03:04'),
(1030, 15, 3, 'AMK/24/3042', 'Patrick', 'Wheeler', 'Wallace', '1', '$2y$10$2EMXZ.CwTcTimIMCVzQSxOgabPsJ3fgngcrhIsVWtP1de0iRkBqgW', '1990-10-21', 'Gombe', 'Balanga', 'Female', 'Garrison', 'Patel', 'qucujeliki@gmail.com', '436 East White First Freeway', '08069916059', '2024-07-21 10:03:12'),
(1031, 15, 3, 'AMK/24/3043', 'Haley', 'Schwartz', 'Murphy', '1', '$2y$10$yZRguxUsEf.L0dZRM.vbw.MBdgw0cCy4aiGFD4VHFukWMkJkyOhJS', '1988-05-17', 'Rivers', 'Ahoada East', 'Female', 'Carly', 'Maxwell', 'cobosowa@gmail.com', '421 Cowley Parkway', '08083733629', '2024-07-21 10:03:19'),
(1032, 15, 3, 'AMK/24/3044', 'Adria', 'Armstrong', 'Landry', '1', '$2y$10$lDkNg1gph2AJgw9X.aFeXOIX18pvCogDEfMen5Urwb6R7tDjeV5w2', '2014-04-01', 'Ogun', 'Ogun Waterside', 'Female', 'Blake', 'Berger', 'qypab@gmail.com', '81 White Clarendon Boulevard', '08068586948', '2024-07-21 10:03:26'),
(1033, 15, 3, 'AMK/24/3045', 'Kibo', 'Ross', 'Copeland', '1', '$2y$10$IjWI3JvxQxFLdPFN2oIYXOOvwW/8Kwxo9LU1BI3k5qknFAj2Dbcme', '1982-10-06', 'Nasarawa', 'Kokona', 'Male', 'Burton', 'Mcguire', 'jaziqam@gmail.com', '19 West Second Street', '08044262529', '2024-07-21 10:03:33'),
(1034, 15, 3, 'AMK/24/3046', 'Hilel', 'William', 'Figueroa', '1', '$2y$10$dXxiCfo6SIn85JWJNAf4oegG4sfLfd.KA465ZMF/wcFmeiempPeqy', '2005-09-05', 'Bayelsa', 'Nembe', 'Male', 'Casey', 'Mcgowan', 'mydaken@gmail.com', '328 Second Boulevard', '08041642746', '2024-07-21 10:03:40'),
(1035, 15, 3, 'AMK/24/3047', 'Harding', 'Jenkins', 'Mckenzie', '1', '$2y$10$RD2o7qS0PJUIaDzkHpEPJO3GyX8el5JRMdco76H8JkHqwaLhkGVOS', '1986-12-20', 'Delta', 'Isoko South', 'Male', 'Hiram', 'Harvey', 'mevybyryki@gmail.com', '180 Cowley Road', '08019336910', '2024-07-21 10:03:48'),
(1036, 15, 3, 'AMK/24/3048', 'Yvette', 'Mcfarland', 'Wilder', '1', '$2y$10$oar1gU2WVW3lIS3z4lzN/eiTldgZpxOkdSc0C2ubk0wSrytNOymDW', '1971-03-06', 'Ekiti', 'Ikere', 'Female', 'Christopher', 'Dorsey', 'kyguv@gmail.com', '820 North Milton Drive', '08039131343', '2024-07-21 10:03:56'),
(1037, 8, 2, 'AMK/24/2021', 'Cailin', 'Wheeler', 'Forbes', '1', '$2y$10$1b5lfVZ8Fhrf/U1l3.Jpqu5vS.pOtsj0VBPqvVkMoTaZqZpmFH1LW', '1991-01-24', 'Borno', 'Abadam', 'Female', 'Vernon', 'Oneil', 'muzami@gmail.com', '377 White Milton Boulevard', '08072545717', '2024-07-21 15:51:58'),
(1038, 5, 1, 'AMK/24/1023', 'Sarah', 'Buckley', 'Melton', '1', '$2y$10$EUSw2fXb13aie.2VzoZD7eI2qs7P1V0fY53M3jk75IZmjA/HMJcVK', '2018-04-26', 'Nasarawa', 'Nasarawa', 'Male', 'Lee', 'Gamble', 'kanu@gmail.com', '222 East Rocky Old Drive', '08068749068', '2024-07-21 15:52:07'),
(1039, 13, 3, 'AMK/24/3049', 'Travis', 'Trevino', 'Fisher', '1', '$2y$10$Tl1hXTvn9WBOTYaJVqB4Xe8APv6glgYyCE2sQMN3Uc.UW2p/Ue3B.', '1983-06-16', 'Yobe', 'Bade', 'Male', 'Gay', 'Harvey', 'nyqol@gmail.com', '346 South Hague Road', '08015621998', '2024-07-21 15:52:12'),
(1040, 12, 3, 'AMK/24/3050', 'Jasper', 'Puckett', 'Rivera', '1', '$2y$10$5kx1sKAN3E3/MGiZy36pkeU7yOk5WuI7eVs5Ik1N7PUaV8iSDqJ0S', '2020-05-20', 'Gombe', 'Nafada', 'Male', 'Gregory', 'Stout', 'kanociz@gmail.com', '73 South Green Old Freeway', '08056323098', '2024-07-21 15:52:18'),
(1041, 15, 3, 'AMK/24/3051', 'Reuben', 'Leon', 'Mcconnell', '1', '$2y$10$.H3NXSKCSLsVrQymBkDHveY1HC33HeoCYgeWu2CF1FAIeSsnVAb2.', '1979-06-25', 'Benue', 'Oturkpo', 'Male', 'Aiko', 'Talley', 'hilisi@gmail.com', '79 South Clarendon Boulevard', '08069313388', '2024-07-21 15:52:45'),
(1042, 12, 3, 'AMK/24/3052', 'Edan', 'Sanders', 'Cook', '1', '$2y$10$6oO2IGM3Pc5X8q4wshnFKek5tnwOKA//5HIjduv5LJu1q/gSTMSMe', '1974-11-25', 'Zamfara', 'Birnin Magaji Kiyaw', 'Male', 'Keith', 'Gay', 'heqad@gmail.com', '29 Clarendon Parkway', '08047473095', '2024-07-21 15:53:15'),
(1043, 1, 1, 'AMK/24/1024', 'Kristen', 'Rush', 'Wright', '1', '$2y$10$XcaheQWndjTD87nuDBvPt.QOiNuIpzMGj6GS9llk8AHGy.FSUGDX.', '1983-03-03', 'Niger', 'Rafi', 'Female', 'Madeson', 'Compton', 'fiporop@gmail.com', '906 Oak Parkway', '08014677518', '2024-07-21 15:53:26'),
(1044, 16, 3, 'AMK/24/3053', 'Adele', 'Robles', 'Mcbride', '1', '$2y$10$WovMw8ruI/OXjsh3ejhVfOjG/Kw7S3d49Zo9a4rXjmPuKTk2l8hJe', '2001-06-15', 'Bayelsa', 'Brass', 'Male', 'Audra', 'Clarke', 'muweb@gmail.com', '64 East Green Nobel Street', '08023235169', '2024-07-21 15:53:34'),
(1045, 13, 3, 'AMK/24/3054', 'Hamish', 'Powers', 'Kirkland', '1', '$2y$10$QYkZb21mX8/sDzt8brutP.w8WPLhhOm6K.lQahhHOCf4nXWb9Ogny', '1987-09-28', 'Jigawa', 'Kazaure', 'Female', 'Jasper', 'Bolton', 'febatoh@gmail.com', '135 Oak Court', '08044327694', '2024-07-21 15:53:40'),
(1046, 5, 1, 'AMK/24/1025', 'Amber', 'Keller', 'Fox', '1', '$2y$10$3BvRwq9GcfCqz9rkUYknlOoj7UeQWcqJd3sImTJeIPj6ZQylKVF7K', '1989-08-22', 'Imo', 'Nwangele', 'Male', 'Alfonso', 'Barrera', 'pirocemat@gmail.com', '84 West White Nobel Avenue', '08043364781', '2024-07-21 15:53:46'),
(1047, 12, 3, 'AMK/24/3055', 'Whoopi', 'Hood', 'Everett', '1', '$2y$10$f7dXyRHBGgfMfRhVyAmb/OYELJZPw0G2tpAkBR89rRrd4hR9gij2W', '2009-06-28', 'Niger', 'Bosso', 'Male', 'Ross', 'Bishop', 'kipelafybu@gmail.com', '24 White Fabien Street', '08053541090', '2024-07-21 15:53:54'),
(1048, 12, 3, 'AMK/24/3056', 'Quin', 'Carter', 'Robinson', '1', '$2y$10$WzGtlLNn2ownFzzQvgRe1OZh2//V0k/pVG1HDNiL/MEjEl0fQ5flC', '2009-04-07', 'Gombe', 'Kwami', 'Female', 'Hamilton', 'Justice', 'wolydiso@gmail.com', '38 Green Old Road', '08052180487', '2024-07-21 15:54:01'),
(1049, 5, 1, 'AMK/24/1026', 'Elizabeth', 'Weiss', 'Hansen', '1', '$2y$10$BtlhCs3Gr/rrWaRIVab7S.BY4ls/krbC.pHL7EK9g.z0f.5EzxnaK', '1980-06-24', 'Nasarawa', 'Wamba', 'Male', 'Isaiah', 'Henson', 'zolyxexu@gmail.com', '943 Fabien Road', '08086895014', '2024-07-21 15:54:08'),
(1050, 7, 2, 'AMK/24/2022', 'Hoyt', 'Donovan', 'Cherry', '1', '$2y$10$xizUJieC5ITGIhjztIvKwe75oX084a6wdMBCBvDeoSkH3gcYUjy1O', '2017-01-29', 'Abia', 'Obi Ngwa', 'Female', 'Wayne', 'Villarreal', 'rojeg@gmail.com', '16 Second Road', '08089444090', '2024-07-21 15:54:13'),
(1051, 12, 3, 'AMK/24/3057', 'Tucker', 'Rodgers', 'Parrish', '1', '$2y$10$tKEy9lc1aHSaeuehACzqW.BjZ92XbhCnLJgTGUl4//LCqY8Juaacu', '1982-04-04', 'Abia', 'Ugwunagbo', 'Female', 'Logan', 'Harrington', 'gagilukan@gmail.com', '753 South Second Extension', '08012733081', '2024-07-21 15:54:19'),
(1052, 24, 7, 'AMK/24/4001', 'Genevieve', 'Barnes', 'Brock', '1', '$2y$10$SMI8l4JVJKQKz2RF21ToX.q3xJOUuieXOIsFhpWxw5IAhidyx4ueq', '2001-11-22', 'Oyo', 'Ibadan North', 'Female', 'Ivana', 'Leonard', 'bivixoj@gmail.com', '949 White Clarendon Street', '08016668337', '2024-07-21 15:54:25'),
(1053, 6, 1, 'AMK/24/1027', 'Teegan', 'Cannon', 'Gallegos', '1', '$2y$10$Yg22lLlnKK5MthhsBqgQaO9y8PPQ9wINIRo7KeWFdAlEUA3QLHFQ.', '2016-07-10', 'Kwara', 'Ifelodun', 'Male', 'Brandon', 'Barton', 'qykoluvy@gmail.com', '169 North Green Nobel Avenue', '08094214175', '2024-07-21 15:54:31'),
(1056, 6, 1, 'AMK/24/1028', 'Bertha', 'Riddle', 'Gilmore', '1', '$2y$10$2/6LfZAN6L1XNro/kqzHwO80wO1K5AcdN52bR9VH/WWx0DwdlGvsq', '2022-11-15', 'Zamfara', 'Chafe', 'Female', 'Lael', 'Cortez', 'vuvuzesi@gmail.com', '376 Green Old Road', '08048897056', '2024-07-21 15:55:24'),
(1057, 6, 1, 'AMK/24/1029', 'Blair', 'Albert', 'Fry', '1', '$2y$10$YFtbGPUuJ2o2nDtSMyauu.jKL6gbaYx8.7OhkiBVeJvNHVb5otTlG', '2018-08-07', 'Anambra', 'Oyi', 'Female', 'Signe', 'Park', 'wafirepi@gmail.com', '352 East Green Second Drive', '08059199132', '2024-07-21 15:55:29'),
(1058, 8, 2, 'AMK/24/2023', 'Gregory', 'Kent', 'Roach', '1', '$2y$10$0.PuhmXOLz3F66kSHLnzoujSkWi4nh402CPvPmFmz06FhTRfmtrL6', '1980-03-13', 'Borno', 'Abadam', 'Female', 'Lani', 'Patton', 'vaqu@gmail.com', '691 Hague Avenue', '08049638154', '2024-07-21 15:55:35'),
(1059, 17, 4, 'AMK/24/4011', 'Winifred', 'Watts', 'Cherry', '1', '$2y$10$KT9zUoHv5chxbAIEZPL32ewGXOkgUYty5wY6TBhJ2I8rD3YDAMFza', '2003-07-23', 'Taraba', 'Wukari', 'Male', 'Micah', 'Bullock', 'lajosi@gmail.com', '760 West Cowley Extension', '08090310410', '2024-07-21 15:55:41'),
(1060, 14, 3, 'AMK/24/3058', 'Shaine', 'Conley', 'Lewis', '1', '$2y$10$5FaxidM9TQ/DPHqrfw65DeB5uNIv89Hv7QybTF7y9hvHDAqXS7KJq', '2010-10-04', 'Ogun', 'Ijebu North', 'Female', 'Wilma', 'Beard', 'pasi@gmail.com', '22 New Parkway', '08059925647', '2024-07-21 15:55:47'),
(1061, 9, 2, 'AMK/24/2024', 'Yvonne', 'Leach', 'Tate', '1', '$2y$10$HjFimyJbFj7fGkk9ZFWOyO1476TstwBuPEXwy0g95knuL2CqP6Vsq', '2005-03-20', 'Ogun', 'Remo North', 'Female', 'Elton', 'Simon', 'sugaluj@gmail.com', '76 Green Milton Parkway', '08048727485', '2024-07-21 15:55:54'),
(1062, 17, 4, 'AMK/24/4012', 'Tiger', 'Ferrell', 'Snyder', '1', '$2y$10$TdeMrRix4AGxAU7LVF8Y3e/K0rBYoFnXZEWgslFcRy9JFR94iInKe', '1992-02-10', 'FCT', 'Municipal Area Council', 'Female', 'Brett', 'Hinton', 'qamiwojici@gmail.com', '52 North First Parkway', '08068830319', '2024-07-21 15:56:07'),
(1063, 18, 4, 'AMK/24/4013', 'Andrew', 'Goodwin', 'Cunningham', '1', '$2y$10$0Ziq8smnmpBmD.8FONe7sOVF8yYLVEIWjXc30ErZDo6b5b2Rdcu12', '2011-06-18', 'Abia', 'Osisioma', 'Female', 'Margaret', 'Robles', 'bugyseru@gmail.com', '21 Milton Court', '08044988257', '2024-07-21 15:56:13'),
(1064, 21, 6, 'AMK/24/4002', 'Neil', 'Lawson', 'Dominguez', '1', '$2y$10$uFs.y5RYcMd5etIsR79j0uFBG8XT437SRRszRzDS/nBVyaBvsjePa', '2009-09-11', 'Gombe', 'Yamaltu-Deba', 'Male', 'Roary', 'Hendrix', 'lehuv@gmail.com', '86 East Fabien Parkway', '08036869597', '2024-07-21 15:56:19'),
(1065, 21, 6, 'AMK/24/4003', 'Aidan', 'Coffey', 'Cross', '1', '$2y$10$ix5LSG8pWG4NX9yYWpiFY.oCVlqRDTfyJzWQcfIn8fCT65PDjMye2', '1977-10-24', 'Anambra', 'Idemili North', 'Male', 'Aquila', 'Clayton', 'holyhetojy@gmail.com', '211 West New Extension', '08086949485', '2024-07-21 15:56:24'),
(1067, 11, 3, 'AMK/24/3059', 'Unity', 'Baird', 'Mayer', '1', '$2y$10$HItnHBuby0Ib1ifb4pztsONZl2GLCmyJbklKLqaTNEEfuBpm0FGN.', '1989-04-21', 'FCT', 'Abaji', 'Male', 'Arthur', 'Dale', 'sejedynacy@gmail.com', '649 Oak Drive', '08018994473', '2024-07-21 15:56:39'),
(1068, 21, 6, 'AMK/24/4004', 'Ahmed', 'Mcfadden', 'Larsen', '1', '$2y$10$BQwmT.FHWBLhXY.mbI6NRu0YFuG375Un3JfE9XJG.IaAoSDqwD/ja', '1976-05-28', 'Kano', 'Dambatta', 'Male', 'Timothy', 'Willis', 'niloborako@gmail.com', '874 Oak Drive', '08069317581', '2024-07-21 15:56:44'),
(1069, 6, 1, 'AMK/24/1030', 'Sigourney', 'Oconnor', 'Ewing', '1', '$2y$10$92iMCUsq8SCVoPEFRfx6y.h9GIntCbETaQDlplyupK.u3/4rou8WS', '1995-01-31', 'Jigawa', 'Kiyawa', 'Male', 'Zia', 'Bond', 'higyqyte@gmail.com', '67 Rocky Old Avenue', '08084232718', '2024-07-21 15:56:50'),
(1070, 8, 2, 'AMK/24/2025', 'Nero', 'Harding', 'Manning', '1', '$2y$10$Y4xdSg/FHLXdT.ng7C0rJeyYzsZIqBmOS3wgMEU9ttSOSgEr2XM4a', '2015-06-20', 'Ebonyi', 'Afikpo North', 'Male', 'Ann', 'Peterson', 'fineqily@gmail.com', '62 Green Nobel Parkway', '08066122569', '2024-07-21 15:57:34'),
(1071, 10, 2, 'AMK/24/2026', 'Hasad', 'Case', 'Henry', '1', '$2y$10$vP1hWbAFZuB87HaMI6qqveJJg9CTSK9c45WoVur3ZVu5Ttb97M9/K', '1985-10-27', 'Borno', 'Kaga', 'Male', 'Martena', 'Baldwin', 'koxal@gmail.com', '665 West White Milton Extension', '08037123330', '2024-07-21 15:57:39'),
(1072, 8, 2, 'AMK/24/2027', 'Nasim', 'Whitaker', 'Frost', '1', '$2y$10$vvtZSrv3UW0fNxex9SetQ.yfV7ERROY2iJaOWHU0.JaMqWN1RO1ji', '1988-11-15', 'Borno', 'Magumeri', 'Female', 'Hope', 'Powers', 'kiqubyvy@gmail.com', '609 South Clarendon Road', '08040897767', '2024-07-21 15:57:45'),
(1074, 17, 4, 'AMK/24/4014', 'Nash', 'Navarro', 'Stephens', '1', '$2y$10$4rEAs0lI3Mgnutu46Cd2Xuy4pxNTKJ4KLC.HKgLa4.cdlq2j7SvO6', '1979-02-13', 'Ogun', 'Odeda', 'Male', 'Jade', 'Conway', 'qosysoze@gmail.com', '55 West Cowley Boulevard', '08098611744', '2024-07-21 15:57:58'),
(1075, 18, 4, 'AMK/24/4015', 'Kiara', 'Townsend', 'Mack', '1', '$2y$10$thyaWyc0iE7VATjbEjoV3OaDv5CVyV8wRGxKGSmQaCM2GuVd30w1e', '2008-09-26', 'Ogun', 'Odogbolu', 'Male', 'Emerald', 'Jimenez', 'magipuwy@gmail.com', '679 Second Avenue', '08093893581', '2024-07-21 15:58:04'),
(1076, 8, 2, 'AMK/24/2028', 'Amery', 'Fry', 'Cantu', '1', '$2y$10$9n0d19b7yML.xKpNFyY4bOCkyB0iIy2qzDHndnNJhXQr1eonlkgb2', '1972-07-03', 'Niger', 'Bida', 'Female', 'Nevada', 'Rowe', 'hafijybu@gmail.com', '794 Rocky New Boulevard', '08046888542', '2024-07-21 15:58:09'),
(1077, 9, 2, 'AMK/24/2029', 'Amethyst', 'Caldwell', 'Matthews', '1', '$2y$10$QH2OLimNBDnNsgDjzYcBcuSSIDSETjGVwSbbdpXlSJlvvq87GSKwu', '2017-11-09', 'Zamfara', 'Bukkuyum', 'Female', 'Maite', 'Spence', 'poga@gmail.com', '100 West Oak Lane', '08025777976', '2024-07-21 15:58:16'),
(1078, 2, 1, 'AMK/24/1031', 'Tana', 'Scott', 'Boone', '1', '$2y$10$mV8cZgbkElUAXl1fg7jca.xrkAO7Iy3X8m8KMACgsHfLAQ9Rd4t8W', '1988-10-23', 'Adamawa', 'Song', 'Female', 'Sylvester', 'Aguilar', 'qohuxus@gmail.com', '67 West Green Milton Boulevard', '08094673750', '2024-07-21 15:58:23'),
(1079, 19, 4, 'AMK/24/4016', 'Cameron', 'Hartman', 'Preston', '1', '$2y$10$LGIGJzLKtjR1kyYZ8xSv8ONviRsIFvAew9ls9BfbHBlO5JBl1ziu2', '1985-10-05', 'Ekiti', 'Ido Osi', 'Female', 'Dane', 'Malone', 'kapama@gmail.com', '31 South White Fabien Street', '08040860628', '2024-07-21 15:58:28'),
(1080, 17, 4, 'AMK/24/4017', 'Jacob', 'Santos', 'Davenport', '1', '$2y$10$ucV60Q/Pq.dGkEHTyDwbweO/VGvrSkD9lXhDwizdLElu99UWbLGcS', '1976-12-22', 'Benue', 'Tarka', 'Male', 'Rinah', 'Mccarty', 'ximu@gmail.com', '662 East White Clarendon Avenue', '08058297594', '2024-07-21 15:58:34'),
(1081, 19, 4, 'AMK/24/4018', 'Blossom', 'Andrews', 'Pruitt', '1', '$2y$10$ThoNF0MmP.jTlpCXDUU09uEBLlv9583hIRegc3yYTkTSdsyhr7MVu', '1999-02-23', 'Nasarawa', 'Nasarawa', 'Male', 'Quinn', 'Kirkland', 'lubin@gmail.com', '697 Green Cowley Court', '08019195783', '2024-07-21 15:58:39'),
(1082, 6, 1, 'AMK/24/1032', 'Joan', 'Kelly', 'Howard', '1', '$2y$10$vzPrTXwSYxJaGkeajtiOHOrdveLSua3JprZX4GyS8RzYuwx.DL7C2', '2017-11-27', 'Taraba', 'Kurmi', 'Female', 'Hanae', 'Peters', 'jiwugufet@gmail.com', '364 East Oak Freeway', '08098928320', '2024-07-21 15:58:47'),
(1083, 13, 3, 'AMK/24/3060', 'Griffin', 'Alvarado', 'Becker', '1', '$2y$10$OJoZnoUY4IsGmisWNrGQXOPombYV3QBBPwk2fH8OLW3KOZQwQZzWW', '1973-09-10', 'Rivers', 'Andoni', 'Male', 'Illiana', 'Burgess', 'rugytoj@gmail.com', '357 West Fabien Avenue', '08044250496', '2024-07-21 15:58:54'),
(1084, 8, 2, 'AMK/24/2030', 'Amena', 'Mooney', 'Elliott', '1', '$2y$10$J3nI0/wFNJkF/oprqDMV5eL4Sc7OSzmAtIb7r5V6iotk2tlxMdkbu', '1998-03-26', 'Cross River', 'Etung', 'Female', 'Eve', 'Booth', 'xidibonimo@gmail.com', '38 East Milton Parkway', '08024910554', '2024-07-21 15:58:58'),
(1085, 11, 3, 'AMK/24/3061', 'Hop', 'Delacruz', 'Garrison', '1', '$2y$10$Ox1RFH1VZMEked9ETDR.Y.ZvymW1XqlqSmi2QuneG498dv1DzR9Fy', '2007-07-10', 'Kaduna', 'Kaduna North', 'Female', 'Nadine', 'Williamson', 'koduxymoty@gmail.com', '450 Fabien Drive', '08011698474', '2024-07-21 15:59:04'),
(1086, 10, 2, 'AMK/24/2031', 'Samantha', 'Walsh', 'Pate', '1', '$2y$10$gtxJISpMju56BrhagCdkE.56554RG7XVbAZ1wrLXeAERm06vr4kQ2', '1978-07-09', 'Zamfara', 'Talata Mafara', 'Male', 'Perry', 'Duncan', 'nuvud@gmail.com', '246 New Freeway', '08023381233', '2024-07-21 15:59:12'),
(1087, 5, 1, 'AMK/24/1034', 'Jarrod', 'Stuart', 'Ramsey', '1', '$2y$10$3UA9UdN/p1aVec7z/6O6juR0nyDbgfRGn.p1LIPiuPvoSmJ3TtM4.', '1973-05-10', 'Gombe', 'Gombe', 'Female', 'Ethan', 'Strong', 'teke@gmail.com', '113 Clarendon Street', '08016521182', '2024-07-21 15:59:22'),
(1088, 13, 3, 'AMK/24/3062', 'Bert', 'Giles', 'Anthony', '1', '$2y$10$D3g19bXmWUcIxypJK3AmduzVjRWvC9hdGDZnFXYePAAU6Ycd0jZxC', '2000-09-21', 'Jigawa', 'Gwiwa', 'Male', 'Leroy', 'James', 'nylah@gmail.com', '928 North White Second Boulevard', '08097988697', '2024-07-21 15:59:27'),
(1089, 10, 2, 'AMK/24/2032', 'Craig', 'Cooke', 'Griffith', '1', '$2y$10$EwmIXwGsszMaq4A2rsja/u9VSyPUTfs5QcBzYWDKfmDXHqTlXGViS', '1989-03-12', 'Bauchi', 'Zaki', 'Female', 'Zenia', 'Kirk', 'hytebeku@gmail.com', '81 White Cowley Lane', '08019361374', '2024-07-21 16:01:16'),
(1090, 15, 3, 'AMK/24/3063', 'Orlando', 'Holland', 'Hopkins', '1', '$2y$10$MKMoYN448Aeb5XGhDu3hA.KMefmsT6Pbt6PtdUdIzLchIAgSgYkSK', '1992-08-14', 'Kano', 'Kano Municipal', 'Female', 'Vanna', 'Rivera', 'pomoruhav@gmail.com', '444 West Second Street', '08082819048', '2024-07-21 16:01:22'),
(1091, 2, 1, 'AMK/24/1036', 'Hiroko', 'Obrien', 'Wong', '1', '$2y$10$ikIMPB4Kh7uubqOkdSf1xuXHuOGnNvTiDc.EWNGrR60ihKJxLBvda', '1973-10-30', 'Yobe', 'Fika', 'Female', 'Hayfa', 'Hughes', 'heboco@gmail.com', '57 East First Avenue', '08049384728', '2024-07-21 16:01:27'),
(1092, 5, 1, 'AMK/24/1037', 'Emerson', 'Rodriquez', 'Hodge', '1', '$2y$10$vWZCXm2b29ueH5mCv5YMru5X1bkCZQWssY6SxAg/VR.vThRYRDzhe', '1978-11-28', 'Lagos', 'Eti Osa', 'Male', 'Dorian', 'Farley', 'xadako@gmail.com', '85 East Clarendon Road', '08047579640', '2024-07-21 16:01:33'),
(1093, 7, 2, 'AMK/24/2033', 'Wendy', 'Gallagher', 'Park', '1', '$2y$10$WUQCcTiGpo.XkKJaRJFeEOD5fTL4Q5LayfFTG5zw4H8Biqkxr2kOa', '2005-10-04', 'Adamawa', 'Numan', 'Female', 'Rylee', 'Williams', 'jole@gmail.com', '607 Milton Street', '08039594812', '2024-07-21 16:01:38'),
(1094, 14, 3, 'AMK/24/3064', 'Marvin', 'Irwin', 'Hinton', '1', '$2y$10$FcZNGCElmtlZLqzw7/Dk3.Oa0R00g/JIEN.mTa2kLqAy8DIZspwXm', '1977-04-01', 'Benue', 'Buruku', 'Female', 'Wing', 'Montgomery', 'hujo@gmail.com', '881 Green Hague Drive', '08039679314', '2024-07-21 16:01:44'),
(1095, 17, 4, 'AMK/24/4019', 'Edan', 'Mcneil', 'Leblanc', '1', '$2y$10$IwuqjCZ3lmoCGCmYSszgturytsEW/cWP7TFaWzytIPOJNBM.XzCGy', '1983-04-25', 'Taraba', 'Zing', 'Male', 'Leila', 'Craig', 'zoquwyz@gmail.com', '258 Hague Court', '08091253013', '2024-07-21 16:01:50'),
(1096, 16, 3, 'AMK/24/3065', 'James', 'Mcfadden', 'Moreno', '1', '$2y$10$1sj9oOnbTcF5Qrth.Y9DEeNU3uuL8G5yaa9o4YSzAoLDBeY3wjBDO', '2009-11-13', 'Niger', 'Bosso', 'Male', 'September', 'Savage', 'kupenizehe@gmail.com', '697 Hague Freeway', '08018780786', '2024-07-21 16:01:55'),
(1097, 19, 4, 'AMK/24/4020', 'Blossom', 'Salas', 'Whitney', '1', '$2y$10$gNezz6xpN6wepKIGOKZ9tezsvS0KlFoTuPgrsHRvNLqMplAqEWEfO', '2017-06-13', 'FCT', 'Gwagwalada', 'Male', 'Lillian', 'Tran', 'vupy@gmail.com', '389 Hague Boulevard', '08040332779', '2024-07-21 16:02:00'),
(1098, 8, 2, 'AMK/24/2034', 'Steel', 'Steele', 'Leonard', '1', '$2y$10$b3tkz8ZfGUk4HRmMt6J3H.ZFZqXooFhwqwTv30HS2cIhb7v8iWRbi', '1973-02-27', 'Borno', 'Gwoza', 'Female', 'Theodore', 'Mcfadden', 'tymyjekeb@gmail.com', '780 South First Parkway', '08092699624', '2024-07-21 16:02:05'),
(1099, 11, 3, 'AMK/24/3066', 'Steven', 'Harrington', 'Pickett', '1', '$2y$10$HjMu.nECMlJepJgdcl6ys.QcqF9i4Ec.KLIzmRLzxFbnQvEYTXN8C', '1975-06-30', 'Anambra', 'Awka North', 'Female', 'Simon', 'Castillo', 'dyvyrikik@gmail.com', '955 East Second Street', '08065483969', '2024-07-21 16:02:10'),
(1100, 5, 1, 'AMK/24/1038', 'August', 'Leonard', 'Pruitt', '1', '$2y$10$qlzlVGHAriz.C4Zt7SjimeoTNgRR7g2Wx5OrNA6LId3CNJNp1JBw.', '1985-04-05', 'Oyo', 'Itesiwaju', 'Male', 'Rhea', 'Murray', 'fytyzo@gmail.com', '700 Green Nobel Court', '08033271727', '2024-07-21 16:02:17'),
(1101, 12, 3, 'AMK/24/3067', 'Kirby', 'Sparks', 'Morris', '1', '$2y$10$Lmd141XCq7RTPKFhm0ZQse/krmnDRRP3Igb4qS6ojF/G8PKi39XiG', '2017-01-27', 'Yobe', 'Machina', 'Male', 'Mikayla', 'Haley', 'madyhisoz@gmail.com', '41 White Milton Lane', '08080514753', '2024-07-21 16:02:21'),
(1102, 14, 3, 'AMK/24/3068', 'Angela', 'Hubbard', 'Mclaughlin', '1', '$2y$10$3tqad8r53s.m6QYdSz06t.ctPr..nEWlK.85/EqgN16mf3b04eEaq', '1971-02-06', 'Kogi', 'Olamaboro', 'Female', 'Candice', 'Hess', 'jytogo@gmail.com', '344 Fabien Drive', '08037879142', '2024-07-21 16:02:26'),
(1103, 14, 3, 'AMK/24/3069', 'Serena', 'Whitney', 'Frederick', '1', '$2y$10$P3Z.8kQWJqGaWjcYbE167.lSDaeXPsLofx/sHHcUgl30ZchEkbI9C', '2017-10-25', 'Kwara', 'Isin', 'Female', 'Lillith', 'Gentry', 'duhiwijofa@gmail.com', '886 East Nobel Drive', '08015956237', '2024-07-21 16:02:31'),
(1104, 7, 2, 'AMK/24/2035', 'Tad', 'Yang', 'Sparks', '1', '$2y$10$noQh04iYun5zS9tcNijARes6T0TQcIH4LTO4NjrCMpGYGSxZIdme6', '1973-06-18', 'Bauchi', 'Warji', 'Female', 'Guinevere', 'Hayes', 'nomijysoju@gmail.com', '630 West Clarendon Extension', '08070589487', '2024-07-21 16:02:36'),
(1105, 4, 1, 'AMK/24/1039', 'Bevis', 'Erickson', 'Watkins', '1', '$2y$10$tq/vv9Lk.p7/XYvPQIl79.H9mII3MWGD4RUZKee4erFm1L033feaa', '1997-02-16', 'Zamfara', 'Bukkuyum', 'Female', 'Nathaniel', 'Haley', 'guvy@gmail.com', '10 First Road', '08089670594', '2024-07-21 16:02:42'),
(1106, 4, 1, 'AMK/24/1040', 'Haley', 'Morgan', 'Vargas', '1', '$2y$10$SlCOD9TV6lNE.WrcF5zF7O39iekvJr5MYd8nag1VdtdiRIwamNV0G', '2024-03-06', 'Zamfara', 'Anka', 'Female', 'Hollee', 'Middleton', 'jyco@gmail.com', '94 West Hague Parkway', '08094143931', '2024-07-21 16:02:46'),
(1107, 2, 1, 'AMK/24/1041', 'Lucius', 'Dorsey', 'Lewis', '1', '$2y$10$rTf1tTRxgJJLN//orIWEx.LJRjRXhKHEnVa00N97Op6KGhyRy/ixO', '1984-06-08', 'Ekiti', 'Ilejemeje', 'Female', 'Dexter', 'Schroeder', 'sajaqoge@gmail.com', '40 Rocky Cowley Freeway', '08017832179', '2024-07-21 16:02:51'),
(1108, 21, 6, 'AMK/24/4005', 'Lucius', 'Day', 'Lancaster', '1', '$2y$10$dAJN3g1rPqJ48v/58uxc5.LD7jgKaSlxOx/jTXPmQifpi8M8J5pJi', '2009-03-03', 'Kano', 'Garko', 'Female', 'Carter', 'Cochran', 'qutev@gmail.com', '105 Milton Drive', '08092613491', '2024-07-21 16:02:57'),
(1110, 10, 2, 'AMK/24/2036', 'Zachary', 'Arnold', 'Wolfe', '1', '$2y$10$LajueAbaKHHhwpwl9lwz3udihlCij3jUbEck7oOaiokY1dmvN2cG2', '1988-10-10', 'Ekiti', 'Gbonyin', 'Female', 'Aimee', 'Sullivan', 'gidibiwo@gmail.com', '43 East Second Street', '08062337280', '2024-07-21 16:03:12'),
(1111, 7, 2, 'AMK/24/2037', 'Lillian', 'Ortega', 'Duncan', '1', '$2y$10$3mGyBNImGrqQc9GW.m9ySuk/6bAlzPpVU0WeponmNFvaKGr/FzR.6', '1999-10-08', 'Sokoto', 'Gada', 'Female', 'Rebecca', 'Bates', 'lygubu@gmail.com', '334 Rocky First Boulevard', '08046933885', '2024-07-21 16:03:18'),
(1112, 21, 6, 'AMK/24/4006', 'Chastity', 'Mcintosh', 'Nielsen', '1', '$2y$10$9JxLjYORwyYVGViXgQXjEuy20cCCjvQWXpLh1n6hKT2Z.1rtNfLCa', '2010-06-25', 'Enugu', 'Ezeagu', 'Female', 'Desirae', 'Ewing', 'buzyv@gmail.com', '438 Rocky Milton Parkway', '08083669260', '2024-07-21 16:03:24'),
(1113, 11, 3, 'AMK/24/3070', 'Madeson', 'Roach', 'Henson', '1', '$2y$10$S8fea2AletS85qdqyPzvcuCWpW/PK.a2yy68mkfvK0QDEBFxx2mSS', '1997-03-16', 'Adamawa', 'Toungo', 'Female', 'Hanae', 'Gilmore', 'vabuki@gmail.com', '918 East White Milton Court', '08042622214', '2024-07-21 16:03:29'),
(1114, 3, 1, 'AMK/24/1042', 'Theodore', 'Dodson', 'Murphy', '1', '$2y$10$j1P6PSFaX8Ae01gRsiD97eZ2rQxA7uMqGecOjsDDWKI4HtqR4jnMO', '1991-02-14', 'Nasarawa', 'Nasarawa Egon', 'Male', 'Karleigh', 'Velez', 'jane@gmail.com', '81 Rocky Clarendon Parkway', '08010935755', '2024-07-21 16:03:39'),
(1115, 5, 1, 'AMK/24/1043', 'Channing', 'Tyler', 'Best', '1', '$2y$10$0DjWiS.ddbnSD1BVDunxq.Fmg9G1Suvzw2pN2wYKzJrHDpPZPzy2O', '1988-11-30', 'Benue', 'Gwer East', 'Male', 'Dylan', 'Tyson', 'cepyp@gmail.com', '921 South Milton Boulevard', '08058773942', '2024-07-21 16:03:45'),
(1116, 6, 1, 'AMK/24/1044', 'Melanie', 'Butler', 'Gibbs', '1', '$2y$10$ToFAO5p4bnQ/DgN0fPNYIuiQyMH8eTdpHMHJ1DgqGbeyzA9IAUdAO', '1997-10-15', 'Imo', 'Isiala Mbano', 'Male', 'Angelica', 'Barrera', 'qegunegom@gmail.com', '64 White Hague Lane', '08048613533', '2024-07-21 16:03:50'),
(1118, 2, 1, 'AMK/24/1045', 'Talon', 'Fuentes', 'Guy', '1', '$2y$10$2mYX69hvm/L.Hk3ZYhC13u0Nolj8VJPjsNhPAQPIiIOkxgj9lNmnm', '2022-09-30', 'Ebonyi', 'Ikwo', 'Female', 'Cora', 'Waller', 'done@gmail.com', '96 South Oak Freeway', '08013672046', '2024-07-21 16:04:13'),
(1119, 1, 1, 'AMK/24/1046', 'Kevin', 'Drake', 'Owen', '1', '$2y$10$YL7nAqWTpZC8InFJXFoJiuqfPkFRcEdtm8ajkrikEFjAGnCobsBDi', '1978-06-11', 'Gombe', 'Billiri', 'Male', 'Blossom', 'Graves', 'xysy@gmail.com', '709 East Nobel Boulevard', '08026879339', '2024-07-21 16:37:19'),
(1120, 1, 1, 'AMK/24/1047', 'Randall', 'Estrada', 'Mcgowan', '1', '$2y$10$DpBW6vGGobUC2m9Y9CNdteT4duteaO6/rhuXwoTeV3YLv2maVhmrW', '2022-07-24', 'Abia', 'Ugwunagbo', 'Female', 'Zenaida', 'Kane', 'hafasynex@gmail.com', '15 South White New Boulevard', '08056565755', '2024-07-21 16:37:28'),
(1121, 1, 1, 'AMK/24/1048', 'Xyla', 'Vaughan', 'Mcmillan', '1', '$2y$10$rAQSQ1ypsKGZ.C9c9ZGwbONZ/3ZFZ.IDf9P2uavQWZ.2RVs9kwo4.', '1992-04-23', 'Oyo', 'Atisbo', 'Female', 'Marcia', 'Sawyer', 'niwyzy@gmail.com', '949 West Second Lane', '08048840562', '2024-07-21 16:37:39'),
(1122, 1, 1, 'AMK/24/1049', 'Xander', 'Carter', 'Gentry', '1', '$2y$10$5Zn7S3GeuarRO5WROeXQM.DXkDEPXW8igWAEq7yJvq5aC5Fak145W', '1980-01-04', 'Nasarawa', 'Toto', 'Male', 'Aretha', 'Mcleod', 'qydaj@gmail.com', '46 Hague Parkway', '08010890396', '2024-07-21 16:37:48'),
(1123, 1, 1, 'AMK/24/1050', 'Petra', 'Tyler', 'England', '1', '$2y$10$wJfvbTsjHxVHo4ogUXE05.WmxWCaz96mGMxqtNJ2gckkS4cJNQPXC', '2007-01-14', 'Kaduna', 'Soba', 'Female', 'Hedda', 'Underwood', 'docinon@gmail.com', '94 White Nobel Boulevard', '08027272719', '2024-07-21 16:37:58'),
(1124, 3, 1, 'AMK/24/1051', 'Anika', 'Shannon', 'Pace', '1', '$2y$10$sSbLFAXxRXI.k1MiqEIvgeeWoYcaZrTUOkRKLclcxvIiGVNUFbegC', '2010-05-02', 'Ebonyi', 'Ohaukwu', 'Female', 'Steven', 'Luna', 'wupymoqyq@gmail.com', '76 North Nobel Drive', '08067357022', '2024-07-21 16:38:08'),
(1125, 17, 4, 'AMK/24/4021', 'Ferris', 'Drake', 'Callahan', '1', '$2y$10$SqSBTEzmUK9DkyWx7F2iteLCUp2/zx5WQxL.s397soMO3an4xgYaa', '2014-06-23', 'Edo', 'Ovia South-West', 'Female', 'Connor', 'English', 'karid@gmail.com', '32 North Milton Road', '08019266273', '2024-07-21 16:38:16'),
(1126, 16, 3, 'AMK/24/3072', 'Latifah', 'Dixon', 'Lowe', '1', '$2y$10$AmZId7XF7I/dTO2XBvwPZO2zzeLT8IsBVvRqyk5jX4I.YIMtgtBI6', '1975-06-30', 'Adamawa', 'Mubi South', 'Male', 'Kimberly', 'Montgomery', 'jujig@gmail.com', '97 North Rocky Fabien Parkway', '08088973487', '2024-07-21 16:38:26'),
(1127, 3, 1, 'AMK/24/1052', 'Kylynn', 'Vaughn', 'Lynch', '1', '$2y$10$QW4bBwbYCzoWaFEj0ObikuIDEFWk1icYXTTjwHXx4ttztZxMk7vIe', '1984-06-26', 'Adamawa', 'Michika', 'Female', 'Peter', 'Reilly', 'seras@gmail.com', '59 Nobel Boulevard', '08076434153', '2024-07-21 16:38:33'),
(1129, 1, 1, 'AMK/24/1053', 'Aspen', 'Park', 'Rocha', '1', '$2y$10$Biuq5T99GbuF9FjOotUaRO2eJnHi2qik0HSUVUdyxNAau2UA6.A6e', '1998-10-02', 'FCT', 'Kwali', 'Female', 'Georgia', 'Owens', 'syduhiceg@gmail.com', '142 North Old Boulevard', '08021614914', '2024-07-21 16:39:01'),
(1131, 22, 7, 'AMK/24/4007', 'Yuri', 'Moreno', 'Gaines', '1', '$2y$10$1CFOS6w6HakdoCi1v0FACeV1pH1SIDHmpWf30vfPauMhHEPOsauSa', '2008-08-01', 'Niger', 'Paikoro', 'Female', 'Octavia', 'Kent', 'soxyce@gmail.com', '29 North Rocky Second Road', '08042948774', '2024-07-21 16:39:24'),
(1133, 7, 2, 'AMK/24/2038', 'Adara', 'Leach', 'Lindsay', '1', '$2y$10$12kih36Va3OlOVQGL6LnI.oBA1.wkW/lE1O.2oqvXjQdND4YKzmoO', '1986-12-09', 'Imo', 'Isu', 'Male', 'Brynne', 'Hooper', 'tixafavi@gmail.com', '677 Hague Boulevard', '08073829443', '2024-07-21 16:39:44'),
(1134, 14, 3, 'AMK/24/3073', 'Rudyard', 'Decker', 'Lee', '1', '$2y$10$GSNuJwnjNrTKifb9jLK7w.9cu6IeWBwp.4bHbwXTVaU2nB16IBYky', '2024-02-18', 'Cross River', 'Etung', 'Female', 'Dominique', 'Fry', 'xohytexi@gmail.com', '88 East First Extension', '08061492794', '2024-07-21 16:41:16'),
(1138, 17, 4, 'AMK/24/4022', 'Preston', 'Martinez', 'White', '1', '$2y$10$Oq5cgzYB0f5OIM0U.q0wOeoRC7nfJGaDZ37v5mHszuL2XS7uguLj.', '2013-03-05', 'Yobe', 'Jakusko', 'Female', 'Bernard', 'Ellis', 'fecove@gmail.com', '40 Cowley Avenue', '08019334891', '2024-07-21 16:44:19'),
(1139, 18, 4, 'AMK/24/4023', 'Dora', 'Morse', 'Duke', '1', '$2y$10$QyQDX9PIQ3hY8R0nZ8vCdOIKLvfOF4d9C655Jn07KvZ2AorjK6lX6', '2004-01-24', 'Plateau', 'Bokkos', 'Female', 'Lesley', 'Melendez', 'nugypuqo@gmail.com', '493 Second Freeway', '08072790662', '2024-07-21 16:44:26'),
(1140, 19, 4, 'AMK/24/4024', 'Wayne', 'Mcgee', 'Nielsen', '1', '$2y$10$6jmD1ljqfrLDLk3JQ0x8BuJHWW0PIOjKjwDCmrgjYPAPwHcka7PKW', '1976-01-02', 'Jigawa', 'Guri', 'Female', 'Morgan', 'Bonner', 'limesav@gmail.com', '70 Fabien Extension', '08050630236', '2024-07-21 16:44:37'),
(1141, 19, 4, 'AMK/24/4025', 'Shay', 'Christensen', 'Pierce', '1', '$2y$10$uGvO0stsnmoLThshFW1eH.zekwqCzdr1TdbA9Tb/E2OZV7AoSepq.', '2010-01-08', 'Adamawa', 'Fufure', 'Male', 'Aline', 'Bradley', 'doget@gmail.com', '608 West Rocky Clarendon Drive', '08074933159', '2024-07-21 16:44:44'),
(1142, 16, 3, 'AMK/24/3074', 'Danielle', 'Brennan', 'Mcclure', '1', '$2y$10$keZkLWbHTaKJwmcP.5B12.CAYFvOSiKXjCaHx4jsDn5/1a6lwdYuG', '1998-03-20', 'Taraba', 'Ussa', 'Female', 'Dorothy', 'Wiggins', 'vysojaju@gmail.com', '72 Rocky Cowley Road', '08030983946', '2024-07-21 16:44:57'),
(1143, 16, 3, 'AMK/24/3075', 'Teegan', 'Byers', 'Collins', '1', '$2y$10$FG84Y1LG5VA6VIBVBRZCNuOmU/jaqrkpToD.IgPXEAQ.1LfdUfsVe', '1977-08-11', 'Kano', 'Albasu', 'Female', 'David', 'Ford', 'kyditudi@gmail.com', '47 Hague Road', '08096381526', '2024-07-21 16:45:07'),
(1144, 16, 3, 'AMK/24/3076', 'Rajah', 'Rhodes', 'Wolfe', '1', '$2y$10$cKc4S1BxxQmKATUHdevwXuMmr0PBxzxD27LTJKwYQnLKZR8H5pIN6', '1972-11-16', 'Kwara', 'Asa', 'Male', 'Imani', 'Mccarty', 'wumygaq@gmail.com', '29 West Second Freeway', '08057856845', '2024-07-21 16:45:14'),
(1145, 16, 3, 'AMK/24/3077', 'Veda', 'Frazier', 'Adams', '1', '$2y$10$U.7Sh6HJkf8b.5UlLy9WI.S1qtvSnRnEDIy98F4hIN9e8pgl4P9b.', '1992-10-13', 'Anambra', 'Anaocha', 'Female', 'Fritz', 'Higgins', 'muwiqijape@gmail.com', '489 North Rocky New Extension', '08071278254', '2024-07-21 16:45:20'),
(1146, 16, 3, 'AMK/24/3078', 'Flynn', 'Lane', 'Barr', '1', '$2y$10$I5Ns2nqJoYrRzbfKgkrb1uuOvkZdpgEoD0UeIWH6JUw5QKQWs8AZu', '2011-01-14', 'Kogi', 'Igalamela Odolu', 'Male', 'Steel', 'Gregory', 'jupo@gmail.com', '74 East Green First Court', '08068699661', '2024-07-21 16:45:28'),
(1147, 3, 1, 'AMK/24/1054', 'Erich', 'Leon', 'Skinner', '1', '$2y$10$FuTLT8t0cczOLFaRvE25GeH7Fp/9S34u9z4S42V3Thy3vWAa7gXny', '1994-12-16', 'Benue', 'Vandeikya', 'Male', 'Wallace', 'Key', 'wojuziw@gmail.com', '75 Oak Street', '08073796212', '2024-07-21 16:45:39'),
(1148, 9, 2, 'AMK/24/2039', 'Octavia', 'Ewing', 'Duffy', '1', '$2y$10$./Zq6o49o/nXkHB4US4Kc.b99iol2c/VZZzhwl3kn8fDiPK2e7N6C', '1984-05-06', 'Bayelsa', 'Sagbama', 'Male', 'Nayda', 'Bartlett', 'xojijahad@gmail.com', '36 East Second Drive', '08090338244', '2024-07-21 16:45:45'),
(1149, 3, 1, 'AMK/24/1055', 'Britanni', 'Bates', 'Rowe', '1', '$2y$10$BM0mGReMG0kvyQ2M6RxlaukYTYJd8q96Bf0V0Y.ZrPg/O439UdBJi', '1991-09-09', 'Imo', 'Okigwe', 'Male', 'Shafira', 'Russell', 'qelot@gmail.com', '14 South Clarendon Freeway', '08014625057', '2024-07-21 16:45:54'),
(1150, 9, 2, 'AMK/24/2040', 'Latifah', 'Harding', 'Fields', '1', '$2y$10$uVXyVSeVV6Ai1OjvT6DbLOWlvlvtp4MhrZGqTLZ6I5hGwfiKRwcSy', '1979-01-30', 'Ogun', 'Imeko Afon', 'Female', 'Tucker', 'Nolan', 'zobavefi@gmail.com', '391 South Green Fabien Extension', '08047692593', '2024-07-21 16:46:00'),
(1151, 7, 2, 'AMK/24/2041', 'Zahir', 'Carney', 'Black', '1', '$2y$10$QVC4lGxBfqrj.RpyNsx2GuVv8U3oazXJcApR1XIldMpuBFeBPwKVO', '2019-04-05', 'Jigawa', 'Babura', 'Female', 'Upton', 'Goodman', 'temym@gmail.com', '179 Second Extension', '08034966934', '2024-07-21 16:46:09'),
(1153, 3, 1, 'AMK/24/1056', 'Steven', 'Velez', 'Craig', '1', '$2y$10$BPVPs.Iuqgcj216QRJVHee53DcAG9/n18X/RwFGV8Tqx4z5HwHA4a', '1982-02-09', 'Abia', 'Umu Nneochi', 'Male', 'Haviva', 'Bryan', 'lotisev@gmail.com', '15 Old Extension', '08042667748', '2024-07-21 16:46:27'),
(1154, 3, 1, 'AMK/24/1057', 'Kaden', 'Kirby', 'Moody', '1', '$2y$10$/pMd3bRUCc7laOiF4edqpugYZgE28XwClcRtd38pVQzSjpNObBvFu', '1995-10-21', 'Ondo', 'Ile Oluji-Okeigbo', 'Female', 'Donna', 'Gallagher', 'fuqobiqub@gmail.com', '303 Oak Lane', '08033518957', '2024-07-21 16:46:35'),
(1155, 1, 1, 'AMK/24/1058', 'Nicholas', 'Delgado', 'Olsen', '1', '$2y$10$gP6KDTNDDjpTT4BPQT6L8etrpgTQgXv3EvM.SNrb.iFBTnOMANcCa', '1998-12-14', 'Kebbi', 'Argungu', 'Male', 'Marny', 'Pope', 'qixony@gmail.com', '50 Cowley Court', '08015949216', '2024-07-21 16:46:48'),
(1156, 1, 1, 'AMK/24/1059', 'Clementine', 'Tucker', 'Beard', '1', '$2y$10$p0o0skAvXUEcBW9MPfLKcOpv6Mxcj/YoLGin4naOM/FyoxkyKWw9G', '2007-04-07', 'Lagos', 'Ikorodu', 'Female', 'Yoshio', 'Vega', 'pocul@gmail.com', '229 Oak Boulevard', '08098529736', '2024-07-21 16:46:58'),
(1157, 1, 1, 'AMK/24/1060', 'Bethany', 'Tyson', 'Kemp', '1', '$2y$10$a7WdfpgBEBWQ4RNSW2pN4u9iMkzq1P2KFgQfrIVpkKzozE0gYN7Yi', '2004-02-10', 'Kaduna', 'Makarfi', 'Male', 'Brady', 'Burt', 'qagopiril@gmail.com', '50 East White First Lane', '08065391936', '2024-07-21 16:47:05'),
(1158, 1, 1, 'AMK/24/1061', 'Blair', 'Sellers', 'Buchanan', '1', '$2y$10$u6CveUboNX5uq5muuWblyubdsjTpUxbrvV8.3OfvuddSWC94k4aYC', '1972-07-06', 'Borno', 'Bayo', 'Male', 'Uriel', 'Owen', 'nyzutu@gmail.com', '19 East First Avenue', '08036329851', '2024-07-21 16:47:19'),
(1159, 1, 1, 'AMK/24/1062', 'Liberty', 'Fitzpatrick', 'Love', '1', '$2y$10$n6eOMnWjHZOlEzzdJQqfAOguEAH/6kxk0ecQuqvu2VS58BxhCptl6', '1988-10-10', 'Sokoto', 'Gwadabawa', 'Male', 'Kuame', 'Good', 'likipi@gmail.com', '44 First Road', '08035640417', '2024-07-21 16:47:29'),
(1160, 3, 1, 'AMK/24/1064', 'Drew', 'Russo', 'Mccullough', '1', '$2y$10$VkdW9PzWy8mQPXubAn830OW703QkUXYl7e/DKASCkMDpdLeaRkyqm', '2009-02-25', 'Kaduna', 'Kaura', 'Male', 'Amaya', 'Kerr', 'wakub@gmail.com', '483 East New Avenue', '08039292465', '2024-07-21 16:47:52'),
(1161, 3, 1, 'AMK/24/1065', 'Tamara', 'Monroe', 'Cross', '1', '$2y$10$LBaq4W/osVpLkBXhupZpeON4wZyELuX//i.7AeBl0e/QIFnUUst56', '1986-10-18', 'Ebonyi', 'Afikpo South', 'Male', 'Wylie', 'May', 'mulyg@gmail.com', '97 Rocky Cowley Street', '08081739696', '2024-07-21 16:47:59'),
(1162, 3, 1, 'AMK/24/1066', 'Raphael', 'David', 'Gould', '1', '$2y$10$5SIm9W/0Nxw9aODBPxc4quwAjbhCD7AD3AaDOqlHahVDpcoGgJxqm', '1981-04-24', 'Anambra', 'Awka South', 'Female', 'Shad', 'Hammond', 'dosoci@gmail.com', '71 Rocky Clarendon Boulevard', '08028324672', '2024-07-21 16:48:10'),
(1163, 3, 1, 'AMK/24/1067', 'Ainsley', 'Terrell', 'Higgins', '1', '$2y$10$2zM1QFtxirObfvhZxtzXOuhZbM3htKFCnLSLPdHOPC3Ts5eTovmva', '2000-11-12', 'Niger', 'Katcha', 'Female', 'Glenna', 'Weeks', 'setidin@gmail.com', '748 Milton Lane', '08019452243', '2024-07-21 16:48:18'),
(1164, 15, 3, 'AMK/24/3079', 'Aiko', 'Holloway', 'Sweet', '1', '$2y$10$OtQ9r6SY69Pup0TmHCxbZO1nscuAQMjPZWcgIlh3huwD1BwOUj2lO', '1989-11-23', 'Osun', 'Ifedayo', 'Male', 'Yoshi', 'Joyner', 'kisoniz@gmail.com', '71 Rocky Clarendon Parkway', '08097787246', '2024-07-21 16:48:26'),
(1165, 16, 3, 'AMK/24/3080', 'Dara', 'Hodge', 'Santiago', '1', '$2y$10$QKsgVginwhokVRMzI2Kwleeq4u0RiTDKj/lIXs5wzmQWhjEYsnOFq', '2006-11-03', 'Benue', 'Ukum', 'Female', 'Brielle', 'Montoya', 'careveg@gmail.com', '962 Green Oak Lane', '08010635293', '2024-07-21 16:48:34'),
(1166, 15, 3, 'AMK/24/3081', 'Alexa', 'Hensley', 'Lowery', '1', '$2y$10$rIhhHMAsL6qQ8WIEzSIzv..C5GbAWegZeGKz1N4WYvpFeWoFR1Dqy', '2008-04-19', 'Kaduna', 'Birnin Gwari', 'Female', 'Kay', 'Reyes', 'xegul@gmail.com', '397 Nobel Road', '08078384210', '2024-07-21 16:48:42'),
(1167, 15, 3, 'AMK/24/3082', 'Geoffrey', 'Jarvis', 'Bond', '1', '$2y$10$ieWm/mTWJL1GMmpo.iCAz.KjPhRBtbYVa1CMPZlfAGv1YQfDR/NhW', '1985-07-12', 'Kano', 'Dala', 'Male', 'Adrienne', 'Leblanc', 'bomixet@gmail.com', '419 Rocky Fabien Freeway', '08074238648', '2024-07-21 16:48:49'),
(1168, 19, 4, 'AMK/24/4026', 'Luke', 'Haney', 'Cunningham', '1', '$2y$10$1oYoI0XZs705cNCUeW.mCujICVyxX69t5e00ugBMTYm4gxdczIDly', '1979-08-10', 'Delta', 'Patani', 'Female', 'Jana', 'Wolfe', 'qulogeliqu@gmail.com', '714 Clarendon Boulevard', '08077780676', '2024-07-21 16:48:56'),
(1169, 19, 4, 'AMK/24/4027', 'Sade', 'Johnston', 'Gould', '1', '$2y$10$IHVo9S2cv7/i0RW2uRV1GOa8KArea4Pg07.ThMpo/b615jlYWgpCe', '2013-12-16', 'Kogi', 'Ofu', 'Female', 'Darryl', 'Robles', 'votujig@gmail.com', '722 Cowley Extension', '08088895881', '2024-07-21 16:49:03'),
(1170, 19, 4, 'AMK/24/4029', 'Xaviera', 'Hampton', 'Mckay', '1', '$2y$10$XePZ8reJs8CcCiyc9Uwi/OqVyLKnPXbMc35fOMJIgsMLJSaQtAm7S', '1972-12-21', 'Ekiti', 'Ekiti East', 'Female', 'Kelsie', 'Hayden', 'sugil@gmail.com', '92 Hague Street', '08030151348', '2024-07-21 16:49:17'),
(1173, 13, 3, 'AMK/24/3083', 'Musty', '', 'Sirajo', '1', '$2y$10$NuWZRx5Bfy/aqocZjwb3Petd8RuQnjcEav9nhSIYWmOZsf2gfZ3Ji', '1972-09-20', 'Kaduna', 'Igabi', 'Male', 'Sirajo', 'Abukur', 'mysterio0@gmail.com', 'Shaiskawa Abukur, Rimi', '08096321056', '2024-07-22 21:14:06');

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
(27, 'Statistics');

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
(1, 1019, 10, 526, '58.44', 2, 9),
(2, 1071, 10, 434, '48.22', 5, 9),
(3, 1086, 10, 437, '48.56', 4, 9),
(4, 1089, 10, 576, '64.00', 1, 9),
(5, 1110, 10, 438, '48.67', 3, 9),
(6, 1059, 17, 562, '40.14', 7, 14),
(7, 1062, 17, 631, '45.07', 5, 14),
(8, 1074, 17, 714, '51.00', 2, 14),
(9, 1080, 17, 703, '50.21', 3, 14),
(10, 1095, 17, 592, '42.29', 6, 14),
(11, 1125, 17, 751, '53.64', 1, 14),
(12, 1138, 17, 683, '48.79', 4, 14),
(13, 1022, 18, 114, '57.00', 1, 2),
(14, 1063, 18, 52, '26.00', 4, 2),
(15, 1075, 18, 97, '48.50', 2, 2),
(16, 1139, 18, 61, '30.50', 3, 2),
(17, 1015, 13, 175, '35.00', 2, 5),
(18, 1039, 13, 179, '35.80', 1, 5),
(19, 1045, 13, 167, '33.40', 4, 5),
(20, 1083, 13, 122, '24.40', 6, 5),
(21, 1088, 13, 139, '27.80', 5, 5),
(22, 1173, 13, 174, '34.80', 3, 5);

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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD KEY `fk_school_levey_1` (`section_id`);

--
-- Indexes for table `school_position`
--
ALTER TABLE `school_position`
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
  ADD KEY `staff_ibfk_1_school_position` (`position_id`);

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
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nigerian_banks`
--
ALTER TABLE `nigerian_banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `school_levy`
--
ALTER TABLE `school_levy`
  MODIFY `levy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_position`
--
ALTER TABLE `school_position`
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
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section_subjects`
--
ALTER TABLE `section_subjects`
  MODIFY `sec_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3071;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1174;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `university_disciplines`
--
ALTER TABLE `university_disciplines`
  MODIFY `discipline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `fk_school_levey_1` FOREIGN KEY (`section_id`) REFERENCES `general_section` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
