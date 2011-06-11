-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2011 at 01:33 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `heinzite`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `action_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `action_name` varchar(255) DEFAULT NULL,
  `action_description` text,
  `date_created` date DEFAULT NULL,
  `time_created` time DEFAULT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `incident_action`
--

CREATE TABLE IF NOT EXISTS `incident_action` (
  `incident_action_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) unsigned zerofill DEFAULT NULL,
  `action_id` int(11) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`incident_action_id`),
  KEY `incedent_id` (`incident_id`,`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_action`
--


-- --------------------------------------------------------

--
-- Table structure for table `incident_element`
--

CREATE TABLE IF NOT EXISTS `incident_element` (
  `incident_element_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) unsigned zerofill NOT NULL,
  `element_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`incident_element_id`),
  KEY `incident_id` (`incident_id`,`element_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_element`
--


-- --------------------------------------------------------

--
-- Table structure for table `incident_log_base`
--

CREATE TABLE IF NOT EXISTS `incident_log_base` (
  `incident_log_base_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `reporting_user_id` int(11) unsigned zerofill DEFAULT NULL,
  `logged_by_staff_id` int(11) unsigned zerofill DEFAULT NULL,
  `souce_id` int(11) unsigned zerofill DEFAULT NULL,
  `closed_by_user_id` int(11) unsigned zerofill DEFAULT NULL,
  `assigned_to_user_id` int(11) unsigned zerofill DEFAULT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_closed` date DEFAULT NULL,
  `time_closed` time DEFAULT NULL,
  PRIMARY KEY (`incident_log_base_id`),
  KEY `reporting_user_id` (`reporting_user_id`,`logged_by_staff_id`,`souce_id`,`closed_by_user_id`,`assigned_to_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_log_base`
--


-- --------------------------------------------------------

--
-- Table structure for table `incident_remark`
--

CREATE TABLE IF NOT EXISTS `incident_remark` (
  `incident_remark_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) unsigned zerofill DEFAULT NULL,
  `remark_id` int(11) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`incident_remark_id`),
  KEY `incident_id` (`incident_id`,`remark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_remark`
--


-- --------------------------------------------------------

--
-- Table structure for table `incident_tag`
--

CREATE TABLE IF NOT EXISTS `incident_tag` (
  `incident_tag_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) unsigned zerofill NOT NULL,
  `tag_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`incident_tag_id`),
  KEY `incident_id` (`incident_id`,`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_tag`
--


-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `remark_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `created_by_staff_id` int(11) unsigned zerofill DEFAULT NULL,
  `remark_content` text,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  PRIMARY KEY (`remark_id`),
  KEY `created_by_staff_id` (`created_by_staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `remarks`
--


-- --------------------------------------------------------

--
-- Table structure for table `reporting_user`
--

CREATE TABLE IF NOT EXISTS `reporting_user` (
  `reporting_user_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `department_id` int(11) unsigned zerofill DEFAULT NULL,
  `identification` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  PRIMARY KEY (`reporting_user_id`),
  KEY `department_id` (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reporting_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned zerofill DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) DEFAULT NULL,
  `tag_description` text,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tags`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `role_description` text,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `roles`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
  `issue_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `issue_name` varchar(255) DEFAULT NULL,
  `issue_description` text,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `issues`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `department_description` text,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `departments`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident_issue`
--

CREATE TABLE IF NOT EXISTS `incident_issue` (
  `incident_issue_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `incident_id` int(11) unsigned zerofill NOT NULL,
  `issue_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`incident_issue_id`),
  KEY `incident_id` (`incident_id`,`issue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `incident_issue`
--
