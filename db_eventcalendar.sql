-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 01:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_eventcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `admin_id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_added` date NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'User Admin',
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_id`, `username`, `email`, `password`, `date_added`, `type`, `status`) VALUES
(1, 'laviste.ralph', 'ralphlaviste@gmail.com', 'fb7dbf7eea28b3c56092daaa47248889', '2014-09-18', 'Root Admin', 'ACTIVE'),
(2, 'torres.jameelalourdes', 'jamtorres010395@gmail.com', '8c70847d96eacac8709c1d7d3e612642', '2014-09-18', 'User Admin', 'ACTIVE'),
(3, 'ticar.paulmichael', 'paulmichaelticar@gmail.com', 'd5159fc8a1e011a16a0350ec801fb4be', '2014-09-18', 'User Admin', 'ACTIVE'),
(4, 'verdida.jaimmesauri', 'jaimmesverdida@yahoo.com', '8fe2efa0e6bce25d72a9833769fcd487', '2014-09-18', 'User Admin', 'ACTIVE'),
(5, 'estdaillo.marcferdinand', 'marc_estadillo@yahoo.com', 'c28de31ad388b4cbb276448c9c06bc9d', '2014-09-18', 'User Admin', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` varchar(10) NOT NULL,
  `college_name` varchar(60) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`no`, `college_id`, `college_name`) VALUES
(1, 'CMBA', 'College of Management and Business Administration'),
(2, 'CEA', 'College of Engineering and Architecture'),
(3, 'COE', 'College of Education'),
(4, 'CAS', 'College of Arts and Sciences'),
(5, 'CCS', 'College of Computer Studies'),
(6, 'CON', 'College of Nursing');

-- --------------------------------------------------------

--
-- Table structure for table `college_courses`
--

CREATE TABLE IF NOT EXISTS `college_courses` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` varchar(10) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `no_of_years` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `college_courses`
--

INSERT INTO `college_courses` (`no`, `college_id`, `course_id`, `no_of_years`) VALUES
(1, 'CCS', 'BSIT', 4),
(2, 'CCS', 'BSCS', 4),
(3, 'CCS', 'ACT', 2),
(4, 'CEA', 'BSCE', 5),
(5, 'CEA', 'BSME', 5),
(6, 'CON', 'BSN', 4),
(7, 'COE', 'BEED', 4),
(8, 'COE', 'BSEEd', 4),
(9, 'CEA', 'BSArch', 5),
(10, 'CMBA', 'BSA', 4),
(11, 'CMBA', 'BSMA', 4),
(12, 'CAS', 'ABGM', 4),
(13, 'CAS', 'BSBio', 4),
(14, 'CAS', 'BSPsyc', 4),
(15, 'CAS', 'BSM', 4),
(16, 'CEA', 'BSCpE', 5),
(17, 'CEA', 'BSEE', 5),
(18, 'CEA', 'BSIE', 5),
(20, 'CAS', 'ABEng', 4),
(21, 'CAS', 'ABMC', 4),
(22, 'CMBA', 'BSBA-MA', 4),
(23, 'CMBA', 'BSOAd', 4),
(24, 'CMBA', 'BSHRM', 4),
(25, 'CMBA', 'BSTM', 4),
(26, 'CMBA', 'BSAT', 4),
(27, 'CMBA', 'BSPAd', 4),
(29, 'CMBA', 'BSBA-MM', 4),
(33, 'COE', 'BSEEd-GenEd', 4),
(34, 'COE', 'BSEEd-EarEd', 4),
(35, 'COE', 'BSEEd-SpEd', 4),
(36, 'COE', 'BSSE-Eng', 4),
(37, 'COE', 'BSSE-Fil', 4),
(38, 'COE', 'BSSE-Math', 4),
(39, 'COE', 'BSSE-Sci', 4),
(40, 'CEA', 'BSME-Mech', 5),
(41, 'CEA', 'BSEM', 5),
(42, 'CEA', 'BSElecE', 5),
(44, 'CMBA', 'BSBA-QM', 4),
(45, 'CMBA', 'BSBA-BFM', 4),
(46, 'CMBA', 'BSBA-HRM', 4),
(47, 'CMBA', 'AOA', 2),
(48, 'CMBA', 'BSBA-IQM', 5),
(49, 'CEA', 'BSECE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_description` longtext NOT NULL,
  `event_type` varchar(50) NOT NULL DEFAULT 'Official',
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `date_added` date NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_type`, `event_start_date`, `event_end_date`, `date_added`, `admin_username`, `status`) VALUES
(1, 'All Saints Day', 'No classes.', 'Official', '2014-11-01 07:00:00', '2014-11-01 19:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(2, 'All Souls Day', 'No classes.', 'Official', '2014-11-02 07:00:00', '2014-11-02 17:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(3, 'Classes Begin', 'Classes begin for second semester of the school year 2014-2015', 'Official', '2014-11-05 07:00:00', '2014-11-05 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(4, 'Bonifacio Day', 'No classes to commemorate the birthday of Andres Bonifacio.', 'Official', '2014-11-30 07:00:00', '2014-11-30 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(5, 'Founders Day', 'Celebrating the day that the university has been founded.', 'Official', '2014-12-05 07:00:00', '2014-12-06 17:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(6, 'Christmas Vacation', 'Holiday season.', 'Official', '2014-12-21 07:00:00', '2015-01-04 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(7, 'Christmas Eve ', 'Special non-working holiday celebrated world-wide.', 'Official', '2014-12-24 07:00:00', '2014-12-24 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(8, 'Christmas Day', 'Its a holiday. Time to open presents.', 'Official', '2014-12-25 07:00:00', '2014-12-25 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(9, 'Rizal Day', 'Celebrated to commemorate the birthday of our national hero, Dr. Jose Rizal', 'Official', '2014-12-30 07:00:00', '2014-12-30 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(10, 'New Years Eve', 'Special Holiday', 'Official', '2014-12-31 07:00:00', '2014-12-31 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(11, 'New Years Day', 'World-wide Holiday', 'Official', '2015-01-01 07:00:00', '2015-01-01 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(12, 'Classes Resume', 'Start of classes from the holiday season', 'Official', '2015-01-05 07:00:00', '2015-12-20 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(13, 'Feast of StoNino', 'No classes to celebrate Sinulog Festival', 'Official', '2015-01-18 07:00:00', '2015-01-18 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(14, 'Sinulog Rest Day', 'Post Sinulog rest day. No classes', 'Official', '2015-01-19 07:00:00', '2015-11-09 19:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(15, 'Cebu City Charter Day', 'No classes', 'Official', '2015-02-24 07:00:00', '2015-02-24 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(16, 'EDSA Revolution Anniversary', 'No classes', 'Official', '2015-02-25 07:00:00', '2015-02-25 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(17, 'University Days', 'Celebrated to commemorate university days', 'Official', '2015-03-01 07:00:00', '2015-03-02 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(18, 'Parangal', 'Awarding ceremony for honor roll students', 'Official', '2015-03-13 07:00:00', '2015-03-13 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(19, 'Commencement Rites', 'Graduation ceremonies for the 2nd semester of SY 2014-2015', 'Official', '2015-03-21 07:00:00', '2015-03-21 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(20, 'Classes End', 'Classes end for SY 2014-2015', 'Official', '2015-03-21 07:00:00', '2015-03-21 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(22, 'Prelim Exams', 'Prelim exams for the 2nd semester SY 2014-2015', 'Official', '2014-11-29 07:00:00', '2014-12-02 09:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(23, 'Midterm Exams', 'Midterm Exams for the 2nd semester of SY 2014-2015', 'Official', '2015-01-13 07:00:00', '2015-01-17 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(24, 'Pre-final Exams ', 'Pre-final Exams for the 2nd semester of SY 2014-2015', 'Official', '2015-02-12 07:00:00', '2015-02-14 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(25, 'Final Exams Graduating', 'Final exams for graduating students of 2nd semester SY 2014-2015', 'Official', '2015-03-07 07:00:00', '2014-03-10 21:00:00', '2014-09-13', 'laviste.ralph', 'ACTIVE'),
(26, 'Finals for Non Graduating Students', 'Final exam for non-graduating students 1st sem SY 2014-2015', 'Official', '2015-03-17 08:00:00', '2015-03-21 08:00:00', '2014-10-14', 'laviste.ralph', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `event_receivers`
--

CREATE TABLE IF NOT EXISTS `event_receivers` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `event_id` int(255) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_course` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id_no` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `course` varchar(12) NOT NULL,
  `year` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id_no`, `username`, `fname`, `lname`, `course`, `year`, `email`, `password`, `last_login`, `status`) VALUES
