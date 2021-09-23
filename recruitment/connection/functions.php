<?php
class Db_connect{
	private $lhost="localhost";
	private $user="root";
	private $pword="matter";
	private $db="hwemudua";
	
	public function conn(){
		try{
			$conn=mysqli_connect($this->lhost,$this->user,$this->pword,$this->db);
		if(!$conn){
			throw new Exception("Database Connection Error");
			}
			else{
				return $conn;
				}
			}
			catch(Exception $ex){
				echo $ex->getMessage();
				}
		}
		
		//QUERY STRING
	public function query($con,$queryString){
		try{
			if(!empty($queryString)){
				return mysqli_query($con,$queryString);
				}
				else{
					throw new Exception("You Are Submitting An Empty Query");
					}
			
			}
			catch(Exception $ex){
				echo $ex->getMessage();
				}
		
		}
		//FETCHING FROM DATABASE
	public function fetch($mysqli_num_rowsqry){
		return mysqli_fetch_assoc($mysqli_num_rowsqry);
		}
		//SQL NUM
		public function sqlnum($num){
			return mysqli_num_rows($num);
		}
}
$conn=new Db_connect;
$dbconnection=$conn->conn();



//SMS FUNCTION
function Send_SMS($msisdn,$msg,$shortcode){
  $wsdl = 'https://mtn.tekhype.com/ServiceAPIs.asmx?wsdl';
  $trace = true;
  $exceptions = true;
  $xml_array=array();
  $xml_array['MSISDN'] = $msisdn;
  $xml_array['ShortCode'] = $shortcode;
  $xml_array['SMSMessage'] = $msg;
  $xml_array['Username'] = "jss";
  $xml_array['Password'] = "ssjMedia";
  $xml_array['MNC'] = "";

  try
  {
     $client = new SoapClient($wsdl, array('trace' => $trace, 'exceptions' => $exceptions));
     $response = $client->SendSMS($xml_array);
	 print json_encode($xml_array);
     return $response;
  }
  catch (Exception $e)
  {
     return  $client->__getLastResponse();
  }
}

//HOLIDAY CHECK
function chkholiday($hdate){
	$resp="";
	$sel="SELECT * FROM holidays WHERE date='$hdate'";
	$selrun=$conn->query($dbconnection,$sel);
	if($conn->sqlnum($selrun)==0){
		$resp= "no";
	}else{
		$resp= "yes";
	}
	return $resp;
}
//function for making Kairos calls
function KairosCall($img){
	//KAIROS CREDENTIALS
	$gallery_name="myGallery";
    $APP_ID = 'ce38fef4';
    $APP_KEY = 'a06ef90265f663a434203d3506165257';
    $API_URL = 'https://api.kairos.com';
	$response="";
		$queryUrl = $API_URL . "/recognize";
		$request = curl_init($queryUrl);
		$request_params = array(
		"image"  =>  $img,
		"gallery_name" => $gallery_name
		);
		curl_setopt($request, CURLOPT_POST, true);
		curl_setopt($request,CURLOPT_POSTFIELDS, json_encode($request_params));
		curl_setopt($request, CURLOPT_HTTPHEADER, array(
		"Content-type: application/json",
		"app_id:" . $APP_ID,
		"app_key:" . $APP_KEY
		)
		);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($request);
		curl_close($request);
	return $response;
}

//ENROLL IMAGE
function enrollUser($img,$img2,$img3,$sbjId1,$sbjId2,$sbjId3){
    //KAIROS CREDENTIALS
    $gallery_name="myGallery";
    $APP_ID = 'ce38fef4';
    $APP_KEY = 'a06ef90265f663a434203d3506165257';
    $API_URL = 'https://api.kairos.com';
    $response="";
    $queryUrl = $API_URL . "/enroll";
    $request = curl_init($queryUrl);
    $request_params = array(
        "image"  =>  $img,
        "subject_id"=>$sbjId1,
        "gallery_name"=> $gallery_name
    );
    curl_setopt($request, CURLOPT_POST, true);
    curl_setopt($request,CURLOPT_POSTFIELDS, json_encode($request_params));
    curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json",
            "app_id:" . $APP_ID,
            "app_key:" . $APP_KEY
        )
    );
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($request);
    curl_close($request);

    //Enroll Image2
    $request = curl_init($queryUrl);
    $request_params = array(
        "image"  =>  $img2,
        "subject_id"=>$sbjId2,
        "gallery_name"=> $gallery_name
    );
    curl_setopt($request, CURLOPT_POST, true);
    curl_setopt($request,CURLOPT_POSTFIELDS, json_encode($request_params));
    curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json",
            "app_id:" . $APP_ID,
            "app_key:" . $APP_KEY
        )
    );
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_exec($request);
    curl_close($request);

    //Enroll Image3
    $request = curl_init($queryUrl);
    $request_params = array(
        "image"  =>  $img3,
        "subject_id"=>$sbjId3,
        "gallery_name"=> $gallery_name
    );
    curl_setopt($request, CURLOPT_POST, true);
    curl_setopt($request,CURLOPT_POSTFIELDS, json_encode($request_params));
    curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json",
            "app_id:" . $APP_ID,
            "app_key:" . $APP_KEY
        )
    );
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_exec($request);
    curl_close($request);
    return $response;
}

function convertName($id){
	$conn=new Db_connect;
	$dbconnection=$conn->conn();
	$sel="SELECT fst_name, lst_name FROM staff_rec WHERE staff_id='$id'";
	$selRun=$conn->query($dbconnection,$sel);
	$selData=$conn->fetch($selRun);
	$name=$selData['fst_name']." ".$selData['lst_name'];
	return $name;
}
function checkName($id){
	$conn=new Db_connect;
	$dbconnection=$conn->conn();
	$sel="SELECT fst_name, lst_name FROM staff_rec WHERE voka_id='$id'";
	$selRun=$conn->query($dbconnection,$sel);
	$selData=$conn->fetch($selRun);
	$name=$selData['fst_name']." ".$selData['lst_name'];
	return $name;
}

