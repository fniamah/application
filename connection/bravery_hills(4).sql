-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 04:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bravery_hills`
--

-- --------------------------------------------------------

--
-- Table structure for table `atrails`
--

CREATE TABLE `atrails` (
  `id` int(11) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `event` varchar(500) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `account` varchar(30) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` int(11) NOT NULL,
  `stfid` varchar(20) NOT NULL,
  `bankcode` varchar(20) NOT NULL,
  `chq` varchar(50) NOT NULL,
  `chqamount` decimal(10,2) NOT NULL,
  `dod` date NOT NULL,
  `slip` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batchno` varchar(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bdesc` varchar(200) NOT NULL,
  `dyear` varchar(5) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE `cart_temp` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `pid` varchar(30) NOT NULL DEFAULT '',
  `qty` int(3) DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `template` varchar(10) NOT NULL DEFAULT 'NO',
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_staff`
--

CREATE TABLE `class_staff` (
  `id` int(11) NOT NULL,
  `classid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(1) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `ccont` varchar(50) NOT NULL,
  `cmail` varchar(50) NOT NULL,
  `cloc` varchar(100) NOT NULL,
  `caddr` varchar(200) NOT NULL,
  `clogo` varchar(200) NOT NULL,
  `tag` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stfid` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `disc_name` varchar(100) NOT NULL,
  `percent` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams_details`
--

