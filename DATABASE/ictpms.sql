-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 09:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ictpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_plan`
--

CREATE TABLE IF NOT EXISTS `action_plan` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(22) NOT NULL,
  `date` varchar(255) NOT NULL,
  `recommend` text NOT NULL,
  `plan` text NOT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `action_plan`
--

INSERT INTO `action_plan` (`action_id`, `standard_code`, `date`, `recommend`, `plan`) VALUES
(3, 'CC-01', 'June 25 2019', ' It is located in conducive environment', 'it will be staged to be implemented soon'),
(6, 'CC-01', 'July 10 2019', 'null', 'We need to investigate how to implement that standard assessment recommendation'),
(32, 'CC-01', 'July 10 2019', 'null', 'we are trying ourselves  to reach the target, right now we are waiting government to provides other staff personel');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_details`
--

CREATE TABLE IF NOT EXISTS `assessment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(33) NOT NULL,
  `date` varchar(33) NOT NULL,
  `do` text NOT NULL,
  `level_achieved` varchar(67) NOT NULL,
  `comment` text NOT NULL,
  `month` varchar(67) NOT NULL,
  `year` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `assessment_details`
--

INSERT INTO `assessment_details` (`id`, `standard_code`, `date`, `do`, `level_achieved`, `comment`, `month`, `year`) VALUES
(25, 'CC-01', '2019-06-19', '  uses interpersonal communication skills during the entire visit of a patient', 'Yes', 'null', 'Jun', '2019'),
(26, 'CC-01', '2019-06-20', ' Assures client of confidentiality', 'Yes', ' It is located in conducive environment', 'Jun', '2019'),
(27, 'CC-01', '2019-06-20', '  uses interpersonal communication skills during the entire visit of a patient', 'Yes', ' It has been observed that healthy workers undergo communication skill training for better patient persuation', 'Jun', '2019'),
(28, 'CC-01', '2019-06-20', '  Confirms that the client has come cervical cancer prevention', 'Yes', ' most healthy leave the client in suspension since they have nothing to assures real measures to prevent cancer diseases', 'Jun', '2019'),
(29, 'FANC-01', '2019-06-20', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', ' however, supporting staff are few compared to the number of patients received per day', 'Jun', '2019'),
(30, 'FANC-01', '2019-06-20', '  Provider/ recerptionist asks the pregnant woman upon her arrival in the hospital whether she  has or had any danger symptoms/signs ', 'Yes', ' It is efficiently implemented', 'Jun', '2019'),
(31, 'CC-01', '2019-06-25', ' Assures client of confidentiality', 'No', ' hhhdhhdhd', 'Jun', '2019'),
(32, 'CC-01', '2019-07-10', ' Assures client of confidentiality', 'Yes', ' it should be maintained, however, there is need to relocate the offices far away from hospital entry door', 'Jul', '2019'),
(33, 'CC-01', '2019-07-10', '  uses interpersonal communication skills during the entire visit of a patient', 'Yes', ' It is being practised as mandated by our ministry', 'Jul', '2019'),
(34, 'CC-01', '2019-07-10', ' Assures client of confidentiality', 'No', ' it ooooo', 'Jul', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_rules`
--

CREATE TABLE IF NOT EXISTS `assessment_rules` (
  `assessment_relus_id` int(200) NOT NULL AUTO_INCREMENT,
  `department` varchar(56) NOT NULL,
  `standard_code` varchar(45) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`assessment_relus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `assessment_rules`
--

INSERT INTO `assessment_rules` (`assessment_relus_id`, `department`, `standard_code`, `title`, `description`) VALUES
(6, 'CC', 'CC-01', '	Treating the Client Respectfully\r\n\r\n		', '  -Greets the womna and her husband or companion (if present)in cordial manner\r\n-Introduces her/him self\r\n-call cliant by her name or appropriate title\r\n-Show concern and respect client culture, believes and ideas\r\n-Speaks using easy to understand language for the client'),
(7, 'FANC', 'FANC-01', '	\r\nPregnancy Danger symptoms/signs\r\n		', '  Vagina bleeding--Respiratory difficulty---Fever--Severe headache/blurred vision--Severe abdominal pain---Convulasions/loss of consciousness');

-- --------------------------------------------------------

--
-- Table structure for table `assessor_followups`
--

CREATE TABLE IF NOT EXISTS `assessor_followups` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(70) NOT NULL,
  `action_id` varchar(70) NOT NULL,
  `recommend` text NOT NULL,
  `plan` text NOT NULL,
  `follow_comment` text NOT NULL,
  `time_follow` varchar(45) NOT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `assessor_followups`
--

INSERT INTO `assessor_followups` (`follow_id`, `standard_code`, `action_id`, `recommend`, `plan`, `follow_comment`, `time_follow`) VALUES
(12, 'CC-01', '3', ' It is located in conducive environment', 'it will be staged to be implemented soon', 'it will be highly appreciated, cordially', '1562819738');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(5) NOT NULL,
  `date` varchar(45) NOT NULL,
  `budget_details` text NOT NULL,
  `startDate` varchar(33) NOT NULL,
  `endDate` varchar(33) NOT NULL,
  PRIMARY KEY (`budget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `standard_code`, `date`, `budget_details`, `startDate`, `endDate`) VALUES
