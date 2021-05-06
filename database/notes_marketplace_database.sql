-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 01:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Name`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '+91', NULL, NULL, NULL, NULL, b'1'),
(2, 'USA', '+1', NULL, NULL, NULL, NULL, b'1'),
(3, 'UK', '+44', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `Seller` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `Downloader` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `IsSellerHasAllowedDownload` bit(1) NOT NULL COMMENT 'For paid notes default false. For free notes it will be true anyway.',
  `AttachmentPath` varchar(255) DEFAULT NULL,
  `IsAttachmentDownloaded` bit(1) NOT NULL COMMENT 'For paid notes default false. For free notes it will be true anyway.',
  `AttachmentDownloadedDate` datetime DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL COMMENT 'If Paid we need to set true, if free we need to set to false.',
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(38, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 11:00:38', 34, '2021-05-03 11:00:38', 34),
(39, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 11:06:26', 34, '2021-05-03 11:06:26', 34),
(40, 19, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-03 11:56:38', b'0', '0', 'Maths', 'Computer Science', '2021-05-03 11:56:38', 34, '2021-05-03 11:56:38', 34),
(41, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 11:56:56', 34, '2021-05-03 11:56:56', 34),
(42, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 11:57:41', 34, '2021-05-03 11:57:41', 34),
(43, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 11:58:51', 34, '2021-05-03 11:58:51', 34),
(44, 21, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 12:03:50', 34, '2021-05-03 12:03:50', 34),
(45, 21, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 12:15:04', 34, '2021-05-03 12:15:04', 34),
(46, 21, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 12:15:38', 34, '2021-05-03 12:15:38', 34),
(47, 21, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:11:12', b'1', '11', 'Java', 'Computer Science', '2021-05-03 12:16:03', 34, '2021-05-03 12:16:03', 34),
(48, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 12:30:33', 34, '2021-05-03 12:30:33', 34),
(49, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:10', 34, '2021-05-03 17:00:10', 34),
(50, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:40', 34, '2021-05-03 17:00:40', 34),
(51, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:44', 34, '2021-05-03 17:00:44', 34),
(52, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:46', 34, '2021-05-03 17:00:46', 34),
(53, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:48', 34, '2021-05-03 17:00:48', 34),
(54, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:50', 34, '2021-05-03 17:00:50', 34),
(55, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:00:52', 34, '2021-05-03 17:00:52', 34),
(56, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:11', 34, '2021-05-03 17:01:11', 34),
(57, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:13', 34, '2021-05-03 17:01:13', 34),
(58, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:27', 34, '2021-05-03 17:01:27', 34),
(59, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:29', 34, '2021-05-03 17:01:29', 34),
(60, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:30', 34, '2021-05-03 17:01:30', 34),
(61, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:33', 34, '2021-05-03 17:01:33', 34),
(62, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:35', 34, '2021-05-03 17:01:35', 34),
(63, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:01:36', 34, '2021-05-03 17:01:36', 34),
(64, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:02:02', 34, '2021-05-03 17:02:02', 34),
(65, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:02:20', 34, '2021-05-03 17:02:20', 34),
(66, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:02:34', 34, '2021-05-03 17:02:34', 34),
(67, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:11:27', 34, '2021-05-03 17:11:27', 34),
(68, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:41:06', 34, '2021-05-03 17:41:06', 34),
(69, 10, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-03 17:41:08', 34, '2021-05-03 17:41:08', 34),
(70, 13, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 13:57:45', b'1', '123', 'Medi', 'Medical', '2021-05-03 17:41:39', 34, '2021-05-03 17:41:39', 34),
(71, 13, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 13:57:45', b'1', '123', 'Medi', 'Medical', '2021-05-03 17:42:17', 34, '2021-05-03 17:42:17', 34),
(72, 19, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-03 17:42:26', b'0', '0', 'Maths', 'Computer Science', '2021-05-03 17:42:26', 34, '2021-05-03 17:42:26', 34),
(73, 19, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-04 11:05:42', b'0', '0', 'Maths', 'Computer Science', '2021-05-04 11:05:42', 34, '2021-05-04 11:05:42', 34),
(74, 13, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 13:57:45', b'1', '123', 'Medi', 'Medical', '2021-05-04 16:34:55', 33, '2021-05-04 16:34:55', 33),
(75, 10, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-04 16:36:13', 33, '2021-05-04 16:36:13', 33),
(76, 13, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 13:57:45', b'1', '123', 'Medi', 'Medical', '2021-05-04 16:36:18', 33, '2021-05-04 16:36:18', 33),
(77, 13, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 13:57:45', b'1', '123', 'Medi', 'Medical', '2021-05-04 16:36:21', 33, '2021-05-04 16:36:21', 33),
(78, 21, 33, 33, b'0', '', b'0', '2021-05-04 16:39:19', b'1', '11', 'Java', 'Computer Science', '2021-05-04 16:39:19', 33, '2021-05-04 16:39:19', 33),
(79, 21, 33, 33, b'0', '', b'0', '2021-05-04 17:44:54', b'1', '11', 'Java', 'Computer Science', '2021-05-04 17:44:54', 33, '2021-05-04 17:44:54', 33),
(80, 13, 33, 33, b'0', '', b'0', '2021-05-04 17:45:01', b'1', '123', 'Medi', 'Medical', '2021-05-04 17:45:01', 33, '2021-05-04 17:45:01', 33),
(81, 10, 33, 33, b'0', '', b'0', '2021-05-04 17:45:09', b'1', '12', 'DBMS', 'Computer Science', '2021-05-04 17:45:09', 33, '2021-05-04 17:45:09', 33),
(82, 13, 33, 33, b'0', '', b'0', '2021-05-04 17:45:14', b'1', '123', 'Medi', 'Medical', '2021-05-04 17:45:14', 33, '2021-05-04 17:45:14', 33),
(83, 21, 33, 33, b'0', '', b'0', '2021-05-04 18:00:34', b'1', '11', 'Java', 'Computer Science', '2021-05-04 18:00:34', 33, '2021-05-04 18:00:34', 33),
(84, 10, 33, 33, b'0', '', b'0', '0000-00-00 00:00:00', b'1', '12', 'DBMS', 'Computer Science', '2021-05-05 09:45:38', 33, '2021-05-05 09:45:38', 33),
(85, 13, 33, 33, b'0', '', b'0', '0000-00-00 00:00:00', b'1', '123', 'Medi', 'Medical', '2021-05-05 09:49:55', 33, '2021-05-05 09:49:55', 33),
(86, 13, 33, 33, b'0', '', b'0', '0000-00-00 00:00:00', b'1', '123', 'Medi', 'Medical', '2021-05-05 09:51:38', 33, '2021-05-05 09:51:38', 33),
(87, 10, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 10:22:44', b'1', '12', 'DBMS', 'Computer Science', '2021-05-05 09:53:18', 33, '2021-05-05 09:53:18', 33),
(88, 21, 33, 33, b'0', '', b'0', '0000-00-00 00:00:00', b'1', '11', 'Java', 'Computer Science', '2021-05-05 10:59:12', 33, '2021-05-05 10:59:12', 33),
(89, 10, 33, 33, b'0', '', b'0', '2021-05-05 14:22:39', b'1', '12', 'DBMS', 'Computer Science', '2021-05-05 14:22:39', 33, '2021-05-05 14:22:39', 33),
(90, 10, 33, 34, b'0', '', b'0', '2021-05-05 19:10:56', b'1', '12', 'DBMS', 'Computer Science', '2021-05-05 19:10:56', 34, '2021-05-05 19:10:56', 34),
(91, 13, 33, 34, b'0', '', b'0', '2021-05-05 19:11:11', b'1', '123', 'Medi', 'Medical', '2021-05-05 19:11:11', 34, '2021-05-05 19:11:11', 34),
(92, 25, 33, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 19:11:15', b'0', '0', 'C', 'Computer Science', '2021-05-05 19:11:15', 34, '2021-05-05 19:11:15', 34),
(93, 33, 34, 34, b'1', '../uploads/note_upload_pdf/sample.pdf', b'1', '2021-05-05 19:11:23', b'0', '0', 'C++', 'Computer Science', '2021-05-05 19:11:23', 34, '2021-05-05 19:11:23', 34),
(94, 10, 33, 34, b'0', '', b'0', '2021-05-06 11:51:25', b'1', '12', 'DBMS', 'Computer Science', '2021-05-06 11:51:25', 34, '2021-05-06 11:51:25', 34);

-- --------------------------------------------------------

--
-- Table structure for table `note_categories`
--

CREATE TABLE `note_categories` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'Computer Science, IT,  Politics, Sports, Cricket,  etc..',
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_categories`
--

