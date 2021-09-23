-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 03:38 PM
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
-- Database: `schoolpro`
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
  `bankcode` varchar(10) NOT NULL,
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
  `bankcode` varchar(20) NOT NULL,
  `chq` varchar(50) NOT NULL,
  `chqamount` decimal(10,2) NOT NULL,
  `dod` date NOT NULL,
  `slip` varchar(100) NOT NULL
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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `fees` decimal(10,2) NOT NULL
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
  `expcode` varchar(10) NOT NULL,
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
-- Table structure for table `invoice_payment`
--

CREATE TABLE `invoice_payment` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT current_timestamp()
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
  `post` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
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
  `exp_date` date NOT NULL,
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
  `pv_id` varchar(30) NOT NULL
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
  `finDate` datetime NOT NULL,
  `finDir` varchar(20) NOT NULL,
  `documents` int(2) NOT NULL,
  `chq` varchar(3) NOT NULL DEFAULT 'no',
  `curr` varchar(20) NOT NULL,
  `exchrate` decimal(10,5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sbj_course`
--

CREATE TABLE `sbj_course` (
  `id` int(11) NOT NULL,
  `sbjid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `hostel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `stfid`, `sttitle`, `fname`, `lname`, `sex`, `img`, `contact`, `email`, `post`, `admitdate`, `status`, `dob`, `resaddr`, `exams`, `fees`, `internship`, `pv`, `stfmgt`, `payroll`, `stdmgt`, `configs`, `bank`, `hostel`) VALUES
(1, 'admin', 'Mr', 'Felix', 'Bosompem', 'Male', 'assets/data/staff/20210212094652.jpg', '0268640343', 'felix.niamah@vokacom.net', 'Administrator', '2021-02-20', 'Active', '2021-02-20', 'Dansoman', 'Lecturer', 'Administrator', 'Administrator', 'Director', 'Adminstrator', 'Administrator', 'Administrator', 'Adminstrator', 'Manager', 'Adminstrator');

-- --------------------------------------------------------

--
-- Table structure for table `std_exams`
--

CREATE TABLE `std_exams` (
  `id` int(11) NOT NULL,
  `stdid` varchar(40) NOT NULL,
  `sbjid` varchar(20) NOT NULL,
  `exam_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ecomment` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `std_par`
--

CREATE TABLE `std_par` (
  `id` int(11) NOT NULL,
  `stdid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL
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
  `program` varchar(100) NOT NULL,
  `styr` varchar(5) NOT NULL,
  `stres` varchar(50) NOT NULL,
  `admitdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `resaddr` varchar(100) NOT NULL,
  `fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fees_paid` decimal(10,0) NOT NULL DEFAULT 0,
  `stsession` varchar(50) NOT NULL
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
  `paid` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `yr` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `sbjid` varchar(20) NOT NULL,
  `sbj` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taxconfig`
--

CREATE TABLE `taxconfig` (
  `id` int(11) NOT NULL,
  `taxid` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `val` decimal(10,3) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pword` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `access` varchar(10) NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '2021-03-10 00:00:00',
  `last_page` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `fname`, `lname`, `img`, `pword`, `status`, `access`, `dtype`, `last_login`, `last_page`) VALUES
(1, 'admin', 'Felix', 'Niamah', 'assets/data/users/avatar.png', '$argon2i$v=19$m=65536,t=4,p=1$bnp6SUtvTnJ4SGY1OEFqcw$8d4A9jtLzLudm+LyU+MsHr/3C2cVSfQkjcnLdlPH06A', 'Active', 'User', 'staff', '2021-04-16 12:48:26', 'http://localhost/schoolproo/dashboard.php'),
(17, 'MHC/CSR001/2021/04/0003', 'Mercy', 'Manu', 'assets/images/defaults/avatar.png', '$argon2i$v=19$m=65536,t=4,p=1$Y1owd1p4MzI3ZGZ3V2x6dw$RxeWI3LNHWLsikCBSS3d9QiH6tXdKyMU06wXcRLCmhw', 'Active', 'student', 'student', '2021-03-10 00:00:00', '');

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
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batchno`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
  ADD PRIMARY KEY (`expcode`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_invoices`
--
ALTER TABLE `hostel_invoices`
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
  ADD PRIMARY KEY (`post`),
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
-- Indexes for table `sal_rules`
--
ALTER TABLE `sal_rules`
  ADD PRIMARY KEY (`name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sbj_course`
--
ALTER TABLE `sbj_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stfid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `std_exams`
--
ALTER TABLE `std_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_intern`
--
ALTER TABLE `std_intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_par`
--
ALTER TABLE `std_par`
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `student_invoices`
--
ALTER TABLE `student_invoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sbjid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `taxconfig`
--
ALTER TABLE `taxconfig`
  ADD PRIMARY KEY (`taxid`),
  ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `hostel_invoices`
--
ALTER TABLE `hostel_invoices`
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
-- AUTO_INCREMENT for table `sal_rules`
--
ALTER TABLE `sal_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sbj_course`
--
ALTER TABLE `sbj_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `std_exams`
--
ALTER TABLE `std_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_intern`
--
ALTER TABLE `std_intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `std_par`
--
ALTER TABLE `std_par`
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
-- AUTO_INCREMENT for table `student_invoices`
--
ALTER TABLE `student_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxconfig`
--
ALTER TABLE `taxconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
