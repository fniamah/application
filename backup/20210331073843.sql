

CREATE TABLE `atrails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `event` varchar(500) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

INSERT INTO atrails VALUES("1","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-24 14:16:03");
INSERT INTO atrails VALUES("2","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","192.168.43.231","2021-03-24 14:17:56");
INSERT INTO atrails VALUES("3","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","192.168.43.82","2021-03-24 14:18:33");
INSERT INTO atrails VALUES("4","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","192.168.43.231","2021-03-24 14:21:57");
INSERT INTO atrails VALUES("5","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","192.168.43.231","2021-03-24 14:23:49");
INSERT INTO atrails VALUES("6","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> forster  anku
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","192.168.43.82","2021-03-24 14:25:10");
INSERT INTO atrails VALUES("7","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> CECELIA APLETU
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","192.168.43.231","2021-03-24 14:26:06");
INSERT INTO atrails VALUES("8","MHC/STF/2021/0003","School Fees","Amount Of GHS450 Paid For School Fees","192.168.43.82","2021-03-24 14:26:44");
INSERT INTO atrails VALUES("9","MHC/STF/2021/0003","School Fees","Amount Of GHS200 Paid For School Fees","192.168.43.231","2021-03-24 14:27:01");
INSERT INTO atrails VALUES("10","MHC/STF/2021/0003","Hostel Occupant","Student MHC/CSR001/2021/03/0001 Admitted Into Hostel","192.168.43.82","2021-03-24 14:34:32");
INSERT INTO atrails VALUES("11","MHC/STF/2021/0003","Hostel Occupant","Student MHC/CSR001/2021/03/0002 Admitted Into Hostel","192.168.43.231","2021-03-24 14:34:33");
INSERT INTO atrails VALUES("12","MHC/STF/2021/0003","Internship Facility","Pharmacy Or Facility, MEDNET PHARMACY Created","192.168.43.231","2021-03-24 14:44:44");
INSERT INTO atrails VALUES("13","MHC/STF/2021/0003","Internship Facility","Pharmacy Or Facility, PHARMA GEORGE Created","192.168.43.82","2021-03-24 14:45:03");
INSERT INTO atrails VALUES("14","MHC/STF/2021/0003","Payment Voucher","Payment Voucher, 20210324151233 Has Been Raised By Felix Bosompem","127.0.0.1","2021-03-24 15:20:51");
INSERT INTO atrails VALUES("15","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","192.168.43.82","2021-03-24 15:46:50");
INSERT INTO atrails VALUES("16","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","192.168.43.231","2021-03-24 15:46:50");
INSERT INTO atrails VALUES("17","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-24 15:46:50");
INSERT INTO atrails VALUES("18","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-25 09:24:12");
INSERT INTO atrails VALUES("19","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Reniel Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 09:39:18");
INSERT INTO atrails VALUES("20","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Reniel Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 09:39:54");
INSERT INTO atrails VALUES("21","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Mercy Kpogo
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-25 09:42:21");
INSERT INTO atrails VALUES("22","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Mercy Kpogo
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-25 09:44:36");
INSERT INTO atrails VALUES("23","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-25 10:12:36");
INSERT INTO atrails VALUES("24","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-25 16:07:17");
INSERT INTO atrails VALUES("25","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 16:30:44");
INSERT INTO atrails VALUES("26","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 16:33:24");
INSERT INTO atrails VALUES("27","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Reniel Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 16:40:40");
INSERT INTO atrails VALUES("28","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Ivy Tesu
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-25 16:43:43");
INSERT INTO atrails VALUES("29","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> John Tackie
 <b>STUDENT ID:</b> MHC/CSR002/2021/03/0001","127.0.0.1","2021-03-25 16:44:54");
INSERT INTO atrails VALUES("30","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-25 16:45:22");
INSERT INTO atrails VALUES("31","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR002/2021/03/0001","127.0.0.1","2021-03-25 16:46:14");
INSERT INTO atrails VALUES("32","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-25 16:46:50");
INSERT INTO atrails VALUES("33","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0003","127.0.0.1","2021-03-25 16:48:33");
INSERT INTO atrails VALUES("34","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-25 18:16:48");
INSERT INTO atrails VALUES("35","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-25 19:57:40");
INSERT INTO atrails VALUES("36","MHC/STF/2021/0003","MEMO","Memo Sent To All Staff","127.0.0.1","2021-03-25 19:58:06");
INSERT INTO atrails VALUES("37","MHC/STF/2021/0003","MEMO","Memo Sent To Felix Bosompem","127.0.0.1","2021-03-25 19:58:25");
INSERT INTO atrails VALUES("38","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-25 20:58:42");
INSERT INTO atrails VALUES("39","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-29 13:48:22");
INSERT INTO atrails VALUES("40","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Reniel Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-29 13:56:09");
INSERT INTO atrails VALUES("41","MHC/STF/2021/0003","School Fees","Amount Of GHS100 Paid For School Fees","127.0.0.1","2021-03-29 14:02:00");
INSERT INTO atrails VALUES("42","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> John Tesu
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-29 14:08:03");
INSERT INTO atrails VALUES("43","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Francis Manu
 <b>STUDENT ID:</b> MHC/CSR002/2021/03/0001","127.0.0.1","2021-03-29 14:09:24");
INSERT INTO atrails VALUES("44","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR002/2021/03/0001","127.0.0.1","2021-03-29 14:10:07");
INSERT INTO atrails VALUES("45","MHC/STF/2021/0003","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Prince Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-29 14:13:28");
INSERT INTO atrails VALUES("46","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Reniel Niamah
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0002","127.0.0.1","2021-03-29 14:14:27");
INSERT INTO atrails VALUES("47","MHC/STF/2021/0003","Student Creation","Student Has Been Registered Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> MHC/CSR001/2021/03/0001","127.0.0.1","2021-03-29 14:15:38");
INSERT INTO atrails VALUES("48","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-29 14:50:12");
INSERT INTO atrails VALUES("49","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-29 18:48:32");
INSERT INTO atrails VALUES("50","SYSTEM","Signed Out","Staff ID, MHC/STF/2021/0003 Has Been Signed Out","127.0.0.1","2021-03-29 19:11:08");
INSERT INTO atrails VALUES("51","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-29 19:28:34");
INSERT INTO atrails VALUES("52","MHC/STF/2021/0003","Log In","Staff ID, MHC/STF/2021/0003 logged In","127.0.0.1","2021-03-31 07:05:23");
INSERT INTO atrails VALUES("53","MHC/STF/2021/0002","Log In","Staff ID, MHC/STF/2021/0002 logged In","127.0.0.1","2021-03-31 07:24:42");
INSERT INTO atrails VALUES("54","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 07:28:31");



CREATE TABLE `bank_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bankcode` varchar(20) NOT NULL,
  `chq` varchar(50) NOT NULL,
  `chqamount` decimal(10,2) NOT NULL,
  `dod` date NOT NULL,
  `slip` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bankcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `account` varchar(30) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`account`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO banks VALUES("14","BS-129","Paid with petty cash","","","Active");
INSERT INTO banks VALUES("18","BS-133","Tekhype Ltd- Operations","0174997911022","Labone","Active");
INSERT INTO banks VALUES("19","BS-134","Tekhype Ltd- Statutory","0174997911038","Labone","Active");
INSERT INTO banks VALUES("7","BS-120","Vokacom Enterprise HFC A/C","0294940561012","Dansoman","Active");
INSERT INTO banks VALUES("11","BS-124","Tekhype Ltd","0294997911017","Dansoman","Active");
INSERT INTO banks VALUES("6","BS-119","E-HAN Softwork Ltd HFC Account(Current)","0295048671012","Dansoman","Inactive");
INSERT INTO banks VALUES("9","BS-122","E-HAN Softwork Ltd HFC Account(Health)","0295048671028","Dansoman","Active");
INSERT INTO banks VALUES("21","BS-136","E-HAN Softwork Ltd HFC Account- Statutory","0295048671047","Dansoman","Active");
INSERT INTO banks VALUES("20","BS-135","E-HAN Softwork Ltd HFC Account- Operations","0295048671055","Dansoman","Active");
INSERT INTO banks VALUES("10","BS-123","E-HAN Softwork Ltd HFC Account(Savings)","0295048673015","Dansoman","Active");
INSERT INTO banks VALUES("8","BS-121","Vokacom Realty Ltd HFC Account","0295301911017","Dansoman","Active");
INSERT INTO banks VALUES("36","BS-158","Vokacom Realty Limited-Statutory","0295301911025","Dansoman","Active");
INSERT INTO banks VALUES("12","BS-127","Vasmol Ltd HFC Account","0295847601019","Dansoman","Active");
INSERT INTO banks VALUES("25","BT-0039","Testing","0295847601024","Dansoman Roundabout","Inactive");
INSERT INTO banks VALUES("23","BS-138","Vasmol Ltd- Statutory Account (HFC)","0295847601027","Dansoman","Active");
INSERT INTO banks VALUES("24","BS-139","Vasmol Ltd- Operations Account (HFC)","0295847601035","Dansoman","Active");
INSERT INTO banks VALUES("33","BS-151","NOKAT Farms Ltd A/C","0295853861014","Dansoman","Active");
INSERT INTO banks VALUES("29","BS-146","NOKAT Farms Ltd- Operations A/C","0295853861022","Dansoman","Active");
INSERT INTO banks VALUES("35","BS-152","NOKAT Farms Ltd- Statutory AC","0295853861038","Dansoman","Active");
INSERT INTO banks VALUES("13","BS-128","Vokacom Ltd HFC Account","0295889871016","Dansoman","Active");
INSERT INTO banks VALUES("17","BS-132","Vokacom Statutory","0295889871024","Dansoman","Active");
INSERT INTO banks VALUES("16","BS-131","Vokacom Health","0295889871032","Dansoman","Active");
INSERT INTO banks VALUES("39","BS-159","Vokacom Ltd- Operations AC ","0295889871048","Dansoman ","Active");
INSERT INTO banks VALUES("15","BS-130","Vokacom Welfare Account","0296201501012","Dansoman","Active");
INSERT INTO banks VALUES("27","BS-141","Dondo Ltd- Operations Account","0296424711019","Dansoman","Active");
INSERT INTO banks VALUES("26","BS-140","Dondo Ltd- Statutory Account","0296424711067","Dansoman","Active");
INSERT INTO banks VALUES("28","BS-145","AsaaseGPS Ltd","0296855881019","Dansoman","Active");
INSERT INTO banks VALUES("37","BS-156","AsaaseGPS Limited-Statutory","0296855881027","Dansoman","Active");
INSERT INTO banks VALUES("38","BS-155","AsaaseGPS Ltd- Operations Account","0296855881035","Dansoman","Active");
INSERT INTO banks VALUES("34","BS-145","Nana Afrifa Foundation","0296935091019","Dansoman","Active");
INSERT INTO banks VALUES("30","BS-148","Two Dot O Ltd- Operations Account","0297032491033","Dansoman","Active");
INSERT INTO banks VALUES("31","BS-149","Two Dot O Ltd- Statutory Account","0297032491041","Dansoman","Active");
INSERT INTO banks VALUES("4","BS-116","Vasmol Fidelity Current A/C","1050031642517","Ridge Towers ","Active");
INSERT INTO banks VALUES("1","BS-112","Republik Bank","21465456487654","Dansoman","Active");
INSERT INTO banks VALUES("22","BS-137","Two Dot O Ltd Stanbic Account","9040003063695","Dansoman","Active");
INSERT INTO banks VALUES("5","BS-117","Vasmol Stanbic Current A/C","9040003658729","Dansoman","Active");
INSERT INTO banks VALUES("32","BS-150","Nhyira Lavoisier Organique","9040007629723","Dansoman","Active");



CREATE TABLE `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batchno` varchar(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bdesc` varchar(200) NOT NULL,
  `dyear` varchar(5) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`batchno`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO batches VALUES("1","BT/20210324/20210324","INTELLIGENT","INTELLIGENT BATCH","2021","2021-03-24","2021-03-24","Active");



