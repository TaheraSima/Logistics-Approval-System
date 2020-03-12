-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 05:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simec_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `access_id` int(11) NOT NULL,
  `access_name` varchar(255) DEFAULT NULL,
  `access_details` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_id`, `access_name`, `access_details`, `status`) VALUES
(1, 'Admin', 'Admin Level', '1'),
(2, 'Users', 'User Level', '1'),
(3, 'Division Head', 'Division Head', '1'),
(4, 'Store Admin', 'Store Admin', '1'),
(5, 'Store Keeper', 'Store Keeper', '1'),
(6, 'log admin', 'log admin', '1'),
(7, 'log-1', 'log admin1', '1'),
(8, 'log-2', 'log admin2', '1'),
(9, 'log-3', 'log admin3', '1'),
(10, 'Department Head', 'Department Head', '1'),
(11, 'Support', 'Support', '1'),
(12, 'Super Admin', 'Super Admin', '1'),
(13, 'Checker', 'Checker', '1'),
(14, 'purchaser', 'purchaser name', '1');

-- --------------------------------------------------------

--
-- Table structure for table `approval_hierarchy`
--

CREATE TABLE `approval_hierarchy` (
  `approval_hierarchy_id` int(11) NOT NULL,
  `approval_hierarchy_name` varchar(150) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approval_hierarchy`
--

INSERT INTO `approval_hierarchy` (`approval_hierarchy_id`, `approval_hierarchy_name`, `status`) VALUES
(2, '49454', 1),
(3, '49456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `company_type_id` int(11) NOT NULL,
  `company_type_name` varchar(100) NOT NULL,
  `company_type_details` text NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`company_type_id`, `company_type_name`, `company_type_details`, `status`) VALUES
