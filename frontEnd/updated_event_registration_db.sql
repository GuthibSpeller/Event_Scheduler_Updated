-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 06:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_registration_db`
--
CREATE DATABASE IF NOT EXISTS `event_registration_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `event_registration_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin_password` char(60) NOT NULL,
  `office` enum('SG','Hyperlink','BYTe','LISA','DevCom') NOT NULL,
  `is_ultimate_admin` tinyint(1) NOT NULL DEFAULT 0,
  `admin_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email`, `username`, `admin_password`, `office`, `is_ultimate_admin`, `admin_created_at`) VALUES
(2, 'wayne', 'clifford', 'cliffordgauken@gmail.com', 'hello_world', '$2y$10$wWZUE1dGKVNJNuRXiO5fuOUMhWnUYO7v1aoOG2XHIVxydW1jqg1Te', 'SG', 0, '2025-11-17 00:17:59'),
(5, 'hi', 'hello', 'clifford@gmail.com', 'HELLO', '$2y$10$6TojRY3V2PdTNqNwJpjh5urpuC9INOpyhSif/se7ubcW58x.yrDJu', 'SG', 0, '2025-11-17 00:26:17'),
(8, 'hi', 'hello', 'cliff@gmail.com', 'HELL', '$2y$10$JlsKuvjNr9jzwzWn3UqwkeeDusce8erFJ3DtYB0YXNOn35IonkoWy', 'SG', 0, '2025-11-17 00:28:17'),
(9, 'wayne', 'clifford', 'helloWorld@gmail.com', 'hello_world_ph', '$2y$10$IA5CyfALwiNfSbMHatsxWuHiztAtQQ9r9WsFehbQOMwUxZ1veo3CC', 'SG', 0, '2025-11-17 00:30:00'),
(12, 'wayne', 'clifford', 'sino@gmail.com', 'ako ito', '$2y$10$VGY2mIXjNND9Fp62surpHOtLlyydnBSmT2lQKlk47F19XPz9AUh9W', 'SG', 0, '2025-11-18 18:29:44'),
(14, 'wayne', 'clifford', 'sinoka@gmail.com', 'ako', '$2y$10$5bvU/v7e/flZi5NXpsQ3leuB5cALtIk3Xl0MysiXxHoSjMgkkG7XW', 'SG', 0, '2025-11-18 18:33:41'),
(15, 'wayne', 'clifford', 'syak@gmail.com', 'syak', '$2y$10$kMpTUzqQmRyzX90sRInruuXLp4j7qDwCDMEt//uTkBQgtzLyhtTpC', 'SG', 0, '2025-11-18 21:30:15'),
(19, 'wayne', 'clifford', 'hwbqwcucqtweipq@gmail.com', 'dbjweqwuetvq', '$2y$10$mMY6PbhIMREUkR3Cz.U74e1oCxGOPmxCCDbv2gleBc.O5/f7R065K', 'LISA', 1, '2025-11-18 22:59:34'),
(20, 'qasdhjfgkf', 'qwatesyrtuk', 'WAERSTHD@gmail.com', 'qWRETRYY', '$2y$10$hlsN9.MySz20Bs/UYis31e6d8sUU1jB0xmS0LmxyZcVEuIc4sNNCW', 'Hyperlink', 1, '2025-11-19 08:10:42'),
(21, 'rqwety', 'agsghf', 'qwetrytu@gmail.com', 'wqetrt', '$2y$10$gZ1HHRZnaPzuPI/.0LXZF.V8iMlWlTKR03Sp2AQYdaUyFW1rUDlNm', 'SG', 1, '2025-11-19 08:11:52'),
(22, '123', '123', '123@gmail.com', '123', '$2y$10$8.X2VfMtiuQSmXlHlEKXcelTVYdhpPtGbph8tgcz.2IgjDOVqso5a', 'Hyperlink', 0, '2025-11-19 08:47:46'),
(23, 'sdasf', 'asdf', 'super@gmail.com', 'super', '$2y$10$OH8Npny249rrHfbNqwbU7OVB/nUNuo9ffWviZ2bn1XndmZhCTX5Dy', 'BYTe', 1, '2025-11-19 12:31:25'),
(25, 'sdf', 'sfdgf', 'user@gmail.com', 'user', '$2y$10$94TFHYpP/RPyJfcayOj0C.4dYfZsVddOpEsgN2JUr3hh0vB96Lstm', 'BYTe', 0, '2025-11-19 12:34:51'),
(26, '12345', '12345', 'numbers@gmail.com', 'numbers', '$2y$10$PXiN3IAlSFxSdcjcxNL8GObmUkSoP8cNiL6bsaBAOcIPIAy3BVWnO', 'Hyperlink', 0, '2025-11-19 15:24:33'),
(27, 'Dex', 'pang', 'rufinodexter@gmail.com', 'dexie', '$2y$10$Q6NsKKQoI3c0Y.Zer0.P.OaGTHXEjmVwSlmTfVDAOTHdl2VSD7Fr2', 'BYTe', 1, '2025-11-23 00:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_location` text DEFAULT '\'unknown\'',
  `event_status` enum('pending','completed','cancelled','') NOT NULL,
  `event_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `event_author` enum('BYTe','LISA','DevCom','SG','Hyperlink') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`id`, `event_title`, `event_description`, `event_start`, `event_end`, `event_location`, `event_status`, `event_created_at`, `event_author`) VALUES
(1, 'BYTE Tech Bootcamp', 'A hands-on workshop introducing students to Python, Git, and basic cybersecurity practices.', '2025-12-05 09:00:00', '2025-12-05 16:00:00', 'ICT Building, Lab 203', 'completed', '2025-11-20 10:00:11', 'BYTe'),
(2, 'Hack-It Coding Challenge', 'hackathon', '2025-11-22 08:00:00', '2025-11-22 16:00:00', 'Innovation Hub', 'pending', '2025-11-20 10:01:23', 'BYTe'),
(3, 'BYTE Hardware Expo', 'Exhibition of computer hardware', '2025-11-26 10:00:00', '2025-11-26 17:00:00', 'Engineering Auditorium', 'pending', '2025-11-20 10:02:08', 'BYTe'),
(4, 'Intro to Networking Seminar', 'session about routers, switches, subnetting, and network security', '2025-11-24 13:00:00', '2025-11-24 15:00:00', 'ICT Building, Room 102', 'pending', '2025-11-20 10:03:04', 'BYTe'),
(5, 'BYTE Game Dev Night', 'mini game showcase', '2025-11-30 17:00:00', '2025-11-30 21:00:00', 'Multimedia Lab', 'pending', '2025-11-20 10:05:13', 'BYTe'),
(6, 'Library Skills Training Workshop', 'Basics of cataloging and classification.', '2026-03-08 13:00:00', '2026-03-08 16:00:00', 'Library Training Room', 'pending', '2025-11-20 10:08:24', 'LISA'),
(7, 'Archives Preservation Seminar', 'Techniques for preserving and digitizing archives.', '2026-04-06 09:00:00', '2026-04-06 12:00:00', 'Historical Archives Center', 'pending', '2025-11-20 21:50:41', 'LISA'),
(8, 'LIS Research Forum', 'Presentation of LIS-related research studies.', '2026-05-02 14:00:00', '2026-05-20 17:00:00', 'Library Conference Hall', 'pending', '2025-11-20 21:51:58', 'LISA'),
(9, 'Cataloging & RDA Basics', 'Hands-on training on RDA and MARC formats.', '2026-03-20 10:00:00', '2026-03-20 13:00:00', 'Technical Services Room', 'pending', '2025-11-20 22:12:11', 'LISA'),
(10, 'Library Outreach Program', 'LIS student volunteer work at local libraries.', '2026-04-13 08:00:00', '2026-04-13 12:00:00', 'Barangay Public Library', 'pending', '2025-11-20 22:13:11', 'LISA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`,`username`);

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Database: `my_database`
--
CREATE DATABASE IF NOT EXISTS `my_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `my_database`;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"updated_event_registration_db\",\"table\":\"admins\"},{\"db\":\"event_registration_db\",\"table\":\"admins\"},{\"db\":\"updated_event_registration_db\",\"table\":\"eventlist\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-11-29 05:50:10', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":272}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `updated_event_registration_db`
--
CREATE DATABASE IF NOT EXISTS `updated_event_registration_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `updated_event_registration_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin_password` char(60) NOT NULL,
  `office` enum('SG','Hyperlink','BYTe','LISA','DevCom') NOT NULL,
  `is_ultimate_admin` tinyint(1) NOT NULL DEFAULT 0,
  `admin_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fname`, `lname`, `email`, `username`, `admin_password`, `office`, `is_ultimate_admin`, `admin_created_at`) VALUES