CREATE TABLE `company` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `ccont` varchar(50) NOT NULL,
  `cmail` varchar(50) NOT NULL,
  `cloc` varchar(100) NOT NULL,
  `caddr` varchar(200) NOT NULL,
  `clogo` varchar(200) NOT NULL,
  `tag` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO company VALUES("1","MEDNET HEALTH COLLEGE","233554923322","INFO@NASOO1.COM","Abokobi Nimaa","ASHONGMAN ESTATE","assets/data/logo/20210325174241.jpg","NFIDEI PAPA FIEEE");



CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(20) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `fees` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO course VALUES("1","CSR001","COMPUTER SCIENCE","Active","500.00");
INSERT INTO course VALUES("2","CSR002","COMMUICATION SKILLS","Active","600.00");



CREATE TABLE `departments` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `stfid` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO departments VALUES("1","ENGLISH","MHC/STF/2021/0001","2021-03-24 15:04:56","Active");



CREATE TABLE `exch_rate` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `currency` varchar(50) NOT NULL,
  `drate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`currency`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO exch_rate VALUES("1","Dollars","5.71");



CREATE TABLE `expensecls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expcode` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`expcode`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO expensecls VALUES("1","EXP-111","Furniture","Active");



CREATE TABLE `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `paddr` varchar(200) NOT NULL,
  `pcont` varchar(20) NOT NULL,
  `pmail` varchar(100) NOT NULL,
  `ploc` varchar(100) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO facilities VALUES("1","MEDNET PHARMACY","MANGOASE","0203434343","MANGOASE@GMAIL.C0OM","ASHONGMAN ESTATE","PHARMACY","Active");
