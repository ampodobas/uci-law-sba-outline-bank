-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2015 at 10:27 PM
-- Server version: 5.5.47
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sba-outline-bank`
--
CREATE DATABASE IF NOT EXISTS `sba-outline-bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sba-outline-bank`;

-- --------------------------------------------------------

--
-- Table structure for table `file_entries`
--

DROP TABLE IF EXISTS `file_entries`;
CREATE TABLE `file_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professor_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_name` text COLLATE utf8_unicode_ci,
  `submitting_user_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submitting_user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submitting_user_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submitting_user_last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submitting_user_projected_graduation_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `academic_term` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------
--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `sync_user_id_to_role_user_table`;
DELIMITER $$
CREATE TRIGGER `sync_user_id_to_role_user_table` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO role_user (user_id, role_id) VALUES (NEW.id, 3)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `who_taught_what`
--

DROP TABLE IF EXISTS `who_taught_what`;
CREATE TABLE `who_taught_what` (
  `id` int(11) UNSIGNED NOT NULL,
  `wtw_value` varchar(255) DEFAULT NULL,
  `wtw_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `file_entries`
--
ALTER TABLE `file_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_taught_what`
--
ALTER TABLE `who_taught_what`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `file_entries`
--
ALTER TABLE `file_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `who_taught_what`
--
ALTER TABLE `who_taught_what`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