function send_mail($receipient_emails, $subject, $msg){
 require_once('Classes/phpmailer/PHPMailerAutoload.php');
 $mail = new PHPMailer;
  //$mail->SMTPDebug = 3;                               // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = "just25.justhost.com";  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = "vokaface@vokacom.net";                 // SMTP username
  $mail->Password = 'jQ"S1{><*XKs&E';                           // SMTP password
  $mail->SMTPSecure = "TLS";                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = "456";                                    // TCP port to connect to
 
 
 $mail->From = "vokaface@vokacom.net";
 $mail->FromName = "Hwemudua";
 $mail->addAddress($receipient_emails); // Add a recipient
 
 $mail->isHTML(true);                                  // Set email format to HTML
 $mail->Subject = $subject;
 $mail->Body    = $msg;
 $mail->AltBody = strip_tags($msg);
 if(!$mail->send()) {
  return  $mail->ErrorInfo;
 } 
 else {
  return true;
 }
}

//CREATE STAFF clockin details
function dailychk(){
    $conn=new Db_connect;
    $dbconnection=$conn->conn();

    $dyr=date("Y");
    $mdate=date("Y-m-d");
    //CHECK IF LEAVE RECORDS HAVE BEEN UPDATED
    $dchk="SELECT * FROM control WHERE year='$dyr' AND reason ='leaveupd'";
    $dchkrun=$conn->query($dbconnection,$dchk);
    if($conn->sqlnum($dchkrun)==0){
        $updstf="UPDATE staff_rec SET leave_days=24 WHERE status !='Detached'";
        $conn->query($dbconnection,$updstf);

        $inst="INSERT INTO control SET date='$mdate', year=$dyr, reason='leaveupd'";
        $conn->query($dbconnection,$inst);
    }

    //CHECK IF ALLOWED
    $header=$_SERVER['REMOTE_ADDR'];
    $ip = explode('.',$header);
    $netConn="";
    /*if($ip[0]==41 and $ip[1]==189  and $ip[2]==173 and $ip[3]==18 || $ip[3]==19 || $ip[3]==20 || $ip[3]==21 and date("l")<>"Saturday" and date("l")<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
            $netConn="allowed";
    }*/
    if(date("l")<>"Saturday" and date("l")<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
        $netConn="allowed";
    }

    else{
        $netConn="illegal";
    }

    $currDateTime=date("YmdHis");
    $currDate=date("Ymd");
    $ddate=date("Y-m-d");
    $dtime=(strtotime(date("H:i:s"))-3600);//getting the strtotime of the current time
    $timereal=date("H:i:s",$dtime);
    $dateTime=date("Y-m-d H:i:s");
    $Currmonth=date("m");
    $Curryear=date("Y");


    //CHECK IF dailychk() is already executed
    $dchk="SELECT * FROM control WHERE date='$ddate' AND reason ='dailychk'";
    $dchkrun=$conn->query($dbconnection,$dchk);
    if($conn->sqlnum($dchkrun)==0){
        //CREATE CONTROL RECORD
        $cont="INSERT INTO control SET date='$ddate', reason='dailychk', year='$Curryear'";
        $conn->query($dbconnection,$cont);
        if($netConn=='allowed'){
            //AUDIT TRAIL
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

            //Activates All Staff Whose Leaves Begin Today
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

            //CREATE CLOCKIN RECORDS
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
        }


    //CREATE STAFF MEDICAL RECORDS FOR A NEW CYCLE
        $chkmed="SELECT * FROM control WHERE year='$Curryear' AND reason='medical'";
        $chkmedQry=$conn->query($dbconnection,$chkmed);
        if($conn->sqlnum($chkmedQry)==0){
            $insRemind="INSERT INTO control SET reason='medical', year='$Curryear', date='$ddate'";
            $conn->query($dbconnection,$insRemind);

            //Create d records
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

    }

}

function check(){
//Getting the public address of the company network
    $header=$_SERVER['REMOTE_ADDR'];
    $ip = explode('.',$header);
    $netConn="";
    /*if($ip[0]==41 and $ip[1]==189  and $ip[2]==173 and $ip[3]==18 || $ip[3]==19 || $ip[3]==20 || $ip[3]==21 and date("l")<>"Saturday" and date("l")<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
            $netConn="allowed";
    }*/
    if(date("l")<>"Saturday" and date("l")<>"Sunday" and date("Y-m-d") != date("Y-01-01") and date("Y-m-d") != date("Y-03-06") and date("Y-m-d") != date("Y-05-01") and date("Y-m-d") != date("Y-05-25") and date("Y-m-d") != date("Y-07-01") and date("Y-m-d") != date("Y-09-21") and date("Y-m-d") != date("Y-12-25") and date("Y-m-d") != date("Y-12-26")){
        $netConn="allowed";
    }

    else{
        $netConn="illegal";
    }
    return $netConn;
}

function calc_date_diff($date1,$date2){
    $donestr=strtotime(date($date1));
    $dtwostr=strtotime(date($date2));
    $strdiff=number_format(($dtwostr - $donestr) / 86400,0);
    return $strdiff;
}

//CONVERTING IMAGE FROM BASE64 TO JPG
function base64_to_jpeg($base64_string, $output_file) {
    $img = str_replace('data:image/png;base64,', '', $base64_string);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    file_put_contents($output_file, $data);
}
?>