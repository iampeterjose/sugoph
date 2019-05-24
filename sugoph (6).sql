-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2019 at 01:12 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
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
-- Table structure for table `errand_category`
--

DROP TABLE IF EXISTS `errand_category`;
CREATE TABLE IF NOT EXISTS `errand_category` (
  `errand_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `errand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`errand_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `errand_option`;
CREATE TABLE IF NOT EXISTS `errand_option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL,
  `option_description` varchar(2555) NOT NULL,
  `booking_fee` varchar(255) NOT NULL,
  `rate_per_hour` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `errand_category_id` (`errand_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `errand_transaction`;
CREATE TABLE IF NOT EXISTS `errand_transaction` (
  `errand_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`errand_id`),
  KEY `errand_category_id` (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errand_transaction`
--

INSERT INTO `errand_transaction` (`errand_id`, `eseeker_username`, `erunner_username`, `option_id`, `location`, `date_published`, `date_start`, `date_end`, `status`, `description`, `total_fee`, `booking_fee`, `rate_per_hour`, `rating`, `feedback`) VALUES
(156, 'peter', 'test', 21, '10.297731,123.902103', '2019-02-03 19:57:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'confirmed', 'pldt', '540', '200', '20', '4', 'well done!'),
(158, 'sample', 'test', 21, '10.297731,123.902103', '2019-02-04 15:17:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'confirmed', 'pldt', '480', '200', '20', '3', 'gooooood'),
(163, 'peter', 'van', 21, '10.297731,123.902103', '2019-02-04 16:56:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'confirmed', 'pldt', '480', '200', '20', '2', 'so feel so gooood');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `errand_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender`, `receiver`, `message`, `errand_id`, `date`) VALUES
(15, 'peter', 'test', 'im eseeker', 156, '2019-02-09 10:02:43'),
(16, 'test', 'peter', 'im erunner', 156, '2019-02-09 10:03:18'),
(17, 'test', 'peter', 'ill start at1pm', 156, '2019-02-09 10:03:52'),
(18, 'peter', 'test', 'okay', 156, '2019-02-09 10:04:01'),
(19, 'peter', 'test', 'well done!', 156, '2019-02-09 12:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notify_to` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `errand_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_canvassing`
--

DROP TABLE IF EXISTS `product_canvassing`;
CREATE TABLE IF NOT EXISTS `product_canvassing` (
  `product_canvassing_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_of_measure` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_canvassing_id`),
  KEY `errand_category_id` (`errand_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(20) NOT NULL,
  `to` varchar(50) NOT NULL,
  `from` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `action`, `to`, `from`, `date`, `duration`) VALUES
(59, 'suspended', 'jolrey', 'admin', '2019-02-09 23:44:12', '2019-02-12 23:44:12'),
(60, 'reactivated', 'jolrey', 'admin', '2019-02-09 23:44:48', 'N/A'),
(61, 'suspended', 'peter', 'admin', '2019-02-10 09:56:26', '2019-02-13 09:56:26'),
(62, 'suspended', 'jolrey1', 'admin', '2019-02-10 09:59:54', '2019-02-13 09:59:54'),
(63, 'reactivated', 'peter', 'admin', '2019-02-10 10:01:32', 'N/A'),
(64, 'reactivated', 'jolrey1', 'admin', '2019-02-10 10:02:19', 'N/A'),
(65, 'suspended', 'jolrey1', 'admin', '2019-02-10 10:02:23', '2019-02-13 10:02:23'),
(66, 'reactivated', 'jolrey1', 'admin', '2019-02-10 10:03:33', 'N/A'),
(67, 'suspended', 'jolrey1', 'admin', '2019-02-10 10:03:37', '2019-02-13 10:03:37'),
(68, 'reactivated', 'jolrey1', 'admin', '2019-02-10 10:03:48', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `services_offered`
--

DROP TABLE IF EXISTS `services_offered`;
CREATE TABLE IF NOT EXISTS `services_offered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `erunner_username` varchar(255) NOT NULL,
  `option_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `option_id` (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

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
(39, 'test', 24, 'unoffered');

-- --------------------------------------------------------

--
-- Table structure for table `service_canvassing`
--

DROP TABLE IF EXISTS `service_canvassing`;
CREATE TABLE IF NOT EXISTS `service_canvassing` (
  `canvass_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL,
  PRIMARY KEY (`canvass_service_id`),
  KEY `errand_category_id` (`errand_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `wallet_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type`, `username`, `password`, `firstname`, `middlename`, `lastname`, `birthdate`, `city`, `street`, `barangay`, `education_level`, `contact`, `email`, `status`, `rating`, `current_location`, `report_count`, `date_registered`, `wallet_id`) VALUES
(137, 'erunner', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'unavailable', '4.5', '10.309195, 123.893870', '2', '2019-01-26 08:09:59', 0),
(138, 'eseeker', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'active', 'N/A', 'N/A', '0', '2019-01-24 11:07:34', 0),
(139, 'eseeker', 'peter', 'peter', 'peter', 'lopez', 'jose', 'sample', 'danao city', 'hiway', 'looc', 'college', '09568566821', 'peterjose098@gmail.com', 'active', 'N/A', 'N/A', '0', '2019-01-24 11:07:34', 0),
(140, 'erunner', 'van', 'van', 'van', 'may', 'diongzon', 'sample', 'cebu city', 'punta', 'labangon', 'college', '09999999999', 'vanallendiongzon@gmail.com', 'active', '0', '10.297731,123.902103', '0', '2019-01-24 12:07:52', 0),
(141, 'erunner', 'jolrey', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'active', '0', '10.295995,123.897603', '0', '2019-01-27 12:56:42', 0),
(142, 'erunner', 'jolrey1', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'active', '0', '10.309195, 123.893870', '0', '2019-01-24 12:10:09', 0),
(143, 'eseeker', 'jolrey2', 'jolrey', 'jolrey', 'cantilla', 'retuya', 'sample', 'naga city', 'sample', 'sample', 'college', '09000000001', 'jolreyninoretuya@gmail.com', 'active', 'N/A', 'N/A', '0', '2019-01-24 11:07:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue_canvassing`
--

DROP TABLE IF EXISTS `venue_canvassing`;
CREATE TABLE IF NOT EXISTS `venue_canvassing` (
  `venue_canvassing_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `bugdet` varchar(255) NOT NULL,
  `errand_category_id` int(11) NOT NULL,
  PRIMARY KEY (`venue_canvassing_id`),
  KEY `errand_category_id` (`errand_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `errand_option`
--
ALTER TABLE `errand_option`
  ADD CONSTRAINT `errand_option_ibfk_1` FOREIGN KEY (`errand_category_id`) REFERENCES `errand_category` (`errand_category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
