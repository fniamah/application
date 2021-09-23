<?php
include("../connection/functions.php");
$currDateTime=date("YmdHis");
$currDate=date("Ymd");
$ddate=date("Y-m-d");
$dtime=(strtotime(date("H:i:s"))-3600);//getting the strtotime of the current time
$timereal=date("H:i:s",$dtime);
$dateTime=date("Y-m-d H:i:s");
$Currmonth=date("m");
$Curryear=date("Y");
$Currday = date("d");

$check_validity = check_validity();
$check_begin_of_yr = date("z");
//CODE TO RUN AT THE BEGINNING OF EACH YEAR
if($check_begin_of_yr === '0'){
	
	//UPDATE ALL STAFF LEAVE DAYS TO 24 
	$updstf="UPDATE staff_rec SET leave_days=24 WHERE status !='Detached'";
    $conn->query($dbconnection,$updstf);
	
	//Create d medical records records
	$creat="SELECT voka_id FROM staff_rec WHERE status !='Detached'";
	$createQry=$conn->query($dbconnection,$creat);
	$count=0;

	while($list=$conn->fetch($createQry)){
		$count++;
		$ID=$list['voka_id'];
		$inpatient="INSERT INTO medpolicy SET user='staff', voka_id='$ID', year='$Curryear', init_amount=70000.00, balance=70000.00, type='In Patient', status='Active'";
		$conn->query($dbconnection,$inpatient);

		$outpatient="INSERT INTO medpolicy SET user='staff', voka_id='$ID', year='$Curryear', init_amount=5000.00, balance=5000.00, type='Out Patient', status='Active'";
		$conn->query($dbconnection,$outpatient);

		$depinpatient="INSERT INTO medpolicy SET user='dependant', voka_id='$ID', year='$Curryear', init_amount=70000.00, balance=70000.00, type='In Patient', status='Active'";
		$conn->query($dbconnection,$depinpatient);

		$depoutpatient="INSERT INTO medpolicy SET user='dependant', voka_id='$ID', year='$Curryear', init_amount=5000.00, balance=5000.00, type='Out Patient', status='Active'";
		$conn->query($dbconnection,$depoutpatient);
	}
	//Inserting the total contribution
	$calctot=$count * 2000;
	$stfincont="INSERT INTO medcontribution SET type='In Patient', user='staff', total=$calctot, year=$Curryear";
	$conn->query($dbconnection,$stfincont);
	$stfoutcont="INSERT INTO medcontribution SET type='Out Patient', user='staff', total=$calctot, year=$Curryear";
	$conn->query($dbconnection,$stfoutcont);
	$depincont="INSERT INTO medcontribution SET type='In Patient', user='dependant', total=$calctot, year=$Curryear";
	$conn->query($dbconnection,$depincont);
	$depoutcont="INSERT INTO medcontribution SET type='In Patient', user='staff', total=$calctot, year=$Curryear";
	$conn->query($dbconnection,$depoutcont);
}

