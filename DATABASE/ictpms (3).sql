-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 07:35 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `action_plan`
--

INSERT INTO `action_plan` (`action_id`, `standard_code`, `date`, `recommend`, `plan`) VALUES
(1, 'FANC-02', 'May 01 2019', 'There is need to train the healthy worker on how to use equipment', 'There is need to hire biomedical engineer to train healthy officers'),
(2, 'FANC-02', 'May 01 2019', 'There is great improvevement , but teach the healthy workers further', 'no comment');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `assessment_details`
--

INSERT INTO `assessment_details` (`id`, `standard_code`, `date`, `do`, `level_achieved`, `comment`) VALUES
(2, 'STI-01', '2019-04-09', '2327', 'No', ' nhmhjkj'),
(3, 'STI-01', '2019-04-09', '  Checks that the consultancy/examination room has a desk for the provider , client and the companion', 'No', ' m,'),
(4, 'STI-01', '2019-04-09', '  Check and look for all equipment and supplies required for providing STI care', 'Not Applicable', ' jkj'),
(5, 'FANC-01', '2019-04-11', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', 'komkokkmmtititiiitmmmmmm'),
(6, 'FANC-02', '2019-04-12', '  Provider assures immediate attention in the event of any danger symptoms/signs', 'Yes', 'kkkkkkloloo'),
(7, 'FANC-01', '2019-04-15', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', ' kkkkkkggggg'),
(8, 'FANC-01', '2019-04-15', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', '99998888'),
(9, 'FANC-01', '2019-04-15', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', ' ,lllll'),
(10, 'CC-01', '2019-04-28', '  Treats the client respectfully ', 'No', ' lllmmmmhbbbbbb'),
(11, 'FANC-01', '2019-04-30', '  Provider assures immediately attention in the event of any of the danger symptoms /signs', 'Yes', ' nnn'),
(12, 'FANC-01', '2019-04-30', '  Provider/ recerptionist asks the pregnant woman upon her arrival in the hospital whether she  has or had any danger symptoms/signs ', 'No', ' nnnn'),
(13, 'CC-01', '2019-05-23', ' Assures client of confidentiality', 'Yes', ' po9090909'),
(14, 'CC-01', '2019-06-17', ' Assures client of confidentiality', 'Yes', ' bbvbbvbbv'),
(15, 'CC-01', '2019-06-17', '  Confirms that the client has come cervical cancer prevention', 'Yes', ' bobo'),
(16, 'CC-01', '2019-06-17', ' Assures client of confidentiality', 'No', ' bbbb'),
(17, 'CC-01', '2019-06-17', ' Assures client of confidentiality', 'Yes', ' nnn'),
(18, 'CC-01', '2019-06-17', '  uses interpersonal communication skills during the entire visit a', 'No', ' bb'),
(19, 'CC-01', '2019-06-17', '  Confirms that the client has come cervical cancer prevention', 'Not Applicable', ' bb'),
(20, 'CC-01', '2019-06-18', ' Assures client of confidentiality', 'No', ' mmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `budget_ass_results`
--

CREATE TABLE IF NOT EXISTS `budget_ass_results` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_code` varchar(5) NOT NULL,
  `date` varchar(45) NOT NULL,
  `budget_details` text NOT NULL,
  `budget_amount` varchar(50) NOT NULL,
  `startDate` varchar(33) NOT NULL,
  `endDate` varchar(33) NOT NULL,
  PRIMARY KEY (`budget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `budget_ass_results`
--

INSERT INTO `budget_ass_results` (`budget_id`, `standard_code`, `date`, `budget_details`, `budget_amount`, `startDate`, `endDate`) VALUES
(1, 'CC-01', 'May 06 2019', 'kkkk', '65', '', ''),
(2, 'CC-01', 'May 06 2019', 'hhhd', '87', '', ''),
(3, 'CC-01', 'May 06 2019', '555', '55', '555', ''),
(4, 'CC-01', 'May 06 2019', 'mmmm', 'kk', 'kkk', 'mm'),
(5, 'CC-01', 'May 06 2019', 'mm', 'MK22', '66', '0099'),
(6, 'CC-01', 'May 06 2019', 'nnn', 'MK56', '677', '88'),
(7, 'FANC-', 'May 06 2019', '', '', '', ''),
(8, 'CC-01', 'May 20 2019', 'hhfhhfhhf', '56', '2019-05-09', '2019-05-09'),
(9, 'CC-01', 'June 11 2019', 'hgdjf', 'JHHJ', '2019-06-11', '2019-06-11'),
(10, 'CC-01', 'June 11 2019', 'ghjg', 'JHHJ', '2019-06-11', '2019-06-11'),
(11, 'CC-01', 'June 11 2019', 'ghh', 'JHHJ', '2019-06-11', '2019-06-11'),
(12, 'CC-01', 'June 11 2019', 'hdsj', 'JHHJ', '2019-06-11', '2019-06-11'),
(13, 'CC-01', 'June 11 2019', 'heuje', 'JHHJ', '2019-06-11', '2019-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `charge_staff_member`
--

CREATE TABLE IF NOT EXISTS `charge_staff_member` (
  `worker_id` varchar(70) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `sname` varchar(70) NOT NULL,
  `duty` text NOT NULL,
  `job_des` varchar(255) NOT NULL,
  `work_area` varchar(70) NOT NULL,
  `department_id` varchar(45) NOT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='keeps the health worker under that department';

--
-- Dumping data for table `charge_staff_member`
--

INSERT INTO `charge_staff_member` (`worker_id`, `fname`, `sname`, `duty`, `job_des`, `work_area`, `department_id`) VALUES
('16521', 'Vincent ', 'Saiwa', 'kaya', 'kaya', 'aaa', ''),
('17164', 'mmm', 'mm', 'mmm', 'mmmm', 'ff', ''),
('23778', 'vincent', 'co', 'ccc', 'ckckckkckkkckckkkc', 'llkkkkk', ''),
('24260', 'vincent', 'co', ' co', ' co', 'lilongwe', ''),
('24668', 'Patuma', 'Choka', 'Nurse', 'hfhhf', 'jjjjj', ''),
('28174', 'vincent', 'co', 'ccc', 'ckckckkckkkckckkkc', 'llkkkkk', ''),
('28834', 'vincent', 'co', 'ccc', 'ckckckkckkkckckkkc', 'llkkkkk', ''),
('7743', 'mmmm', 'mmm', 'mmm', 'mmm', 'mmm', '');

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
('25270', 2, '  uses interpersonal communication skills during the entire visit a', 'CC-01'),
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
  `facility_id` varchar(34) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `area`, `facility_id`) VALUES
('CC', 'Cervical Cancer', 'Area 8', ''),
('CSM', 'Practise Setting Casualty, Surgical &amp; Medical Wards', 'none', ''),
('FANC', 'Robert Liwewe', 'Area 1', ''),
('FPFU', 'Familily Planning Follow Up Visit', 'Area 6', ''),
('IEC', 'IEC and Community Participation', 'Area 11', ''),
('MCLD', 'Management of Complications during Labour and Delivery', 'Area 3', ''),
('NLD', 'Normal Labour and Delivery', 'Area 2', ''),
('None', 'Administration', 'none', ''),
('PAC', 'Post-Abortion Care', 'Area 7', ''),
('SS', 'Support Systems', 'Area 10', ''),
('STI', 'STI Syndromic Management Approach', 'Area 9', '');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `region_id` int(3) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `name`, `region_id`) VALUES
(1, 'Nkhotakota', 2),
(2, 'Lilongwe', 2),
(3, 'Mulanje', 3),
(4, 'Rumphi', 1),
(5, 'Thyolo', 3),
(6, 'Nsanje', 3),
(7, 'Balaka', 3),
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
(32, 'Mwanza', 3),
(33, 'mmmmm', 4),
(34, 'mm', 2),
(35, 'mm', 2);

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
('27283', 'nmmnll', 33333, 'a@gmail.com', '   vin', 'Centralhospital', '1', '13'),
('6215', 'Robert Liwewe', 8888888, 'saiwa@gmail.com', '   kskks', 'Central hospital', '1', '19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `times`, `description`) VALUES
(1, 'ID31777', '1560689977', 'Has successfully logged in the system'),
(2, 'ID31777', '1560690047', 'Has successfully logged in the system'),
(3, 'ID31777', '1560690066', 'Has successfully logged in the system'),
(4, 'ID27739', '1560690264', 'Has successfully logged in the system'),
(5, 'ID31777', '1560692026', 'Has successfully logged in the system'),
(6, 'ID1545', '1560692168', 'Has successfully logged in the system'),
(7, 'ID27739', '1560699533', 'Has successfully logged in the system'),
(8, 'ID27739', '1560760628', 'Has successfully logged in the system'),
(9, 'ID31777', '1560763529', 'Has successfully logged in the system'),
(10, 'ID27739', '1560763571', 'Has successfully logged in the system'),
(11, 'ID31777', '1560763874', 'Has successfully logged in the system'),
(12, 'ID27739', '1560770312', 'Has successfully logged in the system'),
(13, 'ID31777', '1560839715', 'Has successfully logged in the system'),
(14, 'ID31777', '1560872277', 'Has successfully logged in the system'),
(15, 'ID31777', '1560877169', 'Has successfully logged in the system'),
(16, 'ID31777', '1560877311', 'Has successfully logged in the system'),
(17, 'ID27739', '1560877647', 'Has successfully logged in the system'),
(18, 'ID31777', '1560877855', 'Has successfully logged in the system');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

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
(52, 'CC-01', '2019-06-18', 'No', ' mmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `facility_id` varchar(34) NOT NULL,
  PRIMARY KEY (`region_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `name`, `facility_id`) VALUES
(1, 'Northen', ''),
(2, 'Central', ''),
(3, 'Southern', ''),
(4, 'Eastern', '');

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
('CC-01', 'The provider assesses the client for visual inspection with acetic acid VIA', 'CC', 'April 12, 2019', 'admin'),
('CC-02', 'The provider prepares for performing the VIA test', 'CC', 'April 12, 2019', 'admin'),
('CC-03', 'The provider correctly performs the VIA test', 'CC', 'April 12, 2019', 'admin'),
('CC-04', 'The provider explains the VIA results to client', 'CC', 'April 12, 2019', 'admin'),
('CC-05', 'CRYOTHERAPY--\r\nThe provider prepares for cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-06', 'The provider correctly performs cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-07', 'The provider correctly counsels the client after cryotheraphy', 'CC', 'April 12, 2019', 'admin'),
('CC-08', 'MAINTANANCE OF THE CRYOTHERAPY--\r\nThe provider properly gives maintainance to the cryotherapy', 'CC', 'April 12, 2019', 'admin'),
('ddd', 'ddd', 'FPFU', 'June 18, 2019', 'ID31777'),
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
  `name` varchar(255) NOT NULL,
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

INSERT INTO `user` (`user_id`, `name`, `department_id`, `role`, `area`, `email_address`, `username`, `password`, `status`) VALUES
('ID1545', 'Alfred Liwewe', 'CC', 'In charge', '--select area--', 'liwewerobati@gmail.com', 'alfred', '29cb2448018800ab65a9de297548b6e0', 'On'),
('ID17028', 'Robert Liwewe', 'FANC', 'In charge', 'Area 1', 'a@gmail.com', 'charge', '4a7d1ed414474e4033ac29ccb8653d9b', 'On'),
('ID17531', 'hdhhdhdhhd', 'CC', 'Admin', 'Area 8', 'saiwa@gmail.com', 'lll', '562b530cff1f5bca3b1a4c1ad4ad9962', 'Off'),
('ID1786', 'wawa', 'FANC', 'Assessor', 'Area 1', 's@gmai.com', 'wawa', '892a9944cf14665375630c06a1902152', 'On'),
('ID2320', 'Charles Maliro', 'FANC', 'Assessor', 'Area 1', 'c@gmail.com', 'maliro', '06c56a89949d617def52f371c357b6db', 'Off'),
('ID23542', 'Alfred Liwewe', 'STI', 'Assessor', 'Area 9', 'lw@gmail.com', 'liwewe', '90b29b568e2e1d17adb10be1c58c7fc0', 'On'),
('ID27739', 'koko', 'CC', 'Assessor', 'Area 8', 'f@gmail.com', 'koko', '37f525e2b6fc3cb4abd882f708ab80eb', 'On'),
('ID29928', 'kuku', 'CC', 'Assessor', 'Area 8', 's@gmail.com', 'charge', '4a7d1ed414474e4033ac29ccb8653d9b', 'On'),
('ID30002', 'bobo', 'None', 'Assessor', 'none', 'bobo@gmail.com', 'bobo', '82136b4240d6ce4ea7d03e51469a393b', 'On'),
('ID31210', 'john makawa', 'Assessor', 'Admin', 'none', 'a@gmail.com', 'makawa', '0d156058b4dd66d0bb20d0bb9ea083da', 'On'),
('ID31777', 'Vincent Saiwa', 'none', 'Admin', 'none', 'saiwa@gmail.com', 'admin', 'b15ab3f829f0f897fe507ef548741afb', 'On'),
('ID6352', 'daddad', 'None', 'Admin', 'none', 's@gmail.com', 'saiwa', '6d7fdaa95995d103fe72eb129275fdd4', 'On'),
('ID7925', 'Robert Liwewe', 'CC', 'Assessor', 'Area 8', 's@gmail.com', 'vin', '62911ad86d6181442022683afb480067', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` varchar(56) NOT NULL,
  `visit_date` varchar(60) NOT NULL,
  `visit_type` varchar(68) NOT NULL,
  `assessor` varchar(80) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `visit_date`, `visit_type`, `assessor`, `user_id`) VALUES
('V10373', 'April 08 , 2019', 'Assessment', ' mary vincent', 'ID29762'),
('V11228', 'April 08 , 2019', 'Assessment', ' mary vincent', 'ID27481'),
('V11866', 'March 28 , 2019', 'Assessment', 'Mary Chigalu', '22'),
('V12458', 'March 28 , 2019', 'Assessment', 'Vincent Saiwa', '22'),
('V14080', 'April 08 , 2019', 'Assessment', 'nono', 'ID798'),
('V14091', 'April 08 , 2019', 'Assessment', ' mary vincent', 'ID798'),
('V22360', 'April 08 , 2019', 'Follow-up', 'Abiti Patuma', 'ID798'),
('V22667', 'March 28 , 2019', 'Assessment', 'Vincent Saiwa', '22'),
('V23242', 'April 08 , 2019', 'Assessment', ' mary vincent', 'ID798'),
('V23279', 'April 08 , 2019', 'Assessment', 'nono', 'ID798'),
('V24360', 'March 28 , 2019', 'Assessment', 'Vincent Saiwa', '22'),
('V26517', 'March 28 , 2019', 'Assessment', 'Mary Chigalu', '22'),
('V31035', 'April 03 , 2019', 'Assessment', 'nono', 'ID29762'),
('V31365', 'April 08 , 2019', 'Assessment', ' mary vincent', 'ID798'),
('V31867', 'March 28 , 2019', 'Assessment', 'Mary Chigalu', '22'),
('V387', 'March 28 , 2019', 'Assessment', 'Vincent Saiwa', '22'),
('V4611', 'April 28 , 2019', 'Assessment', 'Alfred Liwewe', 'ID1786'),
('V8945', 'March 28 , 2019', 'Assessment', 'Vincent Saiwa', '22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