(2, 'wayne', 'clifford', 'cliffordgauken@gmail.com', 'hello_world', '$2y$10$wWZUE1dGKVNJNuRXiO5fuOUMhWnUYO7v1aoOG2XHIVxydW1jqg1Te', 'SG', 0, '2025-11-17 00:17:59'),
(5, 'hi', 'hello', 'clifford@gmail.com', 'HELLO', '$2y$10$6TojRY3V2PdTNqNwJpjh5urpuC9INOpyhSif/se7ubcW58x.yrDJu', 'SG', 0, '2025-11-17 00:26:17'),
(8, 'hi', 'hello', 'cliff@gmail.com', 'HELL', '$2y$10$JlsKuvjNr9jzwzWn3UqwkeeDusce8erFJ3DtYB0YXNOn35IonkoWy', 'SG', 0, '2025-11-17 00:28:17'),
(9, 'wayne', 'clifford', 'helloWorld@gmail.com', 'hello_world_ph', '$2y$10$IA5CyfALwiNfSbMHatsxWuHiztAtQQ9r9WsFehbQOMwUxZ1veo3CC', 'SG', 0, '2025-11-17 00:30:00'),
(12, 'wayne', 'clifford', 'sino@gmail.com', 'ako ito', '$2y$10$VGY2mIXjNND9Fp62surpHOtLlyydnBSmT2lQKlk47F19XPz9AUh9W', 'SG', 0, '2025-11-18 18:29:44'),
(14, 'wayne', 'clifford', 'sinoka@gmail.com', 'ako', '$2y$10$5bvU/v7e/flZi5NXpsQ3leuB5cALtIk3Xl0MysiXxHoSjMgkkG7XW', 'SG', 0, '2025-11-18 18:33:41'),
(15, 'wayne', 'clifford', 'syak@gmail.com', 'syak', '$2y$10$kMpTUzqQmRyzX90sRInruuXLp4j7qDwCDMEt//uTkBQgtzLyhtTpC', 'SG', 0, '2025-11-18 21:30:15'),
(19, 'wayne', 'clifford', 'hwbqwcucqtweipq@gmail.com', 'dbjweqwuetvq', '$2y$10$mMY6PbhIMREUkR3Cz.U74e1oCxGOPmxCCDbv2gleBc.O5/f7R065K', 'LISA', 1, '2025-11-18 22:59:34'),
(20, 'qasdhjfgkf', 'qwatesyrtuk', 'WAERSTHD@gmail.com', 'qWRETRYY', '$2y$10$hlsN9.MySz20Bs/UYis31e6d8sUU1jB0xmS0LmxyZcVEuIc4sNNCW', 'Hyperlink', 1, '2025-11-19 08:10:42'),
(21, 'rqwety', 'agsghf', 'qwetrytu@gmail.com', 'wqetrt', '$2y$10$gZ1HHRZnaPzuPI/.0LXZF.V8iMlWlTKR03Sp2AQYdaUyFW1rUDlNm', 'SG', 1, '2025-11-19 08:11:52'),
(22, '123', '123', '123@gmail.com', '123', '$2y$10$8.X2VfMtiuQSmXlHlEKXcelTVYdhpPtGbph8tgcz.2IgjDOVqso5a', 'Hyperlink', 0, '2025-11-19 08:47:46'),
(25, 'sdf', 'sfdgf', 'user@gmail.com', 'user', '$2y$10$b.Sl.4bJeVNyqGEJx3caQuF4xACciUBNMz/g421LHAnevs4F76x7m', 'BYTe', 0, '2025-11-19 12:34:51'),
(26, '12345', '12345', 'numbers@gmail.com', 'numbers', '$2y$10$PXiN3IAlSFxSdcjcxNL8GObmUkSoP8cNiL6bsaBAOcIPIAy3BVWnO', 'Hyperlink', 0, '2025-11-19 15:24:33'),
(29, 'Precious Angel', 'Ferrer', 'precious.kanto_tenyo23@gmail.com', 'kanto_tenyo', '$2y$10$NeY9mQIwIDRmkfhPs4OK9.Cx6uXwPdBi/QDnvZloD1z3OPbw.ikaa', 'SG', 1, '2025-11-24 08:51:16'),
(30, 'DAF', 'ARETSRYDT', 'hadhafaw@gmail.com', 'baguhan', '$2y$10$FeK1KU/LIzf6jL9cWX5JbuLdGblh1OcASwtn9AMy7yZzJcOvgdWh2', 'DevCom', 0, '2025-11-25 01:40:25'),
(32, 'Precious Angel', 'Ferrer', 'kokook@gmail.com', 'angel23', '$2y$10$Sw6Cv.LXHfPe6sCQIYi.kuhb9jYoiNeI3kaub1/BCV.Eqdv16iIlq', 'BYTe', 0, '2025-11-25 16:19:06'),
(44, 'dex', 'dex', 'asdfgh@gmail.com', 'dexter', '$2y$10$DNb6vP2mwSlYraL1zko6lebAmo5iFHiVKyfMvd9QjMGJXeVdxe.ti', 'DevCom', 1, '2025-11-29 08:27:06'),
(46, 'superman', 'briefs', 'super@gmail.com', 'super', '$2y$10$CXe5tBWHLwDeSKnW0wbEXOzRQP/F7uA6V4CHH/ovtDEXl0bDbcSa2', 'SG', 1, '2025-11-29 12:21:14'),
(48, 'tyui', 'worlf', 'hellowowrld@gmail.com', 'hellow', '$2y$10$/E3zC6VyccffZtX8W03FM.FZNBSY3MzGdbM8chHdFEc6R1SqQy1V.', 'SG', 0, '2025-11-29 12:27:56'),
(49, 'sdfg', 'asdfg', 'bulbol@gmail.com', 'bulbu;', '$2y$10$1P2UKV4DwE08SPMR6VoQlOd6GczvbmENjvhPdae5xr0BjtTisgIXG', 'BYTe', 1, '2025-11-29 12:32:13'),
(50, 'a', 'b', 'abc@gmail.com', 'c', '$2y$10$7mhGzZDXFoMaljceSxiQieD5cA.p/AdL.pjanbxyyZAikcXFW6q.u', 'BYTe', 0, '2025-11-29 12:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_location` text DEFAULT '\'unknown\'',
  `event_status` enum('pending','completed','cancelled','') NOT NULL,
  `event_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `event_author` enum('BYTe','LISA','DevCom','SG','Hyperlink') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`id`, `event_title`, `event_description`, `event_start`, `event_end`, `event_location`, `event_status`, `event_created_at`, `event_author`) VALUES
(1, 'BYTE Tech Bootcamp', 'A hands-on workshop introducing students to Python, Git, and basic cybersecurity practices.', '2025-12-05 09:00:00', '2025-12-05 16:00:00', 'ICT Building, Lab 203', 'completed', '2025-11-20 10:00:11', 'BYTe'),
(2, 'Hack-It Coding Challenge', 'Hackathon', '2025-11-22 08:00:00', '2025-11-22 16:00:00', 'Innovation Hub', 'pending', '2025-11-20 10:01:23', 'BYTe'),
(3, 'BYTE Hardware Expo', 'Exhibition of computer hardware', '2025-11-26 10:00:00', '2025-11-26 17:00:00', 'Engineering Auditorium', 'pending', '2025-11-20 10:02:08', 'BYTe'),
(4, 'Intro to Networking Seminar', 'session about routers, switches, subnetting, and network security', '2025-11-24 13:00:00', '2025-11-24 15:00:00', 'ICT Building, Room 102', 'pending', '2025-11-20 10:03:04', 'BYTe'),
(5, 'BYTE Game Dev Night', 'mini game showcase', '2025-11-30 17:00:00', '2025-11-30 21:00:00', 'Multimedia Lab', 'pending', '2025-11-20 10:05:13', 'BYTe'),
(6, 'Library Skills Training Workshop', 'Basics of cataloging and classification.', '2026-03-08 13:00:00', '2026-03-08 16:00:00', 'Library Training Room', 'pending', '2025-11-20 10:08:24', 'LISA'),
(7, 'Archives Preservation Seminar', 'Techniques for preserving and digitizing archives.', '2026-04-06 09:00:00', '2026-04-06 12:00:00', 'Historical Archives Center', 'pending', '2025-11-20 21:50:41', 'LISA'),
(8, 'LIS Research Forum', 'Presentation of LIS-related research studies.', '2026-05-02 14:00:00', '2026-05-20 17:00:00', 'Library Conference Hall', 'pending', '2025-11-20 21:51:58', 'LISA'),
(9, 'Cataloging & RDA Basics', 'Hands-on training on RDA and MARC formats.', '2026-03-20 10:00:00', '2026-03-20 13:00:00', 'Technical Services Room', 'pending', '2025-11-20 22:12:11', 'LISA'),
(10, 'Library Outreach Program', 'LIS student volunteer work at local libraries.', '2026-04-13 08:00:00', '2026-04-13 12:00:00', 'Barangay Public Library', 'pending', '2025-11-20 22:13:11', 'LISA'),
(11, 'Birthday', 'Birthday week', '2025-12-07 17:00:00', '2025-12-08 17:59:00', 'Cowboys', 'pending', '2025-11-24 00:55:34', 'BYTe'),
(15, 'Musical Ngani', 'Tototot', '2025-11-26 17:54:00', '2025-11-27 17:54:00', 'CIS', 'pending', '2025-11-26 17:54:57', 'DevCom'),
(16, 'test', 'sgGH', '2025-11-26 17:59:00', '2025-11-27 17:59:00', 're', 'pending', '2025-11-26 17:59:29', 'SG'),
(17, 'test2', 'AGQAg', '2025-11-29 17:59:00', '2025-12-06 17:59:00', 'Hanko ammo', 'pending', '2025-11-26 18:00:03', 'SG'),
(18, 'Sportfest', '\r\n', '2026-01-08 18:01:00', '2026-03-07 18:01:00', 'BSU', 'pending', '2025-11-26 18:01:19', 'Hyperlink');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`,`username`);

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