//RUN DAILY TASKS
if($check_validity =="1"){
	//SYSTEM AUDIT TRAIL
	$event="Daily Setup Accomplished By System";
	$aud="INSERT INTO atrails SET usr='SYSTEM', module='daily check', event='$event'";
	$conn->query($dbconnection,$aud);
	
	//Deactivates All Staff Whose Leaves Begin Today
	$lvqry="SELECT voka_id, leaveID FROM staff_leave WHERE startDate='$ddate' AND status='Authorized'";
	$lvrun=$conn->query($dbconnection,$lvqry);
	while($lvdata=$conn->fetch($lvrun)){
		$lvVoka=$lvdata['voka_id'];
		$lvid=$lvdata['leaveID'];
		//Deactivate
		$deact="UPDATE staff_rec SET status='Inactive' WHERE voka_id='$lvVoka'";
		$conn->query($dbconnection,$deact);

		$lvrec="UPDATE staff_leave SET status='Proceeded' WHERE leaveID='$lvid'";
		$conn->query($dbconnection,$lvrec);
	}
	
	//Activates All Staff Who Resumes For Leave Today
	$lvqry="SELECT leaveID, voka_id FROM staff_leave WHERE resumedDate='$ddate' AND status='Proceeded'";
	$lvrun=$conn->query($dbconnection,$lvqry);
	while($lvdata=$conn->fetch($lvrun)){
		$lvVoka=$lvdata['voka_id'];
		$lvid=$lvdata['leaveID'];
		//Deactivate
		$act="UPDATE staff_rec SET status='Active' WHERE voka_id='$lvVoka'";
		$conn->query($dbconnection,$act);

		$updlv="UPDATE staff_leave SET status='Completed' WHERE leaveID='$lvid'";
		$conn->query($dbconnection,$updlv);
	}
	
	//CREATE CLOCK IN AND OUT RECORDS
	$getstaffQry="SELECT staff_id FROM staff_rec WHERE status='Active'";
	$getstaffQryRun=$conn->query($dbconnection,$getstaffQry);
	while($row=$conn->fetch($getstaffQryRun)){
		$stf_id=$row['staff_id'];
		$insQry="INSERT INTO clock_in SET staff_id='$stf_id', status='absent', date='$ddate', penalty=50";
		$conn->query($dbconnection,$insQry);
		//CREATE THE CLOCK OUT DETAILS OF THE STAFF
		$outQry="INSERT INTO clockout SET staff_id='$stf_id', status='unsigned', date='$ddate', penalty=50";
		$conn->query($dbconnection,$outQry);
	}
	
	//OFFSETTING THE CLOCKIN / CLOCKOUT PENALTY OF STAFF WHO HAVE SOUGHT PERMISSION
	$offQry="SELECT * FROM permit WHERE date='$ddate' AND status='Approved'";
	$offQryRun=$conn->query($dbconnection,$offQry);
	while($offData=$conn->fetch($offQryRun)){
		$staffID=$offData['voka_id'];
		$type=$offData['type'];
		$ddate=$offData['date'];

		if($type="clock_in"){
			$updclock="UPDATE clock_in SET penalty=0, status='present', altered='yes', reason='Permission Granted', init_amnt=50 WHERE staff_id='$staffID' AND date='$ddate'";
			$conn->query($dbconnection,$updclock);
		}
		elseif($type=="clockout"){
			$updclock="UPDATE clockout SET penalty=0, status='signed', altered='yes', reason='Permission Granted', init_amnt=50 WHERE staff_id='$staffID' AND date='$ddate'";
			$conn->query($dbconnection,$updclock);
		}
		else{
			//UPDATE THE CLOCKIN DETAILS
			$updclock="UPDATE clock_in SET penalty=0, status='present', altered='yes', reason='Permission Granted', init_amnt=50 WHERE staff_id='$staffID' AND date='$ddate'";
			$conn->query($dbconnection,$updclock);

			//UPDATE THE CLOCKOUT DETAILS
			$updclock2="UPDATE clockout SET penalty=0, status='signed', altered='yes', reason='Permission Granted', init_amnt=50 WHERE staff_id='$staffID' AND date='$ddate'";
			$conn->query($dbconnection,$updclock2);
		}
	}
	
	//SEND BIRTHDAY NOTIFICATION TO ALL YOUR STAFF
	$bdaycalc = date("m-d");
	$bday = "SELECT fst_name, lst_name, dob, voka_id FROM biodata WHERE status = 'Active' AND dob LIKE '%$bdaycalc' ";
	$bdayrun = $conn->query($dbconnection,$bday);
	while($data = $conn->fetch($bdayrun)){
		$fname = $data['fst_name'];
		$lname = $data['lst_name'];
		$vokaid = $data['voka_id'];
		$dob= $data['dob'];
		//SET staff bday record in table
		$brec="INSERT INTO bdayrec SET voka_id='$vokaid', tone=1, bdate='$ddate'";
		$conn->query($dbconnection,$brec);
		
		$bdaymsg = "Hip! Hip!! Hip!!! Hurray. Today is the birthday of ".$fname." ".$lname.". Kindly extend your warm wishes"; //Birthday Wishes
		/*ACTIVATE THE BIRTHDAY SONG FOR THE STAFF
		$updbday ="UPDATE biodata SET tone = 1 WHERE voka_id ='$vokaid'";
		$conn->query($dbconnection,$updbday);*/
		
		//	SEND BDAY NOTIFICATION TO ALL STAFF
		$notstf="SELECT voka_id FROM staff_rec WHERE status !='Detached' AND voka_id !='$vokaid'";
		$notstfrun=$conn->query($dbconnection,$notstf);
		while($stfdata = $conn->fetch($notstfrun)){
			$stvoka = $stfdata['voka_id'];
			$msgqry="INSERT INTO message SET voka_id='$stvoka', message='$bdaymsg', caption='HAPPY BIRTHDAY', status='Active'";
			$conn->query($dbconnection,$msgqry);
		}
	}
}

function check_validity(){
//Getting the public address of the company network
    $header=$_SERVER['REMOTE_ADDR'];
    $ip = explode('.',$header);
    $netConn="";
	$day = date("l");
    /*if($ip[0]==41 and $ip[1]==189  and $ip[2]==173 and $ip[3]==18 || $ip[3]==19 || $ip[3]==20 || $ip[3]==21 and $day<>"Saturday" and $day<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
            $netConn="allowed";
    }*/
    if($day<>"Saturday" and $day<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
        $netConn="1";
    }

    else{
        $netConn="0";
    }
    return $netConn;
}
?>