-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 01:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugoph`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `disbursement`
--

CREATE TABLE `disbursement` (
  `disbursement_id` int(11) NOT NULL,
  `erunner_username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_released` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disbursement`
--

INSERT INTO `disbursement` (`disbursement_id`, `erunner_username`, `amount`, `date_released`) VALUES
(4, 'test', '870', '2019-02-22 00:47:16'),
(5, 'test', '870', '2019-02-22 01:11:47'),
(6, 'test', '0', '2019-02-22 01:12:51'),
(7, 'test', '0', '2019-02-22 01:22:07'),
(8, 'test', '0', '2019-02-22 01:24:12'),
(9, 'test', '220', '2019-02-22 20:59:29'),
(10, 'test', '340', '2019-02-22 21:00:25'),
(11, 'van', '420', '2019-02-23 21:39:11'),
(12, 'test', '1840', '2019-02-23 21:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `errand_category`
--

CREATE TABLE `errand_category` (
  `errand_category_id` int(11) NOT NULL,
  `errand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errand_category`
--

INSERT INTO `errand_category` (`errand_category_id`, `errand_name`) VALUES
(5, 'CLAIMING / FILING DOCUMENTS'),
(11, 'BILLS PAYMENT'),
(12, 'CANVASSING');

-- --------------------------------------------------------

--
-- Table structure for table `errand_option`
--

CREATE TABLE `errand_option` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(50) NOT NULL,
  `option_description` varchar(2555) NOT NULL,
  `booking_fee` varchar(255) NOT NULL,
  `rate_per_hour` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errand_option`
--

INSERT INTO `errand_option` (`option_id`, `option_name`, `option_description`, `booking_fee`, `rate_per_hour`, `errand_category_id`) VALUES
(5, 'Birth Certificate', '155 pesos, Complete name of the child (first & middle & last), Complete name of the father, Complete maiden name of the mother, Date of birth (month day year), Place of birth (city/municipality & province), Complete name and address of the requesting party, Relationship to the child, Number of copies needed, Purpose of the certification, Signed authorization letter from the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field (if recipient is not the owner), Original valid ID of the owner or spouse or any of the direct descendants (parent or grandparent, orchild or grandchild) indicated on the Requesting Party field, Original valid ID of the authorized representative.', '200', '20', 5),
(6, 'Death Certificate', '155 pesos, Complete name of the deceased person, Date of death, Place of death, Complete name and address of the requesting party, Number of copies needed, For what purpose the certification shall be used, Signed authorization letter from the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field (if recipient is not the owner), Original valid ID of the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field, Original valid ID of the authorized representative.', '200', '20', 5),
(7, 'Marriage Certificate', '155 pesos, Complete name of the husband, Complete name of the wife, Date of marriage, Place of marriage, Complete name and address of the requesting party, Number of copies needed, Purpose for the certification, Signed authorization letter from the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field (if recipient is not the owner), Original valid ID of the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field, Original valid ID of the authorized representative.', '200', '20', 5),
(8, 'CENOMAR', '210 pesos, Complete name of the person, Complete name of the father, Complete maiden name of the mother, Date of birth, Place of birth, Complete name and address of the requesting party, Number or copies needed, Purpose for the certification, Signed authorization letter from the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field (if recipient is not the owner), Original valid ID of the owner or spouse or any of the direct descendants (parent or grandparent or child or grandchild) indicated on the Requesting Party field, Original valid ID of the authorized representative.', '200', '20', 5),
(18, 'Service Canvassing', 'service name, description, location, budget', '220', '20', 12),
(19, 'Venue Canvassing', 'description, capacity, budget', '220', '20', 12),
(20, 'Product Canvassing', 'product name, description, quantity, unit of measure, budget', '220', '20', 12),
(21, 'PLDT Bill', 'Payment Receipt', '180', '20', 11),
(22, 'Veco Electric Bill', 'Veco Bill Receipt', '180', '20', 11),
(23, 'test', 'test', '1000', '1000', 11),
(24, 'sample', 'sample', '1000', '100000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `errand_transaction`
--

CREATE TABLE `errand_transaction` (
  `errand_id` int(11) NOT NULL,
  `eseeker_username` varchar(255) NOT NULL,
  `erunner_username` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_published` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `total_fee` varchar(255) NOT NULL,
  `booking_fee` varchar(255) NOT NULL,
  `rate_per_hour` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `bf_rate` varchar(255) NOT NULL,
  `erunner_viewed` varchar(255) NOT NULL,
  `eseeker_viewed` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errand_transaction`
--

INSERT INTO `errand_transaction` (`errand_id`, `eseeker_username`, `erunner_username`, `option_id`, `location`, `date_published`, `date_start`, `date_end`, `status`, `description`, `total_fee`, `booking_fee`, `rate_per_hour`, `rating`, `feedback`, `bf_rate`, `erunner_viewed`, `eseeker_viewed`) VALUES
(156, 'peter', 'test', 21, '10.297731,123.902103', '2019-02-03 19:57:51', '0000-00-00 00:00:00', '2018-12-22 15:17:37', 'Confirmed', 'pldt', '540', '200', '20', '4', 'well done!', '40', 'true', 'true'),
(158, 'sample', 'van', 21, '10.297731,123.902103', '2019-01-04 15:17:37', '0000-00-00 00:00:00', '2019-01-04 15:17:37', 'Confirmed', 'pldt', '480', '200', '20', '3', 'gooooood', '60', 'false', 'true'),
(163, 'peter', 'test', 21, '10.297731,123.902103', '2019-02-04 16:56:27', '0000-00-00 00:00:00', '2019-02-19 10:27:12', 'Confirmed', 'pldt', '500', '200', '20', '2', 'so feel so gooood', '40', 'false', 'true'),
(164, 'peter', 'van', 21, '10.297731,123.902103', '2019-02-22 00:02:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Waiting for accept', 'Please pay my PLDT Bill bill for me., No additional description.', '450', '180', '20', '', '', '40', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `errand_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notify_to` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `errand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notify_to`, `description`, `date`, `errand_id`) VALUES
(86, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-21 23:31:27', 163),
(87, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-21 23:31:27', 163),
(88, 'van', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-21 23:32:46', 158),
(89, 'sample', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-21 23:32:46', 158),
(90, 'test', 'You have an errand match - PLDT Bill errand', '2019-02-22 00:05:15', 164),
(91, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:08:50', 164),
(92, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:08:50', 164),
(93, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:09:19', 164),
(94, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:09:19', 164),
(95, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:11:49', 164),
(96, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:11:49', 164),
(97, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:12:19', 163),
(98, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:12:19', 163),
(99, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:13:25', 163),
(100, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:13:25', 163),
(101, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:13:32', 164),
(102, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:13:32', 164),
(103, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:14:18', 164),
(104, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:14:18', 164),
(105, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:16:08', 163),
(106, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:16:08', 163),
(107, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 00:16:40', 164),
(108, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 00:16:40', 164),
(109, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-22 01:01:12', 164),
(110, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-22 01:01:12', 164),
(113, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-23 14:37:57', 163),
(114, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-23 14:37:57', 163),
(115, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-23 14:41:22', 163),
(116, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-23 14:41:22', 163),
(117, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-23 15:35:27', 163),
(118, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-23 15:35:27', 163),
(119, 'test', 'Your the errand BILLS PAYMENT{PLDT Bill} has been confirmed as done', '2019-02-23 17:25:22', 163),
(120, 'peter', 'You have confirmed errand BILLS PAYMENT{PLDT Bill} as done', '2019-02-23 17:25:22', 163),
(121, 'van', 'You have an errand match - PLDT Bill errand', '2019-02-24 12:07:17', 164),
(122, 'van', 'You have an errand match - PLDT Bill errand', '2019-02-24 12:15:48', 164),
(123, 'test', 'You have an errand match - PLDT Bill errand', '2019-02-24 12:25:45', 164),
(124, 'test', 'You have an errand match - PLDT Bill errand', '2019-02-24 12:30:48', 164),
(125, 'van', 'You have an errand match - PLDT Bill errand', '2019-02-24 12:37:07', 164);

-- --------------------------------------------------------

--
-- Table structure for table `product_canvassing`
--

CREATE TABLE `product_canvassing` (
  `product_canvassing_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_of_measure` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `to` varchar(50) NOT NULL,
  `from` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `action`, `to`, `from`, `date`, `duration`) VALUES
(69, 'activated', 'jolrey', 'admin', '2019-02-16 11:44:16', 'N/A'),
(70, 'denied', 'jolrey1', 'admin', '2019-02-16 11:44:53', 'N/A'),
(71, 'banned', 'jolrey2', 'admin', '2019-02-16 11:45:28', 'N/A'),
(72, 'activated', 'van', 'admin', '2019-02-16 17:15:54', 'N/A'),
(73, 'activated', 'test', 'admin', '2019-02-20 14:29:43', 'N/A'),
(74, 'suspended', 'sample', 'admin', '2019-02-23 00:48:50', '2019-02-26 00:48:50'),
(75, 'reactivated', 'sample', 'admin', '2019-02-23 00:49:10', 'N/A'),
(76, 'activated', 'van', 'admin', '2019-02-23 14:11:28', 'N/A'),
(77, 'activated', 'jolrey1', 'admin', '2019-02-23 21:57:11', 'N/A'),
(78, 'suspended', 'jolrey1', 'admin', '2019-02-23 21:57:36', '2019-02-26 21:57:36'),
(79, 'banned', 'sample', 'admin', '2019-02-23 21:58:15', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `services_offered`
--

CREATE TABLE `services_offered` (
  `id` int(11) NOT NULL,
  `erunner_username` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_offered`
--

INSERT INTO `services_offered` (`id`, `erunner_username`, `option_id`, `status`) VALUES
(24, 'test', 5, 'unoffered'),
(25, 'test', 6, 'unoffered'),
(26, 'test', 7, 'unoffered'),
(27, 'test', 8, 'unoffered'),
(28, 'test', 18, 'unoffered'),
(29, 'test', 19, 'unoffered'),
(30, 'test', 20, 'unoffered'),
(31, 'test', 21, 'offered'),
(32, 'van', 23, 'unoffered'),
(33, 'jolrey', 23, 'unoffered'),
(34, 'jolrey1', 23, 'unoffered'),
(35, 'test', 23, 'unoffered'),
(36, 'van', 24, 'unoffered'),
(37, 'jolrey', 24, 'unoffered'),
(38, 'jolrey1', 24, 'unoffered'),
(39, 'test', 24, 'unoffered'),
(40, 'van', 21, 'offered');

-- --------------------------------------------------------

--
-- Table structure for table `service_canvassing`
--

CREATE TABLE `service_canvassing` (
  `canvass_service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `current_location` varchar(100) NOT NULL,
  `report_count` varchar(1) NOT NULL,
  `date_registered` varchar(50) NOT NULL,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type`, `username`, `password`, `firstname`, `middlename`, `lastname`, `birthdate`, `city`, `street`, `barangay`, `education_level`, `contact`, `email`, `status`, `rating`, `current_location`, `report_count`, `date_registered`, `wallet_id`) VALUES
(137, 'erunner', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'active', '4.5', '10.309195, 123.893870', '2', '0000-00-00 00:00:00', 0),
(138, 'eseeker', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'banned', 'N/A', 'N/A', '0', '2019-02-23 12:33:37', 0),
(139, 'eseeker', 'peter', 'peter', 'peter', 'lopez', 'jose', 'sample', 'danao city', 'hiway', 'looc', 'college', '09568566821', 'peterjose098@gmail.com', 'active', 'N/A', 'N/A', '0', '2019-02-23 12:33:37', 0),
(140, 'erunner', 'van', 'van', 'van', 'may', 'diongzon', 'sample', 'cebu city', 'punta', 'labangon', 'college', '09999999999', 'vanallendiongzon@gmail.com', 'unavailable', '0', '10.297731,123.902103', '0', '2019-02-23 14:11:28', 0),
(141, 'erunner', 'jolrey', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'pending', '0', '10.295995,123.897603', '0', '0000-00-00 00:00:00', 0),
(142, 'erunner', 'jolrey1', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'suspended', '0', '10.309195, 123.893870', '0', '2019-02-23 21:57:11', 0),
(143, 'eseeker', 'jolrey2', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'active', 'N/A', 'N/A', '0', '2019-02-23 12:33:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `activity_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `username`, `description`, `date`, `activity_type`) VALUES
(6, 'peter', 'peter has confirmed PLDT Bill errand', '2019-02-23 17:25:22', 'errand'),
(7, 'van', 'van has been paid Php 420.00', '2019-02-23 21:39:11', 'payment'),
(8, 'test', 'test has been paid Php 1840.00', '2019-02-23 21:39:30', 'payment'),
(9, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:00:22', 'account'),
(10, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:00:44', 'account'),
(11, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:00:58', 'account'),
(12, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:02:17', 'account'),
(13, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:02:59', 'account'),
(14, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:04:09', 'account'),
(15, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:04:25', 'account'),
(16, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:07:01', 'account'),
(17, 'jolrey12', 'jolrey12 has changed it`s status to {$status}', '2019-02-23 15:07:32', 'account'),
(18, 'jolrey12', 'jolrey12 has changed it`s status to {$status}', '2019-02-23 15:08:45', 'account'),
(19, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:09:07', 'account'),
(20, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:09:15', 'account'),
(21, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:10:20', 'account'),
(22, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:10:39', 'account'),
(23, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:10:54', 'account'),
(24, 'jolrey12sda', 'jolrey12sda has changed it`s status to {$status}', '2019-02-23 15:11:05', 'account'),
(25, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:11:56', 'account'),
(26, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:12:43', 'account'),
(27, 'jolrey1', 'jolrey1 has changed it`s status to {$status}', '2019-02-23 15:13:24', 'account'),
(28, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:16:05', 'account'),
(29, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:16:12', 'account'),
(30, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:16:15', 'account'),
(31, 'van', 'van has changed it`s status to {$status}', '2019-02-23 15:16:19', 'account'),
(32, 'test', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:00:19', 'errand'),
(33, 'test', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:02:54', 'errand'),
(34, 'test', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:06:58', 'errand'),
(35, 'test', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:08:40', 'errand'),
(36, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:17:38', 'errand'),
(37, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:19:14', 'errand'),
(38, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:20:10', 'errand'),
(39, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:22:25', 'errand'),
(40, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:23:47', 'errand'),
(41, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:25:13', 'errand'),
(42, 'van', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:28:58', 'errand'),
(43, 'test', '{$erunner_username} has denied {$optionName[0]["option_name"]} errand', '2019-02-24 05:36:33', 'errand');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `wallet_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `earning` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`wallet_id`, `username`, `earning`) VALUES
(1, 'van', '0'),
(2, 'test', '0');

-- --------------------------------------------------------

--
-- Table structure for table `venue_canvassing`
--

CREATE TABLE `venue_canvassing` (
  `venue_canvassing_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `bugdet` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disbursement`
--
ALTER TABLE `disbursement`
  ADD PRIMARY KEY (`disbursement_id`);

--
-- Indexes for table `errand_category`
--
ALTER TABLE `errand_category`
  ADD PRIMARY KEY (`errand_category_id`);

--
-- Indexes for table `errand_option`
--
ALTER TABLE `errand_option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `errand_category_id` (`errand_category_id`);

--
-- Indexes for table `errand_transaction`
--
ALTER TABLE `errand_transaction`
  ADD PRIMARY KEY (`errand_id`),
  ADD KEY `errand_category_id` (`option_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `product_canvassing`
--
ALTER TABLE `product_canvassing`
  ADD PRIMARY KEY (`product_canvassing_id`),
  ADD KEY `errand_category_id` (`errand_category_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `services_offered`
--
ALTER TABLE `services_offered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_id` (`option_id`);

--
-- Indexes for table `service_canvassing`
--
ALTER TABLE `service_canvassing`
  ADD PRIMARY KEY (`canvass_service_id`),
  ADD KEY `errand_category_id` (`errand_category_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `venue_canvassing`
--
ALTER TABLE `venue_canvassing`
  ADD PRIMARY KEY (`venue_canvassing_id`),
  ADD KEY `errand_category_id` (`errand_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disbursement`
--
ALTER TABLE `disbursement`
  MODIFY `disbursement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `errand_category`
--
ALTER TABLE `errand_category`
  MODIFY `errand_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `errand_option`
--
ALTER TABLE `errand_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `errand_transaction`
--
ALTER TABLE `errand_transaction`
  MODIFY `errand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `product_canvassing`
--
ALTER TABLE `product_canvassing`
  MODIFY `product_canvassing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `services_offered`
--
ALTER TABLE `services_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `service_canvassing`
--
ALTER TABLE `service_canvassing`
  MODIFY `canvass_service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venue_canvassing`
--
ALTER TABLE `venue_canvassing`
  MODIFY `venue_canvassing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `errand_option`
--
ALTER TABLE `errand_option`
  ADD CONSTRAINT `errand_option_ibfk_1` FOREIGN KEY (`errand_category_id`) REFERENCES `errand_category` (`errand_category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
