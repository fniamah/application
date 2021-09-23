<?php
session_start();
date_default_timezone_set('Europe/London');
//DATABASE CONNECTION CLASS DECLARATION
//ERROR CODES
//100 = FILE UPLOAD ERROR
//200= JSON ERROR
//300= KAIROS API CANNOT BE REACHED
//VARIABLES


$authentic="";//getting the response of every transaction
$errorMsg="";//Message to display when there is an error
$currDateTime=date("YmdHis");
$currDate=date("Ymd");
$ddate=date("Y-m-d");
$dtime=(strtotime(date("H:i:s"))-3600);//getting the strtotime of the current time
$timereal=date("H:i:s",$dtime);
$dateTime=date("Y-m-d H:i:s");
$Currmonth=date("m");
$Curryear=date("Y");
$test="";
$exist="";
$usrIP=$_SERVER['REMOTE_ADDR'];
////INCLUDE FILES
include ("functions.php");//contains all function


//USER LOG IN
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
    $password = mysqli_real_escape_string($dbconnection, $_POST['pword']);
    $job_id = mysqli_real_escape_string($dbconnection, $_POST['job_id']);
    $qry = "SELECT * FROM career_reg WHERE email='$username' AND pword='$password' AND status='Active'";
    $qryRun = $conn->query($dbconnection, $qry);

    if ($conn->sqlnum($qryRun) == 1) {
        $_SESSION['staff_id'] = $username;
        $_SESSION['job_id'] = $job_id;

        header("location: dashboard.php");
        exit(0);
    }
    else {
        $authentic = "no";
        $msg = "Wrong Login Username And/Or Password";
    }
}

	
		
?>