(2, 'Company Type Name', 'Company Type Details', 1),
(3, 'Company Type Name', 'sfs', 1),
(4, 'Company Type Nameafsaf', 'sfsasdfsaf', 1),
(5, 'Company Type Name', 'fdsgsdgsd', 1),
(6, 'Company Type NameafsafCompany Type Name', 'Company Type Details', 1),
(7, 'dsgfsg', 'sdfgsdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `department_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `division_id`, `department_status`) VALUES
(1, 'Animation', 1, '1'),
(2, 'Modeling', 1, '1'),
(3, 'Management', 0, '1'),
(4, 'Team Leader (Animation)', 1, '1'),
(5, 'Render Artist', 1, '1'),
(6, 'Texture ', 1, '1'),
(7, 'Compositor & Compositin', 1, '1'),
(8, 'ADMIN', 6, '1'),
(9, 'HR and Accounts', 7, '1'),
(10, 'Pharmacy', 0, '1'),
(11, 'Weekly Simec', 3, '1'),
(12, 'Real Estate and Housing', 2, '1'),
(13, 'SIMEC Ltd.', 2, '1'),
(14, 'Software', 1, '1'),
(16, 'test', 0, '1'),
(17, 'Marketing', 6, '1'),
(18, 'Jr. Solution Delivery Engr.', 1, '1'),
(19, 'Sr. Solution Delivery Engr.', 1, '1'),
(20, 'Solution Delivery Engr.', 1, '1'),
(21, 'Android Developer', 1, '1'),
(22, 'Programmer', 1, '1'),
(23, 'Logistic Department', 8, '1'),
(24, 'Matketing', 6, '1'),
(25, 'Services', 9, '1'),
(26, 'Seraco', 4, '1'),
(27, 'Institute', 10, '1'),
(28, 'Automobile', 2, '1'),
(29, 'Architecture', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(150) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`, `status`) VALUES
(1, 'Senior Animator', 1),
(2, 'Animator', 1),
(3, 'Modeler', 1),
(4, 'Modeling Supervisor', 1),
(6, 'Team Leader', 1),
(7, 'Render Artist', 1),
(8, 'Texture Artist', 1),
(10, 'Compositor', 1),
(11, 'Manager', 1),
(12, 'General Manager', 1),
(13, 'Administrative Assistant', 1),
(14, 'Accounts Assistant', 1),
(17, 'Site Engineer', 1),
(18, 'Project Supervisor', 1),
(19, 'Graphics Designer', 1),
(20, 'Ass. Graphics Designer', 1),
(21, 'Media Manager', 1),
(22, 'Sales Executive', 1),
(23, 'Junior Sales Executive', 1),
(24, 'Asst Graphics Des', 1),
(25, 'Programmer', 1),
(26, 'Project manager', 1),
(28, 'Hardware Operator ', 1),
(29, 'Office Assistant', 1),
(31, 'Assistant Sales Manager', 1),
(33, 'Assistant Madia Manager', 1),
(34, 'Marketing', 1),
(35, 'Services', 1),
(36, 'Tele Marketing', 1),
(37, 'Asst. Engr.', 1),
(38, 'Architect', 1),
(39, 'Interny', 1),
(40, 'Jr. Solution Delivery Engr.', 1),
(41, 'Executive Marketing', 1),
(42, 'Sr. Solution Delivery Engr.', 1),
(43, 'System Analist', 1),
(44, 'Operation Engineer', 1),
(45, 'Sr. Officer', 1),
(46, 'Head of Business', 1),
(47, 'Asst. Manager', 1),
(48, 'Jr. Marketing Executive', 1),
(49, 'Assistant Coordinator', 1),
(50, 'Asst. Project Coordinator', 1),
(51, 'Web Developer', 1),
(52, 'Sr. System Analyst ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `division_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`, `division_status`) VALUES
(1, 'SIMEC System Ltd', ''),
(2, 'SIMEC LTD.', ''),
(3, 'Weekly SIMEC', ''),
(4, 'Seraco Japan', ''),
(5, 'Shin Shin Japan Hospital', ''),
(6, 'Administration - SIMEC Group', ''),
(7, 'Accounts - SIMEC Group', ''),
(8, 'Logistics - SIMEC Group', ''),
(9, 'Transport - SIMEC Group', ''),
(10, 'SIMEC Institution of Technology', '');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_details` varchar(255) NOT NULL,
  `category_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`category_id`, `category_name`, `category_details`, `category_status`) VALUES
(1, 'Reusable', 'For use several time	', '1'),
(5, 'One Time', 'For one time use', '1');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_name`, `category_id`, `type_id`, `item_details`, `status`) VALUES
(2, 'Accessories Set for CCTV Camera', 5, 4, '', 1),
(3, 'Accessories Set for Attendance Device', 5, 4, '', 1),
(4, 'AC to DC Adapter (12 Volt)', 5, 4, '', 1),
(5, 'Network Switch (General) - 8 Port', 5, 4, '', 1),
(6, 'LED Monitor (19 Inch)', 5, 4, '', 1),
(7, 'Network Cable (CAT-6)', 5, 4, '', 1),
(8, 'POE Switch', 5, 4, '', 1),
(9, 'HDD - 4 TB', 5, 4, '', 1),
(10, 'HDD - 2 TB', 5, 4, '', 1),
(11, 'NVR (Network Video Recorder) - 8 Port', 5, 4, '', 1),
(12, 'NVR (Network Video Recorder) - 16 Port', 5, 4, '', 1),
(13, 'POE CCTV Camera (2MP)', 5, 4, '', 1),
(14, 'Access Control Device', 5, 4, '', 1),
(15, 'Punch File', 1, 4, '', 1),
(16, 'ups battery', 1, 4, '', 1),
(17, 'Diary', 5, 4, '', 1),
(18, 'Cartige Paper', 5, 4, '', 1),
(19, 'Fiber Optics', 5, 4, 'ghjhgj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_details` varchar(255) NOT NULL,
  `type_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`type_id`, `type_name`, `type_details`, `type_status`) VALUES
(1, 'Software', 'Software Related', '1'),
(4, 'Hardware', 'Hardware Related', '1'),
(5, 'Consumable', 'fg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `comments` text NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `division_id` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `comments`, `division_name`, `division_id`, `department_name`, `employee_name`, `employee_id`, `status`) VALUES
(1, 'dsfdsf', '		 fdf                   ', 'df', 'SIMEC System Ltd', '1', 'Software', 'Tahera Khatun Sima', '1137', 1),
(2, 'test project', 'fdf                   ', 'df', 'SIMEC System Ltd', '1', 'Software', 'Tahera Khatun Sima', '1137', 1),
(3, 'BOF', 'BOF Project ', 'jhjkh', 'SIMEC System Ltd', '1', 'Software', 'Tahera Khatun Sima', '1137', 1),
(4, 'kjklj', '		                    ', '', 'Administration - SIMEC Group', '6', 'ADMIN', 'Store Admin Name', 'storeadmin', 0),
(5, 'jgf', '		                    ', '', 'Administration - SIMEC Group', '6', 'ADMIN', 'log2 Name', 'logadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `po_no` varchar(50) NOT NULL,
  `pr_no` varchar(50) NOT NULL,
  `req_type` varchar(50) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `approved_by` varchar(11) NOT NULL,
  `remarks` text NOT NULL,
  `rmks_add` varchar(255) NOT NULL,
  `add_amount` double NOT NULL,
  `rmks_less` varchar(255) NOT NULL,
  `less_amount` double NOT NULL,
  `grand_total` double NOT NULL,
  `date` date NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `purchaser_id` varchar(255) NOT NULL,
  `rq_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `po_no`, `pr_no`, `req_type`, `emp_id`, `emp_name`, `division_id`, `department_id`, `approved_by`, `remarks`, `rmks_add`, `add_amount`, `rmks_less`, `less_amount`, `grand_total`, `date`, `supplier_name`, `purchaser_id`, `rq_id`) VALUES
(1, 'PO03-19969', '11374903-1', 'Project', 1137, 'Tahera Khatun Sima(1137)', 1, 14, 'Md. Abu Mus', '2019-11-16', '', 0, '', 0, 2682, '2019-11-13', 'John', 'purchaser1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `apprv_qty` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `item_id`, `apprv_qty`, `purchase_qty`, `unit_price`, `total_price`) VALUES
(1, '11374903-1', 3, 8, 8, 54.00, 432.00),
(2, '11374903-1', 12, 78, 50, 45.00, 2250.00);

-- --------------------------------------------------------

--
-- Table structure for table `request_items`
--

CREATE TABLE `request_items` (
  `id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `division_id` int(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `rmks` text NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`id`, `division_name`, `division_id`, `department_name`, `item_name`, `employee_name`, `employee_id`, `rmks`, `file_name`, `date`, `status`) VALUES
(2, 'SIMEC System Ltd', 1, 'Software', 'POE CCTV Camera (2MP)', 'Razeeb Ruhul Amin', 1048, 'Security Surveillance - CCTV Camera', '', '0000-00-00', '1'),
(3, 'SIMEC System Ltd', 1, 'Software', 'NVR (Network Video Recorder) - 16 Port', 'Razeeb Ruhul Amin', 1048, 'Video Recording System - 16 Port', '', '0000-00-00', '1'),
(4, 'SIMEC System Ltd', 1, 'Software', 'NVR (Network Video Recorder) - 8 Port', 'Razeeb Ruhul Amin', 1048, 'Video Recording System - 8 Port', '', '0000-00-00', '1'),
(5, 'SIMEC System Ltd', 1, 'Software', 'HDD - 2 TB', 'Razeeb Ruhul Amin', 1048, 'Storage Drive', '', '0000-00-00', '1'),
(6, 'SIMEC System Ltd', 1, 'Software', 'HDD - 4 TB', 'Razeeb Ruhul Amin', 1048, 'Storage Drive', '', '0000-00-00', '1'),
(9, 'SIMEC System Ltd', 1, 'Software', 'POE Switch', 'Razeeb Ruhul Amin', 1048, 'POE Network Switch', '', '0000-00-00', '1'),
(10, 'SIMEC System Ltd', 1, 'Software', 'Network Cable (CAT-6)', 'Razeeb Ruhul Amin', 1048, 'CAT-6 UTP Network Cable', '', '0000-00-00', '1'),
(11, 'SIMEC System Ltd', 1, 'Software', 'LED Monitor (19 Inch)', 'Razeeb Ruhul Amin', 1048, 'LED Display Monitor', '', '0000-00-00', '1'),
(12, 'SIMEC System Ltd', 1, 'Software', 'Network Switch (General) - 8 Port', 'Razeeb Ruhul Amin', 1048, 'General Network Switch - 8 Port', '', '0000-00-00', '1'),
(13, 'SIMEC System Ltd', 1, 'Software', 'AC to DC Adapter (12 Volt)', 'Razeeb Ruhul Amin', 1048, 'AC to DC Conversion Adapter for Attendance Device', '', '0000-00-00', '1'),
(14, 'SIMEC System Ltd', 1, 'Software', 'Accessories Set for Attendance Device', 'Razeeb Ruhul Amin', 1048, 'Connectors, MK Box, Electric Cable, Screws, Plastic Pipe, Others', '', '0000-00-00', '1'),
(15, 'SIMEC System Ltd', 1, 'Software', 'Accessories Set for CCTV Camera', 'Razeeb Ruhul Amin', 1048, 'Connectors, MK Box, Electric Cable, Screws, Plastic Pipe, Others', '', '0000-00-00', '1'),
(16, 'SIMEC System Ltd', 1, 'Software', 'Access Control Device', 'Razeeb Ruhul Amin', 1048, 'Model: MB-2000', '', '0000-00-00', '1'),
(17, 'SIMEC System Ltd', 1, 'Software', 'Punch File', 'Abusaied al-maruf', 1028, 'Plastics file', 'FILE-1450735446G283744_ENF283744-P.jpg', '0000-00-00', '1'),
(18, 'SIMEC System Ltd', 1, 'Animation', 'ups battery', 'MD.Amdadul Islam', 1020, 'urgent', '', '0000-00-00', '1'),
(19, 'SIMEC System Ltd', 1, 'Software', 'Diary', 'Md. Abdul Ohab', 1123, 'Need a large diary for software requirement collection note.', 'FILE-744350349diary-usb.jpg', '0000-00-00', '1'),
(20, 'SIMEC System Ltd', 1, 'Software', 'Cartige Paper', 'Abusaied al-maruf', 1028, 'Print of Agreement Copy', '', '0000-00-00', '1'),
(21, 'SIMEC System Ltd', 1, 'Software', 'Note Book and Pen', 'Tahera Khatun Sima', 1137, 'Difficult to handle separate paper to note the sotware requirements', 'FILE-402679590images.jpg', '0000-00-00', ''),
(22, 'SIMEC System Ltd', 1, 'Software', 'hhd', 'Tahera Khatun Sima', 1137, 'ffgf', '', '0000-00-00', ''),
(23, 'SIMEC System Ltd', 1, 'Software', 'fdfg', 'Tahera Khatun Sima', 1137, 'fgg', '', '0000-00-00', ''),
(24, 'SIMEC System Ltd', 1, 'Software', 'Fiber Optics', 'Tahera Khatun Sima', 1137, 'gfghfgh', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_name` varchar(150) NOT NULL,
  `division_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `req_type` varchar(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `req_no` varchar(50) NOT NULL,
  `signature` varchar(150) NOT NULL,
  `remarks` text NOT NULL,
  `expect_date` date NOT NULL,
  `purchaser_id` varchar(255) DEFAULT NULL,
  `assigned_by` varchar(255) DEFAULT NULL,
  `delivered_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `user_id`, `employee_name`, `division_id`, `department_id`, `req_type`, `project_name`, `reference`, `date`, `last_date`, `status`, `req_no`, `signature`, `remarks`, `expect_date`, `purchaser_id`, `assigned_by`, `delivered_by`) VALUES
(1, 1137, 'Tahera Khatun Sima(1137)', 1, 14, 'Project', '2', '', '2019-11-13', '2019-11-13', 9, '11374903-1', 'Md. Abu Musa', 'ok ', '2019-11-16', 'purchaser1', 'logadmin', 'storeadmin'),
(2, 1123, 'Md. Abdul Ohab(1123)', 1, 14, 'Individual', '', '', '2019-11-13', '2019-11-13', 7, '11237304-2', 'Md. Abu Musa', '', '2019-11-15', 'purchaser1', 'logadmin', NULL),
(3, 1137, 'Tahera Khatun Sima(1137)', 1, 14, 'Individual', '', '', '2019-11-18', '2019-11-18', 7, '11379453-3', 'Md. Abu Musa', '', '2019-11-21', 'purchaser1', 'logadmin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_details`
--

CREATE TABLE `requisition_details` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `aprv_qty` int(11) NOT NULL DEFAULT 0,
  `delvr_qty` int(11) NOT NULL,
  `rem_qty` int(11) NOT NULL,
  `recv_qty` int(11) NOT NULL DEFAULT 0,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_details`
--

INSERT INTO `requisition_details` (`id`, `req_id`, `item_id`, `quantity`, `aprv_qty`, `delvr_qty`, `rem_qty`, `recv_qty`, `purpose`) VALUES
(1, 1, 3, 8, 8, 8, 0, 0, ''),
(2, 1, 12, 787, 78, 40, 38, 0, ''),
(3, 2, 3, 4, 4, 0, 0, 0, ''),
(4, 2, 4, 56, 56, 0, 0, 0, ''),
(5, 3, 2, 10, 6, 0, 0, 0, ''),
(6, 3, 3, 4, 4, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `mr_no` varchar(150) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `department` int(8) NOT NULL,
  `division_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `req_number` varchar(100) NOT NULL,
  `record_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `purname` varchar(255) NOT NULL,
  `employ_name` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `gate_pass_no` varchar(255) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `st_rcvr_name` varchar(255) NOT NULL,
  `chalan_no` varchar(255) NOT NULL,
  `st_rcvr_phn` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `other_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `mr_no`, `supplier_name`, `department`, `division_id`, `employee_id`, `req_number`, `record_type`, `date`, `purname`, `employ_name`, `vendor`, `gate_pass_no`, `site_name`, `bill_no`, `st_rcvr_name`, `chalan_no`, `st_rcvr_phn`, `delivery_date`, `st_address`, `other_info`) VALUES
(1, 'PO03-19969', '', 0, 0, '1137', '11374903-1', 'In', '2019-11-13', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', ''),
(2, '', '', 14, 1, '1137', '11374903-1', 'Out', '2019-11-13', 'purchaser1', 'Purchaser Name 1', '', '', '', '', 'bchgg', '546456', 5645, '0000-00-00', 'ghgj', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE `store_details` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `previous_qty` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `closing_qty` int(11) NOT NULL,
  `record_type` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_details`
--

INSERT INTO `store_details` (`id`, `store_id`, `item_id`, `previous_qty`, `qty`, `closing_qty`, `record_type`, `date`) VALUES
(1, 1, 3, 0, 8, 8, 'In', '2019-11-13'),
(2, 1, 12, 0, 50, 50, 'In', '2019-11-13'),
(3, 2, 3, 8, 8, 0, 'Out', '2019-11-13'),
(4, 2, 12, 50, 40, 10, 'Out', '2019-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `unit_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `division_id`, `department_id`, `unit_status`) VALUES
(1, '3D Animation', 2, 5, '1'),
(3, 'Designer', 2, 1, '1'),
(4, 'Developer', 2, 1, '1'),
(5, 'Modeling', 2, 5, '1'),
(6, 'Store', 4, 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `division_id` varchar(250) NOT NULL,
  `department_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `employee_id`, `email`, `password`, `employee_name`, `division_id`, `department_id`, `unit_id`, `designation_id`, `access_level_id`, `status`) VALUES
(1, '1018', '', '1018', 'REZAUL HAQUE CHOWDHURY', '1', 1, 4, 2, 2, '0'),
(2, '1036', '', '1036', 'Shahadat Hossain', '1', 1, 4, 2, 2, '0'),
(3, '1015', '', '1015', 'Nurul Afsar', '1', 2, 5, 3, 2, '1'),
(4, '1023', '', '1023', 'Sheikh Golam Mohiuddin', '1', 1, 4, 2, 2, '1'),
(5, '1016', '', '1016', 'MD.ASADUZZAMAN', '1', 7, 4, 10, 2, '1'),
(6, '1022', '', '1022', 'Md. Jafar Sadiq Tamal', '1', 2, 5, 4, 2, '1'),
(7, '1021', '', '1021', 'Probir Kumar Das', '1', 2, 5, 4, 2, '0'),
(8, '1020', 'dreamazam@gmail.com', '1020', 'MD.Amdadul Islam', '1', 1, 4, 2, 2, '1'),
(9, '1014', 'siddiq478@gmail.com', '1014', 'Abu Bakkar Siddiq', '1', 2, 5, 3, 2, '1'),
(10, '1024', '', '1024', 'Md Jahanger Alam', '1', 2, 5, 3, 2, '1'),
(11, '1019', '', '1019', 'Zahidul Alam', '1', 1, 4, 1, 2, '0'),
(12, '1017', '', '1017', 'Md. Ashraful Mobin', '1', 1, 4, 6, 2, '0'),
(13, '1003', '', 'Zarin@987', 'Md. Abu Musa', '1', 8, 4, 12, 3, '0'),
(14, '1029', '', '1029', 'Nuruzzaman Luku', '1', 14, 4, 26, 2, '0'),
(15, '1028', '', '856961', 'Abusaied al-maruf', '1', 14, 4, 50, 2, '1'),
(16, '1030', '', '1030', 'Sarder Firoz Kabir', '1', 1, 4, 2, 11, '1'),
(17, '1025', '', '1025', 'Hafizur Rahman', '1', 3, 4, 29, 11, '1'),
(18, '1039', 'tuhinraj085@gmail.com', '1039', 'Mahadeb Chandra Sarkar', '1', 1, 4, 2, 2, '1'),
(19, '1045', 'rakibusd@gmail.com', '1045', 'Md. Rakibul Islam', '1', 2, 5, 3, 2, '1'),
(20, '410', '', '410', 'Sabina Yeasmin', '1', 17, 4, 41, 2, '0'),
(21, '1044', '', '1044', 'Mohammad Amjad Hossain (Akash)', '1', 2, 5, 3, 2, '1'),
(22, '1049', '', '1049', 'Nadia Hasan Proma', '1', 14, 4, 40, 2, '0'),
(23, '1051', 'suhalalamia@gmail.com', '1051', 'Suhala Lamia', '1', 14, 4, 40, 2, '1'),
(24, '1050', '', '1050', 'Md. Jewel Rana', '1', 14, 4, 42, 2, '0'),
(25, '1013', 'razib1199@gmail.com', '1013', 'Rajib Ahmed', '1', 2, 5, 3, 2, '1'),
(26, '1055', '', '1055', 'Mobarok Hossain', '1', 14, 4, 42, 2, '1'),
(27, '1048', '', 'Simecpm123', 'Razeeb Ruhul Amin', '1', 14, 4, 26, 2, '1'),
(28, '1052', 'salmansajibbro@gmail.com', '1052', 'Salman Sajib', '1', 14, 4, 42, 2, '1'),
(29, '1005', '', '1005', 'Osman Gani', '8', 23, 4, 17, 2, '0'),
(30, '1043', '', '1043', 'Safak Sadain', '2', 12, 4, 44, 2, '0'),
(31, '1038', '', '1038', 'Abdur Rashid', '2', 12, 4, 45, 3, '0'),
(32, '1042', 'hossainmsarwar@yahoo.com', '1042', 'Sarwar Hossain', '1', 14, 4, 43, 2, '1'),
(33, '1061', '', '1061', 'Md. Musfiqur Rahman', '1', 14, 4, 40, 2, '0'),
(34, '1060', 'nasrinaakter3114@gmail.com', '1060', 'Nasrin Akter', '1', 14, 4, 49, 2, '1'),
(35, '1058', 'mahabubur.info.bd@gmail.com', '1058', 'Mahabubur Rahman', '1', 17, 4, 45, 2, '1'),
(36, '1068', 'julius.jsr@gmail.com', '1068', 'Julius Iqbal', '1', 14, 4, 25, 2, '1'),
(37, '1067', '', '1067', 'Ratin', '1', 14, 4, 25, 2, '0'),
(38, '480', '', '480', 'Shapla', '1', 14, 4, 39, 2, '0'),
(39, '481', '', '481', 'Nourin Fatema', '1', 14, 4, 39, 2, '0'),
(40, '1033', '', '1033', 'Shohel Rana', '2', 12, 4, 31, 2, '0'),
(41, '1069', '', '1069', 'Tanvir Alam', '8', 23, 4, 17, 2, '0'),
(43, '482', '', '482', 'Tahasun', '1', 14, 4, 39, 2, '0'),
(44, '483', '', '483', 'Foysal Hamid', '1', 14, 4, 39, 2, '0'),
(45, '1046', 'nzmakdum@gmail.com', '1046', 'Shah Md. Niaz Mokhdum', '1', 14, 4, 41, 2, '0'),
(46, '1041', 'auchena2000@gmail.com', '1041', 'Mostafizul Hoque Chowdhury', '1', 24, 4, 46, 2, '1'),
(47, '1075', '', '1075', 'Md. Kawsar Biswas', '8', 23, 4, 35, 2, '0'),
(48, '1077', '', '1077', 'Md. Sakhawat Hossain', '2', 12, 4, 47, 2, '0'),
(49, '1073', 'galib3d@gmail.com', '1073', 'Arif Ahmed Shaikh', '1', 5, 4, 7, 2, '1'),
(50, '1076', '', '1076', 'Sushanta Kumer Saha', '1', 1, 4, 2, 2, '1'),
(51, '1071', 'munni3d@gmail.com', '1071', 'Kazi Mashoda Akter Monni', '1', 1, 4, 2, 2, '1'),
(52, '1074', '', '1074', 'Md.Limon Molla', '1', 3, 4, 29, 2, '0'),
(53, '1047', '', '1047', 'Sabina Yeasmin', '1', 17, 4, 41, 2, '0'),
(55, '1082', 'samirnayem19@gmail.com', '1082', 'Samir Bin nayam', '1', 17, 4, 23, 2, '0'),
(56, '1081', 'fashionfahi123@gmail.com', '1081', 'Fahi Islam', '1', 17, 4, 34, 2, '0'),
(57, '434', 'dpriyanka120@gmail.com', '434', 'Priyanka Dhar', '1', 17, 4, 23, 2, '0'),
(58, '1079', 'naiem35@gmail.com', '1079', 'Nakibul Islam', '1', 1, 4, 2, 2, '1'),
(59, '1080', '', '1080', 'Md. Rakib Sharkar', '1', 1, 4, 2, 2, '0'),
(60, '1078', 'tanjina.mosharof@gmail.com', '1078', 'Tanjina Mosharof', '2', 13, 4, 38, 2, '0'),
(61, '313', '', '313', 'Mahmudunnobi', '1', 1, 4, 7, 2, '0'),
(62, '1070', '', '1070', 'Aminul Islam', '1', 1, 4, 2, 2, '0'),
(63, '1086', 'ahasanulrazib@gmail.com', '1086', 'Md. Ahasanul Kabir', '2', 17, 4, 48, 2, '0'),
(64, '1085', 'shamimsajib@gmail.com', '1085', 'Md. Shamim Ahamed', '2', 13, 4, 11, 2, '0'),
(65, '1027', '', '1027', 'Md. Mainul Islam', '1', 12, 4, 17, 2, '0'),
(66, '1087', '', '1087', 'Ashad', '2', 13, 4, 37, 2, '0'),
(67, '6112', '', '6112', 'Md. Nazrul Islam', '2', 13, 4, 47, 2, '0'),
(68, '6112', '', '6112', 'Md. Nazrul Islam', '2', 13, 4, 47, 2, '0'),
(69, '1092', '', '1092', 'Belayat Hossen', '1', 14, 4, 51, 2, '1'),
(70, '9001', '', '9001', 'Ferdous Mulla', '2', 13, 4, 29, 2, '0'),
(71, '9002', '', '9002', 'Shobuj Sheikh', '2', 13, 4, 29, 2, '0'),
(72, '1095', '', '1095', 'Md. Toukir Ullah Khan Eusufzai', '2', 13, 4, 41, 2, '0'),
(73, '6113', '', '6113', 'Md. Rokunuzzaman', '2', 13, 4, 47, 2, '0'),
(74, '1103', '', '1103', 'Md. Tuhin Alam', '1', 14, 4, 37, 2, '1'),
(75, '1099', 'steaveaermeture@gmail.com', '1099', 'Md. Rakib Hassan', '2', 17, 4, 47, 2, '0'),
(76, '1101', '', '1101', 'Md. Sajal', '2', 13, 4, 47, 2, '0'),
(77, '1102', '', '1102', 'Raihan Mahmud', '2', 13, 4, 35, 2, '0'),
(78, '9007', 'mehedihassan1209@gmail.com', '9007', 'Md. Mehedi Hasan', '2', 13, 4, 38, 2, '0'),
(79, '9008', 'dilipbormon87@gmail.com', '9008', 'Dilip Chandra Bormon', '2', 13, 4, 35, 2, '0'),
(80, '9009', '', '9009', 'Johura Khatun', '1', 25, 4, 35, 2, '0'),
(81, '1117', 'zxrajib@gmail.com', '1117', 'Razib Chandra Ghosh', '1', 14, 4, 40, 2, '1'),
(82, '1080', 'rakibsharkar @gmail.com', '1080', 'MD Rakib Sharkar', '1', 1, 4, 2, 2, '0'),
(83, '1080', '', '1080', 'Md. Rakib Sharkar', '1', 1, 4, 2, 2, '0'),
(84, '1123', 'kkohab494@gmail.com', '1123', 'Md. Abdul Ohab', '1', 14, 4, 40, 2, '1'),
(85, '1120', 'sheikh.cto@gmail.com', '1120', 'Md. Raju Sheikh', '1', 14, 4, 11, 2, '1'),
(88, '1011', '', '1011', 'Rumel Hossain', '3', 11, 4, 19, 2, '1'),
(89, '1133', 'sabbir.cste@gmail.com', '1133', 'Sabbir Ahammad Talukder', '1', 14, 4, 25, 2, '1'),
(90, '1131', 'sabbirrahman68@yahoo.com', '1131', 'Sabbir Rahman', '1', 14, 4, 25, 2, '1'),
(91, '1132', 'miazyparvez@gmail.com', '1132', 'Md. Parvez', '1', 14, 4, 25, 2, '1'),
(92, '1130', 'zahir0074@gmail.com', '1130', 'Md. Zohir Khan', '1', 14, 4, 35, 2, '1'),
(93, '1134', '', '1134', 'Binoy Chandra Howlader', '1', 14, 4, 20, 2, '1'),
(94, '1109', '', '1109', 'Milon Mondol', '1', 14, 4, 44, 2, '1'),
(95, '1137', 'taherak17@gmil.com', '1137', 'Tahera Khatun Sima', '1', 14, 4, 40, 2, '1'),
(96, '1140', 'simanto14feb@gmail.com', '1140', 'Towhidur Rahman Simanto', '1', 14, 4, 40, 2, '1'),
(97, '1144', 'abusaied01@gmail.com', '1144', 'Md. Abu Saeid', '1', 14, 4, 25, 2, '1'),
(98, '9038', 'bellaldiit@gmail.com', '9038', 'Bellal Hosen', '1', 14, 4, 52, 2, '1'),
(99, '9039', 'asraful009@gmail.com', '9039', 'Asraful Islam', '1', 14, 4, 42, 2, '1'),
(100, 'store', 'storeadmin@gmail.com', 'store', 'Store Admin Name', '6', 8, 4, 14, 4, '0'),
(101, 'admin', '', 'simecdev123', 'admin name', '4', 1, 4, 2, 1, '1'),
(102, '1064', '', '1064', 'Monjid Boron Nondi', '1', 2, 5, 10, 2, 'Active'),
(103, '1011', '', '1011', 'Md. Rumel Hossain', '1', 4, 4, 7, 2, 'Active'),
(104, '1026', '01684707800', '1026', 'Mosammat Tapita Khanom', '6', 9, 4, 21, 2, 'Active'),
(105, '1062', '', '1062', 'Nasir Uddin', '1', 2, 5, 10, 2, 'Active'),
(106, '1063', '', '1063', 'Ebadul', '1', 2, 5, 10, 2, 'Active'),
(107, '1065', '', '1065', 'Saddam Hossain', '1', 2, 5, 10, 2, 'Active'),
(108, '1012', '', '1012', 'Md. Amir Hossain', '1', 1, 4, 1, 2, 'Active'),
(109, '1010', '', '1010', 'Biplob', '1', 1, 4, 1, 2, 'Active'),
(110, '1007', '07137379395', '1007', 'Ruman Sarder', '1', 1, 4, 1, 2, 'Active'),
(111, '1031', '01921298016', '1031', 'Mijanur Rahman', '6', 9, 4, 4, 2, 'Active'),
(112, '1034', '01750230473', '1034', 'Md. Azim Uddin', '6', 9, 4, 21, 2, 'Active'),
(113, '1037', '01874032421', '1037', 'Md. Wali Ullah', '1', 1, 4, 1, 2, 'Active'),
(114, '1066', '01864162938', '1066', 'Rejaul Karim', '1', 2, 5, 10, 2, 'Active'),
(115, '1053', '01920400087', '1053', 'Md. Mosharof Hossain', '1', 5, 4, 4, 2, 'Active'),
(116, '1056', '01797581625', '1056', 'Md. Umor Faruk', '2', 10, 4, 1, 2, 'Active'),
(117, '1057', '01753147253', '1057', 'Tania Tasnim Chowdhury', '6', 8, 4, 14, 3, 'Active'),
(118, '1059', '01771084717', '1059', 'Uttam Kumar Kar', '2', 11, 4, 13, 2, 'Active'),
(119, '1069', '01716191103', '1069', 'Md. Tanvir alam', '2', 10, 4, 1, 2, 'Active'),
(121, '1122', '01689772577', '1122', 'Md. Imran', '6', 9, 4, 4, 2, 'Active'),
(123, '1097', '', '1097', 'Md. Rashidul Islam', '6', 8, 4, 19, 2, 'Active'),
(124, '1113', '01630823390', '1113', 'Md. Imran Hosen', '6', 9, 4, 15, 2, 'Active'),
(125, '1091', '01748958292', '1091', 'Md. Sentu Sarker', '6', 9, 4, 4, 2, 'Active'),
(126, '1148', '01768685519', '1148', 'Kaushik Bagchi', '6', 9, 4, 15, 2, 'Active'),
(127, '1124', '01912098349', '1124', 'Jasiur Rahman', '2', 11, 4, 15, 2, 'Active'),
(128, '1138', '01718121940', '1138', 'Md. Jummaun Shohel', '2', 10, 4, 15, 2, 'Active'),
(129, '1005', '01917361099', '1005', 'Osman Gani', '8', 23, 4, 17, 2, ''),
(130, '1043', '01829179645', '1043', 'Safak Sadain', '2', 12, 4, 44, 2, ''),
(131, '1106', '01708570061', '1106', 'Md. Mazharul Islam', '2', 17, 4, 47, 2, ''),
(132, '1033', '', '1033', 'Shohel Rana', '2', 12, 4, 31, 2, ''),
(133, '1069', '', '1069', 'Tanvir Alam', '8', 23, 4, 17, 2, ''),
(134, '1072', '', '1072', 'Tasnim Nower Issana', '2', 29, 4, 38, 2, ''),
(135, '1077', '', '1077', 'Md. Sakhawat Hossain', '2', 12, 4, 47, 2, ''),
(136, '1083', '', '1083', 'Jamal Uddin Ahmed', '2', 27, 4, 49, 2, ''),
(137, '1078', '', '1078', 'Tanjina Mosharof', '2', 13, 4, 38, 2, ''),
(138, '1086', '', '1086', 'Md. Ahasanul Kabir', '1', 17, 4, 48, 2, ''),
(139, '9002', '', '9002', 'Shobuj Sheikh', '2', 13, 4, 29, 2, ''),
(140, '1095', '', '1095', 'Md. Toukir Ullah Khan Eusufzai', '2', 13, 4, 41, 2, ''),
(141, '1099', '', '1099', 'Md. Rakib Hassan', '2', 17, 4, 47, 2, ''),
(142, '1101', '', '1101', 'Md. Sajal', '2', 13, 4, 47, 2, ''),
(143, '1102', '', '1102', 'Raihan Mahmud', '2', 13, 4, 35, 2, ''),
(144, '1104', '', '1104', 'Md. Mehedi Hasan', '2', 13, 4, 40, 2, ''),
(145, '1105', '', '1105', 'Dilip Chandra Bormon', '2', 13, 4, 35, 2, ''),
(146, '1108', '', '1108', 'A.K.M. Ratan', '2', 13, 4, 11, 2, ''),
(147, '1089', '', '1089', 'Sheikh Mahfuz(polash)', '2', 13, 4, 29, 2, ''),
(148, '1111', '', '1111', 'Bikash Chandra Sharma', '2', 13, 4, 18, 2, ''),
(149, '1114', '', '1114', 'Md. Mehedi Hasan Runit', '2', 3, 4, 50, 2, ''),
(150, '1118', '', '1118', 'Abdullah Al Nasir', '2', 13, 4, 17, 2, ''),
(151, '1116', '', '1116', 'Lamiya Liakot', '2', 29, 4, 38, 2, ''),
(152, '1125', '', '1125', 'Nitu Akter Muna', '2', 17, 4, 41, 2, ''),
(153, '1126', '', '1126', 'Mahfuja Islam', '2', 17, 4, 41, 2, ''),
(154, '1112', '', '1112', 'Sumiya Yasmin', '6', 9, 4, 41, 2, ''),
(155, '1129', '', '1129', 'Dilfaza Arefin', '2', 17, 4, 6, 2, ''),
(156, '1135', '', '1135', 'MD Robiul Hossan', '8', 23, 4, 45, 3, ''),
(157, '9033', '', '9033', 'Md. Al -Amin Khan', '2', 28, 4, 18, 2, ''),
(158, '9035', '', '9035', 'Ratan Lal Saha', '2', 12, 4, 11, 2, ''),
(159, '1142', '', '1142', 'Assadujjaman', '2', 13, 4, 50, 2, ''),
(160, '1144', '', '1144', 'Syed Marufur Rahman', '8', 23, 4, 28, 2, ''),
(161, '1121', '', '1121', 'Engr. Jahir Hassan', '2', 13, 4, 47, 2, ''),
(192, '7102', '01708570099', '7102', 'Sinthy', '4', 26, 4, 36, 2, ''),
(193, '7103', '01708570056', '7103', 'Abdul Jalil', '4', 26, 4, 31, 2, ''),
(194, '7104', '01748574045', '7104', 'Tarek Aziz Amzon', '4', 26, 4, 35, 2, ''),
(195, '1139', '01708570072', '7105', 'Hira Lal Roy', '4', 26, 4, 34, 2, ''),
(196, '7106', '01708570070', '7106', 'Ruhul Amin', '4', 26, 4, 34, 2, ''),
(197, '7107', '01916261156', '7107', 'Md. Aminul Islam', '4', 26, 4, 34, 2, ''),
(198, '7108', '01740264525', '7108', 'Jahangir Alom Tushar', '4', 26, 4, 34, 2, ''),
(199, '7109', '01708570057', '7109', 'Onup Majumdar Shuvo', '4', 26, 4, 31, 2, ''),
(200, '429', '01615413942', '0429', 'Md. Khaled Mazid', '4', 26, 4, 6, 2, ''),
(201, '7101', '01913783793', '7101', 'Khalid Mahmud', '2', 28, 4, 14, 2, '1'),
(214, 'logadmin', 'logadmin@gmail.com', 'logadmin', 'log2 Name', '6', 8, 4, 14, 6, '0'),
(215, 'log1', 'log1@gmail.com', 'log1', 'log1 Admin Name', '6', 8, 4, 14, 7, '0'),
(216, 'log2', 'logadmin@gmail.com', 'log2', 'Store Admin Name', '6', 8, 4, 14, 8, '0'),
(217, 'log3', 'log3@gmail.com', 'log3', 'log3 Name', '6', 8, 4, 14, 9, '0'),
(218, '1149', '', 'Simec$Bellal', 'Md. Bellal Hosen', '1', 14, 4, 52, 2, '0'),
(219, '999', '01913783793', '999', 'Mahmud', '2', 28, 4, 14, 13, '1'),
(220, '10033', '', '10033', 'Md. Abu Musa', '1', 8, 4, 12, 3, '0'),
(221, 'superadmin', '', 'superadmin', 'super admin name', '4', 1, 4, 2, 12, '1'),
(222, 'divihead', '', 'divihead', '', '2', 27, 4, 49, 3, ''),
(224, '99', '', '99', 'system checker', '1', 14, 4, 40, 13, '1'),
(225, 'purchaser', 'purchaser@gmail.com', 'purchaser', 'Purchaser Name', '8', 8, 4, 14, 14, '0'),
(226, 'purchaser1', 'purchaser@gmail.com', 'purchaser', 'Purchaser Name 1', '8', 8, 4, 14, 14, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `approval_hierarchy`
--
ALTER TABLE `approval_hierarchy`
  ADD PRIMARY KEY (`approval_hierarchy_id`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`company_type_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition`
--
ALTER TABLE `requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_details`
--
ALTER TABLE `requisition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_details`
--
ALTER TABLE `store_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `approval_hierarchy`
--
ALTER TABLE `approval_hierarchy`
  MODIFY `approval_hierarchy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `company_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `requisition`
--
ALTER TABLE `requisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requisition_details`
--
ALTER TABLE `requisition_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_details`
--
ALTER TABLE `store_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
