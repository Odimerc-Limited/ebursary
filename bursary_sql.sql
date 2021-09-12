-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 01:16 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_accounts`
--

CREATE TABLE `applicant_accounts` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activation_status` int(11) NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `academic_level` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'University',
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `member_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_accounts`
--

INSERT INTO `applicant_accounts` (`id`, `name`, `applicant_id`, `email`, `tel`, `password`, `activation_status`, `date_added`, `academic_level`, `country`, `gender`, `member_type`) VALUES
(1, 'Ronnie Omondi Odima', 'c0dc0c16cb6caa565f173f2f6a87cda1', 'ronnieodima@gmail.com', '0714018656', '1997', 0, '2017-01-28', 'Undergraduate', 'Nigeria', 'Male', 'student'),
(2, 'Carol Barno Jepchumba', 'fd7693a05e8877e9f8733a2005c2d28f', 'carol@gmail.com', '0715895258', '123456', 0, '2017-01-28', 'Undergraduate', 'KENYA', '', 'student'),
(3, 'Winnie Moraa Tai', '60ce8827b25f7634d705f590ad8cd9b9', 'winnie@gmail.com', '0712548952', '123654', 0, '2017-02-09', 'Postgraduate', 'Nigeria', 'Female', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_attachments`
--

CREATE TABLE `applicant_attachments` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_attachments`
--

INSERT INTO `applicant_attachments` (`id`, `applicant_id`, `filename`, `file_location`, `date_added`) VALUES
(3, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Birth Certificate', './assets/upload/student_uploads/Screenshot from 2017-02-08 03-51-37.png', '2017-02-08'),
(4, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'KCPE Certificate', './assets/upload/student_uploads/Screenshot from 2017-02-05 02-59-50.png', '2017-02-08'),
(5, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'KCPE Result Slip', './assets/upload/student_uploads/ron22.jpg', '2017-02-18'),
(6, '60ce8827b25f7634d705f590ad8cd9b9', 'University / College Transcript', './assets/upload/student_uploads/14.jpg', '2017-02-17'),
(7, '60ce8827b25f7634d705f590ad8cd9b9', 'KCSE Certificate', './assets/upload/student_uploads/Ronnie Omondi Merit Cert KB.jpg', '2017-02-17'),
(8, '60ce8827b25f7634d705f590ad8cd9b9', 'KCSE Result Slip', './assets/upload/student_uploads/Ronnie result slip.jpg', '2017-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_bursaries_offered_before`
--

CREATE TABLE `applicant_bursaries_offered_before` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `academic_level` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `academic_year` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_bursaries_offered_before`
--

INSERT INTO `applicant_bursaries_offered_before` (`id`, `applicant_id`, `org_name`, `academic_level`, `year`, `amount`, `academic_year`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'KCB Bank Group', '2', '2014', '25000', '2014'),
(2, 'fd7693a05e8877e9f8733a2005c2d28f', 'KCB Bank Group', '3', '2014', '55000', '2014');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_bursary_applications`
--

CREATE TABLE `applicant_bursary_applications` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `academic_level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `family_type` text COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` text COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `academic_year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fees_payable` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount_applied` decimal(10,2) DEFAULT '0.00',
  `fees_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bursary_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount_awarded` double(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `applicant_declaration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_bursary_applications`
--

INSERT INTO `applicant_bursary_applications` (`id`, `applicant_id`, `academic_level`, `gender`, `country`, `family_type`, `marital_status`, `age`, `academic_year`, `fees_payable`, `amount_applied`, `fees_balance`, `bursary_id`, `amount_awarded`, `status`, `applicant_declaration`, `date_submitted`, `seen`) VALUES
(27, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Undergraduate', 'Male', 'KENYA', 'orphan', 'single', 23, '4', '232321.00', '23232.00', '232321.00', '2071652d8e9d963f03e802be1d9e777e', 0.00, 'pending', 'fsdfdfd', '2017-02-16 19:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_high_school_profiles`
--

CREATE TABLE `applicant_high_school_profiles` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_attended` text COLLATE utf8_unicode_ci NOT NULL,
  `kcse_year` text COLLATE utf8_unicode_ci NOT NULL,
  `current_form` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `indexNO` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_high_school_profiles`
--

INSERT INTO `applicant_high_school_profiles` (`id`, `applicant_id`, `school_name`, `tel`, `email`, `year_attended`, `kcse_year`, `current_form`, `indexNO`, `address`, `profile_percentage`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Kisumu Boys', '0485687525', 'kb@gmail.com', '2009', '2012', '3', '701001057', '1973-40100', 20);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_location_profile`
--

CREATE TABLE `applicant_location_profile` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `county` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_county` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_location_profile`
--

INSERT INTO `applicant_location_profile` (`id`, `applicant_id`, `country`, `county`, `sub_county`, `ward`, `profile_percentage`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Nigeria', 'Lagos', '', '', 7),
(2, 'fd7693a05e8877e9f8733a2005c2d28f', 'KENYA', 'BOMET', '', '', 7),
(3, '60ce8827b25f7634d705f590ad8cd9b9', 'Nigeria', 'Lagos', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_parents_details`
--

CREATE TABLE `applicant_parents_details` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `father_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_age` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `father_income` decimal(10,2) NOT NULL,
  `mother_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_income` decimal(10,2) NOT NULL,
  `mother_age` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_occupation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_religion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_income` decimal(10,2) DEFAULT NULL,
  `guardian_age` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `parental_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_parents_details`
--

INSERT INTO `applicant_parents_details` (`id`, `applicant_id`, `father_name`, `father_tel`, `father_email`, `father_occupation`, `father_nationality`, `father_age`, `father_income`, `mother_name`, `mother_tel`, `mother_email`, `mother_occupation`, `mother_nationality`, `mother_income`, `mother_age`, `guardian_name`, `guardian_tel`, `guardian_email`, `guardian_occupation`, `guardian_nationality`, `guardian_religion`, `guardian_income`, `guardian_age`, `parental_type`, `profile_percentage`, `date_added`) VALUES
(6, 'c0dc0c16cb6caa565f173f2f6a87cda1', '', '', '', '', '', '', '0.00', 'Judith Odima', '071547852658', 'judy@gmail.com', 'Teacher', 'Kenyan', '20000.00', '41', 'Ayoki', '2232', 'g@gmail.com', 'farmer', 'dfda', 'asdsadas', '2232321.00', '33', 'single_parent', 15, '2017-02-16'),
(7, '60ce8827b25f7634d705f590ad8cd9b9', 'Andrew Tom Tai', '0712598546', 'f@gmail.com', 'Teacher', 'Kenyan', '53', '56000.00', 'Eveline Moraa Tai', '0712598545', 'm@gmail.com', 'doctor', 'Kenyan', '45000.00', '45', NULL, '', NULL, '', NULL, NULL, NULL, '', 'both_parents', 15, '2017-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_personal_profile`
--

CREATE TABLE `applicant_personal_profile` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `disability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL,
  `current_academic_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `family_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BOTH PARENTS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_personal_profile`
--

INSERT INTO `applicant_personal_profile` (`id`, `applicant_id`, `fname`, `mname`, `lname`, `gender`, `date_of_birth`, `marital_status`, `address`, `religion`, `disability`, `employment_status`, `photo`, `date_added`, `profile_percentage`, `current_academic_level`, `family_type`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Ronnie', 'Omondi', 'Odima', 'Male', '1994-06-06', 'married', 'Nakuru', 'christian', 'None', 'employed', '', '2017-02-19', 15, 'Undergraduate', 'single_parent'),
(2, 'fd7693a05e8877e9f8733a2005c2d28f', 'Carol', 'Barno', 'Jepchumba', '', '1994-06-06', 'single', '228-40100', 'christian', 'None', 'not_employed', '', '2017-02-19', 15, 'Undergraduate', 'BOTH PARENTS'),
(3, '60ce8827b25f7634d705f590ad8cd9b9', 'Winnie', 'Moraa', 'Tai', 'Female', '', '', '', '', '', '', '', '', 0, 'Postgraduate', 'BOTH PARENTS');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_personal_story`
--

CREATE TABLE `applicant_personal_story` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(50) NOT NULL,
  `story` mediumtext NOT NULL,
  `date_added` text NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_personal_story`
--

INSERT INTO `applicant_personal_story` (`id`, `applicant_id`, `story`, `date_added`, `profile_percentage`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Am hardworking person from a very humble background. Please i need a bursary to continue with my studies.. ', '2017-02-16', 5),
(2, '60ce8827b25f7634d705f590ad8cd9b9', 'very hardworking', '2017-02-17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_postgraduate`
--

CREATE TABLE `applicant_postgraduate` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_year` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_join` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `Admno` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_postgraduate`
--

INSERT INTO `applicant_postgraduate` (`id`, `applicant_id`, `school_name`, `address`, `tel`, `email`, `course`, `current_year`, `year_join`, `graduation_year`, `Admno`, `profile_percentage`) VALUES
(1, '60ce8827b25f7634d705f590ad8cd9b9', 'Moi University', '', '', NULL, 'Business Administration', NULL, '', NULL, 'S12/23232/13', 15);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_primary_school_profile`
--

CREATE TABLE `applicant_primary_school_profile` (
  `id` int(11) NOT NULL,
  `applicant_id` text COLLATE utf8_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kcpe_marks` int(11) NOT NULL DEFAULT '0',
  `kcpe_year` int(11) NOT NULL,
  `year_join` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_primary_school_profile`
--

INSERT INTO `applicant_primary_school_profile` (`id`, `applicant_id`, `school_name`, `current_class`, `address`, `tel`, `email`, `kcpe_marks`, `kcpe_year`, `year_join`, `profile_percentage`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Victoria', '5', '228-40100', '0714018656', 'victoria@gmail.com', 376, 2008, '2003', 20);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile_image`
--

CREATE TABLE `applicant_profile_image` (
  `id` int(11) NOT NULL,
  `applicant_id` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_profile_image`
--

INSERT INTO `applicant_profile_image` (`id`, `applicant_id`, `image`, `profile_percentage`) VALUES
(1, 'f0142cbb98229da8c37d63162249a421', './assets/upload/stu_images/no-photo.png', 0),
(2, 'c0dc0c16cb6caa565f173f2f6a87cda1', './assets/upload/stu_images/new.jpg', 3),
(3, 'fd7693a05e8877e9f8733a2005c2d28f', './assets/upload/stu_images/IMG_20160811_075352.jpg', 3),
(4, '2d0e957e842570ec4632836feea90064', './assets/upload/stu_images/no-photo.png', 0),
(5, 'ee8b6d3bcb28babfa09265a3c905570f', './assets/upload/stu_images/no-photo.png', 0),
(6, '60ce8827b25f7634d705f590ad8cd9b9', './assets/upload/stu_images/no-photo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_saved_bursaries`
--

CREATE TABLE `applicant_saved_bursaries` (
  `id` int(11) NOT NULL,
  `applicant_id` text COLLATE utf8_unicode_ci NOT NULL,
  `bursary_id` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_saved_bursaries`
--

INSERT INTO `applicant_saved_bursaries` (`id`, `applicant_id`, `bursary_id`, `seen`) VALUES
(18, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_siblings_high_school`
--

CREATE TABLE `applicant_siblings_high_school` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_siblings_high_school`
--

INSERT INTO `applicant_siblings_high_school` (`id`, `applicant_id`, `no`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_siblings_not_in_school`
--

CREATE TABLE `applicant_siblings_not_in_school` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_siblings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_siblings_primary_school`
--

CREATE TABLE `applicant_siblings_primary_school` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_siblings_primary_school`
--

INSERT INTO `applicant_siblings_primary_school` (`id`, `applicant_id`, `no`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_siblings_uni_or_college`
--

CREATE TABLE `applicant_siblings_uni_or_college` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_siblings_uni_or_college`
--

INSERT INTO `applicant_siblings_uni_or_college` (`id`, `applicant_id`, `no`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_siblings_working`
--

CREATE TABLE `applicant_siblings_working` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_siblings_working`
--

INSERT INTO `applicant_siblings_working` (`id`, `applicant_id`, `no`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_story`
--

CREATE TABLE `applicant_story` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bursary_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_uni_or_college_profile`
--

CREATE TABLE `applicant_uni_or_college_profile` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_year` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_join` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `Admno` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `profile_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicant_uni_or_college_profile`
--

INSERT INTO `applicant_uni_or_college_profile` (`id`, `applicant_id`, `school_name`, `address`, `tel`, `email`, `course`, `current_year`, `year_join`, `graduation_year`, `Admno`, `profile_percentage`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', 'Egerton University', '528-20100', '0785426952', 'egerton.ac.ke', 'Computer Science', '4', '2013', 2018, 'S13/20758/13', 15);

-- --------------------------------------------------------

--
-- Table structure for table `bursary_alerts`
--

CREATE TABLE `bursary_alerts` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alert_status` varchar(20) NOT NULL DEFAULT 'disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bursary_customized_story`
--

CREATE TABLE `bursary_customized_story` (
  `id` int(11) NOT NULL,
  `bursary_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quiz_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bursary_customized_story`
--

INSERT INTO `bursary_customized_story` (`id`, `bursary_id`, `quiz_id`, `field_type`, `quiz_description`) VALUES
(2, '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'Text Area', 'How have you been surviving without bursry?'),
(5, '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'Text Field', 'how did u find us');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(50) NOT NULL,
  `bursaryID` varchar(50) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `comment` mediumtext,
  `time_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `applicantID`, `bursaryID`, `userID`, `comment`, `time_posted`) VALUES
(1, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '9aed1c415fdea3f493b0a59710f31df9', 'May be awarded', '2017-02-01 01:30:49'),
(2, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '9aed1c415fdea3f493b0a59710f31df9', 'May be awarded', '2017-02-01 01:30:51'),
(3, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '98c98d838694db0a6300b8a74ce0282e', 'yeah its true..', '2017-02-01 01:32:18'),
(4, '\n<div style=', '2071652d8e9d963f03e802be1d9e777e', '98c98d838694db0a6300b8a74ce0282e', 'h\n', '2017-02-01 02:10:39'),
(5, '\n<div style=', '2071652d8e9d963f03e802be1d9e777e', '98c98d838694db0a6300b8a74ce0282e', 'h\n', '2017-02-01 02:10:43'),
(6, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '9aed1c415fdea3f493b0a59710f31df9', 'l', '2017-02-01 22:04:59'),
(7, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '9aed1c415fdea3f493b0a59710f31df9', 'fgfdg', '2017-02-15 00:47:00'),
(8, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', '9aed1c415fdea3f493b0a59710f31df9', 'nice one\n', '2017-02-16 01:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `company_temp`
--

CREATE TABLE `company_temp` (
  `id` int(11) NOT NULL,
  `org_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`) VALUES
(1, 'BOMET'),
(2, 'BUNGOMA'),
(3, 'BUSIA'),
(4, 'ELGEYO/MARAKWET'),
(5, 'EMBU'),
(6, 'GARISSA'),
(7, 'HOMA BAY'),
(8, 'ISIOLO'),
(9, 'KAJIADO'),
(10, 'KAKAMEGA'),
(11, 'KERICHO'),
(12, 'KIAMBU'),
(13, 'KILIFI'),
(14, 'KIRINYAGA'),
(15, 'KISII'),
(16, 'KISUMU'),
(17, 'KITUI'),
(18, 'KWALE'),
(19, 'LAIKIPIA'),
(20, 'LAMU'),
(21, 'MACHAKOS'),
(22, 'MAKUENI'),
(23, 'MANDERA'),
(24, 'MARSABIT'),
(25, 'MERU'),
(26, 'MIGORI'),
(27, 'MOMBASA'),
(28, 'MURANGA'),
(29, 'NAIROBI'),
(30, 'NAKURU'),
(31, 'NANDI'),
(32, 'NAROK'),
(33, 'NYAMIRA'),
(34, 'NYANDARUA'),
(35, 'NYERI'),
(36, 'SAMBURU'),
(37, 'SIAYA'),
(38, 'TAITA TAVETA'),
(39, 'TANA RIVER'),
(40, 'THARAKA - NITHI'),
(41, 'TRANS NZOIA'),
(42, 'TURKANA'),
(43, 'UASIN GISHU'),
(44, 'VIHIGA'),
(45, 'WAJIR'),
(46, 'WEST POKOT'),
(47, 'BARINGO');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Kenya'),
(2, 'Uganda'),
(3, 'Tanzania'),
(4, 'Rwanda'),
(5, 'Burundi'),
(6, 'Souht Africa'),
(7, 'South Sudan'),
(8, 'Nigeria'),
(9, 'Ghana');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`iso`, `name`) VALUES
('KRW', '(South) Korean Won'),
('AFA', 'Afghanistan Afghani'),
('ALL', 'Albanian Lek'),
('DZD', 'Algerian Dinar'),
('ADP', 'Andorran Peseta'),
('AOK', 'Angolan Kwanza'),
('ARS', 'Argentine Peso'),
('AMD', 'Armenian Dram'),
('AWG', 'Aruban Florin'),
('AUD', 'Australian Dollar'),
('BSD', 'Bahamian Dollar'),
('BHD', 'Bahraini Dinar'),
('BDT', 'Bangladeshi Taka'),
('BBD', 'Barbados Dollar'),
('BZD', 'Belize Dollar'),
('BMD', 'Bermudian Dollar'),
('BTN', 'Bhutan Ngultrum'),
('BOB', 'Bolivian Boliviano'),
('BWP', 'Botswanian Pula'),
('BRL', 'Brazilian Real'),
('GBP', 'British Pound'),
('BND', 'Brunei Dollar'),
('BGN', 'Bulgarian Lev'),
('BUK', 'Burma Kyat'),
('BIF', 'Burundi Franc'),
('CAD', 'Canadian Dollar'),
('CVE', 'Cape Verde Escudo'),
('KYD', 'Cayman Islands Dollar'),
('CLP', 'Chilean Peso'),
('CLF', 'Chilean Unidades de Fomento'),
('COP', 'Colombian Peso'),
('XOF', 'Communauté Financière Africaine BCEAO - Francs'),
('XAF', 'Communauté Financière Africaine BEAC, Francs'),
('KMF', 'Comoros Franc'),
('XPF', 'Comptoirs Français du Pacifique Francs'),
('CRC', 'Costa Rican Colon'),
('CUP', 'Cuban Peso'),
('CYP', 'Cyprus Pound'),
('CZK', 'Czech Republic Koruna'),
('DKK', 'Danish Krone'),
('YDD', 'Democratic Yemeni Dinar'),
('DOP', 'Dominican Peso'),
('XCD', 'East Caribbean Dollar'),
('TPE', 'East Timor Escudo'),
('ECS', 'Ecuador Sucre'),
('EGP', 'Egyptian Pound'),
('SVC', 'El Salvador Colon'),
('EEK', 'Estonian Kroon (EEK)'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FKP', 'Falkland Islands Pound'),
('FJD', 'Fiji Dollar'),
('GMD', 'Gambian Dalasi'),
('GHC', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('XAU', 'Gold, Ounces'),
('GTQ', 'Guatemalan Quetzal'),
('GNF', 'Guinea Franc'),
('GWP', 'Guinea-Bissau Peso'),
('GYD', 'Guyanan Dollar'),
('HTG', 'Haitian Gourde'),
('HNL', 'Honduran Lempira'),
('HKD', 'Hong Kong Dollar'),
('HUF', 'Hungarian Forint'),
('INR', 'Indian Rupee'),
('IDR', 'Indonesian Rupiah'),
('XDR', 'International Monetary Fund (IMF) Special Drawing Rights'),
('IRR', 'Iranian Rial'),
('IQD', 'Iraqi Dinar'),
('IEP', 'Irish Punt'),
('ILS', 'Israeli Shekel'),
('JMD', 'Jamaican Dollar'),
('JPY', 'Japanese Yen'),
('JOD', 'Jordanian Dinar'),
('KHR', 'Kampuchean (Cambodian) Riel'),
('KES', 'Kenyan Schilling'),
('KWD', 'Kuwaiti Dinar'),
('LAK', 'Lao Kip'),
('LBP', 'Lebanese Pound'),
('LSL', 'Lesotho Loti'),
('LRD', 'Liberian Dollar'),
('LYD', 'Libyan Dinar'),
('MOP', 'Macau Pataca'),
('MGF', 'Malagasy Franc'),
('MWK', 'Malawi Kwacha'),
('MYR', 'Malaysian Ringgit'),
('MVR', 'Maldive Rufiyaa'),
('MTL', 'Maltese Lira'),
('MRO', 'Mauritanian Ouguiya'),
('MUR', 'Mauritius Rupee'),
('MXP', 'Mexican Peso'),
('MNT', 'Mongolian Tugrik'),
('MAD', 'Moroccan Dirham'),
('MZM', 'Mozambique Metical'),
('NAD', 'Namibian Dollar'),
('NPR', 'Nepalese Rupee'),
('ANG', 'Netherlands Antillian Guilder'),
('YUD', 'New Yugoslavia Dinar'),
('NZD', 'New Zealand Dollar'),
('NIO', 'Nicaraguan Cordoba'),
('NGN', 'Nigerian Naira'),
('KPW', 'North Korean Won'),
('NOK', 'Norwegian Kroner'),
('OMR', 'Omani Rial'),
('PKR', 'Pakistan Rupee'),
('XPD', 'Palladium Ounces'),
('PAB', 'Panamanian Balboa'),
('PGK', 'Papua New Guinea Kina'),
('PYG', 'Paraguay Guarani'),
('PEN', 'Peruvian Nuevo Sol'),
('PHP', 'Philippine Peso'),
('XPT', 'Platinum, Ounces'),
('PLN', 'Polish Zloty'),
('QAR', 'Qatari Rial'),
('RON', 'Romanian Leu'),
('RUB', 'Russian Ruble'),
('RWF', 'Rwanda Franc'),
('WST', 'Samoan Tala'),
('STD', 'Sao Tome and Principe Dobra'),
('SAR', 'Saudi Arabian Riyal'),
('SCR', 'Seychelles Rupee'),
('SLL', 'Sierra Leone Leone'),
('XAG', 'Silver, Ounces'),
('SGD', 'Singapore Dollar'),
('SKK', 'Slovak Koruna'),
('SBD', 'Solomon Islands Dollar'),
('SOS', 'Somali Schilling'),
('ZAR', 'South African Rand'),
('LKR', 'Sri Lanka Rupee'),
('SHP', 'St. Helena Pound'),
('SDP', 'Sudanese Pound'),
('SRG', 'Suriname Guilder'),
('SZL', 'Swaziland Lilangeni'),
('SEK', 'Swedish Krona'),
('CHF', 'Swiss Franc'),
('SYP', 'Syrian Potmd'),
('TWD', 'Taiwan Dollar'),
('TZS', 'Tanzanian Schilling'),
('THB', 'Thai Baht'),
('TOP', 'Tongan Paanga'),
('TTD', 'Trinidad and Tobago Dollar'),
('TND', 'Tunisian Dinar'),
('TRY', 'Turkish Lira'),
('UGX', 'Uganda Shilling'),
('AED', 'United Arab Emirates Dirham'),
('UYU', 'Uruguayan Peso'),
('USD', 'US Dollar'),
('VUV', 'Vanuatu Vatu'),
('VEF', 'Venezualan Bolivar'),
('VND', 'Vietnamese Dong'),
('YER', 'Yemeni Rial'),
('CNY', 'Yuan (Chinese) Renminbi'),
('ZRZ', 'Zaire Zaire'),
('ZMK', 'Zambian Kwacha'),
('ZWD', 'Zimbabwe Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `currency_settings`
--

CREATE TABLE `currency_settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `iso` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_settings`
--

INSERT INTO `currency_settings` (`id`, `name`, `iso`, `date_added`) VALUES
(1, '(South) Korean Won', 'KRW', '2017-02-19 21:03:44'),
(2, 'Afghanistan Afghani', 'AFA', '2017-02-19 21:03:44'),
(3, 'Albanian Lek', 'ALL', '2017-02-19 21:03:44'),
(4, 'Algerian Dinar', 'DZD', '2017-02-19 21:03:44'),
(5, 'Andorran Peseta', 'ADP', '2017-02-19 21:03:44'),
(6, 'Angolan Kwanza', 'AOK', '2017-02-19 21:03:44'),
(7, 'Argentine Peso', 'ARS', '2017-02-19 21:03:44'),
(8, 'Armenian Dram', 'AMD', '2017-02-19 21:03:44'),
(9, 'Aruban Florin', 'AWG', '2017-02-19 21:03:44'),
(10, 'Australian Dollar', 'AUD', '2017-02-19 21:03:44'),
(11, 'Bahamian Dollar', 'BSD', '2017-02-19 21:03:44'),
(12, 'Bahraini Dinar', 'BHD', '2017-02-19 21:03:44'),
(13, 'Bangladeshi Taka', 'BDT', '2017-02-19 21:03:44'),
(14, 'Barbados Dollar', 'BBD', '2017-02-19 21:03:44'),
(15, 'Belize Dollar', 'BZD', '2017-02-19 21:03:44'),
(16, 'Bermudian Dollar', 'BMD', '2017-02-19 21:03:44'),
(17, 'Bhutan Ngultrum', 'BTN', '2017-02-19 21:03:44'),
(18, 'Bolivian Boliviano', 'BOB', '2017-02-19 21:03:44'),
(19, 'Botswanian Pula', 'BWP', '2017-02-19 21:03:44'),
(20, 'Brazilian Real', 'BRL', '2017-02-19 21:03:44'),
(21, 'British Pound', 'GBP', '2017-02-19 21:03:44'),
(22, 'Brunei Dollar', 'BND', '2017-02-19 21:03:44'),
(23, 'Bulgarian Lev', 'BGN', '2017-02-19 21:03:44'),
(24, 'Burma Kyat', 'BUK', '2017-02-19 21:03:44'),
(25, 'Burundi Franc', 'BIF', '2017-02-19 21:03:44'),
(26, 'Canadian Dollar', 'CAD', '2017-02-19 21:03:44'),
(27, 'Cape Verde Escudo', 'CVE', '2017-02-19 21:03:44'),
(28, 'Cayman Islands Dollar', 'KYD', '2017-02-19 21:03:44'),
(29, 'Chilean Peso', 'CLP', '2017-02-19 21:03:44'),
(30, 'Chilean Unidades de Fomento', 'CLF', '2017-02-19 21:03:44'),
(31, 'Colombian Peso', 'COP', '2017-02-19 21:03:44'),
(32, 'Communauté Financière Africaine BCEAO - Francs', 'XOF', '2017-02-19 21:03:44'),
(33, 'Communauté Financière Africaine BEAC, Francs', 'XAF', '2017-02-19 21:03:44'),
(34, 'Comoros Franc', 'KMF', '2017-02-19 21:03:44'),
(35, 'Comptoirs Français du Pacifique Francs', 'XPF', '2017-02-19 21:03:44'),
(36, 'Costa Rican Colon', 'CRC', '2017-02-19 21:03:44'),
(37, 'Cuban Peso', 'CUP', '2017-02-19 21:03:44'),
(38, 'Cyprus Pound', 'CYP', '2017-02-19 21:03:44'),
(39, 'Czech Republic Koruna', 'CZK', '2017-02-19 21:03:44'),
(40, 'Danish Krone', 'DKK', '2017-02-19 21:03:44'),
(41, 'Democratic Yemeni Dinar', 'YDD', '2017-02-19 21:03:44'),
(42, 'Dominican Peso', 'DOP', '2017-02-19 21:03:44'),
(43, 'East Caribbean Dollar', 'XCD', '2017-02-19 21:03:44'),
(44, 'East Timor Escudo', 'TPE', '2017-02-19 21:03:44'),
(45, 'Ecuador Sucre', 'ECS', '2017-02-19 21:03:44'),
(46, 'Egyptian Pound', 'EGP', '2017-02-19 21:03:44'),
(47, 'El Salvador Colon', 'SVC', '2017-02-19 21:03:44'),
(48, 'Estonian Kroon (EEK)', 'EEK', '2017-02-19 21:03:44'),
(49, 'Ethiopian Birr', 'ETB', '2017-02-19 21:03:44'),
(50, 'Euro', 'EUR', '2017-02-19 21:03:44'),
(51, 'Falkland Islands Pound', 'FKP', '2017-02-19 21:03:44'),
(52, 'Fiji Dollar', 'FJD', '2017-02-19 21:03:44'),
(53, 'Gambian Dalasi', 'GMD', '2017-02-19 21:03:44'),
(54, 'Ghanaian Cedi', 'GHC', '2017-02-19 21:03:44'),
(55, 'Gibraltar Pound', 'GIP', '2017-02-19 21:03:44'),
(56, 'Gold, Ounces', 'XAU', '2017-02-19 21:03:44'),
(57, 'Guatemalan Quetzal', 'GTQ', '2017-02-19 21:03:44'),
(58, 'Guinea Franc', 'GNF', '2017-02-19 21:03:44'),
(59, 'Guinea-Bissau Peso', 'GWP', '2017-02-19 21:03:44'),
(60, 'Guyanan Dollar', 'GYD', '2017-02-19 21:03:44'),
(61, 'Haitian Gourde', 'HTG', '2017-02-19 21:03:44'),
(62, 'Honduran Lempira', 'HNL', '2017-02-19 21:03:44'),
(63, 'Hong Kong Dollar', 'HKD', '2017-02-19 21:03:44'),
(64, 'Hungarian Forint', 'HUF', '2017-02-19 21:03:44'),
(65, 'Indian Rupee', 'INR', '2017-02-19 21:03:44'),
(66, 'Indonesian Rupiah', 'IDR', '2017-02-19 21:03:44'),
(67, 'International Monetary Fund (IMF) Special Drawing Rights', 'XDR', '2017-02-19 21:03:44'),
(68, 'Iranian Rial', 'IRR', '2017-02-19 21:03:44'),
(69, 'Iraqi Dinar', 'IQD', '2017-02-19 21:03:44'),
(70, 'Irish Punt', 'IEP', '2017-02-19 21:03:44'),
(71, 'Israeli Shekel', 'ILS', '2017-02-19 21:03:44'),
(72, 'Jamaican Dollar', 'JMD', '2017-02-19 21:03:44'),
(73, 'Japanese Yen', 'JPY', '2017-02-19 21:03:44'),
(74, 'Jordanian Dinar', 'JOD', '2017-02-19 21:03:44'),
(75, 'Kampuchean (Cambodian) Riel', 'KHR', '2017-02-19 21:03:44'),
(76, 'Kenyan Schilling', 'KES', '2017-02-19 21:03:44'),
(77, 'Kuwaiti Dinar', 'KWD', '2017-02-19 21:03:44'),
(78, 'Lao Kip', 'LAK', '2017-02-19 21:03:44'),
(79, 'Lebanese Pound', 'LBP', '2017-02-19 21:03:44'),
(80, 'Lesotho Loti', 'LSL', '2017-02-19 21:03:44'),
(81, 'Liberian Dollar', 'LRD', '2017-02-19 21:03:44'),
(82, 'Libyan Dinar', 'LYD', '2017-02-19 21:03:44'),
(83, 'Macau Pataca', 'MOP', '2017-02-19 21:03:44'),
(84, 'Malagasy Franc', 'MGF', '2017-02-19 21:03:44'),
(85, 'Malawi Kwacha', 'MWK', '2017-02-19 21:03:44'),
(86, 'Malaysian Ringgit', 'MYR', '2017-02-19 21:03:44'),
(87, 'Maldive Rufiyaa', 'MVR', '2017-02-19 21:03:44'),
(88, 'Maltese Lira', 'MTL', '2017-02-19 21:03:44'),
(89, 'Mauritanian Ouguiya', 'MRO', '2017-02-19 21:03:44'),
(90, 'Mauritius Rupee', 'MUR', '2017-02-19 21:03:44'),
(91, 'Mexican Peso', 'MXP', '2017-02-19 21:03:44'),
(92, 'Mongolian Tugrik', 'MNT', '2017-02-19 21:03:44'),
(93, 'Moroccan Dirham', 'MAD', '2017-02-19 21:03:44'),
(94, 'Mozambique Metical', 'MZM', '2017-02-19 21:03:44'),
(95, 'Namibian Dollar', 'NAD', '2017-02-19 21:03:44'),
(96, 'Nepalese Rupee', 'NPR', '2017-02-19 21:03:44'),
(97, 'Netherlands Antillian Guilder', 'ANG', '2017-02-19 21:03:44'),
(98, 'New Yugoslavia Dinar', 'YUD', '2017-02-19 21:03:44'),
(99, 'New Zealand Dollar', 'NZD', '2017-02-19 21:03:44'),
(100, 'Nicaraguan Cordoba', 'NIO', '2017-02-19 21:03:44'),
(101, 'Nigerian Naira', 'NGN', '2017-02-19 21:03:44'),
(102, 'North Korean Won', 'KPW', '2017-02-19 21:03:44'),
(103, 'Norwegian Kroner', 'NOK', '2017-02-19 21:03:44'),
(104, 'Omani Rial', 'OMR', '2017-02-19 21:03:44'),
(105, 'Pakistan Rupee', 'PKR', '2017-02-19 21:03:44'),
(106, 'Palladium Ounces', 'XPD', '2017-02-19 21:03:44'),
(107, 'Panamanian Balboa', 'PAB', '2017-02-19 21:03:44'),
(108, 'Papua New Guinea Kina', 'PGK', '2017-02-19 21:03:44'),
(109, 'Paraguay Guarani', 'PYG', '2017-02-19 21:03:44'),
(110, 'Peruvian Nuevo Sol', 'PEN', '2017-02-19 21:03:44'),
(111, 'Philippine Peso', 'PHP', '2017-02-19 21:03:44'),
(112, 'Platinum, Ounces', 'XPT', '2017-02-19 21:03:44'),
(113, 'Polish Zloty', 'PLN', '2017-02-19 21:03:44'),
(114, 'Qatari Rial', 'QAR', '2017-02-19 21:03:44'),
(115, 'Romanian Leu', 'RON', '2017-02-19 21:03:44'),
(116, 'Russian Ruble', 'RUB', '2017-02-19 21:03:44'),
(117, 'Rwanda Franc', 'RWF', '2017-02-19 21:03:44'),
(118, 'Samoan Tala', 'WST', '2017-02-19 21:03:44'),
(119, 'Sao Tome and Principe Dobra', 'STD', '2017-02-19 21:03:44'),
(120, 'Saudi Arabian Riyal', 'SAR', '2017-02-19 21:03:44'),
(121, 'Seychelles Rupee', 'SCR', '2017-02-19 21:03:44'),
(122, 'Sierra Leone Leone', 'SLL', '2017-02-19 21:03:44'),
(123, 'Silver, Ounces', 'XAG', '2017-02-19 21:03:44'),
(124, 'Singapore Dollar', 'SGD', '2017-02-19 21:03:44'),
(125, 'Slovak Koruna', 'SKK', '2017-02-19 21:03:44'),
(126, 'Solomon Islands Dollar', 'SBD', '2017-02-19 21:03:44'),
(127, 'Somali Schilling', 'SOS', '2017-02-19 21:03:44'),
(128, 'South African Rand', 'ZAR', '2017-02-19 21:03:44'),
(129, 'Sri Lanka Rupee', 'LKR', '2017-02-19 21:03:44'),
(130, 'St. Helena Pound', 'SHP', '2017-02-19 21:03:44'),
(131, 'Sudanese Pound', 'SDP', '2017-02-19 21:03:44'),
(132, 'Suriname Guilder', 'SRG', '2017-02-19 21:03:44'),
(133, 'Swaziland Lilangeni', 'SZL', '2017-02-19 21:03:44'),
(134, 'Swedish Krona', 'SEK', '2017-02-19 21:03:44'),
(135, 'Swiss Franc', 'CHF', '2017-02-19 21:03:44'),
(136, 'Syrian Potmd', 'SYP', '2017-02-19 21:03:44'),
(137, 'Taiwan Dollar', 'TWD', '2017-02-19 21:03:44'),
(138, 'Tanzanian Schilling', 'TZS', '2017-02-19 21:03:44'),
(139, 'Thai Baht', 'THB', '2017-02-19 21:03:44'),
(140, 'Tongan Paanga', 'TOP', '2017-02-19 21:03:44'),
(141, 'Trinidad and Tobago Dollar', 'TTD', '2017-02-19 21:03:44'),
(142, 'Tunisian Dinar', 'TND', '2017-02-19 21:03:44'),
(143, 'Turkish Lira', 'TRY', '2017-02-19 21:03:44'),
(144, 'Uganda Shilling', 'UGX', '2017-02-19 21:03:44'),
(145, 'United Arab Emirates Dirham', 'AED', '2017-02-19 21:03:44'),
(146, 'Uruguayan Peso', 'UYU', '2017-02-19 21:03:44'),
(147, 'US Dollar', 'USD', '2017-02-19 21:03:44'),
(148, 'Vanuatu Vatu', 'VUV', '2017-02-19 21:03:44'),
(149, 'Venezualan Bolivar', 'VEF', '2017-02-19 21:03:44'),
(150, 'Vietnamese Dong', 'VND', '2017-02-19 21:03:44'),
(151, 'Yemeni Rial', 'YER', '2017-02-19 21:03:44'),
(152, 'Yuan (Chinese) Renminbi', 'CNY', '2017-02-19 21:03:44'),
(153, 'Zaire Zaire', 'ZRZ', '2017-02-19 21:03:44'),
(154, 'Zambian Kwacha', 'ZMK', '2017-02-19 21:03:44'),
(155, 'Zimbabwe Dollar', 'ZWD', '2017-02-19 21:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `custom_quiz_answers`
--

CREATE TABLE `custom_quiz_answers` (
  `id` int(11) NOT NULL,
  `applicant_id` text COLLATE utf8_unicode_ci NOT NULL,
  `bursary_id` text COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` text COLLATE utf8_unicode_ci NOT NULL,
  `quiz_answer` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `custom_quiz_answers`
--

INSERT INTO `custom_quiz_answers` (`id`, `applicant_id`, `bursary_id`, `quiz_id`, `quiz_answer`) VALUES
(32, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'e34d....harambees'),
(33, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'd3b4.......via google'),
(34, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'help'),
(35, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'google'),
(36, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'dsfdsfds'),
(37, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'ddsf'),
(38, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'dffdgfd'),
(39, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'fgfg'),
(40, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'xcvxvxc'),
(41, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'hggf'),
(42, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'sddsf'),
(43, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'dfd'),
(44, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'dffdsfsd'),
(45, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'sdfds'),
(46, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'e34d77655dfdef7d426f8ca3fb9ae338', 'ddsfsd'),
(47, 'c0dc0c16cb6caa565f173f2f6a87cda1', '2071652d8e9d963f03e802be1d9e777e', 'd3b476c47476fefec86616c802704846', 'dsfd');

-- --------------------------------------------------------

--
-- Table structure for table `org_accounts`
--

CREATE TABLE `org_accounts` (
  `id` int(11) NOT NULL,
  `org_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` text COLLATE utf8_unicode_ci NOT NULL,
  `org_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  `account_activation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_accounts`
--

INSERT INTO `org_accounts` (`id`, `org_id`, `account_id`, `org_name`, `email`, `tel`, `address`, `website`, `country`, `logo`, `description`, `userId`, `date_added`, `account_activation`) VALUES
(1, '7872dc37510213bfefd06e3729f30c12', '7872dc37510213bfefd06e3729f30c12', 'Focweb Technology', 'info@focweb.co.ke', '+254720777086', 'Nairobi', 'http://www.focweb.com', 'Kenya', 'upload/org_logo/182.jpg', 'Web solutions company in kenya', '9aed1c415fdea3f493b0a59710f31df9', '2017-01-25', 0),
(2, 'c4faf24baf7452db4f78b3d33563e89c', 'c4faf24baf7452db4f78b3d33563e89c', 'Royal Funds', 'email@royal.co.ke', '+25478596254', 'Kisumu', 'royal.co.ke', 'Kenya', 'upload/org_logo/07.jpg', 'penatibus et magnis dis parturient montes ascetur ridiculus musull dui. Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibuLorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes a', '8a98cbd92f8b334bcd456b72dfe11be8', '2017-02-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_bursaries`
--

CREATE TABLE `org_bursaries` (
  `id` int(11) NOT NULL,
  `org_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bursary_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bursary_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `target_applicant_gender` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `target_country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `target_applicant_locations` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target_applicant_academic_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `openning_date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `closing_date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_beneficiaries` text COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_application` int(10) NOT NULL,
  `attachment_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `receive_applications_via` varchar(10000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'portal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_bursaries`
--

INSERT INTO `org_bursaries` (`id`, `org_id`, `bursary_id`, `bursary_name`, `description`, `target_applicant_gender`, `target_country`, `target_applicant_locations`, `target_applicant_academic_level`, `openning_date`, `closing_date`, `no_of_beneficiaries`, `posted_by`, `amount`, `date_added`, `status`, `no_of_application`, `attachment_path`, `receive_applications_via`) VALUES
(1, '7872dc37510213bfefd06e3729f30c12', '2071652d8e9d963f03e802be1d9e777e', 'Focweb Grants Nairobi', 'Bursary for girls and boys&nbsp;who are unable to pay their school fees..', 'Male,Female', 'KENYA', 'Mombasa', 'Primary,Undergraduate', '2017-02-05', '2017-02-21', '500', 'Admin', '1000000.00', '2017-01-25 21:00:00', 'Online', 0, '', 'portal'),
(2, '7872dc37510213bfefd06e3729f30c12', 'a6c9a242ff049876cc7a54f2a4e936e8', 'Equity Grants', 'Free Bursary for needy students in South Africa this year', 'Male,Female', 'KENYA', 'Mombasa', 'High_School,Undergraduate', '2017-01-31', '2017-02-15', '222', 'Admin', '223232.00', '2017-01-25 21:00:00', 'Offline', 0, '', 'portal'),
(3, '7872dc37510213bfefd06e3729f30c12', 'e191fb3b181fd00e09e491fdc724713d', 'CDF Bursary', 'New CDF bursary this year', 'Male', 'KENYA', 'Mombasa', 'Undergraduate,Postgraduate', '2017-01-26', '2017-01-28', '100', 'Admin', '5000000.00', '2017-01-25 21:00:00', 'Offline', 0, '', 'portal'),
(4, '7872dc37510213bfefd06e3729f30c12', '67c485cc3d830cfdad5c895cfe25a753', 'Coop Bank Grants', 'new one for bright students', 'Male', 'KENYA', 'Mombasa', 'Postgraduate', '2017-01-31', '2017-02-15', '100', 'Admin', '600000.00', '2017-01-30 21:00:00', 'Offline', 0, '', 'portal'),
(11, 'c4faf24baf7452db4f78b3d33563e89c', 'f72c24defe43d12e48429cc5552d0d43', 'sadsads', 'ssadas', 'Female', 'SOUTH AFRICA', 'sadasd', 'High_School', '2017-02-22', '2017-02-23', '0', 'Admin', '0.00', '2017-02-13 21:00:00', 'Online', 0, '', 'https://coderonnie.co.ke'),
(12, 'c4faf24baf7452db4f78b3d33563e89c', '75a599f861fb5f1d82ffceee45d00afe', 'vcxvxc', 'nigerian', 'Female', 'NIGERIA', 'igbo', 'Undergraduate,Postgraduate', '2017-02-15', '2017-02-23', '0', 'Admin', '0.00', '2017-02-13 21:00:00', 'Online', 0, '', 'https://coderonnie.co.ke'),
(13, 'c4faf24baf7452db4f78b3d33563e89c', '47fece72cc7b28dfe260631aff34be1c', 'wqewqe', 'fdfdsfds', 'Male,Female', 'KENYA', 'Any_county_in_Kenya', 'Postgraduate', '2017-02-14', '2017-02-16', '0', 'Admin', '0.00', '2017-02-13 21:00:00', 'Offline', 0, '', 'https://coderonnie.co.ke'),
(14, 'c4faf24baf7452db4f78b3d33563e89c', 'e4bf8e8d056252e62472ce6de5303ba7', 'iuoioi', 'oiuouihjkhjkhjkhj', 'Female', 'KENYA', 'Machakos', 'Postgraduate', '2017-02-15', '2017-02-23', '85', 'Admin', '50000.00', '2017-02-13 21:00:00', 'Online', 0, '', 'portal'),
(15, 'c4faf24baf7452db4f78b3d33563e89c', '08e23b53b49559532c6630e70c08c680', 'jhgjghjh', 'jghjghjghj', 'Male', 'UGANDA', 'kampla', 'Undergraduate', '2017-02-15', '2017-02-23', '0', 'Admin', '', '2017-02-13 21:00:00', 'Online', 0, '', 'https://coderonnie.co.ke');

-- --------------------------------------------------------

--
-- Table structure for table `org_users_accounts`
--

CREATE TABLE `org_users_accounts` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` text COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `userLevel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `member_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'org_staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_users_accounts`
--

INSERT INTO `org_users_accounts` (`id`, `userId`, `org_id`, `account_id`, `fname`, `lname`, `email`, `tel`, `password`, `userLevel`, `status`, `date_added`, `added_by`, `member_type`) VALUES
(1, '9aed1c415fdea3f493b0a59710f31df9', '7872dc37510213bfefd06e3729f30c12', '7872dc37510213bfefd06e3729f30c12', 'Denis', 'Gachoki', 'denis@focweb.com', '0702773038', '123456', 'Admin', 'Active', '2017-01-24 21:00:00', '', 'org_staff'),
(2, '98c98d838694db0a6300b8a74ce0282e', '7872dc37510213bfefd06e3729f30c12', '7872dc37510213bfefd06e3729f30c12', 'Ronnie', 'Odima', 'ronnieomondi@gmail.com', '0711259995', 'ronnieodima', 'General', 'Active', '2017-01-25 22:36:48', '9aed1c415fdea3f493b0a59710f31df9', 'org_staff'),
(3, '8a98cbd92f8b334bcd456b72dfe11be8', 'c4faf24baf7452db4f78b3d33563e89c', 'c4faf24baf7452db4f78b3d33563e89c', 'Dennis', 'Maina', 'maina@gmail.com', '0725985426', '12345', 'Admin', 'Active', '2017-02-11 21:00:00', '', 'org_staff');

-- --------------------------------------------------------

--
-- Table structure for table `saved_searches`
--

CREATE TABLE `saved_searches` (
  `id` int(11) NOT NULL,
  `applicant_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `org_id` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_accounts`
--
ALTER TABLE `applicant_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EDF91B197139001` (`applicant_id`),
  ADD UNIQUE KEY `UNIQ_EDF91B1E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_EDF91B1F037AB0F` (`tel`);

--
-- Indexes for table `applicant_attachments`
--
ALTER TABLE `applicant_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_bursaries_offered_before`
--
ALTER TABLE `applicant_bursaries_offered_before`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_bursary_applications`
--
ALTER TABLE `applicant_bursary_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_high_school_profiles`
--
ALTER TABLE `applicant_high_school_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_location_profile`
--
ALTER TABLE `applicant_location_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_parents_details`
--
ALTER TABLE `applicant_parents_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_21D64A8997139001` (`applicant_id`),
  ADD UNIQUE KEY `UNIQ_21D64A89A6D1EB7` (`father_email`);

--
-- Indexes for table `applicant_personal_profile`
--
ALTER TABLE `applicant_personal_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_11C08B0F97139001` (`applicant_id`);

--
-- Indexes for table `applicant_personal_story`
--
ALTER TABLE `applicant_personal_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_postgraduate`
--
ALTER TABLE `applicant_postgraduate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_primary_school_profile`
--
ALTER TABLE `applicant_primary_school_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_profile_image`
--
ALTER TABLE `applicant_profile_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_saved_bursaries`
--
ALTER TABLE `applicant_saved_bursaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_siblings_high_school`
--
ALTER TABLE `applicant_siblings_high_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_siblings_not_in_school`
--
ALTER TABLE `applicant_siblings_not_in_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_siblings_primary_school`
--
ALTER TABLE `applicant_siblings_primary_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_siblings_uni_or_college`
--
ALTER TABLE `applicant_siblings_uni_or_college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_siblings_working`
--
ALTER TABLE `applicant_siblings_working`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_story`
--
ALTER TABLE `applicant_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_uni_or_college_profile`
--
ALTER TABLE `applicant_uni_or_college_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bursary_alerts`
--
ALTER TABLE `bursary_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bursary_customized_story`
--
ALTER TABLE `bursary_customized_story`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_25762382853CD175` (`quiz_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_temp`
--
ALTER TABLE `company_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_483E9F24F4837C1B` (`org_id`),
  ADD UNIQUE KEY `UNIQ_483E9F24E7927C74` (`email`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `currency_settings`
--
ALTER TABLE `currency_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_quiz_answers`
--
ALTER TABLE `custom_quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_accounts`
--
ALTER TABLE `org_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B6670E4FE7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_B6670E4FF037AB0F` (`tel`);

--
-- Indexes for table `org_bursaries`
--
ALTER TABLE `org_bursaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4CF6F96670D4FA9E` (`bursary_id`);

--
-- Indexes for table `org_users_accounts`
--
ALTER TABLE `org_users_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B8BC632D64B64DCC` (`userId`),
  ADD UNIQUE KEY `UNIQ_B8BC632DE7927C74` (`email`);

--
-- Indexes for table `saved_searches`
--
ALTER TABLE `saved_searches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_accounts`
--
ALTER TABLE `applicant_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applicant_attachments`
--
ALTER TABLE `applicant_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `applicant_bursaries_offered_before`
--
ALTER TABLE `applicant_bursaries_offered_before`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `applicant_bursary_applications`
--
ALTER TABLE `applicant_bursary_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `applicant_high_school_profiles`
--
ALTER TABLE `applicant_high_school_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_location_profile`
--
ALTER TABLE `applicant_location_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applicant_parents_details`
--
ALTER TABLE `applicant_parents_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `applicant_personal_profile`
--
ALTER TABLE `applicant_personal_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applicant_personal_story`
--
ALTER TABLE `applicant_personal_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `applicant_postgraduate`
--
ALTER TABLE `applicant_postgraduate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_primary_school_profile`
--
ALTER TABLE `applicant_primary_school_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_profile_image`
--
ALTER TABLE `applicant_profile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `applicant_saved_bursaries`
--
ALTER TABLE `applicant_saved_bursaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `applicant_siblings_high_school`
--
ALTER TABLE `applicant_siblings_high_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_siblings_not_in_school`
--
ALTER TABLE `applicant_siblings_not_in_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicant_siblings_primary_school`
--
ALTER TABLE `applicant_siblings_primary_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_siblings_uni_or_college`
--
ALTER TABLE `applicant_siblings_uni_or_college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_siblings_working`
--
ALTER TABLE `applicant_siblings_working`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `applicant_story`
--
ALTER TABLE `applicant_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicant_uni_or_college_profile`
--
ALTER TABLE `applicant_uni_or_college_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bursary_alerts`
--
ALTER TABLE `bursary_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bursary_customized_story`
--
ALTER TABLE `bursary_customized_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company_temp`
--
ALTER TABLE `company_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `currency_settings`
--
ALTER TABLE `currency_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `custom_quiz_answers`
--
ALTER TABLE `custom_quiz_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `org_accounts`
--
ALTER TABLE `org_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `org_bursaries`
--
ALTER TABLE `org_bursaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `org_users_accounts`
--
ALTER TABLE `org_users_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saved_searches`
--
ALTER TABLE `saved_searches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_bursary_status2` ON SCHEDULE EVERY 12 HOUR STARTS '2016-08-22 01:22:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	
UPDATE org_bursaries SET STATUS='Offline' WHERE closing_date <= CURDATE();	    

END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
