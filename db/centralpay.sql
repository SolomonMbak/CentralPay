-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 10:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centralpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_admin_info`
--

CREATE TABLE `master_admin_info` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_oname` varchar(255) NOT NULL,
  `admin_gender` varchar(10) NOT NULL,
  `admin_phone` double NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_status` varchar(10) DEFAULT NULL,
  `admin_password` char(32) NOT NULL,
  `admin_daterecorded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin_info`
--

INSERT INTO `master_admin_info` (`admin_id`, `admin_fname`, `admin_oname`, `admin_gender`, `admin_phone`, `admin_email`, `admin_status`, `admin_password`, `admin_daterecorded`) VALUES
(1, 'Solomon', 'Mbak', 'Male', 9090909090, 'solomon@gojems.org', 'Active', '123456', '2022-07-23 18:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `master_fees`
--

CREATE TABLE `master_fees` (
  `fee_id` int(11) NOT NULL,
  `fee_department` varchar(100) NOT NULL,
  `fee_category` varchar(50) NOT NULL,
  `fee_level` varchar(20) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `fee_lateness_date` date NOT NULL,
  `fee_lateness_charge` int(11) NOT NULL,
  `fee_added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fee_status` varchar(20) NOT NULL,
  `fee_addedd_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_fees`
--

INSERT INTO `master_fees` (`fee_id`, `fee_department`, `fee_category`, `fee_level`, `fee_amount`, `fee_lateness_date`, `fee_lateness_charge`, `fee_added_date`, `fee_status`, `fee_addedd_by`) VALUES
(0, 'Computer Science', 'Departmental Dues', '400 Level', 8456, '0000-00-00', 0, '0000-00-00 00:00:00', 'Open', 'jane@doe.com'),
(1, 'Computer Science', 'School Fees', '400 Level', 56000, '2022-07-01', 5000, '2022-07-27 20:03:37', 'Open', '0'),
(2, 'Mathematic and Statistics', 'Faculty Dues', '200 Level', 3222, '2022-07-11', 2000, '2022-07-27 20:03:44', 'Open', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_superuser_info`
--

CREATE TABLE `master_superuser_info` (
  `superuser_id` int(11) NOT NULL,
  `superuser_fname` varchar(255) NOT NULL,
  `superuser_oname` varchar(255) NOT NULL,
  `superuser_phone` varchar(50) NOT NULL,
  `superuser_email` varchar(255) NOT NULL,
  `superuser_status` varchar(10) DEFAULT NULL,
  `superuser_password` varchar(200) NOT NULL,
  `superuser_daterecorded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_superuser_info`
--

INSERT INTO `master_superuser_info` (`superuser_id`, `superuser_fname`, `superuser_oname`, `superuser_phone`, `superuser_email`, `superuser_status`, `superuser_password`, `superuser_daterecorded`) VALUES
(1, 'Solomon', 'Mbak', '8038271257', 'solomon@gojems.org', 'Active', '123456', '2022-07-23 10:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `master_support_info`
--

CREATE TABLE `master_support_info` (
  `support_user_id` int(11) NOT NULL,
  `support_user_fname` varchar(255) NOT NULL,
  `support_user_oname` varchar(255) NOT NULL,
  `support_user_gender` varchar(10) NOT NULL,
  `support_user_department` varchar(255) NOT NULL,
  `support_user_dob` date NOT NULL,
  `support_user_phone` double NOT NULL,
  `support_user_daterecorded` date NOT NULL,
  `support_user_email` varchar(255) NOT NULL,
  `support_user_password` char(32) NOT NULL,
  `support_user_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_user_info`
--

CREATE TABLE `master_user_info` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(200) NOT NULL,
  `user_other_names` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_program` varchar(200) NOT NULL,
  `user_faculty` varchar(200) NOT NULL,
  `user_department` varchar(200) NOT NULL,
  `user_level` varchar(100) NOT NULL,
  `user_reg_number` varchar(100) NOT NULL,
  `user_nationality` varchar(10) NOT NULL,
  `user_state_of_origin` varchar(10) NOT NULL,
  `user_dob` date NOT NULL,
  `user_marital_status` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_dor` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user_info`
--

INSERT INTO `master_user_info` (`user_id`, `user_first_name`, `user_other_names`, `user_email`, `user_phone`, `user_gender`, `user_program`, `user_faculty`, `user_department`, `user_level`, `user_reg_number`, `user_nationality`, `user_state_of_origin`, `user_dob`, `user_marital_status`, `user_password`, `user_dor`, `user_status`) VALUES
(1, 'Jane', 'John Doe', 'jane@doe.com', '09012312362', 'male', 'degree', 'Engineering', 'Marine Engineering', '400 Level', 'ABC/ddd/3456', 'NG', 'Akwa_Ibom', '2001-12-11', 'single', '123456', '2022-07-26 20:40:12', 'Active'),
(2, 'John', 'Doe', 'john@john.com', '08032123212', 'male', 'msc', 'Engineering', 'Marine Engineering', '400 Level', 'ABC/ddd/3452', 'NG', 'Akwa_Ibom', '2008-12-29', 'single', '123454321', '2022-07-26 20:40:16', 'Active'),
(3, 'Olajide', 'Ige', 'ola@ola.com', '08055882255', 'male', 'msc', 'Engineering', 'Marine Engineering', '300 Level', 'ABC/ddd/3450', 'NG', 'Akwa_Ibom', '2008-06-10', 'single', '11223344', '2022-07-26 20:40:20', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `master_user_logs`
--

CREATE TABLE `master_user_logs` (
  `user_logs_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_logs_title` varchar(250) NOT NULL,
  `user_logs_description` varchar(250) NOT NULL,
  `user_logs_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user_logs`
--

INSERT INTO `master_user_logs` (`user_logs_id`, `user_email`, `user_logs_title`, `user_logs_description`, `user_logs_date`) VALUES
(1, 'jane@doe.com', 'User Signin Attempt', 'Signin attempt unsuccessful!', '2022-07-28 18:11:32'),
(2, 'john@john.com', 'User Signin Attempt', 'Signin attempt unsuccessful!', '2022-07-28 18:11:46'),
(3, '', 'User Signin Attempt', 'Signin attempt successful!', '2022-07-28 18:12:25'),
(4, 'jane@doe.com', 'User Signin Attempt', 'Signin attempt unsuccessful!', '2022-07-28 18:24:41'),
(5, '', 'User Signin Attempt', 'Signin attempt successful!', '2022-07-28 18:24:51'),
(6, 'jane@doe.com', 'User Signin Attempt', 'Signin attempt unsuccessful!', '2022-07-28 18:26:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_admin_info`
--
ALTER TABLE `master_admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `master_fees`
--
ALTER TABLE `master_fees`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `master_superuser_info`
--
ALTER TABLE `master_superuser_info`
  ADD PRIMARY KEY (`superuser_id`);

--
-- Indexes for table `master_support_info`
--
ALTER TABLE `master_support_info`
  ADD PRIMARY KEY (`support_user_id`);

--
-- Indexes for table `master_user_info`
--
ALTER TABLE `master_user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `master_user_logs`
--
ALTER TABLE `master_user_logs`
  ADD PRIMARY KEY (`user_logs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_user_info`
--
ALTER TABLE `master_user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_user_logs`
--
ALTER TABLE `master_user_logs`
  MODIFY `user_logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