(14, 'CC-01', 'July 10 2019', 'vin', 'ho', 'ho'),
(15, 'CC-01', 'July 10 2019', 'vin', 'ho', 'ho'),
(16, 'CC-01', 'July 10 2019', 'vin', 'ho', 'ho'),
(17, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(18, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(19, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(20, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(21, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(22, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(23, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(24, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(25, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(26, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(27, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(28, 'CC-01', 'July 10 2019', 'vince', 'vincce', 'viiivi'),
(29, 'CC-01', 'July 10 2019', 'koko', 'ko', 'ko'),
(30, 'CC-01', 'July 10 2019', '', '', ''),
(31, 'CC-01', 'July 10 2019', 'we are waiting for 2019 financial report to make some budget', 'no decidded yet', 'by 2020 is our target');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE IF NOT EXISTS `criteria` (
  `c_id` varchar(45) NOT NULL,
  `number` int(12) NOT NULL,
  `criteria` text NOT NULL,
  `standard_code` varchar(45) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`c_id`, `number`, `criteria`, `standard_code`) VALUES
('10273', 1, '  Provider determines if the woman has had any danger symptoms/signs during her pregnancy', 'FANC-02'),
('10686', 2, '  Places the reorders to the appropriate depot', 'SS-01'),
('10833', 1, '  Check the availability of essential analgesic and anesthetics', 'SS-03'),
('11191', 3, ' Assures client of confidentiality', 'CC-01'),
('13109', 5, '  Updates the bin cards with the new availability stock', 'SS-01'),
('13176', 2, '  Check that the storage room is not humid and the temperature is under 25 degree Celcius', 'SS-02'),
('14567', 1, '  Treats the client respectfully', 'STI-02'),
('14704', 5, '  Ask about past history of STI and their trreatment', 'STI-02'),
('17641', 6, '  Ask about recent sexual activity', 'STI-02'),
('18056', 2, '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'FANC-01'),
('23071', 3, '  Follow up the reorders to ensure their delivery within one-month period , or one-week in case of emergency orders', 'SS-01'),
('2327', 1, '  Checks that the door ', 'STI-01'),
('24464', 1, '  Make sure that the  delivery room is clean', 'NLD-01'),
('25270', 2, '  uses interpersonal communication skills during the entire visit of a patient', 'CC-01'),
('25506', 1, '  determine reorder levels for each drug', 'SS-01'),
('2783', 2, '  Ensures privacy during the entire visit', 'STI-02'),
('29284', 2, '  check and looks for  supplies and equipment to conduct normal delivery', 'NLD-01'),
('31010', 3, '  Collects personal and demographic information from the client', 'STI-02'),
('364', 4, '  Reconciles the reorders by confirming that delivered drugs tally with the request , and signs the good receipt note', 'SS-01'),
('3876', 4, '  Confirms that the client has come cervical cancer prevention', 'CC-01'),
('4247', 1, '  Provider/ recerptionist asks the pregnant woman upon her arrival in the hospital whether she  has or had any danger symptoms/signs ', 'FANC-01'),
('4356', 2, '  Checks that the consultancy/examination room has a desk for the provider , client and the companion', 'STI-01'),
('7041', 2, '  Provider assures immediate attention in the event of any danger symptoms/signs', 'FANC-02'),
('8115', 4, '  Ask about specific STI symptoms and their duration', 'STI-02'),
('9162', 1, '  Assess that the storage room is properly ventilated during working hours', 'SS-02'),
('9965', 3, '  Check and look for all equipment and supplies required for providing STI care', 'STI-01');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` varchar(70) NOT NULL,
  `department_name` varchar(70) NOT NULL,
  `area` varchar(50) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `area`) VALUES
('CC', 'Cervical Cancer', 'Area 8'),
('CSM', 'Practise Setting Casualty, Surgical &amp; Medical Wards', 'none'),
('FANC', 'Focused Antenatal Care', 'Area 1'),
('FPFU', 'Familily Planning Follow Up Visit', 'Area 6'),
('IEC', 'IEC and Community Participation', 'Area 11'),
('MCLD', 'Management of Complications during Labour and Delivery', 'Area 3'),
('NLD', 'Normal Labour and Delivery', 'Area 2'),
('None', 'Administration', 'none'),
('PAC', 'Post-Abortion Care', 'Area 7'),
('SS', 'Support Systems', 'Area 10'),
('STI', 'STI Syndromic Management Approach', 'Area 9');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(4) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(300) NOT NULL,
  `region_id` int(3) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `region_id`) VALUES
(1, 'Nkhotakota', 2),
(2, 'Lilongwe', 2),
(3, 'Mulanje', 3),
(4, 'Rumphi', 1),
(5, 'Thyolo', 3),
(6, 'Nsanje', 3),
(7, 'Balaka', 2),
(8, 'Zomba', 3),
(9, 'Chitipa', 1),
(10, 'Chiradzulu', 3),
(11, 'Chikhwawa', 3),
(12, 'Dowa', 2),
(13, 'Salima', 2),
(14, 'NKhatabay', 1),
(15, 'Mchinji', 2),
(16, 'Kasungu', 2),
(17, 'Dedza', 2),
(18, 'Ntcheu', 2),
(19, 'Karonga', 1),
(20, 'Mzimba', 1),
(21, 'Neno', 3),
(22, 'Blantyre', 3),
(23, 'Machinga', 3),
(24, 'Mangochi', 3),
(25, 'Phalombe', 3),
(26, 'Likoma', 1),
(28, 'Mzuzu City', 1),
(29, 'Lilongwe City', 2),
(30, 'Zomba City', 3),
(31, 'Blantyre City', 3),
(32, 'Mwanza', 3);

-- --------------------------------------------------------

--
-- Table structure for table `facilitator_monitors`
--

CREATE TABLE IF NOT EXISTS `facilitator_monitors` (
  `monitor_id` varchar(45) NOT NULL,
  `facilitator` varchar(45) NOT NULL,
  `day` varchar(45) NOT NULL,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `user_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilitator_monitors`
--

INSERT INTO `facilitator_monitors` (`monitor_id`, `facilitator`, `day`, `month`, `year`, `user_id`) VALUES
('20279', 'ID29530', 'Jun', '2019', 'Tue', 'ID28295'),
('2288', 'ID29919', 'Jul', '2019', 'Wed', 'ID28295');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `facility_id` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `contact` int(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `address` varchar(80) NOT NULL,
  `type` varchar(70) NOT NULL,
  `region_id` varchar(70) NOT NULL,
  `district_id` varchar(90) NOT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `name`, `contact`, `email`, `address`, `type`, `region_id`, `district_id`) VALUES
('8107', 'Mzuzu', 888444344, 'mzuzu@gmail.com', 'Mzuzu central hospital\r\nprivate bag 204\r\nluwinga 2   ', 'Central hospital', '1', '28');

-- --------------------------------------------------------

--
-- Table structure for table `gg`
--

CREATE TABLE IF NOT EXISTS `gg` (
  `v` int(88) NOT NULL,
  `vb` int(77) NOT NULL,
  `bh` int(99) NOT NULL,
  `jj` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gg`
--

INSERT INTO `gg` (`v`, `vb`, `bh`, `jj`) VALUES
(0, 999998, 88776, 777);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `times` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `times`, `description`) VALUES
(46, 'ID27739', '1561503656', 'Has successfully logged in the system'),
(47, 'ID1786', '1561505302', 'Has successfully logged in the system'),
(48, 'ID17028', '1561505412', 'Has successfully logged in the system'),
(49, 'ID31777', '1561505714', 'Has successfully logged in the system'),
(50, 'ID27739', '1561505732', 'Has successfully logged in the system'),
(51, 'ID31777', '1561506906', 'Has successfully logged in the system'),
(52, 'ID27739', '1561507059', 'Has successfully logged in the system'),
(53, 'ID31777', '1561510814', 'Has successfully logged in the system'),
(54, 'ID31777', '1562093944', 'Has successfully logged in the system'),
(55, 'ID31777', '1562137703', 'Has successfully logged in the system'),
(56, 'ID31777', '1562137750', 'Has successfully logged in the system'),
(57, 'ID31777', '1562137799', 'Has successfully logged in the system'),
(58, 'ID31777', '1562137849', 'Has successfully logged in the system'),
(59, 'ID28510', '1562137968', 'Has successfully logged in the system'),
(60, 'ID27739', '1562138247', 'Has successfully logged in the system'),
(61, 'ID31777', '1562142757', 'Has successfully logged in the system'),
(62, 'ID31777', '1562147966', 'Has successfully logged in the system'),
(63, 'ID31777', '1562165125', 'Has successfully logged in the system'),
(64, 'ID27739', '1562183967', 'Has successfully logged in the system'),
(65, 'ID31777', '1562190587', 'Has successfully logged in the system'),
(66, 'ID27739', '1562190680', 'Has successfully logged in the system'),
(67, 'ID31777', '1562192723', 'Has successfully logged in the system'),
(68, 'ID31777', '1562193954', 'Has successfully logged in the system'),
(69, 'ID31777', '1562194105', 'Has successfully logged in the system'),
(70, 'ID31777', '1562194337', 'Has successfully logged in the system'),
(71, 'ID31777', '1562194508', 'Has successfully logged in the system'),
(72, 'ID15911', '1562195189', 'Has successfully logged in the system'),
(73, 'ID31777', '1562198147', 'Has successfully logged in the system'),
(74, 'ID31777', '1562198321', 'Has successfully logged in the system'),
(75, 'ID31777', '1562198634', 'Has successfully logged in the system'),
(76, 'ID9066', '1562198668', 'Has successfully logged in the system'),
(77, 'ID9066', '1562198752', 'Has successfully logged in the system'),
(78, 'ID17020', '1562198876', 'Has successfully logged in the system'),
(79, 'ID17020', '1562199026', 'Has successfully logged in the system'),
(80, 'ID17020', '1562199209', 'Has successfully logged in the system'),
(81, 'ID28295', '1562218342', 'Has successfully logged in the system'),
(82, 'ID31777', '1562222352', 'Has successfully logged in the system'),
(83, 'ID28295', '1562222847', 'Has successfully logged in the system'),
(84, 'ID17020', '1562223464', 'Has successfully logged in the system'),
(85, 'ID28295', '1562223880', 'Has successfully logged in the system'),
(86, 'ID31777', '1562476194', 'Has successfully logged in the system'),
(87, 'ID31777', '1561453359', 'Has successfully logged in the system'),
(88, 'ID31777', '1561481169', 'Has successfully logged in the system'),
(89, 'ID17020', '1561483134', 'Has successfully logged in the system'),
(90, 'ID28295', '1561483558', 'Has successfully logged in the system'),
(91, 'ID31777', '1561488418', 'Has successfully logged in the system'),
(92, 'ID31777', '1561488510', 'Has successfully logged in the system'),
(93, 'ID29919', '1561489491', 'Has successfully logged in the system'),
(94, 'ID31777', '1561517666', 'Has successfully logged in the system'),
(95, 'ID28295', '1561517709', 'Has successfully logged in the system'),
(96, 'ID29919', '1561517756', 'Has successfully logged in the system'),
(97, 'ID28295', '1561532326', 'Has successfully logged in the system'),
(98, 'ID31777', '1562731003', 'Has successfully logged in the system'),
(99, 'ID31777', '1562732455', 'Has successfully logged in the system'),
(100, 'ID28295', '1562737279', 'Has successfully logged in the system'),
(101, 'ID31777', '1562738081', 'Has successfully logged in the system'),
(102, 'ID31777', '1562739292', 'Has successfully logged in the system'),
(103, 'ID29919', '1562739339', 'Has successfully logged in the system'),
(104, 'ID31777', '1562741336', 'Has successfully logged in the system'),
(105, 'ID31777', '1562744100', 'Has successfully logged in the system'),
(106, 'ID28295', '1562744290', 'Has successfully logged in the system'),
(107, 'ID31777', '1562744498', 'Has successfully logged in the system'),
(108, 'ID31777', '1562770482', 'Has successfully logged in the system'),
(109, 'ID30194', '1562770768', 'Has successfully logged in the system'),
(110, 'ID31777', '1562773109', 'Has successfully logged in the system'),
(111, 'ID28295', '1562773153', 'Has successfully logged in the system'),
(112, 'ID31777', '1562783888', 'Has successfully logged in the system'),
(113, 'ID24744', '1562784735', 'Has successfully logged in the system'),
(114, 'ID31777', '1562786789', 'Has successfully logged in the system'),
(115, 'ID29530', '1562786839', 'Has successfully logged in the system'),
(116, 'ID29530', '1562791768', 'Has successfully logged in the system'),
(117, 'ID31777', '1562791854', 'Has successfully logged in the system'),
(118, 'ID29530', '1562791984', 'Has successfully logged in the system'),
(119, 'ID28295', '1562792717', 'Has successfully logged in the system'),
(120, 'ID29919', '1562792755', 'Has successfully logged in the system'),
(121, 'ID28295', '1562793847', 'Has successfully logged in the system'),
(122, 'ID29919', '1562825394', 'Has successfully logged in the system'),
(123, 'ID31777', '1562827770', 'Has successfully logged in the system'),
(124, 'ID28295', '1562830685', 'Has successfully logged in the system'),
(125, 'ID29530', '1562830710', 'Has successfully logged in the system'),
(126, 'ID31777', '1562830727', 'Has successfully logged in the system'),
(127, 'ID10021', '1562830825', 'Has successfully logged in the system');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(34) NOT NULL,
  `do` text NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`p_id`, `id`, `do`) VALUES
(1, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(2, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(3, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(4, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(5, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(6, '5', '  Provider assures immediately attention in the event of any of the danger symptoms /signs'),
(7, '2', '2327'),
(8, '2', '2327'),
(9, '2', '2327'),
(10, '2', '2327'),
(11, '2', '2327'),
(12, '2', '2327'),
(13, '2', '2327'),
(14, '2', '2327'),
(15, '2', '2327'),
(16, '2', '2327'),
(17, '2', '2327'),
(18, '2', '2327');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE IF NOT EXISTS `recommendation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(122) NOT NULL,
  `date` varchar(123) NOT NULL,
  `level_achieved` varchar(223) NOT NULL,
  `comment` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`id`, `standard_code`, `date`, `level_achieved`, `comment`) VALUES
(1, 'FANC-01', '2019-03-28', 'Yes', ' llllll'),
(2, 'FANC-01', '2019-03-28', 'Yes', ';;;;;;;'),
(3, 'FANC-01', '2019-03-28', 'Yes', 'llllll'),
(4, 'FANC-01', '2019-04-01', 'Yes', ' kkkkiikkmnnjjiikkk'),
(5, 'FANC-01', '2019-04-01', 'Yes', ' kdkkdkdkdkkdkdkkdkkdkdkddkkdkkdkkdkkd'),
(6, 'NLD-01', '2019-04-02', 'No', ' there is no enough equipment for efficiency and efectiveness'),
(7, 'FANC-01', '2019-04-02', 'Yes', ' nanna'),
(8, 'FANC-01', '2019-04-02', 'Yes', ' mmmmmmm'),
(9, 'SS-01', '2019-04-03', 'Yes', ' kkoooo'),
(10, 'CC-01', '2019-04-03', 'Yes', ' mmmmm'),
(11, 'SS-01', '2019-04-04', 'Yes', ' kkkkkloloo'),
(12, 'CC-01', '2019-04-04', 'Yes', ' nmnonoonon'),
(13, 'CC-01', '2019-04-04', 'Not Applicable', ' mmmkll'),
(14, 'CC-01', '2019-04-04', 'Yes', ' ,mmkkkk'),
(15, 'CC-01', '2019-04-05', 'Yes', ' nnnnn'),
(16, 'CC-01', '2019-04-07', '', ' eiwiew'),
(17, 'CC-01', '2019-04-07', 'Yes', 'he was '),
(18, '', '2019-04-07', 'Yes', ' hjk'),
(19, '', '2019-04-07', 'Yes', ' jkjkjk'),
(20, '', '2019-04-07', 'Yes', ' jkjkjk'),
(21, '', '2019-04-07', 'Yes', ' jkjkjk'),
(22, '', '2019-04-07', 'Yes', ' m,m,'),
(23, '', '2019-04-07', 'Yes', ' jkl'),
(24, '', '2019-04-07', 'Yes', ' dfdfd'),
(25, '', '2019-04-07', 'No', ' hkj'),
(26, '', '2019-04-07', 'No', ' nm'),
(27, '', '2019-04-09', 'Yes', ' make sure the curtain should large enough'),
(28, '', '2019-04-09', 'No', ' There is need to purchase desk for these three persons'),
(29, '', '2019-04-09', 'Not Applicable', 'it is under management consuderation'),
(30, '', '2019-04-09', 'Yes', ' real'),
(31, '', '2019-04-09', 'Yes', ' momo[['),
(32, 'The provider prepares the STI clinic for attending the client', '2019-04-09', 'No', 'whoyou'),
(33, 'The provider prepares the STI clinic for attending the client', '2019-04-09', 'No', ' hy'),
(34, 'STI-01', '2019-04-09', 'No', ' nhmhjkj'),
(35, 'STI-01', '2019-04-09', 'No', ' m,'),
(36, 'STI-01', '2019-04-09', 'Not Applicable', ' jkj'),
(37, 'FANC-01', '2019-04-11', 'Yes', ' it is effective and efficient'),
(38, 'FANC-02', '2019-04-12', 'No', 'liwewew'),
(39, 'FANC-01', '2019-04-15', 'Yes', ' kkkkkk'),
(40, 'FANC-01', '2019-04-15', 'Yes', 'jjdjdjjd'),
(41, 'FANC-01', '2019-04-15', 'Yes', ' ,lllll'),
(42, 'CC-01', '2019-04-28', 'Yes', ' lll'),
(43, 'FANC-01', '2019-04-30', 'Yes', ' nnn'),
(44, 'FANC-01', '2019-04-30', 'No', ' nnnn'),
(45, 'CC-01', '2019-05-23', 'Yes', ' po9090909'),
(46, 'CC-01', '2019-06-17', 'Yes', ' bbvbbvbbv'),
(47, 'CC-01', '2019-06-17', 'Not Applicable', ' bobo'),
(48, 'CC-01', '2019-06-17', 'No', ' bbbb'),
(49, 'CC-01', '2019-06-17', 'Yes', ' nnn'),
(50, 'CC-01', '2019-06-17', 'No', ' bb'),
(51, 'CC-01', '2019-06-17', 'Not Applicable', ' bb'),
(52, 'CC-01', '2019-06-18', 'No', ' mmmmm'),
(53, 'FANC-01', '2019-06-19', 'Yes', ' nnnn'),
(54, 'FANC-01', '2019-06-19', 'Yes', ' bbb'),
(55, 'FANC-01', '2019-06-19', 'Not Applicable', ' Vincent saiwa'),
(56, 'CC-01', '2019-06-19', 'No', ' nvnnvnvnv'),
(57, 'CC-01', '2019-06-19', 'No', ' nnnn'),
(58, 'CC-01', '2019-06-20', 'Yes', ' It is located in conducive environment'),
(59, 'CC-01', '2019-06-20', 'Yes', ' It has been observed that healthy workers undergo communication skill training for better patient persuation'),
(60, 'CC-01', '2019-06-20', 'No', ' most healthy leave the client in suspension since they have nothing to assures real measures to prevent cancer diseases'),
(61, 'FANC-01', '2019-06-20', 'Yes', ' however, supporting staff are few compared to the number of patients received per day'),
(62, 'FANC-01', '2019-06-20', 'Yes', ' It is efficiently implemented'),
(63, 'CC-01', '2019-06-25', 'No', ' hhhdhhdhd'),
(64, 'CC-01', '2019-07-10', 'Yes', ' it should be maintained, however, there is need to relocate the offices far away from hospital entry door'),
(65, 'CC-01', '2019-07-10', 'Yes', ' It is being practised as mandated by our ministry'),
(66, 'CC-01', '2019-07-10', 'No', ' it ooooo');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(200) NOT NULL,
  PRIMARY KEY (`region_id`),
  UNIQUE KEY `name` (`region_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`) VALUES
(5, 'Central'),
(4, 'Eastern'),
(1, 'Northen'),
(3, 'Southern');

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE IF NOT EXISTS `standard` (
  `standard_code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `department_id` varchar(34) NOT NULL,
  `initdate` varchar(88) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  PRIMARY KEY (`standard_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`standard_code`, `description`, `department_id`, `initdate`, `user_id`) VALUES
('CC-01', 'The provider assesses the client for visual inspection with acetic acid VIA', 'CC', '', ''),
('CC-02', 'The provider prepares for performing the VIA test', 'CC', 'April 12, 2019', 'admin'),
('CC-03', 'The provider correctly performs the VIA test', 'CC', 'April 12, 2019', 'admin'),
('CC-04', 'The provider explains the VIA results to client', 'CC', 'April 12, 2019', 'admin'),
('CC-05', 'CRYOTHERAPY--\r\nThe provider prepares for cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-06', 'The provider correctly performs cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-07', 'The provider correctly counsels the client after cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-08', 'MAINTANANCE OF THE CRYOTHERAPY--\r\nThe provider properly gives maintainance to the cryotherapy', 'CC', 'April 12, 2019', 'admin'),
('FANC-01', 'The person who receives the pregnant woman conducts a rapid initial evaluation at the first contact', 'FANC', 'April 10, 2019', 'admin'),
('FANC-02', 'The provider correctly rules out pregnancy danger signs', 'FANC', 'April 10, 2019', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `traditional`
--

CREATE TABLE IF NOT EXISTS `traditional` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `districtId` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=279 ;

--
-- Dumping data for table `traditional`
--

INSERT INTO `traditional` (`id`, `districtId`, `name`) VALUES
(1, 1, 'Mwansambo'),
(2, 1, 'Malenga Chanzi'),
(3, 27, 'Malenga'),
(4, 27, 'Vuso Jere'),
(5, 9, 'Mwabulambaya'),
(6, 9, 'Mwenemisuku'),
(7, 9, 'Mwenewenye'),
(8, 9, 'Nthalire'),
(9, 9, 'Kamene'),
(10, 9, 'Chitipa Boma'),
(11, 19, 'Kilupula'),
(12, 19, 'SC Mwakaboko'),
(13, 19, 'Kyungu'),
(15, 19, 'Karonga Town'),
(16, 19, 'S/C Mwirang ombe'),
(17, 14, 'Kabunduli'),
(18, 14, 'Fukamapiri'),
(19, 14, 'Malenga Mzoma'),
(20, 14, 'S/C Malanda'),
(21, 14, 'S/C Zilakoma'),
(22, 14, 'Mankhambira'),
(23, 14, 'S/C Fukamalaza'),
(24, 14, 'S/C Mkumbira'),
(25, 14, 'Musisya'),
(26, 14, 'S/C Nyaluwanga'),
(27, 14, 'S/C Mkondowe'),
(28, 14, 'Timbiri'),
(29, 14, 'Boghoyo'),
(30, 14, 'Nkhatabay Boma'),
(31, 4, 'Chikulamayembe'),
(32, 4, 'Mwamlomwe'),
(33, 4, 'S/C Mwahenga'),
(34, 4, 'S/C Mwalweni'),
(35, 4, 'S/C Kachulu'),
(36, 4, 'S/C Chapinduka'),
(37, 4, 'S/C Mwankhunikira'),
(38, 4, 'Katumbi'),
(39, 4, 'S/C Zolokere'),
(40, 4, 'Nyika National Park(Part A)'),
(41, 4, 'Vwaza Marsh Game Reserve'),
(42, 4, 'Rumphi Boma'),
(43, 20, 'Mmbelwa'),
(44, 20, 'Mtwalo'),
(45, 20, 'S/C Kampingo Sibande'),
(46, 20, 'S/C Jaravikuba Munthali'),
(47, 20, 'Chindi'),
(48, 20, 'Mzikubola'),
(49, 20, 'Mabulabo'),
(50, 20, 'S/C Khosolo Gwaza Jere'),
(51, 20, 'Mpherembe'),
(52, 20, 'Mzukuzuku'),
(53, 20, 'Mzimba Boma'),
(54, 28, 'NKhorongo'),
(55, 28, 'Lupaso Ward'),
(56, 28, 'Zolozolo'),
(57, 28, 'Chiputula Ward'),
(58, 28, 'Chibanja Ward'),
(59, 28, 'Mchengautuwa Ward'),
(60, 28, 'Katoto Ward'),
(61, 28, 'Jombo Ward'),
(62, 28, 'Muzilawainge Ward'),
(63, 28, 'Chasefu Ward'),
(64, 28, 'Katawa Ward'),
(65, 28, 'Masasa Ward'),
(66, 28, 'Kaning ina Ward'),
(67, 28, 'Viphya Ward'),
(68, 28, 'Msongwe Ward'),
(69, 28, 'New airpot Site'),
(70, 28, 'Lubinga'),
(71, 26, 'Mkumpha'),
(72, 26, 'Likoma Boma'),
(73, 16, 'Kaluluma'),
(74, 16, 'S/C Simlemba'),
(75, 16, 'S/C Nyanja'),
(76, 16, 'S/C Chisikwa'),
(77, 16, 'Kaomba'),
(78, 16, 'S/C Lukwa'),
(79, 16, 'S/C kawamba'),
(80, 16, 'S/C Njombwa'),
(81, 16, 'S/C Chilowamatambe'),
(82, 16, 'Chulu'),
(83, 16, 'Nsanthe'),
(84, 16, 'Wimbe'),
(85, 16, 'Kapelula'),
(86, 16, 'Kasungu national park'),
(87, 16, 'Mwase'),
(88, 16, 'Kasungu Town'),
(89, 1, 'Kanyenda'),
(90, 1, 'S/C Kafuzira'),
(91, 1, 'S/C Mphonde'),
(92, 1, 'Mwadzama'),
(93, 1, 'Nkhotakota Boma'),
(94, 27, 'Kasakula'),
(95, 27, 'Chikho'),
(96, 27, 'S/C Nthondo'),
(97, 27, 'Kalumo'),
(98, 27, 'S/C Chiloko'),
(99, 27, 'Ntchisi Boma'),
(100, 12, 'Dzoole'),
(101, 12, 'S/C Chakhaza'),
(102, 12, 'S/C Kayembe'),
(103, 12, 'Chiwere'),
(104, 12, 'S/C Mkukula'),
(105, 12, 'Msakambewa'),
(106, 12, 'S/C Mponela'),
(107, 12, 'Dowa Boma'),
(108, 12, 'Mponela Urban'),
(109, 13, 'Maganga'),
(110, 13, 'karonga'),
(111, 13, 'Pemba'),
(112, 13, 'S/C Kambwiri'),
(113, 13, 'Ndindi'),
(114, 13, 'S/C Kambalame'),
(115, 13, 'Khombedza'),
(116, 13, 'S/C Mwanza'),
(117, 13, 'Kuluunda'),
(118, 13, 'S/C Msosa'),
(119, 13, 'Salima Town'),
(120, 13, 'Chipoka Urban'),
(121, 2, 'Chadza'),
(122, 2, 'Kalolo'),
(123, 2, 'Chiseka'),
(124, 2, 'Mazengera'),
(125, 2, 'S/C Chitekwele'),
(126, 2, 'Khongoni'),
(127, 2, 'Chimutu'),
(128, 2, 'Chitikula'),
(129, 2, 'S/C Mtema'),
(130, 2, 'Kalumbu'),
(131, 2, 'S/C Tsabango'),
(132, 2, 'Kalumba'),
(133, 2, 'Njewa'),
(134, 2, 'Malili'),
(135, 2, 'Kabudula'),
(136, 15, 'Mlonyeni'),
(137, 15, 'S/C Mavwere'),
(138, 15, 'Zulu'),
(139, 15, 'S/C Nduwa'),
(140, 15, 'Mkanda'),
(141, 15, 'S/C Dambe'),
(142, 15, 'Mchinji Boma'),
(143, 17, 'Pemba'),
(144, 17, 'S/C Chilikumwenda'),
(145, 17, 'S/C Kaphuka'),
(146, 17, 'Tambala'),
(147, 17, 'S/C Chauma'),
(148, 17, 'Kasumbu'),
(149, 17, 'Kachindamoto'),
(150, 17, 'S/C Kamenya Gwaza'),
(151, 17, 'Dedza Town'),
(152, 18, 'Phambala'),
(153, 18, 'Mpando'),
(154, 18, 'Kwataine'),
(155, 18, 'S/C Makwangwala'),
(156, 18, 'S/C Champiti'),
(157, 18, 'Njolomole'),
(158, 18, 'Chakhumbila'),
(159, 18, 'S/C Goodson Ganya'),
(160, 18, 'Masasa'),
(161, 18, 'Ntcheu Boma'),
(162, 24, 'Mponda'),
(163, 24, 'Chimwala'),
(164, 24, 'Namkumba'),
(165, 24, 'Jalasi'),
(166, 24, 'S/C Chowe'),
(167, 24, 'Katuli'),
(168, 24, 'Makanjila'),
(169, 24, 'S/C Namabvi'),
(170, 24, 'Lake Malawi National Park'),
(171, 24, 'Mangochi Town'),
(172, 24, 'Monkey Bay Urban'),
(173, 23, 'Liwonde'),
(174, 23, 'S/C Sitola'),
(175, 23, 'Kawinga'),
(176, 23, 'S/C Chamba'),
(177, 23, 'S/C Mposa'),
(178, 23, 'S/C Mlomba'),
(179, 23, 'S/C Chikweo'),
(180, 23, 'S/C Ngokwe'),
(181, 23, 'S/C Chiwalo'),
(182, 23, 'Nyambi'),
(183, 23, 'Liwonde National Park'),
(184, 23, 'Machinga Boma'),
(185, 23, 'Liwonde Town'),
(186, 8, 'Kuntumanji'),
(187, 8, 'Mwambo'),
(188, 8, 'S/C Mkumbira'),
(189, 8, 'Chikowi'),
(190, 8, 'S/C Mbiza'),
(191, 8, 'Mlumbe'),
(192, 8, 'Malemia'),
(193, 30, 'Mbedza Ward'),
(194, 30, 'Mtiya Ward'),
(195, 30, 'Masongola Ward'),
(196, 30, 'Chikamveka Ward'),
(197, 30, 'Chikamveka North Ward'),
(198, 30, 'Chirunga Ward'),
(199, 30, 'Chirunga East Ward'),
(200, 30, 'Likangala Ward'),
(201, 30, 'Zakazaka Ward'),
(202, 30, 'Zomba Central Ward'),
(203, 30, 'Chambo Ward'),
(204, 30, 'Sadzi Ward'),
(205, 30, 'Likangala Central Ward'),
(206, 30, 'Likangala South Ward'),
(207, 10, 'Mpama'),
(208, 10, 'Likoswe'),
(209, 10, 'kadewere'),
(210, 10, 'Nkalo'),
(211, 10, 'Chitera'),
(212, 10, 'Nchema'),
(213, 10, 'Chiradzulu Boma'),
(214, 22, 'Kapeni'),
(215, 22, 'Lundu'),
(216, 22, 'Chigaru'),
(217, 22, 'Kunthembwe'),
(218, 22, 'Makata'),
(219, 22, 'Kuntaja'),
(220, 22, 'Machinjili'),
(221, 22, 'Somba'),
(222, 32, 'Kanduku'),
(223, 32, 'Nthache'),
(224, 32, 'Mwanza Boma'),
(225, 5, 'Nsabwe'),
(226, 5, 'S/C Thukuta'),
(227, 5, 'S/C Mbawela'),
(228, 5, 'Changata'),
(229, 5, 'S/C Mphuka'),
(230, 5, 'S/C Khwethemule'),
(231, 5, 'Kapichi'),
(232, 5, 'Mchilamwela'),
(233, 5, 'Chimalilo'),
(234, 5, 'Bvumbwe'),
(235, 5, 'Thomas'),
(236, 5, 'Thyolo Boma'),
(237, 5, 'Luchenza Town (Part A)'),
(239, 3, 'Mabuka'),
(240, 3, 'Laston Njema'),
(241, 3, 'Chikumbu'),
(242, 3, 'Nthiramanja'),
(243, 3, 'Nkanda'),
(244, 3, 'S/C Juma'),
(245, 3, 'Mulanje Boma'),
(246, 25, 'Mnkhumba'),
(247, 25, 'Nazombe'),
(248, 25, 'Chiwalo'),
(249, 25, 'Phalombe Boma'),
(250, 11, 'Ngabu'),
(251, 11, 'Lundu'),
(252, 11, 'Chapananga'),
(253, 11, 'Maseya'),
(254, 11, 'Katunga'),
(255, 11, 'Kasisi'),
(256, 11, 'Mankhwira'),
(257, 11, 'Lengwe National park'),
(258, 11, 'Chikwawa Boma'),
(259, 11, 'Ngabu Urban'),
(260, 6, 'Ndamera'),
(261, 6, 'Chimombo'),
(262, 6, 'Nyachikadza'),
(263, 6, 'Mlolo'),
(264, 6, 'Tengani'),
(265, 6, 'S/C Mbenje'),
(266, 6, 'Malemia'),
(267, 0, 'Ngabu'),
(268, 0, 'S/C Makoko'),
(269, 0, 'Mwabvi Game Reserve'),
(270, 0, 'Nsanje Boma'),
(271, 7, 'Nsamala'),
(272, 7, 'Kalemebo'),
(273, 7, 'Balaka Boma'),
(274, 21, 'Dambe'),
(275, 21, 'Mlauli'),
(276, 21, 'Symon'),
(277, 21, 'Chekucheku'),
(278, 21, 'Neno Boma');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(8) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `department_id` varchar(45) NOT NULL,
  `role` varchar(255) NOT NULL,
  `area` varchar(44) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(6) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `sname`, `department_id`, `role`, `area`, `email_address`, `username`, `password`, `status`) VALUES
('ID10021', 'James', 'Jumber', 'FANC', 'Assessor', 'Area 1', 'james@gmail.com', 'james1111', '832af0c7d9a592997708160342c4b6b6', 'On'),
('ID17020', 'Paul', 'Saiwa', 'None', 'Admin', 'none', 's@gmail.com', 'paulsaiwa', 'ef110ef43290048cb3c5037a162a842f', 'On'),
('ID24744', 'Robert', 'Mateyu', 'FANC', 'Assessor', 'Area 1', 'robert@gmail.com', 'robertmateyu', 'd34f65eabf3a5e7a653fa2cd4bb8c6ca', 'On'),
('ID28295', 'Jese', 'Kalonga', 'CC', 'Assessor', 'Area 8', 'jese@gmail.com', 'jesekalonga', 'b3691a87a7c65acb6fa682572459d24b', 'On'),
('ID29530', 'Koko', 'Malume', 'FANC', 'In charge', 'Area 1', 'koko@gmail.com', 'kokomalume', '8f3ffb8923499f2b768dc469b8e82116', 'On'),
('ID29919', 'Mateyu', 'Gowa', 'CC', 'In charge', 'Area 8', 's@gmail.com', 'charge11', 'b5bbafc5d98a62c371ff89c2ad816862', 'On'),
('ID30194', 'Eluby', 'Shaba', 'None', 'Admin', 'none', 'e@gmail.com', 'Elubyshaba', '25f9e794323b453885f5181f1b624d0b', 'On'),
('ID31777', 'Vincent ', 'Lufeyo', 'none', 'Admin', 'none', 'saiwa@gmail.com', 'admin', 'b15ab3f829f0f897fe507ef548741afb', 'On');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
