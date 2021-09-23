<?php
include ("../connection/functions.php");
$ddate=date("Y-m-d");
//FOR CALCULATING THE START AND END DATES FOR ANNUAL LEAVE
if(isset($_POST['lvdays'])){
	$StDate = $_POST['stdate'];
    $days=$_POST['lvdays'];
	$lvtype=$_POST['type'];
	$startDate=date($StDate);
	$lvdays="";//This will contain the

    //check the difference in the dates
    $currdate=date("Y-m-d");
    $daysdiff=calc_date_diff($currdate,$StDate);
    $comment="";
	if($lvtype=="Annual"){
        if($days <= 4 && $daysdiff >=2){
            $comment="OK";
        }elseif($days == 5 && $daysdiff >=7){
            $comment="OK";
        }elseif($days > 5 && $daysdiff >=14){
            $comment="OK";
        }elseif($days <= 4 && $daysdiff < 2){
            $comment="You Should Give Two Days Notice To Your Supervisor";
        }
        elseif($days == 5 && $daysdiff < 7){
            $comment="You Should Give Seven Days Notice To Your Supervisor";
        }elseif($days > 5 && $daysdiff < 14){
            $comment="You Should Give Fourteen Days Notice To Your Supervisor";
        }
		$lvdays=$days;
	}
	elseif($lvtype=="Maternity"){
		$lvdays=88;
        $comment="OK";
	}
	elseif($lvtype=="Paternity"){
		$lvdays=10;
        $comment="OK";
	}
	elseif($lvtype=="Study"){
		$lvdays=5;
        $comment="OK";
	}
	else{
		$lvdays=1;
        $comment="OK";
	}
		$d = new DateTime( $startDate );
		$t = $d->getTimestamp();

		
		// loop for X days
		for($i=0; $i < ($lvdays - 1); $i++){

			// add 1 day to timestamp
			$addDay = 86400;

			// get what day it is next day
			$nextDay = date('w', ($t+$addDay));
			$cdate = date('Y-m-d', ($t+$addDay));

			// if it's Saturday or Sunday get $i-1
			if($nextDay == 0 || $nextDay == 6) {
				$i--;
			}

			// modify timestamp, add 1 day
			$t = $t+$addDay;
		}

		$d->setTimestamp($t);
		 $eDate=$d->format('Y-m-d');
		
		$resumedDateCalc=strtotime(date($eDate)) + 86400;
		
		///////
		$resDay = date('w', ($resumedDateCalc));

			// if it's Saturday or Sunday get $i-1
			if($resDay == 6) {
				$res = $resumedDateCalc + 172800;
			}
			else{
				$res = $resumedDateCalc;
			}

			$resDate=date("Y-m-d",$res);
		
	//PARSING THE RESULT INTO A JSON OBJECT
	$response['rsdate'] = $eDate;
	$response['rsend'] =  $resDate;
    $response['comment'] =  $comment;
	print json_encode($response);
	
}

if(isset($_POST['leaveType'])){
	$StDate = $_POST['stdate'];
    $lvtype=$_POST['leaveType'];
	$lvdays=0;
	if($lvtype=="Maternity"){
		$lvdays=88;
	}else{
		$lvdays=10;
	}
	
	$startDate=date($StDate);

    $d = new DateTime( $startDate );
    $t = $d->getTimestamp();

	
    // loop for X days
    for($i=0; $i < ($lvdays - 1); $i++){

        // add 1 day to timestamp
        $addDay = 86400;

        // get what day it is next day
        $nextDay = date('w', ($t+$addDay));

        // if it's Saturday or Sunday get $i-1
        if($nextDay == 0 || $nextDay == 6) {
            $i--;
        }

        // modify timestamp, add 1 day
        $t = $t+$addDay;
    }

    $d->setTimestamp($t);
	 $eDate=$d->format('Y-m-d');
	
	$resumedDateCalc=strtotime(date($eDate)) + 86400;
	
	///////
	$resDay = date('w', ($resumedDateCalc));

        // if it's Saturday or Sunday get $i-1
        if($resDay == 6) {
            $res = $resumedDateCalc + 172800;
        }
		else{
			$res = $resumedDateCalc;
		}

        $resDate=date("Y-m-d",$res);
	
//PARSING THE RESULT INTO A JSON OBJECT
$response['rsdate'] = $eDate;
$response['rsend'] =  $resDate;
print json_encode($response);
}

if(isset($_POST['contact'])){
	$cont= $_POST['contact'];
	if(!is_numeric($cont) or strlen($cont) < 12){
		$response['response'] = "Invalid";
	}
	else{
		$response['response'] = "Valid";
	}
	print json_encode($response);
}




if(isset($_POST['medAmount'])){
	$amount= $_POST['medAmount'];
	if(!is_numeric($cont)){
		$response['response'] = "Invalid";
	}
	else{
		$response['response'] = "Valid";
	}
	print json_encode($response);
}

//FOR VALIDATING THE MEDICAL RECORD
if(isset($_POST['amount'])){

$response['rsend'] =  false;
print json_encode($response);
}



?>