('13-0001-001', 'miranda.lotto', 'Miranda', 'Lotto', 'BSEE', 2, 'miranda@email.com', '123', '2014-09-13 19:02:13', 'ACTIVE'),
('13-0024-486', 'charlotte.dunois', 'Charlotte', 'Dunois', 'BSElecE', 2, 'charlotte@email.com', '123', '2014-09-13 18:30:15', 'ACTIVE'),
('13-0103-453', 'houki', 'Houki', 'Shinonono', 'BSElecE', 2, 'houki@email.com', '123', '2014-09-13 18:49:36', 'ACTIVE'),
('13-0367-132', 'iantorres', 'Ian Ishmael', 'Torres', 'BSME', 2, 'ian@gmail.com', '123', '2014-09-13 14:51:22', 'ACTIVE'),
('13-2000-139', 'james.kueller', 'James', 'Kueller', 'BSBA-MA', 2, 'james@email.com', '123', '2014-09-16 16:32:05', 'ACTIVE'),
('13-2011-113', 'jessica.wells', 'Jessica', 'Wells', 'BSA', 2, 'jessica@email.com', '123', '2014-09-16 16:23:38', 'ACTIVE'),
('13-2248-023', 'robert.webb', 'Robert', 'Webb', 'BSBA-QM', 2, 'glenn@email.com', '123', '2014-09-16 09:02:08', 'ACTIVE'),
('13-3018-111', 'robert.hawes', 'Robert', 'Hawes', 'BSHRM', 2, 'robert@email.com', '123', '2014-09-16 16:27:43', 'ACTIVE'),
('13-3100-333', 'margaret.newell', 'Margaret', 'Newell', 'BSOAd', 2, 'margaret@email.com', '123', '2014-09-16 16:40:35', 'ACTIVE'),
('13-3337-155', 'donald.morgan', 'Donald', 'Morgan', 'BSPsyc', 2, 'donald@email.com', '123', '2014-09-14 19:13:53', 'ACTIVE'),
('13-3801-747', 'randall.roberts', 'Randall', 'Roberts', 'BSN', 2, 'randall@email.com', '123', '2014-09-16 17:13:43', 'ACTIVE'),
('13-3880-888', 'william.andrews', 'William', 'Andrews', 'BSEEd-GenEd', 2, 'will.andrews@email.com', '123', '2014-09-16 17:07:54', 'ACTIVE'),
('13-4001-910', 'gregory.martinez', 'Gregory', 'Martinez', 'BSTM', 2, 'gregory@email.com', '123', '2014-09-16 16:14:07', 'ACTIVE'),
('13-4131-001', 'melanie.duncan', 'Melanie', 'Duncan', 'BSMA', 2, 'melanie@email.com', '123', '2014-09-16 16:17:37', 'ACTIVE'),
('13-4410-111', 'gloria.kirkpatrick', 'Gloria', 'Kirkpatrick', 'BSEEd-EarEd', 2, 'gloria@email.com', '123', '2014-09-16 17:04:59', 'ACTIVE'),
('13-4682-160', 'reiner.braun', 'Reiner', 'Braun', 'BSIE', 2, 'armored@titan.com', '123', '2014-09-13 19:25:36', 'ACTIVE'),
('13-4683-561', 'satella.bridget', 'Satella', 'el Bridgette', 'BSArch', 2, 'satella@email.com', '123', '2014-09-13 18:13:07', 'ACTIVE'),
('13-4684-101', 'eren.jaegar', 'Eren', 'Jaegar', 'BSIE', 2, 'jaegar@titan.com', '123', '2014-09-13 19:23:33', 'ACTIVE'),
('13-4800-422', 'rosa.branan', 'Rosa', 'Branan', 'BSAT', 2, 'rosa@email.com', '123', '2014-09-16 09:34:54', 'ACTIVE'),
('13-4800-881', 'mary.morris', 'Mary', 'Morris', 'BSSE-Math', 2, 'mary@email.com', '123', '2014-09-16 16:55:24', 'ACTIVE'),
('13-4812-460', 'cassie.lockheart', 'Cassie', 'Lockheart', 'BSArch', 2, 'cassie@email.com', '123', '2014-09-13 18:37:06', 'ACTIVE'),
('13-4849-999', 'michelle.young', 'Michelle', 'Young', 'ABEng', 3, 'mich@email.com', '123', '2014-09-14 19:05:22', 'ACTIVE'),
('13-4859-859', 'teresa.romero', 'Terasa', 'Romero', 'ABMC', 2, 'teresa@email.com', '123', '2014-09-14 19:01:46', 'ACTIVE'),
('13-4902-391', 'hellen.brinton', 'Hellen', 'Brinton', 'BSBA-BFM', 2, 'hellen@email.com', '123', '2014-09-15 12:39:26', 'ACTIVE'),
('13-4920-974', 'annette.crisp', 'Annette', 'Crisp', 'BSBA-IQM', 2, 'annette@email.com', '123', '2014-09-16 08:29:18', 'ACTIVE'),
('13-5792-760', 'audrey.duval', 'Audrey', 'Duval', 'BSArch', 2, 'audrey@email.com', '123', '2014-09-13 18:35:40', 'ACTIVE'),
('13-6243-521', 'lingying.huang', 'Lingying', 'Huang', 'BSElecE', 2, 'lingying@email.com', '123', '2014-09-13 18:48:19', 'ACTIVE'),
('13-7003-003', 'howard.link', 'Howard', 'Link', 'BSEE', 2, 'howard@email.com', '123', '2014-09-13 19:01:29', 'ACTIVE'),
('13-7008-771', 'michael.markham', 'Michael', 'Markham', 'BSEEd-SpEd', 2, 'markham@email.com', '123', '2014-09-16 17:01:37', 'ACTIVE'),
('13-7139-503', 'cecilia', 'Cecilia', 'Alcott', 'BSElecE', 2, 'cecilia@email.com', '123', '2014-09-13 18:40:55', 'ACTIVE'),
('13-7504-945', 'kira.asato', 'Kira', 'Asato', 'ACT', 2, 'kira@email.com', '123', '2014-09-13 18:00:07', 'ACTIVE'),
('13-7923-540', 'laura.bodewig', 'Laura', 'Bodewig', 'BSElecE', 2, 'laura@email.com', '123', '2014-09-13 18:45:10', 'ACTIVE'),
('13-8080-909', 'reever.wenhamm', 'Reever', 'Wenhamm', 'BSEE', 2, 'reever@email.com', '123', '2014-09-13 19:06:20', 'ACTIVE'),
('13-8419-853', 'richard.richman', 'Richard', 'Richman', 'ACT', 2, 'richard@email.com', '123', '2014-09-13 17:54:05', 'ACTIVE'),
('13-8457-493', 'kate.summers', 'Kate', 'Summers', 'ACT', 2, 'kate@email.com', '123', '2014-09-13 18:01:18', 'ACTIVE'),
('13-8480-329', 'charles.ayala', 'Charles', 'Ayala', 'BSSE-Fil', 2, 'charles.ayala@email.com', '123', '2014-09-16 17:10:35', 'ACTIVE'),
('13-8490-033', 'terrance.deardorff', 'Terrance', 'Deardorff', 'BSEE', 2, 'terrance@email.com', '123', '2014-09-14 19:21:46', 'ACTIVE'),
('13-8490-975', 'james.erskine', 'Jame', 'Erskine', 'BSBio', 2, 'james@email.com', '123', '2014-09-14 18:51:48', 'ACTIVE'),
('13-8491-110', 'james.harrison', 'James', 'Harrison', 'BSBA-MM', 2, 'jharrison@email.com', '123', '2014-09-15 12:30:50', 'ACTIVE'),
('13-8943-777', 'eld.jinn', 'Eld', 'Jinn', 'BSME', 2, 'eld@email.com', '123', '2014-09-13 19:41:02', 'ACTIVE'),
('13-9033-003', 'michele.hoye', 'Michele', 'Hoye', 'BEED', 2, 'michele@email.com', '123', '2014-09-16 16:44:08', 'ACTIVE'),
('13-9077-894', 'christopher.sexton', 'Christopher', 'Sexton', 'BSSE-Sci', 2, 'chris.sexton@email.com', '123', '2014-09-16 16:51:34', 'ACTIVE'),
('13-9400-999', 'darin.ross', 'Darin', 'Ross', 'BSEEd', 2, 'darin@email.com', '123', '2014-09-16 16:48:37', 'ACTIVE'),
('13-9700-949', 'kathleen.hanson', 'Kathleen', 'Hanson', 'BSBA-HRM', 2, 'kathleen@email.com', '123', '2014-09-16 08:21:34', 'ACTIVE'),
('13-9740-949', 'karen.wells', 'Karen', 'Wells', 'AOA', 2, 'karen@email.com', '123', '2014-09-15 12:54:48', 'ACTIVE'),
('13-9743-900', 'dale.ayers', 'Dale', 'Ayers', 'BSEM', 2, 'dale@email.com', '123', '2014-09-14 18:40:58', 'ACTIVE'),
('13-9745-947', 'kirito', 'Kirigaya', 'Kazuto', 'ACT', 2, 'kirito@ggo.com', '123', '2014-09-13 17:55:46', 'ACTIVE'),
('13-9880-733', 'lynn.thompson', 'Lynn', 'Thompson', 'BSM', 3, 'lynn@email.com', '123', '2014-09-14 19:10:29', 'ACTIVE'),
('14-0001-101', 'mitabi.jarnach', 'Mitabi', 'Jarnach', 'BSME', 1, 'mitabi@email.com', '123', '2014-09-13 19:39:39', 'ACTIVE'),
('14-0748-497', 'amy.britt', 'Amy', 'Britt', 'AOA', 1, 'amy@email.com', '123', '2014-09-15 12:54:18', 'ACTIVE'),
('14-0840-838', 'james.aguilar', 'James', 'Aguilar', 'BSBA-MM', 1, 'james@email.com', '123', '2014-09-15 12:30:03', 'ACTIVE'),
('14-1200-100', 'christen.burrus', 'Christen', 'Burrus', 'BEED', 1, 'christen@email.com', '123', '2014-09-16 16:43:31', 'ACTIVE'),
('14-1231-123', 'justin.gardner', 'Justin', 'Gardner', 'BSMA', 1, 'justin@email.com', '123', '2014-09-16 16:16:42', 'ACTIVE'),
('14-2002-130', 'bertolt.hoover', 'Bertolt', 'Hoover', 'BSIE', 1, 'colossal@titan.com', '123', '2014-09-13 19:28:31', 'ACTIVE'),
('14-2239-111', 'david.muñoz', 'David', 'Muñoz', 'BSEEd-SpEd', 1, 'david@email.com', '123', '2014-09-16 17:00:45', 'ACTIVE'),
('14-2321-113', 'sandra.humphreys', 'Sandra', 'Humphreys', 'BSTM', 1, 'sandra@email.com', '123', '2014-09-16 16:12:54', 'ACTIVE'),
('14-2331-129', 'amy.flaherty', 'Amy', 'Flaherty', 'BSPad', 1, 'amy@email.com', '123', '2014-09-16 09:05:04', 'ACTIVE'),
('14-2683-790', 'r.malcolm', 'Rouvelier', 'Malcolm', 'BSEE', 1, 'rouvelier@email.com', '123', '2014-09-13 19:03:26', 'ACTIVE'),
('14-2900-119', 'cheseatorres', 'Fatima Chesea', 'Torres', 'BSA', 4, 'chelsea_torres93@yahoo.com', '123', '2014-09-13 14:51:57', 'ACTIVE'),
('14-3000-310', 'christa.whitlow', 'Christa', 'Whitlow', 'BSEEd', 1, 'christa@email.com', '123', '2014-09-16 16:48:01', 'ACTIVE'),
('14-3010-301', 'margaret.jackson', 'Margaret', 'Jackson', 'BSHRM', 1, 'margaret@email.com', '123', '2014-09-16 16:27:05', 'ACTIVE'),
('14-3384-232', 'glenn.smith', 'Glenn', 'Smith', 'BSBA-QM', 1, 'glenn@email.com', '123', '2014-09-16 09:01:06', 'ACTIVE'),
('14-3576-468', 'arthur.crypton', 'Arthur', 'Crypton', 'BSArch', 1, 'arthur@email.com', '123', '2014-09-13 18:17:55', 'ACTIVE'),
('14-3701-911', 'tia.watters', 'Tia', 'Watters', 'BSAT', 1, 'tia@email.com', '123', '2014-09-16 09:34:21', 'ACTIVE'),
('14-3800-480', 'dianne.hayes', 'Dianne', 'Hayes', 'BSSE-Math', 1, 'dianne@email.com', '123', '2014-09-16 16:56:39', 'ACTIVE'),
('14-3800-880', 'ralph.allen', 'Ralph', 'Allen', 'BSEEd-EarEd', 1, 'ralph@email.com', '123', '2014-09-16 17:04:11', 'ACTIVE'),
('14-3900-110', 'anton.gray', 'Antonio', 'Gray', 'BSBA-MA', 1, 'antonio@email.com', '123', '2014-09-16 16:31:20', 'ACTIVE'),
('14-3900-980', 'ed.ross', 'Edward', 'Ross', 'BSSE-Math', 1, 'edward@email.com', '123', '2014-09-16 16:54:08', 'ACTIVE'),
('14-3901-120', 'chieko.williams', 'Chieko', 'Williams', 'BSOAd', 1, 'chieko@email.com', '123', '2014-09-16 16:34:34', 'ACTIVE'),
('14-3902-120', 'maya.ibarra', 'Maya', 'Ibarra', 'BSA', 1, 'maya@email.com', '123', '2014-09-16 16:22:59', 'ACTIVE'),
('14-3907-023', 'carl.alford', 'Carl', 'Alford', 'BSSE-Sci', 1, 'carl@email.com', '123', '2014-09-16 16:50:56', 'ACTIVE'),
('14-3980-180', 'casey.odoms', 'Casey', 'Odoms', 'BSEEd-GenEd', 1, 'casey@email.com', '123', '2014-09-16 16:58:43', 'ACTIVE'),
('14-4800-188', 'ashley.petrie', 'Ashley', 'Petrie', 'BSEEd-GenEd', 1, 'ashley@email.com', '123', '2014-09-16 17:06:55', 'ACTIVE'),
('14-4859-937', 'mana.walker', 'Mana', 'Walker', 'ACT', 1, 'mana@email.com', '123', '2014-09-13 17:58:36', 'ACTIVE'),
('14-5620-001', 'diasya.barry', 'Daisya', 'Barry', 'BSCpE', 1, 'daisya@email.com', '123', '2014-09-13 18:55:32', 'ACTIVE'),
('14-5621-001', 'crow.aleister', 'Crowley', 'Aleister', 'BSCpE', 1, 'aleister@email.com', '123', '2014-09-13 18:57:23', 'ACTIVE'),
('14-7038-808', 'jake.russel', 'Jake', 'Russel', 'BSEE', 1, 'jake@email.com', '123', '2014-09-13 19:04:44', 'ACTIVE'),
('14-7300-007', 'road.kamelot', 'Road', 'Kamelot', 'BSCpE', 1, 'road@email.com', '123', '2014-09-13 18:59:01', 'ACTIVE'),
('14-7613-490', 'allen.walker', 'Allen', 'Walker', 'BSCpE', 1, 'allen@email.com', '123', '2014-09-13 18:52:53', 'ACTIVE'),
('14-7773-892', 'johnny.gill', 'Johnny', 'Gill', 'BSCpE', 1, 'johnny@email.com', '123', '2014-09-13 18:58:15', 'ACTIVE'),
('14-8482-839', 'stacy.patel', 'Stacy', 'Patel', 'BSBA-HRM', 1, 'stacy@email.com', '123', '2014-09-16 08:19:32', 'ACTIVE'),
('14-8490-111', 'alice.chacon', 'Alice', 'Chacon', 'ABEng', 1, 'alice@email.com', '123', '2014-09-14 19:04:48', 'ACTIVE'),
('14-8653-468', 'chiffon.fairchild', 'Chiffon', 'Fairchild', 'BSArch', 1, 'chiffon@email.com', '123', '2014-09-13 18:14:41', 'ACTIVE'),
('14-8804-111', 'maria.jackson', 'Maria', 'Jackson', 'BSSE-Fil', 1, 'maria@email.com', '123', '2014-09-16 17:09:46', 'ACTIVE'),
('14-8849-011', 'steven.calhoun', 'Steven', 'Calhoun', 'BSPsyc', 1, 'steven@email.com', '123', '2014-09-14 19:13:08', 'ACTIVE'),
('14-88499-971', 'jamie.key', 'Jamie', 'Key', 'BSM', 1, 'jamie@email.com', '123', '2014-09-14 19:09:50', 'ACTIVE'),
('14-8902-974', 'michael.melton', 'Michael', 'Melton', 'BSBA-IQM', 1, 'mike.melton@email.com', '123', '2014-09-16 08:28:39', 'ACTIVE'),
('14-8945-098', 'crystal.griffith', 'Crystal', 'Griffith', 'ABMC', 1, 'crystal@email.com', '123', '2014-09-14 19:00:20', 'ACTIVE'),
('14-9790-776', 'james.gonzales', 'James', 'Gonzales', 'ABGM', 1, 'james@email.com', '123', '2014-09-14 19:17:20', 'ACTIVE'),
('2009-84791', 'gary.robinson', 'Gary', 'Robinson', 'BSEE', 5, 'gary@email.com', '123', '2014-09-14 19:19:55', 'ACTIVE'),
('2010-00310', 'eileen.white', 'Eileen', 'White', 'BSOAd', 4, 'eileen@email.com', '123', '2014-09-16 16:42:28', 'ACTIVE'),
('2010-12345', 'sofiavergara', 'Sofia', 'Vergara', 'BSIT', 4, 'sofiav@yahoo.com', '123', '2014-09-21 19:08:30', 'ACTIVE'),
('2010-48801', 'roy.burgess', 'Roy', 'Burgess', 'BSEEd-GenEd', 4, 'roy@email.com', '123', '2014-09-16 17:09:01', 'ACTIVE'),
('2010-83940', 'june.stevens', 'June', 'Stevens', 'BSN', 3, 'june@email.com', '123', '2014-09-16 17:14:22', 'ACTIVE'),
('2010-84011', 'ruth.warren', 'Ruth', 'Warren', 'BSEEd-SpEd', 3, 'ruth@email.com', '123', '2014-09-16 16:58:05', 'ACTIVE'),
('2010-84012', 'caryl.temple', 'Caryl', 'Temple', 'BSEEd-GenEd', 3, 'caryl@email.com', '123', '2014-09-16 17:05:49', 'ACTIVE'),
('2010-84939', 'christopher.gomez', 'Christopher', 'Gomez', 'AOA', 4, 'christopher@email.com', '123', '2014-09-15 12:56:07', 'ACTIVE'),
('2010-94840', 'ken.borden', 'Kenneth', 'Borden', 'ABGM', 3, 'kenneth@email.com', '123', '2014-09-14 19:16:31', 'ACTIVE'),
('2011-00003', 'thomas.wagner', 'Thomas', 'Wagner', 'BSME-Mech', 4, 'wagner@email.com', '123', '2014-09-13 19:51:29', 'ACTIVE'),
('2011-00004', 'darius.zackly', 'Darius', 'Zackly', 'BSME-Mech', 4, 'darius@email.com', '123', '2014-09-13 19:49:45', 'ACTIVE'),
('2011-00005', 'hanji.zoe', 'Hanji', 'Zoe', 'BSME-Mech', 4, 'hanji@email.com', '123', '2014-09-13 19:46:56', 'ACTIVE'),
('2011-00006', 'mike.zach', 'Mike', 'Zacharias', 'BSME-Mech', 4, 'zach@email.com', '123', '2014-09-13 19:48:45', 'ACTIVE'),
('2011-00030', 'jean.kirstein', 'Jean', 'Kirstein', 'BSME', 4, 'jean@email.com', '123', '2014-09-13 19:35:26', 'ACTIVE'),
('2011-00065', 'klaud.nine', 'Klaud', 'Nine', 'BSIE', 4, 'klaud@email.com', '123', '2014-09-13 19:20:08', 'ACTIVE'),
('2011-00460', 'froi.teidoll', 'Froi', 'Teidoll', 'BSECE', 4, 'froi@email.com', '123', '2014-09-13 19:12:24', 'ACTIVE'),
('2011-00703', 'pmticar', 'Paul Michael', 'Ticar', 'BSIT', 4, 'pmt@email.com', '123', '2014-09-13 17:34:46', 'ACTIVE'),
('2011-00760', 'cross.marian', 'Cross', 'Marian', 'BSIE', 4, 'cross@email.com', '123', '2014-09-13 19:18:57', 'ACTIVE'),
('2011-00762', 'claudia.sardini', 'Claudia', 'Sardini', 'BSECE', 4, 'claudia@email.com', '123', '2014-09-13 19:14:45', 'ACTIVE'),
('2011-010395', 'leopoldfitz', 'Leopold', 'Fitz', 'BSA', 4, 'leopoldfitz@yahoo.com', '123', '0000-00-00 00:00:00', 'ACTIVE'),
('2011-01139', 'kim.rodriguez', 'Kimberly', 'Rodriguez', 'BSHRM', 4, 'kimberly@email.com', '123', '2014-09-16 16:28:53', 'ACTIVE'),
('2011-01190', 'dwayne.aaron', 'Dwayne', 'Aaron', 'BSMA', 4, 'dwayne@email.com', '123', '2014-09-16 16:22:24', 'ACTIVE'),
('2011-01981', 'jamtorres', 'Jameela Lourdes', 'Torres', 'BSIT', 4, 'abc@yahoo.com', '123', '2014-09-13 14:50:39', 'ACTIVE'),
('2011-09401', 'mark.arechiga', 'Mark', 'Arechiga', 'BEED', 3, 'mark@email.com', '123', '2014-09-16 16:45:18', 'ACTIVE'),
('2011-11380', 'malcolm.parker', 'Malcolm', 'Parker', 'BSEEd-SpEd', 4, 'malcolm@email.com', '123', '2014-09-16 17:02:18', 'ACTIVE'),
('2011-12001', 'tom.parker', 'Thomas', 'Parker', 'BEED', 4, 'thomas@email.com', '123', '2014-09-16 16:46:00', 'ACTIVE'),
('2011-13301', 'mercy.waller', 'Mercy', 'Waller', 'BSEEd-EarEd', 4, 'mercy@email.com', '123', '2014-09-16 17:03:33', 'ACTIVE'),
('2011-22338', 'earleen.zaragoza', 'Earleen', 'Zaragoza', 'BSTM', 4, 'earleen@email.com', '123', '2014-09-16 16:15:39', 'ACTIVE'),
('2011-22370', 'sonya.cross', 'Sonya', 'Cross', 'BSBA-QM', 4, 'sonya@email.com', '123', '2014-09-16 09:03:37', 'ACTIVE'),
('2011-30081', 'gene.oaks', 'Gene', 'Oaks', 'BSBA-MA', 4, 'gene@email.com', '123', '2014-09-16 16:33:40', 'ACTIVE'),
('2011-31311', 'harrypotter', 'Harry', 'Potter', 'BSIT', 4, 'harry@yahoo.com', '123', '0000-00-00 00:00:00', 'ACTIVE'),
('2011-31321', 'delores.westerlund', 'Delores', 'Westerlund', 'BSA', 4, 'delores@email.com', '123', '2014-09-16 16:25:53', 'ACTIVE'),
('2011-32908', 'william.beers', 'William', 'Beers', 'BSBA-IQM', 4, 'william.beers@email.com', '123', '2014-09-16 08:30:50', 'ACTIVE'),
('2011-34801', 'jesse.johnson', 'Jesse', 'Johnson', 'BSN', 4, 'jesse@email.com', '123', '2014-09-16 17:12:57', 'ACTIVE'),
('2011-34910', 'kathryn.crouch', 'Kathryn', 'Crouch', 'BSEEd-SpEd', 4, 'kathryn@email.com', '123', '2014-09-16 16:59:31', 'ACTIVE'),
('2011-37371', 'willie.saunders', 'Willie', 'Saunders', 'BSSE-Fil', 4, 'willie@email.com', '123', '2014-09-16 17:12:03', 'ACTIVE'),
('2011-39990', 'richard.hornick', 'Richard', 'Hornick', 'BSEM', 4, 'richard@someone.com', '123', '2014-09-14 18:43:23', 'ACTIVE'),
('2011-40069', 'sokaro.winters', 'Sokaro', 'Winters', 'BSECE', 4, 'sokaro@email.com', '123', '2014-09-13 19:13:50', 'ACTIVE'),
('2011-46200', 'marie.noise', 'Marie', 'Noise', 'BSECE', 4, 'marie@email.com', '123', '2014-09-13 19:15:48', 'ACTIVE'),
('2011-46431', 'tykki.mykk', 'Tykki', 'Mykk', 'BSCE', 4, 'tykki@email.com', '123', '2014-09-13 18:03:37', 'ACTIVE'),
('2011-46513', 'barry.manillow', 'Barry', 'Manillow', 'BSCE', 4, 'barry@email.com', '123', '2014-09-13 18:06:46', 'ACTIVE'),
('2011-46731', 'kevin.parilla', 'Kevin', 'Parilla', 'BSCS', 4, 'kevin@email.com', '123', '2014-09-13 17:49:10', 'ACTIVE'),
('2011-46823', 'flappyberg', 'Engelberg', 'Ibarra', 'BSIT', 4, 'fberg@email.com', '123', '2014-09-13 17:42:57', 'ACTIVE'),
('2011-46843', 'ddraig', 'Ddraig', 'Longinus', 'BSCE', 4, 'boost@email.com', '123', '2014-09-13 18:10:51', 'ACTIVE'),
('2011-46873', 'albion', 'Albion', 'Longinus', 'BSCE', 4, 'albion@email.com', '123', '2014-09-13 18:08:24', 'ACTIVE'),
('2011-49130', 'kevin.jaegar', 'Kevin', 'Jaegar', 'BSECE', 4, 'k.jaegar@email.com', '123', '2014-09-13 19:11:00', 'ACTIVE'),
('2011-54298', 'dconspiracy', 'Donraedel', 'Sumayan', 'BSIT', 4, 'dsumayan@email.com', '123', '2014-09-13 17:40:43', 'ACTIVE'),
('2011-56871', 'dunhill.caylan', 'Dunhill Mar Louizze', 'Caylan', 'BSCS', 4, 'dunhill@email.com', '123', '2014-09-13 17:44:47', 'ACTIVE'),
('2011-57413', 'van.betonio', 'Eugene Van', 'Betonio', 'BSCS', 4, 'eugene@email.com', '123', '2014-09-13 17:47:02', 'ACTIVE'),
('2011-70001', 'jamesbond', 'James', 'Bond', 'BSIT', 4, 'james@yahoo.com', '123', '0000-00-00 00:00:00', 'ACTIVE'),
('2011-77613', 'sam.cruz', 'Sam Christopher', 'Cruz', 'BSCS', 4, 'sam@email.com', '123', '2014-09-13 17:46:14', 'ACTIVE'),
('2011-83167', 'noedig', 'Gideon', 'Bautista', 'BSCS', 4, 'gideon@email.com', '123', '2014-09-13 17:48:28', 'ACTIVE'),
('2011-84001', 'cathy.davies', 'Cathy', 'Davies', 'BSAT', 4, 'cathy@email.com', '123', '2014-09-16 09:43:24', 'ACTIVE'),
('2011-84999', 'irene.rush', 'Irene', 'Rush', 'ABMC', 4, 'irence@email.com', '123', '2014-09-14 19:03:30', 'ACTIVE'),
('2011-85923', 'edoin', 'Edwin', 'Langga', 'BSIT', 4, 'edoin@email.com', '123', '2014-09-13 17:35:28', 'ACTIVE'),
('2011-88800', 'noah.pilgrim', 'Noah', 'Pilgrim', 'BSM', 4, 'noah@email.com', '123', '2014-09-14 19:11:34', 'ACTIVE'),
('2011-89990', 'phillip.robles', 'Phillip', 'Robles', 'ABEng', 4, 'phillip@email.com', '123', '2014-09-14 19:07:03', 'ACTIVE'),
('2011-94001', 'shella.stover', 'Shella', 'Stover', 'BSSE-Sci', 4, 'shella@email.com', '123', '2014-09-16 16:52:18', 'ACTIVE'),
('2011-94410', 'donna.rathbun', 'Donna', 'Rathbun', 'BSBA-MM', 4, 'donna@email.com', '123', '2014-09-15 12:32:42', 'ACTIVE'),
('2011-94801', 'arleen.odgen', 'Arleen', 'Odgen', 'BSPsyc', 4, 'arleen@email.com', '123', '2014-09-14 19:12:29', 'ACTIVE'),
('2011-94902', 'edna.smith', 'Edna', 'Smith', 'BSBA-HRM', 4, 'edna@email.com', '123', '2014-09-16 08:24:07', 'ACTIVE'),
('2011-94911', 'leslie.cahoon', 'Leslie', 'Cahoon', 'BSBA-BFM', 4, 'leslie@email.com', '123', '2014-09-15 12:40:35', 'ACTIVE'),
('2011-95759', 'michael.caldwell', 'Michael', 'Caldwell', 'BSEE', 4, 'michael@email.com', '123', '2014-09-14 19:19:17', 'ACTIVE'),
('2011-97000', 'jo.delacruz', 'Jo', 'dela Cruz', 'BSBio', 4, 'jo@email.com', '123', '2014-09-14 18:57:48', 'ACTIVE'),
('2011-97770', 'kendall.tack', 'Kendall', 'Tack', 'ABGM', 4, 'kendall@email.com', '123', '2014-09-14 19:15:13', 'ACTIVE'),
('2011-99408', 'yesenia.rodriguez', 'Yesenia', 'Rodriguez', 'BSPad', 4, 'yesenia@email.com', '123', '2014-09-16 09:07:22', 'ACTIVE'),
('2012-00010', 'stephen.bohn', 'Stephen', 'Bohn', 'BEED', 3, 'stephen@email.com', '123', '2014-09-16 16:44:44', 'ACTIVE'),
('2012-00138', 'william.norton', 'William', 'Norton', 'BSBA-MA', 3, 'william@email.com', '123', '2014-09-16 16:32:47', 'ACTIVE'),
('2012-04904', 'joseph.almanzar', 'Jospeh', 'Almanzar', 'BSBA-MM', 3, 'joseph@email.com', '123', '2014-09-15 12:32:00', 'ACTIVE'),
('2012-08809', 'jesus.deal', 'Jesus', 'Deal', 'BSBio', 3, 'jesus@email.com', '123', '2014-09-14 18:54:57', 'ACTIVE'),
('2012-08870', 'alex.palmer', 'Alexandria', 'Palmer', 'ABMC', 3, 'alex@email.com', '123', '2014-09-14 19:02:24', 'ACTIVE'),
('2012-09110', 'georgia.truesdell', 'Georgia', 'Truesdell', 'BSOAd', 3, 'georgia@email.com', '123', '2014-09-16 16:41:44', 'ACTIVE'),
('2012-12112', 'james0102', 'James', 'Bond', 'BSCE', 3, 'jamesgwapo@yahoo.com', '123', '2014-09-13 14:54:15', 'ACTIVE'),
('2012-12388', 'alex.jackson', 'Alexandra', 'Jackson', 'BSPad', 3, 'alex@email.com', '123', '2014-09-16 09:06:17', 'ACTIVE'),
('2012-13930', 'kevin.scott', 'Kevin', 'Scott', 'BSA', 3, 'kevin@email.com', '123', '2014-09-16 16:25:10', 'ACTIVE'),
('2012-23130', 'michael.starr', 'Michael', 'Starr', 'BSTM', 3, 'mike.starr@email.com', '123', '2014-09-16 16:14:49', 'ACTIVE'),
('2012-31009', 'antoinette.breeden', 'Antoinette', 'Breeden', 'BSMA', 3, 'antoinette@email.com', '123', '2014-09-16 16:20:24', 'ACTIVE'),
('2012-39011', 'rachel.eslinger', 'Rachel', 'Eslinger', 'BSBA-BFM', 3, 'rachel@email.com', '123', '2014-09-15 12:39:59', 'ACTIVE'),
('2012-39759', 'romil.acero', 'Romil', 'Acero', 'BSME-Mech', 3, 'romil@email.com', '123', '2014-09-14 18:32:27', 'ACTIVE'),
('2012-46201', 'annie.leoneheart', 'Annie', 'Leoneheart', 'BSME', 3, 'annie@email.com', '123', '2014-09-13 19:43:18', 'ACTIVE'),
('2012-48011', 'bruce.evans', 'Bruce', 'Evans', 'BSSE-Math', 3, 'bruce@email.com', '123', '2014-09-16 16:54:48', 'ACTIVE'),
('2012-48320', 'krista.lenz', 'Krista', 'Lenz', 'BSME', 3, 'krista@email.com', '123', '2014-09-13 19:42:03', 'ACTIVE'),
('2012-49801', 'yvonne.willard', 'Yvonne', 'Willard', 'BSEEd', 3, 'yvonne@email.com', '123', '2014-09-16 16:49:16', 'ACTIVE'),
('2012-74937', 'charles.mceachern', 'Charles', 'McEachern', 'BSBA-QM', 3, 'charles@email.com', '123', '2014-09-16 09:02:58', 'ACTIVE'),
('2012-84700', 'jasmine.schlegel', 'Jasmine', 'Schlegel', 'BSAT', 3, 'jasmine@email.com', '123', '2014-09-16 09:37:45', 'ACTIVE'),
('2012-84980', 'sarah.bruce', 'Sarah', 'Bruce', 'BSBA-HRM', 3, 'sarah@email.com', '123', '2014-09-16 08:22:36', 'ACTIVE'),
('2012-89408', 'dana.blackwell', 'Dana', 'Blackwell', 'BSBA-IQM', 3, 'dana@email.com', '123', '2014-09-16 08:29:59', 'ACTIVE'),
('2012-89420', 'patricia.booth', 'Patricia', 'Booth', 'AOA', 3, 'patricia@email.com', '123', '2014-09-15 12:55:21', 'ACTIVE'),
('2012-90181', 'anita.thompson', 'Anita', 'Thompson', 'BSHRM', 3, 'anita@email.com', '123', '2014-09-16 16:28:18', 'ACTIVE'),
('2012-97480', 'susan.stoker', 'Susan', 'Stoker', 'BSEM', 3, 'susan@email.com', '123', '2014-09-14 18:41:28', 'ACTIVE'),
('2012-97999', 'eric.stout', 'Eric', 'Stout', 'ABEng', 3, 'eric@email.com', '123', '2014-09-14 19:06:16', 'ACTIVE'),
('2014-19390', 'clarence.matthews', 'Clarence', 'Matthews', 'BSEEd', 4, 'clarence@email.com', '123', '2014-09-16 16:49:57', 'ACTIVE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
