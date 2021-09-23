

CREATE TABLE `atrails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `event` varchar(500) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

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
INSERT INTO atrails VALUES("55","MHC/STF/2021/0002","Log In","Staff ID, MHC/STF/2021/0002 logged In","127.0.0.1","2021-03-31 20:46:07");
INSERT INTO atrails VALUES("56","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Abraham Sarcoh Has Been Reviewed","127.0.0.1","2021-03-31 21:11:54");
INSERT INTO atrails VALUES("57","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Abraham Sarcoh Has Been Reviewed","127.0.0.1","2021-03-31 21:12:03");
INSERT INTO atrails VALUES("58","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:13:48");
INSERT INTO atrails VALUES("59","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:18:27");
INSERT INTO atrails VALUES("60","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:18:53");
INSERT INTO atrails VALUES("61","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:30:16");
INSERT INTO atrails VALUES("62","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:32:02");
INSERT INTO atrails VALUES("63","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:32:16");
INSERT INTO atrails VALUES("64","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:36:38");
INSERT INTO atrails VALUES("65","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:37:16");
INSERT INTO atrails VALUES("66","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Felix Bosompem Has Been Reviewed","127.0.0.1","2021-03-31 21:37:24");
INSERT INTO atrails VALUES("67","MHC/STF/2021/0002","Log In","Staff ID, MHC/STF/2021/0002 logged In","127.0.0.1","2021-04-01 10:28:35");
INSERT INTO atrails VALUES("68","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Abraham Sarcoh Has Been Reviewed","127.0.0.1","2021-04-01 10:33:16");
INSERT INTO atrails VALUES("69","MHC/STF/2021/0002","Access Rights Reviewed","Access Rights Of Abraham Sarcoh Has Been Reviewed","127.0.0.1","2021-04-01 10:34:21");
INSERT INTO atrails VALUES("70","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-01 10:36:52");
INSERT INTO atrails VALUES("71","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-01 10:56:52");
INSERT INTO atrails VALUES("72","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-01 12:36:19");
INSERT INTO atrails VALUES("73","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-01 12:56:24");
INSERT INTO atrails VALUES("74","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-01 13:38:12");
INSERT INTO atrails VALUES("75","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-01 13:58:12");
INSERT INTO atrails VALUES("76","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-01 14:31:27");
INSERT INTO atrails VALUES("77","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-01 14:57:46");
INSERT INTO atrails VALUES("78","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-02 19:05:07");
INSERT INTO atrails VALUES("79","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-02 19:31:22");
INSERT INTO atrails VALUES("80","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-02 20:32:19");
INSERT INTO atrails VALUES("81","admin","Payment Voucher","Payment Voucher, 20210402190556 Has Been Raised By Felix Bosompem","127.0.0.1","2021-04-02 20:49:14");
INSERT INTO atrails VALUES("82","admin","Payment Voucher","Payment Voucher, 20210402190556 Has Been Approved By Felix Bosompem As A Finance Director","127.0.0.1","2021-04-02 20:52:49");
INSERT INTO atrails VALUES("83","admin","Payment Voucher","Payment Voucher, 20210324151233 Has Been Approved By Felix Bosompem As A Finance Director","127.0.0.1","2021-04-02 20:55:36");
INSERT INTO atrails VALUES("84","admin","Student Creation","Student Details Has Been Added Successfully. 
<b>STUDENT NAME:</b> Mercy Manu
 <b>STUDENT ID:</b> MHC/CSR001/2021/04/0003","127.0.0.1","2021-04-02 21:07:31");
INSERT INTO atrails VALUES("85","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-03 08:38:17");
INSERT INTO atrails VALUES("86","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-03 09:13:13");
INSERT INTO atrails VALUES("87","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-03 20:04:15");
INSERT INTO atrails VALUES("88","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-07 10:20:37");
INSERT INTO atrails VALUES("89","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-07 10:40:37");
INSERT INTO atrails VALUES("90","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-13 13:47:16");
INSERT INTO atrails VALUES("91","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-13 13:50:28");
INSERT INTO atrails VALUES("92","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-13 14:10:46");
INSERT INTO atrails VALUES("93","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-14 22:05:12");
INSERT INTO atrails VALUES("94","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-14 22:32:04");
INSERT INTO atrails VALUES("95","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-14 22:52:04");
INSERT INTO atrails VALUES("96","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-16 12:03:35");
INSERT INTO atrails VALUES("97","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-17 21:58:00");
INSERT INTO atrails VALUES("98","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-17 22:17:45");
INSERT INTO atrails VALUES("99","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-17 22:27:18");
INSERT INTO atrails VALUES("100","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-18 17:16:35");
INSERT INTO atrails VALUES("101","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-18 18:03:54");
INSERT INTO atrails VALUES("102","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-18 18:15:27");
INSERT INTO atrails VALUES("103","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","127.0.0.1","2021-04-18 19:40:37");
INSERT INTO atrails VALUES("104","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","127.0.0.1","2021-04-18 19:40:37");
INSERT INTO atrails VALUES("105","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-18 19:45:53");
INSERT INTO atrails VALUES("106","student","Log In","Staff ID, student logged In","::1","2021-04-20 15:33:57");
INSERT INTO atrails VALUES("107","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","::1","2021-04-20 15:54:36");
INSERT INTO atrails VALUES("108","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-21 14:27:48");
INSERT INTO atrails VALUES("109","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","127.0.0.1","2021-04-21 14:48:00");
INSERT INTO atrails VALUES("110","admin","Log In","Staff ID, admin logged In","::1","2021-04-22 02:17:42");
INSERT INTO atrails VALUES("111","student","Log In","Staff ID, student logged In","127.0.0.1","2021-04-22 02:18:18");
INSERT INTO atrails VALUES("112","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","127.0.0.1","2021-04-22 02:46:30");
INSERT INTO atrails VALUES("113","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-22 02:58:03");
INSERT INTO atrails VALUES("114","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-22 03:55:10");
INSERT INTO atrails VALUES("115","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-04-22 03:55:36");
INSERT INTO atrails VALUES("116","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-04-22 09:24:31");
INSERT INTO atrails VALUES("117","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-04-22 13:36:35");
INSERT INTO atrails VALUES("118","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-30 11:44:37");
INSERT INTO atrails VALUES("119","admin","Student Creation","Student Has Been Activated Successfully. 
<b>STUDENT NAME:</b> Felix Bosompem
 <b>STUDENT ID:</b> student","127.0.0.1","2021-04-30 11:48:34");
INSERT INTO atrails VALUES("120","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-30 22:08:31");
INSERT INTO atrails VALUES("121","student","Log In","Staff ID, student logged In","::1","2021-04-30 22:17:00");
INSERT INTO atrails VALUES("122","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","::1","2021-04-30 22:37:55");
INSERT INTO atrails VALUES("123","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-30 22:44:12");
INSERT INTO atrails VALUES("124","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-04-30 22:44:40");
INSERT INTO atrails VALUES("125","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-04-30 23:12:13");
INSERT INTO atrails VALUES("126","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-01 08:36:51");
INSERT INTO atrails VALUES("127","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-01 08:36:57");
INSERT INTO atrails VALUES("128","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-01 09:47:02");
INSERT INTO atrails VALUES("129","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-01 10:42:21");
INSERT INTO atrails VALUES("130","student","Log In","Staff ID, student logged In","::1","2021-05-01 10:47:05");
INSERT INTO atrails VALUES("131","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-01 11:02:21");
INSERT INTO atrails VALUES("132","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","::1","2021-05-01 11:07:20");
INSERT INTO atrails VALUES("133","SYSTEM","Signed Out","Staff ID, student Has Been Signed Out","::1","2021-05-01 23:46:49");
INSERT INTO atrails VALUES("134","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-03 01:56:07");
INSERT INTO atrails VALUES("135","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-03 02:52:36");
INSERT INTO atrails VALUES("136","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-03 16:06:40");
INSERT INTO atrails VALUES("137","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-03 17:21:06");
INSERT INTO atrails VALUES("138","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-03 17:21:13");
INSERT INTO atrails VALUES("139","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-03 17:22:18");
INSERT INTO atrails VALUES("140","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-04 20:25:50");
INSERT INTO atrails VALUES("141","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-04 20:28:35");
INSERT INTO atrails VALUES("142","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-04 20:28:58");
INSERT INTO atrails VALUES("143","admin","Log In","Staff ID, admin logged In","::1","2021-05-04 21:04:07");
INSERT INTO atrails VALUES("144","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-04 21:05:24");
INSERT INTO atrails VALUES("145","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-04 21:08:39");
INSERT INTO atrails VALUES("146","student","Log In","Staff ID, student logged In","127.0.0.1","2021-05-04 21:16:47");
INSERT INTO atrails VALUES("147","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-05-04 21:27:13");
INSERT INTO atrails VALUES("148","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-12 09:03:22");
INSERT INTO atrails VALUES("149","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-12 09:50:06");
INSERT INTO atrails VALUES("150","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-12 10:10:12");
INSERT INTO atrails VALUES("151","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-12 10:30:18");
INSERT INTO atrails VALUES("152","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-12 15:27:36");
INSERT INTO atrails VALUES("153","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","127.0.0.1","2021-05-12 15:47:36");
INSERT INTO atrails VALUES("154","admin","Log In","Staff ID, admin logged In","::1","2021-05-13 12:15:55");
INSERT INTO atrails VALUES("155","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-05-13 12:36:13");
INSERT INTO atrails VALUES("156","admin","Log In","Staff ID, admin logged In","::1","2021-05-13 13:33:32");
INSERT INTO atrails VALUES("157","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-05-13 13:59:13");
INSERT INTO atrails VALUES("158","SYSTEM","Signed Out","Staff ID, admin Has Been Signed Out","::1","2021-05-13 15:39:59");
INSERT INTO atrails VALUES("159","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-28 06:36:55");
INSERT INTO atrails VALUES("160","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-28 06:46:53");
INSERT INTO atrails VALUES("161","admin","Log In","Staff ID, admin logged In","127.0.0.1","2021-05-28 06:48:01");



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



CREATE TABLE `exam_qxtns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sbjid` varchar(50) NOT NULL,
  `qxtn` text NOT NULL,
  `answer` varchar(100) NOT NULL,
  `imgurl` varchar(100) NOT NULL,
  `sectiontype` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO exam_qxtns VALUES("6","SBJ002","<p>Please Identify the <strong>IMAGE </strong>below</p>

<p>a. School proo</p>

<p>b. Sikasane</p>

<p>c. Hwemudua</p>
","A","assets/data/questions/20210422030530.jpg","Objectives","Active");
INSERT INTO exam_qxtns VALUES("7","SBJ002","<p>Ghana is located in the southern part of Africa</p>

<p>a. True</p>

<p>b. False</p>
","B","","Objectives","Active");
INSERT INTO exam_qxtns VALUES("8","SBJ002","<p>People living in America are called</p>

<p>a. Ghanaians</p>

<p>b. Ugandans</p>

<p>c. Americans</p>
","C","","Objectives","Active");
INSERT INTO exam_qxtns VALUES("9","SBJ002","<p>Design Water formation process diagram</p>
","Practical","","Practical","Active");
INSERT INTO exam_qxtns VALUES("10","SBJ002","<p>List the importance Of Water to the human body</p>
","Theory","","Theory","Active");
INSERT INTO exam_qxtns VALUES("11","SBJ002","<p>State the Lord&#39;s prayer</p>
","Theory","assets/data/questions/20210422030910.jpg","Theory","Active");
INSERT INTO exam_qxtns VALUES("13","SBJ002","<p>Describe the image above</p>

<p>a. Nothing</p>

<p>b. Something</p>

<p>c. Anything</p>
","A","assets/data/questions/20210501092702.jpg","Objectives","Active");



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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO message VALUES("1","MHC/STF/2021/0003","Payment Voucher With PV ID, 20210324151233 Is Pending Your Approval","Payment Voucher Approval","Inactive","2021-03-24 15:20:51","0000-00-00");
INSERT INTO message VALUES("2","MHC/STF/2021/0001","ytyutryurtyrytr","MEMO: Staff Meeting","Active","2021-03-25 19:58:06","0000-00-00");
INSERT INTO message VALUES("3","MHC/STF/2021/0003","ytyutryurtyrytr","MEMO: Staff Meeting","Inactive","2021-03-25 19:58:06","0000-00-00");
INSERT INTO message VALUES("4","MHC/STF/2021/0003","gfghfhg","MEMO: uyiuyui","Inactive","2021-03-25 19:58:25","0000-00-00");
INSERT INTO message VALUES("5","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 07:28:31","0000-00-00");
INSERT INTO message VALUES("6","MHC/STF/2021/0001","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Active","2021-03-31 21:11:54","0000-00-00");
INSERT INTO message VALUES("7","MHC/STF/2021/0001","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Active","2021-03-31 21:12:03","0000-00-00");
INSERT INTO message VALUES("8","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:13:48","0000-00-00");
INSERT INTO message VALUES("9","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:18:27","0000-00-00");
INSERT INTO message VALUES("10","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:18:53","0000-00-00");
INSERT INTO message VALUES("11","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:30:16","0000-00-00");
INSERT INTO message VALUES("12","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:32:02","0000-00-00");
INSERT INTO message VALUES("13","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:32:16","0000-00-00");
INSERT INTO message VALUES("14","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:36:38","0000-00-00");
INSERT INTO message VALUES("15","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:37:16","0000-00-00");
INSERT INTO message VALUES("16","MHC/STF/2021/0002","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Inactive","2021-03-31 21:37:24","0000-00-00");
INSERT INTO message VALUES("17","MHC/STF/2021/0001","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Active","2021-04-01 10:33:16","0000-00-00");
INSERT INTO message VALUES("18","MHC/STF/2021/0001","Your Access Rights Has Been Reviewed. Please Check Your New Roles","Access Rights Reviewed","Active","2021-04-01 10:34:21","0000-00-00");
INSERT INTO message VALUES("19","admin","Payment Voucher With PV ID, 20210402190556 Is Pending Your Approval","Payment Voucher Approval","Inactive","2021-04-02 20:49:14","0000-00-00");
INSERT INTO message VALUES("20","admin","Payment Voucher, 20210402190556 Has Been Approved By The Finance Director, Felix Bosompem","Payment Voucher Approval","Inactive","2021-04-02 20:52:49","0000-00-00");
INSERT INTO message VALUES("21","admin","Payment Voucher, 20210324151233 Has Been Approved By The Finance Director, Felix Bosompem","Payment Voucher Approval","Inactive","2021-04-02 20:55:36","0000-00-00");



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO payslip VALUES("1","MHC/STF/2021/0001","Basic","Basic","1000.00","Active");
INSERT INTO payslip VALUES("2","MHC/STF/2021/0001","Clothing Allowance","Earning","500.00","Active");
INSERT INTO payslip VALUES("3","MHC/STF/2021/0001","Income Tax","Deduction","75.00","Active");
INSERT INTO payslip VALUES("4","MHC/STF/2021/0002","Basic","Basic","1000.00","Active");
INSERT INTO payslip VALUES("5","MHC/STF/2021/0002","Clothing Allowance","Earning","100.00","Active");
INSERT INTO payslip VALUES("6","MHC/STF/2021/0002","Income Tax","Deduction","75.00","Active");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO payslipsummary VALUES("1","MHCSTF20210001/2021/0001","MHC/STF/2021/0001","1000.00","75.00","0.00","1500.00","2021-03-24","2021-03-24","Approved","2021-03-24 14:56:27");
INSERT INTO payslipsummary VALUES("2","MHCSTF20210001/2021/0002","MHC/STF/2021/0001","1000.00","75.00","0.00","1500.00","2021-03-31","2021-03-31","Approved","2021-03-31 21:47:28");
INSERT INTO payslipsummary VALUES("3","MHCSTF20210002/2021/0001","MHC/STF/2021/0002","1000.00","75.00","0.00","1100.00","2021-03-31","2021-03-31","Approved","2021-03-31 21:47:28");



CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`post`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO positions VALUES("1","Group CEO","Active");



CREATE TABLE `pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_id` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `exp_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO pv VALUES("1","20210324151233","Testing","500.00","2021-03-24","");
INSERT INTO pv VALUES("2","20210324151233","Testing 2","400.00","2021-03-24","");
INSERT INTO pv VALUES("3","20210324151234","bed","450.00","2021-03-24","");
INSERT INTO pv VALUES("4","20210324151236","mob","200.00","2021-03-24","");
INSERT INTO pv VALUES("5","20210402190556","testing 1","100.00","2021-04-02","");
INSERT INTO pv VALUES("6","20210402190556","testing 2","200.00","2021-04-02","");