INSERT INTO facilities VALUES("2","PHARMA GEORGE","ESTATE","0243874203","PHARMAGEORGE@GMAIL","ESTATE","PHARMACY","Active");



CREATE TABLE `hostel_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `edate` date NOT NULL,
  PRIMARY KEY (`invoiceid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `invoice_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `paydate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `usr` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO memo VALUES("1","MHC/STF/2021/0001","MHC/STF/2021/0003","Staff Meeting","ytyutryurtyrytr","2021-03-25 19:58:06","Active");
INSERT INTO memo VALUES("2","MHC/STF/2021/0003","MHC/STF/2021/0003","Staff Meeting","ytyutryurtyrytr","2021-03-25 19:58:06","Active");
INSERT INTO memo VALUES("3","MHC/STF/2021/0003","MHC/STF/2021/0003","uyiuyui","gfghfhg","2021-03-25 19:58:25","Active");



CREATE TABLE `message` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `caption` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `enddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO message VALUES("1","MHC/STF/2021/0003","Payment Voucher With PV ID, 20210324151233 Is Pending Your Approval","Payment Voucher Approval","Inactive","2021-03-24 15:20:51","0000-00-00");
INSERT INTO message VALUES("2","MHC/STF/2021/0001","ytyutryurtyrytr","MEMO: Staff Meeting","Active","2021-03-25 19:58:06","0000-00-00");
INSERT INTO message VALUES("3","MHC/STF/2021/0003","ytyutryurtyrytr","MEMO: Staff Meeting","Inactive","2021-03-25 19:58:06","0000-00-00");
INSERT INTO message VALUES("4","MHC/STF/2021/0003","gfghfhg","MEMO: uyiuyui","Inactive","2021-03-25 19:58:25","0000-00-00");
INSERT INTO message VALUES("5","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 07:28:31","0000-00-00");



CREATE TABLE `payroll` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `operator` varchar(20) NOT NULL,
  `upload` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `payslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dvalue` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO payslip VALUES("1","MHC/STF/2021/0001","Basic","Basic","1000.00","Active");
INSERT INTO payslip VALUES("2","MHC/STF/2021/0001","Clothing Allowance","Earning","500.00","Active");
INSERT INTO payslip VALUES("3","MHC/STF/2021/0001","Income Tax","Deduction","75.00","Active");



CREATE TABLE `payslipsummary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slipid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `totded` decimal(10,2) NOT NULL,
  `totreimb` decimal(10,2) NOT NULL,
  `totearn` decimal(10,2) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`slipid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO payslipsummary VALUES("1","MHCSTF20210001/2021/0001","MHC/STF/2021/0001","1000.00","75.00","0.00","1500.00","2021-03-24","2021-03-24","Approved","2021-03-24 14:56:27");



CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`post`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_id` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `exp_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO pv VALUES("1","20210324151233","Testing","500.00","2021-03-24","");
INSERT INTO pv VALUES("2","20210324151233","Testing 2","400.00","2021-03-24","");
INSERT INTO pv VALUES("3","20210324151234","bed","450.00","2021-03-24","");
INSERT INTO pv VALUES("4","20210324151236","mob","200.00","2021-03-24","");



CREATE TABLE `pv_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_id` varchar(50) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `accounts` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `pv_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`pv_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO pv_detail VALUES("1","20210324151233","EXP-111","BS-112","","2021-03-24 15:12:33","17.50","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","IT Assets","900.00","0000-00-00 00:00:00","","1","no","cedis","1.00000","Confirmed");
INSERT INTO pv_detail VALUES("2","20210324151234","EXP-111","BS-112","","2021-03-24 15:12:34","0.00","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","ivy tesu","450.00","0000-00-00 00:00:00","","0","no","cedis","1.00000","Pending");
INSERT INTO pv_detail VALUES("3","20210324151236","EXP-111","BS-112","","2021-03-24 15:12:36","0.00","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","melcom","200.00","0000-00-00 00:00:00","","0","no","cedis","1.00000","Pending");



CREATE TABLE `pvdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `pv_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pvdoc VALUES("1","81594.837441616.pdf","20210324151233(1)","20210324151233");



CREATE TABLE `pvtax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_id` varchar(20) NOT NULL,
  `itemid` varchar(20) NOT NULL,
  `percentage` decimal(7,4) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pvtax VALUES("1","20210324151233","1","0.0350","17.50");



CREATE TABLE `pvtype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sup` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pvtype VALUES("1","Medical","no","Active");



CREATE TABLE `sal_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `baseval` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sal_rules VALUES("1","Clothing Allowance","Earning","0.00","Active");
INSERT INTO sal_rules VALUES("2","Income Tax","Deduction","7.50","Active");