CREATE TABLE `exams_details` (
  `id` int(11) NOT NULL,
  `sbj` varchar(100) NOT NULL,
  `examid` varchar(50) NOT NULL,
  `cls_score` int(3) NOT NULL,
  `exam_score` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams_records`
--

CREATE TABLE `exams_records` (
  `id` int(11) NOT NULL,
  `examid` varchar(50) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `class` varchar(5) NOT NULL,
  `term` varchar(5) NOT NULL,
  `datecreated` datetime DEFAULT NULL,
  `dateapproved` datetime DEFAULT NULL,
  `approvedby` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `roll_num` varchar(5) NOT NULL,
  `dyear` varchar(10) NOT NULL,
  `vacation` date DEFAULT NULL,
  `class_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `exam_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `template` varchar(20) NOT NULL,
  `reopening` date DEFAULT NULL,
  `attendance` varchar(5) NOT NULL,
  `outof` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams_remarks`
--

CREATE TABLE `exams_remarks` (
  `id` int(11) NOT NULL,
  `examid` varchar(50) NOT NULL,
  `talents` varchar(500) NOT NULL,
  `teacher` varchar(500) NOT NULL,
  `principal` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_qxtns`
--

CREATE TABLE `exam_qxtns` (
  `id` int(11) NOT NULL,
  `sbjid` varchar(50) NOT NULL,
  `qxtn` text NOT NULL,
  `answer` varchar(100) NOT NULL,
  `imgurl` varchar(100) NOT NULL,
  `sectiontype` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exch_rate`
--

CREATE TABLE `exch_rate` (
  `id` int(2) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `drate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expensecls`
--

CREATE TABLE `expensecls` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `paddr` varchar(200) NOT NULL,
  `pcont` varchar(20) NOT NULL,
  `pmail` varchar(100) NOT NULL,
  `ploc` varchar(100) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees_class`
--

CREATE TABLE `fees_class` (
  `id` int(11) NOT NULL,
  `feeid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees_struct`
--

CREATE TABLE `fees_struct` (
  `id` int(11) NOT NULL,
  `fee_name` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_invoices`
--

CREATE TABLE `hostel_invoices` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(30) NOT NULL,
  `stdid` varchar(100) NOT NULL,
  `invdate` date NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `yr` varchar(4) NOT NULL,
  `room` varchar(200) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_discount`
--

CREATE TABLE `invoice_discount` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(50) NOT NULL,
  `discid` varchar(5) NOT NULL,
  `percent` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment`
--

CREATE TABLE `invoice_payment` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `usr` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memo_log`
--

CREATE TABLE `memo_log` (
  `id` int(11) NOT NULL,
  `usr` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  `recipient` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(4) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `caption` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(1) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `operator` varchar(20) NOT NULL,
  `upload` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `id` int(11) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dvalue` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payslipsummary`
--

CREATE TABLE `payslipsummary` (
  `id` int(11) NOT NULL,
  `slipid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `totded` decimal(10,2) NOT NULL,
  `totreimb` decimal(10,2) NOT NULL,
  `totearn` decimal(10,2) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment`
--

CREATE TABLE `pos_payment` (
  `id` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `tend` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dbal` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_sales`
--

CREATE TABLE `pos_sales` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `cid` varchar(50) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL DEFAULT '',
  `qty` int(5) NOT NULL DEFAULT 0,
  `sales_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_tax`
--

CREATE TABLE `pos_tax` (
  `id` int(11) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `taxid` varchar(10) NOT NULL,
  `dval` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos_temp`
--

CREATE TABLE `pos_temp` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL DEFAULT '',
  `qty` int(5) NOT NULL DEFAULT 0,
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_master`
--

CREATE TABLE `products_master` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `pname` varchar(100) NOT NULL DEFAULT '',
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(4) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_master_history`
--

CREATE TABLE `products_master_history` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL DEFAULT '',
  `pname` varchar(100) NOT NULL DEFAULT '',
  `sprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qty` int(4) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT '',
  `changedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pnameo` varchar(100) NOT NULL DEFAULT '',
  `spriceo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cpriceo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `qtyo` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pv`
--

CREATE TABLE `pv` (
  `id` int(11) NOT NULL,
  `pv_id` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pvdoc`
--

CREATE TABLE `pvdoc` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `pv_id` varchar(30) NOT NULL,
  `doctype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pvtax`
--

CREATE TABLE `pvtax` (
  `id` int(11) NOT NULL,
  `pv_id` varchar(20) NOT NULL,
  `itemid` varchar(20) NOT NULL,
  `percentage` decimal(7,4) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pvtype`
--

CREATE TABLE `pvtype` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sup` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pv_comment`
--

CREATE TABLE `pv_comment` (
  `id` int(11) NOT NULL,
  `pv_id` varchar(50) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `accounts` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pv_detail`
--

CREATE TABLE `pv_detail` (
  `id` int(11) NOT NULL,
  `pv_id` varchar(50) NOT NULL,
  `expense_class` varchar(50) NOT NULL,
  `bankCode` varchar(20) NOT NULL,
  `chekno` varchar(50) NOT NULL,
  `app_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `taxamount` decimal(10,2) NOT NULL,
  `expType` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `supervisor` varchar(20) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `supdate` datetime NOT NULL,
  `finDir` varchar(20) NOT NULL,
  `documents` int(2) NOT NULL,
  `chq` varchar(3) NOT NULL DEFAULT 'no',
  `comment` varchar(100) NOT NULL,
  `exchrate` decimal(10,5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_summary`
--

CREATE TABLE `sales_summary` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL DEFAULT '',
  `sid` varchar(50) NOT NULL,
  `tot_sales` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `transdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sal_rules`
--

CREATE TABLE `sal_rules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `baseval` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL DEFAULT '',
  `pid` varchar(30) NOT NULL DEFAULT '',
  `qty` int(3) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT '',
  `ordernum` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

CREATE TABLE `sms_log` (
  `id` int(11) NOT NULL,
  `stfid` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  `recipient` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `sttitle` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `admitdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `resaddr` varchar(100) NOT NULL,
  `exams` varchar(20) NOT NULL,
  `fees` varchar(20) NOT NULL,
  `internship` varchar(20) NOT NULL,
  `pv` varchar(20) NOT NULL,
  `stfmgt` varchar(20) NOT NULL,
  `payroll` varchar(20) NOT NULL,
  `stdmgt` varchar(20) NOT NULL,
  `configs` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `hostel` varchar(20) NOT NULL,
  `sales` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `stfid`, `sttitle`, `fname`, `lname`, `sex`, `img`, `contact`, `email`, `post`, `admitdate`, `status`, `dob`, `resaddr`, `exams`, `fees`, `internship`, `pv`, `stfmgt`, `payroll`, `stdmgt`, `configs`, `bank`, `hostel`, `sales`) VALUES
(8, 'admin', 'MR', 'FELIX', 'NIAMAH', 'MALE', 'assets/data/staff/20230302034123.jpg', '0554923322', 'FELSINA89@GMAIL.COM', '2', '2023-02-04', 'ACTIVE', '2023-02-04', 'ODUMAN', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR', 'ADMINISTRATOR'),
(10, 'BHIS170220220003', 'MRS', 'MAUD', 'TACKIE', 'FEMALE', 'assets/data/staff/20230217064829.jpg', '0256584585', '', '3', '2022-02-17', 'ACTIVE', '1985-03-17', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'BHIS170220230002', 'MRS', 'CLARA', 'ASARE', 'FEMALE', 'assets/data/staff/20230217064854.jpg', '0268640345', 'MICAHEL.AVOKE@HELLO.COM', '2', '2023-02-17', 'ACTIVE', '1989-02-17', 'AMERICAN HOUSE', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `std_intern`
--

CREATE TABLE `std_intern` (
  `id` int(11) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `factid` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stfpayslip`
--

CREATE TABLE `stfpayslip` (
  `id` int(11) NOT NULL,
  `slipid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dvalue` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stf_sbj`
--

CREATE TABLE `stf_sbj` (
  `id` int(11) NOT NULL,
  `sbjid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `batchno` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sttype` varchar(50) NOT NULL,
  `class` varchar(100) NOT NULL,
  `styr` varchar(5) NOT NULL,
  `stres` varchar(50) NOT NULL,
  `admitdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `resaddr` varchar(100) NOT NULL,
  `stsession` varchar(50) NOT NULL,
  `discid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_emergency`
--

CREATE TABLE `student_emergency` (
  `id` int(11) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_invoices`
--

CREATE TABLE `student_invoices` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(30) NOT NULL,
  `stdid` varchar(100) NOT NULL,
  `invdate` date NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `yr` varchar(4) NOT NULL,
  `classid` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_invoice_details`
--

CREATE TABLE `student_invoice_details` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(50) NOT NULL,
  `feeid` varchar(20) NOT NULL,
  `feename` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_parents`
--

CREATE TABLE `student_parents` (
  `id` int(11) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `sbj` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_class`
--

CREATE TABLE `subject_class` (
  `id` int(11) NOT NULL,
  `sbjid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taxconfig`
--

CREATE TABLE `taxconfig` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `val` decimal(10,3) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL DEFAULT '',
  `transid` varchar(100) NOT NULL DEFAULT '',
  `prev` int(10) NOT NULL DEFAULT 0,
  `cur` int(10) NOT NULL DEFAULT 0,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `stfid` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `pword` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `access` varchar(10) NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '2021-03-10 00:00:00',
  `last_page` varchar(500) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `pword`, `status`, `access`, `dtype`, `last_login`, `last_page`, `otp`) VALUES
(1, 'admin', '$argon2i$v=19$m=65536,t=4,p=1$Lmx5d0liUTFlVm9GQkdSMQ$S1tHomwM+d9mG9mTPl/sgBBYKohhRwwsW+q9ncl2T98', 'Active', 'User', 'staff', '2023-03-06 19:58:30', 'http://localhost/ablekuma/dashboard.php', '8076'),
(23, 'BHIS010119700001', '$argon2i$v=19$m=65536,t=4,p=1$amtyZk9XanJOSzdWbS9ycg$RDV6e2p6Sezx/rMUxGFHX87v5vWGwpa4U+rEoDA/hLA', 'Active', 'staff', 'staff', '2021-03-10 00:00:00', '', ''),
(25, 'BHIS010219790002', '$argon2i$v=19$m=65536,t=4,p=1$VGwzdEVIS1lPSFJKRlRkeQ$fd03nGynbPcxcExnGaXcLPLaZKDL4M48TogvGWBnAF0', 'Active', 'staff', 'staff', '2021-03-10 00:00:00', '', ''),
(24, 'BHIS010219890002', '$argon2i$v=19$m=65536,t=4,p=1$cWRJSTFuazdVN0tJelNoTg$9iB2KGz3HS2At238KQeHbjZP3V06ZqJ5jwdmryFB1Rs', 'Active', 'staff', 'staff', '2021-03-10 00:00:00', '', ''),
(26, 'BHIS030220000002', '$argon2i$v=19$m=65536,t=4,p=1$aU9heEZRWXJQT1VuWFp4Qw$2jnyLuYFZ5nUPTmvKxMVXPrG5mgrGp/yWqfY0+1EVJo', 'Active', 'staff', 'staff', '2021-03-10 00:00:00', '', ''),
(27, 'BHIS040220230003', '$argon2i$v=19$m=65536,t=4,p=1$S1NEdVNVbkxqY05YQVlMTw$XPJiInfoemyWuvMQuzPmvDFsHLQTLOENkcPMmvWlzOY', 'Active', 'staff', 'staff', '2023-02-24 21:54:32', 'http://localhost/ablekuma/dashboard.php', ''),
(30, 'BHIS170220220003', '$argon2i$v=19$m=65536,t=4,p=1$VUNOdTkyZkM4MEdRYlAvVA$XrWKDWYdzfuyNGsDBq6B7lrECDOybBeRuLjEnucoCa0', 'ACTIVE', 'staff', 'access', '2021-03-10 00:00:00', '', ''),
(29, 'BHIS170220230002', '$argon2i$v=19$m=65536,t=4,p=1$VkRVdzc4V1BWVnFXOVZ5NQ$QYBkP4dU40Mc7wc90eCipbbCP0msFCY/AMwXhMn3yBg', 'Active', 'staff', 'staff', '2023-02-24 22:26:44', 'http://localhost/ablekuma/dashboard.php', ''),
(22, 'MHC/CLS001/2023/01/0001', '$argon2i$v=19$m=65536,t=4,p=1$aW1OT3ZXa3JtdU1BYjJ6VQ$6uHaFUUp78umHtPE/GZ6EhEW/uoMhwHt5BtM6BNhyVw', 'Active', 'student', 'student', '2021-03-10 00:00:00', '', ''),
(21, 'MHC/NS1001/2023/01/0001', '$argon2i$v=19$m=65536,t=4,p=1$WW9TOEpnTFFmM1dha0Zjaw$PCT5uyEKCUgERRCzg0qdoQ5fz7+OI6OZ+zeCpxHHJeY', 'Active', 'student', 'student', '2021-03-10 00:00:00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atrails`
--
ALTER TABLE `atrails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`account`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batchno`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cart_temp`
--
ALTER TABLE `cart_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_staff`
--
ALTER TABLE `class_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_details`
--
ALTER TABLE `exams_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_records`
--
ALTER TABLE `exams_records`
  ADD PRIMARY KEY (`examid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `exams_remarks`
--
ALTER TABLE `exams_remarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examid` (`examid`);

--
-- Indexes for table `exam_qxtns`
--
ALTER TABLE `exam_qxtns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exch_rate`
--
ALTER TABLE `exch_rate`
  ADD PRIMARY KEY (`currency`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `expensecls`
--
ALTER TABLE `expensecls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_class`
--
ALTER TABLE `fees_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_struct`
--
ALTER TABLE `fees_struct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_invoices`
--
ALTER TABLE `hostel_invoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `invoice_discount`
--
ALTER TABLE `invoice_discount`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `memo_log`
--
ALTER TABLE `memo_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslipsummary`
--
ALTER TABLE `payslipsummary`
  ADD PRIMARY KEY (`slipid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`post_name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pos_payment`
--
ALTER TABLE `pos_payment`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pos_sales`
--
ALTER TABLE `pos_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_tax`
--
ALTER TABLE `pos_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_temp`
--
ALTER TABLE `pos_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_master`
--
ALTER TABLE `products_master`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products_master_history`
--
ALTER TABLE `products_master_history`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pv`
--
ALTER TABLE `pv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pvdoc`
--
ALTER TABLE `pvdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvtax`
--
ALTER TABLE `pvtax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pvtype`
--
ALTER TABLE `pvtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_comment`
--
ALTER TABLE `pv_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_detail`
--
ALTER TABLE `pv_detail`
  ADD PRIMARY KEY (`pv_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sales_summary`
--
ALTER TABLE `sales_summary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `sal_rules`
--
ALTER TABLE `sal_rules`
  ADD PRIMARY KEY (`name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sms_log`
--
ALTER TABLE `sms_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stfid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `std_intern`
--
ALTER TABLE `std_intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stfpayslip`
--
ALTER TABLE `stfpayslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stf_sbj`
--
ALTER TABLE `stf_sbj`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stdid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_emergency`
--
ALTER TABLE `student_emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_invoices`
--
ALTER TABLE `student_invoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_invoice_details`
--
ALTER TABLE `student_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parents`
--
ALTER TABLE `student_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_class`
--
ALTER TABLE `subject_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxconfig`
--
ALTER TABLE `taxconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atrails`
--
ALTER TABLE `atrails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_temp`
--
ALTER TABLE `cart_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_staff`
--
ALTER TABLE `class_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams_details`
--
ALTER TABLE `exams_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams_records`
--
ALTER TABLE `exams_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams_remarks`
--
ALTER TABLE `exams_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_qxtns`
--
ALTER TABLE `exam_qxtns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exch_rate`
--
ALTER TABLE `exch_rate`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensecls`
--
ALTER TABLE `expensecls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_class`
--
ALTER TABLE `fees_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_struct`
--
ALTER TABLE `fees_struct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_invoices`
--
ALTER TABLE `hostel_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_discount`
--
ALTER TABLE `invoice_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memo_log`
--
ALTER TABLE `memo_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslip`
--
ALTER TABLE `payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslipsummary`
--
ALTER TABLE `payslipsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_payment`
--
ALTER TABLE `pos_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_sales`
--
ALTER TABLE `pos_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_tax`
--
ALTER TABLE `pos_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_temp`
--
ALTER TABLE `pos_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_master`
--
ALTER TABLE `products_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_master_history`
--
ALTER TABLE `products_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv`
--
ALTER TABLE `pv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pvdoc`
--
ALTER TABLE `pvdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pvtax`
--
ALTER TABLE `pvtax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pvtype`
--
ALTER TABLE `pvtype`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_comment`
--
ALTER TABLE `pv_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_detail`
--
ALTER TABLE `pv_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_summary`
--
ALTER TABLE `sales_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sal_rules`
--
ALTER TABLE `sal_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_log`
--
ALTER TABLE `sms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `std_intern`
--
ALTER TABLE `std_intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stfpayslip`
--
ALTER TABLE `stfpayslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stf_sbj`
--
ALTER TABLE `stf_sbj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_emergency`
--
ALTER TABLE `student_emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_invoices`
--
ALTER TABLE `student_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_invoice_details`
--
ALTER TABLE `student_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_parents`
--
ALTER TABLE `student_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_class`
--
ALTER TABLE `subject_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxconfig`
--
ALTER TABLE `taxconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