INSERT INTO `note_categories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Computer Science', 'Computer Science', NULL, NULL, NULL, NULL, b'1'),
(2, 'Medical', 'Medical', NULL, NULL, NULL, NULL, b'1'),
(3, 'Low', 'Low', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `note_types`
--

CREATE TABLE `note_types` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'Handwritten notes, university notes, novel, story books etc.. ',
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_types`
--

INSERT INTO `note_types` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Handwritten Notes', 'Handwritten Notes', NULL, NULL, NULL, NULL, b'1'),
(2, 'University Notes', 'University Notes', NULL, NULL, NULL, NULL, b'1'),
(3, 'Novel', 'Novel', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `reference_data`
--

CREATE TABLE `reference_data` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Value` varchar(100) NOT NULL COMMENT 'Value to display over UI for each data item ',
  `DataValue` varchar(100) NOT NULL COMMENT 'Unique identifier for dataitem per category which admin never can change.',
  `RefCategory` varchar(100) NOT NULL COMMENT 'category name. i.e. NotesStatus, SellingMode,Gender etc.',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference_data`
--

INSERT INTO `reference_data` (`ID`, `Value`, `DataValue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(2, 'Female', 'Fe', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(3, 'Unknown', 'U', 'Gender', NULL, NULL, NULL, NULL, b'0'),
(4, 'Paid', 'P', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(5, 'Free', 'F', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(6, 'Draft', 'Draft', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(8, 'In Review ', 'In Review ', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(9, 'Published ', 'Published ', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(10, 'Rejected', 'Rejected', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(11, 'Removed ', 'Removed ', 'Notes Status', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes`
--

CREATE TABLE `seller_notes` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `SellerID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `Status` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with ReferenceData table.',
  `ActionedBy` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `AdminRemarks` varchar(255) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL COMMENT 'Date and time when admin approves  a record.',
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with NotesCategory  table.',
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with NoteTypes table.',
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Country table.',
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL COMMENT 'Set false if selling mode is free and set true if selling mode is paid.',
  `SellingPrice` decimal(10,0) DEFAULT NULL COMMENT 'if selling mode is paid - selling price cannot be a null',
  `NotesPreview` varchar(255) DEFAULT NULL COMMENT 'if selling mode is paid - note preview cannot be a null',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes`
--

INSERT INTO `seller_notes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(10, 33, 9, 34, NULL, '2021-04-14 15:39:53', 'DBMS', 1, '../uploads/note_display_img/first.jpg', 1, 123, 'Database Management System (DBMS) is a software for storing and retrieving users\' data while considering appropriate security measures. It consists of a group of programs which manipulate the database.', 'GEC', 1, 'dsfsa', 'asd23', 'asfsdasf', b'1', '12', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(11, 33, 6, 34, NULL, '2021-04-14 15:41:31', 'abc', 1, 'first.jpg', 1, 123, 'asdfasdfafds', 'asf', 1, 'dsfsa', 'asd23', 'asfsdasf', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(13, 33, 9, 34, NULL, '2021-04-14 15:41:31', 'Medi', 2, '../uploads/note_display_img/first.jpg', 2, 123, 'Bachelor of Medicine, Bachelor of Surgery, or in Latin: Medicinae Baccalaureus Baccalaureus Chirurgiae, are the two bachelor degrees in medicine and surgery, which is an undergraduate degree awarded by the medical schools of universities in countries that', 'ABC', 2, 'ASD', 'AS12', 'ABCD', b'1', '123', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(14, 34, 6, 34, NULL, '2021-04-14 15:41:31', 'MAths', 1, 'first.jpg', 1, 123, 'asddsfadgd', 'ABC', 1, 'ASD', 'asd23', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(15, 34, 6, 34, NULL, '2021-04-14 15:41:31', 'MAths', 1, 'first.jpg', 1, 12, 'asdfasdfasdf', 'asd', 2, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(16, 34, 6, 34, NULL, '2021-04-14 15:41:31', 'MAths', 1, 'first.jpg', 1, 12, 'asdfasdfasdf', 'asd', 2, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(17, 34, 6, 34, NULL, '2021-04-14 15:41:31', 'MAths', 1, 'first.jpg', 1, 12, 'asdfasdfasdf', 'asd', 2, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(19, 33, 9, 34, NULL, '2021-04-14 15:41:31', 'Maths', 1, '../uploads/note_display_img/first.jpg', 1, 12, 'maths', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(20, 34, 6, 34, NULL, '2021-04-14 15:41:31', 'Maths', 1, 'first.jpg', 1, 12, 'maths', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(21, 33, 9, 34, NULL, '2021-04-14 15:41:31', 'Java', 1, '../uploads/note_display_img/first.jpg', 2, 234, 'JAVA', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'1', '11', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(22, 34, 7, 34, NULL, '2021-04-14 15:41:31', 'Java', 1, 'first.jpg', 2, 234, 'JAVA', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'1', '11', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(23, 34, 7, 34, NULL, '2021-04-14 15:39:53', 'Java', 1, 'first.jpg', 2, 234, 'JAVA', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'1', '11', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(24, 34, 7, 34, NULL, '2021-04-22 11:05:05', 'Java', 1, 'first.jpg', 2, 222, 'JAVA', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(25, 33, 9, 34, NULL, '2021-04-22 16:58:11', 'C', 1, '../uploads/note_display_img/first.jpg', 1, 22, 'C', 'ABC', 2, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(26, 34, 6, 34, NULL, '2021-04-22 17:04:55', 'C', 1, 'first.jpg', 1, 22, 'C', 'ABC', 2, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(27, 34, 6, 34, NULL, '2021-04-22 17:06:13', 'C', 1, 'first.jpg', 1, 22, 'C', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(28, 34, 6, 34, NULL, '2021-04-22 17:13:33', 'C', 1, 'first.jpg', 1, 22, 'C', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(29, 34, 6, 34, NULL, '2021-04-22 17:19:27', 'C', 1, 'first.jpg', 1, 22, 'C', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'0', '0', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(30, 34, 6, 34, NULL, '2021-04-29 11:02:59', 'Maths', 1, '', 1, 12, 'Maths', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'1', '11', 'sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(31, 34, 6, 34, NULL, '2021-04-29 11:34:54', 'Maths', 1, '../uploads/note_display_img/first.jpg', 1, 12, 'Maths', 'ABC', 2, 'ASD', 'AS12', 'ABCD', b'1', '12', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(32, 34, 6, 34, NULL, '2021-04-29 15:10:50', 'C', 1, '../uploads/note_display_img/1.jpg', 1, 123, 'C', 'ABC', 1, 'ASD', 'AS12', 'ABCD', b'1', '12', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(33, 34, 9, 34, NULL, '2021-04-29 16:07:34', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(34, 34, 6, 34, NULL, '2021-04-29 16:12:21', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(35, 34, 6, 34, NULL, '2021-04-29 16:35:07', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(36, 34, 6, 34, NULL, '2021-04-29 16:35:44', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(37, 34, 6, 34, NULL, '2021-04-29 16:54:01', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', 'ABC', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(38, 34, 6, 34, NULL, '2021-04-29 16:55:11', 'C++', 1, '../uploads/note_display_img/first.jpg', 2, 12, 'C++', '', 3, 'ASD', 'AS12', 'ABCD', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(43, 34, 6, 34, NULL, '2021-04-30 16:09:40', 'DSA', 1, '', 2, 123, 'DSA', '', 3, '', '', '', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(44, 34, 6, 34, '', '2021-04-30 18:30:00', 'CD', 1, '', 2, 234, 'CD', '', 3, '', '', '', b'1', '15', '../uploads/note_preview_pdf/sample.pdf', '2021-04-30 18:30:00', 34, '2021-04-30 18:30:00', 0, b'0'),
(45, 34, 6, 34, '', '2021-05-01 08:09:47', 'CD', 1, '', 2, 234, 'CD', '', 3, '', '', '', b'0', '0', '../uploads/note_preview_pdf/sample.pdf', '2021-05-01 08:09:47', 34, '2021-05-01 08:09:47', 0, b'0'),
(46, 34, 6, 34, '', '2021-05-01 08:10:08', 'CD', 1, '', 2, 234, 'CD', '', 3, '', '', '', b'1', '15', '../uploads/note_preview_pdf/sample.pdf', '2021-05-01 08:10:08', 34, '2021-05-01 08:10:08', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_attachements`
--

CREATE TABLE `seller_notes_attachements` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(255) NOT NULL COMMENT 'Store the file path information.',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes_attachements`
--

INSERT INTO `seller_notes_attachements` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 10, 'DBMS', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(2, 11, 'abc', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(3, 13, 'Medi', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(4, 14, 'MAths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(5, 15, 'MAths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(6, 16, 'MAths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(7, 17, 'MAths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(8, 19, 'Maths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(9, 20, 'Maths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(10, 21, 'Java', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(11, 22, 'Java', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(12, 23, 'Java', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(13, 24, 'Java', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(14, 25, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(15, 26, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(16, 27, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(17, 28, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(18, 29, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(19, 30, 'Maths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(20, 31, 'Maths', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(21, 32, 'C', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(22, 33, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(23, 34, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(24, 35, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(25, 36, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(26, 37, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(27, 38, 'C++', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(28, 43, 'DSA', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(29, 44, 'CD', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(30, 45, 'CD', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0'),
(31, 46, 'CD', '../uploads/note_upload_pdf/sample.pdf', NULL, NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reported_issues`
--

CREATE TABLE `seller_notes_reported_issues` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `ReportedByID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `AgainstDownloadID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Downloadstable.',
  `Remarks` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reviews`
--

CREATE TABLE `seller_notes_reviews` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `ReviewedByID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `AgainstDownloadsID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Downloads  table.',
  `Ratings` decimal(10,0) NOT NULL COMMENT 'Ratings can be 1 to 5. It also can be 1.5,2.5 etc. this is required.',
  `Comments` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Key` varchar(100) NOT NULL COMMENT 'SupportEmailAddress, SupportContact Number, EmailAddresssesForNotify, \r\nDefaultNoteDisplayPicture, DefaultMemberDisplayPicture, FBICON, TWITTERICON, LNICON etc.',
  `Value` varchar(255) NOT NULL COMMENT 'Value for each key which will super admin will configure.',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `RoleID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with UserRoles table.',
  `FirstName` varchar(50) NOT NULL COMMENT 'Required information',
  `LastName` varchar(50) NOT NULL COMMENT 'Required information',
  `EmailID` varchar(100) NOT NULL COMMENT 'Required information, Unique EmailID across table.',
  `Password` varchar(24) NOT NULL COMMENT 'Required information',
  `Token` varchar(255) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL COMMENT 'Required information, Default set to false',
  `CreatedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who updates this record.',
  `IsActive` bit(1) NOT NULL COMMENT 'Required information , Default set to true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `Token`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(2, 2, 'Naresh', 'Gohil', 'nareshgohil1403@gmail.com', 'Abcd@123', 'e749736b0249abcd90067340', b'1', NULL, NULL, NULL, NULL, b'1'),
(33, 1, 'Kalpesh', 'Makwana', 'kalpesh.makwana0310@gmail.com', 'b3eab11aa4bfd410', 'e749736b0249089d90067340', b'1', NULL, NULL, NULL, NULL, b'1'),
(34, 1, 'Kalpesh', 'Makwana', 'sir.micky007@gmail.com', 'Abcd@123', 'b14168526c834b0cc57f3b3b', b'1', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `UserID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with ReferenceData table.',
  `SecondaryEmailAddress` varchar(100) NOT NULL COMMENT 'For Admin users only.',
  `PhoneNumberCountryCode` varchar(5) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `PhoneNumberCountryCode`, `PhoneNumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 34, NULL, NULL, '', '+91', '9924812345', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(50) NOT NULL COMMENT 'Entries can be Member, Admin or  Super Admin',
  `Description` varchar(255) DEFAULT NULL COMMENT 'What this role usage is one can write here.',
  `CreatedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record. Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record. Super Admin ID you can insert static.',
  `IsActive` bit(1) NOT NULL COMMENT 'Required information , Default set to true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Member', 'Member', NULL, NULL, NULL, NULL, b'1'),
(2, 'Admin', 'Admin', NULL, NULL, NULL, NULL, b'1'),
(3, 'Super Admin', 'Super Admin', NULL, NULL, NULL, NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `note_categories`
--
ALTER TABLE `note_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `note_types`
--
ALTER TABLE `note_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reference_data`
--
ALTER TABLE `reference_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ActionedBy` (`ActionedBy`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`);

--
-- Indexes for table `seller_notes_attachements`
--
ALTER TABLE `seller_notes_attachements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

--
-- Indexes for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `system_configurations`
--
ALTER TABLE `system_configurations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Gender` (`Gender`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `seller_notes_attachements`
--
ALTER TABLE `seller_notes_attachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

--
-- Constraints for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD CONSTRAINT `seller_notes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `reference_data` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_3` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_4` FOREIGN KEY (`Category`) REFERENCES `note_categories` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_5` FOREIGN KEY (`NoteType`) REFERENCES `note_types` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_6` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`);

--
-- Constraints for table `seller_notes_attachements`
--
ALTER TABLE `seller_notes_attachements`
  ADD CONSTRAINT `seller_notes_attachements_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`);

--
-- Constraints for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD CONSTRAINT `seller_notes_reviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `user_roles` (`ID`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `reference_data` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