CREATE TABLE `sbj_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sbjid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO sbj_course VALUES("1","SBJ001","CSR001");
INSERT INTO sbj_course VALUES("2","SBJ002","CSR001");
INSERT INTO sbj_course VALUES("3","SBJ001","CSR002");
INSERT INTO sbj_course VALUES("4","SBJ002","CSR002");



CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`stfid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO staff VALUES("3","MHC/STF/2021/0001","Mr","Abraham","Sarcoh","Male","assets/data/staff/20210215132517.jpg","0277474247","felix.niamah@vokacom.net","Administrator","2021-02-15","Active","2008-02-01","Ashongman Estate","Administrator","Administrator","Administrator","Accountant","Adminstrator","Adminstrator","Adminstrator","Adminstrator","Manager");
INSERT INTO staff VALUES("5","MHC/STF/2021/0002","Mr","Felix","Bosompem","Male","assets/data/staff/20210212094652.jpg","0268640343","felix.niamah@vokacom.net","Administrator","2021-02-20","Active","2021-02-20","Dansoman","Lecturer","Administrator","Administrator","Director","Adminstrator","Adminstrator","Adminstrator","Adminstrator","Manager");



CREATE TABLE `std_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(40) NOT NULL,
  `sbjid` varchar(20) NOT NULL,
  `exam_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ecomment` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

INSERT INTO std_exams VALUES("38","MHC/CSR001/2021/03/0002","SBJ001","0.00","","Pending");
INSERT INTO std_exams VALUES("39","MHC/CSR001/2021/03/0002","SBJ002","0.00","","Pending");
INSERT INTO std_exams VALUES("41","MHC/CSR001/2021/03/0001","SBJ001","0.00","","Pending");
INSERT INTO std_exams VALUES("42","MHC/CSR001/2021/03/0001","SBJ002","0.00","","Pending");



CREATE TABLE `std_intern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(50) NOT NULL,
  `factid` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `std_par` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `stf_sbj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sbjid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO stf_sbj VALUES("1","SBJ001","MHC/STF/2021/0001","Active");
INSERT INTO stf_sbj VALUES("2","SBJ002","MHC/STF/2021/0001","Active");
INSERT INTO stf_sbj VALUES("3","SBJ002","MHC/STF/2021/0002","Active");



CREATE TABLE `stfpayslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slipid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dvalue` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;




CREATE TABLE `student_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(30) NOT NULL,
  `stdid` varchar(100) NOT NULL,
  `invdate` date NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `yr` varchar(4) NOT NULL,
  PRIMARY KEY (`invoiceid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_invoices VALUES("14","INV/2021/0001","MHC/CSR001/2021/03/0002","2021-03-29","600.00","0.00","Pending","2021-03-29 14:14:27","2021");
INSERT INTO student_invoices VALUES("15","INV/2021/0002","MHC/CSR001/2021/03/0001","2021-03-29","600.00","0.00","Pending","2021-03-29 14:15:38","2021");



CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `stsession` varchar(50) NOT NULL,
  PRIMARY KEY (`stdid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO students VALUES("14","MHC/CSR001/2021/03/0001","BT/20210324/20210324","Prince","Bosompem","Male","assets/data/students/20210329141328.jpg","0277474247","felix.niamah@vokacom.net","Full time","CSR001","2021","Hostel","2021-03-29","Active","2021-03-29","Dansoman","600.00","0","Morning");
INSERT INTO students VALUES("15","MHC/CSR001/2021/03/0002","BT/20210324/20210324","Reniel","Niamah","Female","assets/data/students/20210329141427.jpg","0245895326","sara@gh.com","Full time","CSR001","2021","Hostel","2021-03-29","Active","2021-03-29","Dansoman","600.00","0","Morning");



CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sbjid` varchar(20) NOT NULL,
  `sbj` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`sbjid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO subject VALUES("1","SBJ001","FRENCH","Active");
INSERT INTO subject VALUES("2","SBJ002","ENGLISH","Active");



CREATE TABLE `taxconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxid` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `val` decimal(10,3) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`taxid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO taxconfig VALUES("1","VAT","Value Added Tax","0.035","Active");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pword` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `access` varchar(10) NOT NULL,
  `dtype` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '2021-03-10 00:00:00',
  `last_page` varchar(500) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("16","admin","Felix","Niamah","assets/data/users/avatar.png","$argon2i$v=19$m=65536,t=4,p=1$bnp6SUtvTnJ4SGY1OEFqcw$8d4A9jtLzLudm+LyU+MsHr/3C2cVSfQkjcnLdlPH06A","Active","User","staff","2021-03-10 00:00:00","");
INSERT INTO users VALUES("18","MHC/2021/0003","fhgfgh","fghfghf","assets/data/students/20210223111827.jpg","$argon2i$v=19$m=65536,t=4,p=1$bVJ1OVhHMS9PZTljTXo1Vg$gk7c6kX9nTue5Cs26w0IwzEkICCbKUd7gLnoTLyPGuM","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("19","MHC/CS213/2021/02/00","Mercy","Bosompem","assets/data/students/20210223172143.jpg","$argon2i$v=19$m=65536,t=4,p=1$eE90OXZ2bHptYnhTQVhsbQ$YDjlwbAiiHFWekydv7uu7iUgVJxirYrvBI3EW9i/eqc","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("22","MHC/CS213/2021/03/00","Mercy","Kpogo","assets/data/students/20210301135510.jpg","$argon2i$v=19$m=65536,t=4,p=1$V3QyQmxWd294UjRoSDN0TA$UeiB8mhwfQuoSHypBj4Q6d8ulOKiuoOu9f5q5foVqAw","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("26","MHC/CS213/2021/03/0001","Shirley","Ameko","assets/data/students/20210319204145.jpg","$argon2i$v=19$m=65536,t=4,p=1$Nk9qelUwVXB2VEk5R0g5dw$mNmk2JppI5ur7IVjDNS68AsAVki4wMNrg2+ehUSQOjI","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("20","MHC/CS414/2021/03/00","Reniel","Niamah","assets/data/students/20210301112538.jpg","$argon2i$v=19$m=65536,t=4,p=1$ZjR5V0NwQ1NTSUdVTXVYOQ$82uZUcwdPU+BSMIHgpii8b5c5aIrYyCTCEooixcizEs","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("24","MHC/CS414/2021/03/0001","Reniel","Niamah","assets/data/students/20210316065213.jpg","$argon2i$v=19$m=65536,t=4,p=1$dC45WTRSUmN0d2RmUWU4Yg$dwbxTsn8nOFQXzD1gKqpdEQbW/tiofebCxqP4Ca0dJQ","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("25","MHC/CS414/2021/03/0002","John","Amissah","assets/data/students/20210316070418.jpg","$argon2i$v=19$m=65536,t=4,p=1$ZEdRcWwwdFNHbUwzL0ZqMw$jagbPtu+bH3BiWoZt9lc0Yr96Fj+NiaPPtKRcsGMN38","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("27","MHC/CSR001/2021/03/0001","forster ","anku","assets/images/defaults/avatar.png","$argon2i$v=19$m=65536,t=4,p=1$M3Zwa1Rhd3U1RDhGQTY4Yg$9JqtQDxjk9akgbKaCtUj01cT6rRnMOduV0PG+txnRxY","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("28","MHC/CSR001/2021/03/0002","CECELIA","APLETU","assets/images/defaults/avatar.png","$argon2i$v=19$m=65536,t=4,p=1$dVkuRjB6MUN5aGRMSTZ2Rg$daJwtMWhGZmEGRDedGHHTA9dRQMHzLvODTzmMNk3N1o","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("36","MHC/CSR001/2021/03/0003","Felix","Niamah","assets/data/students/20210325164832.jpg","$argon2i$v=19$m=65536,t=4,p=1$Z0xhWUFWUFdYUUh2S2xTVg$qxLZvK/Dq6+Zu3YgKyr+Elp/iuxtjd9GsCrIxoPMvGs","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("35","MHC/CSR002/2021/03/0001","John","Tackie","assets/data/students/20210325164454.jpg","$argon2i$v=19$m=65536,t=4,p=1$Ri9UOTBMVnhvRjJySEhxLg$RPMMN76txm7y1zSoQd2Z/mOeqYJMDulBO1h6orNH4hg","Active","student","student","2021-03-10 00:00:00","");
INSERT INTO users VALUES("17","MHC/STF/2021/0002","Felix","Bosompem","assets/data/staff/20210212094652.jpg","$argon2i$v=19$m=65536,t=4,p=1$NEpDSFNxSHc2Lm1WemhILg$vG+TWUOKKRXQA/DSdNScc2KmX/A8o3/RrWBdBjAkHuM","Active","staff","staff","2021-03-31 07:38:23","http://localhost/schoolproo/dashboard.php?cseprog=CSR001&stdcourses=");