CREATE TABLE `pv_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pv_id` varchar(50) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `accounts` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pv_comment VALUES("1","20210402190556","","","");
INSERT INTO pv_comment VALUES("2","20210324151233","","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO pv_detail VALUES("1","20210324151233","EXP-111","BS-112","","2021-03-24 15:12:33","17.50","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","IT Assets","900.00","2021-04-02 20:55:36","admin","1","no","cedis","1.00000","Approved");
INSERT INTO pv_detail VALUES("2","20210324151234","EXP-111","BS-112","","2021-03-24 15:12:34","0.00","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","ivy tesu","450.00","0000-00-00 00:00:00","","0","no","cedis","1.00000","Pending");
INSERT INTO pv_detail VALUES("3","20210324151236","EXP-111","BS-112","","2021-03-24 15:12:36","0.00","Medical","MHC/STF/2021/0003","ENGLISH","MHC/STF/2021/0001","melcom","200.00","0000-00-00 00:00:00","","0","no","cedis","1.00000","Pending");
INSERT INTO pv_detail VALUES("4","20210402190556","EXP-111","BS-141","","2021-04-02 19:05:56","0.00","Medical","admin","ENGLISH","MHC/STF/2021/0001","IT Assets","300.00","2021-04-02 20:52:49","admin","2","no","cedis","1.00000","Approved");



CREATE TABLE `pvdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `pv_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO pvdoc VALUES("1","81594.837441616.pdf","20210324151233(1)","20210324151233");
INSERT INTO pvdoc VALUES("2","_MG_9904.jpg","20210402190556(1)","20210402190556");
INSERT INTO pvdoc VALUES("3","GKS 9A.pdf","20210402190556(2)","20210402190556");



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
  `hostel` varchar(20) NOT NULL,
  PRIMARY KEY (`stfid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO staff VALUES("1","admin","Mr","Felix","Bosompem","Male","assets/data/staff/20210212094652.jpg","0268640343","felix.niamah@vokacom.net","Administrator","2021-02-20","Active","2021-02-20","Dansoman","Lecturer","Administrator","Administrator","Director","Adminstrator","Administrator","Administrator","Adminstrator","Manager","Adminstrator");



CREATE TABLE `std_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stdid` varchar(40) NOT NULL,
  `sbjid` varchar(20) NOT NULL,
  `exam_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ecomment` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

INSERT INTO std_exams VALUES("38","MHC/CSR001/2021/03/0002","SBJ001","0.00","","Pending");
INSERT INTO std_exams VALUES("39","MHC/CSR001/2021/03/0002","SBJ002","0.00","","Pending");
INSERT INTO std_exams VALUES("41","MHC/CSR001/2021/03/0001","SBJ001","0.00","","Pending");
INSERT INTO std_exams VALUES("42","MHC/CSR001/2021/03/0001","SBJ002","69.78","","Pending");
INSERT INTO std_exams VALUES("43","student","SBJ001","0.00","","Pending");
INSERT INTO std_exams VALUES("44","student","SBJ002","0.00","","Pending");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO std_intern VALUES("4","MHC/CSR001/2021/03/0002","2","2021-03-31","2021-03-31","ABRAHAM SARCOH","0268640343","Pending");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO stf_sbj VALUES("1","SBJ001","MHC/STF/2021/0001","Active");
INSERT INTO stf_sbj VALUES("2","SBJ002","MHC/STF/2021/0001","Active");
INSERT INTO stf_sbj VALUES("3","SBJ002","MHC/STF/2021/0002","Active");
INSERT INTO stf_sbj VALUES("4","SBJ001","admin","Active");
INSERT INTO stf_sbj VALUES("5","SBJ002","admin","Active");



CREATE TABLE `stfpayslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slipid` varchar(50) NOT NULL,
  `stfid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dvalue` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO stfpayslip VALUES("4","MHCSTF20210001/2021/0002","MHC/STF/2021/0001","Basic","Basic","1000.00");
INSERT INTO stfpayslip VALUES("5","MHCSTF20210001/2021/0002","MHC/STF/2021/0001","Income Tax","Deduction","75.00");
INSERT INTO stfpayslip VALUES("6","MHCSTF20210001/2021/0002","MHC/STF/2021/0001","Clothing Allowance","Earning","500.00");
INSERT INTO stfpayslip VALUES("7","MHCSTF20210002/2021/0001","MHC/STF/2021/0002","Basic","Basic","1000.00");
INSERT INTO stfpayslip VALUES("8","MHCSTF20210002/2021/0001","MHC/STF/2021/0002","Income Tax","Deduction","75.00");
INSERT INTO stfpayslip VALUES("9","MHCSTF20210002/2021/0001","MHC/STF/2021/0002","Clothing Allowance","Earning","100.00");



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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO student_invoices VALUES("26","INV/2021/0001","MHC/CSR001/2021/03/0001","2021-05-13","500.00","0.00","Pending","2021-05-13 13:38:57","2021");
INSERT INTO student_invoices VALUES("27","INV/2021/0002","MHC/CSR001/2021/03/0002","2021-05-13","500.00","0.00","Pending","2021-05-13 13:38:57","2021");
INSERT INTO student_invoices VALUES("28","INV/2021/0003","student","2021-05-13","500.00","0.00","Pending","2021-05-13 13:38:57","2021");



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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO students VALUES("14","MHC/CSR001/2021/03/0001","BT/20210324/20210324","Prince","Bosompem","Male","assets/data/students/20210329141328.jpg","0277474247","felix.niamah@vokacom.net","Full time","CSR001","2021","Hostel","2021-03-29","Active","2021-03-29","Dansoman","600.00","0","Morning");
INSERT INTO students VALUES("15","MHC/CSR001/2021/03/0002","BT/20210324/20210324","Reniel","Niamah","Female","assets/data/students/20210329141427.jpg","0245895326","sara@gh.com","Full time","CSR001","2021","Hostel","2021-03-29","Graduated","2021-03-29","Dansoman","600.00","0","Morning");
INSERT INTO students VALUES("16","student","BT/20210324/20210324","Mercy","Manu","Female","assets/images/defaults/avatar.png","saas","sdas","Full time","CSR001","2021","Hostel","2021-04-02","Active","2021-04-02","fsfsa","600.00","0","Morning");



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

INSERT INTO taxconfig VALUES("1","VAT","Value Added Tax","0.036","Active");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","admin","Felix","Niamah","assets/data/users/avatar.png","$argon2i$v=19$m=65536,t=4,p=1$VjQxL2EyMDZuLm9YLmgxOQ$RBt+flkNEES0tNNFhfa/mJBOsYyl7mMhGjWegZomk48","Active","User","staff","2021-05-28 06:48:01","http://localhost/mednet/dashboard.php");
INSERT INTO users VALUES("17","student","Mercy","Manu","assets/images/defaults/avatar.png","$argon2i$v=19$m=65536,t=4,p=1$bnp6SUtvTnJ4SGY1OEFqcw$8d4A9jtLzLudm+LyU+MsHr/3C2cVSfQkjcnLdlPH06A","Active","student","student","2021-05-01 10:47:05","http://localhost/student_portal/dashboard.php");

